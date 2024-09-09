<?php
ob_start();
$title = "Bienvenue";
$content = ob_get_clean();
require 'template.php';
?>

<div id="main" class="container py-5">
    <p>Vous allez retrouver l'ensemble des livres que j'ai à disposition.</p>

</div>