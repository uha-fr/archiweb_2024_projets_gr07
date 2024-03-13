<?php
namespace webapp\view\Meal;
use webapp\view\Recipe\Content;

$view = ""; 

foreach ($content as $recipe) {
 
     $view .= "<form action=\"Meal/add\" method=\"post\">";
     $view .= "<input type=\"hidden\" name=\"recipe_id\" value=\"{$recipe['id']}\">";
     $view .= "<a href=\"Recipe/listone/{$recipe['id']}\"style=\"text-decoration: none; color: inherit;\">";
     $view .= "<h2 class=\"mb-3\">{$recipe['label']}</h2>";
     $view .= "</a>";
     $view .= "<button type=\"submit\" class=\"btn btn-primary\">"; 
     $view .= "Choisir</button>";

     $view .= "</form>";
     }
       
 echo $view;

?>
