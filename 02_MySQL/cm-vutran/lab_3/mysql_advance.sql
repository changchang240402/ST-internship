-- 1. Tạo procedure thực hiện tăng lương cơ bản thêm 500.000 cho (n) bạn nhân viên bán hàng 
-- có tổng số lượng hàng hóa bán ra nhiều nhất. với n là data input đầu vào.
DELIMITER //

CREATE PROCEDURE TangLuongNhanVien(IN n INT)
BEGIN
    -- Tạo bảng tạm thời để lấy danh sách (n) nhân viên hàng đầu
    CREATE TEMPORARY TABLE NhanVienBanHang AS (
        SELECT NV.MaNhanVien, SUM(CTDH.SoLuong) AS TongSoLuong
        FROM NHANVIEN NV
        JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien
        JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
        GROUP BY NV.MaNhanVien ORDER BY TongSoLuong DESC LIMIT n
    );

    -- Tăng lương cơ bản thêm 500.000 cho các nhân viên hàng đầu
    UPDATE NHANVIEN NV
    JOIN NhanVienBanHang TS ON NV.MaNhanVien = TS.MaNhanVien
    SET NV.LuongCoBan = NV.LuongCoBan + 500000;

    -- Xóa bảng tạm thời
    DROP TEMPORARY TABLE IF EXISTS NhanVienBanHang;
END //

DELIMITER ;

CALL TangLuongNhanVien(3); 


-- 2: Tạo function tính lương cho nhân viên: Khi input mã số nhân viên vào thì tính được lương của nhân viên đó.

DELIMITER //
CREATE FUNCTION TinhLuongNhanVien(MaNV CHAR(4))
RETURNS DECIMAL(10,2)
DETERMINISTIC
READS SQL DATA
BEGIN
	DECLARE LuongNhanVien DECIMAL(10,2);
	DECLARE LuongCoBan DECIMAL(10, 2);
    DECLARE PhuCap DECIMAL(10, 2);
    DECLARE TongHoaHong DECIMAL(10, 2);
    
    SELECT NV.LuongCoBan, NV.PhuCap, SUM((CTDH.GiaBan * CTDH.SoLuong) * 0.1) INTO LuongCoBan, PhuCap, TongHoaHong
    FROM NHANVIEN NV JOIN  DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien
    JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon 
	WHERE NV.MaNhanVien = MaNV
    GROUP BY NV.MaNhanVien;
   
    -- Tính tổng lương
    SET LuongNhanVien = LuongCoBan + PhuCap + (TongHoaHong);
    
    RETURN LuongNhanVien;
END;
//
DELIMITER ;
  
SELECT TinhLuongNhanVien("T001") AS LuongNhanVienT001;

-- 3: Tạo thêm cột tổng tiền trong bảng hoá đơn. Tạo hàm trigger để update tổng tiền trong hoá đơn khi chi tiết hoá đơn được tạo.  
ALTER TABLE dondathang ADD TongTien DECIMAL(15,2) DEFAULT '0';

UPDATE DONDATHANG DDH
SET DDH.TongTien = (
    SELECT SUM(CTDH.GiaBan * CTDH.SoLuong)
    FROM CHITIETDATHANG CTDH
    WHERE CTDH.SoHoaDon = DDH.SoHoaDon
);

DELIMITER //
CREATE TRIGGER CapNhatTongTien
BEFORE INSERT ON CHITIETDATHANG
FOR EACH ROW
BEGIN
	UPDATE DONDATHANG
	SET
	TongTien = TongTien + ((NEW.SoLuong * NEW.GiaBan) - (NEW.SoLuong * NEW.MucGiamGia))
	WHERE SoHoaDon = NEW.SoHoaDon;
END//
DELIMITER ;


-- 4: Tạo thêm bảng phòng ban và bảng trung gian để nối nhân viên với phòng ban (Quan hệ n-n). 
-- Tạo triggers cập nhập số thành viên khi gán nhân viên vào phòng ban hoặc xóa nhân viên khỏi phòng ban

CREATE TABLE PHONGBAN (
    MaPhongBan CHAR(3) PRIMARY KEY,
    TenPhongBan VARCHAR(50),
    SoThanhVien INT DEFAULT 0
);
CREATE TABLE NHANVIEN_PHONGBAN (
    MaNhanVien CHAR(4),
    MaPhongBan CHAR(3),
    PRIMARY KEY (MaNhanVien, MaPhongBan),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN (MaNhanVien),
    FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN (MaPhongBan)
);

DELIMITER //
CREATE TRIGGER AfterInsertNhanVienPhongBan
AFTER INSERT ON NHANVIEN_PHONGBAN
FOR EACH ROW
BEGIN
    -- Tăng số thành viên của phòng ban khi có nhân viên mới được gán vào phòng ban
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien + 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER AfterDeleteNhanVienPhongBan
AFTER DELETE ON NHANVIEN_PHONGBAN
FOR EACH ROW
BEGIN
    -- Giảm số thành viên của phòng ban khi có nhân viên bị xóa khỏi phòng ban
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien - 1
    WHERE MaPhongBan = OLD.MaPhongBan;
END;
//
DELIMITER ;

-- 5: Tao trigger để khi insert hoặc update nhân viên thì phải kiểm tra tuổi của nhân viên trong độ tuổi 
-- lao động từ 18 tới 60 tuổi, trường hợp không hợp lệ thì không cho insert hoặc update và  thông báo lỗi “Nhan vien phai tu 18 tuoi den 60”. 
DELIMITER //
CREATE TRIGGER KiemTraTuoiAfterInsert
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
    
	DECLARE Tuoi INT;
    SET Tuoi = YEAR(CURDATE()) - YEAR(NEW.NgaySinh);
    
    IF Tuoi < 18 OR Tuoi > 60 THEN 
     SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Tuổi của nhân viên không hợp lệ';
    END IF;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER KiemTraTuoiAfterUpdate
BEFORE UPDATE ON NHANVIEN
FOR EACH ROW
BEGIN
    
	DECLARE Tuoi INT;
    SET Tuoi = YEAR(CURDATE()) - YEAR(NEW.NgaySinh);
    
    IF Tuoi < 18 OR Tuoi > 60 THEN 
     SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Tuổi của nhân viên không hợp lệ';
    END IF;
END;
//
DELIMITER ;