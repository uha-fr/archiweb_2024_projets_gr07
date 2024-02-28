<?php

namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;

class AccountView extends AbstractView{

    function showUserInformation($user){
        return $this->loadViewContent('Account','account',$user);
    }
    function signup(){
        return $this->loadViewContent('Account','signup','');
    }
    function login(){
        return $this->loadViewContent('Account','login','');
    }

}


?>