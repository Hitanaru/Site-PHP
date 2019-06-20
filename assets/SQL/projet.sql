-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 11:28
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `name` varchar(255) DEFAULT NULL,
  `files_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `firstName`, `lastName`, `email`, `message`, `name`, `files_url`) VALUES
(198, 'Bryan', 'Milon', 'bryan.milon.lpcb@gmail.com', 'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla', 'img6.jpg', 'files/img6.jpg'),
(197, 'Bryan', 'Milon', 'bryan.milon.lpcb@gmail.com', 'Donc voilà mon chat, très beau , très con et très poilu. Il a 3 ans et il aime le thon et me faire chier blablablablablablablablablablabla.', 'img5.jpg', 'files/img5.jpg'),
(196, 'Bryan', 'Milon', 'bryan.milon.lpcb@gmail.com', 'Donc voilà mon chat, très beau , très con et très poilu. Il a 3 ans et il aime le thon et me faire chier blablabla.', 'img4.jpg', 'files/img4.jpg'),
(195, 'ssffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'ffffffffffffffffffffffffffffffffdddddddddddddddddddfdfsdfdfdffsfdfdfdfsdfsdfsdfsdfdfdfsdfsdfdfdfdfsd', 'eazveabzgefjazfazjgeajegafzehjgazefajhgefajhegafezhjagfejhagefjahgefajhzegafjehag@gmailqsdqshjd.cqsh', 'gjyhfkjjdgfhjghjdfgd,hqf,gvqfgqfgqfgqfddfgqdfg', 'img5.jpg', 'files/img5.jpg'),
(193, 'cwxcwxc', 'wxcwxc', 'qsdqsd@gmail.com', 'qsdsd', 'img3.jpg', 'files/img3.jpg'),
(194, 'khgdqshjdgqshjdgqjdqgdjhqgdqhjsgjdgsfdfgjgj', 'hfqdfhgsfh,nsglfkhjnsklfghsfkgjhlkgjfglkjksfghgfhs ', 'qsdqsd@gmail.com', 'gfgkhgjkqdhgqkgfhqkjgfhqgkfjqhgfkqhgfkqjhfgkqjgfhjkqhgfqgfhqjkhgfkjhffjhqfgjqhfgkqjhfgkjfhgqkjfgkfjhqfkjhgfkjqhfgdkqjhdfgkjhdfgjqfhgfgkfkjfhhjfdkfjhfghgffkjhgfkjhf', 'img5.jpg', 'files/img5.jpg'),
(199, 'Bryan', 'Milon', 'bryan.milon.lpcb@gmail.com', 'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabl', 'img1.jpg', 'files/img1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
