-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 09:48 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerName` varchar(25) DEFAULT NULL,
  `customerId` int(11) NOT NULL,
  `place` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phoneNumber` varchar(13) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerName`, `customerId`, `place`, `email`, `phoneNumber`, `username`, `password`) VALUES
('fatma', 12345685, 'Vikokotoni', 'fatma@gmail.com', '0789028454', 'fatma11', '123456'),
('mohd', 12345686, 'Malindi ', 'mohd@gmail.com', '0785766666', 'mohd22', '123456');

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
('Burger and Chips', 1, 100, 'Foods', '15000', 1, 'imgs/burger.jpg'),
('Plain Burger', 2, 100, 'Foods', '10000', 1, 'imgs/big_hamburger_isolated_on_white.jpg'),
('Chicken Chips', 3, 150, 'Foods', '12000', 1, 'imgs/chickenchips.jpg'),
('Ginger', 4, 500, 'Cooking Remedies', '1000', 1, 'imgs/ginger.jpg'),
('Coca Cola', 5, 200, 'Beverages', '1000', 1, 'imgs/sodacan.jpg'),
('Lemonade', 6, 300, 'Beverages', '1200', 1, 'imgs/lemonade.png'),
('GalaxyS10', 7, 58, 'Electronics', '350000', 1, 'imgs/galaxyS10.jpg'),
('iPhone11Pro', 8, 50, 'Electronics', '1000000', 1, 'imgs/iPhone11Pro.png'),
('Baby Jumpsuit', 9, 500, 'Babies Clothes', '5000', 1, 'imgs/girls.jpg'),
('Trousers', 10, 60, 'Men Clothes', '33000', 1, 'imgs/trousers.jpg'),
('Evening Dress', 12, 30, 'Electronics', '80000', 1, NULL),
('Evening Dress', 19, 30, 'Women Clothes', '80000', 1, 'imgs/ed.webp'),
('airpods', 56, 100, 'Electronics', '55000', 1, 'imgs/airpods.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `deliveryLocation` varchar(25) DEFAULT NULL,
  `customerId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `date`, `status`, `deliveryLocation`, `customerId`, `quantity`, `itemCode`) VALUES
(5, '2020-08-12', 'DELIVERED', 'MLANDEGE', 12345685, 4, 1),
(6, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 1, 7),
(7, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 2, 56),
(8, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 30, 5),
(9, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 100, 9),
(10, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 12, 4),
(11, '2020-08-14', 'NEW', 'MLANDEGE', 12345685, 5, 10);

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemCode`),
  ADD KEY `retailerId` (`retailerId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `itemCode` (`itemCode`);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345687;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`itemCode`) REFERENCES `item` (`itemCode`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`retailerId`) REFERENCES `retailer` (`retailerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
