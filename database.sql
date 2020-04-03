-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 02 apr 2020 om 15:50
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.2.28

DROP TABLE IF EXISTS `debt`, `genID`, `hypotheeken`, `H_note`, `QA`, `user`;

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
-- Tabelstructuur voor tabel `debt`
--

CREATE TABLE `debt` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `s` int(11) DEFAULT NULL,
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genID`
--

CREATE TABLE `genID` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hypotheeken`
--

CREATE TABLE `hypotheeken` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `status` tinytext DEFAULT NULL,
  `info` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `notes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `hypotheeken`
--

INSERT INTO `hypotheeken` (`id`, `user`, `status`, `info`, `date`, `last_update`, `notes`) VALUES
(1, 1, '1', 'sshdsjdshj', '2020-04-23', '2020-04-09', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `H_note`
--

CREATE TABLE `H_note` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `text` text DEFAULT NULL,
  `read` tinyint(4) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `QA`
--

CREATE TABLE `QA` (
  `id` int(11) NOT NULL,
  `question` tinytext DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexen voor tabel `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexen voor tabel `genID`
--
ALTER TABLE `genID`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hypotheeken`
--
ALTER TABLE `hypotheeken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `notes` (`notes`);

--
-- Indexen voor tabel `H_note`
--
ALTER TABLE `H_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`);

--
-- Indexen voor tabel `QA`
--
ALTER TABLE `QA`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `debt_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Beperkingen voor tabel `hypotheeken`
--
ALTER TABLE `hypotheeken`
  ADD CONSTRAINT `hypotheeken_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `hypotheeken_ibfk_2` FOREIGN KEY (`notes`) REFERENCES `H_note` (`id`);

--
-- Beperkingen voor tabel `H_note`
--
ALTER TABLE `H_note`
  ADD CONSTRAINT `h_note_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
