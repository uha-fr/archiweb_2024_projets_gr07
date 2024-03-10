<?php
use webapp\view\HomeView;
use webapp\model\HomeModel;

final class HomeController {


    function getgreeting(){
  
     $v = New HomeView();
     $html = $v->showGreeting();
     echo $html;
     http_response_code(200);
    }

     function getUsergreeting($user,$user_type){
 
      $v = New HomeView();
      $html = $v->showUserInfo($user_type,$user);
      echo $html;
      http_response_code(200);
}
function view($url){
   if($url['userType'] == 'guest')
      $this->getgreeting();
   else 
       $this->getUsergreeting($url['user'],$url['userType'] );
}
}

?>