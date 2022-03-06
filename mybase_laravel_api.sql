-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2022 at 01:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybase_laravel_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'zein', '2022-01-09 14:53:35', '2022-01-09 21:54:14'),
(2, 'zein 2', '2022-01-09 15:03:24', '2022-01-09 15:03:24'),
(3, 'zein 24', '2022-01-10 16:24:18', '2022-01-10 16:24:18'),
(4, 'zein 214', '2022-01-10 16:26:00', '2022-01-10 16:26:00'),
(5, 'zein 2145', '2022-02-20 09:07:53', '2022-02-20 09:07:53'),
(6, 'zein 2145 a', '2022-03-06 12:02:59', '2022-03-06 12:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `empty`
--

CREATE TABLE `empty` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `more`
--

CREATE TABLE `more` (
  `id` int(11) NOT NULL,
  `id_paging` int(11) NOT NULL,
  `more` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `more`
--

INSERT INTO `more` (`id`, `id_paging`, `more`, `created_at`, `updated_at`) VALUES
(1, 2, 'more 2', '2022-01-09 16:00:54', '2022-01-09 10:00:49'),
(2, 3, 'more 3.1', '2022-01-09 16:21:25', '2022-01-09 10:21:10'),
(3, 3, 'more 3.2', '2022-01-09 16:21:25', '2022-01-09 10:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `much_data`
--

CREATE TABLE `much_data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `much_data`
--

INSERT INTO `much_data` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'md 1', '2022-01-09 19:08:17', '2022-01-09 13:08:10'),
(2, 'md 2', '2022-01-09 19:10:38', '2022-01-02 13:08:10'),
(3, 'md 3', '2022-01-09 19:10:38', '2022-01-03 13:08:10'),
(4, 'md 4', '2022-01-09 19:10:38', '2022-01-04 13:08:10'),
(5, 'md 5', '2022-01-09 19:10:38', '2022-01-05 13:08:10'),
(6, 'md 6', '2022-01-09 19:10:38', '2022-01-06 13:08:10'),
(7, 'md 7', '2022-01-09 19:10:38', '2022-01-07 13:08:10'),
(8, 'md 8', '2022-01-09 19:10:38', '2022-01-07 13:08:10'),
(9, 'md 9', '2022-01-09 19:10:38', '2022-01-08 13:08:10'),
(10, 'md 10', '2022-01-09 19:10:38', '2022-01-09 13:08:10'),
(11, 'md 11', '2022-01-09 19:10:38', '2022-01-10 13:08:10'),
(12, 'md 12', '2022-01-09 19:10:38', '2022-01-11 13:08:10'),
(13, 'md 13', '2022-01-09 19:10:38', '2022-01-12 13:08:10'),
(14, 'md 14', '2022-01-09 19:10:38', '2022-01-13 13:08:10'),
(15, 'md 15', '2022-01-09 19:10:38', '2022-01-14 13:08:10'),
(16, 'md 16', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(17, 'md 17', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(18, 'md 18', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(19, 'md 19', '2022-01-09 19:10:38', '2022-01-16 13:08:10'),
(20, 'md 20', '2022-01-09 19:10:38', '2022-01-17 13:08:10'),
(21, 'md 21', '2022-01-09 20:58:59', '2022-01-09 14:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `m_api_response`
--

CREATE TABLE `m_api_response` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_point` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_number` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_api_response`
--

INSERT INTO `m_api_response` (`id`, `method`, `end_point`, `response_number`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, -1, 'Perhatian', 'Error', '2022-03-06 05:24:41', NULL),
(2, NULL, NULL, 0, 'Perhatian', 'Failed', '2022-03-06 05:24:41', NULL),
(3, NULL, NULL, 1, 'Perhatian', 'Success', '2022-03-06 05:24:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `one`
--

CREATE TABLE `one` (
  `id` int(11) NOT NULL,
  `id_paging` int(11) NOT NULL,
  `one` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `one`
--

INSERT INTO `one` (`id`, `id_paging`, `one`, `created_at`, `updated_at`) VALUES
(1, 2, 'one 2', '2022-01-09 17:12:00', '2022-01-09 11:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `paging`
--

CREATE TABLE `paging` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paging`
--

INSERT INTO `paging` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'data 1', 'detail 1', '2022-01-09 15:46:07', NULL),
(2, 'data 2', 'detail 2', '2022-01-09 15:46:07', NULL),
(3, 'data 3', 'detail 3', '2022-01-09 15:47:01', '2022-01-09 15:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `empty`
--
ALTER TABLE `empty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `more`
--
ALTER TABLE `more`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paging` (`id_paging`);

--
-- Indexes for table `much_data`
--
ALTER TABLE `much_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_api_response`
--
ALTER TABLE `m_api_response`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `one`
--
ALTER TABLE `one`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paging` (`id_paging`);

--
-- Indexes for table `paging`
--
ALTER TABLE `paging`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empty`
--
ALTER TABLE `empty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `more`
--
ALTER TABLE `more`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `much_data`
--
ALTER TABLE `much_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `m_api_response`
--
ALTER TABLE `m_api_response`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `one`
--
ALTER TABLE `one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paging`
--
ALTER TABLE `paging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `more`
--
ALTER TABLE `more`
  ADD CONSTRAINT `more_ibfk_1` FOREIGN KEY (`id_paging`) REFERENCES `paging` (`id`);

--
-- Constraints for table `one`
--
ALTER TABLE `one`
  ADD CONSTRAINT `one_ibfk_1` FOREIGN KEY (`id_paging`) REFERENCES `paging` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
