ALTER TABLE  `project` ADD  `team_leader_name_ar` VARCHAR( 150 ) NULL AFTER  `team_leader_name` ;
ALTER TABLE  `project` ADD  `team_member_1_name_ar` VARCHAR( 150 ) NULL AFTER  `team_member_1_name` ;
ALTER TABLE  `project` ADD  `team_member_2_name_ar` VARCHAR( 150 ) NULL AFTER  `team_member_2_name` ;
ALTER TABLE  `project` ADD  `school_ar` VARCHAR( 150 ) NULL AFTER  `school` ;
ALTER TABLE  `project` ADD  `team_leader_birthday` DATE NULL AFTER  `grade_id` ;
ALTER TABLE  `project` ADD  `team_leader_gender` TINYINT( 2 ) NOT NULL DEFAULT  '1' AFTER  `team_leader_birthday` ;
ALTER TABLE  `project` ADD  `adult_sponsor_name_ar` VARCHAR( 150 ) NULL AFTER  `adult_sponsor_name` ;
ALTER TABLE  `project` ADD  `adult_sponsor_gov` VARCHAR( 100 ) NULL AFTER  `adult_sponsor_email` ;
ALTER TABLE  `project` ADD  `adult_sponsor_profession` VARCHAR( 150 ) NULL AFTER  `adult_sponsor_gov` ;
ALTER TABLE  `project` ADD  `adult_sponsor_specialist` VARCHAR( 150 ) NULL AFTER  `adult_sponsor_profession` ;
ALTER TABLE  `project` ADD  `adult_sponsor_work_location` VARCHAR( 150 ) NULL AFTER  `adult_sponsor_specialist` ;
ALTER TABLE  `project` ADD  `adult_sponsor_educational_administration` VARCHAR( 150 ) NULL AFTER `adult_sponsor_work_location` ;
ALTER TABLE  `project` ADD  `adult_sponsor_birthday` DATE NULL AFTER  `adult_sponsor_educational_administration` ;
ALTER TABLE  `project` ADD  `adult_sponsor_gender` TINYINT( 2 ) NOT NULL DEFAULT  '1' AFTER  `adult_sponsor_birthday` ;


