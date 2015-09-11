-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 11 Septembre 2015 à 11:56
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `effectif`
--

INSERT INTO `effectif` (`ID_joueur`, `pseudo`, `nom`, `prenom`, `birthday`, `email`, `poste`, `num_maillot`) VALUES
(1, 'djib', 'BLOT', 'Jérôme', '1981-05-10', 'galaxymuse@gmail.com', 'DEF', '00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `equipes`
--

INSERT INTO `equipes` (`ID_equipe`, `nom`, `ville`, `stade`, `favorite`) VALUES
(21, 'Nantes Chu As', '', '', 0),
(22, 'Nantes Footeux', '', '', 0),
(23, 'Nantes St-felix Ccs', '', '', 0),
(24, 'Nantes Metallo Sport', '', '', 0),
(25, 'Nantes Sud 98 2', '', '', 0),
(26, 'Nantes Jet Fc', '', '', 0),
(27, 'JGE', '', '', 1),
(28, 'Ste-luce/loire Us 2', '', '', 0),
(29, 'Orvault Nacional Fc', '', '', 0),
(30, 'Orvault Bugalliere', '', '', 0),
(31, 'Orvault Rc', '', '', 0),
(32, 'Exempt', '', '', 0);

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
  PRIMARY KEY (`ID_journee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `journees`
--

INSERT INTO `journees` (`ID_journee`, `date`, `saison`, `numero`, `coupe`) VALUES
(57, '2015-09-18', '2015/2016', 1, 0),
(58, '2015-09-25', '2015/2016', 2, 0),
(59, '2015-10-02', '2015/2016', 3, 0),
(60, '2015-10-09', '2015/2016', 4, 0),
(61, '2015-10-23', '2015/2016', 5, 0),
(62, '2015-10-30', '2015/2016', 6, 0),
(63, '2015-11-06', '2015/2016', 7, 0),
(64, '2015-11-20', '2015/2016', 8, 0),
(65, '2015-11-27', '2015/2016', 9, 0),
(66, '2015-12-11', '2015/2016', 10, 0),
(67, '2016-01-15', '2015/2016', 11, 0),
(68, '2016-01-22', '2015/2016', 12, 0),
(69, '2016-01-29', '2015/2016', 13, 0),
(70, '2016-02-26', '2015/2016', 14, 0),
(71, '2016-03-04', '2015/2016', 15, 0),
(72, '2016-03-11', '2015/2016', 16, 0),
(73, '2016-03-18', '2015/2016', 17, 0),
(74, '2016-04-08', '2015/2016', 18, 0),
(75, '2016-04-15', '2015/2016', 19, 0),
(76, '2016-04-22', '2015/2016', 20, 0),
(77, '2016-04-29', '2015/2016', 21, 0),
(78, '2016-05-20', '2015/2016', 22, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`ID_match`, `equipe_dom_id`, `equipe_vis_id`, `but_equipe_dom`, `but_equipe_vis`, `coupe`, `journee_id`) VALUES
(45, 21, 25, 0, 0, 0, 57),
(46, 29, 27, 0, 0, 0, 57),
(47, 26, 23, 0, 0, 0, 57),
(48, 31, 32, 0, 0, 0, 57),
(49, 22, 28, 0, 0, 0, 57),
(50, 24, 30, 0, 0, 0, 57);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

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
  ADD CONSTRAINT `classement_coupe_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`);

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
