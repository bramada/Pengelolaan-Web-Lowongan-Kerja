-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 06:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokerbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbautonumb`
--

CREATE TABLE `tbautonumb` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbautonumb`
--

INSERT INTO `tbautonumb` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 238, 1, 'IDUSER'),
(2, '22', 17, 1, 'IDPEG'),
(3, '0', 101, 1, 'PELAMAR'),
(4, '69125', 168, 1, 'IDFILE'),
(5, '01', 28, 1, 'PERUSAHAAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbfeedback`
--

CREATE TABLE `tbfeedback` (
  `IDFEDBACK` int(11) NOT NULL,
  `IDPELAMAR` int(11) NOT NULL,
  `IDLAMARAN` int(11) NOT NULL,
  `FEEDBACK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfeedback`
--

INSERT INTO `tbfeedback` (`IDFEDBACK`, `IDPELAMAR`, `IDLAMARAN`, `FEEDBACK`) VALUES
(1, 2019027, 90, 'langsung interview'),
(2, 2019030, 92, 'Menunggu'),
(3, 2019030, 96, 'Lamaran anda sudah kami lihat, silakan datang interview'),
(4, 2019028, 98, 'Silakan datang interview'),
(5, 2019027, 99, 'Menunggu'),
(6, 2019029, 100, 'Menunggu'),
(7, 2019027, 101, 'silakang datang interview langsung');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `IDKATEGORI` int(11) NOT NULL,
  `KATEGORI` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`IDKATEGORI`, `KATEGORI`) VALUES
(10, 'Teknologi'),
(11, 'Manager'),
(12, 'Engineer'),
(13, 'IT'),
(14, 'Engineer Sipil'),
(15, 'HRD'),
(23, 'Sales'),
(24, 'Banking'),
(25, 'Keuangan'),
(27, 'Digital Marketing'),
(28, 'Pelayaran'),
(29, 'Jasa');

-- --------------------------------------------------------

--
-- Table structure for table `tblamaran`
--

CREATE TABLE `tblamaran` (
  `IDLAMARAN` int(11) NOT NULL,
  `IDPERUSAHAAN` int(11) NOT NULL,
  `IDPEKERJAAN` int(11) NOT NULL,
  `IDPELAMAR` int(11) NOT NULL,
  `PELAMAR` varchar(90) NOT NULL,
  `TGL_MELAMAR` date NOT NULL,
  `TANGGAPAN` varchar(255) NOT NULL DEFAULT 'Pending',
  `IDFILE` int(11) NOT NULL,
  `HVIEW` tinyint(1) NOT NULL DEFAULT '1',
  `HPRINT` tinyint(1) NOT NULL,
  `MENUNGGU` tinyint(1) NOT NULL,
  `WAKTU_DISETUJUI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblamaran`
--

INSERT INTO `tblamaran` (`IDLAMARAN`, `IDPERUSAHAAN`, `IDPEKERJAAN`, `IDPELAMAR`, `PELAMAR`, `TGL_MELAMAR`, `TANGGAPAN`, `IDFILE`, `HVIEW`, `HPRINT`, `MENUNGGU`, `WAKTU_DISETUJUI`) VALUES
(90, 20190102, 11, 2019027, 'budi ono', '2019-08-04', 'langsung interview', 2147483647, 1, 1, 0, '2019-09-04 16:27:26'),
(92, 20190102, 11, 2019030, 'jompret oke', '2019-08-04', 'Menunggu', 2147483647, 0, 0, 1, '2019-08-04 17:27:00'),
(96, 20190101, 12, 2019030, 'jompret oke', '2019-08-04', 'Lamaran anda sudah kami lihat, silakan datang interview', 2147483647, 1, 1, 0, '2019-08-01 15:09:39'),
(98, 20190101, 13, 2019028, 'agus gas', '2019-08-06', 'Silakan datang interview', 2147483647, 1, 1, 0, '2019-09-04 02:50:40'),
(99, 20190101, 14, 2019027, 'budi ono', '2019-08-06', 'Menunggu', 2147483647, 0, 0, 1, '2019-09-04 15:35:00'),
(100, 20190101, 13, 2019029, 'nugroho wah', '2019-08-06', 'silakan interview', 2147483647, 0, 0, 0, '2019-09-04 16:48:56'),
(101, 20190102, 22, 2019027, 'budi songo', '2019-08-26', 'silakang datang interview langsung', 2147483647, 1, 1, 0, '2019-08-26 09:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblampiran`
--

CREATE TABLE `tblampiran` (
  `IDFILE` int(11) NOT NULL,
  `IDPEKERJAAN` int(11) NOT NULL,
  `NAMA_FILE` varchar(90) NOT NULL,
  `LOKASI_FILE` varchar(255) NOT NULL,
  `IDLAMPIRANUSER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblampiran`
--

INSERT INTO `tblampiran` (`IDFILE`, `IDPEKERJAAN`, `NAMA_FILE`, `LOKASI_FILE`, `IDLAMPIRANUSER`) VALUES
(2147483647, 20, 'Resume', 'photos/10082019084354fauzi.jpg', 2019096);

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `IDPEGAWAI` varchar(30) NOT NULL,
  `NAMAD` varchar(50) NOT NULL,
  `NAMAT` varchar(50) NOT NULL,
  `NAMAB` varchar(50) NOT NULL,
  `ALAMAT` varchar(90) NOT NULL,
  `JENIS_KELAMIN` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `TGL_LAHIR` date NOT NULL,
  `TMP_LAHIR` varchar(90) NOT NULL,
  `USIA` int(11) NOT NULL,
  `PEG_EMAIL` varchar(90) NOT NULL,
  `TELP` varchar(40) NOT NULL,
  `TGL_KERJA` date NOT NULL,
  `IDPERUSAHAAN` int(11) NOT NULL,
  `BIDANG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`IDPEGAWAI`, `NAMAD`, `NAMAT`, `NAMAB`, `ALAMAT`, `JENIS_KELAMIN`, `STATUS`, `TGL_LAHIR`, `TMP_LAHIR`, `USIA`, `PEG_EMAIL`, `TELP`, `TGL_KERJA`, `IDPERUSAHAAN`, `BIDANG`) VALUES
('20192215', 'agus', 'hakim', 'nur', 'Lalilur', 'Laki-laki', 'Belum Menikah', '1991-11-17', 'magetan', 27, 'Agus@yahoo.con', '08956435353', '2060-07-25', 20190101, 'Programer'),
('20192216', 'zam', 'n', 'hariyadi', 'juwiring, klaten', 'Perempuan', 'Belum Menikah', '1988-11-17', 'area51', 30, 'bradausa77@gmail.com', '08123435466', '2060-07-25', 20190101, 'Pasang Kabel');

-- --------------------------------------------------------

--
-- Table structure for table `tbpekerjaan`
--

CREATE TABLE `tbpekerjaan` (
  `IDPEKERJAAN` int(11) NOT NULL,
  `IDPERUSAHAAN` int(11) NOT NULL,
  `IDKATEGORI` int(11) DEFAULT NULL,
  `KATEGORI` varchar(90) NOT NULL,
  `BIDANG` varchar(90) NOT NULL,
  `JML_BTH_PEGAWAI` int(11) NOT NULL,
  `GAJI` double NOT NULL,
  `LAMA_KERJA` varchar(90) NOT NULL,
  `PENGALAMAN_KERJA` text NOT NULL,
  `DESKRIPSI_KERJA` text NOT NULL,
  `JENIS_KELAMIN` varchar(30) NOT NULL,
  `LOWONG` text NOT NULL,
  `STATUS_PEKERJAAN` varchar(90) NOT NULL,
  `WAKTU_POST` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpekerjaan`
--

INSERT INTO `tbpekerjaan` (`IDPEKERJAAN`, `IDPERUSAHAAN`, `IDKATEGORI`, `KATEGORI`, `BIDANG`, `JML_BTH_PEGAWAI`, `GAJI`, `LAMA_KERJA`, `PENGALAMAN_KERJA`, `DESKRIPSI_KERJA`, `JENIS_KELAMIN`, `LOWONG`, `STATUS_PEKERJAAN`, `WAKTU_POST`) VALUES
(11, 20190102, 11, 'Manager', 'Industri', 3, 8000000, '2 tahun', '1 tahun', 'Harus pintar dan kreatif, gigih dan giat bekerja', 'Laki-laki', 'Ada', '', '2019-07-22 18:08:00'),
(12, 20190101, 13, 'IT', 'Pasang Kabel', 2, 2000000, '1 tahun', '1 tahun kerja di bidang sesuai', 'Agak tampan', 'Perempuan', 'Kabel UTP', '', '2019-07-22 18:10:00'),
(13, 20190101, 10, 'Teknologi', 'Programer', 2, 2000000, '1 tahun', 'bebas', 'harus bisa dibawah tekanan', 'Laki-laki', 'sektor IT, dibawah pimpinan EDP', '', '2019-08-05 18:43:00'),
(14, 20190101, 15, '15', 'Management Pegawai', 1, 3000000, '1 tahun', 'Minimal ada pengalaman HRD', 'Harus disiplin', 'Laki-laki', '-', '', '2019-08-05 18:50:00'),
(15, 20190101, 25, 'Keuangan', 'Akuntan', 1, 4000000, '1 tahun', '-', 'Pintar', 'Perempuan', '-', '', '2019-08-05 18:53:00'),
(16, 20190103, 12, 'Engineer', 'Electrical Engineer', 2, 4000000, '2 tahun', 'Kita training', 'Semangat', 'Laki-laki', '-', '', '2019-08-05 18:57:00'),
(17, 20190103, 12, 'Engineer', 'Computer Engineer', 1, 5000000, '2 tahun', 'Kita Training', 'Penuh Semangat, pekerja keras', 'Laki-laki', '123', '', '2019-08-05 18:58:00'),
(18, 20190103, 14, 'Engineer Sipil', 'Mechanical Enginering', 1, 3500000, '6 bulan', 'bebas', 'oke', 'Laki-laki', 'permesinan', '', '2019-08-05 19:00:00'),
(19, 20190103, 23, 'Sales', 'Penjualan produk', 5, 2500000, '1 tahun', 'pernah nyales', 'mampu kerja lapangan', 'Perempuan', 'spg', '', '2019-08-05 19:02:00'),
(20, 20190103, 27, 'Digital Marketing', 'Admin Web', 1, 2000000, '1 tahun', '-', 'mampu mengoperasikan komputer & internet', 'Perempuan', 'tidak ada', '', '2019-08-05 19:02:00'),
(21, 20190103, 29, 'Jasa', 'Jasa Distributor', 3, 2500000, '1 tahun', '', 'Kuat', 'Laki-laki', '', '', '2019-08-05 19:03:00'),
(22, 20190102, 24, 'Banking', 'Teller', 3, 4000000, '1 tahun', '1 tahun', 'cakap dan penampilan ok', 'Perempuan', 'dibawah manager', '', '2019-08-05 19:05:00'),
(23, 20190102, 25, 'Keuangan', 'Akuntan pajak', 2, 3500000, '1 tahun', '1 tahun dibidang perpajakan', 'pintar, teliti dan kreatif', 'Perempuan', '', '', '2019-08-05 19:06:00'),
(24, 20190102, 11, 'Manager', 'Pimpinan', 1, 6000000, '2 tahun', '3 tahun', 'Smart', 'Laki-laki', '', '', '2019-08-05 19:39:00'),
(25, 20190102, 11, 'Manager', 'Manager Pemasaran', 1, 5500000, '2 tahun', '3 tahun', 'Pintar', 'Perempuan', '', '', '2019-08-05 19:47:00'),
(26, 20190101, 13, 'IT', 'Kepala IT', 1, 3000000, '1 tahun', '1 tahun', 'kreatif', 'Laki-laki', '', '', '2019-08-08 11:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelamar`
--

CREATE TABLE `tbpelamar` (
  `IDPELAMAR` int(11) NOT NULL,
  `IDKATEGORI` int(11) NOT NULL,
  `NAMAD` varchar(90) NOT NULL,
  `NAMAT` varchar(90) NOT NULL,
  `NAMAB` varchar(90) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(11) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `TGL_LAHIR` date NOT NULL,
  `TMP_LAHIR` varchar(255) NOT NULL,
  `USIA` int(2) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `EMAIL` varchar(90) NOT NULL,
  `TELP` varchar(90) NOT NULL,
  `GELAR` text NOT NULL,
  `FOTO_PELAMAR` varchar(255) NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `FOTO_KTP` varchar(255) NOT NULL,
  `STATUS_PELAMAR` int(1) NOT NULL,
  `FILE_PELAMAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpelamar`
--

INSERT INTO `tbpelamar` (`IDPELAMAR`, `IDKATEGORI`, `NAMAD`, `NAMAT`, `NAMAB`, `ALAMAT`, `JENIS_KELAMIN`, `STATUS`, `TGL_LAHIR`, `TMP_LAHIR`, `USIA`, `USERNAME`, `PASS`, `EMAIL`, `TELP`, `GELAR`, `FOTO_PELAMAR`, `NIK`, `FOTO_KTP`, `STATUS_PELAMAR`, `FILE_PELAMAR`) VALUES
(2019027, 11, 'budi', 'bwono', 'songo', 'Ngruki Rt 4 Rw 7, Cemani, Sukoharjo', 'Laki-laki', 'Menikah', '1990-11-17', 'kali', 28, 'budi', '83161a62f22277c65a6cdb7ebc314f218c376c63', 'bradausa77@gmail.com', '085837373885', 's2', 'photos/yuda.png', '33333484884499949', 'fauzi.jpg', 1, 'file/CV.pdf'),
(2019028, 10, 'agus', 'ali', 'ando', 'mojosongo, Boyolali', 'Laki-laki', 'Belum Menikah', '1981-11-17', 'adoh', 37, 'agus', '0525885565bb6a150db63f19bf42f11bd2db4702', 'Agus@yahoo.con', '081737644455', 'd3', 'photos/aaawinterfell.png', '333444555', 'pakcina.jpg', 0, 'file/CV.pdf'),
(2019029, 11, 'nugroho', 'wah', 'yoe', 'Laweyan, Surakarta', 'Laki-laki', 'Belum Menikah', '1991-11-17', 'simon', 27, 'wahyu', '3b7375a688b1820b016224646365e127de125ff0', 'wahnug@gmail.cok', '088574748833', 's1', 'photos/faiz.png', '22777388828889', 'fauzi.jpg', 1, 'file/CV.pdf'),
(2019030, 12, 'zamri', 'ardi', 'soleh', 'juwiring, klaten', 'Laki-laki', 'Belum Menikah', '1988-11-17', 'area51', 30, 'jompret', 'a19ff4f78037429def341005d39857d0cae0a415', 'bradausa77@gmail.com', '089373637333', 's1', 'photos/jundi.png', '111772722828', 'fauzi.jpg', 0, 'file/CV.pdf'),
(2019094, 13, 'Aldo', 'Hanudin', 'Fitra', 'Boyolali', 'Laki-laki', 'Belum Menikah', '1990-02-21', 'Boyolali', 29, 'aldo', '1c89c0f71ac97754ffc597c567d01b2ade0c9324', 'Aldo@gmail.com', '088129933829', 'S1 ', 'photos/noface.jpg', '', '', 1, 'file/CV.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbperusahaan`
--

CREATE TABLE `tbperusahaan` (
  `IDPERUSAHAAN` int(11) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(90) NOT NULL,
  `NIB` varchar(255) NOT NULL,
  `ALAMAT_PERUSAHAAN` varchar(90) NOT NULL,
  `KONTAK_PERUSAHAAN` varchar(30) NOT NULL,
  `EMAIL_PERUSAHAAN` varchar(30) NOT NULL,
  `STATUS_PERUSAHAAN` varchar(90) NOT NULL,
  `VISI_MISI` text NOT NULL,
  `USERNAMEP` varchar(90) NOT NULL,
  `PASSP` varchar(90) NOT NULL,
  `FOTOP` varchar(255) NOT NULL,
  `FILE_PERUSAHAAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbperusahaan`
--

INSERT INTO `tbperusahaan` (`IDPERUSAHAAN`, `NAMA_PERUSAHAAN`, `NIB`, `ALAMAT_PERUSAHAAN`, `KONTAK_PERUSAHAAN`, `EMAIL_PERUSAHAAN`, `STATUS_PERUSAHAAN`, `VISI_MISI`, `USERNAMEP`, `PASSP`, `FOTOP`, `FILE_PERUSAHAAN`) VALUES
(20190101, 'PT IND', '123456789', 'Karanganyar', '1023654', 'ind@mail.com', '1', 'maju jaya', 'ptind', 'f7d343fc1e246ebeb9aaa33b33efeeddcbea661c', 'photos/aa B.jpg', 'file/XFILE.pdf'),
(20190102, 'PT Sejahtera', '3545657', 'Surabarta', '035656', 'sj@mail.com', '1', 'makmur', 'sejahtera', '0ba3fd964c9ff9f420cf7879e71c0f86fb19815a', 'photos/noface.jpg', 'file/XFILE.pdf'),
(20190103, 'CV Langgeng', '35437467568', 'Sukoharjo', '23165', 'bradausa77@gmail.com', '1', 'langgang selalu jaya', 'langgeng', '14814d9b387acff3caec88ab0996df61291ff6c5', 'photos/noface.jpg', 'file/XFILE.pdf'),
(20190104, 'Maju Oke', '7474684', 'Klaten', '0625656899', 'maju@mail.com', '0', 'sukses', 'maju', 'f0dadef675dfa02df2d4880b412c8cf79308683b', 'photos/noface.jpg', 'file/XFILE.pdf'),
(20190127, 'KFC', '12345678', 'Jl Slamet Riyadi no 89', '0819283933', 'KFC@gmail.com', '0', 'Memperluas usaha, menguasai pasar', 'kfc', '2a2e21d434356f886c84371eebac6e44f1337fda', 'photos/kfc.png', 'file/XFILE.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `IDUSER` varchar(30) NOT NULL,
  `NAMA_LENGKAP` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `PERANAN` varchar(30) NOT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`IDUSER`, `NAMA_LENGKAP`, `USERNAME`, `PASS`, `PERANAN`, `FOTO`) VALUES
('0298314', 'Budiono', 'budi1', '83161a62f22277c65a6cdb7ebc314f218c376c63', 'Staff', ''),
('02983235', 'aldi yono', 'al', '2f9ee2b336682012cb445da6f3a0a52c68caf471', 'Administrator', ''),
('02983236', 'Mardoyo', 'doyo', '941bcf7b19510b718ad70ecb0adc4855b8cdd23b', 'Administrator', ''),
('02983237', 'Leny Cantika', 'leny', 'e80ba171bc8458f6c88b91a9f7791361623a2455', 'Staff', ''),
('20192215', 'agus nur', 'nur', '7f59e50e07ce6de53a766a7400ebe9ef0cca5063', 'Pegawai', ''),
('20192216', 'zam hariyadi', 'hariyadi', 'd19ae9b4a1036f9ac585abab197c3f00af5b66d2', 'Pegawai', ''),
('SUPERUSER', 'Bramada', 'brada', 'ba8130f90dcccb44cabdbd80d4d65c62be04d7d4', 'Administrator', 'photos/br2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbautonumb`
--
ALTER TABLE `tbautonumb`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indexes for table `tbfeedback`
--
ALTER TABLE `tbfeedback`
  ADD PRIMARY KEY (`IDFEDBACK`),
  ADD KEY `IDPELAMAR` (`IDPELAMAR`),
  ADD KEY `IDLAMARAN` (`IDLAMARAN`),
  ADD KEY `IDPELAMAR_2` (`IDPELAMAR`),
  ADD KEY `IDLAMARAN_2` (`IDLAMARAN`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`IDKATEGORI`);

--
-- Indexes for table `tblamaran`
--
ALTER TABLE `tblamaran`
  ADD PRIMARY KEY (`IDLAMARAN`),
  ADD KEY `IDPERUSAHAAN` (`IDPERUSAHAAN`),
  ADD KEY `IDPERUSAHAAN_2` (`IDPERUSAHAAN`),
  ADD KEY `IDPEKERJAAN` (`IDPEKERJAAN`),
  ADD KEY `IDPELAMAR` (`IDPELAMAR`);

--
-- Indexes for table `tblampiran`
--
ALTER TABLE `tblampiran`
  ADD PRIMARY KEY (`IDFILE`);

--
-- Indexes for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`IDPEGAWAI`) USING BTREE,
  ADD UNIQUE KEY `EMPLOYEEID` (`IDPEGAWAI`),
  ADD KEY `IDPERUSAHAAN` (`IDPERUSAHAAN`);

--
-- Indexes for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
  ADD PRIMARY KEY (`IDPEKERJAAN`),
  ADD KEY `IDKATEGORI` (`IDKATEGORI`),
  ADD KEY `IDPERUSAHAAN` (`IDPERUSAHAAN`);

--
-- Indexes for table `tbpelamar`
--
ALTER TABLE `tbpelamar`
  ADD PRIMARY KEY (`IDPELAMAR`),
  ADD KEY `IDKATEGORI` (`IDKATEGORI`);

--
-- Indexes for table `tbperusahaan`
--
ALTER TABLE `tbperusahaan`
  ADD PRIMARY KEY (`IDPERUSAHAAN`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`IDUSER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbautonumb`
--
ALTER TABLE `tbautonumb`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbfeedback`
--
ALTER TABLE `tbfeedback`
  MODIFY `IDFEDBACK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `IDKATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblamaran`
--
ALTER TABLE `tblamaran`
  MODIFY `IDLAMARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tblampiran`
--
ALTER TABLE `tblampiran`
  MODIFY `IDFILE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
  MODIFY `IDPEKERJAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbpelamar`
--
ALTER TABLE `tbpelamar`
  MODIFY `IDPELAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019095;

--
-- AUTO_INCREMENT for table `tbperusahaan`
--
ALTER TABLE `tbperusahaan`
  MODIFY `IDPERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20190128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfeedback`
--
ALTER TABLE `tbfeedback`
  ADD CONSTRAINT `tbfeedback_ibfk_1` FOREIGN KEY (`IDLAMARAN`) REFERENCES `tblamaran` (`IDLAMARAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbfeedback_ibfk_2` FOREIGN KEY (`IDPELAMAR`) REFERENCES `tbpelamar` (`IDPELAMAR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblamaran`
--
ALTER TABLE `tblamaran`
  ADD CONSTRAINT `tblamaran_ibfk_1` FOREIGN KEY (`IDPERUSAHAAN`) REFERENCES `tbperusahaan` (`IDPERUSAHAAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblamaran_ibfk_2` FOREIGN KEY (`IDPELAMAR`) REFERENCES `tbpelamar` (`IDPELAMAR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblamaran_ibfk_3` FOREIGN KEY (`IDPEKERJAAN`) REFERENCES `tbpekerjaan` (`IDPEKERJAAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD CONSTRAINT `tbpegawai_ibfk_1` FOREIGN KEY (`IDPERUSAHAAN`) REFERENCES `tbperusahaan` (`IDPERUSAHAAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
  ADD CONSTRAINT `tbpekerjaan_ibfk_1` FOREIGN KEY (`IDKATEGORI`) REFERENCES `tbkategori` (`IDKATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpekerjaan_ibfk_2` FOREIGN KEY (`IDPERUSAHAAN`) REFERENCES `tbperusahaan` (`IDPERUSAHAAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpelamar`
--
ALTER TABLE `tbpelamar`
  ADD CONSTRAINT `tbpelamar_ibfk_1` FOREIGN KEY (`IDKATEGORI`) REFERENCES `tbkategori` (`IDKATEGORI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
