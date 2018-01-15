<?php

namespace Upload\Main;

use Upload\Extend;
use Upload\Size\Size;

require 'Extend.php';
require 'Size.php';

class Main{

	
	public function __construct($file){

		$this->file = $file;
		//print_r($this->file);
		$this->name = $this->file['file']['name'];
		$this->type = $file['file']['type'];
		$this->tmp = $file['file']['tmp_name'];
		$this->error = $file['file']['error'];
		$this->size = $file['file']['size'];

	}

	public function getSize($file){
	
		$size  = $this->file();
	}

    /**
     * Check the error field from file
     *
     * @throws \Exception
     */
	public function checkError(){

	    if ($this->error != 0){
	        throw new \Exception('Error');
        }
        else{
	        return true;
        }
    }

    /**
     * Return result of format file
     * Variables exact and general are types of defined extends
     * Variable forbidden is a banned formats of files
     * @param $exact
     * @param $general
     * @param array $forbidden
     * @return null|string
     * @throws \Exception
     */
    public function Extend($exact,$general,array $forbidden = array()){
	    $Extend = new Extend\Extend($this->type);
	    $result = null;
	    if($exact == true){
            $result = $Extend->generalFormat($forbidden);
        }elseif ($general == true){
            $result = $Extend->generalFormat($forbidden);
        }else{
            throw new \Exception("<div class='alert alert-danger'>Introduced the type of extends</div>");
        }
        return $result;
    }

    /**
     * Return validation of file size
     * If choose general insert min and max size general, it return true or exception
     * If choose exact insert exactFormatSizes insert values like that array('image/jpeg' => [minSize,maxSize])
     * @param $general
     * @param $exact
     * @param int $minSizeGeneral
     * @param int $maxSizeGeneral
     * @param array $exactFormatSizes
     * @return bool|string
     */
    public function Size($general,$exact,$minSizeGeneral = 0,$maxSizeGeneral = 80000,array $exactFormatSizes = array()){
        $Size = new Size($this->size,$this->type);
        if($general == true){
            return $Size->generalSize($minSizeGeneral,$maxSizeGeneral);
        }
        elseif ($exact == true){
            return $Size->exactSize($exactFormatSizes);
        }
    }

    /**
     * Whole action to upload one file:
     * extends
     * maxSize
     * pathToFile
     * RenameFile
     * Alerts
     */
    public function oneHandUpload(){

    }

}


