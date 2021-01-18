<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

use app\core\Router;

spl_autoload_register(function($class){
	$path = str_replace('\\', '/', $class).'.php';
	if(file_exists($path))
		require $path;
});

session_start();

$router = new Router;
$router->run();