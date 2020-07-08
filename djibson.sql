-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 jan. 2020 à 22:02
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `djibson`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

DROP TABLE IF EXISTS `amis`;
CREATE TABLE IF NOT EXISTS `amis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL,
  `id_amis` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ids` (`id_membre`) USING BTREE,
  KEY `id_amis` (`id_amis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `amis`
--

INSERT INTO `amis` (`id`, `id_membre`, `id_amis`, `mail`, `telephone`) VALUES
(1, 5, 4, 'sby@gmail.com', '078207718'),
(3, 2, 5, 'ba.sambaàgmail.com', '0782077158'),
(4, 4, 5, 'booba', '0782077158'),
(5, 4, 2, 'shahoul95@gmail.com', '0782077158');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membres` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `mot_passes` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `equipe` varchar(255) DEFAULT NULL,
  `poste` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_membres`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membres`, `login`, `mot_passes`, `nom`, `prenom`, `phone`, `equipe`, `poste`) VALUES
(2, 'shaik95@gmail.com', '$2y$10$Kxn9XiTV0DvL.6KAoBnBnuMnvnK4Y4eRRdcXzyZxUHcVVTW.hmJSW', 'Imrane', 'SHAIK', '0782077154', 'etienne', 'mlf'),
(4, 'sby@gmail.com', '$2y$10$NSHBn7XS4/JBKwvG0rYDkOBlAn6Stm4sgN278DfCbEz7M8HNmJk.W', 'imrane', 'Sabri BEN YEDDER', '078207718', 'Senior', 'Attaquant'),
(5, 'ba.samba@gmail.com', '$2y$10$RiQEPYLnHyU.AfKVs34jMe4HYp6pvgDHT7VbI9y1iR5PHyIvVffJW', 'Toulaye', 'Samba Ba', '0782077158', 'Senior', 'Milieu de terrain');

-- --------------------------------------------------------

--
-- Structure de la table `message_recu`
--

DROP TABLE IF EXISTS `message_recu`;
CREATE TABLE IF NOT EXISTS `message_recu` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `destinataire` varchar(255) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `heure` datetime(6) NOT NULL,
  `vue` int(1) DEFAULT NULL,
  `non_vue` int(1) DEFAULT NULL,
  PRIMARY KEY (`ids`),
  KEY `id_membre` (`expediteur`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message_recu`
--

INSERT INTO `message_recu` (`ids`, `destinataire`, `expediteur`, `message`, `heure`, `vue`, `non_vue`) VALUES
(45, 'Samba Ba', 4, 'sssssaszqdqf', '2020-01-13 21:56:01.000000', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membres`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`id_amis`) REFERENCES `membre` (`id_membres`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message_recu`
--
ALTER TABLE `message_recu`
  ADD CONSTRAINT `message_recu_ibfk_1` FOREIGN KEY (`expediteur`) REFERENCES `membre` (`id_membres`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
