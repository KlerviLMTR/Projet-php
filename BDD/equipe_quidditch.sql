-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 avr. 2022 à 18:02
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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Id_joueur`, `nom`, `prenom`, `numero_licence`, `date_naissance`, `chemin_photo`, `taille`, `poids`, `poste_prefere`, `statut`, `commentaires`) VALUES
(56, 'Robbins', 'Demelza', 13221241, '1992-04-12', '../../photos/demelza_robbins.jpg', 172, 68.0, 'Batteur', 'Actif', 'Très bonne saison pour Demelza.'),
(47, 'Weasley', 'Ginny', 54518544, '1993-02-05', '../../photos/ginny_weasley.jpg', 163, 51.0, 'Poursuiveur', 'Actif', 'Ginny est en constante progression. Son match contre les Harpies était vraiment à tomber par terre!'),
(48, 'Potter', 'Harry', 71354465, '1991-07-31', '../../photos/harry_potter.jpg', 174, 57.0, 'Attrapeur', 'Actif', 'Harry est constant dans ce qu\'il propose en tant qu\'attrapeur. Mention spéciale au vif d\'or qu\'il a failli avaler lors de son premier match '),
(49, 'Dubois', 'Olivier', 98779894, '1989-05-12', '../../photos/oliver_wood.jpg', 181, 75.0, 'Gardien', 'Actif', 'Excellente saison de quidditch!'),
(50, 'McLaggen', 'Cormac', 78784644, '1991-02-16', '../../photos/cormac_mclaggen.jpg', 185, 82.0, 'Gardien', 'Actif', 'Cormac est un bon gardien, mais n\'a pas fait preuve d\'un très grand fair-play lors de ses derniers matchs.'),
(51, 'Johnson', 'Angelina', 75753876, '1990-05-04', '../../photos/angelina_johnson.jpg', 171, 59.0, 'Poursuiveur', 'Actif', 'Magnifique reprise de Souaffle contre les flèches d\'Appleby.'),
(52, 'Spinnet', 'Alicia', 45244553, '1990-12-15', '../../photos/alicia_spinnet.jpg', 165, 56.0, 'Poursuiveur', 'Actif', 'Une saison en demi-teinte pour Alicia qui doit encore prendre ses marques'),
(53, 'Weasley', 'Fred', 46545441, '1990-11-18', '../../photos/fred_weasley.jpg', 180, 72.0, 'Batteur', 'Actif', 'Fred est constant dans ses progrès. On aurait toutefois préféré qu\'il ne balance pas son cognard dans la tête de son frère.'),
(54, 'Bell', 'Katie', 98115231, '1990-01-13', '../../photos/katie_bell.jpg', 163, 51.0, 'Poursuiveur', 'Actif', 'Très bonne saison.\r\nNote à moi -même : Son Nimbus 2020 a besoin d\'être remplacé'),
(55, 'Thomas', 'Dean', 12115254, '1991-11-15', '../../photos/dean_thomas.jpg', 178, 59.0, 'Poursuiveur', 'Actif', 'En vacances jusqu\'à la fin de la saison !'),
(46, 'Weasley', 'George', 10545454, '1990-11-18', '../../photos/george_weasley.jpg', 180, 72.0, 'Batteur', 'Actif', 'Très bonne saison malgré le cognard que lui a malecontreusement lancé son frère Fred ...'),
(57, 'Weasley', 'Ron', 12103221, '1991-12-12', '../../photos/ron_weasley.jpg', 189, 79.0, 'Gardien', 'Actif', 'Ron est doué mais doit prendre confiance en lui! \r\n(et ne pas se laisser intimider par Cormac..)'),
(58, 'Lovegood', 'Luna', 98798754, '1991-09-18', '../../photos/luna_lovegood.png', 161, 47.0, 'Attrapeur', 'Actif', 'Luna est une très bonne attrapeuse, lorsqu\'elle n\'est pas dans la lune...'),
(59, 'Chang', 'Cho', 89465454, '1991-10-14', '../../photos/cho_chang.png', 162, 50.0, 'Attrapeur', 'Actif', 'Cho est très douée et est en constante progression ! '),
(60, 'Diggory', 'Cedric', 12424535, '1989-02-01', '../../photos/cedric_diggory.png', 182, 71.0, 'Attrapeur', 'Actif', 'Eh ouais. Il est pas mort en fait.'),
(61, 'Lestrange', 'Bellatrix', 66666666, '1968-09-14', '../../photos/bellatrix_lestrange.png', 168, 51.0, 'Batteur', 'Actif', 'Un talent certain pour balancer les cognards sur les autres! (et pas que sur les adversaires...)'),
(62, 'Trelawney', 'Sybille', 48744544, '1964-08-02', '../../photos/sybille_trelawney.png', 168, 50.0, 'Poursuiveur', 'Actif', 'Bien meilleure poursuiveuse qu\'elle n\'est voyante! \r\n(A toutefois un souci avec le Xerès.. à surveiller)'),
(63, 'Rogue', 'Severus', 46432152, '1968-06-12', '../../photos/severus_rogue.png', 182, 78.0, 'Poursuiveur', 'Actif', 'Always.'),
(64, 'Finnigan', 'Seamus', 57445645, '1991-03-28', '../../photos/seamus_finnigan.png', 172, 56.0, 'Batteur', 'Actif', NULL),
(65, 'Hagrid', 'Rubeus', 8568788, '1964-09-21', '../../photos/rubeus_hagrid.png', 351, 254.0, 'Batteur', 'Actif', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `match_`
--

INSERT INTO `match_` (`Id_match_`, `date_match`, `heure_match`, `equipe_adverse`, `lieu`, `score_equipe`, `score_adverse`) VALUES
(18, '2022-04-01', '18:00:00', 'Puddlemere United', 'Domicile', 170, 40),
(19, '2021-06-02', '19:00:00', 'Appleby Arrows', 'Exterieur', 10, 150),
(17, '2022-03-15', '20:00:00', 'Pride of Portree', 'Domicile', 160, 170),
(12, '2022-04-10', '21:00:00', 'Catapultes de Caerphilly', 'Domicile', NULL, NULL),
(20, '2021-08-25', '14:30:00', 'Wimbourne Wasps', 'Domicile', 500, 480),
(14, '2022-04-30', '00:00:00', 'Harpies de Holyhead', 'Domicile', NULL, NULL),
(16, '2022-01-06', '13:30:00', 'Harpies de Holyhead', 'Exterieur', 180, 90);

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
(48, 6, 0, 3),
(46, 6, 0, 3),
(44, 6, 0, 3),
(47, 6, 0, 3),
(49, 6, 0, NULL),
(48, 17, 1, 1),
(56, 17, 1, 3),
(53, 17, 1, 4),
(49, 17, 1, 2),
(47, 17, 1, 4),
(51, 17, 1, 3),
(52, 17, 1, 3),
(48, 12, 1, NULL),
(56, 12, 1, NULL),
(65, 12, 1, NULL),
(50, 12, 1, NULL),
(47, 12, 1, NULL),
(52, 12, 1, NULL),
(55, 12, 1, NULL),
(60, 12, 0, NULL),
(53, 12, 0, NULL),
(64, 12, 0, NULL),
(57, 12, 0, NULL),
(51, 12, 0, NULL),
(62, 12, 0, NULL),
(63, 12, 0, NULL),
(59, 14, 1, NULL),
(46, 14, 1, NULL),
(61, 14, 1, NULL),
(50, 14, 1, NULL),
(54, 14, 1, NULL),
(62, 14, 1, NULL),
(63, 14, 1, NULL),
(58, 14, 0, NULL),
(53, 14, 0, NULL),
(64, 14, 0, NULL),
(57, 14, 0, NULL),
(51, 14, 0, NULL),
(52, 14, 0, NULL),
(55, 14, 0, NULL),
(48, 16, 1, 5),
(53, 16, 1, 3),
(65, 16, 1, 5),
(57, 16, 1, 2),
(51, 16, 1, 5),
(54, 16, 1, 5),
(62, 16, 1, 2),
(58, 16, 0, 4),
(56, 16, 0, 1),
(46, 16, 0, 4),
(50, 16, 0, 2),
(52, 16, 0, 3),
(55, 16, 0, 3),
(63, 16, 0, 4),
(60, 18, 1, 5),
(56, 18, 1, 3),
(46, 18, 1, 4),
(50, 18, 1, 2),
(55, 18, 1, 4),
(62, 18, 1, 4),
(63, 18, 1, 5),
(58, 18, 0, 5),
(61, 18, 0, 1),
(64, 18, 0, 2),
(57, 18, 0, 5),
(51, 18, 0, 2),
(52, 18, 0, 2),
(54, 18, 0, 4),
(59, 20, 1, 1),
(56, 20, 1, 4),
(46, 20, 1, 3),
(50, 20, 1, 2),
(47, 20, 1, 4),
(52, 20, 1, 4),
(54, 20, 1, 2),
(58, 20, 0, 5),
(53, 20, 0, 5),
(48, 19, 1, 4),
(56, 19, 1, 3),
(46, 19, 1, 3),
(50, 19, 1, 1),
(55, 19, 1, 4),
(62, 19, 1, 3),
(63, 19, 1, 2),
(60, 19, 0, 3),
(53, 19, 0, 2),
(61, 19, 0, 5),
(57, 19, 0, 3),
(47, 19, 0, 4),
(51, 19, 0, 2),
(52, 19, 0, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
