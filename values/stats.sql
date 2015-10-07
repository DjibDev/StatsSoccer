-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 07 Octobre 2015 à 12:03
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
-- Structure de la table `classement`
--

CREATE TABLE IF NOT EXISTS `classement` (
  `ID_classement` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement`),
  KEY `fk4_equipe_id` (`equipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `classement_coupe`
--

CREATE TABLE IF NOT EXISTS `classement_coupe` (
  `ID_classement_coupe` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_coupe`),
  KEY `fk4_equipe_id` (`equipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classement_domicile`
--

CREATE TABLE IF NOT EXISTS `classement_domicile` (
  `ID_classement_dom` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_dom`),
  KEY `fk4_equipe_id` (`equipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classement_exterieur`
--

CREATE TABLE IF NOT EXISTS `classement_exterieur` (
  `ID_classement_dom` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_dom`),
  KEY `fk4_equipe_id` (`equipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classement_players`
--

CREATE TABLE IF NOT EXISTS `classement_players` (
  `ID_classement_players` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(11) NOT NULL,
  `nb_buts` int(2) NOT NULL,
  `nb_passes` int(2) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_players`),
  KEY `fk3_joueur_id` (`joueur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `effectif`
--

CREATE TABLE IF NOT EXISTS `effectif` (
  `ID_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'N.C.',
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'N.C.',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'xx@xx.fr',
  `poste` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT 'XXX',
  `num_maillot` varchar(2) NOT NULL DEFAULT 'NC',
  PRIMARY KEY (`ID_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipes_coupe`
--

CREATE TABLE IF NOT EXISTS `equipes_coupe` (
  `ID_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stade` varchar(100) CHARACTER SET utf8 NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `journees`
--

CREATE TABLE IF NOT EXISTS `journees` (
  `ID_journee` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `saison` varchar(9) CHARACTER SET utf8 NOT NULL DEFAULT '2015/2016',
  `numero` int(11) NOT NULL,
  `coupe` tinyint(1) NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_journee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats_collectives_coupe`
--

CREATE TABLE IF NOT EXISTS `stats_collectives_coupe` (
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
  `description_faitmarquant` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT 'néant',
  `journee_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_stat_indiv`),
  KEY `fk_joueur_id` (`joueur_id`),
  KEY `fk2_jounee_id` (`journee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classement`
--
ALTER TABLE `classement`
  ADD CONSTRAINT `fk4_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

--
-- Contraintes pour la table `classement_coupe`
--
ALTER TABLE `classement_coupe`
  ADD CONSTRAINT `classement_coupe_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes_coupe` (`ID_equipe`);

--
-- Contraintes pour la table `classement_domicile`
--
ALTER TABLE `classement_domicile`
  ADD CONSTRAINT `classement_domicile_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

--
-- Contraintes pour la table `classement_exterieur`
--
ALTER TABLE `classement_exterieur`
  ADD CONSTRAINT `classement_exterieur_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

--
-- Contraintes pour la table `classement_players`
--
ALTER TABLE `classement_players`
  ADD CONSTRAINT `fk3_joueur_id` FOREIGN KEY (`joueur_id`) REFERENCES `effectif` (`ID_joueur`);

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
  ADD CONSTRAINT `fk3_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`),


-- Contraintes pour la table `stats_collectives_coupe`
--
ALTER TABLE `stats_collectives_coupe`
  ADD CONSTRAINT `fk6_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`),
  ADD CONSTRAINT `fk5_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes_coupe` (`ID_equipe`),

--
-- Contraintes pour la table `stats_individuelles`
--
ALTER TABLE `stats_individuelles`
  ADD CONSTRAINT `fk2_jounee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`),
  ADD CONSTRAINT `fk_joueur_id` FOREIGN KEY (`joueur_id`) REFERENCES `effectif` (`ID_joueur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
