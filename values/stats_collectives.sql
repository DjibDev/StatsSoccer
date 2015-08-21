-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 21 Août 2015 à 10:20
-- Version du serveur: 5.5.44
-- Version de PHP: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stats`
--

-- --------------------------------------------------------

--
-- Structure de la table `stats_collectives`
--

CREATE TABLE IF NOT EXISTS `stats_collectives` (
  `ID_stat_collec` int(11) NOT NULL AUTO_INCREMENT,
  `victoire` tinyint(1) NOT NULL DEFAULT '0',
  `defaite` tinyint(1) NOT NULL DEFAULT '0',
  `nul` tinyint(1) NOT NULL DEFAULT '0',
  `buts_pour` int(11) NOT NULL DEFAULT '0',
  `buts_contre` int(11) NOT NULL DEFAULT '0',
  `diff` int(2) NOT NULL DEFAULT '0',
  `points` int(1) NOT NULL DEFAULT '0',
  `domicile` tinyint(1) NOT NULL,
  `journee_id` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_stat_collec`),
  KEY `fk2_journee_id` (`journee_id`),
  KEY `fk_equipe_id` (`equipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `stats_collectives`
--

INSERT INTO `stats_collectives` (`ID_stat_collec`, `victoire`, `defaite`, `nul`, `buts_pour`, `buts_contre`, `diff`, `points`, `domicile`, `journee_id`, `equipe_id`) VALUES
(1, 0, 1, 0, 0, 1, -1, 0, 1, 39, 39),
(2, 1, 0, 0, 1, 0, 1, 3, 0, 39, 28),
(3, 0, 0, 1, 0, 0, 0, 1, 1, 39, 30),
(4, 0, 0, 1, 0, 0, 0, 1, 0, 39, 32),
(5, 0, 1, 0, 1, 2, -1, 0, 1, 39, 36),
(6, 1, 0, 0, 2, 1, 1, 3, 0, 39, 23),
(7, 0, 1, 0, 0, 1, -1, 0, 1, 39, 40),
(8, 1, 0, 0, 1, 0, 1, 3, 0, 39, 29),
(9, 1, 0, 0, 2, 1, 1, 3, 1, 39, 24),
(10, 0, 1, 0, 1, 2, -1, 0, 0, 39, 37),
(11, 1, 0, 0, 1, 0, 1, 3, 1, 39, 27),
(12, 0, 1, 0, 0, 1, -1, 0, 0, 39, 38),
(13, 0, 1, 0, 0, 2, -2, 0, 1, 39, 41),
(14, 1, 0, 0, 2, 0, 2, 3, 0, 39, 22),
(15, 0, 1, 0, 1, 2, -1, 0, 1, 39, 35),
(16, 1, 0, 0, 2, 1, 1, 3, 0, 39, 25),
(17, 1, 0, 0, 2, 1, 1, 3, 1, 39, 26),
(18, 0, 1, 0, 1, 2, -1, 0, 0, 39, 34),
(19, 0, 0, 1, 0, 0, 0, 1, 1, 39, 33),
(20, 0, 0, 1, 0, 0, 0, 1, 0, 39, 31),
(21, 0, 0, 1, 0, 0, 0, 1, 1, 40, 23),
(22, 0, 0, 1, 0, 0, 0, 1, 0, 40, 39),
(23, 0, 0, 1, 1, 1, 0, 1, 1, 40, 34),
(24, 0, 0, 1, 1, 1, 0, 1, 0, 40, 35),
(25, 0, 0, 1, 3, 3, 0, 1, 1, 40, 30),
(26, 0, 0, 1, 3, 3, 0, 1, 0, 40, 36),
(27, 0, 1, 0, 0, 1, -1, 0, 1, 40, 38),
(28, 1, 0, 0, 1, 0, 1, 3, 0, 40, 33),
(29, 1, 0, 0, 1, 0, 1, 3, 1, 40, 37),
(30, 0, 1, 0, 0, 1, -1, 0, 0, 40, 41),
(31, 0, 0, 1, 0, 0, 0, 1, 1, 40, 22),
(32, 0, 0, 1, 0, 0, 0, 1, 0, 40, 27),
(33, 1, 0, 0, 1, 0, 1, 3, 1, 40, 29),
(34, 0, 1, 0, 0, 1, -1, 0, 0, 40, 26),
(35, 1, 0, 0, 1, 0, 1, 3, 1, 40, 25),
(36, 0, 1, 0, 0, 1, -1, 0, 0, 40, 40),
(37, 0, 0, 1, 1, 1, 0, 1, 1, 40, 31),
(38, 0, 0, 1, 1, 1, 0, 1, 0, 40, 24),
(39, 1, 0, 0, 2, 0, 2, 3, 1, 40, 28),
(40, 0, 1, 0, 0, 2, -2, 0, 0, 40, 32);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `stats_collectives`
--
ALTER TABLE `stats_collectives`
  ADD CONSTRAINT `fk2_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`),
  ADD CONSTRAINT `fk3_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`),
  ADD CONSTRAINT `fk_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
