<?php 

namespace library;

use library\Db;

/**
 * Функции - оболочки для обработки массивов
 * trimAll
 * intAll
 * floatAll
 * hc
 * es
 */
class Helper 
{
    /**
     * Обрезка символов по краям строки
     *
     * @param [type] $el
     * @param string $char
     * @return string
     */
    public static function trimAll(string $el, $char = ' ') : string
    {
        if(!is_array($el)) {
            $el = trim($el, $char);
        } else {
            $el = array_map('trimAll',$el);
        }
        return $el;
    }

    /**
     * Приведение к целому числу
     *
     * @param [type] $el
     * @return integer
     */
    public static function intAll($el) : int
    {
        if(!is_array($el)) {
            $el = (int)($el);
        } else {
            $el = array_map('intAll',$el);
        }
        return $el;
    }

    /**
     * Обёртка для htmlspecialchars
     *
     * @param [type] $el
     * @return string
     */
    public static function hc($el) : string
    {
        if(!is_array($el)) {
            $el = htmlspecialchars($el);
        } else {
            $el = array_map('hc',$el);
        }
        return $el;
    }

    /**
     * Обёртка для mysqli_real_escape_string
     */
    public static function es($el,$key = 0)
    {
        return Db::_($key)->real_escape_string($el);
    }

    
    /**
     * Хэширование (для паролей гл. образом)
     */
    public static function myHash($var, $salt = 'mmorpg', $salt2 = 'wtfiamdhere') {
        return crypt(md5($var.$salt),$salt2);
    }
}