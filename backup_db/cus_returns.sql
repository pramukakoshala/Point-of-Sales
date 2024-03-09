-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 11:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_pre`
--

-- --------------------------------------------------------

--
-- Table structure for table `cus_returns`
--

CREATE TABLE `cus_returns` (
  `cr_id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `returned_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_returns`
--

INSERT INTO `cus_returns` (`cr_id`, `invoice`, `date`, `pro_id`, `quantity`, `unit_price`, `total`, `discount`, `returned_date`) VALUES
(1, '628522910', '2020-07-14', '2', '1', '65', '65', NULL, '2020-09-21 14:21:10'),
(2, '628522910', '2020-07-14', '2', '1', '65', '65', NULL, '2020-09-21 14:28:45'),
(3, '628522910', '2020-07-14', '2', '1', '65', '65', NULL, '2020-09-21 14:29:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus_returns`
--
ALTER TABLE `cus_returns`
  ADD PRIMARY KEY (`cr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cus_returns`
--
ALTER TABLE `cus_returns`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
