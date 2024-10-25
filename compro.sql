-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 07:31 AM
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
-- Database: `compro`
--

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `website_phone` varchar(100) DEFAULT NULL,
  `website_email` varchar(100) DEFAULT NULL,
  `website_address` text DEFAULT NULL,
  `twitter_link` varchar(100) DEFAULT NULL,
  `fb_link` varchar(100) DEFAULT NULL,
  `ig_link` varchar(100) DEFAULT NULL,
  `linkedin_link` varchar(100) DEFAULT NULL,
  `youtube_link` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `website_name`, `website_link`, `website_phone`, `website_email`, `website_address`, `twitter_link`, `fb_link`, `ig_link`, `linkedin_link`, `youtube_link`, `logo`, `create_at`, `update_at`) VALUES
(2, 'rozak ibrahim', 'https://ipsum-dolor-site-amet.com', '232334234', 'kozak@gmail.com', 'dfgdfgdfgdf', NULL, NULL, NULL, NULL, NULL, '$pict1.jpg', '2024-10-24 02:39:44', '2024-10-24 07:41:45'),
(3, 'iki gorro', 'https://kopong.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sayuran1.jpg', '2024-10-24 03:20:09', '2024-10-24 03:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id` int(11) NOT NULL,
  `nama_instruktur` varchar(50) NOT NULL,
  `jurusan_instruktur` varchar(50) NOT NULL,
  `fb_link` varchar(50) DEFAULT NULL,
  `ig_link` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id`, `nama_instruktur`, `jurusan_instruktur`, `fb_link`, `ig_link`, `foto`, `updated_at`, `create_at`) VALUES
(1, 'pepen natrium', 'pepen@gmail.com', NULL, NULL, 'bw-logo-triangle-shape-circle-260nw-1668737194.jpg', '2024-10-25 04:34:23', '2024-10-25 05:26:16'),
(2, 'ucup uranium', 'pepen@gmail.com', NULL, NULL, 'sayuran1.jpg', '2024-10-25 04:41:59', '2024-10-25 05:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Supri Tubles ', 'admin@gmail.com', '1234', '', '2024-10-22 04:32:15', '2024-10-23 04:24:42'),
(5, 'rizki123', 'rizky@gmail.com', '1234', '', '2024-10-23 02:55:22', '2024-10-23 02:55:22'),
(7, 'mrizky', 'm@gmail.com', '1234', '', '2024-10-23 02:55:34', '2024-10-23 02:55:34'),
(11, 'najkfhakakfli', 'm@gmail.com', '1233', '', '2024-10-23 05:39:50', '2024-10-23 05:39:50'),
(12, 'tio nugraba', 'admin@gmail.com', '455454546', 'pict1.jpg', '2024-10-23 07:31:43', '2024-10-23 07:31:43'),
(13, 'ucup', 'ucup@gmail.com', '13444', 'sayuran1.jpg', '2024-10-23 07:34:04', '2024-10-23 07:34:04'),
(14, '', '', '', '', '2024-10-24 02:00:56', '2024-10-24 02:00:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
