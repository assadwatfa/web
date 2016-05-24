-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 10:33 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwhqbju_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_news`
--

CREATE TABLE IF NOT EXISTS `project_news` (
  `news_id`      INT(11)             NOT NULL,
  `news_title`   VARCHAR(60)
                 COLLATE utf8mb4_bin NOT NULL,
  `news_content` VARCHAR(150)
                 COLLATE utf8mb4_bin NOT NULL,
  `news_author`  VARCHAR(60)
                 COLLATE utf8mb4_bin NOT NULL,
  `news_date`    DATE DEFAULT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_bin;

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
               COLLATE utf8_bin NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project_requests_done`
--

CREATE TABLE IF NOT EXISTS `project_requests_done` (
  `id`           INT(11)          NOT NULL,
  `driver_email` VARCHAR(50)
                 COLLATE utf8_bin NOT NULL,
  `address`      VARCHAR(100)
                 COLLATE utf8_bin NOT NULL,
  `date_done`    TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email`        VARCHAR(50)
                 COLLATE utf8_bin NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

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
                    COLLATE utf8_bin NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_requests_processing`
--

INSERT INTO `project_requests_processing` (`driver_email`, `address`, `date_processing`, `email`) VALUES
  ('jacksmith@gmail.com', 'Ikleem', '2016-05-24 08:29:22', 'madona@gmail.com');

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
  `date_joined`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

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
  `date_joined`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`firstname`, `lastname`, `email`, `password`, `password_recovery`, `phone`, `permissions`, `address`, `date_joined`)
VALUES
  ('', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 2, '', '2016-05-19 18:13:56'),
  ('Assad', 'Watfa', 'assad_watfa@hotmail.com', '49f68a5c8493ec2c0bf489821c21fc3b', '', '71133713', 1, 'beiryt',
   '2016-05-16 16:55:52'),
  ('Driver1', '', 'driver1@gmail.com', '', '', '', 2, '', '2016-05-19 11:00:28'),
  ('Driver2', '', 'driver2@gmail.com', '', '', '', 2, '', '2016-05-16 09:13:56'),
  ('Hassan', 'Jawhar', 'hassan-jawhar@hotmail.com', '118c5c147f6d3136cd66005c14e5dd20', '', '71332309', 1, 'Beirut',
   '2016-05-24 07:58:08'),
  ('Jack', 'Smith', 'jacksmith@gmail.com', '49f68a5c8493ec2c0bf489821c21fc3b', '', '70111111', 2, 'beiruttt',
   '2016-05-19 12:05:30'),
  ('Madona', 'Zankar', 'madona@gmail.com', '118c5c147f6d3136cd66005c14e5dd20', '', '71332309', 3, 'Ikleem',
   '2016-05-24 08:32:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_news`
--
ALTER TABLE `project_news`
ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `project_requests`
--
ALTER TABLE `project_requests`
ADD KEY `email` (`email`);

--
-- Indexes for table `project_requests_done`
--
ALTER TABLE `project_requests_done`
ADD PRIMARY KEY (`id`),
ADD KEY `email` (`email`);

--
-- Indexes for table `project_requests_processing`
--
ALTER TABLE `project_requests_processing`
ADD KEY `email` (`email`);

--
-- Indexes for table `project_unverified_users`
--
ALTER TABLE `project_unverified_users`
ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
ADD PRIMARY KEY (`email`),
ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_news`
--
ALTER TABLE `project_news`
MODIFY `news_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `project_requests_done`
--
ALTER TABLE `project_requests_done`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
