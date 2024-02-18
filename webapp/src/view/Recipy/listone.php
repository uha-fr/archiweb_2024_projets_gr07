<?php
use webapp\view\Recipy\Content;
class ShowContentRecipy extends Content {
    private $Recipe;
    
    function __construct($Recipe) {
        $this->Recipe = $Recipe;
    }
    
    function __toString() {
        $this->contenu($Recipe);
    }
}
?>