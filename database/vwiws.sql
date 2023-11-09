-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2023 at 04:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vwiws`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `streetAddress` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postalCode` varchar(45) NOT NULL,
  `createdOn` datetime NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `fname`, `lname`, `position`, `dateOfBirth`, `contactNumber`, `email`, `streetAddress`, `city`, `province`, `postalCode`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(5, 'Nathaniel', 'Sison', 'Manager', '2023-01-04', '09295271894', 'sison@gmail.com', 'hi', 'hello', 'metro', '1622', '2023-06-01 14:13:10', 'Admin', NULL, NULL),
(6, 'Nathaniel', 'Sison', 'Manager', '2023-01-04', '09295271894', 'sison@gmail.com', 'hi', 'hello', 'metro', '1622', '2023-06-01 14:15:20', 'Admin', NULL, NULL),
(7, 'admin', 'admin', 'Manager', '1923-10-14', '09123456789', 'admin@admin.com', 'admin st. admin village', 'admin city', 'admin', '1234', '2023-10-14 19:23:14', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  `status` varchar(45) NOT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `last_login` varchar(45) DEFAULT NULL,
  `createdOn` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `updatedOn` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_admin_login_administrators1_idx` (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `adminId`, `username`, `password`, `status`, `remarks`, `last_login`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, 6, 'anielsison', '$2y$10$xn0Euqzln.T0Mjs3mwJpcOCO7ihibTUTJYvtAcS7D33tz6QSMKbNK', '1', 'Newly Added', NULL, '2023-06-01 14:15:20', NULL, NULL, NULL),
(2, 7, 'admin', '$2y$10$sZ0BPIoI1pRD8mK8SfKRU.ZdLUpGFSIPb9sZ1/uAOxisQA56opgUe', '1', 'Newly Added', NULL, '2023-10-14 19:23:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `streetAddress` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postalCode` varchar(45) NOT NULL,
  `createdOn` datetime NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customerId_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `dateOfBirth`, `contactNumber`, `email`, `streetAddress`, `city`, `province`, `postalCode`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(5, 'Nathaniel', 'Sison', '2001-11-05', '09295271894', 'anielsison@gmail.com', '5th street', 'Pasig', 'Metro Manila', '1611', '2023-06-01 14:05:59', 'Customer', NULL, NULL),
(6, 'user', 'user', '2010-01-07', '09123456789', 'user@user.com', '5th st', 'Pasig', 'Metro Manila', '1611', '2023-10-23 15:02:20', 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cust_login`
--

DROP TABLE IF EXISTS `cust_login`;
CREATE TABLE IF NOT EXISTS `cust_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custId` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `last_login` varchar(45) DEFAULT NULL,
  `createdOn` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `updatedOn` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `loginToCust_idx` (`custId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_login`
--

INSERT INTO `cust_login` (`id`, `custId`, `username`, `password`, `status`, `remarks`, `last_login`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, 5, 'nmsison', '$2y$10$LWPsfQaZUxp85I4BP2QkJOQStqczib6WVRsieBQL1yYakXCgYYQzy', '1', 'Newly Added', NULL, '2023-06-01 14:05:59', NULL, NULL, NULL),
(2, 6, 'user', '$2y$10$rGF4.efVlXL5vap1Ud2u0OEZ3jLh//Eqca9UjRY5FkQegY0R1sNaW', '1', 'Newly Added', NULL, '2023-10-23 15:02:20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `method` varchar(45) NOT NULL,
  `shippingAddress` varchar(128) NOT NULL,
  `shippingFee` decimal(6,2) DEFAULT NULL,
  `shippingDate` datetime DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deliveryToTrans_idx` (`transactionID`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `transactionID`, `status`, `method`, `shippingAddress`, `shippingFee`, `shippingDate`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(27, 29, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-06-08 04:56:04', 'Customer', NULL, NULL),
(28, 30, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-06-13 19:26:04', 'Customer', NULL, NULL),
(29, 31, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-19 19:38:04', 'Customer', NULL, NULL),
(30, 40, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-19 21:23:43', 'Customer', NULL, NULL),
(31, 41, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-19 21:28:12', 'Customer', NULL, NULL),
(32, 42, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-19 21:35:56', 'Customer', NULL, NULL),
(33, 43, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 06:43:18', 'Customer', NULL, NULL),
(34, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:01:00', 'Customer', NULL, NULL),
(35, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:01:44', 'Customer', NULL, NULL),
(36, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:01:46', 'Customer', NULL, NULL),
(37, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:01:49', 'Customer', NULL, NULL),
(38, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:05:22', 'Customer', NULL, NULL),
(39, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:05:26', 'Customer', NULL, NULL),
(40, 46, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:06:16', 'Customer', NULL, NULL),
(41, 47, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:06:49', 'Customer', NULL, NULL),
(42, 47, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:08:39', 'Customer', NULL, NULL),
(43, 47, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:09:35', 'Customer', NULL, NULL),
(44, 48, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:10:20', 'Customer', NULL, NULL),
(45, 48, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:10:36', 'Customer', NULL, NULL),
(46, 49, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, '2022-11-11 00:00:00', '2023-10-23 13:19:56', 'Customer', NULL, NULL),
(47, 50, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 13:56:31', 'Customer', NULL, NULL),
(48, 51, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 14:03:00', 'Customer', NULL, NULL),
(49, 52, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, '2022-08-11 00:00:00', '2023-10-23 14:04:37', 'Customer', NULL, NULL),
(50, 54, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 15:09:47', 'Customer', NULL, NULL),
(51, 53, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 15:14:49', 'Customer', NULL, NULL),
(52, 55, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 16:22:32', 'Customer', NULL, NULL),
(53, 55, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 16:24:37', 'Customer', NULL, NULL),
(54, 56, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 16:33:39', 'Customer', NULL, NULL),
(55, 67, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 16:44:39', 'Customer', NULL, NULL),
(56, 76, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 16:48:51', 'Customer', NULL, NULL),
(57, 78, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 17:21:07', 'Customer', NULL, NULL),
(58, 80, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-23 17:43:15', 'Customer', NULL, NULL),
(59, 81, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-24 01:16:01', 'Customer', NULL, NULL),
(60, 82, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-24 01:20:52', 'Customer', NULL, NULL),
(61, 83, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-24 01:25:53', 'Customer', NULL, NULL),
(62, 84, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-25 13:15:34', 'Customer', NULL, NULL),
(63, 85, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-25 13:17:40', 'Customer', NULL, NULL),
(64, 86, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, NULL, '2023-10-26 00:34:59', 'Customer', NULL, NULL),
(65, 87, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, NULL, '2023-10-26 23:35:53', 'Customer', NULL, NULL),
(66, 88, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, '2023-09-02 00:00:00', '2023-11-09 03:13:04', 'Customer', NULL, NULL),
(67, 89, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, '1974-10-04 00:00:00', '2023-11-09 07:42:53', 'Customer', NULL, NULL),
(68, 90, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, '2023-11-06 00:00:00', '2023-11-09 08:27:53', 'Customer', NULL, NULL),
(69, 91, 'PENDING', 'delivery', '5th street Pasig Metro Manila 1611', NULL, '2023-11-07 00:00:00', '2023-11-09 09:04:37', 'Customer', NULL, NULL),
(70, 92, 'PENDING', 'delivery', '5th st Pasig Metro Manila 1611', NULL, '2023-11-09 00:00:00', '2023-11-09 11:11:16', 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_forms`
--

DROP TABLE IF EXISTS `inquiry_forms`;
CREATE TABLE IF NOT EXISTS `inquiry_forms` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `existingCustomerId` int(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(11) DEFAULT NULL,
  `inquiryStatement` varchar(255) NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `product_varID` int(11) NOT NULL,
  `transactionId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `updatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ordersToProducts_idx` (`productId`),
  KEY `ordersToTrans_idx` (`transactionId`),
  KEY `ordersToProduct_vars_idx` (`product_varID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `productId`, `product_varID`, `transactionId`, `quantity`, `createdBy`, `createdOn`, `updatedBy`, `updatedOn`) VALUES
(10, 7, 5, 29, 1, 'Customer', '2023-06-08 04:55:58', NULL, NULL),
(13, 8, 7, 30, 1, 'Customer', '2023-06-13 19:25:52', NULL, NULL),
(14, 7, 5, 31, 1, 'Customer', '2023-10-19 19:37:52', NULL, NULL),
(15, 8, 7, 40, 2, 'Customer', '2023-10-19 21:21:26', NULL, NULL),
(16, 6, 4, 41, 2, 'Customer', '2023-10-19 21:27:40', NULL, NULL),
(17, 6, 4, 42, 2, 'Customer', '2023-10-19 21:35:46', NULL, NULL),
(18, 6, 4, 43, 2, 'Customer', '2023-10-19 21:37:16', NULL, NULL),
(19, 7, 5, 46, 2, 'Customer', '2023-10-23 12:51:32', NULL, NULL),
(20, 7, 5, 47, 2, 'Customer', '2023-10-23 13:06:42', NULL, NULL),
(21, 7, 5, 48, 2, 'Customer', '2023-10-23 13:10:30', NULL, NULL),
(22, 7, 5, 49, 2, 'Customer', '2023-10-23 13:19:50', NULL, NULL),
(23, 7, 5, 50, 2, 'Customer', '2023-10-23 13:55:54', NULL, NULL),
(24, 6, 4, 51, 2, 'Customer', '2023-10-23 14:02:04', NULL, NULL),
(25, 6, 4, 52, 2, 'Customer', '2023-10-23 14:04:32', NULL, NULL),
(26, 6, 4, 54, 2, 'Customer', '2023-10-23 15:09:41', NULL, NULL),
(27, 6, 4, 53, 4, 'Customer', '2023-10-23 15:14:44', NULL, NULL),
(28, 7, 5, 55, 2, 'Customer', '2023-10-23 16:22:05', NULL, NULL),
(29, 7, 5, 56, 3, 'Customer', '2023-10-23 16:33:34', NULL, NULL),
(32, 7, 6, 67, 2, 'Customer', '2023-10-23 16:38:57', NULL, NULL),
(33, 7, 6, 76, 2, 'Customer', '2023-10-23 16:48:46', NULL, NULL),
(38, 7, 6, 78, 2, 'Customer', '2023-10-23 17:19:50', NULL, NULL),
(39, 7, 6, 80, 3, 'Customer', '2023-10-23 17:43:05', NULL, NULL),
(40, 7, 6, 81, 2, 'Customer', '2023-10-24 01:14:43', NULL, NULL),
(41, 7, 6, 82, 2, 'Customer', '2023-10-24 01:20:11', NULL, NULL),
(42, 7, 6, 83, 2, 'Customer', '2023-10-24 01:25:47', NULL, NULL),
(43, 8, 7, 84, 2, 'Customer', '2023-10-25 13:14:37', NULL, NULL),
(44, 7, 6, 85, 2, 'Customer', '2023-10-25 13:17:14', NULL, NULL),
(46, 8, 7, 86, 2, 'Customer', '2023-10-26 00:34:45', NULL, NULL),
(47, 7, 5, 87, 1, 'Customer', '2023-10-26 23:35:35', NULL, NULL),
(48, 8, 7, 88, 2, 'Customer', '2023-11-02 20:47:03', NULL, NULL),
(49, 8, 7, 88, 2, 'Customer', '2023-11-09 03:12:49', NULL, NULL),
(50, 8, 7, 89, 2, 'Customer', '2023-11-09 07:42:48', NULL, NULL),
(51, 6, 4, 90, 5, 'Customer', '2023-11-09 08:27:43', NULL, NULL),
(52, 6, 4, 91, 2, 'Customer', '2023-11-09 09:04:33', NULL, NULL),
(53, 6, 4, 92, 3, 'Customer', '2023-11-09 11:10:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactionId` int(11) NOT NULL,
  `method` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `amount` double NOT NULL,
  `paidDate` datetime NOT NULL,
  `paidBy` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `paymentToTrans_idx` (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transactionId`, `method`, `status`, `amount`, `paidDate`, `paidBy`) VALUES
(9, 29, 'cash', 'FOR PAYMENT', 3000, '2023-06-08 04:56:04', 'Customer'),
(10, 30, 'cash', 'FOR PAYMENT', 3000, '2023-06-13 19:26:04', 'Customer'),
(11, 31, 'cash', 'FOR PAYMENT', 3000, '2023-10-19 19:38:04', 'Customer'),
(12, 40, 'cash', 'FOR PAYMENT', 3000, '2023-10-19 21:23:43', 'Customer'),
(13, 41, 'cash', 'FOR PAYMENT', 4000, '2023-10-19 21:28:12', 'Customer'),
(14, 42, 'Card', 'FOR PAYMENT', 4000, '2023-10-19 21:35:56', 'Customer'),
(15, 43, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 06:43:18', 'Customer'),
(16, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:01:00', 'Customer'),
(17, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:01:44', 'Customer'),
(18, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:01:46', 'Customer'),
(19, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:01:49', 'Customer'),
(20, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:05:22', 'Customer'),
(21, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:05:26', 'Customer'),
(22, 46, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:06:16', 'Customer'),
(23, 47, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:06:49', 'Customer'),
(24, 47, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:08:39', 'Customer'),
(25, 47, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:09:35', 'Customer'),
(26, 48, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:10:36', 'Customer'),
(27, 49, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:19:56', 'Customer'),
(28, 50, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 13:56:31', 'Customer'),
(29, 51, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 14:03:00', 'Customer'),
(30, 52, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 14:04:37', 'Customer'),
(31, 54, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 15:09:47', 'Customer'),
(32, 53, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 15:14:49', 'Customer'),
(33, 55, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 16:22:32', 'Customer'),
(34, 55, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 16:24:37', 'Customer'),
(35, 56, 'cash', 'FOR PAYMENT', 3000, '2023-10-23 16:33:39', 'Customer'),
(36, 67, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 16:44:39', 'Customer'),
(37, 76, 'cash', 'FOR PAYMENT', 4000, '2023-10-23 16:48:51', 'Customer'),
(38, 78, 'cash', 'FOR PAYMENT', 8000, '2023-10-23 17:21:07', 'Customer'),
(39, 80, 'cash', 'FOR PAYMENT', 12000, '2023-10-23 17:43:15', 'Customer'),
(40, 81, 'cash', 'FOR PAYMENT', 8000, '2023-10-24 01:16:01', 'Customer'),
(41, 82, 'cash', 'FOR PAYMENT', 8000, '2023-10-24 01:20:52', 'Customer'),
(42, 83, 'cash', 'FOR PAYMENT', 8000, '2023-10-24 01:25:53', 'Customer'),
(43, 84, 'GCash', 'FOR PAYMENT', 6000, '2023-10-25 13:15:34', 'Customer'),
(44, 85, 'GCash', 'FOR PAYMENT', 8000, '2023-10-25 13:17:40', 'Customer'),
(45, 86, 'Maya', 'FOR PAYMENT', 6000, '2023-10-26 00:34:59', 'Customer'),
(46, 87, 'cash', 'FOR PAYMENT', 3000, '2023-10-26 23:35:53', 'Customer'),
(47, 88, 'cash', 'FOR PAYMENT', 12000, '2023-11-09 03:13:04', 'Customer'),
(48, 89, 'cash', 'FOR PAYMENT', 6000, '2023-11-09 07:42:53', 'Customer'),
(49, 90, 'cash', 'FOR PAYMENT', 20000, '2023-11-09 08:27:53', 'Customer'),
(50, 91, 'cash', 'FOR PAYMENT', 8000, '2023-11-09 09:04:37', 'Customer'),
(51, 92, 'cash', 'FOR PAYMENT', 12000, '2023-11-09 11:11:16', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `img` varchar(60) DEFAULT 'default_product_img00.png',
  `details` varchar(100) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `createdOn` datetime NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `img`, `details`, `active`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(6, 'D16', 'Panel Door', 'img_D16_6.jpg', 'Type: Solid Core\r\nLocation of use: Interior and Exterior\r\nMaterials: Honduran Mahogany', 1, '2023-06-01 14:19:10', 'System', '2023-11-09 08:27:12', 'System'),
(7, 'D7', 'Flush Door', 'img_D7_7.jpg', 'Type: Laminated Core\r\nLocation of use: Interior and Public Buildings\r\nMaterials: Plywood Mahogany', 1, '2023-06-01 14:23:14', 'System', '2023-11-09 11:22:53', 'System'),
(8, 'D12', 'Panel Door', 'img_D12_8.jpg', 'Type: Solid Core\r\nLocation of use: Interior and Exterior\r\nMaterials: Honduran Mahogany', 1, '2023-06-01 14:51:55', 'System', '2023-10-24 03:12:40', 'System'),
(9, 'D30', 'Panel Door', 'img_D30_9.jpg', 'Type: Solid Core\r\nLocation of use: Interior and Exterior\r\nMaterials: Honduran Mahogany', 1, '2023-06-05 14:09:16', 'System', '2023-11-09 11:12:59', 'System');

-- --------------------------------------------------------

--
-- Table structure for table `product_var`
--

DROP TABLE IF EXISTS `product_var`;
CREATE TABLE IF NOT EXISTS `product_var` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT 0,
  `createdOn` datetime NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_varsToProducts_idx` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_var`
--

INSERT INTO `product_var` (`id`, `productId`, `color`, `size`, `img`, `stock`, `price`, `featured`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(4, 6, 'Mahogany', '60cm  x 210cm', 'img_D16_6_var4.jpg', 40, '4000.00', 1, '2023-06-01 14:20:26', 'System', '2023-11-09 11:11:16', 'System'),
(5, 7, 'Mahogany', '60cm  x 210cm', 'img_D7_7_var5.jpg', 12, '3000.00', 0, '2023-06-01 14:24:02', 'System', '2023-11-09 11:23:09', 'System'),
(6, 7, 'Mahogany', '70cm x 210cm', 'img_D7_7_var6.jpg', 0, '4000.00', 0, '2023-06-01 14:46:44', 'System', '2023-10-25 13:17:40', 'System'),
(7, 8, 'Mahogany', '60cm  x 210cm', 'img_D12_8_var7.jpg', 4, '3000.00', 1, '2023-06-01 15:20:00', 'System', '2023-11-09 07:42:53', 'System'),
(8, 9, 'Mahogany', '60cm  x 210cm', 'default_product_img00.png', 12, '5000.00', 0, '2023-10-19 20:59:59', 'System', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `amount` decimal(45,2) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `discount` decimal(6,2) DEFAULT NULL,
  `createdOn` datetime DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `forProductInstallation` varchar(3) DEFAULT 'No',
  `productInstallationStart` datetime DEFAULT NULL,
  `productInstallationEnd` datetime DEFAULT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `transToCust_idx` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customerId`, `status`, `active`, `amount`, `dateTime`, `discount`, `createdOn`, `createdBy`, `forProductInstallation`, `productInstallationStart`, `productInstallationEnd`, `updatedOn`, `updatedBy`) VALUES
(29, 5, 'COMPLETED', 0, '3000.00', NULL, NULL, '2023-06-08 04:55:50', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-06-08 05:18:08', 'System'),
(30, 5, 'COMPLETED', 0, '3000.00', NULL, NULL, '2023-06-08 05:18:08', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-06-13 19:27:53', 'Nathaniel'),
(31, 5, 'COMPLETED', 0, '3000.00', NULL, NULL, '2023-06-13 19:27:53', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-10-19 21:19:08', 'admin'),
(40, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-19 21:20:22', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-10-19 21:27:32', 'Customer'),
(41, 5, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-19 21:27:40', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-10-19 21:35:37', 'Customer'),
(42, 5, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-19 21:35:46', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-10-19 21:37:11', 'Customer'),
(43, 5, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-19 21:37:16', 'System', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-10-23 12:50:38', 'Customer'),
(46, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 12:51:18', 'System', 'No', NULL, NULL, '2023-10-23 13:06:27', 'Customer'),
(47, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 13:06:42', 'System', 'Yes', NULL, NULL, '2023-10-23 13:10:13', 'Customer'),
(48, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 13:10:13', 'System', 'Yes', NULL, NULL, '2023-10-23 13:19:40', 'Customer'),
(49, 5, 'COMPLETED', 0, '3000.00', NULL, NULL, '2023-10-23 13:19:40', 'System', 'Yes', '2022-11-11 00:00:00', '2022-11-12 00:00:00', '2023-11-09 05:27:29', 'System'),
(50, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 13:20:53', 'System', 'Yes', NULL, NULL, '2023-10-23 14:01:26', 'Customer'),
(51, 5, 'COMPLETED', 0, '4000.00', NULL, NULL, '2023-10-23 14:02:04', 'System', 'Yes', NULL, NULL, '2023-10-23 14:03:19', 'admin'),
(52, 5, 'COMPLETED', 0, '4000.00', NULL, NULL, '2023-10-23 14:03:19', 'System', 'Yes', NULL, NULL, '2023-10-23 15:08:54', 'admin'),
(53, 6, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-23 15:02:30', 'System', 'Yes', NULL, NULL, '2023-10-23 15:53:24', 'Customer'),
(54, 5, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-23 15:09:41', 'System', 'Yes', NULL, NULL, '2023-10-23 16:14:20', 'Customer'),
(55, 6, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 16:22:05', 'System', NULL, NULL, NULL, '2023-10-23 16:32:37', 'Customer'),
(56, 6, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-23 16:22:30', 'System', NULL, NULL, NULL, '2023-10-23 16:35:24', 'Customer'),
(67, 6, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-23 16:37:25', 'System', NULL, NULL, NULL, '2023-10-23 16:47:11', 'Customer'),
(76, 6, 'CANCELLED', 0, '4000.00', NULL, NULL, '2023-10-23 16:48:46', 'System', NULL, NULL, NULL, '2023-10-23 16:54:28', 'Customer'),
(78, 5, 'CANCELLED', 0, '8000.00', NULL, NULL, '2023-10-23 16:54:49', 'System', NULL, NULL, NULL, '2023-10-23 17:22:02', 'Customer'),
(80, 6, 'CANCELLED', 0, '12000.00', NULL, NULL, '2023-10-23 17:43:05', 'System', NULL, NULL, NULL, '2023-10-23 17:43:48', 'Customer'),
(81, 6, 'CANCELLED', 0, '8000.00', NULL, NULL, '2023-10-24 01:14:43', 'System', 'Yes', NULL, NULL, '2023-10-24 01:19:58', 'Customer'),
(82, 6, 'CANCELLED', 0, '8000.00', NULL, NULL, '2023-10-24 01:20:11', 'System', 'Yes', NULL, NULL, '2023-10-24 01:25:41', 'Customer'),
(83, 6, 'COMPLETED', 0, '8000.00', NULL, NULL, '2023-10-24 01:25:47', 'System', NULL, NULL, NULL, '2023-10-24 02:39:54', 'admin'),
(84, 6, 'CANCELLED', 0, '6000.00', NULL, NULL, '2023-10-25 13:14:37', 'System', 'Yes', NULL, NULL, '2023-10-25 13:17:04', 'Customer'),
(85, 6, 'CANCELLED', 0, '8000.00', NULL, NULL, '2023-10-25 13:17:14', 'System', NULL, NULL, NULL, '2023-10-25 13:49:51', 'Customer'),
(86, 6, 'CANCELLED', 0, '6000.00', NULL, NULL, '2023-10-25 13:51:11', 'System', 'Yes', NULL, NULL, '2023-11-02 20:46:52', 'Customer'),
(87, 5, 'CANCELLED', 0, '3000.00', NULL, NULL, '2023-10-26 23:35:35', 'System', 'Yes', NULL, NULL, '2023-11-02 20:46:08', 'Customer'),
(88, 6, 'CANCELLED', 0, '12000.00', NULL, NULL, '2023-11-02 20:47:03', 'System', 'Yes', '2023-09-02 00:00:00', '2023-07-03 00:00:00', '2023-11-09 08:27:06', 'Customer'),
(89, 5, 'CANCELLED', 0, '6000.00', NULL, NULL, '2023-11-09 07:42:48', 'System', 'Yes', '1974-10-04 00:00:00', '1974-06-05 00:00:00', '2023-11-09 08:27:07', 'Customer'),
(90, 6, 'CANCELLED', 0, '20000.00', NULL, NULL, '2023-11-09 08:27:43', 'System', 'Yes', '2023-11-06 00:00:00', '2023-12-03 00:00:00', '2023-11-09 10:55:58', 'Customer'),
(91, 5, 'FOR SHIPPING', 1, '8000.00', NULL, NULL, '2023-11-09 09:04:33', 'System', 'Yes', '2023-11-07 00:00:00', '2023-12-12 00:00:00', '2023-11-09 09:12:13', 'admin'),
(92, 6, 'FOR PAYMENT', 1, '12000.00', NULL, NULL, '2023-11-09 11:10:48', 'System', 'Yes', '2023-11-09 00:00:00', '2023-11-16 00:00:00', '2023-11-09 11:12:14', 'System');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `fk_admin_login_administrators1` FOREIGN KEY (`adminId`) REFERENCES `administrators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cust_login`
--
ALTER TABLE `cust_login`
  ADD CONSTRAINT `fk_cust_login_customers1` FOREIGN KEY (`custId`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `deliveryToTrans` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `ordersToProduct_vars` FOREIGN KEY (`product_varID`) REFERENCES `product_var` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordersToProducts` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordersToTrans` FOREIGN KEY (`transactionId`) REFERENCES `transactions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `paymentToTrans` FOREIGN KEY (`transactionId`) REFERENCES `transactions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_var`
--
ALTER TABLE `product_var`
  ADD CONSTRAINT `product_varsToProducts` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transToCust` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
