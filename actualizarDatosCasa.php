<?php

require_once 'datos.php';

session_start();
if (isset($_SESSION['usuario'])) {
    if (isset($_POST['idCasa']) && !empty($_POST['idCasa']) && isset($_POST['editar']) && !empty($_POST['editar']) && $_POST['editar'] == 'true') {
        actualizarDatos($_POST);
        header("location: ./housePage.php?id=" . $_POST['idCasa']);
    } else {
        try {
            $id = crearPropiedad($_POST);
            header("location: ./housePage.php?id=" . $id);
        } catch (Exception $ex) {
            header("location: ./housePage.php");
        }
    }
} else {
    header("location: ./login.php");
}