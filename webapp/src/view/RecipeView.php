<?php
namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;
class RecipeView extends AbstractView {

    function listall($Recepies){
        return $this->loadViewContent('Recipe','listall',$Recepies);
    }
    function listone($Recipe){
        return $this->loadViewContent('Recipe','listone',$Recipe);
    }
}


?>