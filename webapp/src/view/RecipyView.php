<?php
require_once 'View.php';
use webapp\view\AbstractView;
class RecipyView extends AbstractView {

    function listall($Recepies){
        return $this->loadViewContent('Recipy','listall',$Recepies);
    }
    function listone($Recipy){
        return $this->loadViewContent('Recipy','listone',$Recipy);
    }
}


?>