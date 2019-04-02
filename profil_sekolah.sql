-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2019 pada 16.22
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
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`sekolah_id`, `nisn`, `nama`, `email`, `telepon`, `alamat`, `logo`) VALUES
(1, '11.122.3344', 'SMAN 1 Pasuruan', 'sman1pasuruan@gmail.com', '0343421222', 'Jln. Veteran No. 11, Pasuruan', '1.jpg'),
(3, '1234567898', 'SMP 1 Pasuruan', 'smp1@gmail.com', '', '', ''),
(4, '20525862', 'SMAN 1 CLURING', 'smaring96@yahoo.co.id', '(0333) 397306', 'Jalan H. Huzaini, Benculuk, Cluring, Banyuwangi', '4.png'),
(6, '20525729', 'SMPN 1 GLENMORE', 'smpn1glenmore@gmail.com', '', 'Jl. Raya Ps. No.115, Sep Wetan, Sepanjang, Glenmore, Kabupaten Banyuwangi, Jawa Timur 68466', ''),
(7, '20525860', 'SMAN 1 Purwoharjo', 'sman1pwhj@yahoo.co.id', '(0333) 396475', 'Jl. Slamet Cokro Purwoharjo (68483)', ''),
(8, '20525872', 'SMAN 1 BANGOREJO', 'sman1bangorejo@yahoo.co.id', '', ' JL. BHAYANGKARA NO. 67, Kebondalem, Kec. Bangorejo, Kab. Banyuwangi Prov. Jawa Timur', ''),
(9, '20525864', 'SMAS PGRI PURWOHARJO', 'smaspgri@gmail.com', '', 'Jln. Jajag No. 7 , Kradenan, Kec. Purwoharjo, Kab. Banyuwangi Prov. Jawa Timur', ''),
(10, '20525712 ', 'SMPN 1 BANYUWANGI ', 'smpn1bwi@gmail.com', '', 'Jln. Jenderal A. Yani No.74 Banyuwangi (68416)', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
