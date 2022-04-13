<?php 
/**
 * @var $frontContr FrontController
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf8');

use modules\api\actions\user\GetAction;
use modules\api\actions\user\PostAction;
use modules\api\actions\user\PutAction;
use modules\api\actions\user\DeleteAction;
use modules\api\models\Access;

//Выдаём токен на запрос access в адресной строке
if(in_array('access', $frontContr->params)) {
    if(isset($_GET['phone'])) {
        Access::giveToken($_GET['phone']);
    } else {
        echo json_encode(['Phone number was not given']);
        exit;
    }
}

//Загружаем информацию из пришедшего JSON
$dataArray = (array)json_decode(file_get_contents("php://input"));

//В этом блоке проверям доступ.
//Берётся токен, пришедший из запроса и сравнивается с токеном который был
//записан в сессию 
if(!isset($_SESSION['api'])) {
    echo json_encode(['Access denied: ' => 'You are not authorized']);
    exit;
} else {
    Access::getAccess($dataArray);
}

//Выполняем действие в зависимости от метода, который пришёл
switch ($_SERVER['REQUEST_METHOD']) {
    
    //Получение записей
    case 'GET':
        header('Access-Control-Allow-Methods: GET');

        $action = new GetAction();

        //В параметре [2] получается id пользователя из url /api/users/4
        if(isset($frontContr->params[2]) && is_numeric($frontContr->params[2])) {
            $apiResult = $action->doAdditionalAction($dataArray, $frontContr->params[2]);
        } else {
            $apiResult = $action->doApiAction($dataArray);
        }

        //выводим результат
        echo json_encode($apiResult);
        exit;

    //Создание записей    
    case 'POST':

        header('Access-Control-Allow-Methods: POST');
       
        $action = new PostAction();

        $apiResult = $action->doApiAction($dataArray);

         //Получаем и выводим результат
        if(isset($apiResult['status'])) {
            http_response_code(201);
            echo json_encode($apiResult);
        } else {
            http_response_code(404);
            echo json_encode($apiResult);
        }
        exit;
        
    //Редактироваение записей    
    case 'PUT':

        header('Access-Control-Allow-Methods: PUT');
        
        $action = new PutAction();
        
        //Получаем id из uri и добавляем к общей информации
        if(isset($frontContr->params[2]) && is_numeric($frontContr->params[2])) {
            $dataArray['idApi'] = $frontContr->params[2];
            $apiResult = $action->doApiAction($dataArray);
        }

        //Получаем и выводим результат
        if(isset($apiResult['status'])) {
            http_response_code(200);
            echo json_encode($apiResult);
        } else {
            http_response_code(404);
            echo json_encode($apiResult);
        }
        exit;

    //Удалеие записей    
    case  'DELETE':
       
        header('Access-Control-Allow-Methods: DELETE');

        $action = new DeleteAction();

        //Получаем id из uri и добавляем к общей информации
        if(isset($frontContr->params[2]) && is_numeric($frontContr->params[2])) {
            $dataArray['idApi'] = $frontContr->params[2];
            $apiResult = $action->doApiAction($dataArray);
        }

        //Получаем и выводим результат
        if(isset($apiResult['status'])) {
            http_response_code(200);
            echo json_encode($apiResult);
        } else {
            http_response_code(404);
            echo json_encode($apiResult);
        }
        exit;

    default:
        die('Wrong Request Method');
}
