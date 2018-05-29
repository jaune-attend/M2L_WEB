<?php
    require("Model/demande_form.php");
    $titre = "Reponse aux demande";
    if (isset($_GET['id_f']) && isset($_GET['id_s']))
    {
        if ($_GET['rep'] == 1)
            accept($_GET['id_f'], $_GET['id_s']);
        else
            deny($_GET['id_f'], $_GET['id_s']);
        header("location: index.php?p=demande_form");
    }
?>