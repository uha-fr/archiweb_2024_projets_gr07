<?php

namespace webapp\model;

class RecipeModel extends Model {
    protected $label;
    protected $description;
    public function __construct() {
        parent::__construct();

        $this->label = '';
        $this->description = '';
    }
    protected static function getTableName() {
        return 'Recipe'; 
    }

    public static function getAllRecipes() {
        return self::getAll();
    }

    public static function getRecipeById($id) {
        return self::getById($id);
    }

    public static function getRecipesByCreator($creatorId) {
        return self::select('*')->where('creator_id', '=', $creatorId)->get();
    }

    public static function getRecipesByCountry($countryId) {
        return self::select('*')->where('country_origin_id', '=', $countryId)->get();
    }

}

?>
