<?php

final class AccountController {


    function getuser(){
     require MODELDIR.DS.'AccountModel.php' ;
     $m=New AccountModel();
     $user =$m->getuser();

     require VIEWDIR.DS.'AccountView.php' ;     
     $v = New AccountView();
     $html = $v->showUserInformation($user);
     echo $html;
     http_response_code(200);
}
function view($id){
    if($id == 0 )
       $this->getuser();
    else 
       $this->getuser();
}
}

?>