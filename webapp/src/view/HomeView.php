<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;
class HomeView extends AbstractView {

    function showGreeting(){
        return $this->loadViewContent('Home','greeting');
    }
    function showUserInfo($content){
        return $this->loadViewContent('Home','usage',$content);
    }
    function showSetObjective(){
        return $this->loadViewContent('Home','setObjective');
    }
    

}


?>