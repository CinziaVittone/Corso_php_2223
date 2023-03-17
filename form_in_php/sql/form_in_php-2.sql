-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 17, 2023 alle 14:33
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_in_php`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `id_provincia` int(11) NOT NULL,
  `id_regione` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `province`
--

INSERT INTO `province` (`id_provincia`, `id_regione`, `nome`, `sigla`) VALUES
(1, 15, 'Agrigento', 'AG'),
(2, 12, 'Alessandria', 'AL'),
(3, 10, 'Ancona', 'AN'),
(4, 16, 'Arezzo', 'AR'),
(5, 10, 'Ascoli Piceno', 'AP'),
(6, 12, 'Asti', 'AT'),
(7, 4, 'Avellino', 'AV'),
(8, 13, 'Bari', 'BA'),
(9, 13, 'Barletta-Andria-Trani', 'BT'),
(10, 20, 'Belluno', 'BL'),
(11, 4, 'Benevento', 'BN'),
(12, 9, 'Bergamo', 'BG'),
(13, 12, 'Biella', 'BI'),
(14, 5, 'Bologna', 'BO'),
(15, 17, 'Bolzano/Bozen', 'BZ'),
(16, 9, 'Brescia', 'BS'),
(17, 13, 'Brindisi', 'BR'),
(18, 14, 'Cagliari', 'CA'),
(19, 15, 'Caltanissetta', 'CL'),
(20, 11, 'Campobasso', 'CB'),
(21, 14, 'Carbonia-Iglesias', 'CI'),
(22, 4, 'Caserta', 'CE'),
(23, 15, 'Catania', 'CT'),
(24, 3, 'Catanzaro', 'CZ'),
(25, 1, 'Chieti', 'CH'),
(26, 9, 'Como', 'CO'),
(27, 3, 'Cosenza', 'CS'),
(28, 9, 'Cremona', 'CR'),
(29, 3, 'Crotone', 'KR'),
(30, 12, 'Cuneo', 'CN'),
(31, 15, 'Enna', 'EN'),
(32, 10, 'Fermo', 'FM'),
(33, 5, 'Ferrara', 'FE'),
(34, 16, 'Firenze', 'FI'),
(35, 13, 'Foggia', 'FG'),
(36, 5, 'Forlì-Cesena', 'FC'),
(37, 7, 'Frosinone', 'FR'),
(38, 8, 'Genova', 'GE'),
(39, 6, 'Gorizia', 'GO'),
(40, 16, 'Grosseto', 'GR'),
(41, 8, 'Imperia', 'IM'),
(42, 11, 'Isernia', 'IS'),
(43, 1, 'L\'Aquila', 'AQ'),
(44, 8, 'La Spezia', 'SP'),
(45, 7, 'Latina', 'LT'),
(46, 13, 'Lecce', 'LE'),
(47, 9, 'Lecco', 'LC'),
(48, 16, 'Livorno', 'LI'),
(49, 9, 'Lodi', 'LO'),
(50, 16, 'Lucca', 'LU'),
(51, 10, 'Macerata', 'MC'),
(52, 9, 'Mantova', 'MN'),
(53, 16, 'Massa-Carrara', 'MS'),
(54, 2, 'Matera', 'MT'),
(55, 14, 'Medio Campidano', 'VS'),
(56, 15, 'Messina', 'ME'),
(57, 9, 'Milano', 'MI'),
(58, 5, 'Modena', 'MO'),
(59, 9, 'Monza e della Brianza', 'MB'),
(60, 4, 'Napoli', 'NA'),
(61, 12, 'Novara', 'NO'),
(62, 14, 'Nuoro', 'NU'),
(63, 14, 'Ogliastra', 'OG'),
(64, 14, 'Olbia-Tempio', 'OT'),
(65, 14, 'Oristano', 'OR'),
(66, 20, 'Padova', 'PD'),
(67, 15, 'Palermo', 'PA'),
(68, 5, 'Parma', 'PR'),
(69, 9, 'Pavia', 'PV'),
(70, 18, 'Perugia', 'PG'),
(71, 10, 'Pesaro e Urbino', 'PU'),
(72, 1, 'Pescara', 'PE'),
(73, 5, 'Piacenza', 'PC'),
(74, 16, 'Pisa', 'PI'),
(75, 16, 'Pistoia', 'PT'),
(76, 6, 'Pordenone', 'PN'),
(77, 2, 'Potenza', 'PZ'),
(78, 16, 'Prato', 'PO'),
(79, 15, 'Ragusa', 'RG'),
(80, 5, 'Ravenna', 'RA'),
(81, 3, 'Reggio di Calabria', 'RC'),
(82, 5, 'Reggio nell\'Emilia', 'RE'),
(83, 7, 'Rieti', 'RI'),
(84, 5, 'Rimini', 'RN'),
(85, 7, 'Roma', 'RM'),
(86, 20, 'Rovigo', 'RO'),
(87, 4, 'Salerno', 'SA'),
(88, 14, 'Sassari', 'SS'),
(89, 8, 'Savona', 'SV'),
(90, 16, 'Siena', 'SI'),
(91, 15, 'Siracusa', 'SR'),
(92, 9, 'Sondrio', 'SO'),
(93, 13, 'Taranto', 'TA'),
(94, 1, 'Teramo', 'TE'),
(95, 18, 'Terni', 'TR'),
(96, 12, 'Torino', 'TO'),
(97, 15, 'Trapani', 'TP'),
(98, 17, 'Trento', 'TN'),
(99, 20, 'Treviso', 'TV'),
(100, 6, 'Trieste', 'TS'),
(101, 6, 'Udine', 'UD'),
(102, 19, 'Valle d\'Aosta/Vallée d\'Aoste', 'AO'),
(103, 9, 'Varese', 'VA'),
(104, 20, 'Venezia', 'VE'),
(105, 12, 'Verbano-Cusio-Ossola', 'VB'),
(106, 12, 'Vercelli', 'VC'),
(107, 20, 'Verona', 'VR'),
(108, 3, 'Vibo Valentia', 'VV'),
(109, 20, 'Vicenza', 'VI'),
(110, 7, 'Viterbo', 'VT');

-- --------------------------------------------------------

--
-- Struttura della tabella `regioni`
--

DROP TABLE IF EXISTS `regioni`;
CREATE TABLE `regioni` (
  `id_regione` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `regioni`
--

INSERT INTO `regioni` (`id_regione`, `nome`) VALUES
(1, 'Abruzzo'),
(2, 'Basilicata'),
(3, 'Calabria'),
(4, 'Campania'),
(5, 'Emilia-Romagna'),
(6, 'Friuli-Venezia Giulia'),
(7, 'Lazio'),
(8, 'Liguria'),
(9, 'Lombardia'),
(10, 'Marche'),
(11, 'Molise'),
(12, 'Piemonte'),
(13, 'Puglia'),
(14, 'Sardegna'),
(15, 'Sicilia'),
(16, 'Toscana'),
(17, 'Trentino-Alto Adige/Südtirol'),
(18, 'Umbria'),
(19, 'Valle d\'Aosta/Vallée d\'Aoste'),
(20, 'Veneto');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birth_city` varchar(255) NOT NULL,
  `regione_id` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) VALUES
(1, 'Mario', 'Rossi', '2023-03-15', 'Torino', 18, 96, 'M', 'mariorossi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_regione` (`id_regione`);

--
-- Indici per le tabelle `regioni`
--
ALTER TABLE `regioni`
  ADD PRIMARY KEY (`id_regione`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `province`
--
ALTER TABLE `province`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT per la tabella `regioni`
--
ALTER TABLE `regioni`
  MODIFY `id_regione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`id_regione`) REFERENCES `regioni` (`id_regione`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
