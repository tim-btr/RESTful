<?php
use library\Helper;

//setcookie('auth_id',(int)$_SESSION['user']['id'],time()-1500,'/');
//setcookie('auth_hash',Helper::myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']),time()-1500,'/');
session_unset();
session_destroy();
header('Location: /'); 
exit;