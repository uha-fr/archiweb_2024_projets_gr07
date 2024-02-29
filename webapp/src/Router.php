<?php

namespace webapp;

class Router {


    function manageRequest(){
      $controller = isset($_GET['Controller']) && $_GET['Controller'] != 'index.php' ? $_GET['Controller'] : 'Home';

      $id = isset($_GET['id']) ?$_GET['id']:'0';
      $action = isset($_GET['action']) ? $_GET['action']:'account';
      $action2 = isset($_GET['action2']) ? $_GET['action2']:'none'; 
      $post = null;
      if(isset($_GET['action']))
      { if($_GET['action'] == 'loginsubmit' || $_GET['action'] == 'signupsubmit' )
         $post = $_POST;
      }

      $url = array();
      $url['controller'] = $controller;
      $url['id'] = $id;
      $url['action']  = $action;
      $url['action2']  = $action2;
      $url['post']  = $post;


      $classname =  $controller.'Controller';
      require CONTROLLERDIR.DS.$controller.'Controller.php';

      $c = new $classname();
      $c->view($url);

    }



}

?>