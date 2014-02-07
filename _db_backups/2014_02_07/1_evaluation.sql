ALTER TABLE  `schedule` ADD  `eval_q_1` INT NULL DEFAULT  '0',
ADD  `eval_q_2` INT NULL DEFAULT  '0',
ADD  `eval_q_3` INT NULL DEFAULT  '0',
ADD  `eval_q_4` INT NULL DEFAULT  '0',
ADD  `eval_q_5` INT NULL DEFAULT  '0',
ADD  `eval_total` INT NULL DEFAULT  '0';
ALTER TABLE  `schedule` ADD  `eval_q_6` INT NULL DEFAULT  '0' AFTER  `eval_q_5`
