<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		$this->view->render('Main page', []);
	}

	public function loginAction()
	{
		$result = $this->model->login();
		if(isset($result) && $result){
			$_SESSION['id'] = $result;
			$this->view::location('/user/profile');
		}else
			$this->view::Error(404, 'Email or password is invalid');
	}

	public function logoutAction()
	{
		unset($_SESSION["id"]);
		session_unset();
		session_destroy();
		$this->view::location('/');
	}
}