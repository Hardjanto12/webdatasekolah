-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220531.aadb8cc914
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 04, 2022 at 03:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmp_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `privilege`, `created_at`) VALUES
(33, '123456789', '$2y$10$xeJBdsuAkiH5Qpz0AUh8zOfYHY9wrj2SaX.sZdsk.1CFZHJxjcvTe', 'guru', '2022-06-03 01:28:02'),
(34, '111222333', '$2y$10$ftp/VfrU76b8xlAGQybXsugcjQ8KTKbaF3e3N5tsaEKKQVu5PTexq', 'guru', '2022-06-03 15:14:45'),
(35, '33333333', '$2y$10$GGN1NEV1GW5yJCe1SS5moekBzYan2PDAwgK/vpxrKhI7Qo5CmC0nm', 'guru', '2022-06-03 22:39:33'),
(36, '8888899999', '$2y$10$NB0EciCVL.4ga0WTGmEieu22FuaR8w6ogls9SZUby89qN765.YU9a', 'guru', '2022-06-03 23:05:27'),
(37, '2137743644200053', '$2y$10$3Lyo/EnpywUxZziXsEXFVOQkgGs3E7d8qT3rV.ljT4Nxy2DSJ0xo6', 'guru', '2022-06-04 10:29:12'),
(38, '12345678972381923', '$2y$10$zRPx8ClUF0IxQVn91legWuzRpv2uj3dYS55UBhHS1F.usKGJ1apZq', 'guru', '2022-06-04 10:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nuptk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(75) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nuptk`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `notelp`, `mata_pelajaran`, `created_time`) VALUES
(16, '123456789', 'Rose', 'New Zealand', '1997-08-11', 'P', 'Seoul', '083877288873', 'Biologi', '2022-06-03 01:26:18'),
(17, '111222333', 'Lisa', 'Bangkok', '1997-03-02', 'P', 'Seoul', '08377728837', 'Kimia', '2022-06-03 15:14:44'),
(18, '333333333', 'Jisoo', 'Seoul', '1996-03-08', 'P', 'Seoul', '08372876272', 'Fisika', '2022-06-03 22:39:33'),
(19, '8888899999', 'Jennie', 'Seoul', '1997-02-08', 'P', 'Seoul', '083777388826', 'Matematika', '2022-06-03 23:05:26'),
(24, '2137743644200053', 'Budi Suharso', 'Surabaya', '1965-08-05', 'L', 'Surabaya', '084923829829', 'Kimia', '2022-06-04 10:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nipd` varchar(75) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(75) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `notelp` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nipd`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `nama_ayah`, `nama_ibu`, `notelp`, `foto`, `tahun_lulus`) VALUES
(76, '1111122222', 'Glen Quagmire', 'Quahog', '1993-03-03', 'L', 'Quahog', 'Ronny Quagmire', ' Martha Quagmire', '083784788828', '629a2f985c346.jpg', 2003),
(77, '3333322222', 'Joe', 'Quahog', '1996-08-02', 'L', 'Quahog', 'Mike ', 'Christina', '083772877738', '629a2fd864da2.jpg', 2003),
(78, '8888899999', 'Lois Griffin', 'Quahog', '1995-08-03', 'P', 'Quahog', 'Pewterschmidt', 'Polly', '083888389929', '629a30158e09a.png', 2003),
(79, '6666373732', 'Peter Griffin', 'Quahog', '1996-08-11', 'L', 'Quahog', 'Hugo Griffin', 'Sophie Griffin', '083777283412', '629a304dd8b57.jpg', 2003),
(80, '1111155566', 'Stewie Griffin', 'Quahog', '2000-03-08', 'L', 'Quahog', 'Peter Griffin', 'Lois Griffin', '083777366628', '629a3088aa551.png', 0000),
(81, '7898766367', 'Chris Griffin', 'Quahog', '2000-01-12', 'L', 'Quahog', 'Peter Griffin', 'Lois Griffin', '0838782631768', '629a30ad0cbba.jpg', 0000),
(82, '1234445556', 'Megatron Griffin', 'Quahog', '2000-03-09', 'P', 'Quahog', 'Peter Griffin', 'Lois Griffin', '083788727738', '629a31011e9f2.jpg', 0000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



