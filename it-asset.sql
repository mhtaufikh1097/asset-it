-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2026 at 02:53 PM
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
-- Database: `inv_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) UNSIGNED NOT NULL,
  `asset_number` varchar(50) NOT NULL,
  `asset_name` varchar(255) DEFAULT NULL,
  `category_id` char(2) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `part_number` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `yom` year(4) DEFAULT NULL,
  `asset_condition` enum('SERVICEABLE','UNSERVICEABLE') NOT NULL,
  `owner` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `assign_to` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `deskripsi_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `deskripsi_jabatan`) VALUES
(4, 'Technician ', '-'),
(5, 'Spesialist', '-'),
(7, 'Deputy General Manager', '-'),
(8, 'General Manager', '-'),
(9, 'Staff Officer', '-'),
(10, 'Manager', '-');

-- --------------------------------------------------------

--
-- Table structure for table `master_asset_type`
--

CREATE TABLE `master_asset_type` (
  `id_type` int(11) UNSIGNED NOT NULL,
  `id_category` int(11) UNSIGNED NOT NULL,
  `code_type` varchar(10) NOT NULL,
  `name_type` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_asset_type`
--

INSERT INTO `master_asset_type` (`id_type`, `id_category`, `code_type`, `name_type`, `keterangan`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, '1', 'MAIN SERVER', NULL, NULL, '2026-02-03 10:13:56', 1),
(2, 1, '2', 'SERVER EQUIPMENT', NULL, NULL, '2026-02-02 16:35:16', 1),
(3, 2, '1', 'FIREWALL', NULL, NULL, '2026-02-02 16:35:18', 1),
(4, 2, '2', 'ROUTER', NULL, NULL, '2026-02-02 16:35:19', 1),
(5, 2, '3', 'CORE SWITCH', NULL, NULL, NULL, 1),
(6, 2, '4', 'DISTRIBUTION SWITCH', NULL, NULL, NULL, 1),
(7, 2, '5', 'POE SWITCH', NULL, NULL, NULL, 1),
(8, 2, '6', 'ACCESS POINT (WIFI & CONTROLLER)', NULL, NULL, NULL, 1),
(9, 3, '1', 'DESKTOP', NULL, NULL, NULL, 1),
(10, 3, '2', 'LAPTOP', NULL, NULL, NULL, 1),
(11, 3, '3', 'TABLET', NULL, NULL, NULL, 1),
(12, 4, '1', 'LJ COLOR', NULL, NULL, NULL, 1),
(13, 4, '2', 'LJ MONOCHROME', NULL, NULL, NULL, 1),
(14, 4, '3', 'DJ COLOR', NULL, NULL, NULL, 1),
(15, 4, '4', 'DJ MONOCHROME', NULL, NULL, NULL, 1),
(16, 4, '5', 'BARCODE PRINTER', NULL, NULL, NULL, 1),
(17, 4, '6', 'BARCODE SCANNER', NULL, NULL, NULL, 1),
(18, 4, '7', 'COPIER MACHINE', NULL, NULL, NULL, 1),
(19, 4, '8', 'FAXIMILE', NULL, NULL, NULL, 1),
(20, 4, '9', 'PAPER SHREDDER', NULL, NULL, NULL, 1),
(21, 4, '10', 'SCANNER', NULL, NULL, '2026-02-02 22:29:50', 1),
(22, 5, '1', 'IP PHONE', NULL, NULL, NULL, 1),
(23, 5, '2', 'HANDY TALKY', NULL, NULL, NULL, 1),
(24, 6, '1', 'CAMERA (CONFERENCE CAMERA)', NULL, NULL, NULL, 1),
(25, 6, '2', 'PROJECTOR', NULL, NULL, NULL, 1),
(26, 6, '3', 'LED', NULL, NULL, NULL, 1),
(27, 6, '4', 'MICROPHONE (CONFERENCE MICROPHONE)', NULL, NULL, NULL, 1),
(28, 7, '1', 'IT EQUIPMENT', NULL, NULL, NULL, 1),
(29, 7, '2', 'SMALL UPS', NULL, NULL, NULL, 1),
(30, 7, '3', 'IT TOOL', NULL, NULL, NULL, 1),
(34, 8, '1', 'NVR', NULL, NULL, NULL, 1),
(35, 8, '2', 'CCTV', NULL, NULL, NULL, 1),
(36, 8, '3', 'X401 (ACCESS CONTROL)', NULL, NULL, NULL, 1),
(37, 8, '4', 'A300 (ACCESS CONTROL)', NULL, NULL, NULL, 1),
(38, 8, '5', 'ADDON PROX READER', NULL, NULL, NULL, 1),
(39, 8, '6', 'PUSH BUTTON', NULL, NULL, NULL, 1),
(40, 8, '7', 'GLASS BREAK', NULL, NULL, NULL, 1),
(41, 8, '8', 'EM-600 (ELECTRIC LOCK)', NULL, NULL, NULL, 1),
(42, 8, '9', 'DB-100 (ELECTRIC LOCK)', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE `master_category` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`id_category`, `name_category`, `keterangan`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'SERVER', NULL, '2026-01-19 16:50:30', '2026-02-04 13:01:26', 1),
(2, 'NETWORK', NULL, '2026-01-19 16:50:30', '2026-02-03 06:21:50', 1),
(3, 'COMPUTER', NULL, '2026-01-19 16:50:30', '2026-02-03 06:21:51', 1),
(4, 'PRINTER', NULL, '2026-01-19 16:50:30', '2026-02-03 06:21:53', 1),
(5, 'COMMUNICATION', NULL, '2026-01-19 16:50:30', '2026-02-03 06:21:45', 1),
(6, 'DISPLAY', NULL, '2026-01-19 16:50:30', '2026-02-03 06:21:46', 1),
(7, 'OTHER', '', '2026-01-19 16:50:30', '2026-02-03 06:21:54', 1),
(8, 'BUILDING', '', '2026-01-19 16:50:30', '2026-02-03 06:21:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_department`
--

CREATE TABLE `master_department` (
  `id_department` int(5) UNSIGNED NOT NULL,
  `nama_department` varchar(100) NOT NULL,
  `nama_biro` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_department`
--

INSERT INTO `master_department` (`id_department`, `nama_department`, `nama_biro`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'OPERATION (HHO)', '', NULL, NULL, NULL),
(2, 'PROPERTY', '', NULL, NULL, NULL),
(3, 'OPERATION', '', NULL, NULL, NULL),
(4, 'HHE', '', NULL, NULL, NULL),
(5, 'IRM', '', NULL, NULL, NULL),
(6, 'HPR', '', NULL, NULL, NULL),
(7, 'INTERNAL AUDIT', '', NULL, NULL, NULL),
(8, 'FIXED ASSET - SIGNALING', '', NULL, NULL, NULL),
(9, 'FBC', '', NULL, NULL, NULL),
(10, 'HFI', '', NULL, NULL, NULL),
(11, 'LOGISTIC', '', NULL, NULL, NULL),
(12, 'LA', '', NULL, NULL, NULL),
(13, 'CONSTRUCTION', '', NULL, NULL, NULL),
(14, 'LEGAL', '', NULL, NULL, NULL),
(15, 'CORSEC', '', NULL, NULL, NULL),
(16, 'ISCA', '', NULL, NULL, NULL),
(17, 'PMO', '', NULL, NULL, NULL),
(18, 'HR', '', NULL, NULL, NULL),
(19, 'Head Office', '', NULL, NULL, NULL),
(20, 'SSHE', '', NULL, NULL, NULL),
(21, 'O&M', '', NULL, NULL, NULL),
(22, 'HRS', '', NULL, NULL, NULL),
(23, 'HHO', '', NULL, NULL, NULL),
(24, 'TDM', '', NULL, NULL, NULL),
(25, 'OPERATION TRAIN CREW', '', NULL, NULL, NULL),
(81, 'CORCOM', '', NULL, NULL, NULL),
(82, 'IT', '', NULL, NULL, NULL),
(83, 'PMO Construction', '', NULL, NULL, NULL),
(84, 'RBD', '', NULL, NULL, NULL),
(85, 'OM', '', NULL, NULL, NULL),
(86, 'HUC', '', NULL, NULL, NULL),
(87, 'EXPERT', '', NULL, NULL, NULL),
(88, 'HHF', '', NULL, NULL, NULL),
(89, 'GA', '', NULL, NULL, NULL),
(90, 'HFF', '', NULL, NULL, NULL),
(91, 'HRH', '', NULL, NULL, NULL),
(92, 'HPI', '', NULL, NULL, NULL),
(93, 'KOMISARIS', '', NULL, NULL, NULL),
(94, 'HUI', '', NULL, NULL, NULL),
(95, 'HRA', '', NULL, NULL, NULL),
(96, 'BOD', '', NULL, NULL, NULL),
(97, 'LOGISTIK', '', NULL, NULL, NULL),
(98, 'Information System & Cost Accounting', '', NULL, NULL, NULL),
(99, 'HF', '', NULL, NULL, NULL),
(100, 'GAPEKA', '', NULL, NULL, NULL),
(101, 'HFL', '', NULL, NULL, NULL),
(102, 'HRL', '', NULL, NULL, NULL),
(103, 'HPP', '', NULL, NULL, NULL),
(104, 'HFL (LOGISTIK)', '', NULL, NULL, NULL),
(105, 'GOI', '', NULL, NULL, NULL),
(106, 'HPY', '', NULL, NULL, NULL),
(107, 'HPL', '', NULL, NULL, NULL),
(108, 'HUL', '', NULL, NULL, NULL),
(109, 'HFA', '', NULL, NULL, NULL),
(110, 'HHT', '', NULL, NULL, NULL),
(111, 'HHC', '', NULL, NULL, NULL),
(112, 'HHM', '', NULL, NULL, NULL),
(113, 'HRG', '', NULL, NULL, NULL),
(114, 'HFF (Finance and Budget Management)', '', NULL, NULL, NULL),
(115, 'HHS', '', NULL, NULL, NULL),
(116, 'HHQ', '', NULL, NULL, NULL),
(117, 'HUP', '', NULL, NULL, NULL),
(118, 'HH (Chief of Operation Commander)', '', NULL, NULL, NULL),
(119, 'HHF (FIXED ASSETS MAINTENANCE)', '', NULL, NULL, NULL),
(120, 'HPR (RAILWAY BUSNINESS)', '', NULL, NULL, NULL),
(121, 'HHE (EMU MAINTENANCE)', '', NULL, NULL, NULL),
(122, 'EMU MAINTENANCE - ELECTRICAL', '', NULL, NULL, NULL),
(123, 'HHOS', '', NULL, NULL, NULL),
(124, 'HH', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-11-06-162658', 'App\\Database\\Migrations\\CreateJabatanTable', 'default', 'App', 1762446931, 1),
(2, '2025-11-06-162725', 'App\\Database\\Migrations\\CreatePegawaiTable', 'default', 'App', 1762446932, 1),
(3, '2025-11-10-152436', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1762789423, 2),
(6, '2025-11-16-131103', 'App\\Database\\Migrations\\AddColumnPegawaiTable', 'default', 'App', 1767505103, 3),
(7, '2026-01-02-085059', 'App\\Database\\Migrations\\CreateAssetTable', 'default', 'App', 1767505103, 3),
(8, '2026-01-02-091044', 'App\\Database\\Migrations\\AddColumnAssetTable', 'default', 'App', 1767505103, 3),
(9, '2026-01-19-094803', 'App\\Database\\Migrations\\CreateMasterCategoryTable', 'default', 'App', 1768816162, 4),
(10, '2026-01-19-103233', 'App\\Database\\Migrations\\AddCategoryIdToAsset', 'default', 'App', 1768818795, 5),
(11, '2026-01-20-064437', 'App\\Database\\Migrations\\CreateMasterDepartment', 'default', 'App', 1768891523, 6),
(13, '2026-01-20-071657', 'App\\Database\\Migrations\\AddDepartmentIdToAsset', 'default', 'App', 1768923920, 7),
(14, '2026-01-20-153424', 'App\\Database\\Migrations\\CreateMasterAssetType', 'default', 'App', 1768924560, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan_id` int(100) UNSIGNED NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `foto_pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `jabatan_id`, `alamat`, `telepon`, `foto_pegawai`) VALUES
(3, 'Djanoe wahyudi', 7, 'Halim', '08978676755', NULL),
(4, 'Muhammad Syaiful ', 5, 'Bandung', '089578674', NULL),
(5, 'Riyadi Wicaksono', 5, 'Halim', '08978937423', NULL),
(6, 'Suerci', 8, 'Halim', '08937846783', NULL),
(7, 'Zandi ramadan', 9, 'Bandung', '082973892', NULL),
(8, 'Brahmawisnu', 5, 'Bandung', '088397836843', NULL),
(9, 'Eko budi', 10, 'Halim', '0892368612', NULL),
(10, 'Rizal Rabby Radhiyya', 4, 'bandung', '0847386234', NULL),
(16, 'Taufik', 4, 'Bandung', '08928937297', '1767772261_ec64a580c6a169330198.jpeg'),
(17, 'Frieska', 9, 'Halim', '088888888888', NULL),
(18, 'Ferri', 9, 'Halim', '088888888888', NULL),
(19, 'Avian', 4, 'Bandung', '088888888888', NULL),
(20, 'Tsany', 4, 'Bandung', '088888888888', NULL),
(21, 'Fadel', 4, 'Jakarta', '088888888888', NULL),
(22, 'Urwah', 4, 'Jakarta', '088888888888', NULL),
(23, 'Bagus', 4, 'Jakarta', '088888888888', NULL),
(24, 'Wibowo', 9, 'Jakarta', '088888888888', NULL),
(25, 'zigma', 9, 'bandung', '088888888888', NULL),
(26, 'faisal', 9, 'jakarta', '088888888888', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `is_active`) VALUES
(1, 'hpi', 'Suerci', 'hpi@kcic.co.id', '$2y$10$weZJCgtaSD96.QADMxXwteedrnzPr0tYyha7bZQ36vhQB2fXY8VNS', 0),
(5, 'rabby', 'rabbykalimasada', 'rabby@kcic.co.id', '$2y$10$3DQxQ1P1z0nt6GEVFA0AjeiTYqBuYNogySWhwXXZVEUJsKV9rqbK6', 0),
(6, 'admin', 'HPIT', 'hpit@kcic.co.id', '$2y$10$UFYTd0eEupAJhiI7cK9tYefmn2XTeocaoJ.ic8DCru7CMwzUuiwWa', 1),
(7, 'ur', 'urwah', 'urwahzd@kcic.co.id', '$2y$10$Nr5RXh2O75UuEJ6qrpbSpu0K4Jfmcjwz53W1NKzQRDD9GvGf6AbuG', 0),
(8, 'bagus24', 'bagus kahfi', 'bagus@kcic.co.id', '$2y$10$pkodKv30JdumltoMGBLHt.YmPFMjJ8Fiwpd5m1U7mipKT1NYyxv7i', 0),
(9, 'avian_dwijaya', 'Avian', 'viandwijaya@Pemprovsmg.com', '$2y$10$EebIDyQ.Sux1/WyvUecAxea/kCP68s4QGS7mNJfi6RqyOQ8QSLR1S', 1),
(10, 'ferri', 'ferri', 'ferry@kcic.co.id', '$2y$10$A8prCEXFX7xsAUuS4PaCVuxHU6.pikHSsnTDselPZWgpNfi.NqHgO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_asset_number` (`asset_number`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_asset_type`
--
ALTER TABLE `master_asset_type`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `master_asset_type_id_category_foreign` (`id_category`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `master_department`
--
ALTER TABLE `master_department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17553;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_asset_type`
--
ALTER TABLE `master_asset_type`
  MODIFY `id_type` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_department`
--
ALTER TABLE `master_department`
  MODIFY `id_department` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_asset_type`
--
ALTER TABLE `master_asset_type`
  ADD CONSTRAINT `master_asset_type_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `master_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
