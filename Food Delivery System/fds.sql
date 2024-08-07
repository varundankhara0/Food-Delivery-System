-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 02:06 PM
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
-- Database: `fds`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `name`) VALUES
(1, 'Adajan'),
(2, 'Adajan Road'),
(3, 'Athwa Gate'),
(4, 'Athwalines'),
(5, 'Bhatar Road'),
(6, 'Chowk Bazaar'),
(7, 'City Light Road'),
(8, 'Delhi Gate'),
(9, 'Ghod Dod Road'),
(10, 'Katargam'),
(11, 'Majura Gate'),
(12, 'Pandesara'),
(13, 'Parle Point'),
(14, 'Piplod'),
(15, 'Rander'),
(16, 'Rander Road'),
(17, 'Sagrampura'),
(18, 'Station Road'),
(19, 'Udhna Zone'),
(20, 'Varachha Road'),
(21, 'Ved Road'),
(22, 'Mota Varachha'),
(23, 'Nana Varachha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `CategoryName`, `status`) VALUES
(1, 'Snacks', 1),
(2, 'Beverages', 1),
(3, 'Desserts', 1),
(4, 'Breakfast', 1),
(5, 'Lunch', 1),
(6, 'Dinner', 1),
(7, 'Biryani', 1),
(8, 'South Indian', 1),
(9, 'North Indian', 1),
(10, 'Chinese', 1),
(11, 'Italian', 1),
(12, 'Mexican', 1),
(13, 'Fast Food', 1),
(14, 'Seafood', 1),
(15, 'Salads', 1),
(16, 'Soups', 1),
(17, 'Grilled', 1),
(18, 'Tandoor', 1),
(19, 'BBQ', 1),
(20, 'Continental', 1),
(21, 'Mediterranean', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` char(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `couponcode` varchar(12) NOT NULL,
  `discount` tinyint(2) NOT NULL,
  `maxuses` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_address`
--

CREATE TABLE `tbl_customer_address` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `doorno` varchar(7) NOT NULL,
  `address` varchar(255) NOT NULL,
  `areaid` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `deliverymanid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_man`
--

CREATE TABLE `tbl_delivery_man` (
  `id` int(11) NOT NULL,
  `onlinestatus` tinyint(1) DEFAULT NULL,
  `Licenseno` varchar(15) NOT NULL,
  `Licenseimage` varchar(255) NOT NULL,
  `adharcardno` varchar(15) NOT NULL,
  `addharcardimage` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fooditem`
--

CREATE TABLE `tbl_fooditem` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `totalratingdone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `couponid` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cart`
--

CREATE TABLE `tbl_order_cart` (
  `id` int(11) NOT NULL,
  `fooditemid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `Transcationid` varchar(25) DEFAULT NULL,
  `payment_mode` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `gstno` varchar(15) NOT NULL,
  `Licesnseno` varchar(14) NOT NULL,
  `OpeningTime` time NOT NULL,
  `ClosingTime` time NOT NULL,
  `areaid` int(11) NOT NULL,
  `Licesnseimage` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_restaurant`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `password` varchar(38) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `PhoneNo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `accounthash` varchar(64) DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`userid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userid`),
  ADD KEY `order_id` (`orderid`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area-id` (`areaid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliverymanid` (`deliverymanid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `tbl_delivery_man`
--
ALTER TABLE `tbl_delivery_man`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery-man__user` (`userid`);

--
-- Indexes for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant-food` (`restaurantID`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartid` (`cartid`);

--
-- Indexes for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart-cartid` (`cartid`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order-payment` (`orderid`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-restaurant` (`userid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounthash` (`accounthash`),
  ADD UNIQUE KEY `reset_token` (`reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_delivery_man`
--
ALTER TABLE `tbl_delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`orderid`) REFERENCES `tbl_order` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  ADD CONSTRAINT `area-id` FOREIGN KEY (`areaid`) REFERENCES `tbl_area` (`id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD CONSTRAINT `deliverymanid` FOREIGN KEY (`deliverymanid`) REFERENCES `tbl_delivery_man` (`id`),
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `tbl_order` (`id`);

--
-- Constraints for table `tbl_delivery_man`
--
ALTER TABLE `tbl_delivery_man`
  ADD CONSTRAINT `delivery-man__user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  ADD CONSTRAINT `categoryid` FOREIGN KEY (`categoryid`) REFERENCES `tbl_category` (`id`),
  ADD CONSTRAINT `restaurant-food` FOREIGN KEY (`restaurantID`) REFERENCES `tbl_restaurant` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `cartid` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`id`);

--
-- Constraints for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  ADD CONSTRAINT `cart-cartid` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`id`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `order-payment` FOREIGN KEY (`orderid`) REFERENCES `tbl_order` (`id`);

--
-- Constraints for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD CONSTRAINT `areaid` FOREIGN KEY (`areaid`) REFERENCES `tbl_area` (`id`),
  ADD CONSTRAINT `user-restaurant` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
