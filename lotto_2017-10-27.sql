# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: lotto
# Generation Time: 2017-10-27 00:08:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `two_top` double DEFAULT NULL,
  `two_down` double DEFAULT NULL,
  `three_top` double DEFAULT NULL,
  `three_down` double DEFAULT NULL,
  `three_tod` double DEFAULT NULL,
  `run_top` double DEFAULT NULL,
  `run_down` double DEFAULT NULL,
  PRIMARY KEY (`idconfig`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตั้งค่าจ่ายเงิน';

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`idconfig`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `run_top`, `run_down`)
VALUES
	(1,60,60,100,80,80,1000,1000);

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `deleted_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `name`, `mobile`, `created_date`, `deleted_date`)
VALUES
	(1,'สมชาติก','022222222ก','2017-10-25 12:29:30',NULL),
	(2,'ทองดี','','2017-10-25 12:29:40',NULL);

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;

INSERT INTO `member` (`member_id`, `username`, `password`, `name`)
VALUES
	(1,'admin','f7c3bc1d808e04732adf679965ccc34ca7ae3441','Admin');

/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `idsale` int(11) NOT NULL AUTO_INCREMENT,
  `lot_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ondate` date DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status` enum('pending','pay') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;

INSERT INTO `sale` (`idsale`, `lot_id`, `customer_id`, `ondate`, `discount`, `status`)
VALUES
	(1,1,1,NULL,0,'pending'),
	(2,1,2,NULL,0,'pending');

/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_detail`;

CREATE TABLE `sale_detail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sale_detail` WRITE;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;

INSERT INTO `sale_detail` (`idsale_detail`, `idsale`, `no`, `two_top`, `two_down`, `three_top`, `three_down`, `three_tod`, `top_run`, `down_run`, `lot_id`)
VALUES
	(1,1,'511',0,0,50,0,0,0,0,1),
	(2,1,'151',0,0,50,0,50,0,0,1),
	(3,1,'293',0,0,50,0,50,0,0,1),
	(4,1,'23',50,0,0,0,0,0,0,1),
	(5,1,'32',0,50,0,0,0,0,0,1),
	(6,1,'23',0,50,0,0,0,0,0,1),
	(7,1,'72',50,0,0,0,0,0,0,1),
	(8,1,'27',50,0,0,0,0,0,0,1),
	(9,1,'28',50,0,0,0,0,0,0,1),
	(10,1,'82',50,0,0,0,0,0,0,1),
	(11,1,'29',50,50,0,0,0,0,0,1),
	(12,1,'29',50,50,0,0,0,0,0,1),
	(13,1,'93',50,50,0,0,0,0,0,1),
	(14,1,'15',100,100,0,0,0,0,0,1),
	(30,1,'12',0,100,0,0,0,0,0,1),
	(31,1,'3',0,0,0,0,0,1000,0,1),
	(32,1,'1',0,0,0,0,0,0,1000,1),
	(33,1,'80',0,50,0,0,0,0,0,1),
	(34,1,'09',0,50,0,0,0,0,0,1),
	(35,1,'03',0,50,0,0,0,0,0,1),
	(36,1,'30',0,50,0,0,0,0,0,1),
	(37,1,'34',0,50,0,0,0,0,0,1),
	(38,1,'43',0,50,0,0,0,0,0,1),
	(39,1,'83',0,50,0,0,0,0,0,1),
	(40,1,'38',0,50,0,0,0,0,0,1),
	(41,1,'96',0,50,0,0,0,0,0,1),
	(42,1,'96',0,50,0,0,0,0,0,1),
	(43,1,'20',0,50,0,0,0,0,0,1),
	(44,1,'02',0,50,0,0,0,0,0,1),
	(45,1,'427',0,0,50,0,50,0,0,1),
	(46,1,'370',0,0,100,0,100,0,0,1),
	(47,1,'372',0,0,100,0,100,0,0,1),
	(48,1,'620',0,0,100,0,100,0,0,1),
	(49,1,'427',0,0,100,0,100,0,0,1),
	(50,1,'059',0,0,100,0,100,0,0,1),
	(51,1,'498',0,0,50,0,50,0,0,1),
	(52,1,'98',100,0,0,0,0,0,0,1),
	(53,1,'95',50,50,0,0,0,0,0,1),
	(54,1,'59',50,50,0,0,0,0,0,1),
	(55,1,'80',50,50,0,0,0,0,0,1),
	(56,1,'80',50,50,0,0,0,0,0,1),
	(57,1,'90',50,50,0,0,0,0,0,1),
	(58,1,'11',100,0,0,0,0,0,0,1),
	(59,1,'51',100,0,0,0,0,0,0,1),
	(60,1,'11',100,0,0,0,0,0,0,1),
	(61,1,'22',100,0,0,0,0,0,0,1),
	(62,1,'45',0,20,0,0,0,0,0,1),
	(63,1,'54',0,50,0,0,0,0,0,1),
	(64,1,'32',60,0,0,0,0,0,0,1),
	(65,1,'23',50,0,0,0,0,0,0,1),
	(66,2,'00',50,50,0,0,0,0,0,1);

/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_lot
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_lot`;

CREATE TABLE `sale_lot` (
  `lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ondate` date NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sale_lot` WRITE;
/*!40000 ALTER TABLE `sale_lot` DISABLE KEYS */;

INSERT INTO `sale_lot` (`lot_id`, `lot_name`, `ondate`, `remark`)
VALUES
	(1,'งวดวันที่ 1 พ.ย. 2560','2017-11-01','');

/*!40000 ALTER TABLE `sale_lot` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
