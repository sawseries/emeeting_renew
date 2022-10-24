<?php

require_once('./app/autoload.php');

$route = new Route();

    if (isset($_GET['controller']) && isset($_GET['action'])) {

        $controller = $_GET['controller'];
        $action = $_GET['action'];
        $route->add($controller, $action);
 
    } else {
        $controller = 'Auth';
        $action = 'index';
        $route->add($controller, $action);
      
    }
$route->submit();
