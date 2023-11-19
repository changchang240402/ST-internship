-----------------------------------------------------------
-- Create QLBH Database
CREATE DATABASE QLBH;
USE QLBH;

-- Create KHACHHANG Table
CREATE TABLE KHACHHANG (
    MaKhachHang int AUTO_INCREMENT,
    TenCongTy VARCHAR(50),
    TenGiaoDich VARCHAR(20),
    DiaChi VARCHAR(50),
    Email VARCHAR(30),
    DienThoai VARCHAR(15),
    Fax VARCHAR(15),
    PRIMARY KEY (MaKhachHang)
);

-- Create NHACUNGCAP Table
CREATE TABLE NHACUNGCAP (
    MaCongTy CHAR(3),
    TenCongTy VARCHAR(50),
    TenGiaoDich VARCHAR(20),
    DiaChi VARCHAR(50),
    DienThoai VARCHAR(15),S
    Fax VARCHAR(15),
    Email VARCHAR(30),
    PRIMARY KEY (MaCongTy)
);

-- Create LOAIHANG Table 
CREATE TABLE LOAIHANG (
    MaLoaiHang CHAR(2),
    TenLoaiHang VARCHAR(30),
    PRIMARY KEY (MaLoaiHang)
);

-- Create MATHANG Table
CREATE TABLE MATHANG (
    MaHang CHAR(4),
    TenHang VARCHAR(30),
    MaCongTy CHAR(3),
    MaLoaiHang CHAR(2),
    SoLuong INT,
    DonViTinh VARCHAR(10),
    GiaHang DECIMAL(10,2),
    PRIMARY KEY (MaHang),
    FOREIGN KEY (MaCongTy) REFERENCES NHACUNGCAP(MaCongTy),
    FOREIGN KEY (MaLoaiHang) REFERENCES LOAIHANG(MaLoaiHang)
);

-- Create NHANVIEN Table
CREATE TABLE NHANVIEN (
    MaNhanVien CHAR(4),
    Ho VARCHAR(40),
    Ten VARCHAR(10),
    NgaySinh TIMESTAMP,
    NgayLamViec TIMESTAMP,
    DiaChi VARCHAR(60),
    DienThoai VARCHAR(15),
    LuongCoBan DECIMAL(10,2),
    PhuCap DECIMAL(10,2),
    PRIMARY KEY (MaNhanVien)
);

-- Create DONDATHANG Table
CREATE TABLE DONDATHANG (
    SoHoaDon INT AUTO_INCREMENT,
    MaKhachHang INT,
    MaNhanVien CHAR(4),
    NgayDatHang TIMESTAMP,
    NgayGiaoHang TIMESTAMP,
    NgayChuyenHang TIMESTAMP,
    NoiGiaoHang VARCHAR(80),
    PRIMARY KEY (SoHoaDon),
    FOREIGN KEY (MaKhachHang) REFERENCES KHACHHANG(MaKhachHang),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);

-- Create CHITIETDATHANG Table
CREATE TABLE CHITIETDATHANG (
    SoHoaDon INT,
    MaHang CHAR(4),
    GiaBan DECIMAL(10,2),
    SoLuong INT,
    MucGiamGia DECIMAL(10,2),
    CONSTRAINT PK_CHITIETDATHANG PRIMARY KEY (SoHoaDon, MaHang),
    FOREIGN KEY (SoHoaDon) REFERENCES DONDATHANG(SoHoaDon),
    FOREIGN KEY (MaHang) REFERENCES MATHANG(MaHang)
);

-----------------------------------------------------------
-- Insert KHACHHANG Data
INSERT INTO `KHACHHANG` (`TenCongTy`, `TenGiaoDich`, `DiaChi`, `Email`, `DienThoai`)
VALUES
('Công ty sữa Việt Nam', 'VINAMILK','Hà Nội', 'vinamilk@vietnam.com', '04-891135'),
('Công ty may mặc Việt Tiến', 'VIETTIEN','Sài Gòn', 'viettien@vietnam.com', '08-808803'),
('Tổng công ty thực phẩm dinh dưỡng NUTRIFOOD', 'NUTRIFOOD','Sài Gòn', 'nutrifood@vietnam.com', '08-89890'),
('Công ty điện máy Hà Nội', 'MACHANOI','Hà Nội', 'machanoi@vietnam.com', '04-898399'),
('Hãng hàng không Việt Nam', 'VIETNAMAIRLINES','Sài Gòn', 'vietnamairlines@vietnam.com', '08-888888'),
('Công ty dụng cụ học sinh MIC', 'MIC','Hà Nội', 'mic@vietnam.com', '04-804408');

-- Insert LOAIHANG Data
INSERT INTO `LOAIHANG` (`MaLoaiHang`, `TenLoaiHang`)
VALUES
('DC', 'Dụng cụ học tập'),
('DT', 'Điện tử'),
('MM', 'May mặc'),
('NT', 'Nội thất'),
('TP', 'Thực phẩm');

-- Insert NHACUNGCAP Data
INSERT INTO `NHACUNGCAP` (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Email`)
VALUES
('DAF', 'Nội thất Đài Loan Dafuco', 'DAFUCO', 'Quy Nhơn', '056-888111', 'dafuco@vietnam.com'),
('DQV', 'Công ty máy tính Quang Vũ', 'QUANGVU', 'Quy Nhơn', '056-888777', 'quangvu@vietnam.com'),
('GOL', 'Công ty sản xuất dụng cụ học sinh Golden', 'GOLDEN', 'Quy Nhơn', '056-891135', 'golden@vietnam.com'),
('MVT', 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', '08-808803', 'viettien@vietnam.com'),
('SCM', 'Siêu thị Coop-mart', 'COOPMART', 'Quy Nhơn', '056-888666', 'coopmart@vietnam.com'),
('VNM', 'Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', '04-891135', 'vinamilk@vietnam.com');

-- Insert MATHANG Data
INSERT INTO `MATHANG` (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`)
VALUES
('DC01', 'Vở học sinh cao cấp', 'GOL', 'DC', 20000, 'Ram', 48000.00),
('DC02', 'Viết bi học sinh', 'GOL', 'DC', 2000, 'Cây', 2000.00),
('DC03', 'Hộp màu tô', 'GOL', 'DC', 2000, 'Hộp', 7500.00),
('DC04', 'Viết mực cao cấp', 'GOL', 'DC', 2000, 'Cây', 20000.00),
('DC05', 'Viết chì 2B', 'GOL', 'DC', 2000, 'Cây', 3000.00),
('DC08', 'Viết chì 4B', 'GOL', 'DC', 2000, 'Cây', 6000.00),
('DT01', 'LCD Nec', 'DQV', 'DT', 10, 'Cái', 3100000.00),
('DT02', 'Ổ cứng 80GB', 'DQV', 'DT', 20, 'Cái', 800000.00),
('DT03', 'Bàn phím Mitsumi', 'DQV', 'DT', 20, 'Cái', 150000.00),
('DT04', 'Tivi LCD', 'DQV', 'DT', 10, 'Cái', 20000000.00),
('DT05', 'Máy tính xách tay NEC', 'DQV', 'DT', 60, 'Cái', 18000000.00),
('MM01', 'Đồng phục công sở nữ', 'MVT', 'MM', 140, 'Bộ', 340000.00),
('MM02', 'Veston nam', 'MVT', 'MM', 30, 'Bộ', 500000.00),
('MM03', 'Áo sơ mi nam', 'MVT', 'MM', 20, 'Cái', 75000.00),
('NT01', 'Bàn ghế ăn', 'DAF', 'NT', 20, 'Bộ', 1000000.00),
('NT02', 'Bàn ghế Salo', 'DAF', 'NT', 20, 'Bộ', 150000.00),
('TP01', 'Sữa hộp XY', 'VNM', 'TP', 10, 'Hộp', 4000.00),
('TP02', 'Sữa X', 'VNM', 'TP', 12, 'Hộp', 180000.00),
('TP03', 'Sữa tươi Vinamilk không đường', 'VNM', 'TP', 5000, 'Hộp', 3500.00),
('TP04', 'Táo', 'SCM', 'TP', 12, 'Ký', 12000.00),
('TP05', 'Cà chua', 'SCM', 'TP', 15, 'Ký', 5000.00),
('TP06', 'Bánh AFC', 'SCM', 'TP', 100, 'Hộp', 3000.00),
('TP07', 'Mì tôm A-One', 'SCM', 'TP', 150, 'Thùng', 40000.00);

-- Insert NHANVIEN Data
INSERT INTO `NHANVIEN` (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`)
VALUES
('A001', 'Đậu Tố', 'Anh', '1986-03-07 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-647995', 10000000.00, 1000000.00),
('D001', 'Nguyễn Minh', 'Đăng', '1987-12-29 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '0905-779919', 14000000.00, 0.00),
('H001', 'Lê Thị Bích', 'Hoa', '1986-05-20 00:00:00', '2009-03-01 00:00:00', 'An Khê', NULL, 9000000.00, 1000000.00),
('H002', 'Ông Hoàng', 'Hải', '1987-08-11 00:00:00', '2009-03-01 00:00:00', 'Đà Nẵng', '0905-611725', 12000000.00, 0.00),
('H003', 'Trần Nguyễn Đức', 'Hoàng', '1986-04-09 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', NULL, 11000000.00, 0.00),
('M001', 'Hồ Thị Phương', 'Mai', '1987-09-14 00:00:00', '2009-03-01 00:00:00', 'Tây Sơn', NULL, 9000000.00, 500000.00),
('P001', 'Nguyễn Hoài', 'Phong', '1986-06-14 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-891135', 13000000.00, 0.00),
('Q001', 'Trương Thị Thế', 'Quang', '1987-06-17 00:00:00', '2009-03-01 00:00:00', 'Ayunpa', '0979-792176', 10000000.00, 500000.00),
('T001', 'Nguyễn Đức', 'Thắng', '1984-09-13 00:00:00', '2009-03-01 00:00:00', 'Phù Mỹ', '0955-593893', 1200000.00, 0.00);

-- Insert DONDATHANG Data
INSERT INTO `DONDATHANG` (`MaKhachHang`, `MaNhanVien`, `NgayDatHang`, `NgayGiaoHang`, `NgayChuyenHang`, `NoiGiaoHang`)
VALUES
(1, 'A001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội'),
(1, 'H001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội'),
(2, 'H002', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn'),
(3, 'H003', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn'),
(4, 'P001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội'),
(5, 'D001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội'),
(6, 'M001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội'),
(2, 'Q001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn'),
(3, 'T001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn');

-- Insert CHITIETDATHANG Data
INSERT INTO `CHITIETDATHANG` (`SoHoaDon`, `MaHang`, `GiaBan`, `SoLuong`, `MucGiamGia`)
VALUES
(1, 'TP01', 4000.00, 5, 0.00),
(1, 'TP02', 180000.00, 5, 5000.00),
(1, 'TP03', 12000.00, 5, 0.00),
(1, 'TP06', 3000.00, 50, 0.00),
(1, 'TP07', 40000.00, 100, 0.00),
(2, 'MM01', 340000.00, 30, 10000.00),
(2, 'MM02', 500000.00, 20, 20000.00),
(3, 'MM01', 340000.00, 30, 10000.00),
(3, 'MM02', 500000.00, 30, 20000.00),
(4, 'MM01', 340000.00, 80, 10000.00),
(5, 'TP03', 3000.00, 1000, 0.00),
(6, 'DT01', 3100000.00, 2, 100000.00),
(6, 'DT05', 18000000.00, 20, 1000000.00),
(7, 'TP03', 3000.00, 200, 0.00),
(8, 'DT04', 20000000.00, 2, 1000000.00),
(9, 'DC01', 48000.00, 1000, 0.00),
(9, 'DC02', 2000.00, 1000, 0.00),
(9, 'DC03', 7500.00, 1000, 0.00);

-----------------------------------------------------------
-- Modify DienThoai Column to VARCHAR(11)
ALTER TABLE `KHACHHANG`
MODIFY COLUMN `DienThoai` VARCHAR(11);

-- Add Constraint checking if column DienThoai's value start with '0' 
ALTER TABLE `KHACHHANG`
ADD CONSTRAINT `DienThoai` CHECK (`DienThoai` LIKE '0%'); 

-- Remove the Constraint CHECK for DienThoai Column
ALTER TABLE `KHACHHANG`
DROP CHECK `DienThoai`;

-----------------------------------------------------------
-- List TenCongTy of NHACUNGCAP
SELECT `TenCongTy` 
FROM `NHACUNGCAP`;

-- Query: MaHang, TenHang, Soluong 
-- TABLE: MATHANG | Condition: SoLuong > 10 AND DonViTinh = 'Cái'
SELECT `MaHang`, `TenHang`, `SoLuong`
FROM `MATHANG`
WHERE `SoLuong` > 10 AND `DonViTinh` = 'Cái';

-- Query: HoTen which concatenates from (Ho, Ten), DiaChi, NamLamViec which extracts from (NgayLamViec)
-- TABLE NHANVIEN
SELECT CONCAT(`Ho`, ' ', `Ten`) as HoTen, `DiaChi`, YEAR(`NgayLamViec`) as NamLamViec 
FROM `NHANVIEN`;

-- Query: MaHang, TenHang
-- TABLE MATHANG | Condition: GiaHang > 100000 AND SoLuong < 50
SELECT `MaHang`, `TenHang`
FROM `MATHANG`
WHERE `GiaHang` > 100000 AND `SoLuong` < 50;
