<?php
require_once('housesBD.php');

$pregunta = $_POST['pregunta'];
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    guardarPregunta($id, $pregunta);
    $ret = array('OK' => 'La pregunta se registro correctamente');
    echo json_encode($ret);
}