-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 08:24 AM
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
-- Table structure for table `temp_transaction`
--

CREATE TABLE `temp_transaction` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `pay_type` int(5) NOT NULL DEFAULT '1',
  `cashier` int(255) NOT NULL DEFAULT '0',
  `dep_id` int(255) NOT NULL DEFAULT '0',
  `is_tmp` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
