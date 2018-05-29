<?php
    $s = $ar->fetch();
        if ($s == false)
            echo "<h2 class='demande'> Aucune Demande </h2>";
    else
    {
?>
<table>
   <tr>
       <th>Nom:</th>
       <th>Prenom:</th>
       <th>Formation:</th>
       <th>Action:</th>
   </tr>
    <?php
        while ($ask = $as->fetch())
            {
                echo "
                    <tr>
                    <td>".$ask['nom_s']."</td>
                    <td>".$ask['prenom_s']."</td>
                    <td>".substr($ask['contenu'], 0, 25)."</td>
                    <td><a href='index.php?p=reply_demande&id_f=".$ask['id_f']."&id_s=".$ask['id_s']."&rep=1'>accepter</a>
                    / <a href='index.php?p=reply_demande&id_f=".$ask['id_f']."&id_s=".$ask['id_s']."&rep=0'>refuser</a></td>
                    </tr>";
            }
    }
    ?>
</table>