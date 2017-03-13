-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2017 at 04:29 AM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodscat`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `actionprice` int(11) DEFAULT NULL,
  `previewpic` varchar(255) DEFAULT NULL,
  `mediumpic` varchar(255) DEFAULT NULL,
  `largepic` varchar(255) DEFAULT NULL,
  `categorylist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`ID`, `name`, `description`, `price`, `actionprice`, `previewpic`, `mediumpic`, `largepic`, `categorylist`) VALUES
(1, 'Item1', 'Item1', 10, 1, 'default', '/Goods_catalog/img/item1.jpg', 'default', '0,'),
(81, 'Item2', 'Item2', 20, 2, '/Goods_catalog/img/ITEM1.jpg', '/Goods_catalog/img/ITEM1.jpg', '/Goods_catalog/img/ITEM1.jpg', '2,'),
(82, 'Item3', 'Item3', 30, 3, '/Goods_catalog/img/ITEM3.jpg', '/Goods_catalog/img/ITEM3.jpg', '/Goods_catalog/img/ITEM3.jpg', '2,3,'),
(83, 'Item4', 'Item4', 40, 4, '/Goods_catalog/img/ITEM4.jpg', '/Goods_catalog/img/ITEM4.jpg', '/Goods_catalog/img/ITEM4.jpg', '4,3,'),
(84, 'Item5', 'Item5', 50, 5, '/Goods_catalog/img/ITEM5.jpg', '/Goods_catalog/img/ITEM5.jpg', '/Goods_catalog/img/ITEM5.jpg', '2,3'),
(85, 'Item6', 'Item6', 60, 6, '/Goods_catalog/img/ITEM6.jpg', '/Goods_catalog/img/ITEM6.jpg', '/Goods_catalog/img/ITEM6.jpg', '1,2,3,'),
(86, 'Item7', 'Item7', 70, 7, '/Goods_catalog/img/ITEM7.jpg', '/Goods_catalog/img/ITEM7.jpg', '/Goods_catalog/img/ITEM7.jpg', '3,4,'),
(87, 'Item8', 'Item8', 80, 8, '/Goods_catalog/img/ITEM8.jpg', '/Goods_catalog/img/ITEM8.jpg', '/Goods_catalog/img/ITEM8.jpg', '1,2,3,4,'),
(88, 'Item9', 'Item9', 90, 9, '/Goods_catalog/img/ITEM9.jpg', '/Goods_catalog/img/ITEM9.jpg', '/Goods_catalog/img/ITEM9.jpg', '1,2,3,4,8,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
