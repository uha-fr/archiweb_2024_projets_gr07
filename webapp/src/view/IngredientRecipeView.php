<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;

class IngredientRecipeView extends AbstractView {

    function showIngredients($ingredients){
        return $this->loadViewContent('IngredientRecipe','listIngredients',$ingredients);
    }

}


?>