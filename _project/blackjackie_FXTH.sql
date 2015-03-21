-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 11:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blackjackie_fxth`
--

-- --------------------------------------------------------

--
-- Table structure for table `ib_vip`
--

CREATE TABLE IF NOT EXISTS `ib_vip` (
`id` int(11) NOT NULL COMMENT 'รหัส ',
  `ib` varchar(13) NOT NULL COMMENT 'เลขบัญชี',
  `date` date NOT NULL COMMENT 'วันที่สมัคร',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'สถานะใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `fb_name` varchar(255) NOT NULL,
  `member_ib` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'member',
  `join_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `token` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
`id` int(5) NOT NULL,
  `topic` varchar(128) NOT NULL,
  `detail` text,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `max` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `videoUrl` text,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `training_detail`
--

CREATE TABLE IF NOT EXISTS `training_detail` (
  `training_id` int(5) NOT NULL,
  `member_id` int(11) NOT NULL,
  `joinDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ib_vip`
--
ALTER TABLE `ib_vip`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ib_UNIQUE` (`ib`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `member_ib_UNIQUE` (`member_ib`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_detail`
--
ALTER TABLE `training_detail`
 ADD PRIMARY KEY (`training_id`,`member_id`), ADD KEY `fk_training_detail_training_idx` (`training_id`), ADD KEY `fk_training_detail_members1_idx` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ib_vip`
--
ALTER TABLE `ib_vip`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส ';
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `training_detail`
--
ALTER TABLE `training_detail`
ADD CONSTRAINT `fk_training_detail_members1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_training_detail_training` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
