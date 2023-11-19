-- Câu 1. Tạo procedure thực hiện tăng lương cơ bản thêm 500.000 cho (n) bạn nhân viên bán hàng có tổng số lượng hàng hóa bán ra nhiều nhất. với n là data input đầu vào.
DELIMITER //
CREATE PROCEDURE UpdateNhanVien(n INT)
BEGIN
    UPDATE NHANVIEN
    SET LuongCoBan = LuongCoBan + 500000
    WHERE MaNhanVien IN (
        SELECT MaNhanVien
        FROM (
            SELECT MaNhanVien, SUM(SoLuong) AS TongSoLuong
            FROM NHANVIEN 
            JOIN DONDATHANG USING (MaNhanVien)
            JOIN CHITIETDATHANG USING (SoHoaDon)
            GROUP BY MaNhanVien 
            ORDER BY TongSoLuong DESC
            LIMIT n
        ) AS TopSales
    );
END //
DELIMITER ;
SELECT * FROM NHANVIEN;
CALL UpdateNhanVien(3);

-- Câu 2 Tạo function tính lương cho nhân viên:Khi input mã số nhân viên vào thì tính được lương của nhân viên đó.
DELIMITER //
CREATE FUNCTION LuongNhanVien(MaNhanVien char(4))
RETURNS DECIMAL(10,2)
DETERMINISTIC 
READS SQL DATA
BEGIN
	DECLARE LuongNhanVien DECIMAL(10,2) ;
    SELECT (nv.LuongCoBan + nv.PhuCap + (SUM(ctdh.SoLuong * ctdh.GiaBan)* 0.1)) INTO LuongNhanVien
	FROM NHANVIEN nv
	JOIN DONDATHANG ddh USING(MaNhanVien)
	JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
    WHERE nv.MaNhanVien = MaNhanVien
    GROUP BY ddh.SoHoaDon;
    RETURN LuongNhanVien;
END //
DELIMITER ; 

SELECT LUONGNHANVIEN('T001');

-- Câu 3 Tạo thêm cột tổng tiền trong bảng hoá đơn. Tạo hàm trigger để update tổng tiền trong hoá đơn khi chi tiết hoá đơn được tạo.
ALTER TABLE DONDATHANG
ADD COLUMN TongTien DECIMAL(10, 2);

DROP TRIGGER IF EXISTS UpdateTongTien;
DELIMITER //
CREATE TRIGGER UpdateTongTien
AFTER INSERT ON CHITIETDATHANG
FOR EACH ROW
BEGIN
    UPDATE DONDATHANG 
    SET TongTien = IFNULL(TongTien, 0) + (IFNULL(NEW.SoLuong, 0) * IFNULL(NEW.GiaBan, 0) - IFNULL(NEW.SoLuong, 0) * IFNULL(NEW.MucGiamGia, 0))
    WHERE SoHoaDon = NEW.SoHoaDon;
END //
DELIMITER ;

SELECT * FROM DONDATHANG;

-- Câu 4 Tạo thêm bảng phòng ban và bảng trung gian để nối nhân viên với phòng ban (Quan hệ n-n). Tạo triggers cập nhập số thành viên khi gán nhân viên vào phòng ban hoặc xóa nhân viên khỏi phòng ban
CREATE TABLE PHONGBAN (
MaPhongBan CHAR(4) PRIMARY KEY,
TenPhongBan VARCHAR(40),
SoLuongNhanVien INT
);
CREATE TABLE NHANVIENPHONGBAN(
MaNhanVien CHAR(4),
MaPhongBan CHAR(4),
CONSTRAINT PK_NHANVIENPHONGBAN_MaNhanVien_MaPhongBan PRIMARY KEY(MaNhanVien, MaPhongBan),
FOREIGN KEY(MaPhongBan) REFERENCES PHONGBAN(MaPhongBan),
FOREIGN KEY(MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);

-- Trigger insert
DELIMITER //
CREATE TRIGGER Trigger_Insert_PhongBan_NhanVien
AFTER INSERT ON NHANVIENPHONGBAN
FOR EACH ROW
BEGIN
	UPDATE PHONGBAN
    SET SoLuongNhanVien = IFNULL(SoLuongNhanVien, 0) + 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END //
DELIMITER ;

-- Trigger delete
DELIMITER //
CREATE TRIGGER Trigger_Delete_PhongBan_NhanVien
AFTER DELETE ON NHANVIENPHONGBAN
FOR EACH ROW
BEGIN
	UPDATE PHONGBAN
    SET SoLuongNhanVien = IFNULL(SoLuongNhanVien, 0) - 1
    WHERE MaPhongBan = OLD.MaPhongBan;
END //
DELIMITER ;

 INSERT INTO PHONGBAN VALUES
 ('PNS1','Phòng Nhân Sự',10),
 ('PTC1','Phòng Tài Chính',3);
 
 INSERT INTO NHANVIENPHONGBAN VALUES
('T001','PNS1'),
('H002','PTC1'),
('H003', 'PTC1');

SELECT * FROM PHONGBAN;

DELETE FROM NHANVIENPHONGBAN
WHERE MaNhanVien = 'T001';

-- Câu 5
-- Kiểm tra tuổi trước khi insert
DELIMITER //
CREATE TRIGGER Trigger_BeforeInsert_NhanVien
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
    DECLARE Tuoi INT;
    SET Tuoi = TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW());
    
    IF Tuoi < 18 OR Tuoi > 60 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END //
DELIMITER ;

-- Kiểm tra tuổi trước khi update
DELIMITER //
CREATE TRIGGER Trigger_BeforeUpdate_NhanVien
BEFORE UPDATE ON NHANVIEN
FOR EACH ROW
BEGIN
    DECLARE Tuoi INT;
    SET Tuoi = TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW());
    
    IF Tuoi < 18 OR Tuoi > 60 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END //
DELIMITER ;


