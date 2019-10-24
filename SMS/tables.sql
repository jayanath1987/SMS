--
-- DB `smsalert`
--
CREATE DATABASE smsalert;

USE smsalert;


CREATE TABLE `members` (
`id` int(4) NOT NULL auto_increment,
`username` varchar(65) NOT NULL default '',
`password` varchar(65) NOT NULL default '',
PRIMARY KEY (`id`)
);

-- 
-- Dumping data for table `members`
-- 

INSERT INTO `members` VALUES (1, 'icta', '1234');
INSERT INTO `members` VALUES (2, 'cgr', '1234');
INSERT INTO `members` VALUES (3, 'msg', '1234');


CREATE TABLE `template` (
  `id` INT(11) NOT NULL auto_increment,
  `title` VARCHAR(100) NULL,
  `message` VARCHAR(160) NULL,
  PRIMARY KEY (`id`));


CREATE TABLE `category` (
  `id` INT(11) NOT NULL auto_increment,
  `title` VARCHAR(100) NULL,
  `message` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `send_messages` (
  `id` INT(11) NOT NULL auto_increment,
  `cid` INT(11) NULL,
  `tid` INT(11) NULL,
  `message` VARCHAR(160) NULL,
  `date` DATETIME NULL,
  `username` VARCHAR(65) NULL,
  `status` VARCHAR(1) NULL,
  PRIMARY KEY (`id`));



