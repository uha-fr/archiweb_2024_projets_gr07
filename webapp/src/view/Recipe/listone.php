<?php
namespace webapp\view\Recipe;

        $contenu  = "<div class=\"mb-3\">";
        $contenu .= "<a href=\"IngredientRecipe/{$content['id']}\"style=\"text-decoration: none; color: inherit;\">";
        $contenu .= "<h2>{$content['label']}</h2>";
        $contenu .= "<p>Temps de préparation : {$content['preparation_time']} minutes</p>"; 
        $contenu .= "<p>Description : {$content['description']}</p>";
        $contenu .= "<p>Nombre de personnes : {$content['number_person']}</p>";
        $contenu .= "<img src={$content['photo']} alt='Photo de la recette' style='max-width: 100%;height : auto'>";
        $contenu .= "</a>";
        $contenu .= "</div>";
        echo $contenu;

?>