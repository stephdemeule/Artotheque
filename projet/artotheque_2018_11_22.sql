-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 nov. 2018 à 08:46
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `artotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `artotheque`
--

DROP TABLE IF EXISTS `artotheque`;
CREATE TABLE IF NOT EXISTS `artotheque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_oeuvre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `liens` varchar(255) NOT NULL,
  `emprunt` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artotheque`
--

INSERT INTO `artotheque` (`id`, `titre_oeuvre`, `description`, `auteur`, `liens`, `emprunt`) VALUES
(5, 'Portrait collage', 'technnique mixte', 'Herbert Simon', '../Images/Capture2.PNG', 1),
(6, 'Portrait clair obscur', 'fusain', 'Linus Torvalds', '../Images/Capture3.PNG', 0),
(7, 'Portrait flouté', 'fusain', 'Douglas Engelbart', '../Images/Capture4.PNG', 0),
(8, 'Esquisse chat', 'fusain', 'Ambros P. Speiser', '../Images/Capture5.PNG', 0),
(9, 'Facade fragmentée', 'peinture acrylique', 'Robert Mallet', '../Images/Capture6.PNG', 0),
(10, 'Façon Klimt', 'peinture à huile', 'Jean-Raymond Abrial', '../Images/Capture7.PNG', 0),
(11, 'Portrait mode collage', 'collage', 'Alfred Aho', '../Images/Capture8.PNG', 0),
(12, 'Danseuse', 'mixte', 'John Venn', '../Images/Capture9.PNG', 0),
(13, 'Portrait', 'fusain', 'Robin Milner', '../Images/Capture10.PNG', 0),
(14, 'Pyrénées', 'acryliques', 'Herman Hollerith', '../Images/Capture11.PNG', 0),
(15, 'Champs de coquelicots', 'huile', 'Werner Koch', '../Images/Capture12.PNG', 0),
(16, 'Horizon', 'aquarelle numérique', 'Richard Hamming', '../Images/Capture13.PNG', 0),
(17, 'Clairière', 'dessin sur papier', 'John von Neumann', '../Images/Capture14.PNG', 0),
(18, 'Feuilles d automne', 'photographie', 'Bertrand Meyer', '../Images/Capture15.PNG', 0),
(19, 'Art numérique', 'texture numérique', 'Bill Atkinson', '../Images/Capture16.PNG', 0),
(20, 'Arbre dans le prés', 'aquarelle ', 'Charles Antony Richard Hoare', '../Images/Capture17.PNG', 1),
(21, 'Tempête', 'photographie', 'René de Possel', '../Images/Capture18.PNG', 0),
(22, 'Marée', 'photographie', 'Jean-Michel Truong', '../Images/Capture19.PNG', 0),
(23, 'Vague', 'photographie', 'Rasmus Lerdorf', '../Images/Capture20.PNG', 0),
(24, 'Vue sur mer', 'photographie', 'John Backus', '../Images/Capture21.PNG', 0),
(25, 'Brume', 'photographie', 'Gerald Jay Sussman', '../Images/Capture22.PNG', 0),
(26, 'The wave', 'photographie', 'John Warnock', '../Images/Capture23.PNG', 0),
(27, 'Cyclo', 'photographie', 'Pierre Bézier', '../Images/Capture24.PNG', 0),
(28, 'Voiliers', 'huile', 'Adam Osborne', '../Images/Capture25.PNG', 0),
(29, 'Paysage abstrait', 'huile', 'Jef Raskin', '../Images/Capture26.PNG', 0),
(30, 'Coquelicots', 'aquarelle', 'Frederick Philip Brooks', '../Images/Capture27.PNG', 0),
(31, 'Danseuse', 'photographie', 'Marcelo Tosatti', '../Images/Capture28.PNG', 0),
(32, 'Flamenco', 'huile', 'Claude Shannon', '../Images/Capture29.PNG', 1),
(33, 'Paysage arbre', 'aquarelle', 'Phil Zimmerman', '../Images/Capture30.PNG', 1),
(34, 'Provence', 'huile', 'Alonzo Church', '../Images/Capture31.PNG', 1),
(35, 'Le port', 'huile', 'Seymour Cray', '../Images/Capture33.PNG', 1),
(36, 'Guitare', 'huile', 'Leonardo Torres Quevedo', '../Images/Capture34.PNG', 0),
(37, 'Abstrait1', 'huile', 'Anders Hejlsberg', '../Images/Capture35.PNG', 0),
(38, 'Abstrait2', 'huile', 'Bill Joy', '../Images/Capture36.PNG', 0),
(39, 'Abstrait3', 'huile', 'André Truong Trong Thi', '../Images/Capture37.PNG', 0),
(40, 'Musiciens', 'acrylique', 'Samuel Kayembe Banza', '../Images/Capture38.PNG', 1),
(41, 'Big band', 'acrylique', 'Marc Andreessen', '../Images/Capture39.PNG', 0),
(42, 'Orchestre', 'acrylique', 'Charles Goldfarb ', '../Images/Capture40.PNG', 0),
(43, 'Groupe', 'acrylique', 'Gordon E. Moore', '../Images/Capture41.PNG', 0),
(44, 'Guitariste', 'acrylique', 'Vannevar Bush', '../Images/Capture42.PNG', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(245) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(29, 'rouka', '8ad7e038172fcda4a4b7659a4a72efc1af8361ec', 'antouchante@yahoo.ca'),
(30, 'StEphane', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 's.demeulemeester@campus-igs-toulouse.fr'),
(31, 'stephane_d', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 's.demeulemeester@campus-igs-toulouse.fr'),
(32, 'efqf', '9cf95dacd226dcf43da376cdb6cbba7035218921', 's.demeulemeester@campus-igs-toulouse.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
