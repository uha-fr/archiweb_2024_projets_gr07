<?php

namespace webapp\model;

class IngredientModel extends Model {

    protected $label;
    protected $calories;
    protected $photo;
    protected $category_id;

    public function __construct() {
        parent::__construct();

        $this->label = '';
        $this->calories = -1;
        $this->photo = '';
        $this->category_id = -1;
    }

    protected static function getTableName() {
        return "ingredient";
    }
 
    function getIngredientById($id){
        return self::getById($id);
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setCalories($calories) {
        $this->calories = $calories;
    }

    public function getCalories() {
        return $this->calories;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }
}