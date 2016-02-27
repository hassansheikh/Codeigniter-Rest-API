/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.9-MariaDB : Database - codeigniter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codeigniter`;

/*Table structure for table `airport` */

DROP TABLE IF EXISTS `airport`;

CREATE TABLE `airport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_key_id` int(11) NOT NULL,
  `airport_code` int(11) unsigned NOT NULL,
  `airport_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `airport` */

insert  into `airport`(`id`,`auth_key_id`,`airport_code`,`airport_name`,`country`,`city`) values (20,1,15632,'AIQ','pk','isb'),(21,2,15632,'AIQ','pk','isb'),(22,1,15632,'AIQ','pk','isb'),(23,1,15632,'AIQ','pk','isb');

/*Table structure for table `auth_key` */

DROP TABLE IF EXISTS `auth_key`;

CREATE TABLE `auth_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `auth_key` */

insert  into `auth_key`(`id`,`username`,`key`,`type`) values (1,'admin','123456789',1),(2,'user1','111111111',2);

/*Table structure for table `block_guest` */

DROP TABLE IF EXISTS `block_guest`;

CREATE TABLE `block_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(100) NOT NULL,
  `minute` smallint(4) NOT NULL,
  `count` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `block_guest` */

insert  into `block_guest`(`id`,`ip_address`,`minute`,`count`) values (1,'::1',48,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
