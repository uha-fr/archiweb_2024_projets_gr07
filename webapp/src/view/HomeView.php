<?php

class HomeView {

    function showGreeting($greeting){
        return $this->loadViewContent('Home','greeting',$greeting);
    }
   

    private function loadViewContent($ressource,$file,$content){
        ob_start(); 
        require VIEWDIR.DS.'template.php';
        $out = ob_get_clean();
        return $out;
    }
}


?>