-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 08:25 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemName` varchar(25) DEFAULT NULL,
  `itemCode` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `itemPrice` decimal(10,0) DEFAULT NULL,
  `retailerId` int(11) NOT NULL,
  `image` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemName`, `itemCode`, `quantity`, `category`, `itemPrice`, `retailerId`, `image`) VALUES
('Evening Dress', 12, 30, 'Electronics', '80000', 1, NULL),
('Evening Dress', 19, 30, 'Men Clothes', '80000', 1, 'imgs/ed.webp');

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `item_order_id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `itemCode` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `deliveryLocation` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailerName` varchar(25) DEFAULT NULL,
  `retailerId` int(11) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `place` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`retailerName`, `retailerId`, `phoneNumber`, `place`, `email`) VALUES
('Sharifa', 1, '+27789028454', 'Mlandege', 'shery@gmail.com'),
('hamida', 2, '098765432', 'Mlandege', 'sherry.26@suza.ac.tz'),
('hamida', 3, '098765432', 'Mlandege', 'sherry.26@suza.ac.tz'),
('nuru', 4, '0785766666', 'Vikokotoni', 'nurucollections@outlook.c'),
('nuru', 5, '0785766666', 'Vikokotoni', 'nurucollections@outlook.c'),
('nuru', 6, '0785766666', 'Vikokotoni', 'nurucollections@outlook.c'),
('nuru', 7, '0785766666', 'Vikokotoni', 'nurucollections@outlook.c'),
('nuru', 8, '0785766666', 'Vikokotoni', 'nurucollections@outlook.c'),
('sarah', 9, '0788888888', 'Malindi ', 'sarahs@outlook.com'),
('Azad', 10, '0785766665', 'Mkunazini', 'azad@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `userId` int(25) NOT NULL,
  `retailerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `status`, `userId`, `retailerId`) VALUES
('sharifa', '123456', 'active', 1, 1),
('hamy pinky', '12345678', 'active', 2, 2),
('hamy pinky', '12345678', 'active', 3, 2),
('sarahs_collections', '12345678', 'active', 5, 9),
('Azad11', '12345678', 'active', 7, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemCode`),
  ADD KEY `retailerId` (`retailerId`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`item_order_id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `itemCode` (`itemCode`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`retailerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `retailerId` (`retailerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `item_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`retailerId`) REFERENCES `retailer` (`retailerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_order`
--
ALTER TABLE `item_order`
  ADD CONSTRAINT `item_order_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `item_order_ibfk_2` FOREIGN KEY (`itemCode`) REFERENCES `item` (`itemCode`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`retailerId`) REFERENCES `retailer` (`retailerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
