-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 01, 2022 alle 16:34
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
-- Database: `app_php`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `days_table`
--

CREATE TABLE `days_table` (
  `id` int(1) NOT NULL DEFAULT 0,
  `days` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `days_table`
--

INSERT INTO `days_table` (`id`, `days`) VALUES
(1, 'Lunedi'),
(2, 'Martedi'),
(3, 'Mercoledi'),
(4, 'Giovedi'),
(5, 'Venerdi'),
(6, 'Sabato'),
(7, 'Domenica');

-- --------------------------------------------------------

--
-- Struttura della tabella `withdrawal_table`
--

CREATE TABLE `withdrawal_table` (
  `id` int(14) NOT NULL,
  `foreign_key` int(2) NOT NULL,
  `material` varchar(50) NOT NULL,
  `start_now` time NOT NULL,
  `end_now` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `withdrawal_table`
--

INSERT INTO `withdrawal_table` (`id`, `foreign_key`, `material`, `start_now`, `end_now`) VALUES
(0, 1, 'Umido', '08:00:00', '12:00:00'),
(1, 2, 'Plastica', '09:00:00', '18:00:00'),
(2, 3, 'Umido', '07:00:00', '10:00:00'),
(3, 4, 'Carta', '07:00:00', '10:00:00'),
(4, 4, 'Vetro', '13:00:00', '18:00:00'),
(5, 5, 'Umido', '07:00:00', '14:00:00'),
(6, 6, 'Indifferenziato', '10:00:00', '15:00:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `days_table`
--
ALTER TABLE `days_table`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `withdrawal_table`
--
ALTER TABLE `withdrawal_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`foreign_key`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `withdrawal_table`
--
ALTER TABLE `withdrawal_table`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `withdrawal_table`
--
ALTER TABLE `withdrawal_table`
  ADD CONSTRAINT `withdrawal_table_ibfk_1` FOREIGN KEY (`foreign_key`) REFERENCES `days_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
