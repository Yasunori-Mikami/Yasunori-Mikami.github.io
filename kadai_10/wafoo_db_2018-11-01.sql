# ************************************************************
# Sequel Pro SQL dump
# バージョン 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# ホスト: 127.0.0.1 (MySQL 5.7.23)
# データベース: wafoo_db
# 作成時刻: 2018-11-01 14:31:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# テーブルのダンプ experience
# ------------------------------------------------------------

DROP TABLE IF EXISTS `experience`;

CREATE TABLE `experience` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL,
  `food_tag` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `host_explain` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language` int(11) NOT NULL,
  `event_explain` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country` int(11) NOT NULL,
  `prefecture` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `ward` int(11) DEFAULT NULL,
  `location_explain` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `location_frag` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `acceptance_number` int(11) NOT NULL,
  `modified` int(11) DEFAULT NULL,
  `bring_things` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picures1` int(64) NOT NULL,
  `picure1_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picures2` int(64) DEFAULT NULL,
  `picure2_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picures3` int(64) DEFAULT NULL,
  `picure3_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picures4` int(64) DEFAULT NULL,
  `picure4_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picures5` int(64) DEFAULT NULL,
  `picure5_text` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `others` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# テーブルのダンプ users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `facebook_id` int(11) DEFAULT NULL,
  `facebook_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` int(32) DEFAULT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nickname` varchar(64) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nationality` int(11) NOT NULL,
  `birthday` int(11) DEFAULT NULL,
  `birth_month` int(11) NOT NULL,
  `birth_day` int(11) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `job` int(11) DEFAULT NULL,
  `about` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deactivated` int(11) DEFAULT NULL,
  `allergy` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `host_flag` int(11) DEFAULT NULL,
  `bank_account` int(64) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `facebook_id`, `facebook_token`, `tel`, `last_name`, `first_name`, `nickname`, `gender`, `nationality`, `birthday`, `birth_month`, `birth_day`, `birth_year`, `age`, `job`, `about`, `profile_picture`, `created`, `modified`, `last_login`, `password`, `deactivated`, `allergy`, `religion`, `host_flag`, `bank_account`)
VALUES
	(1,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',1,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 21:40:39',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(2,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',1,NULL,2,3,1992,NULL,NULL,NULL,NULL,'2018-10-18 21:43:33',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(3,'mikami@schoolwith.me',NULL,NULL,NULL,'ああ','ああ','','other',3,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 21:47:56',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(4,'mikami@schoolwith.me',NULL,NULL,NULL,'MIKAMI','YASUNORI','','women',4,NULL,2,3,1992,NULL,NULL,NULL,NULL,'2018-10-18 21:48:33',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(5,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',3,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 22:14:53',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(6,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',3,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 22:15:56',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(7,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',3,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 22:16:10',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(8,'mikami@schoolwith.me',NULL,NULL,NULL,'MIKAMI','YASUNORI','','women',4,NULL,3,2,1993,NULL,NULL,NULL,NULL,'2018-10-18 22:17:40',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(9,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',3,NULL,2,3,1994,NULL,NULL,NULL,NULL,'2018-10-18 22:19:05',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(10,'mikami@schoolwith.me',NULL,NULL,NULL,'MIKAMI','YASUNORI','','women',3,NULL,2,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 22:52:03',NULL,NULL,'55',NULL,NULL,NULL,NULL,NULL),
	(11,'schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','other',3,NULL,3,2,1992,NULL,NULL,NULL,NULL,'2018-10-18 22:53:10',NULL,NULL,'55',NULL,NULL,NULL,NULL,NULL),
	(12,'hapi',NULL,NULL,NULL,'三上','泰徳','','other',1,NULL,2,2,1993,NULL,NULL,NULL,NULL,'2018-10-18 23:08:51',NULL,NULL,'4453',NULL,NULL,NULL,NULL,NULL),
	(13,'mikami@schoolwith.me',NULL,NULL,NULL,'oaoaoao','oaoaoao','','other',2,NULL,2,3,1994,NULL,NULL,NULL,NULL,'2018-10-19 00:27:51',NULL,NULL,'1111',NULL,NULL,NULL,NULL,NULL),
	(14,'koko',NULL,NULL,NULL,'三','上淳','','other',3,NULL,2,2,1993,NULL,NULL,NULL,NULL,'2018-10-19 00:59:55',NULL,NULL,'koko',NULL,NULL,NULL,NULL,NULL),
	(15,'koko',NULL,NULL,NULL,'yasunori','mikami','','other',3,NULL,3,1,1991,NULL,NULL,NULL,NULL,'2018-10-19 01:07:35',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL),
	(16,'koko',NULL,NULL,NULL,'yasunori','mikami','','other',3,NULL,3,1,1991,NULL,NULL,NULL,NULL,'2018-10-19 01:07:49',NULL,NULL,'koko2',NULL,NULL,NULL,NULL,NULL),
	(17,'7777',NULL,NULL,NULL,'三上','泰徳','','women',3,NULL,3,3,1994,NULL,NULL,NULL,NULL,'2018-10-19 01:09:30',NULL,NULL,'7777',NULL,NULL,NULL,NULL,NULL),
	(18,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','other',3,NULL,3,3,1992,NULL,NULL,NULL,NULL,'2018-10-19 01:10:55',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL),
	(19,'mikami@schoolwith.me',NULL,NULL,NULL,'三上','泰徳','','women',1,NULL,3,3,1993,NULL,NULL,NULL,NULL,'2018-10-21 19:02:03',NULL,NULL,'555555',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ wafoo_host_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wafoo_host_table`;

CREATE TABLE `wafoo_host_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sei` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mei` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mail` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sex` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `age` int(10) NOT NULL,
  `cookEx` text COLLATE utf8_unicode_ci,
  `cookGood` text COLLATE utf8_unicode_ci,
  `language` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `english` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `station` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `homeLesson` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `guestNum` int(10) DEFAULT NULL,
  `confDate` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `indate` datetime NOT NULL,
  `hostPreview` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `wafoo_host_table` WRITE;
/*!40000 ALTER TABLE `wafoo_host_table` DISABLE KEYS */;

INSERT INTO `wafoo_host_table` (`id`, `sei`, `mei`, `mail`, `sex`, `age`, `cookEx`, `cookGood`, `language`, `english`, `station`, `homeLesson`, `guestNum`, `confDate`, `indate`, `hostPreview`)
VALUES
	(1,'YAMADAAA','TAKAYUKI','mikami@schoolwith.me','男性',29,'特になし','できない','English','可能','HARAGYUKU','可能',0,'0','2018-09-25 20:33:39',0),
	(2,'TANAKA','MOMOJIRO','mikami@schoolwith.me','男性',22222,'','','','可能','','可能',0,'0','2018-09-25 20:33:59',0),
	(3,'三上泰徳','','mikami@schoolwith.me','男性',22222,'','','','','','',0,'0','2018-09-25 20:34:23',0),
	(6,'22','','22','22',22,'2','','','','','',0,'0','2018-09-25 20:38:07',0),
	(7,'22','','22','22',22,'2','','','','','',0,'0','2018-09-25 20:45:05',1),
	(8,'三上泰徳','','mikami@schoolwith.me','男性',22,'aaa','っっｊ','','','','',0,'0','2018-09-25 20:50:14',1),
	(9,'あああ','','あああ','ああ',22,'ああ','ああ','ああ','','','',0,'','2018-09-25 21:13:07',1),
	(10,'三上泰徳','','mikami@schoolwith.me','男性',22,'っｓ','っｓ','っｓ','','','',0,'','2018-09-25 21:15:21',1),
	(11,'三上泰徳','','mikami@schoolwith.me','男性',22,'','','aa','','','',0,'','2018-09-25 21:16:42',1),
	(12,'三上泰徳','','mikami@schoolwith.me','男性',22,'っｓ','っっｓ','ｓ','','','',NULL,'','2018-09-25 21:18:46',1),
	(13,'三上泰徳','','hapihapihappylife021@gmail.com','男性',22,'','','aa','a','s','s',22,'s','2018-09-25 21:32:03',1),
	(14,'aaa','','mikami@schoolwith.me','男性',22,'特になし','aa','aa','aa','aa','aa',2,'月曜！','2018-09-25 22:14:43',1),
	(15,'三上泰徳','','mikami@schoolwith.me','ああ',1,'あああ','ああ','ああ','ああ','ああ','ああ',22,'ff','2018-09-25 22:16:55',1),
	(16,'三上','','mikami@schoolwith.me','ｗｗ',2,'rr','rr','rr','f','f','f',22,'f','2018-09-25 22:22:26',1),
	(17,'三上','泰徳','mikami@schoolwith.me','aaa',1,'22','2','2','2','2','2',2,'2','2018-09-25 22:25:28',1),
	(18,'三上','泰徳','mikami@schoolwith.me','2',2,'aa','aa','aa','aa','aa','aa',1,'a','2018-09-26 20:59:22',1),
	(19,'三上','泰徳','mikami@schoolwith.me','男性',22,'aa','','aa','dd','ff','dd',2,'s','2018-09-27 20:49:57',1),
	(20,'三上','泰徳','unnkokokoo','2',666666,'','','d','d','d','d',2,'2','2018-09-27 20:50:45',1),
	(21,'三上','泰徳','mikami@schoolwith.me','男性',22,'s','s','s','uuuuuno','原当麻','可能',2,'ee','2018-09-27 20:57:47',1),
	(22,'三上','泰徳','mikami@schoolwith.me','どちらでもない',33,'写真','2枚くえｒ','英語','可能','恵比寿','可能',2,'aa','2018-09-27 21:01:23',1),
	(23,'三上','泰徳','mikami@schoolwith.me','男性',1,'aaa','aa','sss','可能','dd','可能',2,'gg','2018-09-27 21:17:59',1),
	(24,'三上','泰徳','aaaaaaaa@gmail.com','男性',29,'特になし','たこ焼き','英語','可能','新宿','可能',2,'222','2018-09-27 21:53:20',1),
	(25,'三上','泰徳','mikami@schoolwith.me','女性',90,'a','a','a','不可能','','不可能',2,'a','2018-09-27 22:28:20',1),
	(26,'yamada','Rintarou','mikami@schoolwith.me','男性',23,'aaa','aaaa','bolibia','不可能','a','可能',22222222,'日曜日：19:30-','2018-09-27 22:47:17',1),
	(27,'三上','泰徳','','男性',2,'','','日本','可能','a','可能',2,'あああ','2018-09-27 22:50:06',1),
	(28,'三上','泰徳','mikami@schoolwith.me','男性',22,'','','英語','可能','恵比寿','不可能',2,'','2018-09-29 14:03:50',1),
	(29,'三上','泰徳','mikami@schoolwith.me','男性',22,'aa','a','ff','可能','ee','可能',2,'33','2018-09-29 15:09:18',1),
	(30,'三上','泰徳','mikami@schoolwith.me','男性',33,'33','333','33','可能','33','可能',22,'33','2018-09-29 18:50:07',1),
	(31,'三上','泰徳','mikami@schoolwith.me','男性',22,'kkk','','','不可能','','不可能',22,'','2018-09-29 18:52:09',1),
	(36,'三上','泰徳','mikami@schoolwith.me','男性',2,'a','a','d','可能','d','可能',2,'d','2018-10-01 20:39:38',1),
	(37,'2','2','2','女性',2,'2','2','2','不可能','2','可能',2,'2','2018-10-01 20:41:37',0),
	(38,'a','a','a','どちらでもない',2,'a','a','a','不可能','a','可能',2,'a','2018-10-01 20:43:47',0),
	(39,'a','a','a','どちらでもない',22222,'a','a','a','不可能','a','不可能',2,'a','2018-10-01 20:46:49',0),
	(40,'三上','泰徳','mikami@schoolwith.me','男性',2,'s','s','s','不可能','s','不可能',22,'ss','2018-10-01 20:49:13',0),
	(41,'a','a','d','男性',22,'s','s','sss','可能','s','可能',2,'d','2018-10-01 20:59:04',0),
	(42,'MIKAMI','YASUNORI','okokoko','どちらでもない',22,'aaa','aaaa','aaa','可能','aaa','可能',2,'aa','2018-10-15 22:08:00',1),
	(43,'MIKAMI','YASUNORI','mikami@schoolwith.me','男性',22,'sssss','s','ss','不可能','ss','不可能',22,'w','2018-10-15 22:17:00',1),
	(44,'三上mo','泰徳','mikami@schoolwith.me','男性',22,'aa','aa','aa','不可能','aa','不可能',22,'a','2018-10-18 19:56:49',1),
	(45,'三上mo','泰徳','mikami@schoolwith.me','男性',22,'aa','aa','aa','不可能','aa','不可能',22,'a','2018-10-18 19:58:02',1),
	(46,'三上mo','泰徳','mikami@schoolwith.me','男性',22,'aa','aa','aa','不可能','aa','不可能',22,'a','2018-10-18 19:58:12',1),
	(47,'三上mo','泰徳','mikami@schoolwith.me','男性',22,'aa','aa','aa','不可能','aa','不可能',22,'a','2018-10-18 20:00:12',0);

/*!40000 ALTER TABLE `wafoo_host_table` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
