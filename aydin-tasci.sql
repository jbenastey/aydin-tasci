-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Nov 2019 pada 10.00
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aydin-tasci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktor`
--

CREATE TABLE `faktor` (
  `faktor_id` int(11) NOT NULL,
  `faktor_nama` varchar(255) NOT NULL,
  `faktor_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faktor`
--

INSERT INTO `faktor` (`faktor_id`, `faktor_nama`, `faktor_date_created`) VALUES
(1, 'Laptop', '2019-11-02 04:13:56'),
(3, 'Hape', '2019-11-02 05:39:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `kuesioner_id` varchar(10) NOT NULL,
  `kuesioner_nama` varchar(255) NOT NULL,
  `kuesioner_nip_nik_nim` varchar(20) NOT NULL,
  `kuesioner_jabatan` enum('Mahasiswa','Dosen Pengajar','Kepala Jurusan','Dekan') NOT NULL,
  `kuesioner_fakultas` enum('ftk','fud','fpsi','fekonsos','fasih','fdk','fst','fapertapet') NOT NULL,
  `kuesioner_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`kuesioner_id`, `kuesioner_nama`, `kuesioner_nip_nik_nim`, `kuesioner_jabatan`, `kuesioner_fakultas`, `kuesioner_date_created`) VALUES
('KUE-53811', 'pak pijay', '11551102648', 'Dosen Pengajar', 'fst', '2019-11-08 02:10:11'),
('KUE-53930', 'Jihad', '11551102648', 'Mahasiswa', 'fst', '2019-11-08 02:12:10'),
('KUE-55886', '4', '', 'Mahasiswa', 'ftk', '2019-11-04 15:24:46'),
('KUE-56694', '5', '', 'Mahasiswa', 'ftk', '2019-11-04 15:38:14'),
('KUE-78784', '1', '', 'Mahasiswa', 'ftk', '2019-11-03 17:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner_detail`
--

CREATE TABLE `kuesioner_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_kuesioner_id` varchar(10) NOT NULL,
  `detail_pertanyaan_id` int(11) NOT NULL,
  `detail_jawaban` int(11) NOT NULL,
  `detail_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner_detail`
--

INSERT INTO `kuesioner_detail` (`detail_id`, `detail_kuesioner_id`, `detail_pertanyaan_id`, `detail_jawaban`, `detail_date_created`) VALUES
(1, 'KUE-78784', 3, 4, '2019-11-03 17:59:44'),
(2, 'KUE-78784', 6, 3, '2019-11-03 17:59:44'),
(3, 'KUE-55886', 1, 4, '2019-11-04 15:24:46'),
(4, 'KUE-55886', 4, 3, '2019-11-04 15:24:46'),
(5, 'KUE-55886', 5, 3, '2019-11-04 15:24:46'),
(6, 'KUE-55886', 7, 4, '2019-11-04 15:24:46'),
(7, 'KUE-56694', 1, 5, '2019-11-04 15:38:14'),
(8, 'KUE-56694', 4, 3, '2019-11-04 15:38:14'),
(9, 'KUE-56694', 5, 4, '2019-11-04 15:38:14'),
(10, 'KUE-56694', 7, 3, '2019-11-04 15:38:14'),
(11, 'KUE-53811', 3, 5, '2019-11-08 02:10:11'),
(12, 'KUE-53811', 6, 4, '2019-11-08 02:10:11'),
(13, 'KUE-53930', 1, 5, '2019-11-08 02:12:10'),
(14, 'KUE-53930', 4, 4, '2019-11-08 02:12:10'),
(15, 'KUE-53930', 5, 4, '2019-11-08 02:12:10'),
(16, 'KUE-53930', 7, 4, '2019-11-08 02:12:10'),
(17, 'KUE-53930', 8, 4, '2019-11-08 02:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('dosen','mahasiswa','admin') NOT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_nama`, `pengguna_date_created`) VALUES
(1, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen', 'Pak Safaat', '2019-11-03 15:04:07'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'intan', '2019-11-04 14:49:33'),
(4, 'jihad', '5787be38ee03a9ae5360f54d9026465f', 'mahasiswa', 'Jihad', '2019-11-04 15:14:53'),
(5, 'adi', '5787be38ee03a9ae5360f54d9026465f', 'mahasiswa', 'adi', '2019-11-04 15:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan_isi` text NOT NULL,
  `pertanyaan_faktor_id` int(11) NOT NULL,
  `pertanyaan_subfaktor_id` int(11) NOT NULL,
  `pertanyaan_jenis` enum('dosen','mahasiswa') NOT NULL,
  `pertanyaan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`pertanyaan_id`, `pertanyaan_isi`, `pertanyaan_faktor_id`, `pertanyaan_subfaktor_id`, `pertanyaan_jenis`, `pertanyaan_date_created`) VALUES
(1, 'modelnya gimana ?', 1, 1, 'mahasiswa', '2019-11-02 13:44:48'),
(3, 'gimana layarnya', 3, 6, 'dosen', '2019-11-03 16:10:41'),
(4, 'berapa ramnya', 3, 6, 'mahasiswa', '2019-11-03 16:11:00'),
(5, 'asddasds', 1, 1, 'mahasiswa', '2019-11-03 16:48:15'),
(6, 'asfdsdas', 1, 1, 'dosen', '2019-11-03 16:48:57'),
(7, 'asdasddddddddddddddd', 1, 1, 'mahasiswa', '2019-11-04 15:15:53'),
(8, 'asdasd', 1, 5, 'mahasiswa', '2019-11-05 11:58:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subfaktor`
--

CREATE TABLE `subfaktor` (
  `subfaktor_id` int(11) NOT NULL,
  `subfaktor_faktor_id` int(11) NOT NULL,
  `subfaktor_nama` varchar(255) NOT NULL,
  `subfaktor_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subfaktor`
--

INSERT INTO `subfaktor` (`subfaktor_id`, `subfaktor_faktor_id`, `subfaktor_nama`, `subfaktor_date_created`) VALUES
(1, 1, 'layar', '2019-11-02 11:36:58'),
(5, 1, 'Model', '2019-11-02 13:12:29'),
(6, 3, 'Ram', '2019-11-03 14:48:37'),
(8, 1, 'satu', '2019-11-05 12:10:17'),
(9, 1, 'asdasd', '2019-11-07 21:40:47'),
(10, 1, 'sadasd', '2019-11-07 21:42:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktor`
--
ALTER TABLE `faktor`
  ADD PRIMARY KEY (`faktor_id`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`kuesioner_id`);

--
-- Indexes for table `kuesioner_detail`
--
ALTER TABLE `kuesioner_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indexes for table `subfaktor`
--
ALTER TABLE `subfaktor`
  ADD PRIMARY KEY (`subfaktor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faktor`
--
ALTER TABLE `faktor`
  MODIFY `faktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kuesioner_detail`
--
ALTER TABLE `kuesioner_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subfaktor`
--
ALTER TABLE `subfaktor`
  MODIFY `subfaktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
