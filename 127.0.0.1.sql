-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2013 at 02:42 PM
-- Server version: 5.1.68-community-log
-- PHP Version: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inno_tree`
--
CREATE DATABASE `inno_tree` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inno_tree`;

-- --------------------------------------------------------

--
-- Table structure for table `trees`
--

CREATE TABLE IF NOT EXISTS `trees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_parent` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `trees`
--

INSERT INTO `trees` (`id`, `parent_id`, `title`, `name`) VALUES
(1, NULL, '', 'THE GRANDPA'),
(2, 1, '', 'a'),
(3, 1, '', 'a'),
(4, 3, '', 'a'),
(5, 4, '', 'ab'),
(6, 3, '', 'ab'),
(7, 2, '', 'a'),
(9, 5, '', 'aa'),
(10, 3, 'something', 'test'),
(12, 1, '1111', 'Showel'),
(13, 12, '', 'something'),
(14, 12, '', 'something'),
(18, 1, '', '&#1055;&#1088;&#1086;&#1076;&#1091;&#1082;&#1090;'),
(21, 2, '', 'bcd'),
(22, NULL, '', 'THE GRANDMA'),
(23, 22, '', 'New branch'),
(24, NULL, '', 'THE UNCLE'),
(25, 24, '', 'Test');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trees`
--
ALTER TABLE `trees`
  ADD CONSTRAINT `trees_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `trees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
