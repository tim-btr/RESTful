<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/css/custom.css">';

if(isset($_SESSION['user'], $_GET['key1']) && $_SESSION['user']['id']== $_GET['key1']) {
	$result = q("
		SELECT * FROM `users`
		WHERE `id` = '".(int)$_GET['key1']."'
		LIMIT 1
    ");

    $row = $result->fetch_assoc();  
    $result->close();
} else {
	$notice = 'У вас нет прав доступа к этой странице.';
}

if(isset($_SESSION['notice'])){
	$notice = $_SESSION['notice'];
	unset($_SESSION['notice']);
}

