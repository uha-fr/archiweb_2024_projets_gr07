<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;
class HomeView extends AbstractView {

    function showGreeting(){
        return $this->loadViewContent('Home','greeting');
    }
    function showUserInfo($userType,$user, $calories,$numberOfMeals){
        return $this->loadViewContent('Home','usage',$userType,$user, $calories,$numberOfMeals);
    }
    function showSetObjective(){
        return $this->loadViewContent('Home','setObjective');
    }
    

}


?>