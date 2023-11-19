-- 1. Tạo procedure thực hiện tăng lương cơ bản thêm 500.000 cho (n) bạn nhân viên bán hàng có tổng số lượng hàng hóa bán ra nhiều nhất. 
-- với n là data input đầu vào.
DELIMITER //
CREATE PROCEDURE IncreaseSalaryForTopSellers(IN n SMALLINT)
BEGIN
	UPDATE NHANVIEN NV
	JOIN (
		SELECT DDH.MaNhanVien, SUM(CTDH.SoLuong) AS TotalSales
		FROM CHITIETDATHANG CTDH
		JOIN DONDATHANG DDH ON CTDH.SoHoaDon = DDH.SoHoaDon
		GROUP BY DDH.MaNhanVien
		ORDER BY TotalSales DESC
		LIMIT n
	) AS TopN ON NV.MaNhanVien = TopN.MaNhanVien
	SET NV.LuongCoBan = NV.LuongCoBan + 500000;
END //
DELIMITER ;
CALL IncreaseSalaryForTopSellers(5);
DROP PROCEDURE IncreaseSalaryForTopSellers;
-- 2. Tạo function tính lương cho nhân viên: Khi input mã số nhân viên vào thì tính được lương của nhân viên đó.
DELIMITER $$
CREATE FUNCTION caculatorSalary(MaNV CHAR(4))
RETURNS DECIMAL(10,2)
DETERMINISTIC
READS SQL DATA
BEGIN
  DECLARE salary DECIMAL(10,2);
	SELECT 
		NV.LuongCoBan + NV.PhuCap + SUM(CTDH.SoLuong*(CTDH.GiaBan - CTDH.MucGiamGia))*0.1 INTO salary
	FROM NHANVIEN NV
	JOIN DONDATHANG DDH ON DDH.MaNhanVien = NV.MaNhanVien AND NV.MaNhanVien = MaNV
	JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
	GROUP BY NV.MaNhanVien;
-- Nếu không tìm thấy nhân viên, trả về NULL
  IF salary IS NULL THEN
    RETURN NULL;
  END IF;
  SET salary = salary;
  RETURN salary;
END;
$$
DELIMITER ;
-- 3. Tạo thêm cột tổng tiền trong bảng hoá đơn. Tạo hàm trigger để update tổng tiền trong hoá đơn khi chi tiết hoá đơn được tạo. 
-- Tạo thêm cột tổng tiền trong bảng hoá đơn (DONDATHANG)
ALTER TABLE DONDATHANG
ADD COLUMN TongTien DECIMAL(15, 2) DEFAULT 0;
-- Tạo Trigger
DELIMITER $$
CREATE TRIGGER UpdateTotalAmount
AFTER INSERT ON CHITIETDATHANG
FOR EACH ROW
BEGIN
    DECLARE SoHoaDon INT;
    DECLARE TongTien DECIMAL(15, 2) DEFAULT 0;
    -- Lấy ID của hoá đơn mới từ bảng ChiTietDatHang
    SET SoHoaDon = NEW.SoHoaDon; 
    -- Tính tổng tiền từ bảng CHITIETDATHANG
    SELECT SUM(SoLuong * (GiaBan - MucGiamGia))
    INTO TongTien
    FROM CHITIETDATHANG CTDH
    WHERE CTDH.SoHoaDon = SoHoaDon;
    -- Cập nhật tổng tiền trong bảng DONDATHANG cho hoá đơn tương ứng
    UPDATE DONDATHANG DDH
    SET DDH.TongTien = TongTien
    WHERE DDH.SoHoaDon = SoHoaDon;
END $$
DELIMITER ;
-- 4. Tạo thêm bảng phòng ban và bảng trung gian để nối nhân viên với phòng ban (Quan hệ n-n). 
-- Tạo triggers cập nhập số thành viên khi gán nhân viên vào phòng ban hoặc xóa nhân viên khỏi phòng ban

-- Tạo bảng phòng ban 
CREATE TABLE PHONGBAN (
    MaPhongBan CHAR(4) PRIMARY KEY,
    TenPhongBan VARCHAR(255) NOT NULL,
    SoThanhVien INT DEFAULT 0
);
-- Tạo bảng trung gian
CREATE TABLE NhanVien_PhongBan (
    MaNhanVien CHAR(4),
    MaPhongBan CHAR(4),
    PRIMARY KEY (MaNhanVien, MaPhongBan),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien),
    FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN(MaPhongBan)
);
--  Tạo triggers
-- Trigger thêm nhân viên vào phòng ban
DELIMITER //
CREATE TRIGGER InsertNhanVienToPhongBan
AFTER INSERT ON NhanVien_PhongBan
FOR EACH ROW
BEGIN
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien + 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END;
//
-- Trigger xóa nhân viên khỏi phòng ban
DELIMITER //
CREATE TRIGGER DeleteNhanVienFromPhongBan
AFTER DELETE ON NhanVien_PhongBan
FOR EACH ROW
BEGIN
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien - 1
    WHERE MaPhongBan = OLD.MaPhongBan;
END;
//
DELIMITER ;
-- Insert data
INSERT INTO PHONGBAN (MaPhongBan,TenPhongBan) VALUES ('PB01','Kế toán');
INSERT INTO PHONGBAN (MaPhongBan,TenPhongBan) VALUES ('PB02','Nhân sự');
INSERT INTO NhanVien_PhongBan (MaNhanVien, MaPhongBan) VALUES ('A001', 'PB01');
INSERT INTO NhanVien_PhongBan (MaNhanVien, MaPhongBan) VALUES ('D001', 'PB02');
INSERT INTO NhanVien_PhongBan (MaNhanVien, MaPhongBan) VALUES ('A001', 'PB02');
-- Note : Trigger này phải được tạo từ đầu, lúc phỏng ban chưa có nhân viên nào ( Vì mặc định số lượng là 0 ) 
--            --> Nếu phòng ban có sẵn nhân viên mà tạo trigger này rồi insert thêm NV thì số lượng sẽ sai ( Vì số lượng default là 0)

-- 5. Tao trigger để khi insert hoặc update nhân viên thì phải kiểm tra tuổi của nhân viên trong độ tuổi lao động từ 18 tới 60 tuổi, 
-- trường hợp không hợp lệ thì không cho insert hoặc update và  thông báo lỗi “Nhan vien phai tu 18 tuoi den 60”. 

-- Define the common PROCEDURE used by both update and insert triggers:
-- (DATE_FORMAT(CURRENT_DATE(), '%m%d') < DATE_FORMAT(EmployeeBirthday, '%m%d')) : so sánh tháng và ngày hiện tại với tháng và ngày sinh của nhân viên. 
-- Nếu ngày tháng sinh sau tháng và ngày hiện tại (tức là nhân viên chưa tròn sinh nhật trong năm nay), nó trừ đi 1 tuổi. 
-- Điều này đảm bảo rằng chúng ta không tăng tuổi cho nhân viên trước khi họ chưa tròn sinh nhật.
DELIMITER //
CREATE PROCEDURE CheckEmployeeAgeProcedure(IN EmployeeBirthday DATE)
BEGIN
    DECLARE EmployeeAge TINYINT;
    SET EmployeeAge = YEAR(CURRENT_DATE()) - YEAR(EmployeeBirthday) - (DATE_FORMAT(CURRENT_DATE(), '%m%d') < DATE_FORMAT(EmployeeBirthday, '%m%d'));
    IF EmployeeAge < 18 OR EmployeeAge > 60 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END;
//
DELIMITER ;
-- Define the INSERT trigger and UPDATE trigger
DELIMITER //
CREATE TRIGGER InsertNhanVien
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
    CALL CheckEmployeeAgeProcedure(NEW.NgaySinh);
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER UpdateNhanVien
BEFORE UPDATE ON NHANVIEN
FOR EACH ROW
BEGIN
    CALL CheckEmployeeAgeProcedure(NEW.NgaySinh);
END;
//
DELIMITER ;