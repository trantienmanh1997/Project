-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2021 lúc 09:01 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pcmarketweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_user`, `admin_pass`, `level`) VALUES
(2, 'manh', 'manh1997@gmail.com', 'manhmomang', '32a2ffe86ffba26755eb377debf53552', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Asus'),
(2, 'Gigabyte'),
(3, 'Western Digital'),
(4, 'MSI'),
(5, 'Logitech'),
(6, 'SteelSeries'),
(8, 'Intel'),
(9, 'Amd'),
(10, 'BenQ'),
(11, 'Corsair'),
(12, 'Dell'),
(13, 'Edra'),
(20, 'Zotac'),
(24, 'CoolerMaster');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `sid`, `product_name`, `product_price`, `quantity`, `product_image`) VALUES
(33, 3, 'tlika20nv9kmdls10hmla4575c', 'Bàn phím Logitech G512', '1500000', 5, '996e9a3b3f.jpg'),
(34, 15, 'tlika20nv9kmdls10hmla4575c', 'Chip Intel i9 10900K', '14900000', 2, 'f33decb19e.jpg'),
(35, 2, 'tlika20nv9kmdls10hmla4575c', 'VGA RTX 2060 Super Aorus', '21000000', 4, 'b1a463a277.png'),
(36, 13, 'tlika20nv9kmdls10hmla4575c', 'Màn hình Asus Rog XG32VQR', '21000000', 1, 'f7c9514524.jpg'),
(37, 14, 'tlika20nv9kmdls10hmla4575c', 'Chip AMD Ryzen9 5950x', '19000000', 1, '8f29d04c14.png'),
(40, 3, 'tlika20nv9kmdls10hmla4575c', 'Bàn phím Logitech G512', '1500000', 1, '996e9a3b3f.jpg'),
(41, 19, 'tlika20nv9kmdls10hmla4575c', 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', '3100000', 2, '4b18fb2942.jpg'),
(42, 17, 'tlika20nv9kmdls10hmla4575c', 'RTX 3090 Rog Trix OC 12GB', '65000000', 2, '2dacc96286.jpg'),
(43, 3, '7a08u1klaljmvs4a3qp9uqn248', 'Bàn phím Logitech G512', '1500000', 4, '996e9a3b3f.jpg'),
(44, 19, '7a08u1klaljmvs4a3qp9uqn248', 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', '3100000', 6, '4b18fb2942.jpg'),
(45, 17, '7a08u1klaljmvs4a3qp9uqn248', 'RTX 3090 Rog Trix OC 12GB', '65000000', 2, '2dacc96286.jpg'),
(46, 15, 'j3vq3jin7rql49d4c56582r2hg', 'Chip Intel i9 10900K', '14900000', 3, 'f33decb19e.jpg'),
(51, 15, 'tofhuaav9g3ncm7gemm5ti2lnu', 'Chip Intel i9 10900K', '14900000', 3, 'f33decb19e.jpg'),
(52, 17, 'tofhuaav9g3ncm7gemm5ti2lnu', 'RTX 3090 Rog Trix OC 12GB', '65000000', 1, '2dacc96286.jpg'),
(53, 19, 'tofhuaav9g3ncm7gemm5ti2lnu', 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', '3100000', 2, '4b18fb2942.jpg'),
(64, 17, '6d0u8vc9k7s946rtvej7qtjfq6', 'RTX 3090 Rog Trix OC 12GB', '65000000', 1, '2dacc96286.jpg'),
(65, 19, '6d0u8vc9k7s946rtvej7qtjfq6', 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', '3100000', 1, '4b18fb2942.jpg'),
(66, 15, '6d0u8vc9k7s946rtvej7qtjfq6', 'Chip Intel i9 10900K', '14900000', 1, 'f33decb19e.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`) VALUES
(2, 'Card Màn Hình'),
(3, 'CPU-Bộ vy xử lý'),
(4, 'MainBoard-Bo mạch chủ'),
(5, 'Ram- Bộ nhớ trong'),
(6, 'Màn hình máy tính'),
(7, 'Case-Vỏ máy tính'),
(8, 'PSU - Nguồn máy tính'),
(10, 'Chuột máy tính'),
(11, 'Tai nghe'),
(13, 'Ổ cứng SSD/HDD'),
(15, 'Bàn phím'),
(17, 'Ghế chơi game gaming'),
(26, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `product_id`, `product_name`, `product_price`, `product_image`) VALUES
(13, 5, 19, 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', '3100000', '4b18fb2942.jpg'),
(14, 5, 15, 'Chip Intel i9 10900K', '14900000', 'f33decb19e.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  `cus_city` varchar(30) NOT NULL,
  `cus_zipcode` varchar(30) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_country` varchar(300) NOT NULL,
  `cus_phone` varchar(30) NOT NULL,
  `cus_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `cus_name`, `cus_address`, `cus_city`, `cus_zipcode`, `cus_email`, `cus_country`, `cus_phone`, `cus_password`) VALUES
(5, 'Mạnh Mạnh', 'số 33A Khâm Thiên', 'Hà Nội', '121997', 'manhmomang97@gmail.com', 'VN', '0123456789', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Hiền', 'Đội cấn', 'Hà Nội', '141614142', 'hienhien98@gmail.com', 'VN', '0123456789', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `product_id`, `product_name`, `customer_id`, `quantity`, `product_price`, `product_image`, `order_date`, `order_status`) VALUES
(87, 2, 'VGA RTX 2060 Super Aorus', 5, '1', '21000000', 'b1a463a277.png', '2021-04-04 08:20:43', 0),
(88, 19, 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', 5, '1', '3100000', '4b18fb2942.jpg', '2021-04-04 08:20:43', 0),
(89, 16, 'Ghế Edra EGC203', 5, '1', '35000000', '99376a6a93.jpg', '2021-04-04 08:20:43', 0),
(90, 16, 'Ghế Edra EGC203', 5, '1', '35000000', '99376a6a93.jpg', '2021-04-04 08:21:15', 0),
(91, 15, 'Chip Intel i9 10900K', 5, '1', '14900000', 'f33decb19e.jpg', '2021-04-04 08:21:15', 0),
(92, 25, 'Mainboard ASUS ROG Z590 MAXIMUS XIII EXTREME GLACIAL', 5, '1', '15900000', 'c7b8d9ff7a.jpg', '2021-04-04 08:21:15', 0),
(93, 19, 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', 5, '1', '3100000', '4b18fb2942.jpg', '2021-04-04 08:21:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_content` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cate_id`, `brand_id`, `product_content`, `product_price`, `product_image`, `product_type`) VALUES
(2, 'VGA RTX 2060 Super Aorus', 2, 2, 'Còn hàng', '21000000', 'b1a463a277.png', 1),
(3, 'Bàn phím Logitech G512', 15, 5, 'Còn hàng', '1500000', '996e9a3b3f.jpg', 0),
(12, 'Tai nghe artics 7', 11, 6, '<p>Còn hàng</p>', '15000000', '650a310e63.jpg', 0),
(13, 'Màn hình Asus Rog XG32VQR', 6, 1, '<p>C&ograve;n h&agrave;ng</p>', '21000000', 'f7c9514524.jpg', 1),
(14, 'Chip AMD Ryzen9 5950x', 3, 9, '<p>Hết hàng</p>', '19000000', '8f29d04c14.png', 0),
(15, 'Chip Intel i9 10900K', 3, 8, '<p>Còn hàng</p>', '14900000', 'f33decb19e.jpg', 1),
(16, 'Ghế Edra EGC203', 17, 13, 'Còn hàng', '35000000', '99376a6a93.jpg', 0),
(17, 'RTX 3090 Rog Trix OC 12GB', 2, 1, '<p>C&ograve;n h&agrave;ng</p>', '65000000', '2dacc96286.jpg', 1),
(19, 'RAM Desktop Corsair DOMINATOR PLATINUM RGB 16GB (2x8GB) DDR4 3200MHz', 5, 11, '<p>C&ograve;n h&agrave;ng</p>', '3100000', '4b18fb2942.jpg', 1),
(20, 'Màn hình Gigabyte Aorus FI27QD', 6, 2, '<p>Còn hàng</p>', '12800000', '3ac49373ef.jpg', 0),
(21, 'HDD Western Digital 2TB', 13, 3, '<p>C&ograve;n h&agrave;ng</p>', '1500000', '68ea9ddfbe.jpg', 1),
(22, 'Chuột Steel Series Rival 3', 10, 6, '<p>Hết h&agrave;ng</p>', '900000', 'effa22c209.jpg', 0),
(23, 'Nguồn CoolerMaster 850w plus gold', 8, 24, '<p>Còn hàng</p>', '2700000', 'fbf0658c5a.jpg', 0),
(24, 'Case Aorus C700', 7, 2, '<p>C&ograve;n h&agrave;ng</p>', '9900000', '15b62149d2.jpg', 1),
(25, 'Mainboard ASUS ROG Z590 MAXIMUS XIII EXTREME GLACIAL', 4, 1, '<p>Hết hàng</p>', '15900000', 'c7b8d9ff7a.jpg', 0),
(26, 'VGA RTX 3090 Gaming X trio', 2, 4, '<p>C&ograve;n h&agrave;ng</p>', '3000000', 'd2e7af7481.jpg', 1),
(27, 'Intel i9 9900K', 3, 8, '<p>C&ograve;n h&agrave;ng</p>', '12900000', '456ddc06e0.jpg', 1),
(28, 'Intel i9 11900k', 3, 8, '<p>Hết h&agrave;ng</p>', '19990000', 'fd37617261.jpg', 1),
(29, 'intel i7 9700K', 3, 8, '<p>Hết h&agrave;ng</p>', '5700000', '8c5c69f4dd.jpg', 1),
(30, 'LAPTOP ASUS ROG STRIX G15 G512-IAL013T', 26, 1, '<p>C&ograve;n h&agrave;ng</p>', '23500000', '42c6dd1687.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `slider_type`) VALUES
(18, 'Slider 1', '2526565527.jpg', 1),
(19, 'slider 2', '7b5c5f1136.jpg', 1),
(20, 'slider 3 ', '21bf9c0efb.jpg', 1),
(21, 'slider 4', '16e0d1aa53.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `product_id`, `product_name`, `product_price`, `product_image`) VALUES
(2, 5, 13, 'Màn hình Asus Rog XG32VQR', '21000000', 'f7c9514524.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
