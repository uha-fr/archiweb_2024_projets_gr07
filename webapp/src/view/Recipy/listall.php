<?php
namespace webapp\view\Recipy;

    
 
    
        $view = "<ul class=\"list-group\">";
        foreach ($content as $recipe) {
           $view .= Content::contenu($recipe);
        }
        $view .= "</ul>";
        echo $view;

?>
