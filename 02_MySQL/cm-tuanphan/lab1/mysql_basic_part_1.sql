SET sql_mode = '';

CREATE TABLE LOAIHANG (
    MaLoaiHang char(2) PRIMARY KEY,
    TenLoaiHang varchar(30)
);

CREATE TABLE NHACUNGCAP (
    MaCongTy char(3) PRIMARY KEY,
    TenCongTy varchar(50),
    TenGiaoDich varchar(20),
    DiaChi varchar(50),
    DienThoai varchar(15),
    Fax varchar(15),
    Email varchar(30)
);

CREATE TABLE KHACHHANG (
    MaKhachHang int PRIMARY KEY AUTO_INCREMENT,
    TenCongTy varchar(50),
    TenGiaoDich varchar(20),
    DiaChi varchar(50),
    Email varchar(30),
    DienThoai varchar(15),
    Fax varchar(15)
);

CREATE TABLE NHANVIEN (
    MaNhanVien char(4) PRIMARY KEY,
    Ho varchar(40),
    Ten varchar(10),
    NgaySinh timestamp,
    NgayLamViec timestamp,
    DiaChi varchar(60),
    DienThoai varchar(15),
    LuongCoBan decimal(10,2),
    PhuCap decimal(10,2)
);

CREATE TABLE MATHANG (
    MaHang char(4) PRIMARY KEY, 
    TenHang varchar(30),
    MaCongTy char(3),
    MaLoaiHang char(2),
    SoLuong int,
    DonViTinh varchar(10),
    GiaHang decimal(10,2),
    FOREIGN KEY (MaLoaiHang) REFERENCES LOAIHANG(MaLoaiHang),
    FOREIGN KEY (MaCongTy) REFERENCES NHACUNGCAP(MaCongTy)
);

CREATE TABLE DONDATHANG (
    SoHoaDon int PRIMARY KEY AUTO_INCREMENT,
    MaKhachHang int,
    MaNhanVien char(4),
    NgayDatHang timestamp,
    NgayGiaoHang timestamp,
    NgayChuyenHang timestamp,
    NoiGiaoHang varchar(80),
    FOREIGN KEY (MaKhachHang) REFERENCES KHACHHANG(MaKhachHang),
    FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
);

CREATE TABLE CHITIETDATHANG (
    SoHoaDon int,
    MaHang char(4),
    GiaBan decimal(10,2),
    SoLuong int,
    MucGiamGia decimal(10,2),
    FOREIGN KEY (SoHoaDon) REFERENCES DONDATHANG(SoHoaDon),
    FOREIGN KEY (MaHang) REFERENCES MATHANG(MaHang)
);

INSERT INTO KHACHHANG (TenCongTy, TenGiaoDich, DiaChi, Email, DienThoai, Fax)
VALUES
    ('Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', 'vinamilk@vietnam.com', '04-891135', ''),
    ('Công ty may mặc Việt Tiên', 'VIETTIEN', 'Sài Gòn', 'viettien@vietnam.com', '08-808803', ''),
    ('Tổng Công ty thực phẩm dinh dưỡng NUTRIFOOD', 'NUTRIFOOD', 'Sài Gòn', 'nutrifood@vietnam.com', '08-809890', ''),
    ('Công ty điện máy Hà Nội', 'MACHANOI', 'Hà Nội', 'machanoi@vietnam.com', '04-898399', ''),
    ('Hãng hàng không Việt...', 'VIETNAMAIRLINES', 'Sài...', 'vietnamairlines@vietnam.com', '08-888888', ''),
    ('Công ty dụng cụ học sinh MIC', 'MIC', 'Hà Nội', 'mic@vietnam.com', '04-804408', '');

-- Add data table NHACUNGCAP	
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('DAF', 'Nội Thất Đài Loan Dafuco', 'DAFUCO', 'Quy Nhơn', '056-888111', '', 'dafuco@vietnam.com');
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('DQV', 'Công ty máy tính Quang Vũ', 'QUANGVU', 'Quy Nhơn', '056-888777', '', 'quangvu@vietnam.com');
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('GOL', 'Công ty sản xuất dụng cụ học sinh Golden', 'GOLDEN', 'Quy Nhơn', '056-891135','', 'golden@vietnam.com');
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('MVT', 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', '08-808803', '', 'vietien@vietnam.com');
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('SCM', 'Siêu thị Coop-mart', 'COOPMART', 'Quy Nhơn', '056-888666', '', 'coopmart@vietnam.com');
INSERT INTO NHACUNGCAP (`MaCongTy`, `TenCongTy`, `TenGiaoDich`, `DiaChi`, `DienThoai`, `Fax`, `Email`) VALUES ('VNM', 'Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', '04-891135', '', 'vinamilk@vietnam.com');
	
		
-- Add data table LOAIHANG
INSERT INTO LOAIHANG (`MaLoaiHang`, `TenLoaiHang`) VALUES ('DC', 'Dụng cụ học tập');
INSERT INTO LOAIHANG (`MaLoaiHang`, `TenLoaiHang`) VALUES ('DT', 'Điện tử');
INSERT INTO LOAIHANG (`MaLoaiHang`, `TenLoaiHang`) VALUES ('MM', 'May mặc');
INSERT INTO LOAIHANG (`MaLoaiHang`, `TenLoaiHang`) VALUES ('NT', 'Nội thất');
INSERT INTO LOAIHANG (`MaLoaiHang`, `TenLoaiHang`) VALUES ('TP', 'Thực phẩm');

-- Add data table MATHANG
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC01', 'Vở học sinh cao cấp', 'GOL', 'DC', '20000', 'Ram', '48000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC02', 'Viết bi học sinh', 'GOL', 'DC', '2000', 'Cây', '2000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC03', 'Hộp màu tô', 'GOL', 'DC', '2000', 'Hộp', '7500.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC04', 'Viết mực cao cấp', 'GOL', 'DC', '2000', 'Cây', '20000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC05', 'Viết chì 2B', 'GOL', 'DC', '2000', 'Cây', '3000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DC06', 'Viết chì 4B', 'GOL', 'DC', '2000', 'Cây', '6000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DT01', 'LCD Nec', 'DQV', 'DT', '10', 'Cái', '3100000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DT02', 'Ổ cứng 80GB', 'DQV', 'DT', '20', 'Cái', '800000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DT03', 'Bàn phím Mitsumi', 'DQV', 'DT', '20', 'Cái', '150000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DT04', 'Tivi LCD', 'DQV', 'DT', '10', 'Cái', '20000000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('DT05', 'Máy tính xách tay NEC', 'DQV', 'DT', '60', 'Cái', '18000000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('MM01', 'Đồng phục công sở nữ', 'MVT', 'MM', '140', 'Bộ', '340000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('MM02', 'Veston nam', 'MVT', 'MM', '30', 'Bộ', '500000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('MM03', 'Áo sơ mi nam', 'MVT', 'MM', '20', 'Cái', '75000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('NT01', 'Bàn ghế ă', 'DAF', 'NT', '20', 'Bộ', '1000000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('NT02', 'Bàn ghế Salo', 'DAF', 'NT', '20', 'Bộ', '150000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP01', 'Sửa hộp XYZ', 'VNM', 'TP', '10', 'Hộp', '4000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP02', 'Sửa XO', 'VNM', 'TP', '12', 'Hộp', '180000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP03', 'Sửa tươi Vinamilk không đường', 'VNM', 'TP', '5000', 'Hộp', '3500.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP04', 'Táo', 'SCM', 'TP', '12', 'Ký', '12000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP05', 'Cà chua', 'SCM', 'TP', '15', 'Ký', '5000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP06', 'Bánh AFC', 'SCM', 'TP', '100', 'Hộp', '3000.00');
INSERT INTO MATHANG (`MaHang`, `TenHang`, `MaCongTy`, `MaLoaiHang`, `SoLuong`, `DonViTinh`, `GiaHang`) VALUES ('TP07', 'Mì tôm A-One', 'SCM', 'TP', '150', 'Thùng', '40000.00');


-- Add data table NHANVIEN

INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('A001', 'Đậu Tố', 'Anh', '1986-03-07 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-647995', '10000000.00', '1000000.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('D001', 'Nguyễn Minh', 'Đăng', '1987-12-29 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '0905-779919', '14000000.00', '0.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('H001', 'Lê Thị Bích', 'Hoa', '1986-05-20 00:00:00', '2009-03-01 00:00:00', 'An Khê', '', '9000000.00', '1000000.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('H002', 'Ông Hoàng', 'Hải', '1987-08-11 00:00:00', '2009-03-01 00:00:00', 'Đà Nẵng', '0905-611725', '12000000.00', '0.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('H003', 'Trần Nguyễn Đức', 'Hoàng', '1986-04-09 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '', '11000000.00', '0.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('M001', 'Hồ Thị Phương', 'Mai', '1987-09-14 00:00:00', '2009-03-01 00:00:00', 'Tây Sơn', '', '9000000.00', '500000.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('P001', 'Nguyễn Hoài', 'Phong', '1986-06-14 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-891135', '13000000.00', '500000.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('Q001', 'Trương Thị Thế', 'Quang', '1987-06-17 00:00:00', '2009-03-01 00:00:00', 'Ayunpa', '0979-792176', '10000000.00', '500000.00');
INSERT INTO NHANVIEN (`MaNhanVien`, `Ho`, `Ten`, `NgaySinh`, `NgayLamViec`, `DiaChi`, `DienThoai`, `LuongCoBan`, `PhuCap`) VALUES ('T001', 'Nguyễn Đức', 'Thắng', '1984-09-13 00:00:00', '2009-03-1 00:00:00', 'Phù Mỹ', '0955-593893', '1200000.00', '0.00');

-- Add data table DONDATHANG

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(1, 'A001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(1, 'H001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(2, 'H002', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(3, 'H003', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(4, 'P001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(5, 'D001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(6, 'M001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Hà Nội');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(2, 'Q001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn');

INSERT INTO DONDATHANG (MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang) VALUES
(3, 'T001', '2007-09-20 00:00:00', '2007-10-01 00:00:00', '2007-10-01 00:00:00', 'Sài Gòn');

-- ADD data table CHITIETDATHANG

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(3, 'MM02', 500000.00, 30, 10000.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(4, 'MM01', 340000.00, 80, 10000.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(5, 'TP03', 3000.00, 1000, 0.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(6, 'DT01', 3100000.00, 2, 100000.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(6, 'DT05', 18000000.00, 20, 10000000.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES 
(7, 'TP03', 3000.00, 200, 0.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(8, 'DT04', 20000000.00, 2, 1000000.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(9, 'DC01', 48000.00, 1000, 0.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(9, 'DC02', 2000.00, 1000, 0.00);

INSERT INTO CHITIETDATHANG (SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia) VALUES
(9, 'DC03', 7500.00, 1000, 0.00);


-- Change the data type of the DienThoai column in the KHACHHANG table to a string with a maximum length of 11 characters:
ALTER TABLE KHACHHANG
MODIFY COLUMN DienThoai varchar(11);

-- Add a constraint to allow only values in the DienThoai column that start with the digit 0
ALTER TABLE KHACHHANG
ADD CONSTRAINT CK_DienThoai_StartsWith0 CHECK (DienThoai LIKE '0%');

-- Remove the constraint you just created
ALTER TABLE KHACHHANG
DROP CONSTRAINT CK_DienThoai_StartsWith0;

-- Danh sách các đối tác cung cấp hàng cho công ty:
SELECT * FROM NHACUNGCAP;

-- Mã hàng, tên hàng và số lượng của các mặt hàng hiện có trong công ty có số lượng lớn hơn 10 Cái:
SELECT MaHang, TenHang, SoLuong
FROM MATHANG
WHERE SoLuong > 10 AND DonViTinh = "Cái";


-- Họ tên, địa chỉ và năm bắt đầu làm việc của các nhân viên trong công ty:
SELECT CONCAT(NHANVIEN.Ho, ' ', NHANVIEN.Ten) AS HoTen, DiaChi, YEAR(NgayLamViec) AS NamBatDauLamViec
FROM NHANVIEN;

-- Mã và tên của các mặt hàng có giá trị lớn hơn 100000 và số lượng hiện có ít hơn 50:
SELECT MaHang, TenHang
FROM MATHANG
WHERE GiaHang > 100000 AND SoLuong < 50;

