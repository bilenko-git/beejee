<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'us-cdbr-iron-east-04.cleardb.net',
	'username' => 'b0373d2042ebc0',
	'password' => '2b3ba17d',
	'database' => 'heroku_efa23e2d075e597',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]); 

$capsule->bootEloquent();