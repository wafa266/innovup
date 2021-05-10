-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 mai 2021 à 21:05
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
-- Structure de la table `bon_de_reception`
--

DROP TABLE IF EXISTS `bon_de_reception`;
CREATE TABLE IF NOT EXISTS `bon_de_reception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_orders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D9477C6B16608264` (`provider_orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bon_de_reception`
--

INSERT INTO `bon_de_reception` (`id`, `provider_orders_id`) VALUES
(22, NULL),
(21, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aliments 0', NULL, NULL, NULL),
(2, 'Aliments 1', NULL, NULL, NULL),
(3, 'Aliments 2', NULL, NULL, NULL),
(4, 'Aliments 3', NULL, NULL, NULL),
(5, 'Aliments 4', NULL, NULL, NULL),
(6, 'Aliments 5', NULL, NULL, NULL),
(7, 'Aliments 6', NULL, NULL, NULL),
(8, 'Aliments 7', NULL, NULL, NULL),
(9, 'Aliments 8', NULL, NULL, NULL),
(10, 'Aliments 9', NULL, NULL, NULL),
(11, 'Aliments', NULL, NULL, NULL),
(14, 'Wefe Mellakh', '2021-04-14 13:30:13', '2021-04-14 13:30:13', NULL),
(15, 'SHAMPOING', '2021-04-17 10:29:39', '2021-04-17 10:29:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `tax_number`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Customer_0', 'Market_0', '4521548750@gmail.com', 'Tunis 567876', '098756539870', '098756539870', NULL, NULL, NULL, NULL),
(2, 'Customer_1', 'Market_1', '4521548751@gmail.com', 'Tunis 567876', '098756539871', '098756539871', NULL, NULL, NULL, NULL),
(3, 'Customer_2', 'Market_2', '4521548752@gmail.com', 'Tunis 567876', '098756539872', '098756539872', NULL, NULL, NULL, NULL),
(4, 'Customer_3', 'Market_3', '4521548753@gmail.com', 'Tunis 567876', '098756539873', '098756539873', NULL, NULL, NULL, NULL),
(5, 'Customer_4', 'Market_4', '4521548754@gmail.com', 'Tunis 567876', '098756539874', '098756539874', NULL, NULL, NULL, NULL),
(6, 'Customer_5', 'Market_5', '4521548755@gmail.com', 'Tunis 567876', '098756539875', '098756539875', NULL, NULL, NULL, NULL),
(7, 'Customer_6', 'Market_6', '4521548756@gmail.com', 'Tunis 567876', '098756539876', '098756539876', NULL, NULL, NULL, NULL),
(8, 'Customer_7', 'Market_7', '4521548757@gmail.com', 'Tunis 567876', '098756539877', '098756539877', NULL, NULL, NULL, NULL),
(9, 'Customer_8', 'Market_8', '4521548758@gmail.com', 'Tunis 567876', '098756539878', '098756539878', NULL, NULL, NULL, NULL),
(10, 'Customer_9', 'Market_9', '4521548759@gmail.com', 'Tunis 567876', '098756539879', '098756539879', NULL, NULL, NULL, NULL),
(11, 'Customer_10', 'Market_10', '45215487510@gmail.com', 'Tunis 567876', '0987565398710', '0987565398710', NULL, NULL, NULL, NULL),
(12, 'Customer_11', 'Market_11', '45215487511@gmail.com', 'Tunis 567876', '0987565398711', '0987565398711', NULL, NULL, NULL, NULL),
(13, 'Customer_12', 'Market_12', '45215487512@gmail.com', 'Tunis 567876', '0987565398712', '0987565398712', NULL, NULL, NULL, NULL),
(14, 'Customer_13', 'Market_13', '45215487513@gmail.com', 'Tunis 567876', '0987565398713', '0987565398713', NULL, NULL, NULL, NULL),
(15, 'Customer_14', 'Market_14', '45215487514@gmail.com', 'Tunis 567876', '0987565398714', '0987565398714', NULL, NULL, NULL, NULL),
(16, 'Customer_15', 'Market_15', '45215487515@gmail.com', 'Tunis 567876', '0987565398715', '0987565398715', NULL, NULL, NULL, NULL),
(17, 'Customer_16', 'Market_16', '45215487516@gmail.com', 'Tunis 567876', '0987565398716', '0987565398716', NULL, NULL, NULL, NULL),
(18, 'Customer_17', 'Market_17', '45215487517@gmail.com', 'Tunis 567876', '0987565398717', '0987565398717', NULL, NULL, NULL, NULL),
(19, 'Customer_18', 'Market_18', '45215487518@gmail.com', 'Tunis 567876', '0987565398718', '0987565398718', NULL, NULL, NULL, NULL),
(20, 'Customer_19', 'Market_19', '45215487519@gmail.com', 'Tunis 567876', '0987565398719', '0987565398719', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_fk_idx` (`id`),
  KEY `customer_id_fk_idx` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `customer_id`, `is_paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2021-04-11 12:25:22', '2021-04-17 19:47:59', NULL),
(2, 2, 1, '2021-04-11 12:28:24', '2021-04-15 23:10:41', NULL),
(3, 2, 0, '2021-04-11 12:57:13', '2021-04-11 12:57:13', NULL),
(4, 2, 1, '2021-04-11 13:06:04', '2021-04-11 13:06:04', NULL),
(5, 2, 1, '2021-04-11 13:07:00', '2021-04-11 13:07:00', NULL),
(6, 2, 1, '2021-04-11 13:07:39', '2021-04-11 13:07:39', NULL),
(7, 2, 1, '2021-04-11 13:08:36', '2021-04-11 13:08:36', NULL),
(8, 2, 1, '2021-04-11 13:09:27', '2021-04-11 13:09:27', NULL),
(9, 2, 1, '2021-04-11 13:13:43', '2021-04-11 13:13:43', NULL),
(10, 2, 1, '2021-04-11 13:14:00', '2021-04-11 13:14:00', NULL),
(11, 2, 1, '2021-04-11 13:15:44', '2021-04-11 13:15:44', NULL),
(12, 2, 1, '2021-04-11 13:16:01', '2021-04-11 13:16:01', NULL),
(15, 2, 0, '2021-04-14 21:43:54', '2021-04-20 23:12:08', NULL),
(21, 2, 1, '2021-04-15 08:35:42', '2021-04-15 08:35:42', NULL),
(25, 2, 1, '2021-04-17 21:08:23', '2021-04-17 21:08:23', NULL),
(26, 2, 0, '2021-04-17 21:08:53', '2021-04-17 21:08:53', NULL),
(27, 2, 1, '2021-04-17 21:10:44', '2021-04-17 21:10:44', NULL),
(28, 2, 1, '2021-04-17 21:10:56', '2021-04-17 21:10:56', NULL),
(29, 2, 0, '2021-04-17 21:13:04', '2021-04-17 21:13:04', NULL),
(30, 2, 0, '2021-04-17 21:13:04', '2021-04-17 21:13:04', NULL),
(31, 2, 1, '2021-04-17 21:13:51', '2021-04-17 21:13:51', NULL),
(32, 2, 1, '2021-04-17 21:15:00', '2021-04-17 21:15:00', NULL),
(33, 2, 1, '2021-04-17 21:22:53', '2021-04-17 21:22:53', NULL),
(34, 2, 1, '2021-04-17 21:25:02', '2021-04-17 21:25:02', NULL),
(35, 2, 1, '2021-04-17 21:45:13', '2021-04-17 21:45:13', NULL),
(36, 2, 1, '2021-04-17 21:46:42', '2021-04-17 21:46:42', NULL),
(37, 2, 1, '2021-04-17 21:48:54', '2021-04-17 21:48:54', NULL),
(38, 2, 1, '2021-04-17 21:53:56', '2021-04-17 21:53:56', NULL),
(39, 2, 1, '2021-04-17 22:01:08', '2021-04-17 22:01:08', NULL),
(40, 2, 1, '2021-04-17 22:08:05', '2021-04-17 22:08:05', NULL),
(41, 2, 1, '2021-04-18 14:05:21', '2021-04-18 14:05:21', NULL),
(42, 2, 1, '2021-04-18 14:05:33', '2021-04-18 14:05:33', NULL),
(43, 2, 1, '2021-04-18 20:00:00', '2021-04-18 20:00:00', NULL),
(44, 2, 1, '2021-04-18 20:00:11', '2021-04-18 20:00:11', NULL),
(45, 2, 1, '2021-04-18 20:14:47', '2021-04-18 20:14:47', NULL),
(46, 2, 1, '2021-04-20 02:37:53', '2021-04-20 02:37:53', NULL),
(47, 2, 1, '2021-04-20 02:37:54', '2021-04-20 02:37:54', NULL),
(48, 2, 1, '2021-04-20 02:37:55', '2021-04-20 02:37:55', NULL),
(49, 2, 1, '2021-04-20 02:37:56', '2021-04-20 02:37:56', NULL),
(50, 2, 1, '2021-04-20 02:37:57', '2021-04-20 02:37:57', NULL),
(51, 1, 1, '2021-04-22 00:32:53', '2021-04-22 00:32:53', NULL),
(52, 4, 1, '2021-04-22 02:00:04', '2021-04-22 02:00:04', NULL),
(53, 2, 1, '2021-04-22 13:57:49', '2021-04-22 13:57:49', NULL),
(54, 2, 1, '2021-04-22 14:04:07', '2021-04-22 14:04:07', NULL),
(55, 3, 1, '2021-04-23 23:50:05', '2021-04-23 23:50:05', NULL),
(56, 2, 1, '2021-04-28 19:49:35', '2021-04-28 19:49:35', NULL),
(57, 6, 1, '2021-05-03 02:14:55', '2021-05-03 02:14:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders_product`
--

DROP TABLE IF EXISTS `customer_orders_product`;
CREATE TABLE IF NOT EXISTS `customer_orders_product` (
  `customer_orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_orders_id`,`product_id`),
  KEY `IDX_BB52421C640362CC` (`customer_orders_id`),
  KEY `IDX_BB52421C4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_orders_product`
--

INSERT INTO `customer_orders_product` (`customer_orders_id`, `product_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 4),
(4, 1),
(4, 11),
(4, 12),
(5, 1),
(5, 6),
(6, 1),
(6, 6),
(7, 1),
(7, 6),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(21, 1),
(25, 1),
(25, 2),
(26, 6),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1);

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders_quantity`
--

DROP TABLE IF EXISTS `customer_orders_quantity`;
CREATE TABLE IF NOT EXISTS `customer_orders_quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `customer_orders_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23FD8D6A4584665A` (`product_id`),
  KEY `IDX_23FD8D6A640362CC` (`customer_orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_orders_quantity`
--

INSERT INTO `customer_orders_quantity` (`id`, `product_id`, `customer_orders_id`, `quantity`) VALUES
(1, 1, NULL, 2),
(2, 2, NULL, 3),
(3, 2, 2, 3),
(4, 3, 2, 4),
(5, 4, 2, 5),
(6, 1, 3, 2),
(7, 3, 3, 4),
(8, 4, 3, 5),
(9, 1, 7, 0),
(10, 6, 7, 0),
(11, 1, 8, 0),
(12, 1, 10, 10),
(13, 1, 12, 250),
(14, 2, 12, 10),
(15, 1, 15, 10),
(16, 1, 21, 1),
(17, 1, 25, 250),
(18, 2, 25, 250),
(19, 1, 27, 1),
(20, 1, 28, 10),
(21, 1, 29, 1),
(22, 1, 30, 1),
(23, 1, 31, 1),
(24, 1, 32, 1),
(25, 1, 33, 1),
(26, 1, 34, 1),
(27, 1, 35, 1),
(28, 1, 36, 1),
(29, 1, 37, 1),
(30, 1, 38, 3),
(31, 1, 39, 3),
(32, 1, 40, 2),
(33, 1, 41, 1),
(34, 1, 42, 1),
(35, 1, 44, 2),
(36, 1, 45, 2),
(37, 1, 46, 3),
(38, 1, 47, 3),
(39, 1, 48, 3),
(40, 1, 49, 3),
(41, 1, 50, 3),
(42, 1, 51, 2),
(43, 1, 52, 4),
(44, 1, 53, 4),
(45, 1, 54, 4),
(46, 1, 55, 2),
(47, 1, 56, 2),
(48, 1, 57, 4);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210411113446', '2021-04-11 12:23:41', 9878),
('DoctrineMigrations\\Version20210426185913', '2021-04-26 18:59:42', 2493),
('DoctrineMigrations\\Version20210426201752', '2021-04-26 20:20:52', 649),
('DoctrineMigrations\\Version20210427133105', '2021-04-27 13:31:48', 1275),
('DoctrineMigrations\\Version20210430014843', '2021-04-30 01:48:54', 2718),
('DoctrineMigrations\\Version20210430021038', '2021-04-30 02:10:58', 2477),
('DoctrineMigrations\\Version20210501020738', '2021-05-01 02:07:48', 2642),
('DoctrineMigrations\\Version20210501021911', '2021-05-01 02:19:17', 2376),
('DoctrineMigrations\\Version20210501024325', '2021-05-01 02:43:41', 944);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `tva` double DEFAULT NULL,
  `price_excluding_tax` double DEFAULT NULL,
  `price_ttc` double DEFAULT NULL,
  `barcode` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `Benefice_margin` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`),
  KEY `category_id_fk_idx` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `tva`, `price_excluding_tax`, `price_ttc`, `barcode`, `image`, `created_at`, `updated_at`, `deleted_at`, `quantity`, `Benefice_margin`) VALUES
(1, 11, 'Product num 0', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(2, 11, 'Product num 1', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 11, 'Product num 2', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 11, 'Product num 3', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(5, 11, 'Product num 4', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(6, 11, 'Product num 5', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(7, 11, 'Product num 6', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 11, 'Product num 7', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(9, 11, 'Product num 8', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(11, 11, 'Product num 10', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(12, 11, 'Product num 11', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(13, 11, 'Product num 12', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(14, 11, 'Product num 13', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(15, 11, 'Product num 14', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(16, 11, 'Product num 15', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(17, 11, 'Product num 16', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(18, 11, 'Product num 17', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(19, 11, 'Product num 18', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(20, 11, 'Product num 19', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(21, 11, 'Product num 20', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(22, 11, 'Product num 21', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(23, 11, 'Product num 22', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(24, 11, 'Product num 23', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(25, 11, 'Product num 24', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(26, 11, 'Product num 25', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(27, 11, 'Product num 26', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(28, 11, 'Product num 27', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(29, 11, 'Product num 28', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(30, 11, 'Product num 29', 20, 1.3, 30, 10, '14578998736356336', 'Image.jpg', NULL, NULL, NULL, NULL, NULL),
(32, 10, 'oeuf', 13, 25, 1, 24, NULL, NULL, NULL, NULL, NULL, 2, NULL),
(35, NULL, 'pain', 12, 0.07, 13.8, 14.766, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(40, NULL, 'shampoing', 12, NULL, 13.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25),
(41, NULL, 'painour', 12, 0.13, 312, 352.56, NULL, NULL, NULL, NULL, NULL, 5, 25),
(42, NULL, 'painour', 12, 0.13, 312, 352.56, NULL, NULL, NULL, NULL, NULL, 5, 25),
(43, 15, 'shampoing', 12, 0.07, 312, 333.84, NULL, NULL, NULL, NULL, NULL, 15, 25);

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `provider` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Carrefour_0', 'Market_0', 'wafa0@gmail.com', 'Tunis 567876', '098756539870', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(2, 'Carrefour_1', 'Market_1', 'wafa1@gmail.com', 'Tunis 567876', '098756539871', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(3, 'Carrefour_2', 'Market_2', 'wafa2@gmail.com', 'Tunis 567876', '098756539872', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(4, 'Carrefour_3', 'Market_3', 'wafa3@gmail.com', 'Tunis 567876', '098756539873', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(5, 'Carrefour_4', 'Market_4', 'wafa4@gmail.com', 'Tunis 567876', '098756539874', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(6, 'Carrefour_5', 'Market_5', 'wafa5@gmail.com', 'Tunis 567876', '098756539875', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(7, 'Carrefour_6', 'Market_6', 'wafa6@gmail.com', 'Tunis 567876', '098756539876', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(8, 'Carrefour_7', 'Market_7', 'wafa7@gmail.com', 'Tunis 567876', '098756539877', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(9, 'Carrefour_8', 'Market_8', 'wafa8@gmail.com', 'Tunis 567876', '098756539878', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(10, 'Carrefour_9', 'Market_9', 'wafa9@gmail.com', 'Tunis 567876', '098756539879', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(11, 'Carrefour_10', 'Market_10', 'wafa10@gmail.com', 'Tunis 567876', '0987565398710', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(12, 'Carrefour_11', 'Market_11', 'wafa11@gmail.com', 'Tunis 567876', '0987565398711', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(13, 'Carrefour_12', 'Market_12', 'wafa12@gmail.com', 'Tunis 567876', '0987565398712', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(14, 'Carrefour_13', 'Market_13', 'wafa13@gmail.com', 'Tunis 567876', '0987565398713', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(15, 'Carrefour_14', 'Market_14', 'wafa14@gmail.com', 'Tunis 567876', '0987565398714', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(16, 'Carrefour_15', 'Market_15', 'wafa15@gmail.com', 'Tunis 567876', '0987565398715', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(17, 'Carrefour_16', 'Market_16', 'wafa16@gmail.com', 'Tunis 567876', '0987565398716', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(18, 'Carrefour_17', 'Market_17', 'wafa17@gmail.com', 'Tunis 567876', '0987565398717', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(19, 'Carrefour_18', 'Market_18', 'wafa18@gmail.com', 'Tunis 567876', '0987565398718', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(20, 'Carrefour_19', 'Market_19', 'wafa19@gmail.com', 'Tunis 567876', '0987565398719', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(21, 'Carrefour_20', 'Market_20', 'wafa20@gmail.com', 'Tunis 567876', '0987565398720', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(22, 'Carrefour_21', 'Market_21', 'wafa21@gmail.com', 'Tunis 567876', '0987565398721', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(23, 'Carrefour_22', 'Market_22', 'wafa22@gmail.com', 'Tunis 567876', '0987565398722', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(24, 'Carrefour_23', 'Market_23', 'wafa23@gmail.com', 'Tunis 567876', '0987565398723', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(25, 'Carrefour_24', 'Market_24', 'wafa24@gmail.com', 'Tunis 567876', '0987565398724', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(26, 'Carrefour_25', 'Market_25', 'wafa25@gmail.com', 'Tunis 567876', '0987565398725', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(27, 'Carrefour_26', 'Market_26', 'wafa26@gmail.com', 'Tunis 567876', '0987565398726', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(28, 'Carrefour_27', 'Market_27', 'wafa27@gmail.com', 'Tunis 567876', '0987565398727', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(29, 'Carrefour_28', 'Market_28', 'wafa28@gmail.com', 'Tunis 567876', '0987565398728', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(30, 'Carrefour_29', 'Market_29', 'wafa29@gmail.com', 'Tunis 567876', '0987565398729', NULL, '2021-04-11 12:23:58', '2021-04-11 12:23:58', NULL),
(31, 'ahmed', 'moh', 'carrefour@gmail.com', 'Tunis 45725', '98976542', NULL, '2021-04-17 12:05:03', '2021-04-17 12:05:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `provider_orders`
--

DROP TABLE IF EXISTS `provider_orders`;
CREATE TABLE IF NOT EXISTS `provider_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_id` int(11) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_fk_1_idx` (`id`),
  KEY `provider_id_fk_idx` (`provider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider_orders`
--

INSERT INTO `provider_orders` (`id`, `provider_id`, `is_paid`, `created_at`, `updated_at`, `deleted_at`, `reference`) VALUES
(1, 5, 0, NULL, NULL, NULL, 'AA25'),
(3, 1, 0, NULL, NULL, NULL, '0000');

-- --------------------------------------------------------

--
-- Structure de la table `provider_orders_product`
--

DROP TABLE IF EXISTS `provider_orders_product`;
CREATE TABLE IF NOT EXISTS `provider_orders_product` (
  `provider_orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`provider_orders_id`,`product_id`),
  KEY `IDX_7AE2B97E16608264` (`provider_orders_id`),
  KEY `IDX_7AE2B97E4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider_orders_product`
--

INSERT INTO `provider_orders_product` (`provider_orders_id`, `product_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(37, 1),
(38, 1),
(39, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(44, 2),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(58, 2),
(60, 1),
(61, 1),
(61, 2),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(79, 2),
(80, 1),
(81, 1),
(82, 1);

-- --------------------------------------------------------

--
-- Structure de la table `provider_orders_quantity`
--

DROP TABLE IF EXISTS `provider_orders_quantity`;
CREATE TABLE IF NOT EXISTS `provider_orders_quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `provider_orders_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_80803DE54584665A` (`product_id`),
  KEY `IDX_80803DE516608264` (`provider_orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider_orders_quantity`
--

INSERT INTO `provider_orders_quantity` (`id`, `product_id`, `provider_orders_id`, `quantity`) VALUES
(1, 3, 2, 4),
(2, 4, 1, 5),
(3, 1, 2, 2),
(4, 2, 2, 3),
(5, 2, 3, 1),
(6, 4, 3, 2),
(7, 1, 4, 1),
(8, 1, 5, 1),
(9, 1, 6, 1),
(10, 2, 6, 2),
(11, 1, 7, 1),
(12, 2, 7, 2),
(13, 1, 8, 1),
(14, 2, 8, 2),
(15, 1, 9, 1),
(16, 2, 9, 2),
(17, 1, 10, 1),
(18, 2, 10, 2),
(19, 1, 11, 1),
(20, 2, 11, 2),
(21, 3, 11, 3),
(22, 1, 12, 1),
(23, 1, 13, 1),
(24, 2, 13, 1),
(25, 1, 14, 1),
(26, 1, 15, 2),
(27, 2, 15, 4),
(28, 1, 16, 2),
(29, 2, 16, 4),
(30, 1, 17, 1),
(31, 1, 18, 2),
(32, 1, 19, 2),
(33, 1, 20, 2),
(34, 1, 22, 1),
(35, 1, 23, 2),
(36, 1, 24, 2),
(37, 1, 25, 5),
(38, 1, 26, 5),
(39, 1, 27, 2),
(40, 1, 28, 1),
(41, 1, 29, 1),
(42, 1, 30, 1),
(43, 1, 31, 1),
(44, 1, 32, 1),
(45, 1, 33, 1),
(46, 1, 34, 2),
(47, 1, 35, 2),
(48, 1, 36, 2),
(49, 2, 36, 6),
(50, 3, 36, 6),
(51, 4, 36, 6),
(52, 5, 36, 6),
(53, 6, 36, 6),
(54, 7, 36, 6),
(55, 1, 37, 2),
(56, 1, 38, 2),
(57, 1, 39, 2),
(58, 1, 41, 3),
(59, 1, 42, 2),
(60, 1, 43, 2),
(61, 1, 44, 5),
(62, 2, 44, 6),
(63, 1, 45, 3),
(64, 1, 46, 2),
(65, 1, 47, 2),
(66, 1, 48, 20),
(67, 1, 49, 20),
(68, 1, 50, 20),
(69, 1, 51, 3),
(70, 1, 52, 3),
(71, 1, 53, 3),
(72, 1, 54, 3),
(73, 1, 55, 3),
(74, 1, 56, 4),
(75, 1, 57, 3),
(76, 1, 58, 12),
(77, 2, 58, 5),
(78, 1, 60, 2),
(79, 1, 61, 2),
(80, 2, 61, 3),
(81, 1, 65, 3),
(82, 1, 66, 3),
(83, 1, 67, 3),
(84, 1, 68, 3),
(85, 1, 69, 2),
(86, NULL, 1, NULL),
(87, 1, 71, 2),
(88, 1, 72, 2),
(89, 1, 73, 4),
(90, 1, 74, 7),
(91, 1, 75, 3),
(92, 1, 76, 2),
(93, 1, 77, 6),
(94, 1, 78, 3),
(95, 1, 79, 4),
(96, 2, 79, 4),
(97, 1, 80, 4),
(98, 1, 81, 2),
(99, 1, 82, 3),
(100, 1, 1, 2),
(101, 1, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `roles`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'mellakh', 'wafa', 'mellakhwafa@gmail.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '+21624727423', '{\"1\": \"ROLE_MAG\"}', NULL, '2021-04-21 21:04:11', '2021-04-21 21:04:11', NULL),
(19, 'Ben', 'ben', 'mellakhwafa868@gmail.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '+21624727423', '{\"1\": \"ROLE_MAG\"}', NULL, '2021-04-21 21:07:58', '2021-04-21 21:07:58', NULL),
(20, 'mohamed', 'mellakh', 'test@hotmail.fr', '9MBHzDIEczWcjB2AJIr4B1Nzmt+HY//Fau4gl6q3ZB4NOIYXMzncQ7tpYkUjWfYP4MFigtlHwr19czZqglwigQ==', '24727423', NULL, NULL, '2021-04-21 22:14:38', '2021-04-21 22:14:38', NULL),
(21, 'wafa', 'mellakh', 'test@hotmail.fr', 'BFEQkknI/c+Nd7BaG7AaiyTfUFby/pkMHy3UsYqKqDcmvHoPRX/ame9TnVuOV2GrBH0JK9g4koW+CgTYI9mK+w==', '215463', '[\"ROLE_MAG\"]', NULL, '2021-04-21 22:15:15', '2021-04-21 22:15:15', NULL),
(22, 'wafa', 'mellakh', 'test@hotmail.fr', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '24727423', '[\"ROLE_USER\", \"ROLE_MAG\", \"ROLE_purchasing_manager\"]', NULL, '2021-04-21 22:16:33', '2021-04-21 22:16:33', NULL),
(23, 'wafa', 'mellakh', 'test@hotmail.fr', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '215463', '[\"ROLE_MAG\"]', NULL, '2021-04-21 22:20:29', '2021-04-21 22:20:29', NULL),
(24, 'mohamed', 'mellakh', 'test@hotmail.fr', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '215463', '[\"ROLE_MAG\", \"ROLE_purchasing_manager\", \"Sales_manager\"]', NULL, '2021-04-21 22:25:26', '2021-04-21 22:25:26', NULL),
(25, 'wafa', 'mellakh', 'test@hotmail.fr', 'BFEQkknI/c+Nd7BaG7AaiyTfUFby/pkMHy3UsYqKqDcmvHoPRX/ame9TnVuOV2GrBH0JK9g4koW+CgTYI9mK+w==', '215463', NULL, NULL, '2021-04-21 22:26:10', '2021-04-21 22:26:10', NULL),
(27, 'mohamed', 'mellakh', 'test@hotmail.fr', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '215463', '[\"ROLE_USER\", \"ROLE_purchasing_manager\", \"Sales_manager\"]', NULL, '2021-04-21 23:17:53', '2021-04-21 23:17:53', NULL),
(28, 'mellakh', 'wafa', 'mellakhwafa@gmail.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '+21624727423', '[\"ROLE_ADMIN\"]', NULL, '2021-04-23 18:39:59', '2021-04-23 18:40:31', NULL),
(29, 'ahmed', 'mustapha', 'ahmedmust@free.fr', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '25025', '[\"ROLE_ADMIN\"]', 'admin.jpg', '2021-04-23 18:48:40', '2021-04-23 18:48:40', NULL),
(33, 'wafa', 'mellakh', 'abc@abc.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', '215463', '[\"ROLE_ADMIN\"]', 'admin.jpg', '2021-04-26 21:33:55', '2021-04-29 00:26:24', NULL),
(35, 'abc', 'wafa', 'mellakhwafa868@gmail.com', 'v+c8k9Kwz6SH6vrd2EV5srTkpBkH1MJxkHpwYO8FWWP1w03yTOPAsSBcNDDgdbJhY3PrBZF6CyxfBl330aFk6w==', '+21624727423', '[]', NULL, '2021-04-29 13:30:34', '2021-04-29 13:30:34', NULL),
(36, '258', 'Mellakh', 'wafa@gmail.com', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', NULL, '[]', NULL, '2021-04-30 00:47:14', '2021-04-30 00:47:14', NULL),
(37, 'kaouther', 'ben aoun', 'kmazzouz@gmail.com', '5fEcfEpWfUd5m4oY6tGxexGaWNS5t6tIHN7lgF9t/Ik8OCRnBPZaKSolAwpwNbmzHhqM962W3lWKadJf4EqLKQ==', '24727423', '[\"ROLE_SALES_MANAGER\"]', NULL, '2021-04-30 13:29:46', '2021-04-30 13:29:46', NULL),
(38, 'lobna', 'mehrez', 'lobnabenmehrez@gmail.com', 'KmzYzbZZnVvBkSOu9NcUO+TLWq46Qd7LE5teWtBIDFPXq+KTK8M9DKQpCGXukY4tCvuvl2d4/7eJ2mkb4SrUfg==', '+21624727423', '[\"ROLE_PURCHASING_MANAGER\"]', NULL, '2021-04-30 14:08:36', '2021-04-30 14:08:36', NULL),
(39, 'mellakh', 'wafa', 'mellakhwafa868@gmail.com', 'y9EhEcHJBDeaUSFtvlClJCWHRTdECFF/GiqvY2z/zxOnfU6rAao24PHmA0oar/q03msrVuDFThg/nFfmtjvI8A==', '25035814', '[]', NULL, '2021-04-30 14:31:57', '2021-04-30 14:31:57', NULL),
(40, 'wafa5', 'mellakh', 'wafawafa@gmail.com', 'CZPBryKlm975tIaq09BpPIoy7JvPl5E/iX3699l9VKigW70y/a0ZGhok9Tp+ASUEUU+DuFSWCdvR15OHhv5f2g==', '24775256', '[]', NULL, '2021-04-30 18:53:53', '2021-04-30 18:53:53', NULL),
(41, 'wafa', 'mellakh', 'wafa63@gmail.com', '5Nv8Nx6J1rA7udUJO+n6MLrLWOmHIgAHcCPfjreK8Zmu2zJflbofoQCRKPgZAxCjcn+8a5EJ6YDbT56VXI6nzQ==', '24727423', '[]', NULL, '2021-04-30 19:41:02', '2021-04-30 19:41:02', NULL),
(42, 'samir', 'ben ahmed', 'samir@gmail.com', 'ctkoOI9DByxcnqH+1ku83IfzxrNDfYn6URA2MEmsmtZY7yrLMnujTHn9XxzLxF5bMrcG3i2gWJmvjKZolemXSw==', '24727563', '[\"ROLE_MAG\"]', NULL, '2021-04-30 20:16:46', '2021-04-30 20:16:46', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bon_de_reception`
--
ALTER TABLE `bon_de_reception`
  ADD CONSTRAINT `FK_D9477C6B16608264` FOREIGN KEY (`provider_orders_id`) REFERENCES `provider_orders` (`id`);

--
-- Contraintes pour la table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `FK_54EA21BF9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `customer_orders_product`
--
ALTER TABLE `customer_orders_product`
  ADD CONSTRAINT `FK_BB52421C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BB52421C640362CC` FOREIGN KEY (`customer_orders_id`) REFERENCES `customer_orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `customer_orders_quantity`
--
ALTER TABLE `customer_orders_quantity`
  ADD CONSTRAINT `FK_23FD8D6A4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_23FD8D6A640362CC` FOREIGN KEY (`customer_orders_id`) REFERENCES `customer_orders` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `provider_orders`
--
ALTER TABLE `provider_orders`
  ADD CONSTRAINT `FK_B21E1E7EA53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`);

--
-- Contraintes pour la table `provider_orders_product`
--
ALTER TABLE `provider_orders_product`
  ADD CONSTRAINT `FK_7AE2B97E16608264` FOREIGN KEY (`provider_orders_id`) REFERENCES `provider_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7AE2B97E4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `provider_orders_quantity`
--
ALTER TABLE `provider_orders_quantity`
  ADD CONSTRAINT `FK_80803DE516608264` FOREIGN KEY (`provider_orders_id`) REFERENCES `provider_orders` (`id`),
  ADD CONSTRAINT `FK_80803DE54584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
