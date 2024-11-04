-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 11:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bag_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(8, 'Mengty', 'mengty@gmail.com', '$2y$10$VlQHsMnyzqzyUYDL0RF.JuOidOg2E7RcZ3OaRwtAckpYjYDPyJzhO');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(15, 'LV'),
(16, 'COACH'),
(17, 'CHANEL'),
(18, 'PRADA'),
(19, 'GUCCI');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(17, 'ស្បែក'),
(18, 'សាច់ក្រណាត់'),
(19, 'ជ័រ'),
(20, 'សាច់ក្រពើ');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(5, 2, 1934825362, 37, 2, 'pending'),
(6, 2, 1293275356, 36, 2, 'pending'),
(7, 4, 1867667888, 39, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_discription` varchar(100) NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_discription`, `product_keyword`, `category_id`, `brand_id`, `product_image`, `product_price`, `date`, `status`) VALUES
(36, 'RDC13734', 'Authentic MARC JACOBS Black Quilted Leather Hobo Bag', '001', 17, 19, '001.jpg', '200', '2024-02-12 09:01:48', 'true'),
(38, 'RDC13721', 'Authentic GUCCI Black Calfskin Mini GG Marmont Chain Shoulder Bag', 'Authentic GUCCI ', 17, 19, '004.jpg', '1000', '2024-02-12 09:23:45', 'true'),
(39, 'RDC13713', 'Authentic LOUIS VUITTON LV Canvas & Black Leather NéoNoé MM Bag', 'Authentic LOUIS ', 17, 15, '005.jpg', '1800', '2024-02-12 09:25:13', 'true'),
(40, 'RDC13717', 'Authentic BALENCIAGA 10 Yellow Lambskin Covered Giant HW City Bag.', 'Authentic BALENCIAGA', 20, 0, '006.jpg', '350', '2024-02-12 09:34:11', 'True'),
(41, 'RDC13727', 'Authentic DIOR Black Calfskin Montaigne 30 Small Box', 'Authentic DIOR', 19, 18, '007.jpg', '1700', '2024-02-12 09:51:57', 'true'),
(42, 'RDC13707', 'Authentic NANCY GONZALES Black Crocodile Ring Bag', 'Authentic NANCY ', 20, 17, '008.jpg', '575', '2024-02-12 09:53:30', 'true'),
(43, 'RDC13705', 'Authentic KATE SPADE Black Pebbled Leather Small Breezy Backpack', 'Authentic KATE SPADE', 18, 16, '009.jpg', '125', '2024-02-12 09:55:07', 'true'),
(44, 'RDC13672', 'Authentic EMILIO PUCCI White Trim Pink and Green Corduroy Tote Bag', 'Authentic EMILIO PUCCI', 18, 16, '010.jpg', '200', '2024-02-12 10:20:01', 'true'),
(45, 'RDC13638', 'Authentic COACH Grey Pebbled Leather Double Zipper Wrist Pouch', 'Authentic COACH Grey', 17, 16, '011.jpg', '100', '2024-02-12 10:21:51', 'true'),
(46, 'RDC13654', 'Authentic CHANEL Black Patent PVC Chain Strap XL Coco Cabas Bag', 'Authentic CHANEL Black ', 19, 17, '0123.jpg', '2100', '2024-02-12 10:23:31', 'true'),
(47, 'RDC13609', 'Authentic LOUIS VUITTON 2001 Red Epi Leather Pochette Cluch Bag', 'Authentic LOUIS VUITTON', 19, 18, '013.jpg', '550', '2024-02-12 10:24:49', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(6, 2, 1400, 1934825362, 2, '2024-02-12 09:20:51', 'Complete'),
(7, 2, 400, 1293275356, 1, '2024-02-12 09:22:04', 'pending'),
(8, 4, 1800, 1867667888, 1, '2024-02-12 09:50:10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(3, 6, 1934825362, 1400, 'ABA', '2024-02-12 09:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(5, 'Reaksa', 'reaksa@gmail.com', '7979', '02.png', '::1', 'PP', '01011110000'),
(6, 'Chhanun', 'chhanun@gmail.com', '123', '01.png', '::1', 'PP', '01011110000'),
(7, 'Monika', 'monika@gmail.com', '123', '03.png', '::1', 'PP', '01011110000'),
(8, 'Menghuor', 'menghuor@gmail.com', '123', '05.png', '::1', 'PP', '01011110000'),
(9, 'Sochetra', 'sochetra@gmail.com', '123', '04.png', '::1', 'PP', '01011110000'),
(10, 'Dona', 'dona@gmail.com', '123', '07.png', '::1', 'PP', '01011110000'),
(11, 'Mengty', 'mengty@gmail.com', '123', '06.png', '::1', 'PP', '01011110000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`) USING BTREE;

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
