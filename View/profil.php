<center class="profil">
   <?php
        if (isset($erreur))
        {
            echo "<h1>".$erreur."</h1>";
        }
    ?>
    <h2>Votre profil: </h2>
    <?php
        while ($res = $result->fetch())
        {
            echo "<h4>".$res['prenom_s']. "  " .$res['nom_s']."</h4>";
    ?>
            <form method="POST">
                <p>Modification mot de passe</p><br/>
                <label>Mot de passe actuel:</label>
                <input type="password" name="a_pwd"/><br/>
                <label>Nouveau mot de passe:</label>
                <input type="password" name="n_pwd"/><br/>
                <label>Confirmation nouveau mot de passe:</label>
                <input type="password" name="confirm"/>
                
                <p>Modification email:</p><br/>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $res['email']; ?>"/><br/>
                
                <button type="submit" name="submit">Soumettre</button>
            </form>
    <?php
        }
    ?>
</center>