<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-01-15
 * Time: 20:37
 */

namespace Upload\Main;


class Path
{

    public function __construct($tmp)
    {
        $this->tmp = $tmp;
    }

    /**
     * Return dir path with location variable
     * @param $location
     * @return string
     */
    public function getPath($location = null){

        return __DIR__.$location;

    }

    /**
     * Move file to location with variable name
     * @param $name
     * @return bool
     */
    public function move($name){
        if(move_uploaded_file($this->tmp,$this->getPath().'/upload/'.$name)){
            return true;
        }else{
            return false;
        }
    }

}