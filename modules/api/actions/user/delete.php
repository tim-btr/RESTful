<?php
/**
 * @var $frontContr FrontController
 */

use modules\api\models\User\User;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Content-Type: application/json; charset=utf8');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$user = new User();

//$data = json_decode(file_get_contents("php://input"));

if(isset($frontContr->params[2])) {
    $user->id = $frontContr->params[2];

    if($user->deleteUser()) {
        echo json_encode(['Status' => 'Post deleted']);
        exit;
    } else {
        echo json_encode(['Status' => 'Post deleting failed']);
        exit;
    }
} else {
    exit('No data transfered');
}