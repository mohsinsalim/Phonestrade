-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2017 at 06:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonestrade_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyphones`
--

CREATE TABLE `buyphones` (
  `phone_id` int(11) NOT NULL,
  `phone_title` varchar(255) NOT NULL,
  `phone_brand` int(11) NOT NULL,
  `phone_model` int(11) NOT NULL,
  `phone_image` text NOT NULL,
  `phone_desc` varchar(255) NOT NULL,
  `phone_price` int(100) NOT NULL,
  `phone_color` int(11) NOT NULL,
  `phone_condition` int(11) NOT NULL,
  `phone_capacity` int(100) NOT NULL,
  `phone_carrier` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyphones`
--

INSERT INTO `buyphones` (`phone_id`, `phone_title`, `phone_brand`, `phone_model`, `phone_image`, `phone_desc`, `phone_price`, `phone_color`, `phone_condition`, `phone_capacity`, `phone_carrier`) VALUES
(4, '', 1, 1, 'iphone5s.jpg', 'iPhone 5 Verizon 16GB\r\nGlobally Unlocked Phone', 100, 1, 2, 2, 2),
(5, '', 1, 2, 'iphoneSe.jpg', 'Very Good Phone', 150, 2, 2, 2, 2),
(6, '', 1, 3, 'iphone5c.jpg', 'Iphone 5C Series', 100, 3, 3, 2, 2),
(8, '', 1, 9, 'iphone7Original.jpg', 'Iphone 7 Very Good Phone', 550, 2, 3, 5, 2),
(9, '', 1, 4, 'iphoneSe.jpg', 'Iphone se 64 gb very good phone', 250, 3, 2, 4, 1),
(10, '', 1, 3, 'iphone5c.jpg', 'Iphone 5c Good Condition Phone.', 80, 4, 2, 2, 4),
(11, '', 1, 8, 'iphone6splus.jpg', 'Very Good Phone', 330, 2, 3, 4, 3),
(12, '', 1, 3, 'iphone5c.jpg', 'iphone 5C A must buy phone', 100, 2, 2, 1, 3),
(15, '', 1, 1, 'iphone6splus.jpg', 'Good Capacity Phone', 330, 3, 2, 3, 3),
(16, '', 1, 4, 'iphoneSe.jpg', 'Iphone SE A NEW EDITION PHONE', 250, 2, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(1, '::1', 0),
(2, '::1', 0),
(3, '::1', 0),
(4, '::1', 0),
(9, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderconfirmation`
--

CREATE TABLE `orderconfirmation` (
  `order_id` int(11) NOT NULL,
  `order_number` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `number_of_devices` int(11) NOT NULL,
  `name_of_devices` varchar(255) NOT NULL,
  `shipment_status` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_zipcode` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderconfirmation`
--

INSERT INTO `orderconfirmation` (`order_id`, `order_number`, `user_id`, `c_email`, `customer_name`, `payment_amount`, `number_of_devices`, `name_of_devices`, `shipment_status`, `address_line1`, `address_line2`, `address_city`, `address_zipcode`, `ip_address`, `date`) VALUES
(1, 0, 0, 'mohsin@live.com', 'Mohsin Salim', 150, 1, '', 0, '15099 ARUM PL', '', 'WOODBRIDGE', 22191, '::1', '2017-04-01 01:49:58'),
(2, 0, 0, 'usman@gmail.com', 'Usman', 150, 1, '', 0, '3424 BELFRY LN', '', 'Woodbridge', 22192, '::1', '2017-04-01 04:20:01'),
(3, 0, 0, 'test@test.com', 'Test', 250, 2, '', 0, '15099 ARUM PL', '', 'Woodbridge', 22192, '::1', '2017-04-01 04:20:59'),
(4, 0, 0, 'usman2@hotmail.com', 'Usman Salim', 100, 1, '', 0, '15099 ARUM PL', '', 'Woodbridge', 22192, '::1', '2017-04-01 05:06:35'),
(5, 0, 0, 'mohsin@gmail.com', 'Mohsin Farooqi', 100, 1, '', 0, '1212 Dubai Road', '', 'Hong Kong', 99999, '::1', '2017-04-01 05:37:06'),
(6, 797203580, 0, 'habibsaleem@gmail.com', 'Habib Saleem', 150, 1, '', 0, '3424 BELFRY LN', '', 'Woodbridge', 22192, '::1', '2017-04-01 05:41:26'),
(7, 1374902806, 0, 'aliya@hotmail.com', 'Aliya Sarwar', 150, 1, '', 0, '1212 Bijli Mohalla', '', 'Sialkot', 22345, '::1', '2017-04-01 05:53:02'),
(8, 1313253743, 0, 'bilal@hotmail.com', 'Bilal Shahid', 100, 1, '', 0, '15099 ARUM PL', '', 'Woodbridge', 22191, '::1', '2017-04-02 04:34:31'),
(9, 828439569, 0, 'm@M.com', 'Mohsin', 100, 1, '', 0, 'm', '', 'm', 0, '::1', '2017-05-19 21:21:11'),
(10, 282640224, 0, 'm@m.com', 'mohsin', 100, 1, '', 0, '123', '', '123', 123, '::1', '2017-06-10 23:49:30'),
(11, 491792623, 0, 'm@m.com', 'm', 100, 1, '', 0, 'wew', '', 'ewer', 22222, '::1', '2017-06-23 00:18:22'),
(12, 2062070841, 0, 'm@m.com', 'm', 100, 1, '', 0, 'm', '', 'm', 2222, '::1', '2017-06-23 00:25:31'),
(13, 129552398, 0, 'mjafoshfod@gmalilil.com', 'mohsin', 150, 1, '', 0, '55', '', 'wefwf', 645464, '::1', '2017-07-02 22:08:53'),
(14, 765977312, 0, 'm@m.com', 'm', 100, 1, '', 0, 'm', '', 'm', 0, '::1', '2017-07-03 05:17:10'),
(15, 923024915, 0, 'mm@m.com', '', 100, 1, '', 0, '', '', '', 0, '::1', '2017-07-29 03:47:46'),
(16, 2121669417, 0, 'yaho@yyahoo.com', '', 100, 1, '', 0, '', '', '', 0, '::1', '2017-07-29 03:49:48'),
(17, 1521600475, 0, 'uouo@you.com', '', 100, 1, '', 0, '', '', '', 0, '::1', '2017-07-29 04:21:34'),
(18, 444176011, 0, 'j@jolly.com', '', 250, 2, 'iPhone 5,iPhone 5S', 0, '', '', '', 0, '::1', '2017-07-29 04:50:29'),
(19, 305028754, 0, 'uu@u.com', '', 650, 2, 'iPhone 5,iPhone 7', 0, '', '', '', 0, '::1', '2017-07-29 04:51:59'),
(20, 59102614, 0, 'j@h.com', '', 180, 2, 'iPhone 5,iPhone 5C', 0, '', '', '', 0, '::1', '2017-07-29 04:55:58'),
(21, 719000896, 0, 'm@m.com', '', 150, 1, '', 0, '', '', '', 0, '::1', '2017-07-29 04:58:46'),
(22, 652098886, 0, 'm@m.com', '', 100, 1, 'iPhone 5', 0, '', '', '', 0, '::1', '2017-07-30 16:05:43'),
(23, 1924312918, 0, 'mohi@gmail.com', '', 80, 1, 'iPhone 5C', 0, '', '', '', 0, '::1', '2017-07-30 16:11:57'),
(24, 527108296, 0, 'h@hen.com', '', 80, 1, 'iPhone 5C', 0, '', '', '', 0, '::1', '2017-07-30 16:19:30'),
(25, 1933140737, 0, 'm@m.com', '', 100, 1, 'iPhone 5', 0, '', '', '', 0, '::1', '2017-07-30 16:21:30'),
(26, 445329, 0, 'm@m.com', 'Mohsin Salim', 100, 1, 'iPhone 5', 0, '15099 ARUM PL', '', 'Woodbridge', 22191, '::1', '2017-07-30 16:37:55'),
(27, 1643632386, 14, 'abdul@gmail.com', '', 100, 1, 'iPhone 5', 0, '', '', '', 0, '::1', '2017-07-31 04:00:59'),
(28, 340927060, 14, 'falls@gmail.com', '', 100, 1, 'iPhone 5', 0, '', '', '', 0, '::1', '2017-07-31 04:19:37'),
(29, 698892672, 14, 'wifi@gmail.com', '', 80, 1, 'iPhone 5C', 0, ' ', '', '', 0, '::1', '2017-07-31 04:22:20'),
(30, 925971305, 14, 'abdul@gmail.com', 'Abdul', 80, 1, 'iPhone 5C', 0, '3424 BELFRY ', '', 'Woodbridge', 22192, '::1', '2017-07-31 04:25:28'),
(31, 1082550387, 0, 'test@test.com', '', 100, 1, 'iPhone 5', 0, '', '', '', 0, '::1', '2017-07-31 04:26:44'),
(32, 1049129086, 0, 'testing@test.com', 'testing', 100, 1, 'iPhone 5', 0, 'test', '', 'test', 11111, '::1', '2017-07-31 04:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `phone_brands`
--

CREATE TABLE `phone_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_brands`
--

INSERT INTO `phone_brands` (`brand_id`, `brand_title`, `brand_image`) VALUES
(1, 'Apple', 'iphoneThumbnail.jpg'),
(2, 'Samsung', 'samsungThumbnail.jpg'),
(3, 'LG', 'lgThumbnail.jpg'),
(4, 'Motorola', 'motorolaThumbnail.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phone_capacity`
--

CREATE TABLE `phone_capacity` (
  `capacity_id` int(11) NOT NULL,
  `capacity_size` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_capacity`
--

INSERT INTO `phone_capacity` (`capacity_id`, `capacity_size`) VALUES
(1, 8),
(2, 16),
(3, 32),
(4, 64),
(5, 128),
(6, 256);

-- --------------------------------------------------------

--
-- Table structure for table `phone_carrier`
--

CREATE TABLE `phone_carrier` (
  `carrier_id` int(11) NOT NULL,
  `carrier_title` text NOT NULL,
  `carrier_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_carrier`
--

INSERT INTO `phone_carrier` (`carrier_id`, `carrier_title`, `carrier_image`) VALUES
(1, 'AT&T', 'attLogoSmall.jpg'),
(2, 'Verizon', 'verizonLogoSmall.jpg'),
(3, 'Sprint', 'sprintLogoSmall.jpg'),
(4, 'T-Mobile', 'tmobileLogoSmall.jpg'),
(5, 'Unlocked', ''),
(6, 'Other Carrier', '');

-- --------------------------------------------------------

--
-- Table structure for table `phone_color`
--

CREATE TABLE `phone_color` (
  `color_id` int(11) NOT NULL,
  `color_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_color`
--

INSERT INTO `phone_color` (`color_id`, `color_name`) VALUES
(1, 'Silver'),
(2, 'Gold'),
(3, 'Black'),
(4, 'Space Grey');

-- --------------------------------------------------------

--
-- Table structure for table `phone_condition`
--

CREATE TABLE `phone_condition` (
  `condition_id` int(11) NOT NULL,
  `condition_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_condition`
--

INSERT INTO `phone_condition` (`condition_id`, `condition_title`) VALUES
(1, 'Bad'),
(2, 'Good'),
(3, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `phone_models`
--

CREATE TABLE `phone_models` (
  `model_id` int(11) NOT NULL,
  `phone_brand` int(11) NOT NULL,
  `model_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_models`
--

INSERT INTO `phone_models` (`model_id`, `phone_brand`, `model_title`) VALUES
(1, 1, 'iPhone 5'),
(2, 1, 'iPhone 5S'),
(3, 1, 'iPhone 5C'),
(4, 1, 'iPhone SE'),
(5, 1, 'iPhone 6'),
(6, 1, 'iPhone 6S'),
(7, 1, 'iPhone 6 plus'),
(8, 1, 'iPhone 6S plus'),
(9, 1, 'iPhone 7'),
(10, 1, 'iPhone 7 plus');

-- --------------------------------------------------------

--
-- Table structure for table `sellphones`
--

CREATE TABLE `sellphones` (
  `sellphone_id` int(11) NOT NULL,
  `sellphone_brand` varchar(255) NOT NULL,
  `sellphone_title` varchar(255) NOT NULL,
  `sellphone_capacity` varchar(255) NOT NULL,
  `sellphone_carrier` varchar(255) NOT NULL,
  `broken_price` int(11) NOT NULL,
  `good_price` int(11) NOT NULL,
  `excellent_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sellphones`
--

INSERT INTO `sellphones` (`sellphone_id`, `sellphone_brand`, `sellphone_title`, `sellphone_capacity`, `sellphone_carrier`, `broken_price`, `good_price`, `excellent_price`) VALUES
(1, 'Apple', 'iPhone 5', '16', 'Verizon', 15, 50, 60),
(2, 'Apple', 'iPhone 5', '16', 'AT&T', 10, 45, 55),
(3, 'Apple', 'iPhone 5', '16', 'Sprint', 10, 20, 25),
(4, 'Apple', 'iPhone 5', '16', 'T-Mobile', 5, 40, 45),
(5, 'Apple', 'iPhone 5', '16', 'Unlocked', 15, 50, 55),
(6, 'Apple', 'iPhone 5', '16', 'Other Carrier', 5, 10, 15),
(7, 'Apple', 'iPhone 5', '32', 'AT&T', 15, 50, 55),
(8, 'Apple', 'iPhone 5', '32', 'Verizon', 15, 50, 55),
(9, 'Apple', 'iPhone 5', '64', 'Verizon', 15, 50, 55),
(10, 'Apple', 'iPhone 5C', '8', 'Verizon', 10, 25, 30),
(11, 'Apple', 'iPhone 5C', '16', 'Verizon', 15, 35, 40),
(12, 'Apple', 'iPhone 5C', '32', 'Verizon', 20, 45, 50),
(13, 'Apple', 'iPhone 5S', '16', 'Verizon', 25, 55, 60),
(14, 'Apple', 'iPhone 5S', '32', 'Verizon', 30, 75, 85),
(15, 'Apple', 'iPhone 5S', '64', 'Verizon', 30, 80, 90),
(16, 'Apple', 'iPhone SE', '16', 'Verizon', 45, 120, 145),
(17, 'Apple', 'iPhone SE', '64', 'Verizon', 50, 140, 155),
(18, 'Apple', 'iPhone 6', '16', 'Verizon', 45, 115, 135),
(19, 'Apple', 'iPhone 6', '64', 'Verizon', 50, 140, 155),
(20, 'Apple', 'iPhone 6', '128', 'Verizon', 55, 150, 165),
(21, 'Apple', 'iPhone 6 plus', '16', 'Verizon', 55, 145, 165),
(22, 'Apple', 'iPhone 6 plus', '64', 'Verizon', 60, 165, 190),
(23, 'Apple', 'iPhone 6 plus', '128', 'Verizon', 65, 190, 205),
(24, 'Apple', 'iPhone 6S', '16', 'Verizon', 65, 180, 200),
(25, 'Apple', 'iPhone 6S', '32', 'Verizon', 70, 200, 220),
(26, 'Apple', 'iPhone 6S', '64', 'Verizon', 80, 220, 245),
(27, 'Apple', 'iPhone 6S', '128', 'Verizon', 85, 240, 265),
(28, 'Apple', 'iPhone 6S plus', '16', 'Verizon', 75, 200, 220),
(29, 'Apple', 'iPhone 6S plus', '32', 'Verizon', 75, 220, 240),
(30, 'Apple', 'iPhone 6S plus', '64', 'Verizon', 80, 240, 265),
(31, 'Apple', 'iPhone 6S plus', '128', 'Verizon', 95, 265, 295),
(32, 'Apple', 'iPhone 7', '32', 'Verizon', 110, 300, 325),
(33, 'Apple', 'iPhone 7', '128', 'Verizon', 110, 330, 365),
(34, 'Apple', 'iPhone 7', '256', 'Verizon', 125, 360, 400),
(35, 'Apple', 'iPhone 7 plus', '32', 'Verizon', 120, 330, 365),
(36, 'Apple', 'iPhone 7 plus', '128', 'Verizon', 125, 360, 400),
(37, 'Apple', 'iPhone 7 plus', '256', 'Verizon', 135, 390, 435);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobileNumber` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `Address_Line1` varchar(255) NOT NULL,
  `Address_Line2` varchar(255) NOT NULL,
  `Address_City` varchar(255) NOT NULL,
  `Address_State` varchar(255) NOT NULL,
  `Address_ZipCode` varchar(255) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_email`, `user_password`, `user_mobileNumber`, `user_image`, `Address_Line1`, `Address_Line2`, `Address_City`, `Address_State`, `Address_ZipCode`, `user_time`) VALUES
(1, 'Mohsin', 'mohsin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5719690594', '', '', '', '', '', '', '2017-02-26 04:16:44'),
(2, 'mohsin', 'mohsinfaroqi@gmail.com', '202cb962ac59075b964b07152d234b70', '1234567890', '', '', '', '', '', '', '2017-02-26 04:40:18'),
(3, 'usman', 'usman@gmail.com', '202cb962ac59075b964b07152d234b70', '7778889999', '', '', '', '', '', '', '2017-02-26 04:52:01'),
(4, 'nasar', 'nasar@gmail.com', '202cb962ac59075b964b07152d234b70', '1236549999', '', '', '', '', '', '', '2017-02-26 04:53:13'),
(5, 'Salim', 'salim@gmail.com', '202cb962ac59075b964b07152d234b70', '7035555555', '', '', '', '', '', '', '2017-02-27 18:39:01'),
(6, 'Maryam', 'maryam@gmail.com', '202cb962ac59075b964b07152d234b70', '7031231234', '', '', '', '', '', '', '2017-02-27 19:02:49'),
(7, 'Nasar Salim', 'nasarsalim@gmail.com', '202cb962ac59075b964b07152d234b70', '5719690594', '', '', '', '', '', '', '2017-02-27 19:15:03'),
(8, 'Mahi', 'mahi@gmail.com', '202cb962ac59075b964b07152d234b70', '7035654563', '', '', '', '', '', '', '2017-02-27 19:28:33'),
(9, 'Umar', 'umarjee@gmail.com', '202cb962ac59075b964b07152d234b70', '7037456699', '', '', '', '', '', '', '2017-02-27 19:29:43'),
(10, 'Meena', 'meena@hotmail.com', '202cb962ac59075b964b07152d234b70', '1239996666', '', '', '', '', '', '', '2017-02-27 19:37:01'),
(11, 'john doe', 'john@live.com', '202cb962ac59075b964b07152d234b70', '1114445555', '', '', '', '', '', '', '2017-02-28 17:02:33'),
(12, 'Abdul Wali', 'awpareshan@gmail.com', '202cb962ac59075b964b07152d234b70', '7034445555', '', '', '', '', '', '', '2017-02-28 17:05:06'),
(13, 'Maryam', 'maryam1@gmail.com', '4297f44b13955235245b2497399d7a93', '7036557895', '', '', '', '', '', '', '2017-03-26 03:23:40'),
(14, 'Abdul', 'abdul@gmail.com', '202cb962ac59075b964b07152d234b70', '5556667272', '', '3424 BELFRY', '', 'Woodbridge', 'VA', '22192', '2017-07-29 03:22:57'),
(15, 'Ali', 'ali@yahoo.com', '202cb962ac59075b964b07152d234b70', '5557779898', '', '', '', '', '', '', '2017-07-22 05:24:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyphones`
--
ALTER TABLE `buyphones`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `phone_brands`
--
ALTER TABLE `phone_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `phone_capacity`
--
ALTER TABLE `phone_capacity`
  ADD PRIMARY KEY (`capacity_id`);

--
-- Indexes for table `phone_carrier`
--
ALTER TABLE `phone_carrier`
  ADD PRIMARY KEY (`carrier_id`);

--
-- Indexes for table `phone_color`
--
ALTER TABLE `phone_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `phone_condition`
--
ALTER TABLE `phone_condition`
  ADD PRIMARY KEY (`condition_id`);

--
-- Indexes for table `phone_models`
--
ALTER TABLE `phone_models`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `sellphones`
--
ALTER TABLE `sellphones`
  ADD PRIMARY KEY (`sellphone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyphones`
--
ALTER TABLE `buyphones`
  MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `phone_brands`
--
ALTER TABLE `phone_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `phone_capacity`
--
ALTER TABLE `phone_capacity`
  MODIFY `capacity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phone_carrier`
--
ALTER TABLE `phone_carrier`
  MODIFY `carrier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phone_color`
--
ALTER TABLE `phone_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `phone_condition`
--
ALTER TABLE `phone_condition`
  MODIFY `condition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phone_models`
--
ALTER TABLE `phone_models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sellphones`
--
ALTER TABLE `sellphones`
  MODIFY `sellphone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
