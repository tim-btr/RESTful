<?php 

namespace modules\api\actions\user2;

use interfaces\ApiActionInterface;
use modules\api\models\User\User;
use library\Db;

class PostAction implements ApiActionInterface
{
    /**
     * Вставка записей
     *
     * @param array $restData
     * @return array
     */
    public function doApiAction(array $restData) : array
    {
        $user = new User();

        if(isset($restData['name'], $restData['phone'])) {
            $user->name = $restData['name'];
            $user->phone = $restData['phone'];
            
            if($user->createUser()) {
               

                $data = [
                    'status' => 'Post created',
                    'id'     => Db::_()->insert_id,
                    'name'   => $user->name,
                    'phone'  => $user->phone,
                ];
                return $data;
            } else {
                return ['Post creating failed'];
            }
        } else {
            return ['No data transfered'];
        }
    }
}    