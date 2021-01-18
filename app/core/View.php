<?php

namespace app\core;

class View
{
	private $params;
	public $layout = 'default';
	public $template;

	public function __construct(array $params)
	{
		$this->params = $params;
		$this->template = $params['controller'].'/'.$params['action'];
	}

	public function location(string $url){
		header('Location: '.$url);
		exit();
	}

	public static function Error(int $code, string $msg = '')
	{
		http_response_code($code);
		require 'app/views/error/error.php';
		exit();
	}

	public function render(string $title, array $vars)
	{
		$path = 'app/views/'.$this->template.'.php';
		extract($vars);
		if(file_exists($path)){
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'app/views/layouts/'.$this->layout.'.php';
		}else
			$this->Error(404, 'Scheme not found');
	}
}