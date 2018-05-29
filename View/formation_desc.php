<?php
    if (isset($erreur))
        echo $erreur;
    if (isset($form))
    {
        while ($a = $form->fetch())
        {
            echo "
            <div id='formation_dis'>
                <h2>Contenu de la formation:</h2>
                <p>".$a['contenu']."</p>
                <h4> Durée de la formation : ".$a['nb_j']." jours</h4>
                <h4>Les prérequis: ".$a['prerequis']."</h4>
                <h4>Credit: ".$a['credit']."</h4>
                <a href='index.php?p=form_insc&insc=".$a['id_f']."'>S'inscrire</a>
            </div>";
        }
    }
?>