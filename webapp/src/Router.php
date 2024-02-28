<?php

namespace webapp;

class Router {
    
    function manageRequest(){
      $controller = isset($_GET['Controller']) && $_GET['Controller'] != 'index.php' ? $_GET['Controller'] : 'Home';


      $id = isset($_GET['id']) ?$_GET['id']:'0';
      $classname =  $controller.'Controller';
      require CONTROLLERDIR.DS.$controller.'Controller.php';

      $c = new $classname();
      $c->view($id);

    }



}

?>