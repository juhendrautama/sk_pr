-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 08:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(7) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tgl` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `user`, `pass`, `alamat`, `no_tlpn`, `status`, `tgl`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, '081371', '1', '2021-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pesanan`
--

CREATE TABLE `tbl_detail_pesanan` (
  `id_detail_pesanan` int(7) NOT NULL,
  `id_pelanggan` int(7) DEFAULT NULL,
  `id_produk` int(7) DEFAULT NULL,
  `kode_pesanan` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah_pesanan` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pesanan`
--

INSERT INTO `tbl_detail_pesanan` (`id_detail_pesanan`, `id_pelanggan`, `id_produk`, `kode_pesanan`, `nama_produk`, `jumlah_pesanan`, `harga`, `tgl`, `status`) VALUES
(90, 2, 11, '202204022001', 'Sakura Truss White Gold 75.75', '15', '125000', '2022-04-02', 'O'),
(91, 2, 12, '202204022001', 'Kanal Taso C75.75 - 6m', '10', '121000', '2022-04-02', 'O'),
(92, 2, 13, '202204022001', 'Reng Taso 32.45 - 6m', '20', '57000', '2022-04-02', 'O'),
(93, 1, 11, '202204021002', 'Sakura Truss White Gold 75.75', '20', '125000', '2022-04-02', 'O'),
(94, 1, 12, '202204021002', 'Kanal Taso C75.75 - 6m', '50', '121000', '2022-04-02', 'O'),
(95, 1, 13, '202204021002', 'Reng Taso 32.45 - 6m', '2', '57000', '2022-04-02', 'O'),
(99, 1, 12, '202206051003', 'Kanal Taso C75.75 - 6m', '1', '121000', '2022-06-05', 'O'),
(101, 2, 12, '202206242004', 'Kanal Taso C75.75 - 6m', '1', '121000', '2022-06-24', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_produk`
--

CREATE TABLE `tbl_kategori_produk` (
  `id_kategori` int(7) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori_produk`
--

INSERT INTO `tbl_kategori_produk` (`id_kategori`, `nama`, `tgl`) VALUES
(1, 'a', '2022-02-17'),
(2, 'b', '2022-02-17'),
(3, 'c', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id_kontak` int(7) NOT NULL,
  `nama_kontak` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id_kontak`, `nama_kontak`, `isi`, `tgl`) VALUES
(1, 'ADDRESS', NULL, NULL),
(2, 'PHONE NUMBER', NULL, NULL),
(3, 'EMAIL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(7) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kel` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `pass_samaran` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama`, `jenis_kel`, `tgl_lahir`, `alamat`, `no_telpon`, `email`, `pass`, `pass_samaran`, `tgl`) VALUES
(1, 'juhendra utama3', 'Perempuan', '1992-07-09', 'jambi', '082117114028', 'hendracungkryng@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '2019-01-28'),
(2, 'a22222', 'Laki-Laki', '2022-04-14', 'Jln, telanai pura', '1231212132', 'a@a', '0cc175b9c0f1b6a831c399e269772661', 'a', '2022-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(7) NOT NULL,
  `id_pelanggan` int(7) DEFAULT NULL,
  `id_sopir` int(7) DEFAULT NULL,
  `kode_pesanan` varchar(100) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `jumlah_pesan` varchar(100) DEFAULT NULL,
  `total_harga` varchar(100) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `kode_invoice` varchar(100) DEFAULT NULL,
  `tgl_invoice` date DEFAULT NULL,
  `no_urut_kode_invoice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_pelanggan`, `id_sopir`, `kode_pesanan`, `bukti_pembayaran`, `jumlah_pesan`, `total_harga`, `tanggal_pesan`, `status`, `kode_invoice`, `tgl_invoice`, `no_urut_kode_invoice`) VALUES
(39, 2, 4, '202204022001', 'Format_Lampiran_C_Tidak_Anggota_Parpol.doc', '45', '4225000', '2022-04-02', 'Selesai', 'HTL 2022.04.001', '2022-04-02', '001'),
(40, 1, 5, '202204021002', 'Laporan_Absensi_Maret_2022_PNSper.xls', '72', '8664000', '2022-04-02', 'Selesai', 'HTL 2022.04.002', '2022-04-03', '002'),
(41, 1, NULL, '202206051003', 'data_klinik_kecamtan_kota_baru.xlsx', '1', '121000', '2022-06-05', 'PROSES', NULL, NULL, NULL),
(42, 2, 4, '202206242004', 'IMG_4278.JPG', '1', '121000', '2022-06-24', 'Di Kirim', 'HTL 2022.06.003', '2022-06-24', '003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(7) NOT NULL,
  `id_kategori` int(7) DEFAULT NULL,
  `kode_produk` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_tambah` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `stok`, `harga`, `keterangan`, `tgl_tambah`, `gambar`) VALUES
(11, 1, '001', 'Sakura Truss White Gold 75.75', '200', '125000', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-04-02', '176203220_5374672815938260_5432853419551746401_n.jpg'),
(12, 2, '002', 'Kanal Taso C75.75 - 6m', '200', '121000', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-04-02', '179075969_5399123436826531_5725943205943887550_n.jpg'),
(13, 3, '003', 'Reng Taso 32.45 - 6m', '200', '57000', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-04-02', '241564159_6050898688315666_2361156677565571856_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(7) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `nama`, `isi`, `tgl`) VALUES
(1, 'Visi -  Misi', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekomendasi`
--

CREATE TABLE `tbl_rekomendasi` (
  `id_rekomen` int(7) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekomendasi`
--

INSERT INTO `tbl_rekomendasi` (`id_rekomen`, `judul`, `file`, `ket`, `tgl`) VALUES
(3, 'a', '0001.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-06-22'),
(4, 'b', '0002.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-06-22'),
(5, 'b', '0004.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>-</p>\r\n</body>\r\n</html>', '2022-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sopir`
--

CREATE TABLE `tbl_sopir` (
  `id_sopir` int(7) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_tlp` varchar(100) DEFAULT NULL,
  `plat` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sopir`
--

INSERT INTO `tbl_sopir` (`id_sopir`, `nama`, `no_tlp`, `plat`, `tgl`, `status`) VALUES
(4, 'Juhendra Utama', '082117114028', 'BH02918Z', '2022-03-24', '2'),
(5, 'wahit', '081318637123', 'BH 2912 Z', '2022-03-24', '1'),
(6, 'Haviz Husin, ', '082152735172', 'BH 2912 Z', '2022-03-24', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_detail_pesanan`
--
ALTER TABLE `tbl_detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`);

--
-- Indexes for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tbl_rekomendasi`
--
ALTER TABLE `tbl_rekomendasi`
  ADD PRIMARY KEY (`id_rekomen`);

--
-- Indexes for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_detail_pesanan`
--
ALTER TABLE `tbl_detail_pesanan`
  MODIFY `id_detail_pesanan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  MODIFY `id_kategori` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id_kontak` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rekomendasi`
--
ALTER TABLE `tbl_rekomendasi`
  MODIFY `id_rekomen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  MODIFY `id_sopir` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
