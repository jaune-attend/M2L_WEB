<?php
    require ("./Model/formation.php");
    $titre = "Description Formation";
    if (isset($_GET['id']))
    {
        if (preg_match("#\d+#", $_GET['id']))
        {
            $form = display_formation($_GET['id']);
        }
        else
            $erreur = "<h1> Aucune formation avec ce numero </h1>";
    }
    if (isset($_GET['err']))
    {
        if ($_GET['err'] == 1)
            $erreur = "<h1> Vous ne pouvez vous inscrire Credit insuffisant </h1>";
        if ($_GET['err'] == 2)
            $erreur = "<h1> Vous ne pouvez vous inscrire Nombre de jours insuffisant</h1>";
    }
    require("./View/formation_desc.php");
?>