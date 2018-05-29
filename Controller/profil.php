<?php
    $titre = "Profil";
    require ("Model/profil.php");
        $result = show_profil($_SESSION['id']);
        $f_pwd = show_profil($_SESSION['id']);
        while ($r = $f_pwd->fetch())
            $a_p = $r['mdp'];
        if (isset($_POST['submit']))
        {
            if ($a_p == sha1($_POST['a_pwd']))
            {
                if ($_POST['n_pwd'] == $_POST['confirm'])
                    $n_p = $_POST['confirm'];
                else
                    $erreur = "Les mots de passe ne correspondent pas";
            }
            else
                $erreur = "Votre ancien mot de passe n'est pas correct";
            if ($_POST['email'] != "")
                $email = $_POST['email'];
            else
                $erreur = "Veuillez rentrer un email";
            modify($n_p, $email, $_SESSION['id']);
        }
    require("View/profil.php");
?>