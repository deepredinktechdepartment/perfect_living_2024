-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2024 at 05:25 AM
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
  `category` char(30) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `category`, `icon`, `created_at`, `updated_at`) VALUES
(4, 'Indoor Games', 'indoor-games', 'amenities/mPBqf026Wa1tcwcB5zoEFr28O1FUYahdoetuHwpN.png', '2024-09-19 16:36:15', '2024-09-26 12:45:13'),
(5, 'Learning Center', 'community', 'amenities/pybkJP0mlh4deVCo9DS6367zpfwteUGvOde960rQ.png', '2024-09-19 16:36:50', '2024-09-26 12:44:03'),
(6, 'Mini board Games', 'indoor-games', 'amenities/CCSRSQIuM54wfnNCs7VAAoMiWVwVfe7aosUo4BX2.png', '2024-09-19 16:37:31', '2024-09-26 12:44:45'),
(7, 'Business Lounge', 'community', 'amenities/aQojxUvJx91CYzcGGJdncEDmOLhScrUi5EwASFnz.png', '2024-09-19 16:38:03', '2024-09-26 11:12:54'),
(8, 'Guest Room', 'community', 'amenities/k5uz5Ufn6O9waMonjuDzWoGg7JPLTS4yF6pFae7N.png', '2024-09-19 16:38:41', '2024-09-26 12:42:40'),
(9, 'Multi Purpose Hall', 'community', 'amenities/Lr1yY6jj6YDhc6YwAsUjxNfrQyT4FFFyIwmAEEv8.png', '2024-09-19 16:39:17', '2024-09-26 12:44:16'),
(10, 'Swimming Pools (Adults & Kids)', 'fitness', 'amenities/76MmtNC7YyXjbQIYAFMkiKVfkpZ7bY3SsJglFxE4.png', '2024-09-19 16:40:11', '2024-09-26 12:46:12'),
(11, 'Convenience Store', 'convenience', 'amenities/xrjMHImvJYhWOdoqBz5JrAGW1pPoSpYA5MKyzDwT.png', '2024-09-19 16:40:42', '2024-09-26 12:42:16'),
(12, 'Cafeteria/ Coffee Shop', 'convenience', 'amenities/jbtuVCxT1gqOs77IfyucRdehlRPxYgKRpLjTzkYD.png', '2024-09-19 16:41:01', '2024-09-26 12:41:55'),
(13, 'Kid’s Play Area', 'kids', 'amenities/swIGYhelKR5FDysCa58dzc7UqIPf3GsreQcruBwN.png', '2024-09-19 16:41:26', '2024-09-26 12:43:29'),
(14, 'Salon ( Unisex exclusive )', 'convenience', 'amenities/PGE9Z2iI94uWDMBOmouEjGFVW8ZWEeWWnNYyC14p.png', '2024-09-19 16:42:05', '2024-09-27 11:35:37'),
(15, 'Library', 'community', 'amenities/YtHDwzYX097ThbHppZ2y3bh9yiSDDGN8ib4RxvRU.png', '2024-09-19 16:42:25', '2024-09-26 12:45:27'),
(16, 'Dance Studio', 'fitness', 'amenities/eW9WHnuzdBqzCJarLDv5soWtMFv6JEVSTW9g7vfk.png', '2024-09-19 16:42:42', '2024-09-26 12:42:26'),
(17, 'Senior Citizens Lounge', 'community', 'amenities/ebXQMIbQQ7JJBNHhRDeaW2Y9oxlvRj71aAcjAMCR.png', '2024-09-19 16:43:02', '2024-09-26 12:44:58'),
(18, 'Jogging Track', 'fitness', 'amenities/8bduhsbQ1DZMM8jUzuiUzMrkWJdxHVO3W3nl3dl1.png', '2024-09-19 16:43:24', '2024-09-26 12:43:12'),
(19, 'Gym ( Men & Women )', 'fitness', 'amenities/yFNwl0FBh1M3hhXKAar8gyTPHN8JOxI1zqXKCf5d.png', '2024-09-19 16:43:47', '2024-09-26 12:42:51'),
(20, 'Preview Theatre', 'entertainment', 'amenities/kNy6kyPfIC7Fm0g1Z6b4hB9n7WBVKCMKcV9K1GIA.png', '2024-09-19 16:44:05', '2024-09-26 12:44:28'),
(21, 'Badminton Courts', 'fitness', 'amenities/6MOPqqCX7iRuhUGTOjLrtRX2Nxd8xIDRinaXMFOZ.png', '2024-09-19 16:44:19', '2024-09-26 11:12:33'),
(22, 'Yoga / Meditation', 'wellness', 'amenities/z22XF1cPVyNPIuyi6ThrAnLB0qwnxhTZLpEv1uQZ.png', '2024-09-19 16:44:37', '2024-09-27 11:34:59'),
(23, 'CCTV Cameras', 'security', 'amenities/DVNQnK27A4l9X5i6iyhIv9vaBOyhinIPZLBgLnW5.jpg', '2024-09-23 18:00:40', '2024-09-26 12:42:05'),
(24, 'Puja Room', 'other', 'amenities/5powjNFNjYKkbbq1IYV6eiW9zdMLcgN6k0ST7WAD.jpg', '2024-09-26 17:46:27', '2024-09-26 17:46:27'),
(25, 'Maid Room', 'other', 'amenities/3SsOTDlh9KoRgNOmWW6Auyo6SYj8fbLn6dCTCKdk.png', '2024-09-26 17:47:07', '2024-09-26 17:47:07'),
(26, 'Home Office', 'other', 'amenities/KXA0d5qFhSOwgI2UouZHWiWu38o2D1kO3Bgc5ikh.jpg', '2024-09-26 17:47:46', '2024-09-26 17:47:46'),
(27, 'Study Room', 'other', 'amenities/ZCCp1ApGnZqAkXwNXYy6EJwOZ8jcIvUCL2KGZ1pF.jpg', '2024-09-26 17:50:35', '2024-09-26 17:50:35'),
(28, 'Home Theatre', 'entertainment', 'amenities/PahYy4DGoFsun769eLd2wKryZC9yScKIaXKi7V8C.png', '2024-09-26 17:54:48', '2024-09-26 17:54:48'),
(29, 'Squash Court', 'sports', 'amenities/PzLFUt2rJDcGLQecSuAAbeDJ8fciL0N2lQQ6yXpK.png', '2024-10-01 11:04:29', '2024-10-01 11:04:29'),
(30, 'Club House', 'clubhouse', 'amenities/drtqAN8FQOnKGfMJqS3SSsJcvz1767ClNjZZekvr.png', '2024-10-01 11:07:49', '2024-10-01 11:07:49'),
(31, 'Cricket (Courts & Practice Nets)', 'outdoor-games', 'amenities/dExKr1TjBPGB3Ng1OZedUyg54TebsaWsCzWgrJTl.png', '2024-10-01 15:23:31', '2024-10-01 15:23:31'),
(32, 'Basket Ball', 'outdoor-games', 'amenities/ITfSzeHmerDO64EPlhiZqCXCExbjEu8y2VejFbxn.png', '2024-10-01 15:23:53', '2024-10-01 15:23:53'),
(33, 'Cycling Track', 'fitness', 'amenities/BVeMMzruWe8nLQyg0JbX9n8IT4ytzDVKsldaud6J.png', '2024-10-01 15:24:34', '2024-10-01 15:24:34');

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
(5, 'Peerancheruvu', 2, '2024-09-19 23:02:06', '2024-09-25 18:10:58'),
(6, 'Kondapur', 2, '2024-09-20 14:45:40', '2024-09-20 14:45:40'),
(7, 'Manikonda', 2, '2024-09-24 18:02:17', '2024-09-24 18:02:17'),
(8, 'Patancheruvu', 2, '2024-09-26 12:13:08', '2024-09-26 12:13:08'),
(9, 'Kokapet', 2, '2024-09-26 14:50:30', '2024-09-26 14:50:30'),
(10, 'Gopanpally', 2, '2024-09-30 11:32:53', '2024-09-30 11:32:53'),
(11, 'Tellapur', 2, '2024-09-30 12:46:25', '2024-09-30 12:46:25'),
(12, 'Narsingi', 2, '2024-09-30 16:17:24', '2024-09-30 16:17:24'),
(13, 'Serilingampally', 2, '2024-10-01 13:08:29', '2024-10-01 13:08:29'),
(14, 'Madeenaguda', 2, '2024-10-01 13:08:57', '2024-10-01 13:08:57');

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
  `slug` varchar(200) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `target_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `background_image`, `target_link`, `created_at`, `updated_at`) VALUES
(2, 'Top gated communities close to Hitec City and Gachibowli.', 'top-gated-communities-close-to-hitec-city-and-gachibowli', 'background_images/aTk7j6osEkiJ8o68o4hkLOwYHqUlDpzwQbMb6sSG.jpg', 'https://perfectliving.in/collection/top-gated-communities-close-to-hitec-city-and-gachibowli', '2024-09-05 06:36:56', '2024-09-30 11:08:18'),
(3, 'Top properties abutting green lung spaces', 'top-properties-abutting-green-lung-spaces', 'background_images/n1cPwR12yYAa4DCfVdZmVYudorXIEleUxlre7o3t.jpg', 'https://perfectliving.in/collection/top-properties-abutting-green-lung-spaces', '2024-09-05 12:20:11', '2024-09-30 11:08:30'),
(4, '30 properties within 30 minutes from the airport', '30-properties-within-30-minutes-from-the-airport', 'background_images/Pzv66AKEjOEDZuq9TwhQzAHpm581hDaDOt7mqI1P.jpg', 'https://perfectliving.in/collection/30-properties-within-30-minutes-from-the-airport', '2024-09-06 18:02:16', '2024-09-30 11:08:40');

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
(2, 'Koncept Ambience Group', 'koncept-ambience-group', '<div>\r\n<div><strong>Founded</strong>: 1995</div>\r\n<div><strong>Experience</strong>: Completed 25 projects</div>\r\n<div><strong><br>Highlights</strong></div>\r\n<div>Built the first mixed-use commercial property of Hyderabad and the&nbsp;first LEED Platinum certified residential property in Hyderabad</div>\r\n</div>', 'Hyderabad,TG', NULL, '+91 78945 61234', 'http://botanika.in', '2024-09-04 09:57:09', '2024-09-25 18:13:15'),
(4, 'Nestcon Shelters Pvt Ltd', 'nestcon', '<div><strong>Founded:</strong>&nbsp;1997<br><strong>Experience:</strong>&nbsp;20 years</div>\r\n<div><strong>Highlight:&nbsp;</strong></div>\r\n<div>Our expertise, financial strength, transparency, and customer-centric approach ensure exceptional project delivery.&nbsp;&nbsp;</div>\r\n<div>&nbsp;</div>', 'Plot No.7, 1st Floor, All Saints Road, Near LIC Office, Trimulgherry, Secunderabad, Telangana 500015', NULL, '+91 84313 20000', 'https://nestcon.com/', '2024-09-06 17:48:55', '2024-09-30 10:44:25'),
(6, 'Raghuram Constructions', 'raghuram-construction', '<p><strong>Founded</strong>: 1988</p>\r\n<p><strong>Experience</strong>: 35 years of experience</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Highlights</strong></p>\r\n<p>Raghuram Group is known for its quality, innovation, trust, commitment to on-time delivery, integrity, and aggressive performance.</p>', 'Toli Chowki, Hyderabad', NULL, '+91 70707 87979', 'https://raghuramconstructions.com/', '2024-09-19 15:51:29', '2024-09-25 18:12:54'),
(7, 'INDIS Group', 'indis-group', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Founded: 2011</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Experience: 13 Years</p>\r\n</li>\r\n</ul>\r\n<p><strong id=\"docs-internal-guid-7602623f-7fff-25a0-44fb-952c538c767b\">Highlight: INDIS is renowned for its focus on engineered homes, customer satisfaction, innovative designs, and timely project delivery.</strong></p>', 'Jubilee Hills, Hyderabad', NULL, '+91 40 6898 9898', 'https://indis.co.in/', '2024-09-19 18:42:29', '2024-10-01 18:36:17'),
(8, 'INCOR Group', 'incor-group', '<ul>\r\n<li><strong>Founded:</strong> 2006</li>\r\n<li><strong>Experience:</strong> 17 years</li>\r\n<li><strong>Highlights:</strong></li>\r\n<li>Awarded \'Premium Apartment Project of the Year &ndash; South\' at the NDTV Property Awards in 2016 for PBEL City.</li>\r\n<li>Known for innovative designs and sustainable practices.</li>\r\n<li>Has developed large-scale residential and commercial projects in Hyderabad.</li>\r\n</ul>', 'Kavuri Hills, Madhapur, Hyderabad', NULL, '+91 40 6818 1800', 'https://www.incor.in/', '2024-09-20 12:04:58', '2024-09-27 12:53:17'),
(9, 'RajaPushpa', 'rajapushpa', '<ul>\r\n<li><strong>Founded:</strong> 2006</li>\r\n<li><strong>Experience:</strong> 17 years</li>\r\n<li><strong>Highlights:</strong></li>\r\n<li>A leading builder of gated community apartments and villas in Hyderabad.</li>\r\n<li>Offers a variety of luxury living options.</li>\r\n<li>Committed to quality construction and customer satisfaction.</li>\r\n</ul>', 'Rajapushpa Summit, Nanakramguda Road, Gachibowli', NULL, '+91 76600 05500', 'https://www.rajapushpa.in/', '2024-09-20 12:13:26', '2024-09-27 12:54:05'),
(10, 'Auro Realty', 'auro-realty', '<ul>\r\n<li><strong>Founded:</strong> 2016</li>\r\n<li><strong>Experience: 8</strong> projects</li>\r\n<li><strong>Highlights:</strong> </li>\r\n<li>Known for innovative and sustainable designs.</li>\r\n<li>Won multiple awards for their projects, including the \"Best Residential Project of the Year\" at the Hyderabad Real Estate Awards in 2018.</li>\r\n<li>Notable projects include The Pearl, Kohinoor, The Regent, Sansa County, and Orbit.</li>\r\n</ul>', 'Auro Realty Private Limited, Hyderabad Knowledge Park, Raidurg, Hyderabad', NULL, '+91 91212 22335', 'https://aurorealty.com/', '2024-09-20 15:32:16', '2024-09-27 13:09:08'),
(11, 'Sukhii Group', 'sukhii-group', '<ul>\r\n<li><strong>Founded:</strong> 1993</li>\r\n<li><strong>Experience:</strong> 10 projects </li>\r\n<li><strong>Highlights:</strong></li>\r\n<li>Offers affordable housing options in Hyderabad.</li>\r\n<li>Focuses on customer satisfaction and timely delivery.</li>\r\n<li>Has a strong reputation for building quality homes.</li>\r\n</ul>', 'Banjara Hills, Road No.2, Hyderabad', NULL, '+91 96473 63636', 'https://www.sukhii.group/', '2024-09-20 15:35:42', '2024-09-27 13:08:46'),
(12, 'Vamsiram Builders', 'vamsiram-builders', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Founded: 1996</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Experience: 28 Years&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p>Highlight: Vamsiram Homes is motivated by traditional ethics of precision, responsibility, resilience, and trust, to develop properties that will be as valuable tomorrow as the day they were released.&nbsp;</p>', 'Nandagiri Hills, Jubilee Hills, Hyderabad', NULL, '+91 83999 39999', 'https://vamsirambuilders.com/', '2024-09-20 15:40:05', '2024-10-01 18:36:51'),
(13, 'My Home Construction', 'my-home-construction', '<ul>\r\n<li><strong>Founded:</strong> 1997</li>\r\n<li><strong>Experience:</strong> 27 years</li>\r\n<li><strong>Highlights:</strong></li>\r\n<li>One of the largest real estate developers in India.</li>\r\n<li>Known for its affordable housing projects.</li>\r\n<li>Has a strong presence in Hyderabad and other major cities.</li>\r\n</ul>', 'MY HOME HUB, HITECH CITY, MADHAPUR', NULL, '+91 91000 88888', 'https://www.myhomeconstructions.com/', '2024-09-20 15:44:45', '2024-09-27 12:52:34'),
(14, 'Ramky Group', 'ramky-group', '<ul>\r\n<li><strong>Founded:</strong> 1977</li>\r\n<li><strong>Experience:</strong> 47 years</li>\r\n<li><strong>Highlights:</strong></li>\r\n<li>A diversified conglomerate with interests in real estate, infrastructure, and other sectors.</li>\r\n<li>Has developed several large-scale residential and commercial projects.</li>\r\n<li>Known for its commitment to sustainability and corporate social responsibility.</li>\r\n</ul>', 'Ramky Towers Complex, Gachibowli', 'Hyderabad-500 032', '+91 40 2301 5000', 'https://ramky.com/index.html', '2024-09-25 13:04:09', '2024-09-27 12:54:29'),
(15, 'Prathima Group', 'prathima-group', NULL, 'Film Nagar, Jubilee Hills, Hyderabad.', NULL, '+91 040 23554125', 'https://prathimagroup.net/', '2024-09-30 12:52:22', '2024-09-30 12:52:22');

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
(9, 11, '', 'elevation_pictures/UdCMEvojsVCgsojKYlZacafgBbSODe46bo1TBOVw.jpg', '2024-09-19 17:54:05', '2024-10-03 17:08:36'),
(10, 11, '', 'elevation_pictures/MinPwfMeQtushYKtHPgYpEguGSKuosHTYBGCtNSO.jpg', '2024-09-19 17:54:20', '2024-09-19 17:54:20'),
(11, 11, '', 'elevation_pictures/euTIpx5i2CDAq1WH12wi3GBe31Rq9N2IYxfIv59k.jpg', '2024-09-19 17:54:35', '2024-09-19 17:54:35'),
(12, 11, '', 'elevation_pictures/gwCgb60byK5WhOUFvj1LmBcNpleZOUHmj9xPGd9q.jpg', '2024-09-19 17:58:11', '2024-09-19 17:58:11'),
(13, 12, '', 'elevation_pictures/XGpPN0mg1xEh3gGBmvGRrSvxib3lc09eJzFE7SoJ.jpg', '2024-09-20 13:07:14', '2024-10-03 17:10:08'),
(14, 12, '', 'elevation_pictures/BkWSUHvKsC6PdvFU3moGtHFBmxoCdfLxF0SbwSlV.jpg', '2024-09-20 13:10:36', '2024-09-20 13:10:36'),
(15, 12, '', 'elevation_pictures/0ClLoikWi4J5hNDhYlHo0qx7F2DrSuyapLHvKIzU.jpg', '2024-09-20 13:10:51', '2024-09-20 13:10:51'),
(16, 12, '', 'elevation_pictures/YS7xjBbULVchWEswVNbaDVe9x73SYrGO97xYohbJ.jpg', '2024-09-20 13:11:09', '2024-09-20 13:11:09'),
(17, 13, '', 'elevation_pictures/5OZuGRgZ5ltjCIb992LrlcQuvhnCvhBgVOlqoPql.jpg', '2024-09-20 15:06:55', '2024-10-03 17:11:18'),
(18, 13, '', 'elevation_pictures/yMpKl6Q6HLySbShCnBvAEkoktXEYjXzDaYnfKZDk.jpg', '2024-09-20 15:07:09', '2024-09-20 15:07:09'),
(19, 13, '', 'elevation_pictures/hjVwWnL6oaQXhQxDgO7EkYz21zDfZUQo8Jj6xroR.jpg', '2024-09-20 15:07:23', '2024-09-20 15:07:23'),
(20, 13, '', 'elevation_pictures/izjWKzS7PVrxpvU2zQ6pDTgDfD1YijmweWJNt90s.jpg', '2024-09-20 15:07:36', '2024-09-20 15:07:36'),
(21, 9, '', 'elevation_pictures/XCs8cU31q6b8IS369PoPvjtFex5FuvqHFuErRwBj.jpg', '2024-09-20 15:12:05', '2024-10-03 17:04:06'),
(22, 9, '', 'elevation_pictures/oenOAzYGO3ya5rsMJL2jSpgv5vwbLSLFht5jCKZB.png', '2024-09-20 15:12:19', '2024-09-20 15:12:19'),
(23, 9, '', 'elevation_pictures/zWiTvH7VZYWXmY0N78oEOHxSEHrJXp3cIa08NByG.jpg', '2024-09-20 15:12:33', '2024-09-20 15:12:33'),
(24, 9, '', 'elevation_pictures/K0t9mUUK2rAby6u7kdORtRWUSld4IR0pFmfanPLE.jpg', '2024-09-20 15:12:45', '2024-09-20 15:12:45'),
(34, 10, '', 'elevation_pictures/pgcC7q5NTKoOz2gShgTmScJNh9U5mrrg2rpu4KhA.jpg', '2024-09-23 15:42:05', '2024-10-03 17:07:04'),
(35, 14, '', 'elevation_pictures/kIr0sd1syd92MS2E6vTaButwCokK6X2mY6BqYEBY.jpg', '2024-09-23 15:43:28', '2024-09-23 15:43:28'),
(36, 14, '', 'elevation_pictures/7VMpmdwDye92CTUsNMxZTe2Pzj3vnqOJEhHJhq4X.jpg', '2024-09-23 15:53:51', '2024-09-23 15:53:51'),
(37, 14, '', 'elevation_pictures/oS5rsj4WDL3ggDcQ0T3hZYpWnk1U2bHO379gOtPm.jpg', '2024-09-23 15:54:03', '2024-09-23 15:54:03'),
(38, 14, '', 'elevation_pictures/ZuQp5aqWYT2bnVphtdc1J8Tlu40RlbqqmuqRzKx5.jpg', '2024-09-23 15:54:13', '2024-09-23 15:54:13'),
(39, 10, '', 'elevation_pictures/lbvKycOUqVjXVDDKWVQ2MNhTe2Hb8vwrM037ZpKw.jpg', '2024-09-23 15:55:18', '2024-09-23 15:55:18'),
(40, 10, '', 'elevation_pictures/kaibiBWpsKTPQk7ZMjxlhKgQQNZlriWzekj2Vx7Z.jpg', '2024-09-23 15:55:33', '2024-09-23 15:55:33'),
(41, 10, '', 'elevation_pictures/AyiTkGABKqHu5mxXn1z0cia3qRqPxdqhDrA2Gz4J.jpg', '2024-09-23 15:55:49', '2024-09-23 15:55:49'),
(42, 15, '', 'elevation_pictures/pTt8Sg00wBNN5a6mmWOkxItkzoRq5gRkebrA4Q7e.jpg', '2024-09-25 10:25:08', '2024-10-03 17:12:28'),
(43, 15, '', 'elevation_pictures/CxmniaylS6kiFLWPDVZdESf9JE68UfZHdWbRVHP0.jpg', '2024-09-25 10:25:22', '2024-09-25 10:25:22'),
(44, 15, '', 'elevation_pictures/HCEmsgVIQrQdbAnp8ThlIT0vL0wwxVok02z5Fu8R.jpg', '2024-09-25 10:25:36', '2024-09-25 10:25:36'),
(45, 15, '', 'elevation_pictures/Bu7aGBINAZpQZI1zIbWwj2qVWXY6aXlMu93Ko613.jpg', '2024-09-25 10:25:56', '2024-09-25 10:25:56'),
(46, 16, '', 'elevation_pictures/jM3EkZBetFAXYR3NZSJwNuafIrCM7QTG1QaGLIqQ.jpg', '2024-09-26 13:01:00', '2024-10-03 17:13:02'),
(47, 16, '', 'elevation_pictures/pA2eS0Qh40XzjqXdMY3YwAEmwjPbom5C8v4YXjt2.jpg', '2024-09-26 13:01:17', '2024-09-26 13:01:17'),
(48, 16, '', 'elevation_pictures/f4cUNEslrBNlwAw71enuiVpwSz7SbLChvjSFbuTy.jpg', '2024-09-26 13:01:32', '2024-09-26 13:01:32'),
(49, 16, '', 'elevation_pictures/oq6Pkf8vWxdOhflPEVL6lMdKrWMUUFRaLShRyktv.jpg', '2024-09-26 13:01:46', '2024-09-26 13:01:46'),
(50, 17, '', 'elevation_pictures/BDOcyKcB7QM2ZsPCECJXAmrnf0DXVTioYwjl4mBg.jpg', '2024-09-26 16:05:17', '2024-10-03 17:13:38'),
(51, 17, '', 'elevation_pictures/WGZ2FjkBkEgQREUwaIAgaMaQEktoBRycsN3D9HIA.jpg', '2024-09-26 16:06:37', '2024-09-26 16:06:37'),
(52, 17, '', 'elevation_pictures/yKT7DoFQzloyAwXGb6cL1psZaPLE6LAkfHtpYzhQ.jpg', '2024-09-26 16:06:48', '2024-09-26 16:06:48'),
(53, 17, '', 'elevation_pictures/lxczmnvsEVaI9ri0fAy7DvrCmyOAD7c74Stq2nEm.jpg', '2024-09-26 16:07:01', '2024-09-26 16:07:01'),
(54, 18, '', 'elevation_pictures/xfIdH60bcMmsJoO9LqrSSSJMZwGrnGBaU25sB8eV.jpg', '2024-09-27 12:41:55', '2024-10-03 17:15:39'),
(55, 18, '', 'elevation_pictures/5YBWDicVxQQ6ELAif3UFmGui2vcld20UoRI1ycw0.jpg', '2024-09-27 12:42:07', '2024-09-27 12:42:07'),
(56, 18, '', 'elevation_pictures/5TlQzXxiP5qWkgs2zaoE2AmNu1yDoFcdU22w3zRo.jpg', '2024-09-27 12:42:18', '2024-09-27 12:42:18'),
(57, 18, '', 'elevation_pictures/yxkBhp506hplo3SmFjbtAjvZagzORj6cTV435eA1.jpg', '2024-09-27 12:48:19', '2024-09-27 12:48:19'),
(58, 19, '', 'elevation_pictures/mJ19unu2pCNPwoNUUrEWtvySobCJQQ63Q3eqCrWx.jpg', '2024-09-27 17:21:07', '2024-10-03 17:16:55'),
(59, 19, '', 'elevation_pictures/LOhONo7L2aTHMFmBAckWv0rKdYRLisWgoKLVDW1M.jpg', '2024-09-27 17:21:20', '2024-09-27 17:21:20'),
(60, 19, '', 'elevation_pictures/EMhjdpn6juJbZ1EVKRPe9xLYAHs5YJZtp0bppgRP.jpg', '2024-09-27 17:21:33', '2024-09-27 17:21:33'),
(61, 19, '', 'elevation_pictures/Lt7dHCgJRsr6Wlh0c7z69C8pUiL0HLUPZTIGy37w.jpg', '2024-09-27 17:21:46', '2024-09-27 17:21:46'),
(62, 26, '', 'elevation_pictures/wgJTmSojadLyduwIFGZTWlYfLaZu7b8uM0A71FTx.jpg', '2024-09-30 15:00:03', '2024-09-30 15:00:03'),
(63, 26, '', 'elevation_pictures/OTt65hBDrmbBfUQee4cbaZ1kHJCF4FaZqoAOdd4t.jpg', '2024-09-30 15:00:16', '2024-09-30 15:00:16'),
(64, 26, '', 'elevation_pictures/HbvoCjbpxB9xW2E7qpwYK7eY57CIeWEpqMrDm8FO.jpg', '2024-09-30 15:00:29', '2024-09-30 15:00:29'),
(65, 26, '', 'elevation_pictures/gTJmhTGgbOHi0sEg0YrKZgQO3e6WnTw7lV75oMhh.jpg', '2024-09-30 15:00:42', '2024-09-30 15:00:42'),
(66, 27, '', 'elevation_pictures/wDrWJFjPZPECivk89eXIOQy6mDY1IGROnxJBhvCD.jpg', '2024-09-30 15:42:46', '2024-09-30 15:42:46'),
(67, 27, '', 'elevation_pictures/O3sJsd7zqXbywEx31yHRyzgXOyhU7kskfK2pac6h.jpg', '2024-09-30 15:42:59', '2024-09-30 15:42:59'),
(68, 27, '', 'elevation_pictures/qvT2SrjKR8gbPrpY8l245nD3wbegosnjXSHxyjSm.jpg', '2024-09-30 15:43:13', '2024-09-30 15:43:13'),
(69, 27, '', 'elevation_pictures/M5tApzXpodHan3Tr1U6DGnQVWP4qKgVPhfSi06p4.jpg', '2024-09-30 15:43:30', '2024-09-30 15:43:30'),
(70, 28, '', 'elevation_pictures/zrZSHmYTChi7Xpr4XNs28xvBgd00EugkOw0JGKC6.jpg', '2024-10-01 12:01:28', '2024-10-01 12:01:28'),
(71, 28, '', 'elevation_pictures/O7GtiaaoJlk5b2SKmrI6gesSzkjIG3BF89Zbm8v7.jpg', '2024-10-01 12:01:46', '2024-10-01 12:01:46'),
(72, 28, '', 'elevation_pictures/M7t52nQXx1MjGnYLL3QSeUL7yYZlcrryU71HzMK4.jpg', '2024-10-01 12:01:59', '2024-10-01 12:01:59'),
(73, 28, '', 'elevation_pictures/RxtMsGXfhRktxTFNwZZevjoeM4V1LStU8xKAcHmW.jpg', '2024-10-01 12:02:18', '2024-10-01 12:02:18'),
(74, 30, '', 'elevation_pictures/Ep2zn1Y8FGsi1xvqp4o7aEyJlERvdWzNW0JyHxxk.jpg', '2024-10-01 15:12:42', '2024-10-01 15:12:42'),
(75, 30, '', 'elevation_pictures/7UtqBhBNRzIkAgwY8fB3hRvZNl201yzrzr3lyDxm.jpg', '2024-10-01 15:12:58', '2024-10-01 15:12:58'),
(76, 30, '', 'elevation_pictures/HKW50FrIU8LEYdfLLL9NyW4agkLe0yULBeMQbAQV.jpg', '2024-10-01 15:13:12', '2024-10-01 15:13:12'),
(77, 30, '', 'elevation_pictures/EybrywTMPiiKExurkLWIx8WrkoXAG4J3IyrduYzF.jpg', '2024-10-01 15:13:27', '2024-10-01 15:13:27'),
(78, 31, '', 'elevation_pictures/eRe6Edd1kKSGxQS8qfeUnBjAwk0YwotY72nD2awP.jpg', '2024-10-01 16:32:55', '2024-10-01 16:32:55'),
(79, 31, '', 'elevation_pictures/pTamAojhcK68O70tAYl78LHff3nK4kKtZlEr9btL.jpg', '2024-10-01 16:33:09', '2024-10-01 16:33:09'),
(80, 31, '', 'elevation_pictures/3OihLME6gS7gsB6mPyT255bDotzl2njlvyH1ZiK1.jpg', '2024-10-01 16:33:20', '2024-10-01 16:33:20'),
(81, 31, '', 'elevation_pictures/VSXiHnWM3QcSCctq6WYa8ExdiyAc9XVZVdQWpfdZ.jpg', '2024-10-01 16:33:33', '2024-10-01 16:33:33'),
(82, 32, '', 'elevation_pictures/F1mFQDvvm6iFIyASzSAfcSQqm5VyQSUEiJVqIySj.jpg', '2024-10-01 18:32:42', '2024-10-01 18:32:42'),
(83, 32, '', 'elevation_pictures/esE8nZuMO4XDgYQzjemQBVER0DMe8I8R4Kx3IGtL.jpg', '2024-10-01 18:32:55', '2024-10-01 18:32:55'),
(84, 32, '', 'elevation_pictures/cyw7WaV3qd5ZSV6cAn1O5uyHPZfJVGyEXlfnPGCv.jpg', '2024-10-01 18:33:07', '2024-10-01 18:33:07'),
(85, 32, '', 'elevation_pictures/g9r1hP6yIQdf31lPIrtsFit71WRc85agtRnGqADi.jpg', '2024-10-01 18:33:16', '2024-10-01 18:33:16'),
(86, 29, '', 'elevation_pictures/1MoQzIJDribnSafLFBvAyD98T2Tscc40pwsOpSI3.jpg', '2024-10-04 10:52:32', '2024-10-04 10:52:32'),
(87, 29, '', 'elevation_pictures/rQiveaiCsYLJA7M7sPwRgs2BCA4JPI3jQvyBEtW2.jpg', '2024-10-04 10:52:55', '2024-10-04 10:52:55'),
(88, 29, '', 'elevation_pictures/V35I2gFIti9uxRzx3idbj8nDnoT3cALU1kNW8JvD.jpg', '2024-10-04 10:53:16', '2024-10-04 10:53:16'),
(89, 29, '', 'elevation_pictures/wcUxKO501ZgsU9aV9A76hMGMjitMaCIVduq73GtT.jpg', '2024-10-04 10:53:32', '2024-10-04 10:53:32');

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
(4, '2 BHK Apartments in Hyderabad', 'https://perfectliving.in/apartments-in-hyderabad/2', 'Apartments in Hyderabad', 1, '2024-09-09 08:01:33', '2024-09-24 12:22:31'),
(8, 'About us', 'https://perfectliving.in/about-us', 'About us', 0, '2024-09-09 15:50:02', '2024-09-18 13:48:45'),
(9, 'Contact Us', 'https://perfectliving.in/contact-us', 'Contact Us', 0, '2024-09-09 16:03:41', '2024-09-18 13:48:53'),
(10, '2.5 BHK Apartments in Hyderabad', 'https://perfectliving.in/apartments-in-hyderabad/2.5', 'Apartments in Hyderabad', 1, '2024-09-18 18:50:20', '2024-09-24 12:22:38'),
(12, 'Apartments in Kokapet', 'https://perfectliving.in/top-locations/kokapet', 'Apartments in Financial District', 1, '2024-09-18 18:54:09', '2024-09-24 12:19:13'),
(13, 'Apartments in Gachibowli', 'https://perfectliving.in/top-locations/gachibowli', 'Apartments in Financial District', 1, '2024-09-18 18:54:33', '2024-09-24 12:19:38'),
(14, 'Apartments in Kondapur', 'https://perfectliving.in/top-locations/kondapur', 'Apartments in Financial District', 1, '2024-09-18 18:54:50', '2024-09-24 12:19:46'),
(15, 'Apartments in Kukatpally', 'https://perfectliving.in/top-locations/kukatpally', 'Apartments in Financial District', 1, '2024-09-18 18:55:08', '2024-09-24 12:19:54'),
(17, '3 BHK Apartments in Hyderabad', 'https://perfectliving.in/apartments-in-hyderabad/3', 'Apartments in Hyderabad', 1, '2024-09-19 11:02:30', '2024-09-24 12:22:46'),
(19, '4 BHK Apartments in Hyderabad', 'https://perfectliving.in/apartments-in-hyderabad/4', 'Apartments in Hyderabad', 1, '2024-09-19 11:03:52', '2024-09-24 12:22:54'),
(20, '5 BHK Apartments in Hyderabad', 'https://perfectliving.in/apartments-in-hyderabad/5', 'Apartments in Hyderabad', 1, '2024-09-19 11:04:10', '2024-09-24 12:23:05'),
(22, 'Koncept Ambience Group', 'https://perfectliving.in/builders/koncept-ambience-group', 'Top builders', 1, '2024-09-19 11:09:54', '2024-09-24 11:32:11'),
(23, 'Raghuram Group', 'https://perfectliving.in/builders/raghuram-construction', 'Top builders', 1, '2024-09-19 11:10:25', '2024-09-24 11:32:53'),
(24, 'Indis Group', 'https://perfectliving.in/builders/indis-group', 'Top builders', 1, '2024-09-19 11:10:53', '2024-09-24 11:33:09'),
(25, 'Incor Group', 'https://perfectliving.in/builders/incor-group', 'Top builders', 1, '2024-09-19 11:11:19', '2024-09-24 11:33:20'),
(26, 'Apartments under 1.5 Cr', 'https://perfectliving.in/budgets/0,1.5', 'Find Apartments by Budget', 1, '2024-09-19 11:13:05', '2024-09-24 12:29:22'),
(27, 'Apartments between 1.5 Cr & 2 Cr', 'https://perfectliving.in/budgets/1.5,2', 'Find Apartments by Budget', 1, '2024-09-19 11:14:33', '2024-09-24 12:29:32'),
(28, 'Apartments between 2 Cr & 2.5 Cr', 'https://perfectliving.in/budgets/2,2.5', 'Find Apartments by Budget', 1, '2024-09-19 11:15:02', '2024-09-24 12:29:39'),
(29, 'Apartments between 2.5 Cr & 4 Cr', 'https://perfectliving.in/budgets/2.5,4', 'Find Apartments by Budget', 1, '2024-09-19 11:15:26', '2024-09-24 12:29:48'),
(30, 'Apartments between 4 Cr & 6 Cr', 'https://perfectliving.in/budgets/4,6', 'Find Apartments by Budget', 1, '2024-09-19 11:15:50', '2024-09-30 11:35:17'),
(31, 'Nanakramguda - Kokapet Apartments', 'https://perfectliving.in/top-locations/nanakramguda,kokapet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:17:09', '2024-09-24 12:17:29'),
(32, 'Gachibowli - Kondapur Apartments', 'https://perfectliving.in/top-locations/gachibowli,kondapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:19:26', '2024-09-24 12:17:39'),
(33, 'Apartments between Manikonda - Shaikpet', 'https://perfectliving.in/top-locations/manikonda,shaikpet', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:03', '2024-09-24 12:17:47'),
(34, 'Apartments between Hafeezpet - Miyapur', 'https://perfectliving.in/top-locations/hafeezpet,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:20:33', '2024-09-24 12:17:56'),
(35, 'Apartments between Kukatpally - Miyapur', 'https://perfectliving.in/top-locations/kukatpally,miyapur', 'Top Locations in Hyderabad', 1, '2024-09-19 11:21:03', '2024-09-24 12:18:03');

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
  `project_status` enum('pre_launch','newly_launch','under_construction','hand_over_in_progress','ready_to_move') NOT NULL DEFAULT 'pre_launch',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `is_featured`, `company_id`, `site_address`, `logo`, `website_url`, `latitude`, `longitude`, `master_plan_layout`, `about_project`, `city`, `area`, `elevation_pictures`, `enquiry_form_url`, `map_collections`, `map_badges`, `amenities`, `project_type`, `no_of_acres`, `no_of_towers`, `no_of_units`, `price_per_sft`, `price_range_start`, `price_range_end`, `status`, `project_status`, `created_at`, `updated_at`) VALUES
(9, 'The Botanika', 'the-botanika', 1, '\"[\\\"2\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15224.736493686083!2d78.362433!3d17.4508993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93b8abf9f511%3A0x83cb63d254f57fb3!2sThe%20Botanika!5e0!3m2!1sen!2sin!4v1726827537229!5m2!1sen!2sin', 'projects/bEdfbEkrbCxW7dlIIcB7fmgh1mglNTScbRTltmUS.png', 'https://botanika.in/', '17.451309397154446', '78.36475534299113', 'projects/BHWQemfwu7fkQf79bddTpZeUw1UfVs94Y90dEsdm.png', '<p>The Botanika faces up to 200 acres of The Botanical Garden\'s greenery and is located in a prime location on the Gachibowli - Miyapur road, just behind the Le-Meridian Hyderabad &amp; Radisson Hotel Hyderabad Hitec City. The project is just a minute away from DLF Cyber City &amp; is just 10 minutes away from both the Financial district as well as Jubilee Hills</p>\r\n<p><strong>What sets The Botanika Apart?</strong></p>\r\n<p>The Botanika is a low density community with just around 400 families, making it a closely-knit community<br>The Project includes 4 BHK &amp; Sky Villa units <br>The community is a close-knit community and counts many CEO\'s, Top doctors &amp; Business leaders as its residents<br>The project has a fully functioning multi-cuisine fine dining restaurant within the community that dishes out customized meals<br>The club house includes a business center equipped with modern video conferencing facilities<br>An EV Charger in the parking allows fast charging of any make of EV<br><br></p>\r\n<p>&nbsp;</p>', 2, 2, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', '[\"4\",\"7\",\"9\",\"10\",\"11\",\"12\",\"13\",\"15\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 'Gated Community Apartments', '1.5', '5', '400', 12900, 1, 1.5, 'published', 'newly_launch', '2024-09-06 18:21:53', '2024-09-30 13:44:46'),
(10, 'Nestcon - Dhruvatara', 'nestcon', 1, '\"[\\\"4\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7610.371762867956!2d78.494558!3d17.498638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9bc48815656f%3A0x84b465af924ddcdc!2sNestcon\'s%20Dhruva%20Tara!5e0!3m2!1sen!2sin!4v1725873444605!5m2!1sen!2sin', 'projects/q24Q4ty9zuTBvbPguuAXgP5sxn9vpogdsVqdiSl4.png', 'https://nestcon.com', '17.506882566072722', '78.55340169161568', 'projects/qpXwyMeoI7OqZqd4nEfexRHxoSGuw1Ex9iyBKLwK.png', '<p><strong>About Nestcon Dhruva Tara</strong></p>\r\n<p>Nestcon Dhruva Tara is a modern residential project located in Nagireddy Colony, Alwal, Secunderabad. Developed by Nestcon, a renowned builder with over 20 years of experience, this project offers a luxurious and sustainable lifestyle.</p>\r\n<p><strong>What Sets Nestcon Dhruva Tara Apart?</strong></p>\r\n<ul>\r\n<li><strong>Essential Amenities:</strong>&nbsp;Benefit from a range of amenities, including a gym, play area, walking track, power backup, solar panels, and CCTV surveillance.</li>\r\n<li><strong>RERA Approved:</strong>&nbsp;The project is RERA approved, ensuring transparency and quality.</li>\r\n<li><strong>Ready to Move In:</strong>&nbsp;The project is ready for possession.</li>\r\n<li><strong>No GST:</strong> The project is GST-free.</li>\r\n</ul>', 2, 3, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', '[\"13\",\"18\",\"19\",\"23\"]', 'Stand Alone Apartments', '2', '30', '600', 6000, 1.5, 2, 'published', 'pre_launch', '2024-09-09 14:42:07', '2024-09-25 12:53:51'),
(11, 'A2A Homeland', 'a2a-homeland', 1, '\"[\\\"6\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15222.109260910875!2d78.4452824!3d17.4823239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9195fed45b69%3A0xa516f048c1aaee49!2sA2A%20Homeland!5e0!3m2!1sen!2sin!4v1726748287298!5m2!1sen!2sin', 'projects/HwWLhyOy4ya8Fjs2lcgrk2gvxJyBvaNv1d86Sg8e.jpg', 'https://a2ahomeland.in/', NULL, NULL, 'projects/cWPdcxoKtCmNrVJfjYyfHSlp4UFY1AuyElzWcEkf.jpg', '<p><strong>About A2A Homeland</strong></p>\r\n<p>A2A Homeland is a premium gated community located in Kukatpally-Balanagar, Hyderabad. It offers spacious 3 BHK apartments with stunning views and world-class amenities. The community features two expansive clubhouses, a 7 Chakra garden theme, and is conveniently located near IT hub, Ameerpet and Secunderabad.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>What Sets A2A Homeland Apart?</strong></p>\r\n<p><strong>Spacious Apartments:</strong>&nbsp;Enjoy luxurious living in&nbsp;spacious&nbsp;3 BHK apartments with ample natural light and stunning views.</p>\r\n<p><strong>World-Class Amenities:</strong>&nbsp;Indulge in&nbsp;a wide range of&nbsp;amenities, including swimming pools, fitness centres, spas, and more.</p>\r\n<p><strong>Prime Location:</strong>&nbsp;Benefit from easy access to major city hubs (&nbsp;located in Madhapur and HITEC City&nbsp;which are&nbsp;within a radius of 13 km), shopping malls (A2A Central&nbsp;located&nbsp;within 300 meters), educational institutions, and healthcare facilities.</p>\r\n<p><strong>Serene Environment:</strong>&nbsp;Surrounded by acres of lush greenery.</p>\r\n<p><strong>Accessibility to metro:&nbsp;</strong>Bharat Nagar metro Station is located within 3 km.</p>', 2, 4, NULL, NULL, NULL, NULL, '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 'Gated Community Apartments', '12', '7', '1162', 6699, 2, 2.5, 'published', 'pre_launch', '2024-09-19 16:11:52', '2024-09-25 12:13:33'),
(12, 'PBEL City', 'pbel-city', 1, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.1010650526164!2d78.37226959999998!3d17.358869199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95c4bccfffff%3A0xeba4255fe1850ab7!2sPBEL%20CITY%2C%20Nehru%20Outer%20Ring%20Rd%2C%20Exit%20-%2018%2C%20Hyderabad%2C%20Telangana%20500091!5e0!3m2!1sen!2sin!4v1726815947058!5m2!1sen!2sin', 'projects/pHGchykASa8gicxoVvKO2MyxroKavOYDmurnfO3e.png', 'https://indis.co.in/projects/pbel-city', NULL, NULL, 'projects/x8RDZlbktF0QZv4ArdyXDmAmJHAPRl28TRJ0MMwf.png', '<p dir=\"ltr\">INDIS PBEL City is a sprawling gated community spread across 25 acres in TSPA-APPA Junction, Hyderabad, offering a luxurious and sustainable lifestyle. Developed by Indis, a renowned builder known for its commitment to quality and innovation, this project provides a unique opportunity to live in a vibrant community while enjoying the tranquility of lakefront living.</p>\r\n<p dir=\"ltr\">What Sets INDIS PBEL City Apart?</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Prime Location: Enjoy the convenience of living in a well-connected community that is away from the city\'s hustle and bustle, yet still close to major amenities.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Spacious Apartments: Choose from a variety of apartment sizes ranging from 1,208 sq ft to 1,979 sq ft to suit your needs.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Vibrant Community: Benefit from a thriving community of over 2,000 families who have already made INDIS Lakeside their home.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Ready to Move In: Enjoy the convenience of moving into a ready-to-occupy home.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Easy Airport Access: Travel seamlessly with convenient access to the airport.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">World-Class Amenities: Indulge in a range of amenities, including a fully equipped gymnasium, 2 swimming pools, 2 tennis courts, a clinic, a 2.43-acre clubhouse, landscaped gardens, and more.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Sustainable Living: Experience a sustainable lifestyle with features such as a 16 lakh-liter per day sewage treatment plant (STP) and HMWSSB water supply.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">RERA Approved: The project is RERA approved, ensuring transparency and accountability.</p>\r\n</li>\r\n</ul>\r\n<p><strong id=\"docs-internal-guid-fdb9f06e-7fff-e564-3ef2-8d32c1d56d5d\">Quality Construction: Benefit from superior construction standards and materials, ensuring durability and longevity.</strong></p>', 2, 5, NULL, NULL, '[\"3\"]', NULL, '[\"4\",\"10\",\"14\",\"19\",\"21\",\"22\"]', 'Gated Community Apartments', '25', '15', '1065', 6165, 0, 0, 'published', 'pre_launch', '2024-09-20 12:45:34', '2024-10-01 18:35:04'),
(13, 'VIVA City', 'viva-city', 1, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27554.96057086337!2d78.3563232!3d17.4523979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93526db1c631%3A0x9c8a010297a35d88!2sINDIS%20VIVA%20CITY!5e1!3m2!1sen!2sin!4v1726823884727!5m2!1sen!2sin', 'projects/XGdBcWeB4qjKsl05IJHqCvvMmVprUL8H82iCas1Q.png', 'https://indis.co.in/projects/viva-city', NULL, NULL, 'projects/oRa1nIQx4JKh52pqoJJ0hQWjfhvVpKwnZSF9RzF2.png', '<p dir=\"ltr\">INDIS VIVA CITY is a modern residential project nestled in the heart of Kondapur, Hyderabad. Developed by Indis, a renowned builder committed to quality and innovation, this project offers a luxurious and sustainable lifestyle.&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">What Sets Indis Viva City Apart?</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Prime Location: Enjoy the convenience of living in a thriving neighborhood with excellent connectivity to major IT hubs, educational institutions, and healthcare facilities.&nbsp;&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">World-Class Amenities: Indulge in a range of amenities, including a swimming pool, gym, clubhouse, landscaped gardens, children\'s play area, and more.&nbsp;&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Smart Home Features: Experience the future of living with smart home technology that enhances your comfort and convenience.&nbsp;&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">RERA Approved: The project is RERA approved, ensuring transparency and accountability.&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Quality Construction: Benefit from superior construction standards and materials, ensuring durability and longevity.&nbsp;</p>\r\n</li>\r\n</ul>', 2, 6, NULL, NULL, '[\"2\"]', '[\"9\"]', '[\"6\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"19\",\"21\"]', 'Gated Community Apartments', '7.93', '4', '640', 9000, 0, 0, 'published', 'pre_launch', '2024-09-20 14:58:06', '2024-10-01 18:33:57'),
(14, 'Lakeside at PBEL City', 'lakeside-at-pbel-city', 1, '\"[\\\"7\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3446.1331252754794!2d78.37226959999998!3d17.358869199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95c4bccfffff%3A0xeba4255fe1850ab7!2sPBEL%20CITY%2C%20Nehru%20Outer%20Ring%20Rd%2C%20Exit%20-%2018%2C%20Hyderabad%2C%20Telangana%20500091!5e1!3m2!1sen!2sin!4v1727084159742!5m2!1sen!2sin', 'projects/goYBFjICkzbGJBVIrPkXzXbYFvOT4pE0HekthKN0.png', 'https://indis.co.in/projects/lakeside-pbel-city', NULL, NULL, 'projects/gsONS5Yn3A6qDx3CsLy0HZK5N9HR0jtP0UfTHntI.png', '<p dir=\"ltr\">INDIS Lakeside at PBEL City is an exclusive enclave within the sprawling 25-acre gated community of PBEL City, located at TSPA-APPA Junction, Hyderabad. This premium development offers a luxurious lifestyle with stunning lake views, spacious duplex apartments, and access to top-tier amenities, making it a perfect balance between vibrant community living and personal tranquility.</p>\r\n<p dir=\"ltr\">What Sets INDIS Lakeside Apart?</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Exclusive Duplex Apartments: The Lakeside Tower features elegant duplex apartments ranging from 3,110 to 4,158 sq. ft., offering two levels of living space designed for functionality. Whether you need privacy or space for socializing, these homes provide flexibility to suit your needs.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Premium Environment: While being part of the larger PBEL City community, residents of the Lakeside Tower enjoy premium surroundings, creating a serene and exclusive ambiance within the vibrant community.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Vibrant Gated Community: Living at Lakeside means access to a thriving community with existing features like The Sports Arena and The Square Clubhouse. Experience the buzz of community events and activities without compromising on your personal space.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">World-Class Amenities: Indulge in the wide array of amenities, including a fully equipped gym, swimming pool, sports facilities, and landscaped green areas, ensuring a healthy and fulfilling lifestyle for every member of the family.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Tranquil Lakefront Living: Wake up to panoramic views of the lake every day, providing a peaceful escape from the city\'s hustle while staying connected to all major amenities.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">RERA Approved: The project is RERA-approved, ensuring transparency, quality, and compliance with the highest regulatory standards.</p>\r\n</li>\r\n</ul>\r\n<p><strong id=\"docs-internal-guid-3bdb6312-7fff-7780-da9e-39be9a0f5ccc\">Ready to Move In: These luxurious apartments are ready for possession, allowing you to settle into your dream home immediately.</strong></p>', 2, 5, NULL, NULL, NULL, NULL, '[\"4\",\"9\",\"10\",\"14\",\"19\",\"21\",\"22\"]', 'Gated Community Apartments', '25', '15', '1065', 9200, 0, 0, 'published', 'pre_launch', '2024-09-23 15:28:31', '2024-10-01 18:35:38'),
(15, 'Ambience Courtyard', 'ambience-courtyard', 1, '\"[\\\"2\\\",\\\"11\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13781.171847102536!2d78.3894481!3d17.4035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb97d435684d5b%3A0x9e23e0284fc52aa8!2sAmbience%20Courtyard!5e1!3m2!1sen!2sin!4v1727181226432!5m2!1sen!2sin', 'projects/RzZ4o45quuMYXzPKVqHS9ulvB8aUzEigx8C394fy.png', 'https://ambiencecourtyard.in/', NULL, NULL, NULL, NULL, 2, 7, NULL, NULL, '[\"2\",\"3\"]', '[\"9\"]', '[\"4\",\"9\",\"10\",\"12\",\"13\",\"14\",\"15\",\"18\",\"19\",\"21\",\"22\"]', 'Gated Community Apartments', '8', '8', '853', 8290, 0, 0, 'published', 'pre_launch', '2024-09-24 18:23:36', '2024-09-25 18:40:23'),
(16, 'Incor Lake City', 'incor-lake-city', 1, '\"[\\\"8\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13771.631598779857!2d78.2597452!3d17.5295982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbf3553e59b761%3A0xf2a5f8d25d3a4808!2sLake%20City%20by%20Incor!5e1!3m2!1sen!2sin!4v1727333084830!5m2!1sen!2sin', 'projects/4rXFIgYNezFAbXrUwPW1aMJ8gnCi9Yh1lBsVfxfc.jpg', 'https://www.incorlakecity.com/', NULL, NULL, 'projects/JVSPfU4XPPNA589xxgAg2cMaZ20oL10CMZskwvxH.jpg', NULL, 2, 8, NULL, NULL, '[\"3\"]', '[\"9\"]', '[\"21\",\"12\",\"19\",\"4\",\"18\",\"13\",\"15\",\"9\",\"14\",\"17\",\"10\",\"22\"]', 'Gated Community Apartments', '32', '2', '1400', 6250, 0, 0, 'published', 'pre_launch', '2024-09-26 12:27:50', '2024-09-26 18:42:12'),
(17, 'My Home Grava Residences', 'my-home-grava-residences', 1, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13781.422218097528!2d78.3195705!3d17.4001788!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95005cd9aee7%3A0x4546ea26dee01c41!2sMy%20Home%20Grava!5e1!3m2!1sen!2sin!4v1727342484046!5m2!1sen!2sin', 'projects/KoWceBUPH0B4OqQvpvy9soNNGrF8LOenwvxxpt8a.jpg', 'https://www.myhomeconstructions.com/my-home-grava/', NULL, NULL, 'projects/ztPJ6Ya1hcfqBOGoQOHhyRaGu4Zmi05qO9urd0FQ.jpg', NULL, 2, 9, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"9\",\"10\"]', '[\"21\",\"7\",\"12\",\"16\",\"8\",\"19\",\"26\",\"28\",\"4\",\"13\",\"25\",\"24\",\"14\",\"22\"]', 'Gated Community Apartments', '17.52', '7', '1289', NULL, 0, 0, 'published', 'pre_launch', '2024-09-26 14:55:49', '2024-09-27 18:25:25'),
(18, 'My Home APAS', 'my-home-apas', 1, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13781.195844377906!2d78.3286962!3d17.4031817!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9514a6cf3c95%3A0x40985155a2395027!2sMy%20Home%20APAS!5e1!3m2!1sen!2sin!4v1727416851301!5m2!1sen!2sin', 'projects/snSBcIM3TMmB4mJuYC0uywMS5AvHWwHcPiolELsk.jpg', 'https://www.myhomeconstructions.com/my-home-apas/', NULL, NULL, 'projects/inryXatuffvFWgymC76ftndRcuPJNwYfY6LYg50Z.jpg', NULL, 2, 9, NULL, NULL, '[\"2\",\"3\",\"4\"]', '[\"8\",\"9\",\"10\"]', '[\"21\",\"7\",\"8\",\"19\",\"18\",\"13\",\"24\",\"17\",\"10\"]', 'Gated Community Apartments', '13.52', '6', '1338', NULL, 0, 0, 'published', 'pre_launch', '2024-09-27 11:42:40', '2024-09-27 18:25:28'),
(19, 'My Home 99', 'my-home-99', 1, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.391900149341!2d78.31153037462721!3d17.39825000249316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa51bb8b41a511245%3A0xafb0ede09139db5!2sMY%20Home%2099!5e1!3m2!1sen!2sin!4v1727422205486!5m2!1sen!2sin', 'projects/shhObGki0BsVZ3ijdWs2aVIEcMnsURVfBRI1r4Lj.jpg', 'https://www.myhomeconstructions.com/my-home-99/', NULL, NULL, 'projects/2WwHaGCNp2FqkInCpVFtHWOpZ6L8J7W7IJ7qOYB2.jpg', NULL, 2, 9, NULL, NULL, NULL, NULL, '[\"19\",\"13\",\"9\"]', 'Stand Alone Apartments', '1.74', '1', '99', NULL, 0, 0, 'published', 'pre_launch', '2024-09-27 13:02:59', '2024-09-27 18:24:50'),
(26, 'My Home Avali', 'my-home-avali', 0, '\"[\\\"13\\\",\\\"15\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3444.227547006029!2d78.29131167462852!3d17.459937500712176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbed0b434a0943%3A0xd4fe0595a3ab043e!2sMy%20Home%20Avali!5e1!3m2!1sen!2sin!4v1727676280068!5m2!1sen!2sin', 'projects/OHCFPeSk42bPCl4glujUrwc36S8LIur4CMQ5WO1N.jpg', 'https://www.myhomeconstructions.com/my-home-avali/', NULL, NULL, 'projects/sDLNijBBIspHvf0I3SEbn2RJqwI2kSEiT9NOYN8D.jpg', NULL, 2, 11, NULL, NULL, '[\"3\"]', '[\"8\",\"9\",\"10\"]', '[\"21\",\"8\",\"19\",\"4\",\"9\",\"10\",\"22\"]', 'Gated Community Apartments', '8.37', '4', '744', NULL, 0, 0, 'published', 'ready_to_move', '2024-09-30 12:43:34', '2024-10-01 10:16:18'),
(27, 'My Home Vipina', 'my-home-vipina', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13776.858569925285!2d78.278566!3d17.46062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbed5dad597763%3A0xeacd92a571f52fa7!2sMy%20Home%20Vipina!5e1!3m2!1sen!2sin!4v1727680521061!5m2!1sen!2sin', 'projects/PTEtTj5XXJwVRpEgbDUDcGEPyO5XdBnl08uBg3wm.jpg', 'https://www.myhomeconstructions.com/my-home-vipina/', NULL, NULL, 'projects/jyCXdK0GNQeGkGweNvlxbst9hvFAmOB0qWoTDWA5.jpg', NULL, 2, 11, NULL, NULL, NULL, NULL, '[\"21\",\"19\",\"4\",\"18\",\"13\",\"9\",\"10\",\"22\"]', 'Gated Community Apartments', '20.61', '8', '3720', NULL, 0, 0, 'published', 'ready_to_move', '2024-09-30 12:49:12', '2024-10-01 10:16:24'),
(28, 'My Home Nishada', 'my-home-nishada', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d220496.09556898204!2d78.308357!3d17.4057!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95604c3f8c05%3A0x293cdb800c5a2db2!2zTklTSEFEQSwgTVkgSG9tZSBDb25zdHJ1Y3Rpb25zIFJlc2lkZW50aWFsIFByb2plY3Qg4LCo4LC_4LC34LC-4LCm4LC-!5e1!3m2!1sen!2sin!4v1727693140354!5m2!1sen!2sin', 'projects/tW3xiK5dbEB06PUBQZhsKsDYBxo7yOoau46gS9fw.jpg', 'https://myhomenishada.co.in/', NULL, NULL, 'projects/K1DG42ZTFHq9C3ja8sTkFSMdF7ql99SQRpPelhcQ.jpg', NULL, 2, 12, NULL, NULL, '[\"2\",\"3\"]', '[\"9\"]', '[\"21\",\"16\",\"8\",\"19\",\"4\",\"9\",\"29\",\"10\",\"22\"]', 'Gated Community Apartments', '16.68', '8', '1398', NULL, 0, 0, 'published', 'hand_over_in_progress', '2024-09-30 16:27:12', '2024-10-01 18:47:20'),
(29, 'My Home Sayuk', 'my-home-sayuk', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27553.956581591916!2d78.296662!3d17.459037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93f8bd736d8f%3A0x1642edd0eb361c7e!2sMy%20Home%20Sayuk!5e1!3m2!1sen!2sin!4v1727766741447!5m2!1sen!2sin', 'projects/KsAPS51Q7OTkxSm4swRsNaPdVDIqH8mBly1kmPDX.jpg', 'https://myhomesayuk.co.in/?utm_source=myhomeconstructions.com', NULL, NULL, 'projects/TShhllVK7ET7iBvehDEI2Tp5KjbtXOWQyjv5UupK.jpg', NULL, 2, 11, NULL, NULL, NULL, NULL, '[\"32\",\"31\",\"33\",\"19\",\"18\",\"13\",\"9\",\"14\",\"10\"]', 'Gated Community Apartments', '25.37', '12', '3780', NULL, 0, 0, 'newly_added', 'hand_over_in_progress', '2024-10-01 12:47:03', '2024-10-03 14:33:24'),
(30, 'My Home Raka', 'my-home-raka', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.560801880044!2d78.3336168746293!3d17.49516679969236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93ccd7136815%3A0x4f6f311257234941!2sMy%20Home%20Raka!5e1!3m2!1sen!2sin!4v1727768270068!5m2!1sen!2sin', 'projects/jCe8NDJSGdcZlerQEzgYaFrHTodqPFGbuwBeZvok.jpg', 'https://www.myhomeconstructions.com/my-home-raka/', NULL, NULL, 'projects/yuZzXlUE1rFaGrvfDCAw8V0pLWVDE8O96pEnQXUQ.jpg', NULL, 2, 14, NULL, NULL, NULL, '[\"8\",\"10\"]', '[\"32\",\"31\",\"33\",\"19\",\"18\",\"13\",\"10\"]', 'Stand Alone Apartments', '2.45', '1', '303', NULL, 0, 0, 'published', 'hand_over_in_progress', '2024-10-01 14:14:15', '2024-10-01 18:47:20'),
(31, 'My Home Tridasa', 'my-home-tridasa', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6888.078600680281!2d78.259696!3d17.469891!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbedb728e8da31%3A0xf263a5f96a579a11!2sMy%20Home%20Tridasa!5e1!3m2!1sen!2sin!4v1727777103502!5m2!1sen!2sin', 'projects/U745arfcaXNwYoHhFoSjxc1nLJSxsypmRtqFxIJt.jpg', 'https://www.myhomeconstructions.com/my-home-tridasa/', NULL, NULL, 'projects/G1q4zYRp4QhOxY4TWtHhS0O2flsFaYcUTleDbWA1.jpg', NULL, 2, 11, NULL, NULL, '[\"3\"]', '[\"10\"]', '[\"21\",\"12\",\"11\",\"8\",\"19\",\"15\",\"9\",\"14\",\"29\",\"10\",\"22\"]', 'Gated Community Apartments', '22.56', '09', '2682', NULL, 0, 0, 'published', 'hand_over_in_progress', '2024-10-01 15:36:27', '2024-10-01 18:47:24'),
(32, 'My Home Tarkshya', 'my-home-tarkshya', 0, '\"[\\\"13\\\"]\"', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27564.129157637413!2d78.338734!3d17.391655!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95f475e07973%3A0x702fd3eace9038b4!2sMy%20Home%20Tarkshya!5e1!3m2!1sen!2sin!4v1727780944814!5m2!1sen!2sin', 'projects/WbGxUNMQiImkzLjiu0p2WDFOBZCcjvl6ooM9CMLk.jpg', 'https://www.myhomeconstructions.com/my-home-tarkshya/', NULL, NULL, 'projects/lKhrZM253iihnBhMBQwo4Ylq7rfFi6NECrHlEEir.jpg', NULL, 2, 9, NULL, NULL, NULL, NULL, '[\"21\",\"18\",\"13\",\"10\"]', 'Gated Community Apartments', '5.82', '4', '660', NULL, 0, 0, 'published', 'hand_over_in_progress', '2024-10-01 16:43:27', '2024-10-01 18:47:25');

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
  `fullname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` char(30) DEFAULT NULL,
  `iam_resident_in_project` tinyint(1) NOT NULL DEFAULT 0,
  `tower` varchar(50) DEFAULT NULL,
  `flat` varchar(50) DEFAULT NULL,
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

INSERT INTO `reviews` (`id`, `user_id`, `project_id`, `star_rating`, `review`, `fullname`, `email`, `phone`, `iam_resident_in_project`, `tower`, `flat`, `reviewed_on`, `ip_address`, `approval_status`, `approved_by`, `approved_on`, `created_at`, `updated_at`) VALUES
(12, 192, 9, 3, 'My sister visited the project with her husband. She mentioned that the swimming pool is lovely and the banquet hall with the balcony looks very good. In her opinion, the drawback is that it\'s really hot everywhere as there is no airflow in public spaces. But she saw that the covered gallery has air conditioning to make lounging more comfortable. The Botanika project features all contemporary amenities, including high-speed lifts and a lovely clubhouse with a restaurant. But you must always search for more The Botanika reviews before making any decisions.', 'Venkat', 'venkat@deepredink.com', '9898989892', 1, 'B', '1', '2024-10-01 07:53:20', '157.48.201.32', 1, 192, '2024-10-01 10:44:24', '2024-10-01 07:53:20', '2024-10-03 10:58:30'),
(13, 192, 9, 4, 'Let me share my The Botanika review as I paid a visit to this property with my father recently. One of their representatives showed us the flats. And we booked a 3 BHK which was around 2255 sq ft after taking a thorough look. I have seen that the beautifully constructed Botanika residential building is situated in Gachibowli in a modular location. It is situated in a busy neighbourhood and borders the busy Gachibowli-Miyapur Road. I believe, unlike many new and upcoming residential projects, this one will offer great connectivity throughout the city. If you are also thinking of investing here, do visit the site yourself first. You will get a better sense of how this project is.', 'Virat Sharma', 'venkat@deepredink.com', '9052691535', 0, NULL, NULL, '2024-10-03 11:07:58', '106.222.229.253', 1, 192, '2024-10-03 11:08:10', '2024-10-03 11:07:58', '2024-10-03 11:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `search_logs`
--

CREATE TABLE `search_logs` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `device` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_logs`
--

INSERT INTO `search_logs` (`id`, `keyword`, `ip_address`, `user_id`, `device`, `platform`, `browser`, `location`, `created_at`, `updated_at`) VALUES
(11, 'Incor', '106.222.230.172', 0, 'Desktop', 'OS X', 'Chrome', 'Hyderābād, Telangana', '2024-09-27 15:14:07', '2024-09-27 15:14:07'),
(12, 'The Botanika', '106.222.230.172', 0, 'Desktop', 'OS X', 'Chrome', 'Hyderābād, Telangana', '2024-09-27 15:14:27', '2024-09-27 15:14:27'),
(15, 'Ambience', '106.222.230.172', 0, 'Desktop', 'OS X', 'Chrome', 'Hyderābād, Telangana', '2024-09-27 15:15:06', '2024-09-27 15:15:06'),
(23, 'botanika', '106.222.230.172', 192, 'Mobile', 'AndroidOS', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:18:35', '2024-09-30 11:18:35'),
(24, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:30:04', '2024-09-30 11:30:04'),
(25, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:30:50', '2024-09-30 11:30:50'),
(26, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:31:05', '2024-09-30 11:31:05'),
(27, 'Retail Space', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:41:09', '2024-09-30 11:41:09'),
(28, 'Retail Space', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:41:22', '2024-09-30 11:41:22'),
(29, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:41:36', '2024-09-30 11:41:36'),
(30, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:43:51', '2024-09-30 11:43:51'),
(31, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:44:59', '2024-09-30 11:44:59'),
(32, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:45:22', '2024-09-30 11:45:22'),
(33, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:45:42', '2024-09-30 11:45:42'),
(34, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:46:22', '2024-09-30 11:46:22'),
(35, 'Apartment Gated Community', '106.222.230.172', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:47:44', '2024-09-30 11:47:44'),
(36, '2', '106.222.230.172', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:47:48', '2024-09-30 11:47:48'),
(37, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:47:53', '2024-09-30 11:47:53'),
(38, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:48:06', '2024-09-30 11:48:06'),
(39, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:48:26', '2024-09-30 11:48:26'),
(40, 'botanika', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:49:39', '2024-09-30 11:49:39'),
(41, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:49:43', '2024-09-30 11:49:43'),
(42, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:50:22', '2024-09-30 11:50:22'),
(43, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:50:29', '2024-09-30 11:50:29'),
(44, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:50:39', '2024-09-30 11:50:39'),
(45, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:50:52', '2024-09-30 11:50:52'),
(46, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:50:59', '2024-09-30 11:50:59'),
(47, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:23', '2024-09-30 11:51:23'),
(48, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:26', '2024-09-30 11:51:26'),
(49, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:29', '2024-09-30 11:51:29'),
(50, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:31', '2024-09-30 11:51:31'),
(51, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:36', '2024-09-30 11:51:36'),
(52, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:50', '2024-09-30 11:51:50'),
(53, '2', '106.222.230.172', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 11:51:54', '2024-09-30 11:51:54'),
(54, '2.5', '106.222.230.172', 192, 'Desktop', 'OS X', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 12:05:47', '2024-09-30 12:05:47'),
(55, 'botanika', '106.222.228.196', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-09-30 18:53:14', '2024-09-30 18:53:14'),
(56, 'botanika', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:14:25', '2024-10-01 07:14:25'),
(57, 'botanika', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:14:26', '2024-10-01 07:14:26'),
(58, '3', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:25:15', '2024-10-01 07:25:15'),
(59, 'botanika', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:26:47', '2024-10-01 07:26:47'),
(60, 'botanika', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:27:44', '2024-10-01 07:27:44'),
(61, '3', '157.48.201.32', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 07:27:48', '2024-10-01 07:27:48'),
(62, 'Indis', '157.48.214.127', 0, 'Mobile', 'AndroidOS', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 09:34:55', '2024-10-01 09:34:55'),
(63, 'my home', '106.222.229.253', 194, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 10:17:44', '2024-10-01 10:17:44'),
(64, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:02:51', '2024-10-01 13:02:51'),
(65, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:07:02', '2024-10-01 13:07:02'),
(66, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:07:10', '2024-10-01 13:07:10'),
(67, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:10:56', '2024-10-01 13:10:56'),
(68, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:11:10', '2024-10-01 13:11:10'),
(69, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:12:41', '2024-10-01 13:12:41'),
(70, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:16:42', '2024-10-01 13:16:42'),
(71, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:17:36', '2024-10-01 13:17:36'),
(72, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:18:47', '2024-10-01 13:18:47'),
(73, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:18:56', '2024-10-01 13:18:56'),
(74, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:19:43', '2024-10-01 13:19:43'),
(75, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:20:20', '2024-10-01 13:20:20'),
(76, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:20:33', '2024-10-01 13:20:33'),
(77, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:24:36', '2024-10-01 13:24:36'),
(78, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:24:52', '2024-10-01 13:24:52'),
(79, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:25:32', '2024-10-01 13:25:32'),
(80, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:25:37', '2024-10-01 13:25:37'),
(81, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:03', '2024-10-01 13:26:03'),
(82, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:07', '2024-10-01 13:26:07'),
(83, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:15', '2024-10-01 13:26:15'),
(84, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:30', '2024-10-01 13:26:30'),
(85, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:32', '2024-10-01 13:26:32'),
(86, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:26:55', '2024-10-01 13:26:55'),
(87, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:27:30', '2024-10-01 13:27:30'),
(88, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:27:45', '2024-10-01 13:27:45'),
(89, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:27:50', '2024-10-01 13:27:50'),
(90, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:28:04', '2024-10-01 13:28:04'),
(91, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:28:19', '2024-10-01 13:28:19'),
(92, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:28:29', '2024-10-01 13:28:29'),
(93, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:28:35', '2024-10-01 13:28:35'),
(94, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:29:19', '2024-10-01 13:29:19'),
(95, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:29:20', '2024-10-01 13:29:20'),
(96, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:29:57', '2024-10-01 13:29:57'),
(97, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:30:00', '2024-10-01 13:30:00'),
(98, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:30:04', '2024-10-01 13:30:04'),
(99, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:30:05', '2024-10-01 13:30:05'),
(100, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:30:44', '2024-10-01 13:30:44'),
(101, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:31:38', '2024-10-01 13:31:38'),
(102, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:32:14', '2024-10-01 13:32:14'),
(103, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:32:16', '2024-10-01 13:32:16'),
(104, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:32:18', '2024-10-01 13:32:18'),
(105, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:33:30', '2024-10-01 13:33:30'),
(106, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:33:34', '2024-10-01 13:33:34'),
(107, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:33:38', '2024-10-01 13:33:38'),
(108, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:33:41', '2024-10-01 13:33:41'),
(109, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:33:58', '2024-10-01 13:33:58'),
(110, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:34:22', '2024-10-01 13:34:22'),
(111, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:34:59', '2024-10-01 13:34:59'),
(112, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:36:28', '2024-10-01 13:36:28'),
(113, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:36:32', '2024-10-01 13:36:32'),
(114, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:36:47', '2024-10-01 13:36:47'),
(115, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:37:11', '2024-10-01 13:37:11'),
(116, 'INDIS', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:37:22', '2024-10-01 13:37:22'),
(117, 'indis', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:37:32', '2024-10-01 13:37:32'),
(118, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:37:39', '2024-10-01 13:37:39'),
(119, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:37:45', '2024-10-01 13:37:45'),
(120, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:39:39', '2024-10-01 13:39:39'),
(121, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:39:51', '2024-10-01 13:39:51'),
(122, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:42:52', '2024-10-01 13:42:52'),
(123, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:42:54', '2024-10-01 13:42:54'),
(124, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:08', '2024-10-01 13:43:08'),
(125, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:17', '2024-10-01 13:43:17'),
(126, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:26', '2024-10-01 13:43:26'),
(127, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:33', '2024-10-01 13:43:33'),
(128, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:37', '2024-10-01 13:43:37'),
(129, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:40', '2024-10-01 13:43:40'),
(130, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:48', '2024-10-01 13:43:48'),
(131, '4', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:43:52', '2024-10-01 13:43:52'),
(132, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:44:26', '2024-10-01 13:44:26'),
(133, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:44:28', '2024-10-01 13:44:28'),
(134, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:44:46', '2024-10-01 13:44:46'),
(135, '2', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:46:34', '2024-10-01 13:46:34'),
(136, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:46:49', '2024-10-01 13:46:49'),
(137, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:46:59', '2024-10-01 13:46:59'),
(138, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:47:02', '2024-10-01 13:47:02'),
(139, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:47:18', '2024-10-01 13:47:18'),
(140, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:47:24', '2024-10-01 13:47:24'),
(141, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:47:28', '2024-10-01 13:47:28'),
(142, '3', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-01 13:47:32', '2024-10-01 13:47:32'),
(143, '3', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 07:44:19', '2024-10-03 07:44:19'),
(144, '3', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 07:45:14', '2024-10-03 07:45:14'),
(145, '3', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 07:46:11', '2024-10-03 07:46:11'),
(146, 'botanika', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 07:51:55', '2024-10-03 07:51:55'),
(147, '3', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 07:55:07', '2024-10-03 07:55:07'),
(148, '2', '157.48.162.14', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 08:00:50', '2024-10-03 08:00:50'),
(149, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 10:50:04', '2024-10-03 10:50:04'),
(150, 'botanika', '106.222.229.253', 192, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 11:38:50', '2024-10-03 11:38:50'),
(151, 'botanika', '106.222.229.253', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 16:38:35', '2024-10-03 16:38:35'),
(152, '2.5', '106.222.229.253', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 18:29:48', '2024-10-03 18:29:48'),
(153, '3', '106.222.229.253', 0, 'Desktop', 'Windows', 'Chrome', 'Hyderābād, Telangana', '2024-10-03 18:29:55', '2024-10-03 18:29:55');

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
(21, 14, '3', '3', '2', 'West', '2108', 'unit-configurations/pCK0NDrQHQWTR9jTP6rxOXqJUMlUj21WUlHTQ0t9.png', '2024-09-23 16:08:08', '2024-09-25 18:09:38'),
(22, 14, '3', '3', '2', 'East', '2108', 'unit-configurations/gdzn88ViVpQsGOYhiJQz5cN4OJSATHjYxww5BdWi.png', '2024-09-23 16:09:22', '2024-09-23 16:09:22'),
(23, 10, '3', '3', '1', 'East', '1610', 'unit-configurations/8htmwHZHPJ4JkzWqsOvBcFj6uFwl4r3R0QyU2pNv.png', '2024-09-23 16:26:15', '2024-09-23 16:26:15'),
(24, 10, '3', '3', '1', 'West', '1610', 'unit-configurations/rY1ZToBJu2hAqf6S4L3vcbmeR1wwDVG0rKeCob7F.png', '2024-09-23 16:26:50', '2024-09-23 16:26:50'),
(25, 13, '3', '3', '2', 'West', '2597', 'unit-configurations/qC9vtjPTT8BdENncL9gsTA6aiKcJRaWiixADs1l4.png', '2024-09-23 18:31:58', '2024-09-23 18:31:58'),
(26, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/0LLXjvNPzuoFnVLtGWk0flUDrkem9u24ncj7R5ee.png', '2024-09-23 18:34:39', '2024-09-23 18:34:39'),
(27, 13, '3', '3', '1', 'West', '1921', 'unit-configurations/OwxzdY2tntSo1TGZt3UorTwqTU7Qy4CstttDZdaG.png', '2024-09-24 12:35:44', '2024-09-24 12:35:44'),
(28, 13, '2', '2', '1', 'West', '1457', 'unit-configurations/Hg4regawFFxvnCvkOJ9W7kaX5Qo9c3mWftajnEDU.png', '2024-09-24 12:36:46', '2024-09-24 12:46:10'),
(29, 13, '2', '2', '1', 'West', '1457', 'unit-configurations/xlyjmB7fNRJup32LXUzp8UaCsnbe1hMYrlOEcbXf.png', '2024-09-24 12:44:52', '2024-09-24 12:44:52'),
(30, 13, '3', '3', '2', 'West', '2566', 'unit-configurations/hGet24riOcsf2s2aLlYkIynKYzDhKNnTRKcOof35.png', '2024-09-24 12:50:19', '2024-09-24 12:50:19'),
(31, 13, '3', '3', '1', 'East', '2548', 'unit-configurations/HzkxNWu96wXdVtuvFBTUZTwUXbCGBeoMKu1eIaQW.png', '2024-09-24 12:52:03', '2024-09-24 12:52:26'),
(32, 13, '2', '2', '1', 'East', '1433', 'unit-configurations/utr6A1CEFLtrLWl8peRtZuNwtdwrpPIQ0o45x9Nw.png', '2024-09-24 12:54:19', '2024-09-24 12:54:19'),
(33, 13, '2', '2', '1', 'East', '1433', 'unit-configurations/oYFkRY9ZMr0D6SvMW0f5Feh8Ab9e0dQEIjmUKHKz.png', '2024-09-24 12:56:16', '2024-09-24 12:56:16'),
(34, 13, '3', '3', '1', 'East', '1931', 'unit-configurations/vuGDNoV1AQYgllzsM11Aal6WeCeaqPv5CSxw5tjT.png', '2024-09-24 12:57:14', '2024-09-24 12:57:14'),
(35, 13, '3', '3', '1', 'East', '2105', 'unit-configurations/LFozM9i8Ek1pfHa2VVfjWqrOPcFFtGWkEFfse5B9.png', '2024-09-24 13:05:21', '2024-09-24 13:05:58'),
(36, 13, '3', '3', '2', 'East', '2534', 'unit-configurations/lu4Ih94t1K3Fi3EXmYXSlDyHc3RI1NaXwzI2cG8O.png', '2024-09-24 13:06:43', '2024-09-24 13:06:43'),
(37, 13, '3', '3', '1', 'West', '1956', 'unit-configurations/hjirIqmX36PAAtPiJKmbTPyflT2Q30gh3m4tOncd.png', '2024-09-24 14:09:16', '2024-09-24 14:09:16'),
(38, 13, '2', '2', '1', 'West', '1390', 'unit-configurations/cmQiMpAqKS9PXCoznQY5eXDJgv33QaCPksqOko8D.png', '2024-09-24 14:10:06', '2024-09-24 14:10:06'),
(39, 13, '2', '2', '1', 'West', '1390', 'unit-configurations/JyQrCI6CJugQMVCU6yKuiKaER7UMfoOXqJQlKLkj.png', '2024-09-24 14:10:50', '2024-09-24 14:10:50'),
(40, 13, '2', '2', '1', 'West', '1390', 'unit-configurations/4CMT4pz3CPFMwH64XIZ4Sz4QBpYRjOKE94FhBIYi.png', '2024-09-24 14:11:33', '2024-09-24 14:11:33'),
(41, 13, '3', '3', '1', 'West', '1956', 'unit-configurations/1ErbYfPCB6yTSRdp4XGCx9j99G5NLe75dwm0DEHi.png', '2024-09-24 14:12:19', '2024-09-24 14:12:19'),
(42, 13, '3', '3', '1', 'West', '1956', 'unit-configurations/QG5oFb3is1IjbmeYHqvb0hO06BwYMwuVaPws7qDV.png', '2024-09-24 14:12:55', '2024-09-24 14:12:55'),
(43, 13, '3', '3', '1', 'East', '1933', 'unit-configurations/V40QSXckUJy5p94pNYjUEklwWVmhzoV6sIkFrD5J.png', '2024-09-24 14:13:45', '2024-09-24 14:13:45'),
(44, 13, '3', '3', '1', 'East', '1933', 'unit-configurations/iWY9bMdO9TqibKIisHEBZgVyBeiVqPOMHRcQYzre.png', '2024-09-24 14:14:41', '2024-09-24 14:14:41'),
(45, 13, '2', '2', '1', 'East', '1367', 'unit-configurations/6QMuhGltszrIYmLc9At7Gaf4fDIZEA2Y8hLG8QK5.png', '2024-09-24 14:15:30', '2024-09-24 14:15:30'),
(46, 13, '2', '2', '1', 'East', '1367', 'unit-configurations/1ieS917p10kHJEPlx4J1RgwdTeMjYhXKuWu8SStw.png', '2024-09-24 14:16:05', '2024-09-24 14:16:05'),
(47, 13, '2', '2', '1', 'East', '1367', 'unit-configurations/caoXgJIaGxQRpSiiiOMd10iMvMEo1giqfEv8JvJt.png', '2024-09-24 14:16:47', '2024-09-24 14:16:47'),
(48, 13, '3', '3', '1', 'East', '1933', 'unit-configurations/3TvCArdkksO9FYio6uHrb8jGDjYAFdvJOR1Cfggv.png', '2024-09-24 14:17:40', '2024-09-24 14:17:40'),
(49, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/h1IMS5kAc8IdnDhdmTe1qb5ihWUe4eorqCCMbp8o.png', '2024-09-24 14:34:35', '2024-09-24 14:34:35'),
(50, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/IL5pMU9E9WgbHf4eW6pEkFX2X5E1O1Gm1azaB8Vj.png', '2024-09-24 14:35:13', '2024-09-24 14:35:13'),
(51, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/LgiEN29ZSjX7l8VaeT300GCeXU40VcKvG4m3ah4F.png', '2024-09-24 14:35:39', '2024-09-24 14:35:39'),
(52, 13, '3', '3', '1', 'West', '2097', 'unit-configurations/d2IKmrTjfdvzGWumHB90fYleh6dTBwemlRZX2htm.png', '2024-09-24 14:36:15', '2024-09-24 14:36:15'),
(53, 13, '3', '3', '1', 'East', '2105', 'unit-configurations/CYseEsDs0CT8Yn9MQF4BU8zlfDwJayY5tMWqAj1G.png', '2024-09-24 14:37:05', '2024-09-24 14:37:05'),
(54, 13, '3', '3', '1', 'East', '2105', 'unit-configurations/GfBlaW4ogxbZ0kdrDWX2Cai39h7MprNisnF44rB0.png', '2024-09-24 14:37:38', '2024-09-24 14:37:38'),
(55, 13, '3', '3', '1', 'East', '2105', 'unit-configurations/4EhU19iIPeSSSUVuqcRj9n8fJEC0o53PWAWZNrYb.png', '2024-09-24 14:38:09', '2024-09-24 14:38:31'),
(56, 13, '3', '3', '1', 'East', '2105', 'unit-configurations/N3UhG28KcoRIwm2UdxLoMXzbvkW4C2YS4H8qinhZ.png', '2024-09-24 14:39:49', '2024-09-24 14:39:49'),
(57, 12, '3', '3', '1', 'West', '1638', 'unit-configurations/YdRZfeeG2HxRL9fmHnZTbG6AwMKa0R9h1jUQHltk.png', '2024-09-24 15:27:22', '2024-09-24 15:27:22'),
(58, 12, '2', '2', '1', 'West', '1392', 'unit-configurations/on0AbyS7DoFpLfixW9dalAZ56D5eDRKR0O1GRZ6X.png', '2024-09-24 15:28:47', '2024-09-24 15:28:47'),
(59, 12, '2', '2', '1', 'West', '1286', 'unit-configurations/gXfoGHDwOL0qMC7ds9CPtitSIJV4zv9vnpwfMM6l.png', '2024-09-24 15:29:48', '2024-09-24 15:29:48'),
(60, 12, '2', '2', '1', 'West', '1429', 'unit-configurations/pBeg0fx3iIWYqbjL1YsniT0yLqtPKezijN1cmDPV.png', '2024-09-24 15:30:40', '2024-09-24 15:30:40'),
(61, 12, '3', '3', '2', 'West', '1794', 'unit-configurations/NFou8gqkm0M1SoX8M3HdPl9rEUaS9H4g86IXS0nT.png', '2024-09-24 15:32:42', '2024-09-24 15:32:42'),
(62, 12, '3', '3', '2', 'East', '1799', 'unit-configurations/wLcL892RGp1aJWIq39UMupmc8c4DlPnwpHFQW0ln.png', '2024-09-24 15:33:41', '2024-09-24 15:33:41'),
(63, 12, '3', '3', '1', 'East', '1568', 'unit-configurations/MBBIQ7DdmNlwo0kK0bbUsu9p1L3vRwY3AqJq3mFl.png', '2024-09-24 15:34:58', '2024-09-24 15:34:58'),
(64, 12, '2', '2', '1', 'East', '1286', 'unit-configurations/TAnIcplcdURh0wN0INBcKoAZ52raRYSjIRWrCpNa.png', '2024-09-24 15:35:48', '2024-09-24 15:35:48'),
(65, 12, '3', '3', '1', 'East', '1568', 'unit-configurations/nYWPRrKCbvko3CnjdmhadEUxYiJ7Tl9WoqlVajE9.png', '2024-09-24 15:36:46', '2024-09-24 15:36:46'),
(66, 12, '3', '3', '1', 'East', '1638', 'unit-configurations/Cp0rSdJD9hiag7L3sRutnZND3cMk8GXgfOjjYDQC.png', '2024-09-24 15:37:22', '2024-09-24 15:37:22'),
(67, 12, '3', '3', '2', 'West', '2108', 'unit-configurations/4UHSMjdetZvNcf3mv7PQMJb2ztiDyy2EqC6JyJRx.png', '2024-09-24 16:44:21', '2024-09-24 16:44:21'),
(68, 12, '2', '2', '1', 'West', '1576', 'unit-configurations/m1I3PyVoyfTComvS1Yux2C0WFo74Z6ZQcOghRNSm.png', '2024-09-24 16:45:53', '2024-09-24 16:45:53'),
(69, 12, '3', '3', '2', 'West', '2650', 'unit-configurations/bMBqNq8tjhvWhi0upZiKTCCRQDvIZyVmWs2ZyapR.png', '2024-09-24 16:55:30', '2024-09-24 16:55:30'),
(70, 12, '3', '3', '2', 'East', '2650', 'unit-configurations/5bNTtWUp3Uvi84L60kWaYIGmmJLI8Pk5tyo5d4GB.png', '2024-09-24 16:56:20', '2024-09-24 16:56:20'),
(71, 12, '3', '3', '2', 'East', '2108', 'unit-configurations/cBaq2xb5NAuIM1iF8y58FFEBe3biZyXUrPPCrJ8R.png', '2024-09-24 16:58:23', '2024-09-24 16:58:23'),
(72, 12, '2', '2', '1', 'East', '1576', 'unit-configurations/YpbPOPK2TC5kh6raNrmtzM4v8ty8jAtRZF2dcvGF.png', '2024-09-24 16:59:38', '2024-09-24 16:59:38'),
(73, 15, '2', '2', '0', 'West', '1150', 'unit-configurations/UyTA03hAol0ozV6zWQKDcJkRdfmGEk23II0A4iTN.png', '2024-09-25 14:17:31', '2024-09-25 14:17:31'),
(74, 15, '2', '2', '1', 'West', '1230', 'unit-configurations/z8Rym2b783K5aYu6Nn5PeB9KcZh2VUflO8UOiDcD.png', '2024-09-25 14:18:27', '2024-09-25 14:18:27'),
(75, 15, '2', '2', '0', 'West', '980', 'unit-configurations/Nr2Wspdxih6PWDbYORXczBW72Uyz7MTfO2ZdpTQ0.png', '2024-09-25 14:23:12', '2024-09-25 14:23:12'),
(76, 15, '2', '2', '1', 'West', '1065', 'unit-configurations/KGrF8uNQm0BP3xTmOHUVfM4UM2UsjsrqjsprJLMU.png', '2024-09-25 14:30:45', '2024-09-25 14:30:45'),
(77, 15, '2', '2', '1', 'East', '1065', 'unit-configurations/bvATafDMOSgox6lHJErm1WI0P0qG3kRwTZnXb9tX.png', '2024-09-25 14:31:16', '2024-09-25 14:31:16'),
(78, 15, '2', '2', '1', 'East', '1245', 'unit-configurations/azPATawDpVy5Dnz3IMkVSBmynCldaqpIQeWEEFkY.png', '2024-09-25 14:33:55', '2024-09-25 14:33:55'),
(79, 15, '2', '2', '1', 'East', '1340', 'unit-configurations/lKrenJKYhPasZaOaa2Q1N9N37pEUcUZ3HwwykrYE.png', '2024-09-25 14:34:26', '2024-09-25 14:34:26'),
(80, 15, '2', '2', '1', 'West', '1245', 'unit-configurations/9DDuby7mwT6Bvvadadg7DIr9FLiaF3K2X3CUZzJX.png', '2024-09-25 16:51:59', '2024-09-25 16:51:59'),
(81, 15, '2', '2', '1', 'West', '1340', 'unit-configurations/SiTqdXk28dn86f5JUayeetinx9bzLCthLxZwBPmv.png', '2024-09-25 16:52:49', '2024-09-25 16:52:49'),
(82, 15, '3', '3', '1', 'East', '1545', 'unit-configurations/WApzI0xOV1hLZ7NqZzGVg9PpfCO8kVPP0selUz4F.png', '2024-09-25 16:54:40', '2024-09-25 16:54:40'),
(83, 15, '3', '3', '1', 'East', '1640', 'unit-configurations/JFO0HxXHmSELLQ4uNIy7UDohwGRTs3pu5hgdF5Ge.png', '2024-09-25 16:56:07', '2024-09-25 16:56:07'),
(84, 15, '3', '3', '1', 'West', '1545', 'unit-configurations/8rKGIyL7chWn65g5wADfAAovzZBkGtYu5VGMEcRW.png', '2024-09-25 16:57:11', '2024-09-25 16:57:11'),
(85, 15, '3', '3', '1', 'West', '1640', 'unit-configurations/vK2Xgn3XnMppEtKdKtdotCC1NuFZ9aOJ0lZGFW6h.png', '2024-09-25 16:57:57', '2024-09-25 16:57:57'),
(86, 15, '3', '3', '1', 'West', '1370', 'unit-configurations/S7KNW8joeBmHC9kapkpZ4e3uimEDAvCjoq84GDPo.png', '2024-09-25 16:59:04', '2024-09-25 16:59:04'),
(87, 15, '3', '3', '1', 'West', '1596', 'unit-configurations/GqjBlvDto2VgKpqXCoQAgFXEA9dRadVRC1f9SFpr.png', '2024-09-25 16:59:39', '2024-09-25 16:59:39'),
(88, 15, '3', '3', '1', 'East', '1605', 'unit-configurations/NgQv2pn4pMIuPC15oM5Q0leXaAEi4MQzySFtHWdS.png', '2024-09-25 17:00:29', '2024-09-25 17:00:29'),
(89, 15, '3', '3', '1', 'East', '1700', 'unit-configurations/CpmdEqxKJYE5v1qpMf2bJOcLlJthFIyIC8MzGDx5.png', '2024-09-25 17:03:35', '2024-09-25 17:03:35'),
(90, 15, '3', '3', '1', 'West', '1605', 'unit-configurations/1WSJZjxC7BeelqCwNGZb1i2WFm3iCkaaUvVsCcge.png', '2024-09-25 17:05:09', '2024-09-25 17:05:09'),
(91, 15, '3', '3', '1', 'West', '1700', 'unit-configurations/XucbT81U9pkhRhh7NrOPW95sluWlsYuuYuJnjhle.png', '2024-09-25 17:06:06', '2024-09-25 17:06:06'),
(92, 15, '3', '3', '1', 'East', '1935', 'unit-configurations/cy8yQebLfa2i3HU2cA36bg1RgjVdnNwGGWYVjto1.png', '2024-09-25 17:08:17', '2024-09-25 17:08:17'),
(93, 15, '3', '3', '1', 'East', '1995', 'unit-configurations/EEHLF05G9KWPirMIih6yEvfyptakEm5KyJaaMrRY.png', '2024-09-25 17:08:57', '2024-09-25 17:08:57'),
(94, 15, '3', '3', '1', 'West', '1935', 'unit-configurations/lXWsdCcQHI8vuyiVEi6JkbUdo2ogfzAmwuglvLmo.png', '2024-09-25 17:10:41', '2024-09-25 17:10:41'),
(95, 15, '3', '3', '1', 'West', '1995', 'unit-configurations/225vhCQ9SCpDMgXTVJ7H2Mr5smurvmAxFMUwFXui.png', '2024-09-25 17:11:29', '2024-09-25 17:11:29'),
(96, 15, '3', '3', '1', 'East', '1827', 'unit-configurations/H6xmnssgHegWUF2gAN1V5En6qc8DEroatSFpC6Z6.png', '2024-09-25 17:12:08', '2024-09-25 17:12:08'),
(97, 15, '3', '3', '1', 'East', '1940', 'unit-configurations/mcxYt92RjoQjD3xg3aiEQbwocsle2QnToMesKY8O.png', '2024-09-25 17:13:34', '2024-09-25 17:13:34'),
(98, 15, '3', '3', '1', 'West', '1827', 'unit-configurations/3vHw2mFDrN3dXN85whjR5pyfsoROBEWvynu47D15.png', '2024-09-25 17:17:51', '2024-09-25 17:17:51'),
(99, 15, '3', '3', '2', 'West', '2140', 'unit-configurations/0d1u9Y67kua4iQJuHDGmdYmNaX7LfInYauYsQ1UW.png', '2024-09-25 17:26:19', '2024-09-25 17:36:01'),
(100, 15, '3', '3', '1', 'East', '1827', 'unit-configurations/GXfHPLv8t8el8Z4WOk1f4efV8bG0qg9wl3a149B7.png', '2024-09-25 17:29:44', '2024-09-25 17:29:44'),
(101, 15, '3', '3', '2', 'East', '2150', 'unit-configurations/WDa22yGBt5lJnO4v6EwdtAE3q5b3K0BJhLobEHW9.jpg', '2024-09-25 17:30:16', '2024-09-25 17:35:48'),
(102, 15, '3', '3', '1', 'West', '2045', 'unit-configurations/Xhb5ElSUo2YKmoqAkhjkccgig5dpes2pb1UYz7fl.jpg', '2024-09-25 17:31:15', '2024-09-25 17:31:15'),
(103, 15, '3', '3', '2', 'West', '2410', 'unit-configurations/Aa3TbfQJJK9lizSxgJQNJQpg3Ogh2upIJ91RohoR.jpg', '2024-09-25 17:32:03', '2024-09-25 17:34:38'),
(104, 15, '3', '3', '1', 'North', '1953', 'unit-configurations/9BHzKcZUD32GMbsulZM8qetK5olB1lJ9a37bgTVz.jpg', '2024-09-25 17:33:26', '2024-09-25 17:33:26'),
(105, 15, '3', '3', '2', 'North', '2300', 'unit-configurations/mCPCTy3JFtDw4DqAyz9oodFlOaScgODmyVRrAYey.jpg', '2024-09-25 17:34:06', '2024-09-25 17:34:06'),
(106, 14, '4', '4', '3', 'North', '6108', 'unit-configurations/wxgfaoZEA8p9oGwFVtA0kxgrr7K3Yg41RqSsVW89.jpg', '2024-09-25 18:06:34', '2024-09-25 18:06:34'),
(108, 14, '4', '4', '2', 'East', '3152', 'unit-configurations/blr12VfgRiQ8EJS18rQYgr51oyES5TVodAN1gKWX.jpg', '2024-09-25 18:09:17', '2024-09-25 18:09:17'),
(109, 16, '1', '1', '2', 'East', '794', 'unit-configurations/TM8jjISKHzhRdQJg350nce53DPTuoqyANL8v5OYf.jpg', '2024-09-26 12:32:42', '2024-09-26 12:32:42'),
(110, 16, '2', '2', '1', 'East', '1062', 'unit-configurations/pbnHrZwSDgQvzK8Te0cyZFR68bZzTVVKwrkpbfIc.jpg', '2024-09-26 12:35:31', '2024-09-26 12:35:31'),
(111, 16, '2', '2', '1', 'East', '1113', 'unit-configurations/SBoyLiGNKgJ2LLXxx6bSLtvWJBBON48W2JS8IR6F.jpg', '2024-09-26 12:36:31', '2024-09-26 12:36:31'),
(112, 16, '2', '2', '1', 'West', '1101', 'unit-configurations/vVb3V5gn8kE6J5L4yzddkBx17BE6Vizg4uMOrwAM.jpg', '2024-09-26 12:37:18', '2024-09-26 12:37:18'),
(113, 16, '3', '3', '1', 'East', '1369', 'unit-configurations/s9QIqoJXRirBzOco1iLJnuWlvkj2SZ1U4LpeSjJA.jpg', '2024-09-26 12:39:19', '2024-09-26 12:39:19'),
(114, 16, '3', '3', '1', 'East', '1369', 'unit-configurations/GPcAwkerxdsfFo5P5zwCdzwatOONpKgXHXoWig2s.jpg', '2024-09-26 12:39:59', '2024-09-26 12:39:59'),
(115, 16, '3', '3', '1', 'North', '1367', 'unit-configurations/uknSP6zKcc8H4Uytj8HfleG0SeiFZcSihsjdsqKR.jpg', '2024-09-26 12:40:57', '2024-09-26 12:40:57'),
(116, 17, '4', '4', '2', 'East', '8640', 'unit-configurations/1OL8u36i7qGV68yhsrRhynhzAlrBZvzSxfptWAUy.jpg', '2024-09-26 18:01:11', '2024-09-26 18:01:11'),
(117, 17, '4', '4', '2', 'West', '8640', 'unit-configurations/dYsYLe2fW86MAAnS5EnXrV3kSZctZ63UfDkRf4KV.jpg', '2024-09-26 18:01:58', '2024-09-26 18:01:58'),
(118, 17, '4', '4', '3', 'East', '4685', 'unit-configurations/GnnxRUUUWWhbFnXSvtOsAVOdCf4571kfv3zeXFVp.jpg', '2024-09-26 18:09:16', '2024-09-26 18:09:16'),
(119, 17, '4', '4', '2', 'West', '5400', 'unit-configurations/O0ezQF6Q5WfHX9wtqo4yMkQoXv3HxzcV21xXbZwI.jpg', '2024-09-26 18:10:18', '2024-09-26 18:10:18'),
(120, 17, '4', '4', '2', 'East', '5400', 'unit-configurations/c3DCl11Qm6w8qZ3ZHXsIPnjtG5Wdj1dbtW5JdOPw.jpg', '2024-09-27 11:10:37', '2024-09-27 11:10:37'),
(121, 17, '4', '4', '1', 'West', '4615', 'unit-configurations/Nlh6vQAVYfjMg26BbH3ey317aV2XpjKupB13o9bB.jpg', '2024-09-27 11:11:27', '2024-09-27 11:11:27'),
(122, 17, '4', '4', '2', 'East', '5190', 'unit-configurations/Q8a20lPdIJWxAnWag4EQozdGgw9HekmcEz5VAZSC.jpg', '2024-09-27 11:13:23', '2024-09-27 11:13:23'),
(123, 17, '4', '4', '2', 'West', '5190', 'unit-configurations/FHSYs6IDH8KzZbgUnWbzoMymFvOkdhNDIuNZUzUU.jpg', '2024-09-27 11:14:06', '2024-09-27 11:14:06'),
(124, 17, '4', '4', '2', 'East', '4410', 'unit-configurations/I9jMJ6dEfzMUR5Q5nYcdH4KLNKkPqfV39d1UvjHQ.jpg', '2024-09-27 11:15:02', '2024-09-27 11:15:02'),
(125, 17, '4', '4', '2', 'West', '4365', 'unit-configurations/dBzIRtYzxASKjiIXeJu04H1e0B66cUJtAEIIHiBt.jpg', '2024-09-27 11:15:40', '2024-09-27 11:15:40'),
(126, 17, '4', '4', '3', 'East', '5685', 'unit-configurations/Cms3vqE1il0Kv1RBNmryBwS12yV1L4wpu4Wdg5hG.jpg', '2024-09-27 11:16:56', '2024-09-27 11:16:56'),
(127, 17, '4', '4', '2', 'West', '5400', 'unit-configurations/tvMXXWvAamn5vePo5OnMffzgaFDy15ogZWmOTzuz.jpg', '2024-09-27 11:17:42', '2024-09-27 11:17:42'),
(128, 17, '4', '4', '2', 'East', '4410', 'unit-configurations/WHmPUN3qwO9MFmJVdeqwxT2rTqlxobZtqh4YKZbq.jpg', '2024-09-27 11:18:18', '2024-09-27 11:18:18'),
(129, 17, '4', '4', '2', 'West', '4365', 'unit-configurations/iEYxYFI4QNGDq1w9mCOkNeosANolnTZPPJPdONVT.jpg', '2024-09-27 11:19:01', '2024-09-27 11:19:01'),
(130, 18, '3', '3', '2', 'North', '3710', 'unit-configurations/6bfW3u182hWRbrPBOqCGYVaFWRgnBCCvl0JQ74SN.jpg', '2024-09-27 12:11:38', '2024-09-27 12:11:38'),
(131, 18, '3', '3', '3', 'East', '3710', 'unit-configurations/UDdKZISJZLhwAYZIfBP36c2XEJ6PA5mQ3DQpUpsD.jpg', '2024-09-27 12:12:19', '2024-09-27 12:12:19'),
(132, 18, '3', '3', '2', 'West', '2765', 'unit-configurations/UmVzfWer5Qtrz5Vr0PXQ1WguO92mgHe6MwQl6Ls2.jpg', '2024-09-27 12:13:27', '2024-09-27 12:13:27'),
(133, 18, '3', '3', '2', 'East', '3240', 'unit-configurations/eZkcxZZouVTT4jY4u5zhWup790UcAph5EwxMHGPQ.jpg', '2024-09-27 12:14:23', '2024-09-27 12:14:23'),
(136, 18, '3', '3', '2', 'West', '2765', 'unit-configurations/HiijvPACsp1hXKCF2fLnHIOzZwPwvQN65RIy6p5O.jpg', '2024-09-27 12:15:51', '2024-09-27 12:15:51'),
(137, 18, '3', '3', '3', 'East', '3860', 'unit-configurations/SeJMjAHkfvbKDz0Np43GQRzfIlkm7xNflem7boR8.jpg', '2024-09-27 12:17:51', '2024-09-27 12:17:51'),
(138, 18, '3', '3', '1', 'East', '2796', 'unit-configurations/qf1JXQLek2uWnlbImu7v3ekHvnpdmhWmGmwZ20w5.jpg', '2024-09-27 12:19:10', '2024-09-27 12:19:10'),
(139, 18, '3', '3', '1', 'West', '2796', 'unit-configurations/EjI6HzXAZo4jK75EvM2VCjoc2C3nN6Y9h4eG3ZVF.jpg', '2024-09-27 12:20:02', '2024-09-27 12:20:02'),
(140, 18, '2', '2', '2', 'East', '2565', 'unit-configurations/jjc8DQCROpkMN1n1g7oQVnuD95aKOQ1gATeu6vZN.jpg', '2024-09-27 12:21:11', '2024-09-27 12:21:11'),
(141, 18, '2', '2', '3', 'East', '2845', 'unit-configurations/tH7BRnrVMONCe99ogqmNkZxDlggOb1g44SLrEdTk.jpg', '2024-09-27 12:22:10', '2024-09-27 12:22:10'),
(142, 19, '4', '4', '1', 'North', '9299', 'unit-configurations/AcDyXOYApIbk7hxb192dV03OArojMvVV9eETTBon.jpg', '2024-09-27 16:27:52', '2024-09-27 16:27:52'),
(143, 19, '4', '4', '1', 'South', '10399', 'unit-configurations/kWEIZhch2SfE0zjEIz1Ef96xu6Cg9Jyp9d5zScKj.jpg', '2024-09-27 16:29:03', '2024-09-27 16:29:03'),
(144, 19, '4', '4', '1', 'North', '9199', 'unit-configurations/8GLBBFGarCkbyjjpmNsCJlSj4fos5AlAgG4dGuo7.jpg', '2024-09-27 16:29:57', '2024-09-27 16:29:57'),
(145, 19, '4', '4', '1', 'South', '10239', 'unit-configurations/XZXwb0spYHdOckJ29qPLpSUduifTVdHYk5FEtToI.jpg', '2024-09-27 16:30:50', '2024-09-27 16:30:50'),
(146, 19, '4', '4', '1', 'South', '10399', 'unit-configurations/e3RGRi9bTpzx0AazyNA2hP5E6ao69sXGz9trv1CU.jpg', '2024-09-27 16:31:37', '2024-09-27 16:31:37'),
(147, 26, '4', '4', '3', 'East', '3609', 'unit-configurations/he1FXrI0zQhmeMzRD2Qb0X7WrJQLA7ESuNcIDO92.jpg', '2024-09-30 13:02:43', '2024-09-30 13:02:43'),
(148, 26, '3', '3', '3', 'North', '3000', 'unit-configurations/L68agZZHSn6n6vhOokKA5LMckorfBg4edFaYR5dP.jpg', '2024-09-30 13:03:26', '2024-09-30 13:03:26'),
(149, 26, '4', '4', '3', 'West', '3612', 'unit-configurations/xeGrNlvJLOOzT7My44kYPgVHHG8MaRQUw6RfcfhF.jpg', '2024-09-30 13:04:11', '2024-09-30 13:04:11'),
(150, 26, '3', '3', '3', 'East', '3043', 'unit-configurations/A1akxjcPrHk1eb4CFVCkvT870N1SjRWceIepKCNx.jpg', '2024-09-30 13:04:52', '2024-09-30 13:04:52'),
(151, 26, '2', '2', '1', 'West', '2551', 'unit-configurations/07pqqXEM3p4JL2oU6sI42dqpMM4CyRTTnC348czc.jpg', '2024-09-30 13:05:45', '2024-09-30 13:05:45'),
(152, 27, '3', '3', '1', 'East', '2095', 'unit-configurations/zJMHFrWP0vtODr317kgWOPqQmNEXF5cqgErLaOik.jpg', '2024-09-30 15:14:43', '2024-09-30 15:14:43'),
(153, 27, '3', '3', '1', 'West', '2095', 'unit-configurations/muOVx4ryXcoBr7TYjlozIgyO3NBCUfsU6pzuhePl.jpg', '2024-09-30 15:15:53', '2024-09-30 15:15:53'),
(154, 27, '2', '2', '1', 'East', '1325', 'unit-configurations/v1PBJi7b5A1QLSyVDMYAkfQGRMvcuv49W4QQ4d3e.jpg', '2024-09-30 15:16:56', '2024-09-30 15:16:56'),
(155, 27, '2', '2', '1', 'West', '1325', 'unit-configurations/BARmipp4Qt9v843cXxkiiH8LGbdlkG7bBLbECznG.jpg', '2024-09-30 15:17:22', '2024-09-30 15:17:22'),
(156, 27, '3', '3', '1', 'East', '1655', 'unit-configurations/zyhin8bKjwGwPNnKg62b5ex3zVmNRkOWAzPCCkmq.jpg', '2024-09-30 15:18:33', '2024-09-30 15:18:33'),
(157, 27, '3', '3', '1', 'West', '1655', 'unit-configurations/tYyAk2aFL0nk2iu5u0YPTyaLUwV1kIeRBWXRnqN6.jpg', '2024-09-30 15:18:56', '2024-09-30 15:18:56'),
(158, 27, '3', '3', '1', 'East', '1655', 'unit-configurations/6ljF0WxtuAxSXI13bAzEVTa9d3YdEfk2uUjLv1rr.jpg', '2024-09-30 15:20:59', '2024-09-30 15:20:59'),
(159, 27, '3', '3', '1', 'West', '1655', 'unit-configurations/btiqMpxrOJRThTx4jC2YamiKgQFoyGDeLFA4uAoN.jpg', '2024-09-30 15:27:12', '2024-09-30 15:27:12'),
(161, 27, '3', '3', '1', 'East', '2180', 'unit-configurations/n28G7sESB5Qqv3RtMShxeRiNb4kd2rX0i49DbNNX.jpg', '2024-09-30 15:28:26', '2024-09-30 15:28:26'),
(162, 27, '3', '3', '1', 'West', '2180', 'unit-configurations/wA9sbCBF3vg3UygyzVWfi4lPJlDlWkndnWf4jFDH.jpg', '2024-09-30 15:28:53', '2024-09-30 15:28:53'),
(163, 28, '3', '3', '2', 'East', '3592', 'unit-configurations/2leYxYXPJNA3rWAFT5yADt11g7kcaZQNUBySqWmI.jpg', '2024-09-30 17:29:50', '2024-09-30 17:29:50'),
(164, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/VIeDTPD0XENZxyaeAoXIek2eesbtlBMDq7Zpl1bZ.jpg', '2024-09-30 17:30:40', '2024-09-30 17:30:40'),
(165, 28, '3', '3', '2', 'East', '3450', 'unit-configurations/2oYgJ8Bw7n8q9EmXIq6KOHQyIdBtL2X6y198Aho4.jpg', '2024-09-30 17:31:29', '2024-09-30 17:31:29'),
(166, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/WqCy5TIdzwKW6H1x4c6duQbiIrHpirTMoXU92bOW.jpg', '2024-10-01 10:20:21', '2024-10-01 10:20:21'),
(167, 28, '3', '3', '2', 'East', '3592', 'unit-configurations/aij7XCHXQJZIAkbLzZlLQjblBufSBHpsKjDvBTB9.jpg', '2024-10-01 10:22:04', '2024-10-01 10:22:04'),
(168, 28, '3', '3', '2', 'West', '3614', 'unit-configurations/s7POuFCmw8ti8R8Zzqm4Y93luDcHwpkZEnavg6Yr.jpg', '2024-10-01 10:23:00', '2024-10-01 10:23:00'),
(169, 28, '4', '4', '2', 'East', '3997', 'unit-configurations/O4e6NXbTSVJVVmZ0L1fnexP19Pi44VLBAZbVj23y.jpg', '2024-10-01 10:25:26', '2024-10-01 10:25:26'),
(170, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/77VTpeAl4XXdXsNP5Bza704vWoF4odBQiN2xSzUM.jpg', '2024-10-01 10:26:24', '2024-10-01 10:26:24'),
(171, 28, '4', '4', '2', 'East', '3967', 'unit-configurations/FZW0kilFE94MWdEuuKQNlpua9sgjOchn6sCbLnr1.jpg', '2024-10-01 10:27:20', '2024-10-01 10:27:20'),
(172, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/vcsmFeMtlKqJNzlVxhYIPVauFc17KtwsMidrRRjm.jpg', '2024-10-01 10:28:36', '2024-10-01 10:28:36'),
(173, 28, '3', '3', '2', 'East', '3614', 'unit-configurations/7V64pxBzuShZFx0m5q7KpQ4DpvakSXxGohZJzxsm.jpg', '2024-10-01 10:42:38', '2024-10-01 10:42:38'),
(174, 28, '4', '4', '2', 'West', '4617', 'unit-configurations/EpStlpZcF7g99pRaSIVjzvIneXpkVcTNp7pCxaNh.jpg', '2024-10-01 10:44:46', '2024-10-01 10:44:46'),
(175, 28, '3', '3', '2', 'East', '3534', 'unit-configurations/4230dLylIiPExJ29yrBAig8pcvb5RERujZutykas.jpg', '2024-10-01 10:46:49', '2024-10-01 10:46:49'),
(176, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/cnmU8mlKZ4U7ue99PRcG7BkvYDZKKK14XxjNXFSZ.jpg', '2024-10-01 10:52:34', '2024-10-01 10:52:34'),
(177, 28, '4', '4', '2', 'East', '4617', 'unit-configurations/CbeMcRzGOmoY7PPqn0I7qQDbWOsTfM7fJcaSAyh3.jpg', '2024-10-01 10:53:12', '2024-10-01 10:53:12'),
(178, 28, '4', '4', '2', 'West', '4016', 'unit-configurations/fbo6JK8YN0MDkze9vaTUasceXBSkGMKMeISUkssd.jpg', '2024-10-01 10:53:47', '2024-10-01 10:53:47'),
(179, 28, '3', '3', '2', 'East', '3336', 'unit-configurations/5Yg8dJ8Q1MfEBBIH1CGO2VNfirAglIOWCm4Jm7MM.jpg', '2024-10-01 10:54:53', '2024-10-01 10:54:53'),
(180, 28, '3', '3', '2', 'East', '3360', 'unit-configurations/iCz2sKnDGMpMCmMNWuzHZDAZB3GVhFx6bIIOFBBe.jpg', '2024-10-01 10:55:47', '2024-10-01 10:55:47'),
(181, 28, '3', '3', '2', 'East', '3485', 'unit-configurations/7JCcg5Exr76d3PrqqvbXxCpxCmYwf4YWBgX6A40j.jpg', '2024-10-01 10:56:40', '2024-10-01 10:56:40'),
(182, 28, '3', '3', '2', 'East', '3174', 'unit-configurations/JoumjgfDeDpxJjtBptygII6Oow2oP5DcoE5j1sHY.jpg', '2024-10-01 10:57:24', '2024-10-01 10:57:24'),
(183, 30, '3', '3', '2', 'North', '2806', 'unit-configurations/dBs8DrTOXhSN1pwnwStu7FLuEkNkq2c8p7gaise8.jpg', '2024-10-01 14:42:03', '2024-10-01 14:42:03'),
(184, 30, '3', '3', '2', 'North', '2773', 'unit-configurations/s937oAkdjBVoMlsfbXaExjj6VtWIQMqKE7ZuVN4e.jpg', '2024-10-01 14:44:06', '2024-10-01 14:44:06'),
(185, 30, '3', '3', '2', 'West', '2806', 'unit-configurations/E9HKya4lM6wKlsTsfh4zee7QVVs1J5nvkzT1Xqwc.jpg', '2024-10-01 14:46:50', '2024-10-01 14:46:50'),
(186, 30, '3', '3', '2', 'West', '2244', 'unit-configurations/WdOzd1GcO1hpPZVSH3uD18poKtoREMi94gCNAbNW.jpg', '2024-10-01 14:47:34', '2024-10-01 14:47:34'),
(187, 30, '3', '3', '2', 'East', '1969', 'unit-configurations/QJvFzUwczbKsKdH54pY5Am1jvGqLH3cWM0ZAVTek.jpg', '2024-10-01 14:48:40', '2024-10-01 14:48:40'),
(188, 30, '3', '3', '2', 'West', '2244', 'unit-configurations/lva4AsueS7ogMXCaButXyGyLkunQotCJRJjxfHTQ.jpg', '2024-10-01 14:49:20', '2024-10-01 14:49:20'),
(189, 30, '3', '3', '2', 'East', '2806', 'unit-configurations/f5umNva5reC5Px2HUaES7KYcAtIAwGivE8AdDr1s.jpg', '2024-10-01 14:50:17', '2024-10-01 14:50:17'),
(190, 30, '3', '3', '2', 'West', '2244', 'unit-configurations/PNKpScnQNcNaPxhrAN5VkIauSgf4F4WWMvcN68K0.jpg', '2024-10-01 14:50:59', '2024-10-01 14:50:59'),
(191, 31, '3', '3', '1', 'East', '1840', 'unit-configurations/1bM5pfS8ElNGtn4yA9ZDrNU54LBiDjpCfKVgAxGn.jpg', '2024-10-01 16:07:35', '2024-10-01 16:07:35'),
(192, 31, '3', '3', '1', 'West', '1840', 'unit-configurations/iWJXtAKtsSryaDEVkvhTRWX37ZsQGQs7PjdEQZPf.jpg', '2024-10-01 16:08:12', '2024-10-01 16:08:12'),
(193, 31, '2', '2', '1', 'East', '1253', 'unit-configurations/6eKwBpBLZv5sg9NmaMqOJVbceUf1DP3LCwH1DmXM.jpg', '2024-10-01 16:08:52', '2024-10-01 16:08:52'),
(194, 31, '2', '2', '1', 'West', '1253', 'unit-configurations/uQhxZUAYF2ioJud0vICzd3ru36HxbTej9sMGSZUG.jpg', '2024-10-01 16:09:24', '2024-10-01 16:09:24'),
(195, 31, '3', '3', '1', 'East', '1505', 'unit-configurations/K7EwcgJTXOGXQijryrbExQT0guXU5oSzi2jxJdTo.jpg', '2024-10-01 16:10:26', '2024-10-01 16:10:26'),
(196, 31, '3', '3', '1', 'West', '1505', 'unit-configurations/JQjScdfr4WuovkudCwUXpucKMpNvAB6QkXCgD6ZL.jpg', '2024-10-01 16:10:58', '2024-10-01 16:10:58'),
(197, 31, '3', '3', '1', 'East', '1505', 'unit-configurations/7FmyaZdZcqBPQpeWa33Lo21RQboUAHb9QIlVyGCh.jpg', '2024-10-01 16:11:34', '2024-10-01 16:11:34'),
(198, 31, '3', '3', '1', 'West', '1505', 'unit-configurations/1jdg3X7FfD97VES7WxjpDlxGy2gqT263eC4HmhyE.jpg', '2024-10-01 16:12:09', '2024-10-01 16:12:09'),
(199, 31, '3', '3', '1', 'East', '1840', 'unit-configurations/j5wr2fXpqTeWnI3Iv9xvo4TGehuJWwljVWfLJSC0.jpg', '2024-10-01 16:12:45', '2024-10-01 16:12:45'),
(200, 31, '3', '3', '1', 'West', '1840', 'unit-configurations/9jMUmaGknaArJm2lIzoobbazUZWYb9YFmS4hcDYG.jpg', '2024-10-01 16:13:09', '2024-10-01 16:13:09'),
(201, 32, '3', '3', '1', 'East', '2235', 'unit-configurations/dvtYLSNXSjMOJJgMFqWRQc4QzxyYcsvpkPBCJbWq.jpg', '2024-10-01 16:48:37', '2024-10-01 16:48:37'),
(202, 32, '3', '3', '1', 'West', '2235', 'unit-configurations/vZSxX1HEqY489DH5C8Q7Z71JHX0GMvDgZs2WRKbV.jpg', '2024-10-01 16:49:14', '2024-10-01 16:49:14'),
(203, 32, '3', '3', '1', 'East', '1957', 'unit-configurations/4vULCOwY7YqUCIgkVR7a5Rv78fTCNFvWyPCEsJXF.jpg', '2024-10-01 16:50:03', '2024-10-01 16:50:03'),
(204, 32, '3', '3', '1', 'East', '2235', 'unit-configurations/QEGDVhuMdQgtdsEPBkoSuN8oDNYRJiEqC7s0mOYI.jpg', '2024-10-01 16:50:49', '2024-10-01 16:50:49'),
(205, 32, '3', '3', '1', 'West', '2235', 'unit-configurations/xdVsbZ7pVJXuH7DYCWVH5bywyucIII885CPwhuSP.jpg', '2024-10-01 16:52:45', '2024-10-01 16:52:45'),
(206, 32, '3', '3', '1', 'West', '1957', 'unit-configurations/WpJQCL3fktcGG1yLPH7cm1pA3OuigYlD36E1Gfmr.jpg', '2024-10-01 16:53:19', '2024-10-01 16:53:19'),
(207, 29, '3', '3', '1', 'East', '2262', 'unit-configurations/2sFPPgEaa5Hv38hKhGtAx8rJ1u1L6kL0gM2er0CT.jpg', '2024-10-03 17:53:54', '2024-10-03 17:53:54'),
(208, 29, '3', '3', '1', 'West', '1926', 'unit-configurations/DsqC8UcyrOsYrxnj2fQft4A1t29WE1X5ymqGSmST.jpg', '2024-10-03 17:57:30', '2024-10-03 17:57:30'),
(209, 29, '2', '2', '1', 'East', '1355', 'unit-configurations/epTdJYgPjOKzzYIxkPNXKObarT8JON2rZb6XT6tf.jpg', '2024-10-03 17:58:14', '2024-10-03 17:58:14'),
(210, 29, '2', '2', '1', 'West', '1355', 'unit-configurations/h36eyC7hg0XVS8WEjRm5Wr8FW9Woe5i7OvxetQDZ.jpg', '2024-10-03 18:04:09', '2024-10-03 18:04:09'),
(211, 29, '3', '3', '1', 'East', '1573', 'unit-configurations/ZoJfZCeO1PSsKkqwOWde9w3ucVHd2vV62xhNGKwF.jpg', '2024-10-03 18:12:15', '2024-10-03 18:12:15'),
(212, 29, '3', '3', '1', 'West', '1573', 'unit-configurations/O3f2qdPJNi3lyU3JuFwe8OvhWhIJdM0bRMkOopxb.jpg', '2024-10-03 18:12:51', '2024-10-03 18:12:51'),
(213, 29, '3', '3', '1', 'East', '1926', 'unit-configurations/aq9UwR1cKdAZTPkZGv82fgRqqLRJZ5qTGlcmTXWE.jpg', '2024-10-03 18:13:31', '2024-10-03 18:13:31'),
(214, 29, '3', '3', '1', 'West', '2262', 'unit-configurations/qLjFXUqddblnp2hZ74ZLaKur9TC5Cx9502q63TET.jpg', '2024-10-03 18:14:00', '2024-10-03 18:14:00'),
(215, 29, '3', '3', '1', 'East', '1926', 'unit-configurations/NXtjodL9mTH6eP6xYNwo62AiHVmsfzZwpmEH3192.jpg', '2024-10-03 18:14:39', '2024-10-03 18:14:39'),
(216, 29, '3', '3', '1', 'West', '2262', 'unit-configurations/zYaafK7Ig0G5p2XmFGc5EvS2lTRgiAR31INgDIpJ.jpg', '2024-10-03 18:15:14', '2024-10-03 18:15:14'),
(217, 29, '2', '2', '1', 'East', '1355', 'unit-configurations/VIiQQhKXkxXlgKF1AiDrGM3nSVwGvYjlAKhuMM6R.jpg', '2024-10-03 18:15:47', '2024-10-03 18:15:47'),
(218, 29, '2', '2', '1', 'West', '1355', 'unit-configurations/UZliGiuW6zTzWee0GXd6XQktPPIuxDrDNzHY1FsH.jpg', '2024-10-03 18:16:20', '2024-10-03 18:16:20'),
(219, 29, '3', '3', '1', 'East', '2262', 'unit-configurations/36poUH3yb8hCNe7hIddi5Tv9oGgR8m4tgtpgAlOd.jpg', '2024-10-03 18:16:53', '2024-10-03 18:16:53'),
(221, 29, '3', '3', '1', 'West', '1926', 'unit-configurations/04RbwlmzcDTiJrtyNLbtYwmPRVT51v3G27JNB6Hj.jpg', '2024-10-03 18:17:25', '2024-10-03 18:17:25');

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
(192, NULL, NULL, NULL, 'Ranjith', '9898989892', 'ranjith@deepredink.com', '$2y$10$7s/1ZX2fDKsLkAw0dpZG.u/AjZKgTIZxH9ma2UoHFdi8YoUBsliem', NULL, NULL, 'default_profile_pic.png', 1, NULL, 1, '2024-09-11 10:43:22', '2024-10-03 17:01:39', '2024-10-03 11:16:10', '106.222.229.253', NULL, NULL, '2024-10-03 17:01:39', '106.222.229.253'),
(193, NULL, NULL, NULL, 'Publisher', '9898989898', 'publisher@deepredink.com', NULL, NULL, NULL, 'default_profile_pic.png', 2, NULL, 1, '2024-09-11 11:13:10', '2024-09-11 16:13:02', NULL, NULL, NULL, NULL, NULL, NULL),
(194, NULL, NULL, NULL, 'Purnavi', '9182805457', 'purnavi@deepredink.com', '$2y$10$pqiKQCnOIe9Xvdzppj3DrODJAUbkE88EV8Yf7Qurp.nkS500g7EZO', NULL, NULL, 'default_profile_pic.png', 4, NULL, 1, '2024-09-11 12:19:04', '2024-10-04 10:48:12', '2024-10-03 16:54:52', '106.222.229.253', NULL, NULL, '2024-10-04 10:48:12', '106.222.231.133'),
(195, NULL, NULL, NULL, 'Sailaja', '9182805457', 'sailaja@deepredink.com', '$2y$10$u9CjqqhJQhk7m9p/0w6X.uGdNRk1VYuItJYo90hWzdJoCp6MJymnK', NULL, NULL, 'default_profile_pic.png', 3, NULL, 1, '2024-09-11 12:47:35', '2024-09-17 16:33:52', '2024-09-11 12:48:14', '106.222.231.212', NULL, NULL, '2024-09-11 12:48:14', '106.222.231.212'),
(196, NULL, NULL, NULL, 'Sri Lakshmi Priya Valluri 1997', '8978850982', 'priya@deepredink.com', '$2y$10$FqvbbNU/7ARvo9cTQRiW.eGuwwLb.kd8rMvA6dWryDW.p0jeu0z5i', '2024-09-24 16:22:11', NULL, 'uploads/66f2998b1bacd_1727175051.jpg', 5, NULL, 1, '2024-09-23 11:33:27', '2024-09-26 13:03:06', NULL, NULL, NULL, '2024-09-23 11:33:32', NULL, NULL),
(197, NULL, NULL, NULL, 'yadav', '9000677584', 'venkat@gmail.com', '$2y$10$./Wbdk1HzZSXafVALdIm5upIrKLCqm51GKgKzwrarxb7dRkwegM4S', NULL, NULL, 'default_profile_pic.png', 5, NULL, 1, '2024-09-25 12:59:15', '2024-09-25 12:59:18', NULL, NULL, NULL, '2024-09-25 12:59:18', NULL, NULL),
(198, NULL, NULL, NULL, 'Ranjith', '9885047096', 'ranjith.ram@gmail.com', '$2y$10$5vaZ9NkI8HTZlReYpBQ29eN8LshpkivwGwT6TgC1U3fNGhQ92eBpC', NULL, NULL, 'default_profile_pic.png', 5, NULL, 1, '2024-09-30 12:24:50', '2024-09-30 12:25:07', NULL, NULL, NULL, '2024-09-30 12:25:07', NULL, NULL);

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
(22, 196, 11, '2024-09-24 17:09:36', '2024-09-24 17:09:36'),
(23, 197, 10, '2024-09-25 13:04:34', '2024-09-25 13:04:34'),
(24, 198, 18, '2024-09-30 12:25:55', '2024-09-30 12:25:55'),
(25, 198, 17, '2024-09-30 12:28:44', '2024-09-30 12:28:44');

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
-- Indexes for table `search_logs`
--
ALTER TABLE `search_logs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `area_masters`
--
ALTER TABLE `area_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `elevation_pictures`
--
ALTER TABLE `elevation_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_amenities`
--
ALTER TABLE `project_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `search_logs`
--
ALTER TABLE `search_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
