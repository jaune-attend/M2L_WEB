<?php
    $titre = "Gestion Administrateur";
    require ("Model/admin.php");
    require("Model/chef.php");

        if (isset($_GET['id']) && $_GET['id'] == 1)
            $chef = show_chef();
        if (!isset($_POST['submit']))
            $lvl_s = show_lvl(1);
        if (isset($_POST['submit']))
        {
            if (preg_match("#^[1234]$#", $_POST['lvl']))
                $lvl_s = show_lvl($_POST['lvl']);
        }
        if (isset($_POST['ajouter']))
        {
            if (preg_match("#^[a-z]+[ -]? [a-z]+ || [A-Z]+[ -]?[A-Z]+ $#", $_POST['nom']))
                    $nom = $_POST['nom'];

                if (preg_match("#^[a-z]+[ -]+ [a-z]+ || [A-Z]+[ -]?[A-Z]+ $#", $_POST['prenom']))
                    $prenom = $_POST['prenom'];
                if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]+.[a-z]{2,5}$#",$_POST['email']))
                    $email = $_POST['email'];
            if (preg_match("#^\d+$#", $_POST['diriger_par']))
                $diriger_par = $_POST['diriger_par'];
            if (preg_match("#^\d+$#", $_POST['lvl']))
                $lvl = $_POST['lvl'];
            
                if ($nom == "" || $prenom == "" || $email == "" || $diriger_par == "" || $lvl == "")
                    $erreur = "Manque information pour ajouter le salarie";
                else
                    add_user($nom, $prenom, $email, gen_mdp(), $lvl, $diriger_par,$_SESSION['adresse']);
            
                header("location: index.php?p=admin");
        }
        if (isset($_GET['supp']))
        {
            $verif = verif_int($_GET['supp']);
            if($verif > 0)
                supp_user($verif);
            header("location: index.php?p=admin");
        }
            
    require("View/admin.php");
?>