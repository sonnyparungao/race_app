-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2018 at 09:13 AM
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
-- Database: `horse_race_simulator`
--

-- --------------------------------------------------------

--
-- Table structure for table `horses`
--

DROP TABLE IF EXISTS `horses`;
CREATE TABLE IF NOT EXISTS `horses` (
  `horse_id` int(11) NOT NULL AUTO_INCREMENT,
  `horse_name` varchar(50) NOT NULL,
  `horse_speed` float NOT NULL,
  `horse_strength` float NOT NULL,
  `horse_endurance` float NOT NULL,
  `jockey_name` varchar(50) NOT NULL,
  `is_racing` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`horse_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horses`
--

INSERT INTO `horses` (`horse_id`, `horse_name`, `horse_speed`, `horse_strength`, `horse_endurance`, `jockey_name`, `is_racing`, `created_at`, `updated_at`) VALUES
(1, 'horse 1', 3, 2, 2, 'jockey 1', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(2, 'horse 2', 3, 2, 2, 'jockey 2', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(3, 'horse 3', 3, 2, 2, 'jockey 3', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(4, 'horse 4', 3, 2, 2, 'jockey 4', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(5, 'horse 5', 3, 2, 2, 'jockey 5', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(6, 'horse 6', 3, 2, 2, 'jockey 6', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(7, 'horse 7', 3, 2, 2, 'jockey 7', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(8, 'horse 8', 3, 2, 2, 'jockey 8', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(9, 'horse 9', 3, 2, 2, 'jockey 9', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(10, 'horse 10', 1, 1, 1, 'jockey 10', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:58'),
(11, 'horse 11', 3, 3, 3, 'jockey 11', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:56'),
(12, 'horse 12', 4, 4, 4, 'jockey 12', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:56'),
(13, 'horse 13', 5, 3, 5, 'jockey 13', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(14, 'horse 14', 6, 6, 6, 'jockey 14', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(15, 'horse 15', 7, 7, 7, 'jockey 15', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(16, 'horse 16', 8, 8, 8, 'jockey 16', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(17, 'horse 17', 3, 2, 2, 'jockey 17', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:57'),
(18, 'horse 18', 1, 1, 1, 'jockey 18', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:58'),
(19, 'horse 19', 3, 3, 3, 'jockey 19', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:56'),
(20, 'horse 20', 4, 4, 4, 'jockey 20', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:56'),
(21, 'horse 21', 5, 3, 5, 'jockey 21', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(22, 'horse 22', 6, 6, 6, 'jockey 22', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(23, 'horse 23', 7, 7, 7, 'jockey 23', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55'),
(24, 'horse 24', 8, 8, 8, 'jockey 24', 0, '2018-10-01 00:00:00', '2018-10-04 08:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE IF NOT EXISTS `races` (
  `race_id` int(11) NOT NULL AUTO_INCREMENT,
  `race_status` tinyint(1) DEFAULT '0' COMMENT 'status=0 not yet started, status=1 started, status=2 completed',
  `race_distance` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`race_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `race_details`
--

DROP TABLE IF EXISTS `race_details`;
CREATE TABLE IF NOT EXISTS `race_details` (
  `race_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `race_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `distance_covered` int(11) NOT NULL DEFAULT '0',
  `cur_time` varchar(50) NOT NULL DEFAULT '00:00:00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`race_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$oG8LPoMY.m2HIwNb4cOdMu1Lri9sJVTAspi230msIBxqUkzDOwTT2', 'bwlVBcvtCswqP12ZxfGZGFKQiBLI6Mv2TML2lG4RyzTStiClZKxDVgshRBhM', '2018-10-02 05:51:38', '2018-10-02 05:51:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
