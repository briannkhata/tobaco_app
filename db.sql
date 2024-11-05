
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tobacodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tobacodb`;

/*Table structure for table `tbl_bales` */

DROP TABLE IF EXISTS `tbl_bales`;

CREATE TABLE `tbl_bales` (
  `bale_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `total_weight` double DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qr_code` text DEFAULT NULL,
  PRIMARY KEY (`bale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_branches` */

DROP TABLE IF EXISTS `tbl_branches`;

CREATE TABLE `tbl_branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_categories` */

DROP TABLE IF EXISTS `tbl_categories`;

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `description` text NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`category_id`),
  KEY `emp_id` (`category_name`(1024))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_clients` */

DROP TABLE IF EXISTS `tbl_clients`;

CREATE TABLE `tbl_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) DEFAULT 0,
  `address` text DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `trading_name` text DEFAULT NULL,
  `primary_contact` text DEFAULT NULL,
  `other_contact` text DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_departments` */

DROP TABLE IF EXISTS `tbl_departments`;

CREATE TABLE `tbl_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_menu_actions` */

DROP TABLE IF EXISTS `tbl_menu_actions`;

CREATE TABLE `tbl_menu_actions` (
  `menu_id` int(11) DEFAULT NULL,
  `action` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

/*Table structure for table `tbl_months` */

DROP TABLE IF EXISTS `tbl_months`;

CREATE TABLE `tbl_months` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(100) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_settings` */

DROP TABLE IF EXISTS `tbl_settings`;

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alt_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alt_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `weight_units` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `gender` varchar(10) DEFAULT NULL,
  `primary_contact` varchar(100) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `tbl_years` */

DROP TABLE IF EXISTS `tbl_years`;

CREATE TABLE `tbl_years` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `vwbale_details` */

DROP TABLE IF EXISTS `vwbale_details`;

/*!50001 DROP VIEW IF EXISTS `vwbale_details` */;
/*!50001 DROP TABLE IF EXISTS `vwbale_details` */;

50001 CREATE TABLE  `vwbale_details`(
 `client_id` int(11) ,
 `trading_name` text ,
 `primary_contact` text ,
 `address` text ,
 `total_weight` double ,
 `qr_code` text ,
 `bale_id` int(11) ,
 `price` double ,
 `bale_description` text ,
 `category_name` text ,
 `category_description` text 
)*/;

/*View structure for view vwbale_details */

/*!50001 DROP TABLE IF EXISTS `vwbale_details` */;
/*!50001 DROP VIEW IF EXISTS `vwbale_details` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwbale_details` AS select `c`.`client_id` AS `client_id`,`c`.`trading_name` AS `trading_name`,`c`.`primary_contact` AS `primary_contact`,`c`.`address` AS `address`,`b`.`total_weight` AS `total_weight`,`b`.`qr_code` AS `qr_code`,`b`.`bale_id` AS `bale_id`,`b`.`price` AS `price`,`b`.`description` AS `bale_description`,`cat`.`category_name` AS `category_name`,`cat`.`description` AS `category_description` from ((`tbl_clients` `c` join `tbl_bales` `b` on(`c`.`client_id` = `b`.`client_id`)) join `tbl_categories` `cat` on(`b`.`category_id` = `cat`.`category_id`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
