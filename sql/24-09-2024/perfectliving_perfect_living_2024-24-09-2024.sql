-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2024 at 05:13 AM
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

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
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
(22, 'Yoga/Meditation', 'amenities/z22XF1cPVyNPIuyi6ThrAnLB0qwnxhTZLpEv1uQZ.png', '2024-09-19 16:44:37', '2024-09-19 16:44:37'),
(23, 'CCTV Cameras', 'amenities/DVNQnK27A4l9X5i6iyhIv9vaBOyhinIPZLBgLnW5.jpg', '2024-09-23 18:00:40', '2024-09-23 18:00:40');

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
(5, 'Peeramcheruvu', 2, '2024-09-19 23:02:06', '2024-09-19 23:02:06'),
(6, 'Kondapur', 2, '2024-09-20 14:45:40', '2024-09-20 14:45:40');

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
(8, 'Low Density Community', '1726836498.png', '2024-09-09 14:32:45', '2024-09-20 18:18:18'),
(9, 'Great Location', '1726836507.png', '2024-09-09 14:32:55', '2024-09-20 18:18:27'),
(10, 'Ultra-Luxury', '1726836518.png', '2024-09-09 14:33:08', '2024-09-20 18:18:38');

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
(2, 'Top Gated communities <br>close to Hitec & Gachibowli', 'background_images/aTk7j6osEkiJ8o68o4hkLOwYHqUlDpzwQbMb6sSG.jpg', 'https://perfectliving.in/company/project/nestcon', '2024-09-05 06:36:56', '2024-09-19 17:03:07'),
(3, 'Top properties abutting green<br> lung spaces', 'background_images/n1cPwR12yYAa4DCfVdZmVYudorXIEleUxlre7o3t.jpg', 'https://perfectliving.in/company/project/nestcon', '2024-09-05 12:20:11', '2024-09-19 17:03:12'),
(4, '30 properties <br>30 min from Airport', 'background_images/Pzv66AKEjOEDZuq9TwhQzAHpm581hDaDOt7mqI1P.jpg', 'https://perfectliving.in/company/project/nestcon', '2024-09-06 18:02:16', '2024-09-19 17:03:17');

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
(2, 'Koncept Ambience Group', 'koncept-ambience-group', '<div>\r\n<div><strong>Founded</strong>: 1995</div>\r\n<div><strong>Experience</strong>: Completed 25 projects</div>\r\n<div><strong><br>Highlights</strong></div>\r\n<div>Built the first mixed-use commercial property of Hyderabad and the&nbsp;first LEED Platinum certified residential property in Hyderabad</div>\r\n</div>', 'Hyderabad,TG', NULL, '7894561234', 'http://botanika.in', '2024-09-04 09:57:09', '2024-09-20 22:17:54'),
(4, 'Nestcon', 'nestcon', NULL, 'Plot No.7, 1st Floor, All Saints Road, Near LIC Office, Trimulgherry, Secunderabad, Telangana 500015', NULL, '843 1320 000', 'https://nestcon.com/', '2024-09-06 17:48:55', '2024-09-19 17:22:01'),
(6, 'Raghuram Construction', 'raghuram-construction', NULL, 'Toli Chowki, Hyderabad', NULL, '+91 70707 87979', 'https://raghuramconstructions.com/', '2024-09-19 15:51:29', '2024-09-19 17:22:06'),
(7, 'INDIS Group', 'indis', '<div class=\"p space-min-bottom\">INDIS, its continuous efforts in building Engineering capabilities; use of robust technologies, such as the shear wall method of construction; engaging reputed construction partners; collaboration with renowned fund houses; sturdy systems and processes and its unwavering focus on customer service, INDIS has built its reputation of being a progressive; reliable, innovative and a transparent Real Estate Company.</div>\r\n<div class=\"p\">With Excellence in Engineering; Constant Innovation and Learning at its core, INDIS is set to cross many more milestones in the coming years.</div>', 'Jubilee Hills, Hyderabad', NULL, '+91 40 6898 9898', 'https://indis.co.in/', '2024-09-19 18:42:29', '2024-09-20 11:48:51'),
(8, 'INCOR Group', 'incor-group', NULL, 'Kavuri Hills, Madhapur, Hyderabad', NULL, '+91 40 6818 1800', 'https://www.incor.in/', '2024-09-20 12:04:58', '2024-09-20 12:05:14'),
(9, 'RajaPushpa', 'rajapushpa', '<p>Founded in 2006 by the Parupati Brothers, Rajapushpa Properties is a name to reckon with in the real estate space. Since more than a decade we have been reinventing the standards of residential living in the form of gated community apartments, villas and commercial IT/ITEs spaces. We believe that a well-conceived real estate space has the power to transform lives and a smart design can impact the way we engage with our surroundings.</p>\r\n<p>At the helm we have four visionaries Mr. P. Jayachandra Reddy, Mr. P. Mahender Reddy, Mr. P. Sreenivas Reddy and Mr. P. Sujith Reddy whose innovative ideas and foresight have helped in their quest to build a real estate company par excellence.</p>', 'Rajapushpa Summit, Nanakramguda Road, Gachibowli', NULL, '+91-7660005500', 'https://www.rajapushpa.in/', '2024-09-20 12:13:26', '2024-09-20 12:13:26'),
(10, 'Auro Realty', 'auro-realty', NULL, 'Auro Realty Private Limited, Hyderabad Knowledge Park, Raidurg, Hyderabad', NULL, '+91 9121222335', 'https://aurorealty.com/', '2024-09-20 15:32:16', '2024-09-20 15:32:16'),
(11, 'Sukhii Group', 'sukhii-group', NULL, 'Banjara Hills, Road No.2, Hyderabad', NULL, '+91 9647 363636', 'https://www.sukhii.group/', '2024-09-20 15:35:42', '2024-09-20 15:35:42'),
(12, 'Vamsiram Builders', 'vamsiram-builders', NULL, 'Nandagiri Hills, Jubilee Hills, Hyderabad', NULL, '+91 8399939999', 'https://vamsirambuilders.com/', '2024-09-20 15:40:05', '2024-09-20 15:40:05'),
(13, 'My Home Construction', 'my-home-construction', NULL, 'MY HOME HUB, HITECH CITY, MADHAPUR', NULL, '+91 9100088888', 'https://www.myhomeconstructions.com/', '2024-09-20 15:44:45', '2024-09-20 15:44:45');

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
(9, 11, '', 'elevation_pictures/LtHKQmezbUb53YGCv8spWJ5Llkoj6dZ5dra4Dnh8.jpg', '2024-09-19 17:54:05', '2024-09-19 17:54:05'),
(10, 11, '', 'elevation_pictures/MinPwfMeQtushYKtHPgYpEguGSKuosHTYBGCtNSO.jpg', '2024-09-19 17:54:20', '2024-09-19 17:54:20'),
(11, 11, '', 'elevation_pictures/euTIpx5i2CDAq1WH12wi3GBe31Rq9N2IYxfIv59k.jpg', '2024-09-19 17:54:35', '2024-09-19 17:54:35'),
(12, 11, '', 'elevation_pictures/gwCgb60byK5WhOUFvj1LmBcNpleZOUHmj9xPGd9q.jpg', '2024-09-19 17:58:11', '2024-09-19 17:58:11'),
(13, 12, '', 'elevation_pictures/FJwBj5HGMd58Llo0kqFDdMZv8CRr8m1qHCwRm85G.jpg', '2024-09-20 13:07:14', '2024-09-20 13:07:14'),
(14, 12, '', 'elevation_pictures/BkWSUHvKsC6PdvFU3moGtHFBmxoCdfLxF0SbwSlV.jpg', '2024-09-20 13:10:36', '2024-09-20 13:10:36'),
(15, 12, '', 'elevation_pictures/0ClLoikWi4J5hNDhYlHo0qx7F2DrSuyapLHvKIzU.jpg', '2024-09-20 13:10:51', '2024-09-20 13:10:51'),
(16, 12, '', 'elevation_pictures/YS7xjBbULVchWEswVNbaDVe9x73SYrGO97xYohbJ.jpg', '2024-09-20 13:11:09', '2024-09-20 13:11:09'),
(17, 13, '', 'elevation_pictures/KsWsCT7DAySWtj8AKnyhapXn9RhZzv1xfp9i0tEr.jpg', '2024-09-20 15:06:55', '2024-09-20 15:06:55'),
(18, 13, '', 'elevation_pictures/yMpKl6Q6HLySbShCnBvAEkoktXEYjXzDaYnfKZDk.jpg', '2024-09-20 15:07:09', '2024-09-20 15:07:09'),
(19, 13, '', 'elevation_pictures/hjVwWnL6oaQXhQxDgO7EkYz21zDfZUQo8Jj6xroR.jpg', '2024-09-20 15:07:23', '2024-09-20 15:07:23'),
(20, 13, '', 'elevation_pictures/izjWKzS7PVrxpvU2zQ6pDTgDfD1YijmweWJNt90s.jpg', '2024-09-20 15:07:36', '2024-09-20 15:07:36'),
(21, 9, '', 'elevation_pictures/7cEVG9xUGMj4YQtyOjJ3pP2ZfuI2p7IOR7GHnyg3.png', '2024-09-20 15:12:05', '2024-09-20 15:12:05'),
(22, 9, '', 'elevation_pictures/oenOAzYGO3ya5rsMJL2jSpgv5vwbLSLFht5jCKZB.png', '2024-09-20 15:12:19', '2024-09-20 15:12:19'),
(23, 9, '', 'elevation_pictures/zWiTvH7VZYWXmY0N78oEOHxSEHrJXp3cIa08NByG.jpg', '2024-09-20 15:12:33', '2024-09-20 15:12:33'),
(24, 9, '', 'elevation_pictures/K0t9mUUK2rAby6u7kdORtRWUSld4IR0pFmfanPLE.jpg', '2024-09-20 15:12:45', '2024-09-20 15:12:45'),
(34, 10, '', 'elevation_pictures/tBXTl2u8JePMH919M0ZW0rGnTzTY5licmWVanMaH.jpg', '2024-09-23 15:42:05', '2024-09-23 15:42:05'),
(35, 14, '', 'elevation_pictures/kIr0sd1syd92MS2E6vTaButwCokK6X2mY6BqYEBY.jpg', '2024-09-23 15:43:28', '2024-09-23 15:43:28'),
(36, 14, '', 'elevation_pictures/7VMpmdwDye92CTUsNMxZTe2Pzj3vnqOJEhHJhq4X.jpg', '2024-09-23 15:53:51', '2024-09-23 15:53:51'),
(37, 14, '', 'elevation_pictures/oS5rsj4WDL3ggDcQ0T3hZYpWnk1U2bHO379gOtPm.jpg', '2024-09-23 15:54:03', '2024-09-23 15:54:03'),
(38, 14, '', 'elevation_pictures/ZuQp5aqWYT2bnVphtdc1J8Tlu40RlbqqmuqRzKx5.jpg', '2024-09-23 15:54:13', '2024-09-23 15:54:13'),
(39, 10, '', 'elevation_pictures/lbvKycOUqVjXVDDKWVQ2MNhTe2Hb8vwrM037ZpKw.jpg', '2024-09-23 15:55:18', '2024-09-23 15:55:18'),
(40, 10, '', 'elevation_pictures/kaibiBWpsKTPQk7ZMjxlhKgQQNZlriWzekj2Vx7Z.jpg', '2024-09-23 15:55:33', '2024-09-23 15:55:33'),
(41, 10, '', 'elevation_pictures/AyiTkGABKqHu5mxXn1z0cia3qRqPxdqhDrA2Gz4J.jpg', '2024-09-23 15:55:49', '2024-09-23 15:55:49');

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
(4, '2 BHK Apartments in Hyderabad', 'https://perfectliving.in/filters?beds=2', 'Apartments in Hyderabad', 1, '2024-09-09 08:01:33', '2024-09-19 16:56:52'),
(8, 'About us', 'https://perfectliving.in/about-us', 'About us', 0, '2024-09-09 15:50:02', '2024-09-18 13:48:45'),
(9, 'Contact Us', 'https://perfectliving.in/contact-us', 'Contact Us', 0, '2024-09-09 16:03:41', '2024-09-18 13:48:53'),
(10, '2.5 BHK Apartments in Hyderabad', 'https://perfectliving.in/filters?beds=2.5', 'Apartments in Hyderabad', 1, '2024-09-18 18:50:20', '2024-09-19 16:57:07'),
(12, 'Apartments in Kokapet', 'https://perfectliving.in/filters?areas=kokapet', 'Apartments in Financial District', 1, '2024-09-18 18:54:09', '2024-09-19 16:59:44'),
(13, 'Apartments in Gachibowli', 'https://perfectliving.in/filters?areas=gachibowli', 'Apartments in Financial District', 1, '2024-09-18 18:54:33', '2024-09-19 17:00:06'),
(14, 'Apartments in Kondapur', 'https://perfectliving.in/filters?areas=kondapur', 'Apartments in Financial District', 1, '2024-09-18 18:54:50', '2024-09-19 17:00:19'),
(15, 'Apartments in Kukatpally', 'https://perfectliving.in/filters?areas=kukatpally', 'Apartments in Financial District', 1, '2024-09-18 18:55:08', '2024-09-19 17:00:28'),
(17, '3 BHK Apartments in Hyderabad', 'https://perfectliving.in/filters?beds=3', 'Apartments in Hyderabad', 1, '2024-09-19 11:02:30', '2024-09-19 16:57:24'),
(19, '4 BHK Apartments in Hyderabad', 'https://perfectliving.in/filters?beds=4', 'Apartments in Hyderabad', 1, '2024-09-19 11:03:52', '2024-09-19 16:57:41'),
(20, '5 BHK Apartments in Hyderabad', 'https://perfectliving.in/filters?beds=5', 'Apartments in Hyderabad', 1, '2024-09-19 11:04:10', '2024-09-19 16:57:49'),
(22, 'Koncept Ambience Group', 'https://perfectliving.in/filters?builders=koncept-ambience-group', 'Top builders', 1, '2024-09-19 11:09:54', '2024-09-19 16:57:58'),
(23, 'Raghuram Group', 'https://perfectliving.in/filters?builders=raghuram-construction', 'Top builders', 1, '2024-09-19 11:10:25', '2024-09-19 17:27:09'),
(24, 'Indis Group', 'https://perfectliving.in/filters?builders=indis-group', 'Top builders', 1, '2024-09-19 11:10:53', '2024-09-19 16:58:14'),
(25, 'Incor Group', 'https://perfectliving.in/filters?builders=incor-group', 'Top builders', 1, '2024-09-19 11:11:19', '2024-09-19 16:58:25'),
(26, 'Apartments under 1.5 Cr', 'https://perfectliving.in/filters?budgets=0,1.5', 'Find Apartments by Budget', 1, '2024-09-19 11:13:05', '2024-09-19 16:58:41'),
(27, 'Apartments between 1.5 Cr & 2 Cr', 'https://perfectliving.in/filters?budgets=1.5,2', 'Find Apartments by Budget', 1, '2024-09-19 11:14:33', '2024-09-19 16:58:53'),
(28, 'Apartments between 2 Cr & 2.5 Cr', 'https://perfectliving.in/filters?budgets=2,2.5', 'Find Apartments by Budget', 1, '2024-09-19 11:15:02', '2024-09-19 16:59:05'),
(29, 'Apartments between 2.5 Cr & 4 Cr', 'https://perfectliving.in/filters?budgets=2.5,4', 'Find Apartments by Budget', 1, '2024-09-19 11:15:26', '2024-09-19 16:59:15'),
(30, 'Apartments between 4 & 6 Cr', 'https://perfectliving.in/filters?budgets=4,6', 'Find Apartments by Budget', 1, '2024-09-19 11:15:50', '2024-09-19 16:59:28'),
(31, 'Nanakramguda - Kokapet Apartments', 'https://perfectliving.in/filters?areas=nanakramguda,kokapet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:17:09', '2024-09-19 17:00:43'),
(32, 'Gachibowli - Kondapur Apartments', 'https://perfectliving.in/filters?areas=gachibowli,kondapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:19:26', '2024-09-19 17:00:55'),
(33, 'Apartments between Manikonda - Shaikpet', 'https://perfectliving.in/filters?areas=manikonda,shaikpet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:03', '2024-09-19 17:01:07'),
(34, 'Apartments between Hafeezpet - Miyapur', 'https://perfectliving.in/filters?areas=hafeezpet,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:33', '2024-09-19 17:01:36'),
(35, 'Apartments between Kukatpally - Miyapur', 'https://perfectliving.in/filters?areas=kukatpally,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:21:03', '2024-09-19 17:01:48');

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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `company_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
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
  `map_collections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`map_collections`)),
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

INSERT INTO `projects` (`id`, `name`, `slug`, `is_featured`, `company_id`, `site_address`, `logo`, `website_url`, `latitude`, `longitude`, `master_plan_layout`, `about_project`, `city`, `area`, `elevation_pictures`, `enquiry_form_url`, `map_collections`, `map_badges`, `amenities`, `project_type`, `no_of_acres`, `no_of_towers`, `no_of_units`, `price_per_sft`, `price_range_start`, `price_range_end`, `status`, `created_at`, `updated_at`) VALUES
(9, 'The Botanika', 'the-botanika', 1, '\"[\\\"2\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15224.736493686083!2d78.362433!3d17.4508993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93b8abf9f511%3A0x83cb63d254f57fb3!2sThe%20Botanika!5e0!3m2!1sen!2sin!4v1726827537229!5m2!1sen!2sin', 'projects/bEdfbEkrbCxW7dlIIcB7fmgh1mglNTScbRTltmUS.png', 'https://botanika.in/', '17.451309397154446', '78.36475534299113', 'projects/BHWQemfwu7fkQf79bddTpZeUw1UfVs94Y90dEsdm.png', '<p>The Botanika faces up to 200 acres of The Botanical Garden\'s greenery and is located in a prime location on the Gachibowli - Miyapur road, just behind the Le-Meridian Hyderabad &amp; Radisson Hotel Hyderabad Hitec City. The project is just a minute away from DLF Cyber City &amp; is just 10 minutes away from both the Financial district as well as Jubilee Hills</p>\r\n<p><strong>What sets The Botanika Apart?</strong></p>\r\n<p>The Botanika is a low density community with just around 400 families, making it a closely-knit community<br>The Project includes 4 BHK &amp; Sky Villa units <br>The community is a close-knit community and counts many CEO\'s, Top doctors &amp; Business leaders as its residents<br>The project has a fully functioning multi-cuisine fine dining restaurant within the community that dishes out customized meals<br>The club house includes a business center equipped with modern video conferencing facilities<br>An EV Charger in the parking allows fast charging of any make of EV<br><br></p>\r\n<p>&nbsp;</p>', 2, 2, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', '[\"4\",\"7\",\"9\",\"10\",\"11\",\"12\",\"13\",\"15\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 'Apartment Gated Community', '1.5', '5', '400', 12900, 1, 1.5, 'published', '2024-09-06 18:21:53', '2024-09-23 15:29:15'),
(10, 'Nestcon - Dhruvatara', 'nestcon', 1, '\"[\\\"4\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7610.371762867956!2d78.494558!3d17.498638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9bc48815656f%3A0x84b465af924ddcdc!2sNestcon\'s%20Dhruva%20Tara!5e0!3m2!1sen!2sin!4v1725873444605!5m2!1sen!2sin', 'projects/q24Q4ty9zuTBvbPguuAXgP5sxn9vpogdsVqdiSl4.png', 'https://nestcon.com', '17.506882566072722', '78.55340169161568', 'projects/qpXwyMeoI7OqZqd4nEfexRHxoSGuw1Ex9iyBKLwK.png', '<p>With an extensive experience of nearly two decades, Nestcon has embarked on this esteemed standalone project in Alwal, Secunderabad, to deliver quality constructions on time and within budget. The project is designed to offer you an exclusive lifestyle complemented by eco-friendly features for sustainable living. It is a project of&nbsp;<strong>3BHK luxury apartments in Nagireddy Colony, Alwal, Secunderabad.</strong></p>\r\n<p>If you want to speak with our authorized sales representative about the property and get the best deals, please contact us using the details listed below.</p>', 2, 3, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', '[\"13\",\"18\",\"19\",\"23\"]', 'Standalone Apartment', '2', '30', '600', 6000, 1.5, 2, 'published', '2024-09-09 14:42:07', '2024-09-23 18:01:54'),
(11, 'A2A Homeland', 'a2a-homeland', 1, '\"[\\\"6\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15222.109260910875!2d78.4452824!3d17.4823239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9195fed45b69%3A0xa516f048c1aaee49!2sA2A%20Homeland!5e0!3m2!1sen!2sin!4v1726748287298!5m2!1sen!2sin', 'projects/HwWLhyOy4ya8Fjs2lcgrk2gvxJyBvaNv1d86Sg8e.jpg', 'https://a2ahomeland.in/', NULL, NULL, 'projects/cWPdcxoKtCmNrVJfjYyfHSlp4UFY1AuyElzWcEkf.jpg', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, 'Apartment Gated Community', '12', '7', '1162', 6699, 2, 2.5, 'published', '2024-09-19 16:11:52', '2024-09-23 11:27:07'),
(12, 'PBEL City', 'pbel-city', 0, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.1010650526164!2d78.37226959999998!3d17.358869199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95c4bccfffff%3A0xeba4255fe1850ab7!2sPBEL%20CITY%2C%20Nehru%20Outer%20Ring%20Rd%2C%20Exit%20-%2018%2C%20Hyderabad%2C%20Telangana%20500091!5e0!3m2!1sen!2sin!4v1726815947058!5m2!1sen!2sin', 'projects/pHGchykASa8gicxoVvKO2MyxroKavOYDmurnfO3e.png', 'https://indis.co.in/projects/pbel-city', NULL, NULL, 'projects/x8RDZlbktF0QZv4ArdyXDmAmJHAPRl28TRJ0MMwf.png', NULL, 2, 5, NULL, NULL, NULL, NULL, NULL, 'Apartment Gated Community', '25', '15', '1065', 6165, 0, 0, 'newly_added', '2024-09-20 12:45:34', '2024-09-23 11:26:31'),
(13, 'VIVA City', 'viva-city', 0, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27554.96057086337!2d78.3563232!3d17.4523979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93526db1c631%3A0x9c8a010297a35d88!2sINDIS%20VIVA%20CITY!5e1!3m2!1sen!2sin!4v1726823884727!5m2!1sen!2sin', 'projects/XGdBcWeB4qjKsl05IJHqCvvMmVprUL8H82iCas1Q.png', 'https://indis.co.in/projects/viva-city', NULL, NULL, 'projects/oRa1nIQx4JKh52pqoJJ0hQWjfhvVpKwnZSF9RzF2.png', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, 'Apartment Gated Community', '7.93', '4', '640', 9000, 0, 0, 'newly_added', '2024-09-20 14:58:06', '2024-09-23 18:20:59'),
(14, 'Lakeside at PBEL City', 'lakeside-at-pbel-city', 0, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3446.1331252754794!2d78.37226959999998!3d17.358869199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95c4bccfffff%3A0xeba4255fe1850ab7!2sPBEL%20CITY%2C%20Nehru%20Outer%20Ring%20Rd%2C%20Exit%20-%2018%2C%20Hyderabad%2C%20Telangana%20500091!5e1!3m2!1sen!2sin!4v1727084159742!5m2!1sen!2sin', 'projects/goYBFjICkzbGJBVIrPkXzXbYFvOT4pE0HekthKN0.png', 'https://indis.co.in/projects/lakeside-pbel-city', NULL, NULL, 'projects/gsONS5Yn3A6qDx3CsLy0HZK5N9HR0jtP0UfTHntI.png', '<p>Entrance Lobby Italian Marble flooring &amp; Granite steps, ramp and planter box completed &amp; False Ceiling works in progress. Stilt floor VDF flooring works in progress. 2nd coat painting works completed from 2nd to 15th floor. Corridor false ceiling completed upto 30th floor. Corridor ceiling putty works completed up to 22nd floor and remaining work in progress. Corridor 1st coat paint completed up to 22th floors and remaining work in progress. Corridor tile grouting completed up to 18th floor and remaining floors in work in progress. Flats tile grouting completed up to 20th floor and remaining work in progress. Internal door shutter fixing completed up to 20th floor and hardware fixing completed up to 17th floor. External painting works in progress. Service lift Commissioning works in progress. P3&amp;P4 lift Installation work in progress. P1 &amp; P2 Lift Electrical work is completed. Stilt Floor corridor area sprinkler installation work is completed.</p>', 2, 5, NULL, NULL, NULL, NULL, '[\"4\",\"9\",\"10\",\"14\",\"19\",\"21\",\"22\"]', 'Apartment Gated Community', '25', '15', '1065', NULL, 0, 0, 'newly_added', '2024-09-23 15:28:31', '2024-09-23 15:28:31');

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
(10, 11, '3', '3', '3', 'East', '1700', 'unit-configurations/hPK4cGfRW1KgkSDTKRmJ1mOzjfNz0x7BY5qyLzGt.jpg', '2024-09-19 16:48:00', '2024-09-19 16:48:00'),
(11, 9, '3', '3', '1', 'East', '2696', 'unit-configurations/P4jtwKgIroeOyryaW3GNvHSnmZvSXEz1EV54M3Ma.png', '2024-09-20 16:45:59', '2024-09-20 16:45:59'),
(12, 9, '3', '3', '1', 'North', '2701', 'unit-configurations/cPP0KIge8C0zxKXZxmmGkTnY1EKb2YbCnZN37dqa.png', '2024-09-20 16:48:19', '2024-09-20 16:48:19'),
(13, 9, '3', '3', '1', 'West', '2717', 'unit-configurations/NmZHoEAqGCzGMCh5AKqsbjrYlZZI8QcNwVWPlHUv.png', '2024-09-20 16:50:09', '2024-09-20 16:50:09'),
(14, 9, '3', '3', '2', 'South', '2521', 'unit-configurations/zE27NieyhPzTKjfR0EQsakArikMCZpqEmkfvbZpV.png', '2024-09-20 17:14:53', '2024-09-20 17:14:53'),
(15, 9, '3', '3', '1', 'East', '2255', 'unit-configurations/hSMdbTWSRirLty7qtnu3VYl7GeDJePod4rCPhAus.png', '2024-09-20 17:16:47', '2024-09-20 17:16:47'),
(16, 9, '3', '3', '1', 'North', '2422', 'unit-configurations/cE4loL0OJKjvAKlZ6Gh36Z3qy3oupz1bmWgRpI2o.png', '2024-09-20 17:18:57', '2024-09-20 17:18:57'),
(17, 9, '3', '3', '1', 'North', '2322', 'unit-configurations/vKYMUq78aAI0hmIHiZRdd0lM9eP3F5NVTmdoYgBy.png', '2024-09-20 17:20:17', '2024-09-20 17:20:17'),
(18, 9, '3', '3', '1', 'West', '2272', 'unit-configurations/iMjTta9ypoZk3eqpqHlVij4GdD1m8c9xseQnXer5.png', '2024-09-20 17:21:34', '2024-09-20 17:21:34'),
(19, 9, '3', '3', '2', 'South', '2605', 'unit-configurations/ikgS5Ckm51k4rSBMwm2RBe8QExyLmWrsL2kJAmcU.png', '2024-09-20 17:26:47', '2024-09-20 17:26:47'),
(21, 14, '3', '3', '2', 'west', '2108', 'unit-configurations/pCK0NDrQHQWTR9jTP6rxOXqJUMlUj21WUlHTQ0t9.png', '2024-09-23 16:08:08', '2024-09-23 16:08:08'),
(22, 14, '3', '3', '2', 'East', '2108', 'unit-configurations/gdzn88ViVpQsGOYhiJQz5cN4OJSATHjYxww5BdWi.png', '2024-09-23 16:09:22', '2024-09-23 16:09:22'),
(23, 10, '3', '3', '1', 'East', '1610', 'unit-configurations/8htmwHZHPJ4JkzWqsOvBcFj6uFwl4r3R0QyU2pNv.png', '2024-09-23 16:26:15', '2024-09-23 16:26:15'),
(24, 10, '3', '3', '1', 'West', '1610', 'unit-configurations/rY1ZToBJu2hAqf6S4L3vcbmeR1wwDVG0rKeCob7F.png', '2024-09-23 16:26:50', '2024-09-23 16:26:50'),
(25, 13, '3', '3', '2', 'West', '2597', 'unit-configurations/qC9vtjPTT8BdENncL9gsTA6aiKcJRaWiixADs1l4.png', '2024-09-23 18:31:58', '2024-09-23 18:31:58'),
(26, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/0LLXjvNPzuoFnVLtGWk0flUDrkem9u24ncj7R5ee.png', '2024-09-23 18:34:39', '2024-09-23 18:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `last_logged_on` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
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

INSERT INTO `users` (`id`, `client_id`, `verification_token`, `projects_mapped`, `fullname`, `phone`, `username`, `password`, `password_updated_at`, `registered_on`, `profile_photo`, `role`, `last_logged_on`, `active`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip_address`, `password_created_at`, `email_verified_at`, `current_login_at`, `current_login_ip`) VALUES
(192, NULL, NULL, NULL, 'Ranjith', '9898989892', 'ranjith@deepredink.com', '$2y$10$7s/1ZX2fDKsLkAw0dpZG.u/AjZKgTIZxH9ma2UoHFdi8YoUBsliem', NULL, NULL, 'default_profile_pic.png', 1, NULL, 1, '2024-09-11 10:43:22', '2024-09-24 10:36:40', '2024-09-23 17:56:46', '106.222.228.87', NULL, NULL, '2024-09-24 10:36:40', '106.222.228.87'),
(193, NULL, NULL, NULL, 'Publisher', '9898989898', 'publisher@deepredink.com', NULL, NULL, NULL, 'default_profile_pic.png', 2, NULL, 1, '2024-09-11 11:13:10', '2024-09-11 16:13:02', NULL, NULL, NULL, NULL, NULL, NULL),
(194, NULL, NULL, NULL, 'Purnavi', '9182805457', 'purnavi@deepredink.com', '$2y$10$pqiKQCnOIe9Xvdzppj3DrODJAUbkE88EV8Yf7Qurp.nkS500g7EZO', NULL, NULL, 'default_profile_pic.png', 4, NULL, 1, '2024-09-11 12:19:04', '2024-09-24 10:38:10', '2024-09-23 10:55:15', '106.222.228.87', NULL, NULL, '2024-09-24 10:38:10', '106.222.228.87'),
(195, NULL, NULL, NULL, 'Sailaja', '9182805457', 'sailaja@deepredink.com', '$2y$10$u9CjqqhJQhk7m9p/0w6X.uGdNRk1VYuItJYo90hWzdJoCp6MJymnK', NULL, NULL, 'default_profile_pic.png', 3, NULL, 1, '2024-09-11 12:47:35', '2024-09-17 16:33:52', '2024-09-11 12:48:14', '106.222.231.212', NULL, NULL, '2024-09-11 12:48:14', '106.222.231.212'),
(196, NULL, NULL, NULL, 'Sri Lakshmi Priya Valluri', '8978850982', 'priya@deepredink.com', '$2y$10$vJEAhE4pO9RZWCxGLi7ohevLuj1eyKjNsoupo3K5rD5zpSlL2z/CC', NULL, NULL, 'default_profile_pic.png', 5, NULL, 1, '2024-09-23 11:33:27', '2024-09-23 11:33:32', NULL, NULL, NULL, '2024-09-23 11:33:32', NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `area_masters`
--
ALTER TABLE `area_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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