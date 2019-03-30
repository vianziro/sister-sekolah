-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2019 pada 22.23
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
-- Database: `sibiko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subkategori`
--

CREATE TABLE `tbl_subkategori` (
  `id_subkategori` int(3) NOT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `deskripsi_pelanggaran` varchar(200) DEFAULT NULL,
  `point_pelanggaran` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_subkategori`
--

INSERT INTO `tbl_subkategori` (`id_subkategori`, `id_kategori`, `deskripsi_pelanggaran`, `point_pelanggaran`) VALUES
(1, 1, 'Tidak membawa buku sesuai jadwal.', 10),
(2, 1, 'Membuat kegaduhan di kelas atau di sekolah.', 10),
(3, 1, 'Mencoret-coret atau mengotori dinding, pintu, meja, kursi, pagar sekolah.', 10),
(4, 1, 'Membawa atau bermain kartu remi dan domino di sekolah.', 10),
(5, 1, 'Memparkir sepeda/motor tidak pada tempatnya.', 10),
(6, 1, 'Bermain bola di koridor dan di dalam kelas.', 10),
(7, 1, 'Menyontek', 10),
(8, 1, 'Melindungi teman yang bersalah.', 15),
(9, 1, 'Menghidupkan handphone waktu KBM.', 20),
(10, 1, 'Berpacaran di Sekolah.', 20),
(11, 1, 'Berperilaku jorok atau asusila baik didalam maupun diluar sekolah', 20),
(12, 1, 'Merayakan ulang tahun berlebihan', 20),
(13, 1, 'Menyalahgunakan uang SPP atau uang sekolah.', 25),
(14, 1, 'Membawa atau membunyikan petasan.', 30),
(15, 1, 'Membuat surat izin palsu.', 40),
(16, 1, 'Meloncat jendela dan pagar sekolah.', 40),
(17, 1, 'Merusak sarana dan prasarana sekolah.', 40),
(18, 1, 'Bertindak tidak sopan/ melecehkan Kepala Sekolah, dan karyawan sekolah.', 50),
(19, 1, 'Mengancam / mengintimidasi teman sekelas / teman sekolah', 75),
(20, 1, 'Mengancam / mengintimidasi Kepala Sekolah, guru dan karyawan.', 100),
(21, 1, 'Membawa / merokok saat masih mengenakan seragam sekolah', 100),
(22, 1, 'Menyalahgunakan  media sosial yang merugikan pihak lain yang berhubungan dengan sekolah', 100),
(23, 1, 'Berjudi dalam bentuk apapun di sekolah.', 150),
(24, 1, 'Membawa senjata tajam, senjata api dsb. di sekolah.', 150),
(25, 1, 'Terlibat langsung maupun tidak langsung perkelahian/tawuran di sekolah, di luar sekolah atau antar sekolah.', 150),
(26, 1, 'Mengikuti aliran/perkumpulan/geng terlarang/Komunitas LGBT dan radikalisme', 150),
(27, 1, 'Membawa, menggunakan atau mengedarkan miras dan narkoba', 250),
(28, 1, 'Membawa dan/atau membuat VCD Porno, buku porno, majalah porno atau sesuatu yang berbau pornografi dan pornoaksi.', 200),
(29, 1, 'Mencuri di sekolah dan di luar sekolah.', 200),
(30, 1, 'Memalsukan stempel sekolah, edaran sekolah atau tanda tangan Kepala Sekolah, guru dan karyawan sekolah.', 250),
(31, 1, 'Terlibat tindakan kriminal, mencemarkan nama baik sekolah.', 250),
(32, 1, 'Terbukti hamil atau menghamili', 250),
(33, 1, 'Terbukti menikah', 250),
(34, 2, 'Datang terlambat.', 10),
(35, 2, 'Tidak mengikuti pelajaran tanpa izin.', 10),
(36, 2, 'Meninggalkan kelas tanpa izin.', 10),
(37, 2, 'Di kantin saat jam pelajaran.', 10),
(38, 2, 'Tidak mengikuti dan melaksanakan piket 7K.', 10),
(39, 2, 'Tidur di kelas saat pelajaran berlangsung', 10),
(40, 2, 'Tidak membawa buku yang berkaitan dengan pelajaran.', 10),
(41, 2, 'Pulang sebelum waktunya tanpa izin dari sekolah', 20),
(42, 2, 'Tidak masuk sekolah tanpa keterangan.', 20),
(43, 2, 'Tidak mengikuti upacara', 20),
(44, 2, 'Tidak mengikuti kegiatan sekolah', 20),
(45, 2, 'Tidak mengikuti kegiatan ekstrakurikuler', 20),
(46, 3, 'Tidak berseragam sesuai dengan ketentuan.', 10),
(47, 3, 'Tidak memasukkan baju.', 10),
(48, 3, 'Melipat lengan baju, baju tidak dikancingkan.', 10),
(49, 3, 'Seragam yang dicoret-coret.', 10),
(50, 3, 'Berambut panjang terurai (peserta didik putri ).', 10),
(51, 3, 'Celana atau rok sobek', 10),
(52, 3, 'Tidak memakai kaos kaki.', 10),
(53, 3, 'Memakai kaos kaki tidak sesuai ketentuan', 10),
(54, 3, 'Tidak memakai ikat pinggang.', 10),
(55, 3, 'Memakai ikat pinggang tidak sesuai dengan ketentuan (hitam)', 10),
(56, 3, 'Seragam atribut tidak lengkap.', 10),
(57, 3, 'Tidak memakai sepatu hitam ( selain olah raga ).', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_subkategori`
--
ALTER TABLE `tbl_subkategori`
  ADD PRIMARY KEY (`id_subkategori`),
  ADD KEY `point_pelanggaran` (`point_pelanggaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_subkategori`
--
ALTER TABLE `tbl_subkategori`
  MODIFY `id_subkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
