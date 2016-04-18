-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 01:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `emailAddress` (`emailAddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'manager@shoppy.com', 'a6df223953803217d080e6a20776c9014c815c02', 'Manager', 'Owner'),
(2, 'sherrym@gmail.com', '5f4415b0d03b661d508f7d5458b0c925bab3fd7b', 'Mokgae', 'Mach'),
(3, 'sd@stps.app', 'c52d8bb914a505d6447ad62c58de33c853d40acf', 'Shirly', 'Daniels');

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE IF NOT EXISTS `cashiers` (
  `cashierID` int(11) NOT NULL AUTO_INCREMENT,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  PRIMARY KEY (`cashierID`),
  UNIQUE KEY `emailAddress` (`emailAddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`cashierID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'sherry@gmail.com', '70a3e3a64182370cfd7075c5317d5bc954847843', 'Shez', 'Mach');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Food'),
(2, 'FruitVeges'),
(3, 'Accesories'),
(4, 'Homeware'),
(5, 'Others'),
(6, 'Refreshments');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `colorFlavour` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`productID`,`productCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `colorFlavour`, `price`, `totalQuantity`, `size`) VALUES
(1, 1, '8902370903834', 'ChickenSpice', 'Original', 12.00, 26, '250G'),
(2, 1, '4326100982009', 'BraaiWors', 'BBQ', 15.00, 1, '600G'),
(3, 2, '000000000000T', 'Tomatoes', 'Red', 5.99, 0, 'Small/Medium/Large'),
(4, 1, '90009375849223', 'FullChicken', 'Original', 47.00, 22, '1.5 KG'),
(5, 3, '5432389201923', 'AfroComb', 'Assorted', 7.99, 92, 'Original'),
(6, 4, '34567890231', 'Backet', 'Assorted', 25.99, 47, '25L'),
(7, 5, 'Lolis567890543', 'LoliPop', 'Assorted', 1.50, 96, 'large'),
(8, 1, 'Brd0000000001', 'Bread', 'Brown', 10.00, 16, '700g'),
(9, 5, '3456789023178', 'Teethbrush', 'Assorted', 11.00, 10, 'Adult'),
(10, 2, '0nion00000001', 'Onions', 'Brown', 7.99, 1, 'Small/Medium/Large'),
(11, 1, 'Cke100000000fl', 'CakeFlour', 'White', 58.90, 11, '5KG'),
(12, 1, 'Sgr1000000298', 'SelatiSugar', 'Brown', 18.00, 5, '2KG'),
(13, 1, 'Slt1000182364', 'IodatedSalt', 'White', 15.00, 10, '1KG'),
(14, 2, 'Appls69087518', 'Apples', 'Green', 8.99, 9, '1KG'),
(15, 2, 'Orngs10000007', 'Oranges', 'Original', 10.00, 11, 'MiniSack'),
(16, 2, 'Bnns100000289', 'Bananas', 'Original', 15.00, 14, 'Small/Medium/Large'),
(17, 3, 'Hdb2098765436', 'HeadBands', 'Black', 7.99, 23, 'All'),
(18, 3, 'Skprp57809876', 'SkipRope', 'Assorted', 8.99, 2, 'Medium'),
(19, 3, 'Wtrbttl678090', 'WaterBottle', 'Assorted', 12.00, 19, '750ML'),
(20, 4, 'Bthtb34590807', 'BathTab', 'Assorted', 40.00, 11, '40L'),
(21, 4, 'wdnspns789002', 'WoodenSpoons', 'Brown', 25.99, 30, 'Small/Medium/Large'),
(22, 4, 'Tmblr80909876', 'Tumblers', 'Assorted', 15.00, 10, '250ML'),
(23, 4, 'Glsjk678908765', 'GlassJug', 'PureGlass', 25.99, 11, '1.6L'),
(24, 5, 'Snkwls4537923', 'Snakwells', 'Assorted', 1.00, 46, '24G'),
(25, 5, 'Fcclth6790789', 'FaceCloth', 'Assorted', 6.00, 36, 'Normal'),
(26, 5, 'Clgt456709805', 'Toothpaste', 'Colgate', 9.99, 9, '100G'),
(27, 2, 'Ltchs64324098', 'Litchis', 'Original', 12.00, 14, 'Small/Medium/Large'),
(28, 5, 'Shld636383793', 'ShieldDeo', 'Assorted', 13.00, 3, '50ML');

-- --------------------------------------------------------

--
-- Table structure for table `saleitems`
--

CREATE TABLE IF NOT EXISTS `saleitems` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `saleID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `saleitems`
--

INSERT INTO `saleitems` (`itemID`, `saleID`, `productName`, `itemPrice`, `quantity`) VALUES
(1, 1, 'BraaiWors', 15.00, 1),
(2, 1, 'Bread', 10.00, 1),
(3, 1, 'GlassJug', 25.99, 1),
(4, 2, 'SkipRope', 8.99, 1),
(5, 2, 'WaterBottle', 12.00, 2),
(6, 2, 'WoodenSpoons', 25.99, 1),
(7, 2, 'Snakwells', 1.00, 1),
(8, 2, 'ShieldDeo', 13.00, 3),
(9, 2, 'Onions', 7.99, 1),
(10, 3, 'Tumblers', 15.00, 1),
(11, 3, 'SkipRope', 8.99, 2),
(12, 3, 'FullChicken', 47.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `saleID` int(11) NOT NULL AUTO_INCREMENT,
  `cashierID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `cashierID`, `Date`, `totalAmount`) VALUES
(1, 1, '2015-11-12', 50.99),
(2, 1, '2015-11-12', 106.97),
(3, 1, '2015-11-12', 79.98);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
