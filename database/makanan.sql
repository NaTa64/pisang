-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 06:40 AM
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
(2, 'Banner 2', 'Banner/food2.jpg'),
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
  `cust_fname` text DEFAULT NULL,
  `cust_lname` text DEFAULT NULL,
  `cust_dname` text NOT NULL,
  `cust_email` varchar(225) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `cust_pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_ip`, `cust_fname`, `cust_lname`, `cust_dname`, `cust_email`, `username`, `cust_pass`) VALUES
(1, '::1', NULL, NULL, 'Rengga', NULL, 'rengga', '123');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `item_desc` varchar(225) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(6,3) NOT NULL,
  `item_image` varchar(100) DEFAULT NULL,
  `item_keywords` text DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `stok`, `harga`, `item_image`, `item_keywords`, `aktif`) VALUES
(1, 'Pisang Keju', 'CHICK-FIL-A', 10, 10.000, 'Pictures/1.jpg', 'keju', 1),
(2, 'Double-Double', 'IN-N-OUT', 97, 4.040, 'Pictures/2.jpg', 'DOUBLE-DOUBLE,Chicken,Sandwich', 1),
(3, 'Fries', 'MCDONALD\'S', 95, 15.000, 'Pictures/3.jpg', 'Fries, mcdonald,snacks', 1),
(4, 'Chicken', 'POPEYES', 440, 6.770, 'Pictures/4.jpg', 'Chicken,Nuggets', 1),
(5, 'Chicken Sandwich', 'CHICK-FIL-A', 10, 3.900, 'Pictures/5.jpg', 'Chicken,Sandwich', 1),
(6, 'Curly Fries', 'ARBY\'S', 400, 2.550, 'Pictures/6.jpg', 'Curly,Fries,snacks', 1),
(7, 'Blizzard', 'DAIRY QUEEN', 620, 5.240, 'Pictures/7.jpg', 'Blizzard,Ice cream,desserts', 1),
(8, 'Frosty', 'WENDY\'S', 393, 2.550, 'Pictures/8.jpg', 'Frosty', 1),
(9, 'Mcflurry', 'MCDONALD\'S', 520, 2.110, 'Pictures/9.jpg', 'Ice cream,Mcflurry', 1),
(10, 'a', 'FIVE GUYS', 11, 11.011, 'Pictures/10.jpg', 'Bacon,Cheese,Burger', 1),
(11, 'Ayam', NULL, 10, 200.000, 'Pictures/20230417_185527.jpeg', NULL, 0),
(12, 'sapi', NULL, 1, 100.000, 'Pictures/Figure_1.png', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_ip` varchar(225) NOT NULL,
  `order_amount` decimal(6,3) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `delivery_type` text NOT NULL,
  `payment` text NOT NULL,
  `status` text NOT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `cust_ip`, `order_amount`, `jumlah`, `name`, `alamat`, `phone`, `delivery_type`, `payment`, `status`, `tanggal_order`, `aktif`) VALUES
(2, 1, '::1', 36.040, 3, 'Muhammad Fachri', 'Jl.SoekarnoHatta Km 1', '0895700288991', 'Home Delivery', 'Cash on Delivery', 'Sedang Diproses', '2025-03-23 13:19:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `i_id` int(11) NOT NULL,
  `ip_add` varchar(225) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`cust_id`, `username`, `i_id`, `ip_add`, `qty`) VALUES
(1, 'rengga', 3, '::1', 1),
(1, 'rengga', 2, '::1', 1),
(1, 'rengga', 3, '::1', 1),
(1, 'rengga', 2, '::1', 1);

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
  ADD KEY `i_id` (`i_id`),
  ADD KEY `cust_id` (`cust_id`);

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
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`i_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
