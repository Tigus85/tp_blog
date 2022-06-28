-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 juin 2022 à 15:55
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `statut` enum('draft','public','member') NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `owner_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `img_url`, `title`, `content`, `statut`, `category_id`, `owner_id`) VALUES
(1, 'https://i0.wp.com/www.kimonosport.com/wp-content/uploads/2018/08/van_damme_joven.jpg?w=612&ssl=1', 'Leur lutte était constante pour devenir acteur', 'Sans doute, ce pour quoi Jean Claude Van Damme s’est le plus battu, c’est à cause de son rêve de devenir acteur. A 22 ans, le Belge vend sa salle de sport et se rend aux Etats-Unis sans papiers et sans connaître beaucoup la langue. Là, il a dû faire toutes sortes de travaux en tant que chauffeur de taxi, nettoyeur de chaussures, serveur, livreur de pizza, chauffeur de limousine, et même il prétend dans son film qu’il a continué à voler pour qu’il puisse manger.', 'public', 1, 2),
(2, 'https://img.filmsactu.net/datas/personnes/j/e/jean-claude-van-damme/n/jean-claude-van-damme-613716305ade0.jpg', 'Bam Boom Tap', 'Quand tu fais le calcul, je suis mon meilleur modèle car entre penser et dire, il y a un monde de différence et c\'est une sensation réelle qui se produit si on veut ! Donc on n\'est jamais seul spirituellement !\r\n\r\nAh non attention, je sais que, grâce à ma propre vérité c\'est juste une question d\'awareness et ça, c\'est très dur, et, et, et... c\'est très facile en même temps. Il y a un an, je t\'aurais parlé de mes muscles.', '', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `img_url`) VALUES
(1, 'philosophie', 'https://i0.wp.com/www.kimonosport.com/wp-content/uploads/2018/08/historia-de-jean-claude-van-damme-1024x575.jpg?resize=1024%2C575&ssl=1'),
(2, 'bagarre', 'https://www.nostalgie.be/build/images/mask02.svg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `name`, `firstname`, `birthday`, `password`, `is_admin`) VALUES
(2, 'machin@truc.fr', 'macin', 'truc', '2012-06-13', '12345678', 0),
(3, 'toi@test.fr', 'testoi', 'test', '2013-06-27', '$2y$10$tA9kh7tjlC3m9lWF4rojbuXN5o9yDy5ng.0ho6Y2sBSVBYACehYn6', 0),
(4, 'van@jc.fr', 'jean', 'van', '2022-06-09', '$2y$10$Uji5RNqzBB6rZ2XV73kvK.BqAjdZcV9fPW23oz.jnNewdukSdMn42', 0),
(5, 'julien@loic.fr', 'Julien', 'truc', '2011-12-28', '$2y$10$Eem0xjCv0wddXLvt2BV5ke2kuxZWcEpRTEZZN78z8x7YT2yC0Pmai', 0),
(6, 'fouad@loic.fr', 'Fouad', 'Loic', '2022-06-02', '$argon2id$v=19$m=65536,t=4,p=1$V1FUTnFJblhOdmtnSUwyVg$mVxK4TgqA0/pNFA6X04YcYoJPjHbii5bH6kWVzO0JvA', 0),
(7, 'michel@michel.fr', 'michel', 'michel', '2022-06-30', '$2y$10$/T95LE0VfATmD0CVhqN3C.rTi00KRycMMwTAJnJ3jmHfE32jU95ce', 0),
(8, 'cath@caht.fr', 'catherin', 'cath', '2022-06-09', '$2y$10$RzCQybAnvdIZjbm1mUyZCe.7RM7Zn9JF7h23BtZPkWe0lmP1uE/Y.', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
