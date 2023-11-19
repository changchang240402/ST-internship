-- 1.Công ty Việt Tiến đã cung cấp những mặt hàng nào? 
SELECT MH.MaHang,
    MH.TenHang
FROM MATHANG MH
INNER JOIN NHACUNGCAP NCC ON MH.MaCongTy = NCC.MaCongTy
      AND NCC.TenCongTy = 'Công ty may mặc Việt Tiến';
-- 2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó? 
SELECT DISTINCT NCC.MaCongTy,
       NCC.TenCongTy,
       NCC.DiaChi
FROM MATHANG MH
INNER JOIN NHACUNGCAP NCC ON NCC.MaCongTy = MH.MaCongTy
INNER JOIN LOAIHANG LH ON LH.MaLoaiHang = MH.MaLoaiHang
      AND LH.TenLoaiHang = 'Thực phẩm';
-- 3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
SELECT KH.TenGiaoDich
FROM CHITIETDATHANG C
INNER JOIN MATHANG MH ON MH.MaHang = C.MaHang
      AND MH.TenHang LIKE '%Sửa hộp%'
INNER JOIN DONDATHANG DDH ON DDH.SoHoaDon = C.SoHoaDon
INNER JOIN KHACHHANG KH ON KH.MaKhachHang = DDH.MaKhachHang;
-- 4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
SELECT KH.TenCongTy AS 'Tên Khác Hàng',
    CONCAT (NV.Ho,' ',NV.Ten) AS 'Nhân Viên',
    DDH.NgayGiaoHang AS 'Thời Gian Giao Hàng',
    DDH.NoiGiaoHang AS 'Địa Điểm Giao Hàng'
FROM DONDATHANG DDH
INNER JOIN KHACHHANG KH ON KH.MaKhachHang = DDH.MaKhachHang
    AND DDH.SoHoaDon = 1
INNER JOIN NHANVIEN NV ON NV.MaNhanVien = DDH.MaNhanVien;
-- 5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)? 
SELECT MaNhanVien,
       Ho,
       Ten,
       (LuongCoBan + PhuCap) AS 'Lương'
FROM NHANVIEN;
-- 6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu(số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
SELECT MH.TenHang,
       C.SoLuong * (C.GiaBan - C.MucGiamGia) AS 'Số tiền phải trả'
FROM CHITIETDATHANG C
INNER JOIN MATHANG MH ON C.MaHang = MH.MaHang
      AND C.SoHoaDon = 3;
-- 7. Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)? 
SELECT KH.MaKhachHang,
       KH.TenCongTy
FROM KHACHHANG KH
INNER JOIN NHACUNGCAP NCC ON NCC.TenGiaoDich = KH.TenGiaoDich
      AND KH.TenCongTy = NCC.TenCongTy;
-- Thêm điều kiện 2 tên công giống nhau vì e thấy trong Database ở table NHACUNGCAP chỉ có 1 khóa chính là
-- MaCongTy --> Lỡ có trường hợp 2 cty khác nhau nhưng cùng 1 tên giao dịch 

-- 8. Trong công ty có những nhân viên nào có cùng ngày sinh? 
SELECT Date(NgaySinh) AS NS, 
    GROUP_CONCAT(CONCAT (
            NV.Ho,
            ' ',
            NV.Ten
            ) ORDER BY NV.MaNhanVien) AS DanhSachNhanVien
FROM NHANVIEN NV
GROUP BY NS
HAVING COUNT(*) > 1;
-- 9. Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào? 
SELECT DDH.SoHoaDon,
       KH.TenCongTy
FROM DONDATHANG DDH
INNER JOIN KHACHHANG KH ON DDH.MaKhachHang = KH.MaKhachHang
           AND KH.DiaChi = DDH.NoiGiaoHang;
-- 10. Những mặt hàng nào chưa từng được khách hàng đặt mua? 
-- Solution 1
SELECT M.MaHang,
       M.TenHang
FROM MATHANG M
LEFT JOIN CHITIETDATHANG C ON M.MaHang = C.MaHang
WHERE C.MaHang IS NULL;
-- 11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào? 
SELECT N.MaNhanVien,
       N.Ho,
       N.Ten
FROM NHANVIEN 
LEFT JOIN DONDATHANG D ON N.MaNhanVien = D.MaNhanVien
WHERE D.MaNhanVien IS NULL;
-- 12. Những nhân viên nào của công ty có lương cơ bản cao nhất? 
SELECT Ho,
       Ten,
       LuongCoBan
FROM NHANVIEN
WHERE LuongCoBan = (
        SELECT MAX(LuongCoBan)
        FROM NHANVIEN
	);
-- 13. Tổng số tiền mà khách hàng phải trả cho mỗi đơn đặt hàng là bao nhiêu? 
SELECT DDH.SoHoaDon,
       SUM(C.SoLuong * (C.GiaBan - C.MucGiamGia)) AS Tien
FROM CHITIETDATHANG C
INNER JOIN DONDATHANG DDH ON C.SoHoaDon = DDH.SoHoaDons
GROUP BY DDH.SoHoaDon;
-- 14. Trong năm 2007 những mặt hàng nào đặt mua đúng một lần? 
SELECT CTDH.MaHang,
       MH.TenHang
FROM CHITIETDATHANG CTDH
JOIN DONDATHANG DDH ON CTDH.SoHoaDon = DDH.SoHoaDon
     AND YEAR(DDH.NgayDatHang) = 2007
JOIN MATHANG MH ON CTDH.MaHang = MH.MaHang
GROUP BY CTDH.MaHang,
          MH.TenHang
HAVING COUNT(*) = 1;
-- 15. Mỗi khách hàng đã bỏ ra bao nhiêu tiền để đặt mua hàng của công ty? 
SELECT KH.MaKhachHang,
       KH.TenCongTy,
       SUM(CTDH.SoLuong * (CTDH.GiaBan - CTDH.MucGiamGia)) AS TongTien
FROM KHACHHANG KH
JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY KH.MaKhachHang;