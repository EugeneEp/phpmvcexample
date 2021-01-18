<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{

	private $secret = "69hdaw@e21e2";

	public function login()
	{
		$email = $_POST['email'];
		$password = $this->HashPass($_POST['password']);
		$vars = [
			'email'=>$email,
			'password'=>$password
		];
		$result = $this->db->column("SELECT id FROM public.users WHERE email=:email AND password=:password", $vars);
		return $result;
	}

	private function HashPass(string $pass):string
	{
		return md5($pass . $this->secret);
	}
}