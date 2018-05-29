<?php
    $titre = "Vos formations";
    require('Model/formation.php');
        if (isset($_GET['id']))
            annuler($_GET['id']);
        $h = historique($_SESSION['id']);
    require ("View/vos_formations.php");
?>