<?php 

namespace modules\api\actions\user;

use interfaces\ApiActionInterface;
use modules\api\models\User\User;

class DeleteAction implements ApiActionInterface
{
    /**
     * Удаление записи
     *
     * @param array $restData
     * @return array
     */
    public function doApiAction(array $restData) : array
    {
        $model = new User();

        if(isset($restData['idApi'])) {
            $model->id = $restData['idApi'];

            if($model->deleteUser()) {
                return ['status' => 'Post deleted'];
            } else {
                return ['Post deleting failed'];
            }
        } else {
            return ['No data transfered'];
        }
    }
}    