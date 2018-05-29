<?php
    require ("bdd.php");
    function login($email, $mdp)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM salarie WHERE email = :email AND mdp = :mdp");
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $req->execute();
        
        return ($req->fetch());
    }

    function check_email($email, $nom, $prenom)
    {
      global $bdd;
      
      $req = $bdd->prepare("SELECT * FROM salarie WHERE email = :email");
      $req->bindValue(":email", $email, PDO::PARAM_STR);
      //$req->bindValue(":nom", $nom, PDO::PARAM_STR);
      //$req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
      $req->execute();
      return ($req->fetch());
    }

     function gen_mdp()
    {
        $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $mdp = "";
        
        for($i = 0; $i < 1; $i++)
        {
            for($j = 0; $j < 2; $j++)
                $mdp .= $string[rand(0,25)];
            for($j = 0; $j < 2; $j++)
                $mdp .= $string[rand(26,51)];
            for($j = 0; $j < 2; $j++)
                $mdp .= $string[rand(52,61)];
        }
        $mdp = str_shuffle($mdp);
        return $mdp;
    }

    function send_mdp($id)
    {
        global $bdd;
      
        $mdp = gen_mdp();
      
        $req = $bdd->prepare("UPDATE salarie SET mdp = :mdp WHERE id_s = :id");
        $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        // envoi par mail le nouveau mot de passe
        //mail($email, "Changement Mot de passe", "Votre nouveau mot de passe est : ".$mdp. " Vous pourrez le changer plus tard ");
        
    }
?>