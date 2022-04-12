<?php
use library\Helper;
use library\Db;

if(isset($_POST['login'], $_POST['pass'])) { 
	$res = Db::q("
		SELECT * FROM `users` WHERE
		`login`    = '".Helper::es($_POST['login'])."' AND 
		`password` = '".Helper::es(Helper::myHash($_POST['pass']))."' AND 
		`active`   = 1
		LIMIT 1
	");
	if($res->num_rows) {
		$_SESSION['user'] = $res->fetch_array();
		$login = 'ok';
		
		if(isset($_POST['rememberme'])) {
			setcookie('auth_id',(int)$_SESSION['user']['id'],time()+1500,'/');
			$_COOKIE['auth_id'] = (int)$_SESSION['user']['id'];
			
			setcookie('auth_hash', Helper::es(Helper::myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']),time()+1500,'/'));
			$_COOKIE['auth_hash'] = Helper::es(Helper::myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']));
			
			Db::q("
				UPDATE `users` SET 
				`hash`     = '".Helper::es(Helper::myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']))."',
				`addition` = '".Helper::es(Helper::myHash($_SERVER['HTTP_USER_AGENT']))."'
				WHERE
				`id`    = ".(int)$_SESSION['user']['id']." AND 
			    `login` = '".Helper::es($_SESSION['user']['login'])."'
			");
		}
		header('Location: /');
		exit;
	} else {
		$status = '<p><b>Неправильные данные</b></p>';
	}
}

