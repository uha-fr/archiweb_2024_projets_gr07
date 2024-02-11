<?php
require_once 'View.php';
use webapp\view\AbstractView;

class AccountView extends AbstractView{

    function showUserInformation($user){
        return $this->loadViewContent('Account','account',$user);
    }
    function showAccount($user){
        return $this->loadViewContent('Account','account',$user);
    }
    function signup($user){
        return $this->loadViewContent('Account','signup',$user);
    }
    function login($user){
        return $this->loadViewContent('Account','login',$user);
    }

}


?>