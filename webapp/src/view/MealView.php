<?php

namespace webapp\view;
require_once 'View.php';
use webapp\view\View;

class MealView extends AbstractView{

    function showRecipies($products){
        return $this->loadViewContent('Meal','listall',$products);
    }
    
}


?>