<?php

//ini_set('display_errors', 1);

require_once 'smarty.php';
require_once 'datos.php';

try {
    session_start();
    if (isset($_GET['page'])) {
        $pagina = $_GET['page'];
        $casas = getCasas($pagina);
    }else{
        $casas = getCasas(1);
    }
    
    $mySmarty->assign('casas', $casas[casas]);
    $mySmarty->assign('paginas', $casas[total]);
    
    if (isset($_COOKIE["id_usuario"])) {
        login_cookie($_COOKIE["id_usuario"]);
    }

    if (isset($_SESSION["usuario"])) {
        $mySmarty->assign("usuario", $_SESSION["usuario"]);
    }

    $mySmarty->display('./content/homepage.tpl');


} catch (Exception $ex) {
    echo $ex->getMessage();
}

