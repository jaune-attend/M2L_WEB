<?php
    function send_bug($message, $objet, $id)
    {
        mail("contact@m2l.fr", $objet, $message);
    }
?>