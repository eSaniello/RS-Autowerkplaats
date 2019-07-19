-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 01:49 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_autowerkplaats`
--

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruikers_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(1024) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`gebruikers_id`, `naam`, `voornaam`, `gebruikersnaam`, `wachtwoord`, `rol`) VALUES
(1, 'Tarantino', 'Bobby', 'bobbyt', 'bobbyboy2019', 'administratie'),
(2, 'Del aRosa', 'Juan', 'juandel', 'juandel', 'monteur'),
(3, 'Morgan', 'Alexa', 'alexamorgan', 'alexamorgan', 'administratie'),
(4, 'Olie', 'John', 'johno', 'johno', 'monteur');

-- --------------------------------------------------------

--
-- Table structure for table `keuring`
--

CREATE TABLE `keuring` (
  `keuring_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `voertuig_id` int(11) DEFAULT NULL,
  `gebruikers_id` int(11) DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nieuw_vervaldatum` date NOT NULL,
  `prijs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuring`
--

INSERT INTO `keuring` (`keuring_id`, `klant_id`, `voertuig_id`, `gebruikers_id`, `datum`, `nieuw_vervaldatum`, `prijs`) VALUES
(3, 4, 13, 2, '2019-07-19 11:44:09', '2019-07-25', 100),
(4, 5, 12, 2, '2019-07-19 11:44:42', '2020-07-31', 150);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `mobiel` int(255) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klant_id`, `naam`, `voornaam`, `mobiel`, `adres`) VALUES
(1, 'Latchmansing', 'Kenson', 8674832, 'Kailanweg 14'),
(2, 'Snow', 'John', 8865972, 'Hallo weg 15'),
(3, 'Lucas', 'Joyner', 8649231, 'Adhd strt 468'),
(4, 'Abraham', 'Lincon', 8649535, 'A. Lincon strt 37'),
(5, 'De Kom', 'Anton', 8659423, 'Anton de Kom strt 5');

-- --------------------------------------------------------

--
-- Table structure for table `reparatie`
--

CREATE TABLE `reparatie` (
  `reparatie_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `voertuig_id` int(11) DEFAULT NULL,
  `gebruikers_id` int(11) DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `omschrijving` varchar(255) NOT NULL,
  `prijs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reparatie`
--

INSERT INTO `reparatie` (`reparatie_id`, `klant_id`, `voertuig_id`, `gebruikers_id`, `datum`, `omschrijving`, `prijs`) VALUES
(1, 5, 11, 4, '2019-07-19 11:47:36', 'Koplamp verwisseld', 360),
(2, 3, 12, 2, '2019-07-16 03:00:00', 'nieuwe velgen geplaats', 9000),
(3, 2, 11, 4, '2019-07-07 03:00:00', 'voorruit verwisseld', 200),
(4, 1, 9, 4, '2019-07-19 11:48:48', 'nieuwe band geplaats', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tarief`
--

CREATE TABLE `tarief` (
  `categorie` varchar(11) NOT NULL,
  `wegsleep` double NOT NULL,
  `keuring` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarief`
--

INSERT INTO `tarief` (`categorie`, `wegsleep`, `keuring`) VALUES
('P1', 5, 50),
('P2', 10, 100),
('P3', 15, 150),
('P4', 20, 200);

-- --------------------------------------------------------

--
-- Table structure for table `voertuig`
--

CREATE TABLE `voertuig` (
  `voertuig_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `merk` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `bouwjaar` int(11) DEFAULT NULL,
  `kenteken_nr` varchar(255) NOT NULL,
  `chassis_nr` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `keuring_vervaldatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voertuig`
--

INSERT INTO `voertuig` (`voertuig_id`, `klant_id`, `merk`, `model`, `bouwjaar`, `kenteken_nr`, `chassis_nr`, `categorie`, `keuring_vervaldatum`) VALUES
(9, 1, 'Toyata', 'Ractis', NULL, 'PA 98-63', NULL, NULL, '0000-00-00'),
(10, 1, 'Kia', 'Optima', 2016, 'PD 53-85', '3KJ4B7K4J5G74', 'P3', '2019-07-20'),
(11, 3, 'Toyata', 'Mark-X', NULL, 'PD 36-82', NULL, NULL, '0000-00-00'),
(12, 5, 'Kia', 'Sorento', 2018, 'PF 64-76', 'KJH4KJ7B4KJ8G', 'P3', '2020-07-31'),
(13, 4, 'Nissan', 'Skyline', 2010, 'PA 47-18', 'LKJ4GLKJB7JH37J', 'P2', '2019-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `wegsleep`
--

CREATE TABLE `wegsleep` (
  `wegsleep_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `voertuig_id` int(11) DEFAULT NULL,
  `gebruikers_id` int(11) DEFAULT NULL,
  `wegsleep_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `afhaal_datum` date DEFAULT NULL,
  `prijs` double DEFAULT NULL,
  `voertuig_status` varchar(255) NOT NULL,
  `afstand_km` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wegsleep`
--

INSERT INTO `wegsleep` (`wegsleep_id`, `klant_id`, `voertuig_id`, `gebruikers_id`, `wegsleep_datum`, `afhaal_datum`, `prijs`, `voertuig_status`, `afstand_km`) VALUES
(8, NULL, 9, 1, '2019-07-18 13:07:28', NULL, NULL, 'binnen', 6),
(9, NULL, 11, 1, '2019-07-19 10:45:49', NULL, NULL, 'binnen', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruikers_id`);

--
-- Indexes for table `keuring`
--
ALTER TABLE `keuring`
  ADD PRIMARY KEY (`keuring_id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `voertuig_id` (`voertuig_id`),
  ADD KEY `gebruikers_id` (`gebruikers_id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `reparatie`
--
ALTER TABLE `reparatie`
  ADD PRIMARY KEY (`reparatie_id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `voertuig_id` (`voertuig_id`),
  ADD KEY `gebruikers_id` (`gebruikers_id`);

--
-- Indexes for table `tarief`
--
ALTER TABLE `tarief`
  ADD PRIMARY KEY (`categorie`);

--
-- Indexes for table `voertuig`
--
ALTER TABLE `voertuig`
  ADD PRIMARY KEY (`voertuig_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexes for table `wegsleep`
--
ALTER TABLE `wegsleep`
  ADD PRIMARY KEY (`wegsleep_id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `voertuig_id` (`voertuig_id`),
  ADD KEY `gebruikers_id` (`gebruikers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keuring`
--
ALTER TABLE `keuring`
  MODIFY `keuring_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reparatie`
--
ALTER TABLE `reparatie`
  MODIFY `reparatie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voertuig`
--
ALTER TABLE `voertuig`
  MODIFY `voertuig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wegsleep`
--
ALTER TABLE `wegsleep`
  MODIFY `wegsleep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keuring`
--
ALTER TABLE `keuring`
  ADD CONSTRAINT `keuring_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`),
  ADD CONSTRAINT `keuring_ibfk_2` FOREIGN KEY (`voertuig_id`) REFERENCES `voertuig` (`voertuig_id`),
  ADD CONSTRAINT `keuring_ibfk_3` FOREIGN KEY (`gebruikers_id`) REFERENCES `gebruiker` (`gebruikers_id`);

--
-- Constraints for table `reparatie`
--
ALTER TABLE `reparatie`
  ADD CONSTRAINT `reparatie_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`),
  ADD CONSTRAINT `reparatie_ibfk_2` FOREIGN KEY (`voertuig_id`) REFERENCES `voertuig` (`voertuig_id`),
  ADD CONSTRAINT `reparatie_ibfk_3` FOREIGN KEY (`gebruikers_id`) REFERENCES `gebruiker` (`gebruikers_id`);

--
-- Constraints for table `voertuig`
--
ALTER TABLE `voertuig`
  ADD CONSTRAINT `voertuig_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`);

--
-- Constraints for table `wegsleep`
--
ALTER TABLE `wegsleep`
  ADD CONSTRAINT `wegsleep_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`),
  ADD CONSTRAINT `wegsleep_ibfk_2` FOREIGN KEY (`voertuig_id`) REFERENCES `voertuig` (`voertuig_id`),
  ADD CONSTRAINT `wegsleep_ibfk_3` FOREIGN KEY (`gebruikers_id`) REFERENCES `gebruiker` (`gebruikers_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
