-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 16 juin 2019 à 02:30
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `privatenote`
--

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note_key` varchar(500) NOT NULL,
  `note_desc` text NOT NULL,
  `note_duration` int(200) NOT NULL,
  `note_visibile_count` varchar(200) NOT NULL,
  `note_start_date` datetime NOT NULL,
  `note_end_date` datetime NOT NULL,
  `note_read_status` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `submit_date` datetime NOT NULL,
  `mail_send` int(50) DEFAULT NULL,
  `note_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `note_key`, `note_desc`, `note_duration`, `note_visibile_count`, `note_start_date`, `note_end_date`, `note_read_status`, `password`, `email`, `name`, `submit_date`, `mail_send`, `note_status`) VALUES
(70, '5a0e864e232b4', 'sample notes', 0, '1', '2017-11-17 06:48:46', '2017-11-17 06:48:46', 'read', '', '', '', '2017-11-17 06:48:46', 0, 'expired'),
(172, '5cc8b33a3d1d6', 'Hello Everyone', 1, '', '2019-04-30 20:42:34', '2019-04-30 21:42:34', 'unread', '123456', 'walou@gmail.walou', 'walou', '2019-04-30 20:42:34', NULL, 'available'),
(264, 'fdefa02f5358eed03c7415d9fe70fa4f', 'Salam', 24, '', '2019-05-03 09:14:26', '2019-05-04 09:14:26', 'read', '222', '', '', '2019-05-03 09:14:26', NULL, 'expired'),
(282, 'a1e807d964753c17d1207c27a7074d6f', 'Hey Dear', 0, '1', '2019-05-03 14:36:40', '2019-05-03 14:36:40', 'read', '123', '', '', '2019-05-03 14:36:40', NULL, 'expired'),
(284, 'e1a1f10488fca7d70570fe8e9265c74f', 'fvsdvsvss', 0, '1', '2019-05-03 14:43:14', '2019-05-03 14:43:14', 'read', '777', '', '', '2019-05-03 14:43:14', NULL, 'expired'),
(285, '37cf23fc9d6ee0bcdbe4659e058211b5', 'edefeadefef', 0, '1', '2019-05-03 14:44:24', '2019-05-03 14:44:24', 'read', '555', '', '', '2019-05-03 14:44:24', NULL, 'expired'),
(286, '34584585f631dd6d50fa8e25dcab03eb', 'SALAMO', 0, '1', '2019-05-03 14:48:09', '2019-05-03 14:48:09', 'read', '777', '', '', '2019-05-03 14:48:09', NULL, 'expired'),
(287, '77d985229945a81b78d95494c1a1dc5b', 'lmfdze^dkaefok', 0, '1', '2019-05-03 14:52:55', '2019-05-03 14:52:55', 'read', '555', '', '', '2019-05-03 14:52:55', NULL, 'expired'),
(288, '695ceafad145dffc1183fa3748682e2f', 'rfrf', 0, '1', '2019-05-03 23:12:11', '2019-05-03 23:12:11', 'unread', 'ergverge', '', '', '2019-05-03 23:12:11', NULL, 'available'),
(289, 'cbff4cd5f7548202ad63871d5338a4e9', 'sfzefz', 0, '1', '2019-05-03 23:12:21', '2019-05-03 23:12:21', 'unread', 'rf', '', '', '2019-05-03 23:12:21', NULL, 'available'),
(290, '7d493838c2f16be3abb2b582126372a2', 'referg', 0, '1', '2019-05-03 23:13:32', '2019-05-03 23:13:32', 'unread', 'ree', '', '', '2019-05-03 23:13:32', NULL, 'available'),
(291, '0a26cd6897dc628e633a1a8876db42b2', 'refergzedzeez', 0, '1', '2019-05-03 23:14:22', '2019-05-03 23:14:22', 'unread', 'ez', '', '', '2019-05-03 23:14:22', NULL, 'available'),
(292, 'e4cab4fc75f2e77d0c5d38befc197583', 'zedaeda', 0, '1', '2019-05-03 23:37:26', '2019-05-03 23:37:26', 'unread', 'aefead', '', '', '2019-05-03 23:37:26', NULL, 'available'),
(293, '3ed1467d80f0f9df2109362c15bcbf74', 'zadl,zkd', 0, '1', '2019-05-03 23:38:02', '2019-05-03 23:38:02', 'unread', 'dadee', '', '', '2019-05-03 23:38:02', NULL, 'available'),
(294, '1b361f43cc437d1ced14ea8e48f0fc67', 'efefzf', 0, '1', '2019-05-03 23:39:01', '2019-05-03 23:39:01', 'unread', 'zefzgz', '', '', '2019-05-03 23:39:01', NULL, 'available'),
(295, '67d6658ac298330720d33af342e61e2b', 'ezfezf', 0, '1', '2019-05-03 23:40:31', '2019-05-03 23:40:31', 'unread', 'dezd', '', '', '2019-05-03 23:40:31', NULL, 'available'),
(296, '631ff29a990e0f28ac433b0c129728a5', 'frregfre', 0, '1', '2019-05-03 23:51:25', '2019-05-03 23:51:25', 'read', '123', '', '', '2019-05-03 23:51:25', NULL, 'expired'),
(297, 'aa5277385cd98e498e155884ac23d0f9', 'Hola', 0, '1', '2019-05-04 12:41:52', '2019-05-04 12:41:52', 'read', '123456', '', '', '2019-05-04 12:41:52', NULL, 'expired'),
(298, '26e7565ad19a105d8767affd6b3ba9f4', 'Salam si ismail match à 19h HILTON', 0, '1', '2019-05-04 14:38:09', '2019-05-04 14:38:09', 'read', '123456', '', '', '2019-05-04 14:38:09', NULL, 'expired'),
(299, '50cec1ba2393a035d7c2c8b2adf857df', 'slfhelhli', 0, '1', '2019-05-05 20:13:59', '2019-05-05 20:13:59', 'read', '123', '', '', '2019-05-05 20:13:59', NULL, 'expired'),
(300, '6c4e18040084bc0c1402367b11d57fe3', 'esrfergte', 0, '1', '2019-05-05 21:41:12', '2019-05-05 21:41:12', 'read', '444', '', '', '2019-05-05 21:41:12', NULL, 'expired'),
(301, '6b964a8a03b2721b735fc48f9b4674b5', 'Ramadan Moubarak said', 0, '1', '2019-05-05 23:14:45', '2019-05-05 23:14:45', 'read', '1234', '', '', '2019-05-05 23:14:45', NULL, 'expired'),
(302, '2f0628467384ed18179f892ff0978d90', 'ohzeffohezfhfzfh', 0, '1', '2019-05-06 10:08:59', '2019-05-06 10:08:59', 'read', '1234', '', '', '2019-05-06 10:08:59', NULL, 'expired'),
(303, '6fea8ea18a4a78967f1a68634be33472', 'aohidoah', 0, '1', '2019-05-06 10:54:44', '2019-05-06 10:54:44', 'read', '123456', '', '', '2019-05-06 10:54:44', NULL, 'expired'),
(304, 'ad4899f3bdbd277906f441d6706dc8fe', 'Ramadan Moubarak', 0, '1', '2019-05-06 11:52:08', '2019-05-06 11:52:08', 'read', '123456', '', '', '2019-05-06 11:52:08', NULL, 'expired'),
(305, '464f87be32c300e8cc1bfbfddf6c7965', 'Salam, Ramada Moubaraka', 0, '1', '2019-05-09 22:28:12', '2019-05-09 22:28:12', 'read', '123456', '', '', '2019-05-09 22:28:12', NULL, 'expired'),
(306, 'e2aa3e1abaf0f575b6504b9be331600f', 'esfçàuezfez', 0, '1', '2019-05-31 16:01:46', '2019-05-31 16:01:46', 'read', '12345', '', '', '2019-05-31 16:01:46', NULL, 'expired'),
(307, '6c5eda552a22e87ddbf83439a42efe99', 'fzrrfzfrzfzrffeaf', 0, '1', '2019-06-01 17:14:12', '2019-06-01 17:14:12', 'read', '12345', '', '', '2019-06-01 17:14:12', NULL, 'expired'),
(308, '157f2977f87d2f8c547ae8c1cc2c2a6c', 'Salut', 1, '', '2019-06-15 11:39:41', '2019-06-15 12:39:41', 'unread', '123456', 'dzad', 'zefrzfs', '2019-06-15 11:39:41', NULL, 'available');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('customer@customer.com', '$2y$10$i3coxhBectaoxS2e/qfcAOhrFusAd8Cg5NmDkbDwNgnPG076o3Kxi', '2017-05-25 02:14:23'),
('wpchecking@gmail.com', '$2y$10$iN7LOujh2Igb7A9eyHcZE.ejPmY776Mj0MaiFDuXFlfu2WkkdPnxS', '2017-05-25 02:22:43'),
('admin@admin.com', '$2y$10$kcAAgbLeKRCjMBSj3BCLX.ZZ3DM1249HRBecZHY.Bvwb2RAzlCI1a', '2017-11-22 05:59:49');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_topmsg` text NOT NULL,
  `site_header_ad` text NOT NULL,
  `site_footer_ad` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_gplus` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_topmsg`, `site_header_ad`, `site_footer_ad`, `site_keyword`, `site_facebook`, `site_twitter`, `site_gplus`, `site_logo`, `site_favicon`, `site_copyright`) VALUES
(1, 'Private Message', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'Private message that will self-destruct after being read.', '&lt;img src=&quot;http://localhost/privatemessage/local/images/ad.jpg&quot; border=&quot;0&quot; /&gt;', '&lt;img src=&quot;http://localhost/privatemessage/local/images/ad.jpg&quot; border=&quot;0&quot; /&gt;', 'lorem,ipsum,lorem,ipsum', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', '1511429989.png', '1511429998.png', '© 2017. All Rights Reserved. Designed by Migrateshop');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `photo`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$5M4HxtBOvT.rdyp4svtrCu.V4CAim19Ijd6DeaEKhjlpnI7wI2YHW', 'male', '9876543210', '1511348521.jpg', 1, 'RkamTMstwtCumEuX2oyCzE0AUxhA3ojBpqCSbvCtjIqupoKbMZ8oKiEpLUJQ', '2017-05-25 01:30:45', '2017-05-25 01:30:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
