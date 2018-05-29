<?php
    function all_type_form()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM type_formation");
        $req->execute();
        return($req);
    }
?>
