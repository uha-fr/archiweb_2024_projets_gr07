<?php

        $view = "<ul class=\"list-group\">";
 
        foreach ($content as $ingredient) {
           $view.= "<a href=\"Ingredient/{$ingredient['id']}\"style=\"text-decoration: none; color: inherit;\">";
            $view .= "<p>{$ingredient['label']}</p>";
            $view .= "</a>";
        }
        $view .= "</ul>";
        echo $view;
 
?>