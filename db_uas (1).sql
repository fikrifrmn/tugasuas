-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2024 pada 19.29
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
-- Database: `db_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `level` varchar(30) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `nama`, `nip`, `gender`, `tanggal`, `status`, `level`, `start`, `end`) VALUES
(12, 'fikri firmansyah', '2209010131', 'laki-laki', '2024-06-17', 'Excused', 'CEO', '11:16:35', '00:00:00'),
(14, 'lucky', '2209010132', 'laki-laki', '0000-00-00', 'Alpha', 'Employee', '00:00:00', '00:00:00'),
(15, 'dapa', '2209010133', 'laki-laki', '2024-06-17', 'Present', 'HRD', '14:15:41', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(30) NOT NULL,
  `photo_profile` longblob NOT NULL,
  `status` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `email`, `gender`, `nohp`, `alamat`, `level`, `photo_profile`, `status`, `password`) VALUES
(1, 'fikri firmansyah', '2209010131', 'fikri@gmail.com', 'laki-laki', '081370577338', 'jl.bandung', 'CEO', 0x66696b72692e6a7067, 'Active', '123'),
(2, 'lucky', '2209010132', 'luki@gmail.com', 'laki-laki', '08080808', 'jl.medan', 'Employee', 0x6c756b692e6a7067, 'Active', '123\r\n'),
(3, 'dapa', '2209010133', 'dapa@gmail.com', 'laki-laki', '0812020202', 'jl.medan', 'HRD', 0x646170612e6a7067, 'Present', '123'),
(4, 'mas aris', '2213000000', 'aris@gmail.com', 'laki-laki', '0808080808', 'jl', '', 0x6173736574732f6176617461727369736f2e6a7067, 'laki-laki', '123'),
(5, 'rigan', '20938373636', 'rigan@gmail.com', 'laki-laki', '093837362', 'jalan', '', 0x6173736574732f617661746172732f726f6f6d2e6a7067, 'laki-laki', '123'),
(6, 'komting', '2029298278', 'k@gmail.com', 'laki-laki', '03293737', 'jalnjalan', '', 0x6173736574732f617661746172732f646f206c6f6f702e706e67, 'laki-laki', '1232');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nip` (`nip`),
  ADD KEY `gender` (`gender`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `user` (`gender`) ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_4` FOREIGN KEY (`level`) REFERENCES `user` (`level`) ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `user` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
