<?php
use webapp\view\HomeView;
use webapp\model\MealModel;
use webapp\model\AccountModel;

final class HomeController {


    function getgreeting(){
  
     $v = New HomeView();
     $html = $v->showGreeting();
     echo $html;
     http_response_code(200);
    }

     function getUsergreeting($user,$user_type,$condition){
      $m = New MealModel();
      $c ="getTotal{$condition}Calories";
      $c1 ="getNumberOf{$condition}Meals";
      $calories = $m->$c();
      $numberOfMeals = $m->$c1();
      $content = Array();
      $content["calories"] = $calories;
      $content["numberOfMeals"] = $numberOfMeals;
      $content["user"] = $user;
      $content["user_type"] = $user_type;
      if($calories){
      $v = New HomeView();
      $html = $v->showUserInfo($content);
      echo $html;
      http_response_code(200);
      }else{
         $calories = 0;
         $numberOfMeals = 0;
         $v = New HomeView();
         $html = $v->showUserInfo($user_type,$user,$calories, $numberOfMeals);
         echo $html;
         http_response_code(200);
      }
}
function setObjective(){
   $v = New HomeView();
   $html = $v->showSetObjective();
   echo $html;
   http_response_code(200);
}
function setObjectiveSubmit($post){
   $a = New AccountModel;
   $a->setObjective($post['objective']);
   header("Location: new");
}
function view($url){
   if($url['action']=="setobjective")
      $this->setObjective();
   else if($url['action']== "setobjectivesubmit")
      $this->setObjectiveSubmit($url['post']);
   else{
   if($url['userType'] == 'guest')
      $this->getgreeting();
   else 
       $this->getUsergreeting($url['user'],$url['userType'] ,$url['condition']);
}
}
}

?>