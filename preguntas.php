<?php

ini_set('display_errors', 1);

require_once 'smarty.php';
require_once 'datos.php';

try {
    
    $preguntas = get_preguntas();
    $mySmarty->assign('preguntas', $preguntas);
    $mySmarty->display('preguntas.tpl');
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

