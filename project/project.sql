-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2016 at 04:42 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `project_reviews`
--

CREATE TABLE IF NOT EXISTS `project_reviews` (
  `id`            INT(11)       NOT NULL,
  `rating`        DOUBLE(10, 0) NOT NULL,
  `comment`       VARCHAR(500)  NOT NULL,
  `email`         VARCHAR(50)   NOT NULL,
  `date_reviewed` TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = latin1;

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
  `date_joined`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `date_joined`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`firstname`, `lastname`, `email`, `password`, `password_recovery`, `phone`, `permissions`, `address`, `date_joined`)
VALUES
  ('Admin', 'Admin', 'admin@greenleb.com', '0192023a7bbd73250516f069df18b500', '', '70123456', 1, 'Address',
   '2016-05-25 14:35:36');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `project_reviews`
--
ALTER TABLE `project_reviews`
ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `project_requests_done`
--
ALTER TABLE `project_requests_done`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_reviews`
--
ALTER TABLE `project_reviews`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
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
