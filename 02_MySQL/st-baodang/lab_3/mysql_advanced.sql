-- Question 1
DELIMITER //
CREATE PROCEDURE updateSalary(num INT)
BEGIN
UPDATE `NHANVIEN` nv
    JOIN (SELECT ddh.`MaNhanVien` ,SUM(ctdh.`SoLuong`) as TSL
        FROM `DONDATHANG` ddh
            JOIN `CHITIETDATHANG` ctdh ON ddh.`SoHoaDon` = ctdh.`SoHoaDon`
        GROUP BY ddh.`MaNhanVien`
        ORDER BY TSL DESC
        LIMIT num
    ) sumsl ON sumsl.`MaNhanVien` = nv.`MaNhanVien`
SET nv.`LuongCoBan` = nv.`LuongCoBan` + 500000;
END//
DELIMITER ;

CALL `updateSalary`(1);

-- Question 2
DELIMITER //
CREATE FUNCTION calcSalary(MNV CHAR(4)) 
RETURNS DECIMAL

BEGIN
    DECLARE salary DECIMAL;
    SET salary = (
        SELECT ROUND(nv.`LuongCoBan` + nv.`PhuCap` + IFNULL(SUM(ctdh.`SoLuong` * ctdh.`GiaBan`) * 10 / 100, 0),2) 
        FROM `NHANVIEN` nv
            LEFT JOIN `DONDATHANG` ddh ON ddh.`MaNhanVien` = nv.`MaNhanVien`
            LEFT JOIN `CHITIETDATHANG` ctdh ON ctdh.`SoHoaDon` = ddh.`SoHoaDon` 
        WHERE nv.`MaNhanVien` = MNV
        GROUP BY nv.`MaNhanVien`
    );

    RETURN salary;

END; //

DELIMITER ;

SELECT calcSalary('A001')

-- Question 3
ALTER TABLE `DONDATHANG`
ADD TongTien DECIMAL(15,2) DEFAULT 0;

UPDATE `DONDATHANG` ddh
    JOIN (
        SELECT `SoHoaDon`, SUM(IFNULL(`SoLuong` * (`GiaBan` - IFNULL(`MucGiamGia`,0)),0)) as TongTien 
        FROM `CHITIETDATHANG`
        GROUP BY `SoHoaDon`
    ) tt ON ddh.`SoHoaDon` = tt.`SoHoaDon`
SET ddh.`TongTien` = tt.`TongTien`
WHERE ddh.`SoHoaDon` = tt.`SoHoaDon`;

DELIMITER $$

CREATE TRIGGER calBillSum
    AFTER INSERT
    ON `CHITIETDATHANG` FOR EACH ROW
BEGIN
    UPDATE `DONDATHANG` 
    SET `TongTien` = `TongTien` + IFNULL(NEW.`SoLuong` * (NEW.`GiaBan` - IFNULL(NEW.`MucGiamGia`,0)),0)
    WHERE `SoHoaDon` = NEW.`SoHoaDon`;
END $$

DELIMITER ;

-- Question 4
CREATE TABLE PHONGBAN (
    MaPhongBan CHAR(4),
    TenPhongBan VARCHAR(40),
    SoLuongNhanVien INT,
    PRIMARY KEY (MaPhongBan)
);

CREATE TABLE TRUNGGIAN (
    MaPhongBan CHAR(4),
    MaNhanVien CHAR(4),
    CONSTRAINT PK_TRUNGGIAN PRIMARY KEY (MaPhongBan, MaNhanVien),
    FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN(MaPhongBan),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);

INSERT INTO `PHONGBAN`
VALUES
('PB01', 'Phòng hành chính', 0),
('PB02', 'Phòng kinh doanh', 0);

-- INSERT
DELIMITER $$

CREATE TRIGGER updateEmpNum_insert
AFTER INSERT
ON `TRUNGGIAN` FOR EACH ROW
BEGIN
    UPDATE `PHONGBAN`
    SET `SoLuongNhanVien` = `SoLuongNhanVien` + 1
    WHERE `MaPhongBan` = NEW.`MaPhongBan`;
END; $$

DELIMITER ;

-- UPDATE
DELIMITER $$

CREATE TRIGGER update_EmpNum_update
AFTER UPDATE
ON `TRUNGGIAN` FOR EACH ROW
BEGIN
    UPDATE `PHONGBAN`
    SET `SoLuongNhanVien` = `SoLuongNhanVien` + 1
    WHERE `MaPhongBan` = NEW.`MaPhongBan`;

    UPDATE `PHONGBAN`
    SET `SoLuongNhanVien` = `SoLuongNhanVien` - 1
    WHERE `MaPhongBan` = OLD.`MaPhongBan`;
END; $$

DELIMITER ;

-- DELETE
DELIMITER $$

CREATE TRIGGER updateEmpNum_delete
AFTER DELETE
ON `TRUNGGIAN` FOR EACH ROW
BEGIN
    UPDATE `PHONGBAN`
    SET `SoLuongNhanVien` = `SoLuongNhanVien` - 1
    WHERE `MaPhongBan` = OLD.`MaPhongBan`;
END; $$

DELIMITER ;
-- Question 5

-- PROCEDURE validateAge
DELIMITER //

CREATE PROCEDURE validateAge(age INT)
DETERMINISTIC
NO SQL
BEGIN
    IF age < 18 OR age > 60 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END; //

DELIMITER ;
-- INSERT
DELIMITER $$

CREATE TRIGGER validateEmpAge_insert
BEFORE INSERT 
ON `NHANVIEN` FOR EACH ROW
BEGIN
    CALL `validateAge`(YEAR(CURDATE()) - YEAR(NEW.`NgaySinh`));
END; $$

DELIMITER ;

-- UPDATE
DELIMITER $$

CREATE TRIGGER validateEmpAge_update
BEFORE UPDATE
ON `NHANVIEN` FOR EACH ROW
BEGIN
    CALL `validateAge`(YEAR(CURDATE()) - YEAR(NEW.`NgaySinh`));
END; $$

DELIMITER ;

