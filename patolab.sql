-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2017 at 11:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patolab`
--
CREATE DATABASE IF NOT EXISTS `patolab` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `patolab`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_01_03_213857_create_reports_table', 1),
(3, '2017_01_03_213942_create_tests_table', 1),
(4, '2017_01_03_214144_create_patient_details_table', 1),
(5, '2017_01_04_213020_rename_patients_table', 2),
(6, '2017_01_05_034928_remove_image_column', 3),
(7, '2017_01_05_052150_remove_unique_from_test_name', 4),
(8, '2017_01_05_181525_add_picture_column_totests', 5),
(9, '2017_01_05_181716_add_gender_topatient', 6),
(10, '2017_01_05_185104_remove_unique_report_name', 7),
(11, '2017_01_06_023922_add_remember_me', 8);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `regnumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `medical_history` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genotype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `regnumber`, `dob`, `medical_history`, `address`, `blood_group`, `genotype`, `user_id`, `gender`) VALUES
(5, 'PT/2017/01/05/49276', '2017-01-04', 'dfdfsf fdfsdfdsfs', 'dfsdsdffdf', 'A+', 'AC', 30, 0),
(6, 'PT/2017/01/05/12114', '2017-01-11', 'xffdfdf', 'fdfdfdfdfdf', 'A+', 'AS', 31, 0),
(7, 'PT/2017/01/05/83644', '2017-01-13', 'dfdfd ', 'dfdfd', 'O–', 'SC', 32, 0),
(8, 'PT/2017/01/05/22502', '2017-01-03', 'sdsdsd\nsdsfddfd', 'dsdsdsdsd', 'A+', 'AS', 33, 1),
(9, 'PT/2017/01/06/47213', '2017-01-04', 'No meduical History', 'my addees', 'A-', 'AA', 34, 0),
(10, 'PT/2017/01/06/75527', '2010-03-12', 'No previous record or ailment', '3, Barcelona road', 'A+', 'AC', 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `operator_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `patient_id`, `operator_id`, `created_at`, `updated_at`) VALUES
(15, 'Report/00001', 33, 1, '2017-01-05 19:36:53', '2017-01-05 19:36:53'),
(16, 'Report/00001', 31, 4, '2017-01-05 23:49:56', '2017-01-05 23:49:56'),
(18, 'Report/00001', 34, 4, '2017-01-05 23:53:59', '2017-01-05 23:53:59'),
(19, 'Report/00002', 34, 1, '2017-01-06 08:43:45', '2017-01-06 08:43:45'),
(20, 'Report/00001', 35, 1, '2017-01-06 08:50:19', '2017-01-06 08:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physician` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `picture` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `physician`, `result`, `date`, `report_id`, `picture`) VALUES
(23, 'Test One', 'Physician Name', 'While $fillable serves as a "white list" of attributes that should be mass assignable, you may also choose to use $guarded. The $guarded property should contain an array of attributes that you do not want to be mass assignable. All other attributes not in the array will be mass assignable. So,  $guarded functions like a "black list". Of course, you should use either $fillable or $guarded - not both. In the example below, all attributes except for price will be mass assignable:t', '2016-07-16', 15, NULL),
(24, 'Test Name', 'Physician Name', 'While $fillable serves as a "white list" of attributes that should be mass assignable, you may also choose to use $guarded. The $guarded property should contain an array of attributes that you do not want to be mass assignable. All other attributes not in the array will be mass assignable. So,  $guarded functions like a "black list". Of course, you should use either $fillable or $guarded - not both. In the example below, all attributes except for price will be mass assignable:', '2017-01-05', 15, NULL),
(25, 'Third Test', 'Joe Allen', 'While $fillable serves as a "white list" of attributes that should be mass assignable, you may also choose to use $guarded. The $guarded property should contain an array of attributes that you do not want to be mass assignable. All other attributes not in the array will be mass assignable. So,  $guarded functions like a "black list". Of course, you should use either $fillable or $guarded - not both. In the example below, all attributes except for price will be mass assignable:\r\n\r\n\r\n\r\nWhile $fillable serves as a "white list" of attributes that should be mass assignable, you may also choose to use $guarded. The $guarded property should contain an array of attributes that you do not want to be mass assignable. All other attributes not in the array will be mass assignable. So,  $guarded functions like a "black list". Of course, you should use either $fillable or $guarded - not both. In the example below, all attributes except for price will be mass assignable:', '2017-01-13', 15, NULL),
(26, 'affdfdf', 'dfdsfdfds  dfdfsfsd', 'dfsfdfss', '2017-01-19', 16, NULL),
(27, 'fdfsdfds dfdsffd', 'dfsfdf dfdfsd', 'dfsdfsdf dfdfssfddf', '2017-01-13', 16, NULL),
(29, 'bsdsds sdhsdsjds', 'sdsd', 'ssdsdnsnds', '2017-01-22', 18, NULL),
(30, 'Test One', 'Joe Hart', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.', '2017-01-13', 19, NULL),
(31, 'Test Two', 'Adekunlw Adeoye', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.', '2017-01-20', 19, NULL),
(32, 'New Test for Report', 'Adeoye Eniole', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.', '2017-01-20', 20, NULL),
(33, 'New test', 'Pep Guardiorla', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices vehicula neque in dignissim. Fusce nec sagittis sem, mollis volutpat tortor. Fusce tempor ut turpis vel tempus. Cras vel orci convallis massa faucibus tristique at id odio. Etiam vitae tortor in ipsum convallis iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum turpis eu felis faucibus, imperdiet vulputate nulla ultrices. Pellentesque sagittis convallis quam sed imperdiet. In pretium mi in nunc porttitor dictum. Ut porta ex est, id cursus leo consectetur sed. Sed semper tellus sit amet velit feugiat eleifend. Pellentesque porttitor odio tellus, non iaculis turpis tristique sed. Proin luctus mauris dolor, non pretium odio laoreet id.', '2017-01-20', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `type`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'ANAtEiID9qmLzeO', 'VgHETK4QQ9@gmail.com', 'KLktCE4RLsg', 1, '$2y$10$Oycjy4sJFfaz1SOsxpqP7eSw7lJB9kd/6m.U/cpRnBvQe9jdTjbqC', NULL, '2017-01-06 08:50:29', 'UGJGklWCe65CjmNtRVNGQjqTSumTwd5Aziyu4DKuwiSCGPLdsvOE4iFk5MK1'),
(2, 'CaGZzKQYVz9bR5S', 'TARVa8uWSp@gmail.com', 'jzYeDVCKKVU', 1, '$2y$10$SyJziWQD0wEoKWKOdSQ.TuM/ntPXq0e/3xRepGVoGWcH.TGT1crO.', NULL, NULL, NULL),
(3, '96t1qHQLJ0rtFCT', '1ZTG9divJL@gmail.com', 'WtrpSplak2c', 1, '$2y$10$pCpyNd.OVfhH3qs1Xe1q/.8p6n2vk3WEiBnDSHaIPqGjt1n5PE.gi', NULL, NULL, NULL),
(4, 'KVmPKxRmNmF3PBU', 'OwFnJATVvk@gmail.com', 'x4qDLmAe98a', 1, '$2y$10$2IQczll.PDMUJjI931zF7eg1jBHeOJbdveB.M.PyDGNkogdzuN/bG', NULL, NULL, NULL),
(5, 'klpR1OIhUoryncH', 'juz3RnWNLE@gmail.com', 'PB7QeVF8GKu', 1, '$2y$10$Mu6m34RnfZ.3gzLHkpBuu.BPOFZqCsJ4yTSihU2rcJi77jeWx4sty', NULL, NULL, NULL),
(6, '5EeKQUeE9TeGOyd', 'gwT14lXjoE@gmail.com', 'sU3jubotYNZ', 1, '$2y$10$tyN2spwwcduOQz0aqBJxMe.7Hgjl3ssVfpgiRB0BNO1zuonHMBPwO', NULL, NULL, NULL),
(7, '1bB5zjTuBsOVmJH', 'mFDsM0GQQc@gmail.com', 'QFClNg6rdHG', 1, '$2y$10$yeVyHcz0DypthypeUqRbyO9h3UpLSD4ljwgQrSxo0DOxnul2ln2ye', NULL, NULL, NULL),
(8, '9uR4vbDJJb2hOC5', 'kIEd13zMSx@gmail.com', '2R1MVE6Pgip', 1, '$2y$10$HiHggKshLm3j2SIgWcPLBed9WTDyG.hNAL1zHAYWVZocCwqOUyvpK', NULL, NULL, NULL),
(9, 'eiYfWx4EefrUprR', 'U3KGwAocgc@gmail.com', '0g8zDqG6h4Y', 1, '$2y$10$0/N5fkqWBdosCXF0Kct7Ru9y7N1HhPB89VwenZZKYWW.bk0JidzVG', NULL, NULL, NULL),
(10, 'ZG0FfZcTDgZrbhG', '9sP7oE0gi0@gmail.com', 'APZFPyoVqhZ', 1, '$2y$10$b5cc1m57KyUFL82B4S7YoOOFfwG02CRBAmg2mjZl7pfpHBuyzUaTa', NULL, NULL, NULL),
(30, 'John David', 'sdsds@sfdfdfdfdffdfdfd.com', 'ffsdfdfdf', 0, '$2y$10$NKzlvyHXKtFYVeCOcn9OTuoJzzPUXoFODUyQZuT0qFVdHxZrfZ4dW', '2017-01-04 23:12:46', '2017-01-04 23:12:46', NULL),
(31, 'derer', 'rereerer@dffdf.com', 'sdsdssdfghjkldffddf', 0, '$2y$10$Fv7LIEzRE5oXDlSHNt1YgO7eGYfRc4cKNg59H9FQvCq0qUOcSEx/e', '2017-01-05 04:32:06', '2017-01-05 04:32:06', NULL),
(32, 'dfdfdf', 'ny@ny.com', 'dfdfd', 0, '$2y$10$MIrVarcLLe/WVoFv1Rb4MOaensvX9krmtXUUbTNVT3670k.2eME9y', '2017-01-05 04:59:17', '2017-01-05 04:59:17', NULL),
(33, 'John Adekola Jones', 'Adde@sddfd.com', 'sdsdsd', 0, '$2y$10$BvnRXzJwNNAPwL66vrDfCuXDC.ntQsO7/RgikKSvanpPLeD4fF3/a', '2017-01-05 17:48:11', '2017-01-05 17:48:11', NULL),
(34, 'Tunde Jones Adesanya', 'email@emil.com', '45678456789ffdfd', 0, '$2y$10$ovBMEVSifSCbTNNdRVzDi.35knJgHdEEuodCh6UY275LCw.DMB2OG', '2017-01-05 23:53:11', '2017-01-06 08:37:33', 'uJgIbZMIPKsFUEtQvF9s6pI1QjwCDdaKFubEF3YuSGwhj9KszuD9zQkmYuUY'),
(35, 'Lionel Messi', 'johndavid@naij.com', '234-4556-344', 0, '$2y$10$JJCZkIFZyP/ynH9PBvqtgOWQQY5SOONqWlio4LFxpHpXzm.ofN75m', '2017-01-06 08:45:59', '2017-01-06 08:48:39', 'MDlGjB0yEeOd0pMiEqMAemzV6LjHqTgFyNf7o49pOlz896TnadQoYAl8sihv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_details_regnumber_unique` (`regnumber`),
  ADD KEY `patient_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_patient_id_foreign` (`patient_id`),
  ADD KEY `reports_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_report_id_foreign` (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patient_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
