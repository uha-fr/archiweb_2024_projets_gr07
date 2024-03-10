<?php

use webapp\model\RecipeModel;
use webapp\model\IngredientRecipeModel;
use webapp\view\IngredientRecipeView;


final class IngredientRecipeController {

   function list($id){
     $m=New RecipeModel();
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