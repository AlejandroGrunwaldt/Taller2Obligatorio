<head>
        <title>Sitio de Ventas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/4-col-portfolio.css">
        <script type="text/javascript" src="./javascript/plugins/node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="./javascript/plugins/bootstrap/bootstrap.min.js"></script>
</head>

<?php
ini_set('display_errors', 1);
require_once './smarty.php';
require_once './class.Conexion.BD.php';


$mySmarty = obtenerSmarty();

$mySmarty->display('index.tpl');

