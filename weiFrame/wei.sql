CREATE DATABASE IF NOT EXISTS weiframe;

USE weiframe;

CREATE TABLE wei_user(
	`id` INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	`password` VARCHAR(32) NOT NULL
);

INSERT INTO wei_user (`name`, `password`) VALUES('admin', 'weixing');