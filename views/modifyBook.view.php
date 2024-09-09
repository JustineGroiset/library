<?php
    ob_start();
    $title = "Modifier le livre : " . $book->getTitle();
    $content = ob_get_clean();
    require 'template.php';
?>

<div class="container py-5">
    <form method="POST" action="<?= URL ?>livres/mv" class="card p-4 bg-white br30" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="inputTitleBook" class="form-label">Titre du livre</label>
            <input type="text" class="form-control" id="inputTitleBook" name="inputTitleBook" aria-describedby="titleBookHelp" value="<?= $book->getTitle();?>">
        </div>
        <div class="mb-3">
            <label for="inputNbPage" class="form-label">Nombre de pages</label>
            <input type="number" class="form-control" id="inputNbPage" name="inputNbPage" value="<?= $book->getNbPage();?>">
        </div>
        <div class="img mb-3">
            <strong class="d-block w100">Image : </strong>
            <img style="max-width: 100px;margin-right:20px;" src="<?= URL ?>public/images/<?= $book->getImage(); ?>">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputImgBook">Remplacer l' image :</label>
            <input type="file" class="form-control" id="inputImgBook" name="inputImgBook" >
        </div>
        <input type="hidden" name="identification" value="<?= $book->getId(); ?>">
      <button type="submit" class="btn btn-primary">Ajouter ce livre à ma collection</button>
    </form>
</div>