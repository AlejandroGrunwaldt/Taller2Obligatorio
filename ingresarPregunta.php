<?php
require_once('datos.php');

try {
    if (isset($_POST['pregunta']) && !empty($_POST['pregunta'])) {
        $pregunta = $_POST['pregunta'];
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            guardarPregunta($id, $pregunta);
            $ret = array('OK' => 'La pregunta se registro correctamente');
            echo json_encode($ret);
        } else {
            $ret = array('ERROR' => 'La pregunta no se registro correctamente');
            echo json_encode($ret);
        }
    } else {
        $ret = array('ERROR' => 'Debe realizar una pregunta');
        echo json_encode($ret);
    }
}catch (Exception $ex) {
    echo $ex->getMessage();
}

