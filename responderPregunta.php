<?php
session_start();
if (isset($_SESSION['usuario'])) {

    require_once 'smarty.php';
    require_once 'datos.php';

    try {
        if (isset($_POST['respuesta']) && !empty($_POST['respuesta'])) {
                $respuesta = $_POST['respuesta'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $id = $_POST['id'];
                    guardarRespuesta($respuesta, $id);
                    $usuario = $_SESSION['usuario'];
                    $preguntas = get_preguntas();
                    $mySmarty->assign("usuario", $_SESSION["usuario"]);
                    $mySmarty->assign('preguntas', $preguntas);
                    $mySmarty->display('preguntas/contenido.tpl');
                }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
   
}

