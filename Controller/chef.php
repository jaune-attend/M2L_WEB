<?php
$titre = "Gestion Chef";
    require("./Model/chef.php");
        if ($_SESSION['chef'] >= 2)
        {
            $chef = show_chef();
            $r = show_salarie_of($_SESSION['id']);
        if (isset($_POST['submit']))
            {                
                if (preg_match("#^[a-z]+[ -]? [a-z]+ || [A-Z]+[ -]?[A-Z]+ $#", $_POST['nom']))
                    $nom = $_POST['nom'];

                if (preg_match("#^[a-z]+[ -]+ [a-z]+ || [A-Z]+[ -]?[A-Z]+ $#", $_POST['prenom']))
                    $prenom = $_POST['prenom'];
                if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]+.[a-z]{2,5}$#",$_POST['email']))
                    $email = $_POST['email'];
            
                add_salarie($prenom, $nom, $email, gen_mdp(), 1, $_SESSION['id'],$_SESSION['adresse']);
            
                header("location: index.php?p=chef");
            }
            
            if (isset($_GET['id_s']))
            {
                del_salarie($_GET['id_s']);
                header("location: index.php?p=chef");
            }
        }
    require("./View/chef.php");
?>