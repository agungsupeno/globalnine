-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2023 pada 07.10
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
  `tgl` date DEFAULT NULL,
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
(5, '2023-10-17', 'Baut', 'B02', 'Baut M-12', 'R011', 100, 'Pcs', 'Lantai 4'),
(6, '2023-10-01', 'Besi', 'BS01', 'Besi Baja', 'R01', 100, 'Btg', 'Rack 01'),
(7, '2023-10-17', 'Kabel', 'K01', 'Kabel Belden', 'Re', 100, 'Mtr', 'Rack 02'),
(8, '2023-10-17', 'Besi', 'BS01', 'Besi Baja', 'Re', 100, 'Mtr', 'Rack L01'),
(9, '2023-10-17', 'Kabel', 'K01', 'Kabel Belden', 'Wy', 100, 'Mtr', 'Rack L01'),
(10, '2023-10-26', 'Baut', 'B02', 'Baut M-12', 'Re01', 1000, 'Mtr', 'Rack L01'),
(11, '2023-10-01', 'Kabel', 'K01', 'Kabel Belden', 'Re9', 100, 'Mtr', 'Lantai 4'),
(12, '2023-10-02', 'Baut', 'B01', 'Baut M-10', 'Wy', 100, 'Mtr', 'Rack 02'),
(15, '2023-10-18', 'Kabel', 'K01', 'Kabel Belden', 'Re111', 100, 'Mtr', 'Lantai 4'),
(16, '2023-10-10', 'Kabel', 'K01', 'Kabel Belden', 'Re12345', 12, 'Qty', 'Rack 01'),
(17, '2023-10-18', 'Kabel', 'K01', 'Kabel Belden', 'Re1112', 100, 'Qty', 'Rack 01'),
(18, '2023-10-16', 'Baut', 'B01', 'Baut M-10', 'Re1111234', 1, 'Qty', 'Rack L01'),
(19, '2023-10-18', 'Baut', 'B02', 'Baut M-12', 'Re01111', 10, 'Qty', 'Rack 01'),
(20, '2023-10-18', 'Baut', 'B02', 'Baut M-12', 'Re1110000', 19, 'Qty', 'Lantai 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_material_out`
--

CREATE TABLE `tb_material_out` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nama_type` varchar(30) DEFAULT NULL,
  `kode_barang` text DEFAULT NULL,
  `material` text DEFAULT NULL,
  `no_req` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_material_out`
--

INSERT INTO `tb_material_out` (`id`, `tgl`, `nama_type`, `kode_barang`, `material`, `no_req`, `jml`, `qty`, `lokasi`) VALUES
(16, '2023-10-17', 'Baut', 'B02', 'Baut M-12', 'Re111', 1200, 'Qty', 'Rack 01'),
(17, '2023-10-18', 'Baut', 'B02', 'Baut M-12', 'Wy', 20, 'Qty', 'Rack 01'),
(18, '2023-10-18', 'Baut', 'B01', 'Baut M-10', 'Re13', 12, 'Qty', 'Lantai 4'),
(19, '2023-10-19', 'Kabel', 'K01', 'Kabel Belden', 'Re134', 3, 'Mtr', 'Lantai 4'),
(20, '2023-10-18', 'Baut', 'B02', 'Baut M-12', 'Re11111', 19, 'Qty', 'Rack 01'),
(21, '2023-10-18', 'Baut', 'B02', 'Baut M-12', 'Re000', 19, 'Qty', 'Lantai 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` int(11) NOT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id`, `qty`, `keterangan`) VALUES
(1, 'Qty', 'Quantity'),
(2, 'Mtr', 'Meter');

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
(1, 'B01', 'Baut M-10', 'Baut', 289, 'Pcs', 'Rack 02'),
(4, 'K01', 'Kabel Belden', 'Kabel', 510, 'Mtr', 'Rack L01'),
(6, 'BS01', 'Besi Baja', 'Besi', 210, 'Btg', 'Lantai 4'),
(7, 'B02', 'Baut M-12', 'Baut', 1, 'Pcs', 'Rack 01');

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
(2, 'PR', 'Kabel');

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
-- Indeks untuk tabel `tb_material_out`
--
ALTER TABLE `tb_material_out`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_material_out`
--
ALTER TABLE `tb_material_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
