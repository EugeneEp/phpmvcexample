<?php

namespace app\core;

use app\models\Db;

class Model
{
	
	public $db;

	public function __construct()
	{
		$this->db = new Db;
	}
}