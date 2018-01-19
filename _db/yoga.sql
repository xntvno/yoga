-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2018 at 11:04 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course-id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `course-id`, `name`, `phone`, `email`, `comment`) VALUES
(23, 11, 'James Bond', '551333444', 'james.bond@007.com', 'Bond, James Bond'),
(22, 10, 'giorgi khintibidze', '777510991', 'george.khintibidze@gmail.com', 'Some comment here');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` set('30','60') COLLATE utf8_unicode_ci DEFAULT NULL,
  `full` int(11) DEFAULT '0',
  `maximum` int(11) NOT NULL DEFAULT '0',
  `applicants` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `unix` int(11) NOT NULL,
  `attach` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `instructor`, `style`, `duration`, `full`, `maximum`, `applicants`, `date`, `time`, `unix`, `attach`) VALUES
(10, 'Giorgi', 'Hatha', '30', 0, 2, 1, '2018-01-26', '15:02:00', 1516975980, '2.jpg'),
(9, 'Bond', 'Ashtanga', '30', 1, 2, 2, '2018-01-09', '15:01:00', 1516976980, '3.jpg'),
(11, 'Clark', 'Vinyasa', '60', 0, 2, 1, '2018-01-31', '06:26:00', 1516977980, '4.jpg'),
(16, 'Bruce', 'Ashtanga', '60', 1, 2, 2, '2018-01-30', '16:05:00', 1516978980, 'b765e52067f054998e421f3c57d8ff99-high.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_session` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `session_time` int(11) NOT NULL,
  `private_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_pass`, `user_session`, `session_time`, `private_time`) VALUES
(2, 'admin', '7e1a727deb7490c00afc417c7289660c505858d0', '9ff15d0227a7fccf28867668b45792d3cfb8af01', 1516387135, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
