<center class="chef">
    <h2>Vos salaries :</h2>
   <table>
      <tr>
          <th>Nom</th> 
           <th>prenom </th>
           <th>email</th>
       </tr>
    <?php
        while ($res = $r->fetch())
        {
          echo "
            <tr>
              <td>".$res['nom_s']." </td> 
              <td> ".$res['prenom_s']."</td>
              <td>   ".$res['email']."   </td>
              <td> <a href='index.php?p=chef&id_s=".$res['id_s']."'>Supprimer</a></td>
            </tr>";
        }
    ?>
    </table>
    <br/>
    <?php
        if (isset($_GET['id']))
        {
            if ($_GET['id'] == 1)
            {
    ?>    
            <form method="post">
                Nom:
                <input type="text" name="nom">
                Prenom:
                <input type="text" name="prenom">
                Email:
                <input type="email" name="email">
                Diriger par:
                <select name="chef">
<?php
                while ($sup = $chef->fetch())
                {
                    echo "<option value='".$sup['id_s']."'>".$sup['nom_s']."</option>";
                }
?>
                </select>
                Niveau:
                <select name="lvl">
                    <option value="1">Salarie</option>
                    <option value="2">Chef</option>
                    <option value="3">Directeur</option>
                </select>
                
                <input type="submit" name="submit" value="Ajouter">
            </form>
    <?php
            }
        }
    ?>
        <a href="index.php?p=chef&id=1">Ajouter un salarie</a>
</center>