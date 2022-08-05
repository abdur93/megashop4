-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema test
--

CREATE DATABASE IF NOT EXISTS test;
USE test;

--
-- Definition of table `core_categories`
--

DROP TABLE IF EXISTS `core_categories`;
CREATE TABLE `core_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_categories`
--

/*!40000 ALTER TABLE `core_categories` DISABLE KEYS */;
INSERT INTO `core_categories` (`id`,`name`,`section_id`,`created_at`,`updated_at`) VALUES 
 (2,'Grossery',3,'',''),
 (3,'kitchen assosories',1,'2022-03-02 04:14:37','2022-03-02 04:14:37'),
 (4,'colddrinks',3,'2022-03-02 03:52:31','2022-03-02 03:52:31'),
 (6,'foods',3,'2022-03-02 04:32:46','2022-03-02 04:32:46'),
 (7,'oil',8,'2022-03-02 04:53:31','2022-03-02 04:53:31'),
 (8,'Sounds&Vision',1,'',''),
 (9,'Women\'s',2,'',''),
 (10,'Men\'s',2,'',''),
 (11,'Kid\'s',2,'','');
/*!40000 ALTER TABLE `core_categories` ENABLE KEYS */;


--
-- Definition of table `core_customers`
--

DROP TABLE IF EXISTS `core_customers`;
CREATE TABLE `core_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_customers`
--

/*!40000 ALTER TABLE `core_customers` DISABLE KEYS */;
INSERT INTO `core_customers` (`id`,`name`,`mobile`,`email`,`created_at`,`updated_at`) VALUES 
 (1,'Jahidul Islam','45345435435','jahid@yahoo.com','2022-02-27 17:26:54','2022-02-27 17:26:54'),
 (2,'Rejaul Karim','4353445546','Reza@yahoo.com','2021-12-14 12:43:13','2021-12-14 12:43:13'),
 (3,'Niyamot','3434343','niyamot@yahoo.com','2021-12-14 06:44:25','2021-12-14 06:44:25'),
 (4,'arif','0126585981','arif@gmail.com','2022-02-16 00:00:00','0000-00-00 00:00:00'),
 (5,'Monir','01836987536','monir@gmail.com','2022-02-16 00:00:00','2022-02-16 00:00:00');
/*!40000 ALTER TABLE `core_customers` ENABLE KEYS */;


--
-- Definition of table `core_departments`
--

DROP TABLE IF EXISTS `core_departments`;
CREATE TABLE `core_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_departments`
--

/*!40000 ALTER TABLE `core_departments` DISABLE KEYS */;
INSERT INTO `core_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','Accounts'),
 (2,'20','IT'),
 (3,'30','HR'),
 (4,'40','Sales and Marketing');
/*!40000 ALTER TABLE `core_departments` ENABLE KEYS */;


--
-- Definition of table `core_manufacturers`
--

DROP TABLE IF EXISTS `core_manufacturers`;
CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_manufacturers`
--

/*!40000 ALTER TABLE `core_manufacturers` DISABLE KEYS */;
INSERT INTO `core_manufacturers` (`id`,`name`) VALUES 
 (1,'BD Food'),
 (2,'Samsung'),
 (3,'Vision'),
 (7,'ACI'),
 (8,'Dada garments'),
 (9,'kazi farms'),
 (10,'pepsico'),
 (11,'Teer company');
/*!40000 ALTER TABLE `core_manufacturers` ENABLE KEYS */;


--
-- Definition of table `core_materials`
--

DROP TABLE IF EXISTS `core_materials`;
CREATE TABLE `core_materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `brand` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_materials`
--

/*!40000 ALTER TABLE `core_materials` DISABLE KEYS */;
INSERT INTO `core_materials` (`id`,`name`,`brand`,`price`) VALUES 
 (1,'rakib','we','50000'),
 (2,'laptop','hp','150000'),
 (3,'desktop','hp','Array'),
 (4,'tv','panasonic','50000'),
 (5,'earphone','sony','Array'),
 (6,'earphone','sony','Array');
/*!40000 ALTER TABLE `core_materials` ENABLE KEYS */;


--
-- Definition of table `core_order_details`
--

DROP TABLE IF EXISTS `core_order_details`;
CREATE TABLE `core_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_order_details`
--

/*!40000 ALTER TABLE `core_order_details` DISABLE KEYS */;
INSERT INTO `core_order_details` (`id`,`order_id`,`product_id`,`qty`,`price`,`vat`,`discount`,`created_at`,`updated_at`) VALUES 
 (1,1,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (2,1,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (3,2,18,4,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (4,2,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (5,3,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (6,3,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (7,4,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (8,4,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (9,5,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (10,14,18,1,30,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (11,14,17,1,15,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (12,15,18,1,40,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (13,15,17,2,16,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (14,16,27,1,45,0,0,'2022-01-03 10:02:06','2022-01-03 10:02:06'),
 (15,18,34,1,555,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (16,18,35,3,444,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (17,21,35,0,0,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (18,36,44,1,99,0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (19,38,44,1,99,0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (20,39,44,1,45,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (21,48,45,1,45,0,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (22,49,45,1,45,0,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (23,50,45,1,45,0,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (24,51,45,1,45,0,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (25,53,47,10,10,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (26,55,47,5,10,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (27,56,57,5,50,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (28,56,69,1,550,0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (29,57,34,0,0,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (30,59,46,1,50,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (31,60,46,2,50,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (32,60,34,1,50,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (33,60,47,1,10,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (34,61,45,1,45,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (35,61,47,1,10,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (36,62,56,1,50,0,0,'2022-04-10 14:35:48','2022-04-10 14:35:48'),
 (37,62,57,1,50,0,0,'2022-04-10 14:35:48','2022-04-10 14:35:48'),
 (38,63,55,1,50,0,0,'2022-04-10 14:39:11','2022-04-10 14:39:11'),
 (39,63,59,1,1500,0,0,'2022-04-10 14:39:12','2022-04-10 14:39:12');
/*!40000 ALTER TABLE `core_order_details` ENABLE KEYS */;


--
-- Definition of table `core_orders`
--

DROP TABLE IF EXISTS `core_orders`;
CREATE TABLE `core_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_orders`
--

/*!40000 ALTER TABLE `core_orders` DISABLE KEYS */;
INSERT INTO `core_orders` (`id`,`customer_id`,`order_date`,`delivery_date`,`shipping_address`,`order_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`,`created_at`,`updated_at`) VALUES 
 (1,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (2,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (3,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (4,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (5,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (6,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:01:16','2021-12-14 07:01:16'),
 (7,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:02:07','2021-12-14 07:02:07'),
 (8,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:03:51','2021-12-14 07:03:51'),
 (9,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:05:32','2021-12-14 07:05:32'),
 (10,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:06:21','2021-12-14 07:06:21'),
 (11,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:07:13','2021-12-14 07:07:13'),
 (12,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:10:25','2021-12-14 07:10:25'),
 (13,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:13:06','2021-12-14 07:13:06'),
 (14,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (15,3,'2021-12-15 00:00:00','2021-12-15 00:00:00','Rampura',0,0,'Testing',1,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (16,2,'2022-01-03 00:00:00','2022-01-03 00:00:00','',0,0,'',1,0,0,'2022-01-03 10:02:06','2022-01-03 10:02:06'),
 (17,1,'1970-01-01 00:00:00','1970-01-01 00:00:00','',0,0,'',1,0,0,'2022-02-26 09:24:44','2022-02-26 09:24:44'),
 (18,1,'2022-02-28 00:00:00','2022-02-28 00:00:00','',1981.35,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (19,1,'2022-02-28 00:00:00','2022-02-28 00:00:00','',1981.35,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (20,1,'2022-02-28 00:00:00','2022-02-28 00:00:00','',1981.35,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (21,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (22,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (23,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (24,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (25,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (26,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (27,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (28,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (29,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (30,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (31,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (32,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (33,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (34,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (35,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',236.25,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (36,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','dhaka',100.8,0,'test',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (37,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','dhaka',100.8,0,'test',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (38,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','dhaka',100.8,0,'test',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (39,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',47.25,0,'yyy',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (40,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','jkjk',0,0,'jjj',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (41,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',38.85,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (42,2,'2022-03-01 00:00:00','2022-03-01 00:00:00','',0,0,'ww',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (43,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (44,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (45,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (46,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (47,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (48,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (49,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (50,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (51,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',37.8,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (52,1,'2022-03-01 00:00:00','2022-03-01 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (53,3,'2022-03-02 00:00:00','2022-03-02 00:00:00','',105,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (54,2,'2022-03-02 00:00:00','2022-03-02 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (55,2,'2022-03-02 00:00:00','2022-03-02 00:00:00','',52.5,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (56,2,'2022-03-02 00:00:00','2022-03-02 00:00:00','uttara',836.85,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (57,2,'2022-04-01 00:00:00','2022-04-01 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (58,1,'2022-04-01 00:00:00','2022-04-01 00:00:00','',0,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (59,1,'2022-04-01 00:00:00','2022-04-01 00:00:00','',52.5,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (60,1,'2022-04-01 00:00:00','2022-04-01 00:00:00','',168,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (61,1,'2022-04-07 00:00:00','2022-04-07 00:00:00','',57.75,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (62,1,'2022-04-10 00:00:00','2022-04-10 00:00:00','',105,105,'',1,0,0,'2022-04-10 14:35:48','2022-04-10 14:35:48'),
 (63,4,'2022-04-10 00:00:00','2022-04-10 00:00:00','',1627.5,1627.5,'',1,0,0,'2022-04-10 14:39:11','2022-04-10 14:39:11');
/*!40000 ALTER TABLE `core_orders` ENABLE KEYS */;


--
-- Definition of table `core_persons`
--

DROP TABLE IF EXISTS `core_persons`;
CREATE TABLE `core_persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_persons`
--

/*!40000 ALTER TABLE `core_persons` DISABLE KEYS */;
INSERT INTO `core_persons` (`id`,`name`,`position_id`,`sex`,`dob`,`doj`,`mobile`,`address`,`inactive`) VALUES 
 (1,'Jahidul Islam',1,0,'2000-01-01','2021-01-01','677657657567','Rampura',0),
 (2,'Abdur Rahman',1,0,'1993-04-02','2022-02-01','01856585466','uttara',0);
/*!40000 ALTER TABLE `core_persons` ENABLE KEYS */;


--
-- Definition of table `core_positions`
--

DROP TABLE IF EXISTS `core_positions`;
CREATE TABLE `core_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_positions`
--

/*!40000 ALTER TABLE `core_positions` DISABLE KEYS */;
INSERT INTO `core_positions` (`id`,`name`,`grade`,`department_id`) VALUES 
 (1,'Programmer',6,2),
 (2,'System Analyst',3,1);
/*!40000 ALTER TABLE `core_positions` ENABLE KEYS */;


--
-- Definition of table `core_product_group_details`
--

DROP TABLE IF EXISTS `core_product_group_details`;
CREATE TABLE `core_product_group_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_group_details`
--

/*!40000 ALTER TABLE `core_product_group_details` DISABLE KEYS */;
INSERT INTO `core_product_group_details` (`id`,`group_id`,`created_at`,`updated_at`,`product_id`) VALUES 
 (1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',20),
 (2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',27),
 (3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',28),
 (4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',20),
 (5,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',27),
 (6,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',28),
 (7,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',20),
 (8,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',27),
 (9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',28),
 (10,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',20),
 (11,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',27),
 (12,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',28);
/*!40000 ALTER TABLE `core_product_group_details` ENABLE KEYS */;


--
-- Definition of table `core_product_group_sections`
--

DROP TABLE IF EXISTS `core_product_group_sections`;
CREATE TABLE `core_product_group_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_group_sections`
--

/*!40000 ALTER TABLE `core_product_group_sections` DISABLE KEYS */;
INSERT INTO `core_product_group_sections` (`id`,`name`) VALUES 
 (1,'Featured Products');
/*!40000 ALTER TABLE `core_product_group_sections` ENABLE KEYS */;


--
-- Definition of table `core_product_groups`
--

DROP TABLE IF EXISTS `core_product_groups`;
CREATE TABLE `core_product_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `group_section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_groups`
--

/*!40000 ALTER TABLE `core_product_groups` DISABLE KEYS */;
INSERT INTO `core_product_groups` (`id`,`name`,`created_at`,`updated_at`,`group_section_id`) VALUES 
 (1,'Featured Item group -1','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
 (2,'Featured Item group -2','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
 (3,'Featured Item group -3','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
 (4,'Featured Item group -4','0000-00-00 00:00:00','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `core_product_groups` ENABLE KEYS */;


--
-- Definition of table `core_products`
--

DROP TABLE IF EXISTS `core_products`;
CREATE TABLE `core_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL,
  `regular_price` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `section_id` int(10) unsigned DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) unsigned DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) unsigned DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_products`
--

/*!40000 ALTER TABLE `core_products` DISABLE KEYS */;
INSERT INTO `core_products` (`id`,`name`,`offer_price`,`manufacturer_id`,`regular_price`,`description`,`photo`,`category_id`,`section_id`,`is_featured`,`star`,`is_brand`,`offer_discount`,`uom_id`,`weight`,`barcode`,`created_at`,`updated_at`) VALUES 
 (34,'begun',50,1,45,'black begun','34.jpg',2,2,0,0,0,5,2,1,'45612','',''),
 (44,'karrot',45,1,40,'','karrot.jpg',2,3,0,0,0,5,2,1,'411236','2022-03-01 10:48:18','2022-03-01 10:48:18'),
 (45,'brokoli',45,1,40,'','brokoli.jpg',2,3,0,0,0,5,1,0,'455464','2022-03-01 10:52:47','2022-03-01 10:52:47'),
 (46,'capsicum',50,1,40,'','capsicum.jpg',2,3,0,0,0,10,3,0,'98456','2022-03-01 10:55:26','2022-03-01 10:55:26'),
 (47,'palong',10,1,10,'','palong.jpg',2,3,0,0,0,0,1,0,'65448','2022-03-01 10:57:19','2022-03-01 10:57:19'),
 (48,'atta',45,7,40,'','atta.jpg',2,3,0,0,0,5,2,1,'88888','2022-03-02 03:22:39','2022-03-02 03:22:39'),
 (49,'moida',50,7,45,'','moida.jpg',2,3,0,0,0,5,2,1,'3456644','2022-03-02 03:24:22','2022-03-02 03:24:22'),
 (50,'oil',550,1,530,'','50.jpg',2,3,0,0,0,0,2,3,'6747','',''),
 (51,'pure ata',50,7,45,'','51.jpg',2,3,0,0,1,5,2,1,'56778','',''),
 (52,'7up can',50,10,50,'7up can','7up-can.jpg',4,1,0,0,1,0,1,0,'99887','2022-03-02 03:50:55','2022-03-02 03:50:55'),
 (53,'orange drink',150,10,150,'orange drink','orange-drink.jpg',4,7,0,0,0,0,1,0,'6577','2022-03-02 03:55:37','2022-03-02 03:55:37'),
 (54,'pine apple juice',250,10,190,'pineapple juice','pine-apple-juice.jpg',4,3,0,0,0,0,1,0,'9906','2022-03-02 03:58:02','2022-03-02 03:58:02'),
 (55,'cocala can',50,10,50,'cocacola','cocala-can.jpg',4,3,0,0,1,0,1,0,'56788','2022-03-02 04:03:49','2022-03-02 04:03:49'),
 (56,'lichy',50,10,40,'lichy','lichy.jpg',4,3,0,0,1,0,1,0,'y7889','2022-03-02 04:05:13','2022-03-02 04:05:13'),
 (57,'panta',50,10,45,'','panta.jpg',4,3,0,0,1,0,1,0,'2562','2022-03-02 04:06:37','2022-03-02 04:06:37'),
 (58,'passure cooker',1499,1,1400,'','passure-cooker.jpeg',3,1,0,0,0,99,1,0,'73736','2022-03-02 04:15:44','2022-03-02 04:15:44'),
 (59,'miako Blender',1500,3,1400,'','59.jpg',3,1,0,0,1,100,1,0,'9854','',''),
 (60,'baby spoon',250,3,200,'','baby-spoon.jpg',3,1,0,0,0,0,1,0,'08776','2022-03-02 04:20:36','2022-03-02 04:20:36'),
 (61,'electric catly',600,3,550,'electric cately','61.jpg',3,1,0,0,0,50,1,0,'3535','',''),
 (62,'fry fan',550,3,500,'fry fan','fry-fan.jpg',3,1,0,0,0,0,1,0,'7899','2022-03-02 04:24:41','2022-03-02 04:24:41'),
 (63,'samai',50,1,45,'samai','samai.jpg',6,3,0,0,0,5,1,0,'44444','2022-03-02 04:34:16','2022-03-02 04:34:16'),
 (64,'amsotto',50,1,45,'amsotto','amsotto.jpg',6,3,0,0,0,5,3,0,'44435','2022-03-02 04:36:10','2022-03-02 04:36:10'),
 (65,'hajmolla borhani',100,1,90,'','hajmolla-borhani.jpg',6,3,0,0,0,0,4,0,'9457','2022-03-02 04:37:51','2022-03-02 04:37:51'),
 (66,'horlicks',200,1,190,'horlicks','horlicks.jpg',6,3,0,0,0,0,1,0,'4567','2022-03-02 04:39:02','2022-03-02 04:39:02'),
 (67,'corn',50,1,50,'baby corn','corn.png',6,3,0,0,0,0,1,0,'6267','2022-03-02 04:41:33','2022-03-02 04:41:33'),
 (68,'rice been oil',150,7,140,'Rice been oil','rice-been-oil.jpg',7,8,0,0,0,0,4,1,'76436','',''),
 (69,'soabin oil',550,7,530,'soyabin oil','soabin-oil.png',7,8,0,0,0,0,4,5,'26','2022-03-02 04:55:35','2022-03-02 04:55:35'),
 (70,'fortune  Rice been oil',750,7,700,'Rice been musterd oil','fortune-rice-been-oil.jpeg',7,8,0,0,0,50,4,5,'9551','2022-03-02 04:57:14','2022-03-02 04:57:14'),
 (71,'Rupchada soyabin oil',780,11,750,'','rupchada-soyabin-oil.jpg',7,8,0,0,0,30,4,5,'655414','2022-03-02 04:58:56','2022-03-02 04:58:56');
/*!40000 ALTER TABLE `core_products` ENABLE KEYS */;


--
-- Definition of table `core_purchase_details`
--

DROP TABLE IF EXISTS `core_purchase_details`;
CREATE TABLE `core_purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchase_details`
--

/*!40000 ALTER TABLE `core_purchase_details` DISABLE KEYS */;
INSERT INTO `core_purchase_details` (`id`,`purchase_id`,`product_id`,`qty`,`price`,`vat`,`discount`) VALUES 
 (1,2,44,1,45,0,4),
 (2,3,46,1,50,0,5),
 (3,4,34,0,0,0,0),
 (4,5,45,1,45,0,0),
 (5,6,45,1,45,0,0),
 (6,7,69,100,550,0,0),
 (7,8,44,4,45,0,0),
 (8,9,45,1,45,0,0),
 (9,9,34,1,50,0,0),
 (10,10,46,5,50,0,0),
 (11,12,46,5,50,0,0),
 (12,13,44,5,45,0,0),
 (13,14,44,1,45,0,0),
 (14,15,46,1,50,0,0),
 (15,15,34,1,50,0,0),
 (16,16,58,1,1499,0,5),
 (17,16,59,1,1500,0,5),
 (18,16,57,1,50,0,0),
 (19,17,55,1,50,0,0),
 (20,17,58,2,1499,0,0),
 (21,17,46,1,50,0,0),
 (22,18,45,1,45,0,0),
 (23,18,47,1,10,0,0),
 (24,19,58,2,1499,0,0),
 (25,19,59,1,1500,0,0),
 (26,19,62,1,550,0,0),
 (27,20,45,1,25,0,0),
 (28,20,34,1,25,0,0),
 (29,21,44,1,25,0,0),
 (30,22,44,1,25,0,0),
 (31,21,53,1,30,0,0),
 (32,22,53,1,30,0,0),
 (33,23,46,1,30,0,0),
 (34,23,47,10,7,0,0);
/*!40000 ALTER TABLE `core_purchase_details` ENABLE KEYS */;


--
-- Definition of table `core_purchases`
--

DROP TABLE IF EXISTS `core_purchases`;
CREATE TABLE `core_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `vat` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchases`
--

/*!40000 ALTER TABLE `core_purchases` DISABLE KEYS */;
INSERT INTO `core_purchases` (`id`,`supplier_id`,`purchase_date`,`delivery_date`,`shipping_address`,`purchase_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`) VALUES 
 (1,1,'1970-01-01 00:00:00','1970-01-01 00:00:00','',0,0,'',1,0,0),
 (2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',43.05,0,'',0,0,0),
 (3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',47.25,0,'',0,0,0),
 (4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',0,0,'',0,0,0),
 (5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','dhaka',47.25,0,'',0,0,0),
 (6,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','',47.25,0,'',0,0,0),
 (7,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','uttara ,Dhaka',57750,0,'',0,0,0),
 (8,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',189,0,'',0,0,0),
 (9,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',99.75,0,'',0,0,0),
 (10,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',262.5,0,'',0,0,0),
 (11,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',0,0,'',0,0,0),
 (12,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',262.5,0,'',0,0,0),
 (13,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',236.25,0,'',0,0,0),
 (14,0,'2022-03-09 00:00:00','2022-03-31 00:00:00','ss',47.25,0,'ss',0,0,0),
 (15,0,'2022-04-08 00:00:00','2022-04-06 00:00:00','',105,0,'',0,0,0),
 (16,0,'2022-05-24 00:00:00','2022-05-24 00:00:00','',3190.95,0,'',0,0,0),
 (17,0,'2022-05-25 00:00:00','2022-05-25 00:00:00','dhaka',3252.9,0,'good',0,0,0),
 (18,0,'2022-05-25 00:00:00','2022-05-25 00:00:00','jasor',57.75,0,'good',0,0,0),
 (19,1,'2022-05-31 00:00:00','2022-05-31 00:00:00','',0,0,'',1,0,0),
 (20,0,'2022-06-09 00:00:00','2022-06-09 00:00:00','uttara',52.5,0,'good',0,0,0),
 (21,2,'2022-06-09 00:00:00','2022-06-09 00:00:00','farmgate',57.75,0,'good',0,0,0),
 (22,2,'2022-06-09 00:00:00','2022-06-09 00:00:00','farmgate',57.75,0,'good',0,0,0),
 (23,3,'2022-06-10 00:00:00','2022-06-10 00:00:00','dk',105,0,'good',0,0,0);
/*!40000 ALTER TABLE `core_purchases` ENABLE KEYS */;


--
-- Definition of table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_roles`
--

/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` (`id`,`name`,`updated_at`,`created_at`) VALUES 
 (1,'Admin','',''),
 (2,'Editor','',''),
 (3,'Member','',''),
 (4,'General ','',''),
 (5,'Reader5','',''),
 (6,'Subscriber','',''),
 (10,'adviser','','');
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;


--
-- Definition of table `core_sections`
--

DROP TABLE IF EXISTS `core_sections`;
CREATE TABLE `core_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_sections`
--

/*!40000 ALTER TABLE `core_sections` DISABLE KEYS */;
INSERT INTO `core_sections` (`id`,`name`) VALUES 
 (1,'Electronic'),
 (2,'Raw Vegetable'),
 (3,'Food and Beverages'),
 (4,'Health & Beauty'),
 (7,'softdrink'),
 (9,'begetables');
/*!40000 ALTER TABLE `core_sections` ENABLE KEYS */;


--
-- Definition of table `core_status`
--

DROP TABLE IF EXISTS `core_status`;
CREATE TABLE `core_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_status`
--

/*!40000 ALTER TABLE `core_status` DISABLE KEYS */;
INSERT INTO `core_status` (`id`,`name`) VALUES 
 (1,'Processing'),
 (2,'Shifted'),
 (3,'Delivered'),
 (4,'Invoiced');
/*!40000 ALTER TABLE `core_status` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_details`
--

DROP TABLE IF EXISTS `core_stock_adjustment_details`;
CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_details`
--

/*!40000 ALTER TABLE `core_stock_adjustment_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_stock_adjustment_details` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_types`
--

DROP TABLE IF EXISTS `core_stock_adjustment_types`;
CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_types`
--

/*!40000 ALTER TABLE `core_stock_adjustment_types` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_types` (`id`,`name`,`factor`) VALUES 
 (1,'Is Outdated',-1),
 (2,'Is Damaged',-1),
 (3,'Material Missing',-1),
 (4,'Product Is Obsolete',-1),
 (5,'Existing Inventory',1),
 (6,'Fixed/Found Inventory',1);
/*!40000 ALTER TABLE `core_stock_adjustment_types` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustments`
--

DROP TABLE IF EXISTS `core_stock_adjustments`;
CREATE TABLE `core_stock_adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) unsigned NOT NULL,
  `remark` text NOT NULL,
  `stock_adjustment_type_id` int(10) unsigned NOT NULL,
  `warehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustments`
--

/*!40000 ALTER TABLE `core_stock_adjustments` DISABLE KEYS */;
INSERT INTO `core_stock_adjustments` (`id`,`adjustment_at`,`user_id`,`remark`,`stock_adjustment_type_id`,`warehouse_id`) VALUES 
 (1,'0000-00-00 00:00:00',0,'',0,0),
 (2,'0000-00-00 00:00:00',0,'',0,0),
 (3,'0000-00-00 00:00:00',0,'',0,0),
 (4,'0000-00-00 00:00:00',0,'',0,0),
 (5,'0000-00-00 00:00:00',0,'',0,0),
 (6,'0000-00-00 00:00:00',0,'',0,0),
 (7,'0000-00-00 00:00:00',0,'',0,0),
 (8,'0000-00-00 00:00:00',0,'',0,0),
 (9,'0000-00-00 00:00:00',0,'',0,0),
 (10,'0000-00-00 00:00:00',0,'',0,0),
 (11,'0000-00-00 00:00:00',0,'',0,0),
 (12,'0000-00-00 00:00:00',0,'',0,0),
 (13,'0000-00-00 00:00:00',0,'',0,0),
 (14,'0000-00-00 00:00:00',0,'',0,0),
 (15,'2022-05-31 00:00:00',1,'',1,2);
/*!40000 ALTER TABLE `core_stock_adjustments` ENABLE KEYS */;


--
-- Definition of table `core_stocks`
--

DROP TABLE IF EXISTS `core_stocks`;
CREATE TABLE `core_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stocks`
--

/*!40000 ALTER TABLE `core_stocks` DISABLE KEYS */;
INSERT INTO `core_stocks` (`id`,`product_id`,`qty`,`transaction_type_id`,`remark`,`created_at`,`warehouse_id`) VALUES 
 (1,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (2,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (3,18,-1,1,'Order','0000-00-00 00:00:00',0),
 (4,18,-4,1,'Order','2021-12-13 11:24:00',0),
 (5,17,-2,1,'Order','2021-12-13 11:24:00',0),
 (6,17,-2,1,'Order','2021-12-13 11:38:13',0),
 (7,18,-1,1,'Order','2021-12-13 11:38:13',0),
 (8,17,-1,1,'Order','2021-12-13 11:39:01',0),
 (9,18,-1,1,'Order','2021-12-13 11:39:01',0),
 (10,17,-1,1,'Order','2021-12-13 11:41:14',0),
 (11,18,-1,1,'Order','2021-12-15 13:48:59',0),
 (12,17,-2,1,'Order','2021-12-15 13:48:59',0),
 (13,34,-1,1,'Order','0000-00-00 00:00:00',0),
 (14,35,-3,1,'Order','0000-00-00 00:00:00',0),
 (15,44,-1,1,'Order','0000-00-00 00:00:00',0),
 (16,44,-1,1,'Order','0000-00-00 00:00:00',0),
 (17,44,-1,1,'Order','0000-00-00 00:00:00',0),
 (18,45,-1,1,'Order','0000-00-00 00:00:00',0),
 (19,45,-1,1,'Order','0000-00-00 00:00:00',0),
 (20,45,-1,1,'Order','0000-00-00 00:00:00',0),
 (21,45,-1,1,'Order','0000-00-00 00:00:00',0),
 (22,44,1,1,'Order','0000-00-00 00:00:00',0),
 (23,46,1,1,'Order','0000-00-00 00:00:00',0),
 (24,34,0,1,'Order','0000-00-00 00:00:00',0),
 (25,45,1,1,'Order','0000-00-00 00:00:00',0),
 (26,45,1,1,'Order','0000-00-00 00:00:00',0),
 (27,69,100,1,'Order','0000-00-00 00:00:00',0),
 (28,47,-10,1,'Order','0000-00-00 00:00:00',0),
 (29,44,4,1,'Order','0000-00-00 00:00:00',0),
 (30,45,1,1,'Order','0000-00-00 00:00:00',0),
 (31,34,1,1,'Order','0000-00-00 00:00:00',0),
 (32,46,5,1,'Order','0000-00-00 00:00:00',0),
 (33,47,-5,1,'Order','0000-00-00 00:00:00',0),
 (34,46,5,1,'Order','0000-00-00 00:00:00',0),
 (35,44,5,1,'Order','0000-00-00 00:00:00',0),
 (36,57,-5,1,'Order','0000-00-00 00:00:00',0),
 (37,69,-1,1,'Order','0000-00-00 00:00:00',0),
 (38,44,1,1,'Order','0000-00-00 00:00:00',0),
 (39,46,-1,1,'Order','0000-00-00 00:00:00',0),
 (40,46,-2,1,'Order','0000-00-00 00:00:00',0),
 (41,34,-1,1,'Order','0000-00-00 00:00:00',0),
 (42,47,-1,1,'Order','0000-00-00 00:00:00',0),
 (43,46,1,1,'Order','0000-00-00 00:00:00',0),
 (44,34,1,1,'Order','0000-00-00 00:00:00',0),
 (45,45,-1,1,'Order','0000-00-00 00:00:00',0),
 (46,47,-1,1,'Order','0000-00-00 00:00:00',0),
 (47,58,1,1,'Order','0000-00-00 00:00:00',0),
 (48,59,1,1,'Order','0000-00-00 00:00:00',0),
 (49,57,1,1,'Order','0000-00-00 00:00:00',0),
 (50,55,1,1,'Order','0000-00-00 00:00:00',0),
 (51,58,2,1,'Order','0000-00-00 00:00:00',0),
 (52,46,1,1,'Order','0000-00-00 00:00:00',0),
 (53,45,1,1,'Order','0000-00-00 00:00:00',0),
 (54,47,1,1,'Order','0000-00-00 00:00:00',0),
 (55,58,2,1,'purchase','2022-05-30 21:07:07',0),
 (56,59,1,1,'purchase','2022-05-30 21:07:07',0),
 (57,62,1,1,'purchase','2022-05-30 21:07:07',0),
 (58,45,1,1,'Order','0000-00-00 00:00:00',2),
 (59,34,1,1,'Order','0000-00-00 00:00:00',2),
 (60,44,1,1,'Order','0000-00-00 00:00:00',2),
 (61,44,1,1,'Order','0000-00-00 00:00:00',2),
 (62,53,1,1,'Order','0000-00-00 00:00:00',2),
 (63,53,1,1,'Order','0000-00-00 00:00:00',2),
 (64,46,1,1,'Purchase','0000-00-00 00:00:00',2),
 (65,47,10,1,'Purchase','0000-00-00 00:00:00',2);
/*!40000 ALTER TABLE `core_stocks` ENABLE KEYS */;


--
-- Definition of table `core_suppliers`
--

DROP TABLE IF EXISTS `core_suppliers`;
CREATE TABLE `core_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_suppliers`
--

/*!40000 ALTER TABLE `core_suppliers` DISABLE KEYS */;
INSERT INTO `core_suppliers` (`id`,`name`,`mobile`,`email`) VALUES 
 (1,'Md. Shahin','342234234','shahin@yahoo.com'),
 (2,'Tauhid Imdad','34325435423','tauhid@gmail.com'),
 (3,'ACI','8799999998','aci@gmail.com');
/*!40000 ALTER TABLE `core_suppliers` ENABLE KEYS */;


--
-- Definition of table `core_transaction_types`
--

DROP TABLE IF EXISTS `core_transaction_types`;
CREATE TABLE `core_transaction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_transaction_types`
--

/*!40000 ALTER TABLE `core_transaction_types` DISABLE KEYS */;
INSERT INTO `core_transaction_types` (`id`,`name`) VALUES 
 (1,'Sales Order'),
 (2,'Sales Return'),
 (3,'Purchase Order'),
 (4,'Purchase Return'),
 (5,'Positive Stock Adjustment'),
 (6,'Negative Stock Adjustment');
/*!40000 ALTER TABLE `core_transaction_types` ENABLE KEYS */;


--
-- Definition of table `core_uom`
--

DROP TABLE IF EXISTS `core_uom`;
CREATE TABLE `core_uom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uom`
--

/*!40000 ALTER TABLE `core_uom` DISABLE KEYS */;
INSERT INTO `core_uom` (`id`,`name`) VALUES 
 (1,'Piece'),
 (2,'Kg'),
 (3,'Pack'),
 (4,'Litter');
/*!40000 ALTER TABLE `core_uom` ENABLE KEYS */;


--
-- Definition of table `core_users`
--

DROP TABLE IF EXISTS `core_users`;
CREATE TABLE `core_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) unsigned DEFAULT 1,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_users`
--

/*!40000 ALTER TABLE `core_users` DISABLE KEYS */;
INSERT INTO `core_users` (`id`,`username`,`role_id`,`password`,`email`,`full_name`,`created_at`,`photo`,`verify_code`,`inactive`,`mobile`,`updated_at`) VALUES 
 (128,'AR Rahaman',2,'2222','abdur@gmail.com','Abdur Rahaman','2022-03-27 23:46:54','0034034-jpeg.jpeg','12345',0,'0182659565225','2022-03-01 22:04:30'),
 (136,'rana',2,'33333',NULL,NULL,'2022-03-21 08:09:37',NULL,NULL,1,NULL,''),
 (137,'Arman',1,'4444',NULL,NULL,'2022-03-23 07:36:57',NULL,NULL,1,NULL,''),
 (147,'alif',3,'999',NULL,NULL,'2022-03-23 11:14:54',NULL,NULL,1,NULL,''),
 (149,'amir',4,'7878',NULL,NULL,'2022-03-27 22:17:44',NULL,NULL,1,NULL,''),
 (150,'kamal',4,'666',NULL,NULL,'2022-03-27 22:18:44',NULL,NULL,1,NULL,''),
 (151,'fahim',3,'666',NULL,NULL,'2022-03-27 22:33:00',NULL,NULL,1,NULL,''),
 (153,'asad',4,'123',NULL,NULL,'2022-03-29 23:34:55','asad.jpg',NULL,1,NULL,''),
 (154,'naim',3,'111','0',NULL,'2022-05-12 04:02:28','.png',NULL,1,NULL,'2022-05-12 04:02:28'),
 (156,'jak',3,'121','',NULL,'2022-05-12 10:30:50','156.png',NULL,1,NULL,'2022-05-12 04:30:50'),
 (158,'asa',3,'000','asar@gmail.com',NULL,'2022-05-12 10:34:21','158.png',NULL,1,NULL,'2022-05-12 04:34:21'),
 (159,'mehedi',3,'090','mehedi@gmail.com',NULL,'2022-05-12 10:38:50','159.png',NULL,1,NULL,'2022-05-12 04:38:50');
/*!40000 ALTER TABLE `core_users` ENABLE KEYS */;


--
-- Definition of table `core_warehouses`
--

DROP TABLE IF EXISTS `core_warehouses`;
CREATE TABLE `core_warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_warehouses`
--

/*!40000 ALTER TABLE `core_warehouses` DISABLE KEYS */;
INSERT INTO `core_warehouses` (`id`,`name`,`city`,`contact`) VALUES 
 (1,'Main Warehouse','Dhaka','4543534534'),
 (2,'uttara warehouse','dhaka','45457686');
/*!40000 ALTER TABLE `core_warehouses` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
