<?php

// Imports de la clase de conexión con PDO y
// la clase controladora de contacts
require_once 'db/dbconn.php';
require_once 'controllers/ContactController.php';

// Instanciar la clase controladora
$controller = new ContactController();


if(!empty($_REQUEST['m'])){
    $method = $_REQUEST['m'];

    if(method_exists($controller,$method)){
        $controller->$method;
    }
    else{
        $controller->index();
    }
}
else{
    $controller->index();
}
?>