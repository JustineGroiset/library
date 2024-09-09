<?php

require_once "models/Model.class.php";
require_once "models/Dvd.class.php";



class DvdManager extends Model{
    private $dvds;


    public function addDvd($dvd){
        $this->dvds[] = $dvd;
    }



    public function getDvds(){
        return $this->dvds;
    }


    public function loadingDvds(){
        $req = $this->getBdd()->prepare("SELECT * FROM dvd ORDER BY id DESC");
        $req->execute();
        $dvds = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($dvds as $dvd){
            $l = new Dvd($dvd['id'],$dvd['title'],$dvd['image']);
            $this->addDvd($l);
        }
    }



}

?>