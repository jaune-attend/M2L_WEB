<center>
<div class="col-xs-12">
<?php
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
                <a href='index.php?p=formation_desc&id=".$a['id_f']."'>Voir plus</a>
            </div>";
        }
    }
    if (isset($t_form))
    {
        while ($b = $t_form->fetch())
        {
            echo "
            <div class='type_form'>
                <a href='index.php?p=formation&type=".$b['id_type']."'>".$b['libelle']."</a>
            </div>";
        }
    }
?>
</div>
</center>