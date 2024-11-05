/*
SQLyog Community v12.4.3 (32 bit)
MySQL - 10.4.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `tbl_menus` (
	`menu_id` int (11),
	`parent_id` int (11),
	`sort_order` int (11),
	`title` varchar (765),
	`url` varchar (765),
	`icon` varchar (150),
	`parent` int (1),
	`parent_title` varchar (300),
	`parent_icon` varchar (300),
	`order_by` int (11),
	`role` varchar (300)
); 
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('12','3','2','Bales','Bale','arrow_right','0','Bale Management','web_asset','2','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('16','3','1','Categories','Category','arrow_right','0','Bale Management','web_asset','2','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('19','5','3','Users','User','group','0','User Management','group','3','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('20','6','0','Dashboard','Dashboard','home','1','Dashboard','home','1','0,1');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('22','4','1','Config','Config','arrow_right','0','Settings','settings','5','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('25','2','6','Bales Report','Report/bales','arrow_right','0','Reports','receipt_long','4','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('29','4','2','Branches','Branch','arrow_right','0','Settings','settings','5','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('30','4','4','Departments','Department','arrow_right','0','Settings','settings','4','0');
insert into `tbl_menus` (`menu_id`, `parent_id`, `sort_order`, `title`, `url`, `icon`, `parent`, `parent_title`, `parent_icon`, `order_by`, `role`) values('36','5','4','Clients','Client','group','0','User Management','group','3','0');
