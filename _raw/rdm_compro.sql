-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 23, 2018 at 12:00 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdm_compro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(11) NOT NULL DEFAULT '1',
  `setting_type` int(11) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `grouping` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `setting_key`, `name`, `section`, `content`, `sort`, `setting_type`, `file_type`, `size`, `grouping`, `created_at`, `updated_at`) VALUES
(1, 'introduction', 'Introduction', 'who-intro', '<h1 class=\"f-reg\">Our mission is simple <span class=\"opaque d-block\">Create a Unique and Premium Marketing Program to Drive your Sales, Yeay!</span></h1>\r\n\r\n<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met!</p>', 1, 5, NULL, NULL, NULL, '2018-04-17 15:58:28', '2018-04-21 08:57:38'),
(2, 'youtube_url', 'Youtube URL', 'who-intro', 'https://youtu.be/Oy9nUaoHoJw', 2, 1, NULL, NULL, NULL, '2018-04-17 16:23:21', '2018-04-17 16:29:03'),
(3, 'who_address_indo_image', 'Address Indonesia Image', 'who-address', 'pexels-photo-5480841524153807.jpeg', 1, 6, 'image/jpeg', 271197, NULL, '2018-04-19 15:44:45', '2018-04-19 16:03:27'),
(4, 'who_address_indo', 'Address Indonesia', 'who-address', '<h5 class=\"f-reg\">Indonesia</h5>\r\n\r\n<address>Rukan Crown Blok H No.1<br />\r\nGreen Lake City<br />\r\nCipondoh - Tangerang,<br />\r\nIndonesia.</address>', 2, 5, NULL, NULL, NULL, '2018-04-19 15:45:12', '2018-04-19 16:03:27'),
(5, 'who_address_aus_image', 'Address Australia Image', 'who-address', 'pexels-photo-6340101524153807.jpeg', 3, 6, 'image/jpeg', 141089, NULL, '2018-04-19 15:45:40', '2018-04-19 16:03:28'),
(6, 'who_address_aus', 'Address Australia', 'who-address', '<h5 class=\"f-reg\">Australia</h5>\r\n\r\n<address>Rukan Crown Blok H No.1<br />\r\nGreen Lake City<br />\r\nSydney,<br />\r\nAustralia.</address>', 4, 5, NULL, NULL, NULL, '2018-04-19 15:46:09', '2018-04-19 16:10:58'),
(7, 'who_single_img', 'Single Image', 'who-image', 'pexels-photo-3758801524238331.jpeg', 1, 6, 'image/jpeg', 223541, NULL, '2018-04-20 15:22:12', '2018-04-20 15:32:14'),
(8, 'what_hero_img', 'Hero Image', 'what-hero', 'pexels-photo-6230461524241247.jpeg', 1, 6, 'image/jpeg', 565698, NULL, '2018-04-20 16:17:41', '2018-04-20 16:20:48'),
(9, 'what_title1', 'Title', 'what-content', 'We create brands', 1, 1, NULL, NULL, 'Section 1', '2018-04-20 16:32:14', '2018-04-20 17:29:04'),
(10, 'what_desc1', 'Description', 'what-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>\r\n\r\n<ul>\r\n	<li>Brand Architecture</li>\r\n	<li>Brand Audit</li>\r\n	<li>Brand Guidelines</li>\r\n	<li>Brand Strategy</li>\r\n	<li>Competitor Analysis</li>\r\n	<li>Creative Direction</li>\r\n	<li>Logo &amp; Identity</li>\r\n	<li>Brand Architecture</li>\r\n	<li>Naming</li>\r\n</ul>\r\n\r\n<p>&ldquo;This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games Energy of Asia succeed in a world of sport.&rdquo;</p>', 2, 5, NULL, NULL, 'Section 1', '2018-04-20 16:32:14', '2018-04-20 17:29:04'),
(11, 'what_title2', 'Title', 'what-content', 'We build products', 1, 1, NULL, NULL, 'Section 2', '2018-04-20 17:20:23', '2018-04-20 17:31:54'),
(12, 'what_desc2', 'Description', 'what-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>', 2, 5, NULL, NULL, 'Section 2', '2018-04-20 17:20:23', '2018-04-20 17:31:55'),
(13, 'what_title3', 'Title', 'what-content', 'We create marketing things', 1, 1, NULL, NULL, 'Section 3', '2018-04-20 17:21:29', '2018-04-20 17:31:55'),
(14, 'what_desc3', 'Description', 'what-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>', 2, 5, NULL, NULL, 'Section 3', '2018-04-20 17:21:29', '2018-04-20 17:31:55'),
(15, 'what_title4', 'Title', 'what-content', 'Mission', 1, 1, NULL, NULL, 'Section 4', '2018-04-20 17:21:29', '2018-04-20 17:31:55'),
(16, 'what_desc4', 'Description', 'what-content', '<h4>Creates a long term partnership with Brand partners</h4>\r\n\r\n<p>We pride ourselves on being unique and creativeThe passionate team works collaboratively with partners to stay ahead in any changing and challenging retail environment</p>', 2, 5, NULL, NULL, 'Section 4', '2018-04-20 17:21:29', '2018-04-20 17:31:55'),
(17, 'what_title5', 'Title', 'what-content', 'Vision', 1, 1, NULL, NULL, 'Section 5', '2018-04-20 17:21:55', '2018-04-20 17:31:55'),
(18, 'what_desc5', 'Description', 'what-content', '<h4>To be The Best Brand Licensing Company in Indonesia</h4>\r\n\r\n<p>Partnering with world-renown brand to enhance and maximize the business thru a unique and exclusive marketing and licensing model</p>', 2, 5, NULL, NULL, 'Section 5', '2018-04-20 17:21:55', '2018-04-20 17:31:55'),
(19, 'what_img3', 'Image', 'what-content', 'pexels-photo-3257071524271391.jpeg', 3, 6, 'image/jpeg', 0, 'Section 3', '2018-04-21 00:05:16', '2018-04-21 00:43:11'),
(20, 'how_hero_img', 'Hero Image', 'how-hero', 'pexels-photo-9551931524281417.jpeg', 1, 6, 'image/jpeg', 0, NULL, '2018-04-21 03:16:13', '2018-04-21 03:30:19'),
(21, 'how_title1', 'Title', 'how-content', 'We strategize', 1, 1, NULL, NULL, 'Section 1', '2018-04-21 03:38:53', '2018-04-21 03:38:53'),
(22, 'how_youtube1', 'Youtube (URL)', 'how-content', 'https://youtu.be/Oy9nUaoHoJw', 3, 1, NULL, NULL, 'Section 1', '2018-04-21 03:41:47', '2018-04-22 06:21:32'),
(23, 'how_youtube1_desc', 'Youtube Description', 'how-content', '<blockquote>\"Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus luctus odio nibh, nec dignissim dolor venenatis ac. Nullam eget ornare sem.\"</blockquote>', 4, 5, NULL, NULL, 'Section 1', '2018-04-21 03:43:55', '2018-04-22 06:25:03'),
(24, 'how_desc1', 'Description', 'how-content', '<p>Nulla eu gravida est, quis feugiat ante. Cras ultricies vestibulum molestie. Praesent risus lectus, egestas ut ante accumsan, ultricies pellentesque lorem.</p>', 2, 5, NULL, NULL, 'Section 1', '2018-04-21 03:49:33', '2018-04-22 06:21:32'),
(25, 'how_title2', 'Title', 'how-content', 'We design', 1, 1, NULL, NULL, 'Section 2', '2018-04-21 07:15:15', '2018-04-21 07:15:15'),
(26, 'how_desc2', 'Description', 'how-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>\r\n\r\n<p>&ldquo;This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games Energy of Asia succeed in a world of sport.&rdquo;</p>', 2, 5, NULL, NULL, 'Section 2', '2018-04-21 07:24:42', '2018-04-22 06:21:33'),
(27, 'how_title3', 'Title', 'how-content', 'We Create Content', 1, 1, NULL, NULL, 'Section 3', '2018-04-21 07:25:38', '2018-04-21 07:25:38'),
(28, 'how_desc3', 'Description', 'how-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>', 2, 5, NULL, NULL, 'Section 3', '2018-04-21 07:26:10', '2018-04-22 06:21:33'),
(29, 'how_title4', 'Title', 'how-content', 'Our services', 1, 1, NULL, NULL, 'Section 4', '2018-04-21 07:28:34', '2018-04-21 07:28:34'),
(30, 'how_desc4', 'Description', 'how-content', '<p>We pride ourselves on being unique and creativeThe passionate team works collaboratively with partners to stay ahead in any changing and challenging retail environment</p>\r\n\r\n<ul class=\"two-col\">\r\n	<li>Brand Architecture</li>\r\n	<li>Brand Audit</li>\r\n	<li>Brand Guidelines</li>\r\n	<li>Brand Strategy</li>\r\n	<li>Competitor Analysis</li>\r\n	<li>Creative Direction</li>\r\n	<li>Logo &amp; Identity</li>\r\n	<li>Brand Architecture</li>\r\n	<li>Naming</li>\r\n	<li>Naming</li>\r\n</ul>', 2, 5, NULL, NULL, 'Section 4', '2018-04-21 07:28:53', '2018-04-22 06:22:02'),
(31, 'why_hero_img', 'Hero Image', 'why-hero', 'pexels-photo-8348631524299797.jpeg', 1, 6, 'image/jpeg', 0, NULL, '2018-04-21 08:36:05', '2018-04-21 08:36:37'),
(32, 'why_title1', 'Title', 'why-content', 'We strategize', 1, 1, NULL, NULL, 'Section 1', '2018-04-21 08:39:07', '2018-04-21 08:39:07'),
(33, 'why_desc1', 'Description', 'why-content', '<p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>\r\n\r\n<blockquote>&ldquo;This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games Energy of Asia succeed in a world of sport.&rdquo;</blockquote>', 2, 5, NULL, NULL, 'Section 1', '2018-04-21 08:41:00', '2018-04-22 06:36:02'),
(34, 'why_title2', 'Title', 'why-content', 'Sales', 1, 1, NULL, NULL, 'Section 2', '2018-04-21 08:45:30', '2018-04-21 08:54:36'),
(35, 'why_img2', 'Image', 'why-content', 'sales-icon1524378962.png', 2, 6, 'image/png', 0, 'Section 2', '2018-04-21 08:46:31', '2018-04-22 06:36:03'),
(36, 'why_desc2', 'Description', 'why-content', '<ul>\r\n	<li>+13% in revenue</li>\r\n	<li>+ 8% in shopper basket</li>\r\n	<li>+3% in partner brands</li>\r\n</ul>', 3, 5, NULL, NULL, 'Section 2', '2018-04-21 08:47:16', '2018-04-22 06:36:02'),
(37, 'why_title3', 'Title', 'why-content', 'Brand Advocacy', 1, 1, NULL, NULL, 'Section 3', '2018-04-21 08:50:23', '2018-04-21 08:54:36'),
(38, 'why_img3', 'Image', 'why-content', 'customer-loyalty-icon1524378963.png', 2, 6, 'image/png', 0, 'Section 3', '2018-04-21 08:50:23', '2018-04-22 06:36:03'),
(39, 'why_desc3', 'Description', 'why-content', '<ul>\r\n	<li>+13% in revenue</li>\r\n	<li>+ 8% in shopper basket</li>\r\n	<li>+3% in partner brands</li>\r\n</ul>', 3, 5, NULL, NULL, 'Section 3', '2018-04-21 08:50:23', '2018-04-22 06:36:02'),
(40, 'why_title4', 'Title', 'why-content', 'Other', 1, 1, NULL, NULL, 'Section 4', '2018-04-21 08:52:12', '2018-04-21 08:54:37'),
(41, 'why_img4', 'Image', 'why-content', 'brand-icon1524378963.png', 2, 6, 'image/png', 0, 'Section 4', '2018-04-21 08:52:12', '2018-04-22 06:36:03'),
(42, 'why_desc4', 'Description', 'why-content', '<ul>\r\n	<li>+13% in revenue</li>\r\n	<li>+ 8% in shopper basket</li>\r\n	<li>+3% in partner brands</li>\r\n</ul>', 3, 5, NULL, NULL, 'Section 4', '2018-04-21 08:52:12', '2018-04-22 06:36:02'),
(43, 'what_intro', 'Introduction', 'what-intro', '<p>We strategize, design <span class=\"opaque d-block\">and create content and do all the things.</span></p>', 1, 5, NULL, NULL, NULL, '2018-04-22 06:40:13', '2018-04-22 06:40:47'),
(44, 'how_intro', 'Introduction', 'how-intro', 'RDM is a creative-living company in\r\n	    				<span class=\"opaque d-block\">the heart of Indonesia.</span>', 1, 5, NULL, NULL, NULL, '2018-04-22 06:41:24', '2018-04-22 06:42:03'),
(45, 'why_intro', 'Introduction', 'why-intro', '<p>RDM is a creative-living company in <span class=\"opaque d-block\">the heart of Indonesia.</span></p>', 1, 5, NULL, NULL, NULL, '2018-04-22 06:41:45', '2018-04-22 06:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrator_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `email`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'hairil', 'hairilfiqri@gmail.com', '$2y$10$VupbP7xhZJDEiDrtdWpZquzwgXaFWy.8KkEIiAcLIlFGMug33jsDa', 'AUB9MfddZOqKIB27bJ7yPS6m2yLFmy4dAmP8EwYswBCXpq9uJ6eiViGt8r0D', NULL, '2018-03-27 07:30:21', '2018-03-27 07:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `administrator_password_resets`
--

DROP TABLE IF EXISTS `administrator_password_resets`;
CREATE TABLE IF NOT EXISTS `administrator_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `administrator_password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_cid` varchar(255) DEFAULT NULL,
  `module_type` int(11) DEFAULT NULL,
  `content` text,
  `content_position` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `project_cid`, `module_type`, `content`, `content_position`, `sort`, `is_publish`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'lWZWZ', 1, '<p>When using Monolog, log messages may have different levels of severity. By default, Laravel writes all log levels to storage. However, in your production environment, you may wish to configure the minimum severity that should be logged by adding the log_level option to your app.php configuration file.</p>', NULL, 0, 1, '2018-04-11 16:41:00', '2018-04-11 16:42:13', '2018-04-16 15:14:54'),
(3, 'lWZWZ', 2, NULL, NULL, 1, 1, '2018-04-12 15:44:00', '2018-04-12 15:56:09', '2018-04-13 16:31:06'),
(5, 'lWZWZ', 4, '<p>Morbi leo urna, rhoncus in turpis ac, ullamcorper semper nibh. Sed posuere enim sed tempor ullamcorper. Sed in mattis libero. Suspendisse potenti. Pellentesque venenatis blandit dolor quis ornare. Suspendisse potenti. Duis rhoncus dolor ex, sed aliquam massa pretium id. Phasellus ullamcorper sem in imperdiet semper.</p>', 1, 3, 1, '2018-04-13 14:24:00', '2018-04-13 14:28:26', '2018-04-16 15:14:54'),
(6, 'lWZWZ', 3, NULL, NULL, 2, 1, '2018-04-16 15:06:00', '2018-04-16 15:07:53', '2018-04-16 15:14:54'),
(7, 'nmHws', 1, '<h5>Vivamus sit amet mauris mattis, interdum odio at, dignissim sapien.</h5>\r\n\r\n<p>Sed lobortis finibus magna, non faucibus lectus rhoncus pretium. Vivamus sit amet sagittis turpis. Morbi pharetra congue dui in eleifend. Aliquam ut vulputate augue. Donec auctor velit dolor, eu euismod nisl aliquam eu. Sed imperdiet sodales euismod. Sed augue odio, gravida eget diam a, tincidunt pretium nisl.</p>', NULL, NULL, 1, '2018-04-16 15:25:00', '2018-04-16 15:26:08', '2018-04-16 15:26:08'),
(8, 'nmHws', 2, NULL, NULL, NULL, 0, '2018-04-16 15:26:00', '2018-04-16 15:27:20', '2018-04-16 15:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `module_image`
--

DROP TABLE IF EXISTS `module_image`;
CREATE TABLE IF NOT EXISTS `module_image` (
  `module_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_image`
--

INSERT INTO `module_image` (`module_image_id`, `module_id`, `img_url`, `sort`, `created_at`, `updated_at`) VALUES
(1, 3, 'anyersunset1523579930.jpg', NULL, '2018-04-12 15:56:11', '2018-04-13 00:38:51'),
(4, 5, 'nissangtrwhite1523630249.jpg', 0, '2018-04-13 14:28:30', '2018-04-15 09:48:51'),
(5, 6, 'mushrooms_drawing_kind_92183_1366x7681523891275.jpg', 1, '2018-04-16 15:07:56', '2018-04-16 15:10:44'),
(6, 6, 'art_vector_tree_cat_bird_minimalism_97437_1366x7681523891276.jpg', 0, '2018-04-16 15:07:56', '2018-04-16 15:10:44'),
(7, 8, 'messi-1140x6001523892440.jpg', NULL, '2018-04-16 15:27:20', '2018-04-16 15:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `img_url`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'home-partner-indofood1523977854.png', 1, '2018-04-17 15:10:54', '2018-04-17 15:10:56'),
(2, 'home-partner-disney1523977854.png', 2, '2018-04-17 15:10:54', '2018-04-17 15:10:56'),
(3, 'home-partner-marvel1523977855.png', 3, '2018-04-17 15:10:55', '2018-04-17 15:10:56'),
(4, 'home-partner-matahari1523977855.png', 4, '2018-04-17 15:10:55', '2018-04-17 15:10:56'),
(5, 'home-partner-royalselangor1523977855.png', 5, '2018-04-17 15:10:55', '2018-04-17 15:10:56'),
(6, 'home-partner-sinde1523977855.png', 6, '2018-04-17 15:10:55', '2018-04-17 15:10:56'),
(7, 'home-partner-sritex1523977855.png', 7, '2018-04-17 15:10:55', '2018-04-17 15:10:56'),
(8, 'home-partner-starwars1523977856.png', 8, '2018-04-17 15:10:56', '2018-04-17 15:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `partner_who`
--

DROP TABLE IF EXISTS `partner_who`;
CREATE TABLE IF NOT EXISTS `partner_who` (
  `partner_who_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`partner_who_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner_who`
--

INSERT INTO `partner_who` (`partner_who_id`, `img_url`, `sort`, `created_at`, `updated_at`) VALUES
(2, 'home-partner-marvel1524240141.png', 1, '2018-04-20 16:02:21', '2018-04-20 16:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(225) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`people_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `name`, `position`, `img_url`, `is_publish`, `published_at`, `updated_at`, `created_at`) VALUES
(1, 'Adelline Gruch', 'Art Director', 'pexels-photo-3246581524152290.jpeg', 1, '2018-04-19 15:37:00', '2018-04-19 15:39:59', '2018-04-19 15:38:10'),
(2, 'Anna Zhecurl', 'CEO', 'pexels-photo-3720421524152343.jpeg', 1, '2018-04-19 15:38:00', '2018-04-19 15:40:16', '2018-04-19 15:39:03'),
(3, 'John Doe', 'Marketing', 'pexels-photo-4626801524152366.jpeg', 1, '2018-04-19 15:39:00', '2018-04-19 15:39:27', '2018-04-19 15:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_cid` varchar(255) DEFAULT NULL,
  `project_category` varchar(225) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `project_status` varchar(255) DEFAULT NULL,
  `partner` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `excerpt` text,
  `description` text,
  `youtube_url` varchar(255) DEFAULT NULL,
  `img_portrait_url` varchar(255) DEFAULT NULL,
  `img_landscape_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_cid`, `project_category`, `title`, `slug`, `project_status`, `partner`, `year`, `excerpt`, `description`, `youtube_url`, `img_portrait_url`, `img_landscape_url`, `sort`, `is_publish`, `published_at`, `updated_at`, `created_at`) VALUES
(1, 'lWZWZ', 'product,industries', 'Asian Games 2018', 'asian-games-2018', 'Ongoing', 'Inasgoc', 2018, 'Nulla vehicula mi sodales, pellentesque risus ac, sollicitudin turpis. In vitae nulla quis est laoreet pulvinar.', '<p>Morbi commodo neque non mollis lobortis. Duis sit amet ornare mauris. Cras pharetra placerat elit viverra sagittis. Donec vulputate, metus scelerisque ornare luctus, dolor felis fermentum dui, et laoreet dui justo quis odio. Integer dui lorem, convallis id libero at, pulvinar finibus mauris. Nulla ut leo iaculis, convallis arcu a, convallis enim. Donec maximus mi sed lorem egestas, in dapibus tortor mattis. Sed id odio non ligula fermentum dictum sit amet a ante.</p>', 'https://www.youtube.com/watch?v=SwGP_oONP38', 'messi-500x5001523369653.jpg', 'mountains_sky_bali_sunrise_kintamani_indonesia_95497_1366x7681523835208.jpg', NULL, 1, '2018-04-09 16:41:00', '2018-04-15 23:48:17', '2018-04-09 16:41:43'),
(2, 'nmHws', 'industries,techonolgy', 'Formula 1', 'formula-1', 'Done', 'FIA', 2017, 'Nunc lacus diam, volutpat id rhoncus ac, varius ut libero. Nulla pretium dignissim accumsan.', '<p>Donec volutpat eget magna id volutpat. Vivamus scelerisque, ligula id molestie interdum, odio nisl tristique leo, in iaculis odio ipsum eget dui. Donec eu euismod enim. Sed faucibus lacus lectus, nec pellentesque risus mattis et. Nunc congue, purus sed lacinia aliquet, libero elit posuere sem, quis molestie tellus velit et mi. Aliquam tempor tellus sed libero egestas ornare sit amet eu ipsum. Vivamus sit amet interdum lacus. Sed efficitur, lectus quis rutrum lobortis, nisi orci lobortis urna, vitae elementum enim est vitae quam. Phasellus sed turpis in urna dictum suscipit. Integer vulputate elit quis metus semper convallis. Suspendisse porta hendrerit dolor, eu convallis lectus auctor eu. Nulla eu vehicula dui, sit amet elementum nulla. Phasellus sed ultricies sem. Quisque justo nunc, blandit vel tempor vel, tempus sit amet dolor.</p>', NULL, 'uFL2GlH-left-brain-right-brain-wallpaper1523892197.jpg', '31creative1523892198.png', NULL, 1, '2018-04-16 15:20:00', '2018-04-16 15:23:18', '2018-04-16 15:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

DROP TABLE IF EXISTS `project_category`;
CREATE TABLE IF NOT EXISTS `project_category` (
  `project_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_category_cid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`project_category_id`, `project_category_cid`, `name`, `slug`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'jJ8pE', 'Product', 'product', 1, '2018-04-07 16:59:06', '2018-04-08 17:02:37'),
(2, 'wdD4g', 'Industries', 'industries', 4, '2018-04-07 17:03:04', '2018-04-08 16:57:22'),
(4, 'HsXX0', 'Hairil Sulaiman', 'hairil-sulaiman', 2, '2018-04-08 15:59:27', '2018-04-08 17:02:43'),
(6, 'U8NI4', 'Techonolgy', 'techonolgy', 3, '2018-04-08 16:05:12', '2018-04-08 16:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `rdm`
--

DROP TABLE IF EXISTS `rdm`;
CREATE TABLE IF NOT EXISTS `rdm` (
  `rdm_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(11) NOT NULL DEFAULT '1',
  `setting_type` int(11) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `grouping` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rdm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdm`
--

INSERT INTO `rdm` (`rdm_id`, `setting_key`, `name`, `section`, `content`, `sort`, `setting_type`, `file_type`, `size`, `grouping`, `created_at`, `updated_at`) VALUES
(1, 'rdm_title1', 'Title', 'rdm-1', 'Result Oriented.', 1, 1, NULL, NULL, 'Section 1', '2018-04-22 07:41:35', '2018-04-22 07:50:55'),
(2, 'rdm_excerpt1', 'Excerpt', 'rdm-1', 'Fusce sapien urna, sollicitudin eget ipsum at, viverra mollis quam.', 2, 4, NULL, NULL, 'Section 1', '2018-04-22 07:41:35', '2018-04-22 07:50:55'),
(3, 'rdm_desc1', 'Description', 'rdm-1', 'Integer nec interdum diam. Quisque sodales neque eget ante lacinia mollis. Aenean est justo, pharetra in ligula vestibulum, sodales interdum orci. Suspendisse consectetur id elit ac semper. Nullam sed eleifend ipsum.', 3, 4, NULL, NULL, 'Section 1', '2018-04-22 07:43:46', '2018-04-22 08:14:54'),
(4, 'rdm_img1', 'Image', 'rdm-1', 'pexels-photo-3785701524383576.jpeg', 4, 6, 'image/jpeg', 321453, 'Section 1', '2018-04-22 07:43:46', '2018-04-22 07:52:57'),
(5, 'rdm_title2', 'Title', 'rdm-2', 'Different.', 1, 1, NULL, NULL, 'Section 2', '2018-04-22 07:45:00', '2018-04-22 07:53:19'),
(6, 'rdm_excerpt2', 'Excerpt', 'rdm-2', 'Sed consectetur elit at lectus malesuada, a vestibulum lorem accumsan.', 2, 4, NULL, NULL, 'Section 2', '2018-04-22 07:45:00', '2018-04-22 07:54:10'),
(7, 'rdm_desc2', 'Description', 'rdm-2', 'Cras vulputate augue vitae ornare convallis. Ut varius eros a quam facilisis, nec malesuada turpis posuere. Fusce sapien urna, sollicitudin eget ipsum at, viverra mollis quam. Curabitur eu egestas tortor.', 3, 4, NULL, NULL, 'Section 2', '2018-04-22 07:45:00', '2018-04-22 08:14:54'),
(8, 'rdm_img2', 'Image', 'rdm-2', 'pexels-photo-9551931524383577.jpeg', 4, 6, 'image/jpeg', 185648, 'Section 2', '2018-04-22 07:45:00', '2018-04-22 07:52:57'),
(9, 'rdm_title3', 'Title', 'rdm-3', 'Magnificent.', 1, 1, NULL, NULL, 'Section 3', '2018-04-22 07:45:56', '2018-04-22 07:53:19'),
(10, 'rdm_excerpt3', 'Excerpt', 'rdm-3', 'Sed eget metus pulvinar, tincidunt risus et, commodo leo.', 2, 4, NULL, NULL, 'Section 3', '2018-04-22 07:45:56', '2018-04-22 07:54:10'),
(11, 'rdm_desc3', 'Description', 'rdm-3', 'Ut sit amet fringilla metus, eget feugiat nibh. Morbi id vestibulum tellus, ut vehicula nunc. Mauris sed nulla faucibus, porttitor diam in, convallis velit.', 3, 4, NULL, NULL, 'Section 3', '2018-04-22 07:45:56', '2018-04-22 08:14:54'),
(12, 'rdm_img3', 'Image', 'rdm-3', 'pexels-photo-6230461524383650.jpeg', 4, 6, 'image/jpeg', 565698, 'Section 3', '2018-04-22 07:45:56', '2018-04-22 07:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

DROP TABLE IF EXISTS `scope`;
CREATE TABLE IF NOT EXISTS `scope` (
  `scope_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `link_text` varchar(255) DEFAULT NULL,
  `link_url` varchar(225) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`scope_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scope`
--

INSERT INTO `scope` (`scope_id`, `title`, `description`, `link_text`, `link_url`, `img_url`, `is_publish`, `published_at`, `updated_at`, `created_at`) VALUES
(1, 'What we do', 'RDM creates brands, build products, and devise campaigns.', 'MORE ABOUT THE WHAT', 'https://www.pexels.com/search/city/', 'light-sign-typography-lighting1524155304.jpg', 1, '2018-04-19 16:27:00', '2018-04-19 16:33:27', '2018-04-19 16:28:25'),
(2, 'How we do it', 'RDM creates brands, build products, and devise campaigns.', 'MORE ABOUT THE HOW', 'https://www.pexels.com/search/how/', 'pexels-photo-2101261524155662.jpeg', 1, '2018-04-19 16:33:00', '2018-04-19 16:34:23', '2018-04-19 16:34:23'),
(3, 'Why we do it', 'RDM creates brands, build products, and devise campaigns.', 'MORE ABOUT THE WHY', 'https://www.pexels.com/search/why/', 'pexels-photo-6230461524155726.jpeg', 1, '2018-04-19 16:34:00', '2018-04-19 16:35:27', '2018-04-19 16:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(11) NOT NULL DEFAULT '1',
  `setting_type` int(11) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `setting_key`, `name`, `section`, `content`, `sort`, `setting_type`, `file_type`, `size`, `created_at`, `updated_at`) VALUES
(1, 'about', 'About', 'Home', 'Good design is not fashion nor branding. Good design is realistic and its problem solving, its a process of refining our world. It makes us who we are.', 2, 4, NULL, NULL, '2018-03-29 00:03:28', '2018-04-22 06:53:00'),
(2, 'address_indo', 'Address (Indonesia)', 'Address', '<h5>Indonesia</h5>\r\n\r\n<address>Rukan Crown Blok H No.1<br class=\"hidden-sm-down\" />\r\nGreen Lake City.<br class=\"hidden-sm-down\" />\r\nCipondoh - Tangerang,<br class=\"hidden-sm-down\" />\r\nIndonesia.</address>', 1, 5, NULL, NULL, '2018-04-02 14:07:47', '2018-04-22 16:05:37'),
(3, 'email', 'Email', 'Contact', 'info@onerdm.com', 2, 1, NULL, NULL, '2018-04-02 14:12:57', '2018-04-22 15:56:36'),
(4, 'home_image', 'Bottom Image', 'Home', 'pexels-photo-258447.jpeg', 3, 6, 'image/jpeg', 460168, '2018-04-02 23:18:18', '2018-04-22 08:32:02'),
(5, 'home_hero_text', 'Hero Text', 'Home', '<h1 class=\"f-reg\">Creativity Meets Reality</h1>\r\n\r\n<p class=\"no-margin f-bold\">Licensing &amp; Brand Innovation</p>', 1, 5, NULL, NULL, '2018-04-22 06:58:28', '2018-04-22 06:59:48'),
(6, 'tw', 'Twitter', 'Social Media', 'https://twitter.com/', 1, 1, NULL, NULL, '2018-04-22 15:46:50', '2018-04-22 16:05:38'),
(7, 'ig', 'Instagram', 'Social Media', 'https://instagram.com/', 2, 1, NULL, NULL, '2018-04-22 15:47:36', '2018-04-22 16:05:40'),
(8, 'fb', 'Facebook', 'Social Media', 'https://facebook.com/', 3, 1, NULL, NULL, '2018-04-22 15:48:41', '2018-04-22 16:05:41'),
(9, 'li', 'LinkedIn', 'Social Media', 'https://linkedin.com/', 4, 1, NULL, NULL, '2018-04-22 15:48:41', '2018-04-22 16:05:41'),
(10, 'address_aus', 'Address (Australia)', 'Address', '<h5>Australia</h5>\r\n\r\n<address>Rukan Crown Blok H No.1<br class=\"hidden-sm-down\" />\r\nGreen Lake City.<br class=\"hidden-sm-down\" />\r\nCipondoh - Tangerang,<br class=\"hidden-sm-down\" />\r\nIndonesia.</address>', 2, 5, NULL, NULL, '2018-04-22 15:50:53', '2018-04-22 16:05:38'),
(11, 'phone', 'Phone', 'Contact', '+628172350394', 1, 1, NULL, NULL, '2018-04-22 15:54:55', '2018-04-22 15:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `img_url`, `category`, `sort`, `is_publish`, `published_at`, `created_at`, `updated_at`) VALUES
(19, 'mushrooms_drawing_kind_92183_1366x7681523922766.jpg', 'home', 1, 1, '2018-04-16 23:52:46', '2018-04-16 23:52:49', '2018-04-16 23:52:50'),
(20, 'uFL2GlH-left-brain-right-brain-wallpaper1523922766.jpg', 'home', 2, 1, '2018-04-16 23:52:46', '2018-04-16 23:52:49', '2018-04-16 23:52:50'),
(22, 'light-sign-typography-lighting1523923146.jpg', 'projects', 2, 1, '2018-04-16 23:59:06', '2018-04-16 23:59:08', '2018-04-16 23:59:09'),
(24, 'pexels-photo-2101261524186007.jpeg', 'contact', 1, 1, '2018-04-20 01:00:07', '2018-04-20 01:00:08', '2018-04-20 01:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `talk`
--

DROP TABLE IF EXISTS `talk`;
CREATE TABLE IF NOT EXISTS `talk` (
  `talk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `help` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`talk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talk`
--

INSERT INTO `talk` (`talk_id`, `name`, `company`, `email`, `phone`, `help`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sulaiman, hairil', 'okejek', 'hairil@okejek.id', '081234567890', 'Services', 'ya gitu deh pokoknya', '2018-04-15 13:26:37', '2018-04-15 13:26:37'),
(2, 'okkk', 'khfg;sl[f', 'njdbfkgdfg', 'njhoabdfgnadf', 'Activation', 'jjkbdfkjsbjofhbsp;fgh', '2018-04-15 13:30:14', '2018-04-15 13:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

DROP TABLE IF EXISTS `testimony`;
CREATE TABLE IF NOT EXISTS `testimony` (
  `testimony_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(225) DEFAULT NULL,
  `testimony` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`testimony_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`testimony_id`, `name`, `position`, `testimony`, `img_url`, `is_publish`, `published_at`, `updated_at`, `created_at`) VALUES
(1, 'Hairil', 'Developer.', 'Lorem ipsum dolor sit amet', 'hfs1524097184.jpg', 1, '2018-04-19 00:19:00', '2018-04-19 00:19:44', '2018-04-19 00:19:44'),
(3, 'Nunik', 'Customer service', 'Lorem lorem', 'pexels-photo-6843211524097535.jpeg', 1, '2018-04-19 00:24:00', '2018-04-19 00:25:35', '2018-04-19 00:25:35'),
(4, 'Maria', 'Customer service', 'It works, yeay!', 'light-sign-typography-lighting1524097617.jpg', 1, '2018-04-19 00:25:00', '2018-04-19 00:26:57', '2018-04-19 00:26:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
