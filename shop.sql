-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 11:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', 'mobile', '2025-05-20 09:15:54', '2025-05-22 02:59:04'),
(2, 'Laptops', 'laptops', '2025-05-20 09:15:54', '2025-05-20 09:15:54'),
(3, 'Book', 'books', '2025-05-15 06:59:11', '2025-05-22 02:59:14'),
(4, 'Footwear', 'footwear', '2025-05-20 09:15:54', '2025-05-20 09:15:54');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_05_13_create_categories_table', 1),
(3, '2025_05_13_create_orders_table', 1),
(4, '2025_05_13_create_products_table', 1),
(5, '2025_05_15_create_cart_table', 2),
(6, '2025_05_18_043528_add_user_id_to_cart_table', 3),
(7, '2025_05_19_061344_add_status_to_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(156, 7, 185000.00, 'pending', '2025-05-25 23:02:44', '2025-05-25 23:02:44'),
(157, 7, 185000.00, 'pending', '2025-05-25 23:04:16', '2025-05-25 23:04:16'),
(158, 7, 185000.00, 'pending', '2025-05-25 23:06:17', '2025-05-25 23:06:17'),
(159, 7, 1199.00, 'pending', '2025-05-26 22:30:04', '2025-05-26 22:30:04'),
(160, 9, 60000.00, 'pending', '2025-05-26 22:45:32', '2025-05-26 22:45:32'),
(161, 9, 60000.00, 'pending', '2025-05-26 22:48:55', '2025-05-26 22:48:55'),
(162, 10, 284.99, 'pending', '2025-05-27 04:09:30', '2025-05-27 04:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'iPhone 14', 'Latest Apple smartphone with A15 chip', 100000.00, 'products/iphone14.jpg', '2025-05-22 05:34:03', '2025-05-22 03:23:01'),
(2, 1, 'Samsung Galaxy S22', 'Samsung flagship phone with AMOLED display', 100000.00, 'products/galaxy-s22.jpg', '2025-05-22 05:34:03', '2025-05-24 23:00:59'),
(4, 2, 'Dell XPS 13', 'Premium ultrabook with sleek design', 70000.00, 'products/dell-xps.jpg', '2025-05-22 05:34:03', '2025-05-26 22:50:13'),
(5, 2, 'HP Pavilion 15', 'Affordable and reliable laptop', 60000.00, 'products/hp-pavilion.jpg', '2025-05-22 05:34:03', '2025-05-23 04:30:44'),
(8, 3, 'Clean Code', 'Best practices for writing clean code', 34.99, 'products/clean-code.jpg', '2025-05-22 05:34:03', '2025-05-22 05:34:03'),
(11, 4, 'Adidas Running Shoes', 'Great grip and performance for runners', 11000.00, 'products/adidas-run.jpg', '2025-05-22 05:34:03', '2025-05-22 03:22:47'),
(13, 1, 'samsung galaxy S23', 'latest 5g phone which 100x zoom camera', 125000.00, NULL, '2025-05-22 03:23:41', '2025-05-24 03:49:25'),
(14, 2, 'Lenevo ideopad', 'fastest gaming laptop and super processor', 50000.00, NULL, '2025-05-23 03:12:39', '2025-05-23 03:12:39'),
(15, 3, 'Laravel for beginners', 'this is best book for the beginners who learn laravel', 250.00, NULL, '2025-05-23 13:00:25', '2025-05-23 13:00:25'),
(16, 4, 'nike sneakers', 'super cool and very comfortable shoes', 3000.00, NULL, '2025-05-24 04:20:34', '2025-05-24 04:20:34'),
(17, 1, 'Samsung Galaxy S24 Ultra', 'Latest 5G phone with Personal AI and super fast processor', 150000.00, NULL, '2025-05-24 23:00:32', '2025-05-24 23:00:32');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'rohit', 'rohit14@gmail.com', NULL, '$2y$12$.ndKOS3mfSOi9AAaRCTR/OCGU5N/OboJyfLyQm8/hPFimEjrLGNZu', NULL, '2025-05-16 00:20:17', '2025-05-16 00:20:17'),
(4, 'ayaz', 'ayaz14@gmail.com', NULL, '$2y$12$rqFrQ/T.fU8MczdkoVsimO3DC3RrZonLlxD0q8UxUBZVH//5juaQ2', NULL, '2025-05-17 03:12:32', '2025-05-17 03:12:32'),
(5, 'aman', 'aman123@gmail.com', NULL, '$2y$12$unEDh5wLOjJJSqmJYo8zkes6xuTby36rzpoQdXxCCFE5WC5UcgivS', NULL, '2025-05-19 23:59:36', '2025-05-19 23:59:36'),
(6, 'zuveriya', 'zuveriya12@gmail.com', NULL, '$2y$12$b08m4VVQU6CM2CI.6DUYJ.7k.z2Lu2joVWCfTTAEQb7CmkErZy6bG', NULL, '2025-05-20 23:59:01', '2025-05-20 23:59:01'),
(7, 'faizan', 'faizan123@gmail.com', NULL, '$2y$12$kKxY5uM2cxCDXP8manf4X.L7N50jwaHet9RZSTd7kqM4dkT8OEkQ6', NULL, '2025-05-21 12:50:35', '2025-05-21 12:50:35'),
(8, 'sabana', 'sabana123@gmail.com', NULL, '$2y$12$wU10BkIviwib4nppB4ypMOtNL9LBQZ8J/RnQ.XWDTghUPI5OCJ2ka', NULL, '2025-05-23 23:16:55', '2025-05-23 23:16:55'),
(9, 'safwan shiekh', 'safwan786@gmail.com', NULL, '$2y$12$lI0s7u2gCVKbg3Cpv3itaeStGbF3ZpdIAI2VcCxABX5iXQLmN2as2', NULL, '2025-05-26 22:44:53', '2025-05-26 22:44:53'),
(10, 'mohammad', 'mohammad990@gmail.com', NULL, '$2y$12$YGj/jP0Cnex2XWbgdryRyeOKLWV84zr.vXypRypB1ZEu9ZErEDIEO', NULL, '2025-05-27 04:08:39', '2025-05-27 04:08:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_order_id_foreign` (`order_id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
