-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 05:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `a_cat` varchar(10) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_pass` varchar(100) NOT NULL,
  `a_address` varchar(1000) NOT NULL,
  `a_con` varchar(100) NOT NULL,
  `a_about` varchar(1000) NOT NULL,
  `a_img` varchar(100) NOT NULL,
  `a_status` int(100) NOT NULL,
  `a_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `a_cat`, `a_name`, `a_email`, `a_pass`, `a_address`, `a_con`, `a_about`, `a_img`, `a_status`, `a_session`) VALUES
(3, '1', 'Protyay Roy', '007protyayroy@gmail.com', '77777777', 'Jessore,khulna', '01754344514', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, voluptatum.            ', 'shipman-northcutt-sgZX15Da8YE-unsplash.jpg', 1, '09-Oct 11:03 PM'),
(7, '2', 'Demo User', 'demo_user@gmail.com', '11111111', 'Dhaka,dhaka', '01754344514', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem esse est, nobis nihil id rem.\r\n        ', 'pexels-photo-220453.jpeg', 0, '11-Sep 01:18 PM'),
(8, '1', 'Admin', 'admin@gmail.com', '11111111', 'Jessore,khulna', '01754344514', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, voluptatum.            ', 'istockphoto-1201437847-612x612.jpg', 1, '13-May 03:17 PM');

-- --------------------------------------------------------

--
-- Table structure for table `admin_cat`
--

CREATE TABLE `admin_cat` (
  `a_cat_id` int(11) NOT NULL,
  `a_cat_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cat`
--

INSERT INTO `admin_cat` (`a_cat_id`, `a_cat_status`) VALUES
(1, 'Super'),
(2, 'Author'),
(3, 'Editor\n');

-- --------------------------------------------------------

--
-- Table structure for table `bike_attr`
--

CREATE TABLE `bike_attr` (
  `id` int(11) NOT NULL,
  `engine_type` varchar(255) DEFAULT NULL,
  `max_power` varchar(255) DEFAULT NULL,
  `max_torque` varchar(255) DEFAULT NULL,
  `max_speed` varchar(255) DEFAULT NULL,
  `fule_type` varchar(255) DEFAULT NULL,
  `cooling_system` varchar(255) DEFAULT NULL,
  `gear` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `dimention` varchar(255) DEFAULT NULL,
  `fuel_capacity` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `battery` varchar(255) DEFAULT NULL,
  `h_light` varchar(255) DEFAULT NULL,
  `b_light` varchar(255) DEFAULT NULL,
  `s_light` varchar(255) DEFAULT NULL,
  `front_break` varchar(255) DEFAULT NULL,
  `back_break` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `c_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `cat_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_ip` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `c_ph` varchar(100) NOT NULL,
  `c_add` varchar(200) NOT NULL,
  `c_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_ip`, `c_name`, `c_email`, `c_pass`, `c_ph`, `c_add`, `c_img`) VALUES
(1, '::1', 'Demo Dm', 'demo@gmail.com', '11111111 ', '01869535334', 'Dhaka,dhaka', '78f59f44081a6a8cb41f1c7fe03c22b1.jpg'),
(2, '::1', 'Test Tm', 'test@gmail.com', '11111111 ', '01759344514', 'Jhenaidah,khulna', '01.png'),
(4, '127.0.0.1', 'Demo Test', 'demo1@gmail.com', '11111111 ', '01759344515', 'Dhaka,Dhaka', 'images.jfif'),
(5, '::1', 'NIloy Niloy', 'niloy@gmail.com', '1234 ', '01737566940', 'Dhaka', 'Yamaha-FZS-Fi-v3-feature--500x500.jpg'),
(6, '::1', 'NIloy Niloy', 'niloy@gmail.com', '1234 ', '01737566940', 'Dhaka', 'Bajaj-Pulsar-NS-160-Details--500x500.jpg'),
(7, '::1', 'NIloy Niloy', 'niloy@gmail.com', '1234 ', '01737566940', 'Dhaka', 'gs1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `c_email` varchar(1000) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `m_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_con` int(100) NOT NULL,
  `c_msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_mode` varchar(1000) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `payment_date` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `pending_id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_mode` varchar(1000) NOT NULL,
  `ref_no` varchar(1000) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `delivery_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pescription`
--

CREATE TABLE `pescription` (
  `pescription_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_title` varchar(100) NOT NULL,
  `p_generic_name` varchar(255) DEFAULT NULL,
  `p_img1` varchar(100) NOT NULL,
  `p_img2` varchar(100) NOT NULL,
  `p_img3` varchar(100) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `invoice_no` mediumtext NOT NULL,
  `p_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE `pro_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` varchar(100) NOT NULL,
  `p_cat_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` int(10) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `a_email` (`a_email`);

--
-- Indexes for table `admin_cat`
--
ALTER TABLE `admin_cat`
  ADD PRIMARY KEY (`a_cat_id`);

--
-- Indexes for table `bike_attr`
--
ALTER TABLE `bike_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `pescription`
--
ALTER TABLE `pescription`
  ADD PRIMARY KEY (`pescription_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pro_categories`
--
ALTER TABLE `pro_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_cat`
--
ALTER TABLE `admin_cat`
  MODIFY `a_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bike_attr`
--
ALTER TABLE `bike_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `pending_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pescription`
--
ALTER TABLE `pescription`
  MODIFY `pescription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_categories`
--
ALTER TABLE `pro_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
