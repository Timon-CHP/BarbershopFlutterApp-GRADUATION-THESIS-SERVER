-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2022 lúc 11:14 AM
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
  `bill_id` bigint(20) NOT NULL,
  `book_date` datetime NOT NULL,
  `total_money` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `delivery_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_delivery_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_fast_delivery` tinyint(1) NOT NULL DEFAULT 0,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_products`
--

CREATE TABLE `bill_products` (
  `quantily` int(11) NOT NULL DEFAULT 1,
  `bill_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_products`
--

CREATE TABLE `category_products` (
  `category_product_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_services`
--

CREATE TABLE `category_services` (
  `category_service_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` bigint(20) NOT NULL,
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
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` bigint(20) NOT NULL,
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
(47, '2022_01_07_043917_create_bill_product_table', 1),
(48, '2022_01_07_043917_create_bill_table', 1),
(49, '2022_01_07_043917_create_category_product_table', 1),
(50, '2022_01_07_043917_create_category_service_table', 1),
(51, '2022_01_07_043917_create_discount_table', 1),
(52, '2022_01_07_043917_create_manufacturer_table', 1),
(53, '2022_01_07_043917_create_product_table', 1),
(54, '2022_01_07_043917_create_rank_member_table', 1),
(55, '2022_01_07_043917_create_service_table', 1),
(56, '2022_01_07_043917_create_task_service_table', 1),
(57, '2022_01_07_043917_create_task_table', 1),
(58, '2022_01_07_043917_create_user_product_table', 1),
(59, '2022_01_07_043917_create_user_table', 1),
(60, '2022_01_07_043918_add_foreign_keys_to_bill_product_table', 1),
(61, '2022_01_07_043918_add_foreign_keys_to_bill_table', 1),
(62, '2022_01_07_043918_add_foreign_keys_to_product_table', 1),
(63, '2022_01_07_043918_add_foreign_keys_to_service_table', 1),
(64, '2022_01_07_043918_add_foreign_keys_to_task_service_table', 1),
(65, '2022_01_07_043918_add_foreign_keys_to_task_table', 1),
(66, '2022_01_07_043918_add_foreign_keys_to_user_product_table', 1),
(67, '2022_01_07_043918_add_foreign_keys_to_user_table', 1),
(91, '2022_01_07_084015_create_bill_products_table', 2),
(92, '2022_01_07_084015_create_bills_table', 2),
(93, '2022_01_07_084015_create_category_products_table', 2),
(94, '2022_01_07_084015_create_category_services_table', 2),
(95, '2022_01_07_084015_create_discounts_table', 2),
(96, '2022_01_07_084015_create_manufacturers_table', 2),
(97, '2022_01_07_084015_create_products_table', 2),
(98, '2022_01_07_084015_create_rank_members_table', 2),
(99, '2022_01_07_084015_create_services_table', 2),
(100, '2022_01_07_084015_create_task_services_table', 2),
(101, '2022_01_07_084015_create_tasks_table', 2),
(102, '2022_01_07_084015_create_user_products_table', 2),
(103, '2022_01_07_084015_create_users_table', 2),
(104, '2022_01_07_084016_add_foreign_keys_to_bill_products_table', 2),
(105, '2022_01_07_084016_add_foreign_keys_to_bills_table', 2),
(106, '2022_01_07_084016_add_foreign_keys_to_products_table', 2),
(107, '2022_01_07_084016_add_foreign_keys_to_services_table', 2),
(108, '2022_01_07_084016_add_foreign_keys_to_task_services_table', 2),
(109, '2022_01_07_084016_add_foreign_keys_to_tasks_table', 2),
(110, '2022_01_07_084016_add_foreign_keys_to_user_products_table', 2),
(111, '2022_01_07_084016_add_foreign_keys_to_users_table', 2),
(155, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(156, '2022_01_07_090108_create_bill_products_table', 3),
(157, '2022_01_07_090108_create_bills_table', 3),
(158, '2022_01_07_090108_create_category_products_table', 3),
(159, '2022_01_07_090108_create_category_services_table', 3),
(160, '2022_01_07_090108_create_discounts_table', 3),
(161, '2022_01_07_090108_create_manufacturers_table', 3),
(162, '2022_01_07_090108_create_products_table', 3),
(163, '2022_01_07_090108_create_rank_members_table', 3),
(164, '2022_01_07_090108_create_services_table', 3),
(165, '2022_01_07_090108_create_task_services_table', 3),
(166, '2022_01_07_090108_create_tasks_table', 3),
(167, '2022_01_07_090108_create_user_products_table', 3),
(168, '2022_01_07_090108_create_users_table', 3),
(169, '2022_01_07_090109_add_foreign_keys_to_bill_products_table', 3),
(170, '2022_01_07_090109_add_foreign_keys_to_bills_table', 3),
(171, '2022_01_07_090109_add_foreign_keys_to_products_table', 3),
(172, '2022_01_07_090109_add_foreign_keys_to_services_table', 3),
(173, '2022_01_07_090109_add_foreign_keys_to_task_services_table', 3),
(174, '2022_01_07_090109_add_foreign_keys_to_tasks_table', 3),
(175, '2022_01_07_090109_add_foreign_keys_to_user_products_table', 3),
(176, '2022_01_07_090109_add_foreign_keys_to_users_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_manual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` int(11) DEFAULT NULL,
  `catagory_product_id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rank_members`
--

CREATE TABLE `rank_members` (
  `rank_member_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rank_members`
--

INSERT INTO `rank_members` (`rank_member_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Silver', '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(2, 'Gold', '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(3, 'Diamond', '2022-01-07 02:05:13', '2022-01-07 02:05:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_service_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `task_id` bigint(20) NOT NULL,
  `book_date` datetime NOT NULL,
  `total_money` int(11) NOT NULL,
  `is_save_photo` tinyint(1) NOT NULL,
  `is_consulting` tinyint(1) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `home_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_member_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `password`, `name`, `phone_number`, `email`, `birthday`, `home_address`, `work_address`, `rank_member_id`, `created_at`, `updated_at`) VALUES
(1, 'e\"gy!B/-_', 'Arvilla Hintz PhD', '657-477-2736', 'vmurazik@ortiz.info', '1990-07-11', '961 Faye Mews\nWindlermouth, WI 43882', '29822 Effertz Mill Apt. 982\nKohlerville, FL 03943', 2, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(2, 'V2AHnXw5', 'Bobby Cremin', '+1-863-940-0212', 'jacobs.adeline@oreilly.com', '1974-10-26', '542 Halvorson Loaf Apt. 238\nFaheymouth, TX 49806', '1126 Colton Roads Apt. 154\nWest Sanfordton, MN 40093-8190', 3, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(3, '`/;RoD^bbm|\'$rG{=jC;', 'Jaeden Heaney', '385-264-1824', 'dubuque.jailyn@schowalter.com', '2008-06-03', '386 Larkin Radial Suite 288\nAltashire, IL 74233', '465 Justyn Rapid\nEast Jaiden, SC 18558-0252', 2, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(4, '2jtc5Yb\"[dG2=9K', 'Kathleen Connelly', '701-730-9178', 'norene.ohara@hotmail.com', '1970-10-31', '68795 Alena Villages Suite 263\nNorth Myles, SC 59512', '28302 Hirthe Parkway\nWest Morganton, SC 28083', 1, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(5, 'RTY,q+o', 'Dr. Olaf Jast', '1-559-532-0220', 'ogusikowski@gerlach.info', '1999-02-15', '3801 Annabelle Bypass Suite 694\nNew Linneaside, KY 57964-7998', '5735 Kertzmann Manors\nSpencerfort, WI 22197', 1, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(6, '}`:Q!.u[Uz', 'Mrs. Joana Lockman', '1-501-628-8550', 'hammes.benjamin@block.com', '1984-03-28', '664 Brennon Mount\nWest Emerson, OK 84439-8327', '5312 Demond Port\nNew Lenora, NC 19723-9435', 1, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(7, '5\\\"6:6P&n{fCjTt', 'Domenica Roob', '570.932.1044', 'zbednar@medhurst.biz', '1983-06-19', '56211 Crist Corner Apt. 100\nLake Newell, VT 69645', '4115 Jonathan Trafficway\nSavionport, CT 18104', 1, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(8, '\'a2h62t', 'Guillermo Cronin', '(276) 464-8593', 'hkilback@yahoo.com', '1977-11-16', '93568 Lamar Greens Apt. 243\nKatrineside, KY 60579-0567', '20401 Rohan Glen Apt. 898\nLake Darrenville, DC 24797', 1, '2022-01-07 02:05:13', '2022-01-07 02:05:13'),
(9, '{Y[aL>0(@V6u\"o7ooU', 'Mr. Tanner Miller V', '(754) 654-5486', 'lola.parisian@hotmail.com', '1996-08-17', '62124 Lafayette Tunnel Suite 565\nPaigeland, SD 54566-0189', '94410 Aron Motorway\nDakotastad, KS 90235', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(10, 'T,CPa6yfB+u}(,o;=Y', 'Karen Keeling', '743.850.4768', 'ohara.lorenz@bogan.org', '2006-12-27', '3529 Dare Causeway\nJaydeville, NV 38944', '585 Goyette Junction\nWardmouth, LA 92935', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(11, 'g\"WX$h{ea])4^x7K#', 'Stephon Wolf', '1-781-772-1380', 'sid92@yahoo.com', '2004-07-20', '18350 Raynor Village\nAlenaburgh, AK 42085-1233', '25782 Peter Lock Suite 916\nLake Zoila, MI 65123-0537', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(12, '#Iw8%=\\#{nL+#:', 'Odie Dickinson', '727-260-5720', 'skemmer@jacobson.com', '1986-06-29', '371 Corwin Burgs\nGutmannhaven, AZ 48467-4374', '53619 Jacquelyn Greens Suite 934\nNew Dillonberg, WA 33209-4578', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(13, 'x?=BPIZ`!', 'Mr. Titus Homenick MD', '+1-351-491-3810', 'lindsey.jones@gmail.com', '1983-03-03', '171 Schultz Loop Apt. 537\nSpinkaside, NH 63983', '791 Alysa Haven\nSouth Allisontown, AK 94261', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(14, 'T\\Lr7R<)P', 'Domenick Ortiz', '(706) 423-0210', 'conrad.wolff@yahoo.com', '1975-02-22', '8597 Trystan Falls Apt. 204\nDeckowfort, NE 22944', '6827 Huels Ridge\nWest Jedediahview, ID 68796', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(15, 'qa+X:?@{cNlm\\vcm5\\r', 'Josiane Hauck', '+1 (559) 246-1588', 'osinski.harley@rosenbaum.com', '2019-03-13', '10979 Davis Cove Apt. 398\nMadisenfort, CT 87421-6689', '1994 Shaina Avenue Apt. 051\nChandlerborough, CT 16667-4235', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(16, '!I7%ALLo', 'Gloria White', '+1-520-456-8039', 'khowell@hudson.com', '1983-04-08', '757 Friesen Crossing\nWest Chelsey, WA 81552-6034', '227 Koby Route\nLake Isomland, AK 72352', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(17, 'in+)X\"]l)5BE(', 'Dr. Jacinto Abshire', '1-270-607-6706', 'hzboncak@swift.com', '1987-10-14', '571 Rowan River\nNew Reba, WI 22364-1489', '281 Rosina Glens Suite 017\nWest Hiltonburgh, SD 99708', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(18, 'tJlgl2Tc,N[uEf&8\\E', 'Mrs. Rhoda Lueilwitz PhD', '817.634.2925', 'dabshire@goldner.com', '2018-08-19', '24239 Antonio Vista Suite 029\nPort Eduardo, AL 94091-9698', '5596 Kertzmann Route Apt. 897\nNew Viviane, AR 73264', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(19, 'NDN#7T^)}', 'Rahul Bins', '+1.951.422.9855', 'rory.daniel@yahoo.com', '1998-04-08', '9184 Destiney Common\nPort Eloisatown, ID 38261', '5690 Alva Parks Apt. 700\nSouth Clement, UT 98235', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(20, 'VE+~ZX+m/bs=}k\\vL\"\\}', 'Paolo Carter', '+1-586-209-7762', 'johathan.schuster@hotmail.com', '1999-10-29', '638 Macie Corners Apt. 110\nKubmouth, MN 06125', '82164 Jacobi Lodge Apt. 701\nTillmanville, ID 40468', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(21, 'zo~0nK52O(;l+x;-@', 'Felton Green', '+13865914061', 'pagac.alexandrine@yahoo.com', '2006-07-10', '2295 Dallin Pass Apt. 299\nPort Noemietown, WY 95278-6002', '2688 Wintheiser Forest Suite 538\nNehaville, WI 76394', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(22, 'n&>MuNz1]Pt[,o>n4kD', 'Ed Koepp', '+1.870.878.9950', 'kirk14@gmail.com', '2003-03-16', '487 Bashirian Dam\nNorth Samson, AZ 06985-4795', '8755 Gladyce Station Suite 872\nLake Zachary, KY 81159', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(23, '5LBUzQ&~St:^IByA@J', 'Mona Murphy', '+1 (872) 219-7280', 'vella91@tillman.info', '2004-11-12', '17303 Predovic Shore\nDashawnborough, WV 97864', '24901 Hyatt Forge\nLake Alysonport, PA 96404', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(24, 'q<\'wp-vsg-', 'Mr. Justice Kutch', '+1-734-703-6256', 'johnston.crawford@towne.com', '2006-04-04', '90311 Laurianne Crossroad Apt. 238\nBrownshire, WA 82929', '59388 Maxime Port Apt. 531\nJuliusmouth, WY 76734-1889', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(25, 'kGMz\'s', 'Braxton Stiedemann', '+1-502-230-2920', 'roel.stanton@gmail.com', '1989-02-14', '25614 Corwin Pass Suite 739\nNorth Bertrand, KY 26755-2021', '3697 Jenkins Plaza\nJacinthehaven, MI 58595-1376', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(26, '>R2MhPVVg\"0+QUsp', 'Ms. Verdie Kiehn Jr.', '530-347-2614', 'dtremblay@hotmail.com', '1971-06-29', '63065 Lenora Pass\nBeverlyton, IN 78434', '472 Tromp Villages\nWiegandmouth, PA 01301-0680', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(27, '~siq35%<r-TiQ', 'Adonis Effertz', '+1.762.740.0962', 'glover.green@spencer.net', '1974-11-26', '59077 Kunde Pass\nWest Francescaborough, MO 46755-2141', '7307 Bechtelar Mount\nEast Tiannahaven, PA 03476-8342', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(28, ']7o3eO[t\':u', 'Prof. Hillard Conn II', '630-821-1118', 'concepcion10@mohr.com', '1984-06-17', '7888 Simonis Squares Suite 973\nSouth Berneice, IN 92484-5604', '5486 Torp Drive\nLake Miraclebury, FL 94855-1656', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(29, '>$L\\YB*@Ny%9oi', 'Ms. Anika Pouros', '805-230-1790', 'xstanton@hotmail.com', '1993-01-10', '66738 Milan Club\nEast Delpha, MD 15784-2474', '274 Ursula Valley\nJackyport, SC 00305-8640', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(30, '\\vl@Qqeo,_vpauKW{r', 'Amiya Wolff', '1-860-538-8994', 'camylle74@jones.com', '2004-03-27', '2403 Rempel Overpass\nPort Mariloustad, UT 60874', '9660 Lavada Heights Apt. 633\nCartwrightmouth, AK 60548', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(31, '`LQGG((LCeDn', 'Miss Kaycee Kuhlman', '+1-734-809-4709', 'chaya27@considine.com', '2015-10-17', '66321 Maryjane Key Suite 113\nTurnerton, ID 25365-7566', '73365 Lebsack Parkways\nMartinetown, TX 73653-9759', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(32, 'P?nO,643n{Jz', 'Rudy Johnston I', '985-655-6156', 'lauren57@hotmail.com', '2015-01-15', '76072 Smitham Summit\nTimmothytown, HI 30461-9914', '4436 Kiehn Shores\nSusannaton, KY 78207-1440', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(33, 'vU|;K3l0DrVAO-', 'Abdullah Wiegand', '425-755-2668', 'hester28@ruecker.org', '1982-12-25', '833 Wallace Landing\nVandervortshire, MO 94840', '32559 Filiberto Ports\nNew Damien, SC 64881', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(34, '%DYak\'Ec#/S&_V8KD', 'Laney Beier', '+1 (828) 783-3003', 'watsica.halie@gmail.com', '2013-06-25', '9662 Bridgette Summit\nAdrienberg, MI 85822-7221', '59285 Sallie Highway\nSigurdbury, WA 49256-8388', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(35, '6>~:xsfoU%:+#', 'Verla Bartoletti', '+1-313-970-1867', 'robin46@gmail.com', '1997-09-24', '378 Ryan Canyon\nLake Jennyferberg, WI 00795', '729 Hane Street\nIdafurt, NY 68023', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(36, 'o(R,:|O4/)ei9vp2+', 'Candace Bergstrom', '(208) 540-3867', 'shyanne17@mcclure.com', '1974-11-19', '3536 Hermiston Forks\nEast Daniellatown, NJ 61208-7418', '37863 Robel Route Suite 989\nBinsville, ID 02590-5510', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(37, 'vJnONh?', 'Ms. Kailyn Walsh', '+1-479-255-6782', 'ullrich.fausto@stiedemann.biz', '2000-05-13', '284 Schowalter Wall\nEast Judeshire, HI 70242', '9795 Bednar Orchard\nLucioland, FL 98250-7180', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(38, 'LzZ,~|.e>j6BAcgfd~', 'Sienna Bruen', '314-424-3083', 'xyost@yahoo.com', '2020-08-24', '391 Ritchie Stream\nNew Garretstad, SD 43442-1198', '203 Kutch Cliff\nPort Modestofurt, MD 82366', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(39, '0C=AM![s.', 'Cordia Hilpert', '678-322-3350', 'fisher.laron@von.com', '1993-04-26', '213 Wilfred Shoal Apt. 421\nSierratown, VA 02558', '9238 Erin Bridge\nJettton, MO 79973', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(40, 'slW`TPp(L|', 'Garret Kub I', '571.221.9438', 'fjast@hotmail.com', '1979-06-20', '957 Kim Stream Apt. 908\nStrosinstad, MD 75808-5832', '1655 Littel Islands Apt. 516\nRicechester, KS 02217', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(41, '_uB>{p*dY`?|w', 'Bernhard Larkin IV', '1-424-689-5593', 'albertha.mann@hotmail.com', '1971-03-03', '80885 Amya Course Suite 287\nLake Rodrigo, TX 56066-4753', '9205 Harris Forges\nPort Bella, MA 51951', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(42, '1:*}U^?pr3l+z9A#!s', 'Felipe Heidenreich', '(941) 456-4041', 'yhansen@murray.info', '1990-02-07', '2873 Christiansen Spurs\nNew Oran, NY 38437', '7651 Maiya Vista Apt. 737\nNorth Dorthy, NH 67697', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(43, '12x6S1^EF[2;QSoz1', 'Herbert Stoltenberg I', '469.891.5635', 'afunk@yahoo.com', '2014-08-16', '886 Vivianne Glens Apt. 298\nNew Elainaport, WY 06801-4008', '65886 Batz Fort Apt. 477\nMalikaton, CT 49295', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(44, 'rT,@RTT>s[', 'Mrs. Halie Glover DDS', '(530) 280-6456', 'awisozk@torp.info', '1996-08-06', '36163 Francisco Orchard Suite 241\nStrackemouth, MO 77369-1146', '70782 Nitzsche Run\nPort Rowena, NC 52785-8205', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(45, 'Y]9H;($Q\'', 'Kayley Murazik', '347-638-3033', 'tillman.brendon@wyman.info', '1977-10-20', '8088 Ewald Tunnel\nHuldaton, NM 95468-8108', '915 Russel Run\nEast Antonettamouth, WY 92924-2373', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(46, 'FI[|K(', 'Terry Zulauf', '717-850-0691', 'mmohr@nicolas.com', '2009-12-09', '58970 Finn Neck\nNew Penelopeberg, MN 74800', '7082 Salvador Terrace Apt. 780\nWest Harry, MO 36538-0007', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(47, '~D-tnAm>', 'Lemuel Hartmann MD', '385-975-8853', 'glakin@hotmail.com', '1973-05-09', '6874 Amelia Freeway\nKingville, WI 82579', '704 Kris Well\nAbbeyborough, MS 16497', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(48, 'lfJ=r#!n!B[', 'Mrs. Samantha Conn I', '930-264-9450', 'cmclaughlin@yahoo.com', '2004-06-12', '8149 Art Curve Apt. 264\nZiememouth, VT 35031', '5778 Grimes Ranch Apt. 811\nPort Austentown, WI 45936-6513', 2, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(49, '.6f>B?h[{T?F_^', 'Daryl Gutkowski', '+15673948034', 'albertha.pacocha@pouros.com', '1988-06-26', '96850 Luciano Key\nReynoldstown, PA 17736-9855', '2868 Chelsea Cliff\nNew Juanitashire, NV 43837', 3, '2022-01-07 02:05:14', '2022-01-07 02:05:14'),
(50, ')\\IlM{[eiD]Zn\'`A[g', 'Claudie Stokes II', '352.309.2180', 'hintz.ned@schulist.info', '1970-04-08', '25386 Felicia Haven Suite 460\nNorth Carlos, MN 42154-3032', '82592 Alfonso Knoll Suite 131\nMantestad, OH 10384-8686', 1, '2022-01-07 02:05:14', '2022-01-07 02:05:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_products`
--

CREATE TABLE `user_products` (
  `quantily` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`category_product_id`);

--
-- Chỉ mục cho bảng `category_services`
--
ALTER TABLE `category_services`
  ADD PRIMARY KEY (`category_service_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `catagory_product_id` (`catagory_product_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `rank_members`
--
ALTER TABLE `rank_members`
  ADD PRIMARY KEY (`rank_member_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `category_service_id` (`category_service_id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`,`email`),
  ADD KEY `rank_member_id` (`rank_member_id`);

--
-- Chỉ mục cho bảng `user_products`
--
ALTER TABLE `user_products`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_products`
--
ALTER TABLE `category_products`
  MODIFY `category_product_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_services`
--
ALTER TABLE `category_services`
  MODIFY `category_service_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_products`
--
ALTER TABLE `bill_products`
  ADD CONSTRAINT `bill_products_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catagory_product_id`) REFERENCES `category_products` (`category_product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`manufacturer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_service_id`) REFERENCES `category_services` (`category_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `task_services`
--
ALTER TABLE `task_services`
  ADD CONSTRAINT `task_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_services_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rank_member_id`) REFERENCES `rank_members` (`rank_member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
