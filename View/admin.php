<div class="col-xs-12">
    <h3 class="titre_admin">Tableau des utilisateurs:</h3>
     <form method="post" class="select_lvl">
      <label>Quelle categorie ?</label>
       <select name="lvl">
           <option value="1">Salarie</option>
           <option value="2">Chef</option>
           <option value="3">Directeur</option>
           <option value="4">President</option>
       </select>
       <button type="submit" name="submit">Valider</button>
    </form>


    <center>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
                while ($res = $lvl_s->fetch())
                {
                    echo "
                    <tr>
                        <td>".$res['nom_s']."</td>
                        <td>".$res['prenom_s']."</td>
                        <td>".$res['email']."</td>
                        <td><a href='index.php?p=admin&supp=".$res['id_s']."'>Supprimer</a>
                        </td>
                    </tr>";
                }
            ?>
        </table>
        <?php
        if (isset($_GET['id']))
        {
            if ($_GET['id'] == 1)
            {
    ?>    
            <form method="post" class="ajout_salarie">
                Nom:
                <input type="text" name="nom">
                Prenom:
                <input type="text" name="prenom">
                Email:
                <input type="email" name="email">
                Diriger par:
                <select name="diriger_par">
<?php
                while ($sup = $chef->fetch())
                {
                    echo "<option value='".$sup['id_s']."'>".$sup['nom_s']."</option>";
                }
?>
                   <option value="0">Personne</option>
                </select>
                Niveau:
                <select name="lvl">
                    <option value="1">Salarie</option>
                    <option value="2">Chef</option>
                    <option value="3">Directeur</option>
                    <option value="4">President</option>
                </select>
                
                <input type="submit" name="ajouter" value="Ajouter"/>
            </form>
    <?php
            }
        }
    ?>
        <a href="index.php?p=admin&id=1">Ajouter un salarie</a>
    </center>
</div>