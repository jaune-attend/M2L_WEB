<?php
  require("../Model/login.php");
    $titre = "Oubli de mot de passe";
    if(isset($_POST['submit']))
    {
      if (empty($_POST['email']) || empty($_POST['prenom']) || empty($_POST['nom']))
        $erreur = "<h2> Veuillez renseigner tout les champs </h2>";
      else
        {
            $res = check_email($_POST['email'], $_POST['prenom'], 
                               $_POST['nom']);

            send_mdp($res['id_s']);
            $message = "<h2> Mot de passe changé </h2>";
            header("location: login.php");
        }
      }
  require("../View/forgot.php");
?>