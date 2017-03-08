<?php

require_once 'smarty.php';
require_once 'datos.php';

if(isset($_GET['error'])){
    $miSmarty->assign('error', TRUE);
}

$miSmarty->display('login.tpl');

