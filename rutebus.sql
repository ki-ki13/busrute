-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2021 pada 06.47
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rutebus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`no`, `id`, `hari`, `jam`) VALUES
(1, 1, 'Senin', '05.00 - 21.00'),
(2, 1, 'Selasa', '05.00 - 21.00'),
(3, 1, 'Rabu', '05.00 - 21.00'),
(4, 1, 'Kamis', '05.00 - 21.00'),
(5, 1, 'Jumat', '05.00 - 21.00'),
(6, 1, 'Sabtu', '05.00 - 21.00'),
(7, 1, 'Minggu', '05.00 - 21.00'),
(8, 2, 'Senin', '06.00 - 20.00'),
(9, 2, 'Selasa', '06.00 - 20.00'),
(10, 2, 'Rabu', '06.00 - 20.00'),
(11, 2, 'Kamis', '06.00 - 20.00'),
(12, 2, 'Jumat', '06.00 - 20.00'),
(13, 2, 'Sabtu', '06.00 - 20.00'),
(14, 2, 'Minggu', '06.00 - 20.00'),
(15, 3, 'Senin', '07.00 - 19.00'),
(16, 3, 'Selasa', '07.00 - 19.00'),
(17, 3, 'Rabu', '07.00 - 19.00'),
(18, 3, 'Kamis', '07.00 - 19.00'),
(19, 3, 'Jumat', '07.00 - 19.00'),
(20, 3, 'Sabtu', '07.00 - 19.00'),
(21, 3, 'Minggu', '07.00 - 19.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberhentian`
--

CREATE TABLE `pemberhentian` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pemberhentian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberhentian`
--

INSERT INTO `pemberhentian` (`no`, `id`, `pemberhentian`) VALUES
(1, 1, 'Terminal Giwangan, Giwangan'),
(2, 1, 'Alfamart, Jl. Parangtritis'),
(3, 1, 'Kantor Pos, Jl. Bantul'),
(4, 1, 'Pasar Bantul, Jl. Jend. Sudirman'),
(5, 1, 'RS Paru Respira Yogyakarta, Jl. Panembahan Senopati'),
(6, 1, 'SMA Negeri 1 Srandakan, Jl. Pandansimo'),
(7, 1, 'Pantai Baru, Ngentak'),
(8, 2, 'Terminal Giwangan, Giwangan'),
(9, 2, 'SMA Negeri 1 Sewon, Jl. Parangtritis\r\n'),
(10, 2, 'BPD DIY - Kantor Kas Gabusan'),
(11, 2, 'SMK PARIWISATA BANTUL, Jl. Parangtritis'),
(12, 2, 'Terminal Parangtritis Baru, Pantai, Parangtritis'),
(13, 3, 'Terminal Giwangan, Giwangan'),
(14, 3, 'Rumah Sakit Permata Husada, JL. Raya KM 4 RT'),
(15, 3, 'Kantor Kapanewon Imogiri, JL. Ngancar'),
(16, 3, 'Hutan Pinus Asri, Jl. Hutan Pinus Nganjir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `no` int(11) NOT NULL,
  `jalur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`no`, `jalur`) VALUES
(1, 'Jalur 1: Terminal Giwangan ke Pantai Baru'),
(2, 'Jalur 2:  Terminal Giwangan ke Pantai Parangtritis'),
(3, 'Jalur 3: Terminal Giwangan ke Hutan pinus Asri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `pemberhentian`
--
ALTER TABLE `pemberhentian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
