-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2023 at 05:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benhnhannoitru`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `id` int NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gioitinh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sdt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `khoa` int NOT NULL,
  `chucvu` int NOT NULL,
  `anh` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`id`, `hoten`, `gioitinh`, `sdt`, `khoa`, `chucvu`, `anh`) VALUES
(1, 'Dương Huy Toàn', 'Nam', '0987654987', 1, 1, 'img/bs/67DCHT20145.jpg'),
(2, 'Đỗ Thành Trung', 'Nam', '0645214752', 2, 2, 'img/bs/trung.jpg'),
(3, 'Nguyễn Công Tuyến', 'Nam', '0123654215', 3, 3, 'img/bs/tuyen.jpg'),
(4, 'Vũ Công Ngọc', 'Nữ', '0654125745', 4, 4, 'img/bs/ngoc.jpg'),
(5, 'Trần Văn Lâm', 'Nữ', '0312541287', 5, 2, 'img/bs/lamthon.jpg'),
(6, 'Lê Đức Thành', 'Nam', '0321564784', 6, 4, 'img/bs/thanh.jpg'),
(7, 'Hoàng Văn Lãm', 'Nữ', '0954123697', 7, 3, 'img/bs/lam.jpg'),
(8, 'Nguyễn Công Tuyến', 'Nam', '0784512365', 8, 2, 'img/bs/tuyen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `benhan`
--

CREATE TABLE `benhan` (
  `id` int NOT NULL,
  `mabenhnhan` int NOT NULL,
  `khoa` int NOT NULL,
  `phong` int NOT NULL,
  `bacsi` int NOT NULL,
  `benhchuandoan` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `benhan`
--

INSERT INTO `benhan` (`id`, `mabenhnhan`, `khoa`, `phong`, `bacsi`, `benhchuandoan`) VALUES
(6, 53, 1, 3, 1, 'Ngộc độc'),
(7, 54, 1, 6, 6, 'Viêm phổi cấp'),
(8, 55, 4, 8, 3, 'Suy tim bẩm sinh'),
(9, 56, 2, 5, 2, 'Ngộ độc rượu'),
(10, 57, 3, 5, 4, 'Viêm gan B'),
(11, 58, 6, 3, 5, 'Viêm mũi dị ứng');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id` int NOT NULL,
  `ngaynhapvien` date NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gioitinh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sdt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `quoctich` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `dantoc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `socmnd` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sothebhyt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `chinhsach` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoinha` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`id`, `ngaynhapvien`, `hoten`, `gioitinh`, `ngaysinh`, `diachi`, `sdt`, `quoctich`, `dantoc`, `socmnd`, `sothebhyt`, `chinhsach`, `nguoinha`) VALUES
(53, '2018-11-07', 'Trần Duy Hưng', 'Nữ', '1995-09-08', 'Hà Nội', '0111111121', 'Việt Nam', 'Kinh', '0124569852', '03263', 'Không', 57),
(54, '2018-11-11', 'Nguyễn Văn Cao', 'Nam', '2001-07-03', 'TP.HCM', '', 'Việt Nam', 'Thái', '2345123456', '12392', 'Không', 58),
(55, '2018-11-14', 'Trần Công Nhẹ', 'Nam', '1999-03-07', 'Phú Thọ', '0132574513', 'Việt Nam', 'Tày', '0124569999', '98657', 'Không', 59),
(56, '2018-11-14', 'Chiến Văn Tranh', 'Nam', '1992-09-03', 'Hải Phòng', '0396963216', 'Việt Nam', 'Kinh', '134251642', '', 'Thương binh - Liệt sĩ', 60),
(57, '2018-11-15', 'Phạm Thị Thiết', 'Nữ', '2005-07-23', 'Bắc Giang', '', 'Việt Nam', 'Kinh', '124514524', '12455', 'Không', 61),
(58, '2018-11-15', 'Phùng Gia Liễu', 'Nữ', '2016-06-06', 'Cà Mau', '', 'Việt Nam', 'Kinh', '1542142652', '09898', 'Không', 62);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int NOT NULL,
  `tenchucvu` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenchucvu`) VALUES
(1, 'Bác sĩ trưởng khoa'),
(2, 'Bác sĩ'),
(3, 'Điều dưỡng'),
(4, 'Y tá');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int NOT NULL,
  `tendichvu` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `khoa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`id`, `tendichvu`, `gia`, `khoa`) VALUES
(1, 'Siêu âm lồng ngực', 450000, 2),
(2, 'Chụp cắt lớp não', 750000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dichvutheobenhnhan`
--

CREATE TABLE `dichvutheobenhnhan` (
  `id` int NOT NULL,
  `mabenhan` int NOT NULL,
  `dichvu` int NOT NULL,
  `ngaythuchien` date NOT NULL,
  `bacsithuchien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` int NOT NULL,
  `tenkhoa` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `tenkhoa`) VALUES
(1, 'Khoa hồi sức cấp cứu'),
(2, 'Khoa tiêu hóa'),
(3, 'Khoa truyền nhiễm'),
(4, 'Khoa tim mạch'),
(5, 'Khoa y học cổ truyền'),
(6, 'Khoa tai mũi họng'),
(7, 'Khoa sản'),
(8, 'Khoa gây mê hồi sức'),
(9, 'Khoa huyết học'),
(10, 'Khoa hóa sinh'),
(11, 'Khoa vi sinh'),
(12, 'Khoa thần kinh'),
(13, 'Khoa xét nghiệm'),
(14, 'Khoa điều trị phục hồi');

-- --------------------------------------------------------

--
-- Table structure for table `nguoinha`
--

CREATE TABLE `nguoinha` (
  `id` int NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gioitinh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sdt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `quanhe` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `nguoinha`
--

INSERT INTO `nguoinha` (`id`, `hoten`, `gioitinh`, `sdt`, `diachi`, `quanhe`) VALUES
(57, 'Phạm Văn Đồng', 'Nam', '0999999939', 'Hà Nội', 'Bố bệnh nhân'),
(58, 'Nguyễn Văn Ao', 'Nữ', '2111111113', 'TP.HCM', 'Chị bệnh nhân'),
(59, 'Phạm Văn Chì', 'Nam', '0314517546', 'Phú Thọ', 'Bố bệnh nhân'),
(60, 'Chiến Văn Xa', 'Nam', '0978786589', 'Hải Phòng', 'Bố bệnh nhân'),
(61, 'Phạm Thị Tha', 'Nữ', '03125514223', 'Bắc giang', 'Mẹ bệnh nhân'),
(62, 'Phùng Gia Long', 'Nam', '0989632568', 'Cà Mau', 'Bố bệnh nhân');

-- --------------------------------------------------------

--
-- Table structure for table `nhaphanphoi`
--

CREATE TABLE `nhaphanphoi` (
  `id` int NOT NULL,
  `tencongty` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tenthuoc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `nhaphanphoi`
--

INSERT INTO `nhaphanphoi` (`id`, `tencongty`, `tenthuoc`) VALUES
(1, 'Công ty TNHH Hoa Linh', 'Klamentin 1g'),
(2, 'Công ty TNHH Hoa Linh', 'Amoxicillin 500'),
(3, 'Công ty TNHH Hoa Linh', 'Penicilin'),
(4, 'Công ty TNHH Hoa Linh', 'Methicilin'),
(5, 'Công ty TNHH Hoa Linh', 'Ampicilline'),
(6, 'Công ty TNHH Hoa Linh', 'Amoxicilline'),
(7, 'Công ty TNHH Hoa Linh', 'Cloxacilline'),
(8, 'Công ty TNHH Hoa Linh', 'Sultamicillin'),
(9, 'Công ty TNHH Hoa Linh', 'Piperacilline'),
(10, 'Công ty TNHH Hoa Linh', 'Imipenem'),
(11, 'Công ty TNHH Tuyến Tung Tăng', 'Cefadroxil'),
(12, 'Công ty TNHH Tuyến Tung Tăng', 'Cephalexin'),
(13, 'Công ty TNHH Tuyến Tung Tăng', 'Cefalothin'),
(14, 'Công ty TNHH Tuyến Tung Tăng', 'Cephazolin'),
(15, 'Công ty TNHH Tuyến Tung Tăng', 'Cefaclor'),
(16, 'Công ty TNHH Tuyến Tung Tăng', 'Ceftazidime'),
(17, 'Công ty TNHH Tuyến Tung Tăng', 'Cefotaxime'),
(18, 'Công ty TNHH Tuyến Tung Tăng', 'Cefpodoxime'),
(19, 'Công ty TNHH Tuyến Tung Tăng', 'Ceftriaxone'),
(20, 'Công ty TNHH Trung Cò', 'Tetracycline'),
(21, 'Công ty TNHH Trung Cò', 'Doxycyline'),
(22, 'Công ty TNHH Trung Cò', 'Clotetracyclin'),
(23, 'Công ty TNHH Trung Cò', 'Oxytetracyclin'),
(24, 'Công ty TNHH Trung Cò', 'Minocyclin'),
(25, 'Công ty TNHH Trung Cò', 'hexacyclin'),
(26, 'Công ty TNHH Ngọc Phê Pha', 'Acid nalidixic'),
(27, 'Công ty TNHH Trung Cò', 'lomefloxacin'),
(28, 'Công ty TNHH Trung Cò', 'ciprofloxacin'),
(29, 'Công ty TNHH Trung Cò', 'norfloxacin'),
(30, 'Công ty TNHH Trung Cò', 'ofloxacin'),
(31, 'Công ty TNHH Trung Cò', 'levofloxacin'),
(32, 'Công ty TNHH Trung Cò', 'Gatifloxacin'),
(33, 'Công ty TNHH Trung Cò', 'Moxifloxacin'),
(34, 'Công ty TNHH Lâm Thông Lãm', 'Sulfaguanidin'),
(35, 'Công ty TNHH Lâm Thông Lãm', 'Sulfamethoxazol'),
(36, 'Công ty TNHH Lâm Thông Lãm', 'Sulfadiazin'),
(37, 'Công ty TNHH Lâm Thông Lãm', 'Sulfasalazin');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int NOT NULL,
  `tenphong` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mota` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `tenphong`, `mota`, `gia`) VALUES
(1, 'A1', 'Điều hòa 2 chiều - giường đôi - tủ lạnh - tivi - 2 quạt - wifi - phòng tắm Wc cá nhân', 900000),
(2, 'A2', 'Điều hòa 2 chiều - giường đơn - tivi - 2 quạt - wifi - phòng tắm Wc cá nhân', 800000),
(3, 'A3', 'Điều hòa 2 chiều - giường đơn - 2 quạt - wifi - phòng tắm Wc cá nhân', 700000),
(4, 'B1', 'Điều hòa - giường đôi - tivi - 2 quạt - wifi - phòng tắm Wc cá nhân', 600000),
(5, 'B2', 'Điều hòa - giường đơn  - tivi - 2 quạt - wifi - phòng tắm Wc cá chung', 500000),
(6, 'B3', 'Điều hòa - giường đơn - 2 quạt - wifi - phòng tắm Wc chung', 400000),
(7, 'C1', 'Giường đôi - tivi - 4 quạt - wifi - phòng tắm Wc chung', 300000),
(8, 'C2', 'Giường đôi - 2 quạt - wifi - phòng tắm Wc chung', 200000),
(9, 'C3', 'Giường đơn - 2 quạt - wifi - phòng tắm Wc chung', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE `quanly` (
  `id` int NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `taikhoan` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `anh` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `quanly`
--

INSERT INTO `quanly` (`id`, `hoten`, `taikhoan`, `matkhau`, `anh`) VALUES
(1, 'Dương Huy Toàn', 'huytoan', 'toan', 'img/bs/67DCHT20145.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thuocban`
--

CREATE TABLE `thuocban` (
  `id` int NOT NULL,
  `tenthuoc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `soluongton` int NOT NULL,
  `nhaphanphoi` int NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `thuocban`
--

INSERT INTO `thuocban` (`id`, `tenthuoc`, `soluongton`, `nhaphanphoi`, `gia`) VALUES
(1, 'Klamentin 1g', 241, 1, 23500),
(2, 'Amoxicillin 500', 351, 2, 24000),
(3, 'Penicilin', 270, 3, 73500),
(4, 'Methicilin', 81, 4, 3000),
(5, 'Ampicilline', 630, 5, 9500),
(6, 'Amoxicilline', 223, 6, 17000),
(7, 'Cloxacilline', 114, 7, 21000),
(8, 'Sultamicillin', 90, 8, 44500),
(9, 'Piperacilline', 26, 9, 1000),
(10, 'Imipenem', 13, 10, 23000),
(11, 'Cefadroxil', 27, 11, 65500),
(12, 'Cephalexin', 334, 12, 13500),
(13, 'Cefalothin', 77, 13, 73000),
(14, 'Cephazolin', 135, 14, 9500),
(15, 'Cefaclor', 240, 15, 15000),
(16, 'Ceftazidime', 21, 16, 35500),
(17, 'Cefotaxime', 361, 17, 8500),
(18, 'Cefpodoxime', 32, 18, 19000),
(19, 'Ceftriaxone', 69, 19, 21500),
(20, 'Tetracycline', 123, 20, 45000),
(21, 'Doxycyline', 75, 21, 7500),
(22, 'Clotetracyclin', 324, 22, 3500),
(23, 'Oxytetracyclin', 174, 23, 15000),
(24, 'Minocyclin', 49, 24, 37500),
(25, 'hexacyclin', 13, 25, 90500),
(26, 'Acid nalidixic', 68, 26, 1500),
(27, 'lomefloxacin', 354, 27, 36000),
(28, 'ciprofloxacin', 42, 28, 7000),
(29, 'norfloxacin', 15, 29, 6500),
(30, 'ofloxacin', 32, 30, 11500),
(31, 'levofloxacin', 48, 31, 13000),
(32, 'Gatifloxacin', 123, 32, 22000),
(33, 'Moxifloxacin', 483, 33, 27000),
(34, 'Sulfaguanidin', 154, 34, 32000),
(35, 'Sulfamethoxazol', 242, 35, 15000),
(36, 'Sulfadiazin', 12, 36, 3500),
(37, 'Sulfasalazin', 334, 37, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `thuocbhyt`
--

CREATE TABLE `thuocbhyt` (
  `id` int NOT NULL,
  `tenthuoc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `soluongton` int NOT NULL,
  `nhaphanphoi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `thuocbhyt`
--

INSERT INTO `thuocbhyt` (`id`, `tenthuoc`, `soluongton`, `nhaphanphoi`) VALUES
(1, 'Klamentin 1g', 241, 1),
(2, 'Amoxicillin 500', 351, 2),
(3, 'Penicilin', 270, 3),
(4, 'Methicilin', 81, 4),
(5, 'Ampicilline', 630, 5),
(6, 'Amoxicilline', 223, 6),
(7, 'Cloxacilline', 114, 7),
(8, 'Sultamicillin', 90, 8),
(9, 'Piperacilline', 26, 9),
(10, 'Imipenem', 13, 10),
(11, 'Cefadroxil', 27, 11),
(12, 'Cephalexin', 334, 12),
(13, 'Cefalothin', 77, 13),
(14, 'Cephazolin', 135, 14),
(15, 'Cefaclor', 240, 15),
(16, 'Ceftazidime', 21, 16),
(17, 'Cefotaxime', 361, 17),
(18, 'Cefpodoxime', 32, 18),
(19, 'Ceftriaxone', 69, 19),
(20, 'Tetracycline', 123, 20),
(21, 'Doxycyline', 75, 21),
(22, 'Clotetracyclin', 324, 22),
(23, 'Oxytetracyclin', 174, 23),
(24, 'Minocyclin', 49, 24),
(25, 'hexacyclin', 13, 25),
(26, 'Acid nalidixic', 68, 26),
(27, 'lomefloxacin', 354, 27),
(28, 'ciprofloxacin', 42, 28),
(29, 'norfloxacin', 15, 29),
(30, 'ofloxacin', 32, 30),
(31, 'levofloxacin', 48, 31),
(32, 'Gatifloxacin', 123, 32),
(33, 'Moxifloxacin', 483, 33),
(34, 'Sulfaguanidin', 154, 34),
(35, 'Sulfamethoxazol', 242, 35),
(36, 'Sulfadiazin', 12, 36),
(37, 'Sulfasalazin', 334, 37);

-- --------------------------------------------------------

--
-- Table structure for table `thuocbhyttheobenhnhan`
--

CREATE TABLE `thuocbhyttheobenhnhan` (
  `id` int NOT NULL,
  `mabenhan` int NOT NULL,
  `ngaycap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thuocbhyt` int NOT NULL,
  `soluongthuocbhyt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuoctheobenhnhan`
--

CREATE TABLE `thuoctheobenhnhan` (
  `id` int NOT NULL,
  `mabenhan` int NOT NULL,
  `ngaycap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thuocmua` int DEFAULT NULL,
  `soluong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xuatkhoa`
--

CREATE TABLE `xuatkhoa` (
  `id` int NOT NULL,
  `ngayxuatvien` date NOT NULL,
  `benhnhan` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoinha` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `benhan` int NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sothebhyt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `chinhsach` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `benhchuandoan` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `bacsidieutri` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `chiphiravien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `xuatkhoa`
--

INSERT INTO `xuatkhoa` (`id`, `ngayxuatvien`, `benhnhan`, `nguoinha`, `benhan`, `diachi`, `sothebhyt`, `chinhsach`, `benhchuandoan`, `bacsidieutri`, `chiphiravien`) VALUES
(22, '2023-10-17', 'Phùng Gia Liễu', 'Phùng Gia Long', 11, 'Cà Mau', '09898', 'Không', 'Viêm mũi dị ứng', 'Trần Văn Lâm', 4900000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bacsi_khoa` (`khoa`),
  ADD KEY `FK_bacsi_chucvu` (`chucvu`);

--
-- Indexes for table `benhan`
--
ALTER TABLE `benhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_benhan_benhnhan` (`mabenhnhan`),
  ADD KEY `FK_benhan_khoa` (`khoa`),
  ADD KEY `FK_benhan_phong` (`phong`),
  ADD KEY `FK_benhan_bacsi` (`bacsi`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_benhnhan_nguoinha` (`nguoinha`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dichvu_khoa` (`khoa`);

--
-- Indexes for table `dichvutheobenhnhan`
--
ALTER TABLE `dichvutheobenhnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dichvutheobenhnhan_benhan` (`mabenhan`),
  ADD KEY `FK_dichvutheobenhnhan_dichvu` (`dichvu`),
  ADD KEY `FK_dichvutheobenhnhan_bacsi` (`bacsithuchien`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoinha`
--
ALTER TABLE `nguoinha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuocban`
--
ALTER TABLE `thuocban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_thuocban_nhaphanphoi` (`nhaphanphoi`);

--
-- Indexes for table `thuocbhyt`
--
ALTER TABLE `thuocbhyt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_thuocbhyt_nhaphanphoi` (`nhaphanphoi`);

--
-- Indexes for table `thuocbhyttheobenhnhan`
--
ALTER TABLE `thuocbhyttheobenhnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_thuocbhyttheobenhnhan_thuocbhyt` (`thuocbhyt`),
  ADD KEY `FK_thuocbhyttheobenhnhan_benhan` (`mabenhan`);

--
-- Indexes for table `thuoctheobenhnhan`
--
ALTER TABLE `thuoctheobenhnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_thuoctheobenhnhan_benhan` (`mabenhan`),
  ADD KEY `FK_thuoctheobenhnhan_thuocban` (`thuocmua`);

--
-- Indexes for table `xuatkhoa`
--
ALTER TABLE `xuatkhoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_xuatkhoa_benhnhan` (`benhnhan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `benhan`
--
ALTER TABLE `benhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dichvutheobenhnhan`
--
ALTER TABLE `dichvutheobenhnhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nguoinha`
--
ALTER TABLE `nguoinha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quanly`
--
ALTER TABLE `quanly`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thuocban`
--
ALTER TABLE `thuocban`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `thuocbhyt`
--
ALTER TABLE `thuocbhyt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `thuocbhyttheobenhnhan`
--
ALTER TABLE `thuocbhyttheobenhnhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thuoctheobenhnhan`
--
ALTER TABLE `thuoctheobenhnhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xuatkhoa`
--
ALTER TABLE `xuatkhoa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `FK_bacsi_chucvu` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `FK_bacsi_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `benhan`
--
ALTER TABLE `benhan`
  ADD CONSTRAINT `FK_benhan_bacsi` FOREIGN KEY (`bacsi`) REFERENCES `bacsi` (`id`),
  ADD CONSTRAINT `FK_benhan_benhnhan` FOREIGN KEY (`mabenhnhan`) REFERENCES `benhnhan` (`id`),
  ADD CONSTRAINT `FK_benhan_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`),
  ADD CONSTRAINT `FK_benhan_phong` FOREIGN KEY (`phong`) REFERENCES `phong` (`id`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `FK_benhnhan_nguoinha` FOREIGN KEY (`nguoinha`) REFERENCES `nguoinha` (`id`);

--
-- Constraints for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `FK_dichvu_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `dichvutheobenhnhan`
--
ALTER TABLE `dichvutheobenhnhan`
  ADD CONSTRAINT `FK_dichvutheobenhnhan_bacsi` FOREIGN KEY (`bacsithuchien`) REFERENCES `bacsi` (`id`),
  ADD CONSTRAINT `FK_dichvutheobenhnhan_benhan` FOREIGN KEY (`mabenhan`) REFERENCES `benhan` (`id`),
  ADD CONSTRAINT `FK_dichvutheobenhnhan_dichvu` FOREIGN KEY (`dichvu`) REFERENCES `dichvu` (`id`);

--
-- Constraints for table `thuocban`
--
ALTER TABLE `thuocban`
  ADD CONSTRAINT `FK_thuocban_nhaphanphoi` FOREIGN KEY (`nhaphanphoi`) REFERENCES `nhaphanphoi` (`id`);

--
-- Constraints for table `thuocbhyt`
--
ALTER TABLE `thuocbhyt`
  ADD CONSTRAINT `FK_thuocbhyt_nhaphanphoi` FOREIGN KEY (`nhaphanphoi`) REFERENCES `nhaphanphoi` (`id`);

--
-- Constraints for table `thuocbhyttheobenhnhan`
--
ALTER TABLE `thuocbhyttheobenhnhan`
  ADD CONSTRAINT `FK_thuocbhyttheobenhnhan_benhan` FOREIGN KEY (`mabenhan`) REFERENCES `benhan` (`id`),
  ADD CONSTRAINT `FK_thuocbhyttheobenhnhan_thuocbhyt` FOREIGN KEY (`thuocbhyt`) REFERENCES `thuocbhyt` (`id`);

--
-- Constraints for table `thuoctheobenhnhan`
--
ALTER TABLE `thuoctheobenhnhan`
  ADD CONSTRAINT `FK_thuoctheobenhnhan_benhan` FOREIGN KEY (`mabenhan`) REFERENCES `benhan` (`id`),
  ADD CONSTRAINT `FK_thuoctheobenhnhan_thuocban` FOREIGN KEY (`thuocmua`) REFERENCES `thuocban` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
