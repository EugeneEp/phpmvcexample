<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
	public function getProducts()
	{
		$result = $this->db->row("SELECT * FROM public.products WHERE user_id=:user_id", ["user_id"=>$_SESSION['id']]);
		return $result;
	}
}