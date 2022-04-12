<?php
if(isset($_GET['hash'])) {
	q("
		UPDATE `users` SET 
		`active` = 1, 
		`role` = 'user'
		WHERE `hash` = '".es($_GET['hash'])."'
		AND   `id`   = ".(int)$_GET['id']
	);  
	
	$notice = 'Ваша учётная запись активирована';
	
	$res = q("
		SELECT * FROM `users` 
		WHERE `id`   = ".(int)$_GET['id']."
		AND `active` = 1
		LIMIT 1
	");
	if($res->num_rows) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
	}
} else {
	$notice = 'Вы прошли по неверной ссылке';
}