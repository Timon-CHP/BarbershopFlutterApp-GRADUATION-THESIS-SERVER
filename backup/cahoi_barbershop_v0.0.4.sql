-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 27, 2022 lúc 03:20 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cahoi_barbershop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_money` int(11) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) NOT NULL,
  `discount_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_products`
--

CREATE TABLE `bill_products` (
  `quantity` int(11) NOT NULL DEFAULT 1,
  `bill_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `delivery_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_delivery_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delivery_fast` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_services`
--

CREATE TABLE `category_services` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_services`
--

INSERT INTO `category_services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hair cut/styling', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(2, 'Hair dying', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(3, 'Curling hair', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(4, 'More', '2022-01-26 19:16:23', '2022-01-26 19:16:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dates`
--

CREATE TABLE `dates` (
  `id` bigint(20) NOT NULL,
  `full_date` date NOT NULL,
  `day_of_month` int(11) NOT NULL,
  `month` date NOT NULL,
  `year` date NOT NULL,
  `is_holiday` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `date_employees`
--

CREATE TABLE `date_employees` (
  `id` bigint(20) NOT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `date_id` bigint(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NONE',
  `name` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_discount` int(11) NOT NULL,
  `start_applying_at` datetime NOT NULL,
  `end_applying_at` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL DEFAULT '1990-01-01',
  `skill_rate` double NOT NULL,
  `communication_rate` double NOT NULL,
  `is_working` tinyint(1) NOT NULL COMMENT 'nhân viên này còn làm việc hay không',
  `work_schedule` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'lịch làm việc theo tuần của nhân viên',
  `position_id` int(11) NOT NULL,
  `workplace_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `name`, `birthday`, `skill_rate`, `communication_rate`, `is_working`, `work_schedule`, `position_id`, `workplace_id`, `created_at`, `updated_at`) VALUES
(1, 'Greyson Murazik', '1975-12-14', 4.7, 3.8, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(2, 'Cristopher Boyle', '2019-06-30', 3.5, 4.5, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(3, 'Prof. Izabella Hintz', '1972-01-06', 4, 4.9, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(4, 'Ofelia Considine DVM', '1975-05-07', 4.7, 3.7, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(5, 'Angeline Kuphal IV', '1995-09-13', 3.8, 3.9, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(6, 'Rigoberto Hagenes Jr.', '1977-11-23', 4.9, 4.9, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(7, 'Alysa Denesik', '1997-10-15', 4.1, 4.4, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(8, 'Antonetta Cole', '2021-02-07', 3.7, 4.2, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(9, 'Philip Beatty II', '1982-02-20', 4.1, 5, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(10, 'Ms. Florence Padberg PhD', '1992-08-14', 4.9, 4.8, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(11, 'Leatha Stokes', '2009-10-02', 4.3, 4.1, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(12, 'Hallie Carroll Sr.', '1992-02-19', 4.6, 4, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(13, 'Emile Rice', '2013-07-03', 4.6, 4.3, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(14, 'Wellington Cassin', '1998-06-04', 4.2, 4, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(15, 'Carol Lind', '1993-12-14', 4.2, 4.4, 1, 'aaaaa', 4, 1, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(16, 'Kaylah DuBuque', '2017-10-28', 4.6, 3.6, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(17, 'Bobby Swaniawski', '1996-05-14', 3.6, 4.6, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(18, 'Amira Rippin', '2006-04-09', 4, 4, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(19, 'Kadin Bode', '1989-04-21', 4.8, 3.8, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(20, 'Prof. Leonie Schuster DDS', '2008-01-02', 3.5, 4.6, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(21, 'Kellie Mraz', '2008-06-27', 4.7, 4.4, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(22, 'Prof. Norberto Rohan', '1970-11-13', 4, 4, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(23, 'Alexzander Pollich', '1984-11-18', 4.9, 4.5, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(24, 'Prof. Bianka Oberbrunner Sr.', '1976-09-24', 3.6, 4.1, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(25, 'Joel Graham V', '2001-05-17', 4.4, 3.6, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(26, 'Hassie Robel', '1981-05-02', 3.9, 5, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(27, 'Sterling Anderson', '2005-10-16', 4.7, 5, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(28, 'Hector Wolf', '2000-03-17', 4.9, 4.2, 1, 'aaaaa', 4, 1, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(29, 'Lester Hilpert', '1977-07-22', 3.6, 4.6, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(30, 'Ole Leffler', '2013-01-07', 4.7, 4.9, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(31, 'Axel Morar', '2008-08-16', 3.8, 4, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(32, 'Dr. Rahul Rippin PhD', '1974-09-05', 4.2, 3.7, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(33, 'Lamont Bashirian PhD', '2004-03-05', 4.6, 5, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(34, 'Golda Pfannerstill', '2009-12-25', 3.8, 4.5, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(35, 'Elias Beier', '2021-12-05', 4, 4.3, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(36, 'Prof. Jedidiah Conn', '1982-12-21', 4.3, 4.7, 1, 'aaaaa', 4, 5, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(37, 'Nikki Morissette', '1978-06-21', 4.6, 3.5, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(38, 'Jalon Bartell', '1972-10-01', 3.6, 4.9, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(39, 'Nicolas Wisozk', '1999-12-30', 4.1, 3.6, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(40, 'Gonzalo Reynolds MD', '1984-01-30', 3.5, 3.5, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(41, 'Uriel Hane', '2009-08-12', 3.7, 3.8, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(42, 'Toby Mann', '1985-01-08', 4.1, 4.3, 1, 'aaaaa', 4, 4, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(43, 'Mrs. Alverta Cummerata II', '1990-10-10', 3.7, 4.8, 1, 'aaaaa', 4, 1, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(44, 'Marques Stroman', '1985-06-25', 3.6, 4.3, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(45, 'Miss Callie Beahan', '2008-02-03', 4.2, 3.5, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(46, 'Sister Zemlak', '1989-08-17', 3.7, 3.6, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(47, 'Mrs. Minnie Turcotte II', '2004-10-13', 3.7, 4.5, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(48, 'Ralph Kuhn', '1988-03-15', 4.4, 4, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(49, 'Maritza Predovic', '1985-11-28', 4.9, 3.8, 1, 'aaaaa', 4, 3, '2022-01-26 19:16:26', '2022-01-26 19:16:26'),
(50, 'Prof. Issac Powlowski', '1974-08-10', 4.5, 3.8, 1, 'aaaaa', 4, 2, '2022-01-26 19:16:26', '2022-01-26 19:16:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_20_043353_create_bill_products_table', 1),
(3, '2022_01_20_043353_create_bills_table', 1),
(4, '2022_01_20_043353_create_category_products_table', 1),
(5, '2022_01_20_043353_create_category_services_table', 1),
(6, '2022_01_20_043353_create_discounts_table', 1),
(7, '2022_01_20_043353_create_employees_table', 1),
(8, '2022_01_20_043353_create_manufacturers_table', 1),
(9, '2022_01_20_043353_create_positions_table', 1),
(10, '2022_01_20_043353_create_products_table', 1),
(11, '2022_01_20_043353_create_rank_members_table', 1),
(12, '2022_01_20_043353_create_roles_table', 1),
(13, '2022_01_20_043353_create_services_table', 1),
(14, '2022_01_20_043353_create_task_services_table', 1),
(15, '2022_01_20_043353_create_tasks_table', 1),
(16, '2022_01_20_043353_create_user_products_table', 1),
(17, '2022_01_20_043353_create_users_table', 1),
(18, '2022_01_20_043353_create_workplaces_table', 1),
(19, '2022_01_20_043354_add_foreign_keys_to_bill_products_table', 1),
(20, '2022_01_20_043354_add_foreign_keys_to_bills_table', 1),
(21, '2022_01_20_043354_add_foreign_keys_to_employees_table', 1),
(22, '2022_01_20_043354_add_foreign_keys_to_products_table', 1),
(23, '2022_01_20_043354_add_foreign_keys_to_services_table', 1),
(24, '2022_01_20_043354_add_foreign_keys_to_task_services_table', 1),
(25, '2022_01_20_043354_add_foreign_keys_to_tasks_table', 1),
(26, '2022_01_20_043354_add_foreign_keys_to_user_products_table', 1),
(27, '2022_01_20_043354_add_foreign_keys_to_users_table', 1),
(28, '2022_01_26_103829_create_dates_table', 1),
(29, '2022_01_26_104426_create_date_employees_table', 1),
(30, '2022_01_26_105355_add_foreign_keys_to_date_employees_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cashier', '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(2, 'Intern', '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(3, 'Management', '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(4, 'Style', '2022-01-26 19:16:25', '2022-01-26 19:16:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_manual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` int(11) DEFAULT NULL,
  `category_product_id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rank_members`
--

CREATE TABLE `rank_members` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rank_members`
--

INSERT INTO `rank_members` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(2, 'Silver', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(3, 'Gold', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(4, 'Diamond', '2022-01-26 19:16:23', '2022-01-26 19:16:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` char(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-01-26 19:16:23', '2022-01-26 19:16:23'),
(2, 'user', '2022-01-26 19:16:23', '2022-01-26 19:16:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_service_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `name`, `duration`, `short_description`, `full_description`, `price`, `category_service_id`, `created_at`, `updated_at`) VALUES
(1, 'Sed optio optio perferendis eius aut.', 90, 'Sit nostrum quod at eveniet veniam minus quam.', 'Autem blanditiis voluptas saepe quas laboriosam amet itaque. Est rerum deleniti architecto. Voluptatem possimus sed adipisci dolore quas veniam beatae. Assumenda saepe enim quae blanditiis.', 13, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(2, 'Vitae dolorem error qui nisi est cumque et.', 122, 'Adipisci nam non provident occaecati.', 'Quo et ad minima consectetur delectus aspernatur corrupti. Ut tempora magni est perspiciatis dolor quos. Maxime et unde nesciunt eaque tempora sit.', 7, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(3, 'Est explicabo voluptate ea accusantium.', 86, 'Sed optio voluptatem veritatis impedit.', 'Aut et modi omnis sunt itaque hic. Explicabo sunt tenetur sequi provident veritatis saepe.', 2, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(4, 'Qui quia esse officia placeat ipsa.', 54, 'Quo officiis vel rerum aut unde aliquam sit.', 'Maxime hic ad architecto eum ut dolor. Quaerat aspernatur blanditiis autem. Sed temporibus veritatis et qui deserunt eius. Voluptatem sit consequatur aperiam.', 16, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(5, 'Voluptas mollitia harum nemo tempore ut.', 129, 'Ut esse et distinctio tempora quis.', 'Maxime dolorem quaerat explicabo voluptas eveniet porro. Excepturi blanditiis dolorem illum eligendi molestiae quibusdam. Occaecati pariatur quae quia itaque occaecati.', 12, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(6, 'Suscipit provident porro ea neque quas eius.', 99, 'Omnis ipsa dolores molestiae alias sed.', 'Porro reprehenderit placeat quia veniam temporibus aut. Perferendis necessitatibus ab corporis commodi quisquam delectus. Recusandae deleniti nihil minus.', 1, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(7, 'Corrupti et itaque nisi dolorem.', 94, 'Qui quo quis eos velit doloremque blanditiis.', 'Autem autem repudiandae sint aliquid aut aut recusandae. Enim eos quas numquam. Magni non molestiae ad veniam excepturi quisquam.', 17, 1, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(8, 'Sint in enim est pariatur et ratione dolor.', 153, 'Harum illo iure veniam corporis repellat.', 'Tempore qui consequatur natus quis ratione. Voluptas voluptatem non ut aut illo ducimus. Assumenda optio quo sed quo quos eos. Modi et et voluptatum tempora incidunt recusandae ut.', 22, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(9, 'Et dolorem aperiam fugiat expedita recusandae.', 62, 'Veniam ipsam fuga aliquam.', 'Reiciendis et architecto vel esse nihil et deserunt nesciunt. Alias iusto sequi atque dolorem et expedita. Nihil ipsam totam fugit atque. Iusto numquam dicta non et officiis quia eligendi.', 5, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(10, 'Non perspiciatis vero adipisci voluptas.', 157, 'Itaque distinctio debitis non natus aspernatur.', 'Omnis consequatur atque incidunt quis dolore nihil. Deleniti totam perspiciatis alias aut.', 5, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(11, 'Sed cumque et omnis vel.', 177, 'Saepe rerum qui vel molestias.', 'Omnis aut rerum illo placeat rerum maxime. Ea aut repellendus molestias eum nulla sit et. Nihil at illo earum harum aut nemo.', 11, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(12, 'Et laudantium quaerat est nihil et quia.', 171, 'Dolor nulla architecto quas earum.', 'Beatae dolor aliquid illum sequi dolore. Voluptas molestias facere nihil excepturi. Perspiciatis dolor sint ut recusandae nostrum repudiandae.', 6, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(13, 'Error dignissimos sint officia voluptas a.', 130, 'Eius inventore commodi quia modi aut mollitia.', 'Voluptatem architecto reiciendis odio id. Aut voluptatem enim distinctio provident. Qui quo quam pariatur enim et nostrum ratione.', 16, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(14, 'Aut quod cupiditate sapiente.', 178, 'Nihil in quis ut deleniti soluta.', 'Quis adipisci eligendi reprehenderit vel velit recusandae. Pariatur est totam neque facilis id sunt. Fugiat similique impedit ut. Vero a sed qui sit.', 8, 2, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(15, 'Atque ea qui et at fugit culpa accusamus.', 34, 'Enim aut eius enim et.', 'Blanditiis qui nam hic dolorem non. Quis quasi porro nobis adipisci.', 14, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(16, 'Rerum dignissimos ut itaque qui.', 137, 'Nemo et dicta deleniti dolores recusandae.', 'Accusamus ea corrupti nihil sed ad id. Inventore cupiditate vero quis id qui officiis iure nisi. Temporibus ipsa architecto et fuga aliquam sequi. Laborum velit ducimus placeat illo ea.', 23, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(17, 'Fugit est ut officia consequatur et.', 53, 'Rerum harum consequuntur dolor aut.', 'Amet et quia omnis. Porro ut architecto suscipit ut neque harum. Nobis at velit non mollitia. Ipsam iure voluptatum consectetur voluptatem magni repellat maiores.', 10, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(18, 'Sunt nemo consequatur rerum iste velit eum amet.', 124, 'Omnis quibusdam occaecati nisi perferendis.', 'Et harum doloribus ipsa quia vel nam minima. Perferendis soluta cupiditate fuga rerum temporibus quis.', 17, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(19, 'Non magni in provident qui optio et distinctio.', 38, 'In aut quo quisquam qui qui qui eum.', 'Quisquam ipsam dicta quasi libero mollitia. Ullam est suscipit nisi suscipit itaque itaque. Quo aut ab aut omnis sint dolorum.', 20, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(20, 'Aperiam quibusdam est animi ipsum.', 62, 'Eos repellat dolore officia sed.', 'Quia quaerat quidem unde et. Maiores numquam dolorem numquam sunt. Sapiente ea quis reprehenderit voluptas et mollitia. Ducimus sapiente reprehenderit vel.', 23, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(21, 'Enim ea recusandae fuga sed voluptatum ab culpa.', 116, 'Aperiam quis maiores quis eveniet cum ab est.', 'Dolores officiis nisi aut blanditiis quidem dolores. Officia excepturi illo recusandae voluptatem nemo nihil voluptatem. Vel omnis ut cupiditate perferendis. Aut quo itaque perferendis beatae et qui.', 16, 3, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(22, 'Non aut non neque exercitationem quam sequi.', 150, 'Earum velit fugit et minus ea distinctio.', 'Nesciunt sapiente quae fugiat in. Dicta quibusdam molestias quibusdam ea quasi tenetur maiores. Exercitationem quo omnis est recusandae perspiciatis. Eos et asperiores nisi aut id vero.', 24, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(23, 'Eligendi eos quis accusamus in porro ut.', 154, 'Quae ipsa in placeat dolorem harum sit sed.', 'Et laborum amet dolore non unde assumenda id. Laborum voluptas laboriosam ab ullam culpa. Minima minus reiciendis aliquam eaque. Velit in rerum quis.', 21, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(24, 'Et sit architecto ut maiores excepturi.', 88, 'At incidunt vel aut excepturi rerum et.', 'Rerum nihil velit alias quia ut. Et eos est voluptatum mollitia architecto eaque harum. Voluptas at vitae totam vel necessitatibus sunt. Repudiandae distinctio ducimus non odit molestias tenetur.', 17, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(25, 'Eligendi voluptatem modi iste iure.', 53, 'Quo non mollitia dolor quas cupiditate.', 'Eos totam nihil ea sint at aut odit vitae. Sit et omnis tempore adipisci. Quia reiciendis tempore et fuga possimus est quo.', 10, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(26, 'Et harum itaque omnis enim libero quas error.', 56, 'Dolor sed quos est aut animi.', 'Rerum sint harum quae veritatis autem. Alias ab veritatis est repellendus accusantium nesciunt. Dolor eum quo voluptatibus. In voluptas quas ullam.', 14, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(27, 'Quasi odit sunt vel numquam hic sint maiores.', 31, 'Molestiae quis rerum quisquam.', 'Sed vel at exercitationem harum blanditiis. Vitae est corrupti sunt sed explicabo. Ut sunt ea quis cumque corrupti alias consectetur. Dolores culpa minus repudiandae qui.', 6, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(28, 'Qui dolore sunt sit voluptatibus.', 143, 'Sint maiores et voluptas mollitia.', 'Quos aliquam alias blanditiis aspernatur perspiciatis voluptates inventore. Necessitatibus harum sit qui eligendi sed cumque. Magni delectus voluptates ipsum enim nihil nisi atque.', 20, 4, '2022-01-26 19:16:24', '2022-01-26 19:16:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `start_time` datetime NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 30,
  `total_money` int(11) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0,
  `discount_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_services`
--

CREATE TABLE `task_services` (
  `task_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `is_save_photo` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'nếu true thì sau khi hoàn thành nhiệm vụ phải chụp ảnh lại cho khách',
  `is_consult` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'nếu true thì nhân viên phải tư vấn cho khách',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL DEFAULT '1990-01-01',
  `home_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_name` enum('facebook','google','zalo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_member_id` int(11) NOT NULL DEFAULT 1,
  `role_id` bigint(20) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_products`
--

CREATE TABLE `user_products` (
  `quantity` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `workplaces`
--

CREATE TABLE `workplaces` (
  `id` int(11) NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL COMMENT 'kinh độ',
  `latitude` double NOT NULL COMMENT 'vĩ độ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `workplaces`
--

INSERT INTO `workplaces` (`id`, `address`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, '225 Trantow Mount', 105.023605, 20.1270943, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(2, '995 Earline Wall', 105.96904, 20.1645436, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(3, '6312 Cesar Way Suite 653', 105.188971, 20.4201859, '2022-01-26 19:16:24', '2022-01-26 19:16:24'),
(4, '676 Davon Center Apt. 096', 105.622321, 20.0512571, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(5, '320 Kihn Overpass', 105.534317, 20.0178649, '2022-01-26 19:16:25', '2022-01-26 19:16:25'),
(6, '4102 Hyatt Glen Suite 892', 105.19855, 20.694065, '2022-01-26 19:16:25', '2022-01-26 19:16:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Chỉ mục cho bảng `bill_products`
--
ALTER TABLE `bill_products`
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_services`
--
ALTER TABLE `category_services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `date_employees`
--
ALTER TABLE `date_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_id` (`date_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `workplace_id` (`workplace_id`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_id` (`category_product_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `rank_members`
--
ALTER TABLE `rank_members`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_service_id` (`category_service_id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `task_services`
--
ALTER TABLE `task_services`
  ADD KEY `task_id` (`task_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`,`email`,`provider_id`),
  ADD KEY `rank_member_id` (`rank_member_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `user_products`
--
ALTER TABLE `user_products`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `workplaces`
--
ALTER TABLE `workplaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_services`
--
ALTER TABLE `category_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dates`
--
ALTER TABLE `dates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `date_employees`
--
ALTER TABLE `date_employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rank_members`
--
ALTER TABLE `rank_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `workplaces`
--
ALTER TABLE `workplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_products`
--
ALTER TABLE `bill_products`
  ADD CONSTRAINT `bill_products_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `date_employees`
--
ALTER TABLE `date_employees`
  ADD CONSTRAINT `date_employees_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `date_employees_ibfk_2` FOREIGN KEY (`date_id`) REFERENCES `dates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`workplace_id`) REFERENCES `workplaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_product_id`) REFERENCES `category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_service_id`) REFERENCES `category_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `task_services`
--
ALTER TABLE `task_services`
  ADD CONSTRAINT `task_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_services_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rank_member_id`) REFERENCES `rank_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
