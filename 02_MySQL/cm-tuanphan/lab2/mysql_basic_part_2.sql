-- Câu 1: Công ty Việt Tiến đã cung cấp những mặt hàng nào?
SELECT * FROM MATHANG m JOIN NHACUNGCAP n ON m.MaCongTy = n.MaCongTy WHERE n.TenCongTy like '%Việt Tiến';

-- Câu 2: Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
SELECT DISTINCT NHACUNGCAP.TenCongTy, NHACUNGCAP.DiaChi
FROM MATHANG
INNER JOIN NHACUNGCAP ON MATHANG.MaCongTy = NHACUNGCAP.MaCongTy
INNER JOIN LOAIHANG ON MATHANG.MaLoaiHang = LOAIHANG.MaLoaiHang
WHERE LOAIHANG.TenLoaiHang = 'Thực phẩm';

-- Câu 3: Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
SELECT DISTINCT KHACHHANG.TenGiaoDich
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.TenHang LIKE '%sữa hộp%';

-- Câu 4: Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
SELECT KHACHHANG.TenCongTy AS KhachHangDatHang,  CONCAT(NHANVIEN.`Ho`, ' ', NHANVIEN.`Ten`) AS NhanVienLapDon,
       DONDATHANG.NgayGiaoHang, DONDATHANG.NoiGiaoHang
FROM DONDATHANG
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
INNER JOIN NHANVIEN ON DONDATHANG.MaNhanVien = NHANVIEN.MaNhanVien
WHERE DONDATHANG.SoHoaDon = 1;

-- Câu 5: Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)?
SELECT MaNhanVien, CONCAT(`Ho`, ' ', `Ten`) as TenNhanVien, (LuongCoBan + PhuCap) AS Luong FROM NHANVIEN;

-- Câu 6: Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
SELECT MATHANG.TenHang, (CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia)) AS SoTien
FROM CHITIETDATHANG
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE CHITIETDATHANG.SoHoaDon = 3;

-- Câu 7: Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)?
SELECT DISTINCT KHACHHANG.TenCongTy
FROM KHACHHANG
INNER JOIN NHACUNGCAP ON KHACHHANG.TenGiaoDich = NHACUNGCAP.TenGiaoDich;

-- Câu 8: Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
SELECT  GROUP_CONCAT(`Ho`, ' ', `Ten` SEPARATOR ', ') , NgaySinh, COUNT(*) AS SoLuong
FROM NHANVIEN
GROUP BY NgaySinh
HAVING COUNT(*) > 1;

-- Câu 9: Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
SELECT DISTINCT k.TenCongTy 
FROM DONDATHANG d
JOIN KHACHHANG k ON k.MaKhachHang = d.MaKhachHang WHERE k.DiaChi = d.NoiGiaoHang;

-- Câu 10: Những mặt hàng nào chưa từng được khách hàng đặt mua?
SELECT MATHANG.TenHang
FROM MATHANG
LEFT JOIN CHITIETDATHANG ON MATHANG.MaHang = CHITIETDATHANG.MaHang
WHERE CHITIETDATHANG.SoHoaDon IS NULL;

-- Câu 11: Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
SELECT NHANVIEN.MaNhanVien, NHANVIEN.Ten
FROM NHANVIEN
LEFT JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
WHERE DONDATHANG.SoHoaDon IS NULL;

-- Câu 12: Những nhân viên nào của công ty có lương cơ bản cao nhất?
SELECT MaNhanVien, Ten, LuongCoBan
FROM NHANVIEN
WHERE LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);

-- Câu 13: Tổng số tiền mà khách hàng phải trả cho mỗi đơn đặt hàng là bao nhiêu?
SELECT d.MaKhachHang , SUM(SoLuong * (GiaBan - MucGiamGia)) AS TongTienDonHang
FROM CHITIETDATHANG c JOIN DONDATHANG d ON c.SoHoaDon = d.SoHoaDon
GROUP BY c.SoHoaDon;

-- Câu 14: Trong năm 2007 những mặt hàng nào đặt mua đúng một lần?
SELECT c.MaHang
FROM DONDATHANG d JOIN CHITIETDATHANG c on d.SoHoaDon = c.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007 
GROUP BY c.MaHang
HAVING COUNT(d.SoHoaDon) = 1;

-- Câu 15: Mỗi khách hàng đã bỏ ra bao nhiêu tiền để đặt mua hàng của công ty?
SELECT KHACHHANG.* , SUM(SoLuong * (GiaBan - MucGiamGia)) AS TongTien
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
GROUP BY KHACHHANG.MaKhachHang;

-- Câu 16: Mỗi nhân viên của công ty đã lập bao nhiêu đơn đặt hàng (nếu chưa hề lập hóa đơn nào thì cho kết quả là 0)?
SELECT CONCAT(NHANVIEN.`Ho`, ' ', NHANVIEN.`Ten`), COUNT(DONDATHANG.SoHoaDon) AS SoDonDatHang
FROM NHANVIEN
LEFT JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
GROUP BY CONCAT(NHANVIEN.`Ho`, ' ', NHANVIEN.`Ten`);

-- Câu 17: Tổng số tiền hàng mà công ty thu được trong mỗi tháng của năm 2007 (thời gian được tính theo ngày đặt hàng)?
SELECT n.MaCongTy, n.TenCongTy, SUM(c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) as TongTienHangThuDuoc, MONTH(d.NgayDatHang) AS Thang
FROM NHACUNGCAP n JOIN MATHANG m JOIN CHITIETDATHANG c JOIN DONDATHANG d ON n.MaCongTy = m.MaCongTy AND m.MaHang = c.MaHang AND c.SoHoaDon = d.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY n.MaCongTy, MONTH(d.NgayDatHang);

-- Câu 18: Tổng số tiền lời mà công ty thu được từ mỗi mặt hàng trong năm 2007?
SELECT n.MaCongTy, m.MaHang, n.TenCongTy, m.TenHang, SUM(c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) - SUM(m.GiaHang * c.SoLuong ) as TongTienHangThuDuoc
FROM NHACUNGCAP n JOIN MATHANG m JOIN CHITIETDATHANG c JOIN DONDATHANG d ON n.MaCongTy = m.MaCongTy AND m.MaHang = c.MaHang AND c.SoHoaDon = d.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY m.MaHang, m.TenHang;

-- Câu 19: Số lượng hàng còn lại của mỗi mặt hàng mà công ty đã có (tổng số lượng hàng hiện có và đã bán)?
SELECT MATHANG.TenHang, SUM(MATHANG.SoLuong) - SUM(CHITIETDATHANG.SoLuong) AS TongSoHangHienCo, SUM(CHITIETDATHANG.SoLuong) AS SoLuongConLai
FROM MATHANG JOIN CHITIETDATHANG ON MATHANG.MaHang = CHITIETDATHANG.MaHang
GROUP BY MATHANG.TenHang, MATHANG.SoLuong;

-- Câu 20: Nhân viên nào của công ty bán được số lượng hàng nhiều nhất và số lượng hàng bán được của những nhân viên này là bao nhiêu?
SELECT NV.MaNhanVien, CONCAT(NV.Ho,' ',NV.Ten) AS HoTen, SUM(CTDH.SoLuong) AS SoLuongBan
FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
GROUP BY NV.MaNhanVien HAVING SoLuongBan = (SELECT SUM(CTDH.SoLuong) AS SoLuongBan
FROM NHANVIEN NV JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien JOIN CHITIETDATHANG CTDH ON CTDH.SoHoaDon = DDH.SoHoaDon
GROUP BY NV.MaNhanVien ORDER BY SoLuongBan DESC LIMIT 1);

-- Câu 21: Đơn đặt hàng nào có số lượng hàng được đặt mua ít nhất?
SELECT DONDATHANG.SoHoaDon, MIN(CHITIETDATHANG.SoLuong) AS SoLuongMin
FROM DONDATHANG
INNER JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
GROUP BY DONDATHANG.SoHoaDon
ORDER BY SoLuongMin LIMIT 1;

-- Câu 22: Số tiền nhiều nhất mà khách hàng đã từng bỏ ra để đặt hàng trong các đơn đặt hàng là bao nhiêu?
SELECT KHACHHANG.TenGiaoDich, MAX(SoLuong * (GiaBan - MucGiamGia)) AS SoTienMax
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
GROUP BY KHACHHANG.TenGiaoDich;

-- Câu 23: Mỗi một đơn đặt hàng đặt mua những mặt hàng nào và tổng số tiền của đơn đặt hàng?
SELECT DONDATHANG.SoHoaDon, GROUP_CONCAT(MATHANG.TenHang) AS MatHangDaDat, SUM(CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia)) AS TongTien
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
GROUP BY DONDATHANG.SoHoaDon;

-- Câu 24: Mỗi một loại hàng bao gồm những mặt hàng nào, tổng số lượng của mỗi loại và tổng số lượng của tất cả các mặt hàng hiện có trong công ty?
SELECT LOAIHANG.TenLoaiHang, GROUP_CONCAT(MATHANG.TenHang) AS MatHangTrongLoai,
       SUM(MATHANG.SoLuong) AS TongSoLuongTrongLoai,
       (SELECT SUM(SoLuong) FROM MATHANG) AS TongSoLuongTatCaMatHang
FROM MATHANG
INNER JOIN LOAIHANG ON MATHANG.MaLoaiHang = LOAIHANG.MaLoaiHang
GROUP BY LOAIHANG.TenLoaiHang;

-- Câu 25: Thống kê trong năm 2007 mỗi một mặt hàng trong mỗi tháng và trong cả năm bán được với số lượng bao nhiêu?
SELECT MATHANG.MaHang, MATHANG.TenHang,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 1 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang1,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 2 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang2,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 3 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang3,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 4 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang4,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 5 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang5,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 6 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang6,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 7 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang7,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 8 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang8,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 9 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang9,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 10 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang10,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 11 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang11,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 12 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang12,
       SUM(CHITIETDATHANG.SoLuong) AS TongNam
FROM CHITIETDATHANG
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
WHERE YEAR(DONDATHANG.NgayDatHang) = 2007
GROUP BY MATHANG.MaHang, MATHANG.TenHang
ORDER BY MATHANG.MaHang;

-- Câu 26: Cập nhật lại giá thị trường NGAYCHUYENHANG của những bản ghi có NGAYCHUYENHANG chưa xác định (NULL) trong bảng DONDATHANG bằng với giá trị của trường NGAYDATHANG:
UPDATE DONDATHANG
SET NGAYCHUYENHANG = NGAYDATHANG
WHERE NGAYCHUYENHANG IS NULL;

-- Câu 27: Tăng số lượng hàng của những mặt hàng do công ty VINAMILK cung cấp lên gấp đôi:
UPDATE MATHANG
JOIN NHACUNGCAP ON MATHANG.MaCongTy = NHACUNGCAP.MaCongTy
SET MATHANG.SoLuong = MATHANG.SoLuong * 2
WHERE NHACUNGCAP.TenGiaoDich LIKE "%Vinamilk%";

-- Câu 28: Cập nhật giá trị của trường NOIGIAOHANG trong bảng DONDATHANG bằng địa chỉ của khách hàng đối với những đơn đặt hàng chưa xác định được nơi giao hàng (giá trị trường NOIGIAOHANG bằng NULL):
UPDATE DONDATHANG d JOIN KHACHHANG k ON d.MaKhachHang = k.MaKhachHang
SET d.NoiGiaoHang = k.DiaChi
WHERE d.NoiGiaoHang IS NULL;

-- Câu 29: Cập nhật lại dữ liệu trong bảng KHACHHANG sao cho nếu tên công ty và tên giao dịch của khách hàng trùng với tên công ty và tên giao dịch của một nhà cung cấp nào đó thì địa chỉ, điện thoại, fax và e-mail phải giống nhau:
UPDATE KHACHHANG k JOIN NHACUNGCAP n ON k.TenCongTy = n.TenCongTy AND k.TenGiaoDich = n.TenGiaoDich
SET k.DiaChi = n.DiaChi, k.DienThoai = n.DienThoai, k.Fax = n.Fax, k.Email = n.Email;

-- Câu 30: Tăng lương lên gấp đôi cho những nhân viên bán được số lượng hàng nhiều hơn 100 trong năm 2003:
UPDATE NHANVIEN n JOIN (SELECT d.MaNhanVien, CONCAT(n.Ho , " ", n.Ten) AS HoTen, SUM(c.SoLuong) AS SoLuongBanDuoc, YEAR(d.NgayDatHang) AS Nam
 FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN NHANVIEN n ON d.SoHoaDon = c.SoHoaDon AND d.MaNhanVien = n.MaNhanVien
 GROUP BY d.MaNhanVien, YEAR(d.NgayDatHang)) AS T ON n.MaNhanVien = T.MaNhanVien
SET n.LuongCoBan = 1.5 * n.LuongCoBan
WHERE SoLuongBanDuoc > 100 AND T.Nam = 2003;

-- Câu 31: Tăng phụ cấp lên bằng 50% lương cho những nhân viên bán được hàng nhiều nhất:
UPDATE NHANVIEN n JOIN (SELECT T.MaNhanVien, T.HoTen ,T.SoLuongBanDuoc
FROM(
 SELECT d.MaNhanVien, CONCAT(n.Ho , " ", n.Ten) AS HoTen, SUM(c.SoLuong) AS SoLuongBanDuoc
 FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN NHANVIEN n ON d.SoHoaDon = c.SoHoaDon AND d.MaNhanVien = n.MaNhanVien
 GROUP BY d.MaNhanVien
) AS T
WHERE 
 T.SoLuongBanDuoc = (
  SELECT MAX(T.SoLuongBanDuoc) 
  FROM (
   SELECT d.MaNhanVien, SUM(c.SoLuong) AS SoLuongBanDuoc	
   FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon 
   GROUP BY d.MaNhanVien
  ) AS T 
 )) AS T1 ON n.MaNhanVien = T1.MaNhanVien
 SET n.PhuCap = n.LuongCoBan / 2;

-- Câu 32: Giảm 25% lương của những nhân viên trong năm 2003 không lập được bất kỳ đơn đặt hàng nào:
UPDATE NHANVIEN
SET LuongCoBan = LuongCoBan - (LuongCoBan * 0.25)
WHERE MaNhanVien NOT IN (
    SELECT DISTINCT DONDATHANG.MaNhanVien
    FROM DONDATHANG
    WHERE YEAR(DONDATHANG.NgayDatHang) = 2003
);

-- Câu 33: Giả sử trong bảng DONDATHANG có thêm trường SOTIEN cho biết số tiền mà khách hàng phải trả trong mỗi đơn đặt hàng. Hãy tính giá trị cho trường này. (Chú ý: SOTIEN = SUM(SoLuong * (GiaBan - MucGiamGia)) cho từng đơn đặt hàng)
SELECT DONDATHANG.*, SUM(SoLuong * (GiaBan - MucGiamGia)) AS SOTIEN FROM DONDATHANG
LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
GROUP BY DONDATHANG.SoHoaDon;

-- Câu 34: Xoá khỏi bảng NHANVIEN những nhân viên đã làm việc trong công ty quá 40 năm:
DELETE FROM NHANVIEN
WHERE NgayLamViec <= (NOW() - INTERVAL 40 YEAR)


-- Câu 35: Xoá những đơn đặt hàng trước năm 2000 ra khỏi cơ sở dữ liệu:
DELETE FROM DONDATHANG
WHERE YEAR(NgayDatHang) < 2000;

-- Câu 36: Xoá khỏi bảng LOAIHANG những loại hàng hiện không có mặt hàng:
DELETE FROM LOAIHANG
WHERE MaLoaiHang NOT IN (SELECT DISTINCT MaLoaiHang FROM MATHANG);

-- Câu 37: Xoá khỏi bảng KHACHHANG những khách hàng hiện không có bất kỳ đơn đặt hàng nào cho công ty:
DELETE FROM KHACHHANG
WHERE MaKhachHang NOT IN (SELECT DISTINCT MaKhachHang FROM DONDATHANG);

-- Câu 38: Xoá khỏi bảng MATHANG những mặt hàng có số lượng bằng 0 và không được đặt mua trong bất kỳ đơn đặt hàng nào:
DELETE FROM MATHANG
WHERE SoLuong = 0 AND MaHang NOT IN (SELECT DISTINCT MaHang FROM CHITIETDATHANG);

-- Câu 39: Select khách hàng chỉ mua mặt hàng có ID = TP07 mà không mua mặt hàng nào khác:
SELECT KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
FROM KHACHHANG
JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaLoaiHang = 'TP' AND MATHANG.MaHang = 'TP07'
GROUP BY KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich;

-- Câu 40: Select khách hàng có mua 2 mặt hàng trở lên. Trong đó phải có mặt hàng TP07 và không có mặt hàng MM01:
SELECT KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
FROM KHACHHANG
JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaLoaiHang = 'TP' AND MATHANG.MaHang = 'TP07'
    AND KHACHHANG.MaKhachHang NOT IN (
        SELECT DISTINCT KHACHHANG.MaKhachHang
        FROM KHACHHANG
        LEFT JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
        LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
        LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
        WHERE MATHANG.MaLoaiHang = 'MM' AND MATHANG.MaHang = 'MM01'
    )
GROUP BY KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
HAVING COUNT(DISTINCT MATHANG.MaHang) >= 2;

-- Câu 41: Select mã đơn hàng có mua cả DT01, DT02, DT03 và DT04 nhưng không mua DC01 hoặc TP03:
SELECT DONDATHANG.SoHoaDon
FROM DONDATHANG
LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaHang IN ('DT01', 'DT02', 'DT03', 'DT04')
    AND DONDATHANG.SoHoaDon NOT IN (
        SELECT DISTINCT DONDATHANG.SoHoaDon
        FROM DONDATHANG
        LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
        LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
        WHERE MATHANG.MaHang IN ('DC01', 'TP03')
    )
GROUP BY DONDATHANG.SoHoaDon
HAVING COUNT(DISTINCT MATHANG.MaHang) = 4;

