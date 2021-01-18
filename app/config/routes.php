<?php

	return [
		'/index' => [
			'method'=>'GET',
			'controller'=>'main',
			'action'=>'index',
			'auth'=>false
		],
		'/login' => [
			'method'=>'POST',
			'controller'=>'main',
			'action'=>'login',
			'auth'=>false
		],
		'/logout' => [
			'method'=>'GET',
			'controller'=>'main',
			'action'=>'logout',
			'auth'=>false
		],
		'/user/profile' => [
			'method'=>'GET',
			'controller'=>'user',
			'action'=>'profile',
			'auth'=>true
		]
	];