<?php

require_once('./../app/Route.php');
require_once('./../controller/MasterController.php');
echo $_POST['control'];
$route = new Route();




    if (isset($_POST['control']) && isset($_POST['action'])) {

        $controller = $_POST['control'];
        $action = $_POST['action'];
        $route->add($controller, $action);
 
    } else {
        $controller = 'Auth';
        $action = 'index';
        $route->add($controller,$action);
      
    }
    
$route->submit();
