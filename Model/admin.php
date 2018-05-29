<?php

    function all_lvl()
    {
        global $bdd;
        
        $req = $bdd->query("SELECT DISTINCT estChef FROM salarie");
        
        return $req;
    }

    function show_lvl($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM salarie WHERE estChef = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }

    function verif_int($num)
    {
        if (!preg_match("#^[0-9]*$#", $num))
            return (0);
        else
            return ($num);
    }

    function ban_user($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE salarie SET (credit = '-1') WHERE id_s = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    function supp_user($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM salarie WHERE id_s = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();    
    }

    function add_user($nom, $prenom, $email, $mdp, $lvl, $diriger, $adresse)
    {
        global $bdd;
        
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
?>