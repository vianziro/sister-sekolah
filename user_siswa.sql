-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2019 pada 04.42
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
-- Struktur dari tabel `user_siswa`
--

CREATE TABLE `user_siswa` (
  `siswa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `kelas_id` varchar(20) NOT NULL,
  `nis` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_ortu_bapak` varchar(50) NOT NULL,
  `nama_ortu_ibu` varchar(50) NOT NULL,
  `no_hp_ortu` varchar(13) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `device_id_ortu` varchar(100) NOT NULL,
  `fcm_ortu` varchar(250) NOT NULL,
  `password_ortu` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `agama_siswa` varchar(17) NOT NULL,
  `tempat_lahir_siswa` varchar(17) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_siswa`
--

INSERT INTO `user_siswa` (`siswa_id`, `user_id`, `sekolah_id`, `kelas_id`, `nis`, `alamat`, `nama_ortu_bapak`, `nama_ortu_ibu`, `no_hp_ortu`, `alamat_ortu`, `device_id_ortu`, `fcm_ortu`, `password_ortu`, `foto`, `agama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`) VALUES
(1, 9, 1, '1', 102210055, 'Ds. Kemiri RT.01 / RW.02 Kec. Puspo', 'Budi Sukanto', '', '', '', 'null', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(3, 17, 1, '1', 102210123, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '8125445244', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'avatar.png', 'Kristen', 'Bandung', '2016-02-08'),
(4, 299, 4, '4', 5194, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85335116905', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(5, 300, 4, '4', 5390, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85236883675', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(6, 301, 4, '4', 5356, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85604505556', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(7, 302, 4, '4', 5149, 'Jln. Didin No 1 Banyuwangi', 'Hartono', 'Suryani', '81238284976', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'user1-128x128.jpg', 'Islam', 'Magetan', '2016-10-03'),
(8, 303, 4, '4', 5153, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82139428740', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(9, 304, 4, '4', 5154, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82140772616', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(10, 305, 4, '4', 5155, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81936951401', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(11, 306, 4, '4', 5156, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82331858254', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(12, 307, 4, '4', 5160, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85330093811', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(13, 308, 4, '4', 5164, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81337216420', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(14, 309, 4, '4', 5250, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81249799060', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(15, 310, 4, '4', 5236, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85230440068', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(16, 311, 4, '4', 5225, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81249033531', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(17, 312, 4, '4', 5223, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', ' ', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(18, 313, 4, '4', 5210, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81236189225', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(19, 314, 4, '4', 5196, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81335620114', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(20, 315, 4, '4', 5262, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82140627891', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(21, 316, 4, '4', 5282, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85204600183', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(22, 317, 4, '4', 5424, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82334289336', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(23, 318, 4, '4', 5272, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85236896169', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(24, 319, 4, '4', 5315, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81554718401', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(25, 320, 4, '4', 5317, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85217140427', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(26, 321, 4, '4', 5340, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82316375819', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(27, 322, 4, '4', 5344, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81336215388', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(28, 323, 4, '4', 5345, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82340870079', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(29, 324, 4, '4', 5347, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82301701244', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(30, 325, 4, '4', 5350, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '83122354447', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(31, 326, 4, '4', 5399, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81274404018', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(32, 327, 4, '4', 5394, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82302223227', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(33, 328, 4, '4', 5392, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85321228970', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(34, 329, 4, '4', 5389, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '82141622282', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(35, 330, 4, '4', 5377, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81357649459', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(36, 331, 4, '4', 5375, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '81233447442', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00'),
(37, 332, 4, '4', 5372, 'Jln. Veteran No 11 Pasuruan', 'Hartono', 'Suryani', '85317686445', 'Jln. Gajahmada No 12 Pasuruan', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user_siswa`
--
ALTER TABLE `user_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user_siswa`
--
ALTER TABLE `user_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
