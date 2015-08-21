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
-- Structure de la table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `ID_match` int(11) NOT NULL AUTO_INCREMENT,
  `equipe_dom_id` int(11) NOT NULL,
  `equipe_vis_id` int(11) NOT NULL,
  `but_equipe_dom` int(2) NOT NULL DEFAULT '0',
  `but_equipe_vis` int(2) NOT NULL DEFAULT '0',
  `coupe` tinyint(1) NOT NULL DEFAULT '0',
  `journee_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_match`),
  KEY `fk_journee_id` (`journee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`ID_match`, `equipe_dom_id`, `equipe_vis_id`, `but_equipe_dom`, `but_equipe_vis`, `coupe`, `journee_id`) VALUES
(21, 39, 28, 0, 1, 0, 39),
(22, 30, 32, 0, 0, 0, 39),
(23, 36, 23, 1, 2, 0, 39),
(24, 40, 29, 0, 1, 0, 39),
(25, 24, 37, 2, 1, 0, 39),
(26, 27, 38, 1, 0, 0, 39),
(27, 41, 22, 0, 2, 0, 39),
(28, 35, 25, 1, 2, 0, 39),
(29, 26, 34, 2, 1, 0, 39),
(30, 33, 31, 0, 0, 0, 39),
(31, 23, 39, 0, 0, 0, 40),
(32, 34, 35, 1, 1, 0, 40),
(33, 30, 36, 3, 3, 0, 40),
(34, 38, 33, 0, 1, 0, 40),
(35, 37, 41, 1, 0, 0, 40),
(36, 22, 27, 0, 0, 0, 40),
(37, 29, 26, 1, 0, 0, 40),
(38, 25, 40, 1, 0, 0, 40),
(39, 31, 24, 1, 1, 0, 40),
(40, 28, 32, 2, 0, 0, 40),
(41, 41, 28, 0, 0, 0, 41),
(42, 33, 37, 0, 0, 0, 41),
(43, 36, 29, 0, 0, 0, 41),
(44, 27, 25, 0, 0, 0, 41),
(45, 24, 38, 0, 0, 0, 41),
(46, 26, 23, 0, 0, 0, 41),
(47, 32, 22, 0, 0, 0, 41),
(48, 39, 35, 0, 0, 0, 41),
(49, 31, 34, 0, 0, 0, 41),
(51, 40, 30, 0, 0, 0, 41);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `fk_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
