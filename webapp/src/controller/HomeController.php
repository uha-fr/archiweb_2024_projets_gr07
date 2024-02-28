<?php
use webapp\view\HomeView;
use webapp\model\HomeModel;

final class HomeController {


    function getgreeting(){
     $m=New HomeModel();
     $greeting =$m->getgreeting();

     $v = New HomeView();
     $html = $v->showGreeting($greeting);
     echo $html;
     http_response_code(200);
}
function view($id){
   $this->getgreeting();
}
}

?>