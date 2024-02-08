<?php

class AccountView {

    function showUserInformation($user){
        return $this->loadViewContent('Account','account',$user);
    }
   

    private function loadViewContent($ressource,$file,$content){
        ob_start(); 
        require VIEWDIR.DS.'template.php';
        $out = ob_get_clean();
        return $out;
    }
}


?>