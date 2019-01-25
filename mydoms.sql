-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2019 at 08:36 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `mydoms`
--
CREATE DATABASE IF NOT EXISTS `mydoms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydoms`;

-- --------------------------------------------------------

--
-- Table structure for table `cheminLumineux`
--

CREATE TABLE `cheminLumineux` (
  `idCheminLumineux` int(11) NOT NULL,
  `EtatCheminLumineux` varchar(3) DEFAULT NULL,
  `NomCheminLumineux` varchar(255) DEFAULT NULL,
  `Capteur1` varchar(15) DEFAULT NULL,
  `IntensiteCapteur1` int(11) NOT NULL,
  `Capteur2` varchar(25) DEFAULT NULL,
  `IntensiteCapteur2` int(11) NOT NULL,
  `Capteur3` varchar(25) DEFAULT NULL,
  `IntensiteCapteur3` int(11) NOT NULL,
  `Capteur4` varchar(15) DEFAULT NULL,
  `IntensiteCapteur4` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheminLumineux`
--

INSERT INTO `cheminLumineux` (`idCheminLumineux`, `EtatCheminLumineux`, `NomCheminLumineux`, `Capteur1`, `IntensiteCapteur1`, `Capteur2`, `IntensiteCapteur2`, `Capteur3`, `IntensiteCapteur3`, `Capteur4`, `IntensiteCapteur4`, `idUser`) VALUES
(11, '0', 'Salle de bains --> Salon', 'Salle de bains', 50, 'Chambre 1', 75, 'Salon', 100, '0', 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `connectes`
--

CREATE TABLE `connectes` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connectes`
--

INSERT INTO `connectes` (`ip`, `timestamp`) VALUES
('::1', 1548189373);

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
  `Donnee` varchar(255) DEFAULT NULL,
  `NumeroDeSerie` int(11) DEFAULT NULL,
  `Piece_id` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `consigne` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`idEquipement`, `Type`, `Nom`, `Etat`, `Donnee`, `NumeroDeSerie`, `Piece_id`, `idUser`, `consigne`) VALUES
(6, 'Éclairage', 'Chambre 1', 1, '100', 12345, 1, 21, 50),
(5, 'Température', 'Chambre 1', 1, '26', 1234, 1, 21, 23),
(10, 'Température', 'Chambre 4', 0, '18', 1111, NULL, 21, 23),
(11, 'Éclairage', 'Salon', 0, '79', 111, NULL, 21, 50),
(12, 'Éclairage', 'Cuisine', 0, '20', 123, NULL, 21, 50),
(13, 'Éclairage', 'Salle de bains', 0, '100', 156, NULL, 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `idFAQ` int(11) NOT NULL,
  `QuestionRecurentes` varchar(255) DEFAULT NULL,
  `Reponse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`idFAQ`, `QuestionRecurentes`, `Reponse`) VALUES
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `graph`
--

CREATE TABLE `graph` (
  `idEquipement` int(11) NOT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP,
  `CompteurTemp` int(255) DEFAULT NULL,
  `CompteurLum` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graph`
--

INSERT INTO `graph` (`idEquipement`, `Date`, `CompteurTemp`, `CompteurLum`, `idUser`) VALUES
(1, '2019-01-06 21:32:09', 1, 1, 21),
(2, '2019-01-15 00:00:00', 1, 1, 21),
(3, '2019-01-06 20:32:09', 1, 1, 21),
(100, '2019-01-11 11:45:15', 1, 1, 21),
(101, '2019-01-15 13:22:57', 1, 1, 21),
(102, '2019-01-15 10:00:00', NULL, 1, 21),
(103, '2019-01-15 13:48:05', NULL, 1, 21),
(104, '2019-01-15 07:57:33', NULL, 1, 21),
(105, '2019-01-15 13:57:47', NULL, 1, 21),
(106, '2019-01-15 13:57:55', NULL, 1, 21),
(107, '2019-01-15 14:06:47', NULL, 1, 21),
(108, '2019-01-15 14:07:16', NULL, 1, 21),
(109, '2019-01-15 14:08:06', NULL, 1, 21),
(110, '2019-01-15 14:08:16', NULL, 1, 21),
(111, '2019-01-15 14:08:28', NULL, 1, 21),
(112, '2019-01-15 14:08:29', NULL, 1, 21),
(113, '2019-01-15 14:08:29', NULL, 1, 21),
(114, '2019-01-15 14:08:30', NULL, 1, 21),
(115, '2019-01-15 14:08:31', NULL, 1, 21),
(116, '2019-01-15 14:21:38', NULL, 1, 21),
(117, '2019-01-15 14:21:45', NULL, 1, 21),
(118, '2019-01-15 14:21:55', NULL, 1, 21),
(119, '2019-01-15 14:22:05', NULL, 1, 21),
(120, '2019-01-15 14:22:11', NULL, 1, 21),
(121, '2019-01-15 14:22:36', NULL, 1, 21),
(122, '2019-01-16 19:47:23', NULL, 1, 21),
(123, '2019-01-16 20:14:41', 1, NULL, 21),
(124, '2019-01-16 20:14:44', 1, NULL, 21),
(125, '2019-01-16 20:14:46', 1, NULL, 21),
(126, '2019-01-16 20:14:50', NULL, 1, 21),
(127, '2019-01-18 09:53:59', 1, NULL, 21),
(128, '2019-01-18 09:54:00', 1, NULL, 21),
(129, '2019-01-18 09:54:03', NULL, 1, 21),
(130, '2019-01-18 11:39:14', NULL, 1, 21),
(131, '2019-01-18 11:43:26', 1, NULL, 21),
(132, '2019-01-18 12:06:06', NULL, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `habitation`
--

CREATE TABLE `habitation` (
  `idHabitation` int(11) NOT NULL,
  `Adresse` varchar(85) DEFAULT NULL,
  `Superficie` char(145) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `NombreHabitant` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `NomMaison` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `habitation`
--

INSERT INTO `habitation` (`idHabitation`, `Adresse`, `Superficie`, `CodePostal`, `Pays`, `NombreHabitant`, `idUtilisateur`, `NomMaison`) VALUES
(18, '36 rue d\'auteuil', '64', 75016, 'France', 3, 19, 'Cyrille'),
(19, 'Chateau de bray', '41', 14190, 'France', 2, 21, 'Maison issy');

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
  `typePanne` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Equipement_id` int(11) DEFAULT NULL,
  `DroitUtilisateur_idDroitUtilisateur` int(11) NOT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panne`
--

INSERT INTO `panne` (`idPanne`, `DescriptionPanne`, `typePanne`, `Date`, `Equipement_id`, `DroitUtilisateur_idDroitUtilisateur`, `IdUtilisateur`) VALUES
(8, 'Bonjour, \r\n\r\nJ\'ai un problème avec mon capteur de la chambre 1 qui ne semble pas fonctionner. Merci de venir vérifier.\r\n\r\nCordialement,\r\n', 'Panne du capteur de Température', '2019-01-07 00:00:00', 6, 21, NULL);

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
-- Table structure for table `typePanne`
--

CREATE TABLE `typePanne` (
  `typePanne` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typePanne`
--

INSERT INTO `typePanne` (`typePanne`) VALUES
('Panne du capteur de Lumière'),
('Panne du capteur de Température'),
('Panne interface utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `AdresseMail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Nom` varchar(145) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `AdresseFacturation` varchar(45) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `NumeroDeTelephone` tinytext,
  `DroitUtilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `AdresseMail`, `password`, `Nom`, `Prenom`, `DateDeNaissance`, `AdresseFacturation`, `CodePostal`, `Ville`, `Pays`, `NumeroDeTelephone`, `DroitUtilisateur_id`) VALUES
(21, 'utilisateur@domisep.fr', '869400f8978e2c5905d3aef6577f93e3', 'User', 'Gestion', '2019-01-08', '20 rue Notre Dame des Champs', 75006, 'Paris', 'FRANCE', '0642010357', 2),
(22, 'administrateur@domisep.fr', '372eeffaba2b5b61fb02513ecb84f1ff', 'Admin', 'Monsieur', '1997-10-03', '20 rue Notre Dame des Champs', 75006, 'Paris', 'France', '0642010357', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheminLumineux`
--
ALTER TABLE `cheminLumineux`
  ADD PRIMARY KEY (`idCheminLumineux`),
  ADD KEY `fk_Equipement_Piece1_idx` (`Capteur4`);

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
-- Indexes for table `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`idEquipement`);

--
-- Indexes for table `habitation`
--
ALTER TABLE `habitation`
  ADD PRIMARY KEY (`idHabitation`),
  ADD KEY `fk_Habitation_Utilisateur1_idx` (`idUtilisateur`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Utilisateur_DroitUtilisateur_idx` (`DroitUtilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheminLumineux`
--
ALTER TABLE `cheminLumineux`
  MODIFY `idCheminLumineux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `droitutilisateur`
--
ALTER TABLE `droitutilisateur`
  MODIFY `idDroitUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `idEquipement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `graph`
--
ALTER TABLE `graph`
  MODIFY `idEquipement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `habitation`
--
ALTER TABLE `habitation`
  MODIFY `idHabitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `infomydoms`
--
ALTER TABLE `infomydoms`
  MODIFY `Version` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panne`
--
ALTER TABLE `panne`
  MODIFY `idPanne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `idPiece` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Database: `mydoms1`
--
CREATE DATABASE IF NOT EXISTS `mydoms1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydoms1`;

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
  `id` int(11) NOT NULL,
  `AdresseMail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Nom` varchar(145) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `AdresseFacturation` varchar(45) DEFAULT NULL,
  `CodePostal` int(11) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `NumeroDeTelephone` tinytext,
  `DroitUtilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `AdresseMail`, `password`, `Nom`, `Prenom`, `DateDeNaissance`, `AdresseFacturation`, `CodePostal`, `Ville`, `Pays`, `NumeroDeTelephone`, `DroitUtilisateur_id`) VALUES
(18, 'cyrillou97@gmail.com', '$2y$10$X.9lVeJ2pS4Eb5cX16SMGOJ3oZeh55eUr7pA36l.R2o7KqMCOpE2W', 'ADAM', 'Cyrille', '1997-10-03', 'avenue de la maix', 75016, 'PARIS 16', 'France', '0642010357', 2);

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Database: `TP_PHP_SQL_G1A_CA`
--
CREATE DATABASE IF NOT EXISTS `TP_PHP_SQL_G1A_CA` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `TP_PHP_SQL_G1A_CA`;

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `texte`, `date`, `idUtilisateur`) VALUES
(1, 'Winter is Coming', 'Cherche vêtement chaud en poils de loups pour hiver long froid à venir', '1996-08-01', 5),
(2, 'Camping car', 'A vendre : camping car pouvant faire office de maison, très bon état, quelques traces liées à des expériences de chimie.', '2008-01-20', 6),
(3, 'Deux Roues', 'Recherche désespérément moto volée à proximité d\'Alexandria', '2016-10-23', 7),
(4, 'Guillaume Tell', 'Recherche arbalète perdue aux abords d\'Alexandria.', '2016-12-11', 7),
(5, 'Lucille', 'A vendre : batte de baseball très usée mais toujours utilisable.', '2016-10-23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Immobilier', 'Maisons et appartements à louer ou acheter'),
(2, 'Véhicules', 'Voitures, camions, vélos, ...'),
(3, 'Animaux', 'Des chats, des chiens, voire plus exotiques'),
(4, 'Sport', 'Tous les sports, pour tous les âges'),
(5, 'Mode', 'Il en faut pour tous les goûts');

-- --------------------------------------------------------

--
-- Table structure for table `classement`
--

CREATE TABLE `classement` (
  `id` int(11) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classement`
--

INSERT INTO `classement` (`id`, `idAnnonce`, `idCategorie`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 4, 4),
(7, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(6, 'Dupond', 'Richard', 'WalterWhite', 'dd1a432d5aff5b1c4a8d45207d49e9fcfccff8c5'),
(5, 'White', 'John', 'JohnSnow', 'a24836c226a625a4f2f7bbfeaeb283e4f227095e'),
(7, 'Smith', 'Georges', 'DarylDixon', '4207665616570d86a8e50eb374dec4086747cc98'),
(8, 'Martin', 'Lilas', 'Negan', '21ee35473f990e54c12651ff06eedb6906ed6ae5'),
(9, '', '', 'adam.cyrille@hotmail.fr', '$2y$10$/aDgjfjNijs4vPe1JC.LB.6nfsAZKCvmMzeyVGUgiZ5IrYU9sLYlK'),
(10, 'adam', 'cyrille', 'adam', '$2y$10$dqE3vtaKvwjC9Nkmjh74/uLeazIez0hOh6DQpcif7DvTfvOm8OjkO'),
(11, 'adam', 'adam', 'adam', '$2y$10$3x5QpUcbMSGQAoVX9wxTgONFWEIzw1V//kVFCH4nit8YRAMLvk3f.'),
(12, 'ADAM', 'Cyrille', 'adam.cyrille@hotmail.fr', '$2y$10$RNhAQPW6sMULM1vMARgc.uQHR6NQPWRS8HEgPLea83PY2Fg932tom'),
(13, 'ADAM', 'Cyrille', 'adam.cyrille@hotmail.fr', '$2y$10$/6wbyss5OE4CeKuYReexx.yRau66yzH68otUus6SDw2EbIIkMoBcC'),
(14, 'ADAM', 'Cyrille', 'adam.cyrille@hotmail.fr', '$2y$10$/HHFuDks7tmX0ohxebFcb.aVlGYAND.HOR4NcbKWVm32KflEEVtSq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classement`
--
ALTER TABLE `classement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classement`
--
ALTER TABLE `classement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
