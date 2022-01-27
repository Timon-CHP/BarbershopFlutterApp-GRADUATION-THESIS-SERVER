-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2022 lúc 08:43 AM
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
(1, 'Hair cut/styling', '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(2, 'Hair dying', '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(3, 'Curling hair', '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(4, 'More', '2022-01-21 00:27:25', '2022-01-21 00:27:25');

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
(237, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(238, '2022_01_20_043353_create_bill_products_table', 1),
(239, '2022_01_20_043353_create_bills_table', 1),
(240, '2022_01_20_043353_create_category_products_table', 1),
(241, '2022_01_20_043353_create_category_services_table', 1),
(242, '2022_01_20_043353_create_discounts_table', 1),
(243, '2022_01_20_043353_create_manufacturers_table', 1),
(244, '2022_01_20_043353_create_positions_table', 1),
(245, '2022_01_20_043353_create_products_table', 1),
(246, '2022_01_20_043353_create_rank_members_table', 1),
(247, '2022_01_20_043353_create_roles_table', 1),
(248, '2022_01_20_043353_create_services_table', 1),
(249, '2022_01_20_043353_create_staffs_table', 1),
(250, '2022_01_20_043353_create_task_services_table', 1),
(251, '2022_01_20_043353_create_tasks_table', 1),
(252, '2022_01_20_043353_create_user_products_table', 1),
(253, '2022_01_20_043353_create_users_table', 1),
(254, '2022_01_20_043353_create_workplaces_table', 1),
(255, '2022_01_20_043354_add_foreign_keys_to_bill_products_table', 1),
(256, '2022_01_20_043354_add_foreign_keys_to_bills_table', 1),
(257, '2022_01_20_043354_add_foreign_keys_to_products_table', 1),
(258, '2022_01_20_043354_add_foreign_keys_to_services_table', 1),
(259, '2022_01_20_043354_add_foreign_keys_to_staffs_table', 1),
(260, '2022_01_20_043354_add_foreign_keys_to_task_services_table', 1),
(261, '2022_01_20_043354_add_foreign_keys_to_tasks_table', 1),
(262, '2022_01_20_043354_add_foreign_keys_to_user_products_table', 1),
(263, '2022_01_20_043354_add_foreign_keys_to_users_table', 1);

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

--
-- Đang đổ dữ liệu cho bảng `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'regisToken', '96e06b8ebce3c1a280eac5e8e5d62e60fddc25015b1f0bbb7bc04f5e3a1f7f24', '[\"*\"]', NULL, '2022-01-21 00:29:10', '2022-01-21 00:29:10'),
(2, 'App\\Models\\User', 1, 'loginToken', '7760c96d383aa21a737094765710daf46835c40dc0b26d04925fef459a0bf38e', '[\"*\"]', NULL, '2022-01-21 00:29:43', '2022-01-21 00:29:43'),
(3, 'App\\Models\\User', 2, 'loginToken', 'ea8ea3720cec210b5cf8ba98648a2f6a7ccba6d6db9b6cb5d475b8553623dfad', '[\"*\"]', NULL, '2022-01-21 00:29:51', '2022-01-21 00:29:51'),
(4, 'App\\Models\\User', 1, 'loginToken', 'ef90b3272c050a28e09e17440226e59dea4f88b463aa737cb530d4af3f461b46', '[\"*\"]', NULL, '2022-01-21 00:29:58', '2022-01-21 00:29:58'),
(5, 'App\\Models\\User', 3, 'loginToken', 'ead1dfd14500b034b8831a9ad61921fab30d07c89a18fd90b3e9533a13c46ebf', '[\"*\"]', NULL, '2022-01-21 00:43:11', '2022-01-21 00:43:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'None', '2022-01-21 00:27:24', '2022-01-21 00:27:24'),
(2, 'Silver', '2022-01-21 00:27:24', '2022-01-21 00:27:24'),
(3, 'Gold', '2022-01-21 00:27:24', '2022-01-21 00:27:24'),
(4, 'Diamond', '2022-01-21 00:27:25', '2022-01-21 00:27:25');

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
(1, 'admin', '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(2, 'user', '2022-01-21 00:27:25', '2022-01-21 00:27:25');

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
(1, 'Expedita dolores reiciendis temporibus fugit. Eos excepturi autem atque fuga dolore.', 65, 'Aut enim qui commodi totam. Qui blanditiis quia possimus ad et et cupiditate.', 'Soluta modi et molestiae voluptatem sed ipsam. Asperiores soluta nam harum a et veniam. Qui et ut in mollitia. Fugiat non sed ut harum minima mollitia.', 140077, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(2, 'Qui adipisci modi reprehenderit molestiae veniam enim. Et enim quia quasi eaque quia nesciunt.', 172, 'Qui quia blanditiis qui inventore ea consequatur quae. Qui beatae culpa quia quia quis.', 'Mollitia quod qui similique vel. Et tempore nihil sed doloremque molestiae qui nesciunt voluptas. Quo veritatis dolor quo et dolorem occaecati.', 459537, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(3, 'Et aut illum harum provident at. Asperiores incidunt aspernatur maiores magnam.', 73, 'Aperiam est velit voluptas architecto officia quia aut. Ut modi sed aut placeat similique.', 'Praesentium totam est ut dolorum saepe deleniti veritatis. Voluptatem assumenda nulla tempore sapiente deserunt. Eum commodi debitis est tenetur architecto est. In quam ea repellat blanditiis.', 275316, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(4, 'Praesentium et ut sint sed dolore non quo. Adipisci neque inventore sed laudantium qui non.', 103, 'Illo blanditiis pariatur ea quis repellat exercitationem amet. Et corporis qui qui.', 'Nam omnis quo veritatis eos minima accusamus voluptas. Optio consequatur aliquam modi tenetur. Rerum officia ratione ipsa qui nam maxime est. Et harum mollitia consequatur sed dolorum.', 308423, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(5, 'Cum eum aliquid inventore in soluta. Delectus repellendus aut occaecati et. Est laudantium qui et.', 106, 'At nobis reprehenderit quia. Dolorum voluptas corrupti vel et quisquam alias iusto voluptatem.', 'Esse eveniet quaerat in ab dolorum delectus qui soluta. Magnam repudiandae nulla placeat ad similique ad architecto. Et eos commodi iste. Alias tempora nam fugiat et dolorem.', 360600, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(6, 'Harum qui similique sunt ut a id. Voluptate repudiandae aspernatur illo rerum.', 36, 'Et veritatis ratione fugiat neque. Et quaerat commodi facilis id magni et.', 'In tempore occaecati eligendi fugiat incidunt perspiciatis nobis. Ut qui maiores magni quaerat suscipit quos. Est quia autem laborum maiores eum. Sit voluptas vel esse veritatis.', 417037, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(7, 'Ullam natus maiores non qui ut sequi saepe aliquam. Ullam quia sint reiciendis commodi eos.', 168, 'Omnis aut ipsum maiores. Dolor enim enim deserunt iusto. Eos optio et ut blanditiis voluptatum.', 'Dolor autem sequi molestiae autem ratione. Sint commodi tenetur impedit sit. Non porro adipisci ab qui ut quis consequatur.', 84370, 1, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(8, 'Et cumque ea omnis porro. Aut tempore omnis adipisci asperiores. Alias et eius aut quia non.', 95, 'Hic eveniet ducimus ut debitis nam consequatur. Deserunt tempora est nostrum molestias doloribus.', 'Quaerat ab rem blanditiis sint temporibus. Fuga nulla ut aperiam aliquid. Et perferendis eos doloremque necessitatibus ut dicta consequatur.', 285882, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(9, 'Ullam aut totam molestias enim voluptatem. Autem odit occaecati unde corrupti.', 146, 'Voluptatem atque dolore magni eos. Magnam molestias modi libero aliquid hic magni voluptas.', 'Quis est voluptatem totam nostrum eligendi. Ut accusamus delectus doloribus ut eos voluptate commodi. Sunt aut neque non tenetur et. Nemo at recusandae dolor ut possimus odit qui quos.', 416058, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(10, 'Aut fugit rerum adipisci repudiandae. Qui iusto nisi assumenda vitae similique aperiam dolores et.', 125, 'Optio ut eum ea non. Magnam eius totam sit totam ipsum. Rerum vitae natus est autem quas similique.', 'Voluptatibus quia odio corrupti maiores animi quos. Dolore voluptas dolores eaque sapiente. Dolor esse aut quo odit ut quod iste. Magnam et in consequatur.', 153699, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(11, 'A quidem minus est consequatur. Quo aut excepturi aut est voluptatem sed et sint.', 128, 'Hic dolores rerum nostrum necessitatibus officiis dolor. Magnam non animi nam dolore doloremque et.', 'Aperiam commodi sit consequatur aliquam. Officia voluptates quas quia porro et praesentium aut. Animi nesciunt in et quia.', 114965, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(12, 'Et eum maiores consequatur hic. Ea culpa est commodi. Consequatur accusantium et et voluptas.', 44, 'Iste voluptatibus et nisi quia provident. Facilis iusto aliquid animi provident enim animi eum.', 'Aperiam et qui rerum voluptatibus ipsa velit. Quasi incidunt aspernatur voluptatum consectetur similique. Pariatur quam dolorem cupiditate ut a eum dicta.', 349447, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(13, 'Minus ut et repellat. Molestiae consequatur in eveniet tempore at saepe consequatur voluptates.', 178, 'Provident nihil sint vero non dolore nesciunt. Qui quas et nostrum sunt. Atque qui et cum facilis.', 'Et saepe rerum voluptatem culpa. Incidunt adipisci eius adipisci omnis facere. Sit eos est earum iure voluptatem. Dolorum rerum dolor inventore nihil ad officia autem.', 180371, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(14, 'Fugiat sunt et nesciunt ut ducimus. Molestias voluptatum repellat sit qui culpa quia.', 36, 'Molestias ut commodi corporis tempora porro placeat soluta vel. Adipisci cumque voluptas fugit.', 'Praesentium repellat aut amet voluptatem ad sapiente. Autem quia repudiandae dolorem debitis eveniet dicta debitis. Est quo ullam repudiandae autem fugiat omnis animi.', 421335, 2, '2022-01-21 00:27:25', '2022-01-21 00:27:25'),
(15, 'Ea tempore nemo laborum illo. Est nulla esse sit asperiores laborum. Alias nostrum quis tenetur.', 176, 'Ea consequuntur eius rerum et. Placeat pariatur et ea nostrum illum.', 'Eos dolores id dolorem dicta amet sed atque. Reprehenderit fugit est dolorem sit consectetur non cupiditate. Vero ratione aut dolores et nisi minima.', 425165, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(16, 'Dolorem consequuntur nihil a id nulla. Aut iusto inventore velit magnam voluptate sed.', 91, 'Itaque deleniti in aut officia magni. Odio iure sed delectus. Possimus culpa sed cum debitis.', 'Vel ab sit dolores eius. Maiores dolore totam ad maxime eum. Illum quo enim voluptatem rerum adipisci hic. Itaque nisi ut ea rerum.', 92582, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(17, 'Autem maxime occaecati asperiores alias nesciunt culpa. Et totam inventore fuga suscipit.', 87, 'Similique quibusdam tenetur non qui ipsa amet blanditiis. Voluptatibus ab minima rerum est.', 'Doloremque et nobis error in neque. Corporis consequatur dolorum quam eveniet. Dicta optio quia non. Non ea ullam reiciendis tempore cupiditate. Qui laudantium exercitationem est delectus.', 408443, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(18, 'Itaque libero quia doloribus aut. Cupiditate rem doloribus in similique.', 41, 'Eaque et suscipit iusto aut autem inventore aliquam iusto. Incidunt ut dolorum beatae vitae.', 'Officiis aliquam sequi est et rerum hic qui. Occaecati totam ut repudiandae doloribus hic iure tempora. Consequatur ut nulla debitis sint animi non dignissimos nam.', 248752, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(19, 'Consequatur ea cupiditate maiores. Modi aut quisquam saepe illum et.', 86, 'Earum ea modi est minus et. Aut et ut aut quis velit. Et est id modi qui nam velit.', 'Assumenda ut non explicabo nam natus consequatur officia reiciendis. Exercitationem hic in tempora aspernatur voluptatem.', 403809, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(20, 'Quia necessitatibus quasi dolorum voluptatibus. Velit eos quisquam aut perspiciatis qui.', 167, 'Voluptate eos et ea nemo. Sunt et officiis ipsum eos sunt maxime. Est cumque incidunt quaerat nisi.', 'Voluptatum ut ut velit voluptatem. Iste recusandae aut iure et possimus explicabo consequatur ipsum. Quam quaerat soluta repellendus. Voluptatibus vitae ut quos sunt repudiandae aperiam illum eos.', 368964, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(21, 'Blanditiis error et est unde provident aut. Odit voluptatem eaque est. Ipsa rem saepe cum.', 172, 'Ipsam maiores totam nobis voluptas aut similique. Atque ut quos fuga odio.', 'Et culpa vitae sint et unde aliquam doloribus amet. Corrupti qui neque rem tenetur recusandae maiores impedit. Voluptatibus quaerat nesciunt animi sunt voluptate fuga aut. Velit sed quae ut.', 11014, 3, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(22, 'Sed qui quo est velit debitis eveniet. Laborum velit suscipit nemo pariatur quia.', 122, 'Ut nesciunt dolorum earum corporis. Unde neque quia accusantium expedita voluptas.', 'Iusto alias occaecati quia corporis neque expedita. Voluptatem ex beatae exercitationem quod. Provident neque enim et ducimus. Iste sequi aliquam commodi quasi ea.', 126979, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(23, 'Harum aut aliquid eum tenetur fugit. Qui non recusandae libero voluptates sed.', 31, 'Sit quisquam quasi temporibus velit. Aut ea ex odio fuga consequatur qui quas.', 'Ex velit sunt dolorum quia maiores quibusdam. Nesciunt voluptatem maiores accusantium non adipisci aliquam. Et quis soluta et quaerat.', 226527, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(24, 'Placeat iste eaque sit. Aut amet blanditiis hic. Tempora quibusdam quibusdam quod autem dicta.', 90, 'Sunt illum veritatis hic nemo. Id placeat tempore accusamus dolores autem aut veritatis.', 'Veritatis id iusto id veritatis accusantium. Qui quod dicta voluptatibus delectus cum a et omnis. Et consequatur rem fugit natus cumque omnis enim.', 161630, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(25, 'Pariatur et omnis omnis voluptas et ducimus voluptatem. Tempora eos vel veniam illum.', 100, 'Temporibus totam debitis qui vel ut nisi. Similique temporibus error fuga soluta aut.', 'Labore est nesciunt quae quis cupiditate. Vitae architecto cumque provident. Rerum et deserunt eos ab velit.', 279041, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(26, 'Nihil provident quisquam et rerum. Quo reprehenderit rerum provident maiores dolores.', 108, 'Quasi vel ut praesentium quo. Quae minus magni velit ratione. Aperiam aut quia quia mollitia.', 'Deserunt sed quidem nobis eius at nobis. Dolores consequuntur nisi ducimus voluptatem.', 169690, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(27, 'Eveniet facere quam eos modi ab ducimus. Iure suscipit sit similique autem.', 175, 'Et quidem deserunt fugit sit. Sed ut perferendis similique.', 'Assumenda asperiores earum necessitatibus atque. Dolore aut voluptatum alias et. Iure quasi maiores odio ipsum ipsa non numquam.', 332516, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26'),
(28, 'Alias omnis reiciendis quidem eligendi sequi blanditiis. Dolore id sunt ut vel.', 127, 'Voluptas sint voluptatem provident cupiditate incidunt ut nostrum animi. Sint pariatur velit hic.', 'Laboriosam sapiente consequatur est et sunt. Delectus officia officia reiciendis ex voluptate eos. Perspiciatis est dolorum aut dolore.', 448550, 4, '2022-01-21 00:27:26', '2022-01-21 00:27:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL DEFAULT '1990-01-01',
  `skill_rate` double NOT NULL,
  `communication_rate` double NOT NULL,
  `is_working` tinyint(1) NOT NULL COMMENT 'nhân viên này còn làm việc hay không',
  `work_schedule` int(11) NOT NULL COMMENT 'lịch làm việc theo tuần của nhân viên',
  `position_id` int(11) NOT NULL,
  `workplace_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `phone_number`, `email`, `birthday`, `home_address`, `work_address`, `provider_id`, `provider_name`, `rank_member_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$55Z3O8dhsOC0qkLrNpcZa.dmBmjCAbQ7R1T3Skgkg5ZI2vP8l2uWy', 'Lê Quang Thọ', '+84973271208', NULL, '1990-01-01', NULL, NULL, NULL, NULL, 1, 2, '2022-01-21 00:29:10', '2022-01-21 00:29:10'),
(2, '', 'Le Quang Tho', NULL, 'lequangtho@gmail.com', '1990-01-01', NULL, NULL, '111111111111111111', 'facebook', 1, 2, '2022-01-21 00:29:50', '2022-01-21 00:29:50'),
(3, '', 'Lê Quang Thọ', NULL, 'lequangtho2000lqtho@gmail.com', '1990-01-01', NULL, NULL, '3221330601483414', 'facebook', 1, 2, '2022-01-21 00:43:11', '2022-01-21 00:43:11');

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
  `latitude` double NOT NULL COMMENT 'vĩ độ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

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
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `workplace_id` (`workplace_id`);

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
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `workplaces`
--
ALTER TABLE `workplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Các ràng buộc cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`workplace_id`) REFERENCES `workplaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffs_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
