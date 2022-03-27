-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 27, 2022 alle 23:32
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
-- Struttura della tabella `withdrawal_days`
--

CREATE TABLE `withdrawal_days` (
  `id` int(2) NOT NULL,
  `days` enum('Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica') NOT NULL,
  `withdraw` enum('Umido','Plastica','Carta','Vetro','Indiferenziato') NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `withdrawal_days`
--

INSERT INTO `withdrawal_days` (`id`, `days`, `withdraw`, `start`, `end`) VALUES
(23, 'Lunedi', 'Umido', '06:00:00', '12:30:00'),
(24, 'Martedi', 'Plastica', '06:00:00', '13:00:00'),
(25, 'Mercoledi', 'Umido', '12:00:00', '19:00:00'),
(26, 'Giovedi', 'Carta', '03:00:00', '10:00:00'),
(27, 'Giovedi', 'Vetro', '12:00:00', '16:00:00'),
(28, 'Venerdi', 'Umido', '12:00:00', '19:30:00'),
(29, 'Sabato', 'Indiferenziato', '14:00:00', '19:00:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `withdrawal_days`
--
ALTER TABLE `withdrawal_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `withdrawal_days`
--
ALTER TABLE `withdrawal_days`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
