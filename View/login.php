<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/creative.css">
        <title>Connexion à votre compte</title>
    </head>
    
    
    <body class="log-form">
        <div class="login-head">
            <header class="col-xs-12">
                <center>
                    <h1>Vous devez vous connecter pour accéder au site</h1>
                </center>
            </header>
        </div>
        <div class="form-login">
            <center class="col-xs-12">
                <form action="" method="POST" class="form-horizontal" role="form">
                        <div class="form-group">
                            <legend>Connexion à votre compte</legend>
                            <label>Email: </label>
                            <input type="email" name="email" placeholder="Exemple: gerard@email.com"/>
                            <label>Mot de passe: </label>
                            <input type="password" name="mdp"/><br/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
                                Se souvenir de moi <input type="checkbox" name="souv"/>
                            </div>
                        </div>
                </form>
                <a href="../Controller/login.php?id=0">Mot de passe oublié</a>
            </center>
        </div>
    </body>
</html>