<?php

session_start();

define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http") ."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "controllers/BooksController.controller.php";
require_once "controllers/DvdController.controller.php";

$bookController = new BooksController;
$dvdController = new DvdController;


try{

    if(empty($_GET['page'])){
        require "views/homepage.view.php";
    }
    else{
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    
        switch($url[0]){
            case 'homepage' : require "views/homepage.view.php";
            break;
            case 'accueil' : require "views/homepage.view.php";
            break;
            case 'books' : $bookController->showBooks();
            break;
            case 'livres' : 
                if(empty($url[1])){
                    $bookController->showBooks();
                }
                else if($url[1] === "l"){
                    $bookController->showBook($url[2]);
                }
                else if($url[1] === "a"){
                    $bookController->addBook();
                }
                else if($url[1] === "av"){
                    $bookController->addBookValidation();
                }
                else if($url[1] === "m"){
                    $bookController->modifyBook($url[2]);
                }
                else if($url[1] === "mv"){
                    $bookController->modifyValidationBook();
                }
                else if($url[1] === "s"){
                    $bookController->removeBook($url[2]);
                }
                else{
                    throw new Exception("La page n'existe pas");
                }
            break;
            case 'dvd' : $dvdController->showDvd();
            break;
            default: throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.view.php";
}
?>