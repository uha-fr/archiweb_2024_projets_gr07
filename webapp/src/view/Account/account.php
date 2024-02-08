<?php
class ShowContent {
    private $user;
    
    function __construct($user) {
        $this->user = $user;
    }
    
    function __toString() {
        return "<div>le nom d'utilisateur: {$this->user}</div>";
    }
}
?>