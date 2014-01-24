-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2014 at 04:54 PM
-- Server version: 5.5.35-0ubuntu0.13.10.1
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `description`) VALUES
(1, 'Animal Sciences (AS)', 'AS', 'Study of animals and animal life, including their structure, function, life history, interactions, classification, and evolution.'),
(2, 'Behavioral and Social Sciences (BE)', 'BE', 'The science or study of the thought processes and behavior of humans and other animals in their interactions with the environment studied through observational and experimental methods.'),
(3, 'Biochemistry (BI)', 'BI', 'The study of chemical substances, interactions, and processes relevant to living organisms.'),
(4, 'Cellular and Molecular Biology (CB)', 'CB', 'The study of the structure and formation of cells.'),
(5, 'Chemistry (CH)', 'CH', 'The science of the composition, structure, properties, and reactions of matter.'),
(6, 'Computer Science (CS)', 'CS', 'The study of information processes, the structures and procedures that represent processes, and their implementation in information processing systems. It includes systems analysis and design, application and system software design, programming, and datacenter operations.'),
(7, 'Earth and Planetary Science (EA)', 'EA', 'The study of sciences related to the planet Earth (Geology, minerology, physiography, oceanography, meteorology, climatology, speleology, sesismology, geography, atmospheric sciences, etc.)'),
(8, 'Engineering: Electrical and Mechanical (EE)', 'EE', 'The application of scientific and mathematical principles to practical ends such as the design, manufacture, and operation of efficient and economical structures, processes, and systems.'),
(9, 'Engineering: Materials and Bioengineering (EN)', 'EN', 'The application of scientific and mathematical principles to practical ends such as the design, manufacture, and operation of efficient and economical machines and systems.'),
(10, 'Energy and Transportation (ET)', 'ET', 'The study of renewable energy sources, energy efficiency, clean transport, and alternative fuels.'),
(11, 'Environmental Management (EM)', 'EM', 'The application of engineering principals to solve practical problems of managing mans'' interaction with the environment with the goal to maintain and improve the state of an environmental resource affected by human activities.'),
(12, 'Environmental Sciences (EV)', 'EV', 'The analysis of existing conditions of the environment.'),
(13, 'Mathematical Sciences (MA)', 'MA', 'The study of the measurement, properties, and relationships of quantities and sets, using numbers and symbols. The deductive study of numbers, geometry, and various abstract constructs, or structures.'),
(14, 'Medicine and Health Sciences (ME)', 'ME', 'The science of diagnosing, treating, or preventing disease and other damage to the body or mind.'),
(15, 'Microbiology (MI)', 'MI', 'The study of microorganisms, including bacteria, viruses, fungi, and pathogens.'),
(16, 'Physics and Astronomy (PH)', 'PH', 'Physics is the science of matter and energy and of interactions between the two. Astronomy is the study of anything in the universe beyond the Earth.'),
(17, 'Plant Sciences (PS)', 'PS', 'Study of plant life, including their structure and function, life history, growth, interactions with other plants and animals, classification, and evolution.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
