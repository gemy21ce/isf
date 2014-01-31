-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 07:38 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `isf`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, 'الصف الخامس او السادس الابتدائي'),
(2, 'الصف الاول الاعدادي');


INSERT INTO `isf`.`grade` (`id`, `name`) VALUES (NULL, 'الصف الثاني الاعدادي'), (NULL, 'الصف الثالث الاعدادي'), (NULL, 'الصف الاول الثانوي'), (NULL, 'الصف الثاني الثانوي'), (NULL, 'الصف الثالث الثانوي'), (NULL, 'الصف الرابع الثانوي - خاص بالتعليم الفني'), (NULL, 'الصف الخامس الثانوي - خاص بالتعليم الفني');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE  `project` CHANGE  `grade`  `grade_id` INT( 11 ) NULL DEFAULT NULL ;

ALTER TABLE  `project` ADD INDEX (  `grade_id` ) ;


ALTER TABLE  `project` ADD FOREIGN KEY (  `grade_id` ) REFERENCES  `isf`.`grade` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;