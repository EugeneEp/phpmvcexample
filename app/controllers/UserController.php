<?php

namespace app\controllers;

use app\core\Controller;

class UserController extends Controller
{
	public function profileAction()
	{
		$result = $this->model->getProducts();

		$this->view->render('Profile', [
			'products'=>$result
		]);
	}
}