/*
SQLyog Community v12.4.3 (32 bit)
MySQL - 10.4.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `tbl_settings` (
	`id` int (11),
	`address` text ,
	`phone` varchar (150),
	`alt_phone` varchar (150),
	`logo` varchar (900),
	`company` varchar (300),
	`email` varchar (300),
	`alt_email` varchar (300),
	`currency` varchar (300),
	`weight_units` varchar (300)
); 
insert into `tbl_settings` (`id`, `address`, `phone`, `alt_phone`, `logo`, `company`, `email`, `alt_email`, `currency`, `weight_units`) values('1','Blantyre\r\nMalawi','0995548992','+260777315753','./assets/uploads/Screenshot 2023-08-12 202203 - Copy (3).png','Nanga Unozge88888888888888888','briannkhata@gmail.com','briannkhata@gmail.com','$','KG');
