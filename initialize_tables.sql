CREATE DATABASE `invaders` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `t6_scores` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `score` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SELECT * FROM invaders.t6_scores;

CREATE TABLE `t6_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SELECT * FROM invaders.t6_users;