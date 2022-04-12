<?php

use modules\api\models\User\User;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf8');

$user = new User();

$usersList = $user->getUsers();

if($usersList ->num_rows != 0) {
    $data = [];

    //Вытаскиваем из базы всех пользователей
    while($row = $usersList->fetch_assoc()) {
        array_push($data, [
            'id' => $row['id'],
            'name' => $row['name'],
            'phone' => $row['phone'],
            'created_at' => $row['created_at'],
        ]);
    }
    echo json_encode($data);
    exit;
} else {
    echo json_encode([
        'No users found'
    ]);
    exit;
}