<?php

require_once 'class.Conexion.BD.php';
require_once 'housesBD.php';

function conectar() {
    $cn = new ConexionBD('mysql', 'localhost', 'inmobiliaria', 'root', 'root');

    $cn->conectar();
    return $cn;
}

function get_conexion() {
    return new PDO(
            'mysql:host=localhost;dbname=inmobiliaria', 'root', 'root'
    );
}

function login($usuario, $clave, $recordar) {
    session_start();
    
    $consulta = get_conexion()->prepare(
            "SELECT * "
            . "FROM usuarios u "
            . "WHERE u.usuario = :usuario AND u.clave = :clave "
    );

    $consulta->bindParam('usuario', $usuario, PDO::PARAM_STR);
    $consulta->bindParam('clave', $clave, PDO::PARAM_STR);

    $consulta->execute();
    $resultado = $consulta->fetchAll();

    if ($resultado) {
        $_SESSION["usuario"] = $resultado;
        if($recordar){
            setcookie("id_usuario",$resultado['id'], time() + 3600);
        }
        return TRUE;
    } else {
        return FALSE;
    }
}

function login_cookie($id_usuario) {
    $consulta = get_conexion()->prepare(
            "SELECT * "
            . "FROM usuarios u "
            . "WHERE c.id = :id"
    );

    $consulta->bindParam('id', $id_usuario, PDO::PARAM_INT);

    $consulta->execute();
    $resultado = $consulta->fetch();

    if ($resultado) {
        $_SESSION["usuario"] = $resultado;
        return TRUE;
    } else {
        return FALSE;
    }
}