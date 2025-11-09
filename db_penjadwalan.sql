-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 02:06 PM
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
-- Database: `db_penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `foto_profil`, `email`, `prodi_id`, `created_at`, `updated_at`) VALUES
(2, '198501012010121001', 'Dr. Budi Santoso, M.Kom.', NULL, 'budi.santoso@example.com', 1, '2025-11-02 06:36:22', '2025-11-02 06:36:22'),
(3, '199002022015032002', 'Siti Aminah, S.Kom., M.T.', NULL, 'siti.aminah@example.com', 2, '2025-11-02 06:36:22', '2025-11-02 06:36:22'),
(4, '1990019200192018', 'Pak Harun', '1762152658.jpg', 'harun@gmail.com', 3, '2025-11-02 06:42:16', '2025-11-02 23:50:59'),
(5, '1990019200192019', 'Pak Rama', '1762140803.jpg', 'rama@gmail.com', 3, '2025-11-02 06:42:53', '2025-11-02 20:33:23'),
(6, '1990019200192010', 'Bu Santi', NULL, 'santi@gmail.com', 3, '2025-11-02 19:06:27', '2025-11-02 19:06:27'),
(7, '1990019200192011', 'Bu Ersha', NULL, 'ersha@gmail.com', 3, '2025-11-02 19:07:07', '2025-11-02 19:07:07'),
(8, '1990019200192015', 'Bu Elvira', '1762321052.jpg', 'elvira@gmail.com', 3, '2025-11-02 19:07:54', '2025-11-04 22:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_hari` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(2, 'Selasa', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(3, 'Rabu', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(4, 'Kamis', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(5, 'Jumat', '2025-11-02 06:36:21', '2025-11-02 06:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengampu_id` bigint(20) UNSIGNED NOT NULL,
  `ruang_id` bigint(20) UNSIGNED NOT NULL,
  `hari_id` bigint(20) UNSIGNED NOT NULL,
  `jam_id` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id`, `pengampu_id`, `ruang_id`, `hari_id`, `jam_id`, `semester`, `tahun_akademik`, `created_at`, `updated_at`, `kelas_id`) VALUES
(2, 1, 1, 1, 2, 7, '2025', '2025-11-02 19:11:18', '2025-11-02 19:11:18', 4),
(3, 2, 1, 2, 1, 7, '2025', '2025-11-02 19:11:18', '2025-11-02 19:11:18', 4),
(4, 3, 1, 3, 2, 7, '2025', '2025-11-02 19:11:18', '2025-11-02 19:11:18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi` int(11) NOT NULL DEFAULT 50,
  `waktu_shalat` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id`, `jam_mulai`, `jam_selesai`, `durasi`, `waktu_shalat`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '09:40:00', 100, 0, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(2, '10:00:00', '12:30:00', 150, 0, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(3, '13:30:00', '15:10:00', 100, 0, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(4, '15:30:00', '17:10:00', 100, 0, '2025-11-02 06:36:21', '2025-11-02 06:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `prodi_id`, `created_at`, `updated_at`) VALUES
(1, 'TI-A', 1, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(2, 'TI-B', 1, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(3, 'SI-A', 2, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(4, 'PTI A 2022', 3, '2025-11-02 06:37:53', '2025-11-02 06:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `foto_profil`, `prodi_id`, `semester`, `created_at`, `updated_at`, `user_id`, `kelas_id`) VALUES
(1, '220101001', 'Andi Pratama', NULL, 1, 3, '2025-11-02 06:36:22', '2025-11-02 06:36:22', 4, NULL),
(2, '220201001', 'Citra Lestari', NULL, 2, 3, '2025-11-02 06:36:23', '2025-11-02 06:36:23', 5, NULL),
(3, '22050974004', 'aditya', 'nWy5K1PEKsequLXXfDUT3Tx8LFQd9Aj8baIdCVTG.jpg', 3, 7, '2025-11-02 06:41:43', '2025-11-02 19:20:26', 6, 4),
(4, '22050974032', 'Bagas Rosyidi', NULL, 3, 6, '2025-11-02 06:44:02', '2025-11-02 06:44:02', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_mk`, `nama`, `sks`, `semester`, `prodi_id`, `created_at`, `updated_at`) VALUES
(1, 'TI101', 'Algoritma dan Pemrograman', 3, 1, 1, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(2, 'TI102', 'Struktur Data', 3, 2, 1, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(3, 'SI101', 'Dasar Sistem Informasi', 3, 1, 2, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(4, 'PTI-001', 'Data Mining', 3, 7, 3, '2025-11-02 06:44:32', '2025-11-02 06:44:32'),
(5, 'PTI-002', 'Statistika', 2, 7, 3, '2025-11-02 19:08:44', '2025-11-02 19:08:44'),
(6, 'PTI-003', 'Manajemen Proyek', 3, 7, 3, '2025-11-02 19:09:07', '2025-11-02 19:09:07'),
(7, 'PTI-004', 'Basis Data', 3, 3, 3, '2025-11-04 22:31:22', '2025-11-04 22:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_17_100000_create_prodi_table', 1),
(6, '2024_11_17_102247_create_admin_table', 1),
(7, '2024_11_17_102310_create_mahasiswa_table', 1),
(8, '2024_11_17_102320_create_dosen_table', 1),
(9, '2024_11_17_102408_create_matakuliah_table', 1),
(10, '2024_11_17_102707_create_kelas_table', 1),
(11, '2024_11_17_104710_create_hari_table', 1),
(12, '2024_11_17_104808_create_jam_table', 1),
(13, '2024_11_17_104852_create_pengampu_table', 1),
(14, '2024_11_17_104931_create_ruang_table', 1),
(15, '2024_11_20_085621_pengambilan_mk', 1),
(16, '2024_11_26_073546_add_role_to_users_table', 1),
(17, '2024_12_02_051544_create_pengampu_dosen_table', 1),
(18, '2024_12_05_010000_create_jadwal_kuliah_table', 1),
(19, '2025_10_25_054124_add_user_id_to_mahasiswa_table', 1),
(20, '2025_10_26_033341_add_semester_to_mahasiswa_table', 1),
(21, '2025_10_26_040100_add_kelas_id_to_mahasiswa_table', 1),
(22, '2025_10_26_064943_add_semester_and_kelas_id_to_jadwal_kuliah_table', 1),
(23, '2025_10_26_090413_add_foto_profil_to_mahasiswa_table', 1),
(24, '2025_10_27_060141_add_prodi_id_to_pengampu_table', 1),
(25, '2025_10_27_100000_add_foto_profil_to_dosen_table', 1),
(26, '2025_11_01_014358_add_status_to_pengambilan_mk_table', 1),
(27, '2025_11_02_054429_add_status_tahun_akademik_to_pengambilan_mk_table', 1),
(28, '2025_11_02_100000_change_prodi_id_to_not_nullable_in_pengampu_table', 1),
(29, '2025_11_04_011156_create_pengumuman_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_mk`
--

CREATE TABLE `pengambilan_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `matakuliah_id` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_akademik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengambilan_mk`
--

INSERT INTO `pengambilan_mk` (`id`, `status`, `mahasiswa_id`, `matakuliah_id`, `semester`, `tahun_akademik`, `created_at`, `updated_at`) VALUES
(1, 'approved', 3, 4, 7, NULL, '2025-11-02 19:20:54', '2025-11-02 19:26:08'),
(2, 'approved', 3, 5, 7, NULL, '2025-11-02 19:21:00', '2025-11-05 05:48:50'),
(3, 'pending', 3, 6, 7, NULL, '2025-11-02 19:21:05', '2025-11-02 19:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengampu`
--

CREATE TABLE `pengampu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `matakuliah_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengampu`
--

INSERT INTO `pengampu` (`id`, `dosen_id`, `matakuliah_id`, `kelas_id`, `tahun_akademik`, `created_at`, `updated_at`, `prodi_id`) VALUES
(1, 4, 4, 4, '2025', '2025-11-02 06:58:47', '2025-11-02 06:58:47', 3),
(2, 8, 5, 4, '2025', '2025-11-02 19:09:52', '2025-11-02 19:09:52', 3),
(3, 7, 6, 4, '2025', '2025-11-02 19:10:57', '2025-11-02 19:10:57', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengampu_dosen`
--

CREATE TABLE `pengampu_dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengampu_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengampu_dosen`
--

INSERT INTO `pengampu_dosen` (`id`, `pengampu_id`, `dosen_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, NULL, NULL),
(2, 1, 5, 4, NULL, NULL),
(3, 2, 8, 4, NULL, NULL),
(4, 2, 5, 4, NULL, NULL),
(5, 3, 7, 4, NULL, NULL),
(6, 3, 6, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_kuliah_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('perubahan','pembatalan','informasi') NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(2, 'Sistem Informasi', '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(3, 'Pendidikan Teknologi Informasi', '2025-11-02 06:36:21', '2025-11-02 06:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'R-101', 40, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(2, 'R-102', 40, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(3, 'R-201', 35, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(4, 'LAB-KOM 1', 30, '2025-11-02 06:36:21', '2025-11-02 06:36:21'),
(5, 'LAB-KOM 3', 45, '2025-11-04 22:32:55', '2025-11-04 22:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$VnVvJbWlK1gA06P0nLPyD.tkN43T04puZN/quJ7.8pAyx1Rnr3CgC', 'admin', NULL, '2025-11-02 06:36:21', '2025-11-02 20:43:55'),
(2, 'Dr. Budi Santoso, M.Kom.', 'budi.santoso@example.com', NULL, '$2y$12$73it5pFCTVkbCLRLhXfnkuijydswOVJjWZbpCrJ01vgNZKGvVIbOS', 'dosen', NULL, '2025-11-02 06:36:22', '2025-11-02 06:36:22'),
(3, 'Siti Aminah, S.Kom., M.T.', 'siti.aminah@example.com', NULL, '$2y$12$aVTQ2s//p0nA3MKUsEwOZeEKl.HpeCgP4nOOUswZguiVXfsiVOZE6', 'dosen', NULL, '2025-11-02 06:36:22', '2025-11-02 06:36:22'),
(4, 'Andi Pratama', 'andi.pratama@example.com', NULL, '$2y$12$lWjcc6xLosEEmq2wc9bXcuJU5t/GFQ6RVv.3LlCK3kYb6bWyZzMSy', 'mahasiswa', NULL, '2025-11-02 06:36:22', '2025-11-02 06:36:22'),
(5, 'Citra Lestari', 'citra.lestari@example.com', NULL, '$2y$12$YEpa998.8kQ9sSZqKJ.NuO3V/Al51556QkHB98W1BjbD90PskbBBq', 'mahasiswa', NULL, '2025-11-02 06:36:23', '2025-11-02 06:36:23'),
(6, 'aditya', 'aditya@gmail.com', NULL, '$2y$12$DUk941ODGR6foW1i/pFSA.7IDoxVb2p/nKzh7ZrIL6Xwl5nLih.IK', 'mahasiswa', NULL, '2025-11-02 06:41:43', '2025-11-02 06:41:43'),
(7, 'Pak Harun', 'harun@gmail.com', NULL, '$2y$12$ywMhVSegxzbpjHCAH8Whau.FTOj3Ly0tc6I0rRmA/sOKOpUNKTXC6', 'dosen', NULL, '2025-11-02 06:42:16', '2025-11-02 20:40:12'),
(8, 'Pak Rama', 'rama@gmail.com', NULL, '$2y$12$Wu6T7xvCWhBjJ7IVJIfV4uoE4LSlbhw0m3I7YDuFFps/hs/g.MrAG', 'dosen', NULL, '2025-11-02 06:42:53', '2025-11-02 20:33:48'),
(9, 'Bagas Rosyidi', 'bagas@gmail.com', NULL, '$2y$12$HzEmlh42vOSfVd00l2k.uOwK5lmWItONZYcU7PVBJgAPgKzlkrYDG', 'mahasiswa', NULL, '2025-11-02 06:44:02', '2025-11-02 06:44:02'),
(10, 'Bu Santi', 'santi@gmail.com', NULL, '$2y$12$1HElsKZb.pD1zt5Z2RcVm.Oz607kfZyueFEzafXSIt2wJQDCi6oBu', 'dosen', NULL, '2025-11-02 19:06:27', '2025-11-02 19:06:27'),
(11, 'Bu Ersha', 'ersha@gmail.com', NULL, '$2y$12$luxVJdn0VuAhNOAJaUh34O0pCdMdaa4IJmByXaYFIWHoJyUYO5X4u', 'dosen', NULL, '2025-11-02 19:07:07', '2025-11-02 19:07:07'),
(12, 'Bu Elvira', 'elvira@gmail.com', NULL, '$2y$12$GQ3s16VzM2Y/cpqkXDWdxeCexWZg3jjFZYZSE/EV8edBgmqZrpBeW', 'dosen', NULL, '2025-11-02 19:07:54', '2025-11-02 19:07:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD UNIQUE KEY `dosen_email_unique` (`email`),
  ADD KEY `dosen_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kuliah_pengampu_id_foreign` (`pengampu_id`),
  ADD KEY `jadwal_kuliah_ruang_id_foreign` (`ruang_id`),
  ADD KEY `jadwal_kuliah_hari_id_foreign` (`hari_id`),
  ADD KEY `jadwal_kuliah_jam_id_foreign` (`jam_id`),
  ADD KEY `jadwal_kuliah_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_user_id_unique` (`user_id`),
  ADD KEY `mahasiswa_prodi_id_foreign` (`prodi_id`),
  ADD KEY `mahasiswa_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliah_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengambilan_mk`
--
ALTER TABLE `pengambilan_mk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengambilan_mk_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `pengambilan_mk_matakuliah_id_foreign` (`matakuliah_id`);

--
-- Indexes for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengampu_dosen_id_foreign` (`dosen_id`),
  ADD KEY `pengampu_matakuliah_id_foreign` (`matakuliah_id`),
  ADD KEY `pengampu_kelas_id_foreign` (`kelas_id`),
  ADD KEY `pengampu_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `pengampu_dosen`
--
ALTER TABLE `pengampu_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengampu_dosen_pengampu_id_dosen_id_unique` (`pengampu_id`,`dosen_id`),
  ADD KEY `pengampu_dosen_dosen_id_foreign` (`dosen_id`),
  ADD KEY `pengampu_dosen_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_jadwal_kuliah_id_foreign` (`jadwal_kuliah_id`),
  ADD KEY `pengumuman_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengambilan_mk`
--
ALTER TABLE `pengambilan_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengampu`
--
ALTER TABLE `pengampu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengampu_dosen`
--
ALTER TABLE `pengampu_dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_hari_id_foreign` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_jam_id_foreign` FOREIGN KEY (`jam_id`) REFERENCES `jam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `jadwal_kuliah_pengampu_id_foreign` FOREIGN KEY (`pengampu_id`) REFERENCES `pengampu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `mahasiswa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `pengambilan_mk`
--
ALTER TABLE `pengambilan_mk`
  ADD CONSTRAINT `pengambilan_mk_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengambilan_mk_matakuliah_id_foreign` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD CONSTRAINT `pengampu_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampu_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampu_matakuliah_id_foreign` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampu_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `pengampu_dosen`
--
ALTER TABLE `pengampu_dosen`
  ADD CONSTRAINT `pengampu_dosen_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampu_dosen_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampu_dosen_pengampu_id_foreign` FOREIGN KEY (`pengampu_id`) REFERENCES `pengampu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumuman_jadwal_kuliah_id_foreign` FOREIGN KEY (`jadwal_kuliah_id`) REFERENCES `jadwal_kuliah` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
