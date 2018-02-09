-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 08:29 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ceklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceklist`
--

CREATE TABLE IF NOT EXISTS `ceklist` (
`ID_CEKLIST` int(11) NOT NULL,
  `ID_DATA_CEKLIST` int(11) DEFAULT NULL,
  `ID_SYARAT` int(11) DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ceklist`
--

INSERT INTO `ceklist` (`ID_CEKLIST`, `ID_DATA_CEKLIST`, `ID_SYARAT`, `STATUS`, `KETERANGAN`) VALUES
(1, 1, 1, 'Lengkap', ''),
(2, 1, 2, 'Lengkap', ''),
(3, 1, 3, 'Lengkap', ''),
(4, 1, 4, 'Lengkap', ''),
(5, 1, 5, 'Lengkap', ''),
(6, 1, 6, 'Lengkap', ''),
(7, 1, 7, 'Lengkap', ''),
(8, 1, 8, 'Kurang lengkap', ''),
(9, 1, 9, 'Tidak ada', ''),
(10, 2, 10, 'Lengkap', ''),
(11, 2, 11, 'Kurang lengkap', ''),
(12, 16, 19, 'Lengkap', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_ceklist`
--

CREATE TABLE IF NOT EXISTS `data_ceklist` (
`ID_DATA_CEKLIST` int(11) NOT NULL,
  `ID_KONTRAK` varchar(100) DEFAULT NULL,
  `NO_PEMBAYARAN` varchar(10) DEFAULT NULL,
  `PERIODE` varchar(100) DEFAULT NULL,
  `STATUS_PEKERJAAN` varchar(100) DEFAULT NULL,
  `TGL_ACC` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `data_ceklist`
--

INSERT INTO `data_ceklist` (`ID_DATA_CEKLIST`, `ID_KONTRAK`, `NO_PEMBAYARAN`, `PERIODE`, `STATUS_PEKERJAAN`, `TGL_ACC`) VALUES
(1, '0061.pj/HKM.03.01/dist-jatim/2015', '1', 'Desember 2015', 'Selesai', '2016-02-05'),
(2, '0088.pj/HKM.03.01/dist-jatim/2015', '1', 'Januari', 'Selesai', '2016-02-26'),
(16, '006.pj/HKM.03.01/dist-jatim/2015', '1', '1 Desember 2015-16 Januari 2016', 'Selesai', '2016-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE IF NOT EXISTS `kontrak` (
  `ID_KONTRAK` varchar(100) NOT NULL,
  `TGL_KONTRAK` date DEFAULT NULL,
  `PERIHAL` varchar(100) DEFAULT NULL,
  `PIHAK_KEDUA` varchar(100) DEFAULT NULL,
  `JENIS_PENAGIHAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`ID_KONTRAK`, `TGL_KONTRAK`, `PERIHAL`, `PIHAK_KEDUA`, `JENIS_PENAGIHAN`) VALUES
('006.pj/HKM.03.01/dist-jatim/2015', '2016-02-02', 'Pengadaan barang', 'PT kerjasama', 'Sekali Tagih'),
('0061.pj/HKM.03.01/dist-jatim/2015', '2015-09-01', 'Pemborongan Pekerjaan IT Support DIJ', 'PT Gintung Lintas Buana', 'Multi Years'),
('0088.pj/HKM.03.01/dist-jatim/2015', '2016-02-01', 'Pengadaan barang', 'PT Mandiri', 'Multi Years'),
('0099.pj/HKM.03.01/dist-jatim/2015', '2016-02-01', 'Pengadaan barang', 'PT kerjasama', 'Multi Years'),
('0678.pj/HKM.03.01/dist-jatim/2015', '2016-02-02', 'Pengadaan barang jasa', 'PT kerjasama', 'Multi Years');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_pembayaran`
--

CREATE TABLE IF NOT EXISTS `syarat_pembayaran` (
`ID_SYARAT` int(11) NOT NULL,
  `ID_KONTRAK` varchar(100) DEFAULT NULL,
  `LAMPIRAN` text,
  `KETERANGAN_SYARAT` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `syarat_pembayaran`
--

INSERT INTO `syarat_pembayaran` (`ID_SYARAT`, `ID_KONTRAK`, `LAMPIRAN`, `KETERANGAN_SYARAT`) VALUES
(1, '0061.pj/HKM.03.01/dist-jatim/2015', 'kuitansi', ''),
(2, '0061.pj/HKM.03.01/dist-jatim/2015', 'Faktur Pajak', 'Foto copy nomor pokok pajak(NPWP), bukti pengusaha kena pajak (PKP)'),
(3, '0061.pj/HKM.03.01/dist-jatim/2015', 'Berita acara serah terima pertama', 'Untuk pembayaran pertama'),
(4, '0061.pj/HKM.03.01/dist-jatim/2015', 'Berita acara penyelesaian pekerjaan', ''),
(5, '0061.pj/HKM.03.01/dist-jatim/2015', 'Copy rekapitulasi dan bukti pembayaran upah pekerja', ''),
(6, '0061.pj/HKM.03.01/dist-jatim/2015', 'Copy rekapitulasi dan bukti pembayaran Tunjangan hari raya', ''),
(7, '0061.pj/HKM.03.01/dist-jatim/2015', 'Copy rekapitulasi dan bukti penyetoran pengakhiran pekerja', 'Dari Bank Jatim/DPLK lainnya'),
(8, '0061.pj/HKM.03.01/dist-jatim/2015', 'Copy bukti/kartu kepersertaan pekerja Pihak Kedua pada BPJS ketenagakerjaan dan BPJS kesehatan', 'untuk tagihan pembayaran pertama'),
(9, '0061.pj/HKM.03.01/dist-jatim/2015', 'Copy bukti setor iuran Jamsostek pada BPJS ketenagakerjaan dan BPJS Kesehatan', ''),
(10, '0088.pj/HKM.03.01/dist-jatim/2015', 'Kuitansi', ''),
(11, '0088.pj/HKM.03.01/dist-jatim/2015', 'Berita Acara Penyelesaian', ''),
(17, '0099.pj/HKM.03.01/dist-jatim/2015', 'Kuitansi', 'Rangkap 2'),
(18, '0099.pj/HKM.03.01/dist-jatim/2015', 'Berita Acara', ''),
(19, '006.pj/HKM.03.01/dist-jatim/2015', 'Kuitansi', '');

-- --------------------------------------------------------

--
-- Table structure for table `umk`
--

CREATE TABLE IF NOT EXISTS `umk` (
`ID_UMK` int(11) NOT NULL,
  `NAMA_DAERAH` varchar(15) DEFAULT NULL,
  `UMK` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `umk`
--

INSERT INTO `umk` (`ID_UMK`, `NAMA_DAERAH`, `UMK`) VALUES
(1, 'Kota Surabaya', 3045000),
(2, 'Kab. Gresik', 3042500),
(3, 'Kab. Sidoarjo', 3040000),
(4, 'Kab. Mojokerto', 3030000),
(5, 'Kab. Pasuruan', 3037500),
(6, 'Kota Malang', 2099000),
(7, 'Kab. Bangkalan', 1414000);

-- --------------------------------------------------------

--
-- Table structure for table `upah_pekerja`
--

CREATE TABLE IF NOT EXISTS `upah_pekerja` (
`ID_UPAH` int(11) NOT NULL,
  `ID_KONTRAK` varchar(100) DEFAULT NULL,
  `UMK` int(11) DEFAULT NULL,
  `UPAH` int(11) DEFAULT NULL,
  `TUNJANGAN` int(11) DEFAULT NULL,
  `BPJS_KESEHATAN` int(11) NOT NULL,
  `JAMINAN_KEMATIAN` int(11) NOT NULL,
  `JAMINAN_HARI_TUA` int(11) NOT NULL,
  `JAMINAN_KECELAKAAN_KERJA` int(11) NOT NULL,
  `JAMINAN_PENSIUN` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `upah_pekerja`
--

INSERT INTO `upah_pekerja` (`ID_UPAH`, `ID_KONTRAK`, `UMK`, `UPAH`, `TUNJANGAN`, `BPJS_KESEHATAN`, `JAMINAN_KEMATIAN`, `JAMINAN_HARI_TUA`, `JAMINAN_KECELAKAAN_KERJA`, `JAMINAN_PENSIUN`) VALUES
(1, '0061.pj/HKM.03.01/dist-jatim/2015', 3045000, 3349500, 30450, 121800, 9135, 112665, 7308, 60900),
(2, '0088.pj/HKM.03.01/dist-jatim/2015', 3045000, 3349500, 30450, 121800, 9135, 112665, 7308, 60900),
(5, '0099.pj/HKM.03.01/dist-jatim/2015', 2099000, 2308900, 20990, 83960, 6297, 77663, 5038, 41980),
(6, '0099.pj/HKM.03.01/dist-jatim/2015', 3042500, 3346750, 30425, 121700, 9128, 112573, 0, 45638);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NIP` varchar(100) NOT NULL,
  `NAMA_USER` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `HAK_AKSES` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `NAMA_USER`, `PASSWORD`, `HAK_AKSES`) VALUES
('130411100013', 'Pramudya Saga', '328b6047c62d4de24eb547db647094df', 'Petugas Ceklist'),
('130411100047', 'R Siti Isnaniyah', '3d1c3481dd9ce3d7e31f3bee188cee35', 'Admin'),
('130411100056', 'Diana Aria', 'f97de4a9986d216a6e0fea62b0450da9', 'Pengawas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceklist`
--
ALTER TABLE `ceklist`
 ADD PRIMARY KEY (`ID_CEKLIST`), ADD KEY `ID_SYARAT` (`ID_SYARAT`), ADD KEY `ID_DATA_CEKLIST` (`ID_DATA_CEKLIST`);

--
-- Indexes for table `data_ceklist`
--
ALTER TABLE `data_ceklist`
 ADD PRIMARY KEY (`ID_DATA_CEKLIST`), ADD KEY `ID_KONTRAK` (`ID_KONTRAK`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
 ADD PRIMARY KEY (`ID_KONTRAK`);

--
-- Indexes for table `syarat_pembayaran`
--
ALTER TABLE `syarat_pembayaran`
 ADD PRIMARY KEY (`ID_SYARAT`), ADD KEY `ID_KONTRAK` (`ID_KONTRAK`);

--
-- Indexes for table `umk`
--
ALTER TABLE `umk`
 ADD PRIMARY KEY (`ID_UMK`);

--
-- Indexes for table `upah_pekerja`
--
ALTER TABLE `upah_pekerja`
 ADD PRIMARY KEY (`ID_UPAH`), ADD KEY `ID_UMK` (`UMK`), ADD KEY `ID_KONTRAK` (`ID_KONTRAK`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceklist`
--
ALTER TABLE `ceklist`
MODIFY `ID_CEKLIST` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `data_ceklist`
--
ALTER TABLE `data_ceklist`
MODIFY `ID_DATA_CEKLIST` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `syarat_pembayaran`
--
ALTER TABLE `syarat_pembayaran`
MODIFY `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `umk`
--
ALTER TABLE `umk`
MODIFY `ID_UMK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `upah_pekerja`
--
ALTER TABLE `upah_pekerja`
MODIFY `ID_UPAH` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ceklist`
--
ALTER TABLE `ceklist`
ADD CONSTRAINT `ceklist_ibfk_1` FOREIGN KEY (`ID_SYARAT`) REFERENCES `syarat_pembayaran` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ceklist_ibfk_2` FOREIGN KEY (`ID_DATA_CEKLIST`) REFERENCES `data_ceklist` (`ID_DATA_CEKLIST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_ceklist`
--
ALTER TABLE `data_ceklist`
ADD CONSTRAINT `data_ceklist_ibfk_1` FOREIGN KEY (`ID_KONTRAK`) REFERENCES `kontrak` (`ID_KONTRAK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syarat_pembayaran`
--
ALTER TABLE `syarat_pembayaran`
ADD CONSTRAINT `syarat_pembayaran_ibfk_1` FOREIGN KEY (`ID_KONTRAK`) REFERENCES `kontrak` (`ID_KONTRAK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upah_pekerja`
--
ALTER TABLE `upah_pekerja`
ADD CONSTRAINT `upah_pekerja_ibfk_1` FOREIGN KEY (`ID_KONTRAK`) REFERENCES `kontrak` (`ID_KONTRAK`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
