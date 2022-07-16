CREATE DATABASE IF NOT EXISTS demosql;

USE supersqli; 

CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(10) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


INSERT INTO `datas` values(1,'shiwoshiwo'),(2,'shiershier'),(666,'lsw');
