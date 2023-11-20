-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2023 pada 05.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelompok1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` int(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `no_hp_admin` varchar(50) DEFAULT NULL,
  `img_admin` varchar(256) DEFAULT NULL,
  `level_admin` int(11) DEFAULT NULL,
  `create_date_admin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `username_admin`, `password_admin`, `nama_admin`, `email_admin`, `no_hp_admin`, `img_admin`, `level_admin`, `create_date_admin`) VALUES
(2, 'owner', '$2y$10$j1lDCDGnkzO01CElfAZe1e9Wxo7pZhwbkPUs5kKSGDq2GHV.aqiUm', 'Reny', 'owner@parkrinaja.com', '089682261128', 'assets/dist/img/default.png', 1, '0000-00-00 00:00:00'),
(4, 'spwyuk', '$2y$10$CUxfTB.wqRQvgj9SF/1u..R0e6Hj7wtQfcLHVJGczqpMqAdEVqUQm', 'Surya', 'surya123@gmail.com', '0808080808', 'assets/dist/img/default.png', 1, '0000-00-00 00:00:00'),
(5, 'ddadk', '$2y$10$fpwtgf3C3mA2VQKf2kRrfuPst8LQTQ.qtzNQq48gGVQ6bcQUUc.Ni', 'Dede', 'ddadkadk@gmail.com', '080823912', 'assets/dist/img/default.png', 1, '0000-00-00 00:00:00'),
(10, 'admin', '$2y$10$d5LLH8s7cJ8XAKzzLW/xEeHLYo8M0DNrn/e1waAxa53kN03.M.wKu', 'admin', 'admin@gmial.com', '0819383294', 'assets/dist/img/default.png', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `kd_petugas` int(10) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `biaya_makan` varchar(20) NOT NULL,
  `biaya_transport` varchar(20) NOT NULL,
  `total_gaji` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`kd_petugas`, `nama_petugas`, `gaji_pokok`, `biaya_makan`, `biaya_transport`, `total_gaji`) VALUES
(1, 'Reny Novianti', '1000000', '25000', '15000', 1040000),
(2, 'Fadhil', '1000000', '25000', '15000', 1040000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `kd_keluar` varchar(50) NOT NULL,
  `kd_masuk` varchar(50) DEFAULT NULL,
  `kd_member` varchar(50) DEFAULT NULL,
  `tgl_jam_masuk` datetime DEFAULT NULL,
  `tgl_jam_keluar` datetime DEFAULT NULL,
  `lama_parkir_keluar` varchar(50) DEFAULT NULL,
  `tarif_keluar` int(11) DEFAULT NULL,
  `total_keluar` int(11) DEFAULT NULL,
  `status_keluar` int(11) DEFAULT NULL,
  `create_keluar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`kd_keluar`, `kd_masuk`, `kd_member`, `tgl_jam_masuk`, `tgl_jam_keluar`, `lama_parkir_keluar`, `tarif_keluar`, `total_keluar`, `status_keluar`, `create_keluar`) VALUES
('K00000001', 'M00000001', 'NULL', '2023-07-24 08:13:23', '2023-07-24 08:13:34', '0 Jam,0 Menit', 3000, 3000, 1, 'Dede'),
('K00000002', 'M00000002', 'NULL', '2023-07-24 08:13:55', '2023-07-24 08:14:05', '0 Jam,0 Menit', 3000, 3000, 1, 'Dede'),
('K00000003', 'M00000004', 'NULL', '2023-07-24 08:55:13', '2023-07-24 09:07:37', '0 Jam,12 Menit', 2000, 2000, 1, 'Dede'),
('K00000004', 'M00000005', 'NULL', '2023-07-24 09:08:38', '2023-07-24 09:08:47', '0 Jam,0 Menit', 2000, 2000, 1, 'Dede'),
('K00000005', 'M00000009', 'NULL', '2023-07-24 10:58:19', '2023-07-24 11:02:22', '0 Jam,4 Menit', 2000, 2000, 1, 'Dede'),
('K00000006', 'M00000008', 'NULL', '2023-07-24 09:29:23', '2023-07-24 11:04:32', '1 Jam,35 Menit', 3000, 3000, 1, 'Dede'),
('K00000007', 'M00000010', 'NULL', '2023-07-24 11:48:47', '2023-07-24 12:45:04', '0 Jam,56 Menit', 2000, 2000, 1, 'Dede'),
('K00000008', 'M00000012', 'NULL', '2023-07-25 10:33:35', '2023-07-25 10:33:47', '0 Jam,0 Menit', 3000, 3000, 1, 'admin'),
('K00000009', 'M00000013', 'NULL', '2023-07-25 10:33:59', '2023-07-25 10:34:07', '0 Jam,0 Menit', 1500, 1500, 1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `kd_kendaraan` varchar(50) NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `harga_kendaraan` int(20) DEFAULT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `create_by_kendaraan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`kd_kendaraan`, `nama_kendaraan`, `harga_kendaraan`, `jenis_kendaraan`, `create_by_kendaraan`) VALUES
('JK001', 'motor', 1500, 1, 'bahyu'),
('JK002', 'mobil', 3000, 1, 'bahyu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kd_masuk` varchar(50) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `kd_kendaraan` varchar(50) DEFAULT NULL,
  `plat_masuk` varchar(50) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `status_masuk` int(11) DEFAULT NULL,
  `create_masuk` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kd_masuk`, `kd_member`, `kd_kendaraan`, `plat_masuk`, `tgl_masuk`, `status_masuk`, `create_masuk`, `jenis_kendaraan`) VALUES
('M00000001', 'NULL', 'JK002', 'B 534543 MOB', '2023-07-24 08:13:23', 2, 'Dede', 0),
('M00000002', 'NULL', 'JK001', 'B 53667 BOM', '2023-07-24 08:13:55', 2, 'Dede', 0),
('M00000003', 'NULL', 'JK002', 'B 4567 RER', '2023-07-24 08:16:43', 1, 'Dede', 0),
('M00000004', 'NULL', 'JK001', 'B 759459 EEE', '2023-07-24 08:55:13', 2, 'Dede', 0),
('M00000005', 'NULL', 'JK001', 'B 5453 FDD', '2023-07-24 09:08:38', 2, 'Dede', 0),
('M00000006', 'NULL', 'JK001', 'B 8768 YTR', '2023-07-24 09:11:16', 1, 'Dede', 0),
('M00000007', 'NULL', 'JK001', 'B 75995 GGG', '2023-07-24 09:15:52', 1, 'Dede', 0),
('M00000008', 'NULL', 'JK001', 'B 8498 ASD', '2023-07-24 09:29:23', 2, 'Dede', 0),
('M00000009', 'NULL', 'JK001', 'B 5787 RTY', '2023-07-24 10:58:19', 2, 'Dede', 0),
('M00000010', 'NULL', 'JK002', 'B 5793 WER', '2023-07-24 11:48:47', 2, 'Dede', 0),
('M00000011', 'NULL', 'JK001', 'C 46688 RNY', '2023-07-24 19:07:56', 1, 'Reny', 0),
('M00000012', 'NULL', 'JK002', 'B 1234 HDH', '2023-07-25 10:33:35', 2, 'admin', 0),
('M00000013', 'NULL', 'JK001', 'B 1234 AGH', '2023-07-25 10:33:59', 2, 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indeks untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indeks untuk tabel `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`kd_kendaraan`);

--
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`kd_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `kd_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `kd_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
