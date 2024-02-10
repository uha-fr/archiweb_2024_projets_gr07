<?php

namespace webapp\model;

class IngredientModel extends Model {

    private static $TABLE_NAME = "ingredient";

    protected static function getTableName() {
        return self::$TABLE_NAME;
    }

 
    function getingredient(){
        return ["Ingredient1","Ingredient2"];
    }
}