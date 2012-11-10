CREATE TABLE IF NOT EXISTS `tbl_project` (
  `id` INTEGER NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `create_time` DATETIME default NULL,
  `create_user_id` INTEGER default NULL,
  `update_time` DATETIME default NULL,
  `update_user_id` INTEGER default NULL,
  PRIMARY KEY  (`id`)
) ENGINE = InnoDB
;
