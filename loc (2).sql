-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 03:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loc`
--

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
(1, 'Brand', '01024346011', NULL, '$2y$10$IT7vctiOU8XYHP6ZFNzZa.pJ34O4q1q5rbK8cTARgurIwM/fkfjs.', NULL, NULL, NULL, NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02');

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
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lat` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0 COMMENT 'المشاهدات',
  `product_num` int(11) NOT NULL DEFAULT 0,
  `top` int(11) NOT NULL DEFAULT 0 COMMENT 'تميز الفرع',
  `opentime` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'وقت فتح',
  `closetime` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'وقت اغلاق',
  `start_date` date DEFAULT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` date DEFAULT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `accept` tinyint(4) NOT NULL DEFAULT 1 COMMENT '[0 = مقبول] [1 =  انتظار] [2 = مرفوض ]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'العيادات', NULL, NULL, 0, NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02');

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
(1, 'القاهرة', 'Cairo', 'cairo', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(2, 'الجيزة', 'Giza', 'giza', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(3, 'الأسكندرية', 'Alexandria', 'alexandria', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(4, 'الدقهلية', 'Dakahlia', 'dakahlia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(5, 'البحر الأحمر', 'Red Sea', 'red-sea', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(6, 'البحيرة', 'Beheira', 'beheira', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(7, 'الفيوم', 'Fayoum', 'fayoum', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(8, 'الغربية', 'Gharbiya', 'gharbiya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(9, 'الإسماعلية', 'Ismailia', 'ismailia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(10, 'المنوفية', 'Menofia', 'menofia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(11, 'المنيا', 'Minya', 'minya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(12, 'القليوبية', 'Qaliubiya', 'qaliubiya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(13, 'الوادي الجديد', 'New Valley', 'new-valley', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(14, 'السويس', 'Suez', 'suez', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(15, 'اسوان', 'Aswan', 'aswan', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(16, 'اسيوط', 'Assiut', 'assiut', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(17, 'بني سويف', 'Beni Suef', 'beni-suef', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(18, 'بورسعيد', 'Port Said', 'port-said', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(19, 'دمياط', 'Damietta', 'damietta', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(20, 'الشرقية', 'Sharkia', 'sharkia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(21, 'جنوب سيناء', 'South Sinai', 'south-sinai', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(22, 'كفر الشيخ', 'Kafr Al sheikh', 'kafr-al-sheikh', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(23, 'مطروح', 'Matrouh', 'matrouh', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(24, 'الأقصر', 'Luxor', 'luxor', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(25, 'قنا', 'Qena', 'qena', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(26, 'شمال سيناء', 'North Sinai', 'north-sinai', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(27, 'سوهاج', 'Sohag', 'sohag', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2022_04_27_043015_create_settings_table', 1);

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
(1, 'menu unit', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(2, 'view unit', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(3, 'new unit', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(4, 'edit unit', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(5, 'delete unit', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` date NOT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` bigint(20) NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, '15 مايو', '15 May', '15-may', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(2, 1, 'الازبكية', 'Al Azbakeyah', 'al-azbakeyah', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(3, 1, 'البساتين', 'Al Basatin', 'al-basatin', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(4, 1, 'التبين', 'Tebin', 'tebin', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(5, 1, 'الخليفة', 'El-Khalifa', 'el-khalifa', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(6, 1, 'الدراسة', 'El darrasa', 'el-darrasa', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(7, 1, 'الدرب الاحمر', 'Aldarb Alahmar', 'aldarb-alahmar', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(8, 1, 'الزاوية الحمراء', 'Zawya al-Hamra', 'zawya-al-hamra', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(9, 1, 'الزيتون', 'El-Zaytoun', 'el-zaytoun', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(10, 1, 'الساحل', 'Sahel', 'sahel', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(11, 1, 'السلام', 'El Salam', 'el-salam', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(12, 1, 'السيدة زينب', 'Sayeda Zeinab', 'sayeda-zeinab', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(13, 1, 'الشرابية', 'El Sharabeya', 'el-sharabeya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(14, 1, 'مدينة الشروق', 'Shorouk', 'shorouk', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(15, 1, 'الظاهر', 'El Daher', 'el-daher', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(16, 1, 'العتبة', 'Ataba', 'ataba', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(17, 1, 'القاهرة الجديدة', 'New Cairo', 'new-cairo', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(18, 1, 'المرج', 'El Marg', 'el-marg', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(19, 1, 'عزبة النخل', 'Ezbet el Nakhl', 'ezbet-el-nakhl', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(20, 1, 'المطرية', 'Matareya', 'matareya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(21, 1, 'المعادى', 'Maadi', 'maadi', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(22, 1, 'المعصرة', 'Maasara', 'maasara', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(23, 1, 'المقطم', 'Mokattam', 'mokattam', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(24, 1, 'المنيل', 'Manyal', 'manyal', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(25, 1, 'الموسكى', 'Mosky', 'mosky', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(26, 1, 'النزهة', 'Nozha', 'nozha', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(27, 1, 'الوايلى', 'Waily', 'waily', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(28, 1, 'باب الشعرية', 'Bab al-Shereia', 'bab-al-shereia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(29, 1, 'بولاق', 'Bolaq', 'bolaq', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(30, 1, 'جاردن سيتى', 'Garden City', 'garden-city', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(31, 1, 'حدائق القبة', 'Hadayek El-Kobba', 'hadayek-el-kobba', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(32, 1, 'حلوان', 'Helwan', 'helwan', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(33, 1, 'دار السلام', 'Dar Al Salam', 'dar-al-salam', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(34, 1, 'شبرا', 'Shubra', 'shubra', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(35, 1, 'طره', 'Tura', 'tura', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(36, 1, 'عابدين', 'Abdeen', 'abdeen', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(37, 1, 'عباسية', 'Abaseya', 'abaseya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(38, 1, 'عين شمس', 'Ain Shams', 'ain-shams', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(39, 1, 'مدينة نصر', 'Nasr City', 'nasr-city', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(40, 1, 'مصر الجديدة', 'New Heliopolis', 'new-heliopolis', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(41, 1, 'مصر القديمة', 'Masr Al Qadima', 'masr-al-qadima', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(42, 1, 'منشية ناصر', 'Mansheya Nasir', 'mansheya-nasir', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(43, 1, 'مدينة بدر', 'Badr City', 'badr-city', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(44, 1, 'مدينة العبور', 'Obour City', 'obour-city', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(45, 1, 'وسط البلد', 'Cairo Downtown', 'cairo-downtown', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(46, 1, 'الزمالك', 'Zamalek', 'zamalek', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(47, 1, 'قصر النيل', 'Kasr El Nile', 'kasr-el-nile', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(48, 1, 'الرحاب', 'Rehab', 'rehab', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(49, 1, 'القطامية', 'Katameya', 'katameya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(50, 1, 'مدينتي', 'Madinty', 'madinty', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(51, 1, 'روض الفرج', 'Rod Alfarag', 'rod-alfarag', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(52, 1, 'شيراتون', 'Sheraton', 'sheraton', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(53, 1, 'الجمالية', 'El-Gamaleya', 'el-gamaleya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(54, 1, 'العاشر من رمضان', '10th of Ramadan City', '10th-of-ramadan-city', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(55, 1, 'الحلمية', 'Helmeyat Alzaytoun', 'helmeyat-alzaytoun', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(56, 1, 'النزهة الجديدة', 'New Nozha', 'new-nozha', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(57, 1, 'العاصمة الإدارية', 'Capital New', 'capital-new', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(58, 2, 'الجيزة', 'Giza', 'giza', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(59, 2, 'السادس من أكتوبر', 'Sixth of October', 'sixth-of-october', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(60, 2, 'الشيخ زايد', 'Cheikh Zayed', 'cheikh-zayed', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(61, 2, 'الحوامدية', 'Hawamdiyah', 'hawamdiyah', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(62, 2, 'البدرشين', 'Al Badrasheen', 'al-badrasheen', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(63, 2, 'الصف', 'Saf', 'saf', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(64, 2, 'أطفيح', 'Atfih', 'atfih', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(65, 2, 'العياط', 'Al Ayat', 'al-ayat', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(66, 2, 'الباويطي', 'Al-Bawaiti', 'al-bawaiti', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(67, 2, 'منشأة القناطر', 'ManshiyetAl Qanater', 'manshiyetal-qanater', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(68, 2, 'أوسيم', 'Oaseem', 'oaseem', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(69, 2, 'كرداسة', 'Kerdasa', 'kerdasa', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(70, 2, 'أبو النمرس', 'Abu Nomros', 'abu-nomros', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(71, 2, 'كفر غطاطي', 'Kafr Ghati', 'kafr-ghati', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(72, 2, 'منشأة البكاري', 'Manshiyet Al Bakari', 'manshiyet-al-bakari', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(73, 2, 'الدقى', 'Dokki', 'dokki', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(74, 2, 'العجوزة', 'Agouza', 'agouza', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(75, 2, 'الهرم', 'Haram', 'haram', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(76, 2, 'الوراق', 'Warraq', 'warraq', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(77, 2, 'امبابة', 'Imbaba', 'imbaba', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(78, 2, 'بولاق الدكرور', 'Boulaq Dakrour', 'boulaq-dakrour', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(79, 2, 'الواحات البحرية', 'Al Wahat Al Baharia', 'al-wahat-al-baharia', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(80, 2, 'العمرانية', 'Omraneya', 'omraneya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(81, 2, 'المنيب', 'Moneeb', 'moneeb', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(82, 2, 'بين السرايات', 'Bin Alsarayat', 'bin-alsarayat', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(83, 2, 'الكيت كات', 'Kit Kat', 'kit-kat', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(84, 2, 'المهندسين', 'Mohandessin', 'mohandessin', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(85, 2, 'فيصل', 'Faisal', 'faisal', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(86, 2, 'أبو رواش', 'Abu Rawash', 'abu-rawash', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(87, 2, 'حدائق الأهرام', 'Hadayek Alahram', 'hadayek-alahram', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(88, 2, 'الحرانية', 'Haraneya', 'haraneya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(89, 2, 'حدائق اكتوبر', 'Hadayek October', 'hadayek-october', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(90, 2, 'صفط اللبن', 'Saft Allaban', 'saft-allaban', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(91, 2, 'القرية الذكية', 'Smart Village', 'smart-village', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(92, 2, 'ارض اللواء', 'Ard Ellwaa', 'ard-ellwaa', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(93, 3, 'ابو قير', 'Abu Qir', 'abu-qir', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(94, 3, 'الابراهيمية', 'Al Ibrahimeyah', 'al-ibrahimeyah', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(95, 3, 'الأزاريطة', 'Azarita', 'azarita', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(96, 3, 'الانفوشى', 'Anfoushi', 'anfoushi', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(97, 3, 'الدخيلة', 'Dekheila', 'dekheila', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(98, 3, 'السيوف', 'El Soyof', 'el-soyof', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(99, 3, 'العامرية', 'Ameria', 'ameria', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(100, 3, 'اللبان', 'El Labban', 'el-labban', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(101, 3, 'المفروزة', 'Al Mafrouza', 'al-mafrouza', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(102, 3, 'المنتزه', 'El Montaza', 'el-montaza', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(103, 3, 'المنشية', 'Mansheya', 'mansheya', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(104, 3, 'الناصرية', 'Naseria', 'naseria', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(105, 3, 'امبروزو', 'Ambrozo', 'ambrozo', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(106, 3, 'باب شرق', 'Bab Sharq', 'bab-sharq', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(107, 3, 'برج العرب', 'Bourj Alarab', 'bourj-alarab', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(108, 3, 'ستانلى', 'Stanley', 'stanley', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(109, 3, 'سموحة', 'Smouha', 'smouha', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(110, 3, 'سيدى بشر', 'Sidi Bishr', 'sidi-bishr', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(111, 3, 'شدس', 'Shads', 'shads', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(112, 3, 'غيط العنب', 'Gheet Alenab', 'gheet-alenab', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(113, 3, 'فلمينج', 'Fleming', 'fleming', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(114, 3, 'فيكتوريا', 'Victoria', 'victoria', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(115, 3, 'كامب شيزار', 'Camp Shizar', 'camp-shizar', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(116, 3, 'كرموز', 'Karmooz', 'karmooz', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(117, 3, 'محطة الرمل', 'Mahta Alraml', 'mahta-alraml', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(118, 3, 'مينا البصل', 'Mina El-Basal', 'mina-el-basal', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(119, 3, 'العصافرة', 'Asafra', 'asafra', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(120, 3, 'العجمي', 'Agamy', 'agamy', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(121, 3, 'بكوس', 'Bakos', 'bakos', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(122, 3, 'بولكلي', 'Boulkly', 'boulkly', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(123, 3, 'كليوباترا', 'Cleopatra', 'cleopatra', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(124, 3, 'جليم', 'Glim', 'glim', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(125, 3, 'المعمورة', 'Al Mamurah', 'al-mamurah', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(126, 3, 'المندرة', 'Al Mandara', 'al-mandara', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(127, 3, 'محرم بك', 'Moharam Bek', 'moharam-bek', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(128, 3, 'الشاطبي', 'Elshatby', 'elshatby', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(129, 3, 'سيدي جابر', 'Sidi Gaber', 'sidi-gaber', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(130, 3, 'الساحل الشمالي', 'North Coast/sahel', 'north-coastsahel', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(131, 3, 'الحضرة', 'Alhadra', 'alhadra', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(132, 3, 'العطارين', 'Alattarin', 'alattarin', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(133, 3, 'سيدي كرير', 'Sidi Kerir', 'sidi-kerir', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(134, 3, 'الجمرك', 'Elgomrok', 'elgomrok', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(135, 3, 'المكس', 'Al Max', 'al-max', NULL, '2022-05-01 23:47:01', '2022-05-01 23:47:01'),
(136, 3, 'مارينا', 'Marina', 'marina', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(137, 4, 'المنصورة', 'Mansoura', 'mansoura', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(138, 4, 'طلخا', 'Talkha', 'talkha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(139, 4, 'ميت غمر', 'Mitt Ghamr', 'mitt-ghamr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(140, 4, 'دكرنس', 'Dekernes', 'dekernes', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(141, 4, 'أجا', 'Aga', 'aga', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(142, 4, 'منية النصر', 'Menia El Nasr', 'menia-el-nasr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(143, 4, 'السنبلاوين', 'Sinbillawin', 'sinbillawin', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(144, 4, 'الكردي', 'El Kurdi', 'el-kurdi', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(145, 4, 'بني عبيد', 'Bani Ubaid', 'bani-ubaid', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(146, 4, 'المنزلة', 'Al Manzala', 'al-manzala', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(147, 4, 'تمي الأمديد', 'tami al\'amdid', 'tami-alamdid', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(148, 4, 'الجمالية', 'aljamalia', 'aljamalia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(149, 4, 'شربين', 'Sherbin', 'sherbin', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(150, 4, 'المطرية', 'Mataria', 'mataria', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(151, 4, 'بلقاس', 'Belqas', 'belqas', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(152, 4, 'ميت سلسيل', 'Meet Salsil', 'meet-salsil', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(153, 4, 'جمصة', 'Gamasa', 'gamasa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(154, 4, 'محلة دمنة', 'Mahalat Damana', 'mahalat-damana', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(155, 4, 'نبروه', 'Nabroh', 'nabroh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(156, 5, 'الغردقة', 'Hurghada', 'hurghada', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(157, 5, 'رأس غارب', 'Ras Ghareb', 'ras-ghareb', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(158, 5, 'سفاجا', 'Safaga', 'safaga', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(159, 5, 'القصير', 'El Qusiar', 'el-qusiar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(160, 5, 'مرسى علم', 'Marsa Alam', 'marsa-alam', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(161, 5, 'الشلاتين', 'Shalatin', 'shalatin', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(162, 5, 'حلايب', 'Halaib', 'halaib', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(163, 5, 'الدهار', 'Aldahar', 'aldahar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(164, 6, 'دمنهور', 'Damanhour', 'damanhour', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(165, 6, 'كفر الدوار', 'Kafr El Dawar', 'kafr-el-dawar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(166, 6, 'رشيد', 'Rashid', 'rashid', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(167, 6, 'إدكو', 'Edco', 'edco', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(168, 6, 'أبو المطامير', 'Abu al-Matamir', 'abu-al-matamir', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(169, 6, 'أبو حمص', 'Abu Homs', 'abu-homs', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(170, 6, 'الدلنجات', 'Delengat', 'delengat', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(171, 6, 'المحمودية', 'Mahmoudiyah', 'mahmoudiyah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(172, 6, 'الرحمانية', 'Rahmaniyah', 'rahmaniyah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(173, 6, 'إيتاي البارود', 'Itai Baroud', 'itai-baroud', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(174, 6, 'حوش عيسى', 'Housh Eissa', 'housh-eissa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(175, 6, 'شبراخيت', 'Shubrakhit', 'shubrakhit', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(176, 6, 'كوم حمادة', 'Kom Hamada', 'kom-hamada', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(177, 6, 'بدر', 'Badr', 'badr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(178, 6, 'وادي النطرون', 'Wadi Natrun', 'wadi-natrun', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(179, 6, 'النوبارية الجديدة', 'New Nubaria', 'new-nubaria', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(180, 6, 'النوبارية', 'Alnoubareya', 'alnoubareya', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(181, 7, 'الفيوم', 'Fayoum', 'fayoum', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(182, 7, 'الفيوم الجديدة', 'Fayoum El Gedida', 'fayoum-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(183, 7, 'طامية', 'Tamiya', 'tamiya', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(184, 7, 'سنورس', 'Snores', 'snores', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(185, 7, 'إطسا', 'Etsa', 'etsa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(186, 7, 'إبشواي', 'Epschway', 'epschway', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(187, 7, 'يوسف الصديق', 'Yusuf El Sediaq', 'yusuf-el-sediaq', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(188, 7, 'الحادقة', 'Hadqa', 'hadqa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(189, 7, 'اطسا', 'Atsa', 'atsa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(190, 7, 'الجامعة', 'Algamaa', 'algamaa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(191, 7, 'السيالة', 'Sayala', 'sayala', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(192, 8, 'طنطا', 'Tanta', 'tanta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(193, 8, 'المحلة الكبرى', 'Al Mahalla Al Kobra', 'al-mahalla-al-kobra', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(194, 8, 'كفر الزيات', 'Kafr El Zayat', 'kafr-el-zayat', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(195, 8, 'زفتى', 'Zefta', 'zefta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(196, 8, 'السنطة', 'El Santa', 'el-santa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(197, 8, 'قطور', 'Qutour', 'qutour', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(198, 8, 'بسيون', 'Basion', 'basion', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(199, 8, 'سمنود', 'Samannoud', 'samannoud', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(200, 9, 'الإسماعيلية', 'Ismailia', 'ismailia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(201, 9, 'فايد', 'Fayed', 'fayed', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(202, 9, 'القنطرة شرق', 'Qantara Sharq', 'qantara-sharq', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(203, 9, 'القنطرة غرب', 'Qantara Gharb', 'qantara-gharb', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(204, 9, 'التل الكبير', 'El Tal El Kabier', 'el-tal-el-kabier', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(205, 9, 'أبو صوير', 'Abu Sawir', 'abu-sawir', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(206, 9, 'القصاصين الجديدة', 'Kasasien El Gedida', 'kasasien-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(207, 9, 'نفيشة', 'Nefesha', 'nefesha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(208, 9, 'الشيخ زايد', 'Sheikh Zayed', 'sheikh-zayed', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(209, 10, 'شبين الكوم', 'Shbeen El Koom', 'shbeen-el-koom', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(210, 10, 'مدينة السادات', 'Sadat City', 'sadat-city', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(211, 10, 'منوف', 'Menouf', 'menouf', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(212, 10, 'سرس الليان', 'Sars El-Layan', 'sars-el-layan', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(213, 10, 'أشمون', 'Ashmon', 'ashmon', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(214, 10, 'الباجور', 'Al Bagor', 'al-bagor', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(215, 10, 'قويسنا', 'Quesna', 'quesna', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(216, 10, 'بركة السبع', 'Berkat El Saba', 'berkat-el-saba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(217, 10, 'تلا', 'Tala', 'tala', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(218, 10, 'الشهداء', 'Al Shohada', 'al-shohada', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(219, 11, 'المنيا', 'Minya', 'minya', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(220, 11, 'المنيا الجديدة', 'Minya El Gedida', 'minya-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(221, 11, 'العدوة', 'El Adwa', 'el-adwa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(222, 11, 'مغاغة', 'Magagha', 'magagha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(223, 11, 'بني مزار', 'Bani Mazar', 'bani-mazar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(224, 11, 'مطاي', 'Mattay', 'mattay', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(225, 11, 'سمالوط', 'Samalut', 'samalut', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(226, 11, 'المدينة الفكرية', 'Madinat El Fekria', 'madinat-el-fekria', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(227, 11, 'ملوي', 'Meloy', 'meloy', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(228, 11, 'دير مواس', 'Deir Mawas', 'deir-mawas', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(229, 11, 'ابو قرقاص', 'Abu Qurqas', 'abu-qurqas', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(230, 11, 'ارض سلطان', 'Ard Sultan', 'ard-sultan', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(231, 12, 'بنها', 'Banha', 'banha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(232, 12, 'قليوب', 'Qalyub', 'qalyub', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(233, 12, 'شبرا الخيمة', 'Shubra Al Khaimah', 'shubra-al-khaimah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(234, 12, 'القناطر الخيرية', 'Al Qanater Charity', 'al-qanater-charity', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(235, 12, 'الخانكة', 'Khanka', 'khanka', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(236, 12, 'كفر شكر', 'Kafr Shukr', 'kafr-shukr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(237, 12, 'طوخ', 'Tukh', 'tukh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(238, 12, 'قها', 'Qaha', 'qaha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(239, 12, 'العبور', 'Obour', 'obour', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(240, 12, 'الخصوص', 'Khosous', 'khosous', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(241, 12, 'شبين القناطر', 'Shibin Al Qanater', 'shibin-al-qanater', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(242, 12, 'مسطرد', 'Mostorod', 'mostorod', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(243, 13, 'الخارجة', 'El Kharga', 'el-kharga', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(244, 13, 'باريس', 'Paris', 'paris', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(245, 13, 'موط', 'Mout', 'mout', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(246, 13, 'الفرافرة', 'Farafra', 'farafra', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(247, 13, 'بلاط', 'Balat', 'balat', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(248, 13, 'الداخلة', 'Dakhla', 'dakhla', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(249, 14, 'السويس', 'Suez', 'suez', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(250, 14, 'الجناين', 'Alganayen', 'alganayen', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(251, 14, 'عتاقة', 'Ataqah', 'ataqah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(252, 14, 'العين السخنة', 'Ain Sokhna', 'ain-sokhna', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(253, 14, 'فيصل', 'Faysal', 'faysal', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(254, 15, 'أسوان', 'Aswan', 'aswan', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(255, 15, 'أسوان الجديدة', 'Aswan El Gedida', 'aswan-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(256, 15, 'دراو', 'Drau', 'drau', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(257, 15, 'كوم أمبو', 'Kom Ombo', 'kom-ombo', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(258, 15, 'نصر النوبة', 'Nasr Al Nuba', 'nasr-al-nuba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(259, 15, 'كلابشة', 'Kalabsha', 'kalabsha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(260, 15, 'إدفو', 'Edfu', 'edfu', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(261, 15, 'الرديسية', 'Al-Radisiyah', 'al-radisiyah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(262, 15, 'البصيلية', 'Al Basilia', 'al-basilia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(263, 15, 'السباعية', 'Al Sibaeia', 'al-sibaeia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(264, 15, 'ابوسمبل السياحية', 'Abo Simbl Al Siyahia', 'abo-simbl-al-siyahia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(265, 15, 'مرسى علم', 'Marsa Alam', 'marsa-alam', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(266, 16, 'أسيوط', 'Assiut', 'assiut', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(267, 16, 'أسيوط الجديدة', 'Assiut El Gedida', 'assiut-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(268, 16, 'ديروط', 'Dayrout', 'dayrout', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(269, 16, 'منفلوط', 'Manfalut', 'manfalut', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(270, 16, 'القوصية', 'Qusiya', 'qusiya', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(271, 16, 'أبنوب', 'Abnoub', 'abnoub', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(272, 16, 'أبو تيج', 'Abu Tig', 'abu-tig', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(273, 16, 'الغنايم', 'El Ghanaim', 'el-ghanaim', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(274, 16, 'ساحل سليم', 'Sahel Selim', 'sahel-selim', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(275, 16, 'البداري', 'El Badari', 'el-badari', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(276, 16, 'صدفا', 'Sidfa', 'sidfa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(277, 17, 'بني سويف', 'Bani Sweif', 'bani-sweif', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(278, 17, 'بني سويف الجديدة', 'Beni Suef El Gedida', 'beni-suef-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(279, 17, 'الواسطى', 'Al Wasta', 'al-wasta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(280, 17, 'ناصر', 'Naser', 'naser', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(281, 17, 'إهناسيا', 'Ehnasia', 'ehnasia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(282, 17, 'ببا', 'beba', 'beba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(283, 17, 'الفشن', 'Fashn', 'fashn', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(284, 17, 'سمسطا', 'Somasta', 'somasta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(285, 17, 'الاباصيرى', 'Alabbaseri', 'alabbaseri', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(286, 17, 'مقبل', 'Mokbel', 'mokbel', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(287, 18, 'بورسعيد', 'PorSaid', 'porsaid', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(288, 18, 'بورفؤاد', 'Port Fouad', 'port-fouad', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(289, 18, 'العرب', 'Alarab', 'alarab', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(290, 18, 'حى الزهور', 'Zohour', 'zohour', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(291, 18, 'حى الشرق', 'Alsharq', 'alsharq', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(292, 18, 'حى الضواحى', 'Aldawahi', 'aldawahi', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(293, 18, 'حى المناخ', 'Almanakh', 'almanakh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(294, 18, 'حى مبارك', 'Mubarak', 'mubarak', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(295, 19, 'دمياط', 'Damietta', 'damietta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(296, 19, 'دمياط الجديدة', 'New Damietta', 'new-damietta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(297, 19, 'رأس البر', 'Ras El Bar', 'ras-el-bar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(298, 19, 'فارسكور', 'Faraskour', 'faraskour', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(299, 19, 'الزرقا', 'Zarqa', 'zarqa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(300, 19, 'السرو', 'alsaru', 'alsaru', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(301, 19, 'الروضة', 'alruwda', 'alruwda', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(302, 19, 'كفر البطيخ', 'Kafr El-Batikh', 'kafr-el-batikh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(303, 19, 'عزبة البرج', 'Azbet Al Burg', 'azbet-al-burg', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(304, 19, 'ميت أبو غالب', 'Meet Abou Ghalib', 'meet-abou-ghalib', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(305, 19, 'كفر سعد', 'Kafr Saad', 'kafr-saad', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(306, 20, 'الزقازيق', 'Zagazig', 'zagazig', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(307, 20, 'العاشر من رمضان', 'Al Ashr Men Ramadan', 'al-ashr-men-ramadan', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(308, 20, 'منيا القمح', 'Minya Al Qamh', 'minya-al-qamh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(309, 20, 'بلبيس', 'Belbeis', 'belbeis', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(310, 20, 'مشتول السوق', 'Mashtoul El Souq', 'mashtoul-el-souq', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(311, 20, 'القنايات', 'Qenaiat', 'qenaiat', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(312, 20, 'أبو حماد', 'Abu Hammad', 'abu-hammad', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(313, 20, 'القرين', 'El Qurain', 'el-qurain', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(314, 20, 'ههيا', 'Hehia', 'hehia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(315, 20, 'أبو كبير', 'Abu Kabir', 'abu-kabir', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(316, 20, 'فاقوس', 'Faccus', 'faccus', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(317, 20, 'الصالحية الجديدة', 'El Salihia El Gedida', 'el-salihia-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(318, 20, 'الإبراهيمية', 'Al Ibrahimiyah', 'al-ibrahimiyah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(319, 20, 'ديرب نجم', 'Deirb Negm', 'deirb-negm', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(320, 20, 'كفر صقر', 'Kafr Saqr', 'kafr-saqr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(321, 20, 'أولاد صقر', 'Awlad Saqr', 'awlad-saqr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(322, 20, 'الحسينية', 'Husseiniya', 'husseiniya', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(323, 20, 'صان الحجر القبلية', 'san alhajar alqablia', 'san-alhajar-alqablia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(324, 20, 'منشأة أبو عمر', 'Manshayat Abu Omar', 'manshayat-abu-omar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(325, 21, 'الطور', 'Al Toor', 'al-toor', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(326, 21, 'شرم الشيخ', 'Sharm El-Shaikh', 'sharm-el-shaikh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(327, 21, 'دهب', 'Dahab', 'dahab', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(328, 21, 'نويبع', 'Nuweiba', 'nuweiba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(329, 21, 'طابا', 'Taba', 'taba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(330, 21, 'سانت كاترين', 'Saint Catherine', 'saint-catherine', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(331, 21, 'أبو رديس', 'Abu Redis', 'abu-redis', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(332, 21, 'أبو زنيمة', 'Abu Zenaima', 'abu-zenaima', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(333, 21, 'رأس سدر', 'Ras Sidr', 'ras-sidr', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(334, 22, 'كفر الشيخ', 'Kafr El Sheikh', 'kafr-el-sheikh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(335, 22, 'وسط البلد كفر الشيخ', 'Kafr El Sheikh Downtown', 'kafr-el-sheikh-downtown', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(336, 22, 'دسوق', 'Desouq', 'desouq', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(337, 22, 'فوه', 'Fooh', 'fooh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(338, 22, 'مطوبس', 'Metobas', 'metobas', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(339, 22, 'برج البرلس', 'Burg Al Burullus', 'burg-al-burullus', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(340, 22, 'بلطيم', 'Baltim', 'baltim', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(341, 22, 'مصيف بلطيم', 'Masief Baltim', 'masief-baltim', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(342, 22, 'الحامول', 'Hamol', 'hamol', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(343, 22, 'بيلا', 'Bella', 'bella', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(344, 22, 'الرياض', 'Riyadh', 'riyadh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(345, 22, 'سيدي سالم', 'Sidi Salm', 'sidi-salm', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(346, 22, 'قلين', 'Qellen', 'qellen', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(347, 22, 'سيدي غازي', 'Sidi Ghazi', 'sidi-ghazi', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(348, 23, 'مرسى مطروح', 'Marsa Matrouh', 'marsa-matrouh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(349, 23, 'الحمام', 'El Hamam', 'el-hamam', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(350, 23, 'العلمين', 'Alamein', 'alamein', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(351, 23, 'الضبعة', 'Dabaa', 'dabaa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(352, 23, 'النجيلة', 'Al-Nagila', 'al-nagila', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(353, 23, 'سيدي براني', 'Sidi Brani', 'sidi-brani', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(354, 23, 'السلوم', 'Salloum', 'salloum', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(355, 23, 'سيوة', 'Siwa', 'siwa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(356, 23, 'مارينا', 'Marina', 'marina', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(357, 23, 'الساحل الشمالى', 'North Coast', 'north-coast', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(358, 24, 'الأقصر', 'Luxor', 'luxor', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(359, 24, 'الأقصر الجديدة', 'New Luxor', 'new-luxor', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(360, 24, 'إسنا', 'Esna', 'esna', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(361, 24, 'طيبة الجديدة', 'New Tiba', 'new-tiba', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(362, 24, 'الزينية', 'Al ziynia', 'al-ziynia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(363, 24, 'البياضية', 'Al Bayadieh', 'al-bayadieh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(364, 24, 'القرنة', 'Al Qarna', 'al-qarna', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(365, 24, 'أرمنت', 'Armant', 'armant', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(366, 24, 'الطود', 'Al Tud', 'al-tud', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(367, 25, 'قنا', 'Qena', 'qena', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(368, 25, 'قنا الجديدة', 'New Qena', 'new-qena', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(369, 25, 'ابو طشت', 'Abu Tesht', 'abu-tesht', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(370, 25, 'نجع حمادي', 'Nag Hammadi', 'nag-hammadi', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(371, 25, 'دشنا', 'Deshna', 'deshna', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(372, 25, 'الوقف', 'Alwaqf', 'alwaqf', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(373, 25, 'قفط', 'Qaft', 'qaft', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(374, 25, 'نقادة', 'Naqada', 'naqada', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(375, 25, 'فرشوط', 'Farshout', 'farshout', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(376, 25, 'قوص', 'Quos', 'quos', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(377, 26, 'العريش', 'Arish', 'arish', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(378, 26, 'الشيخ زويد', 'Sheikh Zowaid', 'sheikh-zowaid', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(379, 26, 'نخل', 'Nakhl', 'nakhl', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(380, 26, 'رفح', 'Rafah', 'rafah', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(381, 26, 'بئر العبد', 'Bir al-Abed', 'bir-al-abed', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(382, 26, 'الحسنة', 'Al Hasana', 'al-hasana', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(383, 27, 'سوهاج', 'Sohag', 'sohag', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(384, 27, 'سوهاج الجديدة', 'Sohag El Gedida', 'sohag-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(385, 27, 'أخميم', 'Akhmeem', 'akhmeem', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(386, 27, 'أخميم الجديدة', 'Akhmim El Gedida', 'akhmim-el-gedida', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(387, 27, 'البلينا', 'Albalina', 'albalina', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(388, 27, 'المراغة', 'El Maragha', 'el-maragha', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(389, 27, 'المنشأة', 'almunsha\'a', 'almunshaa', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(390, 27, 'دار السلام', 'Dar AISalaam', 'dar-aisalaam', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(391, 27, 'جرجا', 'Gerga', 'gerga', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(392, 27, 'جهينة الغربية', 'Jahina Al Gharbia', 'jahina-al-gharbia', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(393, 27, 'ساقلته', 'Saqilatuh', 'saqilatuh', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(394, 27, 'طما', 'Tama', 'tama', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(395, 27, 'طهطا', 'Tahta', 'tahta', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02'),
(396, 27, 'الكوثر', 'Alkawthar', 'alkawthar', NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02');

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
(1, 'Super Admin', 'admin', '2022-05-01 23:47:02', '2022-05-01 23:47:02');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '[0 = مفعل] [1 = غير مفعل]',
  `start_date` date DEFAULT NULL COMMENT 'تاريخ بدايه التفعيل',
  `expiry_date` date DEFAULT NULL COMMENT 'تاريخ انتهاءالتفعيل',
  `deleted_at` timestamp NULL DEFAULT NULL,
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
(1, 'Brand', '01024346010', NULL, '$2y$10$89G597vd5H18.Y1AfBWNxeuIrfRgMqbe/QMYlgDzZeJXgR0Cu7Jey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-01 23:47:02', '2022-05-01 23:47:02');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
