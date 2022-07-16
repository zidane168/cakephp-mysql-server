
DROP TABLE IF EXISTS `analyst_report_languages`;
CREATE TABLE IF NOT EXISTS `analyst_report_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(191) DEFAULT NULL,
  `content` text,
  `analyst_report_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `analyst_reports` ADD `slug` VARCHAR(191) NULL AFTER `ECid`;
ALTER TABLE `analyst_report_files` ADD `extension` VARCHAR(10) NULL AFTER `analyst_report_id`;