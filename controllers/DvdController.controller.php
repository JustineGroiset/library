<?php

require_once "models/DvdManager.class.php";
class DvdController{

    private $dvdManager;

    public function __construct(){
        $this->dvdManager = new DvdManager;
        $this->dvdManager->loadingDvds();

    }
    

    public function showDvd(){
        $dvds = $this->dvdManager->getDvds();
        require "views/dvd.view.php";
    }
}

?>