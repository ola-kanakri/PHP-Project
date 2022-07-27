-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 12:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'amal', 'amalabed116@gmail.com', '123', 'admin.jpg', '077885221', 'jordan', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical '),
(3, 'Ahmad', 'ahmad@mail.com', 'ahmad@mail.com', 'myPhoto.jpeg', '0798014636', 'jordan', 'Developer', '  sss ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userIDpen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `productID`, `customerID`, `quantity`, `userIDpen`) VALUES
(40, 6, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(6, 'Surgical Supplies', 'yes', 'surgery-room.png'),
(7, 'Hospital Beds', 'yes', 'Hospital-Bed-1024x647.jpg'),
(8, 'Complementary Furniture ', 'no', 'Inspace-innerpage-Img04.jpg'),
(13, 'Medical Chairs', 'no', 'why-we-recycle-durable-medical-equipment.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(300) NOT NULL,
  `Submittime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 1, '54321', '0.2\r\n', 'MedTech20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`) VALUES
(2, 'Amal', 'amalabed116@gmail.com', '123', 'United State', 'IRBID', '0092334566931', '23 st'),
(5, 'momen', 'amalabed116@gmail.com', '12345', '', '', '', NULL),
(6, 'ghaidaa', 'ghaidaaobeidat2@gmail.com', '123', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`, `productID`) VALUES
(1, 2, 2345, 22, '12', '2022-05-21 12:21:04', 'completed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `customerID` int(11) NOT NULL,
  `productTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`customerID`, `productTitle`) VALUES
(2, 'X09 Examination Table\nX09 Examination Table\nSKE087 Reclining Chair\n'),
(2, '|X09 Examination Table\nX09 Examination Table\nSKE087 Reclining Chair\n'),
(2, 'X09 Examination Table\nX09 Examination Table\nSKE087 Reclining Chair\n'),
(2, 'X09 Examination Table\nX09 Examination Table\nSKE087 Reclining Chair\n'),
(2, 'X09 Examination Table\nA03 Orthopedic Frame\n'),
(2, 'X09 Examination Table\nA03 Orthopedic Frame\nSKE013-10 Medical Chair\n'),
(2, 'X09 Examination Table\nA03 Orthopedic Frame\nSKE013-10 Medical Chair\n'),
(5, 'SKE013-10 Medical Chair\n'),
(5, 'SKE013-10 Medical Chair\n'),
(5, 'SKE013-10 Medical Chair\n'),
(5, 'SKE013-10 Medical Chair\n');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `ref_no` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `orderDate`, `price`, `order_status`, `payment_status`) VALUES
(145, 2, 2114770729, '2022-05-27 22:05:12', 180, 'Preparing', 'Unpaid'),
(149, 5, 1619994141, '2022-05-27 22:10:38', 30, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `status`, `cartID`) VALUES
(1, 8, '2022-05-21 23:26:06', 'SKE008-1 Treat-waiting Chair', '391cecf2a9a497b9787e7f48e185774a.jpg', '391cecf2a9a497b9787e7f48e185774a.jpg', '391cecf2a9a497b9787e7f48e185774a.jpg', 70, 0, '\r\n\r\n\r\n\r\n\r\n\r\n* Stainless steel or powder coated steel frame\r\n* Standard accessories\r\n* 3 functions manual\r\n* USFDA,EN60601 approval\r\n\r\n\r\n\r\n\r\n', 'product', 0),
(3, 6, '2022-05-21 23:09:57', 'X09 Examination Table', 'f120d4b38a12177cc67bd6d362f56379.jpg', '7f3dfc621190c1229c91c3574d9ab340.jpg', '16fb008448546cb50e9dbd5991e7e787.jpg', 150, 0, '\r\n\r\n\r\n* Painting:11 process epoxy painting, ASTM testing anti-baterial, paint thickness 0.12mm, brightness 60°, paint can resist 50kg impact\r\n* Metal material:baosteel from fortune global 500\r\n* Panasonic robotic ensure 360° full smooth wedlding\r\n* 4 pcs Anti-slip bed feet covers\r\n* 1.2-1.5 mm thickness powder coated steel frame,250 kg bear loading\r\n* 1 function manual\r\n* USFDA,EN60601 approval\r\n\r\n\r\n', 'product', 0),
(4, 6, '2022-05-21 23:13:25', 'A03 Orthopedic Frame', '999a843bd2da2e4acfeaaeb6737677ba.jpg', '22ae9794333ab0d49d58491967dc3515.jpg', '22ae9794333ab0d49d58491967dc3515.jpg', 30, 0, '\r\n\r\n\r\n* Painting:11 process epoxy painting, ASTM testing anti-baterial, paint thickness 0.12mm, brightness 60°, paint can resist 50kg impact\r\n* Metal material:baosteel from fortune global 500\r\n* Panasonic robotic ensure 360° full smooth wedlding\r\n* 4 pcs Anti-slip bed feet covers\r\n* 1.2-1.5 mm thickness powder coated steel frame,250 kg bear loading\r\n* 1 function manual\r\n* USFDA,EN60601 approval\r\n', 'product', 0),
(5, 6, '2022-05-21 23:16:26', 'SKE013-10 Medical Chair', '7aa06df12fb3d3aca3534a24bba8e279.jpg', 'b3d6231560565ecb8bd2c8a769358de7.jpg', '7cb684c62531cace46c02dd8ff2e1eb9.jpg', 30, 4, '\r\n\r\n\r\n\r\n\r\n\r\n5432\r\n\r\n\r\n\r\n', 'product', 0),
(6, 6, '2022-05-21 22:11:30', 'SKE013-10 Medical Chair', '7cb684c62531cace46c02dd8ff2e1eb9.jpg', 'a3cc2fa1b93e66c31348650b2c0dc803.jpg', '7cb684c62531cace46c02dd8ff2e1eb9.jpg', 30, 4, '\r\n[pyhrtbgvrfdcsxaz\r\n', 'product', 0),
(7, 7, '2022-05-21 23:19:09', 'A99-13 Delivery bed', 'b3d6231560565ecb8bd2c8a769358de7.jpg', 'b3d6231560565ecb8bd2c8a769358de7.jpg', 'b3d6231560565ecb8bd2c8a769358de7.jpg', 90, 6, '\r\n\r\nELECTRICAL CONTROLLED\r\nAll movements are electrical controlled: Back plate, seat plate, table elevation, trendelenburg and reverse-trendelenburg.', 'product', 0),
(8, 7, '2022-05-21 23:21:09', 'R000w One function manual bed', 'image10.jpg', 'image10.jpg', 'image10.jpg', 45, 0, '\r\n* 5\' Noiseless Castors\r\n* Integrated detachable guardrail\r\n', 'product', 0),
(9, 7, '2022-05-21 23:22:51', 'Y6t8y Electric hospital bed', '7aa06df12fb3d3aca3534a24bba8e279.jpg', '7aa06df12fb3d3aca3534a24bba8e279.jpg', '7aa06df12fb3d3aca3534a24bba8e279.jpg', 30, 0, '\r\n\r\n* Integrated control panel in side rail\r\n* Back up battery\r\n* Directional wheels function\r\n* ABS mattress stopper\r\n* Manual CPR\r\n* Electric CPR', 'product', 0),
(10, 7, '2022-05-21 23:23:45', 'A99-13 Delivery bed', 'a3cc2fa1b93e66c31348650b2c0dc803.jpg', 'a3cc2fa1b93e66c31348650b2c0dc803.jpg', 'a3cc2fa1b93e66c31348650b2c0dc803.jpg', 20, 4, '* Integrated control panel in side rail\r\n* Back up battery\r\n* Directional wheels function\r\n* ABS mattress stopper\r\n* Manual CPR\r\n* Electric CPR\r\n\r\n', 'product', 0),
(11, 8, '2022-05-21 23:27:59', 'SKH098-9 Cabinet', '1005e37707373bcd563e984a6a69f9db.jpg', '1005e37707373bcd563e984a6a69f9db.jpg', '1005e37707373bcd563e984a6a69f9db.jpg', 150, 0, '\r\n\r\n\r\n* High quality cold rolled steel\r\n* Surface powder coated treatment\r\n* Pull handle is color customerize optional\r\n* Inner structure anti-scratch designed\r\n* Shelf adjustable\r\n* Knock-down package option available.\r\n', 'product', 0),
(12, 13, '2022-05-21 23:29:05', 'SKE087 Reclining Chair', '2846091838ec51a4a170009b7f3097b6.jpg', '2846091838ec51a4a170009b7f3097b6.jpg', '2846091838ec51a4a170009b7f3097b6.jpg', 45, 7, '\r\nThrough the button to achieve a key\r\nflat, seconds into a recliner, can lie\r\ndown to sleep.\r\n', 'product', 0),
(13, 13, '2022-05-21 23:31:11', 'SKE013-10 Medical Chair', '85da5c5c64b705811b12c16a279f44bc.jpg', '85da5c5c64b705811b12c16a279f44bc.jpg', '85da5c5c64b705811b12c16a279f44bc.jpg', 30, 6, '\r\nThrough the button to achieve a key\r\nflat, seconds into a recliner, can lie\r\ndown to sleep.\r\n', 'product', 0),
(14, 13, '2022-05-21 23:31:55', 'SKE013-10 Medical Chair', 'a2983167f88386839134da35a5625aae.jpg', 'a2983167f88386839134da35a5625aae.jpg', 'a2983167f88386839134da35a5625aae.jpg', 30, 4, '\r\nThrough the button to achieve a key\r\nflat, seconds into a recliner, can lie\r\ndown to sleep.\r\n', 'product', 0),
(15, 13, '2022-05-21 23:32:32', 'SKE013-10 Medical Chair', '57147f22fd3ee9f71b0665be471bc815.jpg', 'e936c95783c89caaf478dfde7fa165f5.jpg', 'e936c95783c89caaf478dfde7fa165f5.jpg', 30, 0, '\r\n\r\nThrough the button to achieve a key\r\nflat, seconds into a recliner, can lie\r\ndown to sleep.', 'product', 0),
(16, 13, '2022-05-21 23:33:05', 'SKE013-10 Medical Chair', 'e936c95783c89caaf478dfde7fa165f5.jpg', 'e936c95783c89caaf478dfde7fa165f5.jpg', 'e936c95783c89caaf478dfde7fa165f5.jpg', 30, 0, '\r\n\r\nThrough the button to achieve a key\r\nflat, seconds into a recliner, can lie\r\ndown to sleep.', 'product', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `cartID` (`cartID`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_orders_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
