<?php
    ob_start();
    $title = "Ajouter un livre de ma collection";
    $content = ob_get_clean();
    require 'template.php';
?>

<div class="container py-5">
    <form method="POST" action="<?= URL ?>livres/av/" class="card p-4 bg-white br30" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="inputTitleBook" class="form-label">Titre du livre</label>
        <input type="text" class="form-control" id="inputTitleBook" name="inputTitleBook" aria-describedby="titleBookHelp">
      </div>
      <div class="mb-3">
        <label for="inputNbPage" class="form-label">Nombre de pages</label>
        <input type="number" class="form-control" id="inputNbPage" name="inputNbPage">
      </div>
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputImgBook">T&eacute;l&eacute;charger l'image</label>
        <input type="file" class="form-control" id="inputImgBook" name="inputImgBook" >
    </div>
      <button type="submit" class="btn btn-primary">Ajouter ce livre à ma collection</button>
    </form>
</div>