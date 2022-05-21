-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 12:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_website_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(5) NOT NULL,
  `account_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `password`, `date_of_birth`, `address`, `gender`, `phone`, `email`, `avatar`, `role`, `created_date`, `update_date`) VALUES
(1, 'Lê Ngọc Tuấn', '123', '2001-06-24', 'Hồ Chí Minh', 'Nam', '0985332334', 'lengoctuan2406@gmail.com', NULL, 1, '2022-05-21 09:00:06', '2022-05-21 08:59:03'),
(2, 'Lê Thị Thanh Giang', '123', '2022-05-04', 'Hồ Chí Minh', 'Nữ', '0984121555', 'lethithanhgiang@gmail.com', NULL, 0, '2022-05-21 09:01:52', '2022-05-21 10:00:33'),
(3, 'Đào Ngọc Tường Vy', '123', '2001-05-17', 'Ninh Thuận', 'Nữ', '0982334556', 'daongoctuongvy@gmail.com', NULL, 0, '2022-05-21 09:03:13', '2022-05-21 10:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `date_start` datetime DEFAULT current_timestamp(),
  `date_end` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `order_person_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_province` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `coupon_id` int(5) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `date_invoice` datetime DEFAULT current_timestamp(),
  `order_status_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(5) NOT NULL,
  `order_status_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(5) DEFAULT NULL,
  `brand` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `thumnail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `type_id`, `brand`, `quantity`, `description`, `price`, `thumnail`) VALUES
(1, 'Thức ăn cho chó', 1, 'Nước ngoài', 10, 'Không có gì cả', 10, 'cat-food-1.jpg'),
(2, 'Thức ăn cho mèo', 2, 'Trong nước', 11, 'Không có gì cả', 12, 'cat-food-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_history`
--

CREATE TABLE `purchases_history` (
  `purchase_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `coupon_id` int(5) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reivew_status`
--

CREATE TABLE `reivew_status` (
  `review_status_id` int(5) NOT NULL,
  `review_status_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `review_status_id` int(5) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `type_id` int(5) NOT NULL,
  `type_name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`type_id`, `type_name`) VALUES
(1, 'dầu gội'),
(2, 'dầu xả'),
(3, 'dầu ăn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases_history`
--
ALTER TABLE `purchases_history`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `reivew_status`
--
ALTER TABLE `reivew_status`
  ADD PRIMARY KEY (`review_status_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases_history`
--
ALTER TABLE `purchases_history`
  MODIFY `purchase_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reivew_status`
--
ALTER TABLE `reivew_status`
  MODIFY `review_status_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
