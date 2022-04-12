<?php 
/**
 * @var $frontContr FrontController
 */

use modules\api\models\User\User;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Content-Type: application/json; charset=utf8');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$user = new User();

$data = json_decode(file_get_contents("php://input"));

if(isset($frontContr->params[2], $data->name, $data->phone)) {
    $user->id = $frontContr->params[2];
    $user->name = $data->name;
    $user->phone = $data->phone;

    if($user->updateUser()) {

        echo json_encode([
            'Status' => 'Post updated'
        ]);
        exit;
    } else {
        echo json_encode(['Status' => 'Post updating failed']);
        exit;
    }
} else {
    exit('No data transfered');
}