-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 06:15 AM
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
-- Database: `prk`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Adidass'),
(2, 'asdd');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `qty`) VALUES
('5#9', 5),
('7#8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detailtransactions`
--

CREATE TABLE `detailtransactions` (
  `detailTransactionId` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailtransactions`
--

INSERT INTO `detailtransactions` (`detailTransactionId`, `qty`) VALUES
('10#8', 1),
('10#9', 2),
('8#8', 1),
('8#9', 2),
('9#8', 1),
('9#9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_10_17_070118_User', 1),
('2017_10_17_070130_Brand', 1),
('2017_10_30_125033_msUser', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoesId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brandId` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoesId`, `name`, `image`, `brandId`, `description`, `price`, `discount`, `stock`) VALUES
(8, 'NMD R1 Primeknit Black Red', 'Uploads/2.png', 1, 'The Adidas Pureboost DPR is a neutral lightweight daily trainer that can handle tempo, recovery, and long runs. The shoe fixes many of the issues of the original version.', 3550000, 12, 20),
(9, 'NMD R1 Primeknit Clear Blue', 'Uploads/3.png', 1, '123', 3350000, 30, 100),
(10, 'NMD R1 Triple White', 'Uploads/4.png', 1, '123', 3300000, 10, 100),
(11, 'NMD Runner PK White', 'Uploads/Adidas-NMD-R1-White-Primeknit-OG.png', 1, '123', 3500000, 10, 100),
(12, 'NMD R1 Triple Red', 'Uploads/Adidas-NMD-R1-Triple-Red.png', 1, '123', 3400000, 20, 100),
(13, 'NMD CS2 Grey', 'Uploads/5.png', 1, '123', 2400000, 40, 100),
(14, 'NMD XR1 Primeknit Core Black', 'Uploads/bebek2.jpg', 1, '123', 3600000, 20, 100),
(15, 'NMD R1 Charcoal Grey', 'Uploads/Adidas-NMD-R1-Charcoal-Grey-1.png', 1, '123', 3100000, 30, 100),
(16, 'NMD R1 Green', 'Uploads/adidas-NMD-R1-Green.png', 1, '123', 123, 123, 123),
(17, 'NMD Bape Camo', 'Uploads/Bape-Camo-NMD.png', 1, '123', 123, 123, 123),
(18, 'NMD Bape Black', 'Uploads/Bape-NMD-Black.png', 1, '123', 123, 123, 123),
(19, 'ASDads', 'Uploads/aeratron3.jpg', 1, 'asdsa', 123, 123, 0),
(20, 'asddsa', 'Uploads/3.png', 1, 'sss', 123, 123, 12);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `transactionDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `userId`, `transactionDateTime`) VALUES
(8, 7, '2017-12-16 01:11:55'),
(9, 7, '2017-12-16 01:16:15'),
(10, 7, '2017-12-16 01:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profilePicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `profilePicture`, `gender`, `DOB`, `address`, `role`, `remember_token`) VALUES
(5, 'admin', 'admin', '$2y$10$c2p4houajNBuAGk/fXZWh.0gqpH7nTG41QTCU5dNKVrHfBoee9mgK', 'Uploads/preston_walnut.png', 'Male', '1997-02-11', 'ajajajajajajajajajajajaajajajajajajaaja', 'Admin', 'PuP9N5wPAuxemcYZUVig0vQ7SRvVZ3LpvaL7qP0ZZiyBrm7Xu4w1Gsa7iPqQ'),
(7, 'baba', 'baba@baba.com', '$2y$10$irFfzJar5N.NJm/hT9TtKO7tcxCydd5ujxqV2geaupKnoWXbvQmIK', 'Uploads/regatta_black.png', 'Male', '2017-12-08', 'asdfasdfasfasdfasf', 'User', 'rQsn8hr2ARys65pv4gCp2jC3nQvsdk2bvMbPDisbvte7MMIjL3ZyrAewYuOT'),
(8, 'boomber', 'boomber@a.com', '$2y$10$00N.D.5lUL4llqZNv3XYR.TH8pfGQOEp/5XvHmt.01VyOUDsv3vb2', 'Uploads/Acer_One_10_Photogallery_02.png', 'Male', '2006-03-09', 'NiggerJAJAJAJAJAJAJA', 'User', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `detailtransactions`
--
ALTER TABLE `detailtransactions`
  ADD PRIMARY KEY (`detailTransactionId`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoesId`),
  ADD KEY `brandId` (`brandId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
