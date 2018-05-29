<center class="col-xs-4" id="accueil">
Bienvenue dans l'accueil application
<div class="table_form">
    <?php
        while ($req = $res->fetch())
        {
            echo "
            <div class='type_form'>
                <a href='index.php?p=formation&type=".$req['id_type']."'>".$req['libelle']."</a>
            </div>
            ";
        }
    ?>
</div>
<div>
    <h2>Si vous n'avez jamais utilisé l'application veuillez consulter <a href="index.php?p=about">cette page</a></h2>
</div>
</center>