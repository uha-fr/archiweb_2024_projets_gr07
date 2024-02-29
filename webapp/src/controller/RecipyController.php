<?php
use webapp\model\RecipyModel;
final class RecipyController {

   function list(){
     $m=New RecipyModel();
     $products =$m->getAllRecipes();
     require VIEWDIR.DS.'RecipyView.php' ;     
     $v = New RecipyView();
     $html = $v->listall($products);
     echo $html;
     http_response_code(200);
   }
   function getone($id){
     require MODELDIR.DS.'RecipyModel.php' ;
     $m=New RecipyModel();
     $product =$m->getRecipeById($id);

     require VIEWDIR.DS.'RecipyView.php' ;     
     $v = New RecipyView();
     $html = $v->listone($product);
     echo $html;
     http_response_code(200);
   }
   function view($url){
     if($url['id'] == 0 )
      $this->list(); 
     else 
      $this->getone($url['id']);

   }
}
?>