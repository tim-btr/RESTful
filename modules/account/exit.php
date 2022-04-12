<?php
setcookie('auth_id',(int)$_SESSION['user']['id'],time()-1500,'/');
setcookie('auth_hash',myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']),time()-1500,'/');
session_unset();
session_destroy();
header('Location: /'); 
exit;