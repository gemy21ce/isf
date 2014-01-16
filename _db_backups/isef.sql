-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2014 at 09:57 PM
-- Server version: 5.1.43-community
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elsheikh`
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

INSERT INTO `contents` (`id`, `title`, `body`, `contenttype_id`, `name`, `status`, `header_menu`, `content_order`, `url`, `parent`, `file_id`, `date`, `view`, `language_id`) VALUES
(7, 'Wellcome', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n', 1, 'HOME', 'ACTIVE', 1, 1, 'home/index/', NULL, NULL, '', '', 1),
(8, 'Contact Us', '<p>\r\n 24 Zayed St., Industrial Zone, Abassia, Cairo, Egypt.<br />\r\n Tel.: (202) 2485 9001<br />\r\n Mob.: +2 0128 11000 18<br />\r\n Fax.: 19009<br />\r\n Mail.: info@almoasher.net</p>\r\n', 2, 'CONTACT US', 'ACTIVE', 1, 7, 'home/contactus/', NULL, NULL, '', '', 1),
(12, 'http://beta.city-square.net/home/aboutus/6', '<p>\r\n It is our aim to provide you with a location that will inspire feelings not only of security but also of respite from the grind of everyday life</p>\r\n', 1, 'slide2', 'ACTIVE', 0, 1, 'home/index/', 7, NULL, '', '', 1),
(13, 'News', '', 4, 'LATEST NEWS', 'ACTIVE', 1, 4, 'home/news/', NULL, NULL, '', '', 1),
(14, 'ssssssssssssss', '<p>\r\n We at City Square are delighted to announce the launch of our website. Now you can stay tuned to our latest events and announcements. You can also follow us on facebook to get the most recent updates. Don&#39;t miss out, City Square is the place to be!</p>\r\n', 4, 'INFOSEC ASIA 2012', 'ACTIVE', 0, 2, 'home/single_news/', 13, NULL, '21-22 March, 2012', 'home', 1),
(16, 'http://beta.city-square.net/home/facilities/17', '<p>\r\n Our facilities were especially selected and designed to meet all the desired comfort and safety from our guests and staff alike</p>\r\n', 1, 'slide 3', 'ACTIVE', 0, 1, 'home/index/', 7, NULL, '', '', 1),
(20, 'Visit the exhibition for someyyyyyyyyyyyyyyyyyy', '<p>\r\n <span 3036="" and="" at="" background-color:="" booth="" color:="" exhibition="" find="" font-family:="" font-size:="" for="" from="" information="" some="" souvenirs="" span="" the="" us="" valuable="" vendors="" visit="">Visit the exhibition for some valuable information from vendors and souvenirs from Softline! Find us at Booth #3036 Visit the exhibition for some valuable information from vendors and souvenirs</span></p>\r\n', 4, 'INFOSEC ASIA 2012', 'ACTIVE', 0, 3, 'home/single_news/', 13, NULL, '21-22 March, 2012', 'news', 1),
(23, 'slider 4', '<p>\r\n for serving our clients</p>\r\n', 1, 'slider 4', 'ACTIVE', 0, 1, 'home/index/', 7, NULL, '', '', 1),
(24, 'Middle East & Africa Monitor - What Do You Get?', '<p>\n Middle Eastern and African market data, analysis and forecasts from Business Monitor International, the trusted source for business information and intelligence on global emerging markets. Middle East &amp; Africa Monitor provides political risk analysis, economic forecasts and business information for trade &amp; industry across the Middle Eastern and African economies of the East Med, The Gulf, North Africa, Southern Africa, East &amp; Central Africa and West Africa. Middle East &amp; Africa Monitor is available as six printed, regional, monthly newsletters. Subscribers also receive password access to a searchable 24-month archive of Middle East &amp; Africa Monitor articles and data online plus the ability to download PDFs of current and back issues of Middle East &amp; Africa Monitor. East Med - Egypt, Israel, Jordan, Lebanon, Syria and Turkey The Gulf - Bahrain, Iran, Iraq, Kuwait, Oman, Saudi Arabia, United Arab Emirates, Yemen and Qatar North Africa - Algeria, Libya, Morocco and Tunisia Southern Africa - Angola, Botswana, Madagascar, Mauritius, Mozambique, Namibia, South Africa, Zambia and Zimbabwe East &amp; Central Africa - Congo, the DRC, Ethiopia, Kenya, Rwanda, Sudan, Tanzania and Uganda West Africa - Cameroon, C&ocirc;te d&#39;Ivoire, Gabon, Ghana, Nigeria and Senegal</p>\n', 4, 'Middle East & Africa Monitor - What Do You Get?', 'ACTIVE', 0, 1, 'home/single_news/', 13, NULL, '21-22 Jan, 2013', 'news', 1),
(25, 'mmmmmmm', '<p>\r\n mmmmmmmmmmmm</p>\r\n', 4, 'mmmmmmmmmmmm', 'ACTIVE', 0, 9, 'home/single_news/', 13, NULL, 'mmmmmmmmm', 'news', 1),
(27, 'Featured Projects', '', 6, 'PROJECTS', 'ACTIVE', 1, 6, 'home/projects/', NULL, NULL, '', '', 1),
(47, 'pro1', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n', 6, 'pro1', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(48, 'pro2', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n', 6, 'pro2', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(49, 'pro3', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n', 6, 'pro3', 'ACTIVE', 0, 1, 'home/investors_center/', 27, NULL, '', '', 1),
(50, 'xxxxxxxxxxxx', '<p>\r\n xxxxxxxxxxx</p>\r\n', 4, 'xxxxxxxxxxxxxxxxxxxxxxx', 'ACTIVE', 0, 4, 'home/single_news/', 13, NULL, '', '', 1),
(51, 'ffffffffffffff', '<p>\r\n ffffffffffffff</p>\r\n', 4, 'fffffffffffffffffffffffff', 'ACTIVE', 0, 5, 'home/single_news/', 13, NULL, '', '', 1),
(52, 'hhhhhhhhhhhhhhhhh', '<p>\r\n hhhhhhhhhh</p>\r\n', 4, 'hhhhhhhhhhhhhhhhhhhh', 'ACTIVE', 0, 6, 'home/single_news/', 13, NULL, '', '', 1),
(53, 'gggggggggggggggg', '<p>\r\n ggggggggggggggggg</p>\r\n', 4, 'ggggggggggggggggg', 'ACTIVE', 0, 7, 'home/single_news/', 13, NULL, '', '', 1),
(54, 'uuuuuuuuuuuuuuuu', '<p>\r\n uuuuuuuuuuuuu</p>\r\n', 4, 'uuuuuuuuuuuuuuuuuuuuuuu', 'ACTIVE', 0, 8, 'home/single_news/', 13, NULL, '', '', 1),
(55, 'nnnnnnnnnnnnnnnnnnnn', '<p>\r\n nnnnnnnnnnnn</p>\r\n', 4, 'nnnnnnnnnnnnn', 'ACTIVE', 0, 1, 'home/single_news/', 13, NULL, '', '', 1),
(56, 'pro4', '<p>\r\n pro4</p>\r\n', 6, 'pro4', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(57, 'pro5', '<p>\r\n pro5</p>\r\n', 6, 'pro5', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(58, 'pro6', '<p>\r\n pro6</p>\r\n', 6, 'pro6', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(59, 'pro7', '<p>\r\n pro7</p>\r\n', 6, 'pro7', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(60, 'pro8', '<p>\r\n pro8</p>\r\n', 6, 'pro8', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(61, 'pro8', '<p>\r\n pro8</p>\r\n', 6, 'pro9', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(62, 'pro10', '<p>\r\n pro10</p>\r\n', 6, 'pro10', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(63, 'pro10', '<p>\r\n pro10</p>\r\n', 6, 'pro11', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(64, 'pro12', '<p>\r\n pro12</p>\r\n', 6, 'pro12', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(65, 'pro13', '<p>\r\n pro13</p>\r\n', 6, 'pro13', 'ACTIVE', 0, 1, 'home/project/', 27, NULL, '', '', 1),
(66, 'Profile', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n<p>\r\n Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n<p>\r\n The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>\r\n Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n<p>\r\n The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 7, 'PROFILE', 'ACTIVE', 1, 2, 'home/profile/', NULL, NULL, '', '', 1),
(67, 'مرحبا', '<p>\r\n الرئيسيه</p>\r\n', 1, 'الرئيسيه', 'ACTIVE', 1, 8, 'home/index/', NULL, NULL, '', '', 2),
(68, 'الاول', '<p>\r\n الاول</p>\r\n', 1, 'الاول', 'ACTIVE', 0, 1, 'home/index/', 67, NULL, '', '', 2),
(69, 'الاخبار', '<p>\r\n الاخبار</p>\r\n', 4, 'الاخبار', 'ACTIVE', 1, 9, 'home/news/', NULL, NULL, '', '', 2),
(70, 'الخبر الاول', '<p>\r\n الخبر الاول</p>\r\n', 4, 'الخبر الاول', 'ACTIVE', 0, 1, 'home/single_news/', 69, NULL, '', '', 2),
(71, 'المشاريع', '<p>\r\n المشاريع</p>\r\n', 6, 'المشاريع', 'ACTIVE', 1, 10, 'home/projects/', NULL, NULL, '', '', 2),
(72, 'م1', '<p>\r\n م1</p>\r\n', 6, 'م1', 'ACTIVE', 0, 1, 'home/project/', 71, NULL, '', '', 2),
(73, 'SERVICES', '<p>\r\n <span  Consolas, ''Lucida Console'', monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);">SERVICES</span></p>\r\n', 5, 'SERVICES', 'ACTIVE', 1, 3, 'home/services/', NULL, NULL, '', '', 1),
(74, 'service1', '<p>\r\n <span  rgb(255, 255, 255); color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</span>service1</p>\r\n', 5, 'service1', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(75, 'service2', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service2', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(76, 'service3', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service3', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(77, 'service4', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service4', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(78, 'service5', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service5', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(79, 'service6', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service6', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(80, 'service7', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service7', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(81, 'service8', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service8', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(82, 'service9', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. It has survived not only five centuries, but also the leap into</p>\r\n', 5, 'service9', 'ACTIVE', 0, 1, 'home/services/', 73, NULL, '', '', 1),
(83, 'CLIENTS', '', 8, 'CLIENTS', 'ACTIVE', 1, 5, 'home/clients/', NULL, NULL, '', '', 1),
(84, 'http://www.google.com', '', 8, 'Company Name', 'ACTIVE', 0, 1, 'home/clients/', 83, NULL, '', '', 1),
(85, 'http://www.yahoo.com', '', 8, 'Company Name2', 'ACTIVE', 0, 1, 'home/clients/', 83, NULL, '', '', 1),
(86, 'http://beta.city-square.net/', '', 8, 'Company Name3', 'ACTIVE', 0, 1, 'home/clients/', 83, NULL, '', '', 1),
(87, 'اتصل بنا', '<p>\r\n اتصل بنا</p>\r\n', 2, 'اتصل بنا', 'ACTIVE', 1, 11, 'home/contactus/', NULL, NULL, '', '', 2),
(88, 'للللللللللللللللل', '<p>\r\n &lt;span rgb(73,=&quot;&quot; 73,=&quot;&quot; 73);=&quot;&quot; font-family:=&quot;&quot; tahoma,=&quot;&quot; geneva,=&quot;&quot; sans-serif;=&quot;&quot; font-size:=&quot;&quot; 14px;=&quot;&quot; line-height:=&quot;&quot; 18px;=&quot;&quot; text-align:=&quot;&quot; right;=&quot;&quot; background-color:=&quot;&quot; rgb(255,=&quot;&quot; 255,=&quot;&quot; 255);&quot;=&quot;&quot;&gt;لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع.</p>\r\n', 4, 'ببببببببببب', 'ACTIVE', 0, 1, 'home/single_news/', 69, NULL, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE IF NOT EXISTS `contenttypes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `type`) VALUES
(1, 'Home'),
(2, 'Contact Us'),
(3, 'About Us'),
(4, 'News'),
(5, 'Service'),
(6, 'Projects'),
(7, 'Profile'),
(8, 'Clients');

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

INSERT INTO `files` (`id`, `name`, `description`, `path`, `content_id`) VALUES
(29, 'image-1.jpg', NULL, 'images/29/', 14),
(30, 'image-2.jpg', NULL, 'images/30/', 20),
(62, 'contact-us.jpg', NULL, 'images/62/', 8),
(69, 'Lighthouse.jpg', NULL, 'images/69/', 25),
(72, '', NULL, 'images/72/', NULL),
(81, 'news-img.jpg', NULL, 'images/81/', 24),
(98, 'teeba-2.jpg', NULL, 'images/98/', 16),
(99, 'teeba-3.jpg', NULL, 'images/99/', 12),
(100, 'teeba-4.jpg', NULL, 'images/100/', 23),
(103, 'Chrysanthemum.jpg', NULL, 'images/103/', 47),
(104, 'Penguins.jpg', NULL, 'images/104/', 48),
(105, 'Tulips.jpg', NULL, 'images/105/', 49),
(106, 'Lighthouse.jpg', NULL, 'images/106/', 50),
(107, 'Jellyfish.jpg', NULL, 'images/107/', 51),
(108, 'Penguins.jpg', NULL, 'images/108/', 52),
(109, 'Koala.jpg', NULL, 'images/109/', 53),
(110, 'Desert.jpg', NULL, 'images/110/', 54),
(111, 'Hydrangeas.jpg', NULL, 'images/111/', 55),
(112, 'Desert.jpg', NULL, 'images/112/', 14),
(113, 'Penguins.jpg', NULL, 'images/113/', 14),
(114, 'Penguins.jpg', NULL, 'images/114/', 56),
(115, 'Jellyfish.jpg', NULL, 'images/115/', 57),
(116, 'Koala.jpg', NULL, 'images/116/', 58),
(117, 'Desert.jpg', NULL, 'images/117/', 59),
(118, 'Hydrangeas.jpg', NULL, 'images/118/', 60),
(119, 'Chrysanthemum.jpg', NULL, 'images/119/', 61),
(120, 'Lighthouse.jpg', NULL, 'images/120/', 62),
(121, 'Lighthouse.jpg', NULL, 'images/121/', 63),
(122, 'Jellyfish.jpg', NULL, 'images/122/', 64),
(123, 'Jellyfish.jpg', NULL, 'images/123/', 65),
(124, 'teeba-4.jpg', NULL, 'images/124/', 66),
(125, 'Lighthouse.jpg', NULL, 'images/125/', 68),
(126, 'Lighthouse.jpg', NULL, 'images/126/', 70),
(127, 'Penguins.jpg', NULL, 'images/127/', 72),
(128, 'service-img.jpg', NULL, 'images/128/', 74),
(129, 'news-home.jpg', NULL, 'images/129/', 75),
(130, 'clint-logo.jpg', NULL, 'images/130/', 76),
(131, 'project-img.jpg', NULL, 'images/131/', 77),
(132, 'Lighthouse.jpg', NULL, 'images/132/', 78),
(133, 'Tulips.jpg', NULL, 'images/133/', 79),
(134, 'Lighthouse.jpg', NULL, 'images/134/', 80),
(135, 'Hydrangeas.jpg', NULL, 'images/135/', 81),
(136, 'Jellyfish.jpg', NULL, 'images/136/', 82),
(137, 'clint-logo.jpg', NULL, 'images/137/', 84),
(138, 'Chrysanthemum.jpg', NULL, 'images/138/', 85),
(139, 'Penguins.jpg', NULL, 'images/139/', 86),
(140, 'Desert.jpg', NULL, 'images/140/', 88);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(13, 'ahmed-egyled@hotmail.com'),
(22, 'ahmedsami@hotmail.com'),
(7, 'alhenedy@gmail.com'),
(9, 'casinocare@yahoo.com'),
(21, 'chicoegy@hotmail.com'),
(18, 'dinakhalifa@hotmail.com'),
(12, 'ealimali@hotmail.com'),
(26, 'gimmy164@hotmail.com'),
(23, 'karim.emam@yahoo.com'),
(24, 'louay.raafat@yahoo.com'),
(16, 'mfoda@hotmail.com'),
(25, 'mr.times@yahoo.com'),
(15, 'paninobakery@yahoo.com'),
(20, 'pierrenayrouz@gmail.com'),
(10, 'salahh2@msn.com'),
(5, 'shadybahaa@hotmail.com'),
(19, 'sherifgamaluk@gmail.com'),
(6, 'shixo.osos@gmail.com'),
(8, 'shrfarouk@gmail.com'),
(11, 'Wael.elhatow@gmail.com'),
(14, 'walidsliem@yahoo.com'),
(17, 'yasmineldomiaty@hotmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'ahmed', 't4toto@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'shady', 'smbahaa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
