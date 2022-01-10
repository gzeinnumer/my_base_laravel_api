-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2022 pada 17.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybase_laravel_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'zein', '2022-01-09 14:53:35', '2022-01-09 21:54:14'),
(2, 'zein 2', '2022-01-09 15:03:24', '2022-01-09 15:03:24'),
(3, 'zein 24', '2022-01-10 16:24:18', '2022-01-10 16:24:18'),
(4, 'zein 214', '2022-01-10 16:26:00', '2022-01-10 16:26:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `empty`
--

CREATE TABLE `empty` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `more`
--

CREATE TABLE `more` (
  `id` int(11) NOT NULL,
  `id_paging` int(11) NOT NULL,
  `more` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `more`
--

INSERT INTO `more` (`id`, `id_paging`, `more`, `created_at`, `updated_at`) VALUES
(1, 2, 'more 2', '2022-01-09 16:00:54', '2022-01-09 10:00:49'),
(2, 3, 'more 3.1', '2022-01-09 16:21:25', '2022-01-09 10:21:10'),
(3, 3, 'more 3.2', '2022-01-09 16:21:25', '2022-01-09 10:21:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `much_data`
--

CREATE TABLE `much_data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `much_data`
--

INSERT INTO `much_data` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'md 1', '2022-01-09 19:08:17', '2022-01-09 13:08:10'),
(2, 'md 2', '2022-01-09 19:10:38', '2022-01-02 13:08:10'),
(3, 'md 3', '2022-01-09 19:10:38', '2022-01-03 13:08:10'),
(4, 'md 4', '2022-01-09 19:10:38', '2022-01-04 13:08:10'),
(5, 'md 5', '2022-01-09 19:10:38', '2022-01-05 13:08:10'),
(6, 'md 6', '2022-01-09 19:10:38', '2022-01-06 13:08:10'),
(7, 'md 7', '2022-01-09 19:10:38', '2022-01-07 13:08:10'),
(8, 'md 8', '2022-01-09 19:10:38', '2022-01-07 13:08:10'),
(9, 'md 9', '2022-01-09 19:10:38', '2022-01-08 13:08:10'),
(10, 'md 10', '2022-01-09 19:10:38', '2022-01-09 13:08:10'),
(11, 'md 11', '2022-01-09 19:10:38', '2022-01-10 13:08:10'),
(12, 'md 12', '2022-01-09 19:10:38', '2022-01-11 13:08:10'),
(13, 'md 13', '2022-01-09 19:10:38', '2022-01-12 13:08:10'),
(14, 'md 14', '2022-01-09 19:10:38', '2022-01-13 13:08:10'),
(15, 'md 15', '2022-01-09 19:10:38', '2022-01-14 13:08:10'),
(16, 'md 16', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(17, 'md 17', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(18, 'md 18', '2022-01-09 19:10:38', '2022-01-15 13:08:10'),
(19, 'md 19', '2022-01-09 19:10:38', '2022-01-16 13:08:10'),
(20, 'md 20', '2022-01-09 19:10:38', '2022-01-17 13:08:10'),
(21, 'md 21', '2022-01-09 20:58:59', '2022-01-09 14:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `one`
--

CREATE TABLE `one` (
  `id` int(11) NOT NULL,
  `id_paging` int(11) NOT NULL,
  `one` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `one`
--

INSERT INTO `one` (`id`, `id_paging`, `one`, `created_at`, `updated_at`) VALUES
(1, 2, 'one 2', '2022-01-09 17:12:00', '2022-01-09 11:11:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paging`
--

CREATE TABLE `paging` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paging`
--

INSERT INTO `paging` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'data 1', 'detail 1', '2022-01-09 15:46:07', NULL),
(2, 'data 2', 'detail 2', '2022-01-09 15:46:07', NULL),
(3, 'data 3', 'detail 3', '2022-01-09 15:47:01', '2022-01-09 15:47:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indeks untuk tabel `empty`
--
ALTER TABLE `empty`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `more`
--
ALTER TABLE `more`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paging` (`id_paging`);

--
-- Indeks untuk tabel `much_data`
--
ALTER TABLE `much_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `one`
--
ALTER TABLE `one`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paging` (`id_paging`);

--
-- Indeks untuk tabel `paging`
--
ALTER TABLE `paging`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `empty`
--
ALTER TABLE `empty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `more`
--
ALTER TABLE `more`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `much_data`
--
ALTER TABLE `much_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `one`
--
ALTER TABLE `one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paging`
--
ALTER TABLE `paging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `more`
--
ALTER TABLE `more`
  ADD CONSTRAINT `more_ibfk_1` FOREIGN KEY (`id_paging`) REFERENCES `paging` (`id`);

--
-- Ketidakleluasaan untuk tabel `one`
--
ALTER TABLE `one`
  ADD CONSTRAINT `one_ibfk_1` FOREIGN KEY (`id_paging`) REFERENCES `paging` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
