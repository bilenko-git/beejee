<?php

class users extends Migration {
    
    public function up() {
		
		CREATE TABLE IF NOT EXISTS `users` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
		  `updated_at` text COLLATE utf8_unicode_ci NOT NULL,
		  `created_at` text COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;


		INSERT INTO `users` (`id`, `login`, `password`, `updated_at`, `created_at`) VALUES
		(2, 'admin', '202cb962ac59075b964b07152d234b70', '2017-01-31 16:47:25', '');
    }

    public function down() {
      
    }
}