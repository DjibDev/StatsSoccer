-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 17 Août 2015 à 21:28
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`ID_match`, `equipe_dom_id`, `equipe_vis_id`, `but_equipe_dom`, `but_equipe_vis`, `coupe`, `journee_id`) VALUES
(1, 39, 28, 0, 0, 0, 39),
(2, 27, 38, 0, 0, 0, 39),
(3, 40, 29, 0, 0, 0, 39),
(4, 41, 22, 0, 0, 0, 39),
(5, 36, 23, 0, 0, 0, 39),
(6, 24, 37, 0, 0, 0, 39),
(7, 30, 32, 0, 0, 0, 39),
(8, 35, 25, 0, 0, 0, 39),
(9, 26, 34, 0, 0, 0, 39),
(10, 33, 31, 0, 0, 0, 39),
(11, 22, 27, 0, 0, 0, 40),
(12, 23, 39, 0, 0, 0, 40),
(13, 34, 35, 0, 0, 0, 40),
(14, 37, 41, 0, 0, 0, 40),
(15, 30, 36, 0, 0, 0, 40),
(16, 29, 26, 0, 0, 0, 40),
(17, 38, 33, 0, 0, 0, 40),
(18, 25, 40, 0, 0, 0, 40),
(19, 28, 32, 0, 0, 0, 40),
(20, 31, 24, 0, 0, 0, 40);

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
