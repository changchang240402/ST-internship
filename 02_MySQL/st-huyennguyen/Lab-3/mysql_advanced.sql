-- Cau 1
-- Tao stored procedure cap nhat Luong --
DELIMITER //
CREATE PROCEDURE updateSalary(n INT(11))
BEGIN
	UPDATE NHANVIEN NV
    JOIN (SELECT MaNhanVien 
		FROM DONDATHANG DH 
		JOIN CHITIETDATHANG CT ON DH.SoHoaDon = CT.SoHoaDon
		GROUP BY MaNhanVien 
		ORDER BY SUM(SoLuong) DESC LIMIT n
	) SL ON NV.MaNhanVien = SL.MaNhanVien
	SET LuongCoBan = LuongCoBan + 500000;
END// 
DELIMITER ;

CALL updateSalary(1);
CALL updateSalary(3);


-- Cau 2
-- Tao function tinh luong theo MaNhanVien --
DELIMITER //
CREATE FUNCTION calcSalary (MNV CHAR(4))
RETURNS DECIMAL
BEGIN
	DECLARE Luong DECIMAL DEFAULT 0;
    SELECT (LuongCoBan + PhuCap + IFNULL(SUM(GiaBan * SoLuong * 10/100),0)) INTO Luong
	FROM NHANVIEN NV
	LEFT JOIN DONDATHANG DH ON DH.MaNhanVien = NV.MaNhanVien
	LEFT JOIN CHITIETDATHANG CT ON DH.SoHoaDon = CT.SoHoaDon
	GROUP BY NV.MaNhanVien
    HAVING MaNhanVien = MNV;
    RETURN Luong;
END//
DELIMITER ;

-- Test function --
SELECT calcSalary ('A011') AS Luong;

SELECT MaNhanVien, CONCAT(Ho,' ',Ten) AS TenNhanVien, calcSalary(MaNhanVien) AS Luong FROM NHANVIEN;


-- Cau 3 --
-- Them column TongTien vao table DONDATHANG --
ALTER TABLE DONDATHANG
ADD COLUMN TongTien DECIMAL(15,2);

-- Tao trigger cap nhat TongTien sau khi insert --
DELIMITER //
CREATE TRIGGER after_CHITIETDATHANG_insert
AFTER INSERT ON CHITIETDATHANG 
FOR EACH ROW
BEGIN

	UPDATE DONDATHANG 
	SET TongTien = IFNULL(TongTien,0) + IFNULL(NEW.SoLuong,0)*(IFNULL(NEW.GiaBan,0) - IFNULL(NEW.MucGiamGia,0))
    WHERE SoHoaDon = NEW.SoHoaDon;
END//
DELIMITER ;

-- Test trigger --
INSERT INTO CHITIETDATHANG VALUES
(4, 'DC03', 7500, 1000, 0);

SELECT * FROM DONDATHANG;


-- Cau 4 --
-- Tao va them du lieu bang PHONGBAN --
CREATE TABLE PHONGBAN (
	MaPhongBan CHAR(3) PRIMARY KEY,
    TenPhongBan VARCHAR(30),
    SoLuongNhanVien INT
);
INSERT INTO PHONGBAN VALUES
('PNS','Phòng Nhân Sự',10),
('NVS','Nhân viên bán hàng',0);
 
--  Tao bang trung gian --
CREATE TABLE NHANVIENPHONGBAN (
	MaPhongBan CHAR(3),
    MaNhanVien CHAR(4),
    CONSTRAINT PK_NHANVIENPHONGBAN PRIMARY KEY(MaPhongBan,MaNhanVien),
    FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN(MaPhongBan),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);
 
--  Tao trigger cap nhat  so luong table PHONGBAN sau khi insert --
DELIMITER //
CREATE TRIGGER after_NHANVIENPHONGBAN_insert   
AFTER INSERT ON NHANVIENPHONGBAN  
FOR EACH ROW    
BEGIN   
	UPDATE PHONGBAN         
    SET SoLuongNhanVien = (IFNULL(SoLuongNhanVien,0) + 1)         
    WHERE MaPhongBan = NEW.MaPhongBan;     
END//
DELIMITER ; 
 
-- Tao trigger cap nhat so luong table PHONGBAN sau khi delete --
DELIMITER //
CREATE TRIGGER affer_NHANVIENPHONGBAN_delete
AFTER DELETE ON NHANVIENPHONGBAN     
FOR EACH ROW    
BEGIN   
    UPDATE PHONGBAN         
    SET SoLuongNhanVien = SoLuongNhanVien - 1        
    WHERE MaPhongBan = OLD.MaPhongBan;     
END//
DELIMITER ;

-- Test trigger --
INSERT INTO NHANVIENPHONGBAN VALUES
('PNS','A001'),
('NVS','H003');

DELETE FROM NHANVIENPHONGBAN
WHERE MaPhongBan = 'PNS' AND MaNhanVien = 'A001';
SELECT * FROM PHONGBAN;


-- Cau 5 --
-- Tao trigger kiem tra truoc khi insert --
DELIMITER //
CREATE TRIGGER  before_NHANVIEN_insert
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
	IF (YEAR(CURDATE()) - YEAR(NEW.NgaySinh) NOT BETWEEN 18 AND 60) THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END//
DELIMITER ;

-- Tao trigger kiem tra truoc khi update --
DELIMITER //
CREATE TRIGGER  before_NHANVIEN_update
BEFORE UPDATE ON NHANVIEN
FOR EACH ROW
BEGIN
	IF (YEAR(CURDATE()) - YEAR(NEW.NgaySinh) NOT BETWEEN 18 AND 60) THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END//
DELIMITER ;

-- Test trigger --
INSERT INTO NHANVIEN VALUES
('H021', 'Hoàng Hoa' , 'Thám', '2008/07/07','2009/03/01', 'Đà Nẵng', '056-647995', 10000000, 1000000); 

INSERT INTO NHANVIEN VALUES
('B001', 'Nguyễn Văn' , 'Hoàng', '2005/07/07','2009/03/01', 'Đà Nẵng', '056-647995', 10000000, 1000000);
