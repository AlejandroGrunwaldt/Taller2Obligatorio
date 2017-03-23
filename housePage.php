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
}else{
    if (isset($_SESSION['usuario'])) {
        $mySmarty->assign("usuario", $_SESSION["usuario"]);
        $mySmarty->assign("new", true);
        $mySmarty->display('./content/housePageEditar.tpl');
        return;
    }
}
$casa = getCasa($id)[casa];
$preguntas = getPreguntas($id);
$precioPromedio = $casa[precio] / $casa[mts2];
$precioXMts2 = number_format($precioPromedio, 2, '.', '');
$moneda = $casa[operacion] === "A" ? '$UYU' : 'U$D';
$promedio = getPromedioPrecioBarrio($casa[barrio_id], $casa[operacion])[promedio];
$operacion = $casa[operacion] === "A" ? 'Alquiler' : 'Compra';
$mySmarty->assign('casa', $casa);
$mySmarty->assign('preguntas', $preguntas[preguntas]);
$mySmarty->assign('precioXMts2', $precioXMts2);
$mySmarty->assign('moneda', $moneda);
$mySmarty->assign('promedio', $promedio);
$mySmarty->assign('operacion', $operacion);
$mySmarty->assign('imagenes', obtenerImagenes($id));

if (isset($_SESSION['usuario'])) {
    $mySmarty->assign("usuario", $_SESSION["usuario"]);
    if (isset($_GET['e'])&& $_GET['e']=='T') {
        $mySmarty->assign("edit", true);
        $mySmarty->display('./content/housePageEditar.tpl');
        return;
    }
}

$mySmarty->display('./content/housePage.tpl');

