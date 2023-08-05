-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 mars 2019 à 13:44
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

CREATE DATABASE IF NOT exists location_vehicule;
USE location_vehicule;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `location_vehicule`
--

-- --------------------------------------------------------

--
-- Structure de la table `carbacks`
--

CREATE TABLE `carbacks` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `state` varchar(191) NOT NULL,
  `damage` text,
  `kilometrage` double DEFAULT NULL,
  `gasoline` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carbacks`
--

INSERT INTO `carbacks` (`id`, `reservation_id`, `leasing_id`, `state`, `damage`, `kilometrage`, `gasoline`, `created_at`, `updated_at`) VALUES
(1, 39, NULL, 'Bon', 'Petites fissures sur le capot', 20000, 4, '2019-03-11 17:07:31', '2019-03-11 17:07:31'),
(2, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-11 17:50:41', '2019-03-11 17:50:41'),
(3, 38, NULL, 'Bon', NULL, NULL, NULL, '2019-03-11 17:51:46', '2019-03-11 17:51:46'),
(4, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-11 18:13:03', '2019-03-11 18:13:03'),
(5, 37, NULL, 'Bon', NULL, NULL, NULL, '2019-03-11 18:13:33', '2019-03-11 18:13:33'),
(6, 37, NULL, 'Très fauché', 'Gros', 2000, 5, '2019-03-12 14:30:23', '2019-03-12 14:30:23'),
(7, 40, NULL, 'Fauché', 'Capot cassé', 1200, 10, '2019-03-12 14:31:43', '2019-03-12 14:31:43'),
(8, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:31:58', '2019-03-12 14:31:58'),
(9, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:32:34', '2019-03-12 14:32:34'),
(10, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:34:05', '2019-03-12 14:34:05'),
(11, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-12 14:35:37', '2019-03-12 14:35:37'),
(12, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:40:49', '2019-03-12 14:40:49'),
(13, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:43:03', '2019-03-12 14:43:03'),
(14, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:46:23', '2019-03-12 14:46:23'),
(15, 36, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 15:01:38', '2019-03-12 15:01:38'),
(16, 36, NULL, 'Bon', 'Capot cassé en plusieurs morceaux', 1500, 0, '2019-03-13 10:12:02', '2019-03-13 10:12:02'),
(17, 32, NULL, 'Bon', 'Capot cassé en plusieurs morceaux', 1500, 0, '2019-03-13 10:12:39', '2019-03-13 10:12:39'),
(18, 31, NULL, 'Très fauché', NULL, NULL, NULL, '2019-03-13 10:18:51', '2019-03-13 10:18:51'),
(19, 30, NULL, 'Très fauché', 'Gros', 2000, 5, '2019-03-13 10:22:13', '2019-03-13 10:22:13'),
(20, 27, NULL, 'Bon', NULL, NULL, NULL, '2019-03-13 14:40:27', '2019-03-13 14:40:27'),
(21, NULL, 27, 'Bon', 'Pas conséquent', 100, 2, '2019-03-13 14:56:47', '2019-03-13 14:56:47');

-- --------------------------------------------------------

--
-- Structure de la table `carfiles`
--

CREATE TABLE `carfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carfiles`
--

INSERT INTO `carfiles` (`id`, `name`, `path`, `car_id`, `created_at`, `updated_at`) VALUES
(27, '1lv4OZEbBu3EaWRQKKvORtzD7VvcvBRLxPLnzm1w.jpeg', 'C:\\xampp\\tmp\\php92DD.tmp', 8, '2019-02-06 14:06:27', '2019-02-06 14:06:27'),
(28, 'eay269XPtgAhlKZPHlPXSMaitSdy8kki5KYfMYnw.jpeg', 'C:\\xampp\\tmp\\phpFBD9.tmp', 7, '2019-02-06 14:06:53', '2019-02-06 14:06:53'),
(29, 'ZhaT66VMNDdsWGrgopjKFJVutg9UKNXhB3omKfPk.jpeg', 'C:\\xampp\\tmp\\php5A36.tmp', 6, '2019-02-06 14:07:17', '2019-02-06 14:07:17'),
(31, 'kEJWhEAtHtyUZnWoLlUA2H3T8CeQ0jdLqQ1N0eSv.jpeg', 'C:\\xampp\\tmp\\phpC3EE.tmp', 3, '2019-02-06 14:07:44', '2019-02-06 14:07:44'),
(32, 'GNFxZr8WWYDvqN2Ld8Gcb8k3SN8R0NJiiNfszgs6.jpeg', 'C:\\xampp\\tmp\\phpF669.tmp', 2, '2019-02-06 14:07:57', '2019-02-06 14:07:57'),
(33, 'R6Uby6AXDMaKIj0CVGKN5uPinexJA51El0BqPvIY.jpeg', 'C:\\xampp\\tmp\\phpCF50.tmp', 9, '2019-02-06 18:13:33', '2019-02-06 18:13:33'),
(37, 'fza59hmXOUbv2JveXIC1owcdRvPDelTT4JwZnNZp.jpeg', 'C:\\xampp\\tmp\\phpC818.tmp', 10, '2019-02-07 18:14:13', '2019-02-07 18:14:13'),
(48, 'arEiep5DM6VGG6AMRKMEGaB8B7qoVxD5yso1lEUU.jpeg', 'C:\\xampp\\tmp\\phpCBCB.tmp', 5, '2019-02-08 14:36:30', '2019-02-08 14:36:30'),
(49, 'YZKqVNkPBxmK4RutJBtuKYY75YUm7p2Er9BubWuB.jpeg', 'C:\\xampp\\tmp\\phpCBDC.tmp', 5, '2019-02-08 14:36:30', '2019-02-08 14:36:30'),
(50, 'ooHAbhBnAdBT8wYNaueLIJSYkjGp7MNdOhO2E9vS.jpeg', 'C:\\xampp\\tmp\\phpCBEC.tmp', 5, '2019-02-08 14:36:30', '2019-02-08 14:36:30'),
(51, '9N3vIvWcZT3FnqWlJq4C0ijzSyZ6gWunTi0RM3fw.jpeg', 'C:\\xampp\\tmp\\phpCBED.tmp', 5, '2019-02-08 14:36:30', '2019-02-08 14:36:30'),
(52, '8aQ0Hmkwzla9emoo1AsxF818kWTzPZvWT82Dv2XX.jpeg', 'C:\\xampp\\tmp\\php4467.tmp', 12, '2019-02-19 12:37:44', '2019-02-19 12:37:44'),
(53, 'CSrDulavq6HVibFjR1LEZF8aMzpnau6yTT7MPDdc.jpeg', '0', 53, '2019-03-11 09:38:36', '2019-03-11 09:38:36'),
(54, 'Sh333kRsFZ6DrGEeimioHqRUrwGsGLBYdfHZHOtM.jpeg', '0', 54, '2019-03-11 09:47:06', '2019-03-11 09:47:06');

-- --------------------------------------------------------

--
-- Structure de la table `carmodels`
--

CREATE TABLE `carmodels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carmodels`
--

INSERT INTO `carmodels` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tucson', NULL, '2019-02-06 10:35:19', '2019-02-06 10:41:18');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartype_id` int(11) NOT NULL,
  `carmodel_id` int(11) NOT NULL,
  `carstate_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `place` int(11) DEFAULT NULL,
  `baggage` int(11) DEFAULT NULL,
  `door` int(11) DEFAULT NULL,
  `kilometrage` double DEFAULT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gasoline` int(11) DEFAULT NULL,
  `damage` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `mark`, `cartype_id`, `carmodel_id`, `carstate_id`, `category_id`, `color`, `registration`, `available`, `active`, `amount`, `description`, `place`, `baggage`, `door`, `kilometrage`, `fuel`, `gasoline`, `damage`, `created_at`, `updated_at`) VALUES
(5, 'Peugeot', 1, 1, 2, 9, 'Noir', '2525', 0, 1, 20000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 4, 4, 4, 6500, NULL, 2, 'Pas mal', '2019-02-06 12:49:10', '2019-03-13 10:12:39'),
(6, 'Renault', 1, 1, 2, 7, 'Grise', '825250', 1, 1, 10000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 4, 5, 5, 25000, 'Diesel', 1, 'Grandes fissures partout', '2019-02-06 12:52:27', '2019-03-11 17:07:31'),
(7, 'Toyota', 1, 1, 2, 6, 'Rouge', '4141', 0, 1, 4000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 4, 4, 4, 200, NULL, 1, 'Pas si grave', '2019-02-06 12:55:05', '2019-03-13 14:56:47'),
(8, 'KIA', 1, 1, 2, 5, 'bleu', '525252', 0, 1, 12000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 5, 4, 4, NULL, NULL, NULL, NULL, '2019-02-06 13:01:09', '2019-02-25 15:26:14'),
(9, 'McClaren', 1, 1, 2, 4, 'Grise', '11116166', 1, 1, 5000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 10, 8, 8, 99, NULL, 0, 'Pas inquiétant', '2019-02-06 18:13:33', '2019-03-13 10:18:51'),
(10, 'Opel', 1, 1, 2, 3, 'Grise', 'BP5020', 0, 1, 15000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 4, NULL, NULL, 2100, NULL, 2, 'Moyen', '2019-02-07 18:13:50', '2019-03-13 10:22:13'),
(11, 'BMW', 1, 1, 2, 2, 'Arc-en-ciel', '20120', 1, 1, 20000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 5, 5, 5, 20000, 'Diesel', 5, NULL, '2019-02-19 12:35:33', '2019-03-11 09:25:59'),
(12, 'Ford', 1, 1, 2, 1, 'Noire', 'az87az', 1, 1, 15000.00, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 4, 5, 4, 20255, 'Super', 3, NULL, '2019-02-19 12:37:44', '2019-03-08 14:43:32');

-- --------------------------------------------------------

--
-- Structure de la table `carstates`
--

CREATE TABLE `carstates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carstates`
--

INSERT INTO `carstates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Bon', '2019-02-06 08:21:50', '2019-02-06 08:21:50'),
(3, 'Fauché', '2019-02-06 08:23:16', '2019-02-06 08:23:16'),
(4, 'Très fauché', '2019-02-06 08:23:46', '2019-02-06 08:23:46'),
(5, 'Très bon', '2019-02-06 08:24:29', '2019-02-06 08:24:29'),
(6, 'Pas mal', '2019-02-06 08:28:18', '2019-02-06 09:58:56'),
(8, 'Ca peut aller', '2019-02-06 10:14:01', '2019-02-06 10:14:01');

-- --------------------------------------------------------

--
-- Structure de la table `cartypes`
--

CREATE TABLE `cartypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cartypes`
--

INSERT INTO `cartypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '4X4', '2019-02-06 10:59:48', '2019-02-06 10:59:48'),
(2, 'Camion', '2019-02-06 10:59:58', '2019-02-06 11:00:31');

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2019-02-25 11:04:50', '2019-02-25 11:04:50'),
(2, 'B', '2019-02-25 11:04:59', '2019-02-25 11:04:59'),
(3, 'C', '2019-02-25 11:05:25', '2019-02-25 11:05:25'),
(4, 'D', '2019-02-25 11:05:35', '2019-02-25 11:05:35'),
(5, 'E', '2019-02-25 11:05:44', '2019-02-25 11:05:44'),
(6, 'F', '2019-02-25 11:05:53', '2019-02-25 11:05:53'),
(7, 'S', '2019-02-25 11:06:11', '2019-02-25 11:06:11'),
(8, 'M', '2019-02-25 11:06:20', '2019-02-25 11:06:20'),
(9, 'J', '2019-02-25 11:06:28', '2019-02-25 11:06:28');

-- --------------------------------------------------------

--
-- Structure de la table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `telephone` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `telephone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Kendrick Lamar', '90929392', 'SKceseFGmaUuFWgXMp76ooWzxThFSjr9CTyHfvKj.jpeg', '2019-02-08 16:38:36', '2019-02-08 16:41:54'),
(2, 'Jaden Smith', '94959495', 'VLCRZfUtwU9styvuS5d15OlmOVGkm0kNlnDCqNrh.jpeg', '2019-02-08 16:39:13', '2019-02-08 16:39:13');

-- --------------------------------------------------------

--
-- Structure de la table `historics`
--

CREATE TABLE `historics` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `driver_amount` double DEFAULT NULL,
  `reduction_amount` double DEFAULT NULL,
  `tva_amount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `ttc_amount` double DEFAULT NULL,
  `bail_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_back` timestamp NULL DEFAULT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` text COLLATE utf8mb4_unicode_ci,
  `numfac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `reservation_id`, `leasing_id`, `driver_amount`, `reduction_amount`, `tva_amount`, `amount`, `ttc_amount`, `bail_amount`, `total_amount`, `date_start`, `date_back`, `mode`, `receipt`, `numfac`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, 20000, 0, 18000, 100000, 138000, 10000, 148000, '2019-02-17 12:34:45', '2019-02-27 12:34:50', 'tmoney', NULL, '', NULL, '2019-02-17 14:50:00', '2019-02-17 14:50:00'),
(2, 11, NULL, 20000, 0, 18000, 100000, 138000, 10000, 148000, '2019-02-17 12:34:45', '2019-02-27 12:34:50', 'tmoney', NULL, '', NULL, '2019-02-17 15:04:44', '2019-02-17 15:04:44'),
(3, NULL, 14, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-15 16:08:17', '2019-02-18 16:08:00', 'tmoney', NULL, '', NULL, '2019-02-17 15:06:57', '2019-02-17 15:06:57'),
(4, NULL, 14, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-15 16:08:17', '2019-02-18 16:08:00', 'tmoney', NULL, '', NULL, '2019-02-17 15:06:57', '2019-02-17 15:06:57'),
(5, NULL, 14, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-15 16:08:17', '2019-02-18 16:08:00', 'tmoney', NULL, '', NULL, '2019-02-17 15:07:37', '2019-02-17 15:07:37'),
(6, NULL, 14, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-15 16:08:17', '2019-02-18 16:08:00', 'tmoney', NULL, '', NULL, '2019-02-17 15:07:37', '2019-02-17 15:07:37'),
(7, NULL, 17, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-17 12:40:18', '2019-02-20 12:40:12', 'tmoney', NULL, '', NULL, '2019-02-17 15:08:54', '2019-02-17 15:08:54'),
(8, 8, NULL, 0, 0, 6300, 35000, 41300, 3500, 44800, '2019-02-15 17:10:53', '2019-02-22 17:10:57', 'tmoney', NULL, '', NULL, '2019-02-17 15:09:56', '2019-02-17 15:09:56'),
(9, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '2019-02-14 19:31:43', '2019-02-14 00:00:00', 'tmoney', NULL, '', NULL, '2019-02-17 15:09:56', '2019-02-17 15:09:56'),
(10, NULL, 17, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-17 12:40:18', '2019-02-20 12:40:12', 'tmoney', NULL, '', NULL, '2019-02-17 15:17:17', '2019-02-17 15:17:17'),
(11, 11, NULL, 20000, 0, 18000, 100000, 138000, 10000, 148000, '2019-02-17 12:34:45', '2019-02-27 12:34:50', 'tmoney', NULL, '', NULL, '2019-02-17 15:17:41', '2019-02-17 15:17:41'),
(12, NULL, 11, 0, 0, 0, 0, 0, 0, 0, '2019-02-15 11:46:56', '2019-02-15 11:15:44', 'tmoney', NULL, '', NULL, '2019-02-17 15:17:42', '2019-02-17 15:17:42'),
(13, NULL, 17, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-17 12:40:18', '2019-02-20 12:40:12', 'tmoney', NULL, '', NULL, '2019-02-17 15:20:37', '2019-02-17 15:20:37'),
(14, NULL, 17, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-17 12:40:18', '2019-02-20 12:40:12', 'tmoney', NULL, '', NULL, '2019-02-17 15:20:37', '2019-02-17 15:20:37'),
(15, NULL, 11, 0, 0, 0, 0, 0, 0, 0, '2019-02-15 11:46:56', '2019-02-15 11:15:44', 'tmoney', NULL, '', NULL, '2019-02-17 15:27:48', '2019-02-17 15:27:48'),
(16, 7, NULL, 0, 0, 6300, 35000, 41300, 3500, 44800, '2019-02-15 17:10:53', '2019-02-22 17:10:57', 'tmoney', NULL, '', NULL, '2019-02-17 15:28:01', '2019-02-17 15:28:01'),
(17, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'flooz', NULL, '', NULL, '2019-02-18 15:51:37', '2019-02-18 15:51:37'),
(18, NULL, 18, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:59:13', '2019-02-21 15:58:45', 'flooz', NULL, '', NULL, '2019-02-18 15:59:35', '2019-02-18 15:59:35'),
(19, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:28:21', '2019-02-18 16:28:21'),
(20, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:30:12', '2019-02-18 16:30:12'),
(21, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:31:58', '2019-02-18 16:31:58'),
(22, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:34:46', '2019-02-18 16:34:46'),
(23, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:36:48', '2019-02-18 16:36:48'),
(24, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:37:36', '2019-02-18 16:37:36'),
(25, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:39:42', '2019-02-18 16:39:42'),
(26, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:46:38', '2019-02-18 16:46:38'),
(27, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:49:12', '2019-02-18 16:49:12'),
(28, 12, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-18 15:34:20', '2019-02-20 15:34:24', 'paypal', NULL, '', NULL, '2019-02-18 16:57:55', '2019-02-18 16:57:55'),
(29, 10, NULL, 0, 0, 35100, 195000, 230100, 19500, 249600, '2019-02-15 17:37:34', '2019-02-28 17:37:40', 'tmoney', NULL, '', NULL, '2019-02-18 17:10:25', '2019-02-18 17:10:25'),
(30, 10, NULL, 0, 0, 35100, 195000, 230100, 19500, 249600, '2019-02-15 17:37:34', '2019-02-28 17:37:40', 'tmoney', NULL, '', NULL, '2019-02-18 17:10:26', '2019-02-18 17:10:26'),
(31, 10, NULL, 0, 0, 35100, 195000, 230100, 19500, 249600, '2019-02-15 17:37:34', '2019-02-28 17:37:40', 'tmoney', NULL, '', NULL, '2019-02-18 17:10:26', '2019-02-18 17:10:26'),
(32, 10, NULL, 0, 0, 35100, 195000, 230100, 19500, 249600, '2019-02-15 17:37:34', '2019-02-28 17:37:40', 'tmoney', NULL, '', NULL, '2019-02-18 17:10:27', '2019-02-18 17:10:27'),
(33, NULL, 19, 0, 0, 8100, 45000, 53100, 4500, 57600, '2019-02-18 17:08:15', '2019-02-28 17:08:08', 'tmoney', NULL, '', NULL, '2019-02-18 17:10:48', '2019-02-18 17:10:48'),
(34, 13, NULL, 27000, 0, 24300, 135000, 186300, 13500, 199800, '2019-02-19 15:29:06', '2019-02-28 15:29:10', 'tmoney', NULL, '', NULL, '2019-02-19 15:43:15', '2019-02-19 15:43:15'),
(35, NULL, 16, 0, 0, 13500, 75000, 88500, 7500, 96000, '2019-02-15 21:19:00', '2019-02-21 21:18:50', 'tmoney', NULL, '', NULL, '2019-02-20 11:15:11', '2019-02-20 11:15:11'),
(36, NULL, 13, 18000, 0, 16200, 90000, 124200, 9000, 133200, '2019-02-15 11:52:15', '2019-02-22 11:52:01', 'tmoney', NULL, '', NULL, '2019-02-20 11:20:33', '2019-02-20 11:20:33'),
(37, NULL, 12, 0, 0, 2700, 15000, 17700, 1500, 19200, '2019-02-15 11:48:31', '2019-02-16 16:30:04', 'tmoney', NULL, '', NULL, '2019-02-20 11:27:25', '2019-02-20 11:27:25'),
(38, 14, NULL, 0, 0, 1440, 8000, 9440, 800, 10240, '2019-02-20 11:41:47', '2019-02-22 11:41:51', 'tmoney', NULL, '', NULL, '2019-02-20 11:42:45', '2019-02-20 11:42:45'),
(39, 22, NULL, 0, 0, 21600, 120000, 141600, 12000, 153600, '2019-02-20 13:52:16', '2019-02-28 13:52:23', 'tmoney', NULL, '', NULL, '2019-02-20 13:54:09', '2019-02-20 13:54:09'),
(40, 23, NULL, 0, 0, 18900, 105000, 123900, 10500, 134400, '2019-02-20 13:55:56', '2019-02-27 13:56:00', 'tmoney', NULL, '', NULL, '2019-02-20 14:03:22', '2019-02-20 14:03:22'),
(41, 24, NULL, 0, 0, 17280, 96000, 113280, 9600, 122880, '2019-02-20 14:22:21', '2019-02-28 14:22:25', 'tmoney', NULL, '', NULL, '2019-02-20 14:24:12', '2019-02-20 14:24:12'),
(42, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:44:43', '2019-02-20 15:44:43'),
(43, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:44:48', '2019-02-20 15:44:48'),
(44, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:44:53', '2019-02-20 15:44:53'),
(45, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:44:58', '2019-02-20 15:44:58'),
(46, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:03', '2019-02-20 15:45:03'),
(47, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:08', '2019-02-20 15:45:08'),
(48, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:15', '2019-02-20 15:45:15'),
(49, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:19', '2019-02-20 15:45:19'),
(50, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:25', '2019-02-20 15:45:25'),
(51, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:31', '2019-02-20 15:45:31'),
(52, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:38', '2019-02-20 15:45:38'),
(53, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:44', '2019-02-20 15:45:44'),
(54, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:49', '2019-02-20 15:45:49'),
(55, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:45:58', '2019-02-20 15:45:58'),
(56, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:06', '2019-02-20 15:46:06'),
(57, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:16', '2019-02-20 15:46:16'),
(58, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:22', '2019-02-20 15:46:22'),
(59, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:29', '2019-02-20 15:46:29'),
(60, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:36', '2019-02-20 15:46:36'),
(61, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:44', '2019-02-20 15:46:44'),
(62, NULL, 22, 2400, 0, 2160, 12000, 16560, 1200, 17760, '2019-02-20 15:37:47', '2019-02-22 15:37:33', 'tmoney', NULL, '', NULL, '2019-02-20 15:46:57', '2019-02-20 15:46:57'),
(63, NULL, 23, 1600, 0, 1440, 8000, 11040, 800, 11840, '2019-02-20 15:53:02', '2019-02-23 15:52:54', 'tmoney', NULL, '', NULL, '2019-02-20 15:53:52', '2019-02-20 15:53:52'),
(64, 25, NULL, 4000, 0, 3600, 20000, 27600, 2000, 29600, '2019-02-20 18:30:35', '2019-02-22 16:22:28', 'tmoney', NULL, '', NULL, '2019-02-20 16:27:56', '2019-02-20 16:27:56'),
(65, 25, NULL, 4000, 0, 3600, 20000, 27600, 2000, 29600, '2019-02-20 18:30:35', '2019-02-22 16:22:28', 'flooz', NULL, '', NULL, '2019-02-20 16:28:15', '2019-02-20 16:28:15'),
(66, 26, NULL, 32000, 0, 28800, 160000, 220800, 16000, 236800, '2019-02-20 16:44:05', '2019-02-28 16:44:28', 'tmoney', NULL, '', NULL, '2019-02-20 16:47:19', '2019-02-20 16:47:19'),
(67, 28, NULL, 0, 0, 4320, 24000, 28320, 2400, 30720, '2019-02-21 10:44:25', '2019-02-27 10:44:35', 'tmoney', NULL, '', NULL, '2019-02-21 10:56:35', '2019-02-21 10:56:35'),
(68, NULL, 15, 1600, 0, 1440, 8000, 11040, 800, 11840, '2019-02-15 16:20:08', '2019-02-18 16:08:00', 'tmoney', NULL, '', NULL, '2019-02-21 11:08:58', '2019-02-21 11:08:58'),
(69, 21, NULL, 0, 0, 18900, 105000, 123900, 10500, 134400, '2019-02-20 12:46:37', '2019-02-27 12:46:42', 'stripe', NULL, '', NULL, '2019-02-22 12:33:37', '2019-02-22 12:33:37'),
(70, 21, NULL, 0, 0, 18900, 105000, 123900, 10500, 134400, '2019-02-20 12:46:37', '2019-02-27 12:46:42', 'stripe', NULL, '', NULL, '2019-02-22 12:41:18', '2019-02-22 12:41:18'),
(71, 20, NULL, 0, 0, 25200, 140000, 165200, 14000, 179200, '2019-02-20 12:40:15', '2019-02-27 12:40:19', 'stripe', NULL, '', NULL, '2019-02-22 12:42:05', '2019-02-22 12:42:05'),
(72, 19, NULL, 0, 0, 21600, 120000, 141600, 12000, 153600, '2019-02-20 12:26:33', '2019-02-28 12:26:37', 'stripe', NULL, '', NULL, '2019-02-22 12:57:53', '2019-02-22 12:57:53'),
(73, 18, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-20 12:23:11', '2019-02-22 12:23:16', 'stripe', NULL, '', NULL, '2019-02-22 13:39:04', '2019-02-22 13:39:04'),
(74, 17, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-20 12:18:51', '2019-02-28 12:18:55', 'stripe', NULL, '', NULL, '2019-02-22 14:14:03', '2019-02-22 14:14:03'),
(75, 16, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-20 12:14:33', '2019-02-28 12:14:37', 'stripe', NULL, '', NULL, '2019-02-22 14:24:07', '2019-02-22 14:24:07'),
(76, 15, NULL, 0, 0, 21600, 120000, 141600, 12000, 153600, '2019-02-20 11:53:04', '2019-02-28 11:53:11', 'stripe', NULL, '', NULL, '2019-02-22 14:25:43', '2019-02-22 14:25:43'),
(77, 15, NULL, 0, 0, 21600, 120000, 141600, 12000, 153600, '2019-02-20 11:53:04', '2019-02-28 11:53:11', 'stripe', NULL, '', NULL, '2019-02-22 14:31:01', '2019-02-22 14:31:01'),
(78, 10, NULL, 0, 0, 35100, 195000, 230100, 19500, 249600, '2019-02-15 17:37:34', '2019-02-28 17:37:40', 'stripe', NULL, '', NULL, '2019-02-22 16:40:27', '2019-02-22 16:40:27'),
(79, NULL, 25, 15000, 0, 13500, 75000, 103500, 7500, 111000, '2019-02-22 16:45:42', '2019-02-28 16:45:21', 'stripe', NULL, '', NULL, '2019-02-22 16:46:14', '2019-02-22 16:46:14'),
(80, 29, NULL, 0, 0, 13500, 75000, 88500, 7500, 96000, '2019-02-22 17:25:22', '2019-02-27 17:25:28', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6hmqJLeub4cZ5c05KP3ObU/rcpt_EZrVvSomFyGhAD48U1R7Ma0hcrmbB2d', '', NULL, '2019-02-22 17:26:19', '2019-02-22 17:26:19'),
(81, NULL, 26, 15000, 0, 13500, 75000, 103500, 7500, 111000, '2019-02-22 17:28:42', '2019-02-28 17:28:36', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6hpuJLeub4cZ5c4iAZTEaS/rcpt_EZrZv9HIE909xlMLrftBsdiSYCTOCJ5', '', NULL, '2019-02-22 17:29:22', '2019-02-22 17:29:22'),
(82, 30, NULL, 0, 0, 13500, 75000, 88500, 7500, 96000, '2019-02-22 17:41:49', '2019-02-27 17:41:54', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6i3CJLeub4cZ5czDr4O7nA/rcpt_EZrmA7VrIZJMVjm9W2PbQ9dEHj7tA0R', 'FAC-00020190222174306', NULL, '2019-02-22 17:43:06', '2019-02-22 17:43:06'),
(83, NULL, 28, 12000, 0, 12960, 60000, 84960, 6000, 90960, '2019-02-22 18:31:28', '2019-02-27 18:31:18', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6iptJLeub4cZ5cBW6RdPFS/rcpt_EZsbnKe5LIrRKSIYl1s4VuqcIIbJXAl', 'FAC-00020190222183326', NULL, '2019-02-22 18:33:26', '2019-02-22 18:33:26'),
(84, NULL, 27, 0, 0, 3600, 20000, 23600, 2000, 25600, '2019-02-22 18:28:27', '2019-02-28 18:28:21', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6j2HJLeub4cZ5cRUxLZdjx/rcpt_EZsnMBf5FeKkQxAPtfBR7oNqpIl1YuB', 'FAC-00020190222184620', NULL, '2019-02-22 18:46:20', '2019-02-22 18:46:20'),
(85, 31, NULL, 0, 0, 5400, 30000, 35400, 3000, 38400, '2019-02-22 18:46:59', '2019-02-28 18:47:03', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E6j3eJLeub4cZ5cxn9xIZgC/rcpt_EZsp11ceWc1sRf4AOm6dVRNM05vEHZP', 'FAC-00020190222184738', NULL, '2019-02-22 18:47:38', '2019-02-22 18:47:38'),
(86, 32, NULL, 0, 0, 3600, 20000, 23600, 2000, 25600, '2019-02-22 19:17:18', '2019-02-23 19:17:21', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E7gatJLeub4cZ5cTgqTFybA/rcpt_EasLTGKTzuyUK2GfPCv7I0RCa19UyXz', 'FAC-00020190225102156', NULL, '2019-02-25 10:21:56', '2019-02-25 10:21:56'),
(87, NULL, 29, 6000, 0, 6480, 30000, 42480, 3000, 45480, '2019-02-25 15:51:23', '2019-02-28 15:51:15', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E7ll2JLeub4cZ5cWsi6fGru/rcpt_EaxgHuFDgLkZHSjtaTF1QxJEKmL5eyo', 'FAC-00020190225155245', NULL, '2019-02-25 15:52:45', '2019-02-25 15:52:45'),
(88, 36, NULL, 0, 0, 7200, 40000, 47200, 4000, 51200, '2019-02-25 16:10:43', '2019-02-27 16:10:50', 'tmoney', NULL, 'FAC-00020190225162924', NULL, '2019-02-25 16:29:24', '2019-02-25 16:29:24'),
(89, NULL, 30, 0, 0, 5400, 30000, 35400, 3000, 38400, '2019-02-25 18:19:41', '2019-02-28 18:19:00', 'stripe', 'https://pay.stripe.com/receipts/acct_1E6GtwJLeub4cZ5c/ch_1E7o59JLeub4cZ5c9Ii3vAad/rcpt_Eb05GyQzM0SzRFVwtkgnpQCZVQpk4GP', 'FAC-00020190225182140', NULL, '2019-02-25 18:21:40', '2019-02-25 18:21:40'),
(90, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-12 15:45:39', '2019-03-12 15:45:39'),
(91, 30, NULL, NULL, NULL, NULL, 5000, NULL, NULL, 5000, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-13 10:22:20', '2019-03-13 10:22:20'),
(92, 32, NULL, NULL, NULL, NULL, 5000, NULL, NULL, 5000, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-13 10:42:05', '2019-03-13 10:42:05'),
(93, 27, NULL, NULL, NULL, NULL, 5000, NULL, NULL, 5000, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-13 14:56:54', '2019-03-13 14:56:54'),
(94, 27, NULL, NULL, NULL, NULL, 5000, NULL, NULL, 5000, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-13 14:59:22', '2019-03-13 14:59:22'),
(95, NULL, 27, NULL, NULL, NULL, 5000, NULL, NULL, 5000, NULL, NULL, 'sup', NULL, NULL, NULL, '2019-03-13 15:02:17', '2019-03-13 15:02:17');

-- --------------------------------------------------------

--
-- Structure de la table `leasings`
--

CREATE TABLE `leasings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date_back` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` double(8,2) DEFAULT NULL,
  `bail` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `leasings`
--

INSERT INTO `leasings` (`id`, `user_id`, `car_id`, `driver_id`, `date_back`, `amount`, `bail`, `created_at`, `updated_at`) VALUES
(2, 3, 5, 2, '2019-02-21 00:00:00', 15000.00, 2000.00, '2019-02-06 19:38:29', '2019-02-08 17:05:47'),
(3, 4, 7, 1, '2019-02-07 00:00:00', 20000.00, 2000.00, '2019-02-07 08:26:29', '2019-02-08 17:07:30'),
(4, 9, 5, NULL, '2019-02-11 00:00:00', 100000.00, 10000.00, '2019-02-11 18:49:19', '2019-02-11 18:49:19'),
(5, 11, 5, NULL, '2019-02-13 00:00:00', 1.00, 0.00, '2019-02-12 14:14:17', '2019-02-12 14:14:17'),
(6, 12, 9, NULL, '2019-02-13 00:00:00', 1.00, 0.00, '2019-02-12 15:43:42', '2019-02-12 15:43:42'),
(7, 13, 5, NULL, '2019-02-13 00:00:00', 1.00, 0.00, '2019-02-12 16:08:03', '2019-02-12 16:08:03'),
(8, 3, 7, 1, '2019-02-14 00:00:00', 0.00, 2000.00, '2019-02-14 19:31:43', '2019-02-15 10:48:00'),
(9, 3, 5, 1, '2019-02-18 10:02:55', 40000.00, NULL, '2019-02-15 10:52:23', '2019-02-15 11:18:26'),
(10, 17, 5, NULL, '2019-02-15 21:02:50', NULL, NULL, '2019-02-15 11:37:05', '2019-02-15 11:37:05'),
(11, 17, 8, NULL, '2019-02-15 11:15:44', 0.00, NULL, '2019-02-15 11:46:56', '2019-02-15 11:46:56'),
(12, 17, 10, NULL, '2019-02-16 16:30:04', 15000.00, NULL, '2019-02-15 11:48:31', '2019-02-15 11:48:31'),
(13, 17, 10, 2, '2019-02-22 11:52:01', 90000.00, NULL, '2019-02-15 11:52:15', '2019-02-15 11:52:15'),
(14, 17, 7, NULL, '2019-02-18 16:08:00', 8000.00, NULL, '2019-02-15 16:08:17', '2019-02-15 16:08:17'),
(15, 17, 7, 1, '2019-02-18 16:08:00', 8000.00, NULL, '2019-02-15 16:20:08', '2019-02-15 16:20:08'),
(16, 17, 10, NULL, '2019-02-21 21:18:50', 75000.00, NULL, '2019-02-15 21:19:00', '2019-02-15 21:19:00'),
(17, 17, 7, NULL, '2019-02-20 12:40:12', 8000.00, NULL, '2019-02-17 12:40:18', '2019-02-17 12:40:18'),
(18, 3, 5, NULL, '2019-02-21 15:58:45', 40000.00, NULL, '2019-02-18 15:59:13', '2019-02-18 15:59:13'),
(19, 17, 9, NULL, '2019-02-28 17:08:08', 45000.00, NULL, '2019-02-18 17:08:15', '2019-02-18 17:08:15'),
(20, 10, 10, 2, '2019-02-22 15:24:48', 15000.00, NULL, '2019-02-20 15:25:13', '2019-02-20 15:25:13'),
(21, 16, 12, 2, '2019-02-23 15:29:17', 30000.00, NULL, '2019-02-20 15:29:34', '2019-02-20 15:29:34'),
(22, 13, 8, 2, '2019-02-22 15:37:33', 12000.00, NULL, '2019-02-20 15:37:47', '2019-02-20 15:37:47'),
(23, 17, 7, 2, '2019-02-23 15:52:54', 8000.00, NULL, '2019-02-20 15:53:02', '2019-02-20 15:53:02'),
(24, 17, 10, NULL, '2019-02-22 16:41:02', 0.00, NULL, '2019-02-22 16:41:11', '2019-02-22 16:41:11'),
(25, 17, 12, 2, '2019-02-28 16:45:21', 75000.00, NULL, '2019-02-22 16:45:42', '2019-02-22 16:45:42'),
(26, 17, 12, 1, '2019-02-28 17:28:36', 75000.00, NULL, '2019-02-22 17:28:42', '2019-02-22 17:28:42'),
(27, 17, 7, NULL, '2019-02-28 18:28:21', 20000.00, NULL, '2019-02-22 18:28:27', '2019-02-22 18:28:27'),
(28, 17, 12, 2, '2019-02-27 18:31:18', 60000.00, NULL, '2019-02-22 18:31:28', '2019-02-22 18:31:28'),
(29, 7, 12, 1, '2019-02-28 15:51:15', 30000.00, NULL, '2019-02-25 15:51:23', '2019-02-25 15:51:23'),
(30, 7, 10, NULL, '2019-02-28 18:19:00', 30000.00, NULL, '2019-02-25 18:19:41', '2019-02-25 18:19:41');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2019_02_05_120829_create_historic_table', 1),
(93, '2014_10_12_000000_create_users_table', 2),
(94, '2014_10_12_100000_create_password_resets_table', 2),
(95, '2019_02_05_115824_create_cars_table', 2),
(96, '2019_02_05_120051_create_carfiles_table', 2),
(97, '2019_02_05_120110_create_cartypes_table', 2),
(98, '2019_02_05_120144_create_carmodels_table', 2),
(99, '2019_02_05_120219_create_reservations_table', 2),
(100, '2019_02_05_120415_create_leasings_table', 2),
(101, '2019_02_05_120442_create_subcontractings_table', 2),
(102, '2019_02_05_120616_create_payments_table', 2),
(103, '2019_02_05_120650_create_invoices_table', 2),
(104, '2019_02_05_120829_create_historics_table', 2),
(105, '2019_02_05_183314_create_carstates_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `subcontracting_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `tva` double(8,2) DEFAULT NULL,
  `reduction_rate` double(8,2) DEFAULT NULL,
  `no_driver_rate` double(8,2) DEFAULT NULL,
  `bail_rate` double(8,2) DEFAULT NULL,
  `kilometer` int(11) DEFAULT NULL,
  `sup_amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rates`
--

INSERT INTO `rates` (`id`, `tva`, `reduction_rate`, `no_driver_rate`, `bail_rate`, `kilometer`, `sup_amount`, `created_at`, `updated_at`) VALUES
(1, 18.00, 20.00, 20.00, 10.00, 100, 5000, '2019-03-13 09:53:59', '2019-03-13 09:53:59');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_back` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` double(8,2) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `car_id`, `driver_id`, `date_start`, `date_back`, `discount`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 1, '2019-02-08 00:00:00', '2019-02-14 00:00:00', 25.00, 120000.00, '2019-02-07 08:52:34', '2019-02-15 11:14:24'),
(3, 3, 5, 1, '2019-02-08 00:00:00', '2019-02-14 00:00:00', 20.00, 120000.00, '2019-02-07 18:18:34', '2019-02-15 11:14:18'),
(4, 3, 5, 1, '2015-02-20 00:00:00', '2013-02-20 00:00:00', NULL, 20000.00, '2019-02-15 09:19:48', '2019-02-15 11:14:14'),
(5, 3, 5, 1, '2019-02-08 09:02:06', '2019-02-13 17:02:09', NULL, 100000.00, '2019-02-15 09:21:06', '2019-02-15 11:14:08'),
(6, 3, 10, NULL, '2019-02-15 10:02:01', '2019-02-22 10:02:00', NULL, 90000.00, '2019-02-15 10:15:51', '2019-02-15 10:15:51'),
(7, 17, 9, NULL, '2019-02-15 17:10:53', '2019-02-22 17:10:57', NULL, 35000.00, '2019-02-15 17:11:14', '2019-02-15 17:11:14'),
(8, 17, 9, NULL, '2019-02-15 17:10:53', '2019-02-22 17:10:57', NULL, 35000.00, '2019-02-15 17:12:08', '2019-02-15 17:12:08'),
(10, 17, 10, NULL, '2019-02-15 17:37:34', '2019-02-28 17:37:40', NULL, 195000.00, '2019-02-15 17:37:44', '2019-02-15 17:37:44'),
(11, 17, 6, 2, '2019-02-17 12:34:45', '2019-02-27 12:34:50', NULL, 100000.00, '2019-02-17 12:35:14', '2019-02-17 12:35:14'),
(12, 3, 5, NULL, '2019-02-18 15:34:20', '2019-02-20 15:34:24', NULL, 40000.00, '2019-02-18 15:34:38', '2019-02-18 15:34:38'),
(13, 17, 12, 1, '2019-02-19 15:29:06', '2019-02-28 15:29:10', NULL, 135000.00, '2019-02-19 15:29:17', '2019-02-19 15:29:17'),
(14, 17, 7, NULL, '2019-02-20 11:41:47', '2019-02-22 11:41:51', NULL, 8000.00, '2019-02-20 11:42:08', '2019-02-20 11:42:08'),
(15, 17, 12, NULL, '2019-02-20 11:53:04', '2019-02-28 11:53:11', NULL, 120000.00, '2019-02-20 11:53:19', '2019-02-20 11:53:19'),
(16, 17, 9, NULL, '2019-02-20 12:14:33', '2019-02-28 12:14:37', NULL, 40000.00, '2019-02-20 12:14:43', '2019-02-20 12:14:43'),
(17, 17, 9, NULL, '2019-02-20 12:18:51', '2019-02-28 12:18:55', NULL, 40000.00, '2019-02-20 12:19:13', '2019-02-20 12:19:13'),
(18, 17, 11, NULL, '2019-02-20 12:23:11', '2019-02-22 12:23:16', NULL, 40000.00, '2019-02-20 12:23:41', '2019-02-20 12:23:41'),
(19, 17, 12, NULL, '2019-02-20 12:26:33', '2019-02-28 12:26:37', NULL, 120000.00, '2019-02-20 12:26:51', '2019-02-20 12:26:51'),
(20, 17, 5, NULL, '2019-02-20 12:40:15', '2019-02-27 12:40:19', NULL, 140000.00, '2019-02-20 12:40:24', '2019-02-20 12:40:24'),
(21, 17, 12, NULL, '2019-02-20 12:46:37', '2019-02-27 12:46:42', NULL, 105000.00, '2019-02-20 12:46:47', '2019-02-20 12:46:47'),
(22, 17, 12, NULL, '2019-02-20 13:52:16', '2019-02-28 13:52:23', NULL, 120000.00, '2019-02-20 13:52:30', '2019-02-20 13:52:30'),
(23, 17, 10, NULL, '2019-02-20 13:55:56', '2019-02-27 13:56:00', NULL, 105000.00, '2019-02-20 13:56:09', '2019-02-20 13:56:09'),
(24, 17, 8, NULL, '2019-02-20 14:22:21', '2019-02-28 14:22:25', NULL, 96000.00, '2019-02-20 14:22:30', '2019-02-20 14:22:30'),
(25, 16, 5, 1, '2019-02-20 18:30:35', '2019-02-22 16:22:28', NULL, 20000.00, '2019-02-20 16:22:38', '2019-02-20 16:22:38'),
(26, 23, 5, 1, '2019-02-20 16:44:05', '2019-02-28 16:44:28', NULL, 160000.00, '2019-02-20 16:44:33', '2019-02-20 16:44:33'),
(27, 23, 7, NULL, '2019-02-20 18:07:06', '2019-03-20 18:07:09', NULL, 112000.00, '2019-02-20 18:07:24', '2019-02-20 18:07:24'),
(28, 17, 7, NULL, '2019-02-21 10:44:25', '2019-02-27 10:44:35', NULL, 24000.00, '2019-02-21 10:44:41', '2019-02-21 10:44:41'),
(29, 17, 10, NULL, '2019-02-22 17:25:22', '2019-02-27 17:25:28', NULL, 75000.00, '2019-02-22 17:25:34', '2019-02-22 17:25:34'),
(30, 17, 10, NULL, '2019-02-22 17:41:49', '2019-02-27 17:41:54', NULL, 75000.00, '2019-02-22 17:42:07', '2019-02-22 17:42:07'),
(31, 17, 9, NULL, '2019-02-22 18:46:59', '2019-02-28 18:47:03', NULL, 30000.00, '2019-02-22 18:47:07', '2019-02-22 18:47:07'),
(32, 17, 5, NULL, '2019-02-22 19:17:18', '2019-02-23 19:17:21', NULL, 20000.00, '2019-02-22 19:17:26', '2019-02-22 19:17:26'),
(33, 7, 5, NULL, '2019-02-25 16:05:43', '2019-02-25 16:05:47', NULL, 20000.00, '2019-02-25 16:08:09', '2019-02-25 16:08:09'),
(34, 7, 5, NULL, '2019-02-25 16:08:27', '2019-02-26 17:08:31', NULL, 20000.00, '2019-02-25 16:08:39', '2019-02-25 16:08:39'),
(35, 7, 5, NULL, '2019-02-25 16:09:05', '2019-02-27 15:09:13', NULL, 20000.00, '2019-02-25 16:10:02', '2019-02-25 16:10:02'),
(36, 7, 5, NULL, '2019-02-25 16:10:43', '2019-02-27 16:10:50', NULL, 40000.00, '2019-02-25 16:10:56', '2019-02-25 16:10:56'),
(37, 7, 10, NULL, '2019-02-25 16:24:50', '2019-02-27 16:24:54', NULL, 30000.00, '2019-02-25 16:24:59', '2019-02-25 16:24:59'),
(38, 3, 5, NULL, '2019-02-25 18:40:10', '2019-02-28 18:40:15', NULL, 60000.00, '2019-02-25 18:42:58', '2019-02-25 18:42:58'),
(39, 7, 6, NULL, '2019-02-25 18:25:54', '2019-02-28 18:25:58', NULL, 30000.00, '2019-02-25 18:43:22', '2019-02-25 18:43:22'),
(40, 3, 5, NULL, '2019-03-11 16:05:43', '2019-03-12 10:27:55', NULL, 20000.00, '2019-03-11 10:28:06', '2019-03-11 10:28:06');

-- --------------------------------------------------------

--
-- Structure de la table `subcontractings`
--

CREATE TABLE `subcontractings` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposal_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcontractings`
--

INSERT INTO `subcontractings` (`id`, `reservation_id`, `leasing_id`, `company`, `disposal_amount`, `created_at`, `updated_at`) VALUES
(6, 3, NULL, 'Car Washes', 10000.00, '2019-02-07 14:21:35', '2019-02-07 20:06:21'),
(7, NULL, 2, 'CFA Motors', 100000.00, '2019-02-07 14:22:28', '2019-02-07 20:06:37'),
(8, 1, NULL, 'CFAO', 2500.00, '2019-02-07 18:24:53', '2019-02-08 15:44:39');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `role`, `telephone`, `cni`, `resource_name`, `resource_num`, `operator_num`, `address`, `photo`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Boris Ahiavee', 'bob@gmail.com', NULL, 'bobobo', NULL, 'admin', '91919191', NULL, NULL, NULL, NULL, 'Adidogomé', 'QwbRWJ48SOyVUxVSl5A1Bmdb2joZWsKxymSl8c7b.jpeg', 1, '5noQEGMGMgS665NV6SZKC6d3Pt7TbBRJZlgFE13HcrEKRsWy92uLe4QOdMdL', '2019-02-05 19:00:49', '2019-02-08 13:41:01'),
(3, 'Childish Gambino', 'gambino@gmail.com', NULL, '$2y$10$wUufPF4d6JJw6Cpj8Sn2/.CpG/WXsy4H6tTRGbLQ2RxHbdVm5Uc6i', 'physical', 'standard', '50505050', '225252525', NULL, NULL, NULL, 'Gblinkomé', 'ACCAwfy6u1ckROWBnblV1rVYtNVYYnuNfVnwOR0t.jpeg', 1, NULL, '2019-02-06 17:16:31', '2019-02-11 18:45:12'),
(4, 'Kim Kardashian', 'kim@gmail.com', NULL, '$2y$10$WD2KJRDnku4grCVtc3PJAOLCliKp6TM3dSz0r/HhGEUFhKG90ayny', 'physical', 'standard', '91919191', '5050505050', NULL, NULL, NULL, 'adidogomé', 'rSMzXaG67qrGZ0zUElSnP9s7pPYUAGQ1dyG7UTJS.jpeg', 1, NULL, '2019-02-06 17:26:51', '2019-02-11 14:21:50'),
(5, 'Spark', 'spark@spark.org', NULL, '$2y$10$3PNBmSWEUH3496OiHc7h9eDVIcLBUbFdK9pgvIzyo0RZGUaFLp3ia', 'moral', 'standard', '91919191', NULL, 'Edorh Christian', '50205020', '9898989cfo', 'Gblinkomé', 'fvO6wxr33MvMUgxAntn0LX5Xm2JulO7TGMRZKV8F.jpeg', 0, NULL, '2019-02-06 17:32:39', '2019-02-08 15:13:10'),
(6, 'Rihanna', 'rir@gmail.com', NULL, '$2y$10$eohLTps0psmrFZcR2aanHODGr15UEtyKAyzXgH9G9nXCy.1qEaY2K', NULL, 'secretaire', '92929292', NULL, NULL, NULL, NULL, 'California', 'fkzJjX5hR0us1jqWnaYbVnHJyj3P8hu2jWygX5cj.jpeg', 0, NULL, '2019-02-07 15:42:52', '2019-02-11 14:35:41'),
(7, 'Cristiano Ronaldo', 'cr7@gmail.com', NULL, '$2y$10$/6gv34ZXB5dbz45WVuQOLOFJ8Ao1vOH0Pj.EH04D6rjCGhdNP3zra', NULL, 'admin', '94949494', NULL, NULL, NULL, NULL, 'Turin', 'fACxJyUCGJ0MxV1ZePLqClbELXJVvsGdg5mj2K9U.jpeg', 1, 'ARNx0XrRoRkse09wVAnne5mKUY5dSlKNjxXiWRJ27drY6MQVRDY3B7RT1Ecb', '2019-02-07 15:47:56', '2019-02-13 16:53:08'),
(9, 'Spark Spark aaaa', 'spark@admin.org', NULL, '$2y$10$41R1FQ7lzVzmv4P28mOfButYDnO2AYPgxVKYVs6jXeYcjaGxA7HmK', 'physical', 'standard', '929292925555', 'ab555621', NULL, NULL, NULL, 'Lomé', 'O4LOMHcKS5lTnaDRqQEDCLrH6hyTXmPNkHDqibA0.jpeg', 1, NULL, '2019-02-07 18:08:34', '2019-02-11 12:40:38'),
(10, 'CFAO', 'cfao@gmail.com', NULL, '$2y$10$QLryzT3jmXkVPMebWyqyYuyyzmwGrDlvHtQF8AjoVCnglJRbAn10O', 'moral', 'standard', '50505050', NULL, 'Toto', 'ab5050', '5050500', 'soted', '7K0zjjPEjXxiK1oDozCjzerBEsALJ2e1IHa4LQvk.jpeg', 1, NULL, '2019-02-07 18:11:24', '2019-02-07 18:11:24'),
(11, 'Jeanne Jeanne', 'bahiavee@gmail.com', NULL, '$2y$10$aEJP/l9Yu26dvpRpIUNFM.vu3UVnPjIU2H0q80GLsx3VUDeS4PW2C', 'physical', 'standard', '92603091', '92063091', NULL, NULL, NULL, 'Agbalépédo, Lomé, Togo', 'iiYhkmxi6DtDJUe12kt2MMt69wQ41mCwIpygbVjF.jpeg', 1, NULL, '2019-02-12 14:13:20', '2019-02-12 16:44:04'),
(12, 'Edorh Christian', 'christianedorh@gmail.com', NULL, '$2y$10$xoJek2YUn1IbXBRNmcS7ruQEvmXckIeModr7ZELMZs1MO7VkEuNYG', 'physical', 'standard', '96747674', '22896747674', NULL, NULL, NULL, 'Nyekonakpoe, Lomé, Togo', 'Zsn8Y89POiSCk85bb5vLZA6bXQaxS67zkNRWZhMr.jpeg', 1, NULL, '2019-02-12 15:42:24', '2019-02-12 15:47:41'),
(13, 'Paygate', 'paypate@gmail.com', NULL, '$2y$10$rqIFGZO85Gq76sBX6GW1ReSzJWppz657Pq0MbnODJ8zYxBWgrFomy', 'physical', 'standard', '96644879', '96644879', NULL, NULL, NULL, 'Gblinkomé, Lomé, Togo', '7msUqym5hOvYhOULl3IU02kXHWqcq5TY4oiDW0MH.jpeg', 1, NULL, '2019-02-12 16:07:27', '2019-02-12 17:06:03'),
(14, 'Test', 'testtest@gmail.com', NULL, '$2y$10$AIZXFAQbpJtKhapH3XgUwe31REQEdo90olvSB8o7u6/QT8/015h2G', NULL, 'secretaire', 'Test', NULL, NULL, NULL, NULL, NULL, 'ysNZBEqSNNPpiJ6k7TWAbBIOvVWGIzpyFGryZxdF.jpeg', 1, NULL, '2019-02-13 12:24:08', '2019-02-13 12:26:29'),
(15, 'Dianouch', 'dianouch@gmail.com', NULL, '$2y$10$q6bNKpnuzJk6SHAGoJZVg.oVuL14sRqK8x2pqORopzUhGTHNYUD92', 'physical', 'standard', '97979797', 'aze789', NULL, NULL, NULL, 'Yok City', 'CGFIDefjeTVDtJ6L1JsWj00DtJlg0wgArrZDYWfA.jpeg', 1, 'FrOeI55ayzCkdGYzHXzJgaw7XJJlj8czJjUGo2Cd2ZQuJtJiKJOBlDf1xEoV', '2019-02-14 12:25:56', '2019-02-14 12:25:56'),
(16, 'Swing', 'swing@gmail.com', NULL, '$2y$10$gwCgq1fkPoN9BWUhmU7zmegvtKPiWXXLH4DOldYHXtahn2MxM2GYG', 'physical', 'standard', '94959595', 'aze789', NULL, NULL, NULL, 'Bruxelles', 'LmKeSVdugBiGVTrBx7oJ8bUTAVztf0psNp0Pyu5p.png', 1, NULL, '2019-02-14 12:28:00', '2019-02-14 12:44:27'),
(17, 'Migos', 'migos@gmail.com', NULL, '$2y$10$zKjQ/.O0Rwk5O2wUvP2ncOLFrnhDq7YoE6dkVO3U0OIKEm3elFSDy', 'physical', 'standard', '97979797', 'aze456', NULL, NULL, NULL, 'california', '7D1ihCJNc3qUFfWg31DoABmqpQCZceTuO9LPulmc.jpeg', 1, 'aaF1nXiPDh7JWjuaKKfK15njVieXZ9BCeV8BZfS0F7vG7EbD43uXtAU8HocR', '2019-02-14 12:31:24', '2019-02-20 11:14:43'),
(18, 'Dianouch', 'didi@gmail.com', NULL, '$2y$10$xEcjoK37heEgAs0XIM60k.WPtqBoROe1KHUV4aKDaAm3NYKK3fwpO', NULL, 'secretaire', '97989798', NULL, NULL, NULL, NULL, 'Adidogomé', 'KvmRzxqrW21oSzSZI1AaQ8vCAnGYq3CCFvxJjXCX.jpeg', 1, NULL, '2019-02-20 08:37:43', '2019-02-20 08:37:43'),
(19, 'test', 'test@spark.org', NULL, '$2y$10$d/11L2G.Lj//pRTtj54hfOwq5qY6nso3lwOir4r0mbaYSHGKRygE2', NULL, 'secretaire', '94959498', NULL, NULL, NULL, NULL, 'Agoe', 'TEUn3iH88sQtj3z7ZWYiMsPseoDa1LiribDNHkyq.png', 1, NULL, '2019-02-20 09:06:45', '2019-02-20 09:06:45'),
(20, 'project', 'project@gmail.com', NULL, '$2y$10$8Ik5CgKLT6xQX0A4xn1KD.66yLGjJQBlMVz5hJBzGeFNIEgR087DG', NULL, 'secretaire', '54545454', NULL, NULL, NULL, NULL, 'test', 'pIcIKxGf2kdrNzhBswHFydUVRhleN9Amx8jhlJE8.png', 1, NULL, '2019-02-20 09:18:47', '2019-02-20 09:18:47'),
(21, 'essai', 'essai@gmail.com', NULL, '$2y$10$9n6JOzRa19jCUV6ylp1Pku5jik20Ae7b7Ft6Scx07sQcCzDLQzice', NULL, 'secretaire', '95929292', NULL, NULL, NULL, NULL, 'aaa', 'nPa89rD62itGR6Z2S8GAZKQkbSX64ETVwXnwpfyN.jpeg', 1, NULL, '2019-02-20 09:57:19', '2019-02-20 09:57:19'),
(22, 'a', 'a@gmail.com', NULL, '$2y$10$1/nMRJnlyQfIlViFgG4pR.6t8Z.JvyIRTu.jc1HxJA18ho2YVC73C', NULL, 'secretaire', '94949494', NULL, NULL, NULL, NULL, 'a', 'gd91E2uhtWPVPz16AFS58hhJWGU2WeO3yJTmisST.jpeg', 1, NULL, '2019-02-20 10:02:26', '2019-02-20 10:02:26'),
(23, 'Admin', 'admin@gmail.com', NULL, '$2y$10$k4AG.jMqfvDHMs1r3bXBIOU2nF9OwH8vp5cEIs1cet9zaQgXN7TRG', 'physical', 'standard', '92929292', '5020122010', NULL, NULL, NULL, 'adidogomé', 'oztjFgeG83IlR1XgmKdMgd7xgj22VG0cxsgKUkHy.jpeg', 1, NULL, '2019-02-20 16:42:42', '2019-02-20 17:48:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carfiles`
--
ALTER TABLE `carfiles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carmodels`
--
ALTER TABLE `carmodels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carstates`
--
ALTER TABLE `carstates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartypes`
--
ALTER TABLE `cartypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historics`
--
ALTER TABLE `historics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `leasings`
--
ALTER TABLE `leasings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcontractings`
--
ALTER TABLE `subcontractings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carfiles`
--
ALTER TABLE `carfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `carmodels`
--
ALTER TABLE `carmodels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `carstates`
--
ALTER TABLE `carstates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cartypes`
--
ALTER TABLE `cartypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `historics`
--
ALTER TABLE `historics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `leasings`
--
ALTER TABLE `leasings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `subcontractings`
--
ALTER TABLE `subcontractings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
