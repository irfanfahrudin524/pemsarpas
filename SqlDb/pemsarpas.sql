-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2023 pada 11.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemsarpas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kode_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_barang`, `nama_barang`, `kode_barang`) VALUES
(1, 'Meja Dosen', 'MD01-001-P00-C2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `NIM` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `Nama`, `NIM`, `unit`, `nama_barang`, `kode_barang`, `tanggal`) VALUES
(2, 'Dika Ramadhan', 18101011, 'Mahasiswa', 'Proyektor LCD', 'BS-03', '2023-08-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian_ruang`
--

CREATE TABLE `pengembalian_ruang` (
  `id_kembali` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `NIM` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `kode_ruangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian_ruang`
--

INSERT INTO `pengembalian_ruang` (`id_kembali`, `Nama`, `NIM`, `unit`, `nama_ruangan`, `kode_ruangan`, `tanggal`) VALUES
(2, 'Dika Ramadhan', 18101011, 'Mahasiswa', 'Ruang 111', 'PS-04', '2023-08-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nim` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `nim`, `unit`, `username`, `password`, `level`) VALUES
(1, 'admin', 80110091, 'Staff BAUF ', 'admin', '123456', 'admin'),
(2, 'Dika Ramadhan', 18110199, 'Mahasiswa', 'Dika R', '123456', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alasan` varchar(20) NOT NULL,
  `bukti` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_pengguna`, `barang_id`, `tanggal`, `alasan`, `bukti`, `status`) VALUES
(7, 5, 1, '2023-08-18', 'praktek ', '', 'Diterima'),
(8, 5, 3, '2023-08-31', 'Agenda Rapat', 'Su', 'Pending'),
(11, 5, 3, '2023-08-27', 'Agenda Rapat', '', 'Pending'),
(13, 5, 3, '2023-08-23', 'praktek ', '', 'Pending'),
(16, 0, 4, '2023-08-23', 'Bimbingan', 'Ta', 'Pending'),
(17, 0, 5, '2023-08-23', 'Kumpulan', '', 'Pending'),
(18, 2, 1, '2023-08-29', 'Rapat', 'img20230823_111403381.pdf', 'Pending'),
(19, 2, 1, '2023-08-29', 'Rapat', 'img20230823_111403382.pdf', 'Pending'),
(20, 2, 1, '2023-08-29', 'Rapat', 'img20230823_111403383.pdf', 'Pending'),
(21, 2, 1, '2023-08-29', 'Rapat', 'bg-amoebaland.png', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_ruangan`
--

CREATE TABLE `pinjam_ruangan` (
  `id_pinjam` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alasan` varchar(200) CHARACTER SET latin1 NOT NULL,
  `bukti_izin` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `kode_ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruangan`, `kode_ruangan`) VALUES
(1, 'Ruang 110', 'BAUF-LT01-R');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nim` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nim`, `unit`, `username`, `password`, `level`) VALUES
(1, 'admin', 80110091, 'Staff BAUF ', 'admin', '123456', 'admin'),
(2, 'Dika Ramadhan', 18110199, 'Mahasiswa', 'Dika R', '123456', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indeks untuk tabel `pengembalian_ruang`
--
ALTER TABLE `pengembalian_ruang`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengembalian_ruang`
--
ALTER TABLE `pengembalian_ruang`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
