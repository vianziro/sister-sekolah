-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2019 pada 09.36
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sister-sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggaransiswa`
--

CREATE TABLE `tbl_pelanggaransiswa` (
  `id_pelanggaran` int(10) NOT NULL,
  `nis` varchar(16) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `tanggal_pelanggaran` date DEFAULT NULL,
  `subkategori` int(3) DEFAULT NULL,
  `point_pelanggaran` int(3) NOT NULL,
  `tindak_lanjut` varchar(200) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `guru_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pelanggaransiswa`
--

INSERT INTO `tbl_pelanggaransiswa` (`id_pelanggaran`, `nis`, `kelas`, `tanggal_pelanggaran`, `subkategori`, `point_pelanggaran`, `tindak_lanjut`, `keterangan`, `guru_id`) VALUES
(1, '102210123', '9 IPA A', '2019-04-02', 47, 10, 'Teguran Langsung', 'Proses', 2),
(3, '5149', '10 IPS 2', '2019-04-02', 51, 11, 'Panggil', 'Belum Teratasi', 14);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_pelanggaransiswa`
--
ALTER TABLE `tbl_pelanggaransiswa`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `nis` (`nis`),
  ADD KEY `subkategori` (`subkategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggaransiswa`
--
ALTER TABLE `tbl_pelanggaransiswa`
  MODIFY `id_pelanggaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
