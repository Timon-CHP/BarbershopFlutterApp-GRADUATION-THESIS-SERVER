-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2022 lúc 05:59 AM
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
  `quantily` int(11) NOT NULL DEFAULT 1,
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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_20_043353_create_bill_products_table', 1),
(3, '2022_01_20_043353_create_bills_table', 1),
(4, '2022_01_20_043353_create_category_products_table', 1),
(5, '2022_01_20_043353_create_category_services_table', 1),
(6, '2022_01_20_043353_create_discounts_table', 1),
(7, '2022_01_20_043353_create_manufacturers_table', 1),
(8, '2022_01_20_043353_create_positions_table', 1),
(9, '2022_01_20_043353_create_products_table', 1),
(10, '2022_01_20_043353_create_rank_members_table', 1),
(11, '2022_01_20_043353_create_roles_table', 1),
(12, '2022_01_20_043353_create_services_table', 1),
(13, '2022_01_20_043353_create_staffs_table', 1),
(14, '2022_01_20_043353_create_task_services_table', 1),
(15, '2022_01_20_043353_create_tasks_table', 1),
(16, '2022_01_20_043353_create_user_products_table', 1),
(17, '2022_01_20_043353_create_users_table', 1),
(18, '2022_01_20_043353_create_workplaces_table', 1),
(19, '2022_01_20_043354_add_foreign_keys_to_bill_products_table', 1),
(20, '2022_01_20_043354_add_foreign_keys_to_bills_table', 1),
(21, '2022_01_20_043354_add_foreign_keys_to_products_table', 1),
(22, '2022_01_20_043354_add_foreign_keys_to_services_table', 1),
(23, '2022_01_20_043354_add_foreign_keys_to_staffs_table', 1),
(24, '2022_01_20_043354_add_foreign_keys_to_task_services_table', 1),
(25, '2022_01_20_043354_add_foreign_keys_to_tasks_table', 1),
(26, '2022_01_20_043354_add_foreign_keys_to_user_products_table', 1),
(27, '2022_01_20_043354_add_foreign_keys_to_users_table', 1);

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
(1, 'App\\Models\\User', 1, 'loginToken', 'e493505eb5da5d221dcdae410edf6eef223aa0a82ad3f47a36ca2af5bbf95509', '[\"*\"]', NULL, '2022-01-19 21:56:41', '2022-01-19 21:56:41'),
(2, 'App\\Models\\User', 2, 'loginToken', '85018a79069a7f927f7eaf31bb1e7feeb6b5546d56b4bd4b2a21907ce7a337eb', '[\"*\"]', NULL, '2022-01-19 21:57:26', '2022-01-19 21:57:26'),
(3, 'App\\Models\\User', 3, 'regisToken', 'd4b20a1e94f4185f3581fcc97efcfaa900d919228ce2eaa016ce629bb9998f20', '[\"*\"]', NULL, '2022-01-19 21:58:32', '2022-01-19 21:58:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Silver', '2022-01-19 21:37:40', '2022-01-19 21:37:40'),
(2, 'Silver', '2022-01-19 21:37:40', '2022-01-19 21:37:40'),
(3, 'Gold', '2022-01-19 21:37:40', '2022-01-19 21:37:40'),
(4, 'Diamond', '2022-01-19 21:37:40', '2022-01-19 21:37:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) NOT NULL,
  `name` char(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-01-19 21:37:40', '2022-01-19 21:37:40'),
(2, 'user', '2022-01-19 21:37:40', '2022-01-19 21:37:40');

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
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
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
  `task_id` bigint(20) NOT NULL,
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
  `user_id` bigint(20) NOT NULL,
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

INSERT INTO `users` (`user_id`, `password`, `name`, `phone_number`, `email`, `birthday`, `home_address`, `work_address`, `provider_id`, `provider_name`, `rank_member_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '', 'Trang Hoàng', NULL, 'damcuoihoangtrang@gmail.com', '1990-01-01', NULL, NULL, '116494729113863043310', 'google', 1, 2, '2022-01-19 21:56:41', '2022-01-19 21:56:41'),
(2, '', 'Lê Quang Thọ', NULL, 'lequangtho2000lqtho@gmail.com', '1990-01-01', NULL, NULL, '3221330601483414', 'facebook', 1, 2, '2022-01-19 21:57:26', '2022-01-19 21:57:26'),
(3, '$2y$10$tI2GGrJ/UsAhkVDj36euxOCt2M4smc8xKp3aeqN8dL/EQPRWY8dOy', 'Lê Quang Thọ', '+84973271208', NULL, '1990-01-01', NULL, NULL, NULL, NULL, 1, 2, '2022-01-19 21:58:32', '2022-01-19 21:58:32');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `workplaces`
--

CREATE TABLE `workplaces` (
  `workplace_id` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`bill_id`),
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
  ADD PRIMARY KEY (`discount_id`),
  ADD UNIQUE KEY `code` (`code`);

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
  ADD PRIMARY KEY (`position_id`);

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
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `category_service_id` (`category_service_id`);

--
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `workplace_id` (`workplace_id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
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
  ADD PRIMARY KEY (`user_id`),
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
  ADD PRIMARY KEY (`workplace_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `workplaces`
--
ALTER TABLE `workplaces`
  MODIFY `workplace_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Các ràng buộc cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`workplace_id`) REFERENCES `workplaces` (`workplace_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffs_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rank_member_id`) REFERENCES `rank_members` (`rank_member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
