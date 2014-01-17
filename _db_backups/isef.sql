-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2014 at 01:17 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `isef`
--

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(10) unsigned NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `twitter` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `keywords` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `sitemap` text NOT NULL,
  `receiver_mail_1` varchar(300) NOT NULL,
  `receiver_mail_2` varchar(300) NOT NULL,
  `receiver_mail_3` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `facebook`, `twitter`, `email`, `keywords`, `password`, `sitemap`, `receiver_mail_1`, `receiver_mail_2`, `receiver_mail_3`) VALUES
(1, 'ss', 'sss', 'info@elsheikhgroup.com', 'aaaaaaaaaarrrrrrrrrr', 'au1234', 'https://maps.google.com/maps?q=القاهرة،+مصر&hl=ar&ie=UTF8&sll=30.058211,31.493983&sspn=0.018832,0.038581&oq=cairo+&hnear;=القاهرة،+محافظة+القاهرة‬،+مصر&t=m&hq;=&ll=30.059437,31.48922&spn=0.026446,0.049181&z=14&iwloc=A&output=embed', 'anashatali@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `body` text,
  `contenttype_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `header_menu` int(1) NOT NULL DEFAULT '0',
  `content_order` int(10) DEFAULT '1',
  `url` varchar(200) DEFAULT NULL,
  `parent` int(11) unsigned DEFAULT NULL,
  `file_id` int(11) unsigned DEFAULT NULL,
  `date` varchar(150) NOT NULL,
  `view` char(100) NOT NULL DEFAULT '',
  `language_id` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `content_type` (`contenttype_id`),
  KEY `parent` (`parent`),
  KEY `image` (`file_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=89 ;

--
-- Dumping data for table `contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE IF NOT EXISTS `contenttypes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contenttypes`
--


-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `content_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_file_id` (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=141 ;

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `default` int(2) NOT NULL DEFAULT '0',
  `code` varchar(3) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `default`, `code`) VALUES
(1, 'English', 1, 'en'),
(2, 'Arabic', 0, 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subscribers`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_4` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_5` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_7` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_5` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
