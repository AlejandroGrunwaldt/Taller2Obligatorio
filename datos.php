<?php

function conectar() {
    $cn = new ConexionBD('mysql', 'localhost', 'ventas', 'root', 'root');

    $cn->conectar();
    return $cn;
}