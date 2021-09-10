/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.4.10-MariaDB : Database - mvctest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mvctest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mvctest`;

/*Table structure for table `view_3d` */

DROP TABLE IF EXISTS `view_3d`;

CREATE TABLE `view_3d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `playerid` int(7) unsigned NOT NULL,
  `agentid` int(7) unsigned NOT NULL,
  `currency` char(3) NOT NULL,
  `bet` decimal(10,2) DEFAULT NULL,
  `win` decimal(10,2) DEFAULT NULL,
  `rake` decimal(10,2) DEFAULT NULL,
  `tournament` decimal(10,2) DEFAULT NULL,
  `net` decimal(10,2) NOT NULL,
  `fin` decimal(10,2) DEFAULT NULL,
  `aams_ticket` varchar(40) NOT NULL,
  `aams_table` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `playerid` (`playerid`),
  KEY `agentid` (`agentid`)
) ENGINE=MyISAM AUTO_INCREMENT=10835 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
