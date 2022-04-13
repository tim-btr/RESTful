<?php 

namespace modules\api\actions\user;

use interfaces\ApiActionInterface;
use modules\api\models\User\User;

class PutAction implements ApiActionInterface
{
    /**
     * Изменение записи
     * 
     * @param array $restData
     * @param [int] $id
     * @return array
     */
    public function doApiAction(array $restData) : array
    {
        $model = new User();

        if(isset($restData['idApi'], $restData['name'], $restData['phone'])) {
            $model->id = $restData['idApi'];
            $model->name = $restData['name'];
            $model->phone = $restData['phone'];
        
            if($model->updateUser()) {
                $data = [
                    'status' => 'Post updated',
                ];
                return $data;
            } else {
                return ['Post updating failed'];
            }
        } else {
            return ['No data transfered'];
        }
    }
}