-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2022 om 19:44
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `ID` int(6) NOT NULL,
  `username` varchar(64) NOT NULL,
  `score` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `username`, `score`, `email`, `wachtwoord`) VALUES
(6, 'gamer', 16, 'gaming@gmail.com', '47618c808d0dbc1845ae03eb061cce381d9eaccd'),
(7, 'yamum', 1, 'deez@gmail.com', '34de6048f2b9c62ebb42cd2b9f767fb5fd3e8eae'),
(8, 'levi', 5, 'bigmonke@hotmail.com', '22e8a186c19ab6b6950880a0cc872a3108239885'),
(9, 'joemama', 41, 'joemama@gmail.com', '5f0a3b27d62697c5273d52754830ed65e307afc1'),
(10, 'monke', 69, 'banana@mail.com', '4eb10867e7497fd8c37b8ed10303a0fba0c0e3ce'),
(11, 'statoitsna', 4, 'polka@hotmail.com', '01609539a2fba71b41e3109ab5cb198adf802dce'),
(12, 'dijkenbreker010', 3, 'waterstroming@yahoo.nl', 'f42343e88594581338aa32dda7a2ab368dd10ee4');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
