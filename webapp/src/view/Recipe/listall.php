<?php
namespace webapp\view\Recipe;
 
       $view = ""; 
       $counter = 0;

foreach ($content as $recipe) {
        if ($counter % 3 == 0) {
                $view .= "<div class=\"row\">";
            }
        $view .= Content::contenu($recipe);
           
        $counter++;

        if ($counter % 3 == 0) {
                $view .= "</div>"; 
            }
        }
        if ($counter % 3 != 0) {
                $view .= "</div>";
            }        
        echo $view;

?>
