<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;
class HomeView extends AbstractView {

    function showGreeting(){
        return $this->loadViewContent('Home','greeting','');
    }
    function showUserInfo($userType,$user){
        return $this->loadViewContent('Home','usage',$userType,$user);
    }
    

}


?>