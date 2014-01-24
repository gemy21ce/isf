INSERT INTO `user_role` (`role`)VALUES (  'admin');
INSERT INTO `user_role` (`role`) VALUES ('super_admin');
INSERT INTO `user_role` (`role`) VALUES ('judge');
INSERT INTO `user_role` (`role`) VALUES ('super_judge');


ALTER TABLE  `users` DROP FOREIGN KEY  `users_ibfk_1` ;
ALTER TABLE  `users` CHANGE  `user_role`  `role_id` INT( 11 ) NOT NULL;
ALTER TABLE  `users` ADD FOREIGN KEY (  `role_id` ) REFERENCES  `user_role` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
