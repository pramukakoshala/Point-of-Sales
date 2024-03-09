-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 09:14 AM
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
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `unit`, `remark`) VALUES
(1, 'Soup', '1', '-'),
(2, 'Detergent Power', '1', ''),
(3, 'Toothpaste', '1', ''),
(4, 'Gift item', '1', ''),
(5, 'Baby Feeding Bottle', '1', '\r\n'),
(6, 'Cotton Buds', '1', ''),
(7, 'Clone ', '1', ''),
(8, 'cream', '1', ''),
(9, 'Talc', '1', ''),
(10, 'hair oill', '1', ''),
(11, 'baby shampoo', '1', ''),
(12, 'Shampoo', '1', ''),
(13, 'Fasewosh', '1', ''),
(14, 'kulubadu', '1', ''),
(15, 'kirana badu', '2', ''),
(16, 'Flour', '1', ''),
(17, 'hal 5 10 paket', '1', ''),
(18, 'samon', '1', ''),
(19, 'Drimks', '1', ''),
(20, 'Noodles', '1', ''),
(21, 'Ball', '1', ''),
(22, 'Ball', '1', ''),
(23, 'tooth brush', '1', ''),
(24, 'Battery', '1', ''),
(25, 'Toch', '1', ''),
(26, 'candle', '1', ''),
(27, 'pet food', '1', ''),
(28, 'Raseor', '1', ''),
(29, 'kiri', '1', ''),
(30, 'Nomal pakert aitames', '1', ''),
(31, 'napkin', '1', ''),
(32, 'bisket', '1', ''),
(33, 'maliban', '1', ''),
(34, 'Kake', '1', ''),
(35, 'soya', '1', ''),
(36, 'chocolate', '1', ''),
(37, 'Book Aitem', '1', ''),
(38, 'Sweet aitam', '1', '\r\n'),
(39, 'jelly', '1', ''),
(40, 'kadala pakert', '1', ''),
(41, 'Oil', '1', ''),
(42, 'Elawalu', '2', ''),
(43, 'polthel', '3', ''),
(44, 'bakary aitames', '1', ''),
(45, 'Cards', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `creditials`
--

CREATE TABLE `creditials` (
  `cre_id` int(255) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `this_date` varchar(30) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditials`
--

INSERT INTO `creditials` (`cre_id`, `token`, `this_date`, `secret`) VALUES
(1, '$2y$10$x832Cczn9IxqPzt20z9WqOlhGfQs7zKA8tE1oblXhce0vMegbJDVS', '2020-10-03', 'a9b7ba70783b617e9998dc4dd82eb3c5');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_mobile` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_birthdate` varchar(255) NOT NULL,
  `customer_status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `r_id` int(255) NOT NULL DEFAULT '0',
  `dep_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `customer_name`, `customer_address`, `customer_city`, `customer_phone`, `customer_mobile`, `customer_email`, `customer_gender`, `customer_birthdate`, `customer_status`, `image`, `r_id`, `dep_id`) VALUES
(1, 'Walking Customer ', '-', '1', '', '', '', '1', '', '1', '', 2, 1),
(2, 'indrani', 'Batuabe waththa', '4', '654654654654', '', 'harshaprabath6666@gmail.com', '2', '2020-02-11', '1', '', 0, 0),
(3, 'Kusuma Ranaveera', ' THITHTHAPAJJALA', 'NUGAWELA', '', '', 'harshaprabath6666@gmail.com', '1', '', '1', '', 0, 0),
(4, 'Kotinkaduwa', '', '', '', '', '', '1', '', '1', '', 0, 0),
(5, 'Wasantha Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(6, 'deepa ', '', '', '', '', '', '2', '', '1', '', 0, 0),
(7, 'Obe mama', '', '', '', '', '', '1', '', '1', '', 0, 0),
(8, 'Amara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(9, 'Jaye ape', '', '', '', '', '', '1', '', '1', '', 0, 0),
(10, 'indu akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(11, 'Hashan', '', '', '', '', '', '1', '', '1', '', 0, 0),
(12, 'Maduranga akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(13, 'Banda aiya', '', '', '', '771130212', '', '1', '', '1', '', 0, 0),
(14, 'Saman aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(15, 'anurada akka', '', '', '', '', '', '1', '', '1', '', 0, 0),
(16, 'ranjani aluth gedara', '', '', '', '', '', '2', '', '1', '', 0, 0),
(17, 'karune ', '', '', '', '', '', '1', '', '1', '', 0, 0),
(18, 'manju Amare', '', '', '', '', '', '1', '', '1', '', 0, 0),
(19, 'Uthpala akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(20, 'Pera Gedara', '', '', '', '', '', '2', '', '1', '', 0, 0),
(21, 'Koththe Gedara', '', '', '', '', '', '2', '', '1', '', 0, 0),
(22, 'banda aiya akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(23, 'Kara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(24, 'Chaminda aiya ', '', '', '', '', '', '1', '', '1', '', 0, 0),
(25, 'Rani akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(26, 'Gallangawatta akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(27, 'Aluthin apu aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(28, 'buddika Udaha', '', '', '', '', '', '1', '', '1', '', 0, 0),
(29, 'Arunakanthi', '', '', '', '', '', '2', '', '1', '', 0, 0),
(30, 'Supun', '', '', '', '', '', '1', '', '1', '', 0, 0),
(31, 'Jayasekara Mahaththaya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(32, 'Kusuma Duwa', '', '', '', '', '', '2', '', '1', '', 0, 0),
(33, 'Hendrik Putha', '', '', '', '', '', '1', '', '1', '', 0, 0),
(34, 'Lasitha aiya', '', '', '', '', '', '2', '', '1', '', 0, 0),
(35, 'Nande naga', '', '', '', '', '', '2', '', '1', '', 0, 0),
(36, 'Pushpa', '', '', '', '', '', '2', '', '1', '', 0, 0),
(37, 'Santha aiya akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(38, 'Lanka', '', '', '', '', '', '1', '', '1', '', 0, 0),
(39, 'Gimhani akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(40, 'Ramani ', '', '', '', '', '', '2', '', '1', '', 0, 0),
(41, 'Iro', '', '', '', '', '', '1', '', '1', '', 0, 0),
(42, 'Maduka', '', '', '', '', '', '1', '', '1', '', 0, 0),
(43, 'Suranga', '', '', '', '', '', '1', '', '1', '', 0, 0),
(44, 'Inoka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(45, 'Wanige', '', '', '', '', '', '1', '', '1', '', 0, 0),
(46, 'Santha aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(47, 'Loku aiya ape', '', '', '', '', '', '1', '', '1', '', 0, 0),
(48, 'Chuti aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(49, 'Veere mama akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(50, 'Anil aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(51, 'Ranasinha ', '', '', '', '', '', '1', '', '1', '', 0, 0),
(52, 'Maduranga', '', '', '', '', '', '1', '', '1', '', 0, 0),
(53, 'Randi akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(54, 'loku appachchi', '', '', '', '', '', '1', '', '1', '', 0, 0),
(55, 'Mangala', '', '', '', '', '', '1', '', '1', '', 0, 0),
(56, 'Piyasiri', '', '', '', '', '', '1', '', '1', '', 0, 0),
(57, 'Koththe', '', '', '', '', '', '1', '', '1', '', 0, 0),
(58, 'Kapila malli', '', '', '', '', '', '1', '', '1', '', 0, 0),
(59, 'Upula aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(60, 'Manju Aiya ape', '', '', '', '', '', '1', '', '1', '', 0, 0),
(61, 'Danapala Mudalali', '', '', '', '', '', '1', '', '1', '', 0, 0),
(62, 'Perera', '', '', '', '', '', '1', '', '1', '', 0, 0),
(63, 'Chandima amma', '', '', '', '', '', '2', '', '1', '', 0, 0),
(64, 'Kapila amma', '', '', '', '', '', '2', '', '1', '', 0, 0),
(65, 'Nawe mama', '', '', '', '', '', '1', '', '1', '', 0, 0),
(66, 'Jayathilaka Basunnahe', '', '', '', '', '', '1', '', '0', '', 0, 0),
(67, 'Gale aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(68, 'Vijesuriya duwa', '', '', '', '', '', '2', '', '1', '', 0, 0),
(69, 'Silva Basunnahe', '', '', '', '', '', '1', '', '1', '', 0, 0),
(70, 'Sunil Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(71, 'Kanchana akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(72, 'Danapala Mudalali Nangi', '', '', '', '', '', '2', '', '1', '', 0, 0),
(73, 'Ruwan', '', '', '', '', '', '1', '', '1', '', 0, 0),
(74, 'Champi akka', '', '', '', '', '', '2', '', '1', '', 0, 0),
(75, 'Hene Nimal ', '', '', '', '', '', '1', '', '1', '', 0, 0),
(76, 'Loku Akku aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(77, 'Malani Nanda', '', '', '', '', '', '2', '', '1', '', 0, 0),
(78, 'Gamini Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(79, 'Hene Wasantha aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(80, 'Upe Basunnahe', '', '', '', '', '', '1', '', '1', '', 0, 0),
(81, 'Hene Nimal Bana', '', '', '', '', '', '1', '', '1', '', 0, 0),
(82, 'Chuti Malli', '', '', '', '', '', '1', '', '1', '', 0, 0),
(83, 'Ela laga gedara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(84, 'Wijayanga', '', '', '', '', '', '1', '', '1', '', 0, 0),
(85, 'Kusuma Suwaneris', '', '', '', '', '', '2', '', '1', '', 0, 0),
(86, 'Prasanna Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(87, 'Laksman', '', '', '', '', '', '1', '', '1', '', 0, 0),
(88, 'Nurashani akka', '', '', '', '', '', '1', '', '1', '', 0, 0),
(89, 'Abe Mama Nanda', '', '', '', '', '', '2', '', '1', '', 0, 0),
(90, 'Kalugalla amma', '', '', '', '', '', '1', '', '1', '', 0, 0),
(91, 'Deiya Wife', '', '', '', '', '', '2', '', '1', '', 0, 0),
(92, 'Baby Lxsmen', '', '', '', '', '', '1', '', '1', '', 0, 0),
(93, 'Punchi amma', '', '', '', '', '', '2', '', '1', '', 0, 0),
(94, 'Bappa', '', '', '', '', '', '1', '', '1', '', 0, 0),
(95, 'peme', '', '', '', '', '', '1', '', '1', '', 0, 0),
(96, 'Lalith Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(97, 'Adiri', '', '', '', '', '', '1', '', '1', '', 0, 0),
(98, 'sampath Aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(99, 'Ranaveera', '', '', '', '', '', '1', '', '1', '', 0, 0),
(100, 'Laxmen', '', '', '', '', '', '1', '', '1', '', 0, 0),
(101, 'Pali basunnahe', '', '', '', '', '', '1', '', '1', '', 0, 0),
(102, 'Deeman aiya', '', '', '', '779843443', '', '1', '', '1', '', 0, 0),
(103, 'Kara nangi', '', '', '', '', '', '2', '', '1', '', 0, 0),
(104, 'bandare mama', '', '', '', '', '', '1', '', '1', '', 0, 0),
(105, 'Mami ape', '', '', '', '', '', '1', '', '1', '', 0, 0),
(106, 'Devite', '', '', '', '', '', '1', '', '1', '', 0, 0),
(107, 'Abe mama', '', '', '', '', '', '1', '', '1', '', 0, 0),
(108, 'Nishantha aiya', '', '', '', '777237056', '', '1', '', '1', '', 0, 0),
(109, '', 'Ganegoda Lokuaththa', '', '', '777237056', '', '1', '', '1', '', 0, 0),
(110, 'kadandeniya aiya', '', '', '', '777237056', '', '1', '', '1', '', 0, 0),
(111, 'Vijitha aluthgedara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(112, 'lakmal aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(113, 'ganegoda lokuaththa', '', '', '', '', '', '1', '', '1', '', 0, 0),
(114, 'Inoka putha', '', '', '', '', '', '1', '', '1', '', 0, 0),
(115, 'Karune Thushara', '', '', '', '', '', '1', '', '0', '', 0, 0),
(116, 'ape gedara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(117, 'Jayasinha', '', '', '', '', '', '1', '', '1', '', 0, 0),
(118, 'Geetha aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(119, 'pali amma', '', '', '', '', '', '1', '', '1', '', 0, 0),
(120, 'delgoda nanda', '', '', '', '', '', '2', '', '1', '', 0, 0),
(121, 'Ediri', '', '', '', '', '', '1', '', '1', '', 0, 0),
(122, 'BEKARIYA GEDARA', '', '', '', '', '', '1', '', '1', '', 0, 0),
(123, 'Hene Nishantha aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(124, 'Rupe Nanda', '', '', '', '', '', '2', '', '1', '', 0, 0),
(125, 'PATHMA', '', '', '', '', '', '2', '', '1', '', 0, 0),
(126, 'Sanjeewa ice', '', '', '', '', '', '1', '', '1', '', 0, 0),
(127, 'prasanna lokumalli', '', '', '', '', '', '1', '', '1', '', 0, 0),
(128, 'mochariya gedara', '', '', '', '', '', '1', '', '1', '', 0, 0),
(129, 'Udesh aiya', '', '', '', '', '', '1', '', '1', '', 0, 0),
(130, 'Gale Asala', '', '', '', '', '', '1', '', '1', '', 0, 0),
(131, 'srimathi', '', '', '', '', '', '2', '', '1', '', 0, 0),
(132, 'sadas asdsad', 'asdasdsa', 'Fifth option', '646546445', '', 'asds@dsfds.sdfd', 'Male', '01-02-2013', 'Active', 'default-cus.png', 0, 0),
(133, 'sadas asdsad', 'asdasdsa', 'Fifth option', '646546445', '', 'asds@dsfds.sdfd', 'Male', '01-02-2013', 'Active', 'default-cus.png', 0, 0),
(134, 'Dilanka Rajapakshe', 'Nugawela, Kandy', '4', '65454564545', '', 'sdfdsf@jhsgdh.com', '1', '2020-02-13', '1', '134-Capture001.png', 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `name`, `address`, `phone`, `email`, `logo`, `status`) VALUES
(1, 'DEP 1', 'dsadsad', '54654645', 'abc@asd.dfgdf', '11474-97998783_944112442684750_4123430120423686144_o.jpg', 1),
(2, 'DEP 2', 'dsadsad', '54654645', 'asdas@asd.dfgdf', '88886-97998783_944112442684750_4123430120423686144_o.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(100) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `code` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `code`) VALUES
(1, 'Colombo', 1),
(2, 'Gampaha', 2),
(3, 'Galle', 3),
(4, 'Kandy', 4),
(5, 'Kalutara', 5),
(6, 'Kurunegala', 6),
(7, 'Matale', 7),
(8, 'Kegalle', 8),
(9, 'Matara', 9),
(10, 'Monaragala', 10),
(11, 'Mullaitivu', 11),
(12, 'Nuwara Eliya', 12),
(13, 'Polonnaruwa', 13),
(14, 'Puttalam', 14),
(15, 'Ratnapura', 15),
(16, 'Trincomalee', 16),
(17, 'Vavuniya', 17),
(18, 'Anuradhapura', 18),
(19, 'Ampara', 19),
(20, 'Badulla', 20),
(21, 'Batticaloa', 21),
(22, 'Hambantota', 22),
(23, 'Jaffna', 23),
(24, 'Kilinochchi', 24),
(25, 'Mannar', 25),
(26, 'Hello', 45),
(27, 'AMMA', 456),
(28, 'AMMA', 456);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `no_id` int(255) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `text` varchar(255) DEFAULT NULL,
  `pro_id` int(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `type` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`no_id`, `status`, `text`, `pro_id`, `date`, `type`) VALUES
(1, 0, 'Has Only 29% ( 71 Items Used )', 26, '2020-09-26 13:18:06', 1),
(2, 0, 'Has Only 29% ( 71 Items Used )', 26, '2020-10-02 10:09:46', 1),
(3, 0, 'Has Only 28.571428571429% ( 35 Items Used )', 1, '2020-10-03 10:07:38', 1),
(4, 0, 'Expired Today', 1, '2020-10-03 10:07:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `online_date` varchar(255) DEFAULT NULL,
  `product_method` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dealer_price` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `bar_img` longblob NOT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `f_qty` varchar(255) DEFAULT NULL,
  `dep_id` int(255) NOT NULL DEFAULT '0',
  `lower_price_limit` float NOT NULL DEFAULT '0',
  `rack_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `v_id`, `category_id`, `product_name`, `product_description`, `barcode`, `quantity`, `online_date`, `product_method`, `discount`, `image`, `dealer_price`, `unit_price`, `bar_img`, `exp_date`, `f_qty`, `dep_id`, `lower_price_limit`, `rack_no`) VALUES
(1, 1, 1, 'Velvet Milk & Almond', '', '4791111114408', '8', '2019-09-02', '1', '0', '1195-1.jpg', '60', '85', '', '2020-02-27', '49', 0, 75, 'Rack 01'),
(2, 1, 1, 'Velvet Honey & yoghurt ', '100g', '4791111114569', '59', '2019-09-02', '1', '', '', '52', '65', '', NULL, '65', 0, 0, NULL),
(3, 1, 1, 'Velvet pack', '3 in 1', '4791111114859', '62', '2019-09-02', '1', '', '', '152', '186', '', NULL, '69', 0, 0, NULL),
(4, 1, 1, 'Velvet Sandalwood & Venivel', '100g', '4791111114422', '48', '2019-09-02', '1', '', '', '52', '62', '', NULL, '100', 0, 0, NULL),
(5, 1, 1, 'Velvet Rose & prmegranate', '100g', '4791111114415', '49', '2019-09-02', '1', '', '', '52', '62', '', NULL, '100', 0, 0, NULL),
(6, 1, 1, 'Velvet Purple Lotus', '100g', '4791111114552', '46', '2019-09-02', '1', '', '', '52', '62', '', NULL, '100', 0, 0, NULL),
(7, 1, 1, 'Velvet Water Lily', '100g', '4791111114576', '49', '2019-09-02', '1', '', '', '52', '60', '', NULL, '100', 0, 0, NULL),
(8, 1, 1, 'Velvet Kohomba', '100g', '4791111114507', '50', '2019-09-02', '1', '', '', '52', '62', '', NULL, '100', 0, 0, NULL),
(9, 1, 1, 'Baby Cheramy - Kohomba ', '100g', '4791111142166', '50', '2019-09-02', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(10, 1, 1, 'Baby Cheramy - Almond Oil', '100g', '4791111142159', '50', '2019-09-02', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(11, 1, 1, 'Baby Cheramy - Floral Extracts', '100g', '4791111142173', '50', '2019-09-02', '1', '', '', '57', '67', '', NULL, '100', 0, 0, NULL),
(12, 1, 1, 'Baby Cheramy Pack - Floral', '5 x 75g', '4791111141381', '50', '2019-09-02', '1', '', '', '220', '245', '', NULL, '100', 0, 0, NULL),
(13, 1, 1, 'Diva pack', '4 in 1', '4791111112381', '50', '2019-09-02', '1', '', '', '118', '141', '', NULL, '100', 0, 0, NULL),
(14, 1, 2, 'Diva Fresh 1 kg', '1 kg', '4791111112039', '50', '2019-09-02', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(15, 1, 2, 'Diva Fresh -Rose & Lime 1 kg', '1kg', '4791111112336', '50', '2019-09-02', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(16, 1, 2, 'Diva Fresh - Jasmine & Lime 1 kg', '1.kg', '4791111112312', '50', '2019-09-02', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(17, 1, 2, 'Diva Fresh -Rose & Lime 550g', '550g', '4791111180083', '50', '2019-09-02', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(18, 1, 2, 'Diva Fresh -Rose & Lime 400g', '400g', '4791111180021', '50', '2019-09-02', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(19, 1, 2, 'Diva Fresh - Jasmine & Lime 400g', '400g', '4791111180045', '50', '2019-09-02', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(20, 1, 2, 'Diva Fresh - Sepalika &Lime 400g', '400g', '4791111112367', '50', '2019-09-02', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(21, 1, 2, 'Diva Fresh - 400g', '400g', '4791111112053', '50', '2019-09-02', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(22, 1, 2, 'Diva Fresh - Jasmine & Lime 200g', '200g', '4791111180038', '50', '2019-09-02', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(23, 1, 2, 'Diva Fresh - Sepalika &Lime 65g', '65g', '4791111180069', '50', '2019-09-02', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(24, 1, 2, 'Diva Fresh - Rose & Lime 65g', '65g', '4791111112329', '50', '2019-09-02', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(25, 1, 2, 'Diva Fresh - Jasmine & Lime 65g', '65g', '4791111112299', '50', '2019-09-02', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(26, 1, 3, 'Clogard 200g', '200g', '4791111102061', '29', '2019-09-02', '1', '', '', '142', '160', '', NULL, '100', 0, 0, NULL),
(27, 1, 3, 'Clogard 160g', '160g', '4791111102054', '50', '2019-09-02', '1', '', '', '128', '144', '', NULL, '100', 0, 0, NULL),
(28, 1, 3, 'Clogard 120g', '120g', '4791111102030', '50', '2019-09-02', '1', '', '', '110', '124', '', NULL, '100', 0, 0, NULL),
(29, 1, 1, 'Clogard 70g', '70g', '4791111102023', '50', '2019-09-02', '1', '', '', '72', '87', '', NULL, '100', 0, 0, NULL),
(30, 1, 1, 'Clogard 40g', '40g', '4791111102016', '50', '2019-09-02', '1', '', '', '42', '52', '', NULL, '100', 0, 0, NULL),
(31, 1, 1, 'Clogard Lemongrass + aloe gel 120g', '120g', '4791111102757', '50', '2019-09-02', '1', '', '', '145', '165', '', NULL, '100', 0, 0, NULL),
(32, 1, 3, 'Clogard Lemongrass + aloe gel 40g', '40g', '4791111102740', '50', '2019-09-02', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(33, 1, 3, 'Clogard clove + Eucalyptus 120g', '120g', '4791111102887', '50', '2019-09-02', '1', '', '', '145', '165', '', NULL, '100', 0, 0, NULL),
(34, 1, 3, 'Clogard gel salt + mint 120g', '120g', '4791111102733', '50', '2019-09-02', '1', '', '', '145', '165', '', NULL, '100', 0, 0, NULL),
(35, 1, 3, 'Clogard gel clove + Eucalyptus 40g', '40g', '4791111102702', '50', '2019-09-02', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(36, 1, 3, 'Clogard salt + mint gel 40g', '40g', '4791111102726', '50', '2019-09-02', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(37, 1, 4, 'Baby Cheramy Gift pack blue', '', '4791111141367', '50', '2019-09-02', '1', '', '', '540', '585', '', NULL, '100', 0, 0, NULL),
(38, 1, 4, 'Baby Cheramy Gift pack Pink', '', '4791111141350', '50', '2019-09-02', '1', '', '', '535', '585', '', NULL, '100', 0, 0, NULL),
(39, 1, 5, 'Baby Cheramy Feeding Bottel', '', '4791111105116', '50', '2019-09-02', '1', '', '', '170', '190', '', NULL, '100', 0, 0, NULL),
(40, 1, 6, 'Baby Cheramy Cotton buds', '', '4791111105000', '50', '2019-09-02', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(41, 1, 7, 'Gold Commando 100ml', '100ml', '4791111104041', '50', '2019-09-02', '1', '', '', '480', '535', '', NULL, '100', 0, 0, NULL),
(42, 1, 7, 'Gold Black Gens 100ml', '100ml', '4791111104027', '50', '2019-09-02', '1', '', '', '480', '535', '', NULL, '100', 0, 0, NULL),
(43, 1, 8, 'baby cheramy cream Almond 50ml', '', '4791111100005', '50', '2019-09-02', '1', '', '', '80', '93', '', NULL, '100', 0, 0, NULL),
(44, 1, 8, 'Baby Cheramy - Almond baby cream 100ml', '', '4791111100043', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(45, 1, 8, 'Baby Cheramy -Floral baby cream 50ml', '50ml', '4791111141664', '50', '2019-09-02', '1', '', '', '83', '93', '', NULL, '100', 0, 0, NULL),
(46, 1, 8, 'Baby Cheramy -Floral baby cream100ml', '100ml', '4791111141657', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(47, 1, 8, 'Baby Cheramy Herbal Baby cream 100ml', '', '4791111100968', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(48, 1, 7, 'Baby Cheramy - Baby Cologne Herbal 50ml', '50ml', '4791111141039', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(49, 1, 7, 'Baby Cheramy - Baby Cologne Classic 50ml', '50ml', '4791111100104', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(50, 1, 7, 'Baby Cheramy - Baby Cologne Floral 50ml', '50ml', '4791111143019', '50', '2019-09-02', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(51, 1, 7, 'Baby Cheramy - Baby Cologne Classic 100ml', '100ml', '4791111100135', '50', '2019-09-02', '1', '', '', '245', '265', '', NULL, '100', 0, 0, NULL),
(52, 1, 7, 'Baby Cheramy - Baby Cologne Herba 100ml', '', '4791111141046', '50', '2019-02-09', '1', '', '', '245', '265', '', NULL, '100', 0, 0, NULL),
(53, 1, 9, 'Baby Cheramy - Baby Talc Floral 100g', '100g', '4791111100371', '50', '2019-09-02', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(54, 1, 9, 'Baby Cheramy -Baby Talc Classic 100g', '', '4791111100203', '50', '2019-09-02', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(55, 1, 10, 'Baby Cheramy - Baby Oil 50ml', '', '4791111100432', '50', '2019-02-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(56, 1, 10, 'Baby Cheramy - Baby Oil 100ml', '', '4791111100425', '50', '2019-02-09', '1', '', '', '135', '145', '', NULL, '100', 0, 0, NULL),
(57, 1, 11, 'Baby Cheramy -Baby Shampoo 100ml', '100ml', '4791111100524', '50', '2019-02-09', '1', '', '', '130', '140', '', NULL, '100', 0, 0, NULL),
(58, 2, 7, 'Pears Baby Drops Cologne 50ml', '50ml', '4792081421701', '49', '2019-02-09', '1', '', '', '160', '170', '', NULL, '100', 0, 0, NULL),
(59, 2, 7, 'Pears Baby Bedtime Cologne 50ml', '', '4792081007684', '50', '2019-02-09', '1', '', '', '160', '170', '', NULL, '100', 0, 0, NULL),
(60, 1, 10, 'Kumarika Hair Fall Control 100ml', '100ml', '4791111106519', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(61, 1, 10, 'Kumarika Hair Fall Control 50ml', '50ml', '4791111126166', '50', '2019-02-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(62, 1, 10, 'Kumarika Dandruff controll 100ml', '100ml', '4791111106205', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(63, 1, 10, 'Kumarika Dandruff controll 50ml', '50ml', '4791111106199', '50', '2019-02-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(64, 1, 10, 'Kumarika Split End Control 100ml', '100ml', '4791111106229', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(65, 1, 10, 'Kumarika Split End Control 50ml', '50ml', '4791111126173', '50', '2019-02-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(66, 2, 12, 'Sunsilk Smooth Shampoo 80ml', '80ml', '4796005653094', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(67, 2, 12, 'Sunsilk Restore Shampoo 80ml', '80ml', '4796005653285', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(68, 2, 12, 'Sunsilk Black Shine Shampoo 80ml', '80ml', '4796005653131', '50', '2019-02-09', '1', '', '', '150', '160', '', NULL, '100', 0, 0, NULL),
(69, 2, 12, 'Sunsilk Hairfall Solution Shampoo 80ml', '80ml', '4796005653278', '50', '2019-02-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(70, 2, 12, 'Sunsilk Stralght Shampoo 80ml', '80ml', '4796005653155', '50', '2019-02-09', '1', '', '', '145', '160', '', NULL, '100', 0, 0, NULL),
(71, 2, 12, 'Sunsilk Volume & Bounce Shampoo 80ml', '80ml', '4792081004034', '50', '2019-03-09', '1', '', '', '170', '180', '', NULL, '100', 0, 0, NULL),
(72, 2, 12, 'Sunsilk Smooth & Nourish Shampoo 80ml', '80ml', '4792081004164', '50', '2019-03-09', '1', '', '', '170', '180', '', NULL, '100', 0, 0, NULL),
(73, 2, 12, 'Clear Anti-Dandruff Shampoo 200ml', '200ml', '4792081000463', '50', '2019-03-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(74, 2, 13, 'Pond`s White Beauty Facial Foam 15g', '15g', '8851932179577', '50', '2019-03-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(75, 2, 13, 'Fair & lovely Fasewash 20g', '20g\r\n', '8901030638961', '50', '2019-03-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(76, 1, 12, 'Dandex Cooling Shampoo 90ml', '90ml', '4791111107028', '50', '2019-02-09', '1', '', '', '115', '125', '', NULL, '100', 0, 0, NULL),
(77, 1, 12, 'Dandex Nourished Shampoo 90ml', '90ml', '4791111107103', '50', '2019-03-09', '1', '', '', '115', '125', '', NULL, '100', 0, 0, NULL),
(78, 2, 8, 'Vaseline Aloe Soothe 100ml', '100ml\r\n', '4792081001484', '50', '2019-03-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(79, 2, 8, 'Vaseline Healthy White 100ml', '100ml', '4792081472208', '50', '2019-03-09', '1', '', '', '220', '230', '', NULL, '100', 0, 0, NULL),
(80, 1, 8, 'VaselineDeep Restore 40ml', '40ml', '4796005658884', '50', '2019-03-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(81, 2, 8, 'Pears Baby pure&Gentle Baby Cream 50ml', '50ml', '4792081424016', '50', '2019-03-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(82, 1, 11, 'Pears Baby pure&Gentle Baby Shampoo 100ml', '100ml', '4796005656552', '50', '2019-03-01', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(83, 3, 8, 'Panda Baby Cream 100ml', '100ml', '4792054001121', '50', '2019-03-09', '1', '', '', '145', '165', '', NULL, '100', 0, 0, NULL),
(84, 3, 8, 'Panda Baby Cream 50ml', '50ml', '4792054001343', '50', '2019-03-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(85, 3, 7, 'Panda Baby Cologne 50ml', '50ml', '4792054001718', '50', '2019-03-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(86, 2, 8, 'Pond`s White Beauty Cream 7.5g', '7.5g', '123456789', '50', '2019-03-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(87, 3, 13, 'Nature`s Secrets Kohomba-Kaha Facial Wash 100ml', '100ml', '4792054001831', '50', '2019-03-09', '1', '', '', '250', '270', '', NULL, '100', 0, 0, NULL),
(88, 3, 13, 'Nature`s Secrets Kohomba-Kaha Facial Wash 50ml', '50ml', '4792054001855', '50', '2019-03-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(89, 3, 13, 'Nature`s Secrets Papaya Facial Wash 100ml', '100ml', '4792054008489', '50', '2019-03-09', '1', '', '', '250', '270', '', NULL, '100', 0, 0, NULL),
(90, 3, 13, 'Nature`s Secrets Carrot Facial Wash 100ml', '100ml', '4792054000315', '50', '2019-03-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(91, 3, 13, 'Nature`s Secrets Carrot Facial Wash 50ml', '50ml', '4792054000261', '50', '2019-03-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(92, 2, 2, 'Sunlight Rose Detergent powder 1kg', '1kg', '4796005651731', '50', '2019-03-09', '1', '', '', '155', '175', '', NULL, '100', 0, 0, NULL),
(93, 2, 2, 'Surf Excel 150g', '150g', '4796005650017', '50', '2019-03-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(94, 2, 2, 'Rin Lemon & Rose 200g', '200g', '4796005651601', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(95, 2, 2, 'Sunlight Sakura Detergent powder 1kg', '1kg', '4796005659935', '50', '2019-03-09', '1', '', '', '160', '180', '', NULL, '100', 0, 0, NULL),
(96, 2, 2, 'Sunlight Rose Detergent powder 400g', '400g', '4796005652431', '50', '2019-03-09', '1', '', '', '65', '80', '', NULL, '100', 0, 0, NULL),
(97, 5, 1, 'Calin White Beauty Soap', '125g', '4796000523521', '50', '2019-03-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(98, 3, 1, 'Champion Cool Mint Soap', '90g\r\n', '4792054014374', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(99, 6, 1, 'Dettol Skincare 70g', '70g', '4792037313234', '50', '2019-03-09', '1', '', '', '55', '60', '', NULL, '100', 0, 0, NULL),
(100, 6, 1, 'Dettol Orange Burst 70g', '70g', '4792037315337', '50', '2019-03-09', '1', '', '', '55', '60', '', NULL, '100', 0, 0, NULL),
(101, 2, 1, 'Lux Soft Touch 100g', '100g', '4792081001194', '50', '2019-03-09', '1', '', '', '52', '70', '', NULL, '100', 0, 0, NULL),
(102, 2, 1, 'VIM Anti Smell 100g', '100g', '4796005656811', '50', '2019-03-09', '1', '', '', '22', '25', '', NULL, '100', 0, 0, NULL),
(103, 5, 1, 'Delma Sandun 75g', '75g', '4796000523132', '50', '2019-03-09', '1', '', '', '37', '40', '', NULL, '100', 0, 0, NULL),
(104, 5, 1, 'Delma Baby 75g', '75g', '4796000523088', '50', '2019-03-09', '1', '', '', '36', '40', '', NULL, '100', 0, 0, NULL),
(105, 5, 1, 'Delma Silk 75g', '75g', '4796000523057', '50', '2019-03-09', '1', '', '', '36', '40', '', NULL, '100', 0, 0, NULL),
(106, 5, 1, 'Delma Araliya 75g', '75g', '4796000523064', '50', '2019-03-09', '1', '', '', '36', '40', '', NULL, '100', 0, 0, NULL),
(107, 3, 1, 'Panda Baby Delum Baby Soap 75g', '75g', '4792054013551', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(108, 3, 1, 'Panda Baby Sumudu Baby Soap 75g', '75g', '4792054014305', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(109, 3, 1, 'Panda Baby Rathmal Baby Soap 75g', '75g', '4792054006263', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(110, 3, 1, 'Misumi Soap 90g', '90g', '4792054013544', '50', '2019-03-09', '1', '', '', '55', '60', '', NULL, '100', 0, 0, NULL),
(111, 2, 1, 'Pears Baby Active Floral Baby soap 100g', '100g', '4792081002887', '50', '2019-03-09', '1', '', '', '63', '70', '', NULL, '100', 0, 0, NULL),
(112, 2, 1, 'Pears Baby Pure&Gentle Baby soap 100g', '100g', '4792081002580', '50', '2019-03-09', '1', '', '', '63', '70', '', NULL, '100', 0, 0, NULL),
(113, 2, 1, 'Ayush Natural Fairness soap 100g', '100g', '4792081004102', '50', '2019-03-09', '1', '', '', '70', '75', '', NULL, '100', 0, 0, NULL),
(114, 2, 1, 'Lifebuoy Total10 Soap 100g', '100g', '4792081590124', '49', '2019-03-09', '1', '', '', '45', '57', '', NULL, '100', 0, 0, NULL),
(115, 2, 1, 'Lifebuoy Mild Care Soap 100g', '100g', '4792081595327', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(116, 2, 1, 'Lifebuoy Kohomba Soap 100g', '100g', '4792081003815', '45', '2019-03-09', '2', '', '', '53', '57', '', NULL, '100', 0, 0, NULL),
(117, 5, 1, 'Vendol Venivel Soap 75g', '75g', '4792125211114', '50', '2019-03-09', '1', '', '', '45', '60', '', NULL, '100', 0, 0, NULL),
(118, 5, 1, 'Rani Sandalwood soap 100g', '100g', '4792068132231', '50', '2019-03-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(119, 1, 1, 'Chandi Panda Soap 100g', '100g', '4792054014107', '50', '2019-03-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(120, 7, 1, 'Kekulu hibiscut Baby soap 70g', '70g', '4792172005032', '50', '2019-03-09', '1', '', '', '42', '50', '', NULL, '100', 0, 0, NULL),
(121, 7, 1, 'Kekulu Aloe Vera Baby soap 70g', '70g', '4792172005018', '50', '2019-03-09', '1', '', '', '42', '50', '', NULL, '100', 0, 0, NULL),
(122, 7, 1, 'Kekulu Jasmine Baby soap 70g', '70g', '4792172002079', '50', '2019-03-09', '1', '', '', '42', '50', '', NULL, '100', 0, 0, NULL),
(123, 2, 2, 'Surf Excel 30g', '30g', '123456789', '50', '2019-03-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(124, 7, 3, 'Supirivicky Original 110g', '110g', '4792172002222', '50', '2019-03-09', '1', '', '', '110', '115', '', NULL, '100', 0, 0, NULL),
(125, 7, 3, 'Supirivicky Mild 40g', '40g', '4792172005629', '50', '2019-03-09', '1', '', '', '55', '60', '', NULL, '100', 0, 0, NULL),
(126, 7, 3, 'Supirivicky Original 40gg', '40g', '4792172002024', '50', '2019-03-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(127, 2, 3, 'Signal Strong Teeth 70g', '70g', '4792081260614', '45', '2019-03-09', '1', '', '', '82', '87', '', NULL, '100', 0, 0, NULL),
(128, 2, 3, 'Signal Strong Teeth 40g', '40g', '4792081260515', '50', '2019-03-09', '1', '', '', '42', '52', '', NULL, '100', 0, 0, NULL),
(129, 8, 14, 'Wijaya Chillin Powder 500g', '500g', '4792173010035', '50', '2019-03-09', '1', '', '', '240', '340', '', NULL, '100', 0, 0, NULL),
(130, 8, 14, 'Wijaya Chillin Powder 250g', '250g', '4792173010028', '50', '2019-03-09', '1', '', '', '150', '220', '', NULL, '100', 0, 0, NULL),
(131, 8, 14, 'Wijaya Chillin Powder 100g', '100g', '4792173010011', '50', '2019-03-09', '1', '', '', '62', '88', '', NULL, '100', 0, 0, NULL),
(132, 8, 14, 'Wijaya Chillin Powder 50g', '50g', '4792173010004', '50', '2019-03-09', '1', '', '', '25', '44', '', NULL, '100', 0, 0, NULL),
(133, 8, 14, 'Wijaya Curry Powder 100g', '100g', '4792173020010', '50', '2019-03-09', '1', '', '', '70', '82', '', NULL, '100', 0, 0, NULL),
(134, 8, 14, 'Wijaya Curry Powder 50g', '50g', '4792173020003', '50', '2019-02-09', '1', '', '', '30', '41', '', NULL, '100', 0, 0, NULL),
(135, 8, 14, 'Wijaya Turmeric Powder 100g', '100g', '4792173030019', '50', '2019-03-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(136, 8, 14, 'Wijaya Turmeric Powderic 50g', '50g', '4792173030002', '50', '2019-03-09', '1', '', '', '40', '46', '', NULL, '100', 0, 0, NULL),
(137, 2, 1, 'Wonderlight Bar soap 650g', '650g', '4792081070602', '50', '2019-03-09', '1', '', '', '180', '210', '', NULL, '100', 0, 0, NULL),
(138, 8, 14, 'Wijaya Meat Curry Powder 50g', '50g', '4792173050000', '50', '2019-03-09', '1', '', '', '55', '72', '', NULL, '100', 0, 0, NULL),
(139, 8, 14, 'Wijaya Kurakkan Flour 400g', '400g', '4792173130085', '50', '2019-03-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(140, 1, 1, 'pappadam Luse', '', '1234545', '50', '2019-03-09', '1', '', '', '400', '500', '', NULL, '100', 0, 0, NULL),
(141, 8, 14, 'Wijaya pappadam 70g', '70g', '4792173080052', '50', '2019-03-09', '1', '', '', '45', '60', '', NULL, '100', 0, 0, NULL),
(142, 8, 14, 'wijaya Roasted Curry Powder 50g', '50g', '4792173060009', '50', '2019-03-09', '1', '', '', '35', '49', '', NULL, '100', 0, 0, NULL),
(143, 8, 14, 'wijaya Roasted Curry Powder 100g', '100g', '4792173060016', '50', '2019-03-09', '1', '', '', '85', '100', '', NULL, '100', 0, 0, NULL),
(144, 8, 14, 'Wijaya Chillin Pieces 50g', '50g', '4792173000005', '50', '2019-03-09', '1', '', '', '24', '44', '', NULL, '100', 0, 0, NULL),
(145, 8, 14, 'Wijaya Chillin Pieces 100g', '100g', '4792173000012', '50', '2019-03-09', '1', '', '', '58', '88', '', NULL, '100', 0, 0, NULL),
(146, 10, 14, 'Sooriya Rosted Curry Powder 50g', '50g', '1234566789', '50', '2019-03-09', '1', '', '', '20', '27', '', NULL, '100', 0, 0, NULL),
(147, 10, 14, 'Sooriya Chilli Powder 100g', '100g', '1', '50', '2019-03-09', '1', '', '', '50', '70', '', NULL, '100', 0, 0, NULL),
(148, 10, 14, 'Sooriya Chilli Powder 50g', '50g', '123456789', '50', '2019-03-09', '1', '', '', '20', '40', '', NULL, '100', 0, 0, NULL),
(149, 10, 14, 'Sooriya Turmeric Powder 50g', '50g', '123456789', '50', '2019-03-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(150, 11, 15, 'Chilli powder', '', '', '50', '2019-03-09', '1', '', '', '380', '500', '', NULL, '100', 0, 0, NULL),
(151, 11, 14, 'Turmeric Powder ', '', '', '50', '2019-03-09', '1', '', '', '650', '800', '', NULL, '100', 0, 0, NULL),
(152, 11, 15, 'Roasted Curry Powder ', '', '', '50', '2019-03-09', '1', '', '', '480', '700', '', NULL, '100', 0, 0, NULL),
(153, 11, 14, 'Wijaya Chillin Pieces ', '', '', '50', '2019-03-09', '1', '', '', '380', '500', '', NULL, '100', 0, 0, NULL),
(154, 12, 16, 'OGM Roasted White Rice Flour 1KG', '1kg', '4796009850055', '50', '2019-03-09', '1', '', '', '143', '167', '', NULL, '100', 0, 0, NULL),
(155, 12, 17, 'Nipuna Samba 5kg', '5kg', '4', '50', '2019-03-09', '1', '', '', '470', '500', '', NULL, '100', 0, 0, NULL),
(156, 12, 17, 'Milan nadu 10kg', '', '', '50', '2019-03-09', '1', '', '', '840', '980', '', NULL, '100', 0, 0, NULL),
(157, 12, 17, 'Top one nadu Rice', '', '', '50', '2019-03-09', '1', '', '', '860', '920', '', NULL, '100', 0, 0, NULL),
(158, 12, 17, 'Kamatha Nadu 5kg', '5kg', '', '50', '2019-03-09', '1', '', '', '435', '525', '', NULL, '100', 0, 0, NULL),
(159, 1, 17, 'Sooriya buddy rice 10kg', '', '', '50', '2019-03-09', '1', '', '', '89', '95', '', NULL, '100', 0, 0, NULL),
(160, 12, 17, 'Heema White Rice 5kg', '', '', '50', '2019-03-09', '1', '', '', '400', '510', '', NULL, '100', 0, 0, NULL),
(161, 12, 15, 'koththa malli', '', '', '50', '2019-03-09', '1', '', '', '250', '400', '', NULL, '100', 0, 0, NULL),
(162, 12, 15, 'sudu kaupi', '', '', '50', '2019-03-09', '1', '', '', '260', '320', '', NULL, '100', 0, 0, NULL),
(163, 12, 15, 'Aba Luse', '', '', '50', '2019-03-09', '1', '', '', '320', '400', '', NULL, '100', 0, 0, NULL),
(164, 12, 18, 'Supiri Mackerel 425g', '425g', '4796017790046', '50', '2019-03-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(165, 12, 18, 'Jack Brand Mackerel 135g', '135g', '4792225002001', '50', '2019-03-09', '1', '', '', '135', '165', '', NULL, '100', 0, 0, NULL),
(166, 12, 18, 'Jayafish Mackerel 155g', '155g', '8852111026408', '50', '2019-03-09', '1', '', '', '130', '135', '', NULL, '100', 0, 0, NULL),
(167, 12, 18, 'Delmege Mackerel 155g', '155g', '4792020221355', '50', '2019-03-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(168, 4, 19, 'Milo Drink 180ml', '180ml', '4792024011754', '50', '2019-03-09', '1', '', '', '50', '55', '', NULL, '100', 0, 0, NULL),
(169, 9, 20, 'Rashika Chinese Noodles 500g', '500g', '', '50', '2019-03-09', '1', '', '', '72', '100', '', NULL, '100', 0, 0, NULL),
(170, 12, 18, 'Chicken Meat Balls 400g', '400g', '4791061116507', '50', '2019-03-09', '1', '', '', '240', '270', '', NULL, '100', 0, 0, NULL),
(171, 8, 20, 'Wijaya Chinese Noodles 500g', '500g', '4792173100033', '50', '2019-03-09', '1', '', '', '110', '135', '', NULL, '100', 0, 0, NULL),
(172, 12, 20, 'Harischandra Noodles 400g', '400g', '4792083010118', '50', '2019-03-09', '1', '', '', '115', '125', '', NULL, '100', 0, 0, NULL),
(173, 12, 20, 'Harischandra Noodles red 400g s', '', '4792083010316', '50', '2019-03-09', '1', '', '', '115', '128', '', NULL, '100', 0, 0, NULL),
(174, 12, 20, 'Sera Noodles 400g', '400g', '4792109000659', '50', '2019-03-09', '1', '', '', '95', '118', '', NULL, '100', 0, 0, NULL),
(175, 13, 19, 'Ice Soda 350ml', '', '4796012780349', '50', '2019-03-09', '1', '', '', '38', '45', '', NULL, '100', 0, 0, NULL),
(176, 13, 19, 'Ice Orange', '', '4796012780974', '50', '2019-03-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(177, 13, 19, 'Ice Cream Soda 1.5l', '', '4796012780943', '50', '2019-03-04', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(178, 13, 19, 'Ice Cream Soda 750ml', '', '4796012780868', '50', '2019-03-09', '1', '', '', '110', '130', '', NULL, '100', 0, 0, NULL),
(179, 13, 19, 'Ice Portesa 750ml', '750ml', '4796012780899', '50', '2019-04-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(180, 13, 19, 'Ice Orange 750ml', '750ml', '4796012780851', '50', '2019-04-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(181, 13, 19, 'Ice Cola 350ml', '350ml', '4796012780530', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(182, 13, 19, 'Ice Limade 350ml', '350ml', '4796012780318', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(183, 13, 19, 'Ice GBL 350ml', '350ml', '4796012780257', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(184, 13, 19, 'Ice Cream Soda 350ml', '350ml', '4796012780561', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(185, 13, 19, 'Ice Orange 350ml', '350ml', '4796012780509', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(186, 13, 19, 'Ice Portesa 350ml', '350ml', '4796012780370', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(187, 13, 19, 'Ice Orange 250ml', '250ml', '4796012780950', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(188, 13, 19, 'Ice Cream Soda 250ml', '250ml', '4796012780967', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(189, 13, 19, 'Ice Orange 1.5l', '1.5l', '4796012780936', '50', '2019-04-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(190, 13, 19, 'Mirage Mango Nectar 200ml', '200ml', '4796012780615', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(191, 14, 21, 'Atlas Cricket Ball', '', '4792210105458', '50', '2019-04-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(192, 14, 21, 'Atlas Practice Ball', '', '4792210100750', '50', '2019-04-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(193, 2, 23, 'Signal Junior ', '', '4796005654350', '50', '2019-04-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(194, 1, 1, 'Denta Medium Toothbrush', '', '4791010002066', '50', '2019-04-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(195, 5, 23, 'Denta Soft Toothbrush', '', '4791010002257', '50', '2019-04-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(196, 15, 24, 'Panasonic AAA battery', '', '8887549597862', '50', '2019-04-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(197, 15, 24, 'Panasonic AA battery', '', '8887549612954', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(198, 15, 24, 'Sony AA battery', '', '8562011991', '50', '2019-04-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(199, 16, 25, 'Aiko flashlight AS-659', '', '6903088106593', '50', '2019-04-09', '1', '', '', '350', '450', '', NULL, '100', 0, 0, NULL),
(200, 16, 25, 'Aiko flashlight AS-634', '', '6903088106340', '50', '2019-04-09', '1', '', '', '165', '250', '', NULL, '100', 0, 0, NULL),
(201, 16, 25, 'Aiko flashlight AS-738', '', '6903088107385', '50', '2019-04-09', '1', '', '', '230', '350', '', NULL, '100', 0, 0, NULL),
(202, 16, 25, 'Aiko flashlight AS-735', '', '6903088107354', '50', '2019-04-09', '1', '', '', '450', '600', '', NULL, '100', 0, 0, NULL),
(203, 16, 26, 'Birthday Candle Set', '', '6965999611221', '50', '2019-04-09', '1', '', '', '60', '100', '', NULL, '100', 0, 0, NULL),
(204, 16, 26, 'Birthday Candle Set', '', '6949936899897', '50', '2019-04-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(205, 11, 14, 'Tarun Suwada paha 3g', '', '', '50', '2019-04-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(206, 17, 27, 'malu kama', '', '', '50', '2019-04-09', '1', '', '', '13', '20', '', NULL, '100', 0, 0, NULL),
(207, 17, 14, 'Enasal paket', '', '', '50', '2019-04-09', '1', '', '', '15', '25', '', NULL, '100', 0, 0, NULL),
(208, 18, 28, 'Gillette Blue 3', '', '7702018441846', '50', '2019-04-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(209, 5, 28, 'Bic Easy 2', '', '3086127501122', '50', '2019-04-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(210, 18, 28, 'Gillette Blue 2 Plus', '', '8888826019589', '50', '2019-04-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(211, 18, 28, 'Gillette Blue 2 ', '', '8901358702436', '50', '2019-04-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(212, 4, 29, 'Nestomalt 175g', '175g', '4792024007047', '50', '2019-04-09', '1', '', '', '160', '150', '', NULL, '100', 0, 0, NULL),
(213, 4, 29, 'Nestomalt 400g', '400g', '4792024000147', '50', '2019-04-09', '1', '', '', '330', '345', '', NULL, '100', 0, 0, NULL),
(214, 12, 29, 'Viva 400g', '400g', '4792099100070', '50', '2019-04-09', '1', '', '', '330', '345', '', NULL, '100', 0, 0, NULL),
(215, 12, 29, 'Ratthi 1kg', '1kg', '4791085081126', '50', '2019-04-09', '1', '', '', '880', '985', '', NULL, '100', 0, 0, NULL),
(216, 12, 29, 'Ratthi 400g', '400g', '4791085081072', '50', '2019-04-09', '1', '', '', '354', '380', '', NULL, '100', 0, 0, NULL),
(217, 12, 29, 'Ratthi 250g', '250g', '4791085081065', '50', '2019-04-09', '1', '', '', '220', '245.', '', NULL, '100', 0, 0, NULL),
(218, 19, 20, 'Deweni Batha X-Tra Special Noodles 350g', '350g', '4792149097404', '50', '2019-04-09', '1', '', '', '149', '170', '', NULL, '100', 0, 0, NULL),
(219, 19, 20, 'Deweni Batha Noodles 350g', '350g', '4792149097107', '50', '2019-04-09', '1', '', '', '127', '145', '', NULL, '100', 0, 0, NULL),
(220, 4, 29, 'Milo 400g', '', '4792024013215', '50', '2019-04-09', '1', '', '', '350', '370', '', NULL, '100', 0, 0, NULL),
(221, 12, 29, 'Maliban Kiri 1kg', '1kg', '4792029100033', '50', '2019-04-09', '1', '', '', '880', '920', '', NULL, '100', 0, 0, NULL),
(222, 12, 29, 'Maliban Kiri 400g', '400g', '4790015950624', '50', '2019-04-09', '1', '', '', '350', '380', '', NULL, '100', 0, 0, NULL),
(223, 12, 29, 'Anchor 400g', '400g', '4791085011079', '50', '2019-04-09', '1', '', '', '350', '395', '', NULL, '100', 0, 0, NULL),
(224, 4, 29, 'Maggi Coconut Milk 300g', '300g', '4792024008723', '50', '2019-04-09', '1', '', '', '380', '395', '', NULL, '100', 0, 0, NULL),
(225, 4, 29, 'Maggi Coconut Milk 125g', '125g', '4792024011372', '50', '2019-04-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(226, 4, 29, 'Maggi Coconut Milk 800g', '800g', '4792024010337', '50', '2019-04-09', '1', '', '', '940', '990', '', NULL, '100', 0, 0, NULL),
(227, 20, 29, 'Rasa Hari Kariyata Kiri 180Ml', '180Ml', '4796002510000', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(228, 20, 30, 'Samaposha Milki 700g', '700G', '4792109000727', '50', '2019-04-09', '1', '', '', '175', '195', '', NULL, '100', 0, 0, NULL),
(229, 20, 30, 'Samaposha  200g', '200G', '4792109000024', '50', '2019-04-09', '1', '', '', '60', '80', '', NULL, '100', 0, 0, NULL),
(230, 20, 30, 'Samaposha  80g', '80G', '4792109000017', '50', '2019-04-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(231, 8, 30, 'Wijaya Coffee 50g', '50g', '4792173090006', '50', '2019-04-09', '1', '', '', '95', '105', '', NULL, '100', 0, 0, NULL),
(232, 8, 30, 'Wijaya Coffee 20g', '20g', '4792173090075', '50', '2019-04-09', '1', '', '', '32', '42', '', NULL, '100', 0, 0, NULL),
(233, 12, 30, 'Harischandra Coffee 20g', '20g', '4792083030512', '50', '2019-04-09', '1', '', '', '32', '42', '', NULL, '100', 0, 0, NULL),
(234, 1, 31, 'New Fems 10 Napkins', '10', '4791111136202', '50', '2019-04-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(235, 1, 31, 'New Fems 10 Napkins', '', '4791111136226', '50', '2019-04-09', '1', '', '', '125', '135', '', NULL, '100', 0, 0, NULL),
(236, 1, 1, 'Baby Cheramy - Baby 4 Diapers L 9-14KG', '', '4791111141565', '50', '2019-04-09', '1', '', '', '180', '210', '', NULL, '100', 0, 0, NULL),
(237, 21, 31, 'Happy Huggs 1 Diaper M 5-10kg', '', '4792149330129', '50', '2019-04-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(238, 1, 31, 'Baby Cheramy - Baby 4 Diapers M 4-8Kg', '', '4791111141558', '50', '2019-04-09', '1', '', '', '180', '215', '', NULL, '100', 0, 0, NULL),
(239, 12, 31, 'Bambi Diapers XLOver 10KG', '', '4792019315966', '50', '2019-04-09', '1', '', '', '160', '180', '', NULL, '100', 0, 0, NULL),
(240, 26, 30, 'Maliban Yaha Posha 200g', '', '4796021060012', '50', '2019-04-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(241, 1, 31, 'Whisper ', '', '4902430856874', '50', '2019-04-09', '1', '', '', '130', '140', '', NULL, '100', 0, 0, NULL),
(242, 6, 30, 'Air Wick 3 In 1 Lavender', '', '4792037105600', '50', '2019-04-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(243, 6, 30, 'Mortein Rat Kill', '', '8901396534006', '50', '2019-04-09', '1', '', '', '45', '60', '', NULL, '100', 0, 0, NULL),
(244, 2, 30, 'Comfort pink 220ml', '220ml', '8901030690372', '50', '2019-04-09', '1', '', '', '220', '230', '', NULL, '100', 0, 0, NULL),
(245, 2, 30, 'Comfort Blue 220ml', '', '8901030690365', '50', '2019-04-09', '1', '', '', '220', '230', '', NULL, '100', 0, 0, NULL),
(246, 2, 30, 'Comfort Green 220ml', '', '8901030690389', '50', '2019-04-09', '1', '', '', '230', '250', '', NULL, '100', 0, 0, NULL),
(247, 6, 30, 'Dettol Cool Handwash 250ml', '', '4792037418298', '50', '2019-04-09', '1', '', '', '250', '275', '', NULL, '100', 0, 0, NULL),
(248, 12, 1, 'No Name', '', '', '50', '2019-04-09', '1', '', '', '0', '0', '', NULL, '100', 0, 0, NULL),
(249, 1, 15, 'No name kg', '', '', '50', '2019-04-09', '1', '', '', '0', '0', '', NULL, '100', 0, 0, NULL),
(250, 6, 30, 'harpic Fresh 200ml', '200ml', '4792037107734', '50', '2019-04-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(251, 6, 30, 'Harpic Fresh 500ml', '', '4792037107772', '50', '2019-04-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(252, 6, 30, 'Harpic Rose 200ml', '200ml', '4792037107727', '50', '2019-04-09', '1', '', '', '80', '95', '', NULL, '100', 0, 0, NULL),
(253, 6, 30, 'Harpic Rose 500ml', '', '4792037107765', '50', '2019-04-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(254, 6, 30, 'harpic Power 10 200ml', '', '4792037107703', '50', '2019-04-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(255, 6, 30, 'harpic Power 10 500ml', '', '4792037107741', '50', '2019-04-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(256, 6, 30, 'Harpic Pine 200ml', '', '4792037107710', '50', '2019-04-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(257, 6, 30, 'Harpic Pine 500ml', '500ml', '4792037107758', '50', '2019-04-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(258, 6, 30, 'Lysol Floral 500ml', '500', '4792037109707', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(259, 6, 30, 'Lysol Floral 200ml', '', '4792037109844', '50', '2019-04-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(260, 6, 30, 'Lysol Lavender 500ml', '500ml', '4792037120443', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(261, 6, 30, 'Lysol Lavender 200ml', '', '4792037120207', '50', '2019-04-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(262, 6, 30, 'Lysol Citrus 500ml', '', '4792037109691', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(263, 6, 30, 'Lysol Citrus 200ml', '', '4792037109837', '50', '2019-04-09', '1', '', '', '90', '120', '', NULL, '100', 0, 0, NULL),
(264, 6, 30, 'Lysol Pine 200ml', '', '4792037107796', '50', '2019-04-09', '1', '', '', '90', '120', '', NULL, '100', 0, 0, NULL),
(265, 6, 30, 'Lysol pine 500ml', '', '4792037109745', '50', '2019-04-09', '1', '', '', '180', '210', '', NULL, '100', 0, 0, NULL),
(266, 6, 30, 'Lysol Citronella 500ml', '', '4792037610777', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(267, 6, 30, 'Lysol Citronella 200ml', '', '4792037610760', '50', '2019-04-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(268, 6, 30, 'Lysol Jasmine 500ml', '500ml', '4792037120108', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(269, 6, 30, 'New Harpic Bathroom Cleaner 500ml', '500ml', '8901396153306', '50', '2019-04-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(270, 6, 30, 'Air Wick Air Freshener green 475ml', '', '4792037107871', '50', '2019-04-09', '1', '', '', '350', '400', '', NULL, '100', 0, 0, NULL),
(271, 6, 30, 'Air Wick Air Freshener Lavender 475ml', '', '4792037105068', '50', '2019-04-09', '1', '', '', '350', '400', '', NULL, '100', 0, 0, NULL),
(272, 6, 30, 'Air Wick Air Freshener Rose 475ml', '', '4792037107857', '50', '2019-04-09', '1', '', '', '350', '400', '', NULL, '100', 0, 0, NULL),
(273, 6, 30, 'Air Wick Air Freshener Jasmine 475ml', '', '4792037107864', '50', '2019-04-09', '1', '', '', '300', '400', '', NULL, '100', 0, 0, NULL),
(274, 4, 30, 'milo 15g', '', '4792024013277', '50', '2019-04-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(275, 4, 20, 'Maggi Chicken noodles 49g', '49g', '4792024014359', '50', '2019-04-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(276, 4, 20, 'Maggi Chicken noodles 73g', '73g', '4792024014687', '50', '2019-04-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(277, 4, 20, 'Maggi Cheese noodles pak', '', '4792024015806', '50', '2019-04-09', '1', '', '', '150', '180', '', NULL, '100', 0, 0, NULL),
(278, 12, 30, 'Sapumal sambrani 50g', '', '4796000970103', '50', '2019-04-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(279, 12, 30, 'Amritha Jasmine ', '', '4791010003322', '50', '2019-04-09', '1', '', '', '50', '85', '', NULL, '100', 0, 0, NULL),
(280, 6, 30, 'Amritha 4 IN 1', '', '4791010002547', '50', '2019-04-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(281, 12, 30, 'Saptham Incense Sticks', '', '4792767523453', '50', '2019-04-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(282, 12, 30, 'Amritha green', '', '4791010003209', '50', '2019-04-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(283, 12, 30, 'Amritha Rose', '', '4791010003346', '50', '2019-04-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(284, 12, 30, 'Hadunkuru 10Rs', '', '', '50', '2019-04-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(285, 12, 30, 'pahanthira pak', '', '', '50', '2019-04-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(286, 12, 30, 'Bathisara Incense Sticks', '', '4792227000500', '50', '2019-04-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(287, 12, 30, 'PathmineeIncense Sticks', '', '6085465252526', '50', '2019-04-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(288, 12, 30, 'Sapthami 7In one', '', '8902264000548', '50', '2019-04-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(289, 12, 30, 'Hadunkuru 30Rs', '', '', '50', '2019-04-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(290, 12, 30, 'Itipandam L', '', '', '50', '2019-04-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(291, 12, 30, 'Itipandam S', '', '', '50', '2019-04-09', '1', '', '', '3', '5', '', NULL, '100', 0, 0, NULL),
(292, 12, 30, 'pahanthira ', '', '', '50', '2019-04-09', '1', '', '', '3', '5', '', NULL, '100', 0, 0, NULL),
(293, 12, 30, 'Link Samahan 4g', '4g', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(294, 12, 30, 'Panadol', '', '4792099010805', '50', '2019-05-09', '1', '', '', '3', '4', '', NULL, '100', 0, 0, NULL),
(295, 6, 30, 'Dettol Plaster', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(296, 7, 30, 'Siddhalepa Balm 2.5', '', '4792172000013', '50', '2019-05-09', '1', '', '', '25', '32', '', NULL, '100', 0, 0, NULL),
(297, 7, 30, 'Siddhalepa Balm 5g', '', '4792172000020', '50', '2019-05-09', '1', '', '', '44', '55', '', NULL, '100', 0, 0, NULL),
(298, 7, 1, 'Siddhalepa Balm 10g', '', '4792172000037', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(299, 12, 30, 'Wintegeno 35g', '', '', '50', '2019-04-09', '1', '', '', '80', '125', '', NULL, '100', 0, 0, NULL),
(300, 12, 30, 'Iodex Balm 9g', '', '4792099011130', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(301, 12, 30, 'IodexHead Fast Balm 9g', '', '4792099010898', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(302, 12, 30, 'Neeroga Paspanguwa 40g', '', '4792149110110', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(303, 12, 30, 'Paspanguwa', '', '', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(304, 7, 30, 'Siddhalepa Asamodagams Spirit 385ml', '', '4792172004080', '50', '2019-05-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(305, 12, 30, 'Jeewaka Asamodagam Spirit 385ml', '', '4796016830019', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(306, 2, 30, 'Know chicken Cube 10g', '', '4792081002597', '50', '2019-05-09', '1', '', '', '20', '22', '', NULL, '100', 0, 0, NULL),
(307, 4, 30, 'Maggi Chicken Soup Cube 4g', '', '4792024012393', '50', '2019-04-09', '1', '', '', '10', '12', '', NULL, '100', 0, 0, NULL),
(308, 12, 30, 'Nilma 75ml', '', '4796000501758', '50', '2019-05-09', '1', '', '', '25', '35', '', NULL, '100', 0, 0, NULL),
(309, 6, 30, 'Robin Liquid Blue 75ml', '', '8901396023005', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(310, 22, 30, 'Marina Sunflower Oil 500ml', '', '4796006420138', '50', '2019-05-09', '1', '', '', '300', '350', '', NULL, '100', 0, 0, NULL),
(311, 22, 30, 'Marina Coconut Oil 500ml', '', '4796006420251', '50', '2019-05-09', '1', '', '', '300', '325', '', NULL, '100', 0, 0, NULL),
(312, 22, 30, 'Marina Cooking Oil 500', '', '4790014983029', '50', '2019-05-09', '1', '', '', '190', '215', '', NULL, '100', 0, 0, NULL),
(313, 32, 30, 'Md Pineapple Jam 225g', '', '4792098003044', '50', '2019-05-09', '1', '', '', '150', '175', '', NULL, '100', 0, 0, NULL),
(314, 32, 30, 'Md Pineapple Jam 500g', '', '4792098489220', '50', '2019-05-09', '1', '', '', '350', '390', '', NULL, '100', 0, 0, NULL),
(315, 32, 30, 'Md Strawberry Jam 225g', '', '4792098004041', '50', '2019-05-09', '1', '', '', '170', '190', '', NULL, '100', 0, 0, NULL),
(316, 32, 30, 'Md Mango Jam 100g', '', '4792098324019', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(317, 23, 30, 'Maya Tomato Sauce 400g', '', '4796013190208', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(318, 23, 30, 'Lavinia Vinegar 350ml', '', '4796013190253', '50', '2019-05-09', '1', '', '', '85', '100', '', NULL, '100', 0, 0, NULL),
(319, 1, 1, 'Soorya Ginipetti', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(320, 2, 30, 'Marmite 55g', '', '4792081007400', '50', '2019-05-09', '1', '', '', '165', '175', '', NULL, '100', 0, 0, NULL),
(321, 12, 30, 'Binder Gum', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(322, 14, 30, 'Eco Soft Paper Serviettes', '', '4792210113422', '50', '2019-05-09', '1', '', '', '80', '120', '', NULL, '100', 0, 0, NULL),
(323, 2, 3, 'Signal Strong Teeth 160g + 40g', '', '4792081005680', '50', '2019-05-09', '1', '', '', '145', '160', '', NULL, '100', 0, 0, NULL),
(324, 2, 3, 'Signal Strong Teeth120g', '', '4792081260713', '50', '2019-05-09', '1', '', '', '115', '124', '', NULL, '100', 0, 0, NULL),
(325, 2, 23, 'Signal Deep Clean Tooth Brush', '', '4796005656323', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(326, 2, 23, 'Signal Fighter Tooth Brush', '', '4796005650680', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(327, 2, 23, 'Signal Fighter Tooth Brush Soft', '', '4796005650680', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(328, 2, 3, 'Ayush Toothpaste 70g', '', '4792081004058', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(329, 2, 3, 'Ayush Toothpaste 40g', '40g', '4792081004041', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(330, 2, 8, 'Pond`s New Light Moisturiser 25ml', '', '8901030676970', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(331, 2, 8, 'Pond`s White Beauty Cream 23g', '', '8901030709357', '50', '2019-05-09', '1', '', '', '200', '230', '', NULL, '100', 0, 0, NULL),
(332, 2, 8, 'VaselineDeep Restore 100ml', '', '4792081001446', '50', '2019-05-09', '1', '', '', '180', '205', '', NULL, '100', 0, 0, NULL),
(333, 2, 8, 'Vaseline Healthy White 40ml', '', '4796005658877', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(334, 2, 30, 'Marmite 105g', '', '4792081001859', '50', '2019-05-09', '1', '', '', '320', '325', '', NULL, '100', 0, 0, NULL),
(335, 2, 12, 'Lifebuoy Anti-Dandruff Shampoo 80ml', '', '4792081361342', '50', '2019-05-09', '1', '', '', '110', '125', '', NULL, '100', 0, 0, NULL),
(336, 2, 12, 'Lifebuoy Strong Health Shampoo 80ml', '', '4792081362349', '50', '2019-05-09', '1', '', '', '110', '125', '', NULL, '100', 0, 0, NULL),
(337, 2, 12, 'Clear anti Hair Fall 80ml', '', '4792081000395', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(338, 2, 12, 'Clear Anti-Dandruff Shampoo 80ml', '', '4792081000401', '50', '2019-05-09', '1', '', '', '140', '170', '', NULL, '100', 0, 0, NULL),
(339, 2, 12, 'Clear Men Shampoo 80ml', '', '4792081000418', '50', '2019-05-09', '1', '', '', '150', '185', '', NULL, '100', 0, 0, NULL),
(340, 2, 30, 'VIM Dishwash Liquid 500ml', '', '4796005660047', '50', '2019-05-09', '1', '', '', '180', '210', '', NULL, '100', 0, 0, NULL),
(341, 2, 30, 'VIM Dishwash Liquid 250ml', '', '4796005660030', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(342, 2, 8, 'Fair & lovely Men Fairness Cream 50g', '', '4792081002320', '50', '2019-05-09', '1', '', '', '300', '360', '', NULL, '100', 0, 0, NULL),
(343, 2, 8, 'Fair & lovely Men Fairness Cream 25g', '', '4792081002313', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(344, 2, 8, 'Fair & lovely Fasewash Men 50g', '', '4792081004676', '50', '2019-05-09', '1', '', '', '240', '260', '', NULL, '100', 0, 0, NULL),
(345, 2, 23, 'Signal Triple Clean Tooth Brush Medium', '', '4796005652707', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(346, 2, 23, 'Signal Triple Clean Tooth Brush Soft', '', '4796005652707', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(347, 2, 8, 'Pears Baby Bedtime Cream 100ml', '', '4792081426508', '50', '2019-05-09', '1', '', '', '130', '155', '', NULL, '100', 0, 0, NULL),
(348, 2, 8, 'Pears Baby Pure & Gentle 100ml', '', '4792081424115', '50', '2019-05-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(349, 2, 8, 'Pears Baby Herbal Baby Cream 100ml', '', '4792081424306', '50', '2019-05-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(350, 2, 30, 'Astra 500g', '', '4796005652851', '50', '2019-05-09', '1', '', '', '425', '475', '', NULL, '100', 0, 0, NULL),
(351, 2, 30, 'Astra 250g', '', '4796005652868', '50', '2019-05-09', '1', '', '', '245', '255', '', NULL, '100', 0, 0, NULL),
(352, 2, 30, 'Astra 100g', '', '4792081860104', '50', '2019-05-09', '1', '', '', '95', '105', '', NULL, '100', 0, 0, NULL),
(353, 2, 30, 'Astra 45g', '', '', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(354, 2, 30, 'Astra 18g', '', '', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(355, 2, 2, 'Rin Detergent Powder 500g', '', '4792081061419', '50', '2019-05-09', '1', '', '', '100', '115', '', NULL, '100', 0, 0, NULL),
(356, 2, 2, 'Surf Excel 500g', '', '4796005650031', '50', '2019-05-09', '1', '', '', '165', '180', '', NULL, '100', 0, 0, NULL),
(357, 2, 2, 'Surf Excel 1Kg', '', '4796005663482', '50', '2019-05-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(358, 2, 2, 'Sunlight Sakura Detergent powder 200g', '', '4796005661082', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(359, 2, 2, 'Sunlight Sakura Detergent powder 550g', '', '4796005661075', '50', '2019-05-09', '1', '', '', '89', '99', '', NULL, '100', 0, 0, NULL),
(360, 2, 1, 'Sunlight Lemon Soap 115g', '', '4792081009138', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(361, 2, 1, 'Sunlight Rose Soap 115g', '', '4792081009169', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(362, 2, 1, 'Sunlight Nil Manel Soap 115g', '', '4792081009176', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(363, 2, 1, 'Sunlight Lemon Soap 3 Pak', '', '4792081009145', '50', '2019-05-09', '1', '', '', '128', '144', '', NULL, '100', 0, 0, NULL),
(364, 2, 1, 'Pears Baby Bedtime Soap 100g', '', '4792081002900', '50', '2019-05-09', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(365, 2, 1, 'Pears Baby Active Floral Baby soap Pak 100g +4', '', '4792081003174', '50', '2019-05-09', '1', '', '', '245', '265', '', NULL, '100', 0, 0, NULL),
(366, 2, 1, 'Pears Baby Pure&Gentle Baby soap 100g+4', '', '4792081003167', '50', '2019-05-09', '1', '', '', '245', '265', '', NULL, '100', 0, 0, NULL);
INSERT INTO `products` (`pro_id`, `v_id`, `category_id`, `product_name`, `product_description`, `barcode`, `quantity`, `online_date`, `product_method`, `discount`, `image`, `dealer_price`, `unit_price`, `bar_img`, `exp_date`, `f_qty`, `dep_id`, `lower_price_limit`, `rack_no`) VALUES
(367, 2, 1, 'wonderlight Jasmine Soap 115g', '', '4792081009268', '50', '2019-05-09', '1', '', '', '42', '47', '', NULL, '100', 0, 0, NULL),
(368, 2, 1, 'wonderlight Lime Soap 115g', '', '4792081009282', '50', '2019-05-09', '1', '', '', '35', '42', '', NULL, '100', 0, 0, NULL),
(369, 2, 1, 'LifebuoyTurmeric Soap 100g', '', '4792081003808', '50', '2019-05-09', '1', '', '', '50', '57', '', NULL, '100', 0, 0, NULL),
(370, 2, 1, 'Lifebuoy Total10 Soap 55g', '', '4792081590018', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(371, 2, 1, 'Lux Almond Oill 100g', '', '4792081002511', '50', '2019-05-09', '1', '', '', '60', '65', '', NULL, '100', 0, 0, NULL),
(372, 2, 1, 'Lux Jasmine 100g', '', '4792081001163', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(373, 2, 1, 'Lux Lotus oil 100g', '', '4792081002467', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(374, 2, 1, 'Lux Sandalwood 100g', '', '4792081002443', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(375, 2, 1, 'Lux Cucumber 100g', '', '4792081002450', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(376, 2, 1, 'vim soap 400g', '', '4796005650574', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(377, 2, 1, 'vim soap 200g', '', '4796005650567', '50', '2019-05-09', '1', '', '', '40', '48', '', NULL, '100', 0, 0, NULL),
(378, 2, 1, 'vim soap 3 Pak ', '', '4796005657412', '50', '2019-05-09', '1', '', '', '60', '69', '', NULL, '100', 0, 0, NULL),
(379, 12, 30, 'Blue Power 75ml', '', '', '50', '2019-05-09', '1', '', '', '24', '35', '', NULL, '100', 0, 0, NULL),
(380, 12, 30, 'Baida Laiter', '', '6739225235815', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(381, 25, 30, 'Rasoda Fruit & Nut Ice Cream 80ml', '', '85964236548972458', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(382, 25, 30, 'Rasoda Peni Cadju Ice Cream 80ml', '', '4796022710039', '50', '0000-00-00', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(383, 2, 29, 'Milo 200g', '', '4792024013314', '50', '2019-05-09', '1', '', '', '185', '195', '', NULL, '100', 0, 0, NULL),
(384, 4, 20, 'Maggi Family Pak 325g', '', '4792024014335', '50', '2019-05-09', '1', '', '', '160', '170', '', NULL, '100', 0, 0, NULL),
(385, 4, 20, 'Maggi Daiya Noodles 74g', '', '4792024014724', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(386, 25, 30, 'Ice 5 Rs', '', '', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(387, 25, 30, 'Ice 10 Rs', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(388, 24, 32, 'Choc Shock Bisket 90g', '', '4792192845380', '50', '2019-05-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(389, 24, 32, 'Munchee Nice 100g', '', '8888101020200', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(390, 26, 32, 'Maliban Custard cream Biscuit 100g', '', '4791034008112', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(391, 26, 32, 'Maliban Orange cream Biscuit 100g', '', '4791034021111', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(392, 26, 32, 'Maliban Faluda Marie 100g', '', '4791034071192', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(393, 24, 32, 'Munchee Vanilla Wafers 85g', '', '8888101500207', '50', '2019-05-09', '1', '', '', '40', '60', '', NULL, '100', 0, 0, NULL),
(394, 24, 32, 'Munchee Lemon Wafers 85g', '', '8888101505004', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(395, 24, 32, 'Munchee Milk Short Biscuit 200g', '', '8888101030407', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(396, 24, 32, 'Munchee Milk Short Biscuit 85g', '', '8888101030278', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(397, 24, 32, 'Munchee Hawaian Cookies 100g', '', '8888101080204', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(398, 23, 32, 'Munchee Hawaian Cookies 200g', '', '8888101080402', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(399, 24, 32, 'Munchee Super Cream Cracker 85g', '', '8888101430276', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(400, 24, 32, 'Munchee Super Cream Cracker 490g', '', '8888101430115', '50', '2019-05-09', '1', '', '', '190', '200', '', NULL, '100', 0, 0, NULL),
(401, 24, 32, 'Maliban Cream Cracker 230g', '', '4791034071604', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(402, 24, 32, 'Munchee Super Cream Cracker 190g', '', '8888101430337', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(403, 24, 32, 'Munchee Super Cream Cracker 125g', '', '8888101430153', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(404, 24, 32, 'Munchee Gift Assortment 400G', '', '8888101110802', '50', '2019-05-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(405, 26, 32, 'Maliban Classique Biscuit', '', '4791034022026', '50', '2019-05-09', '1', '', '', '480', '500', '', NULL, '100', 0, 0, NULL),
(406, 27, 34, 'Tiara Swiss Roll Strawberry 200g', '', '4792192065207', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(407, 27, 34, 'Tiara Layer Cake Strawberry 310g', '', '4792192012201', '50', '2019-05-09', '1', '', '', '230', '250', '', NULL, '100', 0, 0, NULL),
(408, 27, 34, 'Tiara Layer Cake Jambo Vanila 480g', '', '4792192010238', '50', '2019-05-09', '1', '', '', '340', '370', '', NULL, '100', 0, 0, NULL),
(409, 27, 34, 'Tiara Layer Cake Jambo Chocolate 480g', '', '4792192011235', '50', '2019-05-09', '1', '', '', '340', '370', '', NULL, '100', 0, 0, NULL),
(410, 27, 34, 'Tiara Swiss Roll Chocolate 200g', '', '4792192060202', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(411, 24, 30, 'Munchee Stix Strawberry 20g', '', '4792192839006', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(412, 24, 30, 'Munchee Stix Chocolate 20g', '', '4792192838009', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(413, 28, 32, 'Uswatte Chocolate Wafers 40g', '', '4792135080144', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(414, 28, 32, 'Uswatte Vanila Wafers 40g', '', '4792135080137', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(415, 12, 32, 'Butter Nut Cookies 50g', '', '4792209000696', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(416, 24, 32, 'Munchee Chocolate Marie 90g', '', '8888101281205', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(417, 24, 32, 'Munchee Lite Marie 50g', '', '8888101287238', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(418, 26, 32, 'Maliban Light Marie Biscuit 50g', '', '4791034027915', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(419, 24, 32, 'Munchee Chocolate Cream 210g', '', '4792192845366', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(420, 24, 32, 'Munchee Potato Cracker 110g', '', '8888101449209', '50', '2019-05-09', '1', '', '', '50', '70', '', NULL, '100', 0, 0, NULL),
(421, 26, 32, 'Maliban Chocolate cream Biscuit 100g', '', '4791034005111', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(422, 24, 32, 'Munchee Chocolate Cream 100g', '', '8888101270018', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(423, 24, 32, 'Munchee Ginger Biscuits 85g', '', '8888101570286', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(424, 24, 32, 'Munchee Ginger Biscuits 200g', '', '8888101570408', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(425, 24, 32, 'Munchee Chocolate Puff 200g', '', '8888101271404', '50', '2019-05-09', '1', '', '', '90', '110', '', NULL, '100', 0, 0, NULL),
(426, 24, 32, 'Munchee Chocolate Puff 100g', '', '8888101271206', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(427, 24, 32, 'Munchee Lemon Puff 100g', '', '8888101090203', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(428, 24, 32, 'Munchee Sun Cracker 95g', '', '8888101135454', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(429, 24, 32, 'Munchee Lemon Puff 200g', '', '8888101090401', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(430, 24, 32, 'Munchee Tifin Onion 125g', '', '8888101931193', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(431, 24, 32, 'Munchee Tifin Original 125g', '', '8888101932190', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(432, 24, 32, 'Munchee Milk Cream Biscuits 110g', '', '4792192845274', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(433, 24, 32, 'Munchee Milk Cream Biscuits 290g', '', '8888101272098', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(434, 24, 32, 'Munchee Tikiri Marie 80g', '', '8888101280208', '50', '2019-05-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(435, 24, 32, 'Munchee Ringo Biscuits 50g', '', '4792192822008', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(436, 24, 32, 'Munchee Cheese Cracker 100g', '', '8888101131203', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(437, 24, 32, 'Munchee Cheese Cracker 200g', '', '8888101131401', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(438, 24, 32, 'Maliban Ginger Biscuits 85g', '', '4791034070232', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(439, 24, 32, 'Munchee Bourbon Biscuits 100g', '', '4792192808002', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(440, 26, 32, 'Maliban Nice Biscuit 100g', '', '4791034020114', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(441, 12, 32, 'Power Crunch Biscuit 100g', '', '4792069000492', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(442, 18, 30, 'Pampers L 9-14 Kg', '', '4902430814621', '50', '2019-05-09', '1', '', '', '240', '260', '', NULL, '100', 0, 0, NULL),
(443, 18, 30, 'Pampers S 4-8 Kg', '', '4902430814607', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(444, 11, 30, 'Tarun Kotthamalli 50g', '', '10', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(445, 11, 30, 'Tarun Kotthamalli 100g', '', '11', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(446, 11, 30, 'Tarun Kotthamalli 250g', '', '12', '50', '2019-05-09', '1', '', '', '100', '125', '', NULL, '100', 0, 0, NULL),
(447, 11, 30, 'Tarun Suduru 50g', '', '13', '50', '2019-05-09', '1', '', '', '50', '55', '', NULL, '100', 0, 0, NULL),
(448, 11, 30, 'Tarun Mahaduru 50g', '', '14', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(449, 11, 30, 'Tarun Umalakada 8g', '', '15', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(450, 11, 30, 'Tarun aba 100g', '', '16', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(451, 11, 30, 'tarun Uluhal 100g', '', '17', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(452, 11, 30, 'Tarun Umalakada 25g', '', '17', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(453, 11, 30, 'Tarun aba 50g', '', '18', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(454, 11, 30, 'tarun Uluhal 50g', '', '19', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(455, 11, 30, 'Tarun Kunisso 50g', '', '20', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(456, 11, 30, 'Tarun Goraka 50g', '', '21', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(457, 11, 30, 'Tarun Plums 50g', '', '22', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(458, 11, 30, 'Tarun Sauhal 100g', '', '', '50', '2019-05-09', '1', '', '', '42', '48', '', NULL, '100', 0, 0, NULL),
(459, 11, 30, 'Tarun mungata 250g', '', '', '50', '2019-05-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(460, 11, 30, 'Tarun Jambo kadala 250g', '', '', '50', '2019-05-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(461, 11, 30, 'Tarun Sudu Kaupi 250g', '', '', '50', '2019-05-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(462, 11, 30, 'Tarun Udu Piti 250g', '', '', '50', '2019-05-09', '1', '', '', '135', '145', '', NULL, '100', 0, 0, NULL),
(463, 11, 30, 'Tarun Viyali Miris 50g', '50', '', '50', '2019-05-09', '1', '', '', '22', '38', '', NULL, '100', 0, 0, NULL),
(464, 11, 30, 'Tarun Viyali Miris 100g', '', '', '50', '2019-05-09', '1', '', '', '55', '76', '', NULL, '100', 0, 0, NULL),
(465, 12, 15, 'Sofia Pasta Lbo', '', '4792225001707', '50', '2019-05-09', '1', '', '', '300', '400', '', NULL, '100', 0, 0, NULL),
(466, 12, 15, 'Milan Pasta Sprin', '', '4792225001660', '50', '2019-05-09', '1', '', '', '300', '400', '', NULL, '100', 0, 0, NULL),
(467, 24, 30, 'Munchee Vanilla Wafers 400g', '', '4792192507615', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(468, 24, 32, 'Munchee Lemon Wafers 400g', '', '4792192508612', '50', '2019-05-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(469, 24, 32, 'Munchee Chocolate Wafers 400g', '', '4792192509619', '50', '2019-05-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(470, 26, 32, 'Maliban Chocolate cream Biscuit 400g', '', '4791034070546', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(471, 26, 32, 'Maliban Gold Marie 330g', '', '4791034071567', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(472, 24, 32, 'Munchee Chocolate Cream 400g', '', '8888101270117', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(473, 24, 32, 'Munchee Nice 400g', '', '8888101020101', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(474, 29, 19, 'CiC Creamoo Set yoghurt 80g', '', '4792137779121', '50', '2019-05-09', '1', '', '', '22', '35', '', NULL, '100', 0, 0, NULL),
(475, 29, 19, 'CiC Creamoo Drinking yoghurt 200ml', '', '4792137879128', '50', '2019-05-09', '1', '', '', '58', '70', '', NULL, '100', 0, 0, NULL),
(476, 28, 19, 'CiC Creamoo Drinking yoghur Mangot 200ml', '', '4792137879142', '50', '2019-05-09', '1', '', '', '58', '70', '', NULL, '100', 0, 0, NULL),
(477, 29, 32, 'CiC Creamoo Drinking yoghur Stawberry 200ml', '', '4792137879135', '50', '2019-05-09', '1', '', '', '58', '70', '', NULL, '100', 0, 0, NULL),
(478, 19, 30, 'Welcome Table Salt 400g', '', '4792149061641', '50', '2019-05-09', '1', '', '', '20', '50', '', NULL, '100', 0, 0, NULL),
(479, 19, 30, 'Welcome Crystal Salt 1kg', '', '4792149061658', '50', '2019-05-09', '1', '', '', '30', '55', '', NULL, '100', 0, 0, NULL),
(480, 30, 35, 'Delmege Soyameat Chicken 90g', '', '4792020101039', '50', '2019-05-09', '1', '', '', '50', '70', '', NULL, '100', 0, 0, NULL),
(481, 20, 35, 'Lankasoy Chicken 90g', '', '4796002070160', '50', '2019-05-09', '1', '', '', '70', '75', '', NULL, '100', 0, 0, NULL),
(482, 19, 35, 'Raigam Soya Meat Polosabula 90g', '', '4792149012117', '50', '2019-05-09', '1', '', '', '70', '85', '', NULL, '100', 0, 0, NULL),
(483, 20, 35, 'Raigam Soya Meat Devel Chiken 110g', '', '4792149011424', '50', '2019-05-09', '1', '', '', '85', '95', '', NULL, '100', 0, 0, NULL),
(484, 20, 35, 'Lankasoy Chicken 50g', '', '4796002001003', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(485, 30, 35, 'Delmege Soyameat Chicken 50g', '', '4792020101084', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(486, 30, 35, 'Lankasoy Kiri malu 50g', '', '4796002019008', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(487, 19, 35, 'Raigam Soya Meat Blue Pack 50g', '', '4792149014050', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(488, 12, 20, 'Prima Kottu Mee 80g', '', '4792018233131', '50', '2019-05-09', '1', '', '', '50', '55', '', NULL, '100', 0, 0, NULL),
(489, 24, 30, 'Munchee Stix Strawberry 55g', '', '4792192839228', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(490, 24, 30, 'Munchee Stix Chocolate 55g', '', '4792192838221', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(491, 24, 30, 'Munchee Stix Vanilla 55g', '', '4792192840224', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(492, 31, 30, 'Mini chips Chilli 24g', '', '4797001066724', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(493, 27, 36, 'Ritsbury Choco-La Milky 12g', '', '4792192437011', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(494, 27, 36, 'Ritsbury Chunky Choc 120g', '', '4792192601221', '50', '2019-05-09', '1', '', '', '100', '130', '', NULL, '100', 0, 0, NULL),
(495, 27, 36, 'Ritsbury Chunky Choc 60g', '', '4792192602204', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(496, 27, 36, 'Ritsbury Choco-Mo 100g', '', '4792192526203', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(497, 27, 36, 'Ritsbury Bubbles 40g', '', '4792192434003', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(498, 27, 36, 'Ritsbury Choco-La Milky 45g', '', '4792192401050', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(499, 27, 36, 'Ritsbury Bubbles 90g', '', '4792192423007', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(500, 27, 36, 'Ritsbury Popit 20G', '', '4792192553506', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(501, 27, 36, 'Ritsbury Chocolate Fingers 110g', '', '4792192474207', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(502, 27, 36, 'Ritsbury Uno 12g', '', '4792192453004', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(503, 27, 36, 'Ritsbury Popit 9g', '', '4792192553001', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(504, 27, 36, 'Ritsbury pebbles 8g', '', '8888101280192', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(505, 27, 36, 'Ritsbury Choc-A-Nut 7g', '', '4792192551007', '50', '0000-00-00', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(506, 14, 37, 'Atlas Cool Pen', '', '4792210113125', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(507, 27, 36, 'Ritsbury NIK NAK 6g', '', '4792192501002', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(508, 12, 38, 'Sweet Aitems 5 Rs', '', '', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(509, 12, 38, 'Sweet Aitems 10 Rs', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(510, 12, 38, 'Toffee 2 Rs', '', '', '50', '2019-05-09', '1', '', '', '1', '2', '', NULL, '100', 0, 0, NULL),
(511, 28, 38, 'Uswatte Fruity Jellies 75g', '', '4792135000166', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(512, 28, 38, 'Uswatte March Mallows 50g', '', '4792135030453', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(513, 27, 34, 'Tiara Ah - Ha Cake 20g', '', '4792192005005', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(514, 27, 38, 'Mentos Fruit 33.8g', '', '4796001651186', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(515, 27, 34, 'Tiara O-Kay 15g', '', '4792192002011', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(516, 27, 32, 'Munchee Choc Shoch30g', '', '4792192845427', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(517, 27, 34, 'Tiara Rollo 30g', '', '4792192050012', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(518, 27, 36, 'Ritsbury Duo Falooda 20g', '', '4792192532006', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(519, 27, 36, 'Ritsbury Black Magic 20g', '', '4792192533003', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(520, 27, 36, 'Ritsbury Rave 26g', '', '4792192528016', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(521, 27, 36, 'Ritsbury Champ 20g', '', '4792192527019', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(522, 30, 39, 'Motha Mango Jelly 100g', '', '4792551000344', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(523, 30, 39, 'Motha Orange Jelly 100g', '', '4792551000313', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(524, 30, 39, 'Motha Mixed Fruit Jelly 100g', '', '4792551000405', '50', '2019-05-09', '1', '', '', '85', '90', '', NULL, '100', 0, 0, NULL),
(525, 30, 39, 'Motha Mango Pudding Mix 110g', '', '4792551010091', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(526, 30, 39, 'Motha Caramel Pudding Mix 100g', '', '4792551010015', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(527, 30, 39, 'Motha Faluda Mix 125g', '', '4792551010237', '50', '2019-05-09', '1', '', '', '75', '80', '', NULL, '100', 0, 0, NULL),
(528, 30, 39, 'Motha Cornflour 100g', '', '4792551031010', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(529, 30, 39, 'Motha Strawberry jelly 100g', '', '4792551000016', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(530, 30, 39, 'Motha Strawberry jelly 200g', '', '4792551000023', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(531, 30, 39, 'Motha Apple Jelly 110g', '', '4792551000108', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(532, 30, 30, 'Motha Baking Powder 100g', '', '4792551036039', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(533, 30, 30, 'Motha Baking Powder 50g', '', '4792551036022', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(534, 30, 39, 'Motha Almond Chocolate Pudding Mix 100g', '', '4792551010268', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(535, 30, 30, 'Motha Icing Sugar 250g', '', '4792551030013', '50', '2019-05-09', '1', '', '', '100', '118', '', NULL, '100', 0, 0, NULL),
(536, 6, 30, 'Colman`s 20g', '', '47920037401634', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(537, 20, 35, 'Lanka Soy Polos Curry Taste 90g', '', '4796002004004', '50', '2019-05-09', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(538, 20, 30, 'Choco Chips Sweetened 20g', '', '4796002403005', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(539, 20, 30, 'Choco Chips Chocolate 20g', '', '4796002404002', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(540, 20, 30, 'Honey Bee 20g', '', '4796002408000', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(541, 20, 20, 'Rasa Hari Chicken Noodles 75g', '', '4792109000536', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(542, 20, 30, 'Ramba Tetos BBq 20g', '', '4796002308003', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(543, 32, 30, 'Md Tomato Sauce 400ml', '', '4792098089147', '50', '2019-05-09', '1', '', '', '300', '325', '', NULL, '100', 0, 0, NULL),
(544, 3, 13, 'Nature`s Secrets Peppermint Facial Wash 100ml', '', '4792054001428', '50', '2019-05-09', '1', '', '', '200', '245', '', NULL, '100', 0, 0, NULL),
(545, 3, 13, 'Nature`s Secrets Peppermint Facial Wash 50ml', '', '4792054001442', '50', '2019-05-09', '1', '', '', '140', '150', '', NULL, '100', 0, 0, NULL),
(546, 4, 30, 'Milkmaid 510g', '', '4792024011815', '50', '2019-05-09', '1', '', '', '280', '310', '', NULL, '100', 0, 0, NULL),
(547, 4, 30, 'Milkmaid 390g', '', '4792024011792', '50', '2019-05-09', '1', '', '', '200', '235', '', NULL, '100', 0, 0, NULL),
(548, 30, 30, 'delmege Vanilla Essence 28ml', '', '4792020311087', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(549, 30, 30, 'Delmege Banana Essence 28ml', '', '4792020311025', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(550, 30, 30, 'Delmege Rose Pink Colouring 28ml', '', '4792020301064', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(551, 30, 30, 'Delmege Blue Colouring 28ml', '', '4792020301026', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(552, 30, 30, 'Delmege Red Colouring 28ml', '', '4792020301057', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(553, 30, 30, 'Delmege Orange Essence 28ml', '', '4792020311056', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(554, 30, 30, 'Delmege Egg Yellow Colouring 28ml', '', '4792020301088', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(555, 16, 30, 'Kimcol Super Glue 3g', '', '6934588002382', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(556, 12, 30, 'Happy Cow Cheese 120g', '', '9066085415284', '50', '2019-05-09', '1', '', '', '35', '42', '', NULL, '100', 0, 0, NULL),
(557, 33, 30, 'Ran kahata 50g', '', '4791052500407', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(558, 2, 30, 'Laojee 50g', '', '4796005650185', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(559, 2, 30, 'Laojee 100g', '', '4796005650192', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(560, 12, 30, 'Viva 28g', '', '', '50', '2019-05-09', '1', '', '', '22', '28', '', NULL, '100', 0, 0, NULL),
(561, 12, 29, 'Ratthi 160g', '', '4791085081133', '50', '2019-05-09', '1', '', '', '140', '150', '', NULL, '100', 0, 0, NULL),
(562, 24, 32, 'Munchee Snak Cracker 30g', '', '8888101610265', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(563, 9, 30, 'Rashika Ata ata Mixture 30g', '', '4796001221297', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(564, 12, 30, 'Ntt Tomato Sauce 15g', '', '4792142853168', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(565, 24, 32, 'Munchee Onion Biscuits 30g', '', '8888101613266', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(566, 24, 32, 'Munchee Cheese Buttons 20g', '', '8888101611262', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(567, 33, 30, 'Watawala kahata 100g', '', '4791052500179', '50', '2019-05-09', '1', '', '', '90', '145', '', NULL, '100', 0, 0, NULL),
(568, 33, 30, 'Watawala kahata 50g', '', '4791052500162', '50', '2019-05-09', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(569, 33, 30, 'Zesta BOPF 50g', '', '4791052500285', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(570, 12, 30, 'Rista Black Tea 50g', '', '4792131709599', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(571, 26, 32, 'Maliban Snackers 25g', '', '4791034071475', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(572, 19, 30, 'Gango 20g', '', '4792149010007', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(573, 24, 32, 'Maliban Snackers Cheese & Chillie 25g', '', '4791034071468', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(574, 26, 32, 'Maliban Snackers Masala 25g', '', '4791034071451', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(575, 34, 30, 'Arpico Maskeliya Tea 50g', '', '4796006070975', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(576, 26, 32, 'Maliban Chick Bits 30g', '', '4791034004213', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(577, 26, 32, 'Maliban Tea 20g', '', '4796021060029', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(578, 14, 30, 'Atlas Multicolour 10 Rs', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(579, 12, 30, 'Sun Pawer Clorex 60ml', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(580, 2, 30, 'Domex Toilet Expers 500ml', '', '4796005650765', '50', '2019-05-09', '1', '', '', '165', '175', '', NULL, '100', 0, 0, NULL),
(581, 2, 30, 'Know Chicken Powder Mix 8g', '', '', '50', '2019-05-09', '1', '', '', '15', '18', '', NULL, '100', 0, 0, NULL),
(582, 2, 30, 'Know Ummalakada Powder mix', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(583, 2, 29, 'Signal Strong Teeth 14g', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(584, 2, 30, 'Surf Excel 30g', '', '123456789', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(585, 2, 11, 'Lifebuoy Shampoo Paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '6', '7', '', NULL, '100', 0, 0, NULL),
(586, 2, 12, 'Sunsilk Paket 6.5ml', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(587, 2, 30, 'Laojee 200g', '', '4796005650208', '50', '2019-05-09', '1', '', '', '240', '220', '', NULL, '100', 0, 0, NULL),
(588, 1, 30, 'Goya Black Rose Cologne Spray 35ml', '', '4791111109107', '50', '2019-05-09', '1', '', '', '250', '310', '', NULL, '100', 0, 0, NULL),
(589, 1, 30, 'Goya Jasmine Cologne Spray 35ml', '', '4791111109114', '50', '2019-05-09', '1', '', '', '250', '310', '', NULL, '100', 0, 0, NULL),
(590, 1, 30, 'Kumarika Dandruff controll 200ml', '', '4791111106212', '50', '2019-05-09', '1', '', '', '220', '240', '', NULL, '100', 0, 0, NULL),
(591, 1, 30, 'Paris jasmine Cologne Spray 50ml', '', '4791111110349', '50', '2019-05-09', '1', '', '', '270', '290', '', NULL, '100', 0, 0, NULL),
(592, 1, 30, 'Gold Spice Aftershave 90ml', '', '4791111104287', '50', '2019-05-09', '1', '', '', '350', '375', '', NULL, '100', 0, 0, NULL),
(593, 1, 1, 'Velvet Rose & prmegranate 100g x 4', '', '4791111114439', '50', '2019-05-09', '1', '', '', '172', '182', '', NULL, '100', 0, 0, NULL),
(594, 1, 1, 'Velvet Purple Lotus 100g x 4', '', '4791111114590', '50', '2019-05-09', '1', '', '', '172', '182', '', NULL, '100', 0, 0, NULL),
(595, 1, 1, 'Baby Cheramy - baby Soap 75g x3', '', '', '50', '2019-05-09', '1', '', '', '110', '125', '', NULL, '100', 0, 0, NULL),
(596, 1, 12, 'Kumarika Shampoo Paket 6.5ml', '', '', '50', '2019-05-09', '1', '', '', '6', '7', '', NULL, '100', 0, 0, NULL),
(597, 2, 8, 'Pears Baby Active Floral Baby Cream 100ml', '', '4792081001590', '50', '2019-05-09', '1', '', '', '125', '135', '', NULL, '100', 0, 0, NULL),
(598, 1, 8, 'Baby cheramy Moisturises & Nourishes Baby Lotion 100ml', '', '4791111141084', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(599, 1, 8, 'Baby Cheramy - For Nourished and Glowing skin 100ml', '', '4791111141084', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(600, 1, 1, 'baby Cheramy - Bedtime Classice 100ml', '', '4791111141114', '50', '2019-05-09', '1', '', '', '150', '180', '', NULL, '100', 0, 0, NULL),
(601, 1, 8, 'baby Cheramy - Bedtime Classice 50ml', '', '4791111141107', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(602, 1, 8, 'Baby cheramy Moisturises & Nourishes Baby Lotion 50ml', '', '4791111141015', '50', '2019-05-09', '1', '', '', '80', '85', '', NULL, '100', 0, 0, NULL),
(603, 19, 10, 'Amla Cool Hair oil 50ml', '', '4792149202358', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(604, 35, 19, 'Elephant House Soda 500ml', '', '4791066004137', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(605, 1, 1, 'Diva Lemon Fresh Soap 100g', '', '4791111112206', '50', '2019-05-09', '1', '', '', '35', '47', '', NULL, '100', 0, 0, NULL),
(606, 1, 8, 'Gold Hair Gel 4g', '', '', '50', '2019-05-09', '1', '', '', '6', '7', '', NULL, '100', 0, 0, NULL),
(607, 1, 12, 'Dandex Shampoo paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '5', '6', '', NULL, '100', 0, 0, NULL),
(608, 2, 12, 'Dove Shampoo paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(609, 6, 1, 'Dettol Lasting Fresh soap  70g', '', '4792037188115', '50', '2019-05-09', '1', '', '', '45', '62', '', NULL, '100', 0, 0, NULL),
(610, 6, 1, 'Dettol Skincare Soap 70g', '', '4792037313234', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(611, 19, 35, 'Raigam Prawn Soya Devel 110g', '', '4792149011325', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(612, 23, 30, 'Maya Margarine 18g', '', '4796013190314', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(613, 36, 40, 'KRS Mixture 90g', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(614, 26, 32, 'Maliban Doubles Vanilla & Chocolate 110g', '', '4791034070317', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(615, 7, 41, 'Siddhalepa Neelayadi Oil 30ml', '', '4792172001645', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(616, 7, 41, 'Siddhalepa Kolasleshma Oil 30ml', '', '4792172001607', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(617, 7, 41, 'Siddhalepa Edaru  Oil 30ml', '', '4792172001560', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(618, 7, 41, 'Siddhalepa Mahanarayana  Oil 30ml', '', '4792172001591', '50', '2019-05-09', '1', '', '', '100', '125', '', NULL, '100', 0, 0, NULL),
(619, 7, 40, 'Siddhalepa Kohoba Oil 30ml', '', '4792172001553', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(620, 7, 41, 'Siddhalepa Sarshapadi Oil 30ml', '', '4792172001676', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(621, 7, 41, 'Siddhalepa Vatha  Oil 30ml', '', '4792172001706', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(622, 7, 41, 'Siddhalepa Pas Oil 30ml', '', '4792172001713', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(623, 7, 41, 'Siddhalepa Ghee  Oil 30ml', '', '4792172001546', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(624, 7, 41, 'Siddhalepa    Aba Oil 30ml', '', '4792172001690', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(625, 7, 30, 'Siddhalepa Gripe Water 200ml', '', '4792172004028', '50', '2019-05-09', '1', '', '', '140', '150', '', NULL, '100', 0, 0, NULL),
(626, 7, 41, 'Siddhalepa Peenas Oil 30ml', '', '4792172001683', '50', '2019-05-09', '1', '', '', '70', '75', '', NULL, '100', 0, 0, NULL),
(627, 7, 41, 'Siddhalepa Pinda Oil 30ml', '', '4792172001652', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(628, 7, 41, 'Siddhalepa Ashwagandha Oil 30ml', '', '4792172001584', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(629, 7, 3, 'Siddhalepa Kekulu 40g', '', '4792172002123', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(630, 6, 30, 'Dettol Liquid 110ml', '', '4792037315085', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(631, 6, 30, 'Dettol Liquid 60ml', '', '4792037315207', '50', '2019-05-09', '1', '', '', '67', '77', '', NULL, '100', 0, 0, NULL),
(632, 12, 30, 'Mini Chips 24g', '', '4797001066727', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(633, 2, 30, 'Comfort pink Paket 16ml', '', '8901030683428', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(634, 2, 30, 'Comfort Green paket 16ml', '', '8901030683411', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(635, 2, 30, 'Comfort Blue paket 16ml', '', '8901030683404', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(636, 2, 12, 'Sunsilk Conditioner paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(637, 2, 12, 'Sunsilk Shampoo + Conditioner paket', '', '', '50', '2019-05-09', '1', '', '', '12', '14', '', NULL, '100', 0, 0, NULL),
(638, 2, 12, 'Dove Conditioner paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(639, 3, 12, 'Clear Shampoo paket 6.5ml', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(640, 19, 35, 'Raigam Double Chik`n 90g', '', '4792149020310', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(641, 2, 2, 'sunlight Detergent Powder 60g', '', '4796005659027', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(642, 37, 15, 'Kamatha Nadu', '', '', '50', '2019-05-09', '1', '', '', '86', '98', '', NULL, '100', 0, 0, NULL),
(643, 37, 15, 'Nadu Rice ', '', '', '50', '2019-05-09', '1', '', '', '84', '92', '', NULL, '100', 0, 0, NULL),
(644, 37, 15, 'Sudu Kakulu Hal', '', '', '50', '2019-05-09', '1', '', '', '80', '98', '', NULL, '100', 0, 0, NULL),
(645, 37, 15, 'Samba Rice ', '', '', '50', '2019-05-09', '1', '', '', '85', '108', '', NULL, '100', 0, 0, NULL),
(646, 12, 15, 'Brown sugar', '', '', '50', '2019-05-09', '1', '', '', '110', '130', '', NULL, '100', 0, 0, NULL),
(647, 12, 15, 'Rathu parippu No1', '', '', '50', '2019-05-09', '1', '', '', '160', '180', '', NULL, '100', 0, 0, NULL),
(648, 12, 15, 'Parippu No 2', '', '', '50', '2019-05-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(649, 12, 15, 'Kaduna hal', '', '', '50', '2019-05-09', '1', '', '', '85', '100', '', NULL, '100', 0, 0, NULL),
(650, 12, 15, 'Watana Parippu No 1', '', '', '50', '2019-05-09', '1', '', '', '140', '180', '', NULL, '100', 0, 0, NULL),
(651, 23, 35, 'Soya Luse', '', '', '50', '2019-05-09', '1', '', '', '250', '300', '', NULL, '100', 0, 0, NULL),
(652, 37, 15, 'Samba Kakulu', '', '', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(653, 12, 15, 'Maliban Kiri 18g', '', '', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(654, 26, 32, 'Maliban Kritz 20g', '', '4791034071444', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(655, 4, 30, 'Maggi Coconut Milk 25g', '', '4792024005814', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(656, 4, 30, 'Nespray 18g', '', '', '50', '2019-05-09', '1', '', '', '16', '18', '', NULL, '100', 0, 0, NULL),
(657, 4, 29, 'Nestomalt 28g', '', '4792024000178', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(658, 20, 30, 'Samaposha Ready Mix 80g', '', '4792109000734', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(659, 12, 30, 'Maliban Kiri 60g', '', '', '50', '2019-05-09', '1', '', '', '55', '60', '', NULL, '100', 0, 0, NULL),
(660, 12, 30, 'Maliban Kiri 150g', '', '', '50', '2019-05-09', '1', '', '', '130', '140', '', NULL, '100', 0, 0, NULL),
(661, 2, 30, 'VIM Dishwash Liquid 4ml + 4ml ', '', '4796005658655', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(662, 2, 30, 'Sunlight Care Liquid 40ml', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(663, 37, 30, 'Bulath', '', '', '50', '2019-05-09', '1', '', '', '4', '7', '', NULL, '100', 0, 0, NULL),
(664, 37, 30, 'Dunkala ', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(665, 12, 30, 'Coconut ', '', '', '50', '2019-05-09', '1', '', '', '40', '70', '', NULL, '100', 0, 0, NULL),
(666, 38, 30, 'POP Spizy Net 80g', '', '4792084089922', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(667, 38, 30, 'POP onion Rings 35g', '', '4792084089953', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(668, 39, 30, 'Keells Meatballs 100g', '', '4791061115128', '50', '2019-05-09', '1', '', '', '80', '105', '', NULL, '100', 0, 0, NULL),
(669, 39, 30, 'Keells Meatballs 200g', '', '4791061115227', '50', '2019-05-09', '1', '', '', '180', '199', '', NULL, '100', 0, 0, NULL),
(670, 40, 30, 'Delmo Chicken Easy Pack 250g', '', '4796008990035', '50', '2019-05-09', '1', '', '', '125', '150', '', NULL, '100', 0, 0, NULL),
(671, 40, 30, 'Delmo Chicken Easy Pack 400g', '', '4796008990011', '50', '2019-05-09', '1', '', '', '220', '260', '', NULL, '100', 0, 0, NULL),
(672, 40, 30, 'Delmo Sausages 500g', '', '4796008990110', '50', '2019-05-09', '1', '', '', '320', '324', '', NULL, '100', 0, 0, NULL),
(673, 40, 15, 'Delmo Sausages Luse', '', '', '50', '2019-05-09', '1', '', '', '450', '650', '', NULL, '100', 0, 0, NULL),
(674, 37, 15, 'Rata ala ', '', '', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(675, 37, 15, 'Rathu Lunu', '', '', '50', '2019-05-09', '1', '', '', '100', '400', '', NULL, '100', 0, 0, NULL),
(676, 37, 15, 'B Lunu', '', '', '50', '2019-05-09', '1', '', '', '120', '160', '', NULL, '100', 0, 0, NULL),
(677, 12, 15, 'Rathu parippu No 2', '', '', '50', '2019-05-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(678, 12, 15, 'Tea Luse', '', '', '50', '2019-05-09', '1', '', '', '680', '1100', '', NULL, '100', 0, 0, NULL),
(679, 12, 15, 'Keelan karawala ', '', '', '50', '2019-05-09', '1', '', '', '890', '1200', '', NULL, '100', 0, 0, NULL),
(680, 12, 15, 'Mhudu Kukula Karawala ', '', '', '50', '2019-05-09', '1', '', '', '680', '850', '', NULL, '100', 0, 0, NULL),
(681, 12, 15, 'Linno Karawala', '', '', '50', '2019-05-09', '1', '', '', '480', '800', '', NULL, '100', 0, 0, NULL),
(682, 37, 30, 'Biththara ', '', '', '50', '2019-05-09', '1', '', '', '20', '23', '', NULL, '100', 0, 0, NULL),
(683, 12, 15, 'Sudu Lunu ', '', '', '50', '2019-05-09', '1', '', '', '330', '600', '', NULL, '100', 0, 0, NULL),
(684, 12, 15, 'Halmasso No 01', '', '', '50', '2019-05-09', '1', '', '', '650', '850', '', NULL, '100', 0, 0, NULL),
(685, 37, 42, 'Bonchi ', '', '', '50', '2019-05-09', '1', '', 'images.jpg', '120', '320', '', NULL, '100', 0, 0, NULL),
(686, 37, 42, 'Karot', '', '', '50', '2019-05-09', '1', '', '', '110', '440', '', NULL, '100', 0, 0, NULL),
(687, 37, 42, 'Lise', '', '', '50', '2019-05-09', '1', '', '', '70', '300', '', NULL, '100', 0, 0, NULL),
(688, 12, 30, 'Bidi', '', '', '50', '2019-05-09', '1', '', '', '4', '6', '', NULL, '100', 0, 0, NULL),
(689, 2, 12, 'Ayush Shampoo paket 6ml', '', '', '50', '2019-05-09', '1', '', '', '7', '8', '', NULL, '100', 0, 0, NULL),
(690, 12, 30, 'Lampu Thel', '', '', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(691, 12, 30, 'Center Fruit ', '', '', '50', '2019-05-09', '1', '', '', '2', '3', '', NULL, '100', 0, 0, NULL),
(692, 37, 42, 'Murunga', '', '', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(693, 37, 42, 'Malu Miris', '', '', '50', '2019-05-09', '1', '', '', '150', '400', '', NULL, '100', 0, 0, NULL),
(694, 37, 42, 'Thakkali', '', '', '50', '2019-05-09', '1', '', '', '100', '500', '', NULL, '100', 0, 0, NULL),
(695, 37, 42, 'beetroot', '', '', '50', '2019-05-09', '1', '', '', '70', '220', '', NULL, '100', 0, 0, NULL),
(696, 37, 42, 'Wattakka ', '', '', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(697, 37, 42, 'Gowa ', '', '', '50', '2019-05-09', '1', '', '', '60', '160', '', NULL, '100', 0, 0, NULL),
(698, 37, 42, 'Batu ', '', '', '50', '2019-05-09', '1', '', '', '80', '120', '', NULL, '100', 0, 0, NULL),
(699, 37, 42, 'Amumiris ', '', '', '50', '2019-05-09', '1', '', '', '270', '500', '', NULL, '100', 0, 0, NULL),
(700, 37, 42, 'Kakiri ', '', '', '50', '2019-05-09', '1', '', '', '50', '80', '', NULL, '100', 0, 0, NULL),
(701, 37, 42, 'pipinna', '', '', '50', '2019-05-09', '1', '', '', '50', '120.', '', NULL, '100', 0, 0, NULL),
(702, 12, 30, 'Polthel No 2', '', 'B', '50', '2019-05-09', '1', '', '', '200', '320', '', NULL, '100', 0, 0, NULL),
(703, 12, 43, 'Polthel No 2', '', 'Litor', '50', '2019-05-09', '1', '', '', '280', '450', '', NULL, '100', 0, 0, NULL),
(704, 12, 15, 'Polthel No 2', '', 'KG', '50', '2019-05-09', '1', '', '', '280', '420', '', NULL, '100', 0, 0, NULL),
(705, 12, 30, 'Polthel No 1', '', 'Bothal', '50', '2019-05-09', '1', '', '', '250', '320', '', NULL, '100', 0, 0, NULL),
(706, 12, 43, 'Polthel No 1', '', 'Litor', '50', '2019-05-09', '1', '', '', '350', '400', '', NULL, '100', 0, 0, NULL),
(707, 12, 15, 'Polthel No 1', '', 'Kg', '50', '2019-05-09', '1', '', '', '350', '380', '', NULL, '100', 0, 0, NULL),
(708, 25, 30, 'Rasoda Chocolate  Ice Cream 1L', '', '4796022710138', '50', '2019-05-09', '1', '', '', '230', '270', '', NULL, '100', 0, 0, NULL),
(709, 25, 30, 'Rasoda Vanilla Ice Cream 1L', '', '4796022710022', '50', '2019-05-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(710, 25, 30, 'Rasoda Real Double Ice Cream 1L', '', '4796022710312', '50', '2019-05-09', '1', '', '', '240', '280', '', NULL, '100', 0, 0, NULL),
(711, 25, 30, 'Rasoda Vanilla Ice Cream 500ml', '', '4796022710015', '50', '2019-05-09', '1', '', '', '100', '130', '', NULL, '100', 0, 0, NULL),
(712, 9, 30, 'Rasoda Chocolate  Ice Cream 500ml', '', '4796022710121', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(713, 2, 1, 'Vim Power Of Limes 100g', '', '4796005650550', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(714, 32, 30, 'Md Woodapple Jam 225g', '', '4792098006045', '50', '2019-05-09', '1', '', '', '180', '190', '', NULL, '100', 0, 0, NULL),
(715, 32, 30, 'Mixed Fruit jam 225g', '', '4792098002047', '50', '2019-05-09', '1', '', '', '180', '190', '', NULL, '100', 0, 0, NULL),
(716, 32, 30, 'Md Mango Jam 225g', '', '4792098001040', '50', '2019-05-09', '1', '', '', '180', '190', '', NULL, '100', 0, 0, NULL),
(717, 32, 30, 'Md Woodapple Jam 500g', '', '4792098487226', '50', '2019-05-09', '1', '', '', '350', '390', '', NULL, '100', 0, 0, NULL),
(718, 32, 30, 'Md Strawberry Jam 500gg', '', '4792098494224', '50', '2019-05-09', '1', '', '', '300', '390', '', NULL, '100', 0, 0, NULL),
(719, 32, 30, 'Md Mango Jam 500g', '', '4792098495221', '50', '2019-05-09', '1', '', '', '350', '390', '', NULL, '100', 0, 0, NULL),
(720, 12, 30, 'Colouray Exbook 80 P Singal rul', '', '4792066002802', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(721, 12, 30, 'Rangiri Idiappa Piti 1Kg', '', '4794444011086', '50', '2019-05-09', '1', '', '', '140', '163', '', NULL, '100', 0, 0, NULL),
(722, 12, 15, 'kilan karawala ', '', '', '50', '2019-05-09', '1', '', '', '870', '1200', '', NULL, '100', 0, 0, NULL),
(723, 11, 15, 'Tuna paha Badapu Luse', '', '', '50', '2019-05-09', '1', '', '', '480', '700', '', NULL, '100', 0, 0, NULL),
(724, 16, 30, 'amin`s Black Henna ', '', '8904060000005', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(725, 12, 15, 'Prima Piti ', '', '', '50', '2019-05-09', '1', '', '', '94', '110', '', NULL, '100', 0, 0, NULL),
(726, 12, 30, 'Idal ', '', '', '50', '2019-05-09', '1', '', '', '120', '160', '', NULL, '100', 0, 0, NULL),
(727, 12, 30, 'Colouray Exbook 80 P #', '', '4792066002819', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(728, 31, 15, 'Manioc Chips', '', '', '50', '2019-05-09', '1', '', '', '400', '500', '', NULL, '100', 0, 0, NULL),
(729, 40, 15, 'Delmo Chicken', '', '', '50', '2019-05-09', '1', '', '', '340', '465', '', NULL, '100', 0, 0, NULL),
(730, 12, 30, 'plastik Kosu  S', '', '', '50', '2019-05-09', '1', '', '', '220', '230', '', NULL, '100', 0, 0, NULL),
(731, 31, 15, 'Kali Murukku', '', '', '50', '2019-05-09', '1', '', '', '400', '500', '', NULL, '100', 0, 0, NULL),
(732, 6, 30, 'Mortein Mosquito Coils', '', '4792037131173', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(733, 12, 30, 'Banana Chips 30g', '', '', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(734, 43, 44, 'Rathna Viyana Bun', '', '', '50', '2019-05-09', '1', '', '', '40', '40', '', NULL, '100', 0, 0, NULL),
(735, 43, 44, 'Rathna Special bun 60 Rs', '', '', '50', '2019-05-09', '1', '', '', '40', '60', '', NULL, '100', 0, 0, NULL),
(736, 12, 29, 'Ratthi 75g', '', '4791085292225', '50', '2019-05-09', '1', '', '', '70', '75', '', NULL, '100', 0, 0, NULL),
(737, 31, 15, 'Green Peas', '', '', '50', '2019-05-09', '1', '', '', '400', '500', '', NULL, '100', 0, 0, NULL),
(738, 31, 15, 'Rata Kaju', '', '', '50', '2019-05-09', '1', '', '', '600', '800', '', NULL, '100', 0, 0, NULL),
(739, 11, 15, 'Miris Kudu Luse ', '', '', '50', '2019-05-09', '1', '', '', '480', '700', '', NULL, '100', 0, 0, NULL),
(740, 11, 15, 'kali Miris Luse', '', '', '50', '2019-05-09', '1', '', '', '400', '700', '', NULL, '100', 0, 0, NULL),
(741, 11, 15, 'Kaha Kudu Luse', '', '', '50', '2019-05-09', '1', '', '', '600', '700', '', NULL, '100', 0, 0, NULL),
(742, 11, 15, 'Tuna paha Luse', '', '', '50', '2019-05-09', '1', '', '', '600', '700', '', NULL, '100', 0, 0, NULL),
(743, 44, 44, 'Sarasa Cream bun 4', '', '', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(744, 42, 44, 'Rasanima Cream Bun 50g', '', '', '50', '2019-05-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(745, 42, 44, 'Rasanima Tea Bun ', '', '', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(746, 43, 44, 'Rathna Wafers Cake', '', '', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(747, 43, 44, 'Rathna Ada Kake', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(748, 43, 44, 'Mung Guli', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL);
INSERT INTO `products` (`pro_id`, `v_id`, `category_id`, `product_name`, `product_description`, `barcode`, `quantity`, `online_date`, `product_method`, `discount`, `image`, `dealer_price`, `unit_price`, `bar_img`, `exp_date`, `f_qty`, `dep_id`, `lower_price_limit`, `rack_no`) VALUES
(749, 44, 44, 'Sarasa Spanchi', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(750, 45, 30, 'Noory Thala Karali', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(751, 43, 44, 'Rathna Special bun 40 Rs', '', '', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(752, 44, 44, 'Sarasa Roast ', '', '', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(753, 42, 44, 'Rasanima Roast', '', '', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(754, 42, 44, 'Rasanima Viskiringna 110g', '', '', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(755, 12, 30, 'Lunch Pepear', '', '', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(756, 27, 34, 'Ramba Onion 15.9g', '', '4796002301004', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(757, 12, 18, 'Captain Jack Mackerel 425g', '', '4792084050151', '50', '2019-05-09', '1', '', '', '250', '295', '', NULL, '100', 0, 0, NULL),
(758, 42, 44, 'Rasanima Viscothu 110g', '', '', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(759, 46, 44, 'kadala paket 10 Rs', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(760, 46, 44, 'kadala paket 20Rs', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(761, 46, 44, 'Ummalakada Sambal Pakert ', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(762, 11, 15, 'Ummalakada Sambal Luse', '', '', '50', '2019-05-09', '1', '', '', '800', '1100', '', NULL, '100', 0, 0, NULL),
(763, 31, 30, 'Altra Murukku 10 Rs', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(764, 31, 30, 'Altra Murukku 5 Rs', '', '', '50', '2019-05-09', '1', '', '', '5', '5', '', NULL, '100', 0, 0, NULL),
(765, 31, 15, 'Altra Kaupy ', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(766, 12, 30, 'sten wool', '', '7501004193352', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(767, 12, 30, 'Sponch', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(768, 47, 32, 'Sun Rich Milk Shorties 280g', '', '4796014810136', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(769, 12, 17, 'Nipuna Samba 10Kg', '', '', '50', '2019-05-09', '1', '', '', '930', '1000', '', NULL, '100', 0, 0, NULL),
(770, 12, 29, 'Maliban Kiri 400g', '', '4790015950617', '50', '2019-08-09', '1', '', '', '350', '375', '', NULL, '100', 0, 0, NULL),
(771, 21, 12, 'Ravan Black Hair Shampoo 25ml', '', '4792149200552', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(772, 21, 12, 'Ravan Black Hair Shampoo 15ml', '', '4792149200538', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(773, 12, 30, 'Abha Herbal Black Henna 10g', '', '8901023009013', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(774, 21, 30, 'Ravan Black Henna 6g', '', '4792149200217', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(775, 21, 30, 'Ravan Black Hair Shampoo 10ml', '', '4792149200514', '50', '2019-05-09', '1', '', '', '70', '90', '', NULL, '100', 0, 0, NULL),
(776, 12, 31, 'Eva 10Pads', '', '4792019419800', '50', '2019-05-09', '1', '', '', '100', '135', '', NULL, '100', 0, 0, NULL),
(777, 12, 31, 'Eva 10Pads', '', '4792019419800', '50', '2019-05-09', '1', '', '', '100', '135', '', NULL, '100', 0, 0, NULL),
(778, 1, 30, 'Godrej Expert 3g', '', '', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(779, 12, 30, 'Nivaran 90 8ml', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(780, 12, 8, 'Chandanalepa 20g', '', '4790014240054', '50', '2019-05-09', '1', '', '', '220', '230', '', NULL, '100', 0, 0, NULL),
(781, 12, 8, 'Chandanalepa 12gg', '', '4796010930043', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(782, 48, 32, 'Cherish Chocolate Cream Biscuits 100g', '', '4792102005033', '50', '2019-05-09', '1', '', '', '45', '60', '', NULL, '100', 0, 0, NULL),
(783, 48, 32, 'Cherish Duplex Cream Biscuits 100g', '', '4792102007525', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(784, 48, 30, 'Cherish Choco Peeps Biscuits 50g', '', '4792102007280', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(785, 48, 32, 'Cherish Custard Creams Biscuits 210g', '', '4792102007297', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(786, 12, 30, 'Mani Table Salt 1Kg', '', '4797001021252', '50', '2019-05-09', '1', '', '', '75', '100', '', NULL, '100', 0, 0, NULL),
(787, 48, 32, 'Cherish peeps', '', '4792102007280', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(788, 48, 32, 'Cherish Milk Marie Biscuits 80g', '', '4792102007150', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(789, 48, 32, 'Cherish Lemon Cream Wafers 90g', '', '4792102003022', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(790, 48, 32, 'Cherish Pink Wefers 90g', '', '4790014650198', '50', '2019-05-09', '1', '', '', '40', '60', '', NULL, '100', 0, 0, NULL),
(791, 48, 32, 'Cherish Classic Vanilla Wafer Biscuits 90g', '', '4792102007327', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(792, 1, 3, 'Clogard 14g Paket', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(793, 48, 36, 'Cherish Chocolate Fingels 40g', '', '4792102007501', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(794, 48, 36, 'Cheriish Chocolate Fingels 100g', '', '4792102007518', '50', '2019-05-09', '1', '', '', '60', '80', '', NULL, '100', 0, 0, NULL),
(796, 12, 45, 'Dialog 50 Rs', '', '', '50', '2019-05-09', '1', '', '', '48', '50', '', NULL, '100', 0, 0, NULL),
(797, 34, 45, 'Dialog 49 Rs', '', '', '50', '2019-05-09', '1', '', '', '47', '49', '', NULL, '100', 0, 0, NULL),
(798, 12, 45, 'Dialog 99 Rs', '', '', '50', '2019-05-09', '1', '', '', '98', '99', '', NULL, '100', 0, 0, NULL),
(799, 10, 45, 'Dialog 100 Rs', '', '', '50', '2019-05-09', '1', '', '', '98', '100', '', NULL, '100', 0, 0, NULL),
(800, 35, 45, 'Hutch 50 Rs', '', '', '50', '2019-05-09', '1', '', '', '48', '50', '', NULL, '100', 0, 0, NULL),
(801, 9, 45, 'Hutch 100 Rs', '', '', '50', '2019-05-09', '1', '', '', '98', '100', '', NULL, '100', 0, 0, NULL),
(802, 12, 45, 'Airtel 50 Rs', '', '', '50', '2019-05-09', '1', '', '', '48', '50', '', NULL, '100', 0, 0, NULL),
(803, 7, 45, 'Airtel 30 Rs', '', '', '50', '2019-05-09', '1', '', '', '28', '30', '', NULL, '100', 0, 0, NULL),
(804, 1, 45, 'Airtel 49 Rs', '', '', '50', '2019-05-09', '1', '', '', '48', '49', '', NULL, '100', 0, 0, NULL),
(805, 44, 44, 'Sarasa Pethipan 300g', '', '', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(806, 44, 44, 'pan 240g', '', '', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(807, 7, 30, 'Siddhalepa  Kassa shirap ', '', '4792172000808', '50', '2019-05-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(808, 7, 30, 'Siddhalepa  Kassa shirap ', '', '4792172000808', '50', '2019-05-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(809, 12, 15, 'Paththara', '', '', '50', '2019-05-09', '1', '', '', '50', '100', '', NULL, '100', 0, 0, NULL),
(810, 42, 44, 'Rasanima Pethi pan 320g', '', '4794444010249', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(811, 48, 32, 'Cherish Orange Cream 330g', '', '4790014650044', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(812, 48, 32, 'Cherish Vanilla Cream Wafers 225g', '', '4792102006016', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(813, 1, 32, 'Cherish Pink Wefers 225g', '', '4792102007105', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(814, 48, 32, 'Cherish Milk Cream Wafers 225g', '', '4792102007006', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(815, 48, 32, 'Cherish Vanilla Cream Wafers 400g', '', '4792102006009', '50', '2019-05-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(816, 48, 32, 'Cherish Milk Cream Wafers 400g', '', '4790014650211', '50', '2019-05-09', '1', '', '', '200', '220', '', NULL, '100', 0, 0, NULL),
(817, 48, 32, 'Cherish Choco Cream Wafers 225g', '', '4792102006023', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(818, 48, 32, 'Cherish Chocolate Wafers 400g', '', '4792102000021', '50', '2019-05-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(819, 48, 32, 'Cherish Pink Wefers 400g', '', '4792102007365', '50', '2019-05-09', '1', '', '', '180', '220', '', NULL, '100', 0, 0, NULL),
(820, 7, 30, 'Siddhalepa Mee Pani 30ml', '', '4792172003526', '50', '2019-05-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(821, 12, 30, 'Mini chips Tomato  24g', '', '4797001066703', '50', '2019-05-09', '1', '', '', '22', '30', '', NULL, '100', 0, 0, NULL),
(822, 12, 30, 'Mini chips Curry 24g', '', '4797001066710', '50', '2019-05-09', '1', '', '', '21', '30', '', NULL, '100', 0, 0, NULL),
(823, 16, 30, 'Panadol Children Liquid 100ml', '', '4792099010201', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(824, 16, 30, 'Card pak', '', '', '50', '2019-05-09', '1', '', '', '35', '70', '', NULL, '100', 0, 0, NULL),
(825, 37, 42, 'Ambaralla ', '', '', '50', '2019-05-09', '1', '', '', '40', '70', '', NULL, '100', 0, 0, NULL),
(826, 12, 15, 'Jambo kadala Luse', '', '', '50', '2019-05-09', '1', '', '', '160', '240', '', NULL, '100', 0, 0, NULL),
(827, 1, 1, 'Kurudu Pothu', '', '', '50', '2019-05-09', '1', '', '', '300', '4000', '', NULL, '100', 0, 0, NULL),
(828, 11, 30, 'Tarun Ummalakada 8g paket', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(829, 16, 30, 'Touch 50 Rs', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(830, 12, 30, 'Harischandra Coffee 50g', '', '4792083040122', '50', '2019-05-09', '1', '', '', '100', '105', '', NULL, '100', 0, 0, NULL),
(831, 12, 30, 'hattakatu', '', '', '50', '2019-05-09', '1', '', '', '5', '10', '', NULL, '100', 0, 0, NULL),
(832, 12, 30, 'Konda katu', '', '', '50', '2019-05-09', '1', '', '', '5', '10', '', NULL, '100', 0, 0, NULL),
(833, 12, 30, 'Pulun Pakert ', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(834, 12, 30, 'Betadine 30ml', '', '', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(835, 12, 30, 'Glucose - D 100g', '', '', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(836, 12, 30, 'twowain nul', '', '', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(837, 14, 30, 'Staples No-10', '', '4792210113675', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(838, 12, 30, 'Atlas Stapler No - 10 Mashin', '', '4792210103027', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(839, 49, 30, 'Lakmee Tomato Sauce 400g', '', '4796012130366', '50', '2019-05-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(840, 49, 35, 'Lakmee Chicken Aiya Soya Meat 120g', '', '4796012130618', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(841, 49, 35, 'Lakmee Dadayam Batta Soya Meat 70g', '', '4796012130021', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(842, 49, 30, 'Lakmee Top Karas Papadam 50g', '', '4796012130106', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(843, 37, 42, 'malu amba', '', '', '50', '2019-05-09', '1', '', '', '90', '90', '', NULL, '100', 0, 0, NULL),
(844, 37, 42, 'Bandakka', '', '', '50', '2019-05-09', '1', '', '', '70', '120', '', NULL, '100', 0, 0, NULL),
(845, 12, 15, 'Ummalakada Kali Luse', '', '', '50', '2019-05-09', '1', '', '', '1250', '2000', '', NULL, '100', 0, 0, NULL),
(846, 33, 30, 'Watawala kahata 400g', '', '4791052500186', '50', '2019-05-09', '1', '', '', '450', '486', '', NULL, '100', 0, 0, NULL),
(847, 33, 30, 'Watawala kahata 200g', '', '4791052500216', '50', '2019-05-09', '1', '', '', '250', '290', '', NULL, '100', 0, 0, NULL),
(848, 1, 2, 'Diva Fresh - Lime & Lemon 65g', '', '4791111112077', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(849, 1, 2, 'Diva Fresh - Rose & Lime 200g', '', '4791111180014', '50', '2019-05-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(850, 37, 15, 'Karapincha', '', '', '50', '2019-05-09', '1', '', '', '100', '200', '', NULL, '100', 0, 0, NULL),
(851, 16, 30, 'Plaster Roll', '', '0', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(852, 14, 30, 'Homerun Pastels', '', '4792210116096', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(853, 14, 30, 'Atlas 80Page =', '', '4792210100163', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(854, 14, 30, 'Atlas 40 Page #', '', '4792210100170', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(855, 12, 30, 'Baloon 5 Rs', '', '', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(856, 12, 30, 'Clorex 35g', '', '', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(857, 16, 30, 'kivi Shoe Polish', '', '8906006437173', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(858, 12, 30, 'Camy Shoe Polish L', '', '4796020420046', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(859, 6, 30, 'Kuhubu Nashakaya ', '', '', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(860, 19, 30, 'Richard CR Book 80Pgs =', '', '4792066000754', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(861, 11, 30, 'Richard CR Book 40Pgs =', '', '4792066003571', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(862, 16, 30, 'Bainder gum', '', '', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(863, 21, 30, 'Sandalwood Herbal Cream 20g', '', '4792149360010', '50', '2019-05-09', '1', '', '', '180', '225', '', NULL, '100', 0, 0, NULL),
(864, 12, 15, 'Goraka Luse', '', '', '50', '2019-05-09', '1', '', '', '400', '600', '', NULL, '100', 0, 0, NULL),
(865, 10, 14, 'Sooriya Gambiris 50g', '', '', '50', '2019-05-09', '1', '', '', '55', '75', '', NULL, '100', 0, 0, NULL),
(866, 14, 4, 'A4 Sheet White', '1', '', '50', '2019-09-16', '1', '', '', '2', '2.50', '', NULL, '100', 0, 0, NULL),
(867, 26, 32, 'Maliban Cheesebits 170g', '', '4791034003414', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(868, 26, 32, 'Maliban Krisco Tin 215g', '', '4791034015424', '50', '2019-05-09', '1', '', '', '250', '290', '', NULL, '100', 0, 0, NULL),
(869, 26, 32, 'Maliban Krisco 170g', '', '4791034015318', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(870, 26, 32, 'Maliban Gold Marie 75g', '', '4791034027410', '50', '2019-05-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(871, 25, 30, 'Rasoda Jelly Yoghurt 80g', '', '85964236548972458', '50', '2019-05-09', '1', '', '', '25', '35', '', NULL, '100', 0, 0, NULL),
(872, 25, 30, 'Rasoda Setkiri 120g', '', '4796022710237', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(873, 25, 30, 'Rasoda Curd 500g', '', '4796022710251', '50', '2019-05-09', '1', '', '', '100', '140', '', NULL, '100', 0, 0, NULL),
(874, 25, 30, 'Rasoda Curd 1 L', '', '4796022710268', '50', '2019-05-09', '1', '', '', '210', '250', '', NULL, '100', 0, 0, NULL),
(875, 12, 3, 'Cash', '', '', '50', '2019-05-09', '1', '', '', '10', '2', '', NULL, '100', 0, 0, NULL),
(876, 12, 30, 'Mobitel 50', '', '', '50', '2019-05-09', '1', '', '', '48', '50', '', NULL, '100', 0, 0, NULL),
(877, 11, 30, 'Mobitel 100', '', '', '50', '2019-05-09', '1', '', '', '98', '100', '', NULL, '100', 0, 0, NULL),
(878, 37, 17, 'Kamatha Nadu 10kg', '', '', '50', '2019-05-09', '1', '', '', '890', '1050', '', NULL, '100', 0, 0, NULL),
(879, 23, 30, 'Lavinla coconut vinegar 750ml', '', '4796013190253', '50', '2019-05-09', '1', '', '', '120', '150', '', NULL, '100', 0, 0, NULL),
(880, 40, 30, 'OFF cut Chicken', '', '', '50', '2019-05-09', '1', '', '', '170', '185', '', NULL, '100', 0, 0, NULL),
(881, 37, 30, 'Gowa kola', '', '', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(882, 46, 30, 'piyumali mixture 20Rs', '', '', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(884, 48, 30, 'Cherish Peeps 240g', '', '4792102007266', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(885, 37, 42, 'Del gedi', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(886, 12, 30, 'Naran guli', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(887, 37, 30, 'Rata Puwak', '', '', '50', '2019-05-09', '1', '', '', '7', '7', '', NULL, '100', 0, 0, NULL),
(888, 13, 19, 'Ice Orange 1L', '', '4796012780516', '50', '2019-05-09', '1', '', '', '120', '150', '', NULL, '100', 0, 0, NULL),
(889, 13, 19, 'Ice Cream soda 1L', '', '4796012780578', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(890, 14, 30, 'pensil ', '', '', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(891, 16, 30, 'Gum ', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(892, 48, 30, 'Milk Wafers 90g', '', '4790014650181', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(893, 24, 30, 'Munchee Super Cream Cracker 230g', '', '8888101430399', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(894, 40, 30, 'delmo sausages 450g', '', '4796008990424', '50', '2019-05-09', '1', '', '', '250', '290', '', NULL, '100', 0, 0, NULL),
(895, 40, 15, 'Delmo Chicken ', '', '480', '50', '2019-05-09', '1', '', '', '400', '480', '', NULL, '100', 0, 0, NULL),
(896, 9, 30, 'Rashika Lambo - 50 35g', '', '4796001221181', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(897, 42, 30, 'Rasanima Sweet Bread 220g', '', '', '50', '2019-05-09', '1', '', '', '60', '65', '', NULL, '100', 0, 0, NULL),
(898, 50, 30, 'Magic Choc Vanilla Ice ream 75ml', '', '4792085000063', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(899, 50, 30, 'Magic Orange Cool 65ml', '', '4792085013018', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(900, 12, 30, 'Hunupakert', '', '', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(901, 12, 15, 'Halpiti Luse', '', '', '50', '2019-09-20', '1', '', '', '110', '140', '', NULL, '100', 0, 0, NULL),
(902, 12, 15, 'Lanka ala', '', '', '50', '2019-05-01', '1', '', '', '120', '170', '', NULL, '100', 0, 0, NULL),
(903, 37, 15, 'Bathala', '', '', '50', '2019-05-09', '1', '', '', '60', '90', '', NULL, '100', 0, 0, NULL),
(904, 12, 30, 'Mop Brush XL', '', '', '50', '2019-05-09', '1', '', '', '250', '300', '', NULL, '100', 0, 0, NULL),
(905, 12, 30, 'Mop Brush L', '', '', '50', '2019-05-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(906, 12, 30, 'Toilet Brush', '', '', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(907, 12, 30, 'Idal', '', '', '50', '2019-05-09', '1', '', '', '120', '160', '', NULL, '100', 0, 0, NULL),
(908, 37, 17, 'Veehena Nadu Rice 5Kg ', '', '4793000173008', '50', '2019-05-09', '1', '', '', '460', '490', '', NULL, '100', 0, 0, NULL),
(909, 12, 14, 'Keeramin Karawala', '', '', '50', '2019-05-09', '1', '', '', '650', '1000', '', NULL, '100', 0, 0, NULL),
(910, 8, 30, 'Wijaya Coffee 10g', '', '4792173680450', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(911, 24, 30, 'Munchee Crunchee Carols 100g', '', '8888101276201', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(912, 24, 30, 'Munchee Chocolate Carols 100g', '', '8888101620202', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(913, 12, 20, 'Prima Instant Noodles 345g', '', '4792018233513', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(914, 29, 30, 'Airtel 59Rs', '', '', '50', '2019-05-09', '1', '', '', '50', '59', '', NULL, '100', 0, 0, NULL),
(915, 16, 30, 'blayd 10RS', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(916, 16, 30, 'Bic Blayd ', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(917, 12, 15, 'Noodles Luse', '', '', '50', '2019-09-09', '1', '', '', '144', '200', '', NULL, '100', 0, 0, NULL),
(918, 51, 30, 'Island Orange Drink 195ml', '', '', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(919, 23, 30, 'maya Yeast 12g', '', '4796013190161', '50', '2019-05-09', '1', '', '', '30', '40', '', NULL, '100', 0, 0, NULL),
(920, 48, 30, 'Cherish Black & White Cream Biscuits 330g', '', '4792102007662', '50', '2019-05-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(921, 48, 30, 'Cherish Lemon Cream Biscuits 330g', '', '4790014650037', '50', '2019-05-09', '1', '', '', '140', '150', '', NULL, '100', 0, 0, NULL),
(922, 1, 2, 'Diva Jasmine & Lime Detergent powder 1KG + 200g', '', '4791111191409', '50', '2019-09-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(923, 1, 2, 'Diva Rose& Lime Detergent powder 1KG + 200g', '', '4791111191393', '50', '2019-09-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(924, 1, 1, 'Velvet Double pak', '', '4791111191171', '50', '2019-05-09', '1', '', '', '110', '120', '', NULL, '100', 0, 0, NULL),
(925, 1, 1, 'Velvet Double pak', '', '4791111191195', '50', '2019-05-09', '1', '', '', '110', '120', '', NULL, '100', 0, 0, NULL),
(926, 1, 1, 'Baby Cheramy Baby Laundry Wash Powder 400g', '', '4791111105062', '50', '2019-09-09', '1', '', '', '245', '255', '', NULL, '100', 0, 0, NULL),
(927, 1, 2, 'Baby Cheramy Baby Laundry Wash Powder 1Kg', '', '4791111105505', '50', '2019-05-09', '1', '', '', '525', '555', '', NULL, '100', 0, 0, NULL),
(928, 20, 30, 'Samaposha Milky 200g', '', '4792109000710', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(929, 20, 30, 'Samaposha Choxy 180g', '', '4792109000772', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(930, 1, 30, 'Patis', '', '', '50', '2019-09-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(931, 1, 30, 'Doughnut', '', '', '50', '2019-09-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(932, 26, 30, 'Maliban Krissco Biscuits 30g', '', '4791034015219', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(933, 26, 30, 'Maliban Cheesebits Biscuits 30g', '', '4791034070041', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(934, 26, 30, 'Maliban Gift Biscuit 400g', '', '4791034070669', '50', '2019-05-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(935, 35, 30, 'Elephant House EGB 1.5L', '', '4791066003048', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(936, 37, 15, 'Dabala', '', '', '50', '2019-05-09', '1', '', '', '120', '120', '', NULL, '100', 0, 0, NULL),
(937, 16, 30, 'Flashlight Keytag', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(938, 2, 30, 'Know Ummalakada Powder 8g', '', '4796005658044', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(939, 4, 30, 'Nespray Everyday 75g', '', '4792024014496', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(940, 4, 30, 'Nestomalt 400g', '', '4792024015240', '50', '2019-05-09', '1', '', '', '320', '350', '', NULL, '100', 0, 0, NULL),
(941, 37, 17, 'kamatha Samba Rice 5Kg', '', '', '50', '2019-05-09', '1', '', '', '460', '525', '', NULL, '100', 0, 0, NULL),
(942, 37, 15, 'Kohila Ala', '', '', '50', '2019-05-09', '1', '', '', '50', '80', '', NULL, '100', 0, 0, NULL),
(943, 16, 30, 'Kapuru Pethi', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(944, 12, 30, 'Airtel 98', '', '', '50', '2019-05-09', '1', '', '', '90', '98', '', NULL, '100', 0, 0, NULL),
(945, 1, 1, 'PVC Tape ', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(946, 52, 30, 'Readlion Chocolate Cream Bun 55g', '', '4790013059305', '50', '2019-10-03', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(947, 12, 15, 'Thalapath Karawala', '', '', '50', '2019-05-09', '1', '', '', '780', '1000', '', NULL, '100', 0, 0, NULL),
(948, 23, 30, 'Maya Soy Sauce 325ml', '', '4796013190086', '50', '2019-05-09', '1', '', '', '100', '115', '', NULL, '100', 0, 0, NULL),
(949, 53, 30, 'Golden Cow Original Baby Rusks 70g', '', '4792232023259', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(950, 53, 30, 'Golden Cow Apple Baby Rusks 70g', '', '4792232024256', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(951, 53, 30, 'Little Lion Chocolate Roll 200g', '', '4792232017142', '50', '2019-05-09', '1', '', '', '220', '250', '', NULL, '100', 0, 0, NULL),
(952, 53, 30, 'Little Lion Choco Cookies 180g', '', '4792232024072', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(953, 53, 30, 'Little Lion Batter Carol 95g', '', '4792232001011', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(954, 53, 30, 'Little Lion Vita Cookies 115g', '', '4792232047279', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(955, 53, 30, 'Little Lion Lincoin Biscuit 330g', '', '4792232022085', '50', '2019-05-09', '1', '', '', '100', '130', '', NULL, '100', 0, 0, NULL),
(956, 53, 30, 'Little Lion Batter Carol 270g', '', '4792232001158', '50', '2019-05-09', '1', '', '', '100', '140', '', NULL, '100', 0, 0, NULL),
(957, 16, 30, 'Atlas Super Glu 3g', '', '4792210102914', '50', '2019-05-09', '1', '', '', '35', '45', '', NULL, '100', 0, 0, NULL),
(958, 16, 30, 'Aer Pocket 10g', '', '8901023016004', '50', '2019-05-09', '1', '', '', '125', '150', '', NULL, '100', 0, 0, NULL),
(959, 16, 30, 'Aer Pocket Bright 10g', '', '8901023014505', '50', '0000-00-00', '1', '', '', '125', '250', '', NULL, '100', 0, 0, NULL),
(960, 37, 30, 'Kohila miti', '', '', '50', '2019-05-09', '1', '', '', '20', '40', '', NULL, '100', 0, 0, NULL),
(961, 37, 15, 'Sini Kesel', '', '', '50', '2019-05-09', '1', '', '', '70', '100', '', NULL, '100', 0, 0, NULL),
(962, 14, 30, 'Atlas 40page =', '', '4792210100156', '50', '2019-05-09', '1', '', '', '25', '28', '', NULL, '100', 0, 0, NULL),
(963, 26, 30, 'Maliban Cream Cracker 190g', '', '4791034042116', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(964, 26, 30, 'Maliban Cream Cracker 125g', '', '4791034042611', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(965, 43, 30, 'Rathna pethi pan 350g', '', '', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(966, 37, 15, 'naimiris', '', '', '50', '2019-05-09', '1', '', '', '500', '1000', '', NULL, '100', 0, 0, NULL),
(967, 37, 15, 'Amban kesel', '', '', '50', '2019-05-09', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(968, 24, 30, 'Munchee Komme Cheese 50g', '', '4792192805001', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(969, 16, 30, 'Nivaran 90', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(970, 37, 15, 'Papol', '', '', '50', '2019-05-09', '1', '', '', '50', '80', '', NULL, '100', 0, 0, NULL),
(971, 37, 15, 'Watakulu ', '', '', '50', '2019-05-09', '1', '', '', '80', '160', '', NULL, '100', 0, 0, NULL),
(972, 37, 15, 'Elabatu', '', '', '50', '2019-05-09', '1', '', '', '120', '180', '', NULL, '100', 0, 0, NULL),
(973, 24, 30, 'Munchee Komme Salt & Pepper 50g', '', '4792192845212', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(974, 16, 30, 'Link Freedom pen blue 10Rs', '', '8029170960015', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(975, 38, 33, 'Surgical Sprit', '', '', '50', '2019-05-09', '1', '', '', '65', '75', '', NULL, '100', 0, 0, NULL),
(976, 37, 15, 'Makaral', '', '', '50', '2019-05-09', '1', '', '', '130', '200', '', NULL, '100', 0, 0, NULL),
(977, 44, 30, 'Sarasa T bun ', '', '', '50', '2019-05-09', '1', '', '', '30', '35', '', NULL, '100', 0, 0, NULL),
(978, 12, 30, 'Plastic Kosu XL', '', '', '50', '2019-05-09', '1', '', '', '185', '300', '', NULL, '100', 0, 0, NULL),
(979, 37, 15, 'Galanamalu kesel', '', '', '50', '2019-05-09', '1', '', '', '100', '160', '', NULL, '100', 0, 0, NULL),
(980, 47, 30, 'Strawberry Puff 200g', '', '4792069002113', '50', '2019-05-09', '1', '', '', '85', '100', '', NULL, '100', 0, 0, NULL),
(981, 12, 30, 'ENO Orange 5g', '', '4792099010638', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(982, 7, 30, 'Supirivicky 110g', '', '4792172005643', '50', '2019-05-09', '1', '', '', '110', '120', '', NULL, '100', 0, 0, NULL),
(983, 24, 30, 'Munchee Salsa Biscuits 30g', '', '8888101625269', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(984, 2, 30, 'RIN Detergent Powder 1Kg', '', '4796005651588', '50', '2019-05-09', '1', '', '', '189', '199', '', NULL, '100', 0, 0, NULL),
(985, 2, 30, 'Lever Ayush 40g', '', '4792081004072', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(986, 12, 30, 'Ariya Milk 400g', '', '4796011580285', '50', '2019-10-25', '1', '', '', '355', '380', '', NULL, '100', 0, 0, NULL),
(987, 12, 30, 'Spuri Mackerel 155g', '', '6957534521249', '50', '2019-10-25', '1', '', '', '90', '120', '', NULL, '100', 0, 0, NULL),
(988, 11, 30, 'Puwak', '', '', '50', '2019-10-25', '1', '', '', '2', '3', '', NULL, '100', 0, 0, NULL),
(989, 24, 30, 'Munchee Kome Cheese Chilli 100g', '', '4792192805018', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(990, 54, 30, 'V & C Asamodagam 385ml', '', '4794444013608', '50', '2019-05-09', '1', '', '', '50', '90', '', NULL, '100', 0, 0, NULL),
(991, 12, 30, 'Magic Fruit & Nut 1L', '', '4792085000216', '50', '2019-05-09', '1', '', '', '350', '370', '', NULL, '100', 0, 0, NULL),
(992, 12, 30, 'Magic Fruit & Nut 500ML', '', '4792085000759', '50', '2019-05-09', '1', '', '', '150', '240', '', NULL, '100', 0, 0, NULL),
(993, 40, 30, 'Delmo Chicken Easy pack 700g', '', '4796008990028', '50', '2019-05-09', '1', '', '', '350', '400', '', NULL, '100', 0, 0, NULL),
(994, 12, 15, 'Roti Piti', '', '', '50', '2019-05-09', '1', '', '', '82', '100', '', NULL, '100', 0, 0, NULL),
(995, 37, 17, 'Nelum Broken 5Kg', '', '', '50', '2019-05-09', '1', '', '', '430', '475', '', NULL, '100', 0, 0, NULL),
(996, 37, 15, 'Athu gowa', '', '', '50', '2019-05-09', '1', '', '', '100', '140', '', NULL, '100', 0, 0, NULL),
(997, 37, 15, 'Dehi', '', '', '50', '2019-05-09', '1', '', '', '250', '100', '', NULL, '100', 0, 0, NULL),
(998, 43, 30, 'Rathna Ganakatha ', '', '', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(999, 14, 30, 'Atlas Whitex 12ml', '', '4792210130979', '50', '2019-05-09', '1', '', '', '80', '85', '', NULL, '100', 0, 0, NULL),
(1000, 20, 30, 'Lanka Soy Ala kariya 55g', '', '4796002027003', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(1001, 20, 30, 'Lanka Soy Miris Malu  55g', '', '4796002017004', '50', '2019-05-09', '1', '', '', '45', '55', '', NULL, '100', 0, 0, NULL),
(1002, 15, 30, 'Maxmo Super Glue 3g', '', '4797549111538', '50', '2019-05-09', '1', '', '', '35', '50', '', NULL, '100', 0, 0, NULL),
(1003, 37, 15, 'Mannokka', '', '', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1004, 25, 30, 'Rasoda Real Doubal Ice Cream 500Ml', '', '4796022710329', '50', '0000-00-00', '1', '', '', '140', '160', '', NULL, '100', 0, 0, NULL),
(1005, 49, 30, 'Suwa-Rasam Drink 4g', '', '4796012130328', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(1006, 27, 30, 'GO-Nuts 7g', '', '4792192556019', '50', '2019-05-06', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1007, 27, 30, 'Ritsbury Chocolate Fingers 27g', '', '4792192526265', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(1008, 27, 30, 'Ritsbury Chocolate Fingers 18g', '', '4792192526005', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(1009, 27, 30, 'Ritsbury Chocolate Fingers 80g', '', '4792192526227', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(1010, 27, 30, 'Ritsbury Bubbles 30g', '', '4792192564007', '50', '2019-01-05', '1', '', '', '25', '35', '', NULL, '100', 0, 0, NULL),
(1011, 27, 30, 'Ritsbury Choco-Mo 40g', '', '4792192473200', '50', '2019-05-09', '1', '', '', '40', '60', '', NULL, '100', 0, 0, NULL),
(1012, 27, 30, 'Ritsbury Tropica 26g', '', '4792192934008', '50', '2019-05-09', '1', '', '', '25', '30', '', NULL, '100', 0, 0, NULL),
(1013, 27, 30, 'Choco - La 30g', '', '4792192437042', '50', '2019-05-09', '1', '', '', '20', '30', '', NULL, '100', 0, 0, NULL),
(1014, 27, 30, 'Tiara O-Kay Vanilla 15g', '', '4792192000017', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(1015, 27, 30, 'Ritsbury Pebbles 25g', '', '8888101360238', '50', '2019-05-09', '1', '', '', '25', '35', '', NULL, '100', 0, 0, NULL),
(1016, 51, 30, 'Island Jelly Yoghurt 80g', '', '4790014350012', '50', '2019-05-09', '1', '', '', '27', '35', '', NULL, '100', 0, 0, NULL),
(1017, 32, 30, 'MD-Strawberry Flavoured 100g', '', '4792098022014', '50', '0000-00-00', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1018, 53, 30, 'Little Lion Milky Cookies 200g', '', '4792232002070', '50', '2019-05-09', '1', '', '', '120', '140', '', NULL, '100', 0, 0, NULL),
(1019, 53, 30, 'Little Lion Ginger Cookies 175g', '', '4792232033142', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(1020, 13, 30, 'Mirage Ice LIMADE 750ml', '', '4796012780882', '50', '2019-05-09', '1', '', '', '120', '130', '', NULL, '100', 0, 0, NULL),
(1021, 12, 30, 'Magic Orange Cool 45ml ', '', '4792085001787', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1022, 37, 15, 'Pathola', '', '', '50', '2019-05-09', '1', '', '', '120', '180', '', NULL, '100', 0, 0, NULL),
(1023, 37, 15, 'Naimiris', '', '', '50', '2019-05-09', '1', '', '', '750', '1200', '', NULL, '100', 0, 0, NULL),
(1024, 12, 15, 'Bala karawala', '', '', '50', '2019-05-09', '1', '', '', '550', '850', '', NULL, '100', 0, 0, NULL),
(1025, 12, 30, 'CR Book 120 =', '', '4792066003144', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(1026, 12, 30, 'CR Book 80=', '', '4792066003120', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(1027, 12, 30, 'CR Book 40 =', '', '4792066003106', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1028, 3, 30, 'Nature,s Secrets Lotus 100ml', '', '4792054001060', '50', '2019-05-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(1029, 50, 30, 'Magic Vanilla Ice Cream 1L', '', '4792085000155', '50', '2019-05-09', '1', '', '', '240', '290', '', NULL, '100', 0, 0, NULL),
(1030, 48, 30, 'Cherish Wafers Choco 90g', '', '4792102010020', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1031, 48, 30, 'Cherish Vanilla Peeps 240g', '', '4792102007259', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1032, 48, 30, 'Cherish Lemon Cream Wafers 225g', '', '4792102007136', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(1033, 48, 30, 'Cherish Milk Shorties 300g', '', '4792102006054', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1034, 48, 30, 'Cherish Chocolate Creams 200g', '', '4792102007624', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1035, 11, 30, 'Date Crown Khalas 250g', '', '6291100197149', '50', '2019-05-09', '1', '', '', '120', '195', '', NULL, '100', 0, 0, NULL),
(1036, 28, 30, 'Uswatte Cha Cha Snack 30g', '', '4792135020485', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1037, 28, 30, 'Uswatte Jigle Wigle Snack 30g', '', '4792135020386', '50', '2019-05-09', '1', '', '', '35', '50', '', NULL, '100', 0, 0, NULL),
(1038, 2, 30, 'Lifebuoy Total 10 100g X 2', '100', '4792081002016', '50', '2019-05-09', '1', '', '', '89', '90', '', NULL, '100', 0, 0, NULL),
(1039, 2, 30, 'Lifebuoy Kohomba  100g X 2', '', '47920810108206', '50', '2019-05-09', '1', '', '', '89', '99', '', NULL, '100', 0, 0, NULL),
(1040, 2, 30, 'Pears Herbal baby Soap 100g', '', '4792081002894', '50', '2019-05-09', '1', '', '', '65', '70', '', NULL, '100', 0, 0, NULL),
(1041, 2, 30, 'Ayush Anti Cavity Toothpaste 120g', '', '4792081004065', '50', '2019-05-09', '1', '', '', '135', '165', '', NULL, '100', 0, 0, NULL),
(1042, 2, 30, 'Pears Bedtime Baby Cream 50ml', '', '4792081007691', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(1043, 2, 30, 'Pears pure & Gentle Baby Cologune 50ml', '', '4792081001972', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1044, 2, 30, 'Pears Active Floral Baby Cologne 50ml', '', '4792081002153', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1045, 2, 30, 'Wonderlight Lime 115g X 2 ', '', '4792081011087', '50', '2019-02-05', '1', '', '', '64', '74', '', NULL, '100', 0, 0, NULL),
(1046, 2, 30, 'Vaseline Aloe Soothe 100ml', '', '4792081008582', '50', '2019-05-09', '1', '', '', '190', '205', '', NULL, '100', 0, 0, NULL),
(1047, 2, 2, 'Sunlight 2 In 1 Detergent powder 550g', '', '4796005660092', '50', '2019-05-08', '1', '', '', '89', '99', '', NULL, '100', 0, 0, NULL),
(1048, 12, 30, 'Brown Suger 250g paket', '', '935226816', '50', '2019-05-09', '1', '', '', '30', '35', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393335323236383136267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1049, 12, 30, 'Brown Suger 1Kg paket', '', '936119208', '50', '2019-05-09', '1', '', '', '130', '140', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393336313139323038267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1050, 12, 30, 'Brown Suger 500g paket', '', '937011600', '50', '2019-05-09', '1', '', '', '65', '70', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393337303131363030267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1051, 12, 30, 'Parippu No 1 1Kg pakert', '', '937903992', '50', '2019-05-09', '1', '', '', '160', '170', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393337393033393932267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1052, 12, 30, 'Parippu No 1 250g', '', '938796384', '50', '2019-05-09', '1', '', '', '45', '50', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393338373936333834267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1053, 12, 30, 'Parippu No 1 500g pakert', '', '939688776', '50', '2019-05-09', '1', '', '', '90', '100', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393339363838373736267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1054, 12, 30, 'Parippu No 2 1Kg pakert', '', '940581168', '50', '2019-05-09', '1', '', '', '160', '170', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393430353831313638267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1055, 12, 30, 'Parippu No 2 250g pakert', '', '941473560', '50', '2019-05-09', '1', '', '', '40', '45', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393431343733353630267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1056, 12, 30, 'Parippu No 2 500g pakert', '', '942365952', '50', '2019-05-09', '1', '', '', '80', '90', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393432333635393532267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1057, 12, 30, 'Tea No1 .50g pakert', '', '943258344', '50', '2019-05-09', '1', '', '', '45', '55', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393433323538333434267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1058, 12, 30, 'Tea No1 .100g pakert', '', '944150736', '50', '2019-05-09', '1', '', '', '100', '110', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393434313530373336267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1059, 12, 30, 'Tea No1 .250g pakert', '', '945043128', '50', '2019-05-09', '1', '', '', '265', '275', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393435303433313238267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1060, 12, 30, 'Watana parippu No 1 1Kg pakert', '', '945935520', '50', '2019-05-09', '1', '', '', '180', '190', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393435393335353230267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1061, 12, 30, 'Watana parippu No 1 250g pakert', '', '946827912', '50', '2019-05-09', '1', '', '', '45', '50', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393436383237393132267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1062, 12, 30, 'Watana parippu No 1 500g pakert', '', '947720304', '50', '2019-05-09', '1', '', '', '90', '95', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d353026746578743d393437373230333034267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1063, 12, 30, 'Rulan kali', '', '', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(1064, 26, 30, 'Maliban Snackers Tomato 25g', '', '4791034072311', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(1065, 26, 30, 'Maliban Snackers Chillie 25g', '', '4791034072304', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(1066, 26, 30, 'Maliban Coffee Cookie 90g', '', '4791034072274', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1067, 4, 30, 'Nestomalt 400g ', '', '4792024005906', '50', '2019-05-09', '1', '', '', '320', '340', '', NULL, '100', 0, 0, NULL),
(1068, 4, 30, 'Maggi Family Pack 335g', '', '4792024015745', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1069, 4, 30, 'Maggi Daiya Noodles 74g', '', '4792024015721', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1070, 4, 30, 'Maggi Chicken Noodles 74g', '', '4792024015646', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1071, 9, 30, 'Amuthu Bites 20g', '', '4796001221471', '50', '2019-05-09', '1', '', '', '26', '30', '', NULL, '100', 0, 0, NULL),
(1072, 2, 30, 'Rin Lemon & Rose 500G', '', '4796005651595', '50', '2019-05-09', '1', '', '', '100', '115', '', NULL, '100', 0, 0, NULL),
(1073, 17, 30, 'Ilukgoda Suwadapaha 3g', '', '', '50', '2019-05-09', '1', '', '', '18', '25', '', NULL, '100', 0, 0, NULL),
(1074, 18, 30, 'Pampers M 7-12 Kg', '', '4902430814614', '50', '2019-05-09', '1', '', '', '220', '240', '', NULL, '100', 0, 0, NULL),
(1075, 6, 30, 'Dettol Original Soap 70g', '', '4792037313241', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1076, 6, 30, 'Dettol Cool Soap 70g', '', '4792037313258', '50', '0000-00-00', '1', '', '', '55', '62', '', NULL, '100', 0, 0, NULL),
(1077, 6, 30, 'Air Wick Gel Peach & Jasmine ', '', '6009695933741', '50', '2019-05-09', '1', '', '', '145', '155', '', NULL, '100', 0, 0, NULL),
(1078, 6, 30, 'Dettol Skincare Hand Wash 200ml', '', '8901396323006', '50', '2019-05-09', '1', '', '', '250', '275', '', NULL, '100', 0, 0, NULL),
(1079, 6, 30, 'Dettol Sensitive Hand Wash 200ml', '', '8901396365006', '50', '2019-05-09', '1', '', '', '250', '275', '', NULL, '100', 0, 0, NULL),
(1080, 6, 30, 'Dettol Original Hand Wash 200ml', '', '8901396311003', '50', '2019-05-09', '1', '', '', '250', '290', '', NULL, '100', 0, 0, NULL),
(1081, 6, 30, 'Mortein Fast Kill 400ml', '', '1789337130671', '50', '2019-05-09', '1', '', '', '480', '510', '', NULL, '100', 0, 0, NULL),
(1082, 6, 30, 'Strepsils Original ', '', '9556108211325', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1083, 27, 30, 'Choco - La 20g', '', '4792192437004', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(1084, 51, 30, 'Island Curd 500ml', '', '4790014350494', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(1085, 51, 30, 'Island Curd 1L', '', '4790014350487', '50', '2019-05-09', '1', '', '', '240', '260', '', NULL, '100', 0, 0, NULL),
(1086, 12, 30, 'Vip Iodized Table Salt 400g', '', '4793000521069', '50', '2019-05-09', '1', '', '', '15', '55', '', NULL, '100', 0, 0, NULL),
(1087, 22, 30, 'Marina Vegetable oil 500ml', '', '4796006420190', '50', '2019-05-09', '1', '', '', '200', '225', '', NULL, '100', 0, 0, NULL),
(1088, 55, 30, 'Imihima Jelly Crystal 80g', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1089, 55, 30, 'Imihima Watalappam 500g', '', '', '50', '2019-05-09', '1', '', '', '250', '280', '', NULL, '100', 0, 0, NULL),
(1090, 55, 30, 'Imihima Watalappam 250g', '', '', '50', '2019-05-09', '1', '', '', '120', '150', '', NULL, '100', 0, 0, NULL),
(1091, 55, 30, 'Imihima Watalappam 80g', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1092, 12, 30, 'Maliban Kiri 250g', 'Maliban Kiri 250g', '4791034250016', '50', '2019-05-09', '1', '', '', '225', '245', '', NULL, '100', 0, 0, NULL),
(1093, 55, 30, 'Maliban Milk Mix 18g', '', '', '50', '2019-05-09', '1', '', '', '10', '15', '', NULL, '100', 0, 0, NULL),
(1094, 6, 30, 'Mortein Fast Kill 400ml', '', '4792037130671', '50', '2019-05-09', '1', '', '', '480', '510', '', NULL, '100', 0, 0, NULL),
(1095, 15, 30, 'Panasonic 9v', '', '8887549053795', '50', '2019-05-09', '1', '', '', '130', '185', '', NULL, '100', 0, 0, NULL),
(1096, 12, 30, 'Kitchen King Brand Mackerel 155g', '', '6509961916312', '50', '2019-05-09', '1', '', '', '90', '120.', '', NULL, '100', 0, 0, NULL),
(1097, 12, 30, 'Catch brand Mackerel 425g', '', '4796002105008', '50', '2019-05-09', '1', '', '', '190', '250', '', NULL, '100', 0, 0, NULL),
(1098, 39, 30, 'Keells Krest Cheese Balls 75g', '', '6591255045099', '50', '2019-05-09', '1', '', '', '88', '100', '', NULL, '100', 0, 0, NULL),
(1099, 39, 30, 'Keells Krest Kochchi Bites  75g', '', '6591255045907', '50', '2019-05-09', '1', '', '', '88', '100', '', NULL, '100', 0, 0, NULL),
(1100, 19, 30, 'Raigam Soya stir Fry 85g', '', '4792149011912', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(1101, 11, 30, 'Musterd Seed 50g', '', '982523592', '50', '2019-05-09', '1', '', '', '20', '25.00', 0x626172636f64652f626172636f64652e7068703f636f6465747970653d436f646533392673697a653d35302670726963653d32352e303026746578743d393832353233353932267072696e743d74727565, NULL, '100', 0, 0, NULL),
(1102, 11, 30, 'Tarun Badapu Mung Piyali 250g', '', '', '50', '2019-05-09', '1', '', '', '100', '115', '', NULL, '100', 0, 0, NULL),
(1103, 26, 30, 'Maliban Hawallan Cookies 100g', '', '4791034057110', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1104, 26, 30, 'Maliban Hawallan Cookies 200g', '', '4791034057011', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(1105, 26, 30, 'Maliban Lemon puff 100g', '', '4791034017114', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1106, 26, 30, 'Maliban Real Bran Cracker 140g', '', '4791034001410', '50', '2019-05-09', '1', '', '', '80', '90', '', NULL, '100', 0, 0, NULL),
(1107, 12, 15, 'Abul kesel', '', '', '50', '2019-02-05', '1', '', '', '60', '80', '', NULL, '100', 0, 0, NULL),
(1108, 12, 3, 'Sudantha 80g', '', '4792022090041', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1109, 12, 3, 'Sudantha 45g', '', '4792022090058', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(1110, 12, 42, 'Karavila ', '', '', '50', '2019-05-09', '1', '', '', '200', '200', '', NULL, '100', 0, 0, NULL),
(1111, 50, 30, 'Magic Choc Chocolate Ice Cream 75ml', '', '4792085001589', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1112, 50, 30, 'Magic Dairy Ice Cream Strawberry 1L', '', '4792085000285', '50', '2019-05-09', '1', '', '', '320', '360', '', NULL, '100', 0, 0, NULL),
(1113, 50, 30, 'Magic Dairy Ice Cream Vanilla & Chocolate  1L', '', '4792085000292', '50', '2019-05-09', '1', '', '', '300', '340', '', NULL, '100', 0, 0, NULL),
(1114, 50, 30, 'Magic Dairy Ice Cream Mango 1L', '', '4792085000476', '50', '2019-05-09', '1', '', '', '340', '370', '', NULL, '100', 0, 0, NULL),
(1115, 50, 30, 'Magic Troffic Lights 75ml', '', '4792085018051', '50', '2019-05-09', '1', '', '', '15', '20', '', NULL, '100', 0, 0, NULL),
(1116, 12, 30, 'Fuji Tape ', '', '', '50', '2019-05-09', '1', '', '', '38', '60', '', NULL, '100', 0, 0, NULL),
(1117, 26, 30, 'Maliban Chocolate Marie 75g', '', '4791034070294', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(1118, 26, 30, 'Maliban Milk Shortcake 80g', '', '4791034039215', '50', '2019-05-09', '1', '', '', '40', '50.', '', NULL, '100', 0, 0, NULL);
INSERT INTO `products` (`pro_id`, `v_id`, `category_id`, `product_name`, `product_description`, `barcode`, `quantity`, `online_date`, `product_method`, `discount`, `image`, `dealer_price`, `unit_price`, `bar_img`, `exp_date`, `f_qty`, `dep_id`, `lower_price_limit`, `rack_no`) VALUES
(1119, 26, 30, 'Maliban Chocolate Puff Biscuit 100g', '', '4791034070270', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1120, 26, 30, 'Maliban GEM Biscuit 100g', '', '4791034026017', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1121, 26, 30, 'Maliban Smart Cream Cracker 500g', '', '4791034042215', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(1122, 55, 30, 'Imihima Pineapple Pudding 80g', '', '', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1123, 48, 30, 'Cherish Nice Biscuits 100g', '', '4792102009031', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1124, 48, 30, 'Cherish Cream Cracker 125g', '', '4792102007181', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1125, 48, 30, 'Cherish Duplex Biscuits 400g', '', '4792102007372', '50', '2019-05-09', '1', '', '', '180', '200', '', NULL, '100', 0, 0, NULL),
(1126, 48, 30, 'Cherish Break Wafer Choco 6g', '', '4792102007532', '50', '2019-05-09', '1', '', '', '4', '5', '', NULL, '100', 0, 0, NULL),
(1127, 12, 15, 'Gambiris Kudu ', '', 'LUSE', '50', '2019-05-09', '1', '', '', '70', '1400', '', NULL, '100', 0, 0, NULL),
(1128, 12, 30, 'Sigithi Soap 75g', '', '4791025151049', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1129, 12, 30, 'Sikuru Saup ', '', '4791025160003', '50', '2019-05-09', '1', '', '', '40', '48', '', NULL, '100', 0, 0, NULL),
(1130, 12, 30, 'Crystal Saup 75g', '', '4791025151025', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1131, 12, 30, 'Amritha Incense Sticks Sepalika', '', '4791010500081', '50', '2019-05-09', '1', '', '', '75', '85', '', NULL, '100', 0, 0, NULL),
(1132, 12, 30, 'Premier Jack Mackerel 425g', '', '4796002100171', '50', '2019-05-09', '1', '', '', '280', '300', '', NULL, '100', 0, 0, NULL),
(1133, 26, 30, 'Maliban Smart Cream Cracker 85g', '', '4791034070812', '50', '2019-05-09', '1', '', '', '35', '40', '', NULL, '100', 0, 0, NULL),
(1134, 12, 30, 'khomba soap100g', '', '4792068131135', '50', '2019-05-09', '1', '', '', '55', '62', '', NULL, '100', 0, 0, NULL),
(1135, 12, 30, 'Rasa Maalu Mackerel 425g', '', '6955505995433', '50', '2019-05-09', '1', '', '', '200', '250', '', NULL, '100', 0, 0, NULL),
(1136, 12, 30, 'Neema Salt 1kg', '', '', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(1137, 12, 30, 'Crown Wafers 18g', '', '4796001180983', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1138, 12, 30, 'Crown Chocolate Wafers 18g', '', '4796001180969', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1139, 12, 30, 'Abha Herbal Black Henna', '', '4796022660440', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1140, 8, 30, 'Wijaya Sago 100g', '', '4792173080045', '50', '2019-05-09', '1', '', '', '40', '45', '', NULL, '100', 0, 0, NULL),
(1141, 7, 30, 'Sarwavishadi Oil', '', '4792172001621', '50', '2019-05-09', '1', '', '', '100', '120', '', NULL, '100', 0, 0, NULL),
(1142, 37, 14, 'Rabu', '', '', '50', '2019-05-09', '1', '', '', '100', '140', '', NULL, '100', 0, 0, NULL),
(1143, 56, 30, 'Ps Products Gem Biscuits 90g', '', '', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1144, 26, 30, 'Maliban Milk Shortcake 200g', '', '4791034070874', '50', '2019-05-09', '1', '', '', '90', '100', '', NULL, '100', 0, 0, NULL),
(1145, 26, 30, 'Maliban Lemon Puff 200g', '', '4791034017015', '50', '2019-05-09', '1', '', '', '100', '110', '', NULL, '100', 0, 0, NULL),
(1146, 26, 30, 'Maliban Spicy Crackers 85g', '', '4791034060011', '50', '2019-05-09', '1', '', '', '50', '60', '', NULL, '100', 0, 0, NULL),
(1147, 37, 42, 'Lunu kola', '', '', '50', '2019-05-09', '1', '', '', '310', '380', '', NULL, '100', 0, 0, NULL),
(1148, 12, 30, 'Bombeli karawala', '', '', '50', '2019-05-09', '1', '', '', '1000', '1200', '', NULL, '100', 0, 0, NULL),
(1149, 2, 1, 'Pears Baby Bedtime 100g X 4', '', '4792081010073', '50', '2019-05-09', '1', '', '', '220', '265', '', NULL, '100', 0, 0, NULL),
(1150, 2, 1, 'Clear Ice Cool Shampoo 80ml', '', '4792081008629', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1151, 2, 1, 'Clear Complete Soft Care Shampoo 80ml', '', '4792081008612', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1152, 2, 1, 'Pears baby Talc 90g', '', '4792081003693', '50', '2019-05-09', '1', '', '', '80', '100', '', NULL, '100', 0, 0, NULL),
(1153, 2, 1, 'Closeup 120g', '', '4792081001118', '50', '2019-05-09', '1', '', '', '150', '165', '', NULL, '100', 0, 0, NULL),
(1154, 2, 1, 'Sunlight 2in1 Sakura Detergent powder 60g', '', '4796005659911', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1155, 57, 1, 'Cool Queens Alov Vera Drink 200ml', '', '4793000091999', '50', '2019-05-09', '1', '', '', '70', '80', '', NULL, '100', 0, 0, NULL),
(1156, 12, 1, 'Clorix 250ml', '', '4793000456286', '50', '0000-00-00', '1', '', '', '83', '120', '', NULL, '100', 0, 0, NULL),
(1157, 20, 1, 'Sera Coconut Milk 180ml', '', '4796002514008', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1158, 12, 30, 'Sudulunu suap 3g', '', '', '50', '2019-05-09', '1', '', '', '22.5', '30', '', NULL, '100', 0, 0, NULL),
(1159, 37, 17, 'Milan Nadu 5Kg', '', '', '50', '2019-05-09', '1', '', '', '475', '490', '', NULL, '100', 0, 0, NULL),
(1160, 2, 30, 'Comfort Rose 220ml', '', '4796005663499', '50', '2019-05-09', '1', '', '', '200', '230', '', NULL, '100', 0, 0, NULL),
(1161, 19, 30, 'Gango orange Flavoured 20g', '', '4792149010007', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(1162, 19, 30, 'Gango Mix Fruit Drink 20g', '', '4792149032023', '50', '2019-05-09', '1', '', '', '20', '25', '', NULL, '100', 0, 0, NULL),
(1163, 37, 42, 'Nokol', '', '', '50', '2019-05-09', '1', '', '', '160', '200', '', NULL, '100', 0, 0, NULL),
(1164, 12, 15, 'keeri samba', '', '', '50', '2019-05-09', '1', '', '', '125', '140', '', NULL, '100', 0, 0, NULL),
(1165, 53, 30, 'Little Lion Date Cake 375g', '', '4792232010105', '50', '2019-05-09', '1', '', '', '250', '290', '', NULL, '100', 0, 0, NULL),
(1166, 9, 30, 'Rashika Double koththu 440g ', '', '4796001221624', '50', '2019-05-09', '1', '', '', '190', '220', '', NULL, '100', 0, 0, NULL),
(1167, 1, 1, 'Shield Original soap 100g', '', '4791111152011', '50', '2019-05-09', '1', '', '', '48', '53', '', NULL, '100', 0, 0, NULL),
(1168, 1, 1, 'Velvet Silky Softness 100g', '', '4791111153018', '50', '2019-05-09', '1', '', '', '55', '65', '', NULL, '100', 0, 0, NULL),
(1169, 1, 30, 'Baby Cheramy Baby Coiogne Fresh Floral 100ml', '', '4791111143026', '50', '2019-05-09', '1', '', '', '245', '265', '', NULL, '100', 0, 0, NULL),
(1170, 1, 30, 'Clogard Cinnamon+Propolis Gel40g', '', '4791111149059', '50', '2019-05-09', '1', '', '', '60', '70', '', NULL, '100', 0, 0, NULL),
(1171, 1, 30, 'Diva Fresh Lavender & Lime 65g', '', '4791111180137', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1172, 1, 30, 'Baby Cheramy Herbal Baby Cream 50ml', '', '4791111100951', '50', '2019-05-09', '1', '', '', '83', '93', '', NULL, '100', 0, 0, NULL),
(1173, 1, 30, 'Kumarika Shampoo Doboul pak', '', '', '50', '2019-05-09', '1', '', '', '8', '10', '', NULL, '100', 0, 0, NULL),
(1174, 1, 30, 'Diva Fresh Lavender & Lime 1Kg', '', '4791111180120', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1175, 50, 30, 'Magic Dairy Ice Cream Vanilla 500ml', '', '4792085000667', '50', '2019-05-09', '1', '', '', '130', '150', '', NULL, '100', 0, 0, NULL),
(1176, 26, 30, 'Maliban Family Collection Biscuit 250g', '', '4791034070935', '50', '2019-05-09', '1', '', '', '150', '170', '', NULL, '100', 0, 0, NULL),
(1177, 12, 30, 'Hiru Suwada dupaya 50g', '', '', '50', '2019-05-09', '1', '', '', '60', '75', '', NULL, '100', 0, 0, NULL),
(1178, 58, 30, 'Richi Drinking Yoghurt Strawberry 180ml', '', '4793000530030', '50', '2019-05-09', '1', '', '', '55', '70', '', NULL, '100', 0, 0, NULL),
(1179, 58, 30, 'Richi Drinking Yoghurt Vanilla 180ml', '', '4793000530009', '50', '2019-05-09', '1', '', '', '55', '70', '', NULL, '100', 0, 0, NULL),
(1180, 27, 30, 'Ritsbury Dou Strawberry 20g', '', '4792192531009', '50', '2019-05-09', '1', '', '', '18', '20', '', NULL, '100', 0, 0, NULL),
(1181, 11, 30, 'Nikado Rasam Cream100g', '', '4792201014059', '50', '2019-05-09', '1', '', '', '50', '85', '', NULL, '100', 0, 0, NULL),
(1182, 19, 30, 'Raigam Soya Meat Chicken 50g', '', '4792149018027', '50', '2019-05-09', '1', '', '', '23', '30', '', NULL, '100', 0, 0, NULL),
(1183, 2, 30, 'Know double pack ', '', '4796005652943', '50', '2019-05-09', '1', '', '', '35', '42', '', NULL, '100', 0, 0, NULL),
(1184, 2, 30, 'Surf Excel 120g', '', '4796005663987', '50', '2019-05-09', '1', '', '', '45', '50', '', NULL, '100', 0, 0, NULL),
(1185, 2, 30, 'Surf Excel 1Kg', '', '4796005650048', '50', '2019-05-09', '1', '', '', '300', '330', '', NULL, '100', 0, 0, NULL),
(1186, 59, 30, 'lia Apple ', '', '4796007530683', '50', '2019-05-09', '1', '', '', '70', '100', '', NULL, '100', 0, 0, NULL),
(1187, 59, 30, 'Parampara ', '', '4796007530423', '50', '2019-05-09', '1', '', '', '70', '100', '', NULL, '100', 0, 0, NULL),
(1188, 37, 30, 'Nelum Nadu rice 5Kg', '', '', '50', '2019-05-09', '1', '', '', '450', '490', '', NULL, '100', 0, 0, NULL),
(1189, 12, 30, 'Kimcol Super Glue 3g', '', '8542251253665', '50', '2019-05-09', '1', '', '', '40', '50', '', NULL, '100', 0, 0, NULL),
(1190, 12, 30, 'Crown GEM ', '', '4796001180655', '50', '2019-05-09', '1', '', '', '16', '20', '', NULL, '100', 0, 0, NULL),
(1191, 1, 1, 'jhghhgjhghj', '', '465456465', '39', '2020-09-19', '', '0', 'default-pro.png', '40', '50', '', '2020-09-19', '40', 0, 0, NULL),
(1192, 1, 1, 'aaa', '', '101010101', '1', '2020-09-20', '', '0', 'default-pro.png', '40', '50', '', '', '1', 0, 0, NULL),
(1193, 1, 1, 'jhghhgjhghj', '', '7455', '1', '2020-09-20', '', '0', 'default-pro.png', '40', '50', '', '2020-09-24', '1', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promo_id` int(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `v_count` int(30) NOT NULL,
  `value` decimal(13,2) NOT NULL DEFAULT '0.00',
  `valid_from` varchar(12) NOT NULL,
  `valid_to` varchar(12) NOT NULL,
  `o_count` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promo_id`, `code`, `v_count`, `value`, `valid_from`, `valid_to`, `o_count`) VALUES
(1, '123456789', 5, '1500.00', '2020-10-01', '2020-10-03', 0),
(2, '5454645654', 10, '100.00', '2020-10-04', '2020-10-07', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pro_dep`
--

CREATE TABLE `pro_dep` (
  `pd_id` int(255) NOT NULL,
  `pro_id` int(255) NOT NULL DEFAULT '0',
  `dep_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_dep`
--

INSERT INTO `pro_dep` (`pd_id`, `pro_id`, `dep_id`) VALUES
(1, 1191, 1),
(2, 1191, 2),
(3, 1192, 1),
(4, 1192, 2),
(5, 1193, 1),
(6, 1193, 2);

-- --------------------------------------------------------

--
-- Table structure for table `q_control`
--

CREATE TABLE `q_control` (
  `q_id` int(255) NOT NULL,
  `qc_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `dealer_price` varchar(255) DEFAULT NULL,
  `seller_price` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `pro_id` int(255) NOT NULL,
  `exp_date` varchar(30) DEFAULT NULL,
  `lower_price_limit` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_stock`
--

CREATE TABLE `return_stock` (
  `r_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hand_over` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `r_id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`r_id`, `name`, `date`) VALUES
(2, ' Rajaphilla', 1),
(5, ' Thalavinna', 2),
(6, ' Bokkawala', 3),
(7, ' Hadeniya', 4),
(8, ' Abathenna', 5),
(9, ' Yatihalagala', 6),
(10, ' Lewalla', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sales_id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`sales_id`, `invoice`, `date`, `pro_id`, `quantity`, `unit_price`, `total`, `discount`) VALUES
(1, '2030030', '2020-09-26', '1', '1', '85', '85', NULL),
(2, '4230630710', '2020-09-26', '1', '1', '85', '85', NULL),
(3, '40224720', '2020-09-27', '1', '1', '85', '85', NULL),
(4, '039093320', '2020-09-27', '1', '1', '85', '85', NULL),
(5, '94523020', '2020-09-28', '1', '1', '85', '85', NULL),
(6, '94523020', '2020-09-28', '1', '1', '85', '85', NULL),
(7, '33263', '2020-09-28', '1', '1', '85', '85', NULL),
(8, '2250828147', '2020-10-03', '1', '1', '85', '85', NULL),
(9, '8022252', '2020-10-03', '1', '1', '85', '85', NULL),
(10, '32233933378', '2020-10-03', '1', '1', '85', '85', NULL),
(11, '24222525', '2020-10-03', '1', '1', '85', '85', NULL),
(12, '20230693', '2020-10-03', '1', '1', '85', '85', NULL),
(13, '33020237882', '2020-10-03', '1', '1', '85', '85', NULL),
(14, '20323955', '2020-10-04', '1', '1', '85', '85', NULL),
(15, '20323955', '2020-10-04', '1', '1', '85', '85', NULL),
(16, '02093031102', '2020-10-04', '1', '2', '85', '170', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(255) NOT NULL,
  `trans_rate` float NOT NULL DEFAULT '0',
  `bill_rate` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `trans_rate`, `bill_rate`) VALUES
(1, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `temp_dis`
--

CREATE TABLE `temp_dis` (
  `td_id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `dis_amount` float DEFAULT '0',
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data for table `temp_transaction`
--

INSERT INTO `temp_transaction` (`t_id`, `c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`, `total`, `paid_amount`, `balance`, `pay_type`, `cashier`, `dep_id`, `is_tmp`) VALUES
(1, 1, '2020-09-27 12:11:09', '039093320', '85.00', '0', '85', '85', '0.00', 1, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
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
  `is_tmp` int(5) NOT NULL DEFAULT '0',
  `promo_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`, `total`, `paid_amount`, `balance`, `pay_type`, `cashier`, `dep_id`, `is_tmp`, `promo_id`) VALUES
(1, 1, '2020-09-28 07:57:29', '94523020', '170.00', '0', '170', '170', '0.00', 1, 3, 1, 0, 0),
(2, 1, '2020-09-28 12:01:47', '33263', '85.00', '0', '85', '', '-85.00', 1, 3, 1, 0, 0),
(3, 1, '2020-10-03 09:55:57', '2250828147', '85.00', '0.00', '85', '85', '0.00', 1, 3, 0, 0, 0),
(4, 1, '2020-10-03 10:05:09', '8022252', '85.00', '0.00', '85', '85', '0.00', 1, 3, 0, 0, 0),
(5, 1, '2020-10-03 10:05:59', '32233933378', '85.00', '0', '85', '85', '0.00', 1, 3, 1, 0, 0),
(6, 1, '2020-10-03 10:07:24', '24222525', '85.00', '0', '85', '85', '0.00', 1, 3, 1, 0, 0),
(7, 1, '2020-10-03 10:14:42', '20230693', '85.00', '0', '85', '85', '0.00', 1, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` int(5) NOT NULL DEFAULT '0',
  `phone` varchar(12) DEFAULT '-',
  `bio` varchar(255) DEFAULT '-',
  `last_logined` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `user_name` varchar(30) DEFAULT NULL,
  `dep_id` int(255) NOT NULL DEFAULT '0',
  `tax_active` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `phone`, `bio`, `last_logined`, `status`, `user_name`, `dep_id`, `tax_active`) VALUES
(3, 'Admin', 'admin@pos.com', '$2y$10$7s3.TsF4JWn/amB9IfQKL.hKjT3zqhavNdvYa10LH5uEGqxf8epOy', 3, '075899', 'Admin @ Pos', '2020-10-04 10:32 AM', 1, 'admin', 0, 1),
(8, 'Dilanka', 'dilanka@pos.com', '$2y$10$L3fD0o93bQCMrISNHKyiMe4exvMLJXboOmoKk2eAjF7sY2EeMmjYC', 1, '01464654', 'Sdadasdasd', '2020-09-26 09:34 AM', 1, 'dilanka', 0, 0),
(9, 'Stock', 'stock@stock.com', '$2y$10$L3fD0o93bQCMrISNHKyiMe4exvMLJXboOmoKk2eAjF7sY2EeMmjYC', 2, '45645654', '', '2020-06-05 11:45 AM', 1, 'stock', 0, 0),
(10, 'Dilanka', 'xyz@pos.com', '$2y$10$L3fD0o93bQCMrISNHKyiMe4exvMLJXboOmoKk2eAjF7sY2EeMmjYC', 1, '01464654', 'Sdadasdasd', '2020-06-16 09:19 AM', 1, 'dilanka', 0, 0),
(11, 'Admin2', 'abc@abc.com', '$2y$10$.MekrMw8qaRR3b5KASduKuyG/y8TAh0SqrBULAmViBQJ8c5rdNJ3u', 3, '123456789', 'Dsadsadsa', '2020-10-02 10:56 AM', 1, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_features`
--

CREATE TABLE `user_features` (
  `uf_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `customer_maintain` int(5) NOT NULL DEFAULT '0',
  `supplier_maintain` int(5) NOT NULL DEFAULT '0',
  `product_maintain` int(5) NOT NULL DEFAULT '0',
  `return_stock` int(5) NOT NULL DEFAULT '0',
  `qty_manage` int(5) NOT NULL DEFAULT '0',
  `sup_payments` int(5) NOT NULL DEFAULT '0',
  `notifications` int(5) NOT NULL DEFAULT '0',
  `credit_bill` int(5) NOT NULL DEFAULT '0',
  `costing_re` int(5) NOT NULL DEFAULT '0',
  `sales_re` int(5) NOT NULL DEFAULT '0',
  `profit_re` int(5) NOT NULL DEFAULT '0',
  `transactions_re` int(5) NOT NULL DEFAULT '0',
  `cus_ous_re` int(5) NOT NULL DEFAULT '0',
  `sup_ous_re` int(5) NOT NULL DEFAULT '0',
  `billings` int(5) NOT NULL DEFAULT '0',
  `settings` int(5) NOT NULL DEFAULT '0',
  `barcode_gen` int(5) NOT NULL DEFAULT '0',
  `fast_moving_re` int(5) NOT NULL DEFAULT '0',
  `dep_main` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_features`
--

INSERT INTO `user_features` (`uf_id`, `id`, `customer_maintain`, `supplier_maintain`, `product_maintain`, `return_stock`, `qty_manage`, `sup_payments`, `notifications`, `credit_bill`, `costing_re`, `sales_re`, `profit_re`, `transactions_re`, `cus_ous_re`, `sup_ous_re`, `billings`, `settings`, `barcode_gen`, `fast_moving_re`, `dep_main`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(4, 9, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(5, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_type` varchar(255) NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `ref_mobile` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `vendor_status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dep_id` int(255) NOT NULL DEFAULT '0',
  `tax_rate` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`v_id`, `vendor_name`, `vendor_address`, `vendor_type`, `company_phone`, `ref_mobile`, `company_email`, `pay_type`, `vendor_status`, `image`, `dep_id`, `tax_rate`) VALUES
(1, 'Hemas', 'sdfsdfdsfdsfds', '1', '', '812050437', 'asdsa@sf.sdf', '1', '1', '63-code-coding-profile-programmer-305284.jpg', 0, '50'),
(2, 'Unilewer', '', '1', '', '754683733', '', '2', '1', NULL, 0, '0'),
(3, 'Natures sgrets', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(4, 'Nestle', '', '1', '', '776715425', '', '1', '1', NULL, 0, '0'),
(5, 'kapukotuwa', '', '2', '', '777237056', '', '2', '1', NULL, 0, '0'),
(6, 'Reckitt', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(7, 'Siddhalepa', '', '1', '', '772245417', '', '1', '1', NULL, 0, '0'),
(8, 'Wijaya Products', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(9, 'Rasika', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(10, 'Sooriya Grinding', 'sadasdasd', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(11, 'Tarun', '', '1', '', '773750097', '', '1', '1', NULL, 0, '0'),
(12, 'M.L.S.A', '', '2', '', '812499311', '', '1', '1', NULL, 0, '0'),
(13, 'Mirage', '', '1', '', '775104510', '', '1', '1', NULL, 0, '0'),
(14, 'Atlas range3', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(15, 'Panasonic', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(16, 'S.R.P', '', '2', '', '812239155', '', '1', '1', NULL, 0, '0'),
(17, 'Ilukgoda Product', '', '2', '', '777237056', '', '1', '1', NULL, 0, '0'),
(18, 'Gillette', '', '1', '764847601', '754844431', '', '1', '1', NULL, 0, '0'),
(19, 'Raigam rage1', '', '1', '777377109', '771061158', '', '1', '1', NULL, 0, '0'),
(20, 'CBL Soya', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(21, 'Raigam rage2', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(22, 'Marina ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(23, 'maya ', '', '1', '', '772880230', '', '1', '0', NULL, 0, '0'),
(24, 'Munchee', '', '1', '710427990', '757972076', '', '1', '1', NULL, 0, '0'),
(25, 'Rasoda ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(26, 'Maliban Bisket', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(27, 'Tiara', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(28, 'uswatte', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(29, 'CiC yogert', '', '1', '758191678', '773860510', '', '1', '1', NULL, 0, '0'),
(30, 'Delmege', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(31, 'jayakodi aiya', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(32, 'MD JAM', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(33, 'Watawala kahata', '', '1', '', '763434955', '', '1', '1', NULL, 0, '0'),
(34, 'Arpico maskeliya', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(35, 'Elephant House ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(36, 'KRS Pradakt', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(37, 'Elawalu Loriya', '', '2', '', '770618245', '', '1', '1', NULL, 0, '0'),
(38, 'Ns lanka ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(39, 'Keells', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(40, 'Delmo Chicken', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(41, 'R M aiya', '', '1', '', '755412377', '', '1', '1', NULL, 0, '0'),
(42, 'Rasanima ', '', '1', '', '776981535', '', '1', '1', NULL, 0, '0'),
(43, 'Rathna Bakers', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(44, 'Sarasa', '', '1', '712191736', '725679438', '', '1', '1', NULL, 0, '0'),
(45, 'Theldeniye aiya', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(46, 'Piyumali ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(47, 'Sun Rich Bisket', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(48, 'Cherish', '', '1', '', '775156779', '', '1', '1', NULL, 0, '0'),
(49, 'lakmee', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(50, 'cargils', '', '1', '', '776018045', '', '1', '1', NULL, 0, '0'),
(51, 'Island ', '', '1', '', '773059851', '', '1', '1', NULL, 0, '0'),
(52, 'Redlion', '', '1', '', '776989145', '', '1', '1', NULL, 0, '0'),
(53, 'Little Lion', '', '1', '', '770159404', '', '1', '1', NULL, 0, '0'),
(54, 'Wenro', '', '1', '', '776109232', '', '1', '1', NULL, 0, '0'),
(55, 'imihimi', '', '1', '', '716345831', '', '1', '1', NULL, 0, '0'),
(56, 'ps Products', '', '1', '', '77237056', '', '1', '1', NULL, 0, '0'),
(57, 'sakura saban', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(58, 'Richi ', '', '1', '', '777237056', '', '1', '1', NULL, 0, '0'),
(59, 'Saikal brand', '', '1', '772729873', '772729873', '', '1', '1', NULL, 0, '0'),
(60, 'asdasd', 'asdasdas', '1', '123456865', '5454564545', 'asdas@sdfsd.sf', '1', '1', 'default-cus.png', 0, '0'),
(61, 'asdasd', 'asdasdasdas', '1', '54454545', '1545645646', 'sdsfsd@wer.wer', '1', '1', '61-code-coding-profile-programmer-305284.jpg', 0, '0'),
(62, '', '', '1', '', '', '', '1', '1', 'default-ven.png', 0, '0'),
(63, '', '', '1', '', '', '', '1', '1', 'default-ven.png', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment`
--

CREATE TABLE `vendor_payment` (
  `id` int(30) NOT NULL,
  `v_id` int(30) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `item_count` varchar(30) DEFAULT NULL,
  `bill_amount` varchar(30) DEFAULT NULL,
  `paid_date` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `creditials`
--
ALTER TABLE `creditials`
  ADD PRIMARY KEY (`cre_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cus_returns`
--
ALTER TABLE `cus_returns`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `pro_dep`
--
ALTER TABLE `pro_dep`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `q_control`
--
ALTER TABLE `q_control`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `return_stock`
--
ALTER TABLE `return_stock`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `temp_dis`
--
ALTER TABLE `temp_dis`
  ADD PRIMARY KEY (`td_id`);

--
-- Indexes for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_features`
--
ALTER TABLE `user_features`
  ADD PRIMARY KEY (`uf_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `creditials`
--
ALTER TABLE `creditials`
  MODIFY `cre_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `cus_returns`
--
ALTER TABLE `cus_returns`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `no_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1194;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pro_dep`
--
ALTER TABLE `pro_dep`
  MODIFY `pd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `q_control`
--
ALTER TABLE `q_control`
  MODIFY `q_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_stock`
--
ALTER TABLE `return_stock`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_dis`
--
ALTER TABLE `temp_dis`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_features`
--
ALTER TABLE `user_features`
  MODIFY `uf_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
