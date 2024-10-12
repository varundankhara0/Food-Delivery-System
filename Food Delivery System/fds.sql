-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 03:52 PM
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

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `userid`, `status`) VALUES
(1, 2, 0),
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 2, 0),
(6, 2, 0),
(7, 2, 0),
(8, 2, 0);

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
  `image` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `completionstatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`id`, `orderid`, `description`, `role`, `image`, `userid`, `completionstatus`) VALUES
(1, 1, 'Food is delivered late', 'c', NULL, 1, 3),
(2, 2, 'ssssss', 'c', NULL, 2, 3),
(3, 2, 'not good food', 'c', NULL, 1, 4),
(6, 2, 'not good food', 'c', 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/event.jpg', 1, 4),
(8, 2, 'not good food', 'c', NULL, 1, 1),
(9, 2, 'not good food', 'c', NULL, 1, 1),
(10, 2, 'not good food', 'c', NULL, 1, 1),
(11, 2, 'not good food', 'c', NULL, 1, 1),
(12, 2, 'not good food', 'c', NULL, 1, 1),
(13, 2, 'not good food', 'c', NULL, 1, 2),
(14, 2, 'not good food', 'c', 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/categories-01.jpg', 1, 3);

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
  `maxuses` varchar(10) NOT NULL,
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

--
-- Dumping data for table `tbl_customer_address`
--

INSERT INTO `tbl_customer_address` (`id`, `userid`, `doorno`, `address`, `areaid`, `type`, `status`) VALUES
(1, 1, 'B2/701', 'Pratistha Apartments, Pragati Nagar, Piplod Jakatnaka, Pratistha Apartments, Piplod Main Road, Maheshwari Society, Krishnadham Society, Piplod, Surat, Gujarat, 395007, India  ', 14, 'h', 1);

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

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`id`, `orderid`, `deliverymanid`, `amount`) VALUES
(6, 1, 1, 40.00);

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
  `userid` int(11) NOT NULL,
  `currentareaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_delivery_man`
--

INSERT INTO `tbl_delivery_man` (`id`, `onlinestatus`, `Licenseno`, `Licenseimage`, `adharcardno`, `addharcardimage`, `status`, `userid`, `currentareaid`) VALUES
(1, 1, 'DL-142011001234', 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/Licenseimage1.jpg', '265385644663', 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/ChickenBriyani.jpg', 0, 3, 14);

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
  `rating` double(5,2) NOT NULL,
  `totalratingdone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fooditem`
--

INSERT INTO `tbl_fooditem` (`id`, `name`, `Description`, `price`, `image`, `type`, `categoryid`, `restaurantID`, `rating`, `totalratingdone`, `status`, `dateadded`) VALUES
(1, 'Veg Masla Dosa', 'Indulge in the classic South Indian delight with our Veg Masala Dosa. This crispy, golden-brown crepe is made from fermented rice and lentil batter, offering a perfect blend of crunch and softness. Inside, discover a flavorful potato filling, spiced with ', 129.99, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/banner-image.jpg', 0, 8, 1, 0.00, 0, 1, '2024-08-07 20:55:22'),
(2, 'Chicken Briyani', 'Savor the rich and aromatic flavors of our Chicken Biryani, a classic dish made with tender, juicy chicken pieces marinated in a blend of exotic spices and slow-cooked with fragrant basmati rice. Each bite is infused with the warmth of spices like saffron', 200.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/ChickenBriyani.jpg', 1, 18, 2, 0.00, 0, 1, '2024-08-08 22:15:49'),
(3, 'Roasted Chicken', '\r\nRoasted chicken is a classic dish known for its golden-brown, crispy skin and tender, juicy meat. The chicken is typically seasoned with a blend of herbs and spices like rosemary, thyme, garlic, and paprika, which infuse the meat with a savory aroma and', 662.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/roasted chicken.jpg', 1, 18, 1, 0.00, 0, 1, '2024-08-10 19:09:43'),
(4, 'Stuffed Potato', 'Stuffed potatoes are a delicious and versatile dish where baked or boiled potatoes are hollowed out and filled with a variety of savory ingredients. The potato flesh is often mixed with ingredients like cheese, bacon, sour cream, chives, and herbs, then s', 421.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/stuffed potato.jpg', 0, 20, 1, 0.00, 0, 1, '2024-08-10 19:18:54'),
(5, 'Pasta', 'Pasta is a staple of Italian cuisine made from wheat flour and water, sometimes with eggs, and comes in many shapes and sizes, from spaghetti and penne to fusilli and ravioli. The versatility of pasta makes it suitable for a wide range of dishes.\r\n\r\nCooke', 700.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/pasta.jpg', 0, 11, 1, 0.00, 0, 1, '2024-08-10 19:20:40'),
(6, 'Fish', 'Fish is a versatile and nutritious food that can be prepared in various ways, including grilling, baking, frying, steaming, or poaching. The flavor and texture of fish can vary widely depending on the type. For example, salmon is known for its rich, oily ', 525.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/cooked fish.jpg', 1, 14, 1, 0.00, 0, 1, '2024-08-10 19:22:39'),
(7, 'Sausage Pizaa', 'The crust can range from thin and crispy to thick and chewy, and its usually baked in an oven until the edges are golden and the cheese is melted and bubbly. Toppings can include an array of options such as pepperoni, mushrooms, bell peppers, onions, oliv', 425.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/Pizza.jpeg', 1, 11, 1, 0.00, 0, 1, '2024-08-10 19:25:48'),
(8, 'Fruit Tart', 'A fruit tart is a delightful dessert featuring a crisp, buttery pastry crust filled with a smooth, often creamy filling and topped with a colorful assortment of fresh fruits.\r\n\r\nThe crust is typically a shortcrust pastry or tart shell, which is baked unti', 360.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/fruit-tart.jpg', 0, 3, 1, 0.00, 0, 1, '2024-08-10 19:27:58'),
(9, 'cookies', '\r\nCookies are sweet, baked treats that come in a wide array of flavors and textures. They are typically made from a combination of flour, sugar, butter, and eggs, along with various flavorings and mix-ins.', 290.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/cookies.jpg', 0, 1, 1, 0.00, 0, 1, '2024-08-10 19:30:03'),
(10, 'Blueberry Pastry', 'A blueberry pastry is a delightful treat that features a flaky, buttery pastry dough filled with sweet, juicy blueberries. This type of pastry can take various forms, including:', 320.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/blueberry-pastry.jpg', 0, 3, 1, 0.00, 0, 1, '2024-08-10 19:31:41'),
(11, 'Nachos', 'Nachos are a popular and versatile dish typically made from crispy tortilla chips topped with melted cheese and various other ingredients. ', 220.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/nachos.jpg', 0, 12, 1, 0.00, 0, 1, '2024-08-10 19:34:21'),
(12, 'Sandwich', 'A sandwich is a versatile and convenient meal consisting of one or more ingredients placed between slices of bread or inside a roll or bun. ', 450.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/sandwich.jpg', 0, 4, 1, 0.00, 0, 1, '2024-08-10 19:39:59'),
(13, 'Macroons', 'Macarons are delicate and colorful French pastries made from almond flour, egg whites, and sugar. They are known for their smooth, crisp shells and soft, chewy centers', 660.00, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/macroons.jpg', 0, 3, 1, 0.00, 0, 1, '2024-08-10 19:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `couponid` int(11) DEFAULT NULL,
  `addressid` int(11) NOT NULL,
  `status` char(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cartid`, `amount`, `couponid`, `addressid`, `status`, `date`) VALUES
(1, 1, 58000.00, NULL, 1, 'da', '2024-08-23 20:28:55'),
(2, 3, 450.00, NULL, 1, 'rc', '2024-09-12 22:59:32'),
(5, 3, 460300.00, NULL, 1, 'o', '2024-09-29 17:56:52'),
(6, 4, 660.00, NULL, 1, 'o', '2024-09-29 23:10:59'),
(7, 5, 94000.00, NULL, 1, 'o', '2024-10-12 16:04:19'),
(8, 6, 480.00, NULL, 1, 'o', '2024-10-12 16:07:27'),
(9, 7, 48000.00, NULL, 1, 'o', '2024-10-12 16:09:40'),
(10, 8, 490.00, NULL, 1, 'o', '2024-10-12 16:15:31');

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

--
-- Dumping data for table `tbl_order_cart`
--

INSERT INTO `tbl_order_cart` (`id`, `fooditemid`, `cartid`, `quantity`) VALUES
(1, 11, 1, 1),
(2, 10, 2, 1),
(3, 8, 1, 1),
(4, 11, 3, 1),
(7, 12, 3, 1),
(8, 9, 3, 3),
(9, 10, 3, 4),
(10, 4, 3, 1),
(11, 3, 3, 1),
(12, 5, 3, 1),
(13, 13, 4, 1),
(14, 12, 5, 2),
(15, 11, 6, 2),
(16, 11, 7, 2),
(17, 12, 8, 1);

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

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `orderid`, `Transcationid`, `payment_mode`) VALUES
(1, 1, 'pay_OoNjyU8sMQDNEx', 'o'),
(2, 2, NULL, 'c'),
(3, 5, 'pay_P2yuzKvvW6LWCm', 'o'),
(4, 6, 'pay_P34DcDrkEvejBY', 'o'),
(5, 7, 'pay_P85wUjaCGzAiw4', 'o'),
(6, 8, 'pay_P85zoSxVhti4nb', 'o'),
(7, 9, 'pay_P8627d2cd71wby', 'o'),
(8, 10, 'pay_P868JLbVRoNzGi', 'o');

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

INSERT INTO `tbl_restaurant` (`id`, `Name`, `status`, `address`, `Contact`, `gstno`, `Licesnseno`, `OpeningTime`, `ClosingTime`, `areaid`, `Licesnseimage`, `userid`) VALUES
(1, 'Luminor Hotel', 1, 'Pratistha Apartments, Pragati Nagar, Piplod Jakatnaka, Pratistha Apartments, Piplod Main Road, Maheshwari Society, Krishnadham Society, Piplod, Surat, Gujarat, 395007, India', '9326163059', '121', '121', '10:26:00', '03:26:00', 14, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/top-game-02.jpg', 1),
(2, 'baba ka dhaba', 1, 'Aavishkar Residency, 1011, Piplod ByPass St, Vesu, Surat, Gujarat, 395007, India', '9773472368', 'as12325fgaff1d3', 'ASDFGHJU765TG', '10:30:00', '11:55:00', 14, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/categories-02.jpg', 2);

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
  `reset_token_expires_at` datetime DEFAULT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `Email`, `password`, `Gender`, `PhoneNo`, `status`, `image`, `dob`, `accounthash`, `reset_token`, `reset_token_expires_at`, `data`) VALUES
(1, 'Naisal Doshi', 'naishal036@gmail.com', 'ef2bc263dfe4143ca13bee83cddbad25', 0, '9326163059', 1, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/reviewer2.jpg', '2003-06-13', NULL, NULL, NULL, '2024-10-12'),
(2, 'varun dankhara', '22bmiit031@gmail.com', 'e528309e71b2b9a37e0b0db538137abf', 0, '9773472368', 1, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/th.jpg', '2004-08-09', 'c33b2fb143af1d230279466dd8067cfd4e73278f90bb7a27c8d04732fdbb0cd9', NULL, NULL, '2024-10-12'),
(3, 'Ahaan Khan', 'cjesus69133@gmail.com', 'ef2bc263dfe4143ca13bee83cddbad25', 0, '9326163059', 1, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/trending-03.jpg', '2003-07-16', NULL, NULL, NULL, '2024-10-12'),
(4, 'Harsh Gandhi', '22bmiit016@gmail.com', 'e528309e71b2b9a37e0b0db538137abf', 0, '9099441752', 1, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/uminor.jpg', '2004-02-05', 'd57b21e16ffdef3655add0ad68a317019ee0c30f9ea0bcbb89aa893f557a3c21', NULL, NULL, '2024-10-12'),
(5, 'harsh bavlawala', 'jagdishbawlawala@gmail.com', '789f215f55165cb68d8cd7d1ac2868a7', 0, '9978068822', 1, 'C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/8863.jpg', '2005-01-11', '036f8179106c1d8047e6665d21a6002383f3591d3473e29cc878e239f38bc43e', NULL, NULL, '2024-10-12');

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
  ADD KEY `delivery-man__user` (`userid`),
  ADD KEY `currentareaid` (`currentareaid`);

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
  ADD KEY `cartid` (`cartid`),
  ADD KEY `addressid` (`addressid`);

--
-- Indexes for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart-cartid` (`cartid`),
  ADD KEY `fooditemid` (`fooditemid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_delivery_man`
--
ALTER TABLE `tbl_delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fooditem`
--
ALTER TABLE `tbl_fooditem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `delivery-man__user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_delivery_man_ibfk_1` FOREIGN KEY (`currentareaid`) REFERENCES `tbl_area` (`id`);

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
  ADD CONSTRAINT `addressid` FOREIGN KEY (`addressid`) REFERENCES `tbl_customer_address` (`id`),
  ADD CONSTRAINT `cartid` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`id`);

--
-- Constraints for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  ADD CONSTRAINT `cart-cartid` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`id`),
  ADD CONSTRAINT `fooditemid` FOREIGN KEY (`fooditemid`) REFERENCES `tbl_fooditem` (`id`);

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
