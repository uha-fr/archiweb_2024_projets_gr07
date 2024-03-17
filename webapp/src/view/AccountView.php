<?php

namespace webapp\view;
require_once 'View.php';
use webapp\view\AbstractView;

class AccountView extends AbstractView{

    function showUserInformation($content){
        return $this->loadViewContent('Account','account',$content);
    }
    function signup($countries){
        return $this->loadViewContent('Account','signup',$countries);
    }
    function login(){
        return $this->loadViewContent('Account','login');
    }

}


?>