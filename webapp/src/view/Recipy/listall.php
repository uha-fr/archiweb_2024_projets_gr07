<?php
use webapp\view\Recipy\Content;
class ShowContentRecipy extends Content {
    private $Recepies;
    
    function __construct($Recepies) {
        $this->Recepies = $Recepies;
    }
    
    function __toString() {
        $contenu = "<ul class=\"list-group\">";
        foreach ($this->Recepies as $recipe) {
           $contenu .= $this->contenu($recipe);
        }
        $contenu .= "</ul>";
        return $contenu;
    }
}
?>
