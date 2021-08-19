-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project_csemn`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(2) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `office` varchar(100) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `bank_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank`, `office`, `fullname`, `bank_number`) VALUES
(2, 'ออมสิน', 'บางปะอิน', 'นนทวัฒน์ แหล่พั่ว', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(2) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`) VALUES
(1, '185b57a7315df4d3a2a0b14b1d419f54.png'),
(2, '94ce76cbb94999125bd2adaa1c086f35.png'),
(3, 'f11c3881f9854a3b69d7399bdeebacb1.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(2, 'Asus'),
(3, 'Lenovo'),
(4, 'Redmi'),
(5, 'Huawei'),
(6, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `contact`) VALUES
(1, 'Facebook', 'View View'),
(2, 'Line', '@viewview_2878'),
(3, 'Tel.', '0631014897'),
(4, 'Email', 'admin@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `address` longtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `payment` int(1) NOT NULL,
  `bank_id` int(2) DEFAULT NULL,
  `shippingCost` int(5) NOT NULL,
  `total` int(11) NOT NULL,
  `image_payment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pre_order`
--

CREATE TABLE `pre_order` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(2) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `code`, `product`, `details`, `price`, `quantity`, `image`, `views`, `created_at`) VALUES
(4, 2, 'PD640800001', 'SMARTPHONE (สมาร์ทโฟน) ASUS ROG PHONE 5 256GB/16GB (PHANTOM BLACK)', '<p>&bull; Processor : Snapdragon 888 5G / Adreno 660<br />\r\n&bull; Display : 6.78&quot; (2448 x 1080) 144 Hz / 1 ms<br />\r\n&bull; Storage : 256GB<br />\r\n&bull; Memory : 16GB</p>\r\n', 29990, 100, 'ae29b09f65ffee65db1b0bf003311eb4.jpg', NULL, '2021-08-16 13:49:02'),
(5, 3, 'PD640800005', 'SMARTPHONE (สมาร์ทโฟน) LENOVO LEGION PHONE DUEL 2 12GB/128GB (TITANIUM WHITE)', '<p>&bull; Processor : Snapdragon 888 5G / Adreno 660<br />\r\n&bull; Display : 6.92&quot; FHD (2460 x 1080) 144Hz<br />\r\n&bull; Storage : 128GB<br />\r\n&bull; Memory : 12GB</p>\r\n', 22990, 100, '744170e633c897e0816171663ac686f8.jpg', NULL, '2021-08-16 13:50:27'),
(6, 5, 'PD640800006', 'SMARTPHONE (สมาร์ทโฟน) HUAWEI NOVA7 [HW-NOVA7-(PU)] - PURPLE', '<ul>\r\n	<li>Octa-Core 2.58GHz+2.4GHz+1.84GHz</li>\r\n	<li>32MP Front</li>\r\n	<li>64MP+8MP+8MP+2MP Back</li>\r\n</ul>\r\n', 16900, 100, '7147e313cb263e022482919eca29cd28.jpg', NULL, '2021-08-16 14:43:36'),
(7, 4, 'PD640800007', 'SMARTPHONE (สมาร์ทโฟน) REDMI 9C 6.53\" 5MP (13+2+2MP) 3/64GB SUNRISE ORANGE', '<ul>\r\n	<li>CPU : 6.53 &quot;HD + Dot DROP จอแสดงผล</li>\r\n	<li>RAM + ROM : 3GB + 64GB</li>\r\n	<li>กล้อง : 13 MP AI Triple กล้อง + 5MP กล้องด้านหน้า</li>\r\n	<li>แบตเตอรี่ : 5000mAh(Typ)</li>\r\n	<li>OS : MIUI,Global Version,สนับสนุน OTA Update</li>\r\n	<li>WIFI, Bluetooth 5.0, GPS, OTG</li>\r\n</ul>\r\n', 3699, 100, 'e06b2e9be91f8f51546f54fc8d31f2f8.jpg', NULL, '2021-08-16 14:45:35'),
(8, 6, 'PD640800008', 'SMARTPHONE (สมาร์ทโฟน) XIAOMI REDMI NOTE 10 PRO 6.67', '<p>618 GPU/6GB+64GB | 6GB+128GB | 8GB+128GB LPDDR4X RAM + UFS 2.2/6.67&quot; AMOLED DotDisplay/108MP+8MP+5MP+2MP/16MP/5020mAh/2.4GHz/5GHz Wi-Fi บลูทูธ 5.1/MIUI 12 บน Android 11</p>\r\n', 8990, 100, '46188263c0c54ad7515c8f7b5cf91172.jpg', NULL, '2021-08-16 14:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `title`) VALUES
(1, '35'),
(2, 'CSEMN Shopping Online'),
(3, 'CSEMN Shopping Online'),
(4, 'Website Description'),
(5, 'JXqFg1nOAobVMvwOGUOkjR2Ccf4sSWZOihZhHsQKf3Z');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `admin`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$.mdYTYMeOmn2yDIOqV2zqODHwRARHmX/BAXqX2q0a4i/.9ArdJ4J6', 1, '2021-05-29 08:31:17'),
(2, 'viewview', 'นนทวัฒน์', 'แหล่พั่ว', 'viewview2878@gmail.com', '$2y$10$k2cLduegSzFD5kE6VxBH3ercWV78SllwTQ11O4S0u/5oRuPjtylEi', 0, '2021-08-18 06:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_order`
--
ALTER TABLE `pre_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_order`
--
ALTER TABLE `pre_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
