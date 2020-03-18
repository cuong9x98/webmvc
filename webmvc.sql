-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 11:19 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(256) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'cuong', 'cuong9x98@gmail.com', 'cuong9x98', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Dell'),
(2, 'SamSung'),
(6, 'OPPO'),
(7, 'Xiaomi'),
(8, 'HP'),
(9, 'Acer'),
(10, 'Lenovo'),
(11, 'MSI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `carId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(200) NOT NULL,
  `quarity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`carId`, `productId`, `sId`, `productName`, `price`, `quarity`, `image`) VALUES
(17, 14, '2co4u5r4pg3ka9s7agop4ktjvj', 'Dell E720', 4997000, 10, 'ff6955cb92.jpg'),
(18, 13, '2co4u5r4pg3ka9s7agop4ktjvj', 'Sam Sung E1200', 370000, 2, 'b4a0958969.jpg'),
(22, 14, 't36dn25mnocgurjjipkmkjt6dt', 'Dell E720', 4997000, 3, 'ff6955cb92.jpg'),
(23, 13, 't36dn25mnocgurjjipkmkjt6dt', 'Sam Sung E1200', 370000, 2, 'b4a0958969.jpg'),
(31, 14, '3v8m5djl5efjipk09l5joepug9', 'Dell E720', 4997000, 1, 'ff6955cb92.jpg'),
(32, 13, '3v8m5djl5efjipk09l5joepug9', 'Sam Sung E1200', 370000, 2, 'b4a0958969.jpg'),
(64, 18, 'okku1s1vso3a7136640hovq1fn', 'Laptop Dell Latitude E5440', 4650000, 1, 'c869376162.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(17, 'Điện Thoại'),
(18, 'Laptop'),
(19, 'Chuột'),
(20, 'Bàn phím'),
(21, 'Bút trình chiếu');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(5, 'Đỗ Quốc Cường', 'Thôn Châu Phong', 'Hà Nội', 'VN', 'Cầu Giấy', '0349077770', 'cuong9x98@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Đỗ Văn Thịnh', 'Liên Hà', 'Hà Nội', 'VN', 'Liên hà', '0399515436', 'thinh2507@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(256) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quarity` int(11) NOT NULL,
  `price` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `productId`, `productName`, `customer_id`, `quarity`, `price`, `image`, `status`, `date_order`) VALUES
(6, 17, 'Acer Aspire A315', 0, 1, '10590000', 'bcc9015f11.png', 1, '2020-02-16 22:17:12'),
(7, 16, 'Laptop Lenovo ThinkPad L380', 0, 1, '17300000', '49c0417484.jpg', 0, '2020-02-16 22:29:24'),
(8, 11, 'Xiaomi Redmi Note 7', 0, 2, '8040000', '3ab99c2a66.png', 0, '2020-02-16 22:29:52'),
(9, 14, 'Dell E720', 0, 2, '9994000', 'ff6955cb92.jpg', 0, '2020-02-16 22:35:58'),
(10, 17, 'Acer Aspire A315', 0, 3, '31770000', 'bcc9015f11.png', 0, '2020-02-16 22:40:46'),
(11, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-16 22:42:11'),
(12, 14, 'Dell E720', 0, 2, '9994000', 'ff6955cb92.jpg', 0, '2020-02-16 22:46:01'),
(13, 15, 'Laptop HP ProBook 450 G6 6FH07PA', 0, 1, '22900000', '78ca3aabce.jpg', 0, '2020-02-16 22:50:42'),
(14, 18, 'Laptop Dell Latitude E5440', 0, 3, '13950000', 'c869376162.jpeg', 0, '2020-02-16 23:23:38'),
(15, 14, 'Dell E720', 0, 2, '9994000', 'ff6955cb92.jpg', 0, '2020-02-17 00:15:09'),
(16, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-17 00:19:59'),
(17, 14, 'Dell E720', 0, 1, '4997000', 'ff6955cb92.jpg', 0, '2020-02-17 00:28:05'),
(18, 17, 'Acer Aspire A315', 0, 1, '10590000', 'bcc9015f11.png', 0, '2020-02-17 00:31:31'),
(19, 16, 'Laptop Lenovo ThinkPad L380', 0, 1, '17300000', '49c0417484.jpg', 0, '2020-02-17 00:31:31'),
(20, 16, 'Laptop Lenovo ThinkPad L380', 0, 1, '17300000', '49c0417484.jpg', 0, '2020-02-17 00:32:53'),
(21, 16, 'Laptop Lenovo ThinkPad L380', 0, 1, '17300000', '49c0417484.jpg', 0, '2020-02-17 00:55:23'),
(22, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-17 00:55:23'),
(23, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-17 02:21:25'),
(24, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-17 02:41:54'),
(25, 16, 'Laptop Lenovo ThinkPad L380', 0, 1, '17300000', '49c0417484.jpg', 0, '2020-02-17 02:42:17'),
(26, 18, 'Laptop Dell Latitude E5440', 0, 1, '4650000', 'c869376162.jpeg', 0, '2020-02-18 01:22:45'),
(27, 14, 'Dell E720', 0, 1, '4997000', 'ff6955cb92.jpg', 0, '2020-02-18 01:22:46'),
(28, 18, 'Laptop Dell Latitude E5440', 0, 3, '13950000', 'c869376162.jpeg', 0, '2020-02-18 03:07:48'),
(29, 14, 'Dell E720', 0, 1, '4997000', 'ff6955cb92.jpg', 0, '2020-02-18 03:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'Sam Sung Galaxy A5-6GB-128GB', 17, 2, '<p>Samsung Galaxy A51 6GB|128GB &ndash; H&agrave;ng ch&iacute;nh h&atilde;ng</p>', 1, '6990000', '81c8c9ae0c.png'),
(6, 'Sam Sung Galaxy M10', 17, 2, '<p>H&agrave;ng ph&acirc;n kh&uacute;c ch&iacute;nh thức</p>', 0, '2449000', 'a8d86eaa0e.jpg'),
(7, 'Samsung Galaxy Note10', 17, 2, '<p>Thiết kế mỏng nhẹ,sang chảnh với nhiều m&agrave;u lựa chọn</p>', 1, '18590000', 'a11ef32722.png'),
(8, 'OPPO Reno 10x', 17, 6, '<p>Camera trước v&acirc;y c&aacute; mập,M&agrave;n h&igrave;nh to&agrave;n cảnh Panoramic.</p>', 1, '16990000', 'b2c05a0efa.jpg'),
(9, 'OPPO A1K', 17, 6, '<p>Điện thoại OPPO A1K h&agrave;ng ch&iacute;nh h&atilde;ng.</p>', 0, '2650000', '4c8865eb0b.jpg'),
(10, 'OPPO A9 2020', 17, 6, '<p><span style=\"font-size: 10px;\">Kế thừa phi&ecirc;n bản oppo A7 đ&atilde; từng g&acirc;y hot trước đ&oacute;, oppo A9(2020) c&oacute; nhiều sự cải tiến hơn về m&agrave;n h&igrave;nh, camera v&agrave; hiệu năng.</span></p>', 1, '5350000', '9e21813dc8.jpg'),
(11, 'Xiaomi Redmi Note 7', 17, 7, '<p>M&aacute;y sở hữu cho m&igrave;nh mặt lưng bằng k&iacute;nh phối m&agrave;u&nbsp;<span>gradient&nbsp;<span>4 g&oacute;c m&aacute;y được tăng cường độ bền đ&aacute;ng kể gi&uacute;p chống vỡ k&iacute;nh gấp 4 lần</span></span></p>', 0, '4020000', '3ab99c2a66.png'),
(12, 'Xiaomi Redmi A8', 17, 7, '<p>Xioami A8&nbsp;<span>được trang bị vi&ecirc;n pin c&oacute; dung lượng cực lớn, l&ecirc;n tới 5000 mAh, cho bạn thỏa sức trải nghiệm cả ng&agrave;y, chẳng cần bận t&acirc;m qu&aacute; nhiều đến thời lượng pin.</span></p>', 1, '2540000', 'd173559461.jpg'),
(13, 'Sam Sung E1200', 17, 2, '<p><span>Điện thoại gi&aacute; rẻ tiện dụng - pin l&ecirc;n tới 30 ng&agrave;y.</span></p>\r\n<p><span><span>E1200 c&oacute; thiết kế thanh mảnh v&agrave; hiện đại, m&aacute;y chỉ nặng 65,1g.</span></span></p>', 0, '370000', 'b4a0958969.jpg'),
(14, 'Dell E720', 18, 1, '<p><span>D&ograve;ng laptop Ultrabo&oacute;k</span><span>&nbsp;si&ecirc;u bền</span><span>, vỏ nh&ocirc;m, nhỏ gọn, đẹp keng !</span></p>', 0, '4997000', 'ff6955cb92.jpg'),
(15, 'Laptop HP ProBook 450 G6 6FH07PA', 18, 8, '<p><span>Bạn l&agrave; doanh nh&acirc;n v&agrave; đang kiếm cho m&igrave;nh một mẫu&nbsp;laptop&nbsp;để trợ gi&uacute;p cho đặc th&ugrave; c&ocirc;ng việc của m&igrave;nh th&igrave; bạn phải chọn một chiếc&nbsp;laptop&nbsp;phải bền bỉ, thiết kế mang đậm t&iacute;nh thời trang, thời lượng&nbsp;pin&nbsp;sử dụng l&acirc;u v&agrave; nhất l&agrave; t&iacute;nh bảo mật cao. Để đ&aacute;p ứng c&aacute;c yếu tố thiết yếu tr&ecirc;n gia đ&igrave;nh Probook của&nbsp;HP&nbsp;vừa tr&igrave;nh l&agrave;ng một sản phẩm&nbsp;laptop&nbsp;mang t&ecirc;n&nbsp;Laptop&nbsp;HP&nbsp;450 G6-6FG97PA với thiết kế đ&aacute;p ứng người d&ugrave;ng văn ph&ograve;ng, doanh nh&acirc;n với c&aacute;c ti&ecirc;u ch&iacute; h&agrave;i h&ograve;a giữa t&iacute;nh di động, bảo mật thiết yếu v&agrave; độ tin cậy theo chuẩn qu&acirc;n đội MTD-STD 810G.</span></p>', 1, '22900000', '78ca3aabce.jpg'),
(16, 'Laptop Lenovo ThinkPad L380', 18, 10, '<p><span>Laptop Lenovo ThinkPad L380 20M5S01200 Core i5-8250U/ Dos (13.3\" FHD IPS) - H&agrave;ng Ch&iacute;nh H&atilde;ng vẫn sở hữu ngoại h&igrave;nh vu&ocirc;ng vức, chắc chắn v&agrave; cứng c&aacute;p, c&oacute; phần nam t&iacute;nh, đ&uacute;ng chất của một cỗ m&aacute;y chuy&ecirc;n dụng cho c&ocirc;ng việc. B&ecirc;n cạnh m&agrave;u đen nh&aacute;m phủ nhung dạng soft touch truyền thống, m&aacute;y c&oacute; th&ecirc;m t&ugrave;y chọn m&agrave;u x&aacute;m bạc với lớp vỏ kim loại kh&aacute; bắt mắt, tạo được n&eacute;t mới lạ, sang trọng cho d&ograve;ng sản phẩm đ&atilde; c&oacute; hơn 25 năm tuổi đời n&agrave;y.</span></p>', 1, '17300000', '49c0417484.jpg'),
(17, 'Acer Aspire A315', 18, 9, '<p><span>Nếu như thiết kế của d&ograve;ng Aspire 3 trước đ&acirc;y kh&ocirc;ng c&oacute; g&igrave; ấn tượng th&igrave; Acer Aspire A315 54 34U đ&atilde; thay đổi một c&aacute;ch đột ph&aacute;. Bạn sẽ c&oacute; một thiết kế ho&agrave;n to&agrave;n mới theo phong c&aacute;ch đơn giản, hiện đại đ&uacute;ng xu thế, vượt ra khỏi tầm của laptop gi&aacute; rẻ. Viền m&agrave;n h&igrave;nh được l&agrave;m mỏng đ&aacute;ng kể, cho trải nghiệm xem tốt hơn đồng thời gi&uacute;p laptop gọn g&agrave;ng hơn. Những đường v&aacute;t tinh tế tạo n&ecirc;n chiếc laptop thời trang, phong c&aacute;ch v&agrave; v&ocirc; c&ugrave;ng mỏng nhẹ. Với trọng lượng chỉ 1,7 kg cho một chiếc laptop 15,6 inch, Aspire A315 mới rất dễ để di chuyển, tiện lợi cho c&ocirc;ng việc của bạn.</span></p>', 1, '10590000', 'bcc9015f11.png'),
(18, 'Laptop Dell Latitude E5440', 18, 1, '<p><span>Th&ocirc;ng số kỹ thuật Laptop cũ Dell Latitude E5440 h&agrave;ng đẹp- Vỏ nh&ocirc;m</span></p>', 0, '4650000', 'c869376162.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
