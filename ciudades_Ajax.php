<?php

require_once 'datos.php';

$ciudades = obtener_ciudades();
echo json_encode(array('datos' => $ciudades));

