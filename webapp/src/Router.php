<?php

namespace webapp;
use webapp\model\AccountModel;

class Router {


    function manageRequest(){
      $controller = isset($_GET['Controller']) && $_GET['Controller'] != 'index.php' && $_GET['Controller'] != '' ? $_GET['Controller'] : 'Home';
      $id = isset($_GET['id']) ?$_GET['id']:'0';
      $action = isset($_GET['action']) ? $_GET['action']:'account';
      $condition = isset($_GET['condition']) ? $_GET['condition']:'Day';
      $post = null;
      if(isset($_GET['action']))
      { if($_GET['action'] == 'loginsubmit' || $_GET['action'] == 'signupsubmit' || $_GET['action'] == 'setobjectivesubmit'||$_GET['action'] =='add')
         $post = $_POST;
      }
  
      $m = new AccountModel();
      $userType = $m->getUserType();
      $user = $m->getUser();
      $url = array();
      $url['controller'] = $controller;
      $url['id'] = $id;
      $url['action']  = $action;
      $url['condition']  = $condition;
      $url['userType']  = $userType;
      $url['user']  = $user;
      $url['post']  = $post;
      $classname =  $controller.'Controller';

      require CONTROLLERDIR.DS.$controller.'Controller.php';

      $c = new $classname();
      $c->view($url);

    }



}

?>