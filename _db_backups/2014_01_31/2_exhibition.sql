-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 07:17 PM
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
-- Table structure for table `exhibition`
--

CREATE TABLE IF NOT EXISTS `exhibition` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE  `exhibition` CHANGE  `id`  `id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

ALTER TABLE  `project` ADD  `exhibition_id` INT NULL ,
ADD INDEX (  `exhibition_id` ) ;

ALTER TABLE  `project` ADD FOREIGN KEY (  `exhibition_id` ) REFERENCES  `exhibition` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;




INSERT INTO `exhibition` (`id`, `name`) VALUES (NULL, 'اسوان'), (NULL, 'الاقصر'), (NULL, 'قنا'), (NULL, 'المنيا'), (NULL, 'سوهاج'), (NULL, 'الفيوم'), (NULL, 'الاسماعيلية'), (NULL, 'الاسكندرية'), (NULL, 'القليوبية'), (NULL, 'الشرقية'), (NULL, 'الغربية'), (NULL, 'الدقهلية'), (NULL, 'كفر الشيخ'), (NULL, 'الجامعه الامريكية'), (NULL, 'مدرسة المتفوقين'), (NULL, 'القاهرة'), (NULL, 'الجيزة'), (NULL, 'MSA جامعه'), (NULL, 'مكتبة الاسكندرية');

ALTER TABLE  `project` ADD  `submission_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;