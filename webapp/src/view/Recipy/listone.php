<?php
use webapp\view\Recipy\Content;
class ShowContent extends Content {
    private $Recipe;
    
    function __construct($Recipe) {
        $this->Recipe = $Recipe;
    }
    
    function __toString() {
        $this->contenu($Recipe);
    }
}
?>