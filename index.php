<?php

ini_set('display_errors', 1);

require_once 'smarty.php';
require_once 'datos.php';

try {
    session_start();
    if (isset($_COOKIE["id_usuario"])) {
        login_cookie($_COOKIE["id_usuario"]);
    }

    if (isset($_SESSION["usuario"])) {
        $miSmarty->assign("usuario", $_SESSION["usuario"]);
    }
    
    $mySmarty->display('index.tpl');
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

