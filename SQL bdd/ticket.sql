-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mai 2022 à 16:05
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` int(11) NOT NULL,
  `num_c` text NOT NULL,
  `date_ex` date NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_aj` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id`, `nom`, `email`, `password`, `date_aj`) VALUES
(8, 'jsk', 'jsk@jsk', '$2y$12$jeV0O4y2A3jmBJuba5QYQeadaTklmDePUCP7El5uSO4cbU8RC2yhu', '2022-05-18 16:03:25');

-- --------------------------------------------------------

--
-- Structure de la table `fans`
--

DROP TABLE IF EXISTS `fans`;
CREATE TABLE IF NOT EXISTS `fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_nais` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_m` datetime NOT NULL,
  `nom_c1` varchar(255) NOT NULL,
  `nom_c2` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `num_c` varchar(255) NOT NULL,
  `stade` varchar(255) NOT NULL,
  `id_c` int(11) NOT NULL,
  `nb_t` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `date_m`, `nom_c1`, `nom_c2`, `prix`, `num_c`, `stade`, `id_c`, `nb_t`) VALUES
(31, '2022-06-19 18:30:00', 'JSK', 'MCA', '300', '1122454545124858/29', '1er NOVEMBRE TIZI-OUZOU', 8, 0),
(32, '2022-06-02 16:15:00', 'JSK', 'USMA', '300', '1122454545124858/29', '1er NOVEMBRE TIZI-OUZOU', 8, 0),
(33, '2022-06-05 17:00:00', 'JSK', 'ES SETIF', '500', '1122454545124858/29', '5 JUILLET', 8, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
