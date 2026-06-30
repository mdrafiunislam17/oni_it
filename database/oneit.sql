-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2026 at 06:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneit`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `description`, `activity`, `image`, `image1`, `created_at`, `updated_at`) VALUES
(1, 'Unlock Your Business Potential with Our best Cutting-Edge IT Solutions to grow', 'Transform your business with our innovative IT solutions, tailored to address your unique challenges and drive growth in today’s digital landscape.', '<p>Customized Solutions for&nbsp;Every Business</p>\r\n<p>Scalable Infrastructure for&nbsp;Growth</p>\r\n<p>Enhanced Security and Data&nbsp;Protection</p>\r\n<p>Continuous system monitoring and expert support</p>\r\n<p>Empower your business with innovative digital solutions tailored for the modern world. At OnIT Company, we specialize in professional website development, custom software solutions, mobile application development, cloud integration, UI/UX design, and ongoing technical support. Our secure, scalable, and high-performance technologies help businesses streamline operations, enhance customer engagement, and accelerate sustainable growth in today\'s competitive digital landscape.</p>', 1, '1782408214_eo1hvgLZP8.jpg', '1782408215_8UAhx9YODz_about2.jpg', '2026-06-25 11:23:35', '2026-06-25 11:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('arabian-group-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:12:\"display_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:50:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"edit articles\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Edit Articles\";s:1:\"r\";a:1:{i:0;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Role List\";s:1:\"r\";a:1:{i:0;i:3;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Role Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Role Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Role Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"assign-role-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Assign Role List\";s:1:\"r\";a:1:{i:0;i:3;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"assign-role-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:18:\"Assign Role Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"assign-role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Assign Role Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"assign-role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:18:\"Assign Role Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"gallery-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Gallery List\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:14:\"gallery-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Gallery Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"gallery-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Gallery Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:14:\"gallery-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Gallery Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"product-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Product List\";s:1:\"r\";a:1:{i:0;i:3;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"product-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Product Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"product-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Product Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"product-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Product Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Category List\";s:1:\"r\";a:1:{i:0;i:3;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Category Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Category Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Category Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"scheme-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Scheme List\";s:1:\"r\";a:1:{i:0;i:3;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"scheme-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Scheme Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:11:\"scheme-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Scheme Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"scheme-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Scheme Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:20:\"settings-socialMedia\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:20:\"Settings SocialMedia\";s:1:\"r\";a:1:{i:0;i:3;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"settings-admin\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Settings Admin\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"settings-contact\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Settings Contact\";s:1:\"r\";a:1:{i:0;i:3;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"settings-sellers\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Settings Sellers\";s:1:\"r\";a:1:{i:0;i:3;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:22:\"settings-home.page.seo\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:22:\"Settings Home.page.seo\";s:1:\"r\";a:1:{i:0;i:3;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:10:\"about-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"About List\";s:1:\"r\";a:1:{i:0;i:3;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"about-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"About Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"about-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"About Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"about-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"About Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"pages-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Pages List\";s:1:\"r\";a:1:{i:0;i:3;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:12:\"pages-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Pages Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"pages-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Pages Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"pages-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Pages Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:38;a:5:{s:1:\"a\";i:114;s:1:\"b\";s:15:\"promotions-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Promotions List\";s:1:\"r\";a:1:{i:0;i:3;}}i:39;a:5:{s:1:\"a\";i:115;s:1:\"b\";s:17:\"promotions-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:17:\"Promotions Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:40;a:5:{s:1:\"a\";i:116;s:1:\"b\";s:15:\"promotions-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Promotions Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:41;a:5:{s:1:\"a\";i:117;s:1:\"b\";s:17:\"promotions-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:17:\"Promotions Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:42;a:5:{s:1:\"a\";i:118;s:1:\"b\";s:13:\"slider-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Slider Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:43;a:5:{s:1:\"a\";i:119;s:1:\"b\";s:11:\"slider-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Slider List\";s:1:\"r\";a:1:{i:0;i:3;}}i:44;a:5:{s:1:\"a\";i:120;s:1:\"b\";s:13:\"slider-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Slider Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:45;a:5:{s:1:\"a\";i:121;s:1:\"b\";s:11:\"slider-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Slider Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:46;a:5:{s:1:\"a\";i:122;s:1:\"b\";s:9:\"rate-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Rate List\";s:1:\"r\";a:1:{i:0;i:3;}}i:47;a:5:{s:1:\"a\";i:123;s:1:\"b\";s:11:\"rate-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Rate Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:48;a:5:{s:1:\"a\";i:124;s:1:\"b\";s:9:\"rate-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Rate Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:49;a:5:{s:1:\"a\";i:125;s:1:\"b\";s:11:\"rate-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Rate Delete\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1782470609),
('one-it-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:12:\"display_name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:50:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"edit articles\";s:1:\"c\";s:13:\"Edit Articles\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:9:\"Role List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:11:\"Role Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:9:\"Role Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:11:\"Role Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"assign-role-list\";s:1:\"c\";s:16:\"Assign Role List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"assign-role-create\";s:1:\"c\";s:18:\"Assign Role Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"assign-role-edit\";s:1:\"c\";s:16:\"Assign Role Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"assign-role-delete\";s:1:\"c\";s:18:\"Assign Role Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"gallery-list\";s:1:\"c\";s:12:\"Gallery List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:14:\"gallery-create\";s:1:\"c\";s:14:\"Gallery Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"gallery-edit\";s:1:\"c\";s:12:\"Gallery Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:14:\"gallery-delete\";s:1:\"c\";s:14:\"Gallery Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"product-list\";s:1:\"c\";s:12:\"Product List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"product-create\";s:1:\"c\";s:14:\"Product Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"product-edit\";s:1:\"c\";s:12:\"Product Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"product-delete\";s:1:\"c\";s:14:\"Product Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:13:\"Category List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:15:\"Category Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:13:\"Category Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:15:\"Category Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"scheme-list\";s:1:\"c\";s:11:\"Scheme List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"scheme-create\";s:1:\"c\";s:13:\"Scheme Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:11:\"scheme-edit\";s:1:\"c\";s:11:\"Scheme Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"scheme-delete\";s:1:\"c\";s:13:\"Scheme Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:20:\"settings-socialMedia\";s:1:\"c\";s:20:\"Settings SocialMedia\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"settings-admin\";s:1:\"c\";s:14:\"Settings Admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"settings-contact\";s:1:\"c\";s:16:\"Settings Contact\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"settings-sellers\";s:1:\"c\";s:16:\"Settings Sellers\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:22:\"settings-home.page.seo\";s:1:\"c\";s:22:\"Settings Home.page.seo\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:10:\"about-list\";s:1:\"c\";s:10:\"About List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"about-create\";s:1:\"c\";s:12:\"About Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"about-edit\";s:1:\"c\";s:10:\"About Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"about-delete\";s:1:\"c\";s:12:\"About Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"pages-list\";s:1:\"c\";s:10:\"Pages List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:12:\"pages-create\";s:1:\"c\";s:12:\"Pages Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"pages-edit\";s:1:\"c\";s:10:\"Pages Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"pages-delete\";s:1:\"c\";s:12:\"Pages Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"promotions-list\";s:1:\"c\";s:15:\"Promotions List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:17:\"promotions-create\";s:1:\"c\";s:17:\"Promotions Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:40;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:15:\"promotions-edit\";s:1:\"c\";s:15:\"Promotions Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:41;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:17:\"promotions-delete\";s:1:\"c\";s:17:\"Promotions Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:42;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:13:\"slider-delete\";s:1:\"c\";s:13:\"Slider Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:43;a:5:{s:1:\"a\";i:44;s:1:\"b\";s:11:\"slider-list\";s:1:\"c\";s:11:\"Slider List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:44;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:13:\"slider-create\";s:1:\"c\";s:13:\"Slider Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:45;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:11:\"slider-edit\";s:1:\"c\";s:11:\"Slider Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:46;a:5:{s:1:\"a\";i:47;s:1:\"b\";s:9:\"rate-list\";s:1:\"c\";s:9:\"Rate List\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:47;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:11:\"rate-create\";s:1:\"c\";s:11:\"Rate Create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:48;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:9:\"rate-edit\";s:1:\"c\";s:9:\"Rate Edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:49;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:11:\"rate-delete\";s:1:\"c\";s:11:\"Rate Delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";}}}', 1782919688),
('the-bachelor-group-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:12:\"display_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:50:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"edit articles\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Edit Articles\";s:1:\"r\";a:1:{i:0;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Role List\";s:1:\"r\";a:1:{i:0;i:3;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Role Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Role Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Role Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"assign-role-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Assign Role List\";s:1:\"r\";a:1:{i:0;i:3;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"assign-role-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:18:\"Assign Role Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"assign-role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Assign Role Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"assign-role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:18:\"Assign Role Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"gallery-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Gallery List\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:14:\"gallery-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Gallery Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"gallery-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Gallery Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:14:\"gallery-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Gallery Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"product-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Product List\";s:1:\"r\";a:1:{i:0;i:3;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"product-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Product Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"product-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Product Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"product-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Product Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Category List\";s:1:\"r\";a:1:{i:0;i:3;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Category Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Category Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Category Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"scheme-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Scheme List\";s:1:\"r\";a:1:{i:0;i:3;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"scheme-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Scheme Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:11:\"scheme-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Scheme Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"scheme-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Scheme Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:20:\"settings-socialMedia\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:20:\"Settings SocialMedia\";s:1:\"r\";a:1:{i:0;i:3;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"settings-admin\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:14:\"Settings Admin\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"settings-contact\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Settings Contact\";s:1:\"r\";a:1:{i:0;i:3;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"settings-sellers\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:16:\"Settings Sellers\";s:1:\"r\";a:1:{i:0;i:3;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:22:\"settings-home.page.seo\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:22:\"Settings Home.page.seo\";s:1:\"r\";a:1:{i:0;i:3;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:10:\"about-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"About List\";s:1:\"r\";a:1:{i:0;i:3;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"about-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"About Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"about-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"About Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"about-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"About Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"pages-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Pages List\";s:1:\"r\";a:1:{i:0;i:3;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:12:\"pages-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Pages Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"pages-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Pages Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"pages-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:12:\"Pages Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:38;a:5:{s:1:\"a\";i:114;s:1:\"b\";s:15:\"promotions-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Promotions List\";s:1:\"r\";a:1:{i:0;i:3;}}i:39;a:5:{s:1:\"a\";i:115;s:1:\"b\";s:17:\"promotions-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:17:\"Promotions Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:40;a:5:{s:1:\"a\";i:116;s:1:\"b\";s:15:\"promotions-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:15:\"Promotions Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:41;a:5:{s:1:\"a\";i:117;s:1:\"b\";s:17:\"promotions-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:17:\"Promotions Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:42;a:5:{s:1:\"a\";i:118;s:1:\"b\";s:13:\"slider-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Slider Delete\";s:1:\"r\";a:1:{i:0;i:3;}}i:43;a:5:{s:1:\"a\";i:119;s:1:\"b\";s:11:\"slider-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Slider List\";s:1:\"r\";a:1:{i:0;i:3;}}i:44;a:5:{s:1:\"a\";i:120;s:1:\"b\";s:13:\"slider-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:13:\"Slider Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:45;a:5:{s:1:\"a\";i:121;s:1:\"b\";s:11:\"slider-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Slider Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:46;a:5:{s:1:\"a\";i:122;s:1:\"b\";s:9:\"rate-list\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Rate List\";s:1:\"r\";a:1:{i:0;i:3;}}i:47;a:5:{s:1:\"a\";i:123;s:1:\"b\";s:11:\"rate-create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Rate Create\";s:1:\"r\";a:1:{i:0;i:3;}}i:48;a:5:{s:1:\"a\";i:124;s:1:\"b\";s:9:\"rate-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:9:\"Rate Edit\";s:1:\"r\";a:1:{i:0;i:3;}}i:49;a:5:{s:1:\"a\";i:125;s:1:\"b\";s:11:\"rate-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Rate Delete\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1780991672);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `type` enum('gallery','review') NOT NULL DEFAULT 'gallery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `status`, `image`, `activity`, `type`, `created_at`, `updated_at`) VALUES
(1, 'সিলেট', 1, '2026051910560879.jpg', 1, 'gallery', '2026-05-18 22:44:45', '2026-05-18 22:56:08'),
(2, 'সিলেট', 1, '2026051910555820.webp', 1, 'gallery', '2026-05-18 22:45:22', '2026-05-18 22:55:58'),
(3, 'খাগড়াছড়ি', 1, '2026051910554621.jpg', 1, 'gallery', '2026-05-18 22:46:13', '2026-05-18 22:55:46'),
(4, 'খাগড়াছড়ি', 1, '2026051910553492.webp', 1, 'gallery', '2026-05-18 22:46:22', '2026-05-18 22:55:34'),
(5, 'কক্সবাজার', 1, '2026051910552565.jpg', 1, 'gallery', '2026-05-18 22:47:33', '2026-05-18 22:55:25'),
(6, 'কক্সবাজার', 1, '2026051910551529.jpg', 1, 'gallery', '2026-05-18 22:47:43', '2026-05-18 22:55:15'),
(7, 'মাইক্রোসিটি', 1, '2026051910550574.png', 1, 'gallery', '2026-05-18 22:48:52', '2026-05-18 22:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '0001_01_01_000000_create_users_table', 1),
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2026_04_23_064656_create_permission_tables', 1),
(10, '2026_04_23_070601_create_galleries_table', 1),
(11, '2026_04_23_080836_create_settings_table', 1),
(12, '2026_04_23_081923_create_visitors_table', 1),
(13, '2026_05_10_112822_create_abouts_table', 1),
(14, '2026_05_11_112629_create_promotions_table', 1),
(15, '2026_05_12_074732_create_sliders_table', 1),
(16, '2026_05_16_100355_create_contacts_table', 1),
(17, '2026_06_25_173447_create_services_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit articles', 'Edit Articles', 'web', '2026-04-22 13:50:51', '2026-04-22 13:50:51'),
(2, 'role-list', 'Role List', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(3, 'role-create', 'Role Create', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(4, 'role-edit', 'Role Edit', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(5, 'role-delete', 'Role Delete', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(6, 'assign-role-list', 'Assign Role List', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(7, 'assign-role-create', 'Assign Role Create', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(8, 'assign-role-edit', 'Assign Role Edit', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(9, 'assign-role-delete', 'Assign Role Delete', 'web', '2026-04-22 15:17:23', '2026-04-22 15:17:23'),
(10, 'gallery-list', 'Gallery List', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(11, 'gallery-create', 'Gallery Create', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(12, 'gallery-edit', 'Gallery Edit', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(13, 'gallery-delete', 'Gallery Delete', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(14, 'product-list', 'Product List', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(15, 'product-create', 'Product Create', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(16, 'product-edit', 'Product Edit', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(17, 'product-delete', 'Product Delete', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(18, 'category-list', 'Category List', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(19, 'category-create', 'Category Create', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(20, 'category-edit', 'Category Edit', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(21, 'category-delete', 'Category Delete', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(22, 'scheme-list', 'Scheme List', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(23, 'scheme-create', 'Scheme Create', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(24, 'scheme-edit', 'Scheme Edit', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(25, 'scheme-delete', 'Scheme Delete', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(26, 'settings-socialMedia', 'Settings SocialMedia', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(27, 'settings-admin', 'Settings Admin', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(28, 'settings-contact', 'Settings Contact', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(29, 'settings-sellers', 'Settings Sellers', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(30, 'settings-home.page.seo', 'Settings Home.page.seo', 'web', '2026-05-09 17:17:15', '2026-05-09 17:17:15'),
(31, 'about-list', 'About List', 'web', '2026-05-10 11:35:29', '2026-05-10 11:35:29'),
(32, 'about-create', 'About Create', 'web', '2026-05-10 11:35:29', '2026-05-10 11:35:29'),
(33, 'about-edit', 'About Edit', 'web', '2026-05-10 11:35:29', '2026-05-10 11:35:29'),
(34, 'about-delete', 'About Delete', 'web', '2026-05-10 11:35:29', '2026-05-10 11:35:29'),
(35, 'pages-list', 'Pages List', 'web', '2026-05-10 11:36:18', '2026-05-10 11:36:18'),
(36, 'pages-create', 'Pages Create', 'web', '2026-05-10 11:36:18', '2026-05-10 11:36:18'),
(37, 'pages-edit', 'Pages Edit', 'web', '2026-05-10 11:36:18', '2026-05-10 11:36:18'),
(38, 'pages-delete', 'Pages Delete', 'web', '2026-05-10 11:36:18', '2026-05-10 11:36:18'),
(39, 'promotions-list', 'Promotions List', 'web', '2026-05-11 16:41:54', '2026-05-11 16:41:54'),
(40, 'promotions-create', 'Promotions Create', 'web', '2026-05-11 16:41:55', '2026-05-11 16:41:55'),
(41, 'promotions-edit', 'Promotions Edit', 'web', '2026-05-11 16:41:55', '2026-05-11 16:41:55'),
(42, 'promotions-delete', 'Promotions Delete', 'web', '2026-05-11 16:41:55', '2026-05-11 16:41:55'),
(43, 'slider-delete', 'Slider Delete', 'web', '2026-05-11 20:13:23', '2026-05-11 20:13:23'),
(44, 'slider-list', 'Slider List', 'web', '2026-05-11 20:13:23', '2026-05-11 20:13:23'),
(45, 'slider-create', 'Slider Create', 'web', '2026-05-11 20:13:23', '2026-05-11 20:13:23'),
(46, 'slider-edit', 'Slider Edit', 'web', '2026-05-11 20:13:23', '2026-05-11 20:13:23'),
(47, 'rate-list', 'Rate List', 'web', '2026-05-11 20:40:32', '2026-05-11 20:40:32'),
(48, 'rate-create', 'Rate Create', 'web', '2026-05-11 20:40:32', '2026-05-11 20:40:32'),
(49, 'rate-edit', 'Rate Edit', 'web', '2026-05-11 20:40:32', '2026-05-11 20:40:32'),
(50, 'rate-delete', 'Rate Delete', 'web', '2026-05-11 20:40:32', '2026-05-11 20:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `type` enum('main','wide','small') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2026-04-22 19:48:00', '2026-04-22 19:48:00'),
(2, 'user', 'web', '2026-04-22 21:34:44', '2026-04-22 21:34:44'),
(3, 'admin', 'web', '2026-04-22 21:37:07', '2026-04-22 21:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5U1mIfQe9Bfm0RYacNTSLcv4FnAnuVgMc0Tohpg9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3I1OXdYMloxVlpMbkhoRTg5N2x5a1ZDZUR0b1RsbVFSWFU2M1FOZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvc2VydmljZS9jcmVhdGUiO3M6NToicm91dGUiO3M6MjQ6ImRhc2hib2FyZC5zZXJ2aWNlLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1782837103),
('o6SJb3Vql9FipdqZMEDHVkURw6rwqSN4ymtkZepM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRkRZQVZ3cHJNdGVUMlpyeDFXeGxxcE9oQURwSGNYOVdtU2ZLbWFSRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782404520);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) DEFAULT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `status`, `sort`, `activity`, `created_at`, `updated_at`) VALUES
(20, 'Techguru - Smart Solutions for a Connected world', 'From strategic IT consulting to seamless implementation, we deliver tailored solutions  that drive efficiency', '2026062517044810.jpg', 1, 1, 1, '2026-06-25 10:55:55', '2026-06-25 11:04:49'),
(21, 'Techguru - Empowering  Innovation Delivering  Solutions', 'From strategic IT consulting to seamless  implementation, we deliver tailored solutions   that drive efficiency', '2026062516593323.jpg', 1, 2, 1, '2026-06-25 10:59:34', '2026-06-25 10:59:34'),
(22, 'Tailored IT  Strategies to Drive Your Business  Forward', 'From strategic IT consulting to seamless implementation, we deliver tailored solutions   that drive efficiency', '2026062517011385.jpg', 1, 3, 1, '2026-06-25 11:01:15', '2026-06-25 11:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `address`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD RAFIUN ISLAM', 'admin@gmail.com', NULL, NULL, NULL, '2026042911425438.jpg', '$2y$12$5S5/NVUaXf71hPsaNlnILu21E5nbjlCYW6be7aflVxsHodaxL0Y2K', 'PeTrTWB6ARkBT3pdE1qgvIrOvn75gciK5IgPqwPz08KpSPy2zyMB6ll1oIES', '2026-04-22 20:00:39', '2026-04-28 23:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '2026-06-25 10:21:55', '2026-06-25 10:21:55'),
(2, '127.0.0.1', '2026-06-28 09:33:06', '2026-06-28 09:33:06'),
(3, '127.0.0.1', '2026-06-30 09:27:58', '2026-06-30 09:27:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
