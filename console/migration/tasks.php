<?php

class tasks extends Migration {
    
    public function up() {
		
		CREATE TABLE IF NOT EXISTS `tasks` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
		  `status` tinyint(1) NOT NULL DEFAULT '0',
		  `img` text COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;
    }

    public function down() {
      
    }
}