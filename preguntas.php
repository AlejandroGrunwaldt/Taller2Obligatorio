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
    if (isset($_POST['respuesta']) && !empty($_POST['respuesta'])) {
        $respuesta = $_POST['respuesta'];
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            guardarRespuesta($id, $respuesta);
            $ret = array('OK' => 'La respuesta se registro correctamente');
            echo json_encode($ret);
        }
    }
} else {
    header('location: ./index.php');
}

function guardarRespuesta($id = 0, $respuesta) {
    $cn = conectar();
    $date = date('Y-m-d H:i:s');
    $cn->consulta("
           UPDATE `preguntas`
           SET `respuesta` = :respuesta, `fecha_respuesta` = :fecha_respuesta
           WHERE id = :id;
       ", array(
        array('respuesta', $respuesta, 'string'),
        array('fecha_respuesta', $date, 'string'),
        array('id', $id, 'string')
    ));
}
