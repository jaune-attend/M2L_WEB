<?php
    
    require ("../Model/login.php");

        if (isset($_GET['id']))
        {
          if ($_GET['id'] == 0)
            header("location: forgot.php");
          else
            header("location: login.php");
        }
        if (isset($_POST['submit']))
        {
            $info = login($_POST['email'], sha1($_POST['mdp']));
            
            if ($info == 0)
            {
                $error = "Erreur Connexion: Champs invalide";
            }
            else
            {
                if ($info['estChef'] == 0)
                    $_SESSION['admin'] = true;
                $_SESSION['connecte'] = true;
                $_SESSION['nom'] = $info['nom_s'];
                $_SESSION['id'] = $info['id_s'];
                $_SESSION['chef'] = $info['estChef'];
                $_SESSION['adresse'] = $info['id_a'];
                $_SESSION['boss'] = $info['diriger_par'];
                $_SESSION['credit'] = $info['credit'];
                $_SESSION['nbj'] = $info['nbj'];
               if (isset($_POST['souv']))
                    {
                        setcookie('auth', $info['id_u']."------".sha1($info['email'].$info['mdp'].$_SERVER['REMOTE_ADDR']),time() + (3600 * 24 * 3), '/', 'localhost', false, true);
                    }
                header("location: ../template.php");
                
            }
        }
            if (isset($_COOKIE['auth']))
            {
                $auth = $_COOKIE['auth'];
                $auth = explode('------', $auth);

                $req1 = $bdd->prepare("SELECT * FROM user WHERE id_u = :id_u");
                $req1->bindValue(":id_u", $auth[0], PDO::PARAM_INT);
                $req1->execute();
                $res = $req1->fetch();
                $key = sha1($res['login'].$res['mdp'].$_SERVER['REMOTE_ADDR']);

                if ($key == $auth[1])
                {
                    $_SESSION['connecte'] = true;
                    $_SESSION['id'] = $res['id_u'];
                    setcookie('auth', $res['id_u']."------".sha1($res['login'].$res['mdp'].$_SERVER['REMOTE_ADDR']),time() + (3600*24*3), '/', 'localhost', false, true);
                }
                else
                {
                    setcookie('auth','', time() - 3600, '/', 'localhost', false, true);
                    //a mettre dans logout aussi
                }
            }
    require ("../View/login.php");
?>