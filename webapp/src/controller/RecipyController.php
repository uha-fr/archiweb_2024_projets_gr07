<?php

final class RecipyController {

     function list(){
          require MODELDIR.DS.'RecipyModel.php' ;
          $m=New RecipyModel();
          $products =$m->getall();

          require VIEWDIR.DS.'RecipyView.php' ;     
          $v = New RecipyView();
          $html = $v->listall($products);
          echo $html;
          http_response_code(200);
    }
    function getone(){
     require MODELDIR.DS.'RecipyModel.php' ;
     $m=New RecipyModel();
     $product =$m->getone();

     require VIEWDIR.DS.'RecipyView.php' ;     
     $v = New RecipyView();
     $html = $v->listone($product);
     echo $html;
     http_response_code(200);
}
    function view($id){
     if($id == 0 )
        $this->getone();
     else 
        $this->list();
}
}
?>