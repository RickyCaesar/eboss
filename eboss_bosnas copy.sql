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

INSERT INTO `bosnas` (`id`, `kab_kota`, `sma`, `smk`, `slb`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Berau', 1600000, 1710000, 3740000, NULL, '2023-08-27 20:10:32'),
(2, 'Kabupaten Kutai Barat', 1850000, 1970000, 4290000, NULL, '2023-08-27 20:10:32'),
(3, 'Kabupaten Kutai Kartanegara', 1740000, 1860000, 4070000, NULL, '2023-08-27 20:10:32'),
(4, 'Kabupaten Kutai Timur', 1790000, 1900000, 4170000, NULL, '2023-08-27 20:10:32'),
(5, 'Kabupaten Mahakam Ulu', 2820000, 3030000, 6460000, NULL, '2023-08-27 20:10:32'),
(6, 'Kabupaten Paser', 1640000, 1750000, 3810000, NULL, '2023-08-27 20:10:32'),
(7, 'Kabupaten Penajam Paser Utara', 1640000, 1750000, 3830000, NULL, '2023-08-27 20:10:32'),
(8, 'Kota Balikpapan', 1600000, 1710000, 3740000, NULL, '2023-08-27 20:10:32'),
(9, 'Kota Bontang', 1570000, 1670000, 3660000, NULL, '2023-08-27 20:10:32'),
(10, 'Kota Samarinda', 1620000, 1730000, 3790000, NULL, '2023-08-27 20:10:32');

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
