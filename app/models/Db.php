<?php

namespace app\models;

use PDO;

class Db
{
	
	protected $db;

	public function __construct()
	{
		$config = require 'app/config/db.php';
		$this->db = new PDO($config['type'].':host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
	}

	public function query($sql, $params=[]) {
		$stnt = $this->db->prepare($sql);
		if (!empty($params)){
			foreach ($params as $key => $value) {
				$stnt->bindValue(':'.$key, $value);
			}
		}
		$stnt->execute();
		return $stnt;
	}

	public function row($sql, $params=[]) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params=[]) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

}