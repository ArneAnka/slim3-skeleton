CREATE TABLE IF NOT EXISTS `notes` (
 `note_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `note_text` text NOT NULL,
 `user_id` int(11) unsigned NOT NULL,
 `creation_timestamp` varchar(20) DEFAULT NULL COMMENT 'timestamp of the creation of activity',
 PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='user notes';
