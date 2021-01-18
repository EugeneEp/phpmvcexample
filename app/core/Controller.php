<?php

namespace app\core;

class Controller
{
	
	private $params;
	public $view;
	public $model;

	public function __construct(array $params)
	{
		$this->params = $params;
		$this->view = new View($params);
		$this->model = $this->getModel($params['controller']);
	}

	public function getModel(string $controller):?object
	{
		$path = "app\models\\".ucfirst($controller);
		if(class_exists($path))
			return new $path;
	}

}