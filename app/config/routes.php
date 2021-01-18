<?php

	return [
		'' => [
			'controller'=>'main',
			'action'=>'index',
			'auth'=>false
		],
		'/login' => [
			'controller'=>'main',
			'action'=>'login',
			'auth'=>false
		],
		'/logout' => [
			'controller'=>'main',
			'action'=>'logout',
			'auth'=>false
		],
		'/user/profile' => [
			'controller'=>'user',
			'action'=>'profile',
			'auth'=>true
		]
	];