<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta http-equiv="content-type"  content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $titre; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor2/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }
        hr
        {
            border: 1px solid black;
        }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="template.php">Accueil</a>
        <a class="navbar-brand" href="index.php?p=profil">Profil</a>
        <a class="navbar-brand" href="index.php?p=vos_formations">Vos formations</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?p=accueil">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
           <?php
                if (isset($_SESSION['admin']))
                {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=admin">Gestion Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=ajout_form">Ajout Formation</a>
                    </li>
            <?php
                }
              if (isset($_SESSION['chef']))
                  if ($_SESSION['chef'] >= 2)
                  {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=chef">Gestion Chef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=demande_form">Demandes</a>
                    </li>
            <?php
                  }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=formation">Formation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=logout">Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $content; ?>
        </div>
      </div>
    </div>

   <!-- Footer -->
   <footer class="footer_2">
       <center>Application Web pour la maison des ligues</center>
   </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <script src="vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="js/script.js"></script>

  </body>

</html>
