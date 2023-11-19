-- Sử dụng câu lệnh UPDATE để thực hiện các yêu cầu: 
-- 26. Cập nhật lại giá thị trường NGAYCHUYENHANG của những bản ghi có NGAYCHUYENHANG chưa xác định (NULL) 
-- trong bảng DONDATHANG bằng với giá trị của trường NGAYDATHANG?
UPDATE DONDATHANG
SET NgayChuyenHang = NgayDatHang
WHERE NgayChuyenHang IS NULL;
-- 27. Tăng số lượng hàng của những mặt hàng do công ty VINAMILK cung cấp lên gấp đôi?
UPDATE MATHANG
SET SoLuong = SoLuong * 2
WHERE MaCongTy = 'VNM';
-- 28. Cập nhật giá trị của trường NOIGIAOHANG trong bảng DONDATHANG bằng địa chỉ của khách hàng đối với những đơn đặt hàng chưa xác định 
-- được nơi giao hàng (giá trị trường NOIGIAOHANG bằng NULL)? 
UPDATE DONDATHANG DDH
INNER JOIN KHACHHANG KH ON DDH.MaKhachHang = KH.MaKhachHang
SET DDH.NOIGIAOHANG = KH.DiaChi
WHERE DDH.NOIGIAOHANG IS NULL;
-- 29. Cập nhật lại dữ liệu trong bảng KHACHHANG sao cho nếu tên công ty và tên giao dịch của khách hàng trùng với tên công ty 
-- và tên giao dịch của một nhà cung cấp nào đó thì địa chỉ, điện thoại, fax và e-mail phải giống nhau? 
UPDATE KHACHHANG KH
JOIN NHACUNGCAP NCC ON NCC.TenCongTy = KH.TenCongTy
    AND NCC.TenGiaoDich = KH.TenGiaoDich
SET KH.DiaChi = NCC.DiaChi,
    KH.DienThoai = NCC.DienThoai,
    KH.Fax = NCC.Fax,
    KH.Email = NCC.Email
-- 30. Tăng lương lên gấp rưỡi cho những nhân viên bán được số lượng hàng nhiều hơn 100 trong năm 2003? 
UPDATE NHANVIEN NV
JOIN (
    SELECT NV.MaNhanVien
    FROM NHANVIEN NV
    JOIN DONDATHANG DDH ON NV.MaNhanVien = DDH.MaNhanVien
    JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
    WHERE YEAR(DDH.NgayDatHang) = 2003
    GROUP BY NV.MaNhanVien
    HAVING SUM(CTDH.SoLuong) > 100
    ) AS B ON NV.MaNhanVien = B.MaNhanVien
SET NV.LuongCoBan = NV.LuongCoBan * 1.5;
-- 31. Tăng phụ cấp lên bằng 50% lương cho những nhân viên bán được hàng nhiều nhất?
WITH TEMP AS (
	SELECT MaNhanVien, SUM(SoLuong) as SOLUONG 
    FROM DONDATHANG DDH 
    INNER JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
    GROUP BY MaNhanVien
)
UPDATE NHANVIEN JOIN TEMP USING (MaNhanVien)
SET PhuCap = PhuCap + LuongCoBan * 0.5
WHERE soluong = (
	SELECT MAX(soluong) FROM TEMP
);


-- 32. Giảm 25% lương của những nhân viên trong năm 2003 không lập được bất kỳ đơn đặt hàng nào?
UPDATE NHANVIEN NV
LEFT JOIN (
    SELECT DISTINCT DDH.MaNhanVien
    FROM DONDATHANG DDH
    WHERE YEAR(DDH.NgayDatHang) = 2003
    ) AS DDH_2003 ON NV.MaNhanVien = DDH_2003.MaNhanVien
SET NV.LuongCoBan = NV.LuongCoBan * 0.75
WHERE DDH_2003.MaNhanVien IS NULL;
-- 33. Giả sử trong bảng DONDATHANG có thêm trường SOTIEN cho biết số tiền mà khách hàng phải trả trong mỗi đơn đặt hàng. Hãy tính giá trị cho trường này? 
UPDATE DONDATHANG DDH
JOIN (
    SELECT DDH.SoHoaDon,
        SUM(CTDH.SoLuong * (CTDH.GiaBan - CTDH.MucGiamGia)) AS SOTIEN
    FROM DONDATHANG DDH
    JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
    GROUP BY DDH.SoHoaDon
    ) AS TongTien ON DDH.SoHoaDon = TongTien.SoHoaDon
SET DDH.SOTIEN = TongTien.SOTIEN;

-- Thực hiện các yêu cầu dưới đây bằng câu lệnh DELETE: 
-- 34. Xoá khỏi bảng NHANVIEN những nhân viên đã làm việc trong công ty quá 40 năm?
DELETE
FROM NHANVIEN
WHERE TIMESTAMPDIFF(YEAR, NgayLamViec, CURRENT_TIMESTAMP) > 40;

-- 35. Xoá những đơn đặt hàng trước năm 2000 ra khỏi cơ sở dữ liệu? 
DELETE
FROM DONDATHANG
WHERE YEAR(NgayDatHang) < 2000;

-- 36. Xoá khỏi bảng LOAIHANG những loại hàng hiện không có mặt hàng? 
DELETE LH
FROM LOAIHANG LH
LEFT JOIN MATHANG MH ON LH.MaLoaiHang = MH.MaLoaiHang
WHERE MH.MaLoaiHang IS NULL;

-- 37. Xoá khỏi bảng KHACHHANG những khách hàng hiện không có bất kỳ đơn đặt hàng nào cho công ty? 
DELETE KH
FROM KHACHHANG KH
LEFT JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
WHERE DDH.MaKhachHang IS NULL;

-- 38. Xoá khỏi bảng MATHANG những mặt hàng có số lượng bằng 0 và không được đặt mua trong bất kỳ đơn đặt hàng nào?
DELETE MH
FROM MATHANG MH
LEFT JOIN (
    SELECT DISTINCT CTDH.MaHang
    FROM CHITIETDATHANG CTDH
    ) AS HangDuocDat ON MH.MaHang = HangDuocDat.MaHang
WHERE MH.SoLuong = 0
    AND HangDuocDat.MaHang IS NULL;

-- 39. Sử dụng câu lệnh SELECT để thực hiện các yêu cầu sau: 
-- Select khách hàng chỉ mua mặt hàng có ID = TP07 mà không mua mặt hàng nào khác.
-- Ví dụ:
-- - Khách hàng A mua 2 mặt hàng TP07 và MM01
-- - Khách hàng B mua 1 mặt hàng TP07
-- -> Kết quả select chỉ có khác hàng B 
-- note: Tính mặt hàng trên tổng tất cả đơn hàng chứ không phải từng đơn hàng 
SELECT KH.MaKhachHang AS MaKhachHang ,KH.TenCongTy AS TenCongTy
FROM KHACHHANG KH
JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY KH.MaKhachHang HAVING COUNT(CASE WHEN CTDH.MaHang='TP07' THEN 1 END) = COUNT(*)
-- 40. Select khách hàng có mua 2 mặt hàng trở lên. Trong đó phải có mặt hàng TP07 và không có mặt hàng MM01.
SELECT KH.MaKhachHang AS MaKhachHang ,KH.TenCongTy AS TenCongTy
FROM KHACHHANG KH
JOIN DONDATHANG DDH ON KH.MaKhachHang = DDH.MaKhachHang
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY KH.MaKhachHang HAVING 
COUNT(CASE WHEN CTDH.MaHang='TP07' THEN 1 END ) >=1
AND COUNT(CASE WHEN CTDH.MaHang='MM01' THEN 1 END ) = 0 
AND COUNT(DISTINCT CTDH.MaHang) >=2
-- 41. Select mã đơn hàng có mua cả DT01, DT02, DT03 và DT04 nhưng k dc mua DC01 hoặc TP03
SELECT DDH.SoHoaDon,
    JSON_ARRAYAGG(CTDH.MaHang) AS TatCaMaHang
FROM DONDATHANG DDH
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY DDH.SoHoaDon
HAVING JSON_CONTAINS(TatCaMaHang, '["DT01", "DT02", "DT03", "DT04"]') = 1
    AND JSON_CONTAINS(TatCaMaHang, '["DC01"]') = 0 AND JSON_CONTAINS(TatCaMaHang, '["TP03"]') = 0;
-- Solution 2 : 
SELECT DDH.SoHoaDon,
       JSON_OBJECTAGG(CTDH.MaHang, 1) AS 'Mặt hàng'
FROM DONDATHANG DDH
JOIN CHITIETDATHANG CTDH ON DDH.SoHoaDon = CTDH.SoHoaDon
GROUP BY DDH.SoHoaDon
HAVING JSON_CONTAINS_PATH(
    JSON_OBJECTAGG(CTDH.MaHang, 1), 
    'all',
    '$.DT01', '$.DT02', '$.DT03', '$.DT04'
) = 1
AND NOT JSON_CONTAINS_PATH(
    JSON_OBJECTAGG(CTDH.MaHang, 1), 
    'one',
    '$.DC01', '$.TP03'
) = 1;