

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
(1, NULL, NULL, 'Admin', 'vi.lh@gmail.com', '0906440368', '$2y$10$RXyU983pgLqw1LBpX9WwfufTTL0/V2cniPNA3Gz0VAyKyEIUc/MMC', '2022-06-16 11:22:35', NULL, NULL, NULL, NULL, 1, '2022-04-29 15:19:35', 1, '2022-06-16 11:22:35', NULL);

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
-- Table structure for table `ai_pairings`
--

DROP TABLE IF EXISTS `ai_pairings`;
CREATE TABLE IF NOT EXISTS `ai_pairings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `price` decimal(12,0) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not check, 1 checked',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ai_pairings`
--

INSERT INTO `ai_pairings` (`id`, `product_name`, `region_id`, `district_id`, `subdistrict_id`, `price`, `enabled`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, '旺屋', 1, 2, 3, '1000000', 1, 1, '2022-06-08 15:42:45', NULL, '2022-06-08 17:23:54', 1),
(2, '旺屋', 1, 2, 3, '1000000', 1, 0, '2022-06-08 18:02:17', NULL, '2022-06-08 18:02:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analyst_reports`
--

DROP TABLE IF EXISTS `analyst_reports`;
CREATE TABLE IF NOT EXISTS `analyst_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ECid` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `analyst_report_category_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyst_reports`
--

INSERT INTO `analyst_reports` (`id`, `ECid`, `slug`, `analyst_report_category_id`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'EC1', NULL, 1, 1, '2022-06-15 18:17:04', 1, '2022-06-16 11:37:36', 1),
(11, 'EC2', NULL, 3, 1, '2022-06-16 11:43:14', 1, '2022-06-16 11:43:14', NULL),
(13, 'EC2', NULL, 3, 1, '2022-06-16 11:48:54', 1, '2022-06-16 11:50:15', 1),
(14, 'EC14', NULL, 3, 1, '2022-06-16 11:53:54', 1, '2022-06-16 12:45:48', 1),
(17, 'EC00017', NULL, 1, 1, '2022-06-16 11:57:12', 1, '2022-06-16 11:57:12', NULL),
(18, 'EC00018', NULL, 1, 1, '2022-06-16 12:46:23', 1, '2022-06-16 12:46:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_categories`
--

DROP TABLE IF EXISTS `analyst_report_categories`;
CREATE TABLE IF NOT EXISTS `analyst_report_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyst_report_categories`
--

INSERT INTO `analyst_report_categories` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, NULL, 1, '2022-06-14 17:03:38', 1, '2022-06-14 17:04:48', 1),
(2, NULL, 1, '2022-06-14 17:04:34', 1, '2022-06-14 17:04:34', NULL),
(3, NULL, 1, '2022-06-14 17:05:16', 1, '2022-06-14 17:05:45', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analyst_report_category_languages`
--

INSERT INTO `analyst_report_category_languages` (`id`, `analyst_report_category_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '交通主要指標'),
(2, 2, 'zh_HK', '車輛登記領牌統計'),
(3, 3, 'zh_HK', '停車場統計數字');

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_files`
--

DROP TABLE IF EXISTS `analyst_report_files`;
CREATE TABLE IF NOT EXISTS `analyst_report_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analyst_report_id` int(11) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `path` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyst_report_files`
--

INSERT INTO `analyst_report_files` (`id`, `analyst_report_id`, `extension`, `path`, `name`, `size`) VALUES
(20, 11, 'pdf', 'uploads/AnalystReportFiles/20220616-1143-file-62aaa6d20a827-0.pdf', 'Brain-World-Lawyer-Program-New-master.pdf', '1016882'),
(21, 11, 'xls', 'uploads/AnalystReportFiles/20220616-1143-file-62aaa6d20a99d-1.xls', 'excel1 copy.xls', '206574'),
(28, 13, 'pdf', 'uploads/AnalystReportFiles/20220616-1149-file-62aaa855adbe4-1.pdf', '2.pdf', '11643419'),
(31, 17, 'pdf', 'uploads/AnalystReportFiles/20220616-1157-file-62aaaa184cf88-0.pdf', '2.pdf', '11643419'),
(35, 14, 'pdf', 'uploads/AnalystReportFiles/20220616-1245-file-62aab5700d43d-0.pdf', '1.pdf', '11643419'),
(36, 14, 'pdf', 'uploads/AnalystReportFiles/20220616-1245-file-62aab5700d739-1.pdf', '2.pdf', '11643419'),
(37, 18, 'docx', 'uploads/AnalystReportFiles/20220616-1246-file-62aab59fc3425-0.docx', 'excel1 copy 2.docx', '206574'),
(38, 18, 'xls', 'uploads/AnalystReportFiles/20220616-1246-file-62aab59fc368a-1.xls', 'excel1 copy.xls', '206574'),
(39, 18, 'pdf', 'uploads/AnalystReportFiles/20220616-1246-file-62aab59fc3857-2.pdf', 'nhe1.pdf', '206574');

-- --------------------------------------------------------

--
-- Table structure for table `analyst_report_languages`
--

DROP TABLE IF EXISTS `analyst_report_languages`;
CREATE TABLE IF NOT EXISTS `analyst_report_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(191) DEFAULT NULL,
  `content` text,
  `analyst_report_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyst_report_languages`
--

INSERT INTO `analyst_report_languages` (`id`, `alias`, `content`, `analyst_report_id`) VALUES
(9, 'zh_HK', '按車輛種類劃分的車輛登記及領牌統計數字', 9),
(11, 'zh_HK', '月底駕駛執照持有人統計數字	 ', 11),
(13, 'zh_HK', '私家車的登記及取消登記統計數字', 13),
(14, 'zh_HK', '公共交通乘客人次、道路、車輛擁有率及交通意外的主要統計數字11', 14),
(15, 'zh_HK', '設有收費錶的路旁停車位統計數字', 17),
(16, 'zh_HK', '上水泊車轉乘計劃泊車統計數字', 18);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'members-avatar', 1, NULL, NULL, NULL, NULL),
(2, 'members-agent-certification', 1, NULL, NULL, NULL, NULL),
(3, 'products-screenshot', 1, NULL, NULL, NULL, NULL),
(4, 'news-screenshot', 1, NULL, NULL, NULL, NULL),
(5, 'plugins-screenshot', 1, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_type_languages`
--

INSERT INTO `image_type_languages` (`id`, `image_type_id`, `alias`, `name`, `description`) VALUES
(1, 1, 'zh_HK', '會員頭像', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(2, 2, 'zh_HK', '地產代理證', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(3, 3, 'zh_HK', '車位圖片', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(4, 4, 'zh_HK', '新聞圖片', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：300x300px'),
(5, 5, 'zh_HK', '車位附件圖片', '只允許上傳：jpg,jpeg,png，文件大小不能超過1MB, 圖片規格為：15x15px');

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
(1, NULL, 1, NULL, NULL, '2022-06-06 11:13:13', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `phone`, `area_code`, `google`, `facebook`, `password`, `token`, `name`, `email`, `default_language`, `company_ECid`, `person_ECid`, `company_phone`, `company_address`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, '906440368', '+84', NULL, NULL, '$2y$10$iKw6oHtOY6Ld6cuxbMhNtuPnn2gvXNhKgwhFNi1K.PZs8XwK//j9y', '191782200762A177C1605D1NGO5MV8QSFELACDUXHJR3TIW1YB2', NULL, 'vi.lh@vtl-vtl.com', 1, NULL, NULL, NULL, NULL, 1, '2022-05-26 18:00:41', NULL, '2022-06-09 12:34:25', NULL),
(3, '906440369', '+84', '123456780', '', NULL, NULL, 'facebook', 'facebook@gmail.com', 1, '123456', '888888', '12345678', '', 1, '2022-05-11 13:04:00', 1, '2022-05-11 13:06:41', 1),
(4, '090173823', '+84', '123456789', '', NULL, NULL, 'google', 'google@gmail.com', 1, '123457', '999999', '', '', 1, '2022-05-24 18:27:07', 1, '2022-05-24 18:27:07', NULL),
(8, '91957064', '+852', NULL, NULL, '$2y$10$RcythlCG59xqC4a5cASkEO0/Kq61lFLMagdxUv/E6BCuB04P7xttS', NULL, NULL, 'vtit@vtl-vtl.com', 1, NULL, NULL, NULL, NULL, 1, '2022-05-26 17:57:27', NULL, '2022-05-26 18:55:52', NULL),
(12, '906123456', '+84', NULL, NULL, '$2y$10$8pBOrOLre0MK0CaGuy6rRuOeh3uYLLZO9h1Scc9mCyLp1/MiF76WW', '2103342002629589A97FCC2B9IPKA426D8YMHTW75F1ON3CEVSU', NULL, 'test01@vtl-vtl.com', 1, NULL, NULL, NULL, NULL, 1, '2022-05-26 18:53:24', NULL, '2022-05-31 11:21:13', NULL),
(14, '999999999', '+852', '', '', '$2y$10$ZGYp.6S6viYKPDTCIIJnBe3sWPh/xLuT28s3IIPy85GkBwn9Q6sHC', NULL, '', '999999999@gmail.com', 1, '', '', '', '', 1, '2022-05-27 18:15:09', 1, '2022-05-27 18:18:15', 1),
(15, '77777777', '+852', '', '', '', NULL, '', '77777777@gmail.com', 1, '', '', '', '', 1, '2022-05-27 18:22:27', 1, '2022-05-27 18:24:30', 1),
(17, '66666666', '+84', '', '', '$2y$10$Gn1kpdokncvBqbQhfhj2b.6ZW8NQFMjFTzYs1ieA8ndN.GAxdx2CS', NULL, '66666666', '66666666@gmail.com', 1, '', '', '', '', 1, '2022-05-27 18:25:11', 1, '2022-05-27 18:37:25', 1),
(18, '906440360', '+84', NULL, NULL, '$2y$10$0.fwJqh4bc4Jd5EnS0Z0mOw3a.BHPj.tjOYSZK.QLCAlnYtKDgbbe', NULL, NULL, '906440369@vtl-vtl.com', 1, NULL, NULL, NULL, NULL, 1, '2022-06-08 17:46:45', NULL, '2022-06-08 17:46:45', NULL);

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

--
-- Dumping data for table `members_favours`
--

INSERT INTO `members_favours` (`id`, `member_id`, `product_id`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 3, 2, 1, NULL, NULL, NULL, NULL),
(2, 2, 19, 1, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_images`
--

INSERT INTO `member_images` (`id`, `member_id`, `is_social`, `name`, `image_type_id`, `size`, `width`, `height`, `path`) VALUES
(1, 2, 0, 'logo.png', 1, 144659, 578, 560, 'uploads/MemberImages/20220511-1138-image-627b2fa70659e-0.png'),
(3, 2, 0, 'bg_under1.png', 2, 85781, 230, 445, 'uploads/MemberImages/20220511-1303-image-627b439de9ebd-0.png'),
(4, 3, 0, '1_photos_v2_x4.jpeg', 1, 577089, 1280, 1280, 'uploads/MemberImages/20220511-1304-image-627b43c086c01-0.jpeg'),
(5, 3, 0, '1.jpg', 2, 206574, 963, 1280, 'uploads/MemberImages/20220511-1304-image-627b43f42e499-0.jpg'),
(9, 28, 1, NULL, 1, NULL, NULL, NULL, 'https://scontent.fsgn8-1.fna.fbcdn.net/v/t39.30808-6/280771672_2463457160456158_7556859115367596087_n.jpg?_nc_cat=111&ccb=1-6&_nc_sid=5b7eaf&_nc_ohc=QJXh0Ch05hUAX8ZHTsG&_nc_ht=scontent.fsgn8-1.fna&oh=00_AT_IqA7dqt3VkhF2K8CqHcLDtJsNTAltq8NlVmmK28r6AA&oe=6281368A'),
(10, 29, 0, NULL, 1, NULL, NULL, NULL, 'uploads/MemberImages/20220511-1304-image-627b43f42e499-0.jpg'),
(11, 13, 0, '1.jpg', 1, 206574, 963, 1280, 'uploads/MemberImages/20220527-1812-image-6290a427c1a7d-0.jpg'),
(12, 14, 0, '1.jpg', 2, 206574, 963, 1280, 'uploads/MemberImages/20220527-1815-image-6290a4ad8a307-0.jpg'),
(13, 15, 0, 'bg_under1.png', 1, 85781, 230, 445, 'uploads/MemberImages/20220527-1822-image-6290a663951a8-0.png'),
(14, 17, 0, 'Arrow 2.gif', 2, 678614, 644, 644, 'uploads/MemberImages/20220527-1825-image-6290a7076399c-0.gif');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_languages`
--

INSERT INTO `member_languages` (`id`, `member_id`, `alias`, `agency_company_name`) VALUES
(1, 2, 'zh_HK', '美容公司'),
(2, 17, 'zh_HK', '333'),
(3, 3, 'zh_HK', '新同學');

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
-- Table structure for table `member_subscritions`
--

DROP TABLE IF EXISTS `member_subscritions`;
CREATE TABLE IF NOT EXISTS `member_subscritions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_subscritions`
--

INSERT INTO `member_subscritions` (`id`, `member_id`, `product_id`, `enabled`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 2, 28, 1, NULL, NULL, NULL, NULL);

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
  `verification_type` int(11) NOT NULL COMMENT '1: forgot; 2: register; 3: ai_paring',
  `verification_method` int(11) NOT NULL COMMENT '1: sms, 2: email',
  `is_used` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not yet used it',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '1: enbaled',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_verifications`
--

INSERT INTO `member_verifications` (`id`, `area_code`, `phone`, `email`, `code`, `verification_type`, `verification_method`, `is_used`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(13, '+84', '983089975', NULL, '069473', 2, 1, 0, 1, '2022-05-26 16:19:48', NULL, '2022-05-26 16:19:48', NULL),
(14, '+84', '0983089975', NULL, '295104', 2, 1, 0, 1, '2022-05-26 16:23:45', NULL, '2022-05-26 16:23:45', NULL),
(15, '+852', '91957064', NULL, '896057', 2, 1, 1, 0, '2022-05-26 16:29:26', NULL, '2022-05-26 16:29:26', NULL),
(38, '+852', '91957064', NULL, '427195', 2, 1, 1, 1, '2022-05-26 17:31:26', NULL, '2022-05-26 17:31:26', NULL),
(39, '+84', '906440368', NULL, '631594', 2, 1, 1, 0, '2022-05-26 18:00:07', NULL, '2022-05-26 18:00:07', NULL),
(40, '+84', '906123456', NULL, '376941', 2, 1, 1, 1, '2022-05-26 18:36:17', NULL, '2022-05-26 18:36:17', NULL),
(41, '+84', '906440368', NULL, '805627', 2, 1, 0, 0, '2022-05-27 15:59:34', NULL, '2022-05-27 15:59:34', NULL),
(42, '+84', '906440368', NULL, '819647', 2, 1, 0, 0, '2022-05-30 17:53:24', NULL, '2022-05-30 17:53:24', NULL),
(43, '+84', '906440368', NULL, '245698', 2, 1, 0, 0, '2022-05-31 10:51:42', NULL, '2022-05-31 10:51:42', NULL),
(44, '+84', '906440368', NULL, '081792', 2, 1, 0, 1, '2022-05-31 11:20:48', NULL, '2022-05-31 11:20:48', NULL),
(45, '+84', '906440368', NULL, '289104', 3, 1, 1, 1, '2022-06-08 12:50:16', NULL, '2022-06-08 12:50:16', NULL),
(46, '+84', '906440369', NULL, '251748', 2, 1, 0, 1, '2022-06-08 17:38:06', NULL, '2022-06-08 17:38:06', NULL),
(50, '+84', '906440368', NULL, '581043', 1, 1, 1, 0, '2022-06-09 11:20:54', NULL, '2022-06-09 11:20:54', NULL),
(51, '+84', '906440368', NULL, '392154', 1, 1, 1, 0, '2022-06-09 11:51:46', NULL, '2022-06-09 11:51:46', NULL),
(52, '+84', '906440368', NULL, '120745', 1, 1, 1, 0, '2022-06-09 11:54:32', NULL, '2022-06-09 11:54:32', NULL),
(53, '+84', '906440368', NULL, '462537', 1, 1, 1, 1, '2022-06-09 12:32:52', NULL, '2022-06-09 12:32:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_type_id` int(11) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `is_hot_news` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_type_id`, `slug`, `is_hot_news`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 'shi_shislug_de_gong_neng_ba_abc_text_aa', 0, 1, '2022-05-25 16:46:00', 1, '2022-05-25 18:15:05', 1),
(11, 1, 'news899', 1, 1, '2022-05-25 17:15:45', 1, '2022-06-09 18:40:44', 1),
(12, 1, 'slug_demo', 0, 1, '2022-05-25 17:18:34', 1, '2022-05-25 17:18:34', NULL),
(13, 3, 'shi_shislug_de_gong_neng_ba_abc_text_aa_2', 1, 1, '2022-05-25 18:18:03', 1, '2022-05-25 18:19:08', 1),
(14, 3, 'abc', 1, 1, '2022-06-09 18:46:20', 1, '2022-06-09 18:46:42', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `news_id`, `category_id`, `enabled`) VALUES
(21, 12, 2, 1),
(22, 12, 3, 1),
(47, 1, 1, 1),
(48, 1, 2, 1),
(49, 1, 3, 1),
(50, 1, 4, 1),
(51, 1, 5, 1),
(56, 13, 3, 1),
(97, 11, 2, 1),
(98, 11, 3, 1),
(99, 11, 4, 1),
(100, 11, 5, 1),
(102, 14, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `news_id`, `image_type_id`, `name`, `size`, `width`, `height`, `path`) VALUES
(1, 1, 4, 'Arrow 2.gif', 678614, 644, 644, 'uploads/NewsImages/20220525-1646-image-628decc8ad026-0.gif'),
(2, 11, 4, 'Screen Shot 2021-06-30 at 17.29.16.png', 124852, 1084, 822, 'uploads/NewsImages/20220525-1715-image-628df3c1b26cd-0.png'),
(3, 12, 4, 'Screen Shot 2021-06-30 at 17.29.16.png', 124852, 1084, 822, 'uploads/NewsImages/20220525-1718-image-628df46ab3a47-0.png'),
(4, 1, 4, 'Screen Shot 2021-06-30 at 17.40.10.png', 309420, 2372, 1152, 'uploads/NewsImages/20220525-1801-image-628dfe678cb3c-0.png'),
(5, 1, 4, 'Screen Shot 2021-06-30 at 18.12.12.png', 457356, 1586, 1106, 'uploads/NewsImages/20220525-1801-image-628dfe678ce19-1.png'),
(6, 14, 4, '1.jpg', 206574, 963, 1280, 'uploads/NewsImages/20220609-1846-image-62a1cf7ca7845-0.jpg');

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
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_languages`
--

INSERT INTO `news_languages` (`id`, `news_id`, `alias`, `name`, `description`, `author`) VALUES
(1, 1, 'zh_HK', 'News1', '<p><span style=\"color:#e74c3c\">這是slug個功能描述 2222222</span></p>\r\n', NULL),
(8, 11, 'zh_HK', 'News899', '<p>拜登總統在啟動「<span style=\"color:#e67e22\">印太經濟框架」的講話中說，「今天</span>在座的國家和今後將加入框<span style=\"font-size:13pt\">架的國家將要為一個面向所有人&mdash;我</span>們所有人民&mdash;的經濟願景而努力，這個願景就是：一個自由和開放、互聯和繁榮、安全和有韌力<strong>的印太地區，並且我們的經濟&mdash;這</strong>個地區的經濟發展是有可持續性和包容性的。」拜登總統在啟動「印太經濟框架」的講話中說，「今天在座的國家和今後將加入框架的國家將要為一個面向所有人&mdash;我們所有人民&mdash;的經濟願景而努力，這個願景就是：一個自由和開放、互聯和繁榮、安全和有韌力的印太地區，並且我們的經濟&mdash;這個地區的經濟發展是有可持續性和包容性的。」拜登總統在啟動「印太經濟框架」的講話中說，「今天在座的國家和今後將加入框架的國家將要為一個面向所有人&mdash;我們所有人民&mdash;的經濟願景而努力，這個願景就是：一個自由和開放、互聯和繁榮、安全和有韌力的印太地區，並且我們的經濟&mdash;這個地區的經濟發展是有可持續性和包容性的。」拜登總統在啟動「印太經濟框架」的講話中說，「今天在座的國家和今後將加入框架的國家將要為一個面向所有人&mdash;我們所有人民&mdash;的經濟願景而努力，這個願景就是：一個自由和開放、互聯和繁榮、安全和有韌力的印太地區，並且我們的經濟&mdash;這個地區的經濟發展是有可持續性和包容性的。」</p>\r\n\r\n<p>拜登總統在啟動「印太經濟框架」的講話中說，「今天在座的國家和今後將加入框架的國家將要為一個面向所有人&mdash;我們所有人民&mdash;的經濟願景而努力，這個願景就是：一個自由和開放、互聯和繁榮、安全和有韌力的印太地區，並且我們的經濟&mdash;這個地區的經濟發展是有可持續性和包容性的。」</p>\r\n', NULL),
(9, 12, 'zh_HK', 'News9', '<p>試試slug的功能吧</p>\r\n', NULL),
(10, 13, 'zh_HK', 'News10', '<p>試試slug的功能吧</p>\r\n', NULL),
(11, 14, 'zh_HK', 'abc', '<p>abcabcabcabcabcabc</p>\r\n', '陳嘉敏22');

-- --------------------------------------------------------

--
-- Table structure for table `news_types`
--

DROP TABLE IF EXISTS `news_types`;
CREATE TABLE IF NOT EXISTS `news_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_types`
--

INSERT INTO `news_types` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'che-wei-xin-wen', 1, NULL, NULL, '2022-06-10 11:26:15', 1),
(2, 'xin-pan-xiao-xi', 1, NULL, NULL, '2022-06-10 14:56:28', 1),
(3, 'mai-mai-tie-shi', 1, NULL, NULL, '2022-06-10 14:56:35', 1),
(4, 'zhuan-jia-ping-lun', 1, NULL, NULL, '2022-06-10 14:56:41', 1),
(5, 'qi-ta', 1, NULL, NULL, '2022-06-10 14:56:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_type_languages`
--

DROP TABLE IF EXISTS `news_type_languages`;
CREATE TABLE IF NOT EXISTS `news_type_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_type_id` int(11) NOT NULL,
  `alias` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_type_languages`
--

INSERT INTO `news_type_languages` (`id`, `news_type_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '車位新聞'),
(2, 2, 'zh_HK', '新盤消息'),
(3, 3, 'zh_HK', '買賣貼士'),
(4, 4, 'zh_HK', '專家評論'),
(5, 5, 'zh_HK', '其他');

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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(48, 'perm-admin-News-delete', 'News-Delete', 'News', 'News', 'delete', '2022-05-25 14:33:44', 1, '2022-05-25 14:33:44', NULL),
(49, 'perm-admin-ProductOptions-view', 'ProductOptions-View', 'ProductOptions', 'ProductOptions', 'view', '2022-05-30 10:50:31', 1, '2022-05-30 10:50:31', NULL),
(50, 'perm-admin-ProductOptions-add', 'ProductOptions-Add', 'ProductOptions', 'ProductOptions', 'add', '2022-05-30 10:50:31', 1, '2022-05-30 10:50:31', NULL),
(51, 'perm-admin-ProductOptions-edit', 'ProductOptions-Edit', 'ProductOptions', 'ProductOptions', 'edit', '2022-05-30 10:50:31', 1, '2022-05-30 10:50:31', NULL),
(52, 'perm-admin-ProductOptions-delete', 'ProductOptions-Delete', 'ProductOptions', 'ProductOptions', 'delete', '2022-05-30 10:50:31', 1, '2022-05-30 10:50:31', NULL),
(53, 'perm-admin-PriceSettings-view', 'PriceSettings-View', 'PriceSettings', 'PriceSettings', 'view', '2022-05-31 11:58:47', 1, '2022-05-31 11:58:47', NULL),
(54, 'perm-admin-PriceSettings-add', 'PriceSettings-Add', 'PriceSettings', 'PriceSettings', 'add', '2022-05-31 11:58:47', 1, '2022-05-31 11:58:47', NULL),
(55, 'perm-admin-PriceSettings-edit', 'PriceSettings-Edit', 'PriceSettings', 'PriceSettings', 'edit', '2022-05-31 11:58:47', 1, '2022-05-31 11:58:47', NULL),
(56, 'perm-admin-PriceSettings-delete', 'PriceSettings-Delete', 'PriceSettings', 'PriceSettings', 'delete', '2022-05-31 11:58:47', 1, '2022-05-31 11:58:47', NULL),
(57, 'perm-admin-Plugins-view', 'Plugins-View', 'Plugins', 'Plugins', 'view', '2022-06-03 16:47:57', 1, '2022-06-03 16:47:57', NULL),
(58, 'perm-admin-Plugins-add', 'Plugins-Add', 'Plugins', 'Plugins', 'add', '2022-06-03 16:47:57', 1, '2022-06-03 16:47:57', NULL),
(59, 'perm-admin-Plugins-edit', 'Plugins-Edit', 'Plugins', 'Plugins', 'edit', '2022-06-03 16:47:57', 1, '2022-06-03 16:47:57', NULL),
(60, 'perm-admin-Plugins-delete', 'Plugins-Delete', 'Plugins', 'Plugins', 'delete', '2022-06-03 16:47:57', 1, '2022-06-03 16:47:57', NULL),
(61, 'perm-admin-Labels-view', 'Labels-View', 'Labels', 'Labels', 'view', '2022-06-03 17:33:44', 1, '2022-06-03 17:33:44', NULL),
(62, 'perm-admin-Labels-add', 'Labels-Add', 'Labels', 'Labels', 'add', '2022-06-03 17:33:44', 1, '2022-06-03 17:33:44', NULL),
(63, 'perm-admin-Labels-edit', 'Labels-Edit', 'Labels', 'Labels', 'edit', '2022-06-03 17:33:44', 1, '2022-06-03 17:33:44', NULL),
(64, 'perm-admin-Labels-delete', 'Labels-Delete', 'Labels', 'Labels', 'delete', '2022-06-03 17:33:44', 1, '2022-06-03 17:33:44', NULL),
(65, 'perm-admin-ProductViolates-view', 'ProductViolates-View', 'ProductViolates', 'ProductViolates', 'view', '2022-06-07 14:40:10', 1, '2022-06-07 14:40:10', NULL),
(66, 'perm-admin-ProductViolates-add', 'ProductViolates-Add', 'ProductViolates', 'ProductViolates', 'add', '2022-06-07 14:40:10', 1, '2022-06-07 14:40:10', NULL),
(67, 'perm-admin-ProductViolates-edit', 'ProductViolates-Edit', 'ProductViolates', 'ProductViolates', 'edit', '2022-06-07 14:40:10', 1, '2022-06-07 14:40:10', NULL),
(68, 'perm-admin-ProductViolates-delete', 'ProductViolates-Delete', 'ProductViolates', 'ProductViolates', 'delete', '2022-06-07 14:40:10', 1, '2022-06-07 14:40:10', NULL),
(69, 'perm-admin-AiPairings-view', 'AiPairings-View', 'AiPairings', 'AiPairings', 'view', '2022-06-08 15:47:16', 1, '2022-06-08 15:47:16', NULL),
(70, 'perm-admin-AiPairings-add', 'AiPairings-Add', 'AiPairings', 'AiPairings', 'add', '2022-06-08 15:47:16', 1, '2022-06-08 15:47:16', NULL),
(71, 'perm-admin-AiPairings-edit', 'AiPairings-Edit', 'AiPairings', 'AiPairings', 'edit', '2022-06-08 15:47:16', 1, '2022-06-08 15:47:16', NULL),
(72, 'perm-admin-AiPairings-delete', 'AiPairings-Delete', 'AiPairings', 'AiPairings', 'delete', '2022-06-08 15:47:16', 1, '2022-06-08 15:47:16', NULL),
(73, 'perm-admin-NewsTypes-view', 'NewsTypes-View', 'NewsTypes', 'NewsTypes', 'view', '2022-06-09 14:55:00', 1, '2022-06-09 14:55:00', NULL),
(74, 'perm-admin-NewsTypes-add', 'NewsTypes-Add', 'NewsTypes', 'NewsTypes', 'add', '2022-06-09 14:55:00', 1, '2022-06-09 14:55:00', NULL),
(75, 'perm-admin-NewsTypes-edit', 'NewsTypes-Edit', 'NewsTypes', 'NewsTypes', 'edit', '2022-06-09 14:55:00', 1, '2022-06-09 14:55:00', NULL),
(76, 'perm-admin-NewsTypes-delete', 'NewsTypes-Delete', 'NewsTypes', 'NewsTypes', 'delete', '2022-06-09 14:55:00', 1, '2022-06-09 14:55:00', NULL),
(77, 'perm-admin-AnalystReports-view', 'AnalystReports-View', 'AnalystReports', 'AnalystReports', 'view', '2022-06-14 16:45:42', 1, '2022-06-14 16:45:42', NULL),
(78, 'perm-admin-AnalystReports-add', 'AnalystReports-Add', 'AnalystReports', 'AnalystReports', 'add', '2022-06-14 16:45:42', 1, '2022-06-14 16:45:42', NULL),
(79, 'perm-admin-AnalystReports-edit', 'AnalystReports-Edit', 'AnalystReports', 'AnalystReports', 'edit', '2022-06-14 16:45:42', 1, '2022-06-14 16:45:42', NULL),
(80, 'perm-admin-AnalystReports-delete', 'AnalystReports-Delete', 'AnalystReports', 'AnalystReports', 'delete', '2022-06-14 16:45:42', 1, '2022-06-14 16:45:42', NULL),
(81, 'perm-admin-AnalystReportCategories-view', 'AnalystReportCategories-View', 'AnalystReportCategories', 'AnalystReportCategories', 'view', '2022-06-14 16:45:55', 1, '2022-06-14 16:45:55', NULL),
(82, 'perm-admin-AnalystReportCategories-add', 'AnalystReportCategories-Add', 'AnalystReportCategories', 'AnalystReportCategories', 'add', '2022-06-14 16:45:55', 1, '2022-06-14 16:45:55', NULL),
(83, 'perm-admin-AnalystReportCategories-edit', 'AnalystReportCategories-Edit', 'AnalystReportCategories', 'AnalystReportCategories', 'edit', '2022-06-14 16:45:55', 1, '2022-06-14 16:45:55', NULL),
(84, 'perm-admin-AnalystReportCategories-delete', 'AnalystReportCategories-Delete', 'AnalystReportCategories', 'AnalystReportCategories', 'delete', '2022-06-14 16:45:55', 1, '2022-06-14 16:45:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

DROP TABLE IF EXISTS `plugins`;
CREATE TABLE IF NOT EXISTS `plugins` (
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
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `slug`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, NULL, 1, NULL, NULL, '2022-06-07 17:31:52', 1),
(2, NULL, 1, NULL, NULL, '2022-06-07 17:32:03', 1),
(3, NULL, 1, NULL, NULL, '2022-06-07 17:32:13', 1),
(4, NULL, 1, '2022-06-15 17:04:00', 1, '2022-06-15 17:04:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plugin_images`
--

DROP TABLE IF EXISTS `plugin_images`;
CREATE TABLE IF NOT EXISTS `plugin_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) NOT NULL,
  `image_type_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `path` varchar(191) DEFAULT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plugin_images`
--

INSERT INTO `plugin_images` (`id`, `plugin_id`, `image_type_id`, `name`, `path`, `size`, `width`, `height`) VALUES
(2, 1, 5, 'evc.svg', 'uploads/PluginImages/20220607-1731-image-629f1afd0e47b-0.svg', 856, 0, 0),
(3, 2, 5, 'user.svg', 'uploads/PluginImages/20220607-1732-image-629f1b137616a-0.svg', 736, 0, 0),
(4, 3, 5, 'doc.svg', 'uploads/PluginImages/20220607-1732-image-629f1b1db1f23-0.svg', 1016, 0, 0),
(5, 4, 5, '20220601-1625-image-6297226217536-0.jpeg', 'uploads/PluginImages/20220615-1704-image-62a9a080db999-0.jpeg', 1602785, 1280, 1920);

-- --------------------------------------------------------

--
-- Table structure for table `plugin_languages`
--

DROP TABLE IF EXISTS `plugin_languages`;
CREATE TABLE IF NOT EXISTS `plugin_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugin_languages`
--

INSERT INTO `plugin_languages` (`id`, `plugin_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '可裝汽車充電站'),
(2, 2, 'zh_HK', '車位只限住戶使用'),
(3, 3, 'zh_HK', '連租約'),
(4, 4, 'zh_HK', 'wdwdw');

-- --------------------------------------------------------

--
-- Table structure for table `price_settings`
--

DROP TABLE IF EXISTS `price_settings`;
CREATE TABLE IF NOT EXISTS `price_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price_from` varchar(191) DEFAULT NULL,
  `price_to` varchar(191) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_settings`
--

INSERT INTO `price_settings` (`id`, `price_from`, `price_to`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'HKD$ 1000000', 'HKD$ 5000000', 1, NULL, NULL, NULL, NULL),
(2, 'HKD$ 5000000', 'HKD$ 10000000', 1, NULL, NULL, '2022-05-31 14:30:53', 1),
(3, 'HKD$ 10000000', 'HKD$ 30000000', 1, NULL, NULL, NULL, NULL),
(4, 'HKD$ 30000000', 'HKD$ 70000000', 1, NULL, NULL, NULL, NULL),
(5, 'HKD$ 70000000', '', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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
  `properties` varchar(191) DEFAULT NULL COMMENT '物業座數',
  `total_number_of_parking_space` varchar(191) DEFAULT NULL COMMENT '車位總數',
  `management_fee` varchar(191) DEFAULT NULL COMMENT '管理費',
  `government_rates` varchar(191) DEFAULT NULL COMMENT '地租差餉',
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ECid`, `product_type_id`, `product_option_id`, `member_id`, `region_id`, `district_id`, `subdistrict_id`, `name`, `slug`, `description`, `number_of_houldhold`, `number_of_parkingcar`, `is_star_recommendation`, `properties`, `total_number_of_parking_space`, `management_fee`, `government_rates`, `agency_commission`, `price`, `contact_title`, `contact_person`, `contact_email`, `contact_phone`, `enabled`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, '123456', 1, 1, 3, 1, 3, 11, '車位測試1', 'ce_shi_1', 'This is another description', 1, 1, 1, '1', '1', '100', '150', 1, '1200000', '2', 'Person', 'email1@gmail.com', '0905836333', 1, '2022-05-23 11:59:30', 1, '2022-05-25 12:27:10', 1),
(2, '123123', 1, 1, 3, 1, 2, 1, '這個是標題', 'zhe_ge_shi_biao_ti_2', 'This is another description', 1000, 100, 1, '100', '203', '200', '150', 1, '35000000', '1', 'Ly', 'ly@gmail.com', '0905836242', 1, '2022-05-24 11:59:30', 1, '2022-05-26 10:25:19', 1),
(5, '123654', 1, 1, 2, 3, 13, 71, '車位測試2', 'ce_shi_2', 'new placenew place', 100, 100, 0, '100', '100', '100', '100', 1, '1000000', '0', 'Vi', 'email1@gmail.com', '0905836242', 1, '2022-05-24 18:00:29', 1, '2022-05-25 12:32:23', 1),
(6, '765432', 1, 1, 2, 2, 9, 54, '車位測試3', 'ce_shi_3', 'This is description of 3', 232, 232, 1, '23', '2323', '232', '232', 1, '2300000', '1', '22', 'email1@gmail.com', '0905836123', 1, '2022-05-25 19:04:11', 1, '2022-05-25 19:04:11', 1),
(19, '256789', 1, 1, 2, 2, 8, 46, '車位測試19', 'ce_shi_109', 'This is new description for id = 109', 100, 2, 1, '3', '4', '500', '200', 1, '1000000', '0', '1212', 'email1@gmail.com', '0905836989', 1, '2022-05-25 19:22:38', 1, '2022-05-26 10:24:57', 1),
(20, '987333', 1, 1, 2, 2, 8, 46, '車位測試19', 'ce_shi_19', 'This is new description for id = 19', 1, 2, 1, '3', '4', '450', '200', 1, '1000000', '0', '1212', 'email1@gmail.com', '0905836000', 1, '2022-05-25 19:22:38', 1, '2022-05-26 10:24:57', 1),
(21, '1223456', 1, 1, 3, 1, 3, 11, '港內的車位', 'gang-nei-de-che-wei', '這是個描述這是個描述這是個描述這是個描述這是個描述這是個描述', 100, 100, 0, '100', '100', '10', '10', 1, '10000000', '0', '先生', '', '', 1, '2022-05-30 12:25:17', 1, '2022-05-30 12:25:17', NULL),
(22, '1111', 2, 1, 3, 1, 3, 11, '細哦啊', 'xi-o-a', '細哦啊', 1, 1, 1, '1', '1', '1', '1', 1, '1', '1', 'da ge', '', '', 1, '2022-05-31 12:05:34', 1, '2022-05-31 12:05:34', NULL),
(25, '1234566', 1, 1, 3, 1, 3, 12, '1111', '1111', '111', 1, 1, 0, '1', '11', '1', '1', 1, '100000000', '0', '111', '', '', 1, '2022-05-31 12:33:25', 1, '2022-05-31 12:35:34', 1),
(26, '121', 1, 1, 4, 1, 4, 17, '12', '12', '112', 12, 11, 0, '1', '1', '1', '1', 11, '1000', '0', '11', '', '', 1, '2022-05-31 12:36:11', 1, '2022-05-31 12:36:11', NULL),
(27, '11', 2, 1, 3, 2, 8, 44, 'This it a TEEEEST', 'this-it-a-teeeest', 'This it a TEEEEST', 1, 1, 0, '1', '1', '1', '1', 1, '1', '0', '1', '', '', 1, '2022-05-31 14:55:44', 1, '2022-05-31 14:55:44', NULL),
(28, 'EC56780', 1, 1, 3, 2, 8, 43, '立坊', 'li-fang', '放售荃灣區立坊3/F 特大車位一個，位置佳放售荃灣區立坊3/F 特大車位一個，位置佳業主放售免佣放售荃灣區立坊3/F 特大車位一個，位置佳放售荃灣區立坊3/F 特大車位一一個，位置佳業主放售免佣放售荃灣區立坊3/F 特大車位一個', 1000, 100, 0, '7座 2,434伙 (2房或以上單位佔 68.9%)', '489個', '約 $309/月', '約 $309', 1, '1850000', '0', 'ViLy', '', '123123123', 1, '2022-05-31 17:23:47', 1, '2022-05-31 18:26:57', 1),
(29, 'XL43912856', 1, 1, 3, 2, 8, 46, 'abcedu dflkdshfwjff;ak!@^%&*!#^(!$&)!(', 'abcedu-dflkdshfwjff-ak-amp-amp', 'ALIBABAALIBABAALIBABAALIBABAALIBABAALIBABA', 100, 100, 0, '1111', '111', '11', '11', 100, '10000000', '1', '111', '', '', 1, '2022-06-01 15:32:10', 1, '2022-06-14 18:47:38', 1),
(30, 'WV65970418', 1, 1, 3, 1, 3, 11, 'anh cung ko biet luon', 'anh-cung-ko-biet-luon', 'ABC DESCRIPTION', 100, 100, 0, '100', '1', '110', '100', 1, '10000000', '0', 'Khi', '', '', 1, '2022-06-06 12:53:20', 1, '2022-06-10 14:34:23', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_labels`
--

INSERT INTO `products_labels` (`id`, `product_id`, `label_id`, `enabled`) VALUES
(6, 19, 2, 1),
(7, 2, 1, 1),
(8, 21, 1, 1),
(9, 21, 2, 1),
(10, 22, 1, 1),
(11, 22, 2, 1),
(14, 26, 1, 1),
(59, 28, 1, 1),
(60, 28, 2, 1),
(63, 30, 1, 1),
(64, 30, 2, 1),
(71, 29, 1, 1),
(72, 29, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_plugins`
--

DROP TABLE IF EXISTS `products_plugins`;
CREATE TABLE IF NOT EXISTS `products_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `plugin_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_plugins`
--

INSERT INTO `products_plugins` (`id`, `product_id`, `plugin_id`, `enabled`) VALUES
(14, 28, 1, 1),
(15, 28, 2, 1),
(16, 28, 3, 1),
(20, 30, 1, 1),
(21, 30, 2, 1),
(22, 30, 3, 1),
(29, 29, 1, 1),
(30, 29, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_type_id`, `name`, `size`, `width`, `height`, `path`) VALUES
(1, 5, 3, NULL, 577089, 1280, 1280, 'uploads/ProductImages/20220524-1800-image-628cacbd605fd-0.jpeg'),
(2, 1, 3, 'Arrow 2.gif', 678614, 644, 644, 'uploads/ProductImages/20220524-1833-image-628cb49435dab-0.gif'),
(3, 6, 3, 'Screen Shot 2021-06-30 at 16.07.34.png', 186484, 1873, 787, 'uploads/ProductImages/20220525-1904-image-628e0d2b57538-0.png'),
(4, 19, 3, 'Screen Shot 2021-06-30 at 17.28.36.png', 28300, 612, 321, 'uploads/ProductImages/20220525-1922-image-628e117e356a7-0.png'),
(5, 19, 3, 'Screen Shot 2021-06-30 at 17.28.36.png', 28300, 612, 321, 'uploads/ProductImages/20220526-1024-image-628ee4df4caa8-0.png'),
(6, 19, 3, 'postgre 13.png', 110266, 1830, 608, 'uploads/ProductImages/20220526-1024-image-628ee4df4d4e5-1.png'),
(7, 22, 3, 'bg_under1.png', 85781, 230, 445, 'uploads/ProductImages/20220531-1205-image-6295940e2ae8c-0.png'),
(8, 25, 3, 'bg_under1.png', 85781, 230, 445, 'uploads/ProductImages/20220531-1233-image-62959a95740a5-0.png'),
(9, 28, 3, '1.jpg', 206574, 963, 1280, 'uploads/ProductImages/20220531-1723-image-6295dea355eca-0.jpg'),
(10, 28, 3, 'Arrow 2.gif', 678614, 644, 644, 'uploads/ProductImages/20220601-1255-image-6296f14a756d0-0.gif'),
(11, 28, 3, 'bg_under1.png', 85781, 230, 445, 'uploads/ProductImages/20220601-1256-image-6296f169984e6-0.png'),
(12, 28, 3, 'Arrow 2.gif', 678614, 644, 644, 'uploads/ProductImages/20220601-1258-image-6296f1e5cb890-0.gif'),
(14, 29, 3, '1_photos_v2_x4.jpeg', 577089, 1280, 1280, 'uploads/ProductImages/20220601-1538-image-6297177711d33-0.jpeg');

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
  `product_option_id` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_option_languages`
--

INSERT INTO `product_option_languages` (`id`, `product_option_id`, `alias`, `name`) VALUES
(1, 1, 'zh_HK', '私家車'),
(2, 2, 'zh_HK', '電單車'),
(3, 3, 'zh_HK', '電動車'),
(4, 4, 'zh_HK', 'abc222');

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
-- Table structure for table `product_violates`
--

DROP TABLE IF EXISTS `product_violates`;
CREATE TABLE IF NOT EXISTS `product_violates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` text,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not check, 1 checked',
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_violates`
--

INSERT INTO `product_violates` (`id`, `member_id`, `product_id`, `content`, `enabled`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 2, 30, 'This is fake report, please intention, That not good!!!', 1, 1, '2022-06-07 12:59:18', NULL, '2022-06-07 15:11:05', 1),
(2, 2, 29, 'This is fake report, please intention, That not good!!!', 1, 0, '2022-06-08 18:02:52', NULL, '2022-06-08 18:02:52', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=549 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(481, 2, 70, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(482, 2, 72, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(483, 2, 71, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(484, 2, 69, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(485, 2, 82, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(486, 2, 84, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(487, 2, 83, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(488, 2, 81, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(489, 2, 78, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(490, 2, 80, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(491, 2, 79, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(492, 2, 77, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(493, 2, 30, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(494, 2, 32, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(495, 2, 31, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(496, 2, 29, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(497, 2, 62, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(498, 2, 64, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(499, 2, 63, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(500, 2, 61, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(501, 2, 42, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(502, 2, 44, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(503, 2, 43, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(504, 2, 41, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(505, 2, 38, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(506, 2, 40, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(507, 2, 39, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(508, 2, 37, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(509, 2, 46, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(510, 2, 48, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(511, 2, 47, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(512, 2, 45, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(513, 2, 74, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(514, 2, 76, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(515, 2, 75, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(516, 2, 73, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(517, 2, 58, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(518, 2, 60, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(519, 2, 59, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(520, 2, 57, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(521, 2, 54, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(522, 2, 56, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(523, 2, 55, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(524, 2, 53, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(525, 2, 22, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(526, 2, 24, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(527, 2, 23, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(528, 2, 21, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(529, 2, 50, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(530, 2, 52, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(531, 2, 51, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(532, 2, 49, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(533, 2, 66, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(534, 2, 68, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(535, 2, 67, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(536, 2, 65, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(537, 2, 26, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(538, 2, 28, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(539, 2, 27, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(540, 2, 25, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(541, 2, 1, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(542, 2, 2, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(543, 2, 3, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(544, 2, 4, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(545, 2, 34, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(546, 2, 36, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(547, 2, 35, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL),
(548, 2, 33, '2022-06-14 16:46:16', 1, '2022-06-14 16:46:16', NULL);

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
