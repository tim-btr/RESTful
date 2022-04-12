<?php
use library\Helper;
use library\Db;

if(isset($_POST['phone'])) { 
	$res = Db::q("
		SELECT * FROM `users` WHERE
		`phone`    = '".Helper::es($_POST['phone'])."'
		LIMIT 1
	");

	if($res->num_rows) {
		$_SESSION['user'] = $res->fetch_array();
		
		header('Location: /');
		exit;
	} else {
		$status = '<p><b>Incorrect data</b></p>';
	}
}

