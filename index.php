<?php
error_reporting(-1);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

session_start();
ob_start();

use config\Core;

//Autoload
include './config/autoload.php';
include './config/config.php';

$frontContr = new \FrontController;
if(!$frontContr->init()) {
	header('Location: /404');
	exit;
}

include './'.Core::$MODEL.'/allpages.php';

//ckecking if file from routes exists
if(!file_exists('./'.Core::$MODEL.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./'.Core::$MODEL.'/'.$_GET['module'].'/view/'.$_GET['page'].'.php')) {
	header('Location: /404');
	exit;
}

//backend file
include './'.Core::$MODEL.'/'.$_GET['module'].'/'.$_GET['page'].'.php';

//view file
include './'.Core::$MODEL.'/'.$_GET['module'].'/view/'.$_GET['page'].'.php';

$content = ob_get_contents();
ob_end_clean();

//index file
include './skins/'.Core::$SKIN.'/index.php';
