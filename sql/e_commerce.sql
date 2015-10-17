-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2015 at 02:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`name`) VALUES
('menu1'),
('menu1'),
('menu2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
