<?php

require_once 'datos.php';

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$recordar = $_POST["recordar"];
if (login($usuario, $clave, $recordar)) {
    $usuario = $_SESSION['usuario'];
    header("location: ./index.php");
} else {
    header("location: ./login.php?error=true");
}
