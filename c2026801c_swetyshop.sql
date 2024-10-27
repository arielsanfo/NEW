-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 02:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2026801c_swetyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiche`
--

CREATE TABLE `affiche` (
  `id_affiche` int NOT NULL,
  `titre` varchar(255)  NOT NULL,
  `descriptions` text  NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiche`
--

INSERT INTO `affiche` (`id_affiche`, `titre`, `descriptions`, `date_creation`) VALUES
(1, 'Coeurlandy au coeur de l&#039;habillement', 'Coeurlandy au coeur de l&#039;habillement', '2023-09-16 07:41:48'),
(2, 'Le futur de la mode africaine', 'Le futur de la mode africaine en fonction de vos préférences', '2023-09-19 10:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int NOT NULL,
  `titre` varchar(255)  NOT NULL,
  `photo_url` varchar(255)  DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `titre`, `photo_url`, `date_creation`) VALUES
(20, 'Téléphone', NULL, '2024-03-21 11:47:37'),
(21, 'Ordinateur', NULL, '2024-03-21 11:49:27'),
(22, 'Electroménager', NULL, '2024-03-21 12:19:06'),
(23, 'Télévision', NULL, '2024-03-21 12:53:12'),
(24, 'Accessoire ', NULL, '2024-03-21 12:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int NOT NULL,
  `id_users` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `total` float DEFAULT NULL,
  `states` text CHARACTER SET utf8mb4,
  `statut` int NOT NULL DEFAULT '0',
  `types` text CHARACTER SET utf8mb4,
  `citys` varchar(255) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_users`, `email`, `nom`, `adresse`, `telephone`, `total`, `states`, `statut`, `types`, `citys`, `date_creation`) VALUES
(1, 0, NULL, 'Leprince', 'Yaoundé nkomo dispensaire institut NFKENG MODE', '690911080', 0, '', 1, '', NULL, '2023-10-05 23:55:13'),
(2, 0, NULL, 'Leprince Ngando Madiba', 'yaoundé, bastos', '690911080', 0, '', 1, '', NULL, '2023-10-06 00:03:30'),
(3, 0, NULL, 'Leprince Ngando Madiba', 'yaoundé, bastos', '690911080', 0, '', 1, '', NULL, '2023-10-06 00:14:38'),
(5, 0, NULL, 'leprince  ngando', 'cameroun', '655433234', 0, '', 1, '', NULL, '2023-10-06 09:00:09'),
(8, 0, NULL, 'Leprince Ngando Madiba', 'yaoundé, bastos', '690911080', 0, '', 1, '', NULL, '2023-10-06 10:08:58'),
(9, 0, NULL, 'joel', 'joelnembot@gmail.com', '658535067', 0, '', 1, '', NULL, '2023-10-06 10:16:37'),
(10, 0, NULL, 'Ngando Leprince', 'Leprince', '6738383773', 0, 'New york', 0, '', NULL, '2023-10-26 11:50:16'),
(11, 0, NULL, 'Ngando Leprince', 'Leprince', '6738383773', 0, 'New york', 0, '', NULL, '2023-10-26 12:10:23'),
(12, 0, NULL, 'Ngando Leprince', 'Leprince', '78998766', 0, 'Tu ', 0, '', NULL, '2023-10-26 12:11:03'),
(13, 0, NULL, 'Ngando Leprince', 'Leprince', '655441618819', 0, 'Tu ', 0, '', NULL, '2023-10-26 12:12:49'),
(14, 0, NULL, 'Ngando Leprince', 'Leprince', '56890764', 0, 'Yuyu', 0, '', NULL, '2023-10-26 12:16:44'),
(15, 0, NULL, 'leprince  ngando', 'cameroun', '+237 0690911080', 0, 'Sud', 0, '', NULL, '2023-10-26 13:46:57'),
(16, 0, NULL, 'leprince  ngando', 'cameroun', '+237 0690911080', 0, 'Sud', 0, '', NULL, '2023-10-26 13:52:30'),
(17, 0, NULL, 'leprince  ngando', 'cameroun', '+237 0690911080', 200, 'Sud', 0, '', NULL, '2023-10-26 21:10:47'),
(18, 0, NULL, 'leprince  ngando', 'cameroun', '+237 0690911080', 200, 'Sud', 0, '', NULL, '2023-10-30 23:27:14'),
(19, 18, NULL, 'Grossesse extra-utérine', 'yaoundé, Poste centrale', '0690911089', NULL, NULL, 0, 'paiement à la livraison', NULL, '2023-11-08 23:58:31'),
(20, NULL, 'madibacho50@gmail.com', 'leprince  ngando', 'cameroun', '+237 0690911080', 100, 'Sud', 0, NULL, 'Douala', '2024-01-10 10:57:24'),
(21, NULL, 'madibacho50@gmail.com', 'leprince  ngando', 'cameroun', '+237 0690911080', 100, 'Sud', 0, NULL, 'Douala', '2024-01-10 11:00:47'),
(22, NULL, 'madibacho50@gmail.com', 'Leprince ngando', 'cameroun', '+237 0690911080', 1200, 'Sud', 0, NULL, 'Douala', '2024-03-21 12:15:42'),
(23, NULL, 'madibacho50@gmail.com', 'Leprince ngando', 'cameroun', '+237 0690911080', 19000, 'Sud', 0, NULL, 'Douala', '2024-03-21 12:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

CREATE TABLE `couleur` (
  `id_couleur` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`id_couleur`, `titre`, `date_creation`) VALUES
(1, 'white', '2023-10-18 22:25:04'),
(2, 'red', '2023-10-18 22:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id_description` int NOT NULL,
  `descriptions` text  NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id_description`, `descriptions`, `date_creation`) VALUES
(1, 'Coeurlandy design est une entreprise qui fait dans la confection de haut de game', '2023-09-11 18:04:55'),
(2, 'toujours bien s&#039;habiller est une priorité chez nous car la sape est un art', '2023-09-16 07:28:21'),
(3, 'la marque futur coeurlandy', '2023-09-16 07:37:35'),
(4, 'coeurlandy design est une marque créée en 2020 par gina etc...', '2023-09-19 10:30:36'),
(5, 'La marque Coeurlandy Design vous propose des articles de tout type. \r\n-Vêtements bi matières ayant du wax  et d&#039;autres tissus venus d&#039;ailleurs tels du Jeans, du cuir, de la soie, du velours , du satin, de l&#039;organza…  \r\n- Sacs\r\n-Accessoires de mode\r\n- Gadgets avec logo de la marque\r\n-Etc.\r\n', '2023-09-19 13:31:50'),
(6, 'La marque Coeurlandy Design vous propose des articles de tout type. \r\n-Vêtements bi matières ayant du wax  et d&#039;autres tissus venus d&#039;ailleurs tels du Jeans, du cuir, de la soie, du velours , du satin, de l&#039;organza…  \r\n- Sacs\r\n-Accessoires de mode\r\n- Gadgets avec logo de la marque\r\n-Etc.\r\n', '2023-09-19 13:32:35'),
(7, 'Ensembles de la collection Hilton. &quot;Bi matière&quot;', '2023-09-21 14:45:10'),
(8, 'Decouvrez les produits 100% africains, chinois, américains et plus encore', '2023-09-25 15:17:08'),
(9, 'Decouvrez les produits 100% africains, chinois, américains et plus encore', '2023-10-26 22:17:09'),
(10, 'Decouvrez les produits 100% africains, chinois, américains et plus encoredsds', '2023-10-26 22:17:43'),
(11, 'Decouvrez les produits 100% africains, chinois, américains et plus encoredsds oko k', '2023-10-26 22:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id_income` int NOT NULL,
  `id_users` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id_income`, `id_users`, `date_creation`) VALUES
(3, 6, '2023-09-25 17:44:13'),
(4, 4, '2023-09-25 17:45:52'),
(5, 7, '2023-09-25 18:08:04'),
(6, 3, '2023-09-26 10:57:46'),
(7, 9, '2023-10-06 00:17:01'),
(8, 10, '2023-10-06 09:01:50'),
(9, 20, '2023-11-23 13:09:46'),
(10, 18, '2023-12-11 21:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `liens`
--

CREATE TABLE `liens` (
  `numero` varchar(155)  DEFAULT NULL,
  `id_liens` int NOT NULL,
  `numero_whatsapp` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `liens_facebook` varchar(255)  NOT NULL,
  `liens_instagram` varchar(255)  NOT NULL,
  `liens_tiktok` varchar(255)  NOT NULL,
  `adresse` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liens`
--

INSERT INTO `liens` (`numero`, `id_liens`, `numero_whatsapp`, `liens_facebook`, `liens_instagram`, `liens_tiktok`, `adresse`, `email`, `date_creation`) VALUES
('leprince  ngando', 1, 'leprince  ngando', 'leprince  ngando', 'leprince  ngando', 'leprince  ngando', '', '', '2023-10-26 21:46:43'),
('leprince  ngando', 2, 'leprince  ngando', 'leprince  ngandosss', 'leprince  ngando', 'leprince  ngando', '', '', '2023-10-26 21:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_messages` int NOT NULL,
  `id_receiver` int NOT NULL,
  `id_sender` int NOT NULL,
  `messages` text NOT NULL,
  `id_produit` int DEFAULT NULL,
  `statut` int NOT NULL DEFAULT '0',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_messages`, `id_receiver`, `id_sender`, `messages`, `id_produit`, `statut`, `date_creation`) VALUES
(59, 1, 6, 'bonjour', 38, 1, '2023-09-25 17:44:13'),
(60, 6, 1, 'oui bonjour', NULL, 0, '2023-09-25 17:44:37'),
(61, 6, 1, 'ce produit est disponible et coûte 1200000', NULL, 0, '2023-09-25 17:45:01'),
(62, 1, 4, 'besoin urgent de ceci', 37, 1, '2023-09-25 17:45:52'),
(63, 4, 1, 'bonjour vous êtes situé où ?', NULL, 0, '2023-09-25 17:46:14'),
(64, 4, 1, '', NULL, 0, '2023-09-25 17:46:16'),
(65, 4, 1, '', NULL, 0, '2023-09-25 17:46:17'),
(66, 4, 1, '', NULL, 0, '2023-09-25 17:46:18'),
(67, 4, 1, '', NULL, 1, '2023-09-25 17:46:20'),
(68, 4, 1, '', NULL, 0, '2023-09-25 17:46:21'),
(69, 4, 1, '', NULL, 0, '2023-09-25 17:46:31'),
(70, 4, 1, 'cdssdfsd', NULL, 0, '2023-09-25 17:46:36'),
(71, 1, 4, 'vous dites ?', NULL, 1, '2023-09-25 17:50:30'),
(72, 4, 1, 'désolé erreur du clavier ouppss', NULL, 1, '2023-09-25 17:54:04'),
(73, 4, 1, '😒😒', NULL, 0, '2023-09-25 17:54:09'),
(74, 1, 4, 'ahh d&#039;accord je vois', NULL, 1, '2023-09-25 17:54:15'),
(75, 1, 6, 'c&#039;est beaucoup j&#039;ai 100k cho cho', 0, 1, '2023-09-25 17:58:24'),
(76, 1, 7, 'besoin de ceci pour mon enfant', 34, 1, '2023-09-25 18:08:04'),
(77, 7, 1, 'oui vous avez combien ?', NULL, 0, '2023-09-25 18:08:28'),
(78, 1, 7, 'je taximan j&#039;', NULL, 1, '2023-09-25 18:08:36'),
(79, 1, 7, 'j&#039;', NULL, 1, '2023-09-25 18:08:41'),
(80, 1, 7, 'j&#039;ai pas l&#039;argent donc 2000 fcfa ça va ??', NULL, 1, '2023-09-25 18:09:00'),
(81, 7, 1, 'les taximans ne demande pas le prix des choses chère', NULL, 0, '2023-09-25 18:09:18'),
(82, 1, 7, '😡😡😡😡😡', NULL, 1, '2023-09-25 18:09:33'),
(83, 7, 1, 'oui oui😁😁😁', NULL, 0, '2023-09-25 18:09:44'),
(84, 1, 7, 'hum', 0, 0, '2023-09-25 18:21:30'),
(85, 1, 7, 'vous dites quoi ?', NULL, 0, '2023-09-25 18:23:48'),
(86, 1, 4, '????', 0, 1, '2023-09-25 18:24:03'),
(87, 1, 4, 'vous dites ?', NULL, 1, '2023-09-25 18:30:35'),
(88, 1, 6, 'hello je suis de retour pour ce produit ', NULL, 1, '2023-09-25 18:31:44'),
(89, 6, 1, 'oui oui nous vous écoutons ', NULL, 0, '2023-09-25 18:32:28'),
(90, 1, 6, 'Besoin de ceci', 35, 0, '2023-09-25 19:24:25'),
(91, 1, 3, 'ekier', 0, 1, '2023-09-26 10:57:46'),
(92, 1, 3, 'le prix svp', 37, 1, '2023-09-26 11:00:31'),
(93, 1, 4, 'bonjour j&#039;ai besoin de ce produit', 43, 1, '2023-09-26 15:25:32'),
(94, 4, 1, 'oui oui vous avez combien ?', NULL, 0, '2023-09-26 15:25:56'),
(95, 1, 4, 'j&#039;ai 200k cho cho', NULL, 1, '2023-09-26 15:26:08'),
(96, 4, 1, 'c&#039;est petit', NULL, 0, '2023-09-26 15:28:15'),
(97, 1, 4, 'comment ça ?', NULL, 1, '2023-09-26 15:28:23'),
(98, 1, 4, 'yo', NULL, 0, '2023-09-26 15:28:59'),
(99, 4, 1, 'bonjour', NULL, 0, '2023-09-26 15:29:05'),
(100, 1, 4, 'on dit quoi ndolè ?', NULL, 0, '2023-09-26 15:29:15'),
(101, 4, 1, 'poser norh ', NULL, 0, '2023-09-26 15:29:21'),
(102, 1, 4, 'dzdfz', NULL, 0, '2023-09-26 15:29:24'),
(103, 1, 4, 'ok je suis là', NULL, 0, '2023-09-26 15:33:09'),
(104, 1, 9, 'bonjour', 0, 1, '2023-10-06 00:17:01'),
(105, 9, 1, 'bonjour monsieur', NULL, 0, '2023-10-06 00:23:48'),
(106, 1, 10, 'BONJOUR', 0, 1, '2023-10-06 09:01:50'),
(107, 10, 1, 'bonjour que puissons nous faire', NULL, 0, '2023-10-06 09:06:19'),
(108, 1, 10, 'Besoin de ce téléphone ', 43, 1, '2023-10-06 09:18:19'),
(109, 1, 20, 'leprince', 0, 0, '2023-11-23 13:09:46'),
(110, 1, 20, 'ok', 53, 0, '2023-11-23 13:09:59'),
(111, 1, 20, '', 52, 0, '2023-11-23 13:20:45'),
(112, 1, 20, '', 53, 0, '2023-11-23 13:20:45'),
(113, 1, 20, 'Depuis le panier', 52, 0, '2023-11-23 13:22:43'),
(114, 1, 20, 'Depuis le panier', 53, 0, '2023-11-23 13:22:43'),
(115, 1, 18, 'Bonjour', 0, 0, '2023-12-11 21:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photos` int NOT NULL,
  `id_produits` int NOT NULL,
  `photo_url` varchar(255)  NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_photos`, `id_produits`, `photo_url`, `date_creation`) VALUES
(1, 3, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-11 18:52:47'),
(2, 4, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-11 19:05:38'),
(3, 5, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-11 19:07:22'),
(4, 6, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-12 15:54:57'),
(5, 8, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-12 16:02:35'),
(6, 9, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-12 16:04:29'),
(7, 10, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-12 16:06:05'),
(8, 11, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-12 16:44:04'),
(9, 12, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-15 21:50:10'),
(10, 13, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-16 07:56:34'),
(11, 13, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-16 07:56:37'),
(12, 14, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-19 10:33:15'),
(13, 14, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-19 10:33:15'),
(14, 14, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-19 10:33:16'),
(15, 14, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-19 10:33:16'),
(16, 15, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-19 13:52:08'),
(17, 16, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 13:55:12'),
(18, 17, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:18:56'),
(19, 17, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:18:56'),
(20, 17, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:18:56'),
(21, 18, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:23:07'),
(22, 18, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:23:08'),
(23, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:17'),
(24, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:17'),
(25, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:18'),
(26, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:18'),
(27, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:18'),
(28, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:18'),
(29, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:19'),
(30, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:19'),
(31, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:19'),
(32, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:19'),
(33, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:20'),
(34, 19, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 14:42:20'),
(35, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:18'),
(36, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:19'),
(37, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:19'),
(38, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:19'),
(39, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:19'),
(40, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:20'),
(41, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:20'),
(42, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:20'),
(43, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:20'),
(44, 20, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:04:21'),
(45, 21, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:07:16'),
(46, 22, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:15:39'),
(47, 22, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-21 15:15:39'),
(48, 23, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:29:59'),
(49, 24, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:31:18'),
(50, 25, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:32:23'),
(51, 26, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:33:58'),
(52, 27, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:34:18'),
(53, 28, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:36:29'),
(54, 29, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:42:06'),
(55, 29, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:42:06'),
(56, 29, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:42:06'),
(57, 30, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:46:25'),
(58, 30, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:46:25'),
(59, 30, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:46:26'),
(60, 31, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:54:19'),
(61, 31, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-22 17:54:19'),
(62, 32, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:01:36'),
(63, 33, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:03:02'),
(64, 34, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:04:12'),
(65, 35, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:07:19'),
(66, 36, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:09:33'),
(67, 37, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:11:05'),
(68, 38, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:13:09'),
(69, 39, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 11:14:30'),
(70, 40, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 15:14:16'),
(71, 41, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-25 17:04:15'),
(72, 42, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-26 13:53:29'),
(74, 43, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-26 14:47:58'),
(75, 44, 'img/8df489ddb1cd5fd9e440e11976eb8bb2b962e7b1_cnf9520_1.webp', '2023-09-26 14:51:19'),
(76, 46, 'img/09c1eb2e4657e165a6ef098dc519016967440950_665756693890326_4778808835036592660_n (1).webp', '2023-10-18 22:31:31'),
(77, 47, 'img/81cf492ba54a865cc5ebca5f4e3eaa18preview.png', '2023-10-18 22:33:02'),
(78, 47, 'img/ddeba00545f2bdde5432ee6c5a5995b2close-up-smiley-woman-holding-remote.jpg', '2023-10-18 22:33:04'),
(79, 48, 'img/6ccdfc9433e39742e358e402fdf5998eafrican-american-handsome-jazz-musician-playing-tambourine-singing.jpg', '2023-10-18 22:36:00'),
(80, 49, 'img/3e67159023543386426fd351469f92e8ffff.png', '2023-10-19 00:14:21'),
(81, 49, 'img/ad0c8426bd956ee622aecb1df25448c3affiche.png', '2023-10-19 00:14:22'),
(82, 49, 'img/b8b28a183589aaeaba55704d87189da9dqsdqsdqs.jpeg', '2023-10-19 00:14:23'),
(83, 50, 'img/fd59aa868e30e3a742d7a4456e2fb598front-view-handsome-male-musician-home-playing-guitar-removebg-preview.png', '2023-10-26 10:37:44'),
(84, 52, 'img/bca3b066e232ea84174bb61f5ee75f3a1c1ff53138667ab4f8cca5b027e6d0167452d85d_cnf2218_1.webp', '2023-10-26 12:26:35'),
(85, 53, 'img/66be5c938b2127a028cdc6a5550d2f9d171dacd8406276ac2f98a17b36281aacb5ca7cb2_CNG5002_1.webp', '2023-10-26 13:42:06'),
(86, 54, 'img/02f54c78caa6196a6f48c6aa243b89e3c642e164748 (1).png', '2024-03-21 11:50:57'),
(87, 55, 'img/631d6021d6d6305e09bda42b519e7054frigo.jpeg', '2024-03-21 12:27:43'),
(88, 56, 'img/f92bf95bcd845938ce50e58d3a807d94frigo.jpeg', '2024-03-21 12:27:43'),
(89, 57, 'img/1f495a281276cbee4232cc1ca8ced9c5R (28).jpeg', '2024-03-21 12:29:27'),
(90, 58, 'img/5f704bf04c6db356493b8db4f69da94eR (28).jpeg', '2024-03-21 12:33:12'),
(91, 59, 'img/00c08ecc281e72d2e92ea5f4332c57cdfrigo.jpeg', '2024-03-21 12:33:48'),
(92, 60, 'img/4a002288d557ea0630ac6a169f3a6694OIP (19).jpeg', '2024-03-21 12:36:19'),
(93, 61, 'img/8c3bc3c4a4d87fa910af68965ac491e8ddddd.png', '2024-03-21 12:51:06'),
(94, 62, 'img/d1eb471e651e24bed3dbbeec10968ae5ddddd.png', '2024-03-21 12:51:07'),
(95, 63, 'img/a1466ecca49dbd795bd4c27535d9fff0ddddd.png', '2024-03-21 12:51:08'),
(96, 64, 'img/e2ae7eb722d98dea3ed04d74a2f69fd5R (3).png', '2024-03-21 12:54:31'),
(97, 65, 'img/ec7ba353d685d97079b10fa51c7dbe40R (29).jpeg', '2024-03-21 12:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id_preferences` int NOT NULL,
  `id_produit` int NOT NULL,
  `ip_users` varchar(100)  DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id_preferences`, `id_produit`, `ip_users`, `id_users`, `date_creation`) VALUES
(1, 3, '::1', NULL, '2023-09-12 15:54:01'),
(2, 3, '::1', NULL, '2023-09-12 15:54:24'),
(3, 6, '::1', NULL, '2023-09-12 15:55:05'),
(4, 9, '::1', NULL, '2023-09-12 16:07:19'),
(5, 6, '::1', NULL, '2023-09-12 16:43:38'),
(6, 10, '::1', NULL, '2023-09-12 16:44:31'),
(7, 9, '::1', NULL, '2023-09-12 22:45:31'),
(8, 8, '::1', NULL, '2023-09-12 22:45:35'),
(9, 9, '::1', NULL, '2023-09-12 22:45:38'),
(10, 9, '::1', NULL, '2023-09-12 22:45:50'),
(11, 6, '::1', NULL, '2023-09-12 22:46:47'),
(12, 12, '::1', NULL, '2023-09-15 21:57:59'),
(13, 12, '::1', NULL, '2023-09-16 07:45:29'),
(14, 12, '::1', NULL, '2023-09-16 07:46:46'),
(15, 12, '::1', NULL, '2023-09-16 07:47:19'),
(16, 12, '::1', NULL, '2023-09-16 07:47:30'),
(17, 12, '::1', NULL, '2023-09-16 07:47:43'),
(18, 12, '::1', NULL, '2023-09-16 07:49:12'),
(19, 12, '::1', NULL, '2023-09-16 07:49:32'),
(20, 12, '::1', NULL, '2023-09-16 07:50:11'),
(21, 12, '::1', NULL, '2023-09-16 07:52:57'),
(22, 12, '::1', NULL, '2023-09-16 07:53:04'),
(23, 12, '::1', NULL, '2023-09-16 07:53:11'),
(24, 12, '::1', NULL, '2023-09-16 07:53:49'),
(25, 12, '::1', NULL, '2023-09-16 07:54:05'),
(26, 12, '::1', NULL, '2023-09-16 07:55:32'),
(27, 13, '::1', NULL, '2023-09-16 07:56:46'),
(28, 13, '::1', NULL, '2023-09-16 08:06:37'),
(29, 13, '::1', NULL, '2023-09-16 08:07:09'),
(30, 13, '::1', NULL, '2023-09-16 08:39:38'),
(31, 13, '::1', NULL, '2023-09-16 08:40:07'),
(32, 13, '::1', NULL, '2023-09-16 08:41:08'),
(33, 13, '::1', NULL, '2023-09-16 08:41:30'),
(34, 13, '::1', NULL, '2023-09-16 08:41:55'),
(35, 13, '::1', NULL, '2023-09-16 08:43:36'),
(36, 13, '::1', NULL, '2023-09-16 08:43:43'),
(37, 13, '::1', NULL, '2023-09-16 08:44:12'),
(38, 13, '::1', NULL, '2023-09-16 08:53:07'),
(39, 13, '::1', NULL, '2023-09-16 08:57:48'),
(40, 13, '::1', NULL, '2023-09-16 08:58:00'),
(41, 13, '::1', NULL, '2023-09-16 08:58:11'),
(42, 13, '::1', NULL, '2023-09-16 08:58:52'),
(43, 13, '::1', NULL, '2023-09-16 09:03:01'),
(44, 13, '::1', NULL, '2023-09-16 09:03:53'),
(45, 13, '160.113.1.146', NULL, '2023-09-17 07:59:23'),
(46, 14, '154.73.203.150', NULL, '2023-09-19 10:33:30'),
(47, 14, '154.73.203.150', NULL, '2023-09-19 10:34:30'),
(48, 36, '::1', NULL, '2023-09-25 11:16:34'),
(49, 37, '::1', NULL, '2023-09-25 13:00:50'),
(50, 36, '::1', NULL, '2023-09-25 13:02:15'),
(51, 36, '::1', NULL, '2023-09-25 13:02:48'),
(52, 36, '::1', NULL, '2023-09-25 13:03:07'),
(53, 36, '::1', NULL, '2023-09-25 13:03:43'),
(54, 36, '::1', NULL, '2023-09-25 13:03:44'),
(55, 36, '::1', NULL, '2023-09-25 13:03:45'),
(56, 36, '::1', NULL, '2023-09-25 13:04:16'),
(57, 36, '::1', NULL, '2023-09-25 13:04:34'),
(58, 36, '::1', NULL, '2023-09-25 13:04:35'),
(59, 36, '::1', NULL, '2023-09-25 13:04:36'),
(60, 36, '::1', NULL, '2023-09-25 13:04:37'),
(61, 36, '::1', NULL, '2023-09-25 13:04:37'),
(62, 36, '::1', NULL, '2023-09-25 13:04:37'),
(63, 36, '::1', NULL, '2023-09-25 13:04:37'),
(64, 36, '::1', NULL, '2023-09-25 13:04:38'),
(65, 36, '::1', NULL, '2023-09-25 13:05:03'),
(66, 36, '::1', NULL, '2023-09-25 13:05:27'),
(67, 36, '::1', NULL, '2023-09-25 13:06:19'),
(68, 36, '::1', NULL, '2023-09-25 13:06:20'),
(69, 36, '::1', NULL, '2023-09-25 13:06:22'),
(70, 36, '::1', NULL, '2023-09-25 13:06:22'),
(71, 36, '::1', NULL, '2023-09-25 13:06:22'),
(72, 36, '::1', NULL, '2023-09-25 13:08:35'),
(73, 36, '::1', NULL, '2023-09-25 13:08:36'),
(74, 36, '::1', NULL, '2023-09-25 13:08:36'),
(75, 36, '::1', NULL, '2023-09-25 13:08:36'),
(76, 36, '::1', NULL, '2023-09-25 13:08:37'),
(77, 36, '::1', NULL, '2023-09-25 13:08:37'),
(78, 36, '::1', NULL, '2023-09-25 13:08:37'),
(79, 36, '::1', NULL, '2023-09-25 13:08:56'),
(80, 36, '::1', NULL, '2023-09-25 13:09:26'),
(81, 36, '::1', NULL, '2023-09-25 13:10:28'),
(82, 36, '::1', NULL, '2023-09-25 13:16:45'),
(83, 39, '::1', NULL, '2023-09-25 13:16:47'),
(84, 39, '::1', NULL, '2023-09-25 13:18:04'),
(85, 39, '::1', NULL, '2023-09-25 13:18:21'),
(86, 39, '::1', NULL, '2023-09-25 13:18:52'),
(87, 39, '::1', NULL, '2023-09-25 13:19:07'),
(88, 39, '::1', NULL, '2023-09-25 13:19:13'),
(89, 39, '::1', NULL, '2023-09-25 13:20:31'),
(90, 39, '::1', NULL, '2023-09-25 13:20:44'),
(91, 34, '::1', NULL, '2023-09-25 13:34:53'),
(92, 32, '::1', NULL, '2023-09-25 14:02:28'),
(93, 32, '::1', NULL, '2023-09-25 14:03:25'),
(94, 32, '::1', NULL, '2023-09-25 14:03:27'),
(95, 32, '::1', NULL, '2023-09-25 14:05:05'),
(96, 32, '::1', NULL, '2023-09-25 14:05:19'),
(97, 37, '::1', NULL, '2023-09-25 14:55:51'),
(98, 33, '::1', NULL, '2023-09-25 14:59:52'),
(99, 35, '::1', NULL, '2023-09-25 15:10:05'),
(100, 38, '::1', NULL, '2023-09-25 15:12:15'),
(101, 37, '::1', NULL, '2023-09-25 15:14:30'),
(102, 40, '::1', NULL, '2023-09-25 15:24:09'),
(103, 34, '::1', NULL, '2023-09-25 15:25:16'),
(104, 32, '::1', NULL, '2023-09-25 15:38:20'),
(105, 34, '::1', NULL, '2023-09-25 15:38:36'),
(106, 33, '::1', NULL, '2023-09-25 17:36:49'),
(107, 32, '::1', NULL, '2023-09-25 17:42:41'),
(108, 36, '::1', NULL, '2023-09-25 17:43:27'),
(109, 38, '::1', NULL, '2023-09-25 17:44:04'),
(110, 37, '::1', NULL, '2023-09-25 17:45:38'),
(111, 34, '::1', NULL, '2023-09-25 18:07:53'),
(112, 35, '192.168.8.171', NULL, '2023-09-25 19:24:01'),
(113, 35, '192.168.8.171', NULL, '2023-09-25 19:24:16'),
(114, 37, '::1', NULL, '2023-09-26 11:00:16'),
(115, 44, '::1', NULL, '2023-09-26 15:23:05'),
(116, 43, '::1', NULL, '2023-09-26 15:23:24'),
(117, 43, '::1', NULL, '2023-09-26 15:23:35'),
(118, 43, '::1', NULL, '2023-09-26 15:24:09'),
(119, 34, '::1', NULL, '2023-09-28 13:13:25'),
(120, 42, '::1', NULL, '2023-09-28 14:38:14'),
(121, 39, '::1', NULL, '2023-09-28 14:52:06'),
(122, 44, '::1', NULL, '2023-09-28 14:53:24'),
(123, 37, '::1', NULL, '2023-10-06 09:20:55'),
(124, 53, '::1', NULL, '2023-11-23 13:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produits` int NOT NULL,
  `id_categorie` int NOT NULL,
  `titre` varchar(255)  NOT NULL,
  `prix` float NOT NULL,
  `reduction` int NOT NULL DEFAULT '0',
  `descriptions` text  NOT NULL,
  `vente_flash` int NOT NULL DEFAULT '0',
  `couleur` varchar(100) CHARACTER SET utf8mb4  DEFAULT NULL,
  `liked` int DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produits`, `id_categorie`, `titre`, `prix`, `reduction`, `descriptions`, `vente_flash`, `couleur`, `liked`, `date_creation`) VALUES
(58, 22, ' Recherche visuelle Enregistrer Afficher l’image Plus Micro-ondes Retro Combiné 20 L 700 W Rouge - Micro-ondes BUT', 500, 0, ' Recherche visuelle Enregistrer Afficher l’image Plus Micro-ondes Retro Combiné 20 L 700 W Rouge - Micro-ondes BUT', 0, 'red', NULL, '2024-03-21 12:33:12'),
(59, 22, 'Frigo américain', 300, 10, 'Frigo américain', 0, 'red', NULL, '2024-03-21 12:33:47'),
(60, 20, 'iphone 15 pro max', 300, 10, 'iphone 15 pro max', 0, 'red', NULL, '2024-03-21 12:36:19'),
(63, 21, 'ASUS Showcases Latest ROG Gaming Lineup at IFA 2017', 300000, 20, 'ASUS Showcases Latest ROG Gaming Lineup at IFA 2017', 0, 'red', NULL, '2024-03-21 12:51:07'),
(64, 23, ' Recherche visuelle Enregistrer Afficher l’image Commentaires Plus TV Full HD | Smart TV40&quot; Série AE5500F | Hisense', 300000, 30, ' Recherche visuelle Enregistrer Afficher l’image Commentaires Plus TV Full HD | Smart TV40&quot; Série AE5500F | Hisense', 0, 'white', NULL, '2024-03-21 12:54:30'),
(65, 24, 'Seagate Introduces Palm-Size 4TB External Drive', 20000, 5, 'Seagate Introduces Palm-Size 4TB External Drive', 0, 'red', NULL, '2024-03-21 12:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `produit_commande`
--

CREATE TABLE `produit_commande` (
  `id_produit_commande` int NOT NULL,
  `id_commande` int NOT NULL,
  `id_produit` int NOT NULL,
  `quantite` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit_commande`
--

INSERT INTO `produit_commande` (`id_produit_commande`, `id_commande`, `id_produit`, `quantite`, `date_creation`) VALUES
(1, 2, 40, 1, '2023-10-06 00:03:30'),
(2, 2, 36, 1, '2023-10-06 00:03:30'),
(3, 3, 40, 1, '2023-10-06 00:14:38'),
(4, 3, 38, 1, '2023-10-06 00:14:38'),
(5, 4, 35, 1, '2023-10-06 08:58:40'),
(6, 5, 42, 1, '2023-10-06 09:00:09'),
(7, 5, 41, 1, '2023-10-06 09:00:09'),
(8, 6, 35, 1, '2023-10-06 09:20:12'),
(9, 7, 37, 1, '2023-10-06 09:58:19'),
(10, 7, 34, 1, '2023-10-06 09:58:19'),
(11, 7, 42, 1, '2023-10-06 09:58:19'),
(12, 7, 36, 1, '2023-10-06 09:58:19'),
(13, 8, 43, 2, '2023-10-06 10:08:58'),
(14, 8, 41, 2, '2023-10-06 10:08:58'),
(15, 9, 41, 1, '2023-10-06 10:16:37'),
(16, 9, 44, 1, '2023-10-06 10:16:37'),
(17, 9, 42, 1, '2023-10-06 10:16:37'),
(18, 10, 46, 1, '2023-10-26 11:50:16'),
(19, 12, 50, 1, '2023-10-26 12:11:03'),
(20, 13, 50, 1, '2023-10-26 12:12:49'),
(21, 14, 50, 1, '2023-10-26 12:16:44'),
(22, 15, 53, 1, '2023-10-26 13:46:57'),
(23, 16, 53, 1, '2023-10-26 13:52:30'),
(24, 17, 53, 1, '2023-10-26 21:10:47'),
(25, 18, 53, 1, '2023-10-30 23:27:14'),
(26, 19, 53, 2, '2023-11-08 23:58:31'),
(27, 19, 52, 3, '2023-11-08 23:58:31'),
(28, 20, 52, 1, '2024-01-10 10:57:24'),
(29, 21, 52, 1, '2024-01-10 11:00:47'),
(30, 22, 54, 1, '2024-03-21 12:15:42'),
(31, 23, 54, 1, '2024-03-21 12:57:25'),
(32, 23, 65, 1, '2024-03-21 12:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `produit_message`
--

CREATE TABLE `produit_message` (
  `id_produit_message` int NOT NULL,
  `id_users` int NOT NULL,
  `id_produit` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prompt`
--

CREATE TABLE `prompt` (
  `id_prompt` int NOT NULL,
  `id_users` varchar(255) NOT NULL,
  `questions` text NOT NULL,
  `reponse` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prompt`
--

INSERT INTO `prompt` (`id_prompt`, `id_users`, `questions`, `reponse`, `date_creation`) VALUES
(130, '1187753', 'bonjour', '1', '2023-09-28 13:29:22'),
(134, '1187753', 'j&#039;ai faim', '1', '2023-09-28 13:34:03'),
(137, '1187753', 'bonjour', '0', '2023-09-28 13:35:44'),
(138, '2101988', 'bonjour', '0', '2023-09-28 13:36:41'),
(139, '2101988', 'j&#039;ai faim', '0', '2023-09-28 13:36:59'),
(140, '1187753', 'tu as quel age ?', '1', '2023-09-28 13:37:47'),
(141, '2101988', 'tu as quel age ?', '0', '2023-09-28 13:38:54'),
(142, '2101988', 'iphoe', '2', '2023-09-28 13:39:13'),
(143, '1187753', 'iphoe', '0', '2023-09-28 13:40:09'),
(144, '1187753', 'iphoe', '0', '2023-09-28 13:43:10'),
(145, '1187753', 'iphone', '0', '2023-09-28 13:45:35'),
(146, '1187753', 'iphoe', '0', '2023-09-28 13:45:44'),
(147, '1187753', 'iphoe', '0', '2023-09-28 13:46:05'),
(148, '1187753', 'iphone', '0', '2023-09-28 13:46:20'),
(149, '1187753', 'iphoe', '0', '2023-09-28 13:46:36'),
(150, '1187753', 'iphoe', '0', '2023-09-28 13:50:27'),
(151, '1187753', 'tu as quel age ?', '0', '2023-09-28 13:52:11'),
(152, '1187753', 'iphoe', '0', '2023-09-28 13:55:47'),
(153, '1187753', 'iphone', '2', '2023-09-28 13:59:50'),
(154, '1187753', 'bonjour', '0', '2023-09-28 14:00:00'),
(155, '1187753', 'bjr', '1', '2023-09-28 14:00:07'),
(156, '2101988', 'IPHOE', '0', '2023-09-28 14:01:04'),
(157, '2101988', 'bjr', '0', '2023-09-28 14:01:11'),
(158, '2101988', 'j&#039;ai faim', '0', '2023-09-28 14:01:21'),
(159, '2101988', 'bonjour', '0', '2023-09-28 14:01:30'),
(160, '2101988', 'besoin d&#039;une voiture mercedes benz', '0', '2023-09-28 14:02:50'),
(161, '2101988', 'que faites vous', '0', '2023-09-28 14:03:40'),
(162, '1187753', 'samsung', '2', '2023-09-28 14:55:34'),
(163, '1187753', 'bonjour', '0', '2023-09-28 16:36:21'),
(164, '1187753', 'j&#039;ai faim', '0', '2023-09-28 16:36:32'),
(165, '1187753', 'iphoe', '0', '2023-09-28 16:36:46'),
(166, '727589', 'Iphone', '2', '2023-10-06 00:27:04'),
(167, '1187753', 'bonjour', '0', '2023-10-06 09:07:02'),
(168, '1187753', 'connais tu iai ?', '1', '2023-10-06 09:07:18'),
(169, '1187753', 'connais tu iai ?', '0', '2023-10-06 09:09:43'),
(170, '1187753', 'Qui dirige IAI cameroun ?', '1', '2023-10-06 09:10:18'),
(171, '1187753', 'Qui dirige IAI cameroun ?', '0', '2023-10-06 09:11:51'),
(172, '1187753', 'j&#039;ai besoin d&#039;une robe ?', '2', '2023-10-06 09:13:13'),
(173, '1187753', 'j&#039;ai besoin d&#039;une robe ?', '0', '2023-10-06 09:14:32'),
(174, '1187753', 'qui est créateur de good shopping ?', '1', '2023-10-06 09:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `id_reponses` int NOT NULL,
  `id_prompt` int NOT NULL,
  `reponse` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`id_reponses`, `id_prompt`, `reponse`, `date_creation`) VALUES
(32, 130, 'Bonjour! Comment puis-je vous aider aujourd’hui? 😊', '2023-09-28 13:32:09'),
(33, 134, 'Je suis désolé, mais en tant qu’assistant virtuel, je ne peux pas vous aider à préparer un repas. Cependant, je peux vous aider à trouver des recettes ou des restaurants à proximité si vous le souhaitez. Que préférez-vous? 😊\r\n\r\n', '2023-09-28 13:33:37'),
(34, 140, 'En tant qu’intelligence artificielle, je n’ai pas d’âge. Je suis conçu pour fournir des informations et aider avec diverses tâches. Comment puis-je vous aider aujourd’hui? 😊\r\n\r\n', '2023-09-28 13:33:37'),
(35, 142, 'iphone', '2023-09-28 13:33:37'),
(36, 145, 'iphone', '2023-09-28 13:45:35'),
(37, 148, 'iphone', '2023-09-28 13:46:20'),
(38, 153, 'iphone', '2023-09-28 13:59:50'),
(39, 155, 'Bonjour! Comment puis-je vous aider aujourd’hui? 😊', '2023-09-28 13:32:09'),
(40, 162, 'samsung', '2023-09-28 14:55:34'),
(41, 166, 'Iphone', '2023-10-06 00:27:04'),
(42, 168, 'Oui IAI(institut africaine d\'informatique) est une école supérieur qui forme les ingenieurs en informatique notemment dans le domaine du Génie logiciel et des systèmes & réseaux. IAI est situé dans 11 pays membres dans l\'afrique.  ', '2023-10-06 00:27:04'),
(43, 170, 'IAI Cameroun situé à nkol anga\'a vallée, est dirigé par Le représentant résident ARMAND CLAUDE ABANDA', '2023-10-06 00:27:04'),
(44, 172, 'robe', '2023-10-06 00:27:04'),
(45, 174, 'Vous parlez de mon créateur ?😊😊😊, il s\'appelle NEMBOT GOMSU JOEL né le 18 septembre 2004 à FOKOUE', '2023-10-06 00:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id_sizes` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id_sizes`, `titre`, `date_creation`) VALUES
(3, 'XL', '2023-10-28 22:58:07'),
(4, 'X', '2023-10-28 23:24:28'),
(5, 'XXXL', '2023-10-28 23:24:36'),
(6, 'M', '2023-10-28 23:24:42'),
(7, 'L', '2023-10-28 23:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `passwords` varchar(255)  NOT NULL,
  `roles` varchar(100)  NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `passwords`, `roles`, `date_creation`) VALUES
(17, 'madibacho50@gmail.com', '$2y$10$axPE4k0A66MAUxAS6KEw/O72JwCV/caXefJOItlR9RMIosRw9zNBW', 'admin', '2023-10-15 11:01:25'),
(18, 'camecole@gmail.com', '$2y$10$w.BhNKx54QFC4vXTIHAbOODcJs.8J10mEZmksPbnI82cimLotTHgu', 'client', '2023-10-15 11:04:12'),
(19, 'directeurgeneral@dowhile.site', '$2y$10$FvQoOi1vShTtAn9ns1OJO.0C6K4RPGDsjPuXPlJgNP.pCo1EN1i.e', 'client', '2023-10-26 09:50:12'),
(20, 'madibacho@gmail.com', '$2y$10$7HTJx/iLnpqtcRtr38fu8OZ3zkSZckSKbNS0I7lgEt9ACwxumcpJS', 'client', '2023-11-23 13:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `visiteur`
--

CREATE TABLE `visiteur` (
  `id_visiteur` int NOT NULL,
  `id_users` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiche`
--
ALTER TABLE `affiche`
  ADD PRIMARY KEY (`id_affiche`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Indexes for table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id_couleur`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id_description`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id_income`);

--
-- Indexes for table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`id_liens`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`);

--
-- Indexes for table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photos`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id_preferences`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produits`);

--
-- Indexes for table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`id_produit_commande`);

--
-- Indexes for table `produit_message`
--
ALTER TABLE `produit_message`
  ADD PRIMARY KEY (`id_produit_message`);

--
-- Indexes for table `prompt`
--
ALTER TABLE `prompt`
  ADD PRIMARY KEY (`id_prompt`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id_reponses`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id_sizes`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id_visiteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiche`
--
ALTER TABLE `affiche`
  MODIFY `id_affiche` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id_couleur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id_description` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id_income` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `liens`
--
ALTER TABLE `liens`
  MODIFY `id_liens` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id_preferences` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produits` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `produit_commande`
--
ALTER TABLE `produit_commande`
  MODIFY `id_produit_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produit_message`
--
ALTER TABLE `produit_message`
  MODIFY `id_produit_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prompt`
--
ALTER TABLE `prompt`
  MODIFY `id_prompt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id_reponses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_sizes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id_visiteur` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
