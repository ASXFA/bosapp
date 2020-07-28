-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2020 at 07:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id` int(11) NOT NULL,
  `id_from` int(3) NOT NULL,
  `id_to` int(3) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_bimbingan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `id_from`, `id_to`, `subject`, `keterangan`, `tgl_bimbingan`, `file_name`, `file_size`, `status`) VALUES
(2, 8, 7, 'Bimbingan BAB 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', '2020-07-23 10:45:57', 'Surat_Lamaran1.docx', '14.01', '1'),
(5, 7, 8, 'Bimbingan BAB 1 Revisi', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-07-23 15:40:41', 'transkip.pdf', '1128.04', '1'),
(6, 8, 7, 'Bimbingan BAB 1 Revisi 1', 'ini pak mangga mamam', '2020-07-23 16:51:18', 'transkip1.pdf', '1128.04', '1'),
(7, 7, 8, 'Bimbingan BAB 1 Revisi 1', 'mangga mamam balikk', '2020-07-23 17:32:42', 'CV_Fachri_agustian.pdf', '136.2', '1'),
(8, 8, 7, 'Bimbingan BAB 1 Revisi 2', 'mamam deui hahay', '2020-07-23 17:45:03', 'CV.pdf', '4389.33', '1'),
(9, 7, 8, 'Bimbingan BAB 1 Revisi 2', 'hahay', '2020-07-23 17:46:12', 'CV1.pdf', '4389.33', '1'),
(10, 8, 7, 'Bimbingan BAB 1 Revisi 3', 'testing', '2020-07-23 17:48:25', 'Ijazah.pdf', '766.31', '1'),
(11, 7, 8, 'Bimbingan BAB 1 Revisi 3', 'podol', '2020-07-23 17:51:45', 'Ijazah1.pdf', '766.31', '1'),
(12, 8, 7, 'Bimbingan BAB 1 Revisi 4', 'Aku tolol', '2020-07-23 18:19:47', 'Surat_Lamaran_and_CV.pdf', '1083.81', '1'),
(13, 7, 8, 'Bimbingan BAB 1 Revisi 4', 'emang', '2020-07-23 18:44:06', 'Surat_Lamaran_and_CV1.pdf', '1083.81', '0'),
(14, 8, 6, 'Bimbingan BAB 1', 'halooo', '2020-07-23 19:34:14', 'CV.pdf', '4389.33', '1'),
(25, 6, 8, 'Bimbingan BAB 1 Revisi 1', 'ya silahkan revisi', '2020-07-27 15:23:50', 'Surat_Lamaran1.docx', '14.01', '1'),
(26, 6, 8, 'Bimbingan BAB 1 Revisi 1', 'jangan lupa di bagian tujuan dibenarkan juga', '2020-07-27 15:24:42', '', '', '1'),
(27, 8, 6, 'Bimbingan BAB 1 Revisi 2', 'ini sudah pak ', '2020-07-27 16:38:06', 'fotoktp.pdf', '530.73', '1'),
(28, 6, 8, 'Bimbingan BAB 1 (ACC)', 'silahkan lanjut ke BAB 2', '2020-07-27 16:39:23', '', '', '1'),
(29, 8, 6, 'Bimbingan BAB 2', 'ini pak silahkan di review', '2020-07-27 16:43:02', 'CV2.pdf', '4389.33', '0'),
(30, 5, 6, 'Bimbingan BAB 1', 'silahakan di review pak', '2020-07-27 17:00:23', 'Ijazah1.pdf', '766.31', '1'),
(31, 6, 5, 'Bimbingan BAB 1', 'silahkan revisi sesuai koreksi saya yang ada di file', '2020-07-27 17:01:06', 'Ijazah2.pdf', '766.31', '1'),
(32, 5, 6, 'Bimbingan BAB 1 Revisi 1', 'sudah pak, silahkan direview lagi', '2020-07-27 17:02:06', 'Surat_Lamaran.docx', '14.01', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_skripsi`
--

CREATE TABLE `kategori_skripsi` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_skripsi`
--

INSERT INTO `kategori_skripsi` (`id`, `nama`) VALUES
(2, 'Management Data'),
(3, 'Security'),
(4, 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
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
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id`, `judul`, `mahasiswa`, `dospem1`, `dospem2`, `kategoriskripsi`, `tahun`, `status_mahasiswa`, `status_skripsi`, `file`, `file_size`) VALUES
(5, 'Aplikasi Booking Online', 'Ramdhany Febriansyah.Skom', 'Ali Ahmadi S.T M.T', 'Amras Mauludin S.T M.T', 'Management Data', '2019', 'lulus', 'published', 'Ijazah2.pdf', '766.31'),
(6, 'Manajement Keamanan Jaringan', 'Fachri Arief Rachman Agustian.Skom', 'Ali Ahmadi S.T M.T', 'Ali Ahmadi S.T M.T', 'Security', '2019', 'lulus', 'published', 'CV.pdf', '4389.33'),
(7, 'Bimbingan Skripsi Online Menggunakan Metode User Center Design', '8', '7', '6', 'Management Data', '2020', 'aktif', 'published', 'CV.pdf', '4389.33'),
(8, 'Study Tracer Alumni Menggunakan Metode K-means', '5', '6', '7', 'Management Data', '2020', 'aktif', 'published', 'transkip.pdf', '1128.04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
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
-- Table structure for table `users`
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
  `aturan` text,
  `status` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nomor_induk`, `jenis_kelamin`, `telepon`, `email`, `konsentrasi`, `angkatan`, `jabatan`, `aturan`, `status`, `foto`, `level`, `username`, `password`) VALUES
(1, 'Admin', '', 'Laki-Laki', '087856435421', 'admin@example.com', '', '', '', '', '', 'admin.png', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'Bagja Septian', '41155050160039', 'Laki-Laki', '089767263627', 'bagja@gmail.com', 'Management Data', '2016', 'Mahasiswa', '', 'aktif', 'IMG_1072.JPG', 'mahasiswa', '41155050160039', '76bc5640b8b4880ef040b383bd712946'),
(6, 'Ali Ahmadi S.T M.T', '456346654', 'Perempuan', '08729374738', 'ali@gmail.com', NULL, NULL, '', '<ol><li>Berkas harus per-bab</li><li>Tidak boleh menghubungi setelah pukul 20.00 Wib</li><li>subject jangan diubah bila belum ACC</li><li>file tidak boleh lebih dari 5mb</li><li>Revisi harus diberikan max 5hari setelah saya review</li></ol>', 'aktif', 'IMG_0371A.jpg', 'dosen', '456346654', 'ee23ad4a75e016274e955dc5fd6a9c5e'),
(7, 'Amras Mauludin S.T M.T', '4765382638', 'Laki-Laki', '087652773654', 'test@email.com', NULL, NULL, 'Dosen', '', 'aktif', 'IMG_1149.JPG', 'dosen', '4765382638', '325e9971a70b2036d7bdcef20c1ff28a'),
(8, 'Serghi Apriyatna', '41155050160028', 'Laki-Laki', '082376263445', 'sergi@gmail.com', 'Management Data', '2016', 'Mahasiswa', '', 'aktif', 'IMG_1170.JPG', 'mahasiswa', '41155050160028', 'eb17c96c335b11b8a53a4fea4b1609a0');

-- --------------------------------------------------------

--
-- Table structure for table `users_category`
--

CREATE TABLE `users_category` (
  `id` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_category`
--

INSERT INTO `users_category` (`id`, `kategori`) VALUES
(2, 'Admin'),
(3, 'Dosen'),
(4, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_category`
--
ALTER TABLE `users_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_category`
--
ALTER TABLE `users_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
