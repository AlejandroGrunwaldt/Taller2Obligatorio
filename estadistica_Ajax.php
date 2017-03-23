<?php

require_once './datos.php';
require_once './smarty.php';

session_start();

$operacion = isset($_POST['operacion']) && trim($_POST['operacion']) !== "" ? $_POST['operacion'] : null;
$ciudad = isset($_POST['idCiudad']) && trim($_POST['idCiudad']) !== "0" ? $_POST['idCiudad'] : null;

$datos = getPromedioCiudad($ciudad,$operacion);
$moneda = $operacion === "A" ? '$UYU' : 'U$D';
$mySmarty->assign('moneda', $moneda);
$mySmarty->assign('datos', $datos);

$mySmarty->display('./estadistica/resultadoEstadistica.tpl');

