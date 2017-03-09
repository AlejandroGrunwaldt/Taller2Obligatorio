<?php

require_once 'class.Conexion.BD.php';

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
        if ($recordar) {
            setcookie("id_usuario", $resultado['id'], time() + 3600);
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

function logout() {
    session_start();
    setcookie("id_usuario", -1, time() + 3600);
    unset($_SESSION["usuario"]);
}

function get_preguntas($sinRespuesta = true) {
    $bd = conectar();
    $sql = "SELECT * "
            . "FROM preguntas p ";
            
    if ($sinRespuesta == true) {
        $sql = $sql . " WHERE p.respuesta IS null";
    }
    
    $sql = $sql . " ORDER BY p.fecha DESC";

    $bd->consulta($sql);

    $preguntas = $bd->restantesRegistros();
    $bd->desconectar();
    return $preguntas;
}

function fetchHouses($page, $perPage = 10) {
    
    $from = $page - 1;
    $to = ($page) * $perPage;
    
    $cn = conectar();    
    
    $cn->consulta("
            SELECT * FROM propiedades
            WHERE id BETWEEN :from AND :to
        ", array(
        array('from', $from, 'int'),
        array('to', $to, 'int')
    ));
    $productos = $cn->restantesRegistros();

    $cn->desconectar();

    return array( 
        'datos' => $productos
    );
}
