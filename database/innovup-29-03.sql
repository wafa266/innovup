-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 mars 2021 à 22:27
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `innovup`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(17, 'shampoing');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `tax_number` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Customer infos';

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `tax_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wafa', 'mellakh', 'mellakhwafa868@gmail.com', NULL, '24727423', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `is_paid` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id_fk_idx` (`customer_id`),
  KEY `product_id_fk_idx` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `price`, `is_paid`, `created_at`, `updated_at`, `deleted_at`, `customer_id`, `product_id`) VALUES
(1, 4, 0, '2021-03-29 22:20:12', '2021-03-29 22:20:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` float DEFAULT NULL,
  `tva` float DEFAULT NULL,
  `barcode` varchar(250) DEFAULT NULL,
  `price_excluding_tax` float DEFAULT NULL,
  `price_ttc` float DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_fk_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `tva`, `barcode`, `price_excluding_tax`, `price_ttc`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'toblerone', 13, 1, NULL, NULL, NULL, 17, '2021-03-26 20:11:19', '2021-03-26 20:11:19', NULL),
(4, 'pain', NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-26 17:24:38', NULL, NULL),
(5, 'shampoing', NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-27 10:13:38', '2021-03-27 10:13:38', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `provider` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohamed', 'ben ahmed', 'msalah@hotmail.fr', 'Tunis 2', '24727423', '2021-03-26 15:29:20', '2021-03-26 16:22:55', NULL),
(2, 'Mohamed', NULL, NULL, NULL, NULL, '2021-03-26 15:54:37', '2021-03-26 15:54:37', NULL),
(3, 'rami', 'moh', NULL, NULL, NULL, '2021-03-26 15:54:55', '2021-03-26 16:13:45', NULL),
(4, 'ahmed', NULL, NULL, NULL, NULL, '2021-03-26 18:27:56', NULL, NULL),
(5, NULL, NULL, NULL, NULL, '98976542', '2021-03-26 20:02:29', '2021-03-26 20:02:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `provider_orders`
--

DROP TABLE IF EXISTS `provider_orders`;
CREATE TABLE IF NOT EXISTS `provider_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_paid` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_id_fk_idx` (`provider_id`),
  KEY `product_id_fk_1_idx` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `provider_orders`
--

INSERT INTO `provider_orders` (`id`, `is_paid`, `created_at`, `updated_at`, `deleted_at`, `provider_id`, `product_id`) VALUES
(2, 0, NULL, NULL, NULL, 2, 3),
(3, 0, NULL, NULL, NULL, 1, 3),
(4, 0, NULL, NULL, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL, 2, 4),
(6, 0, NULL, NULL, NULL, 2, 4),
(7, 0, '2021-03-27 10:36:34', NULL, NULL, NULL, NULL),
(8, 0, NULL, NULL, NULL, 2, 4),
(9, 0, NULL, NULL, NULL, 2, NULL),
(10, 1, NULL, NULL, NULL, 1, 4),
(11, 0, NULL, NULL, NULL, NULL, 4),
(12, 0, NULL, NULL, NULL, NULL, NULL),
(13, 0, NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, NULL, NULL, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `roles` json DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `roles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Wafa', 'Mellakh', 'mellakhwafa868@gmail.com', '$2y$13$zO4idoZoG2Syxci40zvAaOJJ.vY1XMKUZboEkIpXVVpVMeYyNMS9m', NULL, '[\"ROLE_ADMIN\"]', '2021-03-23 22:05:29', '2021-03-27 22:30:38', NULL),
(26, 'wafa', 'mellakh', 'test@hotmail.fr', 'admin', '215463', NULL, '2021-03-27 22:32:48', '2021-03-27 22:32:48', NULL),
(27, 'mellakh', 'wafa', 'mellakhwafa868@gmail.com', 'admin', '+21624727423', NULL, '2021-03-29 10:57:41', '2021-03-29 10:57:41', NULL),
(28, 'mellakh', 'wafa', 'mellakhwafa@gmail.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '+21624727423', NULL, '2021-03-29 21:28:18', '2021-03-29 21:28:18', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `provider_orders`
--
ALTER TABLE `provider_orders`
  ADD CONSTRAINT `product_id_fk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `provider_id_fk` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
