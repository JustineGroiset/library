<?php


require_once "models/Model.class.php";
require_once "models/Book.class.php";


class BookManager extends Model{
    private $books;


    public function addBook($book){
        $this->books[] = $book;
    }



    public function getBooks(){
        return $this->books;
    }


    public function loadingBooks(){
        $req = $this->getBdd()->prepare("SELECT * FROM books ORDER BY id");
        $req->execute();
        $books = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($books as $book){
            $l = new Book($book['id'],$book['title'],$book['nbPages'],$book['image']);
            $this->addBook($l);
        }
    }

    public function getBookById($idBook){
        for($i=0; $i < count($this->books); $i++){
            if($this->books[$i]->getId() == $idBook){
                return $this->books[$i];
            }
        }
        throw new Exception("Le livre n'existe pas");
    }

    public function addBookToBdd($title,$nbPages,$image){
        $req = "
        INSERT INTO books (title, nbPages, image)
        VALUES(:title, :nbPages, :image)
        ";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":title", $title,PDO::PARAM_STR);
        $statement->bindValue(":nbPages", $nbPages,PDO::PARAM_INT);
        $statement->bindValue(":image", $image,PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result > 0){
            $book = new Book($this->getBdd()->lastInsertId(),$title,$nbPages,$image);
            $this->addBook($book);
        }
    }


    public function removeBookBdd($id){
        $req = "
        delete from books where id = :idBook
        ";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":idBook",$id,PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result > 0){
            $book = $this->getBookById($id);
            unset($book);
        }

    }


    public function modifyBookBdd($id,$title,$nbPages,$image){
        $req = "
        update books 
        set title = :titleBook, nbPages = :numberPageBook, image= :imageBook
        where id = :idBook
        ";
        $statement =$this->getBdd()->prepare($req);
        $statement->bindValue(":idBook", $id, PDO::PARAM_INT);
        $statement->bindValue(":titleBook", $title, PDO::PARAM_STR);
        $statement->bindValue(":numberPageBook", $nbPages, PDO::PARAM_INT);
        $statement->bindValue(":imageBook", $image, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result > 0){
            $this->getBookById($id)->setTitle($title);
            $this->getBookById($id)->setTitle($nbPages);
            $this->getBookById($id)->setTitle($image);
        }
        

    }



}
?>