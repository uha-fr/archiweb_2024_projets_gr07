<?php
namespace webapp\view\Meal;
use webapp\view\Recipe\Content;

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
