<?php

final class HomeController {


    function getgreeting(){
     require MODELDIR.DS.'HomeModel.php' ;
     $m=New HomeModel();
     $greeting =$m->getgreeting();

     require VIEWDIR.DS.'HomeView.php' ;     
     $v = New HomeView();
     $html = $v->showGreeting($greeting);
     echo $html;
     http_response_code(200);
}
function view($id){
    if($id == 0 )
       $this->getgreeting();
    else 
       $this->getgreeting();
}
}

?>