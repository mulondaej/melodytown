-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2024 at 10:51 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melodytown`
--

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_categories`
--

DROP TABLE IF EXISTS `a8yk4_categories`;
CREATE TABLE IF NOT EXISTS `a8yk4_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_categories`
--

INSERT INTO `a8yk4_categories` (`id`, `name`) VALUES
(1, 'Manga'),
(2, 'Anime'),
(3, 'Webtoon'),
(4, 'Comics'),
(5, 'Afrostories'),
(6, 'Club'),
(7, 'Rules'),
(8, 'Génerale'),
(9, 'Memes'),
(10, 'News'),
(11, 'Spoiler'),
(12, 'Political');

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_comments`
--

DROP TABLE IF EXISTS `a8yk4_comments`;
CREATE TABLE IF NOT EXISTS `a8yk4_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `id_status` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_status_FK` (`id_status`),
  KEY `comments_users0_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_likes`
--

DROP TABLE IF EXISTS `a8yk4_likes`;
CREATE TABLE IF NOT EXISTS `a8yk4_likes` (
  `id_topics` int NOT NULL,
  `id_topicreplies` int NOT NULL,
  `id_status` int NOT NULL,
  `id_comments` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_topics`,`id_users`),
  KEY `likes_users0_FK` (`id_users`),
  KEY `likes_status_FK` (`id_status`),
  KEY `likes_comments_FK` (`id_comments`),
  KEY `likes_topicreplies_FK` (`id_topicreplies`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_sections`
--

DROP TABLE IF EXISTS `a8yk4_sections`;
CREATE TABLE IF NOT EXISTS `a8yk4_sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_sections`
--

INSERT INTO `a8yk4_sections` (`id`, `name`) VALUES
(1, 'Central'),
(2, 'Multiverse'),
(3, 'Découvrir'),
(4, 'Générale'),
(5, 'Baze'),
(6, 'Manga'),
(7, 'Webtoon'),
(8, 'Comics'),
(9, 'Afrostories');

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_status`
--

DROP TABLE IF EXISTS `a8yk4_status`;
CREATE TABLE IF NOT EXISTS `a8yk4_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_users_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_tags`
--

DROP TABLE IF EXISTS `a8yk4_tags`;
CREATE TABLE IF NOT EXISTS `a8yk4_tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_tags`
--

INSERT INTO `a8yk4_tags` (`id`, `name`) VALUES
(1, 'Discussion'),
(2, 'Character'),
(3, 'Spoiler'),
(4, 'Powerlevel'),
(5, 'Versus'),
(6, 'Theorie'),
(7, 'News'),
(8, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_topicreplies`
--

DROP TABLE IF EXISTS `a8yk4_topicreplies`;
CREATE TABLE IF NOT EXISTS `a8yk4_topicreplies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `id_users` int NOT NULL,
  `id_topics` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topicReplies_topics0_FK` (`id_topics`),
  KEY `topicReplies_users_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_topics`
--

DROP TABLE IF EXISTS `a8yk4_topics`;
CREATE TABLE IF NOT EXISTS `a8yk4_topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `id_users` int NOT NULL,
  `id_categories` int NOT NULL,
  `id_tags` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_categories_FK` (`id_categories`),
  KEY `topics_tags_FK` (`id_tags`),
  KEY `topics_users_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_topics`
--

INSERT INTO `a8yk4_topics` (`id`, `title`, `content`, `publicationDate`, `updateDate`, `id_users`, `id_categories`, `id_tags`) VALUES
(147, 'TITLE TEST', 'TESTING', '2024-02-21 16:02:10', '2024-02-21 16:02:10', 25, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_users`
--

DROP TABLE IF EXISTS `a8yk4_users`;
CREATE TABLE IF NOT EXISTS `a8yk4_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `registerDate` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_usersRoles` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_usersRoles_FK` (`id_usersRoles`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_users`
--

INSERT INTO `a8yk4_users` (`id`, `username`, `email`, `password`, `location`, `birthdate`, `registerDate`, `avatar`, `id_usersRoles`) VALUES
(25, 'tests', 'tests@test.cd', '$2y$10$YBQHhr6iSw5bJNqDS1qfJ.aPHnFfQL.WFXgU5jfG3B2leBcFl1IFW', 'Ndaku', '2001-01-01', '2024-02-12', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_usersroles`
--

DROP TABLE IF EXISTS `a8yk4_usersroles`;
CREATE TABLE IF NOT EXISTS `a8yk4_usersroles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_usersroles`
--

INSERT INTO `a8yk4_usersroles` (`id`, `name`) VALUES
(1, 'Membre'),
(167, 'Modérateur'),
(381, 'Administrateur');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a8yk4_comments`
--
ALTER TABLE `a8yk4_comments`
  ADD CONSTRAINT `comments_status_FK` FOREIGN KEY (`id_status`) REFERENCES `a8yk4_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a8yk4_likes`
--
ALTER TABLE `a8yk4_likes`
  ADD CONSTRAINT `likes_comments_FK` FOREIGN KEY (`id_comments`) REFERENCES `a8yk4_comments` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_status_FK` FOREIGN KEY (`id_status`) REFERENCES `a8yk4_status` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_topicreplies_FK` FOREIGN KEY (`id_topicreplies`) REFERENCES `a8yk4_topicreplies` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_topics_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `a8yk4_status`
--
ALTER TABLE `a8yk4_status`
  ADD CONSTRAINT `status_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a8yk4_topicreplies`
--
ALTER TABLE `a8yk4_topicreplies`
  ADD CONSTRAINT `topicReplies_topics0_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topicReplies_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a8yk4_topics`
--
ALTER TABLE `a8yk4_topics`
  ADD CONSTRAINT `topics_categories_FK` FOREIGN KEY (`id_categories`) REFERENCES `a8yk4_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_tags_FK` FOREIGN KEY (`id_tags`) REFERENCES `a8yk4_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a8yk4_users`
--
ALTER TABLE `a8yk4_users`
  ADD CONSTRAINT `users_usersRoles_FK` FOREIGN KEY (`id_usersRoles`) REFERENCES `a8yk4_usersroles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
