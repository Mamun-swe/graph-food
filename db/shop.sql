-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 04:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `bangla_foods`
--

CREATE TABLE `bangla_foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangla_foods`
--

INSERT INTO `bangla_foods` (`id`, `category`, `product_name`, `total_item`, `product_price`, `item_details`, `product_status`, `product_image`, `created_at`, `updated_at`) VALUES
(7, 'breakfast', 'hello', '2', '415', 'asdf', '1', '1586438954.jpg', '2020-04-09 07:29:14', '2020-04-09 07:29:19'),
(8, 'launce', 'sda', '2', '144', 'hmm', '1', '1586438973.jpg', '2020-04-09 07:29:33', '2020-04-09 07:29:33'),
(9, 'dinner', 'hello', '5', '15', 'fdsf', '1', '1586438985.JPG', '2020-04-09 07:29:45', '2020-04-09 07:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_description`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'Welcome To Food_Coat', 'Suspendisse potenti. Proin in diam magna. Duis iaculis dolor erat, quis semper turpis accumsan non. Pellentesque auctor eros purus, eget pulvinar dolor pellentesque in. Duis quis tempus eros. Phasellus vel turpis a nisl convallis tempus ultricies in purus. Integer dapibus erat at nunc.', '1585581108.png', '2020-03-30 09:11:48', '2020-03-30 09:11:48'),
(6, 'শেষ হ’ল জীবনের সব লেনদেন - জীবনানন্দ দাশ', 'শেষ হ’ল জীবনের সব লেনদেন,\r\nবনলতা সেন।\r\nকোথায় গিয়েছ তুমি আজ এই বেলা\r\nমাছরাঙা ভোলেনি তো দুপুরের খেলা\r\n\r\nশালিখ করে না তার নীড় অবহেলা\r\nউচ্ছ্বাসে নদীর ঢেউ হয়েছে সফেন,\r\nতুমি নাই বনলতা সেন।\r\nতোমার মতন কেউ ছিল কি কোথাও?\r\nকেন যে সবের আগে তুমি চলে যাও।\r\nকেন যে সবের আগে তুমি', '1586189237.png', '2020-04-06 10:07:17', '2020-04-06 10:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unordered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 20, 'accepted', '2020-03-27 09:03:21', '2020-03-31 10:45:02'),
(2, 2, 1, 6, 'accepted', '2020-03-27 09:03:22', '2020-03-31 10:45:03'),
(3, 2, 2, 19, 'accepted', '2020-03-27 09:05:52', '2020-03-31 10:45:02'),
(4, 2, 2, 17, 'accepted', '2020-03-27 10:51:04', '2020-03-31 10:45:02'),
(5, 2, 1, 6, 'accepted', '2020-03-27 10:51:05', '2020-03-31 10:45:03'),
(6, 2, 2, 10, 'accepted', '2020-03-27 10:54:50', '2020-03-31 10:45:02'),
(7, 2, 1, 6, 'accepted', '2020-03-27 10:54:50', '2020-03-31 10:45:03'),
(8, 2, 2, 9, 'accepted', '2020-03-27 10:58:50', '2020-03-31 10:45:02'),
(9, 2, 1, 5, 'accepted', '2020-03-27 10:58:51', '2020-03-31 10:45:03'),
(15, 2, 2, 4, 'accepted', '2020-03-30 07:12:10', '2020-04-05 09:36:46'),
(16, 2, 2, 3, 'accepted', '2020-03-30 07:15:41', '2020-04-05 09:36:46'),
(17, 2, 1, 3, 'accepted', '2020-03-30 07:15:42', '2020-04-05 09:36:46'),
(18, 2, 2, 2, 'accepted', '2020-03-30 07:17:21', '2020-04-05 09:36:46'),
(23, 2, 9, 1, 'accepted', '2020-04-05 09:35:51', '2020-04-05 09:36:46'),
(24, 2, 8, 1, 'accepted', '2020-04-05 09:35:51', '2020-04-05 09:36:46'),
(25, 2, 20, 1, 'accepted', '2020-04-05 09:35:54', '2020-04-05 09:36:46'),
(26, 2, 22, 2, 'accepted', '2020-04-05 10:33:52', '2020-04-05 11:32:20'),
(27, 2, 5, 2, 'accepted', '2020-04-05 10:33:53', '2020-04-05 11:32:20'),
(32, 2, 4, 1, 'ordered', '2020-04-09 07:24:31', '2020-04-09 07:25:01'),
(33, 2, 5, 1, 'ordered', '2020-04-09 07:24:33', '2020-04-09 07:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Beverages', '2020-03-27 09:02:44', '2020-04-01 05:58:11'),
(2, 'Cookies', '2020-03-30 09:19:27', '2020-04-01 05:58:52'),
(3, 'Fast Food', '2020-03-30 09:19:37', '2020-04-01 05:59:58'),
(4, 'Bread & Bakery', '2020-04-01 06:01:19', '2020-04-01 06:01:19'),
(5, 'Stationery', '2020-04-01 06:02:20', '2020-04-01 06:02:20'),
(6, 'Fashion & Life Style', '2020-04-01 06:05:58', '2020-04-01 06:05:58'),
(7, 'Offer', '2020-04-09 07:41:42', '2020-04-09 07:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(62, '2019_08_19_000000_create_failed_jobs_table', 2),
(63, '2020_03_22_150744_create_categories_table', 2),
(64, '2020_03_22_161200_create_products_table', 2),
(65, '2020_03_23_154708_create_banners_table', 2),
(66, '2020_03_23_162648_create_testimonials_table', 2),
(67, '2020_03_25_162124_create_carts_table', 2),
(68, '2020_03_27_135826_create_orders_table', 2),
(69, '2020_04_06_153523_create_bangla_foods_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `phone`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'mamun', 1533592610, 'Dattapara', 'acceptd', '2020-03-27 09:04:23', '2020-04-05 11:32:20'),
(2, 2, 'mamun', 1721988188, 'Ashulia', 'acceptd', '2020-03-27 10:04:48', '2020-04-05 11:32:20'),
(3, 2, 'mamun', 1719845063, 'GraphHospital', 'acceptd', '2020-03-27 10:52:56', '2020-04-05 11:32:20'),
(4, 2, 'mamun', 1433592610, 'srdgsdf', 'acceptd', '2020-03-27 10:56:04', '2020-04-05 11:32:20'),
(5, 2, 'mamun', 1533592610, 'fsdgsd', 'acceptd', '2020-03-27 10:59:52', '2020-04-05 11:32:20'),
(6, 2, 'mamun', 1533592610, 'dfgdf', 'acceptd', '2020-03-30 07:14:56', '2020-04-05 11:32:20'),
(7, 2, 'mamun', 1533592610, 'dfgdfg', 'acceptd', '2020-03-30 07:15:54', '2020-04-05 11:32:20'),
(8, 2, 'mamun', 1533592610, 'yksg-ext-2', 'acceptd', '2020-03-30 07:38:50', '2020-04-05 11:32:20'),
(9, 2, 'mamun', 1533592610, 'yksg-ext-2', 'acceptd', '2020-04-05 09:36:13', '2020-04-05 11:32:20'),
(10, 2, 'mamun', 1779296854, 'yksg-ext-1', 'acceptd', '2020-04-05 10:34:34', '2020-04-05 11:32:20'),
(11, 2, 'mamun', 1533592610, 'dattapara', 'pending', '2020-04-09 07:25:01', '2020-04-09 07:25:01');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_price`, `product_type`, `product_status`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'mango', '50', 'hot', '1', '1585321381.png', '2020-03-27 09:03:01', '2020-03-27 09:03:01'),
(2, 1, 'Strawberry', '50', 'new', '1', '1585321395.png', '2020-03-27 09:03:15', '2020-03-27 09:03:15'),
(3, 2, 'JSJS', '20', 'regular', '1', '1585724793.jpg', '2020-04-01 01:06:33', '2020-04-01 01:06:33'),
(4, 3, 'DFG', '20', 'new', '1', '1585724999.png', '2020-04-01 01:09:59', '2020-04-01 01:09:59'),
(5, 2, 'DFGSA', '500', 'regular', '1', '1585746431.webp', '2020-04-01 01:12:52', '2020-04-01 07:07:11'),
(6, 3, 'FDF', '40', 'hot', '1', '1586071840.jpg', '2020-04-01 01:19:20', '2020-04-05 01:30:40'),
(7, 3, 'GDFSG', '430', 'hot', '1', '1585725746.png', '2020-04-01 01:22:26', '2020-04-01 01:22:26'),
(8, 1, 'Can', '20', 'hot', '1', '1585743251.png', '2020-04-01 06:14:11', '2020-04-01 06:14:11'),
(9, 1, 'Tea', '10', 'new', '1', '1585743395.png', '2020-04-01 06:16:35', '2020-04-01 06:16:35'),
(10, 4, 'All Time Bread', '30', 'new', '1', '1585744053.png', '2020-04-01 06:27:33', '2020-04-01 06:27:33'),
(11, 4, 'All Time Cake', '40', 'hot', '1', '1585744073.png', '2020-04-01 06:27:53', '2020-04-01 06:27:53'),
(12, 4, 'All Time Bread', '30', 'regular', '1', '1585744156.png', '2020-04-01 06:29:16', '2020-04-01 06:29:16'),
(13, 4, 'Dan Cake', '25', 'new', '1', '1585744298.png', '2020-04-01 06:31:38', '2020-04-01 06:31:38'),
(14, 6, 'Lifeboy', '84', 'hot', '1', '1585745494.png', '2020-04-01 06:51:34', '2020-04-01 06:51:34'),
(15, 6, 'YC', '45', 'new', '1', '1585745519.png', '2020-04-01 06:51:59', '2020-04-01 06:51:59'),
(16, 6, 'GH', '53', 'new', '1', '1585745534.png', '2020-04-01 06:52:14', '2020-04-01 06:52:14'),
(17, 6, 'FGH', '25', 'new', '1', '1585745746.png', '2020-04-01 06:55:16', '2020-04-01 06:55:46'),
(18, 3, 'dfg', '20', 'new', '1', '1585746070.png', '2020-04-01 07:01:10', '2020-04-01 07:01:10'),
(19, 3, 'jh', '55', 'regular', '1', '1585746095.png', '2020-04-01 07:01:35', '2020-04-01 07:01:35'),
(20, 3, 'df', '25', 'hot', '1', '1585746108.png', '2020-04-01 07:01:48', '2020-04-01 07:01:48'),
(21, 3, 'rdf', '54', 'regular', '1', '1585746126.png', '2020-04-01 07:02:06', '2020-04-01 07:02:06'),
(22, 2, 'cake', '44', 'regular', '1', '1585746301.png', '2020-04-01 07:05:01', '2020-04-01 07:05:01'),
(23, 2, 'zscf', '44', 'new', '1', '1585746320.jpg', '2020-04-01 07:05:20', '2020-04-01 07:05:20'),
(24, 5, 'dfg', '45', 'new', '1', '1585746491.jpg', '2020-04-01 07:08:11', '2020-04-01 07:08:11'),
(25, 5, 'dxfvg', '55', 'regular', '1', '1585746510.png', '2020-04-01 07:08:30', '2020-04-01 07:08:30'),
(26, 5, 'dfd', '44', 'hot', '1', '1585746522.png', '2020-04-01 07:08:42', '2020-04-01 07:08:42'),
(27, 5, 'fdg', '77', 'new', '1', '1585746536.png', '2020-04-01 07:08:56', '2020-04-01 07:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mamun', 'Suspendisse potenti. Proin in diam magna. Duis iaculis dolor erat, quis semper turpis accumsan non. Pellentesque auctor eros purus, eget pulvinar dolor pellentesque in. Duis quis tempus eros. Phasellus vel turpis a nisl convallis tempus ultricies in purus. Integer dapibus erat at nunc.', '1585811203.png', '2020-04-02 01:06:43', '2020-04-02 01:06:43'),
(2, 'Hasan', 'Suspendisse potenti. Proin in diam magna. Duis iaculis dolor erat, quis semper turpis accumsan non. Pellentesque auctor eros purus, eget pulvinar dolor pellentesque in. Duis quis tempus eros. Phasellus vel turpis a nisl convallis tempus ultricies in purus. Integer dapibus erat at nunc.', '1585811227.png', '2020-04-02 01:07:07', '2020-04-02 01:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '1', NULL, '$2y$10$9/cyYxo1H4Ap3P7XD0c74.LNWrM6V5c6DIE5iRTSk9tYBvduZezF2', NULL, '2020-03-24 10:26:11', '2020-03-24 10:26:11'),
(2, 'mamun', 'mamun@gmail.com', '0', NULL, '$2y$10$Thzl7/OzeWuUhnDYEahzk.ho62cStqlNBYfFGkbRbS.NiWUIoShCe', NULL, '2020-03-24 10:26:45', '2020-04-05 11:28:55'),
(3, 'hasan', 'hasan@gmail.com', '0', NULL, '$2y$10$FQbKiPUkNK6bPgKxXgEsnejIZaRIn6/UXCVs9W2n/CySR75PK2E8e', NULL, '2020-03-30 08:55:50', '2020-03-30 08:55:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangla_foods`
--
ALTER TABLE `bangla_foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `bangla_foods`
--
ALTER TABLE `bangla_foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
