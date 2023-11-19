-- Active: 1694049895723@@127.0.0.1@3306@QLDH

--QUESTION 1
DELIMITER//

CREATE PROCEDURE TangLuong(num INT)
BEGIN
   UPDATE NHANVIEN 
   JOIN  (SELECT DONDATHANG.MaNhanVien, SUM(C.SoLuong) AS SoLuongBan
         FROM DONDATHANG
         JOIN CHITIETDATHANG AS C ON C.SoHoaDon = DONDATHANG.SoHoaDon
         GROUP BY DONDATHANG.MaNhanVien
         ORDER BY SoLuongBan DESC 
         LIMIT num
    ) AS T ON NHANVIEN.MaNhanVien = T.MaNhanVien
    SET `LuongCoBan` = `LuongCoBan` + 500000;
END //
DELIMITER ;

DROP PROCEDURE `TangLuong`;
--TEST QUESTION 1
CALL TangLuong(3);

--QUESTION 2
DELIMITER //
CREATE FUNCTION TinhLuong(n char(4))
RETURNS DECIMAL(15,2)
BEGIN
     RETURN 
     (
        SELECT (LuongCoBan + PhuCap + SUM(C.SoLuong*(GiaBan - MucGiamGia))*10/100) AS Luong
        FROM NHANVIEN 
        JOIN `DONDATHANG` ON DONDATHANG.`MaNhanVien` = NHANVIEN.`MaNhanVien`
        JOIN `CHITIETDATHANG` AS C ON DONDATHANG.`SoHoaDon` = C.`SoHoaDon`
        WHERE NHANVIEN.`MaNhanVien` = n
        GROUP BY NHANVIEN.`MaNhanVien`
     );
END //
DELIMITER ;

-- TEST QUESTION 2
SELECT TinhLuong('A001');

--QUESTION 3
DELIMITER //
ALTER TABLE DONDATHANG
ADD TongTien DECIMAL(15,2);

CREATE TRIGGER trg_DatHang AFTER INSERT ON CHITIETDATHANG FOR EACH ROW
BEGIN 
     UPDATE `DONDATHANG`
     JOIN `CHITIETDATHANG` ON DONDATHANG.`SoHoaDon` = CHITIETDATHANG.`SoHoaDon`
     SET TongTien = IFNULL(`TongTien`, 0) + IFNULL(NEW.`SoLuong`*(NEW.`GiaBan`-NEW.`MucGiamGia`),0)
     WHERE DONDATHANG.`SoHoaDon` = NEW.`SoHoaDon`;
END//

DELIMITER ;


-- TEST QUESTION 3
INSERT INTO `CHITIETDATHANG` 
VALUES (1, 'MM01', 48000, 1000, 0);



--QUESTION 4

CREATE TABLE PHONGBAN (
   MaPhongBan CHAR(4),
   TenPhongBan VARCHAR(50),
   SoLuongNV INT,
   PRIMARY KEY(MaPhongBan)
);
CREATE TABLE CHITIETPHONGBAN
(
  MaPhongBan CHAR(4),
  MaNhanVien CHAR(4),
  CONSTRAINT PK_CHITIETPHONGBAN_MaPhongBan_MaNhanVien PRIMARY KEY(MaPhongBan,MaNhanVien),
  CONSTRAINT FK_CHITIETPHONGBAN_MaPhongBan FOREIGN KEY(MaPhongBan)
  REFERENCES PHONGBAN(MaPhongBan)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  CONSTRAINT FK_CHITIETPHONGBAN_MaNhanVien FOREIGN KEY(MaNhanVien)
  REFERENCES NHANVIEN(MaNhanVien)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);
INSERT INTO PHONGBAN VALUES
('MKT', 'Marketing', NULL ),
('NS', 'Nhân Sự',NULL),
('SL', 'Sale',NULL),
('IT', 'Công Nghệ',NULL );

DELIMITER //
CREATE TRIGGER trg_ThemNhanVien AFTER INSERT ON CHITIETPHONGBAN FOR EACH ROW
BEGIN 
     UPDATE `PHONGBAN`
     SET SoLuongNV = IFNULL(`SoLuongNV`, 0) + 1
     WHERE PHONGBAN.`MaPhongBan` = NEW.`MaPhongBan`;
END//
DELIMITER ;




DELIMITER //
CREATE TRIGGER trg_XoaNhanVien AFTER DELETE ON CHITIETPHONGBAN FOR EACH ROW
BEGIN 
     UPDATE `PHONGBAN`
     SET SoLuongNV = IFNULL(`SoLuongNV`, 0) - 1
     WHERE PHONGBAN.`MaPhongBan` = OLD.`MaPhongBan`;
END//

DELIMITER ;


--TEST QUESTION 4
INSERT INTO CHITIETPHONGBAN VALUES
('MKT', 'A001' );

DELETE FROM `CHITIETPHONGBAN`
WHERE `MaNhanVien`= 'A001' AND `MaPhongBan` = 'MKT'

--QUESTION 5
DELIMITER //
CREATE TRIGGER trg_InsertNhanVien BEFORE INSERT ON NHANVIEN FOR EACH ROW
BEGIN 
   IF TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) NOT BETWEEN 18 AND 60 THEN
     SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = ' Nhan vien phai tu 18 tuoi den 60 ';
   END IF;
END//
DELIMITER ;


DELIMITER //
CREATE TRIGGER trg_UpdateNhanVien BEFORE UPDATE ON NHANVIEN FOR EACH ROW
BEGIN 
     IF NEW.NgaySinh != OLD.NgaySinh THEN
          IF TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) NOT BETWEEN 18 AND 60 THEN
               SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = ' Nhan vien phai tu 18 tuoi den 60 ';
          END IF;
     END IF;
END//
DELIMITER ;

DROP TRIGGER trg_UpdateNhanVien

--TEST QUESTION 5 
INSERT INTO NHANVIEN VALUES
('L001', 'Đào Thủy' , 'Trang', '2009/03/07','2023/03/01', 'Quy Nhơn', '056-623495', 10000000, 1000000);


INSERT INTO NHANVIEN VALUES
('L001', 'Đào Thủy' , 'Trang', '2002/03/07','2023/03/01', 'Quy Nhơn', '056-623495', 10000000, 1000000);

UPDATE `NHANVIEN`
SET `NgaySinh` = '2009/03/07'
WHERE `MaNhanVien` = 'A001';






      