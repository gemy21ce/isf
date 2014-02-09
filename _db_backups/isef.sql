-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2014 at 09:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `isef`
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
(1, 'ss', 'sss', 'admin@divineds.com', 'aaaaaaaaaarrrrrrrrrr', 'au1234', '', 'anashatali@gmail.com', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
-- Table structure for table `exhibition`
--

CREATE TABLE IF NOT EXISTS `exhibition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`id`, `name`) VALUES
(1, 'اسوان'),
(2, 'الاقصر'),
(3, 'قنا'),
(4, 'المنيا'),
(5, 'سوهاج'),
(6, 'الفيوم'),
(7, 'الاسماعيلية'),
(8, 'الاسكندرية'),
(9, 'القليوبية'),
(10, 'الشرقية'),
(11, 'الغربية'),
(12, 'الدقهلية'),
(13, 'كفر الشيخ'),
(14, 'الجامعه الامريكية'),
(15, 'مدرسة المتفوقين'),
(16, 'القاهرة'),
(17, 'الجيزة'),
(18, 'MSA جامعه'),
(19, 'مكتبة الاسكندرية');

-- --------------------------------------------------------

--
-- Table structure for table `experimentation_location`
--

CREATE TABLE IF NOT EXISTS `experimentation_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `experimentation_location`
--

INSERT INTO `experimentation_location` (`id`, `name`) VALUES
(1, 'Research Institution'),
(2, 'School'),
(3, 'Field'),
(4, 'Home'),
(5, 'Other');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, 'الصف الخامس او السادس الابتدائي'),
(2, 'الصف الاول الاعدادي'),
(3, 'الصف الثاني الاعدادي'),
(4, 'الصف الثالث الاعدادي'),
(5, 'الصف الاول الثانوي'),
(6, 'الصف الثاني الثانوي'),
(7, 'الصف الثالث الثانوي'),
(8, 'الصف الرابع الثانوي - خاص بالتعليم الفني'),
(9, 'الصف الخامس الثانوي - خاص بالتعليم الفني');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE IF NOT EXISTS `judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`),
  KEY `sub_category` (`subcategory_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=35 ;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`id`, `name`, `user_id`, `category_id`, `subcategory_id`) VALUES
(1, 'judge0', 7, 1, 1),
(18, 'judge1', 9, 1, 1),
(19, 'judge2', 10, 1, 1),
(20, 'judge3', 11, 1, 1),
(33, 'judge5', 14, 2, NULL),
(34, 'judge6', 15, 2, NULL);

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
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_1_id` int(11) NOT NULL,
  `student_2_id` int(11) DEFAULT NULL,
  `student_3_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `plan` text COLLATE utf8_bin,
  `assumptions` text COLLATE utf8_bin,
  `description` text COLLATE utf8_bin,
  `per_researchs_results` text COLLATE utf8_bin,
  `research_resources` text COLLATE utf8_bin,
  `num_of_students` tinyint(2) NOT NULL DEFAULT '1',
  `adult_sponsor_name` varchar(150) COLLATE utf8_bin NOT NULL,
  `adult_sponsor_name_ar` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_phone` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_email` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_gov` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_profession` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_specialist` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_work_location` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_educational_administration` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `adult_sponsor_birthday` date DEFAULT NULL,
  `adult_sponsor_gender` tinyint(2) NOT NULL DEFAULT '1',
  `continuation_project` tinyint(4) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `exhibition_id` int(11) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sub_category_id` (`sub_category_id`),
  KEY `category_id` (`category_id`),
  KEY `exhibition_id` (`exhibition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `student_1_id`, `student_2_id`, `student_3_id`, `name`, `adult_sponsor_name`, `adult_sponsor_name_ar`, `adult_sponsor_phone`, `adult_sponsor_email`, `adult_sponsor_gov`, `adult_sponsor_profession`, `adult_sponsor_specialist`, `adult_sponsor_work_location`, `adult_sponsor_educational_administration`, `adult_sponsor_birthday`, `adult_sponsor_gender`, `continuation_project`, `start_date`, `end_date`, `category_id`, `sub_category_id`, `plan`, `description`, `per_researchs_results`, `assumptions`, `research_resources`, `num_of_students`, `exhibition_id`, `submission_date`) VALUES
(2, 28, 29, 30, 'جهاز تحلية مياه البحر المالحة', 'Rafat Abdelmogod Mohamed Ahmed', 'رأفت عبد الموجود محمد احمد', '1123865856', 'Rafat263@yahoo.com', 'الاقصر ', 'معلم اول علوم', 'علوم', 'مدرسة الشغب الاعدادية الحديثة', 'ادارة اسنا التعليمية', '1976-03-26', 1, 0, '0000-00-00', NULL, 12, NULL, 'تطوير الجهاز ليصبح فى متناول الجميع وباقل تكلفة ممكنة', 'اختراع جهاز لتحلية مياه البحر المالحة حتى يتثنى للمقيمين بجانب البحار المالحة من الاستفادة من هذه المياه للاغراض المختلفة ولايجاد بديل للمياه العذبة', 'الحصول على مياه عزبة ونظيفة', 'استهلاك المياه الزائد', 'الكتاب المدرسى الخاص بوزارة التربية والتعليم', 3, NULL, '2014-01-26 22:00:00'),
(3, 31, NULL, NULL, 'ورد النيل', 'fadehahmedfadelahmed', 'فضل احمد فضل احمد', '1012895128', 'luoxr_man22@yahoo.com', 'الاقصر ', 'اخصائى تكنولوجيا تعليم', 'تكنولجيا التعليم', 'ادارة الاقصر التعليمية', 'ادارة ارمنت التعليمية', '1987-02-25', 1, 0, '0000-00-00', NULL, 12, NULL, 'الخطط المستقبلية هى اقامة مشروع مساحتة 600م مربع منها 20×15م منطقة مكشوفة لتجفيف وتشوين المواد الخام', 'كيف يمكن تحويل كلا من (ورد النيل -مخلفات الموز- مصاص القصب)الى علف للحيوان؟\nيمكننا تحويل هذه المواد الى علف عن طريق اقامة مشروع انتاج الاعلاف', 'نتائج البحث قلة اعداد ورد النيل من ميا نهر النيل وتحويلها الى اعلاف واما بالنسبة الى مخلفات الموز زمصاص القصب فاسوف تدخل مع ورد النيل فى صناعة العلف', 'اتوقع انه اذا اكتمل مشروع المصنع الخاص بـالاعلاف سوف تقل كمية ورد النيل ,مخلفات الموز ومصاص القصب ويتم تحويلها الى اعلاف صحية للحيوان وايضا سوف تزداد الثروة السمكية فى مياه النيل ولن تقل حصة مصر من مياه النيل', 'موقع وزارة الرى/ تعهد الوزير بازالة كافة البقعوجذور ورد النيلالتى ظهرت مؤخرا فى نهر النيل\nزيارة بعض الاماكن التى يوجد بها ورد النيل / بعض الفلاحين يطعمون ورد النيل الى حيواناتهم', 1, NULL, '2014-01-26 22:00:00'),
(4, 32, 33, NULL, 'سيراميك ينظف نفسه بنفسه', 'manal abdel latif mohamed abdel rahman', 'منال عبد اللطيف محمد عبد الرحمن', '1140204487', 'manalelkhatip@yahoo.com', 'اسوان ', 'معلم خبير', 'بيولوجى', 'نجيب محفوظ لغات فرنسى', 'اسوان', '1965-08-31', 2, 0, '0000-00-00', NULL, 5, NULL, 'سيراميك ينظف نفسه بنفسه عن طريق اى ضوء\nعدم وجود خطر من المواد الكيميائية على الاطفال \nعدم حدوث اى حساسيه من المواد الكيميائية\nتوافر السيراميك لجميع المستويات بتكلفة اقل', 'يؤدى استخدام المنظفات الى تلوث البيئى  . ووجود البكتريا والفطريات  على السيراميك يجلب  العدوى والتصاق الحشرات وعدم تحليل الملوثات بشكل طبيعى فى الهواء و الحاجة الى التنظيف المستمر .وتم تصميم هذه الدراسة لمعرفة تأثير اشعاعات السراميك الضارة والحد منها مما لا شك فيه ان السيراميك يلعب دور اساسى فى المنزل . فمشكلة البحث هى التنظيف التلقائى للسيراميك . وهل مادة البلكينجتون اكتيف تتفاعل مع السيراميك ام لا .في هذه الدراسة تم اقتراح حلول للحد من مشكلة السيراميك باستخدام مادة اكسيد ميكروكرستالين التيتانيوم لاستجابة لضوء النهار وماده بلكينجتون اكتيف لتفصل الاقذار عن السيراميك وختاما اتضح من هذه الدراسة ان لم تعد المنظفات حلا لتلك المشكلة لما لها من آثار جانبية خطيرة إضافة لتكلفتها المرتفعة', '- استخدام مادة البلكينجتون اكتيف على الزجاج \n- اثبات انا الزجاج له القدرة على تدمير البكتريا والفطريات ومقاومة العدوى وطارد للحشرات\n-استجابة اكسيد ميكروكرستالين التيتانيوم لضوء النهار', 'ـ عدم حجب الرؤية بسبب مادة اكسيد ميكروكرستالين التيتانيوم \n- امتصاص اشعة الشمس \n- تفاعل مادة ثانى اكسيد التيتانيوم مع الماء\n- اضرار ثانى اكسيد التيتانيوم وصحة الانسان \n- التقليل من خطر السيراميك', 'الكتب العلميه : \nالموسوعة العلمية للكمياء\nتكنولوجيا المواد المتناهية فى الصغر   \nما هى تقنية النانو \n		مواقع الانترنت :\nwww.chemguide.co.uk    \nhttp://www.pilkingtonselfcleaningglass.co.uk/\nwww.norcotti.com/products/activ_pilk_activ.php\nابحاث \nد/ محمد عبد الرحمن الوكيل \nا.م.د / شهاب احمد زيدان الجبورى \n\n‏[1] W. Bolton, "Engineering Materials Technology", 3''ed. , Butterworth-\nHeinemann, Oxford, (1998)\n[2] W.Rayan and C.Radford," White Wares Production Testing and\nQuality Control", Pergamon Press, U.K (1987)\n[3] W.Gerhartz, "Ullmann''s Encyclopedia Of Industrial Chemistry",\nVerlagsgesellschaft , Germany,(1987),Vol.A7 & Vol.A6.\n[4] K. Othmer, "Encyclopedia Of Chemical Technology", 3''ed.,Vol.5, John\nwiley , U.S.A (1979)\n[5] J.H. She, J. of Materials Science, Vol.37,(2002)\n[6] M.W. Barsoum,"Fundamentals of Ceramics", Mc Graw – hill ,Singapore\n,(1997)\n[7] W. D. Kingery and H. R. Bowen and D. R. Uhlmann, "Introduction to\nCeramics", 2nd ed. (1976)\n[8] I. J. McColm,"Ceramic Science for Materials Technologists " , Leonard\nHill , New York , (1983)\n[9] F. H. Norton , "Elements of Ceramics", 2nd ed. , Addison – Wesley ,\nPhilippines,(1974)\n[10] W. D. Callister , " Materials Science and Engineering", 5th ed. , John\nWiley , U.S.A , (2000)\n[11] G. Y. Onoda , L. L. Hench , "Ceramic Processing Before Firing", John\nWiley and Sons ,U.S.A, (1978)\n[12] W. E. Worrall, "Ceramic Raw Materials", 2nd ed. ,Instiute of Ceramics ,\nLondon,(1982).', 2, NULL, '2014-01-27 22:00:00');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `project_experimentation_location`
--

CREATE TABLE IF NOT EXISTS `project_experimentation_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `experimentation_location_id` int(11) NOT NULL,
  `other_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`,`experimentation_location_id`),
  KEY `experimentation_location_id` (`experimentation_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_experimentation_location`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_working_sites`
--

CREATE TABLE IF NOT EXISTS `project_working_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_working_sites`
--


-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `slotnumber` int(11) NOT NULL,
  `eval_q_1` int(11) DEFAULT '0',
  `eval_q_2` int(11) DEFAULT '0',
  `eval_q_3` int(11) DEFAULT '0',
  `eval_q_4` int(11) DEFAULT '0',
  `eval_q_5` int(11) DEFAULT '0',
  `eval_q_6` int(11) DEFAULT '0',
  `eval_total` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `judge_id` (`judge_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `school` varchar(250) NOT NULL,
  `school_ar` varchar(250) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `gov` varchar(100) NOT NULL,
  `educational_administration` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `description`, `code`) VALUES
(1, 1, 'Animal Behavior', ' The study of animal activities, on the level of the intact organism or its neurological components. This includes rhythmic functions, learning, and intelligence, sensory preferences, and environmental effects on behaviors.', 'BEH'),
(2, 1, 'Development', 'The study of an organism from earliest stages through birth or hatching and into later life. This includes cellular and molecular aspects of development, regeneration, and environmental effects on development.', 'DEV'),
(3, 1, 'Ecology', 'The science of the interactions and relationships among animals and animals and plants with their environments.', 'ECO'),
(4, 1, 'Genetics', 'The study of organismic and population genetics.', 'GENE'),
(5, 1, 'Nutrition and Growth', 'The study of natural and artificial nutrients on animal growth and reproduction. This also includes the effects of biological and chemical control agents on reproduction and populations.', 'NUTR'),
(6, 1, 'Pathology', 'The study of disease states, and their causes, processes, and consequences. This includes effects of parasites or disease-causing microbes.', 'PATH'),
(7, 1, 'Physiology', 'The study of functions in systems of animals, their mechanisms, and how they are affected by environmental factors or natural variations that select for particular genes.', 'PHY'),
(8, 1, 'Systematics and Evolution', 'The study of classification of organisms and their evolutionary relationships. This includes morphological, biochemical, genetic, and modeled systems.', 'SYST'),
(9, 1, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(10, 2, 'Clinical and Developmental Psychology ', 'The study and treatment of emotional or behavioral disorders. Developmental psychology is concerned with the study of progressive behavioral changes in an individual from birth until death.', 'CLIN'),
(11, 2, 'Cognitive, Brain and Cognition, Neuro-psychology', 'The study of cognition, the mental processes that underlie behavior, including thinking, deciding, reasoning, and to some extent motivation and emotion. Neuro-psychology studies the relationship between the nervous system, especially the brain, and cerebral or mental functions such as language, memory, and perception.', 'COG'),
(12, 2, 'Physiological Psychology', 'The study of the biological and physiological basis of behavior.', 'PHY'),
(13, 2, 'Sociology and Social Psychology; Industrial/Organizational Psychology', 'The study of human social behavior, especially the study of the origins, organization, institutions, and development of human society. Sociology is concerned with all group activities-economic, social, political, and religious.', 'SOC'),
(14, 2, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(15, 3, 'Analytical Biochemistry', 'The study of the separation, identification, and quantification of chemical components relevant to living organisms.', 'ANAL'),
(16, 3, 'General Biochemistry', 'The study of chemical processes, including interactions and reactions, relevant to living organisms.', 'GEN '),
(17, 3, 'Medicinal Biochemistry', 'The study of biochemical processes within the human body, with special reference to health and disease. ', 'MED'),
(18, 3, 'Structural Biochemistry', 'The study of the structure and or function of biological molecules.', 'STRU'),
(19, 3, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(20, 4, 'Cellular Biology', 'The study of the organization and functioning of the individual cell.', 'CELL'),
(21, 4, 'Genetics', 'The study of molecular genetics focusing on the structure and function of genes at a molecular level.', 'GENE'),
(22, 4, 'Immunology', 'The study of the structure and function of the immune system, innate and acquired immunity, and laboratory techniques involving the interaction of antigens with antibodies.', 'IMM'),
(23, 4, 'Molecular Biology', 'The study of biology at the molecular level. Chiefly concerns itself with understanding the interactions between the various systems of a cell, including the interrelationships of DNA, RNA and protein synthesis and learning how these interactions are regulated.', 'MOLE'),
(24, 4, 'Other', 'Studies that cannot be assigned to one of the above categories. ', 'OTHR'),
(25, 5, 'Analytical Chemistry', 'The study of the separation, identification, and quantification of the chemical components of materials. ', 'ANAL'),
(26, 5, 'Environmental Chemistry', 'The study of chemical species in the natural environment, including the effects of human activities, such as the design of products and processes that reduce or eliminate the use or generation of hazardous substances.', 'ENV'),
(27, 5, 'Inorganic Chemistry', 'The study of the properties and reactions of inorganic and organometallic compounds. ', 'INOR'),
(28, 5, 'Materials Chemistry', 'The study of the design, synthesis and properties of substances, including condensed phases (solids, liquids, polymers) and interfaces, with a useful or potentially useful function, such as catalysis or solar energy. ', 'MAT'),
(29, 5, 'Organic Chemistry', 'The study of carbon-containing compounds, including hydrocarbons and their derivatives.', 'ORGA'),
(30, 5, 'Physical Chemistry', 'The study of the fundamental physical basis of chemical systems and processes, including chemical kinetics, chemical thermodynamics, electrochemistry, photochemistry, spectroscopy, statistical mechanics and astro-chemistry.', 'PHY'),
(31, 5, 'Other', 'Studies that cannot be assigned to one of the above subcategories, such as nuclear chemistry, surface chemistry and theoretical chemistry.', 'OTHR'),
(32, 6, 'Algorithms, Data Bases', 'The study of algorithms and databases. Software developed to manage any form of data including text, images, sound and video.', 'ALGO'),
(33, 6, 'Artificial Intelligence', 'The study of the ability of a computer or other machine to perform those activities that are normally thought to require intelligence, such as solving problems, discriminating among objects, and/or responding to voice commands. This also includes speech analysis and synthesis.\r\n', 'ARTI'),
(34, 6, 'Networking and Communications', 'The study of systems that transmits any combination of voice, video, and/or data among users.', 'NET'),
(35, 6, 'Computational Science, Computer Graphics', 'The study of the use of computers to perform research in other fields, such as computer simulations. Also includes the study of computer graphics or the transfer of pictorial data into and out of a computer by various means (analog-to-digital, optical scanning, etc), such as in computer image processing.', 'SCIE'),
(36, 6, 'Software Engineering, Programming Languages', 'The study of software designed to control the hardware of a specific data processing system in order to allow users and application programs to make use of it. This sub-category includes web technologies, programming languages and human-computer interactions.', 'SOFT'),
(37, 6, 'Computer System, Operating System', 'The study of system software responsible for the direct control and management of hardware and basic system operations of a computer.', 'SYST'),
(38, 6, 'Other', 'Other', 'OTHR'),
(39, 7, 'Climatology, Meteorology, Weather', 'The scientific study of the atmosphere that focuses on weather processes and forecasting.', 'CLIM'),
(40, 7, 'Geochemistry, Mineralogy', 'The study of the chemical composition of the earth and other planets, chemical processes and reactions that govern the composition of rocks and soils. Mineralogy is focused around the chemistry, crystal structure and physical (including optical) properties of minerals.', 'GEO'),
(41, 7, 'Historical Paleontology', 'The study of life in the geologic past as recorded by fossil remains.', 'HIST'),
(42, 7, 'Geophysics', 'Branch of geology in which the principles and practices of physics are used to study the earth and its environment.', 'PHY'),
(43, 7, 'Planetary Science', 'The study of planets or planetary systems and the solar system.', 'PLAN '),
(44, 7, 'Tectonics', 'The study of the earth''s structural features as related to plate structure, plate movement, volcanism, etc.', 'TECH'),
(45, 7, 'Other', 'Other', 'OTHR'),
(46, 8, 'Electrical Engineering, Computer Engineering, Controls', 'Electrical engineering is the branch of engineering that deals with the technology of electricity, especially the design and application of circuitry and equipment for power generation and distribution, machine control, and communications. A computer engineer is an electrical engineer with a focus on digital logic systems or a software architect with a focus on the interaction between software programs and the underlying hardware architecture.', 'ELEC'),
(47, 8, 'Mechanical Engineering', 'The branch of engineering that encompasses the generation and application of heat and mechanical power and the design, production, and use of machines and tools.', 'MECH'),
(48, 8, 'Robotics', 'The science or study of the technology associated with the design, fabrication, theory, and application of robots and of general purpose, programmable machine systems.', 'ROB'),
(49, 8, 'Thermodynamics, Solar', 'Thermodynamics involves the physics of the relationships and conversions between heat and other forms of energy. Solar is the technology of obtaining usable energy from the light of the sun.', 'THRM'),
(50, 8, 'Other', 'Other', 'OTHR'),
(51, 9, 'Bioengineering', 'Involves the application of engineering principles to the fields of biology and medicine, as in the development of aids or replacements for defective or missing body organs; the development and manufacture of prostheses, medical devices, diagnostic devices, drugs and other therapies as well as the application of engineering principles to basic biological science problems.', 'BIO'),
(52, 9, 'Chemical Engineering', 'Deals with the design, construction, and operation of plants and machinery for making such products as acids, dyes, drugs, plastics, and synthetic rubber by adapting the chemical reactions discovered by the laboratory chemist to large-scale production.', 'CHEM'),
(53, 9, 'Civil Engineering', 'Construction Engineering - Includes the planning, designing, construction, and maintenance of structures and public works, such as bridges or dams, roads, water supply, sewer, flood control and, traffic.', 'CIVI'),
(54, 9, 'Industrial Engineering', 'Processing - Concerned with efficient production of industrial goods as affected by elements such as plant and procedural design, the management of materials and energy, and the integration of workers within the overall system. The industrial engineer designs methods, not machinery.', 'IND'),
(55, 9, 'Material Science', 'A multidisciplinary field relating the performance and function of matter in any and all applications to its micro, nano, and atomic structure, and vice versa. It often involves the study of the characteristics and uses of various materials, such as metals, ceramics, and plastics and their potential engineering applications.', 'MAT'),
(56, 9, 'Other', 'Other', 'OTHR'),
(57, 10, 'Aerospace and Aeronautical Engineering, Aerodynamics', 'The design of aircraft and space vehicles and the direction of the technical phases of their manufacture and operation.', 'AERO'),
(58, 10, 'Alternative Fuels', 'Any method of powering an engine that does not involve petroleum (oil). Some alternative fuels are electricity, hythane, hydrogen, natural gas, and wood.', 'ALT'),
(59, 10, 'Fossil Fuel Energy', 'Energy from a hydrocarbon deposit, such as petroleum, coal, or natural gas, derived from living matter of a previous geologic time and used for fuel.', 'FOS'),
(60, 10, 'Vehicle Development', 'Engineering of vehicles that operate using energy other than from fossil fuel.', 'VEH'),
(61, 10, 'Renewable Energies', 'Renewable energy sources capture their energy from existing flows of energy, from on-going natural processes such as sunshine, wind, flowing water, biological processes, and geothermal heat flows.', 'REN'),
(62, 10, 'Other', 'Other', 'OTHR'),
(63, 11, 'Bioremediation', 'The use of biological agents, such as bacteria or plants, to remove or neutralize contaminants, as in polluted soil or water. Includes phytoremediation, constructed wetlands for wastewater treatment, biodegradation, etc.', 'BIO'),
(64, 11, 'Ecosystems Management', 'The integration of ecological, economic, and social principles to manage biological and physical systems in a manner that safeguards the long-term ecological sustainability, natural diversity, and productivity of the landscape. An ecological approach to managing the environment.', 'ECO'),
(65, 11, 'Environmental Engineering', 'The application of engineering principals to solve practical problems in the supply of water, the disposal of waste, and the control of pollution. Includes alternative engineering methodologies to meet society''s needs in an environmentally sound and sustainable manner. Preservation of the environment by preventing the contamination of, and facilitating the clean up of, air, water, and land resources.', 'ENG'),
(66, 11, 'Land Resource Management and Forestry ', 'A landscape approach to sustainable resource management, coastal management, biological diversity management, land use planning, or forest succession management. It often includes a resource planning component as well as implementation methodologies. An example would be the management of longleaf pine forests including controlled burns to imitate natural processes.', 'LAND'),
(67, 11, 'Recycling and Waste Management', 'The extraction and reuse of useful substances from discarded items, garbage, or waste. The process of managing, and disposing of, wastes and hazardous substances through methodologies such as landfills, sewage treatment, composting, waste reduction, etc.', 'REC'),
(68, 11, 'Other', 'Other', 'OTHR'),
(69, 12, 'Air Pollution and Air Quality', 'The study of contamination of the air by such things as noxious gases, elements, minerals, chemicals, solid and liquid matter (particulates), etc. Air pollution is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'AIR'),
(70, 12, 'Soil Contamination and Soil Quality', 'The study of contamination of the soil by such things as noxious elements, minerals, chemicals, solids, liquids, etc. Soil contamination is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'SOIL'),
(71, 12, 'Water Pollution and Water Quality', 'The study of contamination of the water by such things as noxious elements, minerals, chemicals, solids, etc. Water pollution is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'WATE'),
(72, 12, 'Other', 'Other', 'OTHR'),
(73, 13, 'Algebra', 'The study of algebraic operations and/or relations and the structures which arise from them. An example is given by (systems of) equations which involve polynomial functions of one or more variables. ', 'ALG'),
(74, 13, 'Analysis', 'The study of infinitesimal processes in mathematics, typically involving the concept of a limit. This begins with differential and integral calculus, for functions of one or several variables, and includes differential equations.', 'ANAL'),
(75, 13, 'Computer Mathematics', 'Branch of mathematics that concerns itself with the mathematical techniques typically used in the application of mathematical knowledge to other domains. Not every project that uses some mathematics belongs here; this category is for projects where the mathematics is the primary component.', 'COMP'),
(76, 13, 'Combinatorics, Graph Theory and Game Theory', 'The study of combinatorial structures in mathematics, such as finite sets, graphs, and games, often with a view toward classification and/or enumeration.', 'COMB'),
(77, 13, 'Geometry and Topology', 'The study of the shape, size, and other properties of figures and spaces. Includes such subjects as Euclidean geometry, non-Euclidean geometries (spherical, hyperbolic, Riemannian, Lorentzian), and knot theory (classification of knots in 3-space).', 'GEO'),
(78, 13, 'Number Theory', 'The study of the arithmetic properties of integers and related topics such as cryptography.', 'NUM'),
(79, 13, 'Probability and Statistics', 'Mathematical study of random phenomena and the study of statistical tools used to analyze and interpret data.', 'PROB'),
(80, 13, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(81, 14, 'Disease Diagnosis and Treatment', 'The act or process of identifying or determining the nature and cause of a disease or injury through evaluation of patient history, examination, and review of laboratory data. Administration or application of remedies to a patient or for a disease or injury; medicinal or surgical management; therapy.', 'DIS'),
(82, 14, 'Epidemiology', 'The study of the causes, distribution, and control of disease in populations. Epidemiologists, using sophisticated statistical analyses, field investigations, and complex laboratory techniques, investigate the cause of a disease, its distribution (geographic, ecological, and ethnic), method of spread, and measures for control and prevention.', 'EPID'),
(83, 14, 'Genetics', 'The study of heredity, especially the mechanisms of hereditary transmission and the variation of inherited traits among similar or related organisms.', 'GENE'),
(84, 14, 'Molecular Biology of Diseases', 'The study of diseases at the molecular level.', 'MOLE'),
(85, 14, 'Physiology and Pathophysiology', 'The science of the mechanical, physical, and biochemical functions of normal tissues or organs. Pathophysiology is the study of the disturbance of normal mechanical, physical, and biochemical functions that a disease causes, or that which causes the disease.', 'PHYS'),
(86, 14, 'Other', 'Other', 'OTHR'),
(87, 15, 'Antimicrobial Agents', 'The study of substances that kill or inhibit the growth of microorganisms.', 'ANTI'),
(88, 15, 'Applied Microbiology', 'The study of microorganisms having potential applications in human, animal or plant health or energy production.', 'APP'),
(89, 15, 'Bacterial Microbiology', 'The study of bacteria and bacterial diseases.', 'BACT'),
(90, 15, 'Environmental Microbiology', 'The study of the structure, function, diversity and relationship of microorganisms with respect to their environment.', 'ENV'),
(91, 15, 'Microbial Genetics', 'The study of how genes are organized and regulated in microorganisms in relation to their cellular function.', 'GENE'),
(92, 15, 'Virology', 'The study the anatomy, physiology of viruses and the diseases they cause.', 'VIRO'),
(93, 16, 'Atomic Molecular and Optical Physics', 'The study of atoms, simple molecules, electrons and light, and their interactions.', 'AMO'),
(94, 16, 'Astronomy and Cosmology', 'The study of space,  the universe as a whole, including its origins and evolution, the physical properties of objects in space and computational astronomy', 'ASTR'),
(95, 16, 'Biological Physics', 'The study of the physics of biological processes.', 'BIO'),
(96, 16, 'Instrumentation and Electronics', 'Instrumentation is the process of developing means of precise measurement of various variables such as flow and pressure while maintaining control of the variables at desired levels of safety and economy. Electronics is the branch of physics that deals with the emission and effects of electrons and with the use of electronic devices.', 'INST'),
(97, 16, 'Condensed Matter and Materials', 'The study of the preparation, properties and performance of materials to help understand and optimize their behavior. Topics such as superconductivity, semi-conductors, complex fluids, and thin films are studied.', 'MAT'),
(98, 16, 'Magnetics, Electromagnetics and Plasmas', 'The study of electrical and magnetic fields and of matter in the plasma phase and their effects on materials in the solid, liquid or gaseous states.', 'MAG'),
(99, 16, 'Mechanics', 'Classical physics and mechanics, including the macroscopic study of forces, vibrations and flows; on solid, liquid and gaseous materials', 'MECH'),
(100, 16, 'Nuclear and Particle Physics', 'The study of the physical properties of the atomic nucleus and of fundamental particles and the forces of their interaction', 'NUCL'),
(101, 16, 'Optics, Lasers, and Masers', 'The study of the physical properties of light, lasers and masers.', 'OPT'),
(102, 16, 'Theoretical Physics, Theoretical or Computational Astronomy', 'The study of nature, phenomena and the laws of physics employing mathematical models and abstractions rather than experimental processes. ', 'THEO'),
(103, 16, 'Other', 'Studies that cannot be assigned to one of the above categories. ', 'OTHR'),
(104, 17, 'Agronomy', 'The application of the various soil and plant sciences to soil management and agricultural and horticultural crop production. Includes biological and chemical controls of pests, hydroponics, fertilizers and supplements.', 'AGR'),
(105, 17, 'Development and Growth', 'The study of a plant from earliest stages through germination and into later life. This includes cellular and molecular aspects of development and environmental effects, natural or manmade, on development and growth.', 'DEV'),
(106, 17, 'Ecology', 'The study of interactions and relationships among plants, and plants and animals, with their environment.', 'ECO'),
(107, 17, 'Genetics/Breeding', 'The study of organismic and population genetics of plants. The application of plant genetics and biotechnology to crop improvement.', 'GEN'),
(108, 17, 'Pathology', 'The study of plant disease states, and their causes, processes, and consequences. This includes effects of parasites or disease-causing microbes.', 'PATH'),
(109, 17, 'Plant Physiology', 'The study of functions of plants, their mechanisms, and how they are affected by environmental factors or natural variations. This includes all aspects of photosynthesis.', 'PHY'),
(110, 17, 'Systematics and Evolution', 'The study of classification of organisms and their evolutionary relationships. This includes morphological, biochemical, genetic, and modeled systems.', 'SYST'),
(111, 17, 'Other', 'Studies that cannot be assigned to one of the above categories, such as the effects of plants or plant-derived substances on animal and human health.', 'OTHR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `last_login`) VALUES
(2, 'admin', 'admin@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2014-02-07 02:19:42'),
(3, 'superjudge', 'superjudge@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2014-02-08 01:09:09'),
(4, 'super admin', 'super@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2014-02-07 02:33:40'),
(7, 'judge0', 'judge@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2014-02-08 01:30:56'),
(8, 'Gamal', 'gshaban@3ash.net', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, NULL),
(9, 'judge2', 'judge2@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2014-02-08 01:33:29'),
(10, 'judge3', 'judge3@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2014-02-08 01:34:52'),
(11, 'judge4', 'judge4@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2014-02-08 01:35:22'),
(14, 'judge5', 'judge5@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2014-02-08 01:35:50'),
(15, 'judge6', 'judge6@divineds.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'super_admin'),
(3, 'judge'),
(4, 'super_judge');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_10` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_11` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_4` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_5` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_7` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_8` FOREIGN KEY (`parent`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_9` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_5` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_6` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judge`
--
ALTER TABLE `judge`
  ADD CONSTRAINT `judge_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judge_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `judge_ibfk_3` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `judge_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judge_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `judge_ibfk_6` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_5` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `project_experimentation_location`
--
ALTER TABLE `project_experimentation_location`
  ADD CONSTRAINT `project_experimentation_location_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_experimentation_location_ibfk_2` FOREIGN KEY (`experimentation_location_id`) REFERENCES `experimentation_location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_experimentation_location_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_experimentation_location_ibfk_4` FOREIGN KEY (`experimentation_location_id`) REFERENCES `experimentation_location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_working_sites`
--
ALTER TABLE `project_working_sites`
  ADD CONSTRAINT `project_working_sites_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_working_sites_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
