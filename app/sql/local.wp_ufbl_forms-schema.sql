/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_ufbl_forms` (
  `form_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `form_title` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `form_detail` text COLLATE utf8mb4_unicode_520_ci,
  `form_status` int(11) DEFAULT NULL,
  `form_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `form_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
