<?php 

namespace modules\api\actions\user;

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
        $model = new User();

        if(isset($restData['name'], $restData['phone'])) {
            $model->name = $restData['name'];
            $model->phone = $restData['phone'];
            
            if($model->createUser()) {
                $data = [
                    'status' => 'Post created',
                    'id'     => Db::_()->insert_id,
                    'name'   => $model->name,
                    'phone'  => $model->phone,
                ];
                return $data;
            } else {
                return ['Post creating failed: ' => 'Phone alredy exists'];
            }
        } else {
            return ['No data transfered'];
        }
    }
}    