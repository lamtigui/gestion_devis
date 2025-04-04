-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 18 fév. 2025 à 08:54
-- Version du serveur : 10.6.19-MariaDB
-- Version de PHP : 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nettoyagecasabla_gestion_devis`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_demande` date NOT NULL,
  `date_visite` date DEFAULT NULL,
  `origine` varchar(191) NOT NULL,
  `autre_origine` varchar(191) DEFAULT NULL,
  `type_besoin` varchar(191) NOT NULL,
  `autre_type_besoin` varchar(191) DEFAULT NULL,
  `categorie_besoin` varchar(191) DEFAULT NULL,
  `autre_categorie_besoin` varchar(191) DEFAULT NULL,
  `nature_service` varchar(191) DEFAULT NULL,
  `marchandise` varchar(191) DEFAULT NULL,
  `commercial_name` varchar(191) DEFAULT NULL,
  `type_cadence` varchar(191) NOT NULL,
  `autre_type_cadence` varchar(191) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `date_demande`, `date_visite`, `origine`, `autre_origine`, `type_besoin`, `autre_type_besoin`, `categorie_besoin`, `autre_categorie_besoin`, `nature_service`, `marchandise`, `commercial_name`, `type_cadence`, `autre_type_cadence`, `detail`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '2024-11-11', '2024-11-11', 'whatssap', '04545555555', 'service', NULL, 'nettoyage', NULL, 'nettoyage bureau', NULL, 'Test Com', 'ponctuelle', NULL, NULL, 11, '2024-11-11 10:17:55', '2024-11-11 10:17:55'),
(2, '2024-11-15', '2024-11-15', 'whatssap', NULL, 'service', NULL, 'nettoyage', NULL, 'fm', NULL, 'mohamed', 'ponctuelle', NULL, 'test', 12, '2024-11-15 18:45:29', '2024-11-15 18:45:29'),
(3, '2024-12-15', '2024-12-15', 'whatssap', '0694931487', 'service', NULL, 'nettoyage', NULL, 'NETTOYAGE', NULL, NULL, 'ponctuelle', NULL, NULL, 13, '2024-12-15 15:37:44', '2024-12-15 15:37:44'),
(4, '2024-12-24', '2024-12-25', 'autre', 'CONTACT DIRECT', 'service', NULL, 'nettoyage', NULL, 'GRAND NETTOYAGE', NULL, NULL, 'ponctuelle', NULL, 'GRAND NETTOYAGE', 14, '2024-12-24 17:43:59', '2024-12-24 17:43:59'),
(5, '2024-12-24', '2024-12-25', 'whatssap', '0666021030', 'service_et_marchandise', NULL, 'nettoyage', NULL, 'GRAND NETTOYAGE', 'PDT CONSOMMABLE', 'NADIA', 'reguliere', 'TRIMESTRIELLE', 'GRAND NETTOYAGE -VILLA 03 NIVEAUX', 15, '2024-12-24 18:29:41', '2024-12-24 18:29:41'),
(6, '2025-02-18', '2025-02-18', 'whatssap', '0666021030', 'service', NULL, 'nettoyage', NULL, 'GRAND NETTOYAGE', NULL, 'AMAD', 'ponctuelle', NULL, 'R.A.S', 16, '2025-02-17 14:14:04', '2025-02-17 14:14:04'),
(7, '2025-02-18', '2025-02-18', 'whatssap', '0655435676', 'service', NULL, 'nettoyage', NULL, 'Nettoyage', '.........', 'ahmed', 'ponctuelle', NULL, '.............;', 17, '2025-02-17 15:10:19', '2025-02-17 15:10:19');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `adresse` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `ville` varchar(191) NOT NULL,
  `autre_ville` varchar(191) DEFAULT NULL,
  `type_client` varchar(191) NOT NULL,
  `entreprise_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `adresse`, `email`, `phone`, `ville`, `autre_ville`, `type_client`, `entreprise_name`, `created_at`, `updated_at`) VALUES
(11, 'test', 'adresse test', 'test@gmail.com', '0606060606', 'Casablanca', NULL, 'entreprise', 'test entreprise', '2024-11-11 10:08:43', '2024-11-11 10:08:43'),
(12, 'Stage', 'ghh', 'mohamedwinbest@gmail.com', '0642714214', 'Casablanca', NULL, 'particulier', NULL, '2024-11-15 18:43:09', '2024-11-15 18:43:09'),
(13, 'YOUNES BERRADA', '30 RUE LA VICTOIRE', NULL, '0694931487', 'Autre', 'AIT MELLOUL', 'entreprise', 'WEBAGENCY', '2024-12-15 15:35:30', '2024-12-15 15:35:30'),
(14, 'MOHAMED BAKAYOKO', '23 RUE DE LA VICTOIRE', 'BAKAYOKO@gmail.com', '06616263', 'Casablanca', NULL, 'particulier', NULL, '2024-12-24 17:40:28', '2024-12-24 17:40:28'),
(15, 'MALAK', 'CASA', 'MALAK@GMAIL.COM', '0600203005', 'Casablanca', NULL, 'entreprise', 'STE MLA', '2024-12-24 18:27:49', '2024-12-24 18:27:49'),
(16, 'mohamed', 'Casablanca', 'mohamed@gmail.com', '0772124070', 'Casablanca', NULL, 'entreprise', 'allo bricole', '2025-02-17 14:08:03', '2025-02-17 14:08:03'),
(17, 'test', 'Casablanca', 'testttttt@gmail.com', '0676854634', 'Casablanca', NULL, 'particulier', NULL, '2025-02-17 15:05:46', '2025-02-17 15:05:46');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_devis` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `prix_hors_taxe` double(8,2) NOT NULL,
  `taux_tva` varchar(191) NOT NULL,
  `autre_taux_tva` double(8,2) DEFAULT NULL,
  `remise_1` double(8,2) NOT NULL,
  `date_remise_1` date DEFAULT NULL,
  `detail_remise_1` varchar(191) DEFAULT NULL,
  `remise_2` double(8,2) DEFAULT NULL,
  `date_remise_2` date DEFAULT NULL,
  `detail_remise_2` varchar(191) DEFAULT NULL,
  `remise_3` double(8,2) DEFAULT NULL,
  `date_remise_3` date DEFAULT NULL,
  `detail_remise_3` varchar(191) DEFAULT NULL,
  `remise_4` double(8,2) DEFAULT NULL,
  `date_remise_4` date DEFAULT NULL,
  `detail_remise_4` varchar(191) DEFAULT NULL,
  `remise_5` double(8,2) DEFAULT NULL,
  `date_remise_5` date DEFAULT NULL,
  `detail_remise_5` varchar(191) DEFAULT NULL,
  `mode_envoi` varchar(191) NOT NULL,
  `autre_mode_denvoi_devis` varchar(191) DEFAULT NULL,
  `etat` enum('signeé','non signeé','en attente de réflexion') NOT NULL DEFAULT 'signeé',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix_unitaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `n_devis`, `date`, `prix_hors_taxe`, `taux_tva`, `autre_taux_tva`, `remise_1`, `date_remise_1`, `detail_remise_1`, `remise_2`, `date_remise_2`, `detail_remise_2`, `remise_3`, `date_remise_3`, `detail_remise_3`, `remise_4`, `date_remise_4`, `detail_remise_4`, `remise_5`, `date_remise_5`, `detail_remise_5`, `mode_envoi`, `autre_mode_denvoi_devis`, `etat`, `admin_id`, `appointment_id`, `created_at`, `updated_at`, `quantite`, `prix_unitaire`) VALUES
(1, '0121', '2024-11-11', 1000.00, '20', NULL, 0.00, NULL, NULL, 100.00, '2024-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'whatssap', NULL, 'en attente de réflexion', 1, 1, '2024-11-11 10:21:54', '2024-11-11 10:23:52', NULL, NULL),
(2, 'A0001-2024', '2024-12-15', 1000.00, '0', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'whatssap', NULL, 'en attente de réflexion', 1, 3, '2024-12-15 15:39:15', '2024-12-15 15:39:15', 1, 1000),
(3, 'A001 2025', '2024-12-24', 2000.00, '0', NULL, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'whatssap', NULL, 'en attente de réflexion', 1, 4, '2024-12-24 17:44:59', '2024-12-24 18:05:59', 1, 2000),
(4, 'IN240-2024', '2024-12-25', 5000.00, '20', NULL, 0.00, NULL, NULL, 500.00, '2024-12-26', 'ATT LE RETOUR DE CLIENT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'whatssap', NULL, 'en attente de réflexion', 1, 5, '2024-12-24 18:31:12', '2024-12-24 18:51:13', 1, 5000),
(5, 'IN240-20254', '2025-02-17', 100.00, '20', NULL, 10.00, NULL, NULL, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'whatssap', NULL, 'en attente de réflexion', 1, 6, '2025-02-17 14:39:03', '2025-02-17 14:40:38', 1, 100),
(6, '123456', '2025-02-19', 100.00, '20', NULL, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'email', NULL, 'en attente de réflexion', 1, 7, '2025-02-17 15:25:24', '2025-02-17 15:25:24', 1, 100);

-- --------------------------------------------------------

--
-- Structure de la table `docdevis`
--

CREATE TABLE `docdevis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `societe` varchar(191) DEFAULT NULL,
  `partenaires_img` tinyint(1) DEFAULT 0,
  `nom_client` varchar(191) DEFAULT NULL,
  `titre` varchar(191) DEFAULT NULL,
  `prestation` varchar(191) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `politique` text DEFAULT NULL,
  `devis_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mode_paiement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_facture` varchar(191) NOT NULL,
  `alternative` varchar(191) DEFAULT NULL,
  `date_facture` date NOT NULL,
  `client_name` varchar(191) DEFAULT NULL,
  `etableur_name` varchar(191) NOT NULL,
  `emmeteur_name` varchar(191) NOT NULL,
  `date_validation` date NOT NULL,
  `type_validation` varchar(191) NOT NULL,
  `autre_type_validation` varchar(191) DEFAULT NULL,
  `type_service_validation` varchar(191) DEFAULT NULL,
  `autre_type_service` varchar(191) DEFAULT NULL,
  `remise` double(8,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 3,
  `taux_tva` double(8,2) DEFAULT NULL,
  `autre_taux_tva` double(8,2) DEFAULT NULL,
  `mantant_ht` double(8,2) DEFAULT NULL,
  `numero_livraison` varchar(191) DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `devis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `n_facture`, `alternative`, `date_facture`, `client_name`, `etableur_name`, `emmeteur_name`, `date_validation`, `type_validation`, `autre_type_validation`, `type_service_validation`, `autre_type_service`, `remise`, `status`, `taux_tva`, `autre_taux_tva`, `mantant_ht`, `numero_livraison`, `date_livraison`, `devis_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'A001-2025', 'A', '2024-12-24', NULL, 'MOHAMED', 'winbest nettoyage', '2024-12-24', 'whatssap', NULL, NULL, NULL, 0.00, 3, NULL, NULL, NULL, NULL, NULL, 3, 1, '2024-12-24 18:13:51', '2024-12-24 18:13:51'),
(2, 'IN240-2024', 'STE MLA', '2024-12-30', NULL, 'FATI', 'winbest nettoyage', '2024-12-28', 'bon_command', '02145/5022-25ING', NULL, NULL, 0.00, 3, NULL, NULL, NULL, NULL, NULL, 4, 1, '2024-12-24 18:52:27', '2024-12-24 18:52:27');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2023_12_18_060842_create_sessions_table', 1),
(10, '2024_06_27_103413_create_clients_table', 1),
(11, '2024_06_27_135933_create_appointments_table', 1),
(12, '2024_07_18_110448_create_devis_table', 1),
(13, '2024_07_18_162214_create_factures_table', 1),
(14, '2024_07_19_100709_create_payements_table', 1),
(15, '2024_11_12_155752_create_docdevis_table', 2),
(16, '2024_11_14_192010_add_columns_to_docdevis_table', 2),
(17, '2024_11_15_134430_add_column_to_devis_table', 2),
(18, '2024_11_19_113513_add_columns_to_devis_table', 2),
(19, '2024_11_19_113824_drop_columns_from_docdevis_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `societe` varchar(191) NOT NULL,
  `afficher_partenaires` tinyint(1) DEFAULT NULL,
  `n_devis` int(11) DEFAULT NULL,
  `titre` varchar(191) DEFAULT NULL,
  `prestation` varchar(191) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `politique` text DEFAULT NULL,
  `mode_paiement` varchar(191) DEFAULT NULL,
  `nom_client` varchar(191) DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL,
  `prix_unitaire` double(8,2) DEFAULT NULL,
  `remise_1` double(8,2) DEFAULT NULL,
  `remise_2` double(8,2) DEFAULT NULL,
  `remise_3` double(8,2) DEFAULT NULL,
  `remise_4` double(8,2) DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `societe`, `afficher_partenaires`, `n_devis`, `titre`, `prestation`, `details`, `politique`, `mode_paiement`, `nom_client`, `quantité`, `prix_unitaire`, `remise_1`, `remise_2`, `remise_3`, `remise_4`, `tva`, `created_at`, `updated_at`) VALUES
(1, 'PRESATATION DE GRAND', 'WINBEST', 1, 120, 'PRESATATION DE GRAND', 'PRESATATION DE GRAND', 'PRESATATION DE GRAND', 'Nos politiques', 'PRESATATION DE GRAND', 'Nom Simple', 1, 200.00, 120.00, NULL, NULL, NULL, 20, '2024-11-20 10:28:59', '2024-11-25 10:16:26'),
(8, 'tr', 'WINBEST', 0, 102, NULL, NULL, 'Détails', 'Nos politiques', NULL, NULL, 1, 2000.00, 100.00, NULL, NULL, NULL, 20, '2024-11-20 13:05:43', '2024-11-25 10:17:59'),
(15, 'EXON MODELE', 'WINBEST', 1, NULL, 'PRESTATION DE GRAND NETTOYAGE PROFFESIONNEL EN FAVEUR DE VOTRE SOCIETE', 'PRESATATION DE GRAND NETTOYAGE PROFESSIONNEL :', '- MATERIEL : MATERIEL PROFESSIONNEL DE NETTOYAGE\r\n- PRODUITS : PRODUITS PROFESSIONNELS  POUR CHACUNES DES MATIERES DE VOS LOCAUX\r\nFAVEUR DE VOTRE SOCIETE:                                                                                                                          - PERIMETRE D\'ACTION  : 02 PLATEAUX BUREAUX N°34 & N° 36  \r\n- FRÉQUENCE : PONCTUELLE \r\n* NETTOYAGE DE LA MOQUETTE  \r\n* NETTOYAGE DES VITRES INTERNES\r\n* NETTOYAGE DES VITRES DE FACADE LIES AUX 02 PLATEAUX DE BUREAUX (4EME ETAGE SEULEMENT)    \r\n* NETTOYAGE DES PLACARDS\r\n* NETTOYAGE DES SANITAIRES                                                   * NETTOYAGE DU PARQUET     \r\n* NETTOYAGE DES MEUBLES \r\n- MATERIEL : MATERIEL PROFESSIONNEL DE NETTOYAGE\r\n-PRODUITS : PRODUITS PROFESSIONNELS  POUR CHACUNES DES MATIERES DE VOS LOCAUX', NULL, '100 % PAR CHEQUE OU VIREMENT APRES DEPOT DE FACTURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-20 14:16:52', '2024-11-20 14:16:52'),
(16, 'test', 'WINBEST', 0, NULL, 'PRESTATION DE GRAND NETTOYAGE PROFFESIONNEL EN FAVEUR DE VOTRE SOCIETE', 'PRESATATION DE GRAND NETTOYAGE PROFESSIONNEL :', 'PRESTATION DE GRAND NETTOYAGE PROFESSIONNEL EN FAVEUR DE VOTRE SOCIETE:                                                                                                                          - PERIMETRE D\'ACTION  : 02 PLATEAUX BUREAUX N°34 & N° 36                                                                 - FRÉQUENCE : PONCTUELLE                                                                                                              \r\n* NETTOYAGE DE LA MOQUETTE                                                                             * NETTOYAGE DES VITRES INTERNES                                                                              * NETTOYAGE DES VITRES DE FACADE LIES AUX 02 PLATEAUX DE BUREAUX (4EME ETAGE SEULEMENT)                                                                          * NETTOYAGE DES PLACARDS                                                * NETTOYAGE DES SANITAIRES                                                   * NETTOYAGE DU PARQUET', NULL, '100 % PAR CHEQUE OU VIREMENT APRES DEPOT DE FACTURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-20 14:18:54', '2024-11-20 14:18:54'),
(17, 'dd', 'WINBEST', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-20 14:20:49', '2024-11-20 14:20:49'),
(18, 'qez', 'WINBEST', 0, NULL, NULL, NULL, 'drf', 'tgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-20 14:22:20', '2024-11-20 14:22:20'),
(19, 'modèle 4', 'WINBEST', 1, NULL, 'PRESTATION DE GRAND NETTOYAGE PROFFESIONNEL EN FAVEUR DE VOTRE SOCIETE', 'PRESATATION DE GRAND NETTOYAGE PROFESSIONNEL :', '- MATERIEL : MATERIEL PROFESSIONNEL DE NETTOYAGE\r\n- PRODUITS : PRODUITS PROFESSIONNELS  POUR CHACUNES DES MATIERES DE VOS LOCAUX\r\nFAVEUR DE VOTRE SOCIETE:                                                                                                                          - PERIMETRE D\'ACTION  : 02 PLATEAUX BUREAUX N°34 & N° 36  \r\n- FRÉQUENCE : PONCTUELLE \r\n* NETTOYAGE DE LA MOQUETTE  \r\n* NETTOYAGE DES VITRES INTERNES\r\n* NETTOYAGE DES VITRES DE FACADE LIES AUX 02 PLATEAUX DE BUREAUX (4EME ETAGE SEULEMENT)    \r\n* NETTOYAGE DES PLACARDS\r\n* NETTOYAGE DES SANITAIRES                                                   * NETTOYAGE DU PARQUET     \r\n* NETTOYAGE DES MEUBLES \r\n- MATERIEL : MATERIEL PROFESSIONNEL DE NETTOYAGE\r\n-PRODUITS : PRODUITS PROFESSIONNELS  POUR CHACUNES DES MATIERES DE VOS LOCAUX', '* NETTOYAGE DES PLACARDS                                                * NETTOYAGE DES SANITAIRES                                                   * NETTOYAGE DU PARQUET                                                       * NETTOYAGE DES MEUBLES                                               - MATERIEL : MATERIEL PROFESSIONNEL DE NETTOYAGE\r\n- PRODUITS : PRODUITS PROFESSIONNELS  POUR CHACUNES DES MATIERES DE VOS LOCAUX', '100 % PAR CHEQUE OU VIREMENT APRES DEPOT DE FACTURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-20 14:53:31', '2024-11-20 14:53:31');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE `payements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facture_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode` varchar(191) NOT NULL,
  `montant` double(8,2) NOT NULL,
  `date_paiement` date NOT NULL,
  `numero_cheque` varchar(191) DEFAULT NULL,
  `numero_remise` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'admin@admin.com', '2024-08-12 12:02:21', '$2y$12$k.tBLIXAgmA1zbUNax/9EupUivZv8hf2gqEtehX96XYbrO6H1FEpu', NULL, NULL, NULL, 'eKyDlDSjPnxtLv7tcND848Nk4INJGkcTtUEqq88NvftQRvrNQjXG4yj9xHjd', NULL, NULL, '2024-08-12 12:02:21', '2024-08-12 12:02:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_client_id_foreign` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devis_n_devis_unique` (`n_devis`),
  ADD KEY `devis_admin_id_foreign` (`admin_id`),
  ADD KEY `devis_appointment_id_foreign` (`appointment_id`);

--
-- Index pour la table `docdevis`
--
ALTER TABLE `docdevis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docdevis_devis_id_foreign` (`devis_id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `factures_n_facture_unique` (`n_facture`),
  ADD KEY `factures_admin_id_foreign` (`admin_id`),
  ADD KEY `factures_devis_id_foreign` (`devis_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modeles_nom_unique` (`nom`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payements_facture_id_foreign` (`facture_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Index pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Index pour la table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `docdevis`
--
ALTER TABLE `docdevis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devis_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `docdevis`
--
ALTER TABLE `docdevis`
  ADD CONSTRAINT `docdevis_devis_id_foreign` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factures_devis_id_foreign` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_facture_id_foreign` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
