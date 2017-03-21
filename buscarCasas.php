<?php

require_once './datos.php';
require_once './smarty.php';

session_start();

$operacion = isset($_POST['operacion']) && trim($_POST['operacion']) !== "" ? $_POST['operacion'] : null;
$ciudad = isset($_POST['ciudad']) && trim($_POST['ciudad']) !== "0" ? $_POST['ciudad'] : null;
$avanzada = isset($_POST['avanzada']) && trim($_POST['avanzada']) === "on" ? true : false;
$propiedad = isset($_POST['propiedad']) && trim($_POST['propiedad']) !== "" ? $_POST['propiedad'] : null;
$barrio = isset($_POST['barrio']) && trim($_POST['barrio']) !== "" ? $_POST['barrio'] : null;
$habitaciones = isset($_POST['habitaciones']) && trim($_POST['habitaciones']) !== "" ? $_POST['habitaciones'] : null;
$desde = isset($_POST['desde']) && trim($_POST['desde']) !== "" ? $_POST['desde'] : null;
$hasta = isset($_POST['hasta']) && trim($_POST['hasta']) !== "" ? $_POST['hasta'] : null;
$garaje = isset($_POST['garaje']) && trim($_POST['garaje']) !== "" ? $_POST['garaje'] : null;
$pagina = isset($_POST['pagina']) && trim($_POST['pagina']) !== "" ? $_POST['pagina'] : null;
$orden = isset($_POST['orden']) && trim($_POST['orden']) !== "" ? $_POST['orden'] : null;
$forma = isset($_POST['forma']) && trim($_POST['forma']) !== "" ? $_POST['forma'] : null;


$casas = buscarCasas($pagina, $operacion, $ciudad, $avanzada, $propiedad, 
        $barrio, $habitaciones, $desde, $hasta, $garaje, $orden, $forma);

$mySmarty->assign('casas', $casas[casas]);
$mySmarty->assign('paginas', $casas[total]);

$mySmarty->display('./content/houseList.tpl');

