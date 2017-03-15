<?php

require_once 'datos.php';

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
$avanzada = isset($_POST['avanzada']) ? $_POST['avanzada'] : null;
$propiedad = isset($_POST['propiedad']) ? $_POST['propiedad'] : null;
$barrio = isset($_POST['barrio']) ? $_POST['barrio'] : null;
$habitaciones = isset($_POST['habitaciones']) ? $_POST['habitaciones'] : null;
$desde = isset($_POST['desde']) ? $_POST['desde'] : null;
$hasta = isset($_POST['hasta']) ? $_POST['hasta'] : null;
$garaje = isset($_POST['garaje']) ? $_POST['garaje'] : null;
$pagina = isset($_POST['pagina']) ? $_POST['pagina'] : null;

echo json_encode(array('datos' => $operacion));
