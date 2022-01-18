-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 18, 2022 alle 08:16
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-php`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `conf_ora`
--

CREATE TABLE `conf_ora` (
  `idG` int(11) NOT NULL,
  `conferimento` varchar(50) NOT NULL,
  `oraInizio` time NOT NULL,
  `oraFine` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `conf_ora`
--

INSERT INTO `conf_ora` (`idG`, `conferimento`, `oraInizio`, `oraFine`) VALUES
(0, 'UMIDO', '07:00:00', '10:30:00'),
(1, 'PLASTICA', '08:00:00', '12:30:00'),
(2, 'UMIDO', '07:00:00', '11:25:00'),
(3, 'CARTA', '09:00:00', '12:00:00'),
(3, 'VETRO', '13:50:00', '18:00:00'),
(5, 'INDIFERENZIATO', '09:30:00', '14:00:00'),
(6, 'NESSUN RITIRO', '00:00:00', '00:00:00'),
(4, 'UMIDO', '10:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `giorno_conferimento`
--

CREATE TABLE `giorno_conferimento` (
  `id` int(2) NOT NULL,
  `giorno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `giorno_conferimento`
--

INSERT INTO `giorno_conferimento` (`id`, `giorno`) VALUES
(0, 'Lunedi'),
(1, 'Martedi'),
(2, 'Mercoledì'),
(3, 'Giovedi'),
(4, 'Venerdi'),
(5, 'Sabato'),
(6, 'Domenica');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `conf_ora`
--
ALTER TABLE `conf_ora`
  ADD KEY `conf_ora_ibfk_1` (`idG`);

--
-- Indici per le tabelle `giorno_conferimento`
--
ALTER TABLE `giorno_conferimento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `giorno_conferimento`
--
ALTER TABLE `giorno_conferimento`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `conf_ora`
--
ALTER TABLE `conf_ora`
  ADD CONSTRAINT `conf_ora_ibfk_1` FOREIGN KEY (`idG`) REFERENCES `giorno_conferimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
