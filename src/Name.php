<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-01-15
 * Time: 18:05
 */

namespace Upload\Main;


class Name
{

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Return the new name with the same extension
     * @param $length
     * @return string
     */
    public function randomName($length = 30){
        $length = intval($length);
        $length = floor($length);
        $explode = explode('.',$this->name);
        $ext = end($explode);
        $name = sha1(uniqid(null,true));
        $newName = substr($name,0,$length);
        return $newName.'.'.$ext;
    }

    /**
     * Return the name of file without danger chars
     * @return string
     */
    public function stripName(){
        $explode = explode('.',$this->name);
        $ext = end($explode);
        $text = $explode[0];
        $text = preg_replace('~[^\pL\d]+~u', '-', $explode[0]);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        return $text.'.'.$ext;
    }

}