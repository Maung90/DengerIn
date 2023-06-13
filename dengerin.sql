-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jun 2023 pada 08.49
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dengerin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id_fav` int(11) NOT NULL,
  `id_music` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `music`
--

CREATE TABLE `music` (
  `id_music` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `penyanyi` varchar(50) NOT NULL,
  `poster_lagu` varchar(50) NOT NULL,
  `lirik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `music`
--

INSERT INTO `music` (`id_music`, `judul`, `genre`, `penyanyi`, `poster_lagu`, `lirik`) VALUES
(8, 'ajojing.mp3', 'rock', 'asep', 'cover.png', 'ajojing ala ala ajojing'),
(9, 'ajojing.mp3', 'rock', 'asep', 'cover.png', 'ajojing ala ala ajojing'),
(10, 'ajojing.mp3', 'rock', 'asep', 'cover.png', 'ajojing ala ala ajojing'),
(11, 'ajojing.mp3', 'rock', 'asep', 'cover.png', 'ajojing ala ala ajojing'),
(12, 'ajojing.mp3', 'rock', 'asep', 'cover.png', 'ajojing ala ala ajojing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_playlist_name` int(11) NOT NULL,
  `id_music` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist_name`
--

CREATE TABLE `playlist_name` (
  `id_playlist_name` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `playlist_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `image`, `role`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', 'admin.png', 'admin'),
(7, 'user1', 'user1', 'user1@gmail.com', 'pic-2.png', 'user'),
(8, 'surya', 'surya', 'surya@gmail.com', 'pic-4.png', 'user'),
(9, 'asda', 'aasdad', 'asda@gmail.com', 'pic-8.png', 'user'),
(10, 'asdas', 'asd', 'asd@gmail.com', 'pic-1.png', 'user'),
(11, 'asep', 'asep', 'asep@gmail.com', 'pic-3.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_fav`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

--
-- Indexes for table `playlist_name`
--
ALTER TABLE `playlist_name`
  ADD PRIMARY KEY (`id_playlist_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playlist_name`
--
ALTER TABLE `playlist_name`
  MODIFY `id_playlist_name` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
