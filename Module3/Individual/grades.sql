CREATE TABLE `grades` (
  `pk_grade_ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` mediumint(8) unsigned NOT NULL,
  `grade` decimal(5,2) DEFAULT NULL,
  `school_code` enum('L','B','A','F','E','T','I','W','S','U','M') NOT NULL,
  `dept_id` tinyint(3) unsigned NOT NULL,
  `course_code` char(5) NOT NULL,
  PRIMARY KEY (`pk_grade_ID`),
  KEY `student_id` (`student_id`),
  KEY `school_code` (`school_code`,`dept_id`,`course_code`),
  CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`school_code`, `dept_id`, `course_code`) REFERENCES `courses` (`school_code`, `dept_id`, `course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8