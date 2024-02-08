<?php


class Router {
    
   function manageRequest(){
    require CONTROLLERDIR.DS.'RecipyController.php';

  //  $_GET['controller'];

    $c = New RecipyController();
    $c->list();
   // $c->view(1);



/*
    $controller = ........
    $filename =  $controller.'Controller.php';
    $classname =  $controller.'Controller.php';
    $methodname =  $controller.'Controller.php';
    $id =  $controller.'Controller.php';


    require CONTROLLERSDIR.DS.$Controller'Controller.php';

$c = new $classname();
if($id)
   $c = new $classname();
*/


    }



}

?>