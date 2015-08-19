-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 19 Août 2015 à 09:36
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
-- Structure de la table `effectif`
--

CREATE TABLE IF NOT EXISTS `effectif` (
  `ID_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `poste` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT 'XXX',
  `num_maillot` varchar(2) NOT NULL,
  PRIMARY KEY (`ID_joueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE IF NOT EXISTS `equipes` (
  `ID_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stade` varchar(100) CHARACTER SET utf8 NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Structure de la table `journees`
--

CREATE TABLE IF NOT EXISTS `journees` (
  `ID_journee` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `saison` varchar(9) CHARACTER SET utf8 NOT NULL DEFAULT '2015/2016',
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`ID_journee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats_individuelles`
--

CREATE TABLE IF NOT EXISTS `stats_individuelles` (
  `ID_stat_indiv` int(11) NOT NULL AUTO_INCREMENT,
  `joueur_id` int(11) NOT NULL,
  `buts` int(2) NOT NULL DEFAULT '0',
  `passes` int(2) NOT NULL DEFAULT '0',
  `cleansheet` tinyint(1) NOT NULL DEFAULT '0',
  `peno_rate` int(2) NOT NULL DEFAULT '0',
  `peno_arrete` int(2) NOT NULL DEFAULT '0',
  `csc` int(2) NOT NULL DEFAULT '0',
  `faits_marquants` tinyint(1) NOT NULL DEFAULT '0',
  `description_faitmarquant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `journee_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_stat_indiv`),
  KEY `fk_joueur_id` (`joueur_id`),
  KEY `fk2_jounee_id` (`journee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `fk_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`);

--
-- Contraintes pour la table `stats_collectives`
--
ALTER TABLE `stats_collectives`
  ADD CONSTRAINT `fk2_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`),
  ADD CONSTRAINT `fk_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

--
-- Contraintes pour la table `stats_individuelles`
--
ALTER TABLE `stats_individuelles`
  ADD CONSTRAINT `fk2_jounee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`),
  ADD CONSTRAINT `fk_joueur_id` FOREIGN KEY (`joueur_id`) REFERENCES `effectif` (`ID_joueur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
