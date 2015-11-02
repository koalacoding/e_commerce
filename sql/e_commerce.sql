-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2015 at 08:47 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil_menu`
--

CREATE TABLE `accueil_menu` (
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

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user`, `productId`, `quantity`) VALUES
(7, 'admin@root.fr', 1, 1),
(8, 'admin@root.fr', 4, 1),
(9, 'admin@root.fr', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'menu1'),
(2, 'menu2'),
(3, 'menu3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`) VALUES
(1, 'Samsung SSD 840 EVO 500 Go mSATA', 'Le 840 EVO mSATA offre des performances plus élevées que jamais grâce à la technologie MLC 3 bits de 2e génération et une fiabilité exemplaire avec fonctions d''auto-monitoring.', '251.00', 'menu1'),
(2, 'Matrox DualHead2Go Digital ME (Mac Edition)', 'Connectez 2 moniteurs externes à votre Mac ou votre MacBook.', '185.00', 'menu1'),
(3, 'Canon EOS 100D + EF-S 18-55mm f/3,5-5,6 IS STM + Tamron AF 70-300mm F/4-5,6 Di LD MACRO 1:2', 'Le Canon EOS 100D est un reflex numérique compact de 18 millions de pixels doté d''un processeur DIGIC 5. Appareil complet et dôté de fonctions multiples, il sera idéal pour les portraits et les photos souvenir de voyage. Doté d''un viseur optique et de commandes intuitives sur l''écran tactile, l''EOS 100D offre de magnifiques photos et vidéos. \n\nObjectif télézoom compact avec fonction macro 1:2, ce téléobjectif Tamron AF 70-300mm F/4-5,6 Di LD MACRO 1:2 se caractérise par une excellente qualité mécanique associée à des qualités optiques remarquables. Cet objectif Di peut être utilisé monté sur un boîtier numérique APS-C ou un boîtier plein format. Il est le complément idéal des objectifs standard fournis avec le boîtier.\n\nPoints forts :\n\nCapteur CMOS 22.3 x 14.9 mm de 18.5 millions de pixels\nDesign léger et robuste\nÉcran LCD tactile de 7,5 cm (3 pouces)\nVidéo FULL HD avec sortie HDMI\nProfitez de prises de vues faciles et rapides avec le mode Scène intelligente auto.\nLivré avec le zoom standard EF-S 18-55mm f/3,5-5,6 IS STM', '550.00', 'menu1'),
(4, 'AMD A10-6790K (4.0 GHz) Black Edition AMD A10-7700K (3.5 GHz) Black Edition AMD A10-7700K (3.5 GHz) Black Edition AMD A10-7700K (3.5 GHz) Black Edition', '', '146.00', 'menu1'),
(5, 'AMD A4-4000 (3.0 GHz)', 'La nouvelle génération de processeurs accélérés série-A d''AMD : Obtenez d''excellentes performances pour un prix absolument incroyable grâce aux processeurs accélérés AMD série A de 2nd génération.', '33.99', 'menu2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `user_is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
