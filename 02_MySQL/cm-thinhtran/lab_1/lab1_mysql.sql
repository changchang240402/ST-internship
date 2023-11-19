use qlbh;

-- -------------------------------	CREATE  -------------------------------

create table NHACUNGCAP(
 MaCongTy char(3) primary key,
 TenCongTy varchar(50),
 TenGiaoDich varchar(20),
 DiaChi varchar(50),
 DienThoai varchar(15),
 Fax varchar(15),
 Email varchar(30)
);

create table LOAIHANG(
 MaLoaiHang char(2) primary key,
 TenLoaiHang varchar(30)
);

create table MATHANG(
 MaHang char(4) primary key,
 TenHang varchar(30),
 MaCongTy char(3),
 MaLoaiHang char(2),
 SoLuong int,
 DonViTinh varchar(10),
 GiaHang decimal(10,2),
 foreign key (MaLoaiHang) references LOAIHANG(MaLoaiHang),
 foreign key (MaCongTy) references NHACUNGCAP(MaCongTy)
);

create table KHACHHANG(
 MaKhachHang int primary key,
 TenCongTy varchar(50),
 TenGiaoDich varchar(20),
 DiaChi varchar(50),
 Email varchar(30),
 DienThoai varchar(15),
 Fax varchar(15)
);

create table NHANVIEN(
 MaNhanVien char(4) primary key,
 Ho varchar(40),
 Ten varchar(10),
 NgaySinh timestamp null default null,
 NgayLamViec timestamp null default null,
 DiaChi varchar(60),
 DienThoai varchar(15),
 LuongCoBan decimal(10,2),
 PhuCap decimal(10,2)
);

create table DONDATHANG(
 SoHoaDon int primary key not null,
 MaKhachHang int,
 MaNhanVien char(4),
 NgayDatHang timestamp null default null,
 NgayGiaoHang timestamp null default null, 
 NgayChuyenHang timestamp null default null,
 NoiGiaoHang varchar(80),
 foreign key (MaKhachHang) references KHACHHANG(MaKhachHang),
 foreign key (MaNhanVien) references NHANVIEN(MaNhanVien)
);

create table CHITIETDATHANG(
 SoHoaDon int not null,
 MaHang char(4) not null ,
 GiaBan decimal(10,2),
 SoLuong int,
 MucGiamGia decimal(10,2),
 primary key (SoHoaDon,MaHang),
 foreign key (SoHoaDon) references DONDATHANG(SoHoaDon),
 foreign key (MaHang) REFERENCES MATHANG(MaHang)
);

-- -------------------------------	INSERT  -------------------------------

insert into KHACHHANG(MaKhachHang, TenCongTy, TenGiaoDich, DiaChi, Email, DienThoai, Fax)
values
 (1, 'Công ty sữa Việt Nam', 'VINAMILK','Hà Nội', 'vinamilk@vietnam.com', '04-891135',''),
 (2, 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', 'viettien@vietnam.com', '08-808803',''),
 (3, 'tổng công ty thực phẩm dinh dưỡng NUTIFOOD', 'NUTIFOOD', 'Sài Gòn', 'nutifood@vietnam.com', '08-809890',''),
 (4, 'Công ty điện máy Hà Nội', 'MACHANOI', 'Hà Nội', 'machanoi@vietnam.com', '04-898399',''),
 (5, 'Hãng hàng không Vietnam Airlines', 'VIETNAMAIRLINE', 'Sài Gòn', 'vietnamairline@vietnam.com', '08-888888',''),
 (6, 'Công ty dụng cụ học sinh MIC', 'MIC', 'Hà Nội', 'mic@vietnam.com', '04-804408','');
insert into NHACUNGCAP (MaCongTy, TenCongTy, TenGiaoDich, DiaChi, DienThoai, Fax, Email)
values
 ('DAF', 'Nội Thất Đài Loan Dafuco', 'DAFUCO', 'Quy Nhơn', '056-888111','' ,'dafuco@vietnam.com'),
 ('DQV', 'Công ty máy tính Quang Vũ', 'QUANGVU', 'Quy Nhơn', '056-888777','', 'quangvu@vietnam.com'),
 ('GOL', 'Công ty sản xuất dụng cụ học sinh Golden', 'GOLDEn', 'Quy Nhơn', '056-891135','' ,'golden@vietnam.com'),
 ('MVT', 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', '08-808803','' ,'viettien@vietnam.com'),
 ('SCM', 'Siêu thị Coop-mart', 'COOPMART', 'Quy Nhơn', '056-888666', '','coopmart@vietnam.com'),
 ('VNM', 'Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', '04-891135','' ,'vinamilk@vietnam.com');
    
insert into LOAIHANG(MaLoaiHang,TenLoaiHang)
values
 ('DC', 'Dụng cụ học tập'),
 ('DT', 'Điện tử'),
 ('MM', 'May mặc'),
 ('NT', 'Nội thất'),
 ('TP', 'Thực phẩm');
    
insert into MATHANG(MaHang, TenHang, MaCongTy, MaLoaiHang, SoLuong, DonViTinh, GiaHang)
values
 ('DC01','Vở học sinh cao cấp', 'GOL','DC',20000,'Ram',48000.00),
 ('DC02','Viết bi học sinh', 'GOL','DC',2000,'Cây',2000.00),
 ('DC03','Hộp màu tô', 'GOL','DC',2000,'Hộp',7500.00),
 ('DC04','Viết mực cao cấp', 'GOL','DC',2000,'Cây',20000.00),
 ('DC05','Viết chì 2B', 'GOL','DC',2000,'Cây',3000.00),
 ('DC06','Viết chì 4B', 'GOL','DC',2000,'Cây',6000.00),
 ('DT01','LCD Nec', 'DQV','DT',10,'Cái',3100000.00),
 ('DT02','Ổ cứng 80GB', 'DQV','DT',20,'Cái',800000.00),
 ('DT03','Bàn phím Mitsumi', 'DQV','DT',20,'Cái',150000.00),
 ('DT04','Tivi LCD', 'DQV','DT',10,'Cái',20000000.00),
 ('DT05','Máy tính xách tay NEC', 'DQV','DT',60,'Cái',18000000.00),
 ('MM01','Đồng phục công sở nữ', 'MVT','MM',140,'Bộ',340000.00),
 ('MM02','Veston nam', 'MVT','MM',30,'Bộ',500000.00),
 ('MM03','Áo sơ mi nam', 'MVT','MM',20,'Cái',75000.00),
 ('NT01','Bàn ghế ă', 'DAF','NT',20,'Bộ',1000000.00),
 ('NT02','Bàn ghế Salo', 'DAF','NT',20,'Bộ',150000.00),
 ('TP01','Sữa hộp XYZ', 'VNM','TP',10,'Hộp',4000.00),
 ('TP02','Sữa XO', 'VNM','TP',12,'Hộp',180000.00),
 ('TP03','Sữa tươi Vinamilk không đường','VNM','TP',5000,'Hộp',3500.00),
 ('TP04','Táo','SCM','TP',12,'Ký',12000.00),
 ('TP05','Cà chua','SCM','TP',15,'Ký',5000.00),
 ('TP06','Bánh AFC','SCM','TP',100,'Hộp',3000.00),
 ('TP07','Mì tôm A-One','SCM','TP',150,'Thùng',40000.00);
    
insert into NHANVIEN(MaNhanVien, Ho ,Ten, NgaySinh, NgayLamViec, DiaChi, DienThoai, LuongCoBan, PhuCap)
values
 ('A001', 'Đậu Tố', 'Anh', '1986-03-07 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-647995', '10000000.00', '1000000.00'),
 ('D001', 'Nguyễn Minh', 'Đăng', '1987-12-29 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '0905-779919', '14000000.00', '0.00'),
 ('H001', 'Lê Thị Bích', 'Hoa', '1986-05-20 00:00:00', '2009-03-01 00:00:00', 'An Khê', '', '9000000.00', '1000000.00'),
 ('H002', 'Ông Hoàng', 'Hải', '1987-08-11 00:00:00', '2009-03-01 00:00:00', 'Đà Nẵng', '0905-611725', '12000000.00', '0.00'),
 ('H003', 'Trần Nguyễn Đức', 'Hoàng', '1986-04-09 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '', '11000000.00', '0.00'),
 ('M001', 'Hồ Thị Phương', 'Mai', '1987-09-14 00:00:00', '2009-03-01 00:00:00', 'Tây Sơn', '', '9000000.00', '500000.00'),
 ('P001', 'Nguyễn Hoài', 'Phong', '1986-06-14 00:00:00', '2009-03-01 00:00:00', 'Quy Nhơn', '056-891135', '13000000.00', '0.00'),
 ('Q001', 'Trương Thị Thế', 'Quang', '1987-06-17 00:00:00', '2009-03-01 00:00:00', 'Ayunpa', '0979-792176', '10000000.00', '500000.00'),
 ('T001', 'Nguyễn Đức', 'Thắng', '1984-09-13 00:00:00', '2009-03-01 00:00:00', 'Phù Mỹ', '0955-593893', '1200000.00', '0.00');
    
insert into DONDATHANG(SoHoaDon, MaKhachHang, MaNhanVien, NgayDatHang, NgayGiaoHang, NgayChuyenHang, NoiGiaoHang )
values
(1, 1, 'A001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Hà Nội'),
(2, 1, 'H001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Hà Nội'),
(3, 1, 'H002', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Sài Gòn'),
(4, 1, 'H003', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Sài Gòn'),
(5, 1, 'P001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Hà Nội'),
(6, 1, 'D001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Hà Nội'),
(7, 1, 'M001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Hà Nội'),
(8, 1, 'Q001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Sài Gòn'),
(9, 1, 'T001', '2007-09-20 00:00:00', '2007-10-20 00:00:00','2007-10-20 00:00:00', 'Sài Gòn');
    
insert into CHITIETDATHANG(SoHoaDon, MaHang, GiaBan, SoLuong, MucGiamGia)
values
 (1,'TP01', '4000.00', 5, 0.00),
 (1,'TP02', '180000.00', 5, 5000.00),
 (1,'TP03', '12000.00', 5, 0.00),
 (1,'TP06', '3000.00', 50, 0.00),
 (1,'TP07', '4000.00', 100, 0.00),
 (2,'MM01', '340000.00', 30, 10000.00),
 (2,'MM02', '500000.00', 20, 20000.00),
 (3,'MM01', '340000.00', 30, 10000.00),
 (3,'MM02', '500000.00', 30, 20000.00),
 (4,'MM01', '340000.00', 80, 10000.00),
 (5,'TP03', '3000.00', 1000, 10000.00),
 (6,'DT01', '3100000.00', 2, 100000.00),
 (6,'DT05', '18000000.00', 20, 1000000.00),
 (7,'TP03', '3000.00', 200, 0.00),
 (8,'DT04', '20000000.00', 2, 1000000.00),
 (9,'DC01', '48000.00', 1000, 0.00),
 (9,'DC02', '2000.00', 1000, 0.00),
 (9,'DC03', '7500.00', 1000, 0.00);
    
    
-- -------------------------------	Câu 16 -------------------------------
alter table KHACHHANG
modify column DienThoai varchar(11);

-- -------------------------------	Câu 17 -------------------------------
alter table KHACHHANG 
add constraint KHACHHANG_CHECK_DIENTHOAI check(DienThoai like "0%");

-- -------------------------------	Câu 18 -------------------------------
alter table KHACHHANG drop check KHACHHANG_CHECK_DIENTHOAI;

-- -------------------------------	Câu 19 -------------------------------
select TenCongTy from NHACUNGCAP;

-- -------------------------------	Câu 20 -------------------------------
select MaHang, TenHang, SoLuong
from MATHANG
where SoLuong > 10 and DonViTinh = 'Cái';

-- -------------------------------	Câu 21 -------------------------------
select Ho, Ten, DiaChi, year(NgayLamViec) as NamBatDauLamViec
from NHANVIEN;

-- -------------------------------	Câu 22 -------------------------------
select MaHang, TenHang
from MATHANG
where SoLuong < 50 and GiaHang > 100000
   