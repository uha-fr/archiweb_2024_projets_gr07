<?php
class ShowContentListIngredients {
    private $ingredients;
    
    function __construct($ingredients) {
        $this->ingredients = $ingredients;
    }
    
    function __toString() {
        $contenu = "<ul class=\"list-group\">";
 
        foreach ($this->ingredients as $ingredient) {
           $contenu.= "<a href=\"index.php?controller=Ingredient&id={$ingredient['id']}\"style=\"text-decoration: none; color: inherit;\">";
            $contenu .= "<p>{$ingredient['label']}</p>";
            $contenu .= "</a>";
        }
        $contenu .= "</ul>";
        return $contenu;
    }
}

?>