-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 04:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
(8, '1', 'Admin', 'admin@gmail.com', '11111111', 'Jessore,khulna', '01754344514', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, voluptatum.            ', 'istockphoto-1201437847-612x612.jpg', 1, '06-Jan 09:30 PM');

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

--
-- Dumping data for table `bike_attr`
--

INSERT INTO `bike_attr` (`id`, `engine_type`, `max_power`, `max_torque`, `max_speed`, `fule_type`, `cooling_system`, `gear`, `mileage`, `dimention`, `fuel_capacity`, `height`, `color`, `battery`, `h_light`, `b_light`, `s_light`, `front_break`, `back_break`) VALUES
(1, '4-stroke, SOHC, 4-valve', '13.5 kW (18.4 PS) @ 10,000 RPM', '14.1 Nm @7,500 RPM', '135 KM/H', 'Petrol', ' Liquid Cooled', '6-speed manual Constant mesh', '40', '2,015 mm x 800 mm x 1,070 mm', '10 Liters', '1', 'Ice Fluo-Vermillion, Cyan Storm, Racing Blue & Metallic Black', '12V, 4.0Ah', 'LED', ' LED', 'LED', '282 mm Single Disc Brake', '220 mm Single Disc Brake'),
(2, 'Air cooled, 4-Stroke Single Cylinder OHC', '5.15 kW (6.9 BHP) @ 7000 RPM', '8.1 Nm @ 5000 RPM', '77 KM/H', 'Octane', 'Air Cooled', 'Automatic', '51 KM/L', '1750 mm x 705 mm x 1115 mm', '51 KM/L', '1240 mm', 'Sports Red Black, Candy Blazing Red & Sports Yellow Black', '12 V - 4 Ah, MF Type (Maintenance Free)', '12 V - 35W / 35W - Halogen Bulb (Multi-Reflector Type)', '12 V-0.4 /1.6 W - (LED Type)', '12 V-10 W x 4 nos - (MFR - Clear Lens - Amber Bulb Type)', 'Internal Expanding Shoe Type (130 mm)', 'Internal Expanding Shoe Type (130 mm) Integrated Braking System (IBS)'),
(3, '4- Stroke Single Cylinder OHC, Air Cooled', '6.70 kW (9.11Ps) @ 7500 RPM', '9 Nm @ 5500 RPM', '95 KM/H', 'Petrol', 'Air Cooled', ' 4 Speed Manual Gears', '60 KM/L', '1967 mm x 768 mm x 1075 mm', '9.2 Litres', '1249 mm', 'Sports Red & Techno Blue', '12 V - 3Ah MF Battery (ETZ-4)', '12 V-35 W / 35 W- AHO LED Projection With DRL', '12 V-5 / 21 W (Multi Reflector Led)', 'Halogen', '240 mm Disc brake (iBS Breaking)', '130 mm Drum'),
(4, '4 Stroke, Single Cylinder, FI', '10.84 PS @ 7500 RPM', '10.6 Nm @ 6000 RPM', '105 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', ' 65 KM/L', '2051 mm x 743 mm x 1074 mm', '10 Liters', '1273 mm', 'Glossy Black & Matte Axis Grey', 'MF 12V, 4Ah (ETZ 5)', '12V 35/35W Halogen HS1, Clear lens with MFR', 'Crystal Type', 'Yes', '240 mm Petal Disc', 'Drum 130 mm'),
(5, '4 - stroke single cylinder OHC, Air Cooled', '14.4 Bhp @ 8500 rpm', '12.6 Nm @ 6500 rpm', '120 Km/h', 'Petrol', 'Air Cooled', '5-Speed, Constant Mesh', ' 55 KM/L', '1995 mm x 778 mm x 1072 mm', '12.4 Litres', '1338 mm', 'Sports Red, Black & Techno Blue', '12 V - 4 Ah, MF battery', '12 V - 35 W / 35W - Halogen Bulb Trapezoidal MFR', '12 V - 0.5 W / 4.1W (LED lamps)', '12 V - 10 W (Amber bulb) x 4 nos. (Multi - reflector clear lens)', '220 mm disc', 'Single Channel'),
(6, 'Air cooled, 4 Stroke 2 Valve Single cylinder OHC', '11.2 kW (15 BHP) @ 8500 RPM', '14 Nm @ 6500 RPM', '130 Km/h', 'Petrol', 'Air Cooling System', ' 5-speed Constant mesh', ' 50 KM/L', '2029 mm x 793 mm x 1052 mm', '12 litres', '1327 mm', 'Pearl Silver White, Vibrant Blue & Sports Red', '12 V - 4 Ah MF Battery', 'Full LED With LED DRLS', 'Full LED', 'Full LED', '276 mm Disc', '220 mm Petal Disc or 130 mm Drum'),
(7, '4 - stroke single cylinder OHC, Air Cooled', '14.4 Ps @ 8500 rpm', '12.8 Nm @ 6500 rpm', '123 Km/H', 'Petrol', 'Air Cooled', '5-speed Constant mesh', '46 Km/L', '2080 mm x 765 mm x 1095 mm', '12.4 Litres', '1325 mm', 'Matte Blue, Matte Black, and Matte Green', '12 V - 4 Ah, MF battery', '12 V - 35 W / 35W - Halogen Bulb Trapezoidal MFR', '12 V - 0.5 W / 4.1W (LED lamps)', '12 V - 10 W (Amber bulb) x 4 nos. (Multi - reflector clear lens)', '240mm Disc', 'Drum'),
(8, 'Single Cylinder 4-Stroke DTS-i Air Cooled Engine', '6.3 kW (8.6 PS) @ 7000 RPM', '9.81 Nm @ 5000 RPM', '100 km/h', 'Petrol', 'Air Cooled', '5 Speed Manual Gear', '70 Km/L', '2006 mm x 704 mm x 1076 mm', '11.5 Liters', '1255 mm', 'Charcoal Black, Stain Beach Blue & Cocktail Wine Red', 'DC system', '12V 35/35W , HS 1 Blue Tinge bulb, LED DRL', ' LED', 'Yes', '240 mm Disc', '110 mm Drum With CBS'),
(9, '4 Stroke Single cylinder, DTS-i with ExhausTEC', '11 Ps @ 7500 RPM', '11 Nm@ 5500 RPM', '115 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', '60 KM/L', '2035 mm x 760 mm x 1085 mm', '8 Litres', '1305 mm', 'Black-Red, Black-Blue, Red & Black-Green', '12 V, 5 Ah', '12V 35/35W Halogen With LED DRL', 'Yes', 'Yes', '240 mm disc', '110 mm Drum'),
(10, '4-stroke, Natural Air Cooled, Spark Ignition Engine', '8.4 HP @ 7000 RPM', '10 Nm @ 4000 RPM', '110 km/h', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', '60 KM/L', '2006 mm x 713 mm x 1100 mm', '13 Liters', '1275 mm', 'Black with Blue Decal, Black with Red Decal, Black with Red Decal & Red with Red Decal', 'DC system', '12V 35/35W , HS 1 Blue Tinge bulb', 'LED', 'Yes', '110 mm Drum', '110 mm Drum'),
(11, 'Air cooled, 4-Stroke, BS-IV', '8.247 BHP (6.15 KW) @ 7500 RPM', '9.09 Nm @ 5500 RPM', '86 KM/H', 'Petrol', 'Air Cooled', '4 Speed Manual Gears', ' 65 KM/L', '2020 mm x 737 mm x 1061 mm', '8 Liters', '1285 mm', 'Black, Red & Blue', '12V 3Ah (MF)', '12V 35/35W', 'Bulb', 'Yes', '130 mm Drum', '130 mm Drum'),
(12, '4 Stroke, SI Engine', '14.13 PS (13.9 BHP) @ 8500 RPM', '13.9 Nm @ 6000 RPM', '115 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', '58 KM/L', '2020 mm x 820 mm x 1230 mm', '12 Liters', '1350 mm', 'Pearl Spartan Red, Matte Frozen Silver, Matte Marshal Green Metallic, Matte Marvel Blue Metallic, Pearl Igneous Black', '12V 4Ah (MF)', 'LED Headlamp', 'LED Backlight', 'Yes', '276 mm Disc Brake (ABS)', '220 mm Disc Brake (ABS)'),
(13, 'Single-cylinder, SOHC 4-stroke 2-valve', '14.3 HP @ 8500 rpm', '13.80 Nm @ 6000 rpm', '115 KM/H', ' Petrol', 'Liquid Cooled', 'Continuously Variable Transmission Gear (CVT)', '50 KM/L', '1950 mm x 763 mm x 1153 mm', '8 Liters', '1324 mm', 'Advance Red, Advance White Black, Tough Matte Black, Tough Matte Black Gold, Tough Matte Brown, Tough Red & Tough White Gold', '12V 5Ah (MF)', 'LED Headlamp', 'LED Backlight', 'Yes', '240 mm Disc Brake', '220 mm Disc Brake'),
(14, '4-Stroke, DOHC, 4-Valve, Single Cylinder', '16.7 Bhp @ 9000 RPM', '13.85 Nm @ 7000 RPM', '135 KM/H', 'Petrol', 'Liquid Cooled', '6 Speed Manual Gears (1-N-2-3-4-5-6)', '45 KM/L', '2019 mm x 719 mm x 1039 mm', '12 Liters', '1293 mm', 'Quantum Red, Macho Black & Rapid White', '12V, 5 Ah Maintenance Free', '12V 60/55W H4', 'Yes', 'Yes', '276 mm Hydraulic Disc with Dual Piston', '220 mm Hydraulic Disc with Single Piston'),
(15, '4 Stroke, SI BS-IV Engine', '15.1 PS (14.9 BHP) @ 8500 RPM', '14.5 Nm @ 6500 RPM', '110 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', '50 KM/L', '2041 mm x 783 mm x 1091 mm', '12 Liters', '1346 mm', 'Striking Green, Mars Orange, Athletic Blue Metallic, Sports Red & Dazzle Yellow Metallic', '12V - 4Ah (MF)', 'LED Headlamp', 'LED Back Light', ' Yes', '276 mm Petal Disc With ABS (Anti-Lock Braking System)', '220 mm Disc'),
(16, '4 stroke, SI Engine', '10.30 PS (10.16 BHP) @ 7500 RPM', '10.30 Nm @ 5500', '105 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gear (N-1-2-3-4-5)', '65 KM/L', '2007 mm x 762 mm x 1085 mm', '10.5 Liters', '1266 mm', 'Imperial Red Metallic & Black', '12V 3Ah (MF)', '12V 35/35W', 'Bulb', ' Yes', '230 mm Disc Brake', '130 mm Drum'),
(17, '4-Stroke, 1-Cylinder, 2-Valve, SOHC, BS-IV', '8.7 Ps @ 7500 RPM', '9.3 NM @ 5000 RPM ', '100 KM/H', 'Petrol', 'Air Cooled', '4 Speed Manual Gears', '50 KM/L', '2025 mm x 740 mm x 1060 mm', '10 Liters', '1305 mm', 'Metallic-Flint-Grey, Pearl-Mirage-White, Sparkle-Black, Pearl-Mira-Red & Metallic-Lush-Green', 'Maintenance Free 12 V, 3Ah', '12V 35/35 W', '12V 21/5 W', 'Yes', '130 mm Drum ', '130 mm Drum'),
(18, 'Air-Cooled, 4-stroke, 1-Cylinder', '10.45 PS @ 9000 RPM', '9.2 NM @ 7000 RPM', '110 KM/H', 'Petrol', 'Air Cooled', '5-Speed, Constant Mesh', '60 KM/L', '1990 mm x 755 mm x 1075 mm', '14.2 Liters', '1270 mm', 'Black, Blue & Red', 'Maintenance Free 12 V, 3Ah', '12V 35/35 W', '12V 21/5 W', 'Yes', 'Hydraulic Disc', 'Drum'),
(19, 'Air-Cooled, 4-stroke, 1-Cylinder', '8.2 Ps @ 8000 RPM', '11.5 Nm @ 5500 RPM', '130 KM/H', 'Petrol', 'Air Cooling', '5 Speed Manual Gears', '60 KM/L', '2055 mm x 750 mm x 1075 mm', '12.5 Liters', '1310 mm', 'Blue, Black & Red', '12V, 5Ah', '12V 35/35 W', '12V 21/5 W', 'Yes', '220 mm Disc', 'Drum 130 mm'),
(20, '4-Stroke, 1-cylinder', '14.6 BHP @ 8000 RPM', '14 NM @ 6000 RPM', '130 KM/H', 'Petrol', 'Air Cooled', '5 Speed Manual Gears', '40-50 KM/L', '2,050 mm x 785 mm x 1,030 mm', '12 Liters', '1330 mm', 'Brilliant Silver & Majestic Yellow', 'Maintenance free 12V, 3Ah', '12V, 35/35 W(Halogen)', ' LED', 'Clear Lense', '266 mm Disc', '130 mm Drum');

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

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Bike', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit illo deleniti et qui laborum. Repudiandae labore at adipisci sed? Placeat!\r\n'),
(6, 'Other Accessories', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita id iste voluptatum exercitationem commodi sunt!'),
(7, 'scooty', 'The TVS Scooty is a brand of Scooters made by TVS Motors of India. It is marketed mainly to women, and in 2009 was the largest selling brand among scooters aimed specifically at women buyers,');

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

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `c_email`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 'demo@gmail.com', 199950, 1820523349, 1, '', '06-Jan-2023', 'Payment Pending');

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

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`pending_id`, `order_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `status`, `date`, `delivery_add`) VALUES
(1, 1, 1820523349, '199950', 'ROCKET', 'abcdef', '199950', 'Payment Pending', '06/Jan/2023 09:29 PM', 'Dhaka,dhaka');

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
  `p_img1` varchar(100) NOT NULL,
  `p_img2` varchar(100) NOT NULL,
  `p_img3` varchar(100) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `invoice_no` mediumtext NOT NULL,
  `p_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `p_cat_id`, `date`, `p_title`, `p_img1`, `p_img2`, `p_img3`, `p_price`, `invoice_no`, `p_type`) VALUES
(1, 1, 1, '2023-01-06 08:15:17', 'Yamaha MT 15 V2', 'Yamaha-MT-15-V2-Black-price-in-Bangladesh.jpg', 'Yamaha-MT-15-V2-Cyan-price-in-Bangladesh.jpg', 'Yamaha-MT-15-V2-Light-Gray-price-in-Bangladesh.jpg', '525000', '1933588779', 'NEW'),
(2, 7, 14, '2023-01-06 08:14:53', 'Hero Pleasure', 'Hero-Pleasure-Price-in-Bangladesh.jpg', 'Hero-Pleasure-Sports-Yellow-Black-Price-in-Bangladesh.jpg', 'Hero-Pleasure-Back-View-Price-in-Bangladesh.jpg', '144740', '1412807847', 'NEW'),
(3, 1, 14, '2023-01-06 08:24:36', 'Hero Passion X Pro X tec', 'Hero-Passion-X-Pro-X-tec-Blue-price-in-Bangladesh.jpg', 'Hero-Passion-X-Pro-X-tec-Features2-price-in-Bangladesh.jpg', 'Hero-Passion-X-Pro-X-Tec-price-in-Bangladesh-1.jpg', '133240', '1159583580', 'NEW'),
(4, 1, 14, '2023-01-06 08:35:32', 'Hero Glamour Xtec', 'Hero-Glamour-Xtec-125-Gray-Price-in-Bangladesh.jpg', 'Hero-Glamour-Xtec-125-BackFront-Price-in-Bangladesh.jpg', 'Hero-Glamour-Xtec-125-Fetures-Price-in-Bangladesh-500x500.jpg', '125900', '1386565824', 'NEW'),
(5, 1, 14, '2023-01-06 08:40:40', 'Hero Hunk 150R', 'Hero-Hunk-150R-Techno-Blue-Price-in-Bangladesh-1.jpg', 'Hero-Hunk-150R-Black-Price-in-Bangladesh-1.jpg', 'Hero-Hunk-150R-price-in-Bangladesh.jpg', '192990', '504288973', 'NEW'),
(6, 1, 14, '2023-01-06 08:47:35', 'Hero Thriller 160R', 'Hero-Thriller-160R-price-in-Bangladesh.jpg', 'Hero-Thriller-160R-Red-price-in-Bangladesh.jpg', 'Hero-Thriller-160R-price-in-Bangladesh (1).jpg', '222990', '1942972825', 'NEW'),
(7, 1, 14, '2023-01-06 08:53:26', 'Hero Hunk Twin Disc', 'Hero-Hunk-Double-Disc-BDPrice.com_.bd_-500x500.jpg', 'Hero-Hunk-Black-price-in-Bangladesh.jpg', 'Hero-HunkGreen-price-in-Bangladesh.jpg', '171490', '1472333029', 'NEW'),
(8, 1, 17, '2023-01-06 09:01:55', 'Bajaj Platina 110 H Gear', 'Bajaj-Platina-110-H-Gear-Red-price-in-Bangladesh-1.jpg', 'Bajaj-Platina-110-H-Gear-Blue-price-in-Bangladesh-1.jpg', 'Bajaj-Platina-110-H-Gear-Black-price-in-Bangladesh-1.jpg', '128500', '1408128959', 'NEW'),
(9, 1, 17, '2023-01-06 09:07:38', 'Bajaj Discover 125', 'Bajaj-Discover-125-Black-Blue.jpg', 'Bajaj-Discover-125-red.jpg', 'Bajaj-Discover-125-price-in-bangladesh.jpg', '153000', '615817845', 'NEW'),
(10, 1, 17, '2023-01-06 09:21:06', 'Bajaj Platina 125', 'platina-100-cc-500x500.jpg', 'platina-100-cc-500x500.jpg', 'platina-100-cc-500x500.jpg', '133500', '16797290', 'NEW'),
(11, 1, 2, '2023-01-06 10:42:53', 'Honda Dream 110', 'Honda-Dream-110-Red-price-in-Bangladesh.jpg', 'Honda-Dream-110-Blue-price-in-Bangladesh.jpg', 'Honda-Dream-110-Black-price-in-Bangladesh.jpg', '103500', '144807462', 'NEW'),
(12, 1, 2, '2023-01-06 10:48:33', 'Honda X Blade (ABS)', 'Honda-X-Blade-Blue-price-in-Bangladesh-1.jpg', 'Honda-X-Blade-Black-price-in-Bangladesh-1.jpg', 'Honda-X-Blade-Red-Front-500x500.jpg', '210900', '744079540', 'NEW'),
(13, 7, 2, '2023-01-06 10:55:38', 'Honda ADV 150 (ABS) 2021', 'Honda-ADV-150-ABS-2021-Tough-White-Gold-price-in-Bangladesh.jpg', 'Honda-ADV-150-ABS-2021-Tough-Red-price-in-Bangladesh.jpg', 'Honda-ADV-150-ABS-2021-Tough-Matte-Black-price-in-Bangladesh-1.jpg', '475000', '74085343', 'NEW'),
(14, 1, 2, '2023-01-06 11:00:41', 'Honda CB 150R Street Fire', 'Honda-CB150R-Street-Fire-Black-Front-500x500.jpg', 'Honda-CB150R-Street-Fire-Meter--500x500.jpg', 'Honda-CB150R-Street-Fire--500x500.jpg', '380000', '243483931', 'NEW'),
(15, 1, 2, '2023-01-06 11:08:17', 'Honda CB Hornet 160R ABS', 'Honda-CB-Hornet-160R-Red-price-in-Bangladesh-1.jpg', 'Honda-CB-Hornet-160R-Green-price-in-Bangladesh.jpg', 'Honda-CB-Hornet-160R-Blue-price-in-Bangladesh-1.jpg', '255000', '1641269550', 'NEW'),
(16, 1, 2, '2023-01-06 11:36:13', 'Honda CB Shine SP', 'Honda-CB-Shine-SP-Black-price-in-Bangladesh-1.jpg', 'Honda-CB-Shine-SP-Details--500x500.jpg', 'Honda-CB-Shine-SP-Red-price-in-Bangladesh.jpg', '143500', '1570623711', 'NEW'),
(17, 1, 9, '2023-01-06 11:52:01', 'Suzuki Hayate EP', 'BDPrice.com_.bd-2-11-500x500.jpg', 'Suzuki-Hayate-EP-Red-Price-in-Bangladesh-1.jpg', 'Suzuki-Hayate-EP-Gray-Price-in-Bangladesh-1.jpg', '107950', '1719082712', 'NEW'),
(18, 1, 9, '2023-01-06 11:57:50', 'Suzuki GSX 125', 'Suzuki-GSX-125-Price-in-Bangladesh.jpg', 'Suzuki-GSX-125-Blue-Price-in-Bangladesh.jpg', 'Suzuki-GSX-125-Black-Price-in-Bangladesh.jpg', '141950', '200617833', 'NEW'),
(19, 1, 9, '2023-01-06 12:04:54', 'Suzuki Samurai 150', 'Suzuki-Samurai-150-Price-in-Bangladesh-1.jpg', 'Suzuki-Samurai-150-Red-Price-in-Bangladesh-1.jpg', 'Suzuki-Samurai-150-Black-Price-in-Bangladesh-1.jpg', '149950', '1111862393', 'NEW'),
(20, 1, 9, '2023-01-06 12:09:18', 'Suzuki Gixxer Mono Tone Classic Plus', 'Gixxer-Monotone-Classic-Plus-Yellow-Price-in-Bangladesh.jpg', 'Gixxer-Monotone-Classic-Plus-Silver-Price-in-Bangladesh.jpg', 'Gixxer-Monotone-Classic-Plus-Yellow-Price-in-Bangladesh.jpg', '199950 ', '1820523349', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE `pro_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` varchar(100) NOT NULL,
  `p_cat_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_categories`
--

INSERT INTO `pro_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Yahama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium nobis voluptas at corrupti incidunt nisi quia, neque voluptatum in hic.'),
(2, 'Honda', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi amet nesciunt quaerat hic enim quas, dicta, molestias aliquam quam aperiam qui quidem quos ullam a?'),
(3, 'RevZilla', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium quis laudantium obcaecati, vero assumenda eius delectus natus quibusdam deserunt! Inventore!'),
(5, 'Tchipie', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, esse.'),
(6, 'Yohe', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, esse.'),
(8, 'Others', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, corrupti ratione. Vero vitae deserunt dolor!'),
(9, 'Suzuki', 'Suzuki manufactures automobiles, motorcycles, all-terrain vehicles (ATVs), outboard marine engines, wheelchairs and a variety of other small internal combustion engines.'),
(10, 'Yamaha', 'Yamaha is a Japanese multinational manufacturer of motorcycles, marine products such as boats and outboard motors, and other motorized products.'),
(11, 'Honda', 'Honda Motorcycle and Scooter India, Private Limited (HMSI) is the wholly owned Indian subsidiary of Honda Motor Company, Limited, Japan. Founded in 1999,'),
(12, 'Kawasaki', 'Kawasaki Aircraft initially manufactured motorcycles under the Meguro name, having bought an ailing motorcycle manufacturer, Meguro Manufacturing with whom they had been in partnership.'),
(13, 'TVS', 'TVS Motor Company (commonly known as TVS) is an Indian multinational motorcycle manufacturer headquartered in Chennai, Tamil Nadu, India.'),
(14, 'Hero', 'Hero MotoCorp Limited (formerly Hero Honda) is Indian multinational motorcycle and scooter manufacturer headquartered in New Delhi.'),
(15, 'Taro', 'TARO is a Bangladeshi motorcycle brand. The company Taro Bangla Limited renders an exclusive motorcycle dealership in the capital city Dhaka of Bangladesh. '),
(16, 'GPX', ' Known as the LIFESTYLE BIKE BRAND in Thailand, GPX specializes in manufacturing lifestyle bikes that caters to trend setters, bike enthusiasts, collectors and daily commuters.'),
(17, 'Bajaj', 'Bajaj Auto is the worlds third-largest manufacturer of motorcycles and the second-largest in India. It is the worlds largest three-wheeler manufacturer.'),
(18, 'Zontes', 'The Zontes brand is all about development and innovation. The manufacturing technology focuses on material structure with expert precision. Inspired to provide the consumer with intelligent control, energy conservation, environmental protection, safety and durability. Look and feel as good as you ar'),
(19, 'KTM', 'KTM is an Australian Brand');

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
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(0, 'Demo Dm', 4, 'good', 1673018844);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `pending_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pro_categories`
--
ALTER TABLE `pro_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
