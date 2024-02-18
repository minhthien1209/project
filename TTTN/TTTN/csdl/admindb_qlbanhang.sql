-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2023 lúc 06:53 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `admindb_qlbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadonban`
--

CREATE TABLE `cthoadonban` (
  `id_ct` int(255) NOT NULL,
  `id_hd` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `soluong` int(255) NOT NULL,
  `giatien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadonban`
--

INSERT INTO `cthoadonban` (`id_ct`, `id_hd`, `id_sp`, `soluong`, `giatien`) VALUES
(83, 57, 59, 1, 500),
(84, 58, 62, 1, 320),
(85, 59, 64, 1, 432),
(86, 59, 65, 1, 600),
(87, 60, 59, 1, 500),
(88, 61, 59, 2, 500),
(89, 62, 59, 4, 500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadonnhap`
--

CREATE TABLE `cthoadonnhap` (
  `id_ct` int(255) NOT NULL,
  `id_hd` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `soluong` int(255) NOT NULL,
  `giatien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadonnhap`
--

INSERT INTO `cthoadonnhap` (`id_ct`, `id_hd`, `id_sp`, `soluong`, `giatien`) VALUES
(66, 29, 59, 1, 400),
(67, 30, 62, 1, 320),
(68, 31, 64, 1, 320),
(69, 32, 65, 1, 500),
(70, 33, 59, 1, 400),
(71, 34, 59, 1, 400),
(72, 35, 59, 2, 400),
(73, 36, 59, 3, 400),
(74, 36, 60, 1, 420),
(75, 36, 61, 2, 430),
(76, 36, 63, 10, 320),
(77, 37, 69, 1, 2),
(78, 38, 69, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonban`
--

CREATE TABLE `hoadonban` (
  `id_hd` int(255) NOT NULL,
  `id_nv` int(255) NOT NULL,
  `id_k` int(255) NOT NULL,
  `ngayban` date NOT NULL,
  `tongtien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonban`
--

INSERT INTO `hoadonban` (`id_hd`, `id_nv`, `id_k`, `ngayban`, `tongtien`) VALUES
(57, 26, 17, '2023-12-10', 500),
(58, 26, 17, '2023-12-10', 320),
(59, 26, 21, '2023-12-10', 1032),
(60, 26, 17, '2023-12-20', 500),
(61, 26, 17, '2023-12-20', 1000),
(62, 26, 17, '2023-12-20', 2000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `id_hd` int(11) NOT NULL,
  `id_nv` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `tongtien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`id_hd`, `id_nv`, `ngaynhap`, `tongtien`) VALUES
(29, 26, '2023-12-10', 400),
(30, 26, '2023-12-10', 320),
(31, 26, '2023-12-10', 320),
(32, 26, '2023-12-10', 500),
(33, 26, '2023-12-20', 400),
(34, 26, '2023-12-20', 400),
(35, 26, '2023-12-20', 800),
(36, 26, '2023-12-20', 5680),
(37, 26, '2023-12-20', 2),
(38, 26, '2023-12-20', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_k` int(255) NOT NULL,
  `tenk` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `ngaythem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_k`, `tenk`, `gioitinh`, `sdt`, `ngaythem`) VALUES
(17, 'Nguyễn Văn A', 'Nam', '0943941177', '2003-01-15'),
(19, 'Nguyễn Quốc Huy', 'Nam', '0123456789', '1222-12-12'),
(20, 'Huỳnh Thị Xuân Nguyệt', 'Nu', '0956712832', '2003-09-12'),
(21, 'Lê Viết Sơn', 'Nam', '0987654321', '1022-12-13'),
(22, 'Nguyễn Đình Hưng', 'Nam', '0943941177', '2003-03-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loaisp` int(255) NOT NULL,
  `tenloaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loaisp`, `tenloaisp`) VALUES
(8, 'Gạch lát tường'),
(9, 'Đá'),
(10, 'sắt'),
(11, 'Xi măng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` int(255) NOT NULL,
  `tennv` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `ngaygianhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `tennv`, `gioitinh`, `ngaysinh`, `diachi`, `sdt`, `hinhanh`, `ngaygianhap`) VALUES
(26, 'Trần Minh Thiện', 'Nam', '2002-05-09', 'So nha abc', '0943941177', 'avt.jpg', '2023-12-10'),
(27, 'Nguyen Van B', 'Nu', '2023-06-08', 'So nha abc', '04343242', 'tải xuống.jpg', '2023-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `id_loaisp` int(255) NOT NULL,
  `giaban` int(255) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `soluong` int(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `donvi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `tensp`, `id_loaisp`, `giaban`, `gianhap`, `soluong`, `hinhanh`, `mota`, `donvi`) VALUES
(59, 'Gạch ốp', 8, 500, 400, 0, 'da-op-trung-dong-van-go-247x247.jpg', 'Siêu đẹp', NULL),
(60, 'Gạch nền', 8, 500, 420, 1, 'da-trung-dong-me-canh-10x10-1-247x247.jpg', 'Siêu đẹp', NULL),
(61, 'Đá cây', 8, 600, 430, 2, 'Da-cay-sa-thach-scaled-247x247.jpg', 'Rẻ đẹp như tranh', NULL),
(62, 'Đá bông', 9, 320, 320, 0, '20771639_1912132962382405_1722759135_o-247x247.jpg', 'Đá mài', NULL),
(63, 'Đá bazan', 8, 432, 320, 10, 'Đá-Bazan-Sọc-Mịn-15x60Cm-scaled-247x247.jpg', 'Đá đep', NULL),
(64, 'Đá ', 8, 432, 320, 0, 'Đá-Bazan-Sọc-Mịn-15x60Cm-scaled-247x247.jpg', 'Đá đep', NULL),
(65, 'Xi Măng', 11, 600, 500, 0, 'image-20220611080950-1.jpeg', 'chất lượng', NULL),
(66, 'sắt', 10, 450, 350, 0, 'tải xuống (1).jpg', 'bền', NULL),
(67, '123', 9, 123, 456, 0, 'z4228760870027_638c3ed05a1d8c090116d5174c70703a.jpg', '123', NULL),
(68, '456', 9, 23, 45, 0, 'z4228760870027_638c3ed05a1d8c090116d5174c70703a.jpg', '123', NULL),
(69, '1111', 9, 1, 2, 2, 'z4228760791116_b4e40bbd8a133264e0b72f760853abac.jpg', '4', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `id_nv` int(255) NOT NULL,
  `level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `taikhoan`, `matkhau`, `id_nv`, `level`) VALUES
(21, 'admin', 'admin', 26, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadonban`
--
ALTER TABLE `cthoadonban`
  ADD PRIMARY KEY (`id_ct`);

--
-- Chỉ mục cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  ADD PRIMARY KEY (`id_ct`);

--
-- Chỉ mục cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`id_hd`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`id_hd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_k`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadonban`
--
ALTER TABLE `cthoadonban`
  MODIFY `id_ct` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  MODIFY `id_ct` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `id_hd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_k` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
