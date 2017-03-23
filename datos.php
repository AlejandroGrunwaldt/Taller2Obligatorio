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

function obtener_ciudades(){
     $bd = conectar();
    $sql = "SELECT * "
            . "FROM ciudades c ";
            

    $bd->consulta($sql);

    $ciudades = $bd->restantesRegistros();
    $bd->desconectar();
    return $ciudades;
}

function obtener_barrios($ciudadId){
    $cn = conectar();
    
    $cn->consulta("SELECT * FROM barrios WHERE ciudad_id= :ciudad_id", array(
        array('ciudad_id', $ciudadId, 'int')
    ));
    
    $barrios = array();
    $a = $cn->cantidadRegistros();
    for ($i = 0; $i < $a; $i++) {
        $barrio = $cn->siguienteRegistro();
        array_push($barrios, $barrio);
    }

    $cn->desconectar();

    return $barrios;
}

function guardarRespuesta($respuesta, $id = 0) {
    $cn = conectar();
    $date = date('Y-m-d H:i:s');
    $cn->consulta("
           UPDATE `preguntas`
           SET `respuesta` = :respuesta, `fecha_respuesta` = :fecha_respuesta
           WHERE id = :id;
       ", array(
        array('respuesta', $respuesta, 'string'),
        array('fecha_respuesta', $date, 'string'),
        array('id', $id, 'string')
    ));
}

function getPromedioCiudad($idCiudad, $tipoOp){
    
    $barrios = obtener_barrios($idCiudad);
    $promedio = array();
    foreach ($barrios as $barrio) {
        $estadistica = getPromedioPrecioBarrio($barrio["id"], $tipoOp);
        array_push($promedio, array("barrio" => $barrio, "promedio" => $estadistica["promedio"], "cantidad" => $estadistica["cantidad"]));
    }
    return $promedio;
}
