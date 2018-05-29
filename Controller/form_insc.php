<?php
    require("./Model/formation.php");
    $titre = "Inscription Formation";
    if (isset($_GET['insc']))
    {
        if (preg_match("#\d+#", $_GET['insc']))
        {
            $rec = display_formation($_GET['insc']);
            $info_form = $rec->fetch();
            
            $calc_cred = $_SESSION['credit'] - $info_form['credit'];
            
            $calc_jour = $_SESSION['nbj'] - $info_form['nb_j'];
            
            if ($calc_cred <= 0)
                header("location: index.php?p=formation_desc&id=".$_GET['insc']."&err=1");
            if ($calc_jour <= 0)
                header("location: index.php?p=formation_desc&id=".$_GET['insc']."&err=2");
            if (($calc_jour > 0) && ($calc_cred > 0))
            {
                insc_form($_SESSION['id'],$_GET['insc']);
                header("location: index.php");
            }
        }
    }
?>