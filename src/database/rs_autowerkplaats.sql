-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 04:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
  MODIFY `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuring`
--
ALTER TABLE `keuring`
  MODIFY `keuring_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reparatie`
--
ALTER TABLE `reparatie`
  MODIFY `reparatie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voertuig`
--
ALTER TABLE `voertuig`
  MODIFY `voertuig_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wegsleep`
--
ALTER TABLE `wegsleep`
  MODIFY `wegsleep_id` int(11) NOT NULL AUTO_INCREMENT;

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
