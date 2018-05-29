<?php
    function show_profil($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM salarie, adresse WHERE id_s = :id AND salarie.id_a = adresse.id_a");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        return ($req);
    }

    function modify($new_p, $email, $id)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE salarie SET mdp = :n_pwd, email = :email WHERE id_s = :id");
        
        $req->bindValue(":n_pwd", sha1($new_p), PDO::PARAM_STR);
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        
        $req->execute();
    }
?>