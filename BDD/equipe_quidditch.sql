-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 mars 2022 à 12:36
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `equipe_quidditch`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `Id_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `numero_licence` int(11) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `chemin_photo` varchar(50) DEFAULT NULL,
  `taille` smallint(1) DEFAULT NULL,
  `poids` float(4,1) DEFAULT NULL,
  `poste_prefere` varchar(50) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_joueur`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Id_joueur`, `nom`, `prenom`, `numero_licence`, `date_naissance`, `chemin_photo`, `taille`, `poids`, `poste_prefere`, `statut`) VALUES
(24, 'Weasley', 'George', 4524, '2022-03-18', '../../photos/george_weasley.jpg', 180, 75.0, 'batteur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `match_`
--

DROP TABLE IF EXISTS `match_`;
CREATE TABLE IF NOT EXISTS `match_` (
  `Id_match_` int(11) NOT NULL AUTO_INCREMENT,
  `date_match` date DEFAULT NULL,
  `heure_match` time DEFAULT NULL,
  `equipe_adverse` varchar(50) DEFAULT NULL,
  `lieu_rencontre` varchar(50) DEFAULT NULL,
  `resultat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_match_`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note_personnelle`
--

DROP TABLE IF EXISTS `note_personnelle`;
CREATE TABLE IF NOT EXISTS `note_personnelle` (
  `Id_note_personnelle` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text,
  `statut` varchar(50) DEFAULT NULL,
  `date_note` date DEFAULT NULL,
  `Id_joueur` int(11) NOT NULL,
  PRIMARY KEY (`Id_note_personnelle`),
  KEY `Id_joueur` (`Id_joueur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `Id_joueur` int(11) NOT NULL,
  `Id_match_` int(11) NOT NULL,
  `etre_titulaire_o_n_` tinyint(1) DEFAULT NULL,
  `performance` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_joueur`,`Id_match_`),
  KEY `Id_match_` (`Id_match_`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
