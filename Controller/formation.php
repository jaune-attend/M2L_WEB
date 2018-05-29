<?php
    require ("./Model/formation.php");
    $titre = "Formation";

    if(isset($_GET['id']))
    {
        $var = $_GET['id'];
        if ( $var > 0)
        {
            $form = display_formation($var);
        }
    }
    if(isset($_GET['type']))
    {
        if (preg_match("#\d+#", $_GET['type']))
            $type = $_GET['type'];
        $form = form_type($type);
    }
    if (!isset($_GET['type'])|| !isset($_GET['id']))
        $t_form = display_all();
    require ("./View/formation.php");
?>