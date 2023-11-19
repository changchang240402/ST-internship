-- Question 1
SELECT m.`TenHang` 
FROM `MATHANG` m
    JOIN `NHACUNGCAP` n ON m.`MaCongTy` = n.`MaCongTy`
WHERE `TenCongTy` LIKE '%Công ty%Việt Tiến%';

-- Question 2
SELECT DISTINCT
    n.`TenCongTy`, 
    n.`DiaChi` 
FROM `NHACUNGCAP` n
    JOIN `MATHANG` m ON n.`MaCongTy` = m.`MaCongTy`
    JOIN `LOAIHANG` l ON l.`MaLoaiHang` = m.`MaLoaiHang`
WHERE l.`TenLoaiHang` = 'Thực phẩm'

-- Question 3
SELECT kh.`TenGiaoDich`
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang`
    JOIN `DONDATHANG` d ON d.`SoHoaDon` = c.`SoHoaDon`
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
WHERE m.`TenHang` LIKE '%Sữa hộp%';

-- Question 4
SELECT 
    kh.`TenCongTy`,
    CONCAT(n.`Ho`, ' ', n.`Ten`) as TenNhanVien, 
    d.`NgayGiaoHang`, 
    d.`NoiGiaoHang` 
FROM `DONDATHANG` d 
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
    JOIN `NHANVIEN` n ON n.`MaNhanVien` = d.`MaNhanVien` 
WHERE `SoHoaDon` = 1;

-- Question 5
SELECT 
    CONCAT(`Ho`, ' ', `Ten`) as TenNhanVien, 
    (`LuongCoBan` + IFNULL(`PhuCap`, 0)) as Luong 
FROM `NHANVIEN`;

-- Question 6
SELECT 
    m.`TenHang`, 
    (c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia`)) as SoTien 
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang`
WHERE c.`SoHoaDon` = 3;

-- Question 7
SELECT 
    kh.`TenCongTy` 
FROM `KHACHHANG` kh
    JOIN `NHACUNGCAP` n ON kh.`TenGiaoDich` = n.`TenGiaoDich`;

-- Question 8
SELECT 
    GROUP_CONCAT(`Ho`, ' ', `Ten` SEPARATOR ', ') as HoTen,
    `NgaySinh` 
FROM `NHANVIEN`
GROUP BY `NgaySinh`
HAVING COUNT(*) > 1
ORDER BY `NgaySinh`;

-- Question 9
SELECT 
    d.`SoHoaDon`, 
    kh.`TenCongTy` 
FROM `DONDATHANG` d
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
WHERE d.`NoiGiaoHang` = kh.`DiaChi`;

-- Question 10
SELECT 
    m.`MaHang`, 
    m.`TenHang`
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON c.`MaHang` = m.`MaHang`
WHERE c.`SoHoaDon` IS NULL;

-- Question 11
SELECT 
    n.`MaNhanVien`, 
    CONCAT(n.`Ho`, ' ', n.`Ten`) as HoTen 
FROM `NHANVIEN` n
    LEFT JOIN `DONDATHANG` d ON d.`MaNhanVien` = n.`MaNhanVien`
WHERE d.`SoHoaDon` IS NULL;

-- Question 12
SELECT
    CONCAT(`Ho`, ' ', `Ten`) as HoTen
FROM `NHANVIEN`
WHERE `LuongCoBan` = (
    SELECT MAX(`LuongCoBan`) FROM `NHANVIEN`
);

-- Question 13
SELECT 
    c.`SoHoaDon`, 
    kh.`TenCongTy`,
    SUM(c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia`)) as SoTien
FROM `CHITIETDATHANG` c
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
GROUP BY c.`SoHoaDon`
ORDER BY c.`SoHoaDon`;

-- Question 14
SELECT 
    m.`MaHang`, 
    m.`TenHang`
FROM `CHITIETDATHANG` c
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
    JOIN `MATHANG` m ON m.`MaHang` = c.`MaHang`
WHERE YEAR(d.`NgayDatHang`) = 2007
GROUP BY m.`MaHang`
HAVING COUNT(m.`MaHang`) = 1;

-- Question 15
SELECT 
    kh.`MaKhachHang`,
    kh.`TenCongTy`, 
    SUM(c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia`)) as SoTien
FROM `CHITIETDATHANG` c
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
GROUP BY kh.`MaKhachHang`

-- Question 16
SELECT
    n.`MaNhanVien`,
    CONCAT(n.`Ho`, ' ', n.`Ten`) as HoTen, 
    COUNT(d.`MaNhanVien`) as SoDonHang
FROM `NHANVIEN` n
    LEFT JOIN `DONDATHANG` d ON d.`MaNhanVien` = n.`MaNhanVien`
GROUP BY n.`MaNhanVien`;

-- Question 17
SELECT 
    MONTH(d.`NgayDatHang`) as Thang, 
    SUM(c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia`)) as SoTien
FROM `DONDATHANG` d
    JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
WHERE YEAR(`NgayDatHang`) = 2007
GROUP BY MONTH(`NgayDatHang`);

-- Question 18
SELECT 
    m.`MaHang`, 
    m.`TenHang`, 
    SUM(c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia` - m.`GiaHang`)) as TienLoi
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m .`MaHang`
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
WHERE YEAR(`NgayDatHang`) = 2007
GROUP BY m.`MaHang`;

-- Question 19
SELECT 
    m.`MaHang`, 
    m.`TenHang`, 
    SUM(IFNULL(c.`SoLuong`, 0)) as SoLuongDaBan,
    IFNULL(m.SoLuong, 0) - IFNULL(SUM(c.SoLuong), 0) as SoLuongConLai
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON c.`MaHang` = m.`MaHang`
GROUP BY m.`MaHang`;

-- Question 20
-- Solution 1:
SELECT 
    CONCAT(n.`Ho`, ' ', n.`Ten`) as HoTen,
    SUM(c.`SoLuong`) as TongSoLuong
FROM `DONDATHANG` d
    JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
    JOIN `NHANVIEN` n ON n.`MaNhanVien` = d.`MaNhanVien`
GROUP BY n.`MaNhanVien`
HAVING TongSoLuong = (
    SELECT SUM(c.`SoLuong`) as TSL
    FROM `DONDATHANG` d 
        JOIN `CHITIETDATHANG` c ON d.`SoHoaDon` = c.`SoHoaDon`
    GROUP BY d.`MaNhanVien`
    ORDER BY TSL DESC
    LIMIT 1
);

-- Solution 2:
WITH TEMP_SL AS (
    SELECT d.`MaNhanVien`, SUM(c.`SoLuong`) as TongSoLuong
    FROM `DONDATHANG` d 
        JOIN `CHITIETDATHANG` c ON d.`SoHoaDon` = c.`SoHoaDon`
    GROUP BY d.`MaNhanVien`
)
SELECT 
    CONCAT(n.`Ho`, ' ', n.`Ten`) as HoTen,
    sl.`TongSoLuong` 
FROM `TEMP_SL` sl
    JOIN `NHANVIEN` n ON n.`MaNhanVien` = sl.`MaNhanVien`
WHERE sl.`TongSoLuong` = (
    SELECT TongSoLuong FROM TEMP_SL 
    ORDER BY TongSoLuong DESC
    LIMIT 1
);
-- Question 21
SELECT 
    `SoHoaDon`, 
    SUM(`SoLuong`) as TongSoLuong
FROM `CHITIETDATHANG`
GROUP BY `SoHoaDon`
HAVING TongSoLuong = (
    SELECT SUM(`SoLuong`) as TSL 
    FROM `CHITIETDATHANG`
    GROUP BY `SoHoaDon`
    ORDER BY TSL 
    LIMIT 1
);
-- Question 22
SELECT 
    d.`MaKhachHang`,
    kh.`TenCongTy`, 
    SUM(c.`SoLuong` * (c.`GiaBan` - c.`MucGiamGia`)) as TongSoTien
FROM `CHITIETDATHANG` c
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
GROUP BY d.`SoHoaDon`
ORDER BY TongSoTien DESC
LIMIT 1;
    

-- Question 23
SELECT 
    c.`SoHoaDon`, 
    GROUP_CONCAT(m.`MaHang` SEPARATOR ', ') as DanhSachMatHang, 
    SUM(c.`SoLuong` * (`GiaBan` - `MucGiamGia`)) as Tien
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang` 
GROUP BY c.`SoHoaDon`;

-- Question 24
SELECT 
    l.`MaLoaiHang`,
    m.`TenHang`,
    m.`SoLuong`
FROM `LOAIHANG` l
    JOIN `MATHANG` m ON l.`MaLoaiHang` = m.`MaLoaiHang`
UNION
    SELECT
        `MaLoaiHang`,
        'ALL',
        SUM(`SoLuong`) as SoLuong
    FROM `MATHANG`
    GROUP BY `MaLoaiHang`
UNION
    SELECT
        'ALL',
        'ALL',
        SUM(`SoLuong`) as SoLuong
    FROM `MATHANG`
ORDER BY 
    IF(`MaLoaiHang`='ALL',0, `MaLoaiHang`) DESC, 
    IF(`TenHang`='ALL',1,`TenHang`) DESC;

-- Question 25
SELECT 
    m.`MaHang`, 
    m.`TenHang`,
    SUM(IF(MONTH(`NgayDatHang`) = 1, c.`SoLuong`, 0)) as T1,
    SUM(IF(MONTH(`NgayDatHang`) = 2, c.`SoLuong`, 0)) as T2,
    SUM(IF(MONTH(`NgayDatHang`) = 3, c.`SoLuong`, 0)) as T3,
    SUM(IF(MONTH(`NgayDatHang`) = 4, c.`SoLuong`, 0)) as T4,
    SUM(IF(MONTH(`NgayDatHang`) = 5, c.`SoLuong`, 0)) as T5,
    SUM(IF(MONTH(`NgayDatHang`) = 6, c.`SoLuong`, 0)) as T6,
    SUM(IF(MONTH(`NgayDatHang`) = 7, c.`SoLuong`, 0)) as T7,
    SUM(IF(MONTH(`NgayDatHang`) = 8, c.`SoLuong`, 0)) as T8,
    SUM(IF(MONTH(`NgayDatHang`) = 9, c.`SoLuong`, 0)) as T9,
    SUM(IF(MONTH(`NgayDatHang`) = 10, c.`SoLuong`, 0)) as T10,
    SUM(IF(MONTH(`NgayDatHang`) = 11, c.`SoLuong`, 0)) as T11,
    SUM(IF(MONTH(`NgayDatHang`) = 12, c.`SoLuong`, 0)) as T12,
    SUM(IFNULL(c.`SoLuong`,0)) as 'ALL'
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON m.`MaHang` = c.`MaHang`
    LEFT JOIN `DONDATHANG` d ON d.`SoHoaDon` = c.`SoHoaDon`
GROUP BY m.`MaHang`;

-- Question 26
UPDATE `DONDATHANG` d1
    JOIN `DONDATHANG` d2 ON d1.`SoHoaDon` = d2.`SoHoaDon`
SET d1.`NgayChuyenHang` = d2.`NgayDatHang`
WHERE d1.`NgayChuyenHang` IS NULL;

-- Question 27
UPDATE `MATHANG` m
    JOIN `NHACUNGCAP` n ON m.`MaCongTy` = n.`MaCongTy`
SET m.`SoLuong` = m.`SoLuong` * 2
WHERE n.`TenGiaoDich` LIKE '%VINAMILK';

-- Question 28
UPDATE `DONDATHANG` d
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
SET d.`NoiGiaoHang` = kh.`DiaChi`
WHERE d.`NoiGiaoHang` IS NULL;

-- Question 29
UPDATE `KHACHHANG` kh
    JOIN `NHACUNGCAP` n ON kh.`TenCongTy` = n.`TenCongTy` AND kh.`TenGiaoDich` = n.`TenGiaoDich`
SET 
    kh.`DiaChi` = n.`DiaChi`,
    kh.`DienThoai` = n.`DienThoai`,
    kh.`Email` = n.`Email`,
    kh.`Fax` = n.`Fax`;


-- Question 30
UPDATE `NHANVIEN` n
    JOIN (
        SELECT d.`MaNhanVien`
        FROM `CHITIETDATHANG` c
            JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
        WHERE YEAR(d.`NgayDatHang`) = 2003
        GROUP BY d.`MaNhanVien`
        HAVING SUM(c.`SoLuong`) > 100
    ) c ON c.`MaNhanVien` = n.`MaNhanVien`
SET n.`LuongCoBan` = n.`LuongCoBan` * 1.5;

-- Question 31
-- Solution 1:
WITH TEMP_SL AS (
    SELECT d.`MaNhanVien`,SUM(`SoLuong`) as TongSoLuong
    FROM `CHITIETDATHANG` c
        JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
    GROUP BY `MaNhanVien`
) 
UPDATE `NHANVIEN` n
    JOIN `TEMP_SL` tsl ON n.`MaNhanVien` = tsl.`MaNhanVien`
SET `PhuCap` = `PhuCap` + `LuongCoBan` / 2
WHERE tsl.`TongSoLuong` = (
    SELECT TongSoLuong
    FROM TEMP_SL
    ORDER BY TongSoLuong DESC
    LIMIT 1
);

-- Solution 2:
UPDATE `NHANVIEN` n
    JOIN (
        SELECT `MaNhanVien`
        FROM `CHITIETDATHANG` c
            JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
        GROUP BY `MaNhanVien`
        HAVING SUM(`SoLuong`) = (
            SELECT SUM(`SoLuong`) as TSL
            FROM `CHITIETDATHANG` c
                JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
            GROUP BY `MaNhanVien`
            ORDER BY TSL DESC
            LIMIT 1
        )
    ) tsl ON n.`MaNhanVien` = tsl.`MaNhanVien`
SET `PhuCap` = `PhuCap` + `LuongCoBan` / 2;

-- Question 32
UPDATE `NHANVIEN` n
    LEFT JOIN (
        SELECT `MaNhanVien` 
        FROM `DONDATHANG`
        WHERE YEAR(`NgayDatHang`) = 2003
        GROUP BY `MaNhanVien`
    ) d ON n.`MaNhanVien` = d.`MaNhanVien`
SET n.`LuongCoBan` = n.`LuongCoBan` * 3 / 4
WHERE d.`MaNhanVien` IS NULL;

-- Question 33
UPDATE `DONDATHANG` d
    JOIN (
        SELECT 
            `SoHoaDon`, 
            SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as TongST 
        FROM `CHITIETDATHANG`
        GROUP BY `SoHoaDon`
    ) tst ON d.`SoHoaDon` = tst.`SoHoaDon`
SET d.`SoTien` = tst.`TongST`;

-- Question 34
DELETE FROM `NHANVIEN` 
WHERE (YEAR(CURDATE()) - YEAR(`NgayLamViec`)) > 40;

-- Question 35
DELETE FROM `DONDATHANG` 
WHERE YEAR(`NgayDatHang`) < 2000;

-- Question 36
DELETE l
FROM `LOAIHANG` l
    LEFT JOIN `MATHANG` m ON l.`MaLoaiHang` = m.`MaLoaiHang`
WHERE m.`MaLoaiHang` IS NULL;

-- Question 37
DELETE kh
FROM `KHACHHANG` kh
    LEFT JOIN `DONDATHANG` d ON d.`MaKhachHang` = kh.`MaKhachHang`
WHERE d.`MaKhachHang` IS NULL;
-- Question 38
DELETE m
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON c.`MaHang` = m.`MaHang`
WHERE m.`SoLuong` = 0 AND c.`MaHang` IS NULL;

-- Question 39
SELECT d.`MaKhachHang`
FROM `DONDATHANG` d
    JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
GROUP BY d.`MaKhachHang`
HAVING COUNT(CASE WHEN c.`MaHang` = 'TP07' THEN 1 END) = COUNT(c.`MaHang`);

-- Question 40

SELECT 
    kh.`MaKhachHang`,
    kh.`TenCongTy`
FROM `DONDATHANG` d
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
    JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
GROUP BY kh.`MaKhachHang`
HAVING COUNT(DISTINCT c.`MaHang`) >= 2 
    AND COUNT(CASE WHEN c.`MaHang` = 'MM01' THEN 1 END) = 0 
    AND COUNT(CASE WHEN c.`MaHang` = 'TP07' THEN 1 END) > 0;


-- Question 41
SELECT `SoHoaDon` 
FROM `CHITIETDATHANG`
GROUP BY `SoHoaDon`
HAVING COUNT(CASE WHEN `MaHang` = 'DT01' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT02' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT03' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT04' THEN 1 END) > 0
    AND (
        COUNT(CASE WHEN `MaHang` = 'DC01' THEN 1 END) = 0 
        OR COUNT(CASE WHEN `MaHang` = 'TP03' THEN 1 END) = 0
    );
