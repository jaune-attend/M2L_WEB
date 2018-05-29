<?php

function show_adress()
{
    global $bdd;
    
    $rq = $bdd->query("SELECT * FROM adresse");
    
    return ($rq);
}

function add_form()
{
    global $bdd;
    
//    $req = $bdd->prepare("INSERT INTO formation VALUES ()");
}
?>