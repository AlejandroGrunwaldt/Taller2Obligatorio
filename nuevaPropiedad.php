<?php

require_once('housesBD.php');

if (isset($_POST['editar']) && !empty($_POST['editar']) && $_POST['editar']=='true') {
    actualizarDatos($_POST);
}