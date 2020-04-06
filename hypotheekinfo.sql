-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 apr 2020 om 14:02
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ritsema banck`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hypotheekinfo`
--

CREATE TABLE `hypotheekinfo` (
  `Geboortedatum` varchar(10) NOT NULL,
  `Rekeningnummer` varchar(18) NOT NULL,
  `Bruto jaarinkomen` int(11) NOT NULL,
  `Eigen inbreng` int(11) NOT NULL,
  `Schulden` int(11) NOT NULL,
  `Koopprijs` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Hypotheek looptijd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
