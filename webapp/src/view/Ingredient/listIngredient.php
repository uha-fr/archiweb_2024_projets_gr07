<?php

        $view = "<div class=\"feature\" >";
        $view .= "<h2>{$content['label']}</h2>"; 
        $view .= "<p>Nombre de calories : {$content['calories']}</p>";
        $view .= "<img src={$content['photo']} alt='Photo de la recette' style='max-width: 100%;'>";
        $view .= "</div>";
        echo $view;

?>