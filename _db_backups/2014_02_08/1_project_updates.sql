ALTER TABLE  `project` DROP  `team_leader_name` ;
ALTER TABLE  `project` DROP  `team_leader_name_ar` ;
ALTER TABLE  `project` DROP  `team_leader_email` ;
ALTER TABLE  `project` DROP  `team_leader_birthday` ;
ALTER TABLE  `project` DROP  `team_leader_gender` ;
ALTER TABLE  `project` DROP  `phone` ;

ALTER TABLE `project`
  DROP `team_member_1_name`,
  DROP `team_member_1_name_ar`,
  DROP `team_member_2_name`,
  DROP `team_member_2_name_ar`,
  DROP `school`,
  DROP `school_ar`,
  DROP `school_phone`,
  DROP `school_address`;

ALTER TABLE  `project` DROP FOREIGN KEY  `project_ibfk_4` ;
ALTER TABLE  `project` DROP  `grade_id` ;


ALTER TABLE  `project` ADD  `student_1_id` INT( 11 ) NOT NULL AFTER  `id` ,
ADD  `student_2_id` INT( 11 ) NULL AFTER  `student_1_id` ,
ADD  `student_3_id` INT( 11 ) NULL AFTER  `student_2_id` ;



ALTER TABLE  `student` CHANGE  `educational_administration`  `educational_administration` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;
