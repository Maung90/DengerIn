-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jul 2023 pada 06.17
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
  `judul` varchar(255) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `penyanyi` varchar(50) NOT NULL,
  `poster_lagu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `music`
--

INSERT INTO `music` (`id_music`, `judul`, `genre`, `penyanyi`, `poster_lagu`) VALUES
(28, 'Alone.mp3', 'EDM', 'marshmello', 'Marshmello - Alone.jpg'),
(29, 'Can I Kick It.mp3', 'HIP HOP', 'A Tribe Called Quest ', 'Can I Kick It.jpg'),
(30, '3005.mp3', 'Hip Hop', 'Childish Gambino', '3005.jpg'),
(32, 'Blinding Light Arab.mp3', 'Pop', 'Rachid Aseyake ', 'Blinding Light Arab.jpg'),
(33, 'When I Dream.mp3', 'Pop', 'San Cisco ', 'When I Dream.jpg'),
(34, 'Popscene.mp3', 'Rock', 'Blur ', 'Popscene.jpg'),
(35, 'In my Life.mp3', 'ROCK', 'The Beatles ', 'In my Life.jpg'),
(36, 'True.mp3', 'ROCK', 'Negative XP', 'True.jpg'),
(37, 'Kau Pemeran Utama Di Sebuah Opera.mp3', 'Rock', 'The Jansens', 'Kau Pemeran Utama Di Sebuah Opera.jpg'),
(38, '12 Rounds.mp3', 'Rock', 'Escape From Zoo', '12 Rounds.jpg');

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

--
-- Dumping data untuk tabel `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `id_playlist_name`, `id_music`, `id_user`) VALUES
(16, 7, 24, 1),
(17, 7, 25, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist_name`
--

CREATE TABLE `playlist_name` (
  `id_playlist_name` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `playlist_name` varchar(20) NOT NULL,
  `imagePlaylist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `playlist_name`
--

INSERT INTO `playlist_name` (`id_playlist_name`, `id_user`, `playlist_name`, `imagePlaylist`) VALUES
(1, 7, 'Olah Raga', '...'),
(2, 7, 'Anime', '...'),
(3, 7, 'testaja', '../'),
(4, 7, 'test 2', 'test 2.jpg'),
(5, 1, 'TOP 5 Indonesia', 'TOP 5 Indonesia.jpg'),
(6, 1, 'Top 10 Hot Dengerin ', 'Top 10 Hot Dengerin .jpg'),
(7, 1, 'TOP 10 TIKTOK', 'TOP 10 TIKTOK.jpg');

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
(1, 'admin', 'admin', 'admin@gmail.com', 'admin.png', 'admin'),
(7, 'user1', 'user1', 'user1@gmail.com', 'sho.jpg', 'user'),
(8, 'surya', 'surya', 'surya@gmail.com', 'pic-4.png', 'user');

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
  MODIFY `id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `playlist_name`
--
ALTER TABLE `playlist_name`
  MODIFY `id_playlist_name` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
