-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 05 Février 2019 à 12:59
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ms2r`
--
CREATE DATABASE IF NOT EXISTS `ms2r` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ms2r`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` int(10) NOT NULL AUTO_INCREMENT,
  `PrenomAdmin` varchar(15) NOT NULL,
  `NomAdmin` varchar(15) NOT NULL,
  `LoginAdmin` varchar(50) NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Image` varchar(100) NOT NULL,
  `LastConnexion` time NOT NULL,
  `DroitAcces` int(2) NOT NULL,
  PRIMARY KEY (`IdAdmin`),
  UNIQUE KEY `LoginAdmin` (`LoginAdmin`),
  KEY `IdAdmin` (`IdAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `PrenomAdmin`, `NomAdmin`, `LoginAdmin`, `Password`, `Image`, `LastConnexion`, `DroitAcces`) VALUES
(1, 'Adriana', 'HOAREAU', 'Adriana', 'Password', 'adriana1.jpg', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `IdDroit` int(1) NOT NULL AUTO_INCREMENT,
  `NomDroit` varchar(15) NOT NULL,
  PRIMARY KEY (`IdDroit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`IdDroit`, `NomDroit`) VALUES
(1, 'Lecture'),
(2, 'Insertion'),
(3, 'Modification'),
(4, 'Suppression');

-- --------------------------------------------------------

--
-- Structure de la table `droitadmin`
--

CREATE TABLE IF NOT EXISTS `droitadmin` (
  `IdDroit` int(2) NOT NULL AUTO_INCREMENT,
  `IdAdmin` varchar(2) NOT NULL,
  PRIMARY KEY (`IdAdmin`),
  UNIQUE KEY `IdAdmin` (`IdAdmin`),
  UNIQUE KEY `IdDroit` (`IdDroit`),
  KEY `IdDroit_2` (`IdDroit`),
  KEY `IdAdmin_2` (`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `IdMembre` int(11) NOT NULL AUTO_INCREMENT,
  `NomMembre` varchar(20) NOT NULL,
  `PrenomMenbre` varchar(20) NOT NULL,
  `Profession` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Tel` int(11) NOT NULL,
  PRIMARY KEY (`IdMembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`IdMembre`, `NomMembre`, `PrenomMenbre`, `Profession`, `Image`, `Mail`, `Tel`) VALUES
(1, 'Adriana', 'Adriana', 'Directrice', 'adriana1.jpg', '@MS2R.com', 0),
(2, 'barbara', 'barbara', '', 'barbara9.jpg', '', 0),
(3, 'christelle', 'christelle', '', 'christelle3.JPG', '', 0),
(4, 'deniro', 'deniro', '', 'deniro5.jpg', '', 0),
(5, 'lara', 'lara', '', 'Lara1.jpg', '', 0),
(6, 'leaonardo', 'leaonardo', '', 'leonardo.jpg', '', 0),
(7, 'Marie', 'Marie', '', 'Marie3.jpg', '', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `droitadmin`
--
ALTER TABLE `droitadmin`
  ADD CONSTRAINT `droitadmin_ibfk_2` FOREIGN KEY (`IdAdmin`) REFERENCES `droitadmin` (`IdAdmin`),
  ADD CONSTRAINT `droitadmin_ibfk_1` FOREIGN KEY (`IdDroit`) REFERENCES `droit` (`IdDroit`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
