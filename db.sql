-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 03:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `bank` varchar(50) NOT NULL,
  `office` varchar(100) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `bank_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `contact`) VALUES
(1, 'Facebook', 'Your Facebook'),
(2, 'Line', 'ID Line'),
(3, 'Tel.', '0987654321'),
(4, 'Email', 'test@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `title`) VALUES
(1, '35'),
(2, 'Shop Name'),
(3, 'Title Website'),
(4, 'Website Description'),
(5, 'JXqFg1nOAobVMvwOGUOkjR2Ccf4sSWZOihZhHsQKf3Z');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$.mdYTYMeOmn2yDIOqV2zqODHwRARHmX/BAXqX2q0a4i/.9ArdJ4J6', 1, '2021-05-29 08:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
