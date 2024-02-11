<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;

class IngredientView extends AbstractView {

    function showIngredient($ingredient){
        return $this->loadViewContent('Ingredient','listIngredient',$ingredient);
    }

}


?>