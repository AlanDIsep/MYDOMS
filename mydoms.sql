-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2018 at 04:32 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `droitutilisateur`
--

CREATE TABLE `droitutilisateur` (
  `idDroitUtilisateur` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `idEquipement` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `Donnée` varchar(255) DEFAULT NULL,
  `NumeroDeSerie` int(11) DEFAULT NULL,
  `Piece_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `idFAQ` int(11) NOT NULL,
  `QuestionRecurentes` varchar(255) DEFAULT NULL,
  `Reponse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `habitation`
--

CREATE TABLE `habitation` (
  `idHabitation` int(11) NOT NULL,
  `Adresse` varchar(45) DEFAULT NULL,
  `Superficie` int(11) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `NombreHabitant` int(11) DEFAULT NULL,
  `NumUtilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infomydoms`
--

CREATE TABLE `infomydoms` (
  `Version` int(11) NOT NULL,
  `Element_txt` text,
  `Element_img` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panne`
--

CREATE TABLE `panne` (
  `idPanne` int(11) NOT NULL,
  `DescriptionPanne` text,
  `Type` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Equipement_id` int(11) DEFAULT NULL,
  `DroitUtilisateur_idDroitUtilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `idPiece` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Superficie` varchar(255) DEFAULT NULL,
  `Nom` varchar(45) DEFAULT NULL,
  `Habitation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `NumUtilisateur` int(11) NOT NULL,
  `Identifiant` varchar(255) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `Nom` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `AdresseFacturation` varchar(45) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NumeroDeTelephone` tinytext,
  `DroitUtilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `droitutilisateur`
--
ALTER TABLE `droitutilisateur`
  ADD PRIMARY KEY (`idDroitUtilisateur`);

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`idEquipement`),
  ADD KEY `fk_Equipement_Piece1_idx` (`Piece_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFAQ`);

--
-- Indexes for table `habitation`
--
ALTER TABLE `habitation`
  ADD PRIMARY KEY (`idHabitation`),
  ADD KEY `fk_Habitation_Utilisateur1_idx` (`NumUtilisateur_id`);

--
-- Indexes for table `infomydoms`
--
ALTER TABLE `infomydoms`
  ADD PRIMARY KEY (`Version`);

--
-- Indexes for table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`idPanne`,`DroitUtilisateur_idDroitUtilisateur`),
  ADD KEY `fk_Panne_Equipement1_idx` (`Equipement_id`),
  ADD KEY `fk_Panne_DroitUtilisateur1_idx` (`DroitUtilisateur_idDroitUtilisateur`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`idPiece`),
  ADD KEY `fk_Piece_Habitation1_idx` (`Habitation_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`NumUtilisateur`),
  ADD KEY `fk_Utilisateur_DroitUtilisateur_idx` (`DroitUtilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `droitutilisateur`
--
ALTER TABLE `droitutilisateur`
  MODIFY `idDroitUtilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `idEquipement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `habitation`
--
ALTER TABLE `habitation`
  MODIFY `idHabitation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infomydoms`
--
ALTER TABLE `infomydoms`
  MODIFY `Version` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `panne`
--
ALTER TABLE `panne`
  MODIFY `idPanne` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `idPiece` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `NumUtilisateur` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
