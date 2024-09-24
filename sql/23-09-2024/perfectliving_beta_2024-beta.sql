-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2024 at 05:21 AM
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
-- Database: `perfectliving_beta_2024`
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

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(3, 'Toddlers Play', 'amenities/82guXsSZIMo5n1LymIUpRkNFdbOnsNPvdmZ8b5PA.png', '2024-09-19 16:35:48', '2024-09-19 16:35:48'),
(4, 'Indoor Games', 'amenities/mPBqf026Wa1tcwcB5zoEFr28O1FUYahdoetuHwpN.png', '2024-09-19 16:36:15', '2024-09-19 16:36:15'),
(5, 'Learning Center', 'amenities/pybkJP0mlh4deVCo9DS6367zpfwteUGvOde960rQ.png', '2024-09-19 16:36:50', '2024-09-19 16:36:50'),
(6, 'Mini board Games', 'amenities/CCSRSQIuM54wfnNCs7VAAoMiWVwVfe7aosUo4BX2.png', '2024-09-19 16:37:31', '2024-09-19 16:37:31'),
(7, 'Business Lounge', 'amenities/aQojxUvJx91CYzcGGJdncEDmOLhScrUi5EwASFnz.png', '2024-09-19 16:38:03', '2024-09-19 16:38:03'),
(8, 'Guest Room', 'amenities/k5uz5Ufn6O9waMonjuDzWoGg7JPLTS4yF6pFae7N.png', '2024-09-19 16:38:41', '2024-09-19 16:38:41'),
(9, 'Multi Purpose Hall', 'amenities/Lr1yY6jj6YDhc6YwAsUjxNfrQyT4FFFyIwmAEEv8.png', '2024-09-19 16:39:17', '2024-09-19 16:39:17'),
(10, 'Swimming Pools (Adults & Kids)', 'amenities/76MmtNC7YyXjbQIYAFMkiKVfkpZ7bY3SsJglFxE4.png', '2024-09-19 16:40:11', '2024-09-19 16:40:11'),
(11, 'Convenience Store', 'amenities/xrjMHImvJYhWOdoqBz5JrAGW1pPoSpYA5MKyzDwT.png', '2024-09-19 16:40:42', '2024-09-19 16:40:42'),
(12, 'Cafeteria/ Coffee Shop', 'amenities/jbtuVCxT1gqOs77IfyucRdehlRPxYgKRpLjTzkYD.png', '2024-09-19 16:41:01', '2024-09-19 16:41:01'),
(13, 'Kid’s Play Area', 'amenities/swIGYhelKR5FDysCa58dzc7UqIPf3GsreQcruBwN.png', '2024-09-19 16:41:26', '2024-09-19 16:41:26'),
(14, 'Salon ( Men & Women exclusive )', 'amenities/PGE9Z2iI94uWDMBOmouEjGFVW8ZWEeWWnNYyC14p.png', '2024-09-19 16:42:05', '2024-09-19 16:42:05'),
(15, 'Library', 'amenities/YtHDwzYX097ThbHppZ2y3bh9yiSDDGN8ib4RxvRU.png', '2024-09-19 16:42:25', '2024-09-19 16:42:25'),
(16, 'Dance Studio', 'amenities/eW9WHnuzdBqzCJarLDv5soWtMFv6JEVSTW9g7vfk.png', '2024-09-19 16:42:42', '2024-09-19 16:42:42'),
(17, 'Senior Citizens Lounge', 'amenities/ebXQMIbQQ7JJBNHhRDeaW2Y9oxlvRj71aAcjAMCR.png', '2024-09-19 16:43:02', '2024-09-19 16:43:02'),
(18, 'Jogging Track', 'amenities/8bduhsbQ1DZMM8jUzuiUzMrkWJdxHVO3W3nl3dl1.png', '2024-09-19 16:43:24', '2024-09-19 16:43:24'),
(19, 'Gym ( Men & Women )', 'amenities/yFNwl0FBh1M3hhXKAar8gyTPHN8JOxI1zqXKCf5d.png', '2024-09-19 16:43:47', '2024-09-19 16:43:47'),
(20, 'Preview Theatre', 'amenities/kNy6kyPfIC7Fm0g1Z6b4hB9n7WBVKCMKcV9K1GIA.png', '2024-09-19 16:44:05', '2024-09-19 16:44:05'),
(21, 'Badminton Courts', 'amenities/6MOPqqCX7iRuhUGTOjLrtRX2Nxd8xIDRinaXMFOZ.png', '2024-09-19 16:44:19', '2024-09-19 16:44:19'),
(22, 'Yoga/Meditation', 'amenities/z22XF1cPVyNPIuyi6ThrAnLB0qwnxhTZLpEv1uQZ.png', '2024-09-19 16:44:37', '2024-09-19 16:44:37');

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
(3, 'Secunderabad', 2, '2024-09-09 14:49:44', '2024-09-09 14:49:44'),
(4, 'Kukatpally', 2, '2024-09-19 15:53:49', '2024-09-19 15:53:49'),
(5, 'Peeramcheruvu', 2, '2024-09-19 23:02:06', '2024-09-19 23:02:06');

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
(2, 'Top Gated communities <br>close to Hitec & Gachibowli', 'background_images/aTk7j6osEkiJ8o68o4hkLOwYHqUlDpzwQbMb6sSG.jpg', 'https://perfectliving.in/project/nestcon', '2024-09-05 06:36:56', '2024-09-19 17:03:07'),
(3, 'Top properties abutting green<br> lung spaces', 'background_images/n1cPwR12yYAa4DCfVdZmVYudorXIEleUxlre7o3t.jpg', 'https://perfectliving.in/project/nestcon', '2024-09-05 12:20:11', '2024-09-19 17:03:12'),
(4, '30 properties <br>30 min from Airport', 'background_images/Pzv66AKEjOEDZuq9TwhQzAHpm581hDaDOt7mqI1P.jpg', 'https://perfectliving.in/project/nestcon', '2024-09-06 18:02:16', '2024-09-19 17:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `collection_project`
--

CREATE TABLE `collection_project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `projects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
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

INSERT INTO `companies` (`id`, `name`, `slug`, `about_builder`, `address1`, `address2`, `phone`, `website_url`, `created_at`, `updated_at`) VALUES
(2, 'Koncept Ambience Group', 'koncept-ambience-group', '<div>\r\n<div>Founded: 1995</div>\r\n<div>Completed 25 projects</div>\r\n<div>Highlights</div>\r\n<br>\r\n<div>Built first mixed use commercial property of Hyderabad</div>\r\n<div>Built the first LEED Platinum certified residential proprety in Hyderabad</div>\r\n<div>&nbsp;</div>\r\n<div>Own this property? Tell us the facts!in</div>\r\n</div>', 'Hyderabad,TG', NULL, '7894561234', 'http://botanika.in', '2024-09-04 09:57:09', '2024-09-19 17:21:47'),
(4, 'Nestcon', 'nestcon', 'Test', 'Plot No.7, 1st Floor, All Saints Road, Near LIC Office, Trimulgherry, Secunderabad, Telangana 500015', NULL, '843 1320 000', 'https://nestcon.com/', '2024-09-06 17:48:55', '2024-09-19 17:22:01'),
(6, 'Raghuram Construction', 'raghuram-construction', 'Test', 'Toli Chowki, Hyderabad', NULL, '+91 70707 87979', 'https://raghuramconstructions.com/', '2024-09-19 15:51:29', '2024-09-19 17:22:06'),
(7, 'Indis', 'indis', '<div class=\"p space-min-bottom\">INDIS, its continuous efforts in building Engineering capabilities; use of robust technologies, such as the shear wall method of construction; engaging reputed construction partners; collaboration with renowned fund houses; sturdy systems and processes and its unwavering focus on customer service, INDIS has built its reputation of being a progressive; reliable, innovative and a transparent Real Estate Company.</div>\r\n<div class=\"p\">With Excellence in Engineering; Constant Innovation and Learning at its core, INDIS is set to cross many more milestones in the coming years.</div>', 'Jubilee Hills, Hyderabad', NULL, '+91 40 6898 9898', 'https://indis.co.in/', '2024-09-19 18:42:29', '2024-09-19 18:42:29');

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
(5, 10, '', 'elevation_pictures/nzaDxR5wQmxopMYZS4qV0JOP6kdafArkkRyIykgu.jpg', '2024-09-09 14:44:27', '2024-09-09 14:44:27'),
(6, 10, '', 'elevation_pictures/joyGF1UEhPAC7TQev0NAdhxqF7XAiMkwmcbJ3Tzk.jpg', '2024-09-18 15:06:16', '2024-09-18 15:06:16'),
(7, 10, '', 'elevation_pictures/IkU4gBXLuLWUVSbQzIE02qazrnw4xVbMn3dl16mf.jpg', '2024-09-18 15:06:45', '2024-09-18 15:06:45'),
(8, 9, '', 'elevation_pictures/age2zoY5O21V5IsHUYgsJ0kAglYc726bGTBEMW66.jpg', '2024-09-18 15:09:05', '2024-09-18 15:09:05'),
(9, 11, '', 'elevation_pictures/LtHKQmezbUb53YGCv8spWJ5Llkoj6dZ5dra4Dnh8.jpg', '2024-09-19 17:54:05', '2024-09-19 17:54:05'),
(10, 11, '', 'elevation_pictures/MinPwfMeQtushYKtHPgYpEguGSKuosHTYBGCtNSO.jpg', '2024-09-19 17:54:20', '2024-09-19 17:54:20'),
(11, 11, '', 'elevation_pictures/euTIpx5i2CDAq1WH12wi3GBe31Rq9N2IYxfIv59k.jpg', '2024-09-19 17:54:35', '2024-09-19 17:54:35'),
(12, 11, '', 'elevation_pictures/gwCgb60byK5WhOUFvj1LmBcNpleZOUHmj9xPGd9q.jpg', '2024-09-19 17:58:11', '2024-09-19 17:58:11');

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
(4, '2 BHK Apartments in Hyderabad', 'https://localhost/perfectliving/filters?beds=2', 'Apartments in Hyderabad', 1, '2024-09-09 08:01:33', '2024-09-19 16:56:52'),
(8, 'About us', 'https://localhost/perfectliving/about-us', 'About us', 0, '2024-09-09 15:50:02', '2024-09-18 13:48:45'),
(9, 'Contact Us', 'https://localhost/perfectliving/contact-us', 'Contact Us', 0, '2024-09-09 16:03:41', '2024-09-18 13:48:53'),
(10, '2.5 BHK Apartments in Hyderabad', 'https://localhost/perfectliving/filters?beds=2.5', 'Apartments in Hyderabad', 1, '2024-09-18 18:50:20', '2024-09-19 16:57:07'),
(12, 'Apartments in Kokapet', 'https://localhost/perfectliving/filters?areas=kokapet', 'Apartments in Financial District', 1, '2024-09-18 18:54:09', '2024-09-19 16:59:44'),
(13, 'Apartments in Gachibowli', 'https://localhost/perfectliving/filters?areas=gachibowli', 'Apartments in Financial District', 1, '2024-09-18 18:54:33', '2024-09-19 17:00:06'),
(14, 'Apartments in Kondapur', 'https://localhost/perfectliving/filters?areas=kondapur', 'Apartments in Financial District', 1, '2024-09-18 18:54:50', '2024-09-19 17:00:19'),
(15, 'Apartments in Kukatpally', 'https://localhost/perfectliving/filters?areas=kukatpally', 'Apartments in Financial District', 1, '2024-09-18 18:55:08', '2024-09-19 17:00:28'),
(17, '3 BHK Apartments in Hyderabad', 'https://localhost/perfectliving/filters?beds=3', 'Apartments in Hyderabad', 1, '2024-09-19 11:02:30', '2024-09-19 16:57:24'),
(19, '4 BHK Apartments in Hyderabad', 'https://localhost/perfectliving/filters?beds=4', 'Apartments in Hyderabad', 1, '2024-09-19 11:03:52', '2024-09-19 16:57:41'),
(20, '5 BHK Apartments in Hyderabad', 'https://localhost/perfectliving/filters?beds=5', 'Apartments in Hyderabad', 1, '2024-09-19 11:04:10', '2024-09-19 16:57:49'),
(22, 'Koncept Ambience Group', 'https://localhost/perfectliving/filters?builders=koncept-ambience-group', 'Top builders', 1, '2024-09-19 11:09:54', '2024-09-19 16:57:58'),
(23, 'Raghuram Group', 'https://localhost/perfectliving/filters?builders=raghuram-construction', 'Top builders', 1, '2024-09-19 11:10:25', '2024-09-19 17:27:09'),
(24, 'Indis Group', 'https://localhost/perfectliving/filters?builders=indis-group', 'Top builders', 1, '2024-09-19 11:10:53', '2024-09-19 16:58:14'),
(25, 'Incor Group', 'https://localhost/perfectliving/filters?builders=incor-group', 'Top builders', 1, '2024-09-19 11:11:19', '2024-09-19 16:58:25'),
(26, 'Apartments under 1.5 Cr', 'https://localhost/perfectliving/filters?budgets=0,1.5', 'Find Apartments by Budget', 1, '2024-09-19 11:13:05', '2024-09-19 16:58:41'),
(27, 'Apartments between 1.5 Cr & 2 Cr', 'https://localhost/perfectliving/filters?budgets=1.5,2', 'Find Apartments by Budget', 1, '2024-09-19 11:14:33', '2024-09-19 16:58:53'),
(28, 'Apartments between 2 Cr & 2.5 Cr', 'https://localhost/perfectliving/filters?budgets=2,2.5', 'Find Apartments by Budget', 1, '2024-09-19 11:15:02', '2024-09-19 16:59:05'),
(29, 'Apartments between 2.5 Cr & 4 Cr', 'https://localhost/perfectliving/filters?budgets=2.5,4', 'Find Apartments by Budget', 1, '2024-09-19 11:15:26', '2024-09-19 16:59:15'),
(30, 'Apartments between 4 & 6 Cr', 'https://localhost/perfectliving/filters?budgets=4,6', 'Find Apartments by Budget', 1, '2024-09-19 11:15:50', '2024-09-19 16:59:28'),
(31, 'Nanakramguda - Kokapet Apartments', 'https://localhost/perfectliving/filters?areas=nanakramguda,kokapet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:17:09', '2024-09-19 17:00:43'),
(32, 'Gachibowli - Kondapur Apartments', 'https://localhost/perfectliving/filters?areas=gachibowli,kondapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:19:26', '2024-09-19 17:00:55'),
(33, 'Apartments between Manikonda - Shaikpet', 'https://localhost/perfectliving/filters?areas=manikonda,shaikpet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:03', '2024-09-19 17:01:07'),
(34, 'Apartments between Hafeezpet - Miyapur', 'https://localhost/perfectliving/filters?areas=hafeezpet,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:33', '2024-09-19 17:01:36'),
(35, 'Apartments between Kukatpally - Miyapur', 'https://localhost/perfectliving/filters?areas=kukatpally,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:21:03', '2024-09-19 17:01:48');

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
(11, '2024_09_06_145912_create_elevation_pictures_table', 4),
(12, '2024_09_20_183027_create_company_project_table', 5);

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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `company_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `map_collections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `site_address` text DEFAULT NULL,
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
  `map_badges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`map_badges`)),
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `project_type` varchar(100) DEFAULT NULL,
  `no_of_acres` varchar(150) DEFAULT NULL,
  `no_of_towers` varchar(150) DEFAULT NULL,
  `no_of_units` varchar(150) DEFAULT NULL,
  `price_per_sft` float DEFAULT 0,
  `price_range_start` float NOT NULL DEFAULT 0,
  `price_range_end` float NOT NULL DEFAULT 0,
  `status` enum('newly_added','in_review','published','deactivated') NOT NULL DEFAULT 'newly_added',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `is_featured`, `company_id`, `map_collections`, `site_address`, `logo`, `website_url`, `latitude`, `longitude`, `master_plan_layout`, `about_project`, `city`, `area`, `elevation_pictures`, `enquiry_form_url`, `map_badges`, `amenities`, `project_type`, `no_of_acres`, `no_of_towers`, `no_of_units`, `price_per_sft`, `price_range_start`, `price_range_end`, `status`, `created_at`, `updated_at`) VALUES
(9, 'The Botanika', 'the-botanika', 1, '\"[\\\"4\\\",\\\"6\\\"]\"', '[\"2\",\"3\",\"4\"]', 'https://maps.app.goo.gl/c5jWtgbABjgTsFBL8', 'projects/bEdfbEkrbCxW7dlIIcB7fmgh1mglNTScbRTltmUS.png', 'https://botanika.in/', '17.451309397154446', '78.36475534299113', 'projects/BHWQemfwu7fkQf79bddTpZeUw1UfVs94Y90dEsdm.png', '<p>Every morning at The Botanika, you wake up to 200 acres of The Botanical Garden\'s greenery, Surround yourself with incredible open spaces, and feel the freshness, as luxury takes on a green hue. Rejuvenate yourself as you breathe in the pure morning air. After all, this is a community where every day you experience tranquility.</p>\r\n<p>Indulge in a host of stellar amenities like a fully equipped multi-cuisine fine dining restaurant, a Business center with modern conferencing facilities, a mini-movie theater, and the best of sports, health, and fitness facilities in a 40,000 sq.ft</p>\r\n<p>&nbsp;</p>', 2, 2, NULL, NULL, '[\"8\",\"9\",\"10\"]', NULL, 'Apartment Gated Community', '1.5', '5', '400', 6000, 1, 1.5, 'published', '2024-09-06 18:21:53', '2024-09-23 06:59:30'),
(10, 'Nestcon', 'nestcon', 1, '\"[\\\"4\\\",\\\"6\\\"]\"', '[\"2\",\"3\",\"4\"]', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7610.371762867956!2d78.494558!3d17.498638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9bc48815656f%3A0x84b465af924ddcdc!2sNestcon\'s%20Dhruva%20Tara!5e0!3m2!1sen!2sin!4v1725873444605!5m2!1sen!2sin', 'projects/q24Q4ty9zuTBvbPguuAXgP5sxn9vpogdsVqdiSl4.png', 'https://nestcon.com', '17.506882566072722', '78.55340169161568', 'projects/qpXwyMeoI7OqZqd4nEfexRHxoSGuw1Ex9iyBKLwK.png', '<p>With an extensive experience of nearly two decades, Nestcon has embarked on this esteemed standalone project in Alwal, Secunderabad, to deliver quality constructions on time and within budget. The project is designed to offer you an exclusive lifestyle complemented by eco-friendly features for sustainable living. It is a project of&nbsp;<strong>3BHK luxury apartments in Nagireddy Colony, Alwal, Secunderabad.</strong></p>\r\n<p>If you want to speak with our authorized sales representative about the property and get the best deals, please contact us using the details listed below.</p>\r\n<p><strong>RERA Approved No: P02400004542</strong></p>\r\n<p>Ph:&nbsp;<a href=\"tel:+91-8431320000\">+91-8431320000</a>&nbsp;, +91-9052233233&nbsp; &nbsp; &nbsp;Email:&nbsp;<a href=\"mailto:sales@nestcon.com\">sales@nestcon.com</a></p>', 2, 3, NULL, NULL, '[\"8\",\"9\",\"10\"]', NULL, 'Standalone Villa', '2', '30', '600', 6000, 1.5, 2, 'published', '2024-09-09 14:42:07', '2024-09-22 11:23:35'),
(11, 'A2A Homeland', 'a2a-homeland', 1, '[\"2\",\"6\"]', NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15222.109260910875!2d78.4452824!3d17.4823239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9195fed45b69%3A0xa516f048c1aaee49!2sA2A%20Homeland!5e0!3m2!1sen!2sin!4v1726748287298!5m2!1sen!2sin', 'projects/HwWLhyOy4ya8Fjs2lcgrk2gvxJyBvaNv1d86Sg8e.jpg', 'https://a2ahomeland.in/', NULL, NULL, 'projects/cWPdcxoKtCmNrVJfjYyfHSlp4UFY1AuyElzWcEkf.jpg', '<p>test</p>', 2, 4, NULL, NULL, NULL, NULL, 'Apartment Gated Community', '12', '7', '1162', 5000, 2, 2.5, 'published', '2024-09-19 16:11:52', '2024-09-20 11:06:56');

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
(9, 10, '2', '2', '2', 'East', '1416', 'unit-configurations/4IxH6Vj8FrZQyHFCLVtG1Qb7zBJZOdCIxbLj4CU1.jpg', '2024-09-09 14:42:57', '2024-09-09 14:42:57'),
(10, 11, '3', '3', '3', 'East', '1700', 'unit-configurations/hPK4cGfRW1KgkSDTKRmJ1mOzjfNz0x7BY5qyLzGt.jpg', '2024-09-19 16:48:00', '2024-09-19 16:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `client_id` varchar(100) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `projects_mapped` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`projects_mapped`)),
  `fullname` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `password_updated_at` timestamp NULL DEFAULT NULL,
  `registered_on` datetime DEFAULT NULL,
  `profile_photo` varchar(255) NOT NULL DEFAULT 'default_profile_pic.png',
  `last_logged_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip_address` varchar(150) DEFAULT NULL,
  `password_created_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `current_login_at` timestamp NULL DEFAULT NULL,
  `current_login_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `active`, `role`, `client_id`, `verification_token`, `projects_mapped`, `fullname`, `phone`, `username`, `password`, `password_updated_at`, `registered_on`, `profile_photo`, `last_logged_on`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip_address`, `password_created_at`, `email_verified_at`, `current_login_at`, `current_login_ip`) VALUES
(192, 1, 1, NULL, NULL, NULL, 'Ranjith', '9898989892', 'ranjith@deepredink.com', '$2y$10$7s/1ZX2fDKsLkAw0dpZG.u/AjZKgTIZxH9ma2UoHFdi8YoUBsliem', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-11 10:43:22', '2024-09-23 06:31:50', '2024-09-22 09:23:46', '106.216.206.215', NULL, NULL, '2024-09-23 06:31:50', '106.216.200.253'),
(193, 1, 2, NULL, NULL, NULL, 'Publisher', '9898989898', 'publisher@deepredink.com', NULL, NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-11 11:13:10', '2024-09-11 16:13:02', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 1, 4, NULL, NULL, NULL, 'Purnavi', '9182805457', 'purnavi@deepredink.com', '$2y$10$pqiKQCnOIe9Xvdzppj3DrODJAUbkE88EV8Yf7Qurp.nkS500g7EZO', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-11 12:19:04', '2024-09-19 23:00:48', '2024-09-19 15:20:46', '106.222.232.129', NULL, NULL, '2024-09-19 23:00:48', '152.58.233.176'),
(195, 1, 3, NULL, NULL, NULL, 'Sailaja', '9182805457', 'sailaja@deepredink.com', '$2y$10$u9CjqqhJQhk7m9p/0w6X.uGdNRk1VYuItJYo90hWzdJoCp6MJymnK', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-11 12:47:35', '2024-09-17 16:33:52', '2024-09-11 12:48:14', '106.222.231.212', NULL, NULL, '2024-09-11 12:48:14', '106.222.231.212'),
(204, 1, 5, NULL, NULL, NULL, 'venkat', '9876543210', 'venkat@gmail.com', '$2y$10$Y5iUMUchQhaXt6b9nGXQZuooBcRp82zcUPzLtO168feFyOFbpLjoe', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-21 06:55:14', '2024-09-21 10:43:06', '2024-09-21 10:43:06', '::1', NULL, NULL, '2024-09-21 10:43:06', '::1'),
(210, 1, 5, NULL, NULL, NULL, 'venkat K', '1234567890', 'venkat@deepredink.com', '$2y$10$0WjE.Mrq8ttHd/cR4qgG7OvmwMeauFVF4/cS5gXDUcGa4AWMVZsu6', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-21 10:31:48', '2024-09-21 10:36:13', NULL, NULL, NULL, '2024-09-21 10:36:13', NULL, NULL),
(211, 1, 5, NULL, NULL, NULL, 'Venkat yadav', '9876543214', 'venkatyadav@deepredink.com', '$2y$10$7hRsC1TNnpfnBB5RKsDCTOFR2Q/Iq2xhPkEipbpBaKJE0KkfznKgy', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-21 10:40:05', '2024-09-21 10:40:08', NULL, NULL, NULL, '2024-09-21 10:40:08', NULL, NULL),
(212, 1, 1, NULL, NULL, NULL, 'Raj', '9876543214', 'raj@gmail.com', '$2y$10$zR2CzlT/lw/RI5UIxdmpV.pgMDqGnBFC8UYEtzzfTYG.kFs9GSmQa', NULL, NULL, 'default_profile_pic.png', NULL, '2024-09-21 10:42:32', '2024-09-21 10:42:52', NULL, NULL, NULL, NULL, NULL, NULL);

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
(4, 0, 'Creator', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(5, 0, 'Non Admin User', '', NULL, 1, '2021-09-16 06:34:08', '2021-09-16 06:34:22');

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(16, 211, 10, '2024-09-21 10:40:14', '2024-09-21 10:40:14'),
(18, 211, 11, '2024-09-21 10:40:34', '2024-09-21 10:40:34');

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
-- Indexes for table `collection_project`
--
ALTER TABLE `collection_project`
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `area_masters`
--
ALTER TABLE `area_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `collection_project`
--
ALTER TABLE `collection_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_verifies`
--
ALTER TABLE `user_verifies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- Constraints for table `unit_configurations`
--
ALTER TABLE `unit_configurations`
  ADD CONSTRAINT `unit_configurations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
