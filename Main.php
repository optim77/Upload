<?php

namespace Upload\Main;

use Upload\Extend;
use Upload\Size\Size;

require 'Extend.php';
require 'Size.php';
require 'Name.php';
require 'Path.php';
class Main{

	
	public function __construct($file){

		$this->file = $file;
		$this->name = $file['file']['name'];
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
     * Return name of the file with extension
     * If randomName is true return random name with unique + insert lengthRandomName
     * If stripName is true return original name without danger chars do not have to insert lengthRandomName
     * @param $randomName
     * @param $stripName
     * @param int $lengthRandomName
     * @return string
     */
    public function Name($randomName,$stripName,$lengthRandomName = 30){
        $Name = new Name($this->name);
        if($randomName == true){
            return $Name->randomName($lengthRandomName);
        }
        elseif ($stripName == true){
            return $Name->stripName();
        }
    }

    /**
     * Move file to such location as on variable
     * @param null $location
     * @param $name
     * @return bool
     */
    public function Move($location = null,$name){
        $Move = new Path($this->tmp);
        $Move->getPath($location);
        if($Move->move($name)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Default options to upload file
     */
    public function oneHandUpload($extendExact = false,$extendGeneral = true,array $forbiddenExt = array(),$generalSize = true,$exactSize = false,$minSizeGeneral = 0,$maxSizeGeneral = 800000,$randomName = true,$stripName = false,$lengthName = 30,$location = null,$name = null){

        if($this->checkError()){
            $info = array();
            $info['type'] = $this->Extend($extendExact,$extendGeneral,$forbiddenExt);
            $info['size'] =$this->Size($generalSize,$exactSize,$minSizeGeneral,$maxSizeGeneral);
            $name = $this->Name($randomName,$stripName,$lengthName);
            $info['name'] = $name;
            $this->Move($location,$name);
            return $info;
        }else{
            return "<div class='alert alert-danger'>Ups... Something wrong</div>";
        }

    }

}


