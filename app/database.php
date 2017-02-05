<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'us-cdbr-iron-east-04.cleardb.net',
	'username' => 'be9e1ad6afef96',
	'password' => '59c8a0b4',
	'database' => 'heroku_b557402fce4549d',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]); 

$capsule->bootEloquent();