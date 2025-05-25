-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`) VALUES
(1, 'Banner 1', 'Banner/food1.jpg'),
(2, 'Banner 2', ''),
(3, 'Banner 3', 'Banner/food3.jpg'),
(4, 'Banner 4', 'Banner/food4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cust_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `ip_add` varchar(225) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_ip` varchar(225) NOT NULL,
  `cust_dname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `cust_pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_ip`, `cust_dname`, `username`, `cust_pass`) VALUES
(1, '::1', 'Rengga', 'rengga', '123'),
(2, '::1', 'fachri', 'fachri', '1');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(6,3) NOT NULL,
  `item_image` varchar(100) DEFAULT NULL,
  `item_keywords` text DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `stok`, `harga`, `item_image`, `item_keywords`, `aktif`) VALUES
(1, 'Pisang Keju', 10, 10.000, 'Pictures/1.jpg', 'fachri', 1),
(2, 'Pisang Gapit', 10, 10.000, 'Pictures/2.jpg', NULL, 1),
(3, 'Pisang Keju', 10, 15.000, 'Pictures/3.jpg', NULL, 1),
(4, 'Bubur Kacang Hijau', 10, 10.000, 'Pictures/4.jpg', NULL, 1),
(5, 'Item permanen', 3, 10.000, 'Pictures/5.jpg', NULL, 0),
(6, 'Curly Fries', 397, 2.550, 'Pictures/6.jpg', NULL, 0),
(7, 'Blizzard', 620, 5.240, 'Pictures/7.jpg', NULL, 0),
(8, 'Frosty', 392, 2.550, 'Pictures/8.jpg', NULL, 0),
(9, 'Mcflurry', 520, 2.110, 'Pictures/9.jpg', NULL, 0),
(10, 'a', 8, 11.011, 'Pictures/10.jpg', NULL, 0),
(11, 'Ayam', 10, 200.000, 'Pictures/20230417_185527.jpeg', NULL, 0),
(12, 'sapi', 1, 100.000, 'Pictures/Figure_1.png', NULL, 0),
(13, 'bayi muffin', 80, 10.000, 'Pictures/Jake_Portrait_Render.webp', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_ip` varchar(225) NOT NULL,
  `total` decimal(6,3) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `delivery_type` text NOT NULL,
  `payment` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `cust_ip`, `total`, `name`, `alamat`, `phone`, `delivery_type`, `payment`, `status`, `tanggal_order`, `tanggal_selesai`, `aktif`) VALUES
(1, 2, '::1', 27.000, 'Muhammad Fachri', 'Jl.SoekarnoHatta Km 1', '0895700288991', 'Home Delivery', 'Cash on Delivery', 'Telah Selesai', '2025-03-26 13:48:03', '2025-04-22 08:58:16', 0),
(2, 1, '125.160.113.77', 29.461, 'bebelak', 'jalan suci', '089521598295', 'Home Delivery', 'Cash on Delivery', 'Telah Selesai', '2025-03-26 13:47:55', '2025-04-22 08:58:17', 0),
(3, 2, '::1', 17.000, 'Muhammad Fachriaw', 'Jl.SoekarnoHatta Km 1', '0895700288991', '', '', 'Telah Selesai', '2025-04-05 20:36:45', '2025-04-22 08:58:18', 0),
(4, 2, '::1', NULL, 'Muhammad Fachri', 'Jl.SoekarnoHatta Km 1', '0895700288991', '', '', 'Tertunda', NULL, NULL, 0),
(5, 2, '::1', NULL, 'Muhammad Fachri1', 'Jl.SoekarnoHatta Km 1', '0895700288991', '', '', 'Tertunda', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ip_add` varchar(225) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `subtotal` decimal(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `username`, `ip_add`, `item_id`, `qty`, `subtotal`) VALUES
(2, 'rengga', '125.160.113.77', 5, 1, 3.900),
(2, 'rengga', '125.160.113.77', 1, 1, 10.000),
(2, 'rengga', '125.160.113.77', 8, 1, 2.550),
(2, 'rengga', '125.160.113.77', 10, 1, 11.011),
(1, 'fachri', '::1', 3, 1, 15.000),
(1, 'fachri', '::1', 1, 1, 10.000),
(3, 'fachri', '::1', 3, 1, 15.000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `i_id` (`i_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_pelanggan` (`cust_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`i_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
