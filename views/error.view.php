<?php
    ob_start();
    $title = "Oups erreur de chemin ! Vous êtes perdus ?";
    $content = ob_get_clean();
    require 'template.php';
?>
