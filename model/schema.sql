-- Host: localhost
-- Database: `Iran Vision`
-- SET time_zone = "CST6CDT";

CREATE TABLE `Editors` (
  `editor_id` int(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`editor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table demonstrates the editor''s personal information';

CREATE TABLE `Members` (
  `member_id` int(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `date_start` varchar(50) NOT NULL,
  `date_end` varchar(50) NOT NULL,
  `editor_id` int(11) NOT NULL COMMENT 'Foreign Key',
  PRIMARY KEY (`member_id`),
  KEY `editor_id` (`editor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table demonstrates the member''s personal information';

CREATE TABLE `Content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(10) NOT NULL,
  `web_page` varchar(30) NOT NULL,
  `titr` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `member_id` int(11) NOT NULL COMMENT 'Foreign Key',
  PRIMARY KEY (`content_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT=='This table demonstrates the content of webpages';

CREATE TABLE `Survay` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_1` varchar(10) DEFAULT NULL,
  `question_2` varchar(10) DEFAULT NULL,
  `question_3` varchar(20) DEFAULT NULL,
  `question_4` varchar(20) DEFAULT NULL,
  `question_5` varchar(100) DEFAULT NULL,
  `member_id` int(11) NOT NULL COMMENT 'Foreign Key',
  PRIMARY KEY (`survey_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT=='This table demonstrates the surveys';

CREATE TABLE `Website` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `editor_id` int(11) NOT NULL COMMENT 'Foreign Key',
  PRIMARY KEY (`page_id`),
  KEY `editor_id` (`editor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table demonstrates the web page''s information';