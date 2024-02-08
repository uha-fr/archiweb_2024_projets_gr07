<?php

class RecipyView {

    function listall($products){
        return $this->loadViewContent('Recipy','listall',$products);
    }
    function listone($product){
        return $this->loadViewContent('Recipy','listone',$product);
    }
    function showAccount($product){
        return $this->loadViewContent('Account','account');
    }
    function signup($product){
        return $this->loadViewContent('Account','signup');
    }
    function login($product){
        return $this->loadViewContent('Account','login');
    }

    private function loadViewContent($ressource,$file,$content){
        //$title = $content->title;
        ob_start(); 
        require VIEWDIR.DS.'template.php';
        $out = ob_get_clean();
        return $out;
    }
}


?>