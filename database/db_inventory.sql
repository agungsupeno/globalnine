-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2023 pada 05.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id`, `lokasi`) VALUES
(23, 'Rack 01'),
(28, 'Rack 02'),
(29, 'Rack L01'),
(31, 'Lantai 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_material_in`
--

CREATE TABLE `tb_material_in` (
  `id` int(11) NOT NULL,
  `tgl` timestamp NULL DEFAULT NULL,
  `nama_type` varchar(30) DEFAULT NULL,
  `kode_barang` text DEFAULT NULL,
  `material` text DEFAULT NULL,
  `no_req` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_material_in`
--

INSERT INTO `tb_material_in` (`id`, `tgl`, `nama_type`, `kode_barang`, `material`, `no_req`, `jml`, `qty`, `lokasi`) VALUES
(1, NULL, 'a', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id` int(11) NOT NULL,
  `kode_barang` text DEFAULT NULL,
  `material` text DEFAULT NULL,
  `nama_type` varchar(30) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id`, `kode_barang`, `material`, `nama_type`, `jml`, `qty`, `lokasi`) VALUES
(1, 'B01', 'Baut M-10', 'Baut', 100, 'Pcs', 'Rack 02'),
(4, 'K01', 'Kabel Belden', 'Kabel', 1, 'Mtr', 'Rack L01'),
(6, 'BS01', 'Besi Baja', 'Besi', 10, 'Btg', 'Lantai 4'),
(7, 'B02', 'Baut M-12', 'Baut', 10, 'Pcs', 'Rack 01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_type`
--

CREATE TABLE `tb_type` (
  `id` int(11) NOT NULL,
  `id_type` varchar(3) DEFAULT NULL,
  `nama_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_type`
--

INSERT INTO `tb_type` (`id`, `id_type`, `nama_type`) VALUES
(1, 'BT', 'Baut'),
(2, 'PR', 'Kabel'),
(4, 'BS', 'Besi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(5) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `jabatan`, `password`, `level`) VALUES
(4, '3663', 'Agung Dwicahyadi', 'Project Engineering', 'ddf9029977a61241841edeae15e9b53f', '1'),
(5, '1', 'Dominic Toreto', 'Driver', 'c4ca4238a0b923820dcc509a6f75849b', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_material_in`
--
ALTER TABLE `tb_material_in`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_material_in`
--
ALTER TABLE `tb_material_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
