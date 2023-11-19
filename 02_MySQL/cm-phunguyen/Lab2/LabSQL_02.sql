USE QLBH;

---- Câu 1 ----
SELECT TenHang
FROM MATHANG m JOIN NHACUNGCAP n ON m.MaCongTy = n.MaCongTy
WHERE n.TenCongTy = 'Công ty may mặc Việt Tiến';


---- Câu 2 ----
SELECT DISTINCT n.TenCongTy, n.DiaChi, m.MaLoaiHang
FROM MATHANG m JOIN NHACUNGCAP n ON m.MaCongTy = n.MaCongTy JOIN LOAIHANG l ON l.MaLoaiHang = m.MaLoaiHang WHERE l.TenLoaiHang = 'Thực phẩm';

---- Câu 3 ----
SELECT DISTINCT k.TenGiaoDich
FROM KHACHHANG k JOIN DONDATHANG d ON k.MaKhachHang = d.MaKhachHang JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon JOIN MATHANG m ON c.MaHang = m.MaHang
WHERE m.TenHang LIKE '%Sữa%' AND m.DonViTinh = 'Hộp';

---- Câu 4 ----
SELECT k.MaKhachHang, k.TenCongTy, d.MaNhanVien, d.NgayDatHang, d.NoiGiaoHang
FROM DONDATHANG d JOIN KHACHHANG k ON d.MaKhachHang = k.MaKhachHang
WHERE d.SoHoaDon = 1;

---- Câu 5 ----
SELECT Ho, Ten,(LuongCoBan + IFNULL(PhuCap,0)) AS Luong
FROM NHANVIEN ;

---- Câu 6 ----
SELECT m.TenHang, c.SoLuong*(c.giaban - c.mucgiam) as TienPhaiTra
FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon JOIN MATHANG m ON c.MaHang = m.MaHang
WHERE d.SoHoaDon = 3;


---- Câu 7 ----
SELECT k.TenCongTy, k.TenGiaoDich
FROM KHACHHANG k JOIN NHACUNGCAP n ON k.TenGiaoDich = n.TenGiaoDich	
    

---- Câu 8 ----
SELECT MaNhanVien, CONCAT(Ho, '', Ten) AS HoTen FROM NHANVIEN WHERE DAY(NgaySinh) IN(
SELECT DAY(NgaySinh) FROM NHANVIEN GROUP BY DAY(NgaySinh) HAVING count(MaNhanVien) >1);

---- Câu 9 ----
SELECT k.TenCongTy, d.*
FROM KHACHHANG k JOIN DONDATHANG d ON k.MaKhachHang = d.MaKhachHang
WHERE k.DiaChi = d.NoiGiaoHang;

---- Câu 10 ----
SELECT m.*
FROM MATHANG m LEFT JOIN CHITIETDATHANG c ON m.MaHang = c.MaHang
WHERE c.SoHoaDon IS NULL ;

---- Câu 11 ----
SELECT n.*
FROM NHANVIEN n LEFT JOIN DONDATHANG d ON n.MaNhanVien = d.MaNhanVien			
WHERE d.MaNhanVien IS NULL;

---- Câu 12 ----
SELECT * 
FROM NHANVIEN n
WHERE n.LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);

---- Câu 13 ----
SELECT c.SoHoaDon, SUM((c.SoLuong*(c.giaban - c.mucgiam))) as TienPhaiTra, k.TenCongTy as KhachHang
FROM CHITIETDATHANG c 
JOIN DONDATHANG d ON c.SoHoaDon = d.SoHoaDon
JOIN KHACHHANG k ON d.SoHoaDon = k.SoHoaDon
GROUP BY c.SoHoaDon;    

---- Câu 14 ----
SELECT c.MaHang
FROM DONDATHANG d JOIN CHITIETDATHANG c on d.SoHoaDon = c.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007 
GROUP BY c.MaHang
HAVING COUNT(d.SoHoaDon) = 1;

---- Câu 15 ----
SELECT d.MaKhachHang, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTra
FROM CHITIETDATHANG c JOIN DONDATHANG d ON c.SoHoaDon = d.SoHoaDon 
GROUP BY d.MaKhachHang;

---- Câu 16 ----
SELECT n.MaNhanVien, n.Ho, n.Ten , COUNT(SoHoaDon) AS SoDonDaLap
FROM NHANVIEN n LEFT JOIN DONDATHANG d ON n.MaNhanVien = d.MaNhanVien
GROUP BY n.MaNhanVien;

---- Câu 17 ----
SELECT YEAR(d.NgayDatHang) AS Nam, MONTH(d.NgayDatHang) AS Thang, SUM(((c.SoLuong * c.GiaBan) - (c.SoLuong * c.MucGiamGia))) AS TongSoTien
FROM NHACUNGCAP n JOIN MATHANG m ON n.MaCongTy = m.MaCongTy JOIN CHITIETDATHANG c ON c.MaHang = m.MaHang JOIN DONDATHANG d ON d.SoHoaDon = c.SoHoaDon
WHERE Nam = 2007
GROUP BY MONTH(d.NgayDatHang) ;

---- Câu 18 ----
SELECT n.MaCongTy, n.TenCongTy, SUM(c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) - SUM(m.GiaHang * c.SoLuong ) as TongTienHangThuDuoc
FROM NHACUNGCAP n JOIN MATHANG m ON n.MaCongTy = m.MaCongTy JOIN CHITIETDATHANG c ON m.MaHang = c.MaHang JOIN DONDATHANG d ON c.SoHoaDon = d.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY n.MaCongTy;

---- Câu 19 ----
SELECT m.MaHang, m.TenHang,SUM(m.SoLuong) - SUM(c.SoLuong) AS TongSoHangHienCo, SUM(c.SoLuong) AS TongSoHangDaBan
FROM MATHANG m JOIN CHITIETDATHANG c ON c.MaHang = m.MaHang 
GROUP BY m.MaHang;

---- Câu 20 ----
WITH SOLUONGHANGHOA AS (
	SELECT SUM(c.SoLuong) AS TongSoLuongTheoNhanVien	
	FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon JOIN NHANVIEN n ON d.MaNhanVien = n.MaNhanVien
    GROUP BY d.MaNhanVien
) 

SELECT n.MaNhanVien,n.Ho,n.Ten, SUM(c.SoLuong) AS SoLuongNhieuNhat
FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon JOIN NHANVIEN n ON d.MaNhanVien = n.MaNhanVien
GROUP BY n.MaNhanVien,n.Ho,n.Ten
HAVING SoLuongNhieuNhat >= ALL(SELECT TongSoLuongTheoNhanVien FROM SOLUONGHANGHOA)


---- Câu 21 ----
WITH SOLUONGHANGHOA AS (
	SELECT SUM(SoLuong) AS SoLuongNhoNhat	
	FROM CHITIETDATHANG 
    GROUP BY SoHoaDon
) 

SELECT SoHoaDon, SUM(SoLuong) AS total
FROM CHITIETDATHANG
GROUP BY SoHoaDon
HAVING total <= ALL(SELECT SoLuongNhoNhat FROM SOLUONGHANGHOA)

---- Câu 22 ----
SELECT SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTraNhieuNhat
FROM CHITIETDATHANG c
GROUP BY c.SoHoaDon
ORDER BY TienPhaiTraNhieuNhat DESC
LIMIT 1;

---- Câu 23 ----
SELECT c.SoHoaDon, GROUP_CONCAT(m.TenHang SEPARATOR ' , ') AS CacMatHangDatMua, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) AS TongTienDonHang
FROM CHITIETDATHANG c JOIN MATHANG m ON c.MaHang = m.MaHang
GROUP BY c.SoHoaDon;

---- Câu 24 ----
SELECT m.MaCongTy, m.MaHang, SUM(m.SoLuong) AS TongSoLuong, T.TongSoLuongSanPhamTrongCongTy
FROM MATHANG m JOIN (SELECT m.MaCongTy, SUM(m.SoLuong) AS TongSoLuongSanPhamTrongCongTy FROM MATHANG m GROUP BY m.MaCongTy ) AS T ON m.MaCongTy = T.MaCongTy
GROUP BY m.MaCongTy,m.MaHang;

---- Câu 25 ----
SELECT c.MaHang, m.TenHang, 
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 1 THEN c.SoLuong END), 0) Thang_1,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 2 THEN c.SoLuong END), 0) Thang_2,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 3 THEN c.SoLuong END), 0) Thang_3,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 4 THEN c.SoLuong END), 0) Thang_4,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 5 THEN c.SoLuong END), 0) Thang_5,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 6 THEN c.SoLuong END), 0) Thang_6,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 7 THEN c.SoLuong END), 0) Thang_7,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 8 THEN c.SoLuong END), 0) Thang_8,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 9 THEN c.SoLuong END), 0) Thang_9,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 10 THEN c.SoLuong END), 0) Thang_10,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 11 THEN c.SoLxuong END), 0) Thang_11,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 12 THEN c.SoLuong END), 0) Thang_12,
 SUM(c.SoLuong) Nam_2007
FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN MATHANG m ON d.SoHoaDon = c.SoHoaDon AND c.MaHang = m.MaHang
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY c.MaHang;


---- Câu 26 ----
UPDATE DONDATHANG
SET NgayChuyenHang = NgayDatHang
WHERE NgayChuyenHang IS NULL;

---- Câu 27 ----
UPDATE MATHANG
JOIN NHACUNGCAP using(MaCongTy)
SET SoLuong = SoLuong *2
WHERE TenCongTy = 'VINAMILK';

---- Câu 28 ----
UPDATE DONDATHANG D
JOIN KHACHHANG K ON D.MaKhachHang = K.MaKhachHang
SET D.NoiGiaoHang = K.DiaChi
WHERE D.NoiGiaoHang IS NULL;

---- Câu 29 ----
UPDATE KHACHHANG K
JOIN NHACUNGCAP N ON K.TenCongTy = N.TenCongTy
SET K.DiaChi = N.DiaChi, K.DienThoai = N.DienThoai, K.Fax = N.Fax, K.Email = N.Email
WHERE K.TenGiaoDich = N.TenGiaoDich;

---- Câu 30 ----
UPDATE NHANVIEN N
JOIN (
    SELECT D.MaNhanVien,SUM(C.SoLuong)
    FROM DONDATHANG D
    JOIN CHITIETDATHANG C ON D.SoHoaDon = C.SoHoaDon
    WHERE YEAR(D.NgayChuyenHang) = 2003
	GROUP BY C.SoHoaDon
    HAVING SUM(C.SoLuong) > 100 
) Subquery ON N.MaNhanVien = Subquery.MaNhanVien 
SET N.LuongCoBan = N.LuongCoBan * 1.5;


---- Câu 31 ----
UPDATE NHANVIEN N
JOIN (
    SELECT D.MaNhanVien,SUM(C.SoLuong) 
    FROM DONDATHANG D
    JOIN CHITIETDATHANG C ON D.SoHoaDon = C.SoHoaDon
	GROUP BY C.SoHoaDon
    HAVING SUM(C.SoLuong) >= ALL(
    SELECT SUM(C.SoLuong)
    FROM DONDATHANG D
    JOIN CHITIETDATHANG C ON D.SoHoaDon = C.SoHoaDon
	GROUP BY C.SoHoaDon )
) Subquery ON N.MaNhanVien = Subquery.MaNhanVien 
SET N.PhuCap = 1/2 * N.LuongCoBan;

---- Câu 32 ----
UPDATE NHANVIEN N
LEFT JOIN (
    SELECT DISTINCT DDH.MaNhanVien
    FROM DONDATHANG DDH
    WHERE YEAR(DDH.NgayDatHang) = 2003
    ) AS NV_2023 ON N.MaNhanVien = NV_2023.MaNhanVien
SET N.LuongCoBan = N.LuongCoBan * 0.75
WHERE NV_2023.MaNhanVien IS NULL;	

---- Câu 33 ----
ALTER TABLE DONDATHANG
ADD SoTien NUMERIC(38,2);

UPDATE DONDATHANG d JOIN (SELECT c.SoHoaDon, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTra
 FROM CHITIETDATHANG c 
 GROUP BY c.SoHoaDon) AS T ON d.SoHoaDon = T.SoHoaDon
SET d.SoTien = T.TienPhaiTra;

---- Câu 34 ----
DELETE FROM NHANVIEN
WHERE TIMESTAMPDIFF(YEAR, ngaylamviec, NOW()) > 40; ;

---- Câu 35 ----
DELETE FROM DONDATHANG
WHERE YEAR(NgayDatHang) < 2000;

---- Câu 36 ----
DELETE L
FROM LOAIHANG L
LEFT JOIN MATHANG M ON L.MaLoaiHang = M.MaLoaiHang
WHERE M.MaLoaiHang IS NULL;

---- Câu 37 ----
DELETE K
FROM KHACHHANG K
LEFT JOIN DONDATHANG M ON K.MaKhachHang = M.MaKhachHang
WHERE M.SoHoaDon IS NULL;


---- Câu 38 ----
DELETE M
FROM MATHANG M
LEFT JOIN CHITIETDATHANG C ON M.MaHang = C.MaHang
WHERE M.SoLuong = 0 AND C.SoHoaDon IS NULL;


---- Câu 39 ----
SELECT K.MaKhachHang,K.TenCongTy, K.TenGiaoDich,K.DiaChi, K.Email, K.DienThoai, K.Fax
FROM KHACHHANG K
JOIN DONDATHANG D
	ON K.MaKhachHang = D.MaKhachHang
JOIN CHITIETDATHANG C
	ON D.SoHoaDon = C.SoHoaDon
JOIN MATHANG M
	ON C.MaHang = M.MaHang
GROUP BY K.MaKhachHang
HAVING COUNT(DISTINCT CASE WHEN C.MaHang = 'TP07' THEN 1 END) =  1  
	AND COUNT(CASE WHEN C.MaHang = 'TP07' THEN NULL ELSE 1 END)  =  0;

---- Câu 40 ----
SELECT K.MaKhachHang,K.TenCongTy, K.TenGiaoDich,K.DiaChi, K.Email, K.DienThoai, K.Fax
FROM KHACHHANG K
JOIN DONDATHANG D
	ON K.MaKhachHang = D.MaKhachHang
JOIN CHITIETDATHANG C
	ON D.SoHoaDon = C.SoHoaDon
JOIN MATHANG M
	ON C.MaHang = M.MaHang
GROUP BY K.MaKhachHang
HAVING COUNT(DISTINCT CASE WHEN C.MaHang = 'TP07' THEN 1 END) = 1 
	AND COUNT(DISTINCT CASE WHEN C.MaHang = 'MM01' THEN 1 END) =  0  
    AND COUNT(DISTINCT C.MaHang) >=2 ;

---- Câu 41 ----
SELECT D.SoHoaDon
FROM KHACHHANG K
JOIN DONDATHANG D
	ON K.MaKhachHang = D.MaKhachHang
JOIN CHITIETDATHANG C
	ON D.SoHoaDon = C.SoHoaDon
JOIN MATHANG M
	ON C.MaHang = M.MaHang
GROUP BY D.SoHoaDon
HAVING COUNT(DISTINCT CASE WHEN C.MaHang IN ('DT01','DT02','DT03','DT04') THEN 1 END) = 4 
	AND COUNT(DISTINCT CASE WHEN C.MaHang IN ('DC01','TP03') THEN 1 END) = 0 

    



