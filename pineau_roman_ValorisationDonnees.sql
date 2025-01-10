-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : ven. 10 jan. 2025 à 01:21
-- Version du serveur : 8.4.1
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pineau_roman_ValorisationDonnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idComm` bigint NOT NULL,
  `siret` varchar(14) NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `texte` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idComm`, `siret`, `id_user`, `texte`) VALUES
(1, '00802088500011', 1, 'tesy'),
(2, '00802088500011', 1, 'tesy'),
(3, '00802088500011', 1, 'tesy'),
(4, '00802088500011', 1, 'tesy');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `siren` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomEntr` varchar(128) NOT NULL,
  `personneMoral` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom` varchar(128) DEFAULT NULL,
  `prenom` char(32) DEFAULT NULL,
  `sexe` varchar(128) DEFAULT NULL,
  `codenaf` varchar(5) DEFAULT NULL,
  `libelleNaf` varchar(128) DEFAULT NULL,
  `statutRcs` varchar(128) DEFAULT NULL,
  `numRcs` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`siren`, `nomEntr`, `personneMoral`, `nom`, `prenom`, `sexe`, `codenaf`, `libelleNaf`, `statutRcs`, `numRcs`) VALUES
('005880638', 'AGENCE DES PLAGES \"A.D.P.', NULL, NULL, NULL, NULL, '6831Z', 'Agences immobilières', NULL, NULL),
('006280275', 'LE ROUX PERRIER ET ASSOCIES \"L P A', NULL, NULL, NULL, NULL, '6920Z', 'Activités comptables', NULL, NULL),
('006880090', 'PONTCHATELAINE D\'EQUIPEMENTS CIDRICOLES \"S.P.E.C.', NULL, NULL, NULL, NULL, '2893Z', 'Fabrication de machines pour l\'industrie agro-alimentaire', NULL, NULL),
('007080286', 'BUREAU ENGINEERING TRAVAUX PUBLICS \"B.E.T.P.', NULL, NULL, NULL, NULL, '742C', 'Ingénierie, études techniques', NULL, NULL),
('008020885', 'GESTRIM LIMOUSIN RESIDENCE P BROSSOLET', NULL, NULL, NULL, NULL, '8110Z', 'Activités combinées de soutien lié aux bâtiments', NULL, NULL),
('008021644', 'GESTRIM COP P CURIE', NULL, NULL, NULL, NULL, '8110Z', 'Activités combinées de soutien lié aux bâtiments', NULL, NULL),
('015550205', 'C.P.L. DAVOINE', NULL, NULL, NULL, NULL, '6820B', 'Location de terrains et d\'autres biens immobiliers', NULL, NULL),
('015850969', 'R LACROIX SOCIETE INDUSTRIELLE DE CONSTRUCTION DE MATERIELS AGRAIRES ET PNEUMATIQUES \"R.LACROIX-S I C M A P\"', NULL, NULL, NULL, NULL, '2822Z', 'Fabrication de matériel de levage et de manutention', NULL, NULL),
('123456789', 'Tier', NULL, NULL, NULL, NULL, '0125Z', 'Test', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `siret` varchar(14) NOT NULL,
  `siren` varchar(9) NOT NULL,
  `nic` varchar(5) NOT NULL,
  `ville` varchar(128) DEFAULT NULL,
  `codePays` varchar(128) DEFAULT NULL,
  `pays` char(32) DEFAULT NULL,
  `siege` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `codenaf` varchar(5) DEFAULT NULL,
  `libelleNaf` varchar(128) DEFAULT NULL,
  `adresse` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`siret`, `siren`, `nic`, `ville`, `codePays`, `pays`, `siege`, `active`, `codenaf`, `libelleNaf`, `adresse`) VALUES
('00588063800019', '005880638', '00019', 'PORNICHET', 'FR', 'France', 0, 0, '703A', 'Agences immobilières', '137 AV DE MAZY, 44380'),
('00588063800027', '005880638', '00027', 'LA BAULE-ESCOUBLAC', 'FR', 'France', 0, 0, '703A', 'Agences immobilières', '5 ALL DES CAMELIAS, 44500'),
('00588063800035', '005880638', '00035', 'PORNICHET', 'FR', 'France', 1, 0, '6831Z', 'Agences immobilières', '6 AV LOUIS BARTHOU, 44380'),
('00628027500022', '006280275', '00022', 'LA BAULE-ESCOUBLAC', 'FR', 'France', 0, 0, '6920Z', 'Activités comptables', '102 AV DES ONDINES, 44500'),
('00628027500030', '006280275', '00300', 'SAINT-NAZAIRE', 'FR', 'France', 0, 0, '6920Z', 'Activités comptables', '2 RUE DE L ETOILE DU MATIN, 44600'),
('00628027500048', '006280275', '00048', 'GUERANDE', 'FR', 'France', 0, 0, '6920Z', 'Activités comptables', '15 RTE DE LA CROIX MORIAU, 44350'),
('00628027500055', '006280275', '00055', 'TRIGNAC', 'FR', 'France', 1, 0, '6920Z', 'Activités comptables', '5 AV BARBARA, 44570'),
('00688009000037', '006880090', '00037', 'PONTCHATEAU', 'FR', 'France', 1, 1, '2893Z', 'Fabrication de machines pour l\'industrie agro-alimentaire', '9 RUE PIERRE ET MARIE CURIE, 44160'),
('00708028600029', '007080286', '00029', 'GUERANDE', 'FR', 'France', 1, 0, '742C', 'Ingénierie, études techniques', 'AVENUE DE LA BRIERE, 44350'),
('00802088500011', '008020885', '00011', 'LIMOGES', 'FR', 'France', 1, 1, '8110Z', 'Activités combinées de soutien lié aux bâtiments', '12 RUE PIERRE BROSSOLETTE, 87000'),
('00802164400011', '008021644', '00011', 'LIMOGES', 'FR', 'France', 1, 1, '8110Z', 'Activités combinées de soutien lié aux bâtiments', '18 RUE PIERRE ET MARIE CURIE,87000'),
('01555020500072', '015550205', '00072', 'DIJON', 'FR', 'France', 1, 1, '6820B', 'Location de terrains et d\'autres biens immobiliers', '51 RUE BERLIER, 21000'),
('01585096900039', '015850969', '00039', 'DHUIZON', 'FR', 'France', 1, 1, '2822Z', 'Fabrication de matériel de levage et de manutention', 'ZA DES SUBLENNES,41220'),
('12345678900012', '123456789', '00012', 'Paris', 'FR', 'France', 1, 0, '0125Z', 'Test', '3 AV des Champs Elysee');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `idNotes` bigint NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `siret` varchar(14) NOT NULL,
  `note` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uHwhm1LraOQVJ8trmNgLPDNrKEwWWkpmEUAWFroI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTUJUUXQ0R051UmdveDlHVVNVN1Fvd2dkNldha1ZhQUhWcGtJeTdkdiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjk0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVjaGVyY2hlP190b2tlbj1NQlRRdDRHTnVSZ294OUdVU1U3UW93Z2Q2V2FrVmFBSFZwa0l5N2R2JnJlY2hlcmNoZT1UaWVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1736465718);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jean', 'jean@gmail.com', NULL, '$2y$12$S5BN82xBrH0i1RsRjp3Q6.vef29.MWLGHZJrC.HrOt9mDuiwtq6ri', NULL, '2025-01-08 07:48:53', '2025-01-08 07:48:53');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idComm`),
  ADD KEY `I_FK_COMMENTAIRES_ETABLISSEMENT` (`siret`),
  ADD KEY `I_FK_COMMENTAIRES_USERS` (`id_user`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`siren`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`siret`),
  ADD KEY `I_FK_ETABLISSEMENT_ENTREPRISE` (`siren`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`idNotes`),
  ADD KEY `I_FK_NOTATION_USERS` (`id_user`),
  ADD KEY `I_FK_NOTATION_ETABLISSEMENT` (`siret`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idComm` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commentaires_ibfk_3` FOREIGN KEY (`siret`) REFERENCES `etablissement` (`siret`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`siren`) REFERENCES `entreprise` (`siren`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `notation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `notation_ibfk_3` FOREIGN KEY (`siret`) REFERENCES `etablissement` (`siret`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
