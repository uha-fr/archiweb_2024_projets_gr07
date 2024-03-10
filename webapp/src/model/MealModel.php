<?php
namespace webapp\model;
class MealModel extends Model{
    
    protected $user;
    protected $recipe;
    protected $date;


    public function __construct() {
        parent::__construct();

        $this->user = '';
        $this->recipe = '';
        $this->date = '';

    }
    protected static function getTableName() {
        return 'meal'; 
    }
    public function setRecipe($recipe) {
        $this->recipe = $recipe;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public static function startSession() {
        session_start();
    }
    public static function getUserIdFromSession() {
        return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    }
   function AddMeal($post){
        $recipe = $post['recipe']; 
        $this->startSession();
        $user = $this->getUserIdFromSession();
        $this->setRecipe($recipe);
        $this->setUser($user);
        $this->setDate(date('Y-m-d H:i:s'));
        $this->save();
   }

}

?>