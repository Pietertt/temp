-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 02 apr 2020 om 15:41
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ritsemabanck`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` tinytext DEFAULT NULL,
  `BSN` int(11) NOT NULL,
  `firstname` tinytext DEFAULT NULL,
  `lastname` tinytext DEFAULT NULL,
  `gender` tinytext DEFAULT NULL,
  `tnumber` tinytext DEFAULT NULL,
  `banknum` tinytext DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  `residence` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `house_number` int(11) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `addition` varchar(10) NOT NULL,
  `street` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `BSN`, `firstname`, `lastname`, `gender`, `tnumber`, `banknum`, `income`, `partner`, `residence`, `birth_date`, `house_number`, `postal_code`, `addition`, `street`) VALUES
(1, 'Pietertje', '$2y$10$XsNxJgGmONaw7n1cbwLXlurhS9pJl7OSpRkSZcCMv0kBOlJECgtgy', 'pieter@b.nl', 293829382, 'dsdsdssdsddfdddfdfdf', 'de Groot', 'Mannelijk', '1234', 'NL66INGB2382485834', 39843, 23, 'Utrecht', '2020-03-02', 564, '4543HS', 'a', 'Dorpsstraat');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
