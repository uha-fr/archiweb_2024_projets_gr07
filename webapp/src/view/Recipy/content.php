<?php
namespace webapp\view\Recipy;
class Content {

    function contenu($Recipe) {
        $contenu = "<a href=\"index.php?controller=IngredientRecipe&id={$Recipe['id']}\"style=\"text-decoration: none; color: inherit;\">";
        $contenu .= "<div class=\"feature\">";
        $contenu .= "<h2>{$Recipe['label']}</h2>";
        $contenu .= "<p>Temps de préparation : {$Recipe['preparation_time']} minutes</p>"; 
        $contenu .= "<p>Description : {$Recipe['description']}</p>";
        $contenu .= "<p>Nombre de personnes : {$Recipe['number_person']}</p>";
        $contenu .= "<img src={$Recipe['photo']} alt='Photo de la recette' style='max-width: 100%;'>";
        $contenu .= "</div>";
        $contenu .= "</a>";
        return $contenu;
    }
}
?>