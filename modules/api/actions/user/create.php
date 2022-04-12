<?php

use modules\api\models\User\User;
use library\Db;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json; charset=utf8');


$user = new User();

$data = json_decode(file_get_contents("php://input"));

if(isset($data->name, $data->phone)) {
    $user->name = $data->name;
    $user->phone = $data->phone;
    
    if($user->createUser()) {
        http_response_code(201);
        echo json_encode([
            'Status' => 'Post created',
            'id'     => Db::_()->insert_id,
            'name'   => $user->name,
            'phone'  => $user->phone,
         ]);
        exit;
    } else {
        echo json_encode(['Status' => 'Post creating failed']);
        exit;
    }
} else {
    exit('No data transfered');
}
