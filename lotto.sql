-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 01:31 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lotto`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `two_top` double DEFAULT NULL,
  `two_down` double DEFAULT NULL,
  `three_top` double DEFAULT NULL,
  `three_down` double DEFAULT NULL,
  `three_tod` double DEFAULT NULL,
  `run_top` double DEFAULT NULL,
  `run_down` double DEFAULT NULL,
  PRIMARY KEY (`idconfig`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตั้งค่าจ่ายเงิน' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`idconfig`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `run_top`, `run_down`) VALUES
(1, 60, 60, 100, 80, 80, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `config_cut`
--

CREATE TABLE IF NOT EXISTS `config_cut` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `two_top` double DEFAULT NULL,
  `two_down` double DEFAULT NULL,
  `three_top` double DEFAULT NULL,
  `three_down` double DEFAULT NULL,
  `three_tod` double DEFAULT NULL,
  `run_top` double DEFAULT NULL,
  `run_down` double DEFAULT NULL,
  PRIMARY KEY (`idconfig`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตั้งค่าเรตการคัด' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config_cut`
--

INSERT INTO `config_cut` (`idconfig`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `run_top`, `run_down`) VALUES
(1, 200, 50, 50, 50, 50, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `deleted_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `mobile`, `created_date`, `deleted_date`) VALUES
(1, 'สมชาติ', '022222222ก', '2017-10-25 12:29:30', NULL),
(2, 'ทองดี', '', '2017-10-25 12:29:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `idsale` int(11) NOT NULL AUTO_INCREMENT,
  `lot_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ondate` date DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status` enum('pending','pay') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsale`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`idsale`, `lot_id`, `customer_id`, `ondate`, `discount`, `status`) VALUES
(1, 1, 1, NULL, 0, 'pending'),
(2, 1, 2, NULL, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sale_cut`
--

CREATE TABLE IF NOT EXISTS `sale_cut` (
  `idsalecut_detail` int(11) NOT NULL AUTO_INCREMENT,
  `idsale_detail` int(11) DEFAULT NULL,
  `idsale` int(11) NOT NULL,
  `no` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `two_top` int(11) DEFAULT '0',
  `two_down` int(11) DEFAULT '0',
  `three_top` int(11) DEFAULT '0',
  `three_down` int(11) DEFAULT '0',
  `three_tod` int(11) DEFAULT '0',
  `top_run` int(11) DEFAULT '0',
  `down_run` int(11) DEFAULT '0',
  `lot_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`idsalecut_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=183 ;

--
-- Dumping data for table `sale_cut`
--

INSERT INTO `sale_cut` (`idsalecut_detail`, `idsale_detail`, `idsale`, `no`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `top_run`, `down_run`, `lot_id`, `created_date`) VALUES
(13, 86, 2, '00', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(14, 85, 2, '00', 30, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(15, 84, 2, '00', 30, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(16, 83, 2, '00', 40, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(118, 87, 1, '11', 20, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:25'),
(119, 65, 1, '23', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:25'),
(120, 64, 1, '32', 60, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:25'),
(121, 63, 1, '54', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:25'),
(122, 62, 1, '45', 0, 20, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(123, 61, 1, '22', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(124, 60, 1, '11', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(125, 59, 1, '51', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(126, 58, 1, '11', 80, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(127, 57, 1, '90', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(128, 56, 1, '80', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(129, 55, 1, '80', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(130, 54, 1, '59', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(131, 53, 1, '95', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(132, 52, 1, '98', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:28'),
(133, 51, 1, '498', 0, 0, 50, 0, 50, 0, 0, 1, '2017-10-31 19:29:28'),
(134, 50, 1, '059', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:28'),
(135, 50, 1, '059', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:28'),
(136, 50, 1, '059', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:28'),
(137, 49, 1, '427', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:28'),
(138, 49, 1, '427', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(139, 49, 1, '427', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(140, 48, 1, '620', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(141, 48, 1, '620', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(142, 48, 1, '620', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(143, 47, 1, '372', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(144, 47, 1, '372', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(145, 47, 1, '372', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(146, 46, 1, '370', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(147, 46, 1, '370', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(148, 46, 1, '370', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(149, 45, 1, '427', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(150, 44, 1, '02', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(151, 43, 1, '20', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(152, 42, 1, '96', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:30'),
(153, 41, 1, '96', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:30'),
(154, 40, 1, '38', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:30'),
(155, 39, 1, '83', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:30'),
(156, 38, 1, '43', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(157, 37, 1, '34', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(158, 36, 1, '30', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(159, 35, 1, '03', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(160, 34, 1, '09', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(161, 33, 1, '80', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:31'),
(162, 32, 1, '1', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:32'),
(163, 32, 1, '1', 0, 0, 0, 0, 0, 0, 50, 1, '2017-10-31 19:29:32'),
(164, 31, 1, '3', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:32'),
(165, 31, 1, '3', 0, 0, 0, 0, 0, 50, 0, 1, '2017-10-31 19:29:33'),
(166, 30, 1, '12', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(167, 30, 1, '12', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(168, 14, 1, '15', 100, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(169, 14, 1, '15', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(170, 13, 1, '93', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(171, 12, 1, '29', 50, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(172, 11, 1, '29', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(173, 10, 1, '82', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(174, 9, 1, '28', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(175, 8, 1, '27', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35'),
(176, 7, 1, '72', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35'),
(177, 6, 1, '23', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35'),
(178, 5, 1, '32', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35'),
(179, 4, 1, '23', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35'),
(180, 3, 1, '293', 0, 0, 50, 0, 50, 0, 0, 1, '2017-10-31 19:29:36'),
(181, 2, 1, '151', 0, 0, 50, 0, 50, 0, 0, 1, '2017-10-31 19:29:36'),
(182, 1, 1, '511', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE IF NOT EXISTS `sale_detail` (
  `idsale_detail` int(11) NOT NULL AUTO_INCREMENT,
  `idsale` int(11) NOT NULL,
  `no` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `two_top` int(11) DEFAULT '0',
  `two_down` int(11) DEFAULT '0',
  `three_top` int(11) DEFAULT '0',
  `three_down` int(11) DEFAULT '0',
  `three_tod` int(11) DEFAULT '0',
  `top_run` int(11) DEFAULT '0',
  `down_run` int(11) DEFAULT '0',
  `lot_id` int(11) NOT NULL,
  PRIMARY KEY (`idsale_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=88 ;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`idsale_detail`, `idsale`, `no`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `top_run`, `down_run`, `lot_id`) VALUES
(1, 1, '511', 0, 0, 50, 0, 0, 0, 0, 1),
(2, 1, '151', 0, 0, 50, 0, 50, 0, 0, 1),
(3, 1, '293', 0, 0, 50, 0, 50, 0, 0, 1),
(4, 1, '23', 50, 0, 0, 0, 0, 0, 0, 1),
(5, 1, '32', 0, 50, 0, 0, 0, 0, 0, 1),
(6, 1, '23', 0, 50, 0, 0, 0, 0, 0, 1),
(7, 1, '72', 50, 0, 0, 0, 0, 0, 0, 1),
(8, 1, '27', 50, 0, 0, 0, 0, 0, 0, 1),
(9, 1, '28', 50, 0, 0, 0, 0, 0, 0, 1),
(10, 1, '82', 50, 0, 0, 0, 0, 0, 0, 1),
(11, 1, '29', 50, 50, 0, 0, 0, 0, 0, 1),
(12, 1, '29', 50, 50, 0, 0, 0, 0, 0, 1),
(13, 1, '93', 50, 50, 0, 0, 0, 0, 0, 1),
(14, 1, '15', 100, 100, 0, 0, 0, 0, 0, 1),
(30, 1, '12', 0, 100, 0, 0, 0, 0, 0, 1),
(31, 1, '3', 0, 0, 0, 0, 0, 1000, 0, 1),
(32, 1, '1', 0, 0, 0, 0, 0, 0, 1000, 1),
(33, 1, '80', 0, 50, 0, 0, 0, 0, 0, 1),
(34, 1, '09', 0, 50, 0, 0, 0, 0, 0, 1),
(35, 1, '03', 0, 50, 0, 0, 0, 0, 0, 1),
(36, 1, '30', 0, 50, 0, 0, 0, 0, 0, 1),
(37, 1, '34', 0, 50, 0, 0, 0, 0, 0, 1),
(38, 1, '43', 0, 50, 0, 0, 0, 0, 0, 1),
(39, 1, '83', 0, 50, 0, 0, 0, 0, 0, 1),
(40, 1, '38', 0, 50, 0, 0, 0, 0, 0, 1),
(41, 1, '96', 0, 50, 0, 0, 0, 0, 0, 1),
(42, 1, '96', 0, 50, 0, 0, 0, 0, 0, 1),
(43, 1, '20', 0, 50, 0, 0, 0, 0, 0, 1),
(44, 1, '02', 0, 50, 0, 0, 0, 0, 0, 1),
(45, 1, '427', 0, 0, 50, 0, 50, 0, 0, 1),
(46, 1, '370', 0, 0, 100, 0, 100, 0, 0, 1),
(47, 1, '372', 0, 0, 100, 0, 100, 0, 0, 1),
(48, 1, '620', 0, 0, 100, 0, 100, 0, 0, 1),
(49, 1, '427', 0, 0, 100, 0, 100, 0, 0, 1),
(50, 1, '059', 0, 0, 100, 0, 100, 0, 0, 1),
(51, 1, '498', 0, 0, 50, 0, 50, 0, 0, 1),
(52, 1, '98', 100, 0, 0, 0, 0, 0, 0, 1),
(53, 1, '95', 50, 50, 0, 0, 0, 0, 0, 1),
(54, 1, '59', 50, 50, 0, 0, 0, 0, 0, 1),
(55, 1, '80', 50, 50, 0, 0, 0, 0, 0, 1),
(56, 1, '80', 50, 50, 0, 0, 0, 0, 0, 1),
(57, 1, '90', 50, 50, 0, 0, 0, 0, 0, 1),
(58, 1, '11', 100, 0, 0, 0, 0, 0, 0, 1),
(59, 1, '51', 100, 0, 0, 0, 0, 0, 0, 1),
(60, 1, '11', 100, 0, 0, 0, 0, 0, 0, 1),
(61, 1, '22', 100, 0, 0, 0, 0, 0, 0, 1),
(62, 1, '45', 0, 20, 0, 0, 0, 0, 0, 1),
(63, 1, '54', 0, 50, 0, 0, 0, 0, 0, 1),
(64, 1, '32', 60, 0, 0, 0, 0, 0, 0, 1),
(65, 1, '23', 50, 0, 0, 0, 0, 0, 0, 1),
(82, 2, '00', 50, 0, 0, 0, 0, 0, 0, 1),
(83, 2, '00', 100, 0, 0, 0, 0, 0, 0, 1),
(84, 2, '00', 30, 0, 0, 0, 0, 0, 0, 1),
(85, 2, '00', 30, 0, 0, 0, 0, 0, 0, 1),
(86, 2, '00', 100, 0, 0, 0, 0, 0, 0, 1),
(87, 1, '11', 20, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_lot`
--

CREATE TABLE IF NOT EXISTS `sale_lot` (
  `lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ondate` date NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sale_lot`
--

INSERT INTO `sale_lot` (`lot_id`, `lot_name`, `ondate`, `remark`) VALUES
(1, 'งวดวันที่ 1 พ.ย. 2560', '2017-11-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `sale_send`
--

CREATE TABLE IF NOT EXISTS `sale_send` (
  `idsalesend_detail` int(11) NOT NULL AUTO_INCREMENT,
  `idsale_detail` int(11) NOT NULL,
  `idsale` int(11) NOT NULL,
  `no` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `two_top` int(11) DEFAULT '0',
  `two_down` int(11) DEFAULT '0',
  `three_top` int(11) DEFAULT '0',
  `three_down` int(11) DEFAULT '0',
  `three_tod` int(11) DEFAULT '0',
  `top_run` int(11) DEFAULT '0',
  `down_run` int(11) DEFAULT '0',
  `lot_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`idsalesend_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sale_send`
--

INSERT INTO `sale_send` (`idsalesend_detail`, `idsale_detail`, `idsale`, `no`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `top_run`, `down_run`, `lot_id`, `created_date`) VALUES
(7, 83, 2, '00', 60, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(8, 82, 2, '00', 50, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:27:27'),
(10, 58, 1, '11', 20, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:26'),
(11, 55, 1, '80', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:27'),
(12, 50, 1, '059', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:28'),
(13, 50, 1, '059', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:28'),
(14, 49, 1, '427', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(15, 49, 1, '427', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(16, 48, 1, '620', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(17, 48, 1, '620', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(18, 47, 1, '372', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(19, 47, 1, '372', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(20, 46, 1, '370', 0, 0, 50, 0, 0, 0, 0, 1, '2017-10-31 19:29:29'),
(21, 46, 1, '370', 0, 0, 0, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(22, 45, 1, '427', 0, 0, 50, 0, 50, 0, 0, 1, '2017-10-31 19:29:29'),
(23, 41, 1, '96', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:30'),
(24, 33, 1, '80', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:32'),
(25, 32, 1, '1', 0, 0, 0, 0, 0, 0, 950, 1, '2017-10-31 19:29:32'),
(26, 31, 1, '3', 0, 0, 0, 0, 0, 950, 0, 1, '2017-10-31 19:29:32'),
(27, 30, 1, '12', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(28, 14, 1, '15', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:33'),
(29, 11, 1, '29', 0, 50, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:34'),
(30, 4, 1, '23', 0, 0, 0, 0, 0, 0, 0, 1, '2017-10-31 19:29:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
