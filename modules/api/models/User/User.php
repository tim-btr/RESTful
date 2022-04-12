<?php

namespace modules\api\models\User;

use PDO;
use library\Db;
use library\Helper;

class User 
{
    /**
     * Contains \config\Db
     * @var object
     */
    private $con;

    private $table = 'users';

    public $id;
    public $title;
    public $text;
    public $created_at;
    public $updated_at;
 
    /**
     * @return object 
     */
    public function getUsers()
    {
        $query = "SELECT * FROM `".$this->table."` ORDER BY `id` DESC";

        $stmt = Db::q($query);
        
        return $stmt;
    }

    /**
     * @return array
     */
    public function getSingleUser() : array
    {
        $query = "SELECT * FROM `".$this->table."` 
            WHERE `id` = ".(int)$this->id;

        $stmt = Db::q($query);

        $row = $stmt->fetch_assoc();
        
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->created_at = $row['created_at'];

        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'created_at' => $this->created_at,
        ];
        return $data;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function createUser() : bool
    {
        $query = "
            INSERT INTO `".$this->table."` SET
            `name`  = '".Helper::es($this->name)."',
            `phone` = '".Helper::es($this->phone)."',
            `token`      = '".Helper::myHash($this->name.$this->phone)."'
        ";

        if(Db::q($query)) {
            return true;
        }

        return false;
    }

    /**
     * @return boolean
     */
    public function updateUser() : bool
    {
        $query = "
            UPDATE `".$this->table."` SET
                `name` = '".Helper::es($this->name)."',
                `phone` = '".Helper::es($this->phone)."',
                `updated_at` = NOW()
            WHERE
                `id` = ".(int)$this->id;
        
        if(Db::q($query)) {
            return true;
        }

        return false;
    }

    /**
     * @return boolean
     */
    public function deleteUser() : bool
    {
        $query = "
            DELETE FROM `".$this->table."` 
            WHERE
                `id` = ".(int)$this->id;

        if(Db::q($query)) {
            return true;
        }

        return false;
    }

    /**
     * @param integer $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = (int)$id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }
}