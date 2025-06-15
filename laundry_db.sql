-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Waktu pembuatan: 15 Jun 2025 pada 15.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `berat_kg` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Proses',
  `harga_total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id`, `nama_pelanggan`, `no_telepon`, `jenis_layanan`, `berat_kg`, `status`, `harga_total`) VALUES
(27, 'kaka', '08537463542', 'Cuci Kering', 1, 'Selesai', 10000),
(28, 'ade', '083847562', 'Cuci Setrika', 1, 'Selesai', 15000),
(33, 'jamal', '0864534353535', 'Cuci Kering', 2, 'Selesai', 20000),
(34, 'don', '087656765354', 'Cuci Setrika', 1, 'Selesai', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `berat_kg` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Proses',
  `harga_total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pelanggan`, `no_telepon`, `jenis_layanan`, `berat_kg`, `status`, `harga_total`) VALUES
(29, 'jhon', '0857464536376', 'Setrika Saja', 1, 'Selesai', 5000),
(30, 'jen', '08777665546', 'Setrika Saja', 4, 'Proses', 20000),
(31, 'bima', '084653654223', 'Cuci Kering', 6, 'Proses', 60000),
(32, 'uda', '085764536353', 'Cuci Setrika', 10, 'Proses', 150000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
