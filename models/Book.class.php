<?php 

class Book{
    private int $idBook;
    private string $titleBook;
    private int|null $numberPageBook;
    private string $imageBook;

    public function __construct($idBook, $titleBook, $numberPageBook = null, $imageBook){
        $this->idBook = $idBook;
        $this->titleBook = $titleBook;
        $this->numberPageBook = $numberPageBook;
        $this->imageBook = $imageBook;
    }

    public function getId(){
        return $this->idBook;
    }
    public function setId(int $idBook){
        $this->idBook = $idBook;
    }


    public function getTitle(){
        return $this->titleBook;
    }
    public function setTitle(string $titleBook){
        $this->titleBook = $titleBook;
    }


    public function getNbPage(){
        return $this->numberPageBook;
    }
    public function setNbPage(int $numberPageBook){
        $this->numberPageBook = $numberPageBook;
    }


    public function getImage(){
        return $this->imageBook;
    }
    public function setImage(string $imageBook){
        $this->imageBook = $imageBook;
    }

 

}