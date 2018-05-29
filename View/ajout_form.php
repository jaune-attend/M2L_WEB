<?php
    $titre = "Ajout de formation";

    if ($_SESSION['chef'] == 0)
    {
?>
    <form action="" method="POST" role="form" id="ajout_form">
	<legend>
        Ajout d'une nouvelle formation:
	</legend>

	<div class="form-group">
        <label for="contenu">le Contenu :</label>
		<textarea name="contenu" rows="5" cols="80"></textarea>
		
		<label for="credit">Nombre de crédit:</label>
		<input type="text" name="credit"/>
		
		<label for="nb_j">Nombre de jours:</label>
		<input type="text" name="nb_j"/>

        <label for="adresse">Adresse</label>
		<input size="20" type="text" name="num_rue" placeholder="Numéro de votre rue"/>
		<input size="50" type="text" name="rue" placeholder="Nom de rue"/>
		<input type="text" name="cp" placeholder="Code postal"/>
		<input type="text" name="ville" placeholder="Ville"/>
		
		<button id="adr_exi_button">Adresse existante</button>
		<select id="adr_exi" name="adresse">
		    <?php
                while ($adr = $adresse->fetch())
                    echo "<option value='".$adr['id_a']."'>".$adr['numero']. "  " .$adr['rue']."</option>";
            ?>
		</select>
	</div>

	<button type="submit" class="btn btn-primary" name="submit">Créer</button>
</form>

<?php
    }
?>
