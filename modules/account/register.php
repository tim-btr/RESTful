<?php
use library\Helper;
use library\Db;

if(isset($_POST['name'], $_POST['phone']) ) {
	$errors = [];
	
	if(empty($_POST['name'])) {
		$errors['name'] = 'Name field is empty';
	} elseif(mb_strlen($_POST['name']) < 3) {
		$errors['name'] = 'Name is too short';
	} elseif(mb_strlen($_POST['name']) > 25) {
		$errors['name'] = 'Name is too long';
	}

	if(empty($_POST['phone'])) {
		$errors['phone'] = 'Phone field is empty';
	} elseif(mb_strlen($_POST['phone']) > 12 || mb_strlen($_POST['phone']) < 12) {
		$errors['phone'] = 'Allowed format only: +79996661323';
	} 
	
	//Выявляем пользователя с подобным телефоном
	if(count($errors) == 0) {
		$res = Db::q("
			SELECT * FROM `users`
			WHERE `phone` = '".Helper::es($_POST['phone'])."'
			LIMIT 1
		");
		if($res->num_rows) {
			$errors['phone'] = 'User with such phone is already exist';
		}		
	}
	
	if(count($errors) == 0) {
		$query = "INSERT INTO `users` SET
			`name`     = '".Helper::es($_POST['name'])."',
			`phone`    = '".Helper::es($_POST['phone'])."',
			`token`     = '".Helper::es(Helper::myHash($_POST['name'].$_POST['phone']))."'
		";

		
		if(Db::q($query)) {
			$_SESSION['register'] = true;
		} else {
			die(mysqli_error($link));
		}

		$id = Db::_()->insert_id;
		header('Location: /');
		exit;
	}
}