-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 18 Juin 2019 à 07:24
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_julien`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
  `id_access` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id_access`, `slug`, `description`) VALUES
(1, 'ACCESS_CREATE', 'Accès création des éléments'),
(2, 'ACCESS_UPDATE', 'Accès mise à jour des éléments'),
(3, 'ACCESS_READ', 'Accès lecture des éléments'),
(4, 'ACCESS_DELETE', 'Accès supression des éléments');

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `cover_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id_activity`, `active`, `name`, `description`, `cover_image`, `icon`, `date_add`, `date_update`) VALUES
(1, 0, 'Musculatonii', 'dajzhdbhabdkjahzmmm', 'musculation.png', 'musculation.png', '2019-06-07 00:00:00', '2019-06-16 17:51:56'),
(6, 0, 'vélo', 'vélo c bien pour la santé', '', '', '2019-06-16 23:32:46', '2019-06-16 23:32:46'),
(7, 0, '', '', '', '', '2019-06-17 00:26:01', '2019-06-17 00:26:01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_seo` varchar(255) NOT NULL,
  `enable_comments` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `id_manager` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `description`, `meta_seo`, `enable_comments`, `date_add`, `date_update`, `cover_image`, `id_manager`, `active`) VALUES
(2, '5 conseils pour muscler ses bras\r\n', 'Il n\'y a pas que les pectoraux et les abdominaux dans la vie. Un corps harmonieux passe aussi par des bras bien proportionnés. Suivez nos 5 astuces pour les muscler de façon optimale.\r\n\r\nQue vous prépariez le concours de culturisme de Colmar ou que vous souhaitiez plus modestement combler le vide entre votre os et la manche de votre tee-shirt, la musculation de vos bras vous obnubile. D\'autant plus que la grande majorité des femmes préfère deux bras solides à une paire de gressins atrophiés.\r\n\r\nUn exercice régulier et complété par une alimentation adaptée peut permettre un développement rapide du volume de vos bras, surtout si vous partez de loin. Nous avons sélectionné cinq conseils pour vous aiguiller dans la quête du corps de Stallone.\r\n\r\n1 - Ne pas se concentrer uniquement sur les biceps\r\n\r\nLes débutants en musculation ont la fâcheuse tendance à le réduire au seul biceps. Pourtant, le bras est occupé aux deux tiers par le triceps. Comme son nom l\'indique, il est composé de trois portions: le vaste latéral, le vaste médial et le long chef. Il est donc nécessaire de concentrer ses efforts sur le développement du triceps. Bien que sollicité par tous les exercices de poussée visant notamment à la construction des pectoraux et des épaules, le triceps doit être travaillé seul pour que son volume soit en cohésion avec celui du biceps que vous vous attelez à faire grossir dans le même temps.\r\n\r\n2 - Adapter son alimentation\r\n\r\nPour la musculation en général et celle des bras en particulier, impossible de compter sur des résultats si on ne prend pas de bonnes habitudes alimentaires. Pour bien faire, il est naturellement indispensable de mettre l\'accent sur les protéines. Pour autant, «il ne faut pas oublier les glucides», rappelle David Costa, coach fitness. En effet, «si l\'apport en glucides est insuffisant, on est en période de sèche or, ici, on recherche une prise de muscle», assure le sportif. Votre régime doit donc s\'enrichir en œufs, viande, poisson, mais aussi riz, pâtes, pommes de terre, tout en conservant des lipides type huiles et graines.\r\n\r\n3 - Travailler en séries d\'exercices ciblés\r\n\r\n«Ce qui développe le muscle, c\'est réussir à utiliser le plus de fibres musculaires possibles avec une charge suffisamment intense et un placement correct, explique David Costa. Pour cela, il faut aller au bout de l\'effort». Autrement dit, vous devez terminer vos séries avec difficultés.', 'musculation, exercices, santé, corps', 1, '2019-06-15 00:00:00', '2019-06-15 00:00:00', 'article1.png', 1, 0),
(20, 'jhjbjhvbbv', 'bhgv', 'sport,aquatique,santé', 0, '2019-06-17 00:56:17', '2019-06-17 00:56:17', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE `article_category` (
  `id_category` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article_category`
--

INSERT INTO `article_category` (`id_category`, `id_article`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_root` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `id_parent` tinyint(4) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `meta_seo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `active`, `name`, `is_root`, `description`, `cover_image`, `id_parent`, `date_add`, `date_update`, `meta_seo`) VALUES
(1, 1, 'Default mpo', 0, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'category_1.png', 2, '2019-06-15 00:00:00', '2019-06-17 00:18:25', 'base category, default category'),
(2, 1, 'Cate2 example', 0, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'category_2.png', 1, '2019-06-15 00:00:00', '2019-06-15 00:00:00', 'base category, default category'),
(8, 0, 'Sport aquatiqueooo', 0, 'Ici le grope de tous les sportsq quaq,', '', 1, '2019-06-16 23:44:21', '2019-06-16 23:49:55', 'sport,aquatique,santé');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `active`, `comment`, `date_add`, `date_update`, `id_article`, `id_member`) VALUES
(3, 1, 'Vous avez terminé !\r\nL\'e-mail de téléchargement a été envoyé, votre transfert sera disponible pendant 1 semaine', '2019-06-15 00:00:00', '2019-06-15 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `level`
--

INSERT INTO `level` (`id_level`, `active`, `name`) VALUES
(1, 1, 'Débutant'),
(2, 1, 'Intermédiaire'),
(3, 1, 'Avancé'),
(4, 1, 'Confirmé'),
(5, 1, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `reset_passwd_token` varchar(255) NOT NULL,
  `last_passwd_gen` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `last_connexion` datetime NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `manager`
--

INSERT INTO `manager` (`id_manager`, `lastname`, `firstname`, `passwd`, `reset_passwd_token`, `last_passwd_gen`, `active`, `date_add`, `date_update`, `last_connexion`, `photo`, `email`, `id_profile`) VALUES
(1, 'Pkandre', 'André', 'dzadbadbazjhk', 'neazekjazebazbe', '2019-06-15 00:00:00', 1, '2019-06-15 00:00:00', '2019-06-15 00:00:00', '2019-06-15 00:00:00', 'manager1.png', 'pululuandre@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` char(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `last_connexion` datetime NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `enable_comments` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id_member`, `lastname`, `firstname`, `active`, `date_add`, `date_update`, `address`, `city`, `country`, `zip_code`, `description`, `last_connexion`, `passwd`, `photo`, `email`, `enable_comments`) VALUES
(1, 'Member 1', 'My member', 1, '2019-06-15 00:00:00', '2019-06-22 00:00:00', '3 allée des champions', 'Paris', 'France', '75091', 'Juste example', '2019-06-15 00:00:00', 'dzfzfzfze', 'zefzfz', 'email@glkg.com', 1),
(2, 'NGASSAM', 'EUGENIE', 0, '2019-06-16 20:42:43', '2019-06-16 20:45:09', 'ETAGE 1 APPARTEMENT 241, 13 RUE FERDINAND BUISSON', 'VILLIERS SUR MARNE', 'nnbhjbh', '94350', '2', '0000-00-00 00:00:00', 'pkandre', '', 'jkkjnjkhhv@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `member_activity`
--

CREATE TABLE `member_activity` (
  `id_activity` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member_activity`
--

INSERT INTO `member_activity` (`id_activity`, `id_level`, `id_member`) VALUES
(1, 2, 1),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profile`
--

INSERT INTO `profile` (`id_profile`, `name`, `active`) VALUES
(1, 'Super administrateur', 0),
(2, 'Administrateur', 0),
(3, 'Manager', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profile_access`
--

CREATE TABLE `profile_access` (
  `id_access` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profile_access`
--

INSERT INTO `profile_access` (`id_access`, `id_profile`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`),
  ADD UNIQUE KEY `access_AK` (`slug`);

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD UNIQUE KEY `activity_AK` (`name`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `article_manager_FK` (`id_manager`);

--
-- Index pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id_category`,`id_article`),
  ADD KEY `article_category_article0_FK` (`id_article`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_article_FK` (`id_article`),
  ADD KEY `comment_member0_FK` (`id_member`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `level_AK` (`name`);

--
-- Index pour la table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`),
  ADD UNIQUE KEY `manager_AK` (`email`),
  ADD KEY `manager_profile_FK` (`id_profile`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `member_AK` (`email`);

--
-- Index pour la table `member_activity`
--
ALTER TABLE `member_activity`
  ADD PRIMARY KEY (`id_activity`,`id_level`,`id_member`),
  ADD KEY `member_activity_level0_FK` (`id_level`),
  ADD KEY `member_activity_member1_FK` (`id_member`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `profile_AK` (`name`);

--
-- Index pour la table `profile_access`
--
ALTER TABLE `profile_access`
  ADD PRIMARY KEY (`id_access`,`id_profile`),
  ADD KEY `profile_access_profile0_FK` (`id_profile`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_manager_FK` FOREIGN KEY (`id_manager`) REFERENCES `manager` (`id_manager`);

--
-- Contraintes pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_article0_FK` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `article_category_category_FK` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_article_FK` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `comment_member0_FK` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Contraintes pour la table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_profile_FK` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`);

--
-- Contraintes pour la table `member_activity`
--
ALTER TABLE `member_activity`
  ADD CONSTRAINT `member_activity_activity_FK` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id_activity`),
  ADD CONSTRAINT `member_activity_level0_FK` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `member_activity_member1_FK` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Contraintes pour la table `profile_access`
--
ALTER TABLE `profile_access`
  ADD CONSTRAINT `profile_access_access_FK` FOREIGN KEY (`id_access`) REFERENCES `access` (`id_access`),
  ADD CONSTRAINT `profile_access_profile0_FK` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
