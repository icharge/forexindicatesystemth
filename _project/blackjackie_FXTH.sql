-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2015 at 06:22 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blackjackie_FXTH`
--

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE IF NOT EXISTS `Members` (
`id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `picture` varchar(128) DEFAULT NULL,
  `joinDate` datetime NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `token` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`id`, `username`, `password`, `title`, `name`, `surname`, `nick`, `picture`, `joinDate`, `role`, `status`, `token`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'นรภัทร', 'นิ่มมณี', 'ชาร์จ', NULL, '2015-01-28 11:13:16', 'admin', 'active', '92665ca0afe9dcdb853c71e55032748ae2daa9f9604fc7b41d8d3c22b4057d62');

-- --------------------------------------------------------

--
-- Table structure for table `Member_Accounts`
--

CREATE TABLE IF NOT EXISTS `Member_Accounts` (
`id` int(11) NOT NULL,
  `account` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Training`
--

CREATE TABLE IF NOT EXISTS `Training` (
`id` int(5) NOT NULL,
  `topic` varchar(128) CHARACTER SET utf8 NOT NULL,
  `detail` text CHARACTER SET utf8,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `max` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `videoUrl` text CHARACTER SET utf8,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Training_Detail`
--

CREATE TABLE IF NOT EXISTS `Training_Detail` (
  `training_id` int(5) NOT NULL,
  `member_id` int(11) NOT NULL,
  `joinDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Member_Accounts`
--
ALTER TABLE `Member_Accounts`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `account` (`account`);

--
-- Indexes for table `Training`
--
ALTER TABLE `Training`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Training_Detail`
--
ALTER TABLE `Training_Detail`
 ADD PRIMARY KEY (`training_id`,`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Member_Accounts`
--
ALTER TABLE `Member_Accounts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Training`
--
ALTER TABLE `Training`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
