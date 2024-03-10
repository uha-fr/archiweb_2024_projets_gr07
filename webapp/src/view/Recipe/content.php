<?php
namespace webapp\view\Recipe;
class Content {

    static function contenu($Recipe) {
        $contenu  = "<div class=\"recipe-container\">";
        $contenu .= "<a href=\"IngredientRecipe/{$Recipe['id']}\"style=\"text-decoration: none; color: inherit;\">";
        $contenu .= "<h2>{$Recipe['label']}</h2>";
        $contenu .= "<p>Temps de préparation : {$Recipe['preparation_time']} minutes</p>"; 
        $contenu .= "<p>Description : {$Recipe['description']}</p>";
        $contenu .= "<p>Nombre de personnes : {$Recipe['number_person']}</p>";
        $contenu .= "<img src={$Recipe['photo']} alt='Photo de la recette' style='max-width: 100%;height : 300px''>";
        $contenu .= "</a>";
        $contenu .= "</div>";

        return $contenu;
    }
}
?>