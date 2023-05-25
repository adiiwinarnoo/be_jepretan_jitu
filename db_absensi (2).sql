-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 08:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `foto_absensi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_user`, `tanggal`, `waktu_masuk`, `waktu_keluar`, `foto_absensi`, `created_at`, `updated_at`) VALUES
(8, 1, '2022-09-12', '03:31:14', NULL, '', '2022-09-11 20:31:14', '2022-09-11 20:31:14'),
(9, 1, '2022-09-12', '04:07:43', NULL, '', '2022-09-11 21:07:44', '2022-09-11 21:07:44'),
(10, 0, '2022-09-12', '04:08:26', NULL, '', '2022-09-11 21:08:26', '2022-09-11 21:08:26'),
(11, 0, '2022-09-12', '04:08:43', '05:02:31', '', '2022-09-11 21:08:43', '2022-09-11 21:08:43'),
(12, 4, '2022-09-12', '04:18:32', NULL, '', '2022-09-11 21:18:32', '2022-09-11 21:18:32'),
(13, 4, '2022-09-12', '04:27:20', NULL, '', '2022-09-11 21:27:20', '2022-09-11 21:27:20'),
(14, 4, '2022-09-12', '04:31:58', NULL, '', '2022-09-11 21:31:58', '2022-09-11 21:31:58'),
(15, 4, '2022-09-12', '04:37:30', NULL, '', '2022-09-11 21:37:30', '2022-09-11 21:37:30'),
(16, 4, '2022-09-12', '04:41:34', NULL, '', '2022-09-11 21:41:34', '2022-09-11 21:41:34'),
(17, 4, '2022-09-12', '04:42:37', NULL, '', '2022-09-11 21:42:37', '2022-09-11 21:42:37'),
(18, 4, '2022-09-12', '04:44:58', NULL, '', '2022-09-11 21:44:58', '2022-09-11 21:44:58'),
(19, 4, '2022-09-12', '04:48:39', NULL, '', '2022-09-11 21:48:39', '2022-09-11 21:48:39'),
(20, 4, '2022-09-12', '04:50:41', NULL, '', '2022-09-11 21:50:41', '2022-09-11 21:50:41'),
(21, 4, '2022-09-12', '04:52:34', NULL, '', '2022-09-11 21:52:34', '2022-09-11 21:52:34'),
(22, 4, '2022-09-12', '05:02:28', NULL, '', '2022-09-11 22:02:28', '2022-09-11 22:02:28'),
(23, 4, '2022-09-12', '05:04:28', '05:04:31', '', '2022-09-11 22:04:28', '2022-09-11 22:04:28'),
(24, 4, '2022-09-12', '05:06:05', '05:06:08', '', '2022-09-11 22:06:05', '2022-09-11 22:06:05'),
(25, 4, '2022-09-12', '05:09:01', '05:09:05', '', '2022-09-11 22:09:02', '2022-09-11 22:09:02'),
(26, 4, '2022-09-12', '05:10:37', '05:10:41', '', '2022-09-11 22:10:37', '2022-09-11 22:10:37'),
(27, 4, '2022-09-12', '05:18:05', '05:18:08', '', '2022-09-11 22:18:05', '2022-09-11 22:18:05'),
(28, 2, '2022-09-12', '05:20:06', NULL, '', '2022-09-11 22:20:06', '2022-09-11 22:20:06'),
(29, 1, '2022-09-12', '12:51:02', '12:51:06', '', '2022-09-12 05:51:02', '2022-09-12 05:51:02'),
(30, 1, '2022-09-13', '17:45:37', NULL, '', '2022-09-13 10:45:37', '2022-09-13 10:45:37'),
(31, 4, '2022-09-28', '00:05:35', NULL, '/images/absensi/sakit/5bec5c9e6e10293e5d9af3230f4cdac4.jpg', '2022-09-27 17:05:35', '2022-09-27 17:05:35'),
(32, 4, '2022-09-28', '23:23:29', NULL, '/images/absensi/sakit/d4800579441168733d3ac5453748fb4e.jpg', '2022-09-28 09:24:14', '2022-09-28 09:24:14'),
(33, 4, '2022-09-28', NULL, '23:30:29', '/images/absensi/sakit/6acf09e6fddb64bde8d1ac2d7a61acea.jpg', '2022-09-28 09:25:43', '2022-09-28 09:25:43'),
(34, 4, '2022-09-28', '23:30:29', '23:35:29', '/images/absensi/sakit/d788bfe5936150e2a771469bcdaf3340.jpg', '2022-09-28 09:28:18', '2022-09-28 09:28:18'),
(35, 4, '2022-09-28', '23:35:29', NULL, '/images/absensi/sakit/3d38d601bdd6ef7d3b5d513b44aec9ce.jpg', '2022-09-28 09:29:44', '2022-09-28 09:29:44'),
(36, 4, '2022-09-28', '23:35:29', NULL, '/images/absensi/sakit/3684663c76eda4c871fc0daac12754ce.jpg', '2022-09-28 09:56:13', '2022-09-28 09:56:13'),
(37, 4, '2022-09-28', '00:12:25', NULL, '/images/absensi/sakit/c2faf24db6203f30144b1f344b5916c5.jpg', '2022-09-28 10:12:47', '2022-09-28 10:12:47'),
(38, 4, '2022-09-28', '00:36:17', '00:37:18', '/images/absensi/sakit/53a3b425c1cd705b71be1b0bf6dbc452.jpg', '2022-09-28 10:36:39', '2022-09-28 10:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `id` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `foto_surat_dinas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id`, `id_user`, `tanggal`, `sampai_tanggal`, `foto_surat_dinas`, `created_at`, `updated_at`) VALUES
(10, 4, '2022-09-29', '2022-09-30', '/images/absensi/sakit/c585fe3ba49d1dc9cfcfc8c393f4e3ca.jpg', '2022-09-28 10:35:26', '2022-09-28 10:35:26'),
(11, 4, '2022-09-29', '2022-09-30', '/images/absensi/sakit/8f20ffa96b53aeac3c416be862a6c0a4.jpg', '2022-09-28 10:36:57', '2022-09-28 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `sampai_tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approve_by` int(11) NOT NULL DEFAULT 0,
  `approve_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `id_user`, `tanggal`, `sampai_tanggal`, `keterangan`, `status`, `approve_by`, `approve_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-31', '2023-01-05', 'Nikah', 1, 2, NULL, '2022-09-03 07:42:27', '2022-09-03 07:42:27'),
(2, 1, '2023-09-05', '2023-09-20', 'Healing', 1, 0, '2022-09-11 20:04:27', '2022-09-03 08:01:06', '2022-09-03 08:01:06'),
(3, 1, '2023-10-05', '2023-11-05', 'Cuti', 1, 0, '2022-09-11 17:50:43', '2022-09-03 10:13:08', '2022-09-03 10:13:08'),
(4, 1, '2023-10-05', '2023-11-05', 'Rebahan', 1, 2, NULL, '2022-09-03 22:56:41', '2022-09-03 22:56:41'),
(5, 1, '2022-09-04', NULL, 'null', 1, 0, NULL, '2022-09-03 23:24:39', '2022-09-03 23:24:39'),
(6, 1, '2022-09-04', NULL, 'Heal', 1, 0, '2022-09-11 20:07:36', '2022-09-03 23:26:09', '2022-09-03 23:26:09'),
(7, 4, '2022-10-05', '2022-11-05', 'StressOu', 1, 0, '2022-09-11 19:42:07', '2022-09-11 17:57:31', '2022-09-11 17:57:31'),
(8, 4, '2022-10-05', '2022-11-05', 'StressOut', 1, 0, '2022-09-11 21:35:50', '2022-09-11 20:15:01', '2022-09-11 20:15:01'),
(9, 0, '2022-09-12', '2022-09-14', 'mau healing pak', 0, 0, NULL, '2022-09-11 20:25:19', '2022-09-11 20:25:19'),
(10, 3, '2022-09-12', '2022-09-13', 'Cuti', 1, 0, '2022-09-11 21:35:43', '2022-09-11 21:08:58', '2022-09-11 21:08:58'),
(11, 3, '2022-09-13', '2022-09-14', 'lelah', 1, 0, '2022-09-11 22:15:22', '2022-09-11 21:27:42', '2022-09-11 21:27:42'),
(12, 3, '2022-09-12', '2022-09-13', 'hiling', 1, 0, '2022-09-11 22:15:27', '2022-09-11 21:32:11', '2022-09-11 21:32:11'),
(25, 4, '2022-09-12', '2022-09-13', 'mau cuti karena sakit hati denger omongan lu', 1, 0, '2022-09-11 22:12:05', '2022-09-11 22:00:37', '2022-09-11 22:00:37'),
(26, 4, '2022-09-12', '2022-09-13', 'mau izin hiling bos', 1, 0, '2022-09-11 22:12:09', '2022-09-11 22:04:47', '2022-09-11 22:04:47'),
(27, 4, '2022-09-12', '2022-09-13', 'mau naek gunung', 1, 0, '2022-09-11 22:12:14', '2022-09-11 22:06:33', '2022-09-11 22:06:33'),
(28, 4, '2022-09-12', '2022-09-13', 'hilingggggggggg mau muncak', 1, 0, '2022-09-11 22:12:23', '2022-09-11 22:09:28', '2022-09-11 22:09:28'),
(29, 4, '2022-09-12', '2022-09-13', 'mau muncak pak', 1, 0, '2022-09-11 22:15:18', '2022-09-11 22:10:57', '2022-09-11 22:10:57'),
(30, 4, '2022-09-12', '2022-09-13', 'mau naik gunung pak', 1, 0, '2022-09-11 22:19:37', '2022-09-11 22:18:23', '2022-09-11 22:18:23'),
(31, 2, '2022-09-12', '2022-09-13', 'uhuuu', 0, 0, NULL, '2022-09-11 22:29:31', '2022-09-11 22:29:31'),
(32, 4, '2022-09-12', '2022-09-13', 'sddd', 1, 0, '2022-09-12 05:53:49', '2022-09-11 22:56:49', '2022-09-11 22:56:49'),
(33, 1, '2022-09-12', '2022-09-13', 'mau cuti', 1, 0, '2022-09-12 05:53:30', '2022-09-12 05:51:37', '2022-09-12 05:51:37'),
(34, 1, '2022-09-14', '2022-09-15', 'capek skripsi', 1, 0, '2022-09-13 10:47:08', '2022-09-13 10:46:45', '2022-09-13 10:46:45'),
(35, 1, '2022-09-25', '2022-09-26', 'capek', 1, 0, '2022-09-24 13:10:50', '2022-09-24 13:10:02', '2022-09-24 13:10:02'),
(36, 1, '2022-09-25', '2022-09-26', 'eeeee', 1, 0, '2022-09-24 13:13:53', '2022-09-24 13:12:22', '2022-09-24 13:12:22'),
(37, 5, '2022-09-25', '2022-09-25', 'jeki', 1, 0, '2022-09-24 13:21:29', '2022-09-24 13:20:45', '2022-09-24 13:20:45'),
(38, 5, '2022-09-25', '2022-09-27', 'kuy', 1, 0, '2022-09-24 13:23:37', '2022-09-24 13:22:31', '2022-09-24 13:22:31'),
(39, 5, '2022-09-25', '2022-09-26', 'kuay', 1, 0, '2022-09-24 13:23:50', '2022-09-24 13:23:03', '2022-09-24 13:23:03'),
(40, 5, '2022-09-25', '2022-09-26', 'ini null', 0, 0, NULL, '2022-09-24 13:24:18', '2022-09-24 13:24:18'),
(41, 5, '2022-09-25', '2022-09-26', 'yyyy', 0, 0, NULL, '2022-09-24 13:42:21', '2022-09-24 13:42:21'),
(42, 4, '2022-09-29', '2022-09-30', 'uhuy', 1, 0, '2022-09-28 10:49:10', '2022-09-28 10:49:06', '2022-09-28 10:49:06'),
(43, 4, '2022-09-29', '2022-09-30', 'abis nonton bola', 1, 0, '2022-09-28 10:49:44', '2022-09-28 10:49:39', '2022-09-28 10:49:39'),
(44, 4, '2022-09-29', '2022-09-30', 'kit ati', 2, 0, '2022-09-28 10:52:01', '2022-09-28 10:51:58', '2022-09-28 10:51:58'),
(45, 4, '2022-09-29', '2022-09-30', 'ini acc', 2, 0, '2022-09-28 10:59:12', '2022-09-28 10:55:30', '2022-09-28 10:55:30'),
(46, 4, '2022-09-29', '2022-09-30', 'ini rejected', 2, 0, '2022-09-28 10:59:22', '2022-09-28 10:55:42', '2022-09-28 10:55:42'),
(47, 4, '2022-09-29', '2022-09-30', 'bct', 2, 0, '2022-09-28 11:00:29', '2022-09-28 11:00:09', '2022-09-28 11:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `level_users`
--

CREATE TABLE `level_users` (
  `id` int(11) NOT NULL,
  `nama_level` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_users`
--

INSERT INTO `level_users` (`id`, `nama_level`) VALUES
(1, 'HRD'),
(2, 'Manager'),
(3, 'SPV'),
(4, 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `sakit`
--

CREATE TABLE `sakit` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `foto_surat_sakit` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sakit`
--

INSERT INTO `sakit` (`id`, `id_user`, `tanggal`, `sampai_tanggal`, `foto_surat_sakit`, `created_at`, `updated_at`) VALUES
(7, 2, '2023-10-05', '2023-10-06', '/images/absensi/sakit/9e8baf171a1d962630e887f8cd0449c5.jpg', '2022-09-10 06:08:37', '2022-09-10 06:08:37'),
(8, 0, '2022-09-12', '2022-09-13', '/images/absensi/sakit/340c104dbedf13a07e6dbdde22699bd2.jpg', '2022-09-11 20:25:56', '2022-09-11 20:25:56'),
(9, 2, '2022-09-13', '2022-09-14', '/images/absensi/sakit/82199b3dee78aba4903671a91226662a.jpg', '2022-09-11 20:57:04', '2022-09-11 20:57:04'),
(10, 0, '2022-09-12', '2022-09-14', '/images/absensi/sakit/68d304518376243df56ab080d796e4f5.jpg', '2022-09-11 21:09:15', '2022-09-11 21:09:15'),
(11, 0, '2022-09-12', '2022-09-13', '/images/absensi/sakit/88e36c5f1d3ab39b3854f477dc696609.jpg', '2022-09-11 21:32:27', '2022-09-11 21:32:27'),
(12, 0, '2022-09-12', '2022-09-13', '/images/absensi/sakit/46c66512e258f81bec015c24c677954d.jpg', '2022-09-11 21:38:07', '2022-09-11 21:38:07'),
(13, 0, '2022-09-12', '2022-09-13', '/images/absensi/sakit/5047faed9581e069b2867dff87dff5e6.jpg', '2022-09-11 21:43:11', '2022-09-11 21:43:11'),
(14, 0, '2022-09-12', '2022-09-13', '/images/absensi/sakit/69c1153744bd9cd66b8d4de1c6811d9e.jpg', '2022-09-11 21:49:11', '2022-09-11 21:49:11'),
(15, 4, '2022-09-12', '2022-09-13', '/images/absensi/sakit/e12fa91536d9ddc86f1ccdb1c19c7bec.jpg', '2022-09-11 22:11:20', '2022-09-11 22:11:20'),
(16, 1, '2022-09-12', '2022-09-13', '/images/absensi/sakit/64df03dc59af9b29a3125e96f8a47152.jpg', '2022-09-12 05:51:57', '2022-09-12 05:51:57'),
(17, 4, '2022-10-05', '2022-11-05', '/images/absensi/sakit/7749d7bf7de930ce7f56d8a97889efea.jpg', '2022-09-27 16:39:25', '2022-09-27 16:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(17) NOT NULL,
  `telepon` bigint(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `nama`, `nik`, `telepon`, `email`, `username`, `alamat`, `password`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Rachell', '12345678916', 12356779, NULL, NULL, NULL, '$2y$10$VMxckgjufGL6RK6xI9zbOugz9RWUMOSUNy3ScClzuy8xAUs7Lsve.', 'f787c2f1f01191497301b70889e050b4.jpg', 1, '2022-09-03 04:26:16', '2022-09-08 11:32:44'),
(2, 2, 'Joenar', '1234567865', 8123456789, 'joenar@gmail.com', 'joenar', 'Cikokol Tangerang Raya', '$2y$10$q4rM46lZUmKSrBSD8aGE9OpeEVTFErP93DJNqL63DSU97mO4V9wW.', '/images/absensi/sakit/82199b3dee78aba4903671a91226662a.jpg', 1, '2022-09-03 23:57:08', '2022-09-03 23:57:08'),
(3, 1, 'Henry', '1122334455', 9373847, 'admin@web.com', 'gdjhsdkkj', 'Rajeg', '$2y$10$q4rM46lZUmKSrBSD8aGE9OpeEVTFErP93DJNqL63DSU97mO4V9wW.', '/images/absensi/avatar/9e8baf171a1d962630e887f8cd0449c5.jpg', 1, '2022-09-10 05:41:07', '2022-09-10 05:41:07'),
(4, 3, 'tester', '12345678911', 8123456789, 'test.ya@gmail.com', 'test', 'cikokol tangerang', '$2y$10$c2GQw6XeOfjmRjgawO92QetKmt4NgcUTPHxEW6O6ieCiQFleRbX8q', NULL, 1, '2022-09-12 00:55:17', '2022-09-24 13:42:18'),
(5, 4, 'yoi', '12345678903', NULL, NULL, NULL, NULL, '$2y$10$87atA83IOMBPfImmS4lVSOgelOiEt.W5p0UQTORztn.Vw9odKK5Je', NULL, 1, '2022-09-24 20:20:03', '2022-09-24 20:20:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sakit`
--
ALTER TABLE `sakit`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sakit`
--
ALTER TABLE `sakit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
