-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 09:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-kemahasiswaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `strata` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `yudisium_ke` varchar(255) NOT NULL,
  `no_ijazah` varchar(255) NOT NULL,
  `file_ijazah` varchar(255) NOT NULL,
  `no_seri_transkrip` varchar(255) NOT NULL,
  `file_transkrip` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `waktu_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_pengguna`, `nim`, `nama_mahasiswa`, `prodi`, `strata`, `tahun_lulus`, `yudisium_ke`, `no_ijazah`, `file_ijazah`, `no_seri_transkrip`, `file_transkrip`, `no_hp`, `alamat`, `waktu_buat`) VALUES
(1, 4, '123', '123', 'Sistem Informasi', '', 0000, '', '', '', '', '', '11111', '123', '2018-11-27 01:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_ormawa`
--

CREATE TABLE `kegiatan_ormawa` (
  `id_kegiatan` int(11) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `lokasi_kegiatan` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `jumlah_dana` int(11) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `keterangan_kesalahan` text NOT NULL,
  `status_proposal` varchar(255) NOT NULL,
  `file_spjlpj` varchar(255) NOT NULL,
  `kesalahan_spjlpj` varchar(255) NOT NULL,
  `status_spjlpj` varchar(255) NOT NULL,
  `keterangan_kegiatan` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `biaya_dari_keuangan` int(11) NOT NULL,
  `waktu_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_ormawa`
--

INSERT INTO `kegiatan_ormawa` (`id_kegiatan`, `id_ormawa`, `nama_kegiatan`, `lokasi_kegiatan`, `tanggal_kegiatan`, `jumlah_peserta`, `jumlah_dana`, `lampiran`, `keterangan_kesalahan`, `status_proposal`, `file_spjlpj`, `kesalahan_spjlpj`, `status_spjlpj`, `keterangan_kegiatan`, `tanggal_pelaksanaan`, `biaya_dari_keuangan`, `waktu_buat`) VALUES
(2, 1, '1', '1', '0001-01-01', 1, 1, '190243-ID-sistem-pendukung-keputusan-pemilihan-jur.pdf', '1111', 'Valid', 'ISO_9001-2008_Certificate(1).pdf', 'asdasdasd', 'Valid', 'aaa', '2018-11-29', 5000000, '2018-11-27 06:41:27'),
(4, 1, '123', '113', '0123-12-03', 1231, 23, 'DAFTAR_JALAN_PEMERINTAH_KOTA_LUBUKLINGGAU.pdf', '', 'Valid', 'dt_custom_pdf.pdf', '', 'Valid', '', '2019-01-01', 10000000, '2018-11-27 07:07:06'),
(5, 1, 'qqq', 'qqqq', '2018-11-27', 0, 1111, '1111.pdf', '', 'Ditolak', '', '', 'Belum Diupload', '', '0000-00-00', 0, '2018-11-27 21:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `ormawa`
--

CREATE TABLE `ormawa` (
  `id_ormawa` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_ormawa` varchar(255) NOT NULL,
  `ketua_organisasi` varchar(255) NOT NULL,
  `wakil_ketua` varchar(255) NOT NULL,
  `profil_organisasi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ormawa`
--

INSERT INTO `ormawa` (`id_ormawa`, `id_pengguna`, `nama_ormawa`, `ketua_organisasi`, `wakil_ketua`, `profil_organisasi`, `email`, `no_hp`) VALUES
(1, 3, 'bem', 'ccc', 'bem', 'bem', 'bem@gmail.com', 'bem');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `foto`, `thumbnail`, `level`) VALUES
(1, 'admin', '$2y$10$mgpxB9rDeXLkSp8l4efOYOs7Uda7E6KWzAwk/hiLK7aJGDYCo.Rte', '', '', 1),
(2, 'kasubbag', '$2y$10$whbWzPEMb11O6eWARjWwf.6swHysqXO.0sLvwsdGDnQfqPK/Plj6.', '', '', 4),
(3, 'bem', '$2y$10$C0gT3KrMhkgavkto12dMRudVRlxXeUmRvnSx2u.wSOTf8Y.Ufafpy', '', '', 2),
(4, '123', '$2y$10$2yCdyDANwxkRsehbGBa3w.muSIzjhlR0PORxOGGtYt.X2Awj6NNSa', '', '', 3),
(5, 'kajur_si', '$2y$10$JzuceIUPvq4ixf2eyfBT5.ZeJ50iVLLRsEMTY6Q2OueV3aWbgSKbG', '', '', 5),
(6, 'kajur_sk', '$2y$10$dVr5H7TIPZlKAXdqI6aRne8KW3eg949uw3MN7KQxnbHtuNTsEckzC', '', '', 5),
(7, 'kajur_ti', '$2y$10$TWE8ruxZD5HTccj5s6a0P.XAF756U.UyRulldym5LR6gdd5iILUHm', '', '', 5),
(8, 'wd3', '$2y$10$N/zrpq.b196pQPSclXUnZubOqwDumx1I51yiHn512lxsbE3ikB.0K', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_legalisir`
--

CREATE TABLE `riwayat_legalisir` (
  `id_legalisir` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `jumlah_ijazah` int(11) NOT NULL,
  `jumlah_transkrip` int(11) NOT NULL,
  `status_legalisir` varchar(255) NOT NULL,
  `waktu_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_legalisir`
--

INSERT INTO `riwayat_legalisir` (`id_legalisir`, `id_alumni`, `jumlah_ijazah`, `jumlah_transkrip`, `status_legalisir`, `waktu_buat`) VALUES
(4, 1, 7, 7, 'Tidak Memenuhi Syarat', '2018-11-28 08:31:13'),
(6, 1, 1, 1, 'Tidak Memenuhi Syarat', '2018-11-29 16:19:11'),
(7, 1, 3, 4, 'Selesai', '2018-11-30 20:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `bulan_bekerja` int(11) NOT NULL,
  `tahun_bekerja` year(4) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `waktu_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kegiatan_ormawa`
--
ALTER TABLE `kegiatan_ormawa`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_ormawa` (`id_ormawa`);

--
-- Indexes for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`id_ormawa`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `riwayat_legalisir`
--
ALTER TABLE `riwayat_legalisir`
  ADD PRIMARY KEY (`id_legalisir`),
  ADD KEY `id_alumni` (`id_alumni`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_alumni` (`id_alumni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kegiatan_ormawa`
--
ALTER TABLE `kegiatan_ormawa`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ormawa`
--
ALTER TABLE `ormawa`
  MODIFY `id_ormawa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `riwayat_legalisir`
--
ALTER TABLE `riwayat_legalisir`
  MODIFY `id_legalisir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan_ormawa`
--
ALTER TABLE `kegiatan_ormawa`
  ADD CONSTRAINT `kegiatan_ormawa_ibfk_1` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`id_ormawa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD CONSTRAINT `ormawa_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_legalisir`
--
ALTER TABLE `riwayat_legalisir`
  ADD CONSTRAINT `riwayat_legalisir_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
