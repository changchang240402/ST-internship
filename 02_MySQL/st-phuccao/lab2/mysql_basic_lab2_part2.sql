-- 16. Mỗi nhân viên của công ty đã lập bao nhiêu đơn đặt hàng (nếu chưa hề lập hóa đơn nào thì cho kết quả là 0)?
SELECT NV.MaNhanVien,
    CONCAT (NV.Ho,' ',NV.Ten) AS 'Tên nhân viên',
    COUNT(DDH.SoHoaDon) AS 'Số đơn đặt hàng'
FROM NHANVIEN NV
LEFT JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien
GROUP BY NV.MaNhanVien;

-- 17. Tổng số tiền hàng mà công ty thu được trong mỗi tháng của năm 2007 (thời gian được tính theo ngày đặt hàng)? 
SELECT MONTH(DDH.NgayDatHang) AS Thang,
    SUM(C.SoLuong * (C.GiaBan - C.MucGiamGia)) AS 'Tổng tiền'
FROM CHITIETDATHANG C
JOIN DONDATHANG DDH ON C.SoHoaDon = DDH.SoHoaDon
    AND YEAR(DDH.NgayDatHang) = 2007
GROUP BY Thang;

-- 18. Tổng số tiền lời mà công ty thu được từ mỗi mặt hàng trong năm 2007? 
SELECT MH.MaHang,
    MH.TenHang,
    SUM(CTDH.SoLuong * (CTDH.GiaBan - CTDH.MucGiamGia) - (CTDH.SoLuong * MH.GiaHang)) AS 'Tổng tiền lời'
FROM CHITIETDATHANG CTDH
JOIN DONDATHANG DDH ON CTDH.SoHoaDon = DDH.SoHoaDon
    AND YEAR(DDH.NgayDatHang) = 2007
JOIN MATHANG MH ON CTDH.MaHang = MH.MaHang
GROUP BY MH.MaHang;
-- 19. Số lượng hàng còn lại của mỗi mặt hàng mà công ty đã có (tổng số lượng hàng hiện có và đã bán)?
SELECT MH.MaHang,
    MH.TenHang,
    MH.SoLuong AS 'Số lượng hiện có',
    COALESCE(SUM(CTDH.SoLuong), 0) AS 'Số lượng đã bán',
    MH.SoLuong - COALESCE(SUM(CTDH.SoLuong), 0) AS 'Số lượng còn lại'
FROM MATHANG MH
LEFT JOIN CHITIETDATHANG CTDH ON MH.MaHang = CTDH.MaHang
GROUP BY MH.MaHang;
-- 20. Nhân viên nào của công ty bán được số lượng hàng nhiều nhất và số lượng hàng bán được của những nhân viên này là bao nhiêu? 
WITH BangDiemBanHang
AS (
    SELECT NV.MaNhanVien,
        NV.Ho,
        NV.Ten,
        SUM(CTDH.SoLuong) OVER (PARTITION BY NV.MaNhanVien) AS TongSoLuongBan
    FROM NHANVIEN NV
    JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien
    JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
    )
    
SELECT MaNhanVien,
    Ho,
    Ten,
    MAX(TongSoLuongBan) AS TongSoLuongBan
FROM BangDiemBanHang
GROUP BY MaNhanVien,
    Ho,
    Ten
HAVING MAX(TongSoLuongBan) = (
        SELECT MAX(TongSoLuongBan)
        FROM BangDiemBanHang
    );

-- 21. Đơn đặt hàng nào có số lượng hàng được đặt mua ít nhất? 
WITH TEMP AS (
	SELECT SoHoaDon, SUM(SoLuong) as total FROM CHITIETDATHANG GROUP BY SoHoaDon
)
SELECT SoHoaDon FROM TEMP WHERE total = (SELECT MIN(total) FROM TEMP);

-- 22. Số tiền nhiều nhất mà khách hàng đã từng bỏ ra để đặt hàng trong các đơn đặt hàng là bao nhiêu?
SELECT CustomerOrders.MaKhachHang,
    KH.TenCongTy,
    MAX(TotalAmount) AS SoTien
FROM (
    SELECT DNH.MaKhachHang AS MaKhachHang,
        DNH.SoHoaDon,
        SUM(CTDH.SoLuong * (CTDH.GiaBan - CTDH.MucGiamGia)) AS TotalAmount
    FROM DONDATHANG DNH
    JOIN CHITIETDATHANG CTDH ON DNH.SoHoaDon = CTDH.SoHoaDon
    GROUP BY DNH.MaKhachHang,
        DNH.SoHoaDon
    ) AS CustomerOrders
LEFT JOIN KHACHHANG KH ON KH.MaKhachHang = CustomerOrders.MaKhachHang
GROUP BY CustomerOrders.MaKhachHang 
ORDER BY SoTien DESC LIMIT 1;

-- 23. Mỗi một đơn đặt hàng đặt mua những mặt hàng nào và tổng số tiền của đơn đặt hàng?
SELECT DDH.SoHoaDon,
    GROUP_CONCAT(MH.TenHang) AS 'Các mặt hàng',
    SUM(CTDH.SoLuong * (CTDH.GiaBan - CTDH.MucGiamGia)) AS 'Tổng tiền'
FROM DONDATHANG DDH
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
JOIN MATHANG MH ON MH.MaHang = CTDH.MaHang
GROUP BY DDH.SoHoaDon;

-- 24. Mỗi một loại hàng bao gồm những mặt hàng nào, tổng số lượng của mỗi loại và tổng số lượng của tất cả các mặt hàng hiện có trong cty? 
-- Lấy thông tin về mỗi loại hàng và tổng số lượng của từng loại
SELECT
    LH.MaLoaiHang,
    LH.TenLoaiHang,
    MH.TenHang,
    COALESCE(MH.SoLuong, 0) AS SoLuong
FROM LOAIHANG LH
JOIN MATHANG MH ON LH.MaLoaiHang = MH.MaLoaiHang
UNION 
SELECT
    LH.MaLoaiHang,
    LH.TenLoaiHang,
    'ALL' AS TenHang,
    SUM(COALESCE(MH.SoLuong, 0)) AS SoLuong
FROM LOAIHANG LH
LEFT JOIN MATHANG MH ON LH.MaLoaiHang = MH.MaLoaiHang
GROUP BY LH.MaLoaiHang, LH.TenLoaiHang
UNION 
SELECT
    'ALL' AS MaLoaiHang,
    'ALL' AS TenLoaiHang,
    'ALL' AS TenHang,
    SUM(COALESCE(SoLuong, 0)) AS SoLuong
FROM MATHANG
ORDER BY MaLoaiHang DESC, TenHang DESC;
-- 25. Thống kê trong năm 2007 mỗi một mặt hàng trong mỗi tháng và trong cả năm bán được với số lượng bao nhiêu? (Yêu cầu kết quả hiểu thị dưới dạng bảng, hai cột đầu là mã hàng, tên hàng, các cột còn lại tương ứng từ tháng 1 đến tháng 12 và cả năm. Như vậy mỗi dòng trong kết quả cho biết số lượng hàng bán được mỗi tháng và trong cả năm của mỗi mặt hàng) 
SELECT
    MH.MaHang,
    MH.TenHang,
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
    SUM(CTDH.SoLuong) AS CaNam
FROM MATHANG MH
JOIN CHITIETDATHANG CTDH ON MH.MaHang = CTDH.MaHang
JOIN DONDATHANG DDH ON CTDH.SoHoaDon = DDH.SoHoaDon
WHERE YEAR(DDH.NgayDatHang) = 2007
GROUP BY MH.MaHang, MH.TenHang;






