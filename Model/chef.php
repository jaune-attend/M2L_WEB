<?php

    function show_chef()
    {
        global $bdd;
        
        $req = $bdd->query("SELECT * FROM salarie WHERE estchef > 1");
        
        return ($req);
    }
    
    function show_salarie_of($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM salarie WHERE diriger_par = :id");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
    
        $req->execute();
        
        return($req);
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

    function add_salarie($nom, $prenom, $email, $mdp, $lvl, $diriger, $adresse)
    {
        global $bdd;
        
        echo "nom: ".$nom. "  prenom : " .$prenom."  email: ".$email."  mdp : " .$mdp."  estChef: " .$lvl. "  diriger par: " .$diriger;
        
        $req = $bdd->prepare("INSERT INTO salarie (nom_s, prenom_s, email, mdp, estchef, diriger_par, nbj, credit, id_a) VALUES (:nom, :prenom, :email, :mdp, :chef, :diriger, 15, 5000, :id_a)");

        $req->bindValue(":nom", $nom, PDO::PARAM_STR);
        $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $req->bindValue(":chef", $lvl, PDO::PARAM_INT);
        $req->bindValue(":diriger", $diriger, PDO::PARAM_INT);
        $req->bindValue(":id_a", $adresse, PDO::PARAM_INT);

        $req->execute();
    }

    function del_salarie($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM salarie WHERE id_s = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        
        $req->execute();
    }

    function flash()
    {
        if (isset($_SESSION['flash']))
        {
            extract($_SESSION['flash']);
            unset($_SESSION['flash']);
            return "<div class='alert alert-$type alert -dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'> &times;</span>
                </button>
                <strong>$message</strong>
                </div>";
        }
    }

    function setFlash($message, $type = 'success')
    {
        $_SESSION['flash']['message'] = $message;
        $_SESSION['flash']['type'] = $type;
    }
?>