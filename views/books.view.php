<?php
    ob_start();
    $title = "Les livres de ma biblio";
    $content = ob_get_clean();
    require 'template.php';

    if(!empty($_SESSION['alert'])) :
    ?>
    <div class="container my-4 alert alert-<?= $_SESSION['alert']['type']?>" role="alert">
        <?=
        $_SESSION['alert']['msg'];
        ?>
    </div>
    <?php endif; ?>

    <div id="content" class="container">
        <table class="table table-hover text-center my-5">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Nombre de pages</th>
                    <th colspan="3" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                
                <?php 
                
                
                for($i = 0; $i < count($books); $i++) : 
                
                ?>
                <tr class="table-active">
                    <th class="align-middle"><img src="<?= URL ?>/public/images/<?= $books[$i]->getImage(); ?>" alt="<?= $books[$i]->getTitle(); ?>" width="60"></th>
                    <td class="align-middle"><?= $books[$i]->getTitle(); ?></td>
                    <td class="align-middle"><?= $books[$i]->getNbPage(); ?></td>
                    <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $books[$i]->getId(); ?>" class="btn btn-info">Afficher</a></td>
                    <td class="align-middle"><a href="<?= URL ?>livres/m/<?= $books[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
                    <td class="align-middle">
                        <form action="<?= URL ?>livres/s/<?= $books[$i]->getId();?>" method="POST" onSubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?')">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <a href="<?= URL ?>livres/a/" class="btn btn-primary d-block py-2 text-center">Ajouter un livre de ma collection</a>
    </div>

