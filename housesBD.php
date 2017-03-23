<?php

require_once('datos.php');
if (isset($_POST['editar']) && !empty($_POST['editar']) && $_POST['editar']=='true') {
    actualizarDatos($_POST);
}

function getCasas($pagina, $resultadosPorPagina = 10) {

    $hasta = ($pagina) * $resultadosPorPagina;
    $desde = $hasta - ($resultadosPorPagina - 1);

    $cn = conectar();

    $cn->consulta("
            SELECT p.*, b.nombre FROM propiedades p
            INNER JOIN barrios b ON p.barrio_id = b.id
            WHERE p.eliminado = 0
            LIMIT :from, :to
        ", array(
        array('from', $desde, 'int'),
        array('to', $resultadosPorPagina, 'int')
    ));
    $casas = array();
    $a = $cn->cantidadRegistros();
    for ($i = 0; $i < $a; $i++) {
        $casa = $cn->siguienteRegistro();
        array_push($casas, $casa);
    }

    $cn->consulta("
            SELECT count(*) as total
            FROM propiedades
        ");

    $total = $cn->siguienteRegistro()['total'] / $resultadosPorPagina;

    $cn->desconectar();

    return array(
        'casas' => $casas,
        'total' => ceil($total)
    );
}

function getCasa($id = 0) {
    $cn = conectar();

    $cn->consulta("
            SELECT p.id, p.tipo, p.operacion, p.precio, p.mts2, p.habitaciones, p.banios, p.garage, p.titulo, p.texto, p.barrio_id, b.nombre as `barrio`, c.nombre as `ciudad`
            FROM `propiedades` p, `barrios` b, `ciudades` c
            WHERE p.id = :id
            AND p.barrio_id = b.id
            AND b.ciudad_id = c.id
        ", array(
        array('id', $id, 'int')
    ));
    $casa = $cn->siguienteRegistro();

    return array(
        'casa' => $casa
    );
}

function getPreguntas($id = 0) {
    $cn = conectar();

    $cn->consulta("
            SELECT *
            FROM `preguntas` p
            WHERE p.id_propiedad = :id
            AND p.fecha_respuesta IS NOT NULL
        ", array(
        array('id', $id, 'int')
    ));
    $preguntas = array();
    $a = $cn->cantidadRegistros();
    for ($i = 0; $i < $a; $i++) {
        $pregunta = $cn->siguienteRegistro();
        array_push($preguntas, $pregunta);
    }
    return array(
        'preguntas' => $preguntas
    );
}

function guardarPregunta($id = 0, $pregunta) {
    $cn = conectar();
    $date = date('Y-m-d H:i:s');
    $cn->consulta("
           INSERT INTO `preguntas`
           (`id`, `id_propiedad`, `fecha`, `texto`, `respuesta`, `fecha_respuesta`)
           VALUES (NULL, :id, :date, :pregunta, NULL, NULL);
       ", array(
        array('id', $id, 'int'),
        array('pregunta', $pregunta, 'string'),
        array('date', $date, 'string')
    ));
}

function actualizarDatos($datos) {
    $sqlConBaja = "`tipo` = :tipo,
        `operacion`= :operacion,
        `barrio_id` = :barrio_id,
        `precio` = :precio,
        `mts2`= :mts2,
        `habitaciones` = :habitaciones,
        `banios` = :banios,
        `garage` = :garage,
        `texto` = :texto,
        `motivo_baja_id` = :motivo_baja_id,
        `eliminado` = :eliminado";
    $sqlSinBaja = "`tipo` = :tipo,
        `operacion`= :operacion,
        `barrio_id` = :barrio_id,
        `precio` = :precio,
        `mts2`= :mts2,
        `habitaciones` = :habitaciones,
        `banios` = :banios,
        `garage` = :garage,
        `texto` = :texto";
    $id = intval($datos[idCasa]);
    $barrio_id = $datos[barrio] ? $datos[barrio] : $datos[idBarrioActual];
    if (!$datos[garage]) {
        $datos[garage] = "0";
    }
    $sqlParametros = array(array('tipo', $datos[propiedad], 'string'),
        array('operacion', $datos[operacion], 'string'),
        array('barrio_id', intval($barrio_id), 'int'),
        array('precio', intval($datos[precio]), 'int'),
        array('mts2', intval($datos[mts2]), 'int'),
        array('habitaciones', intval($datos[habitaciones]), 'int'),
        array('banios', intval($datos[banios]), 'int'),
        array('garage', intval($datos[garage]), 'int'),
        array('texto', $datos[descripcionTA], 'string'),
        array('id', $id, 'int'));
    $sql = "";
    
    $cn = conectar();
    $motivoBaja = intval($datos[motivo_baja]);
    $eliminado = 0;
    if ($motivoBaja != 0) {
        $eliminado = 1;
        $sql = $sqlConBaja;
        array_push($sqlParametros, array('motivo_baja_id', $motivoBaja, 'int'),array('eliminado', $eliminado, 'int'));
    }else{
        $sql = $sqlSinBaja;
    }
    
    
    
    $cn->consulta("
        UPDATE propiedades SET ".$sql." 
           WHERE  `id` = :id;
       ", $sqlParametros);
    
    $carpeta = "./imagenes/" . $id;

    if(!file_exists($carpeta)){
        mkdir($carpeta);
    }

    $imagenes = $_FILES['imagenes'];
    for($i=0; $i<count($imagenes['name']);$i++){
        $temporal = $imagenes['tmp_name'][$i];
        move_uploaded_file($temporal, 
                $carpeta . "/" . $imagenes['name'][$i] );
    }
    header("location: ./housePage.php?id=".$id);
}

function buscarCasas($pagina, $operacion, $ciudad, $avanzada, $propiedad
        , $barrio, $habitaciones, $pDesde, $pHasta, $garaje, $orden, $forma) {
    $resultadosPorPagina = 10;
    $hasta = ($pagina) * $resultadosPorPagina - 1;
    $desde = $hasta - ($resultadosPorPagina) + 1;
    $cn = conectar();
    
    $casasSql = "SELECT p.*, b.nombre ";
    $countSql = "SELECT count(*) as total ";

    $sql = "FROM propiedades p, barrios b
            WHERE p.operacion = :op AND b.id = p.barrio_id AND b.ciudad_id = :idCiudad AND p.eliminado = 0";

    $params = array(
        array('op', $operacion, 'string'),
        array('idCiudad', $ciudad, 'int')
    );

    if ($avanzada == TRUE) {
        if ($propiedad != NULL) {
            $sql = $sql . " AND p.tipo = :tipoProp";
            array_push($params, array('tipoProp', $propiedad, 'string'));
        }
        if ($barrio != NULL) {
            $sql = $sql . " AND p.barrio_id = :idBarrio";
            array_push($params, array('idBarrio', $barrio, 'int'));
        }
        if ($habitaciones != NULL) {
            $sql = $sql . " AND p.habitaciones = :hab";
            array_push($params, array('hab', $habitaciones, 'int'));
        }
        if ($pDesde != NULL) {
            $sql = $sql . " AND p.precio >= :pDesde";
            array_push($params, array('pDesde', $pDesde, 'int'));
        }
        if ($pHasta != NULL) {
            $sql = $sql . " AND p.precio <= :pHasta";
            array_push($params, array('pHasta', $pHasta, 'int'));
        }
        if ($garaje != NULL) {
            $sql = $sql . " AND p.garaje = :garaje";
            array_push($params, array('garaje', $garaje, 'int'));
        }
    }

    if ($orden != NULL) {
        $sql = $sql . " ORDER BY " . $orden. " " . ($forma === NULL ? "ASC" : $forma);
    }

    $casasSql = $casasSql . $sql . " LIMIT :from, :to";
    $paramsCasas = $params;
    array_push($paramsCasas, array('from', $desde, 'int'),
        array('to', $resultadosPorPagina, 'int'));
    $cn->consulta($casasSql, $paramsCasas);
    $casas = array();
    $a = $cn->cantidadRegistros();
    for ($i = 0; $i < $a; $i++) {
        $casa = $cn->siguienteRegistro();
        array_push($casas, $casa);
    }
    $countSql = $countSql . $sql;
    $cn->consulta($countSql, $params);
    $total = $cn->siguienteRegistro()['total'] / $resultadosPorPagina;
    $cn->desconectar();

    return array(
        'casas' => $casas,
        'total' => ceil($total)
    );
}

function getPromedioPrecioBarrio($idBarrio, $tipoOp){
    $cn = conectar();
    $cn->consulta("
            SELECT p.precio, p.mts2
            FROM propiedades p
            WHERE p.eliminado = 0 AND p.barrio_id = :idBarrio 
            AND p.operacion = :tipoOp
        ", array(
        array('idBarrio', $idBarrio, 'int'),
        array('tipoOp', $tipoOp, 'string')
    ));
    $tuplas = array();
    $a = $cn->cantidadRegistros();
    for ($i = 0; $i < $a; $i++) {
        $tupla = $cn->siguienteRegistro();
        array_push($tuplas, $tupla);
    }

    $cn->desconectar();
        
    $promedioAcumulado = 0;
    foreach ($tuplas as $par){
        $promedioAcumulado += $par[precio] / $par[mts2];
    }
    $prom = $promedioAcumulado / $a;
    
    return number_format($prom, 2, '.', '');
}
function obtenerImagenes($idCasa){
    $path = "./imagenes/" . $idCasa;
    return array_diff(scandir($path), array('.', '..'));
}