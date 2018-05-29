<center class="vos_formations">
    <h3>Votre historique de demande: </h3>
    <table>
        <tr>
           <th>nom formation</th>
           <th>etat</th>
           <th>Action</th>
        </tr>
   
    <?php
        while ($histo = $h->fetch())
        {
            echo "<tr>
                    <td>".$histo['contenu']."</td>";
                    if ($histo['etat'] == 1)
                        echo "
                            <td>En attente</td>
                            <td><a href='index.php?p=vos_formations&id=".$histo['id_f']."'>Annuler</a></td></tr>
                        ";
                    if ($histo['etat'] == 2)
                        echo "<td>Accepté</td></tr>";
                    if ($histo['etat'] == 0)
                        echo "<td>Refusé</td></tr>";
            echo "";
        }
    ?>
    </table>
</center>