<?php 
/**
 * @var $frontContr FrontController
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf8');

use modules\api\actions\user2\GetAction;
use modules\api\actions\user2\PostAction;

$dataArray = (array)json_decode(file_get_contents("php://input"));


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        header('Access-Control-Allow-Methods: GET');

        $action = new GetAction();

        //В параметре [2] получается id пользователя из url /api/users/4
        if(isset($frontContr->params[2]) && is_numeric($frontContr->params[2])) {
            $apiResult = $action->doAdditionalAction($dataArray, $frontContr->params[2]);
        } else {
            $apiResult = $action->doApiAction($dataArray);
        }

        echo json_encode($apiResult);
        exit;
    case 'POST':

        header('Access-Control-Allow-Methods: POST');
       
        $action = new PostAction();

        $apiResult = $action->doApiAction($dataArray);

        if(isset($apiResult['status'])) {
            http_response_code(201);
            echo json_encode($apiResult);
        } else {
            http_response_code(404);
            echo json_encode($apiResult);
        }
        exit;
        
    case 'PUT':
        include "./modules/api/actions/user/update.php";
        break;
    case  'DELETE':
        include "./modules/api/actions/user/delete.php";
        break; 
    default:
        die('Wrong Request Method');
}

/*switch ($_SERVER['REQUEST_METHOD']) {
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
}*/
  