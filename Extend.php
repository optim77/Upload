<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-01-15
 * Time: 12:45
 */

namespace Upload\Main;
use Upload\Main\Exception;
require 'Exception.php';
class Extend
{

    public function __construct($extends)
    {

        $this->extend = $extends;

    }

    /**
     * Return exactly format of file
     * @return mixed
     */
    public function exactFormat(){
        return $this->extend;
    }

    /**
     * Return format of general format of files
     * @param array $forbiddenFormats
     * @return string
     */
    public function generalFormat(array $forbiddenFormats = array()){
        $f = $this->extend;
        print_r($f);
        $flag = false;
        if($forbiddenFormats != null){
            foreach ($forbiddenFormats as $key){

                if ($key == $f){
                    $Exception = new Exception();
                    return $Exception->wrongFormatException();
                    break;
                }else{
                    $flag = true;
                }
            }
        }
            if ($f == 'image/jpeg' || $f == 'image/gif' || $f == 'image/png' || $f == 'image/bmp'){
                return 'image';
            }
            elseif ($f == 'audio/mp4' || $f == 'audio/mpeg' || $f == 'audio/tone' || $f == 'audio/ac3'){
                return 'audio';
            }
            elseif ($f == 'video/ogg' || $f == 'video/JPEG' || $f == 'video/H261' || $f == 'video/3gpp'){
                return 'video';
            }
    }


}