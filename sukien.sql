-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 06:19 PM
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
(0, 'Khác'),
(2, 'TP. Hồ Chí Minh'),
(4, 'Yên Bái');

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
  `tickets` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_sukien`, `name`, `diachi`, `email`, `phone`, `tickets`, `price`, `status`) VALUES
(1, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 0, 30000, 1),
(3, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 0, 30000, 0),
(4, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 0, 30000, 0),
(5, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 0, 30000, 0),
(6, 1, 'Huy Le Tien', 'Hà Nội', 'letienhuy.dev@gmail.com', '01203674653', 0, 30000, 0);

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
(14, 'Sự kiện Triển lãm Quốc tế Công nghệ Môi trường và Năng lượng Năm 2018', 'https://sukien.net/uploads/images/event-su-kien-trien-lam-quoc-te-cong-nghe-moi-truong-va-nang-luong-nam-2018-1350-x-500-1524101021.jpg', 10000, '10:00:00', '17:00:00', '<p>&nbsp;</p>\n\n<p><strong>THƯ MỜI&nbsp;</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>K&iacute;nh gửi&nbsp;Anh/Chị,</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><br />\n<br />\nThay mặt&nbsp;<strong>Ban tổ chức Triển l&atilde;m Quốc tế C&ocirc;ng nghệ M&ocirc;i trường v&agrave; Năng lượng 2018 (ENTECH 2018)</strong>, ch&uacute;ng t&ocirc;i tr&acirc;n trọng k&iacute;nh mời&nbsp;<strong>Qu&yacute; c&ocirc;ng ty</strong>&nbsp;tham dự&nbsp;<strong>Triển l&atilde;m &quot;ENTECH 2018&quot;&nbsp;- Top 7 Triển l&atilde;m hấp dẫn doanh nghiệp nhất do Bộ tri thức Kinh tế H&agrave;n Quốc khuyến nghị.</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<h2>Những ai tham gia triển l&atilde;m:</h2>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Hội chợ thu h&uacute;t hơn 180 đơn vị trong v&agrave; ngo&agrave;i nước tham gia triển l&atilde;m. C&aacute;c c&ocirc;ng ty hoạt động trong những l&atilde;nh vực sau:</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Sản phẩm v&agrave; c&ocirc;ng nghệ tiết kiệm năng lượng</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Năng lượng t&aacute;i tạo, năng lượng mới, nguồn năng lượng</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Giao th&ocirc;ng vận tải, Xăng dầu &amp; kh&iacute; đốt</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Than &amp; năng lượng tập hợp</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Tư vấn C&aacute;c dịch vụ tư vấn, phần mềm quản l&yacute;, kết quả nghi&ecirc;n cứu phục vụ hoạt động tiết kiệm năng lượng: tổ chức, doanh nghiệp&hellip;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>C&aacute;c sản phẩm gia dụng hiệu suất cao, tiết kiệm năng lượng</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Sản phẩm c&ocirc;ng nghệ xử l&yacute; v&agrave; bảo vệ m&ocirc;i trường</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>C&ocirc;ng nghệ xử l&yacute; chất thải c&ocirc;ng nghiệp</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>C&ocirc;ng nghệ xử l&yacute; m&ocirc;i trường phục vụ sinh hoạt</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Quan trắc, ph&acirc;n t&iacute;ch m&ocirc;i trường;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Tư vấn m&ocirc;i trường v&agrave; chuyển giao c&ocirc;ng nghệ Ứng ph&oacute; sự cố m&ocirc;i trường, &ocirc; nhiễm do tr&agrave;n dầu</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><br />\n<br />\nSự kiện sẽ được diễn ra v&agrave;o&nbsp;<strong>ng&agrave;y 10 th&aacute;ng 5 năm 2018 tại&nbsp;799 Nguyễn Văn Linh, Phường T&acirc;n Ph&uacute;, Quận 7, Th&agrave;nh phố Hồ Ch&iacute;&nbsp;Minh.</strong><br />\n<br />\n<br />\n<br />\nSự kiện sẽ l&agrave;&nbsp;<strong>cơ hội xuất sắc</strong>&nbsp;để&nbsp;<strong>Qu&yacute; C&ocirc;ng ty</strong>:<br />\n<br />\n&nbsp;<br />\n<br />\n<em>1. Tiếp x&uacute;c với kh&aacute;ch h&agrave;ng tiềm năng v&agrave; đối thủ, đ&aacute;nh gi&aacute; xu hướng ph&aacute;t triển thị trường, thị hiếu ti&ecirc;u d&ugrave;ng.<br />\n<br />\n2. Quảng b&aacute; h&igrave;nh ảnh, thương hiệu c&ocirc;ng ty, khẳng định vị thế của m&igrave;nh tr&ecirc;n trường quốc tế.<br />\n<br />\n3. Mở rộng, thiết lập mối quan hệ với đối t&aacute;c Quốc tế.</em><br />\n<br />\n<br />\n<br />\nĐặc biệt ch&uacute;ng t&ocirc;i gửi đến&nbsp;<strong>Qu&yacute; C&ocirc;ng ty</strong>&nbsp;lời đề nghị hấp dẫn từ ph&iacute;a c&aacute;c c&ocirc;ng ty H&agrave;n Quốc về một&nbsp;<strong>buổi gặp gỡ trực tiếp</strong>. Th&ocirc;ng qua đ&oacute;, c&oacute; thể gi&uacute;p&nbsp;<strong>Qu&yacute; C&ocirc;ng ty</strong>&nbsp;c&oacute;&nbsp;Cơ hội&nbsp;<strong>hợp t&aacute;c với c&aacute;c đối t&aacute;c H&agrave;n Quốc.</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Tr&acirc;n trọng,&nbsp;<br />\n<br />\n<strong>Ban tổ chức &quot;ENTECH 2018&quot;</strong><br />\n<br />\n<br />\n<br />\n&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', 100, 0, 'Trung Tâm Hội Chợ Triển Lãm Sài Gòn SECC 799 Nguyễn Văn Linh, P: Tân Phú, Q:7, TP.HCM, Quận 7, Thành Phố Hồ Chí Minh ', '2018-05-10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
