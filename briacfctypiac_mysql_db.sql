-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : briacfctypiac.mysql.db
-- Généré le :  mar. 17 nov. 2020 à 10:51
-- Version du serveur :  5.6.50-log
-- Version de PHP :  7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `briacfctypiac`
--
CREATE DATABASE IF NOT EXISTS `briacfctypiac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `briacfctypiac`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(64) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `IsAdmin`) VALUES
(1, 'typiac', 'donald@duck.fr', 'f7cf07c2a8d65823ba1855a7228210f5', 1),
(2, 'aconnaone', 'aconnaone@gmail.com', 'b5ac231d2f02c3ea767c321916d5e039', 0),
(3, 'typiac3', 'dq@frfer.fr', 'f7cf07c2a8d65823ba1855a7228210f5', 0),
(4, 'az', 'az@az.az', 'e6ad305509df348e54c98042a6104ca6', 0),
(5, 'arfjoe', 'matthieu-neo@hotmail.fr', '458f8b6c6c339e668f8389b63a409b4e', 0),
(6, 'admin', 'admin@toto.fr', '$2y$10$Ftk1IBmlrdLuCbgGAbcvBe0s8lc5tXS0uwrZ7ZWoWM0eVH9YT8Wqe', 1),
(7, 'alfred', 'bat@ma.fr', '$2y$10$UZahiuCP6ExjNT6YGda6k.GNJwWA4WrfD61xjb2l3SaZM6adruYsK', 0),
(8, 'brahim', 'brahim2803@hotmail.fr', '$2y$10$RL.wUlwb0bIq2LPEs75tEuijtVpp6HrKdQgZDbmVwXy1/9u5tMe5.', 0),
(9, 'MmePaty', 'paty66@orange.fr', '$2y$10$e2jAlBJbpCx2QHeAd489cugdTi.DUSvVvX2ZFbq8Qf8HaSCbddCGi', 0);

-- --------------------------------------------------------

--
-- Structure de la table `validated_training`
--

CREATE TABLE `validated_training` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `video_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `validated_training`
--

INSERT INTO `validated_training` (`id`, `user_id`, `video_id`, `created_at`) VALUES
(1, 1, 1, '2020-04-29 17:18:36'),
(2, 1, 2, '2020-04-29 18:31:55'),
(3, 1, 3, '2020-04-29 20:01:08'),
(4, 4, 2, '2020-04-30 00:54:51'),
(5, 7, 1, '2020-05-27 11:16:29'),
(6, 7, 3, '2020-05-29 22:29:44'),
(7, 6, 1, '2020-06-13 14:20:20'),
(8, 7, 4, '2020-08-13 10:20:44');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `name`, `content`, `user_id`, `file_name`) VALUES
(1, 'Faire un coeur sur cafÃ©', 'Une formation pour vous montrer comment faire un coeur sur du cafÃ©', 1, 'coeur_cafe.mp4'),
(2, 'Debouchonner une bouteille', 'Voici comment debouchonner une bouteille', 1, 'remove_bottle.mp4'),
(3, 'Plier une chaussette', 'Explication de comment plier une chausette !', 1, 'tutoChausette.mp4'),
(4, 'dessiner une fleur', 'comment dessiner une fleur', 1, 'how_draw_flower.mp4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `validated_training`
--
ALTER TABLE `validated_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `validated_training`
--
ALTER TABLE `validated_training`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `validated_training`
--
ALTER TABLE `validated_training`
  ADD CONSTRAINT `validated_training_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `validated_training_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
