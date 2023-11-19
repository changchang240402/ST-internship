SET sql_mode = '';

-- Câu 1:
DELIMITER //
CREATE PROCEDURE TangLuong(IN nNhanVien INT)
BEGIN
	UPDATE NHANVIEN n
	SET n.LuongCoBan = n.LuongCoBan + 500000
	WHERE n.MaNhanVien IN (
	    SELECT MaNhanVien
	    FROM (
	        SELECT MaNhanVien, COUNT(*) AS TotalOrders
	        FROM DONDATHANG
	        GROUP BY MaNhanVien
	        ORDER BY TotalOrders DESC
	        LIMIT nNhanVien
	    ) AS MostOrdersEmployees
	);
END;
//
DELIMITER ;

CALL TangLuong(2);


-- Câu 2:
DELIMITER //

CREATE FUNCTION CalculateSalary(EmployeeID VARCHAR(20)) RETURNS DECIMAL(10, 2)
BEGIN
   	DECLARE BaseSalary DEC(10,2) DEFAULT 0.00;
    DECLARE PhuCap DEC(10, 2) DEFAULT 0.00;
    DECLARE TongHoaHong DEC(10, 2) DEFAULT 0.00;
    
    SELECT LuongCoBan, PhuCap
    INTO BaseSalary, PhuCap
    FROM NHANVIEN
    WHERE MaNhanVien = EmployeeID;
    
	SELECT SUM(GiaBan * SoLuong * 0.10) INTO TongHoaHong
	FROM DONDATHANG
	JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
	WHERE DONDATHANG.MaNhanVien = EmployeeID
	GROUP BY DONDATHANG.MaNhanVien;

    RETURN COALESCE(BaseSalary + PhuCap + TongHoaHong, 0);
END;
//
DELIMITER ;

SELECT CalculateSalary("A001");

-- Câu 3:
ALTER TABLE QLBH.DONDATHANG ADD TongTien DEC(10, 2) DEFAULT 0.00;

DELIMITER //

CREATE TRIGGER calculate_total_price
AFTER INSERT ON CHITIETDATHANG
FOR EACH ROW
BEGIN
    DECLARE total DECIMAL(10, 2);
    
    SELECT SUM(SoLuong * GiaBan - SoLuong * MucGiamGia) INTO total
    FROM CHITIETDATHANG
    WHERE SoHoaDon = NEW.SoHoaDon;
    
    UPDATE DONDATHANG
    SET TongTien = total
    WHERE SoHoaDon = NEW.SoHoaDon;
   
END;
//

DELIMITER ;


-- Câu 4:
CREATE TABLE PHONGBAN (
    MaPhongBan char(2) PRIMARY KEY,
    TenPhongBan varchar(255),
    SoThanhVien int(11) DEFAULT 0;
);

CREATE TABLE PHONGBAN_MEMBER (
    MaPhongBan char(2),
    MaNhanVien char(4),
    FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN(MaPhongBan)
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);

-- Trigger on insert
DELIMITER //

CREATE TRIGGER tr_phongban_member_insert
AFTER INSERT ON PHONGBAN_MEMBER FOR EACH ROW
BEGIN
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien + 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END;
//

DELIMITER ;

-- Trigger on delete
DELIMITER //

CREATE TRIGGER tr_phongban_member_delete
AFTER DELETE ON PHONGBAN_MEMBER FOR EACH ROW
BEGIN
    UPDATE PHONGBAN
    SET SoThanhVien = SoThanhVien - 1
    WHERE MaPhongBan = OLD.MaPhongBan;
END;
//

DELIMITER ;

-- Câu 5:
DELIMITER //

CREATE TRIGGER tr_check_age
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
	DECLARE age INT;
    SET age = YEAR(CURDATE()) - YEAR(NEW.NgaySinh);
    IF age < 18 OR age > 60 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nhan vien phai tu 18 tuoi den 60';
    END IF;
END;
//

DELIMITER ;












