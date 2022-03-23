-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 23 mars 2022 à 15:21
-- Version du serveur : 10.6.5-MariaDB
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
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `identifiant` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`identifiant`, `mdp`) VALUES
('a', '1');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `Id_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `numero_licence` int(8) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `chemin_photo` varchar(50) DEFAULT '../../photos/default_pic.png',
  `taille` smallint(1) DEFAULT NULL,
  `poids` float(4,1) DEFAULT NULL,
  `poste_prefere` varchar(50) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  PRIMARY KEY (`Id_joueur`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Id_joueur`, `nom`, `prenom`, `numero_licence`, `date_naissance`, `chemin_photo`, `taille`, `poids`, `poste_prefere`, `statut`, `commentaires`) VALUES
(24, 'Weasley', 'George', 4524, '2022-03-18', '../../photos/george_weasley.jpg', 180, 75.0, 'batteur', NULL, NULL),
(28, 'MonChéri', 'Augustin', 245638, '2020-09-04', '../../photos/oliver_wood.jpg', 190, 60.0, 'gardien', NULL, NULL),
(29, 'MonPtitChat', 'Yohann', 123554, '2022-03-24', '../../photos/ron_weasley.jpg', 180, 75.0, 'poursuiveur', NULL, NULL),
(30, 'Egerg', 'Eggegr', 22547851, '2003-01-23', '../../photos/cormac_mclaggen.jpg', 169, 80.0, 'attrapeur', NULL, NULL),
(31, 'Kenobi', 'Jean', 58746985, '1992-12-18', '../../photos/harry_potter.jpg', 174, 67.0, 'gardien', NULL, NULL),
(32, 'Ciboulette', 'Jardinet', 54712369, '1965-08-24', '../../photos/oliver_wood.jpg', 189, 76.0, 'batteur', NULL, NULL),
(33, 'Anna', 'Bonnemaison', 36874259, '2000-02-01', '../../photos/ginny_weasley.jpg', 165, 54.0, 'batteur', NULL, NULL),
(34, 'Vannier', 'Clara', 12369574, '2001-12-30', '../../photos/alicia_spinnet.jpg', 152, 67.0, 'poursuiveur', NULL, NULL),
(35, 'Duroc', 'Fiona', 36963233, '1996-05-24', '../../photos/angelina_johnson.jpg', 174, 60.0, 'poursuiveur', NULL, NULL),
(36, 'Trommer', 'Luc', 12475896, '1998-10-14', '../../photos/dean_thomas.jpg', 197, 89.0, 'poursuiveur', NULL, NULL),
(37, 'Carbolou', 'Seraphine', 36587493, '1992-03-11', '../../photos/default_pic.png', 152, 48.0, 'Attrapeur', NULL, NULL),
(38, 'Freoult', 'Jessica', 54712456, '2011-12-12', '../../photos/ginny_weasley.jpg', 178, 74.0, 'poursuiveur', NULL, NULL),
(39, 'Robin', 'William', 52365874, '1997-07-19', '../../photos/ron_weasley.jpg', 198, 78.0, 'attrapeur', NULL, NULL),
(40, 'Gros', 'Nicolas', 54871236, '1987-12-25', '../../photos/ron_weasley.jpg', 173, 88.0, 'gardien', NULL, NULL),
(41, 'Parker', 'Sona', 54789658, '1997-05-09', '../../photos/demelza_robbins.jpg', 160, 60.0, 'batteur', NULL, NULL),
(42, 'Ploufle', 'Isabelle', 54789745, '1987-11-26', '../../photos/ginny_weasley.jpg', 158, 62.0, 'batteur', NULL, NULL),
(43, 'Xerath', 'Ludovic', 54789654, '2000-04-23', '../../photos/fred_weasley.jpg', 200, 87.0, 'poursuiveur', NULL, NULL),
(44, 'Salvador', 'Stanislas', 54789653, '2003-05-22', '../../photos/oliver_wood.jpg', 189, 69.0, 'poursuiveur', NULL, NULL);

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
  `lieu` varchar(10) DEFAULT NULL,
  `score_equipe` int(11) DEFAULT NULL,
  `score_adverse` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_match_`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `match_`
--

INSERT INTO `match_` (`Id_match_`, `date_match`, `heure_match`, `equipe_adverse`, `lieu`, `score_equipe`, `score_adverse`) VALUES
(6, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(5, '2022-03-10', '18:05:00', 'egerg', 'domicile', NULL, NULL),
(7, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(8, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(9, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(10, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(11, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
