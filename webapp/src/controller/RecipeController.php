<?php
use webapp\model\RecipeModel;
use webapp\view\RecipeView;

final class RecipeController {

   function list(){
     $m=New RecipeModel();
     $products =$m->getAllRecipes();
     $v = New RecipeView();
     $html = $v->listall($products);
     echo $html;
     http_response_code(200);
   }
   function getone($id){
     $m=New RecipeModel();
     $product =$m->getRecipeById($id);

     $v = New RecipeView();
     $html = $v->listone($product);
     echo $html;
     http_response_code(200);
   }
   function view($url){
     if($url['action'] == "listall" )
      $this->list(); 
     else 
      $this->getone($url['id']);

   }
}
?>