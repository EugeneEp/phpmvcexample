<?php

namespace app\core;

class Router
{
	
	private $pathes = [];
	private $params = [];
	private $method;

	public function __construct()
	{
		$this->method = $_SERVER['REQUEST_METHOD'];
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
		$url = $url == '' ? 'index' : $url;
		foreach ($this->pathes as $route => $params){
			if(strpos($route, $url)){
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
					if($this->method != $this->params['method'])
						View::Error(404, 'Method not allowed');
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