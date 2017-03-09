<?php

require_once 'smarty.php';
require_once 'datos.php';

if(isset($_GET['error'])){
    $mySmarty->assign('error', TRUE);
}

$mySmarty->display('login.tpl');

