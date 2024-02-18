<?php
class ShowContentIngredient  {
    private $ingredient;
    
    function __construct($ingredient) {
        $this->ingredient = $ingredient;
    }
    
    function __toString() {
        $contenu = "<div class=\"feature\" >";
        $contenu .= "<h2>{$this->ingredient['label']}</h2>"; 
        $contenu .= "<p>Nombre de calories : {$this->ingredient['calories']}</p>";
        $contenu .= "<img src={$this->ingredient['photo']} alt='Photo de la recette' style='max-width: 100%;'>";
        $contenu .= "</div>";
        return $contenu;
    }
}
?>