<?php

namespace Upload\Main;
use Upload\Main\Extend;
require 'Extend.php';
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
     * @return null|string
     */
    public function Ex($exact,$general,array $forbidden = array()){
	    $Extend = new Extend($this->type);
	    $result = null;
	    if($exact == true){
            $result = $Extend->generalFormat($forbidden);
            print_r($result);
        }elseif ($general == true){
            $result = $Extend->generalFormat($forbidden);
        }else{
            Exception::typeOfExtends();
        }

        return $result;

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


