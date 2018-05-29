<?php
    require("./Model/contact.php");
    $titre = "Contact";
        if (isset($_POST['submit']))
        {
            if (preg_match("#^[a-zA-Z0-9 ,.-]+$#", $_POST['objet']) && preg_match("#^[a-zA-Z0-9 ,.-]+$#", $_POST['message']))
                send_bug($_POST['message'], $_POST['objet'], $_SESSION['id']);
            header("location: index.php?p=accueil");
        }
    require ("./View/contact.php");
?>