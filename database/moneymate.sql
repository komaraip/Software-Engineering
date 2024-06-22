-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2024 pada 22.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneymate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `tranID` int(20) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `balance` int(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `userID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans`
--

INSERT INTO `trans` (`tranID`, `transaction`, `date`, `time`, `balance`, `category`, `userID`) VALUES
(1, 'Ichiban', '2024-06-22', '06:13:06', 120000, 'Restaurant', 1),
(2, '3Second', '2024-06-24', '17:15:05', 325000, 'Fashion', 1),
(3, 'Solaria', '2024-06-26', '15:15:05', 200000, 'Restaurant', 1),
(4, 'Ancol Beach', '2024-06-28', '17:17:27', 110000, 'Entertainment', 1),
(5, 'Uniqlo', '2024-06-30', '10:17:27', 250000, 'Fashion', 1),
(6, 'Kwetiaw Rabel', '2024-06-30', '19:50:00', 50000, 'Restaurant', 1),
(7, 'Listrik', '2024-07-05', '08:42:00', 100000, 'Bill', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postalcode` int(20) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` int(200) NOT NULL,
  `balance` int(200) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `country`, `phone`, `currency`, `city`, `address`, `postalcode`, `card`, `cardnumber`, `balance`, `profile`) VALUES
(1, 'Komara Indra Putra', 'komaraipx@gmail.com', '40aa39ef63b99933a07de0624aa8380b', 'Indonesia', 628133987, 'IDR', 'Jakarta', 'JL Salam Raya No 21', 50192, 'GoPay', 123412341, 5500000, 'ghost.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`tranID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `trans`
--
ALTER TABLE `trans`
  MODIFY `tranID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
