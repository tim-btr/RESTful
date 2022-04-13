<?php 

namespace modules\api\models;

use library\Db;
use library\Helper;

class Access 
{
    /**
     * Выдача токена
     *
     * @param string $phone
     * @return void
     */
    public static function giveToken(string $phone)
    {
        //Получаем пользователя по номеру телефона
        $query = "SELECT `id`, `token` FROM `users` WHERE `phone` = '+".Helper::es($phone)."' LIMIT 1";
        $result = Db::q($query);

        $row = $result->fetch_assoc();

        //Выдаём токен и запоминаем пользователя в сессии, если был найден
        if($result->num_rows) {
			$_SESSION['api']['id'] = $row['id'];
			$_SESSION['api']['token'] = $row['token'];

            echo json_encode([
                'Your id' => $row['id'],
                'Your token' => $row['token']
            ]);
            exit;
        } else {
            echo json_encode(['User with such number does not exist']);
            exit;
        }
        
    }

    /**
     * Запрещаем доступ, если токены не совпали либо если он не был передан
     *
     * @param array $restData
     * @return void
     */
    public static function getAccess(array $restData)
    {
        if(!isset($restData['token'])) {
            echo json_encode(['Access denied: ' => 'Token is not given']);
            exit;
        } else {
            if($restData['token'] != $_SESSION['api']['token']) {
                echo json_encode(['Access denied: ' => 'Wrong token']);
                exit;
            }
        }
    }
}