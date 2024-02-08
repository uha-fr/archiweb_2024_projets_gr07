<?php
class ShowContent {
    private $Recepies;
    
    function __construct($Recepies) {
        $this->Recepies = $Recepies;
    }
    
    function __toString() {
        $contenu = "<ul class=\"list-group\">";
        foreach ($this->Recepies as $Recepie) {
            $contenu .= "<li class=\"list-group-item\">$Recepie</li>";
        }
        $contenu .= "</ul>";
        return $contenu;
    }
}
?>
