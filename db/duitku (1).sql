-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 02:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duitku`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `name`, `position`, `office`) VALUES
(1, 'Tarik Tunai', 'Holysgit', 'Pimpinan', 'Pasuruan'),
(4, 'Coba', 'Alexander', 'Babu', 'Malang'),
(5, 'ga tau lagi', 'Miciga', 'Babu Juga', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `pemasukan` decimal(10,0) NOT NULL,
  `pengeluaran` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` text NOT NULL,
  `file` text DEFAULT NULL,
  `UserEntry` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `date`, `pemasukan`, `pengeluaran`, `keterangan`, `jenis`, `file`, `UserEntry`, `created_at`, `updated_at`) VALUES
(15, '2020-08-06', '0', '100000', 'tes', 'tes', '', '', '2020-08-06 04:50:42', '2020-08-07 18:35:56'),
(16, '2020-08-06', '0', '12000', 'tes', 'Setoran ku', NULL, '', '2020-08-06 04:52:11', '2020-08-06 04:52:11'),
(24, '2020-08-06', '0', '100000', 'tes', 'Setoran kudalu', '1596710702_0ff3a1e10764c554dd41.png', '', '2020-08-06 05:37:11', '2020-08-06 05:45:02'),
(25, '2020-08-06', '0', '1000000', 'tes', 'Setoran ku', '1596710848_69a5304c88abe6e5b1ad.png', '', '2020-08-06 05:47:28', '2020-08-06 05:47:28'),
(26, '2020-08-14', '0', '100000', 'tesss', 'Setoran ku', '1596713790_5f03a59e932f31f492be.png', '', '2020-08-06 06:36:20', '2020-08-06 06:36:30'),
(27, '2020-08-07', '0', '100000', 'tessss', 'tessss', NULL, '', '2020-08-06 14:13:02', '2020-08-06 14:13:02'),
(28, '2020-08-07', '0', '0', 'tessss', 'Atlanta', '1596793140_5bea115083746ab3b6ac.jpg', '', '2020-08-06 14:13:15', '2020-08-07 04:39:00'),
(29, '2020-08-08', '2', '1000000', 'asdasd', 'Tarik Tunai', '1596849286_88a3983039aa83d8afa4.png', '', '2020-08-07 20:14:37', '2020-08-07 20:14:46'),
(30, '2020-08-08', '0', '1000000', 'tes', 'Tarik Tunai', NULL, '', '2020-08-07 20:41:08', '2020-08-07 20:41:08'),
(31, '0000-00-00', '0', '1000000', 'tes', 'Tarik Tunai', NULL, '', '2020-08-07 20:41:50', '2020-08-07 20:41:50'),
(32, '0000-00-00', '0', '1000000', 'tes', 'Tarik Tunai', NULL, '', '2020-08-07 20:42:10', '2020-08-07 20:42:10'),
(33, '2020-08-08', '0', '1000000', 'coba perfect', 'Tarik Tunai', '1596850984_75220d5b6e1096e8f2a6.png', '', '2020-08-07 20:43:04', '2020-08-07 20:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `sep` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `sep`) VALUES
(1, 'DuitKu 1.0 Beta Version', '|');

-- --------------------------------------------------------

--
-- Table structure for table `tunai`
--

CREATE TABLE `tunai` (
  `id` int(255) NOT NULL,
  `id_rekening` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `pemasukan` decimal(10,0) NOT NULL,
  `pengeluaran` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` text NOT NULL,
  `file` text DEFAULT NULL,
  `UserEntry` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunai`
--

INSERT INTO `tunai` (`id`, `id_rekening`, `date`, `pemasukan`, `pengeluaran`, `keterangan`, `jenis`, `file`, `UserEntry`, `created_at`, `updated_at`) VALUES
(1, 32, '0000-00-00 00:00:00', '1000000', '0', 'tes', 'Tarik Tunai', NULL, '', '2020-08-07 20:42:10', '2020-08-07 20:42:10'),
(2, 33, '2020-08-08 00:00:00', '1000000', '0', 'coba perfect', 'Tarik Tunai', '1596850984_75220d5b6e1096e8f2a6.png', '', '2020-08-07 20:43:04', '2020-08-07 20:43:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunai`
--
ALTER TABLE `tunai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tunai`
--
ALTER TABLE `tunai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
