<?php
namespace webapp\model;
class MealModel extends Model{
    
    protected $user_id;
    protected $recipe_id;
    protected $year;
    protected $month;
    protected $week;
    protected $day;


    public function __construct() {
        parent::__construct();

        $this->user_id = '';
        $this->recipe_id = '';
        $this->year = '';
        $this->month = '';
        $this->week = '';
        $this->day = '';

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
    public function setDay($day) {
        $this->day = $day;
    }
    public function setWeek($week) {
        $this->week = $week;
    }    public function setMonth($month) {
        $this->month = $month;
    }    public function setYear($year) {
        $this->year = $year;
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
   function getCalories($year = null, $month = null, $week = null, $day = null) {
    $user_id = self::getUserIdFromSession();

    if ($user_id) {
        $sql = 'SELECT SUM(i.calories) AS total_calories
                FROM meal m
                JOIN recipe r ON m.recipe_id = r.id
                JOIN ingredientrecipe ri ON r.id = ri.recipe_id
                JOIN ingredient i ON ri.ingredient_id = i.id
                WHERE ';
        
        $conditions = [];
        $params = [];
        
        if ($year !== null) {
            $conditions[] = 'm.year = ?';
            $params[] = $year;
        }
        if ($month !== null) {
            $conditions[] = 'm.month = ?';
            $params[] = $month;
        }
        if ($week !== null) {
            $conditions[] = 'm.week = ?';
            $params[] = $week;
        }
        if ($day !== null) {
            $conditions[] = 'm.day = ?';
            $params[] = $day;
        }

        $sql .= implode(' AND ', $conditions);
        $sql .= ' AND m.user_id = ?';
        $params[] = $user_id;

        return Model::selectRaw($sql, $params)[0]['total_calories'];
    } else {
        return null;
    }
}
   function getTotalDayCalories(){
    $day = date('d');
    $week = date('w');
    $month = date('m');
    $year = date('Y');
      return $this->getCalories($year,$month,$week,$day);
}

function getTotalWeekCalories(){
    $week = date('w');
    $month = date('m');
    $year = date('Y');
      return $this->getCalories($year,$month,$week);
}
function getTotalMonthCalories(){
    $month = date('m');
    $year = date('Y');
      return $this->getCalories($year,$month);
}
function getTotalYearCalories(){
    $year = date('Y');
      return $this->getCalories($year);
}
function getNumberOfMeals($year = null, $month = null, $week = null, $day = null){
    $user_id = $this->getUserIdFromSession();
    if($user_id){
        $sql = 'SELECT COUNT(*) AS meals_number FROM meal m WHERE user_id = ? AND ';
        $params  [] = $user_id;               
        $conditions = [];
        
        if ($year !== null) {
            $conditions[] = 'm.year = ?';
            $params[] = $year;
        }
        if ($month !== null) {
            $conditions[] = 'm.month = ?';
            $params[] = $month;
        }
        if ($week !== null) {
            $conditions[] = 'm.week = ?';
            $params[] = $week;
        }
        if ($day !== null) {
            $conditions[] = 'm.day = ?';
            $params[] = $day;
        }
        $sql .= implode(' AND ', $conditions);
      return  Model::selectRaw($sql, $params)[0]['meals_number'];
}
}
function getNumberOfDayMeals(){
    $day = date('d');
    $week = date('w');
    $month = date('m');
    $year = date('Y');
      return $this->getNumberOfMeals($year,$month,$week,$day);
}
function getNumberOfWeekMeals(){
    $week = date('w');
    $month = date('m');
    $year = date('Y');
      return $this->getNumberOfMeals($year,$month,$week);
}
function getNumberOfMonthMeals(){
    $month = date('m');
    $year = date('Y');
      return $this->getNumberOfMeals($year,$month);
}
function getNumberOfYearMeals(){
    $year = date('Y');
      return $this->getNumberOfMeals($year);
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
        $this->setDay(date('d'));
        $this->setweek(date('w'));
        $this->setMonth(date('m'));
        $this->setYear(date('Y'));

        $this->save();
      }
    
   }

}

?>