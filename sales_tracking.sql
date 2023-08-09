-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 03:45 AM
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
-- Database: `sales_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dbmaps`
--

CREATE TABLE `tbl_dbmaps` (
  `id_maps` int(11) UNSIGNED NOT NULL,
  `nama_maps` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_dbmaps`
--

INSERT INTO `tbl_dbmaps` (`id_maps`, `nama_maps`, `no_telpon`, `alamat`, `latitude`, `longitude`, `deskripsi`) VALUES
(3, 'Toko A', '0821201012', 'Komplek Masjid Agung Kauman, 2CHF+528, Bangunharjo, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50139, Indonesia', '-6.972198213119912', '110.42265522962933', 'Toko pemilik Bapak Suratno penjual Rokok'),
(4, 'Toko B', '08560201023', 'Jl. Mayor Jend. D.I. Panjaitan No.9, Miroto, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50134, Indonesia', '-6.985786775556099', '110.42063820845013', 'Toko milik Bu Sutarmi penjual toko kelontong'),
(5, 'Smart Printer', '0854644887922', 'Jl. Mugas Dalam IX No.5, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50249, Indonesia', '-6.99166509090616', '110.41535962110882', 'Toko printer bapak Jono customer tinta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Moch Syafrizal Azhar', 'mochsyafrizalazhar@gmail.com', 'Profile-2.png', '$2y$10$9jIlcwHwPU8VaQ2t.sNSvOQMll9lNaorzpYsJOAv6Vs/Z4d4tg6QC', 1, 1, 1691166752),
(2, 'Alexander Tejo', 'hahaha250901@gmail.com', 'profile-1.png', '$2y$10$oCTIr83XbR1hTXvVbw/67eP/Lf5jdbxiPQa1FntUPCTgunCj.1va6', 2, 1, 1691167350),
(3, 'Sukarni Tejo', 'tejo@gmail.com', 'default.png', '$2y$10$uoVUzi9vaRtNzk9mUKxba.6xmC89HzrecG96LltlkK8mUOeLCDWwO', 2, 1, 1691346760),
(4, 'Gerry Hendra', 'gerry@gmail.com', 'default.png', '$2y$10$YX0xLzA.zMlOYLLArqb8.OUCrRcLFYUIjLiPtKdMXgovc2/9AQnp.', 2, 1, 1691347797);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Main Menu'),
(2, 'Tugas'),
(3, 'Database');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Supervisor'),
(2, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fas fa-fire', 1),
(2, 1, 'Google Maps', 'gmaps', 'fas fa-map-marker-alt', 1),
(4, 3, 'Maps', 'dbmaps', 'fas fa-map-marked-alt', 1),
(5, 3, 'Account', 'dbaccount', 'fas fa-users-cog', 1),
(6, 2, 'Tugas', 'tugas', 'fas fa-tasks', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dbmaps`
--
ALTER TABLE `tbl_dbmaps`
  ADD PRIMARY KEY (`id_maps`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dbmaps`
--
ALTER TABLE `tbl_dbmaps`
  MODIFY `id_maps` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
