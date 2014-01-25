
ALTER TABLE  `project` ADD  `team_leader_name` varchar(150) NOT NULL ;
ALTER TABLE  `project` ADD  `team_leader_email` varchar(100) NOT NULL ;
ALTER TABLE  `project` ADD  `grade` varchar(150) DEFAULT NULL ;
ALTER TABLE  `project` ADD  `phone` varchar(25) NOT NULL;
ALTER TABLE  `project` ADD  `team_member_1_name` varchar(150) DEFAULT NULL ;
ALTER TABLE  `project` ADD  `team_member_2_name` varchar(150) DEFAULT NULL ;
ALTER TABLE  `project` ADD   `school` varchar(50) NOT NULL;
ALTER TABLE  `project` ADD   `school_phone` varchar(50) NOT NULL;
ALTER TABLE  `project` ADD   `school_address` varchar(500) NOT NULL;
ALTER TABLE  `project` ADD   `adult_sponsor_name` varchar(150) NOT NULL;
ALTER TABLE  `project` ADD   `adult_sponsor_phone` varchar(25) DEFAULT NULL;
ALTER TABLE  `project` ADD   `adult_sponsor_email` varchar(30) DEFAULT NULL;
ALTER TABLE  `project` ADD   `continuation_project` tinyint(4) NOT NULL DEFAULT '0';
ALTER TABLE  `project` ADD   `start_date` date NOT NULL;
ALTER TABLE  `project` ADD   `end_date` date NOT NULL;