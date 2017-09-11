-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2017 at 12:01 PM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `name`) VALUES
('BTC', 'Bit Coin'),
('DD', 'Dollar'),
('LEO', 'Leo Coin');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `fk_forum` int(11) NOT NULL,
  `fk_thread` int(11) NOT NULL,
  `d_title` varchar(70) NOT NULL,
  `forum` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `fk_forum`, `fk_thread`, `d_title`, `forum`) VALUES
(4, 0, 28, 'test 1', 'ICO'),
(5, 0, 29, 'test2', 'ICO'),
(6, 0, 30, 'test 1', 'ICO'),
(7, 0, 31, 'test 1', 'ICO'),
(8, 0, 32, 'test 1', 'ICO'),
(9, 0, 33, 'test 3', 'ICO');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `f_id` int(11) NOT NULL,
  `f_user_id` int(11) NOT NULL,
  `f_follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`f_id`, `f_user_id`, `f_follower_id`) VALUES
(1, 1, 2),
(4, 1, 5),
(7, 1, 2),
(8, 1, 2),
(9, 1, 2),
(10, 1, 2),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `code`, `type`, `name`) VALUES
(5, 'ICO', 'coin', 'ICOs'),
(6, 'Mining', 'coin', 'Mining'),
(7, 'Economy', 'coin', 'Economy'),
(8, 'Politics', 'coin', 'Politics'),
(9, 'Technology', 'coin', 'Technology'),
(10, 'Off topic', 'coin', 'Off topic'),
(11, 'Algorithmic', 'coin', 'Algorithmic'),
(12, 'Philosophy', 'coin', 'Philosophy'),
(13, 'Help', 'coin', 'Help');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `thread_id`, `post_id`, `user_id`) VALUES
(290, 9, 14, 1),
(291, 9, 15, 1),
(297, 11, NULL, 1),
(303, 3, NULL, 1);

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
(3, '2017_07_20_095204_create_channels_table', 1),
(4, '2017_07_20_095204_create_notifications_table', 1),
(5, '2017_07_20_095204_create_polls_table', 1),
(6, '2017_07_20_095204_create_posts_table', 1),
(7, '2017_07_20_095204_create_threads_table', 1),
(8, '2017_07_20_095214_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `type` enum('like','award') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` longblob NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `parrent` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` longblob,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `answer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `text`, `title`, `slug`, `channel_id`, `user_id`, `deleted_at`, `answer_id`, `created_at`, `updated_at`) VALUES
(28, 0x3c703e7465737420313c62723e3c2f703e, 'test 1', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:32:34', '2017-09-08 01:32:34'),
(29, 0x3c703e74657374323c62723e3c2f703e, 'test2', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:32:44', '2017-09-08 01:32:44'),
(30, 0x7265706c792074657374313c62723e, 'test 1', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:32:58', '2017-09-08 01:32:58'),
(31, 0x7265706c7920746573742031207365636f6e643c62723e, 'test 1', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:59:08', '2017-09-08 01:59:08'),
(32, 0x3c703e7265706c79207465737420312074686972643c62723e3c62723e3c2f703e, 'test 1', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:59:21', '2017-09-08 01:59:21'),
(33, 0x3c703e7465737420333c62723e3c2f703e, 'test 3', 'ICO', NULL, 1, NULL, NULL, '2017-09-08 01:59:53', '2017-09-08 01:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_posts` int(11) NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `u_posts`, `email`, `img`, `password`, `remember_token`, `created_at`, `updated_at`, `fcm_token`) VALUES
(1, 'Umer', 'Farooq', 7, 'umer@gmail.com', 'jpg', '$2y$10$TTNSYZoYtAfZFy0t0E7AWeB2GyYFSmWSqKgCWJM0kO41kUKFbGBaW', 'JEwXSu3hQAjTtxfwsOf9i3cZOYOQX6kdZeiQ0Vnx3DEntts9fIOkr4cO92wh', '2017-07-20 19:41:26', '2017-09-08 01:59:53', 'dyTDV-ao4Y0:APA91bG0P2uaUbvGfcr714Z2tRoj4jfAnlDRismsBFdWlOX2dqTe5areQjCjdOJP_snVqaIuaga7qcJ_Sri1Wd2vRqREE3ec-jUWzrp8kbzZvxu2wUCJwQpzAEuMCzZt_bQRKe6GLZQj'),
(2, 'Zia Ur Rehman', NULL, 0, 'zia@gmail.com', 'png', '$2y$10$diJ.lUucG17NUMriVN9qWuLYK/wzR8BckRq7SoXbZ3jXmtLOADJum', 'bYX8YAUBo9K6r07epNvYtPYSLBhLvdOe8LUeSee3aa2HsuUnY77jrUaWI8aY', '2017-07-21 18:50:19', '2017-07-21 18:50:19', NULL),
(3, 'Mark', NULL, 0, 'zia1@gmail.com', 'jpg', '$2y$10$cMfk8H53om6vAtCuItmAzObOKEgIrCQdDgfmeLE3e4CzxAwAsIOgq', 'D31h0AYDc8a6nLiiSna1WbNcZDWpRPQQt41FDxQAfMCpN6srAZHglYiWHDh4', '2017-07-21 17:30:28', '2017-07-21 17:30:28', NULL),
(4, 'mouse', NULL, 0, 'peterfarah2@hotmail.com', 'jpg', '$2y$10$Cw08odnzlJzvyjd/JHPod.VfFnxV6AlSxjzH.olsdXxmrILKNbSee', NULL, '2017-07-21 23:15:19', '2017-07-21 23:15:19', NULL),
(5, 'noman', 'Ahmed', 0, 'noman@gmail.com', 'jpg', '$2y$10$YaKnmMWbRc4Iy5EEOn8oz.AO.2QZLqGMceco4mCedZIpvMe1h/IrK', 'WFqyi7ywYQU7dQbxn4DQCPmoqWn81r7vOEeHwa6h1fpZ5LVayBtHPlSjciOX', '2017-08-02 07:31:49', '2017-08-04 05:07:03', 'dyTDV-ao4Y0:APA91bG0P2uaUbvGfcr714Z2tRoj4jfAnlDRismsBFdWlOX2dqTe5areQjCjdOJP_snVqaIuaga7qcJ_Sri1Wd2vRqREE3ec-jUWzrp8kbzZvxu2wUCJwQpzAEuMCzZt_bQRKe6GLZQj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `channels_slug_unique` (`slug`),
  ADD UNIQUE KEY `channels_color_unique` (`color`),
  ADD UNIQUE KEY `channels_icon_unique` (`icon`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_thread_id_foreign` (`thread_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polls_user_id_foreign` (`user_id`),
  ADD KEY `polls_post_id_foreign` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_thread_id_foreign` (`thread_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threads_channel_id_foreign` (`channel_id`),
  ADD KEY `threads_user_id_foreign` (`user_id`),
  ADD KEY `threads_answer_id_foreign` (`answer_id`);

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
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `polls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
