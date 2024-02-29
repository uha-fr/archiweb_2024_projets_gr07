<?php
use webapp\model\IngredientModel;
use webapp\view\IngredientView;

final class IngredientController {

   function getIngredient($id){
     $m=New IngredientModel();
     $ingredient =$m->getIngredientById($id);
     $v = New IngredientView();
     $html = $v->showIngredient($ingredient);
     echo $html;
     http_response_code(200);
   }
 
   function view($url){
      $this->getIngredient($url['id']); 
   }
}
?>