<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-01-15
 * Time: 13:08
 */

namespace Upload\Main;


class Exception
{
    /**
     * Display errors from method generalFormat in Upload\Extend
     * @return string
     */
    public function wrongFormatException(){
        return  "<div class='alert alert-danger'>Introduced wrong format of file</div>";
    }

    /**
     * Display errors form method Ex in Upload\Main
     * @return string
     */
    public function typeOfExtends(){
        return  "<div class='alert alert-danger'>Introduced the type of extends</div>";
    }

}