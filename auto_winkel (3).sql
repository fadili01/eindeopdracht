-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Gegenereerd op: 17 jan 2024 om 23:55
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_winkel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `admins`
--

INSERT INTO `admins` (`adminID`, `naam`, `achternaam`, `email`, `wachtwoord`) VALUES
(7, 'admin', 'admin', 'admin@gmail.com', '$2y$10$S.r9mC.lwK05cKd.kLxwYOXA9kMBwwqIjAsTS.uw3ZUq/HVOyQaxa'),
(8, 'admin', 'admin', 'admin@gmail.com', '$2y$10$eYX0JbbxMGoXnOZ7r7pkDejNKB88MweQz080x.sVhfWFVZYp0Az9y');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto`
--

CREATE TABLE `auto` (
  `AutoID` int(11) NOT NULL,
  `Merk` varchar(50) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `Jaar` int(11) DEFAULT NULL,
  `Kenteken` varchar(20) DEFAULT NULL,
  `Beschikbaarheid` tinyint(1) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `auto`
--

INSERT INTO `auto` (`AutoID`, `Merk`, `Model`, `Jaar`, `Kenteken`, `Beschikbaarheid`, `foto`) VALUES
(31, 'tesla', 'x', 2021, '14d5het', 1, 'uploads/tesla.png'),
(32, 'tesla', '2x', 2001, '14d5het', 4, 'uploads/tesla.png'),
(37, 'tesla', 'bx', 2020, '18d525o', 1, 'uploads/tesla.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `KlantID` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `geboortedatum` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`KlantID`, `naam`, `achternaam`, `geboortedatum`, `email`, `wachtwoord`) VALUES
(1, 'mohammed', 'fadili', '2004-01-17', 'fadili@icloud.com', '$2y$10$6JJtvmGmhCpRL6oJ4ERSS.uG5QCMraHWjmaTasqV0PQgnMt8tMBJi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verhuring`
--

CREATE TABLE `verhuring` (
  `VerhuurID` int(11) NOT NULL,
  `StartVerhuurdatum` date DEFAULT NULL,
  `klantID` int(11) DEFAULT NULL,
  `AutoID` int(11) DEFAULT NULL,
  `EindVerhuurdatum` int(11) DEFAULT NULL,
  `Kosten` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexen voor tabel `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`AutoID`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`KlantID`);

--
-- Indexen voor tabel `verhuring`
--
ALTER TABLE `verhuring`
  ADD PRIMARY KEY (`VerhuurID`),
  ADD KEY `KlantID` (`klantID`),
  ADD KEY `AutoID` (`AutoID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `auto`
--
ALTER TABLE `auto`
  MODIFY `AutoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `KlantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
