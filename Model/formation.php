<?php
//afficher formation precise
    function display_formation($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM formation WHERE id_f = :id");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        
        $req->execute();
        
        return ($req);
    }
//affiche tout type formation
    function display_all()
    {
        global $bdd;
        
        $req = $bdd->query("SELECT * FROM type_formation");
        
        return ($req);
    }
//formation type
    function form_type($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM formation WHERE id_type = :id");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        return ($req);
    }
//inscription formation
    function insc_form($user ,$id)
    {
        global $bdd;
        
        //etat 1 = en attente 2 = accepte 0 = refusé
        
        $req = $bdd->prepare("INSERT INTO participer (id_s, id_f, etat) VALUES (:user, :id, 1)");
        
        $req->bindValue(":user", $user, PDO::PARAM_INT);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

//historique formation
    function historique($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM participer, formation WHERE participer.id_f = formation.id_f AND id_s = :id");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        return ($req);
    }

//annuler inscription
    function annuler($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM participer WHERE id_f = :id AND id_s = :id_s");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->bindValue(":id_s", $_SESSION['id'], PDO::PARAM_INT);
        
        $req->execute();
    }
?>