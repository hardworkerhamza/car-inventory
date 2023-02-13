-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2023 at 08:35 AM
-- Server version: 5.7.31
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

DROP TABLE IF EXISTS `car_category`;
CREATE TABLE IF NOT EXISTS `car_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) NOT NULL,
  `wholeseller` varchar(100) NOT NULL,
  `drive_side` enum('RHD','LHD') NOT NULL DEFAULT 'LHD',
  `model` varchar(50) NOT NULL,
  `sfx` varchar(30) NOT NULL,
  `variant` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`id`, `supplier`, `wholeseller`, `drive_side`, `model`, `sfx`, `variant`, `color`) VALUES
(1, 'Supplier One', 'Whole Seller One', 'LHD', 'Model One', 'A1', 'SomeCar_1', 'Black'),
(2, 'Supplier One', 'Whole Seller Three', 'LHD', 'Model Two', 'B1', 'SomeCar_2', 'White');

-- --------------------------------------------------------

--
-- Table structure for table `car_inv`
--

DROP TABLE IF EXISTS `car_inv`;
CREATE TABLE IF NOT EXISTS `car_inv` (
  `inv_id` int(11) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_inv`
--

INSERT INTO `car_inv` (`inv_id`, `month`, `year`, `quantity`) VALUES
(1, 'jan', 23, 1),
(1, 'feb', 23, 2),
(1, 'mar', 23, 3),
(1, 'apr', 23, 4),
(1, 'may', 23, 6),
(1, 'jun', 23, 5),
(1, 'jul', 23, 8),
(1, 'aug', 23, 8),
(1, 'sep', 23, 9),
(1, 'oct', 23, 10),
(1, 'nov', 23, 11),
(1, 'dec', 23, 13),
(2, 'jan', 23, 0),
(2, 'feb', 23, 0),
(2, 'mar', 23, 0),
(2, 'apr', 23, 0),
(2, 'may', 23, 0),
(2, 'jun', 23, 0),
(2, 'jul', 23, 0),
(2, 'aug', 23, 0),
(2, 'sep', 23, 0),
(2, 'oct', 23, 0),
(2, 'nov', 23, 0),
(2, 'dec', 23, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
