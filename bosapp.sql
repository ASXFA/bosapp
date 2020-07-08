-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jul 2020 pada 06.51
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartubimbingan`
--

CREATE TABLE `kartubimbingan` (
  `id` int(11) NOT NULL,
  `id_mhs` int(3) NOT NULL,
  `id_dsn` int(3) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tanggalbimbingan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_skripsi`
--

CREATE TABLE `kategori_skripsi` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_skripsi`
--

INSERT INTO `kategori_skripsi` (`id`, `nama`) VALUES
(2, 'Management Data'),
(3, 'Security'),
(4, 'Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(3) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `mahasiswa` varchar(100) NOT NULL,
  `dospem1` varchar(100) NOT NULL,
  `dospem2` varchar(100) NOT NULL,
  `kategoriskripsi` varchar(100) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `status_mahasiswa` varchar(100) NOT NULL,
  `status_skripsi` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id`, `judul`, `mahasiswa`, `dospem1`, `dospem2`, `kategoriskripsi`, `tahun`, `status_mahasiswa`, `status_skripsi`, `file`, `file_size`) VALUES
(2, 'Manajemen keamanan jaringan terhadap serangan ARP Spoofing DNS Spoofing dan Packet Sniffer', 'Bagja Septian', 'Ali Ahmadi S.T M.T', 'Amras Mauludin S.T M.T', 'Jaringan', '2019', 'aktif', 'published', 'Surat_Lamaran.pdf', '7.58'),
(3, 'Tracer Study Alumni Menggunakan Algoritma K-means', 'Febrianto Rahmadi.SKOM', 'Ali Ahmadi S.T M.T', 'Ali Ahmadi S.T M.T', 'Management Data', '2019', 'aktif', 'unpublish', 'transkip.pdf', '2048'),
(5, 'Aplikasi Booking Online', 'Ramdhany Febriansyah.Skom', 'Ali Ahmadi S.T M.T', 'Amras Mauludin S.T M.T', 'Management Data', '2019', 'lulus', 'unpublish', 'Ijazah2.pdf', '766.31'),
(6, 'Manajement Keamanan Jaringan', 'Fachri Arief Rachman Agustian.Skom', 'Ali Ahmadi S.T M.T', 'Ali Ahmadi S.T M.T', 'Security', '2019', 'lulus', 'unpublish', 'CV.pdf', '4389.33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(3) NOT NULL,
  `id_user` int(4) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_induk` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `konsentrasi` varchar(50) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nomor_induk`, `jenis_kelamin`, `telepon`, `email`, `konsentrasi`, `angkatan`, `jabatan`, `status`, `foto`, `level`, `username`, `password`) VALUES
(1, 'Admin', '', 'Laki-Laki', '087856435421', 'admin@example.com', '', '', '', '', 'admin.png', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'Bagja Septian', '41155050160039', 'Laki-Laki', '089767263627', 'bagja@gmail.com', 'Management Data', '2016', 'Mahasiswa', 'tidak aktif', 'IMG_1072.JPG', 'mahasiswa', '41155050160039', '76bc5640b8b4880ef040b383bd712946'),
(6, 'Ali Ahmadi S.T M.T', '456346654', 'Laki-Laki', '08729374738', 'ali@gmail.com', NULL, NULL, 'Dosen', 'belum aktif', 'IMG_1176.JPG', 'dosen', '456346654', 'ee23ad4a75e016274e955dc5fd6a9c5e'),
(7, 'Amras Mauludin S.T M.T', '4765382638', 'Laki-Laki', '087652773654', 'test@email.com', NULL, NULL, 'Dosen', 'aktif', 'IMG_1149.JPG', 'dosen', '4765382638', '325e9971a70b2036d7bdcef20c1ff28a'),
(8, 'Serghi Apriyatna', '41155050160028', 'Laki-Laki', '082376263445', 'sergi@gmail.com', 'Management Data', '2016', 'Mahasiswa', 'aktif', 'IMG_1170.JPG', 'mahasiswa', '41155050160028', 'eb17c96c335b11b8a53a4fea4b1609a0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_category`
--

CREATE TABLE `users_category` (
  `id` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_category`
--

INSERT INTO `users_category` (`id`, `kategori`) VALUES
(2, 'Admin'),
(3, 'Dosen'),
(4, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kartubimbingan`
--
ALTER TABLE `kartubimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_category`
--
ALTER TABLE `users_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kartubimbingan`
--
ALTER TABLE `kartubimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users_category`
--
ALTER TABLE `users_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
