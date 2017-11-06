-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 06:03 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoesId` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brandId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoesId`, `name`, `image`, `brandId`, `description`, `price`, `discount`, `stock`) VALUES
(3, 'NMD R1 Primeknit Black Red', 'Uploads/2.png', '123', 'The Adidas Pureboost DPR is a neutral lightweight daily trainer that can handle tempo, recovery, and long runs. The shoe fixes many of the issues of the original version.', 3550000, 12, 100),
(4, 'NMD R1 Primeknit Clear Blue', 'Uploads/3.png', '123', '123', 3350000, 30, 100),
(5, 'NMD R1 Triple White', 'Uploads/4.png', '123', '123', 3300000, 10, 100),
(6, 'NMD Runner PK White', 'Uploads/Adidas-NMD-R1-White-Primeknit-OG.png', '123', '123', 3500000, 10, 100),
(7, 'NMD R1 Triple Red', 'Uploads/Adidas-NMD-R1-Triple-Red.png', '123', '123', 3400000, 20, 100),
(8, 'NMD CS2 Grey', 'Uploads/5.png', '123', '123', 2400000, 40, 100),
(9, 'NMD XR1 Primeknit Core Black', 'Uploads/bebek2.jpg', '123', '123', 3600000, 20, 100),
(10, 'NMD R1 Charcoal Grey', 'Uploads/Adidas-NMD-R1-Charcoal-Grey-1.png', '123', '123', 3100000, 30, 100),
(11, 'NMD R1 Green', 'Uploads/adidas-NMD-R1-Green.png', '123', '123', 123, 123, 123),
(12, 'NMD Bape Camo', 'Uploads/Bape-Camo-NMD.png', '123', '123', 123, 123, 123),
(13, 'NMD Bape Black', 'Uploads/Bape-NMD-Black.png', '123', '123', 123, 123, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoesId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoesId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
