-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 12:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil_menu`
--

CREATE TABLE IF NOT EXISTS `accueil_menu` (
  `element_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accueil_menu`
--

INSERT INTO `accueil_menu` (`element_name`) VALUES
('element1');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'France'),
(2, 'Belgique');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(8, 'disque dur'),
(9, 'carte mere'),
(10, 'carte graphique'),
(11, 'memoire vive');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mini_description` text NOT NULL,
  `description` text NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `mini_description`, `description`, `image_link`, `price`, `category`) VALUES
(8, 'Hitachi Deskstar 7K4000 4 To SATA 6Gb/s', 'Disque dur 3.5&quot; 4 To 7200 RPM 64 Mo Serial ATA 6Gb/s (bulk)', 'Grâce à son immense capacité de 4 To, le disque dur Hitachi Deskstar 7K4000 repousse les limites du stockage de masse. Avec une vitesse de rotation de 7200 tpm et les performances octroyées par l''interface Serial-ATA 6 Gb/s, il se montre rapide, fiable et efficace.', 'http://media.ldlc.com/ld/products/00/00/93/78/LD0000937814_1_0001128494.jpg', '189.95', 'disque dur'),
(9, 'Lenovo ThinkServer HDD 1 To 3.5&quot; (67Y2614)', 'Disque dur serveur 3.5&quot; 1 To 7200 RPM 32 Mo Serial ATA II (bulk)', 'Le disque dur Lenovo ThinkServer 67Y2614 est conçu pour le serveur Lenovo ThinkServer TS130. Ce disque dur SATA offre d''excellentes performances avec 7200 RPM (rotations par minute) et un fonctionnement à la fois très fiable et économique.', 'http://media.ldlc.com/ld/products/00/01/37/67/LD0001376754_1_0001376801.jpg', '239.95', 'disque dur'),
(10, 'Lenovo ThinkServer HDD 500 Go 2.5&quot; (0C19495)', 'Disque dur serveur 2.5&quot; 500 Go 7200 RPM SATA 6Gb/s pour ThinkServer', 'Ce disque dur remplaçable à chaud SATA ThinkServer 7,2 K de 2,5 pouces 6 Gbits/s pour entreprise offre aux utilisateurs la plus grande capacité de stockage de données pour un prix très réduit. C''est la solution idéale pour les applications de lecture séquentielle gourmandes en capacité.', 'http://media.ldlc.com/ld/products/00/02/99/13/LD0002991307_1_0002991588_0003040375.jpg', '339.95', 'disque dur'),
(11, 'ASRock 775i65G R3.0', 'Carte mère Micro ATX Socket 775 Intel 865G - SATA 3 Gbps - USB 2.0 - 1x AGP 8x', 'Au format Micro ATX et équipée du jeu de composants Intel 865G, la carte mère ASRock 775i65G R3.0 représente une solution idéale pour l''assemblage d''une petite configuration performante, peu encombrante et optimisée pour la pratique de l''informatique au quotidien.', 'http://media.ldlc.com/ld/products/00/01/15/88/LD0001158870_1.jpg', '64.95', 'carte mere'),
(12, 'MSI GeForce 210 N210-MD1GD3H/LP 1 Go', '1024 Mo HDMI/DVI - PCI Express (NVIDIA GeForce avec CUDA 210)', 'Grâce à la MSI N210-MD1GD3H/LP 1 Go vous bénéficierez d''une carte peu onéreuse que vous pourrez facilement intégrer dans une configuration bureautique ou multimédia. Une solution idoine pour un affichage de qualité ou la vidéo HD à petit prix.', 'http://media.ldlc.com/ld/products/00/01/13/18/LD0001131843_1.jpg', '31.96', 'carte graphique'),
(13, 'Kingston 1 Go DDR2 533 MHz', 'Kingston 1 Go DDR2-SDRAM PC4200 - KTH-XW4300/1G (garantie 10 ans par Kingston)', 'Votre serveur commence de fatiguer ? Donnez lui une seconde jeunesse grâce à ce kit de mémoire DDR3 de qualité créé par Kingston. Constitué d''une barrette certifiée, il redonnera une seconde jeunesse à votre serveur Dell.', 'http://media.ldlc.com/ld/products/00/01/72/32/LD0001723264_1_0001723297.jpg', '19.90', 'memoire vive'),
(14, 'Kingston HyperX Fury 4 Go DDR3 1600 MHz CL10', 'RAM DDR3 PC12800 - HX316C10FR/4 (garantie à vie par Kingston)', 'Dominez le jeu avec l''HyperX FURY. Même les débutants peuvent bénéficier des meilleures vitesses, puisque FURY reconnaît la plateforme hôte et sélectionne automatiquement la plus haute fréquence de surcadençage annoncée.', 'http://media.ldlc.com/ld/products/00/01/54/54/LD0001545469_1.jpg', '28.35', 'memoire vive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `civility` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_fixe` varchar(255) NOT NULL,
  `phone_mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `user_is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `civility`, `firstname`, `lastname`, `adress`, `country`, `postal_code`, `city`, `phone_fixe`, `phone_mobile`, `password`, `subscription_date`, `user_is_admin`) VALUES
(2, 'admin@root.fr', 'M', 'jean', 'guy', '52 rue du coco', 'France', '66200', 'reims', '12645151', '2147483647', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-04-08 07:08:52', 1),
(3, 'jean_michel@wanadoo.com', 'M', 'jean', 'michel', '964 rue des piquets', 'France', '32500', 'rouen', '120306050', '620504021', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-14 13:14:48', 0),
(4, 'jean_michel2@wanadoo.com', 'M', 'jean', 'mi', '45 rue des fous', 'France', '6151', 'rouen', '1203061', '151515205', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-14 14:43:00', 0),
(5, 'jeanrob@gmail.com', 'M', 'jean', 'michel', '52 rue du cacaaeee', 'France', '415415', 'mike', '15451521', '66151511', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-14 15:10:31', 0),
(6, 'robert@yahoo.fr', 'M', 'jean', 'michel', '52 rue du fou', 'France', '69000', 'paris', '65014203', '89564612', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-17 12:43:01', 0),
(7, 'moma@gmail.com', 'M', 'robert', 'duval', '52 rue du choux', 'France', '65000', 'marseille', '120654584', '620548475', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-17 12:44:38', 0),
(8, 'mickael@google.fr', 'M', 'mick', 'rob', '65 rue du puy', 'France', '02110', 'reims', '0150201020', '0698524210', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-17 12:46:48', 0),
(9, 'admin2@root.fr', 'M', 'mike', 'tim', '52 rue du ouy', 'France', '015151', 'paris', '0120654584', '0620657845', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '2015-10-17 12:51:28', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
