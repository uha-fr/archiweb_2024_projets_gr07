<?php
namespace webapp\model;
class MealModel extends Model{
    
    protected $user_id;
    protected $recipe_id;
    protected $date;


    public function __construct() {
        parent::__construct();

        $this->user_id = '';
        $this->recipe_id = '';
        $this->date = '';

    }
    protected static function getTableName() {
        return 'meal'; 
    }
    public function setRecipe($recipe) {
        $this->recipe_id = $recipe;
    }
    public function setUser($user) {
        $this->user_id = $user;
    }
    public function setDate($date) {
        $this->date = $date;
    }

    function getMeals(){
        $user_id =  AccountModel::getUserIdFromSession();
        if ($user_id) {
            return self::select('*')->where('user_id', '=', $user_id)->get()[0];  
        }
        else {
        return null;
        }
   }
   function getTotalCalories(){
    
    $user_id = self::getUserIdFromSession();

    $date = date('Y-m-d');
    
if($user_id)   
{ 
    $sql = 'SELECT SUM(i.calories) AS total_calories
    FROM meal m
    JOIN recipe r ON m.recipe_id = r.id
    JOIN ingredientrecipe ri ON r.id = ri.recipe_id
    JOIN ingredient i ON ri.ingredient_id = i.id
    WHERE m.date = ? AND m.user_id = ?';
        $params = [$date, $user_id];
        return  Model::selectRaw($sql, $params)[0]['total_calories'];
    }
    else
    {
        return null;
    }
       
}
function getNumberOfMeals(){
    $user_id = $this->getUserIdFromSession();
    if($user_id){
        $sql = 'SELECT COUNT(*) AS meals_number FROM meal WHERE user_id = ?';
        $params = [$user_id];
      return  Model::selectRaw($sql, $params)[0]['meals_number'];
}
}
   function addMeal($post){
        $recipe_id = $post['recipe_id']; 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $user_id = $this->getUserIdFromSession();
      if($user_id){       
        $this->setRecipe($recipe_id);
        $this->setUser($user_id);
        $this->setDate(date('Y-m-d'));
        $this->save();
      }
    
   }

}

?>