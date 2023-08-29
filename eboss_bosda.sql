-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2023 at 02:37 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `bosnas`
--

-- CREATE TABLE `bosnas` (
--   `id` bigint UNSIGNED NOT NULL,
--   `kab_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `sma` int NOT NULL,
--   `smk` int NOT NULL,
--   `slb` int NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bosnas`
--

INSERT INTO `bosda` (`id`, `kab_kota`, `sma`, `smk`, `slb`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Berau', 1052000, 1171000, 1612000, NULL, '2023-08-28 18:36:50'),
(2, 'Kabupaten Kutai Barat', 1177000, 1307000, 1687000, NULL, '2023-08-28 18:36:50'),
(3, 'Kabupaten Kutai Kartanegara', 1127000, 1254000, 1659000, NULL, '2023-08-28 18:36:50'),
(4, 'Kabupaten Kutai Timur', 1150000, 1274000, 1672000, NULL, '2023-08-28 18:36:50'),
(5, 'Kabupaten Mahakam Ulu', 1453000, 1619000, 1859000, NULL, '2023-08-28 18:36:50'),
(6, 'Kabupaten Paser', 1075000, 1194000, 1623000, NULL, '2023-08-28 18:36:50'),
(7, 'Kabupaten Penajam Paser Utara', 1075000, 1194000, 1626000, NULL, '2023-08-28 18:36:50'),
(8, 'Kota Balikpapan', 1052000, 1171000, 1612000, NULL, '2023-08-28 18:36:50'),
(9, 'Kota Bontang', 1034000, 1146000, 1599000, NULL, '2023-08-28 18:36:50'),
(10, 'Kota Samarinda', 1063000, 1183000, 1620000, NULL, '2023-08-28 18:36:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bosnas`
--
ALTER TABLE `bosnas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bosnas`
--
ALTER TABLE `bosnas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
