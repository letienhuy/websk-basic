-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 06:07 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sukien`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `hoten`) VALUES
(1, 'admin', '123', 'Huy Le Tien'),
(2, 'huy', '123', 'Le Tien Huy');

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`id`, `name`) VALUES
(1, 'Hà Nội'),
(2, 'TP. Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `id_sukien` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_sukien`, `name`, `diachi`, `email`, `phone`, `price`, `status`) VALUES
(1, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 30000, 0),
(3, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 30000, 0),
(4, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 30000, 0),
(5, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 30000, 0),
(6, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 30000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

CREATE TABLE `sukien` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  `about` text NOT NULL,
  `total_tickets` int(11) NOT NULL,
  `id_diadiem` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `date_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sukien`
--

INSERT INTO `sukien` (`id`, `name`, `poster`, `price`, `time_start`, `time_stop`, `about`, `total_tickets`, `id_diadiem`, `diachi`, `date_start`) VALUES
(1, 'Coatings Expo Vietnam 2018', 'https://sukien.net/uploads/images/event-coatings-expo-vietnam-2018-coat-son-mau-1517566309.png', 10000, '08:00:00', '10:00:00', 'Coatings Expo Việt Nam 2018 - Triển lãm Quốc tế lần thứ 5 chuyên ngành công nghiệp Sơn phủ - Mực in Việt Nam 2018\r\n\r\nNgày diễn ra triển lãm: 13 -15 tháng 6 năm 2018\r\n\r\nThời gian mở cửa: từ 9.00 sáng – 17.00 chiều\r\n\r\nĐịa điểm tổ chức: Trung tâm Hội chợ và Triển lãm Sài Gòn (SECC),799 Nguyễn Văn Linh, Tân Phú, Quận 7, Hồ Chí Minh\r\n\r\nTrên thị trường sơn và chất phủ Việt Nam nói chung, các sản phẩm của doanh nghiệp trong nước đã có thị phần đáng kể. Thị trường sơn và chất phủ là một bức tranh đa sắc với cơ hội và thách thức đan xen lẫn nhau cho cả doanh nghiệp trong nước lẫn nước ngoài. Hiên nay, chính phủ đang chú trọng phát triển ngành công nghiệp sơn - mực in theo hướng từng bước loại bỏ các công nghệ, thiết bị lạc hậu bằng các công nghệ, thiết bị tiên tiến, hạn chế sử dụng các nguyên liệu, hóa chất nguy hại tới môi trường sinh thái và sức khỏe con người, tạo ra các sản phẩm có chất lượng tốt và giá trị cao. Tập trung đầu tư vào các nhóm sản phẩm có giá trị sử dụng cao, đặc biệt chú trọng đầu tư phát triển sản xuất các loại nhựa tạo màng, bột màu, hóa chất, phụ gia cho ngành. Đây là cơ hội tiềm năng cho các doanh nghiệp sản xuất/ cung cấp máy móc- trang thiết bị- hóa chất….. ngành sơn phủ và mực in.\r\n\r\nĐược sự ủng hộ mạnh mẽ của Cục Hóa chất - Bộ Công Thương, Hiệp hội Sơn và Mực in Việt Nam (VPIA), Triển lãm Coatings Expo Việt Nam 2018 do công ty dịch vụ quảng cáo và triển lãm Minh Vi (VEAS) phối hợp Trung tâm CNCIC tổ chức, sẽ diễn ra vào 13-15 tháng 6 năm 2018 tại trung tâm hội chợ và triển lãm Sài Gòn SECC, Quận 7, Hồ Chí Minh.\r\n', 50, 2, '35 Nguyễn Chánh,Phước NGuyên, TP Bà Rịa, BRVT', '2018-04-29'),
(2, 'Diễn đàn thương hiệu Việt B2B', 'https://sukien.net/uploads/images/event-dien-dan-thuong-hieu-viet-b2b-banner-sk-to-tr-n-sukien-net-1522140307.jpg', 0, '13:00:00', '16:00:00', '<img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/Slide1.JPG\" style=\"width: 960px; height: 720px;\" /></p>\r\n\r\n<p><span style=\"font-size:20px;\"><span style=\"color:#d35400;\"><strong>V&Agrave; Đ&Acirc;Y L&Agrave; GIẢI PH&Aacute;P CH&Uacute;NG T&Ocirc;I MUỐN THỰC HIỆN C&Ugrave;NG C&Aacute;C NH&Agrave; CUNG CẤP THƯƠNG HIỆU VIỆT:</strong></span></span></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/gi%E1%BA%A3i%20ph%C3%A1p%20Avina.png\" style=\"width: 841px; height: 553px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/Presentation1.jpg\" style=\"width: 960px; height: 720px;\" /></p>\r\n\r\n<p><span style=\"font-size:20px;\"><span style=\"color:#d35400;\"><strong>5 LỢI &Iacute;CH LỚN NHẤT D&Agrave;NH CHO C&Aacute;C DOANH NGHIỆP THAM DỰ SỰ KIỆN</strong></span></span></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/5%20l%E1%BB%A3i%20%C3%ADch%20doanh%20nghi%E1%BB%87p%20s%E1%BA%BD%20nh%E1%BA%ADn%20%C4%91%C6%B0%E1%BB%A3c%20khi%20tham%20gia%20sk.png\" style=\"width: 1450px; height: 938px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/Slide3.JPG\" style=\"width: 960px; height: 720px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/s%C3%A1ng%20l%E1%BA%ADp%20Th%C3%B9y%20Ch%C3%A2m.jpg\" style=\"width: 960px; height: 720px;\" /></p>\r\n\r\n<p><span style=\"font-size:20px;\"><span style=\"color:#d35400;\"><b><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">ĐIỀU KIỆN THAM GIA</span></span></b></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1, Ho&agrave;n th&agrave;nh ph&iacute; tham gia với BTC trước&nbsp; ng&agrave;y diễn ra sự kiện (đối với loại v&eacute;&nbsp; Super VIP v&agrave; v&eacute; VIP)</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">2. Điền đầy đủ th&ocirc;ng tin về Họ v&agrave; t&ecirc;n, email, sdt của người tham dự (đối với v&eacute; thường).</span></span></span></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/chamlovie@gmail.com/images/qu%C3%A0%20t%E1%BA%B7ng%20d%C3%A0nh%20cho%20doanh%20nh%C3%A2n.jpg\" style=\"width: 960px; height: 720px;\" /></p>\r\n\r\n<p><span style=\"color:#d35400;\"><span style=\"font-size:20px;\">AVINA TR&Acirc;N QU&Yacute; SỰ CHIA SẺ DỰ &Aacute;N N&Agrave;Y C&Ugrave;NG CỘNG ĐỒNG NH&Agrave; CUNG CẤP THƯƠNG HIỆU VIỆT!</span></span></p>\r\n\r\n<p><span style=\"color:#d35400;\"><span style=\"font-size:20px;\">H&Acirc;N HẠNH ĐƯỢC Đ&Oacute;N TIẾP V&Agrave; GẶP GỠ QU&Yacute; DOANH NH&Acirc;N!</span></span></p>\r\n\r\n<p>&nbsp;</p>', 50, 1, '35 Nguyễn Chánh,Phước NGuyên, TP Bà Rịa, BRVT', '2018-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
