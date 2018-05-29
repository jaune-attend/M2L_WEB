<?php
    
    define('WEBROOT', dirname(__FILE__));
    define('ROOT', dirname(WEBROOT));
    define('DS', DIRECTORY_SEPARATOR);
    define('CORE', ROOT.DS.'core');
    define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
    require("./Model/bdd.php");

if (isset($_SESSION['connecte']))
    {
        if (!isset($_GET['p']) || $_GET['p'] == "")
            $p = "accueil";
        else
        {
            if (!file_exists("./Controller/".$_GET['p'].".php"))
                $p = "404";
            else
                $p = $_GET['p'];
        }
            ob_start();
                require("./Controller/".$p.".php");
                $content = ob_get_contents();
            ob_end_clean();
            require("template2.php");
    }
else
    header("location: ./Controller/login.php");
?>