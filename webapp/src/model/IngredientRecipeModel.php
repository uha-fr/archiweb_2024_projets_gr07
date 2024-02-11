<?php

namespace webapp\model;

class IngredientRecipeModel extends Model {

    protected static function getTableName() {
        return 'IngredientRecipe'; 
    }

    public static function getAllIngredients($recipe) {
        $result =  self::select('*')->where('recipe_id', '=', $recipe['id'])->get();
        $ingredients = array();
        foreach ($result as $r){
        $ingredient = IngredientModel::getById($r['ingredient_id']);
        if ($ingredient) {
            array_push($ingredients, $ingredient);
        }
    }

        return $ingredients; 
}
}
?>
