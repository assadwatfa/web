-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 09:50 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4
SET GLOBAL time_zone = '+3:00';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wwwhqbju_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_news`
--

CREATE TABLE IF NOT EXISTS `project_news` (
  `news_id`      INT(11)          NOT NULL AUTO_INCREMENT,
  `news_title`   VARCHAR(60)
                 COLLATE utf8_bin NOT NULL,
  `news_content` VARCHAR(150)
                 COLLATE utf8_bin NOT NULL,
  `news_author`  VARCHAR(60)
                 COLLATE utf8_bin NOT NULL,
  `news_date`    DATE                      DEFAULT NULL,
  PRIMARY KEY (`news_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin
  AUTO_INCREMENT = 6;

--
-- Dumping data for table `project_news`
--

INSERT INTO `project_news` (`news_id`, `news_title`, `news_content`, `news_author`, `news_date`) VALUES
  (1, 'Version 1.0', 'We are proud to announce v1.0 is released!', 'Hassan Jawhar', '0000-00-00'),
  (2, 'Version 1.1', 'Available on github', 'Hassan Jawhar', '2016-05-20'),
  (3, 'asdasd', 'asdasd', 'asdasd', '2016-05-20'),
  (4, 'Version 1.0', '1231asdasd', 'asdasd', '2016-05-20'),
  (5, 'asdasd234234', 'asdasdasd', '123123123', '2016-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `project_requests`
--

CREATE TABLE IF NOT EXISTS `project_requests` (
  `address`    VARCHAR(100)
               COLLATE utf8_bin NOT NULL,
  `date_added` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email`      VARCHAR(50)
               COLLATE utf8_bin NOT NULL,
  KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_requests`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_requests_done`
--

CREATE TABLE IF NOT EXISTS `project_requests_done` (
  `id`           INT(11)          NOT NULL AUTO_INCREMENT,
  `driver_email` VARCHAR(50)
                 COLLATE utf8_bin NOT NULL,
  `address`      VARCHAR(100)
                 COLLATE utf8_bin NOT NULL,
  `date_done`    TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email`        VARCHAR(50)
                 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin
  AUTO_INCREMENT = 1;

--
-- Dumping data for table `project_requests_done`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_requests_processing`
--

CREATE TABLE IF NOT EXISTS `project_requests_processing` (
  `driver_email`    VARCHAR(50)
                    COLLATE utf8_bin NOT NULL,
  `address`         VARCHAR(100)
                    COLLATE utf8_bin NOT NULL,
  `date_processing` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email`           VARCHAR(50)
                    COLLATE utf8_bin NOT NULL,
  KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_requests_processing`
--

INSERT INTO `project_requests_processing` (`driver_email`, `address`, `date_processing`, `email`) VALUES
  ('jacksmith@gmail.com', 'Ikleem', '2016-05-24 11:29:22', 'madona@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `project_reviews`
--

CREATE TABLE IF NOT EXISTS `project_reviews` (
  `id`            INT(11)       NOT NULL AUTO_INCREMENT,
  `rating`        DOUBLE(10, 0) NOT NULL,
  `comment`       VARCHAR(500)  NOT NULL,
  `email`         VARCHAR(50)   NOT NULL,
  `date_reviewed` TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 10;

--
-- Dumping data for table `project_reviews`
--

INSERT INTO `project_reviews` (`id`, `rating`, `comment`, `email`, `date_reviewed`) VALUES
  (8, 5, 'hi', 'assad_watfa@hotmail.com', '2016-05-25 00:17:20'),
  (9, 1, 'It was fast and very efficient!', 'assad_watfa@hotmail.com', '2016-05-25 00:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `project_unverified_users`
--

CREATE TABLE IF NOT EXISTS `project_unverified_users` (
  `verification_code` VARCHAR(100)
                      COLLATE utf8_bin NOT NULL,
  `firstname`         VARCHAR(20)
                      COLLATE utf8_bin NOT NULL,
  `lastname`          VARCHAR(20)
                      COLLATE utf8_bin NOT NULL,
  `email`             VARCHAR(50)
                      COLLATE utf8_bin NOT NULL,
  `password`          VARCHAR(100)
                      COLLATE utf8_bin NOT NULL,
  `password_recovery` VARCHAR(60)
                      COLLATE utf8_bin NOT NULL,
  `phone`             VARCHAR(12)
                      COLLATE utf8_bin NOT NULL,
  `permissions`       INT(3)           NOT NULL,
  `address`           VARCHAR(100)
                      COLLATE utf8_bin NOT NULL,
  `date_joined` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_unverified_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE IF NOT EXISTS `project_users` (
  `firstname`         VARCHAR(20)
                      COLLATE utf8_bin NOT NULL,
  `lastname`          VARCHAR(20)
                      COLLATE utf8_bin NOT NULL,
  `email`             VARCHAR(50)
                      COLLATE utf8_bin NOT NULL,
  `password`          VARCHAR(100)
                      COLLATE utf8_bin NOT NULL,
  `password_recovery` VARCHAR(60)
                      COLLATE utf8_bin NOT NULL,
  `phone`             VARCHAR(12)
                      COLLATE utf8_bin NOT NULL,
  `permissions`       INT(3)           NOT NULL,
  `address`           VARCHAR(100)
                      COLLATE utf8_bin NOT NULL,
  `date_joined` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`firstname`, `lastname`, `email`, `password`, `password_recovery`, `phone`, `permissions`, `address`, `date_joined`)
VALUES
  ('', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 2, '', '2016-05-19 21:13:56'),
  ('Assad', 'Watfa', 'assad_watfa@hotmail.com', '49f68a5c8493ec2c0bf489821c21fc3b', '', '71133713', 1, 'beiryt',
   '2016-05-16 19:55:52'),
  ('Driver1', '', 'driver1@gmail.com', '', '', '', 2, '', '2016-05-19 14:00:28'),
  ('Driver2', '', 'driver2@gmail.com', '', '', '', 2, '', '2016-05-16 12:13:56'),
  ('Hassan', 'Jawhar', 'hassan-jawhar@hotmail.com', '118c5c147f6d3136cd66005c14e5dd20', '', '71332309', 1, 'Beirut',
   '2016-05-24 10:58:08'),
  ('Jack', 'Smith', 'jacksmith@gmail.com', '49f68a5c8493ec2c0bf489821c21fc3b', '', '70111111', 2, 'beiruttt',
   '2016-05-19 15:05:30'),
  ('Madona', 'Zankar', 'madona@gmail.com', '118c5c147f6d3136cd66005c14e5dd20', '', '71332309', 3, 'Ikleem',
   '2016-05-24 11:32:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_requests`
--
ALTER TABLE `project_requests`
ADD CONSTRAINT `project_requests_ibfk_1` FOREIGN KEY (`email`) REFERENCES `project_users` (`email`);

--
-- Constraints for table `project_requests_done`
--
ALTER TABLE `project_requests_done`
ADD CONSTRAINT `project_requests_done_ibfk_1` FOREIGN KEY (`email`) REFERENCES `project_users` (`email`);

--
-- Constraints for table `project_requests_processing`
--
ALTER TABLE `project_requests_processing`
ADD CONSTRAINT `project_requests_processing_ibfk_1` FOREIGN KEY (`email`) REFERENCES `project_users` (`email`);
