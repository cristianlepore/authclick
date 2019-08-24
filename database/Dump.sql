-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2019 at 12:08 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Progetto_Blockchain_20190605`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `email` varchar(70) NOT NULL,
  `Password` varchar(70) DEFAULT NULL,
  `Utente_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `File`
--

CREATE TABLE `File` (
  `id` bigint(30) NOT NULL,
  `Last` tinyint(1) DEFAULT NULL,
  `Tipologia` varchar(50) DEFAULT NULL,
  `Nome` varchar(5000) DEFAULT NULL,
  `Fotografia_id` bigint(30) DEFAULT NULL,
  `Path` varchar(200) DEFAULT NULL,
  `Utente_id` bigint(30) DEFAULT NULL,
  `Keywords` varchar(5000) DEFAULT NULL,
  `Trasferimento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Fotografia`
--

CREATE TABLE `Fotografia` (
  `id` bigint(30) NOT NULL,
  `Open_edition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Artist_proof` int(3) DEFAULT NULL,
  `Annotazioni` varchar(5000) DEFAULT NULL,
  `Acquistabile` tinyint(4) DEFAULT NULL,
  `Targa` text,
  `Timbro` text,
  `Annotazioni_timbro` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Firma` text,
  `Annotazioni_firma` varchar(1000) DEFAULT NULL,
  `Proprietario_privato` tinyint(4) DEFAULT NULL,
  `Titolo` varchar(100) DEFAULT NULL,
  `Visibile` tinyint(4) DEFAULT NULL,
  `Lunghezza` decimal(10,2) DEFAULT NULL,
  `Larghezza` decimal(10,2) DEFAULT NULL,
  `Esemplare` bigint(20) DEFAULT NULL,
  `Note_esemplare` varchar(1000) DEFAULT NULL,
  `Codice_identificativo` varchar(100) DEFAULT NULL,
  `Tiratura` bigint(20) DEFAULT NULL,
  `Note_tiratura` varchar(1000) DEFAULT NULL,
  `Tecnica_stampa` varchar(100) DEFAULT NULL,
  `Giorno_stampa` int(11) DEFAULT NULL,
  `Mese_stampa` int(11) DEFAULT NULL,
  `Anno_stampa` year(4) DEFAULT NULL,
  `Supporto` varchar(100) DEFAULT NULL,
  `Giorno_scatto` int(11) DEFAULT NULL,
  `Mese_scatto` int(11) DEFAULT NULL,
  `Anno_scatto` year(4) DEFAULT NULL,
  `Tecnica_scatto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Autore_id` bigint(30) DEFAULT NULL,
  `Keywords` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Indirizzo`
--

CREATE TABLE `Indirizzo` (
  `Tipologia` varchar(500) NOT NULL,
  `Nazione` text,
  `Città` text,
  `CAP` int(11) DEFAULT NULL,
  `Via/piazza` text,
  `Civico` int(11) DEFAULT NULL,
  `Utente_id` bigint(30) NOT NULL,
  `Keywords` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Possiede`
--

CREATE TABLE `Possiede` (
  `Utente_id` bigint(30) NOT NULL,
  `Fotografia_id` bigint(30) NOT NULL,
  `Keywords` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Trasferimento`
--

CREATE TABLE `Trasferimento` (
  `id` int(11) NOT NULL,
  `Approvato` tinytext,
  `Provenienza_privato` tinytext,
  `Tipologia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Prezzo` decimal(12,2) DEFAULT NULL,
  `Data_cessione` date DEFAULT NULL,
  `Fine_cessione` date DEFAULT NULL,
  `id_venditore` bigint(30) NOT NULL,
  `id_acquirente` bigint(30) NOT NULL,
  `Fotografia_id` bigint(30) NOT NULL,
  `Cessione_diritti` text,
  `Keywords` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Utente`
--

CREATE TABLE `Utente` (
  `id` bigint(30) NOT NULL,
  `Nome` text,
  `Cognome` text,
  `Giorno_nascita` int(11) DEFAULT NULL,
  `Mese_nascita` int(11) DEFAULT NULL,
  `Anno_nascita` year(4) DEFAULT NULL,
  `Luogo_nascita` varchar(100) DEFAULT NULL,
  `Giorno_morte` int(11) DEFAULT NULL,
  `Mese_morte` int(11) DEFAULT NULL,
  `Anno_morte` year(4) DEFAULT NULL,
  `Luogo_morte` varchar(100) DEFAULT NULL,
  `Codice_fiscale` varchar(100) DEFAULT NULL,
  `Partita_IVA` varchar(100) DEFAULT NULL,
  `Tipologia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Keywords` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`Utente_id`,`email`),
  ADD KEY `fk_Account_Utente1_idx` (`Utente_id`);

--
-- Indexes for table `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Fotografia_id` (`Fotografia_id`) USING BTREE,
  ADD KEY `fk_File_Fotografia1_idx` (`Fotografia_id`) USING BTREE,
  ADD KEY `fk_File_Utente1` (`Utente_id`) USING BTREE,
  ADD KEY `fk_File_Trasferimento1` (`Trasferimento_id`);

--
-- Indexes for table `Fotografia`
--
ALTER TABLE `Fotografia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Fotografia_Utente1_idx` (`Autore_id`);

--
-- Indexes for table `Indirizzo`
--
ALTER TABLE `Indirizzo`
  ADD PRIMARY KEY (`Tipologia`,`Utente_id`),
  ADD KEY `fk_Indirizzo_Utente1_idx` (`Utente_id`);

--
-- Indexes for table `Possiede`
--
ALTER TABLE `Possiede`
  ADD PRIMARY KEY (`Utente_id`,`Fotografia_id`),
  ADD KEY `fk_Possiede_Fotografia1_idx` (`Fotografia_id`);

--
-- Indexes for table `Trasferimento`
--
ALTER TABLE `Trasferimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Trasferimento_Utente1_idx` (`id_venditore`),
  ADD KEY `fk_Trasferimento_Utente2_idx` (`id_acquirente`),
  ADD KEY `fk_Trasferimento_Fotografia1_idx` (`Fotografia_id`);

--
-- Indexes for table `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `File`
--
ALTER TABLE `File`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `Fotografia`
--
ALTER TABLE `Fotografia`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `Trasferimento`
--
ALTER TABLE `Trasferimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;

--
-- AUTO_INCREMENT for table `Utente`
--
ALTER TABLE `Utente`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `fk_Account_Utente1` FOREIGN KEY (`Utente_id`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `File`
--
ALTER TABLE `File`
  ADD CONSTRAINT `fk_File_Fotografia1` FOREIGN KEY (`Fotografia_id`) REFERENCES `Fotografia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_File_Trasferimento1` FOREIGN KEY (`Trasferimento_id`) REFERENCES `Trasferimento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_File_Utente1` FOREIGN KEY (`Utente_id`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Fotografia`
--
ALTER TABLE `Fotografia`
  ADD CONSTRAINT `fk_Fotografia_Utente1` FOREIGN KEY (`Autore_id`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Indirizzo`
--
ALTER TABLE `Indirizzo`
  ADD CONSTRAINT `fk_Indirizzo_Utente1` FOREIGN KEY (`Utente_id`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Possiede`
--
ALTER TABLE `Possiede`
  ADD CONSTRAINT `fk_Possiede_Fotografia1` FOREIGN KEY (`Fotografia_id`) REFERENCES `Fotografia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Possiede_Utente1` FOREIGN KEY (`Utente_id`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Trasferimento`
--
ALTER TABLE `Trasferimento`
  ADD CONSTRAINT `fk_Trasferimento_Fotografia1` FOREIGN KEY (`Fotografia_id`) REFERENCES `Fotografia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Trasferimento_Utente1` FOREIGN KEY (`id_venditore`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Trasferimento_Utente2` FOREIGN KEY (`id_acquirente`) REFERENCES `Utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
