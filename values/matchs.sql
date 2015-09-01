-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Septembre 2015 à 15:51
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

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`ID_match`, `equipe_dom_id`, `equipe_vis_id`, `but_equipe_dom`, `but_equipe_vis`, `coupe`, `journee_id`) VALUES
(1, 18, 7, 0, 1, 0, 1),
(2, 9, 11, 0, 0, 0, 1),
(3, 15, 2, 1, 2, 0, 1),
(4, 19, 8, 0, 1, 0, 1),
(5, 3, 16, 2, 1, 0, 1),
(6, 6, 17, 1, 0, 0, 1),
(7, 20, 1, 0, 2, 0, 1),
(8, 14, 4, 1, 2, 0, 1),
(9, 5, 13, 2, 1, 0, 1),
(10, 12, 10, 0, 0, 0, 1),
(11, 2, 18, 0, 0, 0, 2),
(12, 13, 14, 1, 1, 0, 2),
(13, 9, 15, 3, 3, 0, 2),
(14, 17, 12, 0, 1, 0, 2),
(15, 16, 20, 1, 0, 0, 2),
(16, 1, 6, 0, 0, 0, 2),
(17, 8, 5, 1, 0, 0, 2),
(18, 4, 19, 1, 0, 0, 2),
(19, 10, 3, 1, 1, 0, 2),
(20, 7, 11, 2, 0, 0, 2),
(21, 20, 7, 0, 1, 0, 3),
(22, 12, 16, 1, 2, 0, 3),
(23, 5, 2, 1, 1, 0, 3),
(24, 11, 1, 0, 2, 0, 3),
(25, 15, 8, 2, 1, 0, 3),
(26, 6, 4, 1, 0, 0, 3),
(27, 3, 17, 3, 0, 0, 3),
(28, 18, 14, 0, 0, 0, 3),
(29, 10, 13, 0, 1, 0, 3),
(30, 19, 9, 6, 0, 0, 3),
(31, 17, 19, 2, 0, 0, 4),
(32, 8, 12, 0, 4, 0, 4),
(33, 18, 11, 1, 0, 0, 4),
(34, 1, 15, 1, 1, 0, 4),
(35, 16, 5, 3, 1, 0, 4),
(36, 9, 20, 0, 0, 0, 4),
(37, 4, 10, 4, 1, 0, 4),
(38, 13, 3, 2, 1, 0, 4),
(39, 14, 6, 2, 0, 0, 4),
(40, 2, 7, 0, 3, 0, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
