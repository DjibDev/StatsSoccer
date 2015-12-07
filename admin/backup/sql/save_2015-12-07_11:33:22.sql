-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: stats
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb7u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `classement`
--

DROP TABLE IF EXISTS `classement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classement` (
  `ID_classement` int(11) NOT NULL AUTO_INCREMENT,
  `nb_forfaits` int(2) NOT NULL,
  `nb_penalites` int(2) NOT NULL,
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
  KEY `fk4_equipe_id` (`equipe_id`),
  CONSTRAINT `fk4_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classement`
--

LOCK TABLES `classement` WRITE;
/*!40000 ALTER TABLE `classement` DISABLE KEYS */;
/*!40000 ALTER TABLE `classement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classement_coupe`
--

DROP TABLE IF EXISTS `classement_coupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classement_coupe` (
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
  KEY `fk4_equipe_id` (`equipe_id`),
  CONSTRAINT `classement_coupe_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes_coupe` (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classement_coupe`
--

LOCK TABLES `classement_coupe` WRITE;
/*!40000 ALTER TABLE `classement_coupe` DISABLE KEYS */;
/*!40000 ALTER TABLE `classement_coupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classement_domicile`
--

DROP TABLE IF EXISTS `classement_domicile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classement_domicile` (
  `ID_classement_dom` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_forfaits` int(2) NOT NULL,
  `nb_penalites` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_dom`),
  KEY `fk4_equipe_id` (`equipe_id`),
  CONSTRAINT `classement_domicile_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classement_domicile`
--

LOCK TABLES `classement_domicile` WRITE;
/*!40000 ALTER TABLE `classement_domicile` DISABLE KEYS */;
/*!40000 ALTER TABLE `classement_domicile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classement_exterieur`
--

DROP TABLE IF EXISTS `classement_exterieur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classement_exterieur` (
  `ID_classement_ext` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(2) NOT NULL,
  `nb_forfaits` int(2) NOT NULL,
  `nb_penalites` int(2) NOT NULL,
  `nb_victoires` int(2) NOT NULL,
  `nb_nuls` int(2) NOT NULL,
  `nb_defaites` int(2) NOT NULL,
  `nb_buts_pour` int(3) NOT NULL,
  `nb_buts_contre` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  `points` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_ext`),
  KEY `fk4_equipe_id` (`equipe_id`),
  CONSTRAINT `classement_exterieur_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classement_exterieur`
--

LOCK TABLES `classement_exterieur` WRITE;
/*!40000 ALTER TABLE `classement_exterieur` DISABLE KEYS */;
/*!40000 ALTER TABLE `classement_exterieur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classement_players`
--

DROP TABLE IF EXISTS `classement_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classement_players` (
  `ID_classement_players` int(11) NOT NULL AUTO_INCREMENT,
  `nb_journees` int(11) NOT NULL,
  `nb_buts` int(2) DEFAULT NULL,
  `nb_passes` int(2) DEFAULT NULL,
  `nb_cleansheets` int(11) DEFAULT NULL,
  `nb_vestiaires` int(11) DEFAULT NULL,
  `nb_maillots` int(11) DEFAULT NULL,
  `joueur_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_classement_players`),
  KEY `fk3_joueur_id` (`joueur_id`),
  CONSTRAINT `fk3_joueur_id` FOREIGN KEY (`joueur_id`) REFERENCES `effectif` (`ID_joueur`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classement_players`
--

LOCK TABLES `classement_players` WRITE;
/*!40000 ALTER TABLE `classement_players` DISABLE KEYS */;
INSERT INTO `classement_players` VALUES (8,3,NULL,2,NULL,NULL,NULL,6),(10,4,1,3,NULL,NULL,NULL,2),(12,4,NULL,NULL,1,NULL,NULL,12),(17,4,NULL,NULL,NULL,1,1,21),(19,4,NULL,1,NULL,1,1,9),(20,4,1,NULL,NULL,NULL,1,10),(24,5,NULL,NULL,NULL,NULL,1,19),(28,5,NULL,1,NULL,NULL,1,8),(30,6,1,NULL,NULL,1,NULL,14),(34,10,1,1,NULL,1,NULL,11),(35,11,4,NULL,NULL,NULL,NULL,16),(36,12,7,2,NULL,NULL,1,3),(37,13,1,1,NULL,NULL,1,20),(38,14,NULL,1,NULL,1,NULL,5),(39,15,0,1,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `classement_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `effectif`
--

DROP TABLE IF EXISTS `effectif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `effectif` (
  `ID_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'N.C.',
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'N.C.',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'xx@xx.fr',
  `poste` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT 'XXX',
  `num_maillot` varchar(2) NOT NULL DEFAULT 'NC',
  PRIMARY KEY (`ID_joueur`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `effectif`
--

LOCK TABLES `effectif` WRITE;
/*!40000 ALTER TABLE `effectif` DISABLE KEYS */;
INSERT INTO `effectif` VALUES (1,'djib','BLOT','JÃ©rÃ´me','1981-05-10','no_email@email.fr','DEF','00'),(2,'presidente','BURBAN','Arnaud','1978-12-12','no_email@email.fr','ATT','00'),(3,'gregos','BOURDEL','GrÃ©gory','1983-06-14','no_email@email.fr','ATT',''),(4,'chocobn','PARRÃ©','Nicolas','1982-09-12','no_email@email.fr','XXX','00'),(5,'vincento','OHEIX','Vincent','1980-03-07','no_email@email.fr','MIL','00'),(6,'jerem','BOUYER','JÃ©rÃ©mie','1980-08-08','no_email@email.fr','ATT','00'),(7,'messigoal44','DANO','Jonathan','1979-01-11','no_email@email.fr','ATT','00'),(8,'picwic','CORNUAULT','Fabrice','1981-03-10','no_email@email.fr','MIL','00'),(9,'loic','HARRANT','LoÃ¯c','1980-05-04','no_email@email.fr','MIL','00'),(10,'max','PARFAIT','Maxence','1979-02-03','no_email@email.fr','MIL','00'),(11,'manu','TARIOT','Emmanuel','1982-11-26','no_email@email.fr','MIL','00'),(12,'passoire','LECHAT','Matthieu','1979-05-13','no_email@email.fr','GAR','1'),(13,'mika','','','0000-00-00','no_email@email.fr','DEF',''),(14,'stÃ©phane','TARIOT','StÃ©phane','0000-00-00','no_email@email.fr','DEF','00'),(15,'nico','LELOU','Nicolas','0000-00-00','no_email@email.fr','DEF','00'),(16,'david','AUFRAY','david','0000-00-00','no_email@email.fr','ATT','00'),(17,'nicopin','LALLOUÃ©','Nicolas','0000-00-00','no_email@email.fr','MIL','00'),(18,'matjam','JAMET','Matthieu','0000-00-00','no_email@email.fr','DEF','00'),(19,'papy','QUEUDREUX','Laurent','0000-00-00','no_email@email.fr','DEF','00'),(20,'hugo','CHAUVIN','Hugo','0000-00-00','no_email@email.fr','MIL','00'),(21,'eddy','BREGER','Eddy','1972-05-09','no_email@email.fr','DEF','00'),(22,'romain','A','Romain','0000-00-00','no_email@email.fr','DEF','00');
/*!40000 ALTER TABLE `effectif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes` (
  `ID_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stade` varchar(100) CHARACTER SET utf8 NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES (10,'Nantes Chu As','NANTES','TERRAIN STABILISE 6 CHEMIN DE LA JUSTICE',0),(11,'Nantes Sud 98 2','NANTES','PLAINE DE JEUX DE SEVRES RUE DE L OLIVRAIE',0),(12,'Orvault Nacional Fc','NANTES','Plaine de jeux des Basses Landes 6 chemin de la justice',0),(13,'Nantes Jet Fc','NANTES','RUE DU FORT',0),(14,'Nantes St-felix Ccs','NANTES','Plaine de jeux des Basses Landes 6 chemin de la justice',0),(15,'Orvault Rc','ORVAULT','108 AV.CLAUDE ANTOINE PECCOT',0),(16,'Nantes Footeux','NANTES','TERRAIN ANNEXE RUE DE L OLIVRAIE',0),(17,'Ste-luce/loire Us 2','SAINTE-LUCE S/ LOIRE','TERRAIN ANNEXE STABILISE ALLE ROBERT CHEVAL CHEMIN DU HALLAGE',0),(18,' Nantes Metallo Sport','NANTES','TERRAIN ANNEXE 11 RUE DE LA DURANTIERE',0),(19,'Orvault Bugalliere','ORVAULT','STADE DE LA BUGALLIERE',0),(20,'JGE','SucÃ© sur Erdre','Joseph Briand',1);
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes_coupe`
--

DROP TABLE IF EXISTS `equipes_coupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes_coupe` (
  `ID_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stade` varchar(100) CHARACTER SET utf8 NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes_coupe`
--

LOCK TABLES `equipes_coupe` WRITE;
/*!40000 ALTER TABLE `equipes_coupe` DISABLE KEYS */;
INSERT INTO `equipes_coupe` VALUES (2,'JGE','','',1),(3,'Nantes St Jo Pf','','',0),(4,'Orvault Bugalliere 2','','',0),(5,'Orvault Sf','','',0);
/*!40000 ALTER TABLE `equipes_coupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journees`
--

DROP TABLE IF EXISTS `journees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journees` (
  `ID_journee` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `saison` varchar(9) CHARACTER SET utf8 NOT NULL DEFAULT '2015/2016',
  `numero` int(11) NOT NULL,
  `coupe` tinyint(1) NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_journee`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journees`
--

LOCK TABLES `journees` WRITE;
/*!40000 ALTER TABLE `journees` DISABLE KEYS */;
INSERT INTO `journees` VALUES (82,'2015-09-18','2015/2016',1,0,0),(83,'2015-09-25','2015/2016',2,0,0),(84,'2015-10-02','2015/2016',3,0,0),(85,'2015-10-09','2015/2016',4,0,0),(86,'2015-10-23','2015/2016',5,0,0),(87,'2015-10-30','2015/2016',6,0,0),(88,'2015-11-06','2015/2016',7,0,0),(89,'2015-11-20','2015/2016',8,0,0),(90,'2015-11-27','2015/2016',9,0,0),(91,'2015-12-11','2015/2016',10,0,0),(92,'2016-01-15','2015/2016',11,0,0),(93,'2016-01-22','2015/2016',12,0,0),(94,'2016-01-29','2015/2016',13,0,0),(95,'2016-02-26','2015/2016',14,0,0),(96,'2016-03-04','2015/2016',15,0,0),(97,'2016-03-11','2015/2016',16,0,0),(98,'2016-03-18','2015/2016',17,0,0),(99,'2016-04-08','2015/2016',18,0,0),(100,'2016-04-15','2015/2016',19,0,0),(101,'2016-04-22','2015/2016',20,0,0),(102,'2016-04-29','2015/2016',21,0,0),(103,'2016-05-20','2015/2016',22,0,0),(104,'2015-10-16','2015/2016',1,1,0),(105,'2015-11-13','2015/2016',2,1,0),(106,'2015-12-04','2015/2016',3,1,0),(107,'2016-03-25','2015/2016',99,0,0);
/*!40000 ALTER TABLE `journees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matchs` (
  `ID_match` int(11) NOT NULL AUTO_INCREMENT,
  `equipe_dom_id` int(11) NOT NULL,
  `equipe_dom_forfait` tinyint(1) NOT NULL DEFAULT '0',
  `equipe_dom_penalite` tinyint(4) NOT NULL DEFAULT '0',
  `equipe_vis_id` int(11) NOT NULL,
  `equipe_vis_forfait` tinyint(1) NOT NULL DEFAULT '0',
  `equipe_vis_penalite` tinyint(4) NOT NULL DEFAULT '0',
  `but_equipe_dom` int(2) NOT NULL DEFAULT '0',
  `but_equipe_vis` int(2) NOT NULL DEFAULT '0',
  `coupe` tinyint(1) NOT NULL DEFAULT '0',
  `journee_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_match`),
  KEY `fk_journee_id` (`journee_id`),
  CONSTRAINT `fk_journee_id` FOREIGN KEY (`journee_id`) REFERENCES `journees` (`ID_journee`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchs`
--

LOCK TABLES `matchs` WRITE;
/*!40000 ALTER TABLE `matchs` DISABLE KEYS */;
INSERT INTO `matchs` VALUES (7,10,0,0,11,0,0,0,0,0,82),(8,12,0,0,20,0,0,0,0,0,82),(9,13,0,0,14,0,0,0,0,0,82),(10,16,0,0,17,0,0,0,0,0,82),(11,18,0,0,19,0,0,0,0,0,82),(12,14,0,0,10,0,0,0,0,0,83),(13,15,0,0,16,0,0,0,0,0,83),(14,20,0,0,13,0,0,0,0,0,83),(15,19,0,0,12,0,0,0,0,0,83),(16,17,0,0,11,0,0,0,0,0,83),(17,13,0,0,19,0,0,0,0,0,84),(18,10,0,0,17,0,0,0,0,0,84),(19,11,0,0,14,0,0,0,0,0,84),(20,16,0,0,20,0,0,0,0,0,84),(21,18,0,0,15,0,0,0,0,0,84),(22,3,0,0,2,0,0,0,0,1,104),(23,5,0,0,4,0,0,0,0,1,104),(24,2,0,0,5,0,0,0,0,1,105),(25,4,0,0,3,0,0,0,0,1,105),(26,2,0,0,4,0,0,0,0,1,106),(27,5,0,0,3,0,0,0,0,1,106),(28,14,0,0,17,0,0,0,0,0,85),(29,15,0,0,12,0,0,0,0,0,85),(30,18,0,0,13,0,0,0,0,0,85),(31,20,0,0,11,0,0,0,0,0,85),(32,19,0,0,10,0,0,0,0,0,85),(33,12,0,0,18,0,0,0,0,0,86),(34,13,0,0,15,0,0,0,0,0,86),(35,16,0,0,14,0,0,0,0,0,86),(36,11,0,0,19,0,0,0,0,0,86),(38,15,0,0,11,0,0,0,0,0,87),(39,12,0,0,10,0,0,0,0,0,87),(40,18,0,0,17,0,0,0,0,0,87),(41,20,0,0,14,0,0,0,0,0,87),(42,19,0,0,16,0,0,0,0,0,87),(43,14,0,0,19,0,0,0,0,0,88),(44,10,0,0,20,0,0,0,0,0,88),(45,13,0,0,12,0,0,0,0,0,88),(46,16,0,0,18,0,0,0,0,0,88),(47,17,0,0,15,0,0,0,0,0,88),(48,15,0,0,14,0,0,0,0,0,89),(49,12,0,0,16,0,0,0,0,0,89),(50,13,0,0,10,0,0,0,0,0,89),(51,18,0,0,11,0,0,0,0,0,89),(52,19,0,0,20,0,0,0,0,0,89),(53,10,0,0,18,0,0,0,0,0,90),(54,11,0,0,12,0,0,0,0,0,90),(55,16,0,0,13,0,0,0,0,0,90),(56,20,0,0,15,0,0,0,0,0,90),(57,17,0,0,19,0,0,0,0,0,90),(58,15,0,0,19,0,0,0,0,0,91),(59,12,0,0,17,0,0,0,0,0,91),(60,13,0,0,11,0,0,0,0,0,91),(61,16,0,0,10,0,0,0,0,0,91),(62,18,0,0,14,0,0,0,0,0,91),(63,10,0,0,15,0,0,0,0,0,92),(64,14,0,0,12,0,0,0,0,0,92),(65,11,0,0,16,0,0,0,0,0,92),(66,20,0,0,18,0,0,0,0,0,92),(67,17,0,0,13,0,0,0,0,0,92),(68,14,0,0,13,0,0,0,0,0,93),(69,11,0,0,10,0,0,0,0,0,93),(70,20,0,0,12,0,0,0,0,0,93),(71,19,0,0,18,0,0,0,0,0,93),(72,17,0,0,16,0,0,0,0,0,93),(73,13,0,0,20,0,0,0,0,0,94),(74,12,0,0,19,0,0,0,0,0,94),(75,10,0,0,14,0,0,0,0,0,94),(76,11,0,0,17,0,0,0,0,0,94),(77,16,0,0,15,0,0,0,0,0,94),(78,14,0,0,11,0,0,0,0,0,95),(79,15,0,0,18,0,0,0,0,0,95),(80,20,0,0,16,0,0,0,0,0,95),(81,19,0,0,13,0,0,0,0,0,95),(82,17,0,0,10,0,0,0,0,0,95),(83,10,0,0,19,0,0,0,0,0,96),(84,13,0,0,18,0,0,0,0,0,96),(85,12,0,0,15,0,0,0,0,0,96),(86,11,0,0,20,0,0,0,0,0,96),(87,17,0,0,14,0,0,0,0,0,96),(88,14,0,0,16,0,0,0,0,0,97),(89,15,0,0,13,0,0,0,0,0,97),(90,18,0,0,12,0,0,0,0,0,97),(91,20,0,0,17,0,0,0,0,0,97),(92,19,0,0,11,0,0,0,0,0,97),(93,10,0,0,12,0,0,0,0,0,98),(94,14,0,0,20,0,0,0,0,0,98),(95,11,0,0,15,0,0,0,0,0,98),(96,16,0,0,19,0,0,0,0,0,98),(97,17,0,0,18,0,0,0,0,0,98),(98,12,0,0,13,0,0,0,0,0,99),(99,15,0,0,17,0,0,0,0,0,99),(100,18,0,0,16,0,0,0,0,0,99),(101,20,0,0,10,0,0,0,0,0,99),(102,19,0,0,14,0,0,0,0,0,99),(103,14,0,0,15,0,0,0,0,0,100),(104,10,0,0,13,0,0,0,0,0,100),(105,11,0,0,18,0,0,0,0,0,100),(106,16,0,0,12,0,0,0,0,0,100),(107,20,0,0,19,0,0,0,0,0,100),(108,12,0,0,11,0,0,0,0,0,101),(109,15,0,0,20,0,0,0,0,0,101),(110,13,0,0,16,0,0,0,0,0,101),(111,18,0,0,10,0,0,0,0,0,101),(112,19,0,0,17,0,0,0,0,0,101),(113,10,0,0,16,0,0,0,0,0,102),(114,14,0,0,18,0,0,0,0,0,102),(115,11,0,0,13,0,0,0,0,0,102),(116,17,0,0,12,0,0,0,0,0,102),(117,19,0,0,15,0,0,0,0,0,102),(118,13,0,0,17,0,0,0,0,0,103),(119,12,0,0,14,0,0,0,0,0,103),(120,15,0,0,10,0,0,0,0,0,103),(121,16,0,0,11,0,0,0,0,0,103),(122,18,0,0,20,0,0,0,0,0,103),(123,17,0,0,20,0,0,0,0,0,107);
/*!40000 ALTER TABLE `matchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats_collectives`
--

DROP TABLE IF EXISTS `stats_collectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats_collectives` (
  `ID_stat_collec` int(11) NOT NULL AUTO_INCREMENT,
  `forfait` tinyint(1) NOT NULL DEFAULT '0',
  `penalite` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats_collectives`
--

LOCK TABLES `stats_collectives` WRITE;
/*!40000 ALTER TABLE `stats_collectives` DISABLE KEYS */;
/*!40000 ALTER TABLE `stats_collectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats_collectives_coupe`
--

DROP TABLE IF EXISTS `stats_collectives_coupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats_collectives_coupe` (
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
  KEY `fk3_journee_id` (`journee_id`),
  KEY `fk5_equipe_id` (`equipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats_collectives_coupe`
--

LOCK TABLES `stats_collectives_coupe` WRITE;
/*!40000 ALTER TABLE `stats_collectives_coupe` DISABLE KEYS */;
/*!40000 ALTER TABLE `stats_collectives_coupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats_individuelles`
--

DROP TABLE IF EXISTS `stats_individuelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats_individuelles` (
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
  `nettoyage_vestiaires` tinyint(4) DEFAULT NULL,
  `lavage_maillots` tinyint(4) DEFAULT NULL,
  `journee_id` int(11) NOT NULL,
  PRIMARY KEY (`ID_stat_indiv`),
  KEY `fk_joueur_id` (`joueur_id`),
  KEY `fk2_jounee_id` (`journee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats_individuelles`
--

LOCK TABLES `stats_individuelles` WRITE;
/*!40000 ALTER TABLE `stats_individuelles` DISABLE KEYS */;
INSERT INTO `stats_individuelles` VALUES (1,1,0,1,0,0,0,0,0,'',0,0,85),(2,2,0,1,0,0,0,0,0,'',0,0,85),(4,2,1,1,0,0,0,0,0,'',0,0,82),(5,3,0,2,0,0,0,0,0,'',0,1,82),(6,9,0,1,0,0,0,0,0,'',0,0,82),(7,3,2,0,0,0,0,0,0,'',0,0,83),(8,6,0,2,0,0,0,0,0,'',0,0,83),(9,10,1,0,0,0,0,0,0,'',0,0,84),(10,2,0,1,0,0,0,0,0,'',0,0,84),(11,3,2,0,0,0,0,0,0,'',0,0,85),(12,12,0,0,1,0,0,0,0,'',0,0,84),(13,9,0,0,0,0,0,0,0,'',1,NULL,83),(14,14,0,0,0,0,0,0,0,'',1,NULL,83),(15,8,0,0,0,0,0,0,0,'',NULL,1,83),(16,21,0,0,0,0,0,0,0,'',1,1,82),(17,20,0,0,0,0,0,0,0,'',NULL,1,82),(18,9,0,0,0,0,0,0,0,'',NULL,1,84),(19,10,0,0,0,0,0,0,0,'',NULL,1,85),(20,11,0,0,0,0,0,0,0,'',1,NULL,85),(21,5,0,0,0,0,0,0,0,'',1,NULL,85),(23,19,0,0,0,0,0,0,0,'',NULL,1,104),(27,8,0,1,0,0,0,0,0,'',0,0,104),(28,3,1,0,0,0,0,0,0,'',0,0,104),(29,14,1,0,0,0,0,0,0,'',0,0,15931),(30,11,1,0,0,0,0,0,0,'',0,0,17652),(31,20,1,0,0,0,0,0,0,'',0,0,12653),(32,3,1,0,0,0,0,0,0,'',0,0,19967),(33,11,0,1,0,0,0,0,0,'',0,0,17029),(34,16,1,0,0,0,0,0,0,'',0,0,59090),(35,3,1,0,0,0,0,0,0,'',0,0,55103),(36,20,0,1,0,0,0,0,0,'',0,0,61417),(37,5,0,1,0,0,0,0,0,'',0,0,92916),(38,1,3,0,0,0,0,0,0,'',0,0,88);
/*!40000 ALTER TABLE `stats_individuelles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-07 11:33:22
