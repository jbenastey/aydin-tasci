-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Nov 2019 pada 15.38
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
  `kuesioner_pengguna_id` int(11) NOT NULL,
  `kuesioner_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`kuesioner_id`, `kuesioner_pengguna_id`, `kuesioner_date_created`) VALUES
('KUE-78784', 1, '2019-11-03 17:59:44');

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
(2, 'KUE-78784', 6, 3, '2019-11-03 17:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('dosen','mahasiswa','admin') NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_date_created`) VALUES
(1, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen', '2019-11-03 15:04:07');

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
(6, 'asfdsdas', 1, 1, 'dosen', '2019-11-03 16:48:57');

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
(1, 1, 'layarnya', '2019-11-02 11:36:58'),
(5, 1, 'Model', '2019-11-02 13:12:29'),
(6, 3, 'Ram', '2019-11-03 14:48:37');

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
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subfaktor`
--
ALTER TABLE `subfaktor`
  MODIFY `subfaktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
