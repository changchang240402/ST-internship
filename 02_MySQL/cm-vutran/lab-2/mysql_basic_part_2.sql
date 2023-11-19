-- Cau 1: Công ty Việt Tiến đã cung cấp những mặt hàng nào? 
SELECT MH.TenHang 
FROM MATHANG MH JOIN NHACUNGCAP NCC ON NCC.MaCongTy = MH.MaCongTy WHERE NCC.TenCongTy LIKE "%Công ty % Việt Tiến%";

-- Cau 2: Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó? 
SELECT DISTINCT NCC.MaCongTy, NCC.TenCongTy, NCC.DiaChi FROM
NHACUNGCAP NCC JOIN MATHANG MH ON NCC.MaCongTy = MH.MaCongTy JOIN LOAIHANG LH ON LH.MaLoaiHang = MH.MaLoaiHang WHERE LH.TenLoaiHang = "Thực Phẩm";

-- Cau 3: Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
SELECT KH.TenGIaoDich FROM 
KHACHHANG KH JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon JOIN MATHANG MH ON MH.MaHang = CTDH.MaHang
WHERE MH.TenHang LIKE "%Sữa hộp%";

-- Cau 4: Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
SELECT KH.MaKhachHang, KH.Email ,NV.MaNhanVien, CONCAT(NV.Ho,' ',NV.Ten) AS HoTenNhanVien, DDH.NgayGiaoHang, DDH.NoiGiaoHang 
FROM DONDATHANG DDH JOIN KHACHHANG KH ON DDH.MaKhachHang = KH.MaKhachHang JOIN NHANVIEN NV ON NV.MaNhanVien = DDH.MaNhanVien WHERE DDH.SoHoaDon = 1 ;
-- Cau 5: Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)? 
SELECT MaNhanVien, CONCAT(Ho,' ',Ten) AS HoTen, (LuongCoBan + IFNULL(PhuCap, 0)) AS Luong 
FROM NHANVIEN;

-- Cau 6: Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng 
-- là bao nhiêu(số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
SELECT MH.TenHang, ((CTDH.SoLuong * CTDH.GiaBan) - (CTDH.SoLuong * CTDH.MucGiamGia)) AS SoTien 
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon JOIN MATHANG MH ON MH.MaHang = CTDH.MaHang
WHERE DDH.SoHoaDon = 3;

-- Cau 7: Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)? 
SELECT NCC.TenCongTy, NCC.TenGiaoDich 
FROM KHACHHANG KH JOIN NHACUNGCAP NCC ON KH.TenGiaoDich = NCC.TenGiaoDich ;

-- Cau 8: Trong công ty có những nhân viên nào có cùng ngày sinh? 
SELECT Date(NgaySinh) AS NS, GROUP_CONCAT(CONCAT (NV.Ho,' ',NV.Ten) SEPARATOR ', ') AS DanhSachNhanVien
FROM NHANVIEN NV GROUP BY NS HAVING COUNT(*) > 1;

-- Cau 9: Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào? 
SELECT DDH.SoHoaDon, KH.MaKhachHang, KH.TenCongTy 
FROM DONDATHANG DDH JOIN KHACHHANG KH ON DDH.MaKhachHang = KH.MaKhachHang WHERE DDH.NoiGiaoHang = KH.DiaChi;

-- Cau 10: Những mặt hàng nào chưa từng được khách hàng đặt mua? 
SELECT MH.MaHang, MH.TenHang 
FROM MATHANG MH LEFT JOIN CHITIETDATHANG CTDH ON MH.MaHang = CTDH.MaHang WHERE CTDH.MaHang IS NULL;

-- Cau 11: Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào? 
SELECT NV.MaNhanVien, CONCAT(NV.Ho,' ',NV.Ten) AS HoTen
FROM NHANVIEN NV LEFT JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien WHERE DDH.MaNhanVien IS NULL;

-- Cau 12: Những nhân viên nào của công ty có lương cơ bản cao nhất?
SELECT MaNhanVien, CONCAT(Ho,' ',Ten) AS HoTen 
FROM NHANVIEN WHERE LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);

-- Cau 13: Tổng số tiền mà khách hàng phải trả cho mỗi đơn đặt hàng là bao nhiêu? 
SELECT DDH.SoHoaDon,  SUM( CTDH.SoLuong *  (CTDH.GiaBan - CTDH.MucGiamGia) ) AS TongSoTien 
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
GROUP BY CTDH.SoHoaDon;

-- Cau 14: Trong năm 2007 những mặt hàng nào đặt mua đúng một lần? 
SELECT MH.MaHang, MH.TenHang 
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon JOIN MATHANG MH ON MH.MaHang = CTDH.MaHang
WHERE YEAR(DDH.NgayDatHang) = 2007 GROUP BY MH.MaHang HAVING COUNT(MH.MaHang) = 1;

-- Cau 15: Mỗi khách hàng đã bỏ ra bao nhiêu tiền để đặt mua hàng của công ty?
SELECT KH.MaKhachHang, KH.TenCongTy, SUM( CTDH.SoLuong *  (CTDH.GiaBan - CTDH.MucGiamGia) ) AS TongSoTien 
FROM KHACHHANG KH JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
GROUP BY KH.MaKhachHang;

-- Cau 16: Mỗi nhân viên của công ty đã lập bao nhiêu đơn đặt hàng (nếu chưa hề lập hóa đơn nào thì cho kết quả là 0)?
SELECT DDH.MaNhanVien, (IFNULL(COUNT(DDH.MaNhanVien), 0)) AS SoLanLapHoaDon 
FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien GROUP BY DDH.MaNhanVien;

-- Cau 17: Tổng số tiền hàng mà công ty thu được trong mỗi tháng của năm 2007 (thời gian được tính theo ngày đặt hàng)? 
SELECT YEAR(DDH.NgayDatHang) AS Nam, MONTH(DDH.NgayDatHang) AS Thang, SUM( CTDH.SoLuong *  (CTDH.GiaBan - CTDH.MucGiamGia) ) AS TongSoTien
FROM NHACUNGCAP NCC JOIN MATHANG MH ON NCC.MaCongTy = MH.MaCongTy JOIN CHITIETDATHANG CTDH ON CTDH.MaHang = MH.MaHang JOIN DONDATHANG DDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY MONTH(DDH.NgayDatHang) HAVING Nam = 2007;

-- Cau 18: Tổng số tiền lời mà công ty thu được từ mỗi mặt hàng trong năm 2007? 
SELECT MH.MaHang, MH.TenHang, SUM( CTDH.SoLuong *  (CTDH.GiaBan - CTDH.MucGiamGia) ) - SUM((CTDH.SoLuong * MH.GiaHang)) AS TongSoTien
FROM NHACUNGCAP NCC JOIN MATHANG MH ON NCC.MaCongTy = MH.MaCongTy JOIN CHITIETDATHANG CTDH ON CTDH.MaHang = MH.MaHang JOIN DONDATHANG DDH ON DDH.SoHoaDon = CTDH.SoHoaDon
WHERE YEAR(DDH.NgayDatHang) = 2007
GROUP BY MH.MaHang ;

-- Cau 19: Số lượng hàng còn lại của mỗi mặt hàng mà công ty đã có (tổng số lượng hàng hiện có và đã bán)?
SELECT MH.MaHang, MH.TenHang,IFNULL(MH.SoLuong, 0) - IFNULL(SUM(CTDH.SoLuong), 0) AS TongSoHangHienCo, IFNULL(SUM(CTDH.SoLuong), 0) AS TongSoHangDaBan
FROM MATHANG MH LEFT JOIN CHITIETDATHANG CTDH ON CTDH.MaHang = MH.MaHang 
GROUP BY MH.MaHang;

-- Cau 20: Nhân viên nào của công ty bán được số lượng hàng nhiều nhất và số lượng hàng bán được của những nhân viên này là bao nhiêu? 

WITH SoLuongBanNhieuNhat AS( 
	SELECT SUM(CTDH.SoLuong) AS SoLuongBan
	FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
	GROUP BY NV.MaNhanVien ORDER BY SoLuongBan DESC LIMIT 1	
)
SELECT NV.MaNhanVien, CONCAT(NV.Ho,' ',NV.Ten) AS HoTen, SUM(CTDH.SoLuong) AS SoLuongBan
	FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
	GROUP BY NV.MaNhanVien HAVING SoLuongBan = (SELECT SoLuongBan FROM SoLuongBanNhieuNhat);

-- Cau 21: Đơn đặt hàng nào có số lượng hàng được đặt mua ít nhất? 
SELECT DDH.SoHoaDon, SUM(CTDH.SoLuong) AS SoLuongHang  FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon GROUP BY DDH.SoHoaDon
ORDER BY SoLuongHang LIMIT 1;

-- Cau 22: Số tiền nhiều nhất mà khách hàng đã từng bỏ ra để đặt hàng trong các đơn đặt hàng là bao nhiêu?
SELECT DDH.SoHoaDon, SUM( CTDH.SoLuong *  (CTDH.GiaBan - CTDH.MucGiamGia) ) AS SoTienBoRa 
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon GROUP BY DDH.SoHoaDon ORDER BY SoTienBoRa DESC LIMIT 1;

-- Cau 23: Mỗi một đơn đặt hàng đặt mua những mặt hàng nào và tổng số tiền của đơn đặt hàng?
SELECT DDH.SoHoaDon, GROUP_CONCAT(MH.TenHang SEPARATOR ', ') AS CacMatHangDaMua, SUM(CTDH.GiaBan * CTDH.SoLuong) AS TongSoTien
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon JOIN MATHANG MH ON CTDH.MaHang = MH.MaHang GROUP BY DDH.SoHoaDon ORDER BY DDH.SoHoaDon;

 -- Cau 24: Mỗi một loại hàng bao gồm những mặt hàng nào, tổng số lượng của mỗi loại và tổng số lượng của tất cả các mặt hàng hiện có trong cty?
SELECT LH.TenLoaiHang, GROUP_CONCAT(MH.TenHang) AS MatHangTrongLoai,
       SUM(MH.SoLuong) AS TongSoLuongTrongLoai,
       (SELECT SUM(SoLuong) FROM MATHANG) AS TongSoLuongTatCaMatHang
FROM MATHANG MH JOIN LOAIHANG LH ON MH.MaLoaiHang = LH.MaLoaiHang GROUP BY LH.TenLoaiHang;

-- Cau 25: Thống kê trong năm 2007 mỗi một mặt hàng trong mỗi tháng và trong cả năm bán được với số lượng bao nhiêu? 
-- (Yêu cầu kết quả hiểu thị dưới dạng bảng, hai cột đầu là mã hàng, tên hàng, các cột còn lại tương ứng từ tháng 1 đến tháng 12 và cả năm. 
-- Như vậy mỗi dòng trong kết quả cho biết số lượng hàng bán được mỗi tháng và trong cả năm của mỗi mặt hàng) 
SELECT MH.MaHang, MH.TenHang,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 1 THEN CTDH.SoLuong ELSE 0 END) AS Thang1,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 2 THEN CTDH.SoLuong ELSE 0 END) AS Thang2,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 3 THEN CTDH.SoLuong ELSE 0 END) AS Thang3,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 4 THEN CTDH.SoLuong ELSE 0 END) AS Thang4,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 5 THEN CTDH.SoLuong ELSE 0 END) AS Thang5,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 6 THEN CTDH.SoLuong ELSE 0 END) AS Thang6,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 7 THEN CTDH.SoLuong ELSE 0 END) AS Thang7,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 8 THEN CTDH.SoLuong ELSE 0 END) AS Thang8,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 9 THEN CTDH.SoLuong ELSE 0 END) AS Thang9,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 10 THEN CTDH.SoLuong ELSE 0 END) AS Thang10,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 11 THEN CTDH.SoLuong ELSE 0 END) AS Thang11,
    SUM(CASE WHEN MONTH(DDH.NgayDatHang) = 12 THEN CTDH.SoLuong ELSE 0 END) AS Thang12,
    SUM(CASE WHEN YEAR(DDH.NgayDatHang) = 2007 THEN CTDH.SoLuong ELSE 0 END) AS CaNam
FROM DONDATHANG DDH JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon JOIN MATHANG MH ON CTDH.MaHang = MH.MaHang 
WHERE YEAR(DDH.NgayDatHang) = 2007
GROUP BY MH.MaHang;


-- Cau 26: Cập nhật lại giá thị trường NGAYCHUYENHANG của những bản ghi có NGAYCHUYENHANG 
-- chưa xác định (NULL) trong bảng DONDATHANG bằng với giá trị của trường NGAYDATHANG?
UPDATE DONDATHANG SET NgayChuyenHang = NgayDatHang 
WHERE NgayChuyenHang IS NULL;

-- Cau 27: Tăng số lượng hàng của những mặt hàng do công ty VINAMILK cung cấp lên gấp đôi?
UPDATE MATHANG MH JOIN NHACUNGCAP NCC ON MH.MaCongTy = NCC.MaCongTy SET MH.SoLuong = MH.SoLuong * 2 
WHERE NCC.TenGiaoDich = 'VINAMILK';

-- Cau 28: Cập nhật giá trị của trường NOIGIAOHANG trong bảng DONDATHANG bằng địa chỉ của 
-- khách hàng đối với những đơn đặt hàng chưa xác định được nơi giao hàng (giá trị trường NOIGIAOHANG bằng NULL)? 
UPDATE DONDATHANG DDH JOIN KHACHHANG KH ON DDH.MaKhachHang = KH.MaKhachHang  SET DDH.NoiGiaoHang = KH.DiaChi
WHERE DDH.NoiGiaoHang IS NULL;

-- Cau 29: Cập nhật lại dữ liệu trong bảng KHACHHANG sao cho nếu tên công ty và tên giao dịch của khách hàng 
-- trùng với tên công ty và tên giao dịch của một nhà cung cấp nào đó thì địa chỉ, điện thoại, fax và e-mail phải giống nhau? 
UPDATE KHACHHANG KH JOIN NHACUNGCAP NCC ON KH.TenCongTy = NCC.TenCongTy AND KH.TenGiaoDich = NCC.TenGiaoDich 
SET KH.DiaChi = NCC.DiaChi, KH.DienThoai = NCC.DienThoai, KH.Fax = NCC.Fax, KH.Email = NCC.Email 

-- Cau 30: Tăng lương lên gấp rưỡi cho những nhân viên bán được số lượng hàng nhiều hơn 100 trong năm 2003? 
UPDATE NHANVIEN NV
JOIN( 
SELECT DDH.MaNhanVien 
	FROM DONDATHANG DDH 
    JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
	WHERE YEAR(DDH.NgayDatHang) = '2003'
	GROUP BY DDH.MaNhanVien 
    HAVING SUM(CTDH.SoLuong) > 100
) Subquerry
ON Subquerry.MaNhanVien = NV.MaNhanVien 
SET LuongCoBan = LuongCoBan * 1.5;

-- cau 31: Tăng phụ cấp lên bằng 50% lương cho những nhân viên bán được hàng nhiều nhất?	
WITH SoLuongBanNhieuNhat AS (
    SELECT DDH.MaNhanVien ,SUM(SoLuong) as TongSoLuong
    FROM CHITIETDATHANG CTDH JOIN DONDATHANG DDH ON CTDH.SoHoaDon = DDH.SoHoaDon
    GROUP BY DDH.MaNhanVien  ORDER BY TongSoLuong DESC LIMIT 1
) 
UPDATE NHANVIEN NV JOIN SoLuongBanNhieuNhat SLB ON NV.MaNhanVien = SLB.MaNhanVien
SET NV.PhuCap = NV.PhuCap + (NV.LuongCoBan / 2)
WHERE SLB.TongSoLuong = (SELECT TongSoLuong FROM SoLuongBanNhieuNhat);

-- Cau 32: Giảm 25% lương của những nhân viên trong năm 2003 không lập được bất kỳ đơn đặt hàng nào?
UPDATE NHANVIEN SET LuongCoBan = LuongCoBan - (LuongCoBan* 0.25)
WHERE MaNhanVien NOT IN( 
	SELECT NV.MaNhanVien FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien WHERE YEAR(DDH.NgayDathang) = 2003 
);

-- Cau 33: Giả sử trong bảng DONDATHANG có thêm trường SOTIEN cho biết số tiền mà khách hàng phải trả trong mỗi đơn đặt hàng. Hãy tính giá trị cho trường này? 
ALTER TABLE DONDATHANG
ADD SoTien NUMERIC(38,2);
UPDATE DONDATHANG DDH JOIN (SELECT CTDH.SoHoaDon, SUM((CTDH.GiaBan * CTDH.SoLuong - CTDH.SoLuong * CTDH.MucGiamGia)) as TienPhaiTra
FROM CHITIETDATHANG CTDH
GROUP BY CTDH.SoHoaDon) AS T ON DDH.SoHoaDon = T.SoHoaDon
SET DDH.SoTien = T.TienPhaiTra;

-- Câu 34: Xoá khỏi bảng NHANVIEN những nhân viên đã làm việc trong công ty quá 40 năm?
DELETE FROM NHANVIEN WHERE TIMESTAMPDIFF(YEAR, NgayLamViec, CURDATE()) > 40;

-- Cau 35: Xoá những đơn đặt hàng trước năm 2000 ra khỏi cơ sở dữ liệu? 
DELETE FROM DONDATHANG WHERE YEAR(NgayDathang) < 2000;

-- Câu 36: 	Xoá khỏi bảng LOAIHANG những loại hàng hiện không có mặt hàng? 
DELETE LH FROM LOAIHANG LH LEFT JOIN MATHANG MH ON LH.MaLoaiHang = MH.MaLoaiHang WHERE LH.MaLoaiHang IS NULL;

-- Câu 37: Xoá khỏi bảng KHACHHANG những khách hàng hiện không có bất kỳ đơn đặt hàng nào cho công ty? 
DELETE KH FROM KHACHHANG KH LEFT JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang WHERE KH.MaKhachHang IS NULL;

-- Câu 38: Xoá khỏi bảng MATHANG những mặt hàng có số lượng bằng 0 và không được đặt mua trong bất kỳ đơn đặt hàng nào?
DELETE MH FROM MATHANG MH LEFT JOIN CHITIETDATHANG CTDH ON MH.MaHang = CTDH.MaHang WHERE MH.SoLuong = 0 AND CTDH.MaHang IS NULL;

-- Câu 39: Select khách hàng chỉ mua mặt hàng có ID = TP07 mà không mua mặt hàng nào khác.

SELECT KH.MaKhachHang AS MaKhachHang ,KH.TenCongTy AS TenCongTy
FROM KHACHHANG KH
JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY KH.MaKhachHang HAVING COUNT(CASE WHEN CTDH.MaHang='TP07' THEN 1 END) = COUNT(*);

-- Câu 40: Select khách hàng có mua 2 mặt hàng trở lên. Trong đó phải có mặt hàng TP07 và không có mặt hàng MM01.

SELECT KH.MaKhachHang AS MaKhachHang ,KH.TenCongTy AS TenCongTy
FROM KHACHHANG KH
JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY KH.MaKhachHang HAVING COUNT(DISTINCT CTDH.MaHang) > 1 AND COUNT(CASE WHEN CTDH.MaHang='TP07' THEN 1 END) > 0 AND COUNT(CASE WHEN CTDH.MaHang='MM01' THEN 1 END) < 1;

-- Câu 41: Select mã đơn hàng có mua cả DT01, DT02, DT03 và DT04 nhưng k dc mua DC01 hoặc TP03
SELECT SoHoaDon 
FROM CHITIETDATHANG
GROUP BY SoHoaDon
HAVING COUNT(CASE WHEN MaHang = 'DT01' THEN 1 END) > 0
AND COUNT(CASE WHEN MaHang = 'DT02' THEN 1 END) > 0
AND COUNT(CASE WHEN MaHang= 'DT03' THEN 1 END) > 0
AND COUNT(CASE WHEN MaHang= 'DT04' THEN 1 END) > 0
AND (
    	COUNT(CASE WHEN MaHang = 'DC01' THEN 1 END) = 0 
        OR COUNT(CASE WHEN MaHang = 'TP03' THEN 1 END) = 0
);
