<?php 
/**
 * @var $frontContr FrontController
 */


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($frontContr->params[2]) && is_numeric($frontContr->params[2])) {
            include "./modules/api/actions/user/get-single.php";
        } else {
            include "./modules/api/actions/user/get.php";
        }
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
        die('Wrong Request Method');
}
  