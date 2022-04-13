<?php 

namespace modules\api\actions\user;

use interfaces\ApiActionInterface;
use modules\api\models\User\User;

class GetAction implements ApiActionInterface
{
   
    /**
     * Получение данных
     * @param array $restData
     * @param [int] $id
     * @return array
     */
    public function doApiAction(array $restData) : array 
    {
        $model = new User();
        $usersList = $model->getUsers();

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
           
            return $data;
        } 

        return ['No users found'];
    }

    /**
     * Поиск пользователя по $id
     *
     * @param array $restData
     * @param [int] $id
     * @return array
     */
    public function doAdditionalAction(array $restData, $id) : array
    {
        $model = new User();

        //Определяем id 
        $model->setId(isset($id) ? $id : exit('NO id parameter'));
        
        $user = $model->getSingleUser();
        
        if($user) {
            return $user;
        }       
        
        return ['No user found'];
    }
}