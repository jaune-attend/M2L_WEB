<?php
    require("./Model/demande_form.php");
    $titre = "Demandes de formations";

        $ar = show_ask($_SESSION['id']);
        $as = show_ask($_SESSION['id']);

   require("./View/demande_form.php");
?>