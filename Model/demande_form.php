<?php
    function show_ask($id)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM salarie, formation, participer WHERE salarie.id_s = participer.id_s AND formation.id_f = participer.id_f AND diriger_par = :id AND etat = 1");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        
        return ($req);
    }


    function get_credit($id_s)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT credit FROM salarie WHERE id_s = :id_s");
        
        $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
        $req->execute();
        
        $res = $req->fetch();
        return ($res);
    }

    function get_nbj($id_s)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT nbj FROM salarie WHERE id_s = :id_s");
        
        $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
        $req->execute();
        
        $res = $req->fetch();
        return ($res);
    }

//etat 1 = en attente 2 = accepte 0 = refusé

    function accept($id_f, $id_s)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE participer SET etat = '2' WHERE id_f = :id_f AND id_s = :id_s");
        
        $req->bindValue(":id_f", $id_f, PDO::PARAM_INT);
        $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
        $req->execute();
        
        $cred = get_credit($id_s);
        $nbj = get_nbj($id_s);
        
        $req2 = $bdd->prepare("UPDATE salarie SET credit =  :credit - (SELECT credit FROM formation WHERE id_f = :id_f), nbj = :nbj - (SELECT nb_j FROM formation WHERE id_f = :id_f) WHERE id_s = :id_s");
        
        $req2->bindValue(":id_f", $id_f, PDO::PARAM_INT);
        $req2->bindValue("id_s", $id_s, PDO::PARAM_INT);
        $req2->bindValue(":credit", $cred['credit'], PDO::PARAM_INT);
        $req2->bindValue(":nbj", $nbj['nbj'], PDO::PARAM_INT);
        $req2->execute();
    }

    function deny($id_f, $id_s)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE participer SET etat = '0' WHERE id_f = :id_f AND id_s = :id_s");
        
        $req->bindValue(":id_f", $id_f, PDO::PARAM_INT);
        $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
        $req->execute();
    }
?>