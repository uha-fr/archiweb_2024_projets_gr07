<?php

namespace webapp;

class Router {
    
    function manageRequest(){

      $controller = isset($_GET['controller']) ?$_GET['controller']:'Home';
      $classname =  $controller.'Controller';
      require CONTROLLERDIR.DS.$controller.'Controller.php';

      $c = new $classname();
      $c->view(1);

    }



}

?>