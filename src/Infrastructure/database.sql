create database library;

use library;

CREATE TABLE `books` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY  (`id`)
);