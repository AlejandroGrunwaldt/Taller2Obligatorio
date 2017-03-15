<?php

require_once 'smarty.php';
require_once 'datos.php';
session_start();
if(isset($_GET['error'])){
    $mySmarty->assign('error', TRUE);
}
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['usuario'])) {
    $mySmarty->assign("usuario", $_SESSION["usuario"]);
}
$casa = getCasa($id);
$preguntas = getPreguntas($id);
$mySmarty->assign('casa', $casa[casa]);
$mySmarty->assign('preguntas', $preguntas[preguntas]);
$mySmarty->display('./content/housePage.tpl');

