-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2015 at 04:09 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `token` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`id`, `username`, `password`, `title`, `name`, `surname`, `nick`, `picture`, `joinDate`, `role`, `status`, `token`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'นาย', 'นรภัทร', 'นิ่มมณี', 'ชาร์จ', NULL, '2015-01-28 11:13:16', 'admin', 'active', 'e69547f6efbaea926c59986c3dc227157d768687ac05d8f31dff4a2590154ecb'),
(2, 'magic', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', NULL, '2015-03-18 00:00:00', 'member', '', '429117723b4299b63f87405da9af848f7d768687ac05d8f31dff4a2590154ecb');

-- --------------------------------------------------------

--
-- Table structure for table `Member_Accounts`
--

CREATE TABLE IF NOT EXISTS `Member_Accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `member_ib` varchar(13) NOT NULL,
  `join_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `Member_Accounts`
--

INSERT INTO `Member_Accounts` (`id`, `account_name`, `status`, `member_ib`, `join_date`, `email`) VALUES
(1, 'fx1', '0', '584081', '2015-01-05', 'Unknow'),
(2, 'fx2', '0', '7134625', '2015-01-06', 'Unknow'),
(3, 'fx3', '0', '8552237', '2015-01-08', 'Unknow'),
(4, 'fx4', '0', '815183', '2015-01-10', 'Unknow'),
(5, 'fx5', '0', '638817', '2015-01-15', 'Unknow'),
(6, 'fx6', '0', '8555639', '2015-01-21', 'Unknow'),
(7, 'fx7', '0', '8555831', '2015-01-21', 'Unknow'),
(8, 'fx8', '0', '640331', '2015-01-21', 'Unknow'),
(9, 'fx9', '0', '7138728', '2015-01-21', 'Unknow'),
(10, 'fx10', '0', '8555953', '2015-01-22', 'Unknow'),
(11, 'fx11', '0', '8556203', '2015-01-22', 'Unknow'),
(12, 'fx12', '0', '8556062', '2015-01-22', 'Unknow'),
(13, 'fx13', '0', '7139425', '2015-01-23', 'Unknow'),
(14, 'fx14', '0', '641120', '2015-01-24', 'Unknow'),
(15, 'fx15', '0', '8556787', '2015-01-25', 'Unknow'),
(16, 'fx16', '0', '641704', '2015-01-26', 'Unknow'),
(17, 'fx17', '0', '7140226', '2015-01-27', 'Unknow'),
(18, 'fx18', '0', '8559066', '2015-02-03', 'Unknow'),
(19, 'fx19', '0', '591945', '2015-02-03', 'Unknow'),
(20, 'fx20', '0', '8559064', '2015-02-03', 'Unknow'),
(21, 'fx21', '0', '7142484', '2015-02-04', 'Unknow'),
(22, 'fx22', '0', '645059', '2015-02-09', 'Unknow'),
(23, 'fx23', '0', '8561837', '2015-02-16', 'Unknow'),
(24, 'fx24', '0', '7406628', '2015-02-16', 'Unknow'),
(25, 'fx25', '0', '647002', '2015-02-18', 'Unknow'),
(26, 'fx26', '0', '10500293', '2015-02-18', 'Unknow'),
(27, 'fx27', '0', '10500321', '2015-02-18', 'Unknow'),
(28, 'fx28', '0', '646933', '2015-02-18', 'Unknow'),
(29, 'fx29', '0', '7145372', '2015-02-18', 'Unknow'),
(30, 'fx30', '0', '7145375', '2015-02-18', 'Unknow'),
(31, 'fx31', '0', '10500503', '2015-02-19', 'Unknow'),
(32, 'fx32', '0', '647713', '2015-02-21', 'Unknow'),
(33, 'fx33', '0', '7146123', '2015-02-21', 'Unknow'),
(34, 'fx34', '0', '7146862', '2015-02-24', 'Unknow'),
(35, 'fx35', '0', '648875', '2015-02-25', 'Unknow'),
(36, 'fx36', '0', '7147367', '2015-02-25', 'Unknow'),
(37, 'fx37', '0', '10502732', '2015-02-27', 'Unknow'),
(38, 'fx38', '0', '651472', '2015-03-08', 'Unknow'),
(39, 'fx39', '0', '7149919', '2015-03-08', 'Unknow'),
(40, 'fx40', '0', '10504657', '2015-03-08', 'Unknow'),
(41, 'fx41', '0', '10504694', '2015-03-08', 'Unknow'),
(42, 'fx42', '0', '10504720', '2015-03-08', 'Unknow'),
(43, 'fx43', '0', '10504721', '2015-03-08', 'Unknow'),
(44, 'fx44', '0', '10504724', '2015-03-08', 'Unknow'),
(45, 'fx45', '0', '8566829', '2015-03-08', 'Unknow'),
(46, 'fx46', '0', '8566832', '2015-03-08', 'Unknow'),
(47, 'fx47', '0', '10504760', '2015-03-08', 'Unknow'),
(48, 'fx48', '0', '8566843', '2015-03-08', 'Unknow'),
(49, 'fx49', '0', '8566888', '2015-03-08', 'Unknow'),
(50, 'fx50', '0', '10504727', '2015-03-08', 'Unknow'),
(51, 'fx51', '0', '651419', '2015-03-08', 'Unknow'),
(52, 'fx52', '0', '7149922', '2015-03-08', 'Unknow'),
(53, 'fx53', '0', '7149936', '2015-03-08', 'Unknow'),
(54, 'fx54', '0', '7149949', '2015-03-08', 'Unknow'),
(55, 'fx55', '0', '7149982', '2015-03-08', 'Unknow'),
(56, 'fx56', '0', '7150002', '2015-03-08', 'Unknow'),
(57, 'fx57', '0', '7150024', '2015-03-08', 'Unknow'),
(58, 'fx58', '0', '10504649', '2015-03-08', 'Unknow'),
(59, 'fx59', '0', '10504652', '2015-03-08', 'Unknow'),
(60, 'fx60', '0', '10504697', '2015-03-08', 'Unknow'),
(61, 'fx61', '0', '8566765', '2015-03-08', 'Unknow'),
(62, 'fx62', '0', '7149907', '2015-03-08', 'Unknow'),
(63, 'fx63', '0', '10504693', '2015-03-08', 'Unknow'),
(64, 'fx64', '0', '10504695', '2015-03-08', 'Unknow'),
(65, 'fx65', '0', '10504696', '2015-03-08', 'Unknow'),
(66, 'fx66', '0', '8566783', '2015-03-08', 'Unknow'),
(67, 'fx67', '0', '7150103', '2015-03-09', 'Unknow'),
(68, 'fx68', '0', '7150104', '2015-03-09', 'Unknow'),
(69, 'fx69', '0', '7150182', '2015-03-09', 'Unknow'),
(70, 'fx70', '0', '7150191', '2015-03-09', 'Unknow'),
(71, 'fx71', '0', '7150204', '2015-03-09', 'Unknow'),
(72, 'fx72', '0', '8566947', '2015-03-09', 'Unknow'),
(73, 'fx73', '0', '10504905', '2015-03-09', 'Unknow'),
(74, 'fx74', '0', '10504981', '2015-03-09', 'Unknow'),
(75, 'fx75', '0', '10504978', '2015-03-09', 'Unknow'),
(76, 'fx76', '0', '651566', '2015-03-09', 'Unknow'),
(77, 'fx77', '0', '651584', '2015-03-09', 'Unknow'),
(78, 'fx78', '0', '10505043', '2015-03-09', 'Unknow'),
(79, 'fx79', '0', '651657', '2015-03-09', 'Unknow'),
(80, 'fx80', '0', '651697', '2015-03-09', 'Unknow'),
(81, 'fx81', '0', '651710', '2015-03-09', 'Unknow'),
(82, 'fx82', '0', '651711', '2015-03-09', 'Unknow'),
(83, 'fx83', '0', '817237', '2015-03-10', 'Unknow'),
(84, 'fx84', '0', '10505293', '2015-03-10', 'Unknow'),
(85, 'fx85', '0', '7150446', '2015-03-10', 'Unknow'),
(86, 'fx86', '0', '7150345', '2015-03-10', 'Unknow'),
(87, 'fx87', '0', '7150349', '2015-03-10', 'Unknow'),
(88, 'fx88', '0', '8567341', '2015-03-10', 'Unknow'),
(89, 'fx89', '0', '7150368', '2015-03-10', 'Unknow'),
(90, 'fx90', '0', '7150418', '2015-03-10', 'Unknow'),
(91, 'fx91', '0', '7150422', '2015-03-10', 'Unknow'),
(92, 'fx92', '0', '10505082', '2015-03-10', 'Unknow'),
(93, 'fx93', '0', '8567193', '2015-03-10', 'Unknow'),
(94, 'fx94', '0', '8567200', '2015-03-10', 'Unknow'),
(95, 'fx95', '0', '10505136', '2015-03-10', 'Unknow'),
(96, 'fx96', '0', '10505158', '2015-03-10', 'Unknow'),
(97, 'fx97', '0', '7150541', '2015-03-10', 'Unknow'),
(98, 'fx98', '0', '8567272', '2015-03-10', 'Unknow'),
(99, 'fx99', '0', '8567282', '2015-03-10', 'Unknow'),
(100, 'fx100', '0', '651860', '2015-03-10', 'Unknow'),
(101, 'fx101', '0', '7150730', '2015-03-11', 'Unknow'),
(102, 'fx102', '0', '8567496', '2015-03-11', 'Unknow'),
(103, 'fx103', '0', '8567587', '2015-03-11', 'Unknow'),
(104, 'fx104', '0', '8567609', '2015-03-11', 'Unknow'),
(105, 'fx105', '0', '8567696', '2015-03-11', 'Unknow'),
(106, 'fx106', '0', '652555', '2015-03-12', 'Unknow'),
(107, 'fx107', '0', '652791', '2015-03-12', 'Unknow'),
(108, 'fx108', '0', '8568239', '2015-03-13', 'Unknow'),
(109, 'fx109', '0', '7151376', '2015-03-13', 'Unknow'),
(110, 'fx110', '0', '817407', '2015-03-13', 'Unknow'),
(111, 'fx111', '0', '10506113', '2015-03-13', 'Unknow'),
(112, 'fx112', '0', '652798', '2015-03-13', 'Unknow'),
(113, 'fx113', '0', '7151394', '2015-03-13', 'Unknow'),
(114, 'fx114', '0', '8568300', '2015-03-14', 'Unknow'),
(115, 'fx115', '0', '652842', '2015-03-14', 'Unknow'),
(116, 'fx116', '0', '10506171', '2015-03-14', 'Unknow'),
(117, 'fx117', '0', '10506184', '2015-03-14', 'Unknow'),
(118, 'fx118', '0', '10506190', '2015-03-14', 'Unknow'),
(119, 'fx119', '0', '7151481', '2015-03-14', 'Unknow'),
(120, 'fx120', '0', '7151528', '2015-03-14', 'Unknow'),
(121, 'fx121', '0', '652940', '2015-03-14', 'Unknow'),
(122, 'fx122', '0', '8568399', '2015-03-14', 'Unknow'),
(123, 'fx123', '0', '652958', '2015-03-14', 'Unknow'),
(124, 'fx124', '0', '8568406', '2015-03-15', 'Unknow'),
(125, 'fx125', '0', '7151586', '2015-03-15', 'Unknow'),
(126, 'fx126', '0', '7151599', '2015-03-15', 'Unknow'),
(127, 'fx127', '0', '8568448', '2015-03-15', 'Unknow'),
(128, 'fx128', '0', '8568515', '2015-03-15', 'Unknow'),
(129, 'fx129', '0', '653087', '2015-03-15', 'Unknow'),
(130, 'fx130', '0', '817487', '2015-03-16', 'Unknow'),
(131, 'fx131', '0', '8568632', '2015-03-16', 'Unknow'),
(132, 'fx132', '0', '10506517', '2015-03-16', 'Unknow'),
(133, 'fx133', '0', '8568697', '2015-03-16', 'Unknow'),
(134, 'fx134', '0', '7151885', '2015-03-16', 'Unknow'),
(135, 'fx135', '0', '7151897', '2015-03-16', 'Unknow'),
(136, 'fx136', '0', '10506595', '2015-03-16', 'Unknow'),
(137, 'fx137', '0', '7151936', '2015-03-16', 'Unknow'),
(138, 'fx138', '0', '653367', '2015-03-17', 'Unknow'),
(139, 'fx139', '0', '7151980', '2015-03-17', 'Unknow'),
(140, 'fx140', '0', '817515', '2015-03-17', 'Unknow'),
(141, 'fx141', '0', '7151993', '2015-03-17', 'Unknow'),
(142, 'fx142', '0', '7152006', '2015-03-17', 'Unknow');

-- --------------------------------------------------------

--
-- Table structure for table `Training`
--

CREATE TABLE IF NOT EXISTS `Training` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `topic` varchar(128) CHARACTER SET utf8 NOT NULL,
  `detail` text CHARACTER SET utf8,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `max` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `videoUrl` text CHARACTER SET utf8,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Training_Detail`
--

CREATE TABLE IF NOT EXISTS `Training_Detail` (
  `training_id` int(5) NOT NULL,
  `member_id` int(11) NOT NULL,
  `joinDate` datetime NOT NULL,
  PRIMARY KEY (`training_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
