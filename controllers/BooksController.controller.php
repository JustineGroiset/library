<?php
require_once "models/BookManager.class.php";


class BooksController{

    private $bookManager;

    public function __construct(){
        $this->bookManager = new BookManager;
        $this->bookManager->loadingBooks();

    }
    
    public function showBooks(){
        $books = $this->bookManager->getBooks();
        require "views/books.view.php";
        unset($_SESSION['alert']);
    }

    public function showBook($idBook){
        $book = $this->bookManager->getBookById($idBook);
        require "views/showBook.view.php";
    }

    public function addBook(){
        require "views/addBook.view.php";
    }
    
    public function addBookValidation(){
        $file = $_FILES['inputImgBook'];
        $repertoire = "public/images/";
        $nameAddImage = $this->addImage($file,$repertoire);
        $this->bookManager->addBookToBdd($_POST['inputTitleBook'],$_POST['inputNbPage'],$nameAddImage);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajouté réalisé"
        ];

        header('Location: '. URL . "livres");
    }


    public function modifyBook($idBook){
        $book = $this->bookManager->getBookById($idBook);
        require "views/modifyBook.view.php";
    }

    public function modifyValidationBook(){
        $actualImg = $this->bookManager->getBookById($_POST['identification'])->getImage();

        $file = $_FILES['inputImgBook'];

     

        if($file['size'] > 0){
            unlink("public/images/".$actualImg);
            $repertoire = "public/images/";
            $nameAddImage = $this->addImage($file,$repertoire);
        }
        else{
            $nameAddImage = $actualImg;
        }
        $this->bookManager->modifyBookBdd($_POST['identification'],$_POST['inputTitleBook'],$_POST['inputNbPage'],$nameAddImage);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée"
        ];

        header("Location: ".URL.'livres');
        


    }

    public function removeBook($id){
        $nameImage = $this->bookManager->getBookById($id)->getImage();
        unlink("public/images/".$nameImage);
        $this->bookManager->removeBookBdd($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée"
        ];


        header('Location: '. URL . "livres");
    }


    private function addImage($file, $dir){
        if(!isset($file['name']) || empty($file['name'])){
            throw new Exception("Vous devez indiquer une image");
        }
        if(!file_exists($dir)){
            mkdir($dir, 0777); // droits d'accès - si le répertoire public/images n'existe pas alors il va le créer 
        } 

        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file['tmp_name'])){
            throw new Exception("Le fichier n\'est pas une image");
        }

        if($extension !== "jpg" && $extension != "jpeg" && $extension != "webp" && $extension != "png"){
            throw new Exception("L'extension du fichier n'est pas reconnu. Merci d'importer un fichier en jpg, jpeg, webp ou png uniquement.");
        }

        if(file_exists($target_file)){
            throw new Exception("Le fichier existe déjà.");
        }

        if($file['size'] > 500000){
            throw new Exception("Le fichier est trop volumineux");
        }

        if(!move_uploaded_file($file['tmp_name'], $target_file)){
            throw new Exception("L'ajout de l'image n'a pas fonctionné.");
        }
        else return ($random."_".$file['name']);     
    }

}