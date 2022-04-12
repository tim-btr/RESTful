<?php
return [
	//Главная страница, страница по-умолчанию
	'' => 'static/main',
	'api' => 'api/static/main',
	'api/([a-z]+)' => 'api/static/main/',
	'api/([a-z]+)/([0-9]+)' => 'api/static/main/',


	//Авторизация и регистрация
	'account/login' => 'account/login',
	'account/register' => 'account/register',
	'account/exit' => 'account/exit',
	'index.php\?module=account\&page=activate\&id=([0-9]+)\&hash=(.+)' => 'account/activate',

	//Панель администратора
	//'admin' => 'admin/static/main',
	//'admin/posts' => 'admin/posts/main',
	//'admin/posts/main' => 'admin/posts/main',
	//'admin/posts/edit-post/([a-z]+)/([0-9]+)' => 'admin/posts/edit-post/$1/$2',
	//'admin/posts/add-post' => 'admin/posts/add-post',
	//'admin/posts/delete/([a-z]+)/([0-9]+)' => 'admin/posts/delete/$1/$2',

	//'admin/users' => 'admin/users/main',
	//'admin/users/main' => 'admin/users/main',
	//'admin/users/edit-user/([a-z]+)/([0-9]+)' => 'admin/users/edit-user/$1/$2',
	//'admin/users/delete/([a-z]+)/([0-9]+)' => 'admin/users/delete/$1/$2',

	//'admin/account/login' => 'admin/account/login',

	//Ошибки
	'404' => 'errors/404',
];