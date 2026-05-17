-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 16 mai 2026 à 23:19
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flotte`
--

-- --------------------------------------------------------

--
-- Structure de la table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `permis` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `drivers`
--

INSERT INTO `drivers` (`id`, `nom`, `prenom`, `telephone`, `permis`, `created_at`, `updated_at`) VALUES
(1, 'AMADOU', 'ibrahim', '678435667', 'B', '2026-05-12 11:35:44', '2026-05-12 11:35:44'),
(2, 'awatsa', 'sonia', '677980070', 'c', '2026-05-12 11:38:35', '2026-05-12 11:38:35'),
(3, 'kingson', 'isral', '678876543', 'B', '2026-05-12 14:09:10', '2026-05-12 14:09:10'),
(4, 'kenne', 'roussel', '677089967', 'B', '2026-05-16 21:57:04', '2026-05-16 21:57:04');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_04_23_111119_create_vehicles_table', 1),
(6, '2026_04_24_073500_create_drivers_table', 1),
(7, '2026_05_11_133118_create_missions_table', 1),
(8, '2026_05_16_014746_add_role_to_users_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_mission` date NOT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `missions_vehicle_id_foreign` (`vehicle_id`),
  KEY `missions_driver_id_foreign` (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`id`, `vehicle_id`, `driver_id`, `destination`, `date_mission`, `statut`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Douala', '2026-05-30', 'En attente', '2026-05-12 11:38:57', '2026-05-12 11:38:57'),
(2, 2, 2, 'Yaounde', '2026-05-12', 'En attente', '2026-05-12 14:09:38', '2026-05-12 14:09:38'),
(3, 3, 3, 'Buea', '2026-05-10', 'En attente', '2026-05-12 14:10:07', '2026-05-12 14:10:07'),
(4, 1, 1, 'garoua', '2026-05-16', 'En attente', '2026-05-16 00:15:40', '2026-05-16 00:15:40'),
(5, 1, 1, 'batcham', '2026-05-01', 'En attente', '2026-05-16 00:16:55', '2026-05-16 00:16:55');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'awatsa', 'soniaawatsatilon@gmail.com', NULL, '$2y$12$UGFXHGJZ.h44sdRAEMo7IuWq6fSvpg0Aq/O9HftMG.Im1Nkz0LoIO', '47BhdmU7xHZzmPA2TpgeJDXMX3AUtzsic2jPq320TnxfOTgGx5B6PPiQXvZd', '2026-05-12 11:34:43', '2026-05-12 11:34:43', 'chauffeur'),
(2, 'tilong', 'soniaawatsatilong@gmail.com', NULL, '$2y$12$4AaxZ1fWv6s7EJ2LsK9luuYpmjimL/8jsj/BDxPYHu2iAnsGuE8EW', NULL, '2026-05-12 11:41:51', '2026-05-12 11:41:51', 'chauffeur'),
(3, 'biboum', 'biboum@gmail.com', NULL, '$2y$12$VLd2jEdhLM8eYqor8yDkhuaH2LxzGHBdk0aaLQzJjZaPAtI/hXPxC', NULL, '2026-05-16 01:23:56', '2026-05-16 01:23:56', 'chauffeur'),
(4, 'biboum', 'biboum1@gmail.com', NULL, '$2y$12$1u9f9QHy1Q9kmfbBTOYWt.qPLZaL4xYDaztEhy.fs7TnnASHylyRG', NULL, '2026-05-16 01:26:16', '2026-05-16 01:26:16', 'chauffeur'),
(5, 'biboum', 'biboumberthe@gmail.com', NULL, '$2y$12$yQXE/u.pwGNHttIr6eVGCuu46a.yD0RJWiR4cetJjfHfXmbY22gyS', NULL, '2026-05-16 21:00:30', '2026-05-16 21:00:30', 'chauffeur'),
(6, 'ange', 'ange@gmail.com', NULL, '$2y$12$Ptmc8eaMaZqOQrlrTeFDzu3fnOUuugXbVGULUo2EXLxmzZCHEmF.i', '94PO7etQ6NdT1OGvtjwIjvNKyVMF7u1eA3SKsR5vy1mdutRY7tIn7nZntjit', '2026-05-16 21:52:02', '2026-05-16 21:52:02', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacite` int NOT NULL,
  `statut` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_immatriculation_unique` (`immatriculation`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `immatriculation`, `marque`, `modele`, `capacite`, `statut`, `created_at`, `updated_at`) VALUES
(1, '12CDR43', 'corolla', 'toyota', 6, 'disponible', '2026-05-12 11:35:10', '2026-05-12 11:35:10'),
(2, '12CDR44', 'G-class', 'mercedes', 7, 'disponible', '2026-05-12 11:35:25', '2026-05-12 11:35:25'),
(3, 'DFG456', 'F-class', 'mercedes', 8, 'disponible', '2026-05-12 14:08:41', '2026-05-12 14:08:41'),
(4, '12CDR55', 'F-class', 'mercedes', 10, 'En mission', '2026-05-16 22:06:08', '2026-05-16 22:06:08'),
(5, 'DF67Y56', 'corolla', 'toyota', 8, 'Disponible', '2026-05-16 22:07:13', '2026-05-16 22:07:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
