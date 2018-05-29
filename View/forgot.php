<!DOCTYPE html>

<html>
  <head>
    <link rel="stylesheet" href="../css/creative.css">
    <meta charset="utf-8">
    <title>Forgot Password</title>
  </head>
  <body class="col-xs-12">
   <?php
      if (isset($erreur))
        echo $erreur;
      if (isset($message))
          echo $message;
    ?>
    <form action="" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<legend>Votre Email de Connexion:</legend>
		</div>
        <div class="col-xs-12" id="form_forgot">
          <label for="email">Email: </label>
          <input type="email" name="email"><br/>
          <label for="prenom">Prenom: </label>
          <input type="text" name="prenom"><br/>
          <label for="nom">Nom: </label>
          <input type="text" name="nom"><br/>
        </div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
			</div>
		</div>
    </form>
  </body>
</html>