<?php
/**
 * @var $frontContr FrontController
 */
use modules\api\models\User\User;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf8');

$model = new User();

//Определяем id 
$model->setId(isset($frontContr->params[2]) ? $frontContr->params[2] : exit('NO id parameter'));

$user = $model->getSingleUser();

echo json_encode($user);
exit;
