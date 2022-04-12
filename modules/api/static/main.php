<?php 
$uri = explode('/', $_GET['route']);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        include "./modules/api/actions/user/get.php";
        break;
    case 'POST':
        include "./modules/api/actions/user/create.php";
        break;
    case 'PUT':
        include "./modules/api/actions/user/update.php";
        break;
    case  'DELETE':
        include "./modules/api/actions/user/delete.php";
        break; 
    default:
        die('Wrong method');
}
  