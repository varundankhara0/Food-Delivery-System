-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 07:31 PM
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
-- Table structure for table `tbl_fooditem`
--

CREATE TABLE `tbl_fooditem` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `cityid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `password` varchar(38) NOT NULL,
  `PhoneNo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `Email`, `password`, `PhoneNo`, `status`, `image`) VALUES
(14, 'Naishal Manish Doshi', 'cjesus69133@gmail.com', '27933b90f4bfda6b9f7f6c8b0c2aa325', '9326163059', 0, 'gg.png'),
(15, 'Naishal Manish Doshi', 'cjesus69133@gmail.com', '27933b90f4bfda6b9f7f6c8b0c2aa325', '9326163059', 0, 'gg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant-food` (`restaurantID`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-restaurant` (`userid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  ADD CONSTRAINT `restaurant-food` FOREIGN KEY (`restaurantID`) REFERENCES `tbl_restaurant` (`id`);

--
-- Constraints for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD CONSTRAINT `user-restaurant` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
