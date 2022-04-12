<?php
Core::$CSS[] = '<link rel="stylesheet" href="/css/custom.css">';

if (isset($_GET['key1']) && $_GET['key1'] == 'edit') {
	$res = q("
		SELECT * FROM `users`
		WHERE `id` = '".(int)$_GET['key2']."'
		LIMIT 1
	");
 
	$row = $res->fetch_assoc();
}

//удаление фотографии и записи из таблицы
if (isset($_GET['key1']) && $_GET['key1'] == 'delete') {
	$res = q("
		SELECT `profile-pic` FROM `users`
		WHERE  `id` = '".(int)$_GET['key2']."'
		LIMIT 1
	");

	$row = $res->fetch_assoc();

	unlink('.'.$row['profile-pic']);

	q("
		UPDATE `users`
		SET    `profile-pic`  = ''
		WHERE  `id` = '".(int)$_GET['key2']."'
		LIMIT 1
	");
 
	$_SESSION['notice'] = 'Данные пользователя были успешно отредактированы';
	header('Location: /cabinet/main/');
	exit();
}


if (isset($_POST['name'],$_POST['login'],$_POST['pass'],$_POST['email'],$_POST['age'],$_POST['sex'])) {
	$error = array();

	if(empty($_POST['name'])){
		$error['name'] = 'Не заполнено имя';
	}

	if(empty($_POST['login'])) {
		$error['login'] = 'Не заполнен логин';
	} elseif(mb_strlen($_POST['login']) < 2) {
		$error['login'] = 'Логин слишком короткий';
	} elseif(mb_strlen($_POST['login']) > 12) {
		$error['login'] = 'Логин слишком длинный';
	}

	if(empty($_POST['pass'])) {
		$password = $row['password'];
	} elseif (mb_strlen($_POST['pass']) > 8) {
		$error['pass'] = 'Пароль слишком длинный';
	} elseif (mb_strlen($_POST['pass']) < 3) {
		$error['pass'] = 'Пароль слишком короткий';
	} else{
		$password = myHash($_POST['pass']);
	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error['email'] = 'Не заполнен емейл или он некорректен';
	}

	if(count($error) == 0){
		$res = q("
			SELECT * FROM `users` 
			WHERE `id`       <> ".(int)$_GET['key2']."
			AND   `login`    = '".escStr($_POST['login'])."'
			LIMIT 1
		");

		if($res->num_rows() ){
			$errors['login'] = 'Пользователь с таким логином уже существует';
		}

		$res = q("
			SELECT * FROM `users` 
			WHERE `id`       <> ".(int)$_GET['key2']."
			AND   `email`    = '".escStr($_POST['email'])."'
			LIMIT 1
		");

		if($res->num_rows() ){
			$error['email'] = 'Пользователь с такой эл. почтой уже существует';
		}		
	}

	$res->close();
	//----------------------------------------------
	//работа с классом по ресайзу
	//----------------------------------------------
	$resObj = new Resize;  
	$resObj->img_path  = '/img/users/';


	$resObj->uploadNResize($_FILES['file']['name'], $_FILES['file']['tmp_name'], $_FILES['file']['error'], $_FILES['file']['size']);

	$link = $resObj->imgResize($resObj->name, $resObj->extent, $resObj->width, $resObj->height, 200, 200);

	//unlink('.'.$resObj->name);

	if(isset($resObj->error) && $resObj->error != '') {
		$error['file'] = $resObj->error;
	}	

	//----------------------------------------------
	//заносим все в БД
	//----------------------------------------------
	if(count($error) == 0){
		q("
			UPDATE `users` SET 
			`name` = '".escStr($_POST['name'])."',
			`login` = '".escStr($_POST['login'])."',
			`password` = '".escStr($password)."',
			`email` = '".escStr($_POST['email'])."',
			`age` = ".(int)$_POST['age'].",
			`sex` = '".escStr($_POST['sex'])."',
			`profile-pic` = '".escstr($link)."'
			WHERE `id` = ".(int)$_GET['key2']
		);

		$_SESSION['notice'] = 'Данные пользователя были успешно отредактированы';
		header('Location: /cabinet/main/');
		exit();
	}
} 

if(isset($_SESSION['notice'])){
	$notice = $_SESSION['notice'];
	unset($_SESSION['notice']);
}