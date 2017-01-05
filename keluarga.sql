-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 08:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keluarga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(18) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `username`, `password`, `level`, `foto`, `last_login`) VALUES
('1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 'file_1483510067.JPG', '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
--
CREATE TABLE `login` (
`username` varchar(20)
,`password` varchar(50)
,`level` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `id_peminta` varchar(18) NOT NULL,
  `id_diminta` varchar(18) NOT NULL,
  `jenis_konfirmasi` enum('Diterima','Tidak') DEFAULT NULL,
  `jenis_permintaan` enum('Suami','Istri','Ayah','Ibu') NOT NULL,
  `tanggal_permintaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_permintaan` enum('Belum','Terima','Tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pernikahan`
--

CREATE TABLE `pernikahan` (
  `id_nikah` int(11) NOT NULL,
  `id_suami` varchar(18) DEFAULT NULL,
  `id_istri` varchar(18) DEFAULT NULL,
  `tanggal_nikah` date NOT NULL,
  `tanggal_cerai` date DEFAULT NULL,
  `status_nikah` enum('aktif','cerai_hidup','cerai_mati','tidak_resmi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pernikahan`
--

INSERT INTO `pernikahan` (`id_nikah`, `id_suami`, `id_istri`, `tanggal_nikah`, `tanggal_cerai`, `status_nikah`) VALUES
(6, NULL, NULL, '0000-00-00', NULL, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(18) NOT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha','Konghuchu') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `golongan_darah` enum('A','B','O','AB','Tidak Tahu') DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `pendidikan` enum('Tidak Sekolah','SD','SMP','SMA','D1','D2','D3','D4','S1','S2','S3') DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `status` enum('Hidup','Mati') DEFAULT NULL,
  `status_akun` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_nikah_ortu` int(11) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `terakhir_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_ktp`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `golongan_darah`, `no_telepon`, `email`, `username`, `password`, `level`, `pendidikan`, `pekerjaan`, `status`, `status_akun`, `id_nikah_ortu`, `tanggal_meninggal`, `foto`, `terakhir_login`, `created_at`, `updated_at`) VALUES
('1', 1, 'Afriza Dwi Ikhsani', 'Laki-laki', 'Klaten', '1996-09-02', 'Islam', 'Klaten', 'B', '086727735367', 'a@b.c', 'afrizadwi', '66903f3ca792b3a2a4de8f4f95d9a63a', 1, 'D3', 'Mahasiswa', NULL, 'Aktif', NULL, NULL, NULL, NULL, '2017-01-04 14:19:01', '2017-01-04 07:19:20'),
('2', 2, 'Gina Dewi Anggraini', 'Perempuan', 'Jakarta', '1998-01-02', 'Islam', 'Jakarta', 'AB', '086727735367', 'a@b.c', 'ginadewi', 'edcfca6fec78f5ccf5c93cba2d3a37a5', 1, 'D3', 'Mahasiswa', NULL, 'Aktif', NULL, NULL, NULL, NULL, '2017-01-04 14:19:59', '2017-01-04 07:20:27'),
('3', 2123, 'Nila Nur Lita', 'Laki-laki', 'Klaten', '1997-07-02', 'Islam', 'Klaten', 'AB', '085727735367', 'add@b.c', 'nilanur', 'd30882326083a50190a6fc3cf6e5b816', 1, 'D3', 'Mahasiswa', '', 'Aktif', NULL, '0000-00-00', 'file_1483513819.JPG', NULL, '2017-01-03 20:03:25', '2017-01-04 07:11:55'),
('4', 4, 'Atika Indana Zulfa', 'Perempuan', 'Kebumen', '1992-08-09', 'Islam', 'Kebumen', 'AB', '086727735367', 'a@b.c', 'atikaindana', '07e503fe3201b41d2de282b44b318457', 1, 'D3', 'Mahasiswa', NULL, 'Aktif', NULL, NULL, 'file_1483514207.JPG', NULL, '2017-01-04 10:34:46', '2017-01-04 07:16:47'),
('5', 5, 'Hanif Taqiuddin', 'Laki-laki', 'Bantul', '1998-01-07', 'Islam', 'Bantul', 'B', '086727735367', 'a@b.c', 'haniftaqiuddin', '71986ce73c8aaf4c6e1fb8252b3b4f22', 1, 'S1', 'Mahasiswa', NULL, 'Aktif', NULL, NULL, NULL, NULL, '2017-01-04 14:20:56', '2017-01-04 07:21:20');

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  select `admin`.`username` AS `username`,`admin`.`password` AS `password`,`admin`.`level` AS `level` from `admin` union select `user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`level` AS `level` from `user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `peminta` (`id_peminta`) USING BTREE,
  ADD KEY `diminta` (`id_diminta`) USING BTREE;

--
-- Indexes for table `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD PRIMARY KEY (`id_nikah`),
  ADD KEY `idx` (`id_suami`),
  ADD KEY `adf` (`id_istri`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nikah_ortu` (`id_nikah_ortu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_nikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`id_peminta`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`id_diminta`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD CONSTRAINT `pernikahan_ibfk_1` FOREIGN KEY (`id_suami`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pernikahan_ibfk_2` FOREIGN KEY (`id_istri`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_nikah_ortu`) REFERENCES `pernikahan` (`id_nikah`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
