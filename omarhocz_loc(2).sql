-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2022 at 11:11 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omarhocz_loc`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `IsSeen` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مقروء] [1 = غير مقروء]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `message`, `user_id`, `IsSeen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'teeeeeeest', 1, 1, NULL, '2022-05-27 22:23:59', '2022-05-27 22:23:59'),
(2, 'sadsdas', 1, 1, NULL, '2022-05-27 22:40:53', '2022-05-27 22:40:53'),
(3, 'sadsdas', 1, 1, NULL, '2022-05-28 02:53:01', '2022-05-28 02:53:01'),
(4, 'محمد ا', 1, 1, NULL, '2022-05-28 03:04:57', '2022-05-28 03:04:57'),
(5, 'السلام عليكم', 1, 1, NULL, '2022-05-29 00:12:24', '2022-05-29 00:12:24'),
(6, 'تبتتيتبت', 2, 1, NULL, '2022-05-29 02:33:34', '2022-05-29 02:33:34'),
(7, 'تبتتيتبت', 2, 1, NULL, '2022-05-29 02:33:34', '2022-05-29 02:33:34'),
(8, 'السلام عليكم عندي شكوي منكم حرام عليكم والسلام عليكم ورحمة الله', 4, 1, NULL, '2022-05-30 06:22:24', '2022-05-30 06:22:24'),
(9, 'اختبار ارسال رساله من البرنامج الي الجدول', 4, 1, NULL, '2022-06-06 09:51:15', '2022-06-06 09:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '[0 = ذكر] [1 = أنثى]',
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `mobile_verified_at`, `password`, `gender`, `device_token`, `ip_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brand', '01024346011', NULL, '$2y$10$uDA6flT5d6eYkGmsOuE.DuV.r3.fwfUJeONi.cTjE7NF8hOcS8r2e', NULL, NULL, NULL, 'gMjfuDBkpm0TRrGDlTldfZgJz4ERkFoAT3lUfHK30L2EqwoChVJXWd0Hrkdf', '2022-05-07 11:29:47', '2022-05-07 11:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stores_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lat` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0 COMMENT 'المشاهدات',
  `product_num` int(11) NOT NULL DEFAULT 10,
  `top` int(11) NOT NULL DEFAULT 0 COMMENT 'تميز الفرع',
  `opentime` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'وقت فتح',
  `closetime` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'وقت اغلاق',
  `start_date` datetime DEFAULT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` datetime DEFAULT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `accept` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مقبول] [1 =  انتظار] [2 = مرفوض ]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `stores_id`, `name`, `slug`, `address`, `description`, `image`, `phone`, `phone2`, `city_id`, `region_id`, `lat`, `lng`, `view`, `product_num`, `top`, `opentime`, `closetime`, `start_date`, `expiry_date`, `active`, `accept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'restaurawwddw', 'restaurawwddw', 'الإسكندرية,قسم ثان المنتزة', 'الوصف', 'qdOuNxBlTRibDUTtICzpjDx5mHtjV6FrimjzlQN7.png', '01144877118', 'sdfgsdfgsdfgffffff', 3, 98, '30.510571', '30.990594', 142, 10, 1, '7:12 AM', '3:12 PM', NULL, NULL, 0, 0, NULL, '2022-05-07 13:34:45', '2022-05-31 08:06:27'),
(2, 1, 'سوبر ماركت 2', 'sobr-markt-2', '85666666', 'test Descriotion', 'KPBBEncm2m5fEOFI8YMra83WgwgGtAsY9bfvHh6M.png', '01024346011', '01024346011', 3, 120, '30.990594', '30.510571', 138, 10, 1, '3:00 AM', '11:39', '2022-06-03 00:00:00', '2022-06-03 00:00:00', 0, 0, NULL, '2022-05-07 13:34:45', '2022-06-11 03:47:48'),
(3, 1, NULL, NULL, 'address', 'test', 'qdOuNxBlTRibDUTtICzpjDx5mHtjV6FrimjzlQN7.png', '01228665437', NULL, 3, 120, '31.117396', '30.466683', 63, 10, 0, '10:00', '23:00', NULL, NULL, 0, 0, NULL, '2022-05-13 20:42:38', '2022-05-25 22:28:14'),
(4, 2, 'سوبر ماركت 2', 'sobr-markt-2', 'محافظة القاهرة‬,قسم البساتين', 'نص تجريبي', 'qdOuNxBlTRibDUTtICzpjDx5mHtjV6FrimjzlQN7.png', '01024346010', '01539494946', 3, 120, '29.9762241', '31.256025', 29, 10, 0, '5:03 م', '6:04 م', NULL, NULL, 0, 0, NULL, '2022-05-14 17:05:35', '2022-06-11 20:20:29'),
(5, 2, NULL, NULL, 'محافظة القاهرة‬,قسم البساتين', 'eushgd', 'qdOuNxBlTRibDUTtICzpjDx5mHtjV6FrimjzlQN7.png', '01024346010', NULL, 3, 120, '29.9762191', '31.2560422', 18, 10, 0, '2:16 م', '12:16 م', NULL, NULL, 0, 0, NULL, '2022-05-14 17:17:49', '2022-05-18 23:21:41'),
(6, 3, 'حسام', 'hsam', 'الاسكندرية السيوف شارع الشهر العقاري البان عمر محل رقم 2 و اختبار العنوان الكبير', 'تفاصيل و وصف المتجر تفاصيل و وصف المتجر تفاصيل و وصف المتجرتفاصيل و وصف المتجرتفاصيل و وصف المتجر تفاصيل و وصف المتجر تفاصيل و وصف المتجرتفاصيل و وصف المتجرتفاصيل و وصف المتجر تفاصيل و وصف المتجر تفاصيل و وصف المتجرتفاصيل و وصف المتجر', 'qdOuNxBlTRibDUTtICzpjDx5mHtjV6FrimjzlQN7.png', '01144877118', NULL, 3, 98, '31.2435972', '29.9966887', 43, 10, 0, '8:05 ص', '2:06 ص', NULL, NULL, 0, 0, NULL, '2022-05-14 18:08:14', '2022-06-06 10:00:22'),
(7, 2, 'ىاaaaa', 'aaaaa', 'الدقهلية,مركز بنى عبيد', 'hhh', 'Bh6wHUVzZFAnXcKAD1rn9cKtLWjriZAP1EiFgy05.jpg', '01559606544', NULL, 3, 98, '31.0001706', '31.6234965', 55, 10, 0, '3:33 م', '4:33 م', NULL, NULL, 0, 0, NULL, '2022-05-28 15:34:05', '2022-05-30 00:27:52'),
(8, 3, NULL, NULL, '85888555555السيوف الاسكندرية شارع الشهر العقاري امام مكتب الشهر العقاري85888555555السيوف الاسكندرية شارع الشهر العقاري امام مكتب الشهر العقاري', 'الوصف85888555555السيوف الاسكندرية شارع الش85888555555السيوف الاسكندرية شارع الشهر العقاري امام مكتب الشهر العقاريهر العقاري امام مكتب الشهر العقاري', 'j2lhsQ8BeFJ26emjUROFqUQZqsyjJMEmFIHotg8s.png', '01144877118', '01144877118', 3, 98, '29.303418', '31.067367', 83, 5, 0, '3:51 AM', '6:51 AM', NULL, NULL, 0, 0, NULL, '2022-06-05 08:51:58', '2022-06-11 18:24:18'),
(31, 1, NULL, NULL, 'المنتدى الاسلامي', 'اللاتن', 'ZWj9fTaW74USry6IP0UFZwlzTLMoYHLHnVUnpUCT.jpg', '01568555568', NULL, 7, 186, '30.9990003', '31.6202085', 1, 10, 0, '3:05', '1:57', NULL, NULL, 0, 0, NULL, '2022-06-11 19:58:16', '2022-06-11 19:59:43'),
(32, 1, NULL, NULL, 'المنتدى الاسلامي', 'واحد جديد خالص', 'ac1JeqdE1CeFVoaR9M3JeZpNzYcqQVjYbtgif3qo.jpg', '01568555568', NULL, 7, 186, '30.9990003', '31.6202085', 2, 10, 0, '3:05', '1:57', NULL, NULL, 0, 0, NULL, '2022-06-11 19:59:00', '2022-06-11 19:59:46'),
(33, 1, NULL, NULL, 'address', 'test', NULL, '01228665437', NULL, 3, 98, '43.4', '54.3', 0, 10, 0, '10:00', '23:00', NULL, NULL, 0, 0, NULL, '2022-06-11 20:04:33', '2022-06-11 20:05:33'),
(34, 1, NULL, NULL, 'address', 'test', 'lfUTtqlBLPl6JJjijHjYpqkXf1ik6qRJ1rgga2w6.png', '01228665437', NULL, 3, 98, '43.4', '54.3', 1, 10, 0, '10:00', '23:00', NULL, NULL, 0, 0, NULL, '2022-06-11 20:04:57', '2022-06-11 20:05:37'),
(35, 2, NULL, NULL, 'تتبتبتب', 'زبننبتبب', 'nAGT95Q0LYxQ7VBJVfweHB3tcLzT0kevSxDPYgy8.jpg', '01022226679', NULL, 14, 250, '31.2109492', '29.9670371', 0, 10, 0, '2:15', '10:15', NULL, NULL, 0, 0, NULL, '2022-06-11 20:15:56', '2022-06-11 20:58:37'),
(36, 1, NULL, NULL, 'address', 'test', '4V8RFAcMRSe8zeCf4HrzaGsygnJVoMnwlvWrPGcY.png', '01228665437', '01228665437', 3, 98, '43.4', '54.3', 0, 10, 0, '10:00', '23:00', NULL, NULL, 0, 0, NULL, '2022-06-11 20:51:57', '2022-06-11 20:58:44'),
(37, 1, NULL, NULL, 'جديلة', 'للىىات', 'E17yIvCS6Rujmru9LSJXX2zNzdEcIvueGDHcHYOw.jpg', '01558555555', '01558555525', 6, 172, '30.9990012', '31.6202077', 0, 10, 0, '4:05', '3:55', NULL, NULL, 0, 0, NULL, '2022-06-11 20:52:07', '2022-06-11 20:58:40'),
(38, 1, NULL, NULL, 'بياتننن', 'الللاالللالللللل', 'B44kzTlYSQ5rV1DeOYaV8tDwTLd65yEVC3m6MuGi.jpg', '01055558588', '01055555555', 1, 8, '30.9989977', '31.6202086', 0, 10, 0, '5:25', '2:35', NULL, NULL, 1, 1, NULL, '2022-06-11 21:11:13', '2022-06-11 21:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'قسم عام', 'ksm-aaam', 'OOuPJAAKIz5H9mQjkvoJF092nEPBvxEQmTzKDaMi.png', 0, NULL, '2022-05-14 21:17:29', '2022-06-08 23:24:06'),
(2, NULL, 'عيادات', 'aay', 'vVlhTauVNdIPDrdi00DCARQvmGMKHAKJM2kdHQC0.png', 0, NULL, '2022-05-14 23:41:39', '2022-05-19 00:56:36'),
(3, 2, 'باطنة', 'batn', 'yLJiuoN5YavzddreAFtGzQN4vYShtd3CMsNWhMCu.png', 0, NULL, '2022-05-16 05:26:18', '2022-06-08 23:21:34'),
(4, NULL, 'dsdsd', NULL, NULL, 1, NULL, NULL, NULL),
(25, NULL, 'قسم  رائسيي1', 'ksm-raysyy1', 'I7Qt2N2XXvMaFA9z12d1lItH2kyEKNW3Z7Qsh5FR.png', 1, NULL, '2022-06-08 23:01:01', '2022-06-08 23:01:01'),
(26, NULL, 'قسم  رائسيي2', 'ksm-raysyy2', 'N3WgOWoshAS9Fd0oDNwdSXr3bBLmB2DUsyqvLteK.png', 1, NULL, '2022-06-08 23:01:14', '2022-06-08 23:01:31'),
(27, NULL, 'قسم  رائسيي3', 'ksm-raysyy3', 'EhZSxPHSHVztlOBLvMtqTlyYZdKl6aSl0fa214QU.png', 1, NULL, '2022-06-08 23:02:12', '2022-06-08 23:02:12'),
(28, NULL, 'قسم  رائسيي4', 'ksm-raysyy4', 'ijIKYwRoYxPph1n9yJaH8FAUPnmizpxMdoofZckd.png', 1, NULL, '2022-06-08 23:02:26', '2022-06-08 23:02:38'),
(29, NULL, 'قسم  رائسيي5', 'ksm-raysyy5', 'QRpHzPQPAQUoIvFdXQ6UhoxykrIPGhMo9Of509jA.png', 1, NULL, '2022-06-08 23:02:53', '2022-06-08 23:02:53'),
(30, NULL, 'قسم  رائسيي6', 'ksm-raysyy6', 'GI33XGyTQXchhehMEN1bPVQaegUZ6fQHWsJPzrVW.png', 1, NULL, '2022-06-08 23:03:16', '2022-06-08 23:03:16'),
(31, NULL, 'قسم  رائسيي7', 'ksm-raysyy7', 'BDlenloOWLZNHMoe3klkyuT0qjFR4T53umt8Vrsh.png', 1, NULL, '2022-06-08 23:03:36', '2022-06-08 23:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name_ar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name_en` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name_ar`, `city_name_en`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 'Cairo', 'cairo', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(2, 'الجيزة', 'Giza', 'giza', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(3, 'الاسكندرية', 'Alexandria', 'alexandria', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(4, 'الدقهلية', 'Dakahlia', 'dakahlia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(5, 'البحر الأحمر', 'Red Sea', 'red-sea', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(6, 'البحيرة', 'Beheira', 'beheira', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(7, 'الفيوم', 'Fayoum', 'fayoum', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(8, 'الغربية', 'Gharbiya', 'gharbiya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(9, 'الاسماعلية', 'Ismailia', 'ismailia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(10, 'المنوفية', 'Menofia', 'menofia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(11, 'المنيا', 'Minya', 'minya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(12, 'القليوبية', 'Qaliubiya', 'qaliubiya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(13, 'الوادي الجديد', 'New Valley', 'new-valley', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(14, 'السويس', 'Suez', 'suez', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(15, 'اسوان', 'Aswan', 'aswan', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(16, 'اسيوط', 'Assiut', 'assiut', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(17, 'بني سويف', 'Beni Suef', 'beni-suef', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(18, 'بورسعيد', 'Port Said', 'port-said', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(19, 'دمياط', 'Damietta', 'damietta', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(20, 'الشرقية', 'Sharkia', 'sharkia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(21, 'جنوب سيناء', 'South Sinai', 'south-sinai', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(22, 'كفر الشيخ', 'Kafr Al sheikh', 'kafr-al-sheikh', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(23, 'مطروح', 'Matrouh', 'matrouh', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(24, 'الأقصر', 'Luxor', 'luxor', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(25, 'قنا', 'Qena', 'qena', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(26, 'شمال سيناء', 'North Sinai', 'north-sinai', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(27, 'سوهاج', 'Sohag', 'sohag', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `branch_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'جيدا', '2.00', '2022-05-07 13:34:45', '2022-05-07 13:34:45'),
(2, 1, 2, 'جيدا جدا', '1.20', '2022-05-07 13:34:45', '2022-05-07 13:34:45'),
(3, 2, 2, 'مقبول', '2.70', '2022-05-07 13:34:45', '2022-05-07 13:34:45'),
(4, 2, 23, 'كويس', '3.00', '2022-05-07 13:34:45', '2022-05-07 13:34:45'),
(5, 1, 30, 'جيد جدا', '1.00', '2022-06-07 00:19:35', '2022-06-07 00:19:35'),
(6, 1, 30, 'ممتاز', '1.00', '2022-06-07 00:20:00', '2022-06-07 00:20:00'),
(7, 1, 13, 'متاىرررؤءءءؤلتا', '3.00', '2022-06-08 01:06:23', '2022-06-08 01:06:23'),
(8, 1, 1, 'جيد اوى', '4.00', '2022-06-08 01:08:38', '2022-06-08 01:08:38'),
(9, 1, 1, 'ةوةىر', '4.00', '2022-06-08 01:09:41', '2022-06-08 01:09:41'),
(10, 1, 13, 'نلبؤ', '3.00', '2022-06-08 01:14:21', '2022-06-08 01:14:21'),
(11, 1, 13, 'محموةة', '3.00', '2022-06-08 01:15:27', '2022-06-08 01:15:27'),
(12, 1, 13, 'اا', '3.00', '2022-06-08 01:19:08', '2022-06-08 01:19:08'),
(13, 1, 30, 'ساايا', '3.00', '2022-06-08 01:20:30', '2022-06-08 01:20:30'),
(14, 1, 30, 'ىىا', '3.00', '2022-06-08 01:22:35', '2022-06-08 01:22:35'),
(15, 1, 29, 'ابي', '3.00', '2022-06-08 01:24:24', '2022-06-08 01:24:24'),
(16, 1, 29, 'مخمد', '3.00', '2022-06-08 01:26:18', '2022-06-08 01:26:18'),
(17, 1, 29, 'كخنييو', '3.00', '2022-06-08 01:26:27', '2022-06-08 01:26:27'),
(18, 1, 29, 'كمامةظة ىزىتر', '2.00', '2022-06-08 01:26:41', '2022-06-08 01:26:41'),
(19, 1, 29, 'ةوون', '2.00', '2022-06-08 01:27:06', '2022-06-08 01:27:06'),
(20, 1, 29, 'ماررؤ', '3.00', '2022-06-08 01:27:20', '2022-06-08 01:27:20'),
(21, 1, 29, 'محمظةبب', '3.00', '2022-06-08 01:27:52', '2022-06-08 01:27:52'),
(22, 1, 29, 'تييتيت', '3.00', '2022-06-08 01:28:32', '2022-06-08 01:28:32'),
(23, 1, 30, 'ىةذاة', '3.00', '2022-06-08 01:34:58', '2022-06-08 01:34:58'),
(24, 1, 30, 'ىةيوؤ', '3.00', '2022-06-08 01:44:11', '2022-06-08 01:44:11'),
(25, 1, 1, 'ناربل', '3.00', '2022-06-08 01:44:53', '2022-06-08 01:44:53'),
(26, 4, 22, 'تعليق من حسام', '5.00', '2022-06-08 02:10:04', '2022-06-08 02:10:04'),
(27, 4, 22, 'تعليق ثاني', '1.00', '2022-06-08 02:10:21', '2022-06-08 02:10:21'),
(28, 4, 21, 'اختبار كتابة تعليق كبير عشان مكتبة اظهار المزيد في التعليقات و النجوم نص اضافي ممتاز', '1.00', '2022-06-08 02:14:33', '2022-06-08 02:14:33'),
(29, 4, 30, NULL, '3.00', '2022-06-08 02:15:24', '2022-06-08 02:15:24'),
(30, 4, 28, NULL, '3.00', '2022-06-08 02:15:56', '2022-06-08 02:15:56'),
(31, 4, 23, 'تلذاذتدتزتزتزتدتزتدتدتدتزن.  تزهزهزهزرخرخاخاخاخرخ. خرهزهزهزهرخ. ن خرهرخرخرخرهززهزهل', '3.00', '2022-06-08 02:24:52', '2022-06-08 02:24:52'),
(32, 4, 21, 'تتاااااههخخبنقصتسوي. يووستيري يتخيخهعايتسرس يتتيتذاايايتذااذونذنسني يتهيهيتيهيخيهيتيرر.  يهيههتيتيتتيخحسحخبن تخقنيتنينبت', '5.00', '2022-06-08 03:14:41', '2022-06-08 03:14:41'),
(33, 2, 1, 'ااا', '5.00', '2022-06-08 03:31:43', '2022-06-08 03:31:43'),
(34, 2, 1, NULL, '1.00', '2022-06-08 03:31:53', '2022-06-08 03:31:53'),
(35, 2, 15, 'وت', '5.00', '2022-06-08 03:32:52', '2022-06-08 03:32:52'),
(36, 4, 1, NULL, '4.00', '2022-06-08 06:49:44', '2022-06-08 06:49:44'),
(37, 4, 22, NULL, '4.50', '2022-06-08 09:40:16', '2022-06-08 09:40:16'),
(38, 4, 16, 'نننمم وتر. االد. لببز ربقب.  ع55خحجخعفصسلو. نجمالسسسهم م مستخدم.   نفسك.  مصلحة. مين', '1.00', '2022-06-08 17:37:26', '2022-06-08 17:37:26'),
(39, 1, 1, 'تيتيتياؤؤاؤااؤىءىءلءىءءللءءىىءةءةءوؤو،و،و، ءوءوةءاءلءلسءل', '3.00', '2022-06-09 00:27:03', '2022-06-09 00:27:03'),
(40, 4, 13, NULL, '1.00', '2022-06-09 01:16:17', '2022-06-09 01:16:17'),
(41, 4, 5, NULL, '3.00', '2022-06-09 01:28:16', '2022-06-09 01:28:16'),
(42, 2, 16, 'وورتتر', '3.00', '2022-06-09 08:17:37', '2022-06-09 08:17:37'),
(43, 2, 16, 'ععت', '5.00', '2022-06-09 08:18:04', '2022-06-09 08:18:04'),
(44, 4, 23, 'اختبار التعليق و كتابه 10 كلمات و ايموشن في التعليق لاظهار مكتبة المزيد😁😁', '5.00', '2022-06-09 09:10:54', '2022-06-09 09:10:54'),
(45, 4, 23, 'التعليق بان بس الايموشن مش باين و كلمت اظهار المزيد بعد ما انك عليها مش بتظهر كلمت اخفاء النص زي التاني يا ترا ايه الموضوع 🤔🤔🤔', '5.00', '2022-06-09 09:12:23', '2022-06-09 09:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `font_name`, `font_url`, `font_family`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', '<link href=\"https://fonts.googleapis.com/css2?family=Cairo&display=swap\" rel=\"stylesheet\"> ', '    font-family: \'Cairo\', sans-serif;', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language`, `created_at`, `updated_at`) VALUES
(1, NULL, 'en', '2022-05-26 03:51:04', '2022-05-26 03:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_21_024803_create_permission_tables', 1),
(5, '2022_04_21_025124_create_stores_table', 1),
(6, '2022_04_21_025149_create_branchs_table', 1),
(7, '2022_04_21_025205_create_products_table', 1),
(8, '2022_04_21_025254_create_categories_table', 1),
(9, '2022_04_22_003949_create_cities_table', 1),
(10, '2022_04_22_004145_create_regions_table', 1),
(11, '2022_04_22_005822_create_product_images_table', 1),
(12, '2022_04_22_033545_create_admins_table', 1),
(13, '2022_04_25_022413_create_comments_table', 1),
(14, '2022_04_27_043015_create_settings_table', 1),
(16, '2022_05_09_133238_create_fonts_table', 2),
(17, '2018_08_29_200844_create_languages_table', 3),
(18, '2018_08_29_205156_create_translations_table', 3),
(19, '2022_05_25_115213_create_abouts_table', 3),
(21, '2022_05_03_233400_create_sliders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'menu unit', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(2, 'view unit', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(3, 'new unit', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(4, 'edit unit', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(5, 'delete unit', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` datetime DEFAULT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `view` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `branch_id`, `name`, `slug`, `price`, `description`, `start_date`, `expiry_date`, `active`, `view`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'تفاح', NULL, '15', 'description1', '2022-05-07 00:00:00', NULL, 0, 19, NULL, '2022-05-07 13:34:45', '2022-05-07 13:34:45'),
(2, 2, 'مانجا', 'manga', '612', NULL, '2022-05-07 00:00:00', NULL, 0, 3, NULL, '2022-05-07 13:34:45', '2022-06-09 09:03:24'),
(3, 1, 'Product', 'product', '3.00', 'description2', NULL, NULL, 1, 22, NULL, '2022-05-07 11:48:39', '2022-05-07 11:48:39'),
(4, 2, 'test', 'test', '3.00', NULL, '2022-02-02 00:00:00', NULL, 1, 2, NULL, '2022-05-07 11:48:58', '2022-06-09 21:13:46'),
(5, 1, 'مخمد', 'mkhmd', '045', '3214123description', NULL, NULL, 1, 12, NULL, '2022-05-18 01:32:32', '2022-05-18 01:32:32'),
(6, 7, 'Product', 'product', '3.00', 'oihoihoi', NULL, NULL, 1, 3, NULL, '2022-05-18 01:34:09', '2022-05-18 01:34:09'),
(7, 7, 'moham', 'moham', '8078', '', NULL, NULL, 1, 3, NULL, '2022-05-18 23:49:51', '2022-05-18 23:49:51'),
(8, 8, 'mo', 'mo', '85', NULL, NULL, NULL, 1, 1, NULL, '2022-05-25 00:37:28', '2022-06-04 19:16:22'),
(9, 8, 'اعلان جديد في المتجر', 'aaalan-gdyd-fy-almtgr', '255', '', NULL, NULL, 1, 1, NULL, '2022-05-26 18:11:12', '2022-05-26 18:11:12'),
(11, 5, 'اعلان عام في متجر', 'aaalan-aaam-fy-mtgr', '258', 'asdasdasd', NULL, NULL, 1, 1, NULL, '2022-05-31 00:18:35', '2022-05-31 00:18:35'),
(12, 6, 'اعلان بدون صورة', 'aaalan-bdon-sor', '255', NULL, NULL, NULL, 1, 4, NULL, '2022-05-31 18:25:51', '2022-05-31 18:25:51'),
(13, 5, 'استيت', 'astyt', '8455', NULL, NULL, NULL, 1, 1, NULL, '2022-06-01 22:31:13', '2022-06-01 22:31:13'),
(14, 4, 'اسمراعلان', 'asmraaalan', '25', NULL, NULL, NULL, 1, 2, NULL, '2022-06-05 04:31:51', '2022-06-05 04:31:51'),
(16, 4, 'Product', 'product', '3.00', 'سسسس', NULL, NULL, 1, 2, NULL, '2022-06-06 08:52:00', '2022-06-06 08:52:00'),
(17, 4, 'uui', 'uui', '96', NULL, NULL, NULL, 1, 3, NULL, '2022-06-06 08:53:08', '2022-06-06 08:53:08'),
(18, 3, 'لاتاللببباياا', 'latallbbbayaa', '85.460', NULL, NULL, NULL, 1, 2, NULL, '2022-06-07 01:44:11', '2022-06-07 01:44:11'),
(20, 6, 'Product', 'product', '3.00', 'سسسس', NULL, NULL, 1, 0, NULL, '2022-06-10 23:53:33', '2022-06-10 23:53:33'),
(21, 3, 'اييال', 'ayyal', '84548', 'ىءىؤايايى', NULL, NULL, 1, 0, NULL, '2022-06-11 00:15:01', '2022-06-11 00:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` bigint(20) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `img`, `is_default`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, '9upPQzUdMPDjyhS87ZCTOHxrX7jtKj7Bp9zag349.png', 1, 1, NULL, '2022-05-07 11:48:39', '2022-06-11 03:18:08'),
(2, 4, 'c3RIW74j8RctXCwaGRxLMeh63UxmcAkzOgkhswdi.jpg', 1, 1, NULL, '2022-05-07 11:48:58', '2022-06-10 03:31:53'),
(3, 5, 'gxTTxYcMbvuW4dEaNwi9vkpjxmgiIoy4l2hJzRFs.png', 1, 1, NULL, '2022-05-18 01:32:32', '2022-05-18 01:32:32'),
(4, 7, 'b5n4PGs3RcTDVTwqOnRIXJunon147w1irbwcMQKF.png', 1, 1, NULL, '2022-05-18 23:49:51', '2022-05-18 23:49:51'),
(5, 8, 'WaG5AxgCfFITl2rSM5jzO18SlPQbSytA8qbmbBwK.jpg', 1, 1, NULL, '2022-05-25 00:37:28', '2022-05-25 00:37:28'),
(6, 9, 'GrcswieF8hCYczi5srwbhEhYickiBxDeFIgt85b2.png', 0, 3, NULL, '2022-05-26 18:11:12', '2022-05-26 18:11:12'),
(7, 9, 'OQRS58vwRBWi54AeVtPxQAOrag9n0hyUNRRzD9A1.png', 0, 2, NULL, '2022-05-26 18:11:12', '2022-05-26 18:11:12'),
(8, 9, 'rJIL5079t4ffE9UWKuAGwXSH3l0xqEMZ5sEJWY1L.jpg', 1, 1, NULL, '2022-05-26 18:11:12', '2022-05-26 18:11:12'),
(9, 10, 'xLGryHts8E88fmifH6WS1WV4ASurm5nmbN4s9Zke.png', 0, 3, NULL, '2022-05-30 01:06:22', '2022-05-30 01:06:22'),
(10, 10, 'vn7f69DqE33akADO1iqFsUjJIRwRcA38n1M4YQ1D.png', 0, 2, NULL, '2022-05-30 23:06:21', '2022-05-30 23:06:21'),
(11, 10, 'z1Y5KdQ3isishRRom1LG1SRp0sXLgMJMNqCHpGfF.jpg', 1, 1, NULL, '2022-05-30 23:07:37', '2022-05-30 23:07:37'),
(12, 11, 'eZAMXzlb7PnAoKQa0nFsmsgOzNJcOa3JWeArFXs5.png', 0, 3, NULL, '2022-05-31 00:18:35', '2022-05-31 00:18:35'),
(13, 11, '1QGdnWOkVbhMKcbV7SKhxC1xRzwECD0rOeOwBdm3.png', 0, 2, NULL, '2022-05-31 00:18:35', '2022-05-31 00:18:35'),
(14, 11, 'eWVvYEDkJcHaq4h5LKXrHYYPYNc22gIxAt9duH7Q.png', 1, 1, NULL, '2022-05-31 00:18:35', '2022-05-31 00:18:35'),
(15, 12, 'EH1BcwoBhWeMnnt8szbxIQoq1pPU0S88Dg98GQv6.png', 1, 1, NULL, '2022-05-31 18:25:51', '2022-05-31 18:25:51'),
(16, 13, 'E5swXBJgggPlbTU8oDNhwrg8aomAiNnlipBUbyuZ.jpg', 1, 1, NULL, '2022-06-01 22:31:13', '2022-06-01 22:31:13'),
(17, 14, 'RvhQQ2Cfz3pT2UCG9wqSJc9hD3KKn5FyfXJjQyCV.jpg', 1, 1, NULL, '2022-06-05 04:31:51', '2022-06-05 04:31:51'),
(18, 14, 'FDKzMOm5VG8AXDsPnSemramcsjkfWHy91QkHSZ7S.jpg', 0, 2, NULL, '2022-06-05 04:31:51', '2022-06-05 04:31:51'),
(19, 14, '6bJFjeGfQUJ5eVPDECw0a5zvTsVYGkiMx7CO5cXP.jpg', 0, 3, NULL, '2022-06-05 04:31:51', '2022-06-05 04:31:51'),
(20, 15, '8Ze20YqWMJpP10Gyt2NTSjI97sXSagmWA8QFLLjJ.jpg', 1, 1, NULL, '2022-06-05 08:55:44', '2022-06-05 08:55:44'),
(21, 15, 'zziwqNcbjNSfhPFVOWl1wtZcUnCOJcNw0VOxsJ89.jpg', 0, 2, NULL, '2022-06-05 08:55:44', '2022-06-05 08:55:44'),
(22, 17, 'tS8Yd2uopgiWvXhtWAxZhkXYODgjVRwEIhLU4TIk.jpg', 1, 1, NULL, '2022-06-06 08:53:08', '2022-06-06 08:53:08'),
(23, 18, 'zzmMemEv22qc9DvltFYqk3gmaPZvoQTKJ253ZBof.jpg', 1, 1, NULL, '2022-06-07 01:44:11', '2022-06-07 01:44:11'),
(24, 19, 'psg1C81XBF6ZSeEacw9Ue127DGL8DrfUm1LX4aVJ.jpg', 1, 1, NULL, '2022-06-09 01:14:18', '2022-06-09 01:14:18'),
(25, 19, '6fePYh3GqNOihHxfHWzHrFwhtBdEOskopvr0RFR8.jpg', 0, 2, '2022-06-11 18:21:31', '2022-06-09 01:14:18', '2022-06-11 18:21:31'),
(26, 19, 'CKLZcrWHe0s56hbyTUdWovmDM6DeJPDJa9PTGjQZ.png', 0, 3, '2022-06-11 08:23:01', '2022-06-10 03:25:37', '2022-06-11 08:23:01'),
(27, 4, '25cc28ffzlFZByUG4RjRXV9HriJSfjuGnOPeNtAE.jpg', 0, 2, NULL, '2022-06-10 03:32:21', '2022-06-10 03:32:24'),
(28, 4, 'yyp8OUuFl7jCUfUjgMNkN3a53GpD38UsZoRhzEdJ.jpg', 0, 3, NULL, '2022-06-10 03:32:21', '2022-06-10 03:32:24'),
(29, 21, 'egLvvvPYN7gwA1S5eR6iAP7BvOudUGC9tzH7wHMJ.jpg', 1, 1, NULL, '2022-06-11 00:15:01', '2022-06-11 00:15:01'),
(30, 3, '8GAkghmTsylUeTFmrjqtyhse6KHYZeWwCrJfZCcQ.png', 0, 2, NULL, '2022-06-11 03:15:54', '2022-06-11 03:15:54'),
(31, 3, '5RcmFI40k1KoJ8Mgfp9nR6SpAyDBbSKiVsqOV3Ka.png', 0, 3, NULL, '2022-06-11 03:16:02', '2022-06-11 03:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `region_name_ar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_name_en` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `city_id`, `region_name_ar`, `region_name_en`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '15 مايو', '15 May', '15-may', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(2, 1, 'الازبكية', 'Al Azbakeyah', 'al-azbakeyah', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(3, 1, 'البساتين', 'Al Basatin', 'al-basatin', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(4, 1, 'التبين', 'Tebin', 'tebin', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(5, 1, 'الخليفة', 'El-Khalifa', 'el-khalifa', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(6, 1, 'الدراسة', 'El darrasa', 'el-darrasa', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(7, 1, 'الدرب الاحمر', 'Aldarb Alahmar', 'aldarb-alahmar', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(8, 1, 'الزاوية الحمراء', 'Zawya al-Hamra', 'zawya-al-hamra', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(9, 1, 'الزيتون', 'El-Zaytoun', 'el-zaytoun', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(10, 1, 'الساحل', 'Sahel', 'sahel', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(11, 1, 'السلام', 'El Salam', 'el-salam', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(12, 1, 'السيدة زينب', 'Sayeda Zeinab', 'sayeda-zeinab', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(13, 1, 'الشرابية', 'El Sharabeya', 'el-sharabeya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(14, 1, 'مدينة الشروق', 'Shorouk', 'shorouk', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(15, 1, 'الظاهر', 'El Daher', 'el-daher', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(16, 1, 'العتبة', 'Ataba', 'ataba', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(17, 1, 'القاهرة الجديدة', 'New Cairo', 'new-cairo', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(18, 1, 'المرج', 'El Marg', 'el-marg', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(19, 1, 'عزبة النخل', 'Ezbet el Nakhl', 'ezbet-el-nakhl', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(20, 1, 'المطرية', 'Matareya', 'matareya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(21, 1, 'المعادى', 'Maadi', 'maadi', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(22, 1, 'المعصرة', 'Maasara', 'maasara', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(23, 1, 'المقطم', 'Mokattam', 'mokattam', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(24, 1, 'المنيل', 'Manyal', 'manyal', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(25, 1, 'الموسكى', 'Mosky', 'mosky', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(26, 1, 'النزهة', 'Nozha', 'nozha', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(27, 1, 'الوايلى', 'Waily', 'waily', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(28, 1, 'باب الشعرية', 'Bab al-Shereia', 'bab-al-shereia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(29, 1, 'بولاق', 'Bolaq', 'bolaq', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(30, 1, 'جاردن سيتى', 'Garden City', 'garden-city', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(31, 1, 'حدائق القبة', 'Hadayek El-Kobba', 'hadayek-el-kobba', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(32, 1, 'حلوان', 'Helwan', 'helwan', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(33, 1, 'دار السلام', 'Dar Al Salam', 'dar-al-salam', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(34, 1, 'شبرا', 'Shubra', 'shubra', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(35, 1, 'طره', 'Tura', 'tura', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(36, 1, 'عابدين', 'Abdeen', 'abdeen', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(37, 1, 'عباسية', 'Abaseya', 'abaseya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(38, 1, 'عين شمس', 'Ain Shams', 'ain-shams', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(39, 1, 'مدينة نصر', 'Nasr City', 'nasr-city', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(40, 1, 'مصر الجديدة', 'New Heliopolis', 'new-heliopolis', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(41, 1, 'مصر القديمة', 'Masr Al Qadima', 'masr-al-qadima', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(42, 1, 'منشية ناصر', 'Mansheya Nasir', 'mansheya-nasir', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(43, 1, 'مدينة بدر', 'Badr City', 'badr-city', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(44, 1, 'مدينة العبور', 'Obour City', 'obour-city', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(45, 1, 'وسط البلد', 'Cairo Downtown', 'cairo-downtown', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(46, 1, 'الزمالك', 'Zamalek', 'zamalek', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(47, 1, 'قصر النيل', 'Kasr El Nile', 'kasr-el-nile', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(48, 1, 'الرحاب', 'Rehab', 'rehab', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(49, 1, 'القطامية', 'Katameya', 'katameya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(50, 1, 'مدينتي', 'Madinty', 'madinty', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(51, 1, 'روض الفرج', 'Rod Alfarag', 'rod-alfarag', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(52, 1, 'شيراتون', 'Sheraton', 'sheraton', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(53, 1, 'الجمالية', 'El-Gamaleya', 'el-gamaleya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(54, 1, 'العاشر من رمضان', '10th of Ramadan City', '10th-of-ramadan-city', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(55, 1, 'الحلمية', 'Helmeyat Alzaytoun', 'helmeyat-alzaytoun', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(56, 1, 'النزهة الجديدة', 'New Nozha', 'new-nozha', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(57, 1, 'العاصمة الإدارية', 'Capital New', 'capital-new', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(58, 2, 'الجيزة', 'Giza', 'giza', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(59, 2, 'السادس من أكتوبر', 'Sixth of October', 'sixth-of-october', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(60, 2, 'الشيخ زايد', 'Cheikh Zayed', 'cheikh-zayed', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(61, 2, 'الحوامدية', 'Hawamdiyah', 'hawamdiyah', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(62, 2, 'البدرشين', 'Al Badrasheen', 'al-badrasheen', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(63, 2, 'الصف', 'Saf', 'saf', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(64, 2, 'أطفيح', 'Atfih', 'atfih', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(65, 2, 'العياط', 'Al Ayat', 'al-ayat', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(66, 2, 'الباويطي', 'Al-Bawaiti', 'al-bawaiti', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(67, 2, 'منشأة القناطر', 'ManshiyetAl Qanater', 'manshiyetal-qanater', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(68, 2, 'أوسيم', 'Oaseem', 'oaseem', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(69, 2, 'كرداسة', 'Kerdasa', 'kerdasa', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(70, 2, 'أبو النمرس', 'Abu Nomros', 'abu-nomros', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(71, 2, 'كفر غطاطي', 'Kafr Ghati', 'kafr-ghati', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(72, 2, 'منشأة البكاري', 'Manshiyet Al Bakari', 'manshiyet-al-bakari', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(73, 2, 'الدقى', 'Dokki', 'dokki', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(74, 2, 'العجوزة', 'Agouza', 'agouza', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(75, 2, 'الهرم', 'Haram', 'haram', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(76, 2, 'الوراق', 'Warraq', 'warraq', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(77, 2, 'امبابة', 'Imbaba', 'imbaba', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(78, 2, 'بولاق الدكرور', 'Boulaq Dakrour', 'boulaq-dakrour', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(79, 2, 'الواحات البحرية', 'Al Wahat Al Baharia', 'al-wahat-al-baharia', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(80, 2, 'العمرانية', 'Omraneya', 'omraneya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(81, 2, 'المنيب', 'Moneeb', 'moneeb', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(82, 2, 'بين السرايات', 'Bin Alsarayat', 'bin-alsarayat', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(83, 2, 'الكيت كات', 'Kit Kat', 'kit-kat', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(84, 2, 'المهندسين', 'Mohandessin', 'mohandessin', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(85, 2, 'فيصل', 'Faisal', 'faisal', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(86, 2, 'أبو رواش', 'Abu Rawash', 'abu-rawash', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(87, 2, 'حدائق الأهرام', 'Hadayek Alahram', 'hadayek-alahram', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(88, 2, 'الحرانية', 'Haraneya', 'haraneya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(89, 2, 'حدائق اكتوبر', 'Hadayek October', 'hadayek-october', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(90, 2, 'صفط اللبن', 'Saft Allaban', 'saft-allaban', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(91, 2, 'القرية الذكية', 'Smart Village', 'smart-village', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(92, 2, 'ارض اللواء', 'Ard Ellwaa', 'ard-ellwaa', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(93, 3, 'ابو قير', 'Abu Qir', 'abu-qir', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(94, 3, 'الابراهيمية', 'Al Ibrahimeyah', 'al-ibrahimeyah', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(95, 3, 'الأزاريطة', 'Azarita', 'azarita', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(96, 3, 'الانفوشى', 'Anfoushi', 'anfoushi', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(97, 3, 'الدخيلة', 'Dekheila', 'dekheila', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(98, 3, 'السيوف', 'El Soyof', 'el-soyof', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(99, 3, 'العامرية', 'Ameria', 'ameria', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(100, 3, 'اللبان', 'El Labban', 'el-labban', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(101, 3, 'المفروزة', 'Al Mafrouza', 'al-mafrouza', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(102, 3, 'المنتزه', 'El Montaza', 'el-montaza', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(103, 3, 'المنشية', 'Mansheya', 'mansheya', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(104, 3, 'الناصرية', 'Naseria', 'naseria', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(105, 3, 'امبروزو', 'Ambrozo', 'ambrozo', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(106, 3, 'باب شرق', 'Bab Sharq', 'bab-sharq', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(107, 3, 'برج العرب', 'Bourj Alarab', 'bourj-alarab', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(108, 3, 'ستانلى', 'Stanley', 'stanley', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(109, 3, 'سموحة', 'Smouha', 'smouha', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(110, 3, 'سيدى بشر', 'Sidi Bishr', 'sidi-bishr', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(111, 3, 'شدس', 'Shads', 'shads', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(112, 3, 'غيط العنب', 'Gheet Alenab', 'gheet-alenab', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(113, 3, 'فلمينج', 'Fleming', 'fleming', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(114, 3, 'فيكتوريا', 'Victoria', 'victoria', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(115, 3, 'كامب شيزار', 'Camp Shizar', 'camp-shizar', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(116, 3, 'كرموز', 'Karmooz', 'karmooz', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(117, 3, 'محطة الرمل', 'Mahta Alraml', 'mahta-alraml', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(118, 3, 'مينا البصل', 'Mina El-Basal', 'mina-el-basal', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(119, 3, 'العصافرة', 'Asafra', 'asafra', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(120, 3, 'العجمي', 'Agamy', 'agamy', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(121, 3, 'بكوس', 'Bakos', 'bakos', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(122, 3, 'بولكلي', 'Boulkly', 'boulkly', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(123, 3, 'كليوباترا', 'Cleopatra', 'cleopatra', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(124, 3, 'جليم', 'Glim', 'glim', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(125, 3, 'المعمورة', 'Al Mamurah', 'al-mamurah', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(126, 3, 'المندرة', 'Al Mandara', 'al-mandara', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(127, 3, 'محرم بك', 'Moharam Bek', 'moharam-bek', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(128, 3, 'الشاطبي', 'Elshatby', 'elshatby', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(129, 3, 'سيدي جابر', 'Sidi Gaber', 'sidi-gaber', NULL, '2022-05-07 11:29:45', '2022-05-07 11:29:45'),
(130, 3, 'الساحل الشمالي', 'North Coast/sahel', 'north-coastsahel', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(131, 3, 'الحضرة', 'Alhadra', 'alhadra', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(132, 3, 'العطارين', 'Alattarin', 'alattarin', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(133, 3, 'سيدي كرير', 'Sidi Kerir', 'sidi-kerir', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(134, 3, 'الجمرك', 'Elgomrok', 'elgomrok', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(135, 3, 'المكس', 'Al Max', 'al-max', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(136, 3, 'مارينا', 'Marina', 'marina', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(137, 4, 'المنصورة', 'Mansoura', 'mansoura', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(138, 4, 'طلخا', 'Talkha', 'talkha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(139, 4, 'ميت غمر', 'Mitt Ghamr', 'mitt-ghamr', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(140, 4, 'دكرنس', 'Dekernes', 'dekernes', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(141, 4, 'أجا', 'Aga', 'aga', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(142, 4, 'منية النصر', 'Menia El Nasr', 'menia-el-nasr', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(143, 4, 'السنبلاوين', 'Sinbillawin', 'sinbillawin', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(144, 4, 'الكردي', 'El Kurdi', 'el-kurdi', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(145, 4, 'بني عبيد', 'Bani Ubaid', 'bani-ubaid', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(146, 4, 'المنزلة', 'Al Manzala', 'al-manzala', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(147, 4, 'تمي الأمديد', 'tami al\'amdid', 'tami-alamdid', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(148, 4, 'الجمالية', 'aljamalia', 'aljamalia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(149, 4, 'شربين', 'Sherbin', 'sherbin', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(150, 4, 'المطرية', 'Mataria', 'mataria', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(151, 4, 'بلقاس', 'Belqas', 'belqas', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(152, 4, 'ميت سلسيل', 'Meet Salsil', 'meet-salsil', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(153, 4, 'جمصة', 'Gamasa', 'gamasa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(154, 4, 'محلة دمنة', 'Mahalat Damana', 'mahalat-damana', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(155, 4, 'نبروه', 'Nabroh', 'nabroh', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(156, 5, 'الغردقة', 'Hurghada', 'hurghada', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(157, 5, 'رأس غارب', 'Ras Ghareb', 'ras-ghareb', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(158, 5, 'سفاجا', 'Safaga', 'safaga', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(159, 5, 'القصير', 'El Qusiar', 'el-qusiar', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(160, 5, 'مرسى علم', 'Marsa Alam', 'marsa-alam', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(161, 5, 'الشلاتين', 'Shalatin', 'shalatin', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(162, 5, 'حلايب', 'Halaib', 'halaib', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(163, 5, 'الدهار', 'Aldahar', 'aldahar', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(164, 6, 'دمنهور', 'Damanhour', 'damanhour', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(165, 6, 'كفر الدوار', 'Kafr El Dawar', 'kafr-el-dawar', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(166, 6, 'رشيد', 'Rashid', 'rashid', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(167, 6, 'إدكو', 'Edco', 'edco', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(168, 6, 'أبو المطامير', 'Abu al-Matamir', 'abu-al-matamir', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(169, 6, 'أبو حمص', 'Abu Homs', 'abu-homs', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(170, 6, 'الدلنجات', 'Delengat', 'delengat', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(171, 6, 'المحمودية', 'Mahmoudiyah', 'mahmoudiyah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(172, 6, 'الرحمانية', 'Rahmaniyah', 'rahmaniyah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(173, 6, 'إيتاي البارود', 'Itai Baroud', 'itai-baroud', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(174, 6, 'حوش عيسى', 'Housh Eissa', 'housh-eissa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(175, 6, 'شبراخيت', 'Shubrakhit', 'shubrakhit', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(176, 6, 'كوم حمادة', 'Kom Hamada', 'kom-hamada', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(177, 6, 'بدر', 'Badr', 'badr', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(178, 6, 'وادي النطرون', 'Wadi Natrun', 'wadi-natrun', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(179, 6, 'النوبارية الجديدة', 'New Nubaria', 'new-nubaria', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(180, 6, 'النوبارية', 'Alnoubareya', 'alnoubareya', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(181, 7, 'الفيوم', 'Fayoum', 'fayoum', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(182, 7, 'الفيوم الجديدة', 'Fayoum El Gedida', 'fayoum-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(183, 7, 'طامية', 'Tamiya', 'tamiya', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(184, 7, 'سنورس', 'Snores', 'snores', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(185, 7, 'إطسا', 'Etsa', 'etsa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(186, 7, 'إبشواي', 'Epschway', 'epschway', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(187, 7, 'يوسف الصديق', 'Yusuf El Sediaq', 'yusuf-el-sediaq', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(188, 7, 'الحادقة', 'Hadqa', 'hadqa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(189, 7, 'اطسا', 'Atsa', 'atsa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(190, 7, 'الجامعة', 'Algamaa', 'algamaa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(191, 7, 'السيالة', 'Sayala', 'sayala', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(192, 8, 'طنطا', 'Tanta', 'tanta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(193, 8, 'المحلة الكبرى', 'Al Mahalla Al Kobra', 'al-mahalla-al-kobra', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(194, 8, 'كفر الزيات', 'Kafr El Zayat', 'kafr-el-zayat', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(195, 8, 'زفتى', 'Zefta', 'zefta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(196, 8, 'السنطة', 'El Santa', 'el-santa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(197, 8, 'قطور', 'Qutour', 'qutour', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(198, 8, 'بسيون', 'Basion', 'basion', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(199, 8, 'سمنود', 'Samannoud', 'samannoud', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(200, 9, 'الإسماعيلية', 'Ismailia', 'ismailia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(201, 9, 'فايد', 'Fayed', 'fayed', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(202, 9, 'القنطرة شرق', 'Qantara Sharq', 'qantara-sharq', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(203, 9, 'القنطرة غرب', 'Qantara Gharb', 'qantara-gharb', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(204, 9, 'التل الكبير', 'El Tal El Kabier', 'el-tal-el-kabier', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(205, 9, 'أبو صوير', 'Abu Sawir', 'abu-sawir', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(206, 9, 'القصاصين الجديدة', 'Kasasien El Gedida', 'kasasien-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(207, 9, 'نفيشة', 'Nefesha', 'nefesha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(208, 9, 'الشيخ زايد', 'Sheikh Zayed', 'sheikh-zayed', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(209, 10, 'شبين الكوم', 'Shbeen El Koom', 'shbeen-el-koom', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(210, 10, 'مدينة السادات', 'Sadat City', 'sadat-city', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(211, 10, 'منوف', 'Menouf', 'menouf', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(212, 10, 'سرس الليان', 'Sars El-Layan', 'sars-el-layan', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(213, 10, 'أشمون', 'Ashmon', 'ashmon', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(214, 10, 'الباجور', 'Al Bagor', 'al-bagor', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(215, 10, 'قويسنا', 'Quesna', 'quesna', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(216, 10, 'بركة السبع', 'Berkat El Saba', 'berkat-el-saba', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(217, 10, 'تلا', 'Tala', 'tala', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(218, 10, 'الشهداء', 'Al Shohada', 'al-shohada', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(219, 11, 'المنيا', 'Minya', 'minya', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(220, 11, 'المنيا الجديدة', 'Minya El Gedida', 'minya-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(221, 11, 'العدوة', 'El Adwa', 'el-adwa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(222, 11, 'مغاغة', 'Magagha', 'magagha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(223, 11, 'بني مزار', 'Bani Mazar', 'bani-mazar', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(224, 11, 'مطاي', 'Mattay', 'mattay', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(225, 11, 'سمالوط', 'Samalut', 'samalut', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(226, 11, 'المدينة الفكرية', 'Madinat El Fekria', 'madinat-el-fekria', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(227, 11, 'ملوي', 'Meloy', 'meloy', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(228, 11, 'دير مواس', 'Deir Mawas', 'deir-mawas', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(229, 11, 'ابو قرقاص', 'Abu Qurqas', 'abu-qurqas', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(230, 11, 'ارض سلطان', 'Ard Sultan', 'ard-sultan', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(231, 12, 'بنها', 'Banha', 'banha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(232, 12, 'قليوب', 'Qalyub', 'qalyub', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(233, 12, 'شبرا الخيمة', 'Shubra Al Khaimah', 'shubra-al-khaimah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(234, 12, 'القناطر الخيرية', 'Al Qanater Charity', 'al-qanater-charity', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(235, 12, 'الخانكة', 'Khanka', 'khanka', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(236, 12, 'كفر شكر', 'Kafr Shukr', 'kafr-shukr', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(237, 12, 'طوخ', 'Tukh', 'tukh', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(238, 12, 'قها', 'Qaha', 'qaha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(239, 12, 'العبور', 'Obour', 'obour', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(240, 12, 'الخصوص', 'Khosous', 'khosous', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(241, 12, 'شبين القناطر', 'Shibin Al Qanater', 'shibin-al-qanater', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(242, 12, 'مسطرد', 'Mostorod', 'mostorod', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(243, 13, 'الخارجة', 'El Kharga', 'el-kharga', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(244, 13, 'باريس', 'Paris', 'paris', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(245, 13, 'موط', 'Mout', 'mout', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(246, 13, 'الفرافرة', 'Farafra', 'farafra', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(247, 13, 'بلاط', 'Balat', 'balat', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(248, 13, 'الداخلة', 'Dakhla', 'dakhla', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(249, 14, 'السويس', 'Suez', 'suez', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(250, 14, 'الجناين', 'Alganayen', 'alganayen', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(251, 14, 'عتاقة', 'Ataqah', 'ataqah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(252, 14, 'العين السخنة', 'Ain Sokhna', 'ain-sokhna', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(253, 14, 'فيصل', 'Faysal', 'faysal', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(254, 15, 'أسوان', 'Aswan', 'aswan', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(255, 15, 'أسوان الجديدة', 'Aswan El Gedida', 'aswan-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(256, 15, 'دراو', 'Drau', 'drau', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(257, 15, 'كوم أمبو', 'Kom Ombo', 'kom-ombo', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(258, 15, 'نصر النوبة', 'Nasr Al Nuba', 'nasr-al-nuba', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(259, 15, 'كلابشة', 'Kalabsha', 'kalabsha', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(260, 15, 'إدفو', 'Edfu', 'edfu', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(261, 15, 'الرديسية', 'Al-Radisiyah', 'al-radisiyah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(262, 15, 'البصيلية', 'Al Basilia', 'al-basilia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(263, 15, 'السباعية', 'Al Sibaeia', 'al-sibaeia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(264, 15, 'ابوسمبل السياحية', 'Abo Simbl Al Siyahia', 'abo-simbl-al-siyahia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(265, 15, 'مرسى علم', 'Marsa Alam', 'marsa-alam', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(266, 16, 'أسيوط', 'Assiut', 'assiut', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(267, 16, 'أسيوط الجديدة', 'Assiut El Gedida', 'assiut-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(268, 16, 'ديروط', 'Dayrout', 'dayrout', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(269, 16, 'منفلوط', 'Manfalut', 'manfalut', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(270, 16, 'القوصية', 'Qusiya', 'qusiya', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(271, 16, 'أبنوب', 'Abnoub', 'abnoub', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(272, 16, 'أبو تيج', 'Abu Tig', 'abu-tig', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(273, 16, 'الغنايم', 'El Ghanaim', 'el-ghanaim', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(274, 16, 'ساحل سليم', 'Sahel Selim', 'sahel-selim', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(275, 16, 'البداري', 'El Badari', 'el-badari', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(276, 16, 'صدفا', 'Sidfa', 'sidfa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(277, 17, 'بني سويف', 'Bani Sweif', 'bani-sweif', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(278, 17, 'بني سويف الجديدة', 'Beni Suef El Gedida', 'beni-suef-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(279, 17, 'الواسطى', 'Al Wasta', 'al-wasta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(280, 17, 'ناصر', 'Naser', 'naser', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(281, 17, 'إهناسيا', 'Ehnasia', 'ehnasia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(282, 17, 'ببا', 'beba', 'beba', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(283, 17, 'الفشن', 'Fashn', 'fashn', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(284, 17, 'سمسطا', 'Somasta', 'somasta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(285, 17, 'الاباصيرى', 'Alabbaseri', 'alabbaseri', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(286, 17, 'مقبل', 'Mokbel', 'mokbel', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(287, 18, 'بورسعيد', 'PorSaid', 'porsaid', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(288, 18, 'بورفؤاد', 'Port Fouad', 'port-fouad', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(289, 18, 'العرب', 'Alarab', 'alarab', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(290, 18, 'حى الزهور', 'Zohour', 'zohour', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(291, 18, 'حى الشرق', 'Alsharq', 'alsharq', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(292, 18, 'حى الضواحى', 'Aldawahi', 'aldawahi', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(293, 18, 'حى المناخ', 'Almanakh', 'almanakh', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(294, 18, 'حى مبارك', 'Mubarak', 'mubarak', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(295, 19, 'دمياط', 'Damietta', 'damietta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(296, 19, 'دمياط الجديدة', 'New Damietta', 'new-damietta', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(297, 19, 'رأس البر', 'Ras El Bar', 'ras-el-bar', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(298, 19, 'فارسكور', 'Faraskour', 'faraskour', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(299, 19, 'الزرقا', 'Zarqa', 'zarqa', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(300, 19, 'السرو', 'alsaru', 'alsaru', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(301, 19, 'الروضة', 'alruwda', 'alruwda', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(302, 19, 'كفر البطيخ', 'Kafr El-Batikh', 'kafr-el-batikh', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(303, 19, 'عزبة البرج', 'Azbet Al Burg', 'azbet-al-burg', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(304, 19, 'ميت أبو غالب', 'Meet Abou Ghalib', 'meet-abou-ghalib', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(305, 19, 'كفر سعد', 'Kafr Saad', 'kafr-saad', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(306, 20, 'الزقازيق', 'Zagazig', 'zagazig', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(307, 20, 'العاشر من رمضان', 'Al Ashr Men Ramadan', 'al-ashr-men-ramadan', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(308, 20, 'منيا القمح', 'Minya Al Qamh', 'minya-al-qamh', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(309, 20, 'بلبيس', 'Belbeis', 'belbeis', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(310, 20, 'مشتول السوق', 'Mashtoul El Souq', 'mashtoul-el-souq', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(311, 20, 'القنايات', 'Qenaiat', 'qenaiat', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(312, 20, 'أبو حماد', 'Abu Hammad', 'abu-hammad', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(313, 20, 'القرين', 'El Qurain', 'el-qurain', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(314, 20, 'ههيا', 'Hehia', 'hehia', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(315, 20, 'أبو كبير', 'Abu Kabir', 'abu-kabir', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(316, 20, 'فاقوس', 'Faccus', 'faccus', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(317, 20, 'الصالحية الجديدة', 'El Salihia El Gedida', 'el-salihia-el-gedida', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(318, 20, 'الإبراهيمية', 'Al Ibrahimiyah', 'al-ibrahimiyah', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(319, 20, 'ديرب نجم', 'Deirb Negm', 'deirb-negm', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(320, 20, 'كفر صقر', 'Kafr Saqr', 'kafr-saqr', NULL, '2022-05-07 11:29:46', '2022-05-07 11:29:46'),
(321, 20, 'أولاد صقر', 'Awlad Saqr', 'awlad-saqr', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(322, 20, 'الحسينية', 'Husseiniya', 'husseiniya', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(323, 20, 'صان الحجر القبلية', 'san alhajar alqablia', 'san-alhajar-alqablia', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(324, 20, 'منشأة أبو عمر', 'Manshayat Abu Omar', 'manshayat-abu-omar', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(325, 21, 'الطور', 'Al Toor', 'al-toor', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(326, 21, 'شرم الشيخ', 'Sharm El-Shaikh', 'sharm-el-shaikh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(327, 21, 'دهب', 'Dahab', 'dahab', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(328, 21, 'نويبع', 'Nuweiba', 'nuweiba', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(329, 21, 'طابا', 'Taba', 'taba', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(330, 21, 'سانت كاترين', 'Saint Catherine', 'saint-catherine', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(331, 21, 'أبو رديس', 'Abu Redis', 'abu-redis', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(332, 21, 'أبو زنيمة', 'Abu Zenaima', 'abu-zenaima', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(333, 21, 'رأس سدر', 'Ras Sidr', 'ras-sidr', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(334, 22, 'كفر الشيخ', 'Kafr El Sheikh', 'kafr-el-sheikh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(335, 22, 'وسط البلد كفر الشيخ', 'Kafr El Sheikh Downtown', 'kafr-el-sheikh-downtown', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(336, 22, 'دسوق', 'Desouq', 'desouq', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(337, 22, 'فوه', 'Fooh', 'fooh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(338, 22, 'مطوبس', 'Metobas', 'metobas', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(339, 22, 'برج البرلس', 'Burg Al Burullus', 'burg-al-burullus', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(340, 22, 'بلطيم', 'Baltim', 'baltim', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(341, 22, 'مصيف بلطيم', 'Masief Baltim', 'masief-baltim', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(342, 22, 'الحامول', 'Hamol', 'hamol', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(343, 22, 'بيلا', 'Bella', 'bella', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(344, 22, 'الرياض', 'Riyadh', 'riyadh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(345, 22, 'سيدي سالم', 'Sidi Salm', 'sidi-salm', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(346, 22, 'قلين', 'Qellen', 'qellen', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(347, 22, 'سيدي غازي', 'Sidi Ghazi', 'sidi-ghazi', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(348, 23, 'مرسى مطروح', 'Marsa Matrouh', 'marsa-matrouh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(349, 23, 'الحمام', 'El Hamam', 'el-hamam', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(350, 23, 'العلمين', 'Alamein', 'alamein', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(351, 23, 'الضبعة', 'Dabaa', 'dabaa', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(352, 23, 'النجيلة', 'Al-Nagila', 'al-nagila', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(353, 23, 'سيدي براني', 'Sidi Brani', 'sidi-brani', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(354, 23, 'السلوم', 'Salloum', 'salloum', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(355, 23, 'سيوة', 'Siwa', 'siwa', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(356, 23, 'مارينا', 'Marina', 'marina', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(357, 23, 'الساحل الشمالى', 'North Coast', 'north-coast', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(358, 24, 'الأقصر', 'Luxor', 'luxor', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(359, 24, 'الأقصر الجديدة', 'New Luxor', 'new-luxor', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(360, 24, 'إسنا', 'Esna', 'esna', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(361, 24, 'طيبة الجديدة', 'New Tiba', 'new-tiba', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(362, 24, 'الزينية', 'Al ziynia', 'al-ziynia', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(363, 24, 'البياضية', 'Al Bayadieh', 'al-bayadieh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(364, 24, 'القرنة', 'Al Qarna', 'al-qarna', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(365, 24, 'أرمنت', 'Armant', 'armant', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(366, 24, 'الطود', 'Al Tud', 'al-tud', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(367, 25, 'قنا', 'Qena', 'qena', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(368, 25, 'قنا الجديدة', 'New Qena', 'new-qena', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(369, 25, 'ابو طشت', 'Abu Tesht', 'abu-tesht', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(370, 25, 'نجع حمادي', 'Nag Hammadi', 'nag-hammadi', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(371, 25, 'دشنا', 'Deshna', 'deshna', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(372, 25, 'الوقف', 'Alwaqf', 'alwaqf', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(373, 25, 'قفط', 'Qaft', 'qaft', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(374, 25, 'نقادة', 'Naqada', 'naqada', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(375, 25, 'فرشوط', 'Farshout', 'farshout', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(376, 25, 'قوص', 'Quos', 'quos', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(377, 26, 'العريش', 'Arish', 'arish', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(378, 26, 'الشيخ زويد', 'Sheikh Zowaid', 'sheikh-zowaid', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(379, 26, 'نخل', 'Nakhl', 'nakhl', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(380, 26, 'رفح', 'Rafah', 'rafah', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(381, 26, 'بئر العبد', 'Bir al-Abed', 'bir-al-abed', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(382, 26, 'الحسنة', 'Al Hasana', 'al-hasana', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(383, 27, 'سوهاج', 'Sohag', 'sohag', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(384, 27, 'سوهاج الجديدة', 'Sohag El Gedida', 'sohag-el-gedida', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(385, 27, 'أخميم', 'Akhmeem', 'akhmeem', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(386, 27, 'أخميم الجديدة', 'Akhmim El Gedida', 'akhmim-el-gedida', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(387, 27, 'البلينا', 'Albalina', 'albalina', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(388, 27, 'المراغة', 'El Maragha', 'el-maragha', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(389, 27, 'المنشأة', 'almunsha\'a', 'almunshaa', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(390, 27, 'دار السلام', 'Dar AISalaam', 'dar-aisalaam', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(391, 27, 'جرجا', 'Gerga', 'gerga', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(392, 27, 'جهينة الغربية', 'Jahina Al Gharbia', 'jahina-al-gharbia', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(393, 27, 'ساقلته', 'Saqilatuh', 'saqilatuh', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(394, 27, 'طما', 'Tama', 'tama', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(395, 27, 'طهطا', 'Tahta', 'tahta', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47'),
(396, 27, 'الكوثر', 'Alkawthar', 'alkawthar', NULL, '2022-05-07 11:29:47', '2022-05-07 11:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2022-05-07 11:29:47', '2022-05-07 11:29:47');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `splash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `app_page_branch` int(11) NOT NULL DEFAULT 10,
  `app_pag` int(11) NOT NULL DEFAULT 10,
  `app_new_branch` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `splash`, `site_title`, `site_name`, `site_email`, `footer_text`, `created_at`, `updated_at`, `app_page_branch`, `app_pag`, `app_new_branch`) VALUES
(1, 'photo-1557682257-2f9c37a3a5f3.jpg', 'LOCATION STORE', 'LOCATION STORE', 'locationstore@sppout.com', '  <strong>Copyright &copy; 2022 <a href=\"01024346011\">Mohamed Galal</a>.</strong>\r\n    All rights reserved.\r\n    <div class=\"float-right d-none d-sm-inline-block\">\r\n      <b>Version</b> 1.2.0-rc\r\n    </div>', '2022-05-07 13:43:11', '2022-05-07 13:43:11', 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlstate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[0 = false] [1 = true ]',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchstate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[0 = false] [1 = true ]',
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `productstate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[0 = false] [1 = true ]',
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `urlstate`, `url`, `branchstate`, `branch_id`, `productstate`, `product_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'img.jpg', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL),
(2, 'product.jpg', 0, NULL, 0, NULL, 1, 3, 0, NULL, NULL),
(3, 'store.jpg', 0, NULL, 1, 1, 0, NULL, 0, NULL, NULL),
(4, 'url.jpg', 1, 'https://locationstor.com/', 0, NULL, 0, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `start_date` date DEFAULT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` date DEFAULT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `branch_num` tinyint(4) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `category_id`, `name`, `slug`, `active`, `start_date`, `expiry_date`, `branch_num`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'restaurawwddw', 'sdasdfasd', 0, '2022-05-07', NULL, 10, NULL, '2022-05-07 20:59:53', '2022-05-29 03:47:15'),
(2, 2, 1, 'سوبر ماركت 2', 'dfasdfgasd', 0, '2022-05-07', NULL, 15, NULL, '2022-05-07 20:59:53', '2022-06-03 23:28:18'),
(3, 4, 3, 'اسم متجر', 'asm-mtgr', 0, NULL, NULL, 10, NULL, '2022-05-30 01:13:21', '2022-05-31 08:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '[0 = ذكر] [1 = أنثى]',
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `mobile_verified_at`, `password`, `gender`, `device_token`, `ip_address`, `city_id`, `region_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', '01024346010', NULL, '$2y$10$5QtKGblIiHqzO/7rH6YpVO2.OkzlwnpgpxYiJSjfvdBDeyyhqzyCi', 0, 'curkZ7yVT9-4nY7R3_OVJj:APA91bHZTKcgd1nrrkJvc5GDbYFyMdC2uHvJ-1Ak6QVLzzkDoBDdnb5vKfW_XGcvAfUe2xP1oF4_LBy37RwWEkMGy4M_E4eOW9BTmvhbZab3V5VG58fC0eOtYJ-6FQ7wk4x5SBylWMyI', '156.198.237.19', 4, 145, NULL, NULL, '2022-05-07 11:29:47', '2022-06-11 20:42:39'),
(2, 'MOHAMED', '01024346011', NULL, '$2y$10$tAQ5oLyag8vkH.0yQxVFyO8oRP428RA4kSw7oBtLENL..hmqBW6G.', 0, 'dvg0-yHBSACOCxozEEk6mM:APA91bFgV64xx_HsRcUmp4hWVf_RhHCAQVUz7P3RWiloeONulCFjGXNLFV4RHPWMYQZcnbba-EjjTR2k92LMxOkO4UCapm3-J4HcVbZ-aqMbgqkjo88hfmDR2h23HTRqvYJXCg2omgvh', '196.155.87.91', 3, 98, NULL, NULL, '2022-05-07 11:31:48', '2022-06-06 01:05:18'),
(3, 'MG', '01226772714', NULL, '$2y$10$pkLUkDqHNf0n337NDiOTweHSHxBYBSGtMke92h4b7aWfHF4RYat4S', 0, 'e6T-vjpjQjmwqi8SwKF8Hv:APA91bGlcWQzDJ4zD7Q5WRvSM50kB5we88Pm0cYzDYTVzLYCETQGgO0OQi0EVo3ilmerAsXZ7rlBx_8ZGxmkfe8pcvF7tuoQ0L75FpvBROdnv3eKN7-AjPwLxXIJWIsbu0YiOV4tv2Kl', NULL, 3, 98, 'r07HaWwuT0BJvuWa2dWIlkCA1hjDG44mR2eABFVA.jpg', NULL, '2022-05-08 06:47:34', '2022-05-14 19:04:42'),
(4, 'حسام عمر', '01144877118', NULL, '$2y$10$R4a6YPCHMNMWiIZRXDgUfO4ahbDguvjrxBj2jOCrafqUUcwC9KBl6', 0, 'cR2FnE4OQm-nwVgxWsMRYy:APA91bGQ9gzLPHp6UWgbt2aTZGsY_XF9NSPpILVPuA8mhyusuZhr8_7woti3W9KL6hc01uaZcEU6rrJf3CgKR1eHQi3iEmAl2dKMyHRr1ix9hiP_DWRDuYxnvXoWCjQAmmxb_HF_R2jl', '102.8.91.193', 3, 98, 'wqr9tN5EAWnLIRdlFEhSw9rV2wydD2pGHumfAIJ3.png', NULL, '2022-05-12 01:08:17', '2022-06-11 06:27:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
