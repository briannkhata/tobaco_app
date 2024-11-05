/*
SQLyog Community v12.4.3 (32 bit)
MySQL - 10.4.32-MariaDB : Database - tobacodb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tobacodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tobacodb`;

/*Table structure for table `tbl_menus` */

DROP TABLE IF EXISTS `tbl_menus`;

CREATE TABLE `tbl_menus` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent` int(1) NOT NULL DEFAULT 0,
  `parent_title` varchar(100) DEFAULT NULL,
  `parent_icon` varchar(100) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tbl_menus` */

insert  into `tbl_menus`(`menu_id`,`parent_id`,`sort_order`,`title`,`url`,`icon`,`parent`,`parent_title`,`parent_icon`,`order_by`,`role`) values 
(1,3,2,'Bales','Bale','arrow_right',0,'Bale Management','web_asset',2,'0'),
(2,3,1,'Categories','Category','arrow_right',0,'Bale Management','web_asset',2,'0'),
(3,5,3,'Users','User','group',0,'User Management','group',3,'0'),
(4,6,0,'Dashboard','Dashboard','home',1,'Dashboard','home',1,'0,1'),
(5,4,1,'Config','Config','arrow_right',0,'Settings','settings',5,'0'),
(6,2,6,'Bales Report','Report/bales','arrow_right',0,'Reports','receipt_long',4,'0'),
(7,4,2,'Branches','Branch','arrow_right',0,'Settings','settings',5,'0'),
(8,4,4,'Departments','Department','arrow_right',0,'Settings','settings',4,'0'),
(9,5,4,'Clients','Client','group',0,'User Management','group',3,'0'),
(10,3,3,'Print Barcodes','Bale/barcodes','arrow_right',0,'Bale Management','web_asset',3,'0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
