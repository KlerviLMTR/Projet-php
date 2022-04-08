-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 avr. 2022 à 14:44
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
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `identifiant` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`identifiant`, `mdp`) VALUES
('a', 'c4ca4238a0b923820dcc509a6f75849b'),
('b', '1'),
('b', '1');

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
  `commentaires` text,
  PRIMARY KEY (`Id_joueur`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Id_joueur`, `nom`, `prenom`, `numero_licence`, `date_naissance`, `chemin_photo`, `taille`, `poids`, `poste_prefere`, `statut`, `commentaires`) VALUES
(24, 'Weasley', 'George', 45244568, '2022-03-18', '../../photos/george_weasley.jpg', 180, 75.0, 'Batteur', NULL, NULL),
(30, 'Egerg', 'Edgar', 22547851, '2003-01-23', '../../photos/cormac_mclaggen.jpg', 169, 80.0, 'Attrapeur', NULL, NULL),
(31, 'Kenobi', 'Jean', 58746985, '1992-12-18', '../../photos/harry_potter.jpg', 174, 67.0, 'Gardien', NULL, NULL),
(32, 'Ciboulette', 'Jardinet', 54712369, '1965-08-24', '../../photos/oliver_wood.jpg', 189, 76.0, 'Batteur', NULL, NULL),
(33, 'Anna', 'Bonnemaison', 36874259, '2000-02-01', '../../photos/ginny_weasley.jpg', 165, 54.0, 'Batteur', NULL, NULL),
(34, 'Vannier', 'Clara', 12369574, '2001-12-30', '../../photos/alicia_spinnet.jpg', 152, 67.0, 'Poursuiveur', NULL, NULL),
(35, 'Duroc', 'Fiona', 36963233, '1996-05-24', '../../photos/angelina_johnson.jpg', 174, 60.0, 'Poursuiveur', NULL, NULL),
(36, 'Trommer', 'Luc', 12475896, '1998-10-14', '../../photos/dean_thomas.jpg', 197, 89.0, 'Poursuiveur', NULL, NULL),
(37, 'Carbolou', 'Seraphine', 36587493, '1992-03-11', '../../photos/default_pic.png', 152, 48.0, 'Attrapeur', NULL, NULL),
(38, 'Freoult', 'Jessica', 54712456, '2011-12-12', '../../photos/ginny_weasley.jpg', 178, 74.0, 'Poursuiveur', NULL, NULL),
(39, 'Robin', 'William', 52365874, '1997-07-19', '../../photos/ron_weasley.jpg', 198, 78.0, 'Attrapeur', NULL, NULL),
(40, 'Gros', 'Nicolas', 54871236, '1987-12-25', '../../photos/ron_weasley.jpg', 173, 88.0, 'Gardien', NULL, NULL),
(41, 'Parker', 'Sona', 54789658, '1997-05-09', '../../photos/demelza_robbins.jpg', 160, 60.0, 'Batteur', NULL, NULL),
(42, 'Ploufle', 'Isabelle', 54789745, '1987-11-26', '../../photos/ginny_weasley.jpg', 158, 62.0, 'Batteur', NULL, NULL),
(43, 'Xerath', 'Ludovic', 54789654, '2000-04-23', '../../photos/fred_weasley.jpg', 200, 87.0, 'Poursuiveur', NULL, NULL),
(44, 'Salvador', 'Stanislas', 54789653, '2003-05-22', '../../photos/oliver_wood.jpg', 189, 69.0, 'Poursuiveur', NULL, NULL),
(45, 'Cobra', 'Jean', 21547896, '1999-12-12', '../../photos/ron_weasley.jpg', 189, 78.0, 'Attrapeur', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `match_`
--

INSERT INTO `match_` (`Id_match_`, `date_match`, `heure_match`, `equipe_adverse`, `lieu`, `score_equipe`, `score_adverse`) VALUES
(6, '2021-01-02', '20:00:00', 'Harpies de Holyhead', 'exterieur', 150, 7),
(5, '2021-05-03', '18:00:00', 'Harpies de Holyhead', 'domicile', 64, 189),
(7, '2022-01-02', '20:00:00', 'Harpies de Holyhead', 'exterieur', 90, 90),
(8, '2022-02-02', '20:00:00', 'Flèches d\'Appleby', 'exterieur', 45, 40),
(9, '2022-03-02', '18:43:00', 'Flèches d\'Appleby', 'exterieur', 0, 150),
(10, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(11, '2022-03-02', '18:43:00', 'sqd', 'exterieur', NULL, NULL),
(12, '2022-04-23', '20:00:00', 'Tourterelles des Olivers', 'Domicile', NULL, NULL);

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

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`Id_joueur`, `Id_match_`, `etre_titulaire_o_n_`, `performance`) VALUES
(30, 6, 1, 5),
(31, 6, 1, 3),
(32, 6, 1, 5),
(33, 6, 1, 1),
(35, 6, 1, 4),
(34, 6, 1, 3),
(37, 6, 1, 5),
(39, 6, 0, NULL),
(40, 6, 0, 3),
(41, 6, 0, 3),
(24, 6, 0, NULL),
(44, 6, 0, 3),
(43, 6, 0, NULL),
(38, 6, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
