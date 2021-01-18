<?php

namespace app\core;

class Router
{
	
	private $pathes = [];
	private $params = [];

	public function __construct()
	{
		$arr = require('app/config/routes.php');
		foreach ($arr as $route => $params)
			$this->add($route, $params);
	}

	public function add(string $route, array $params)
	{
		$route = "#^".$route."#";
		$this->pathes[$route] = $params;
	}

	public function match():bool
	{
		$url = trim($_SERVER['REQUEST_URI'], '/');
		$url = str_replace(array('phpmvcexample/', 'phpmvcexample'), '', $url);
		foreach ($this->pathes as $route => $params){
			if(preg_match($route, $url)){
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run()
	{
		if($this->match()){
			$class = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
			if(class_exists($class)){
				$method = $this->params['action'].'Action';
				if(method_exists($class, $method)){
					if($this->params['auth'] && !$_SESSION['id'])
						View::Error(404);
					$controller = new $class($this->params);
					$controller->$method();
				}
			}else
				View::Error(404);
		}else
			View::Error(404);
	}

}