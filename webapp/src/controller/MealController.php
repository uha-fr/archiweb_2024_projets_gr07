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
    function addRecipe($id) {
        $m = new AccountModel();
        $user_id = $m->getUserIdFromSession();
        if ($user_id) {
           $user = $m->getByID($user_id);
        } else {
            header("Location: login");
            exit;
        }
    }


    function view($url) {
    if($url['id']==0)     
        $this->chooseRecipe();
    else 
        $this->addRecipe($url['id']);
        
    }
}
?>
