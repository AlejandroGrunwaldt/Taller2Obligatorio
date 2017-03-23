<?php

require_once 'datos.php';

if (isset($_POST['editar']) && !empty($_POST['editar']) && $_POST['editar'] == 'true') {
    $x = 1;
    actualizarDatos($_POST);
    header("location: ./housePage.php?id=".$_POST['idCasa']);
}