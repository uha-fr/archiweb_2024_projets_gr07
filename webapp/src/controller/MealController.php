<?php
use webapp\view\MealView;
use webapp\model\MealModel;
use webapp\model\AccountModel;
use webapp\model\RecipeModel;



final class MealController {
    function chooseRecipe() {
            $m=New RecipeModel();
            $products =$m->getAllRecipes();
            $v = new MealView();
            $html = $v->showRecipies($products);
            echo $html;
    }
    function addRecipe($post) {

        $meal = new MealModel();
        $meal->addMeal($post);	
        header("Location: ../Home");
    }


    function view($url) {
    if($url['action']=="choose")     
        $this->chooseRecipe();
    else 
        $this->addRecipe($url['post']);
        
    }
}
?>
