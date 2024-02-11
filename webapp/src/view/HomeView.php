<?php
require_once 'View.php';
use webapp\view\AbstractView;
class HomeView extends AbstractView {

    function showGreeting($greeting){
        return $this->loadViewContent('Home','greeting',$greeting);
    }

}


?>