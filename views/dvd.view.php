<?php
    ob_start();
?>

En cours de deploiement



<?php
    $title = "Les DVD de ma biblio";
    $content = ob_get_clean();
    require 'template.php';
?>