-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `book_details`;
CREATE TABLE `book_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `count` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`(100))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `book_details` (`id`, `title`, `author`, `category`, `count`, `available`) VALUES
(1,	'Mobile Communication Second Edition',	'Jochen H. Sciller',	'MOBILE COMMUNICATION',	5,	4),
(2,	'Database Management Systems',	'Raghu Ramakrishnan, Johannes Gehrke',	'DBMS',	10,	10),
(3,	'Fundamentals of Database Systems',	'Ramez Elmasri',	'DBMS',	6,	5),
(4,	'High Performance MySQL',	'Baron Schwartz, Vadim Tkachenko, Peter Zaitsev',	'DBMS',	7,	7),
(5,	'ADVANCED DATABASE MANAGEMENT SYSTEM (With CD )',	'Rini Chakrabarti, Shilbhadra Dasgupta',	'DBMS',	6,	5),
(6,	'JavaScript: The Good Parts',	'Douglas Crockford',	'JAVASCRIPT',	18,	18),
(7,	'Eloquent JavaScript: A Modern Introduction to Programming',	'Marijn Haverbeke',	'JAVASCRIPT',	18,	18),
(8,	'Effective JavaScript: 68 Specific Ways to Harness the Power of JavaScript',	'David Herman',	'JAVASCRIPT',	17,	17),
(9,	'Head First PHP & MySQL: A Brain-Friendly Guide',	'Lynn Beighley, Michael Morrison',	'PHP',	14,	14),
(10,	'Murach\'s PHP and MySQL',	'Joel Murach, Ray Harris',	'PHP',	12,	11),
(11,	'Beginning PHP and MySQL: From Novice to Professional',	'Jason W. Gilmore',	'PHP',	11,	11),
(12,	'HTML & CSS: Design and Build Web Sites',	'Jon Duckett',	'HTML',	5,	5),
(13,	'Introducing HTML5',	'Bruce Lawson',	'HTML',	11,	11),
(14,	'Node.js in Action',	'Marc Harter and Mike Cantelon',	'NODEJS',	13,	13),
(16,	'Node.js in Action scond edition',	'Marc Harter and Mike Cantelon',	'NODEJS',	13,	13),
(17,	'Node js in Action vol 4',	'Marc Harter and Mike Cantelon',	'NODEJS',	11,	11),
(18,	'Operating System Concepts',	'Avi Silberschatz',	'OS',	5,	5),
(19,	'Operating System Concepts 2',	'Avi Silberschatz',	'OS',	2,	2),
(20,	'Operating System Concepts 3',	'Avi Silberschatz',	'OS',	2,	2),
(24,	'Node js in Action vol 5',	'Marc Harter and Mike Cantelon',	'NODEJS',	11,	11);

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branches` tinytext NOT NULL,
  PRIMARY KEY (`branches`(50)),
  UNIQUE KEY `unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `branches` (`id`, `branches`) VALUES
(5,	'Civil'),
(1,	'Computer Science'),
(3,	'Electrical'),
(4,	'Electronics and Communication'),
(2,	'Mechanical');

DROP TABLE IF EXISTS `issue_book_staff`;
CREATE TABLE `issue_book_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `date_today` text NOT NULL,
  `enddate` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_id_staff_id` (`book_id`,`staff_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `issue_book_staff_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_details` (`id`),
  CONSTRAINT `issue_book_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `issue_book_staff` (`id`, `book_id`, `staff_id`, `date_today`, `enddate`) VALUES
(3,	3,	'GCE02K',	'26/10/2017',	'2/11/2017');

DROP TABLE IF EXISTS `issue_book_student`;
CREATE TABLE `issue_book_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `date_today` text NOT NULL,
  `enddate` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_id_student_id` (`book_id`,`student_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `issue_book_student_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_details` (`id`),
  CONSTRAINT `issue_book_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `issue_book_student` (`id`, `book_id`, `student_id`, `date_today`, `enddate`) VALUES
(6,	10,	'14B03',	'26/10/2017',	'2/11/2017'),
(7,	5,	'14B019',	'26/10/2017',	'2/11/2017'),
(8,	1,	'14B019',	'26/10/2017',	'2/11/2017');

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roles` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles` (`roles`(50))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `roles`) VALUES
(1,	'admin'),
(2,	'librarian');

DROP VIEW IF EXISTS `staff_count`;
CREATE TABLE `staff_count` (`no_of_staff` bigint(21));


DROP TABLE IF EXISTS `staff_details`;
CREATE TABLE `staff_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(50) NOT NULL,
  `fullname` text NOT NULL,
  `department` text NOT NULL,
  `designation` text NOT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `staff_details` (`id`, `staff_id`, `fullname`, `department`, `designation`) VALUES
(1,	'GCE01K',	'Adarsh J',	'Computer Science',	'Assistant Professor'),
(2,	'GCE02K',	'Sajith Azeez',	'Civil',	'Professor'),
(5,	'GCE03K',	'Nithin B',	'Civil',	'Professor'),
(6,	'GCE04K',	'Balu K',	'Electronics',	'Associate Professor'),
(10,	'GCE06K',	'Arun Damz',	'Computer Science',	'Professor');

DROP VIEW IF EXISTS `staff_librarian`;
CREATE TABLE `staff_librarian` (`id` int(11), `book_id` int(11), `staff_id` varchar(50), `date_today` text, `enddate` text, `fullname` text, `department` text, `title` text, `category` text);


DROP VIEW IF EXISTS `student_count`;
CREATE TABLE `student_count` (`no_of_students` bigint(21));


DROP TABLE IF EXISTS `student_details`;
CREATE TABLE `student_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `regno` varchar(50) NOT NULL,
  `rollno` text NOT NULL,
  `branch` text NOT NULL,
  PRIMARY KEY (`regno`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_details` (`id`, `name`, `regno`, `rollno`, `branch`) VALUES
(7,	'Benson Benny',	'14B005',	'27',	'Computer Science'),
(9,	'Chethana P M',	'14B006',	'29',	'Computer Science'),
(11,	'Nanda V',	'14B010',	'40',	'Computer Science'),
(1,	'Bibin Jaimon',	'14B019',	'28',	'Computer Science'),
(3,	'Adarsh J',	'14B02',	'2',	'Computer Science'),
(5,	'Arjun',	'14B022',	'18',	'Computer Science'),
(4,	'Nithin B',	'14B03',	'43',	'Computer Science'),
(13,	'Ananthan D',	'14B050',	'13',	'Electronics and Communication');

DROP VIEW IF EXISTS `student_librarian`;
CREATE TABLE `student_librarian` (`id` int(11), `book_id` int(11), `student_id` varchar(50), `date_today` text, `enddate` text, `name` text, `branch` text, `title` text, `category` text);


DROP TABLE IF EXISTS `user_auth`;
CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`(50))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_auth` (`id`, `username`, `password`, `role`) VALUES
(1,	'admin',	'adminpassword',	'admin'),
(2,	'bibi',	'bibi',	'librarian');

DROP TABLE IF EXISTS `staff_count`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `staff_count` AS (select count(0) AS `no_of_staff` from `staff_details`);

DROP TABLE IF EXISTS `staff_librarian`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `staff_librarian` AS (select `issue_book_staff`.`id` AS `id`,`issue_book_staff`.`book_id` AS `book_id`,`issue_book_staff`.`staff_id` AS `staff_id`,`issue_book_staff`.`date_today` AS `date_today`,`issue_book_staff`.`enddate` AS `enddate`,`staff_details`.`fullname` AS `fullname`,`staff_details`.`department` AS `department`,`book_details`.`title` AS `title`,`book_details`.`category` AS `category` from ((`issue_book_staff` left join `staff_details` on((`issue_book_staff`.`staff_id` = `staff_details`.`staff_id`))) left join `book_details` on((`issue_book_staff`.`book_id` = `book_details`.`id`))));

DROP TABLE IF EXISTS `student_count`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `student_count` AS (select count(0) AS `no_of_students` from `student_details`);

DROP TABLE IF EXISTS `student_librarian`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `student_librarian` AS (select `issue_book_student`.`id` AS `id`,`issue_book_student`.`book_id` AS `book_id`,`issue_book_student`.`student_id` AS `student_id`,`issue_book_student`.`date_today` AS `date_today`,`issue_book_student`.`enddate` AS `enddate`,`student_details`.`name` AS `name`,`student_details`.`branch` AS `branch`,`book_details`.`title` AS `title`,`book_details`.`category` AS `category` from ((`issue_book_student` left join `student_details` on((`issue_book_student`.`student_id` = `student_details`.`regno`))) left join `book_details` on((`issue_book_student`.`book_id` = `book_details`.`id`))));

-- 2017-10-27 17:40:44
