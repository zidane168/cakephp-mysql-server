
--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `code_forgot` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_code_forgot` datetime DEFAULT NULL,
  `time_input_code` int(2) DEFAULT NULL,
  `time_input_pass` int(2) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `company_id`, `token`, `name`, `email`, `phone`, `password`, `last_logged_in`, `code_forgot`, `created_code_forgot`, `time_input_code`, `time_input_pass`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, NULL, NULL, 'Admin', 'vi.lh@gmail.com', '0906440368', '$2y$10$RXyU983pgLqw1LBpX9WwfufTTL0/V2cniPNA3Gz0VAyKyEIUc/MMC', '2022-05-27 15:40:41', NULL, NULL, NULL, NULL, 1, '2022-04-29 15:19:35', 1, '2022-05-27 15:40:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `administrators_roles`
--

DROP TABLE IF EXISTS `administrators_roles`;
CREATE TABLE IF NOT EXISTS `administrators_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrator_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators_roles`
--

INSERT INTO `administrators_roles` (`id`, `administrator_id`, `role_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, '2021-08-26 10:35:07', 3, '2021-08-26 10:35:07', NULL),
(2, 1, 2, '2021-08-26 10:35:07', 3, '2021-08-26 10:35:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analyst_reports`
--

DROP TABLE IF EXISTS `analyst_reports`;
CREATE TABLE IF NOT EXISTS `analyst_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ECid` varchar(191) DEFAULT NULL,
  `analyst_report_category_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_categories`
--

DROP TABLE IF EXISTS `analyst_report_categories`;
CREATE TABLE IF NOT EXISTS `analyst_report_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_category_languages`
--

DROP TABLE IF EXISTS `analyst_report_category_languages`;
CREATE TABLE IF NOT EXISTS `analyst_report_category_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analyst_report_category_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_files`
--

DROP TABLE IF EXISTS `analyst_report_files`;
CREATE TABLE IF NOT EXISTS `analyst_report_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analyst_report_id` int(11) NOT NULL,
  `path` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `enabled`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_languages`
--

DROP TABLE IF EXISTS `category_languages`;
CREATE TABLE IF NOT EXISTS `category_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_languages`
--

INSERT INTO `category_languages` (`id`, `category_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '車位投資'),
(2, 2, 'zh_HK', '買車位'),
(3, 3, 'zh_HK', '安歇'),
(4, 4, 'zh_HK', '車位數目'),
(5, 5, 'zh_HK', '共享車位'),
(6, 6, 'zh_HK', '月租車位');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wechat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weibo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `email`, `facebook`, `instagram`, `twitter`, `website`, `weixin`, `wechat`, `weibo`, `whatsapp`, `youtube`, `remark`, `contact_person`, `contact_job_title`, `contact_email`, `contact_phone`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'VTL@gmail.com', 'VTL facebook', 'VTL Instagram', 'VTL Twitter', 'VTL Website', 'VTL Weixin', 'VTL Wechat', 'VTL Weibo', 'VTL Whatsapp', 'VTL Youtube', 'Thanks for VTL Solution', 'Vincent Lam', 'CEO ', 'vincent.lam@vtl-vtl.com', '0906222888', 1, '2021-05-10 22:10:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_languages`
--

DROP TABLE IF EXISTS `company_languages`;
CREATE TABLE IF NOT EXISTS `company_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `privacy` text COLLATE utf8mb4_unicode_ci,
  `hotline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_languages`
--

INSERT INTO `company_languages` (`id`, `company_id`, `alias`, `name`, `description`, `address`, `about`, `terms`, `privacy`, `hotline`) VALUES
(1, 1, 'zh_HK', 'VTL (zho)', 'VTL', 'VTL', 'VTL', 'VTL', 'VTL', 'VTL'),
(2, 1, 'en_US', 'VTL (eng)', 'VTL', 'VTL', 'VTL', 'VTL', 'VTL', 'VTL');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 1, 'dong-qu', 1, NULL, NULL, NULL, NULL),
(3, 1, 'wang-zhi', 1, NULL, NULL, NULL, NULL),
(4, 1, 'zhong-xi-qu', 1, NULL, NULL, NULL, NULL),
(5, 1, 'nan-qu', 1, NULL, NULL, NULL, NULL),
(7, 2, 'you-jian-wang', 1, NULL, NULL, NULL, NULL),
(8, 2, 'sheng-shui-bu', 1, NULL, NULL, NULL, NULL),
(9, 2, 'jiu-long-cheng', 1, NULL, NULL, NULL, NULL),
(10, 2, 'wang-da-xiang', 1, NULL, NULL, NULL, NULL),
(11, 2, 'guang-tang', 1, NULL, NULL, NULL, NULL),
(13, 3, 'xi-gong', 1, NULL, NULL, NULL, NULL),
(14, 3, 'sha-tian', 1, NULL, NULL, NULL, NULL),
(15, 3, 'da-pu', 1, NULL, NULL, NULL, NULL),
(16, 3, 'bei-qu', 1, NULL, NULL, NULL, NULL),
(17, 3, 'yuan-lang', 1, NULL, NULL, NULL, NULL),
(18, 3, 'tun-men', 1, NULL, NULL, NULL, NULL),
(19, 3, 'quánwān', 1, NULL, NULL, NULL, NULL),
(20, 3, 'Kui-qing', 1, NULL, NULL, NULL, NULL),
(21, 3, 'li-dao', 1, NULL, NULL, '2022-05-05 16:47:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district_languages`
--

DROP TABLE IF EXISTS `district_languages`;
CREATE TABLE IF NOT EXISTS `district_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district_languages`
--

INSERT INTO `district_languages` (`id`, `district_id`, `alias`, `name`, `description`) VALUES
(2, 2, 'zh_HK', '東區', NULL),
(3, 3, 'zh_HK', '灣仔', NULL),
(4, 4, 'zh_HK', '中西區', NULL),
(5, 5, 'zh_HK', '南區', NULL),
(7, 7, 'zh_HK', '油尖旺', NULL),
(8, 8, 'zh_HK', '深水埗', NULL),
(9, 9, 'zh_HK', '九龍城', NULL),
(10, 10, 'zh_HK', '黃大仙', NULL),
(11, 11, 'zh_HK', '觀塘', NULL),
(13, 13, 'zh_HK', '西貢', NULL),
(14, 14, 'zh_HK', '沙田', NULL),
(15, 15, 'zh_HK', '大埔', NULL),
(16, 16, 'zh_HK', '北區', NULL),
(17, 17, 'zh_HK', '元朗', NULL),
(18, 18, 'zh_HK', '屯門', NULL),
(19, 19, 'zh_HK', '荃灣', NULL),
(20, 20, 'zh_HK', '葵青', NULL),
(21, 21, 'zh_HK', '離島', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_types`
--

DROP TABLE IF EXISTS `image_types`;
CREATE TABLE IF NOT EXISTS `image_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'members-avatar', 1, NULL, NULL, NULL, NULL),
(2, 'members-agent-certification', 1, NULL, NULL, NULL, NULL),
(3, 'products-screenshot', 1, NULL, NULL, NULL, NULL),
(4, 'news-screenshot', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_type_languages`
--

DROP TABLE IF EXISTS `image_type_languages`;
CREATE TABLE IF NOT EXISTS `image_type_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_type_languages`
--

INSERT INTO `image_type_languages` (`id`, `image_type_id`, `alias`, `name`, `description`) VALUES
(1, 1, 'zh_HK', '會員頭像', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(2, 2, 'zh_HK', '地產代理證', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(3, 3, 'zh_HK', '車位圖片', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(4, 4, 'zh_HK', '新聞圖片', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL),
(2, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `label_languages`
--

DROP TABLE IF EXISTS `label_languages`;
CREATE TABLE IF NOT EXISTS `label_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_languages`
--

INSERT INTO `label_languages` (`id`, `label_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '特大車位'),
(2, 2, 'zh_HK', '超小車位');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `alias`, `name`, `is_default`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'zh_HK', 'Hong kong', 1, 1, NULL, NULL, NULL, NULL),
(2, 'en_US', 'English', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `plugin` varchar(50) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `new_data` text CHARACTER SET utf8,
  `old_data` text CHARACTER SET utf8,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `remote_ip` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `agent` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `version` varchar(191) DEFAULT NULL,
  `platform` varchar(191) DEFAULT NULL,
  `browser` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_apis`
--

DROP TABLE IF EXISTS `log_apis`;
CREATE TABLE IF NOT EXISTS `log_apis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `params` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `old_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `new_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1' COMMENT '1: succeed, 0: failed',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_errors`
--

DROP TABLE IF EXISTS `log_errors`;
CREATE TABLE IF NOT EXISTS `log_errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_successes`
--

DROP TABLE IF EXISTS `log_successes`;
CREATE TABLE IF NOT EXISTS `log_successes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(191) DEFAULT NULL,
  `area_code` varchar(11) DEFAULT NULL,
  `google` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `token` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `default_language` smallint(6) NOT NULL DEFAULT '1' COMMENT '1: zh_HK',
  `company_ECid` varchar(191) DEFAULT NULL,
  `person_ECid` varchar(191) DEFAULT NULL,
  `company_phone` varchar(191) DEFAULT NULL,
  `company_address` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members_favours`
--

DROP TABLE IF EXISTS `members_favours`;
CREATE TABLE IF NOT EXISTS `members_favours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_images`
--

DROP TABLE IF EXISTS `member_images`;
CREATE TABLE IF NOT EXISTS `member_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `is_social` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'if == true : this is full link image, not: image get from server (so must have domain link)',
  `name` varchar(191) DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_languages`
--

DROP TABLE IF EXISTS `member_languages`;
CREATE TABLE IF NOT EXISTS `member_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_messages`
--

DROP TABLE IF EXISTS `member_messages`;
CREATE TABLE IF NOT EXISTS `member_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `content` varchar(191) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_verifications`
--

DROP TABLE IF EXISTS `member_verifications`;
CREATE TABLE IF NOT EXISTS `member_verifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_code` varchar(11) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `verification_type` int(11) NOT NULL COMMENT '1: forgot; 2: register(if any)',
  `verification_method` int(11) NOT NULL COMMENT '1: sms, 2: email',
  `is_used` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not yet used it',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '1: enbaled',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) DEFAULT NULL,
  `is_hot_news` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

DROP TABLE IF EXISTS `news_images`;
CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `image_type_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `path` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_languages`
--

DROP TABLE IF EXISTS `news_languages`;
CREATE TABLE IF NOT EXISTS `news_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `option_languages`
--

DROP TABLE IF EXISTS `option_languages`;
CREATE TABLE IF NOT EXISTS `option_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parking_requirements`
--

DROP TABLE IF EXISTS `parking_requirements`;
CREATE TABLE IF NOT EXISTS `parking_requirements` (
  `id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` decimal(12,0) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `name`, `p_controller`, `p_model`, `action`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Role', 'Role', 'Roles', 'Roles', 'view', NULL, NULL, NULL, NULL),
(2, 'Role', 'Role', 'Roles', 'Roles', 'add', NULL, NULL, NULL, NULL),
(3, 'Role', 'Role', 'Roles', 'Roles', 'edit', NULL, NULL, NULL, NULL),
(4, 'Role', 'Role', 'Roles', 'Roles', 'delete', NULL, NULL, NULL, NULL),
(5, 'Permission', 'Permission', 'Permissions', 'Permissions', 'view', NULL, NULL, NULL, NULL),
(6, 'Permission', 'Permission', 'Permissions', 'Permissions', 'add', NULL, NULL, NULL, NULL),
(7, 'Permission', 'Permission', 'Permissions', 'Permissions', 'edit', NULL, NULL, NULL, NULL),
(8, 'Permission', 'Permission', 'Permissions', 'Permissions', 'delete', NULL, NULL, NULL, NULL),
(9, 'Administrator', 'Administrator', 'Administrators', 'Administrators', 'view', NULL, NULL, NULL, NULL),
(10, 'Administrator', 'Administrator', 'Administrators', 'Administrators', 'add', NULL, NULL, NULL, NULL),
(11, 'Administrator', 'Administrator', 'Administrators', 'Administrators', 'edit', NULL, NULL, NULL, NULL),
(12, 'Administrator', 'Administrator', 'Administrators', 'Administrators', 'delete', NULL, NULL, NULL, NULL),
(13, 'Company', 'Company', 'Companies', 'Companies', 'view', '2021-05-10 21:51:36', NULL, NULL, NULL),
(14, 'Company', 'Company', 'Companies', 'Companies', 'add', '2021-05-10 21:51:36', NULL, NULL, NULL),
(15, 'Company', 'Company', 'Companies', 'Companies', 'edit', '2021-05-10 21:51:36', NULL, NULL, NULL),
(16, 'Company', 'Company', 'Companies', 'Companies', 'delete', '2021-05-10 21:51:36', NULL, NULL, NULL),
(17, 'Language', 'Language', 'Languages', 'Languages', 'view', '2021-05-17 14:46:26', 1, '2021-05-17 14:46:26', NULL),
(18, 'Language', 'Language', 'Languages', 'Languages', 'add', '2021-05-17 14:46:26', 1, '2021-05-17 14:46:26', NULL),
(19, 'Language', 'Language', 'Languages', 'Languages', 'edit', '2021-05-17 14:46:26', 1, '2021-05-17 14:46:26', NULL),
(20, 'Language', 'Language', 'Languages', 'Languages', 'delete', '2021-05-17 14:46:26', 1, '2021-05-17 14:46:26', NULL),
(21, 'perm-admin-Product-view', 'Product-View', 'Products', 'Products', 'view', '2022-05-04 18:28:23', 1, '2022-05-04 18:28:23', NULL),
(22, 'perm-admin-Product-add', 'Product-Add', 'Products', 'Products', 'add', '2022-05-04 18:28:23', 1, '2022-05-04 18:28:23', NULL),
(23, 'perm-admin-Product-edit', 'Product-Edit', 'Products', 'Products', 'edit', '2022-05-04 18:28:23', 1, '2022-05-04 18:28:23', NULL),
(24, 'perm-admin-Product-delete', 'Product-Delete', 'Products', 'Products', 'delete', '2022-05-04 18:28:23', 1, '2022-05-04 18:28:23', NULL),
(25, 'perm-admin-Regions-view', 'Region-View', 'Regions', 'Regions', 'view', '2022-05-05 11:09:38', 1, '2022-05-05 11:09:38', NULL),
(26, 'perm-admin-Regions-add', 'Region-Add', 'Regions', 'Regions', 'add', '2022-05-05 11:09:38', 1, '2022-05-05 11:09:38', NULL),
(27, 'perm-admin-Regions-edit', 'Region-Edit', 'Regions', 'Regions', 'edit', '2022-05-05 11:09:38', 1, '2022-05-05 11:09:38', NULL),
(28, 'perm-admin-Regions-delete', 'Region-Delete', 'Regions', 'Regions', 'delete', '2022-05-05 11:09:38', 1, '2022-05-05 11:09:38', NULL),
(29, 'perm-admin-Districts-view', 'District-View', 'Districts', 'Districts', 'view', '2022-05-05 11:09:53', 1, '2022-05-05 11:09:53', NULL),
(30, 'perm-admin-Districts-add', 'District-Add', 'Districts', 'Districts', 'add', '2022-05-05 11:09:53', 1, '2022-05-05 11:09:53', NULL),
(31, 'perm-admin-Districts-edit', 'District-Edit', 'Districts', 'Districts', 'edit', '2022-05-05 11:09:53', 1, '2022-05-05 11:09:53', NULL),
(32, 'perm-admin-Districts-delete', 'District-Delete', 'Districts', 'Districts', 'delete', '2022-05-05 11:09:53', 1, '2022-05-05 11:09:53', NULL),
(33, 'perm-admin-Subdistricts-view', 'Subdistrict-View', 'Subdistricts', 'Subdistricts', 'view', '2022-05-05 11:10:09', 1, '2022-05-05 11:10:09', NULL),
(34, 'perm-admin-Subdistricts-add', 'Subdistrict-Add', 'Subdistricts', 'Subdistricts', 'add', '2022-05-05 11:10:09', 1, '2022-05-05 11:10:09', NULL),
(35, 'perm-admin-Subdistricts-edit', 'Subdistrict-Edit', 'Subdistricts', 'Subdistricts', 'edit', '2022-05-05 11:10:09', 1, '2022-05-05 11:10:09', NULL),
(36, 'perm-admin-Subdistricts-delete', 'Subdistrict-Delete', 'Subdistricts', 'Subdistricts', 'delete', '2022-05-05 11:10:09', 1, '2022-05-05 11:10:09', NULL),
(37, 'perm-admin-Members-view', 'Member-View', 'Members', 'Members', 'view', '2022-05-09 12:52:08', 1, '2022-05-09 12:52:08', NULL),
(38, 'perm-admin-Members-add', 'Member-Add', 'Members', 'Members', 'add', '2022-05-09 12:52:08', 1, '2022-05-09 12:52:08', NULL),
(39, 'perm-admin-Members-edit', 'Member-Edit', 'Members', 'Members', 'edit', '2022-05-09 12:52:08', 1, '2022-05-09 12:52:08', NULL),
(40, 'perm-admin-Members-delete', 'Member-Delete', 'Members', 'Members', 'delete', '2022-05-09 12:52:08', 1, '2022-05-09 12:52:08', NULL),
(41, 'perm-admin-MemberVerifications-view', 'Member Verifications-View', 'MemberVerifications', 'MemberVerifications', 'view', '2022-05-19 17:09:43', 1, '2022-05-19 17:09:43', NULL),
(42, 'perm-admin-MemberVerifications-add', 'Member Verifications-Add', 'MemberVerifications', 'MemberVerifications', 'add', '2022-05-19 17:09:43', 1, '2022-05-19 17:09:43', NULL),
(43, 'perm-admin-MemberVerifications-edit', 'Member Verifications-Edit', 'MemberVerifications', 'MemberVerifications', 'edit', '2022-05-19 17:09:43', 1, '2022-05-19 17:09:43', NULL),
(44, 'perm-admin-MemberVerifications-delete', 'Member Verifications-Delete', 'MemberVerifications', 'MemberVerifications', 'delete', '2022-05-19 17:09:43', 1, '2022-05-19 17:09:43', NULL),
(45, 'perm-admin-News-view', 'News-View', 'News', 'News', 'view', '2022-05-25 14:33:44', 1, '2022-05-25 14:33:44', NULL),
(46, 'perm-admin-News-add', 'News-Add', 'News', 'News', 'add', '2022-05-25 14:33:44', 1, '2022-05-25 14:33:44', NULL),
(47, 'perm-admin-News-edit', 'News-Edit', 'News', 'News', 'edit', '2022-05-25 14:33:44', 1, '2022-05-25 14:33:44', NULL),
(48, 'perm-admin-News-delete', 'News-Delete', 'News', 'News', 'delete', '2022-05-25 14:33:44', 1, '2022-05-25 14:33:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ECid` varchar(50) DEFAULT NULL,
  `product_type_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text,
  `number_of_houldhold` int(11) NOT NULL,
  `number_of_parkingcar` int(11) NOT NULL,
  `is_star_recommendation` tinyint(1) NOT NULL DEFAULT '0',
  `properties` int(11) NOT NULL COMMENT '物業座數',
  `total_number_of_parking_space` int(11) NOT NULL COMMENT '車位總數',
  `management_fee` int(11) NOT NULL COMMENT '管理費',
  `government_rates` int(11) NOT NULL COMMENT '地租差餉',
  `agency_commission` int(11) DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL,
  `contact_title` varchar(191) DEFAULT NULL COMMENT '1: mr;, 2: miss, 3: mrs',
  `contact_person` varchar(191) DEFAULT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `contact_phone` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_labels`
--

DROP TABLE IF EXISTS `products_labels`;
CREATE TABLE IF NOT EXISTS `products_labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_type_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `path` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

DROP TABLE IF EXISTS `product_options`;
CREATE TABLE IF NOT EXISTS `product_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

DROP TABLE IF EXISTS `product_types`;
CREATE TABLE IF NOT EXISTS `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'rent', 1, NULL, NULL, NULL, NULL),
(2, 'sell', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_type_languages`
--

DROP TABLE IF EXISTS `product_type_languages`;
CREATE TABLE IF NOT EXISTS `product_type_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type_languages`
--

INSERT INTO `product_type_languages` (`id`, `product_type_id`, `alias`, `name`, `description`) VALUES
(1, 1, 'zh_HK', '出租', NULL),
(2, 2, 'zh_HK', '出售', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'gang-dao', 1, NULL, NULL, NULL, NULL),
(2, 'jiu-long', 1, NULL, NULL, NULL, NULL),
(3, 'xing-jie', 1, NULL, NULL, '2022-05-09 15:36:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `region_languages`
--

DROP TABLE IF EXISTS `region_languages`;
CREATE TABLE IF NOT EXISTS `region_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_languages`
--

INSERT INTO `region_languages` (`id`, `region_id`, `alias`, `name`, `description`) VALUES
(1, 1, 'zh_HK', '港島', NULL),
(2, 2, 'zh_HK', '九龍', NULL),
(3, 3, 'zh_HK', '新界', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'role-admin', 'Admin', '2021-05-03 17:24:14', 1, NULL, NULL),
(2, 'role-company-admin', 'Company Admin', '2021-05-12 17:24:17', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
CREATE TABLE IF NOT EXISTS `roles_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(2, 1, 2, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(3, 1, 3, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(4, 1, 4, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(5, 1, 5, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(6, 1, 6, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(7, 1, 7, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(8, 1, 8, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(9, 1, 9, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(10, 1, 10, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(11, 1, 11, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(12, 1, 12, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(13, 1, 13, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(14, 1, 14, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(15, 1, 15, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(16, 1, 16, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(17, 1, 17, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(18, 1, 18, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(19, 1, 19, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(20, 1, 20, '2021-05-24 17:00:34', 1, '2021-05-24 17:00:34', NULL),
(113, 2, 30, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(114, 2, 32, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(115, 2, 31, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(116, 2, 29, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(117, 2, 42, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(118, 2, 44, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(119, 2, 43, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(120, 2, 41, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(121, 2, 38, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(122, 2, 40, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(123, 2, 39, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(124, 2, 37, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(125, 2, 46, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(126, 2, 48, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(127, 2, 47, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(128, 2, 45, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(129, 2, 22, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(130, 2, 24, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(131, 2, 23, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(132, 2, 21, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(133, 2, 26, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(134, 2, 28, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(135, 2, 27, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(136, 2, 25, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(137, 2, 1, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(138, 2, 2, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(139, 2, 3, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(140, 2, 4, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(141, 2, 34, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(142, 2, 36, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(143, 2, 35, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL),
(144, 2, 33, '2022-05-25 14:34:29', 1, '2022-05-25 14:34:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdistricts`
--

DROP TABLE IF EXISTS `subdistricts`;
CREATE TABLE IF NOT EXISTS `subdistricts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdistricts`
--

INSERT INTO `subdistricts` (`id`, `district_id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 2, 'bei-joao-pao-tai-shang', 1, NULL, NULL, NULL, NULL),
(3, 2, 'bao-ma-shang', 1, NULL, NULL, NULL, NULL),
(4, 2, 'Zéi-yú-yong', 1, NULL, NULL, NULL, NULL),
(5, 2, 'cai-wang', 1, NULL, NULL, NULL, NULL),
(6, 2, 'tai-gu', 1, NULL, NULL, NULL, NULL),
(7, 2, 'Shāojī wān', 1, NULL, NULL, NULL, NULL),
(8, 2, 'Xìng huā cūn', 1, NULL, NULL, NULL, NULL),
(10, 3, 'Zhā diān shān', 1, NULL, NULL, NULL, NULL),
(11, 3, 'pao-ma-shang', 1, NULL, NULL, NULL, NULL),
(12, 3, 'wang-zai', 1, NULL, NULL, NULL, NULL),
(13, 3, 'Tóngluówān', 1, NULL, NULL, NULL, NULL),
(14, 3, 'Tiānhòu', 1, NULL, NULL, NULL, NULL),
(16, 4, 'zhong wan', 1, NULL, NULL, NULL, NULL),
(17, 4, 'ban zhong shang', 1, NULL, NULL, NULL, NULL),
(18, 4, 'jian li di cheng', 1, NULL, NULL, NULL, NULL),
(19, 4, 'xi ying pang', 1, NULL, NULL, NULL, NULL),
(20, 4, 'xi bang shang', 1, NULL, NULL, NULL, NULL),
(21, 4, 'shang wang', 1, NULL, NULL, NULL, NULL),
(22, 4, 'shang ding', 1, NULL, NULL, NULL, NULL),
(24, 5, 'qian shui wan', 1, NULL, NULL, NULL, NULL),
(25, 5, 'Shòu chén shān', 1, NULL, NULL, NULL, NULL),
(26, 5, 'Yì zhù, chōng kàn jiǎo', 1, NULL, NULL, NULL, NULL),
(27, 5, 'Bèi shā wān, pǔ fú lín', 1, NULL, NULL, NULL, NULL),
(28, 5, 'Huáng zhú kēng, shēn wān', 1, NULL, NULL, NULL, NULL),
(29, 5, 'Xiānggǎng zǐ, tián wān', 1, NULL, NULL, NULL, NULL),
(30, 5, 'Yā lì zhōu', 1, NULL, NULL, NULL, NULL),
(31, 5, 'Dà tán, shí ào', 1, NULL, NULL, NULL, NULL),
(32, 7, 'quan you jian wan', 1, NULL, NULL, NULL, NULL),
(33, 7, 'tai zhi', 1, NULL, NULL, NULL, NULL),
(34, 7, 'Hóngkàn/jiān dōng', 1, NULL, NULL, NULL, NULL),
(35, 7, 'Jiānshājǔ, zuǒ dūn', 1, NULL, NULL, NULL, NULL),
(36, 7, 'Jīng shì bǎi', 1, NULL, NULL, NULL, NULL),
(37, 7, 'jiu long zhan', 1, NULL, NULL, NULL, NULL),
(38, 7, 'ou yun', 1, NULL, NULL, NULL, NULL),
(39, 7, 'Dàjiǎo jǔ', 1, NULL, NULL, NULL, NULL),
(40, 7, 'wan jiao', 1, NULL, NULL, NULL, NULL),
(41, 8, 'Yóumáde', 1, NULL, NULL, NULL, NULL),
(43, 8, 'Lìzhī jiǎo', 1, NULL, NULL, NULL, NULL),
(44, 8, 'chang sha wang', 1, NULL, NULL, NULL, NULL),
(45, 8, 'sheng shui bu', 1, NULL, NULL, NULL, NULL),
(46, 8, 'Yòu yī cūn', 1, NULL, NULL, NULL, NULL),
(47, 8, 'Shí xiá wěi', 1, NULL, NULL, NULL, NULL),
(48, 8, 'Měifú', 1, NULL, NULL, NULL, NULL),
(50, 9, 'Hóngkàn', 1, NULL, NULL, NULL, NULL),
(51, 9, 'he wen tian', 1, NULL, NULL, NULL, NULL),
(52, 9, 'jiu long tang / bi jia shang', 1, NULL, NULL, NULL, NULL),
(53, 9, 'tu qua wang', 1, NULL, NULL, NULL, NULL),
(54, 9, 'jiu long cheng', 1, NULL, NULL, NULL, NULL),
(55, 9, 'qi de', 1, NULL, NULL, NULL, NULL),
(57, 10, 'huang da xiang', 1, NULL, NULL, NULL, NULL),
(58, 10, 'le fu', 1, NULL, NULL, NULL, NULL),
(59, 10, 'Zuànshí shān', 1, NULL, NULL, NULL, NULL),
(60, 10, 'niu qi wang', 1, NULL, NULL, NULL, NULL),
(61, 10, 'xiang pu gang', 1, NULL, NULL, NULL, NULL),
(63, 11, 'jiu long wan', 1, NULL, NULL, NULL, NULL),
(64, 11, 'you tang', 1, NULL, NULL, NULL, NULL),
(65, 11, 'lan tian', 1, NULL, NULL, NULL, NULL),
(66, 11, 'guan tang', 1, NULL, NULL, NULL, NULL),
(67, 11, 'Niú tóujiǎo', 1, NULL, NULL, NULL, NULL),
(68, 11, 'Xiù mào píng', 1, NULL, NULL, NULL, NULL),
(69, 11, 'Àn dáchén', 1, NULL, NULL, NULL, NULL),
(71, 13, 'xi gong', 1, NULL, NULL, NULL, NULL),
(72, 13, 'qing shui wang', 1, NULL, NULL, NULL, NULL),
(73, 13, 'Jiāngjūn\'ào shì zhōngxīn', 1, NULL, NULL, NULL, NULL),
(74, 13, 'bao ling', 1, NULL, NULL, NULL, NULL),
(75, 13, 'Kēngkǒu', 1, NULL, NULL, NULL, NULL),
(76, 13, 'Diào jǐng lǐng', 1, NULL, NULL, NULL, NULL),
(77, 13, 'kang cheng', 1, NULL, NULL, NULL, NULL),
(79, 14, 'Jiǔ dù shān', 1, NULL, NULL, NULL, NULL),
(80, 14, 'Huǒtàn', 1, NULL, NULL, NULL, NULL),
(81, 14, 'da wei', 1, NULL, NULL, NULL, NULL),
(82, 14, 'sha tian', 1, NULL, NULL, NULL, NULL),
(83, 14, 'ma an shang', 1, NULL, NULL, NULL, NULL),
(85, 15, 'da bu', 1, NULL, NULL, NULL, NULL),
(86, 15, 'Dà bù xū', 1, NULL, NULL, NULL, NULL),
(87, 15, 'Dàpǔ jiào, báishí jiǎo', 1, NULL, NULL, NULL, NULL),
(89, 16, 'shang shui', 1, NULL, NULL, NULL, NULL),
(90, 16, 'fen ling', 1, NULL, NULL, NULL, NULL),
(91, 16, 'gu dong', 1, NULL, NULL, NULL, NULL),
(92, 16, 'da gu ling', 1, NULL, NULL, NULL, NULL),
(93, 16, 'sha tuo jiao', 1, NULL, NULL, NULL, NULL),
(95, 17, 'tian shui wei', 1, NULL, NULL, NULL, NULL),
(96, 17, 'yuan liang shi zhong xin', 1, NULL, NULL, NULL, NULL),
(97, 17, 'jing tian', 1, NULL, NULL, NULL, NULL),
(98, 17, 'hong shui qiao', 1, NULL, NULL, NULL, NULL),
(99, 17, 'Jǐnxiù, jiāzhōu, pútáo yuán', 1, NULL, NULL, NULL, NULL),
(101, 18, 'tun men ma tou', 1, NULL, NULL, NULL, NULL),
(102, 18, 'tun men shi zhong xin', 1, NULL, NULL, NULL, NULL),
(103, 18, 'Sǎo guǎn hù', 1, NULL, NULL, NULL, NULL),
(104, 18, 'lan di', 1, NULL, NULL, NULL, NULL),
(106, 19, 'quánwān', 1, NULL, NULL, NULL, NULL),
(107, 19, 'sheng jing / qing long tou', 1, NULL, NULL, NULL, NULL),
(108, 19, 'ma wan', 1, NULL, NULL, NULL, NULL),
(110, 20, 'Kuíyǒng', 1, NULL, NULL, NULL, NULL),
(111, 20, 'qing yi', 1, NULL, NULL, NULL, NULL),
(113, 21, 'Dàyǔshān/lídǎo', 1, NULL, NULL, NULL, NULL),
(114, 21, 'Yú jǐng wān', 1, NULL, NULL, NULL, NULL),
(115, 21, 'dong yong', 1, NULL, NULL, '2022-05-05 16:53:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict_languages`
--

DROP TABLE IF EXISTS `subdistrict_languages`;
CREATE TABLE IF NOT EXISTS `subdistrict_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subdistrict_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdistrict_languages`
--

INSERT INTO `subdistrict_languages` (`id`, `subdistrict_id`, `alias`, `name`, `description`) VALUES
(2, 2, 'zh_HK', '北角/炮台山', NULL),
(3, 3, 'zh_HK', '寶馬上/北角半山', NULL),
(4, 4, 'zh_HK', '鰂魚涌', NULL),
(5, 5, 'zh_HK', '柴灣', NULL),
(6, 6, 'zh_HK', '太古/西灣河', NULL),
(7, 7, 'zh_HK', '筲箕灣', NULL),
(8, 8, 'zh_HK', '杏花邨', NULL),
(10, 10, 'zh_HK', '渣甸山/大坑', NULL),
(11, 11, 'zh_HK', '跑馬山/東半山', NULL),
(12, 12, 'zh_HK', '灣仔', NULL),
(13, 13, 'zh_HK', '銅鑼灣', NULL),
(14, 14, 'zh_HK', '天后', NULL),
(16, 16, 'zh_HK', '中環/金環', NULL),
(17, 17, 'zh_HK', '中半山', NULL),
(18, 18, 'zh_HK', '堅尼地城', NULL),
(19, 19, 'zh_HK', '西營盤', NULL),
(20, 20, 'zh_HK', '西半山', NULL),
(21, 21, 'zh_HK', '上環', NULL),
(22, 22, 'zh_HK', '山頂', NULL),
(24, 24, 'zh_HK', '淺水灣', NULL),
(25, 25, 'zh_HK', '壽臣山', NULL),
(26, 26, 'zh_HK', '亦柱，舂磡角', NULL),
(27, 27, 'zh_HK', '貝沙灣/溥扶林', NULL),
(28, 28, 'zh_HK', '黄竹坑/深灣', NULL),
(29, 29, 'zh_HK', '香港仔/田灣', NULL),
(30, 30, 'zh_HK', '鴨脷洲', NULL),
(31, 31, 'zh_HK', '大潭/石澳', NULL),
(32, 32, 'zh_HK', '全油尖旺', NULL),
(33, 33, 'zh_HK', '太子', NULL),
(34, 34, 'zh_HK', '紅磡/尖東', NULL),
(35, 35, 'zh_HK', '尖沙咀，佐敦', NULL),
(36, 36, 'zh_HK', '京士柏', NULL),
(37, 37, 'zh_HK', '九龍站', NULL),
(38, 38, 'zh_HK', '奧運', NULL),
(39, 39, 'zh_HK', '大角咀', NULL),
(40, 40, 'zh_HK', '旺角', NULL),
(41, 41, 'zh_HK', '油麻地', NULL),
(43, 43, 'zh_HK', '荔枝角', NULL),
(44, 44, 'zh_HK', '長沙灣', NULL),
(45, 45, 'zh_HK', '深水埗', NULL),
(46, 46, 'zh_HK', '又一村', NULL),
(47, 47, 'zh_HK', '石硖尾', NULL),
(48, 48, 'zh_HK', '美孚', NULL),
(50, 50, 'zh_HK', '紅磡', NULL),
(51, 51, 'zh_HK', '何文田', NULL),
(52, 52, 'zh_HK', '九龍塘，筆袈山', NULL),
(53, 53, 'zh_HK', '土瓜灣', NULL),
(54, 54, 'zh_HK', '九龍城', NULL),
(55, 55, 'zh_HK', '啟德', NULL),
(57, 57, 'zh_HK', '黃大仙', NULL),
(58, 58, 'zh_HK', '樂福', NULL),
(59, 59, 'zh_HK', '鑽石山', NULL),
(60, 60, 'zh_HK', '牛泚灣', NULL),
(61, 61, 'zh_HK', '新浦崗', NULL),
(63, 63, 'zh_HK', '九龍灣', NULL),
(64, 64, 'zh_HK', '油塘', NULL),
(65, 65, 'zh_HK', '藍田', NULL),
(66, 66, 'zh_HK', '觀塘', NULL),
(67, 67, 'zh_HK', '牛頭角', NULL),
(68, 68, 'zh_HK', '秀茂坪', NULL),
(69, 69, 'zh_HK', '按達臣', NULL),
(71, 71, 'zh_HK', '西貢', NULL),
(72, 72, 'zh_HK', '清水灣', NULL),
(73, 73, 'zh_HK', '將軍澳市中心', NULL),
(74, 74, 'zh_HK', '寶林', NULL),
(75, 75, 'zh_HK', '坑口', NULL),
(76, 76, 'zh_HK', '調景嶺', NULL),
(77, 77, 'zh_HK', '康城', NULL),
(79, 79, 'zh_HK', '九肚山', NULL),
(80, 80, 'zh_HK', '火炭', NULL),
(81, 81, 'zh_HK', '大圍', NULL),
(82, 82, 'zh_HK', '沙田', NULL),
(83, 83, 'zh_HK', '馬鞍山', NULL),
(85, 85, 'zh_HK', '大埔', NULL),
(86, 86, 'zh_HK', '大埔墟', NULL),
(87, 87, 'zh_HK', '大埔滘/白石角', NULL),
(89, 89, 'zh_HK', '上水', NULL),
(90, 90, 'zh_HK', '粉嶺', NULL),
(91, 91, 'zh_HK', '古洞', NULL),
(92, 92, 'zh_HK', '打鼓嶺', NULL),
(93, 93, 'zh_HK', '沙頭角', NULL),
(95, 95, 'zh_HK', '天水圍', NULL),
(96, 96, 'zh_HK', '元朗市中心', NULL),
(97, 97, 'zh_HK', '錦田', NULL),
(98, 98, 'zh_HK', '洪水橋', NULL),
(99, 99, 'zh_HK', '錦繡/加州/葡萄園', NULL),
(101, 101, 'zh_HK', '屯門碼頭', NULL),
(102, 102, 'zh_HK', '屯門市中心', NULL),
(103, 103, 'zh_HK', '掃管笏', NULL),
(104, 104, 'zh_HK', '藍地', NULL),
(106, 106, 'zh_HK', '荃灣', NULL),
(107, 107, 'zh_HK', '深井/青龍頭', NULL),
(108, 108, 'zh_HK', '馬灣', NULL),
(109, 109, 'zh_HK', '全葵青', NULL),
(110, 110, 'zh_HK', '葵涌', NULL),
(111, 111, 'zh_HK', '青衣', NULL),
(113, 113, 'zh_HK', '大嶼山/離島', NULL),
(114, 114, 'zh_HK', '愉景灣', NULL),
(115, 115, 'zh_HK', '東涌', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `verification_types`
--

DROP TABLE IF EXISTS `verification_types`;
CREATE TABLE IF NOT EXISTS `verification_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verification_type_languages`
--

DROP TABLE IF EXISTS `verification_type_languages`;
CREATE TABLE IF NOT EXISTS `verification_type_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verification_type_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_types`
--
ALTER TABLE `image_types` ADD FULLTEXT KEY `slug` (`slug`);

--
-- Indexes for table `members`
--
ALTER TABLE `members` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `members` ADD FULLTEXT KEY `google` (`google`);
ALTER TABLE `members` ADD FULLTEXT KEY `google_2` (`google`);
ALTER TABLE `members` ADD FULLTEXT KEY `facebook` (`facebook`);
ALTER TABLE `members` ADD FULLTEXT KEY `phone` (`phone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ECid` varchar(50) DEFAULT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL DEFAULT '1',
  `member_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text,
  `number_of_houldhold` int(11) NOT NULL,
  `number_of_parkingcar` int(11) NOT NULL,
  `is_star_recommendation` tinyint(1) NOT NULL DEFAULT '0',
  `properties` int(11) NOT NULL COMMENT '物業座數',
  `total_number_of_parking_space` int(11) NOT NULL COMMENT '車位總數',
  `management_fee` int(11) NOT NULL COMMENT '管理費',
  `government_rates` int(11) NOT NULL COMMENT '地租差餉',
  `agency_commission` int(11) DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL,
  `contact_title` varchar(191) DEFAULT NULL COMMENT '1: mr;, 2: miss, 3: mrs',
  `contact_person` varchar(191) DEFAULT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `contact_phone` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

DROP TABLE IF EXISTS `product_options`;
CREATE TABLE IF NOT EXISTS `product_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL),
(2, NULL, 1, NULL, NULL, NULL, NULL),
(3, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_option_languages`
--

DROP TABLE IF EXISTS `product_option_languages`;
CREATE TABLE IF NOT EXISTS `product_option_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_option_languages`
--

INSERT INTO `product_option_languages` (`id`, `option_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '私家車'),
(2, 2, 'zh_HK', '電單車'),
(3, 3, 'zh_HK', '電動車');

