<?php

use webapp\model\RecipyModel;
use webapp\model\IngredientRecipeModel;
use webapp\view\IngredientRecipeView;


final class IngredientRecipeController {

   function list($id){
     $m=New RecipyModel();
     $Recipe =$m->getRecipeById($id);
     $i = New IngredientRecipeModel();
     $ingredients = $i->getAllIngredients($Recipe);
     $v = New IngredientRecipeView();
     $html = $v->showIngredients($ingredients);
     echo $html;
     http_response_code(200);
   }

   function view($url){
      $this->list($url['id']); 
   }
}
?>