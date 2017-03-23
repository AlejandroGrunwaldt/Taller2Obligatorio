<?php

ini_set('display_errors', 1);
session_start();
if (isset($_SESSION['usuario'])) {

    require_once 'smarty.php';
    require_once 'datos.php';

    try {

        $usuario = $_SESSION['usuario'];
        $preguntas = get_preguntas();
        $mySmarty->assign("usuario", $_SESSION["usuario"]);
        $mySmarty->assign('preguntas', $preguntas);
        $mySmarty->display('preguntas.tpl');
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} else {
    header('location: ./index.php');
}
