/*
SQLyog Community v12.4.3 (32 bit)
MySQL - 10.4.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `vwbale_details` (
	`client_id` int (11),
	`trading_name` text ,
	`primary_contact` text ,
	`address` text ,
	`total_weight` double ,
	`qr_code` text ,
	`bale_id` int (11),
	`price` double ,
	`bale_description` text ,
	`category_name` text ,
	`category_description` text 
); 
