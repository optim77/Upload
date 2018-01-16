<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-01-15
 * Time: 14:08
 */

namespace Upload\Size;
class Size
{

    public function __construct($size,$type)
    {
        $this->size = $size;
        $this->type = $type;
    }

    /**
     * Set the minimal and maximal size of the File
     * This method is independent of extend of extend of file
     * @param $minSize
     * @param $maxSize
     * @return bool
     * @throws \Exception
     */
    public function generalSize($minSize = 0,$maxSize = 800000){
        $s = $this->size;
        if($s >= $minSize && $s <= $maxSize){
            return true;
        }else{
            return "<div class='alert alert-danger'>Require size of file of between ".$minSize."kb - ".$maxSize."kb</div>";
        }

    }

    /**
     * Validation size dependent of file extension
     * Insert the value in formatSize like that array('image/jpeg' => [minSize,maxSize])
     * @param array $formatSize
     * @return bool|string
     */
    public function exactSize(array $formatSize = array()){
        if($formatSize != null){
            foreach ($formatSize as $name => $value){
                if($this->type == $name){
                    if ($this->size >= $value[0] && $this->size <= $value[1]){
                        return true;
                    }
                    else{
                        return "<div class='alert alert-danger'>Require size of file between ".$value[0]."kb  - ".$value[1]."kb</div>";
                    }
                }
            }
        }else{
            return "<div class='alert alert-danger'>Insert type and default size</div>";
        }
    }


}