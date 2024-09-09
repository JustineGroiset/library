<?php
ob_start();
$title = $book->getTitle(); 
$content = ob_get_clean();
require 'template.php';
?>

<div id="bookItem" class="container">
    <div class="row my-5">
        <?php if ($book->getImage()):?>
        <div class="col-md-4">
            <img style="max-width:100%;" src="../../public/images/<?= $book->getImage(); ?>" alt="<?= $book->getTitle(); ?>">
        </div>
        <?php endif; ?>
        <div class="col-md-8">
            <h2>Titre : <?= $book->getTitle(); ?></h2>
            <?php if ($book->getNbPage()): ?>
            <p>Nombre de pages : <?= $book->getNbPage(); ?></p>
            <?php endif ?>
    
        </div>
    </div>
</div>
