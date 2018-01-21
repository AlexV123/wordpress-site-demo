/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_ufbl_entries` (
  `entry_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(9) DEFAULT NULL,
  `entry_detail` text COLLATE utf8mb4_unicode_520_ci,
  `entry_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `entry_id` (`entry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
