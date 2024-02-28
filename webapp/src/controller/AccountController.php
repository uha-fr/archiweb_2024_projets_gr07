<?php
use webapp\view\AccountView;
use webapp\model\AccountModel;
final class AccountController {


    function getuser(){
     $m=New AccountModel();
     $user =$m->getuser();

     $v = New AccountView();
     $html = $v->showUserInformation($user);
     echo $html;
     http_response_code(200);
}
function signup(){


   $v = New AccountView();
   $html = $v->signup();
   echo $html;
   http_response_code(200);

}
function login(){
 
   $v = New AccountView();
   $html = $v->login();
   echo $html;
   http_response_code(200);
}

function view($id){
    if($id == 0 )
       $this->getuser();
    else if ($id == 1) 
       $this->signup();
      else 
      $this->login();

}

}

?>