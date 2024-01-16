-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2024 at 01:15 PM
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
  `id_topics` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_topics_FK` (`id_topics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_comments`
--

DROP TABLE IF EXISTS `a8yk4_comments`;
CREATE TABLE IF NOT EXISTS `a8yk4_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_status` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_status_FK` (`id_status`),
  KEY `comments_users0_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_likes`
--

DROP TABLE IF EXISTS `a8yk4_likes`;
CREATE TABLE IF NOT EXISTS `a8yk4_likes` (
  `id_topics` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_topics`,`id_users`),
  KEY `likes_users0_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_sections`
--

DROP TABLE IF EXISTS `a8yk4_sections`;
CREATE TABLE IF NOT EXISTS `a8yk4_sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_topics` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_topics_FK` (`id_topics`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_status`
--

DROP TABLE IF EXISTS `a8yk4_status`;
CREATE TABLE IF NOT EXISTS `a8yk4_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_users_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_topicanswers`
--

DROP TABLE IF EXISTS `a8yk4_topicanswers`;
CREATE TABLE IF NOT EXISTS `a8yk4_topicanswers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `publicationDate` datetime NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_users` int NOT NULL,
  `id_topics` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topicAnswers_users_FK` (`id_users`),
  KEY `topicAnswers_topics0_FK` (`id_topics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_topics`
--

DROP TABLE IF EXISTS `a8yk4_topics`;
CREATE TABLE IF NOT EXISTS `a8yk4_topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_users_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_topics`
--

INSERT INTO `a8yk4_topics` (`id`, `tag`, `title`, `content`, `publicationDate`, `id_users`) VALUES
(1, 'Powerlevel', 'mada mada da ne', 'Ebandaki boye, eko suka pe boye kk..', '2023-12-22 09:49:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_users`
--

INSERT INTO `a8yk4_users` (`id`, `username`, `email`, `password`, `location`, `birthdate`, `registerDate`, `avatar`, `id_usersRoles`) VALUES
(1, 'testModif', 'testModif@gmail.fr', 'location', 'location', '1970-01-01', '2023-12-21', 'avatar', 1),
(16, 'vieuxnzau', 'vieuxnzau@gmail.cd', '$2y$10$oASGH61YVD/hI/wENxZ3HOI.qpD5x26qkQMG2tdRAGT4RzNpeUTmy', '', '1990-12-11', '2024-01-12', '', 1),
(17, 'ndule', 'melo@town.cd', '$2y$10$W.V2qHM2p3CCefY3NIj/Ke/AJe5t6qVh5qRZ/3dr94a/ClwA/m85q', '', '1980-03-31', '2024-01-12', '', 1),
(18, 'yewana', 'yewana@gmail.cd', '$2y$10$7pENlarWhb4GYbEV3IEzR.HbyFmaEzosMTsF0.Q4EOcB9okUQUjVe', '', '1999-01-01', '2024-01-15', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a8yk4_usersroles`
--

DROP TABLE IF EXISTS `a8yk4_usersroles`;
CREATE TABLE IF NOT EXISTS `a8yk4_usersroles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a8yk4_usersroles`
--

INSERT INTO `a8yk4_usersroles` (`id`, `name`) VALUES
(1, 'Membre'),
(128, 'Modérateur'),
(258, 'Administrateur');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a8yk4_categories`
--
ALTER TABLE `a8yk4_categories`
  ADD CONSTRAINT `categories_topics_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`);

--
-- Constraints for table `a8yk4_comments`
--
ALTER TABLE `a8yk4_comments`
  ADD CONSTRAINT `comments_status_FK` FOREIGN KEY (`id_status`) REFERENCES `a8yk4_status` (`id`),
  ADD CONSTRAINT `comments_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`);

--
-- Constraints for table `a8yk4_likes`
--
ALTER TABLE `a8yk4_likes`
  ADD CONSTRAINT `likes_topics_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`),
  ADD CONSTRAINT `likes_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`);

--
-- Constraints for table `a8yk4_sections`
--
ALTER TABLE `a8yk4_sections`
  ADD CONSTRAINT `sections_topics_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`);

--
-- Constraints for table `a8yk4_status`
--
ALTER TABLE `a8yk4_status`
  ADD CONSTRAINT `status_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`);

--
-- Constraints for table `a8yk4_topicanswers`
--
ALTER TABLE `a8yk4_topicanswers`
  ADD CONSTRAINT `topicAnswers_topics0_FK` FOREIGN KEY (`id_topics`) REFERENCES `a8yk4_topics` (`id`),
  ADD CONSTRAINT `topicAnswers_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`);

--
-- Constraints for table `a8yk4_topics`
--
ALTER TABLE `a8yk4_topics`
  ADD CONSTRAINT `topics_users_FK` FOREIGN KEY (`id_users`) REFERENCES `a8yk4_users` (`id`);

--
-- Constraints for table `a8yk4_users`
--
ALTER TABLE `a8yk4_users`
  ADD CONSTRAINT `users_usersRoles_FK` FOREIGN KEY (`id_usersRoles`) REFERENCES `a8yk4_usersroles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
