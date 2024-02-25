-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 08:18 PM
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
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(50) NOT NULL,
  `governorate_id` varchar(50) DEFAULT NULL COMMENT 'رقم المحافظة',
  `district_id` varchar(50) DEFAULT NULL COMMENT 'رقم القضاء',
  `area_id` varchar(50) DEFAULT NULL COMMENT 'رقم الناحية',
  `area_name` varchar(50) DEFAULT NULL COMMENT 'اسم الناحية',
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `governorate_id`, `district_id`, `area_id`, `area_name`, `created_at`, `updated_at`) VALUES
(4, '1', '1', '1', 'الثغر', '2024-02-23 18:10:45', '2024-02-23 18:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(50) NOT NULL,
  `governorate_id` varchar(50) DEFAULT NULL COMMENT 'رقم المحافظة',
  `district_number` varchar(50) DEFAULT NULL COMMENT 'رقم القضاء',
  `district_name` varchar(50) DEFAULT NULL COMMENT 'اسم القضاء',
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `governorate_id`, `district_number`, `district_name`, `created_at`, `updated_at`) VALUES
(12, '1', '2', 'الهارثه', '2024-02-25 09:42:24', '2024-02-25 09:42:24'),
(13, '2', '4', 'err', '2024-02-25 10:18:40', '2024-02-25 10:18:40'),
(14, '2', '6', 'بييبل', '2024-02-25 10:41:00', '2024-02-25 10:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `email_send`
--

CREATE TABLE `email_send` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sender` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_send`
--

INSERT INTO `email_send` (`id`, `users_id`, `email`, `subject`, `message`, `sender`, `created_at`, `updated_at`) VALUES
(1, 2, 'hm.hisham@gmail.com', 'مؤتمر الطقس', 'نود اعلامكم بان موعد المؤتمر اصبح قريباً جداً.\nالرجاء من حضرتكم الاستعداد', 1, '2024-01-09 19:11:43', '2024-01-09 19:11:43'),
(2, 2, 'hm.hisham@gmail.com', 'مؤتمر الطقس', 'نود اعلامكم بان موعد المؤتمر اصبح قريباً جداً.\nالرجاء من حضرتكم الاستعداد', 1, '2024-01-09 19:12:57', '2024-01-09 19:12:57'),
(3, 2, 'hm.hisham@gmail.com', 'رسالة', 'رسالة مرسلة', 1, '2024-01-09 19:14:30', '2024-01-09 19:14:30'),
(4, 2, 'hm.hisham@gmail.com', 'رسالة', 'رسالة مرسلة', 1, '2024-01-09 19:16:11', '2024-01-09 19:16:11'),
(5, 2, 'hm.hisham@gmail.com', 'رسالة', 'رسالة مرسلة', 1, '2024-01-09 19:16:58', '2024-01-09 19:16:58'),
(6, 2, 'hm.hisham@gmail.com', 'qwe', '123', 1, '2024-01-10 00:15:44', '2024-01-10 00:15:44'),
(7, 2, 'hm.hisham@gmail.com', 'hellow', 'test', 1, '2024-01-10 00:19:26', '2024-01-10 00:19:26'),
(8, 2, 'hm.hisham@gmail.com', 'hellow', 'test', 1, '2024-01-10 00:25:01', '2024-01-10 00:25:01'),
(9, 2, 'hm.hisham@gmail.com', 'hellow', 'test', 1, '2024-01-10 00:40:06', '2024-01-10 00:40:06'),
(10, 2, 'hm.hisham@gmail.com', 'test', 'test-002', 1, '2024-01-10 03:38:17', '2024-01-10 03:38:17'),
(11, 2, 'hm.hisham@gmail.com', 'test', 'test-002', 1, '2024-01-10 03:43:00', '2024-01-10 03:43:00'),
(12, 2, 'hm.hisham@gmail.com', 'test', 'test-001', 1, '2024-01-10 03:45:04', '2024-01-10 03:45:04'),
(13, 2, 'hm.hisham@gmail.com', 'test', 'test-001', 1, '2024-01-10 05:57:49', '2024-01-10 05:57:49'),
(14, 2, 'hm.hisham@gmail.com', 'Test', 'Rest-001', 1, '2024-01-10 12:49:59', '2024-01-10 12:49:59'),
(15, 2, 'hm.hisham@gmail.com', 'Test', 'Test-001', 1, '2024-01-10 13:06:50', '2024-01-10 13:06:50'),
(16, 2, 'hm.hisham@gmail.com', 'Test', 'Test-002', 1, '2024-01-10 15:25:11', '2024-01-10 15:25:11'),
(17, 2, 'hm.hisham@gmail.com', 'Test', 'Test-003', 1, '2024-01-10 17:41:25', '2024-01-10 17:41:25'),
(18, 2, 'hm.hisham@gmail.com', 'Test', 'Test-001', 1, '2024-01-10 19:42:32', '2024-01-10 19:42:32'),
(19, 2, 'hm.hisham@gmail.com', 'weq', '231', 1, '2024-01-10 19:44:53', '2024-01-10 19:44:53'),
(20, 2, 'hm.hisham@gmail.com', 'Test-002', 'Test-002', 1, '2024-01-10 19:49:08', '2024-01-10 19:49:08'),
(21, 2, 'essam@gmail.com', 'asda', 'asda', 1, '2024-01-10 19:51:16', '2024-01-10 19:51:16'),
(22, 2, 'essam@gmail.com', 'qweq', 'qweqwe', 1, '2024-01-10 19:52:23', '2024-01-10 19:52:23'),
(23, 2, 'hm.hisham@gmail.com', 'Test-002', 'Test-002', 1, '2024-01-10 19:53:09', '2024-01-10 19:53:09'),
(24, 2, 'hm.hisham@gmail.com', 'Test-002', 'Test-002', 1, '2024-01-10 19:56:56', '2024-01-10 19:56:56'),
(25, 2, 'hm.hisham@gmail.com', 'Clean Code', '\"return (new MailMessage)\n            ->from(\'m_hashem@apps-store.net\', \'JAZ\')\n            ->cc(\'basrah.amazon@gmail.com\', \'Hisham Ahmed\')\n            ->subject($this->emailSend->subject)\n            ->view(\'content.mail.send-email-customer\', [\n                \'emailSend\' => $this->emailSend,\n                \'CustomerAccount\' => $CustomerAccount,\n            ]);\"', 1, '2024-01-11 00:35:14', '2024-01-11 00:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(50) NOT NULL,
  `JobNumber` varchar(50) DEFAULT NULL COMMENT 'الرقم الوظيفي',
  `FileNumber` varchar(50) DEFAULT NULL COMMENT 'رقم الاضبارة',
  `FirstName` varchar(50) DEFAULT NULL COMMENT 'الاسم الأول',
  `SecondName` varchar(50) DEFAULT NULL COMMENT 'الاسم الثاني',
  `ThirdName` varchar(50) DEFAULT NULL COMMENT 'الاسم الثالث',
  `FourthName` varchar(50) DEFAULT NULL COMMENT 'الاسم الرابع',
  `LastName` varchar(50) DEFAULT NULL COMMENT 'اللقب',
  `FullName` varchar(50) DEFAULT NULL COMMENT 'الاسم الكامل',
  `MotherName` varchar(50) DEFAULT NULL COMMENT 'اسم الام',
  `MotherFatherName` varchar(50) DEFAULT NULL COMMENT 'اسم والد الام',
  `MotherGrandName` varchar(50) DEFAULT NULL COMMENT 'اسم جد الام',
  `MotherLastName` varchar(50) DEFAULT NULL COMMENT 'لقب الام',
  `FullMothersName` varchar(50) DEFAULT NULL COMMENT 'اسم الام الكامل',
  `Status` varchar(50) DEFAULT NULL COMMENT 'الحالة',
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `JobNumber`, `FileNumber`, `FirstName`, `SecondName`, `ThirdName`, `FourthName`, `LastName`, `FullName`, `MotherName`, `MotherFatherName`, `MotherGrandName`, `MotherLastName`, `FullMothersName`, `Status`, `created_at`, `updated_at`) VALUES
(33, 'sdfsdf', 'sdf', 'sdf', 'yutrew', 'rtgdrsfa', 'gerfsd', 'sdfs', 'sdf yutrew rtgdrsfa', 'trhgdfsx', 'fsdf', 'fsd', 'trgdfxc', 'tghdfxczx', 'sdfsdf', '2024-02-21 08:42:50', '2024-02-21 08:42:50'),
(34, 'kjythytrewq', 'gdfscxz', 'tyehgfsdvcsx', 'tyhrgfdsc', 'gdfvxc ', 'ghfdsc', 'fgdsvxcz', 'tyehgfsdvcsx tyhrgfdsc gdfvxc ', 'tyhgfdvc', 'tyhergsdfsc', 'ythrgfsdvcxz', 'trehgfds', 'terhgsfdvc', 'tyhgfdvcxz', '2024-02-21 08:43:03', '2024-02-21 08:43:03'),
(41, '12', '33', 'ياس', 'خضر', 'سالم', 'حسين', 'الماجدي', 'ياس خضر سالم حسين', 'جليلة', 'رحيم', 'صباح', 'الماجدي', 'جليلة رحيم صباح الماجدي', 'فعال', '2024-02-23 13:11:17', '2024-02-23 13:11:17'),
(42, 'df', 'df', 'df', 'df', 'df', 'df', 'df', 'df df df df', 'df', 'df', 'df', 'df', 'df df df df', 'dffd', '2024-02-23 16:10:37', '2024-02-23 16:10:37'),
(43, 'dfdf', 'wefv', 'cesfdcdf', 'dvesdfvx', 'fd', 'wesdvcx df', 'sdcxdscxdf', 'cesfdcdf dvesdfvx fd wesdvcx df', 'esdvcx df', 'esdvcx df', 'esdcx df', 'sdxcdf', 'esdvcx df esdvcx df esdcx df sdxcdf', 'dfdfdf', '2024-02-23 16:11:28', '2024-02-23 16:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `event_start_date`, `event_end_date`, `price`, `photo`, `type`, `status`, `active`, `author`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'معرض أربيل الدولي للأزياء والنسيج (نمط أربيل) في العراق - أربيل', 'Erbil International Exhibition of Fashion & Textile (ERBIL STYLE) in Iraq-Erbil', 'معرض أربيل الدولي للأزياء والنسيج (نمط أربيل) في ا...', 'Erbil International Exhibition of Fashion & Textile (ERBIL STYLE) in Iraq-Erbil', '2024-01-22', '2024-01-24', '16000', 'Pbzn9h27EnI6O5wTd5MhWqBCRF26fmoJWrShEkmh.png', 'published', '1', 1, 1, '2024-01-19 09:32:09', '2024-02-10 06:11:07', NULL),
(4, 'المعرض الرمضاني الدولي للتسوق (مهرجان رمضان) العراق - اربيل', 'International Ramadan Shopping Exhibition (Ramadan Festival), Iraq - Erbil', 'المعرض الرمضاني الدولي للتسوق (مهرجان رمضان) العراق - اربيل', 'International Ramadan Shopping Exhibition (RAMADAN FEST) Iraq - Erbil', '2024-01-31', '2024-02-03', '14000', 'aJmRKCl0hPbft5nBVf0Yfl3we7Alrp-metaYm95LXZlcmlmeS1lbWFpbC1kYXJrLnBuZw==-.png', 'published', '2', 1, 1, '2024-01-19 11:34:26', '2024-02-10 06:03:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_ar`
--

CREATE TABLE `events_ar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `events_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_ar`
--

INSERT INTO `events_ar` (`id`, `events_id`, `title`, `description`, `event_start_date`, `event_end_date`, `price`, `photo`, `type`, `status`, `active`, `author`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'عنوان2', 'تفاصيل2', '2024-01-22', '2024-01-24', '16000', 'Pbzn9h27EnI6O5wTd5MhWqBCRF26fmoJWrShEkmh.png', 'published', NULL, 1, 1, '2024-01-19 10:53:01', '2024-01-22 11:51:09', NULL),
(4, 4, 'عنوان1', 'تفاصيل1', '2024-01-31', '2024-02-03', '14000', 'aJmRKCl0hPbft5nBVf0Yfl3we7Alrp-metaYm95LXZlcmlmeS1lbWFpbC1kYXJrLnBuZw==-.png', 'published', NULL, 1, 1, '2024-01-19 11:34:26', '2024-01-22 11:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_en`
--

CREATE TABLE `events_en` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `events_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_en`
--

INSERT INTO `events_en` (`id`, `events_id`, `title`, `description`, `event_start_date`, `event_end_date`, `price`, `photo`, `type`, `status`, `active`, `author`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'title2', 'discrption2', '2024-01-22', '2024-01-24', '16000', 'Pbzn9h27EnI6O5wTd5MhWqBCRF26fmoJWrShEkmh.png', 'published', NULL, 1, 1, '2024-01-19 10:53:41', '2024-01-22 11:51:09', NULL),
(2, 4, 'title1', 'discrption1', '2024-01-31', '2024-02-03', '14000', 'aJmRKCl0hPbft5nBVf0Yfl3we7Alrp-metaYm95LXZlcmlmeS1lbWFpbC1kYXJrLnBuZw==-.png', 'published', NULL, 1, 1, '2024-01-19 11:34:26', '2024-01-22 11:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_photos`
--

CREATE TABLE `events_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `events_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
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
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(50) NOT NULL,
  `governorate_number` varchar(50) DEFAULT NULL COMMENT 'رقم المحافظة',
  `governorate_name` varchar(50) DEFAULT NULL COMMENT 'اسم المحافظة',
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `governorate_number`, `governorate_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'البصرة', '2024-02-23 15:31:59', '2024-02-23 15:31:59'),
(7, '2', 'العماره', '2024-02-23 21:40:18', '2024-02-23 21:40:18'),
(8, '3', 'الناصرية', '2024-02-23 21:40:25', '2024-02-23 21:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `infooffice`
--

CREATE TABLE `infooffice` (
  `id` int(50) NOT NULL,
  `Infooffice_id` varchar(50) DEFAULT NULL COMMENT 'رقم',
  `Infooffice_name` varchar(50) DEFAULT NULL COMMENT 'مكتب معلومات بطاقة السكن',
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infooffice`
--

INSERT INTO `infooffice` (`id`, `Infooffice_id`, `Infooffice_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'البصرة', '2024-02-23 18:45:26', '2024-02-23 18:56:14'),
(3, '2', 'الناصرية', '2024-02-23 18:54:55', '2024-02-23 18:55:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2023_06_06_055639_create_sessions_table', 2),
(7, '2023_06_08_153758_add_last_seen_to_users_table', 2),
(8, '2023_06_08_165150_create_permission_tables', 2),
(9, '2024_01_09_183218_create_email_send_table', 3),
(11, '2024_01_11_193359_create_events_photos_table', 5),
(12, '2024_01_11_130247_create_events_ar_table', 6),
(13, '2024_01_11_130248_create_events_en_table', 7),
(14, '2024_01_11_130246_create_events_table', 8),
(15, '2024_02_11_092308_create_slideshow_table', 9),
(16, '2024_02_13_174314_create_employees_table', 10),
(17, '2024_02_17_025346_create_employees_table', 11),
(18, '2024_02_23_144029_create_governorates_table', 12),
(19, '2024_02_23_165600_create_districts_table', 13),
(20, '2024_02_23_174556_create_areas_table', 14),
(21, '2024_02_23_175934_create_areas_table', 15),
(22, '2024_02_23_182432_create_infooffice_table', 16);

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
(2, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 2);

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
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permissions-roles', 'web', '2024-01-01 03:02:02', '2024-01-01 03:02:02'),
(2, 'permissions', 'web', '2024-01-01 03:02:19', '2024-01-01 03:02:19'),
(3, 'permission-list', 'web', '2024-01-01 03:02:44', '2024-01-01 03:02:44'),
(4, 'permission-create', 'web', '2024-01-01 03:02:57', '2024-01-01 03:02:57'),
(5, 'permission-edit', 'web', '2024-01-01 03:03:18', '2024-01-01 03:03:18'),
(6, 'permission-delete', 'web', '2024-01-01 03:03:26', '2024-01-01 03:03:26'),
(7, 'roles', 'web', '2024-01-01 03:03:40', '2024-01-01 03:03:40'),
(8, 'role-list', 'web', '2024-01-01 03:03:51', '2024-01-01 03:03:51'),
(9, 'role--create', 'web', '2024-01-01 03:03:57', '2024-01-01 03:03:57'),
(10, 'role-edit', 'web', '2024-01-01 03:04:03', '2024-01-01 03:04:03'),
(11, 'role-delete', 'web', '2024-01-01 03:04:07', '2024-01-01 03:04:07'),
(12, 'users', 'web', '2024-01-01 11:00:09', '2024-01-01 11:00:09'),
(13, 'user-list', 'web', '2024-01-01 11:00:18', '2024-01-01 11:00:18'),
(14, 'user-create', 'web', '2024-01-01 11:00:23', '2024-01-01 11:00:23'),
(15, 'user-edit', 'web', '2024-01-01 11:00:41', '2024-01-01 11:00:41'),
(16, 'user-delete', 'web', '2024-01-01 11:00:49', '2024-01-01 11:00:49'),
(17, 'customers', 'web', '2024-01-01 17:19:20', '2024-01-01 17:19:20'),
(18, 'customer-list', 'web', '2024-01-01 17:19:28', '2024-01-01 17:19:28'),
(19, 'customer-create', 'web', '2024-01-01 17:19:45', '2024-01-01 17:19:45'),
(20, 'customer-edit', 'web', '2024-01-01 17:19:50', '2024-01-01 17:19:50'),
(21, 'customer-delete', 'web', '2024-01-01 17:20:02', '2024-01-01 17:20:02'),
(22, 'events', 'web', '2024-01-11 10:24:39', '2024-01-11 10:24:39'),
(23, 'event-list', 'web', '2024-01-11 10:24:44', '2024-01-11 10:24:44'),
(24, 'event-create', 'web', '2024-01-11 10:24:50', '2024-01-11 10:24:50'),
(25, 'event-edit', 'web', '2024-01-11 10:24:54', '2024-01-11 10:24:54'),
(26, 'event-delete', 'web', '2024-01-11 10:25:01', '2024-01-11 10:25:01'),
(27, 'employees', 'web', '2024-02-14 19:12:25', '2024-02-14 19:12:25'),
(28, 'employee-create', 'web', '2024-02-14 19:12:34', '2024-02-14 19:12:34'),
(29, 'employee-list', 'web', '2024-02-14 19:12:42', '2024-02-14 19:12:42'),
(30, 'employee-edit', 'web', '2024-02-19 17:15:47', '2024-02-19 17:15:47'),
(31, 'employee-delete', 'web', '2024-02-19 17:15:56', '2024-02-19 17:15:56'),
(32, 'governorates', 'web', '2024-02-23 11:46:01', '2024-02-23 11:46:01'),
(33, 'governorate-create', 'web', '2024-02-23 12:13:31', '2024-02-23 12:20:51'),
(34, 'governorate-list', 'web', '2024-02-23 12:13:39', '2024-02-23 12:23:56'),
(35, 'governorate-edit', 'web', '2024-02-23 12:13:46', '2024-02-23 12:24:05'),
(36, 'governorate-delete', 'web', '2024-02-23 12:13:53', '2024-02-23 12:24:11'),
(37, 'district-create', 'web', '2024-02-23 14:04:28', '2024-02-23 14:04:28'),
(38, 'district-list', 'web', '2024-02-23 14:04:38', '2024-02-23 14:04:38'),
(39, 'district-edit', 'web', '2024-02-23 14:04:44', '2024-02-23 14:04:44'),
(40, 'district-delete', 'web', '2024-02-23 14:04:52', '2024-02-23 14:04:52'),
(41, 'areas', 'web', '2024-02-23 14:47:47', '2024-02-23 14:47:47'),
(42, 'area-create', 'web', '2024-02-23 14:47:58', '2024-02-23 14:47:58'),
(43, 'area-list', 'web', '2024-02-23 14:48:04', '2024-02-23 14:48:04'),
(44, 'area-edit', 'web', '2024-02-23 14:48:12', '2024-02-23 14:48:12'),
(45, 'area-delete', 'web', '2024-02-23 14:48:18', '2024-02-23 14:48:18'),
(46, 'infooffice', 'web', '2024-02-23 15:26:40', '2024-02-23 15:26:40'),
(47, 'infooffic-create', 'web', '2024-02-23 15:26:49', '2024-02-23 15:26:49'),
(48, 'infooffic-list', 'web', '2024-02-23 15:26:57', '2024-02-23 15:26:57'),
(49, 'infooffic-edit', 'web', '2024-02-23 15:27:04', '2024-02-23 15:27:04'),
(50, 'infooffic-delete', 'web', '2024-02-23 15:27:11', '2024-02-23 15:27:11');

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
(1, 'OWNER', 'web', '2024-01-01 03:04:33', '2024-01-01 03:04:33'),
(2, 'Administrator', 'web', '2024-01-01 11:10:00', '2024-01-01 11:10:00'),
(3, 'Supervisor', 'web', '2024-01-01 11:10:28', '2024-01-01 11:10:28'),
(4, 'Employee', 'web', '2024-01-01 11:10:51', '2024-01-01 17:21:44'),
(5, 'Customer', 'web', '2024-01-01 11:11:01', '2024-01-01 11:11:01');

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
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

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
('yj4CO8GXe6qY30Tbi8cm4K0yDwCpaB6K8Hipk4ge', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZkZwMXR3bXU2dGI1dEFqR09lT2FUR1hQdEhvSVpzQm5idWNua2RSNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvRGlzdHJpY3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGo0ZnlzbmFpeVdGcHNtQkk1R2J5cE9qSkpnQXdzRGpJR2hSc1ZPVFQ3YWEzb3U2TUdZckZXIjt9', 1708857660);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `description`, `filename`, `seq`, `created_at`, `updated_at`) VALUES
(1, 'JOINT ANNUAL ZONE', ' نحن نقدم المؤتمر الشامل خدمات الإدارة ، بما في ذلك اختيار المكان ، المتحدث مانا الأحجار الكريمة وإدارة التسجيل وتسويق الأحداث والموقع يدعم.', 'C:\\Users\\HISHAM\\AppData\\Local\\Temp\\php5B89.tmp', NULL, '2024-02-11 07:07:27', '2024-02-12 18:29:39'),
(2, 'T002', 'D002', 'fJbsNddmIL.png', NULL, '2024-02-11 07:11:46', '2024-02-11 07:11:46'),
(3, 'T003', 'D003', 'j9JBD3vwXK.png', NULL, '2024-02-11 07:26:11', '2024-02-12 06:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `plan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `plan`, `status`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `last_seen`) VALUES
(1, 'Hisham Ahmed', 'hm.hisham@gmail.com', NULL, '$2y$12$j4fysnaiyWFpsmBI5GbypOjJJgAwsDjIGhRsVOTT7aa3ou6MGYrFW', 'Supervisor', 1, NULL, NULL, NULL, NULL, '2023-12-17 16:32:14', '2024-02-25 07:41:00', NULL, '2024-02-25 07:41:00'),
(2, 'عصام محمد', 'essam@gmail.com', NULL, '$2y$10$or6YPxokAwL35tRMYQB3bewZ2I3oIwJeQ6fHBQg1nRXYo0jk0hlbu', 'Customer', 1, NULL, NULL, NULL, NULL, '2024-01-01 17:34:05', '2024-02-10 03:45:55', NULL, NULL),
(3, 'حسنين', 'hassaneen@gmail.com', NULL, '$2y$10$U7..ENhe.feRHuYneeljMujrRRSw6qUF842eJNgaKOX9fJXQbsNIe', 'Supervisor', 1, NULL, NULL, NULL, NULL, '2024-01-02 16:14:30', '2024-01-04 14:50:30', NULL, '2024-01-04 14:50:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_send`
--
ALTER TABLE `email_send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_ar`
--
ALTER TABLE `events_ar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_en`
--
ALTER TABLE `events_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_photos`
--
ALTER TABLE `events_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infooffice`
--
ALTER TABLE `infooffice`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `email_send`
--
ALTER TABLE `email_send`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events_ar`
--
ALTER TABLE `events_ar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events_en`
--
ALTER TABLE `events_en`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events_photos`
--
ALTER TABLE `events_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `infooffice`
--
ALTER TABLE `infooffice`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
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
