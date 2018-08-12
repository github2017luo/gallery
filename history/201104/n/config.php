<?php

// The file defining the various rss feeds
$feeds_xml="feeds.xml";

// These values must be present if you want to 
// generate the feeds file from a database
// To generate, launch generatefeeds.php
$mysql_db="";
$mysql_table="rss";

$mysql_host="localhost";
$mysql_user="";
$mysql_pw="";

// The following is the sql code to create the required database:
/*

CREATE TABLE IF NOT EXISTS `rss` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `url` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=2 ;

*/

?>