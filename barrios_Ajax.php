<?php

require_once 'datos.php';

$ciudadId = $_GET['ciudadId'];

$barrios = obtener_barrios($ciudadId);
echo json_encode(array('datos' => $barrios));

