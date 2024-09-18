-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2024 at 07:38 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfectliving_perfect_living_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `addedon` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_role` char(5) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `project_mapped` int(11) NOT NULL,
  `json_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area_masters`
--

CREATE TABLE `area_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_masters`
--

INSERT INTO `area_masters` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(2, 'Gachibowli', 2, '2024-09-06 17:50:07', '2024-09-06 17:50:07'),
(3, 'Secunderabad', 2, '2024-09-09 14:49:44', '2024-09-09 14:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(8, 'Low Density Community', '1725872565.png', '2024-09-09 14:32:45', '2024-09-09 14:32:45'),
(9, 'Great Location', '1725872575.png', '2024-09-09 14:32:55', '2024-09-09 14:32:55'),
(10, 'Ultra-Luxury', '1725872588.png', '2024-09-09 14:33:08', '2024-09-09 14:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `city_masters`
--

CREATE TABLE `city_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_masters`
--

INSERT INTO `city_masters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Hyderabad', '2024-09-04 11:10:25', '2024-09-04 11:10:25'),
(4, 'Bengaluru', '2024-09-06 17:49:38', '2024-09-06 17:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `target_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `background_image`, `target_link`, `created_at`, `updated_at`) VALUES
(2, 'Top Gated communities <br>close to Hitec & Gachibowli', 'background_images/aTk7j6osEkiJ8o68o4hkLOwYHqUlDpzwQbMb6sSG.jpg', 'https://test.com/', '2024-09-05 06:36:56', '2024-09-06 18:02:33'),
(3, 'Top properties abutting green<br> lung spaces', 'background_images/n1cPwR12yYAa4DCfVdZmVYudorXIEleUxlre7o3t.jpg', 'https://test.com', '2024-09-05 12:20:11', '2024-09-06 18:03:01'),
(4, '30 properties <br>30 min from Airport', 'background_images/Pzv66AKEjOEDZuq9TwhQzAHpm581hDaDOt7mqI1P.jpg', 'https://test.com/', '2024-09-06 18:02:16', '2024-09-06 18:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `about_builder` text DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `about_builder`, `address1`, `address2`, `phone`, `website_url`, `created_at`, `updated_at`) VALUES
(2, 'Universal Realtors', '<div>\r\n<div>Founded: 1995</div>\r\n<div>Completed 25 projects</div>\r\n<div>Highlights</div>\r\n<br>\r\n<div>Built first mixed use commercial property of Hyderabad</div>\r\n<div>Built the first LEED Platinum certified residential proprety in Hyderabad</div>\r\n<div>&nbsp;</div>\r\n<div>Own this property? Tell us the facts!in</div>\r\n</div>', 'Hyderabad,TG', NULL, '7894561234', 'http://botanika.in', '2024-09-04 09:57:09', '2024-09-09 16:33:31'),
(3, 'Netrix', NULL, 'hyd', NULL, '7894561234', 'http://netrix.com', '2024-09-04 09:57:35', '2024-09-04 09:57:35'),
(4, 'Nestcon', NULL, 'Plot No.7, 1st Floor, All Saints Road, Near LIC Office, Trimulgherry, Secunderabad, Telangana 500015', NULL, '843 1320 000', 'https://nestcon.com/', '2024-09-06 17:48:55', '2024-09-06 17:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `country_code` char(10) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elevation_pictures`
--

CREATE TABLE `elevation_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elevation_pictures`
--

INSERT INTO `elevation_pictures` (`id`, `project_id`, `title`, `file_path`, `created_at`, `updated_at`) VALUES
(4, 9, '', 'elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg', '2024-09-06 18:27:00', '2024-09-06 18:27:00'),
(5, 10, '', 'elevation_pictures/nzaDxR5wQmxopMYZS4qV0JOP6kdafArkkRyIykgu.jpg', '2024-09-09 14:44:27', '2024-09-09 14:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `position`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 'header', 1, '2024-09-09 07:08:06', '2024-09-09 07:08:06'),
(4, 'Botanika', 'https://perfectliving.in/app/company/project/the-botanika', 'Top Locations in Hyderabad', 1, '2024-09-09 08:01:33', '2024-09-10 13:19:05'),
(5, 'Nestcon', 'https://perfectliving.in/app/company/project/nestcon', 'Top Locations in Hyderabad', 1, '2024-09-09 08:09:48', '2024-09-10 13:19:51'),
(6, 'Botanika', 'https://perfectliving.in/app/company/project/the-botanika', 'Top Locations in Bengaluru', 1, '2024-09-09 15:14:43', '2024-09-10 13:19:20'),
(8, 'About us', 'https://perfectliving.in/app/about-us', 'About us', 1, '2024-09-09 15:50:02', '2024-09-09 15:50:02'),
(9, 'Contact Us', 'https://perfectliving.in/app/contact-us', 'Contact Us', 1, '2024-09-09 16:03:41', '2024-09-09 16:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_09_04_125618_create_city_masters_table', 1),
(3, '2024_09_04_125618_create_companies_table', 1),
(4, '2024_09_04_125619_create_amenities_table', 1),
(5, '2024_09_04_125619_create_area_masters_table', 1),
(6, '2024_09_04_125620_create_badges_table', 1),
(7, '2024_09_04_125620_create_collections_table', 1),
(8, '2024_09_05_144401_create_projects_table', 2),
(9, '2024_09_05_144554_create_project_amenities_table', 2),
(10, '2024_09_05_144601_create_unit_configurations_table', 3),
(11, '2024_09_06_145912_create_elevation_pictures_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `master_plan_layout` varchar(255) DEFAULT NULL,
  `about_project` text DEFAULT NULL,
  `city` int(11) UNSIGNED NOT NULL,
  `area` int(11) UNSIGNED NOT NULL,
  `elevation_pictures` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`elevation_pictures`)),
  `enquiry_form_url` varchar(255) DEFAULT NULL,
  `map_collections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`map_collections`)),
  `map_badges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`map_badges`)),
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `project_type` varchar(100) DEFAULT NULL,
  `no_of_acres` varchar(150) DEFAULT NULL,
  `no_of_towers` varchar(150) DEFAULT NULL,
  `no_of_units` varchar(150) DEFAULT NULL,
  `price_per_sft` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `is_approved`, `name`, `slug`, `company_id`, `site_address`, `logo`, `website_url`, `latitude`, `longitude`, `master_plan_layout`, `about_project`, `city`, `area`, `elevation_pictures`, `enquiry_form_url`, `map_collections`, `map_badges`, `amenities`, `project_type`, `no_of_acres`, `no_of_towers`, `no_of_units`, `price_per_sft`, `created_at`, `updated_at`) VALUES
(9, 0, 'The Botanika', 'the-botanika', 2, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15224.736435214052!2d78.362395!3d17.4509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93b8abf9f511%3A0x83cb63d254f57fb3!2sThe%20Botanika!5e0!3m2!1sen!2sus!4v1725367184426!5m2!1sen!2sus', 'projects/bEdfbEkrbCxW7dlIIcB7fmgh1mglNTScbRTltmUS.png', 'https://botanika.in/', '17.451309397154446', '78.36475534299113', 'projects/BHWQemfwu7fkQf79bddTpZeUw1UfVs94Y90dEsdm.png', '<p>Every morning at The Botanika, you wake up to 200 acres of The Botanical Garden\'s greenery, Surround yourself with incredible open spaces, and feel the freshness, as luxury takes on a green hue. Rejuvenate yourself as you breathe in the pure morning air. After all, this is a community where every day you experience tranquility.</p>\r\n<p>Indulge in a host of stellar amenities like a fully equipped multi-cuisine fine dining restaurant, a Business center with modern conferencing facilities, a mini-movie theater, and the best of sports, health, and fitness facilities in a 40,000 sq.ft</p>\r\n<p>&nbsp;</p>', 2, 2, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', NULL, 'Apartment Gated Community', '1.5', '5', '400', '6000', '2024-09-06 18:21:53', '2024-09-12 15:06:18'),
(10, 1, 'Nestcon', 'nestcon', 4, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7610.371762867956!2d78.494558!3d17.498638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9bc48815656f%3A0x84b465af924ddcdc!2sNestcon\'s%20Dhruva%20Tara!5e0!3m2!1sen!2sin!4v1725873444605!5m2!1sen!2sin', 'projects/q24Q4ty9zuTBvbPguuAXgP5sxn9vpogdsVqdiSl4.png', 'https://nestcon.com', '17.506882566072722', '78.55340169161568', 'projects/qpXwyMeoI7OqZqd4nEfexRHxoSGuw1Ex9iyBKLwK.png', '<p>With an extensive experience of nearly two decades, Nestcon has embarked on this esteemed standalone project in Alwal, Secunderabad, to deliver quality constructions on time and within budget. The project is designed to offer you an exclusive lifestyle complemented by eco-friendly features for sustainable living. It is a project of&nbsp;<strong>3BHK luxury apartments in Nagireddy Colony, Alwal, Secunderabad.</strong></p>\r\n<p>If you want to speak with our authorized sales representative about the property and get the best deals, please contact us using the details listed below.</p>\r\n<p><strong>RERA Approved No: P02400004542</strong></p>\r\n<p>Ph:&nbsp;<a href=\"tel:+91-8431320000\">+91-8431320000</a>&nbsp;, +91-9052233233&nbsp; &nbsp; &nbsp;Email:&nbsp;<a href=\"mailto:sales@nestcon.com\">sales@nestcon.com</a></p>', 2, 3, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', NULL, 'Apartment Gated Community', '2', '30', '600', '6000', '2024-09-09 14:42:07', '2024-09-11 13:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_amenities`
--

CREATE TABLE `project_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `star_rating` tinyint(3) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `reviewed_on` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `approval_status` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_on` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `project_id`, `star_rating`, `review`, `reviewed_on`, `ip_address`, `approval_status`, `approved_by`, `approved_on`, `created_at`, `updated_at`) VALUES
(3, 0, 9, 3, 'Botanika project is good to move', '2024-09-10 12:19:41', '106.222.231.212', 1, 21, '2024-09-12 13:36:41', '2024-09-10 12:19:41', '2024-09-12 13:36:41'),
(4, 0, 9, 3, 'Great project', '2024-09-10 12:41:28', '106.222.231.212', 1, 21, '2024-09-12 13:36:45', '2024-09-10 12:41:28', '2024-09-12 13:36:45'),
(8, 0, 9, 5, 'Great place to live', '2024-09-16 15:13:47', '106.222.230.251', 0, NULL, NULL, '2024-09-16 15:13:47', '2024-09-16 15:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(30) NOT NULL,
  `form_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `client_id`, `type`, `form_data`, `created_at`, `updated_at`) VALUES
(1, 29, 'fre_emailer', '{\"subject\":\"Thank you\",\"message_body\":\"<p>Dear {{name}},<\\/p> <p>Thank you for your interest in our services.<\\/p> <p>Best regards,<\\/p> <p>Our Team<\\/p>\",\"client_id\":\"29\",\"type\":\"fre_emailer\"}', '2024-08-19 07:32:31', '2024-08-19 07:49:28'),
(2, 29, 'lead_notificaion_emailer', '{\"subject\":\"New Lead from {{source}}: {{name}}\",\"message_body\":\"<p>&lt;p&gt;&lt;strong&gt;New Lead Information:&lt;\\/strong&gt;&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Name:&lt;\\/strong&gt; {{name}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Phone:&lt;\\/strong&gt; {{phone}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Email:&lt;\\/strong&gt; {{email}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Source:&lt;\\/strong&gt; {{source}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Medium:&lt;\\/strong&gt; {{medium}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Campaign:&lt;\\/strong&gt; {{campaign}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Custom Field 1:&lt;\\/strong&gt; {{custom_field_1}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Custom Field 2:&lt;\\/strong&gt; {{custom_field_2}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Status:&lt;\\/strong&gt; {{status}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Assigned To:&lt;\\/strong&gt; {{assigned_to}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Lead Created At:&lt;\\/strong&gt; {{created_at}}&lt;\\/p&gt;<br \\/> &lt;p&gt;&lt;strong&gt;Last Contacted:&lt;\\/strong&gt; {{last_contacted}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;&lt;strong&gt;Message Body:&lt;\\/strong&gt;&lt;\\/p&gt;<br \\/> &lt;p&gt;{{message_body}}&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;Thank you for your attention.&lt;\\/p&gt;<\\/p> <p>&lt;p&gt;Best regards,&lt;br&gt;Your Team&lt;\\/p&gt;<br \\/> &nbsp;<\\/p>\",\"client_id\":\"29\",\"type\":\"lead_notificaion_emailer\"}', '2024-08-19 07:54:34', '2024-08-19 07:54:34'),
(3, 29, 'smtp_credentials_emailer', '{\"host\":\"smtp.com\",\"smtp_secure\":\"TLS\",\"portno\":\"6636\",\"username\":\"venkat@deepredink.com\",\"password\":\"venkat2512$$\",\"from_name\":\"Botanik\",\"from_email\":\"info@botanika.in\",\"client_id\":\"29\",\"type\":\"smtp_credentials_emailer\"}', '2024-08-19 08:07:48', '2024-08-19 08:07:48'),
(5, 29, 'external_crm_config', '{\"crm_name\":\"4QT\",\"request_method\":\"GET\",\"api_url\":\"http:\\/\\/botanika08.realeasy.in\\/IVR_Inbound.aspx\",\"auth_method\":\"Username & Password\",\"api_token\":null,\"api_key\":null,\"username\":\"fourqt\",\"password\":\"wn9mxO76f34=\",\"is_active\":\"1\",\"schema_keys\":[\"f\",\"con\",\"email\",\"name\",\"url\",\"Remark\",\"Proj\",\"src\",\"amob\",\"city\",\"location\",\"ch\",\"UID\",\"PWD\"],\"schema_values\":[\"m\",\"{{mobile}}\",\"{{email}}\",\"{{name}}\",\"{{url}}\",\"{{notes}}\",\"The Botanika\",\"{{utm_source}}\",\"{{amob}}\",\"{{city}}\",\"{{location}}\",\"DG\",\"{{username}}\",\"{{password}}\"],\"client_id\":\"29\",\"type\":\"external_crm_config\",\"schema\":{\"f\":\"m\",\"con\":\"{{mobile}}\",\"email\":\"{{email}}\",\"name\":\"{{name}}\",\"url\":\"{{url}}\",\"Remark\":\"{{notes}}\",\"Proj\":\"The Botanika\",\"src\":\"{{utm_source}}\",\"amob\":\"{{amob}}\",\"city\":\"{{city}}\",\"location\":\"{{location}}\",\"ch\":\"DG\",\"UID\":\"{{username}}\",\"PWD\":\"{{password}}\"}}', '2024-08-19 10:39:37', '2024-08-20 06:20:45'),
(6, 79, 'external_crm_config', '{\"crm_name\":\"Tranquil\",\"api_url\":\"https:\\/\\/nestconshelters.tranquilcrmone.com\\/mobileapp\\/mblead\",\"auth_method\":\"API Key\",\"api_token\":\"TRNQUILCRMnestconshelters\",\"api_key\":\"TRNQUILCRMnestconshelters\",\"username\":null,\"password\":null,\"is_active\":\"1\",\"schema_keys\":[\"customer_name\",\"email\",\"country_code\",\"mobile_number\",\"lead_project_nm\",\"campaign_name\",\"adgroup_name\",\"ad_name\",\"source_type\",\"sub_source\",\"remark\",\"budget\"],\"schema_values\":[\"{{name}}\",\"{{email}}\",\"{{country_code}}\",\"{{mobile}}\",\"{{lead_project_nm}}\",\"{{campaign_name}}\",\"{{adgroup_name}}\",\"{{ad_name}}\",\"{{source_type}}\",\"Portal\",\"{{notes}}\",\"{{budget}}\"],\"client_id\":\"79\",\"type\":\"external_crm_config\",\"schema\":{\"customer_name\":\"{{name}}\",\"email\":\"{{email}}\",\"country_code\":\"{{country_code}}\",\"mobile_number\":\"{{mobile}}\",\"lead_project_nm\":\"{{lead_project_nm}}\",\"campaign_name\":\"{{campaign_name}}\",\"adgroup_name\":\"{{adgroup_name}}\",\"ad_name\":\"{{ad_name}}\",\"source_type\":\"{{source_type}}\",\"sub_source\":\"Portal\",\"remark\":\"{{notes}}\",\"budget\":\"{{budget}}\"}}', '2024-08-19 12:29:18', '2024-08-19 12:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `themeoptions`
--

CREATE TABLE `themeoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `footer_address` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `pinterest_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `whatsapp_url` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `short_aboutus` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `privacy_cta` varchar(255) DEFAULT NULL,
  `terms_conditions_cta` varchar(255) DEFAULT NULL,
  `mobile_no_invoice` varchar(255) DEFAULT NULL,
  `gst_no_invoice` varchar(255) DEFAULT NULL,
  `company_invoice` varchar(255) DEFAULT NULL,
  `drno_invoice` varchar(255) DEFAULT NULL,
  `street_invoice` varchar(255) DEFAULT NULL,
  `landmark_invoice` varchar(255) DEFAULT NULL,
  `city_invoice` varchar(255) DEFAULT NULL,
  `state_invoice` varchar(255) DEFAULT NULL,
  `pincode_invoice` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themeoptions`
--

INSERT INTO `themeoptions` (`id`, `header_logo`, `footer_logo`, `favicon`, `footer_address`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `pinterest_url`, `youtube_url`, `whatsapp_url`, `copyright`, `short_aboutus`, `mobile`, `email`, `privacy_cta`, `terms_conditions_cta`, `mobile_no_invoice`, `gst_no_invoice`, `company_invoice`, `drno_invoice`, `street_invoice`, `landmark_invoice`, `city_invoice`, `state_invoice`, `pincode_invoice`, `created_at`, `updated_at`) VALUES
(1, 'storage/app/uploads/66e95f92f23d6_1726570386.png', 'storage/app/uploads/66e95ff38ce56_1726570483.png', 'storage/app/uploads/66e960c25e356_1726570690.png', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://in.linkedin.com/', 'https://instagram.com/', NULL, NULL, 'https://web.whatsapp.com/', 'Perfect Living, 2024', 'Your ultimate destination for a balanced and fulfilling life. Explore expert tips, wellness advice, and inspiring content to help you achieve harmony in mind, body, and spirit. Embrace a lifestyle that nurtures your well-being and happiness', NULL, NULL, NULL, NULL, '8977528118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 11:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `unit_configurations`
--

CREATE TABLE `unit_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `beds` varchar(100) DEFAULT NULL,
  `baths` varchar(100) DEFAULT NULL,
  `balconies` varchar(50) DEFAULT NULL,
  `facing` varchar(255) DEFAULT NULL,
  `unit_size` varchar(150) DEFAULT NULL,
  `floor_plan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_configurations`
--

INSERT INTO `unit_configurations` (`id`, `project_id`, `beds`, `baths`, `balconies`, `facing`, `unit_size`, `floor_plan`, `created_at`, `updated_at`) VALUES
(5, 9, '2', '2', '2', 'East', '1366', 'unit-configurations/nMPDlB4uGqk7KZOwNJWbda8AahQe6TXZvPMZvKsb.jpg', '2024-09-06 18:24:19', '2024-09-06 18:24:19'),
(6, 9, '3', '3', '3', 'West', '1920', 'unit-configurations/sM0CGSNQDc8eQ4u8KeX14QHDZ7ENgMc4tlCUT69T.jpg', '2024-09-06 18:24:53', '2024-09-06 18:24:53'),
(7, 9, '4', '5', '4', 'East', '2560', 'unit-configurations/beMkV1i10b185iJrNNvYowYCdVU0UMYOXBlXk3pc.jpg', '2024-09-06 18:25:22', '2024-09-06 18:25:22'),
(8, 9, '2', '2', '1', 'West', '190', 'unit-configurations/YSrmUUjtWQGqszqiJchYdJ6wevW6G8cv5cwLAX2L.jpg', '2024-09-09 07:04:24', '2024-09-09 07:04:24'),
(9, 10, '2', '2', '2', 'East', '1416', 'unit-configurations/4IxH6Vj8FrZQyHFCLVtG1Qb7zBJZOdCIxbLj4CU1.jpg', '2024-09-09 14:42:57', '2024-09-09 14:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `client_id` varchar(100) DEFAULT NULL,
  `projects_mapped` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`projects_mapped`)),
  `fullname` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `password_updated_at` timestamp NULL DEFAULT NULL,
  `registered_on` datetime DEFAULT NULL,
  `profile_photo` varchar(255) NOT NULL DEFAULT 'default_profile_pic.png',
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `last_logged_on` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip_address` varchar(150) DEFAULT NULL,
  `password_created_at` timestamp NULL DEFAULT NULL,
  `current_login_at` timestamp NULL DEFAULT NULL,
  `current_login_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `client_id`, `projects_mapped`, `fullname`, `phone`, `username`, `password`, `password_updated_at`, `registered_on`, `profile_photo`, `role`, `last_logged_on`, `active`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip_address`, `password_created_at`, `current_login_at`, `current_login_ip`) VALUES
(192, NULL, NULL, 'Ranjith', '9898989892', 'ranjith@deepredink.com', '$2y$10$7s/1ZX2fDKsLkAw0dpZG.u/AjZKgTIZxH9ma2UoHFdi8YoUBsliem', NULL, NULL, 'default_profile_pic.png', 1, NULL, 1, '2024-09-11 10:43:22', '2024-09-18 12:41:06', '2024-09-18 12:33:48', '106.222.232.129', NULL, '2024-09-18 12:41:06', '106.222.232.129'),
(193, NULL, NULL, 'Publisher', '9898989898', 'publisher@deepredink.com', NULL, NULL, NULL, 'default_profile_pic.png', 2, NULL, 1, '2024-09-11 11:13:10', '2024-09-11 16:13:02', NULL, NULL, NULL, NULL, NULL),
(194, NULL, NULL, 'Purnavi', '9182805457', 'purnavi@deepredink.com', '$2y$10$Qb2X6vuR9uzSEEcYuCTq7OCmVPoJTl6ZZ89BPZu0UJxPrVbsvaHSm', NULL, NULL, 'default_profile_pic.png', 4, NULL, 1, '2024-09-11 12:19:04', '2024-09-18 12:41:55', '2024-09-17 16:34:40', '106.222.232.129', NULL, '2024-09-18 12:41:55', '106.222.232.129'),
(195, NULL, NULL, 'Sailaja', '9182805457', 'sailaja@deepredink.com', '$2y$10$u9CjqqhJQhk7m9p/0w6X.uGdNRk1VYuItJYo90hWzdJoCp6MJymnK', NULL, NULL, 'default_profile_pic.png', 3, NULL, 1, '2024-09-11 12:47:35', '2024-09-17 16:33:52', '2024-09-11 12:48:14', '106.222.231.212', NULL, '2024-09-11 12:48:14', '106.222.231.212');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(250) NOT NULL,
  `code` varchar(10) NOT NULL,
  `role_name_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `organization_id`, `name`, `code`, `role_name_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(2, 0, 'Publisher', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(3, 0, 'Editor', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(4, 0, 'Creator', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifies`
--

CREATE TABLE `user_verifies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_verifies`
--

INSERT INTO `user_verifies` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 44, 'nvypczBN81gepuk4uWVEmot3ZDF5h23XcDtFpP5Nl8S6iE9nXspWbNPwEkpyVOuv', '2024-03-16 10:53:01', '2024-03-16 10:53:01'),
(2, 44, 'skKcNJ3KO30GA1e2qVvkEjSD7ivIgduQr1nRTr05NrlGw2R7c4W6TW6qQbtHwvIr', '2024-03-16 10:55:22', '2024-03-16 10:55:22'),
(3, 21, '28qnsCa9Z4Beo7LapwWsX8U3yYzC1UBXunL3eYDK28R3zjQDFYONKUBjccnLGGU1', '2024-08-12 09:28:37', '2024-08-12 09:28:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_masters`
--
ALTER TABLE `area_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_masters_city_id_foreign` (`city_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_masters`
--
ALTER TABLE `city_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elevation_pictures_project_id_foreign` (`project_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_key` (`company_id`);

--
-- Indexes for table `project_amenities`
--
ALTER TABLE `project_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themeoptions`
--
ALTER TABLE `themeoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_configurations`
--
ALTER TABLE `unit_configurations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_configurations_project_id_foreign` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verifies`
--
ALTER TABLE `user_verifies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area_masters`
--
ALTER TABLE `area_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city_masters`
--
ALTER TABLE `city_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_amenities`
--
ALTER TABLE `project_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_configurations`
--
ALTER TABLE `unit_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_verifies`
--
ALTER TABLE `user_verifies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_masters`
--
ALTER TABLE `area_masters`
  ADD CONSTRAINT `area_masters_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  ADD CONSTRAINT `elevation_pictures_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_company_key` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_configurations`
--
ALTER TABLE `unit_configurations`
  ADD CONSTRAINT `unit_configurations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
