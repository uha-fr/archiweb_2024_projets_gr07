<?php   
        
   $view  = "<div class=\"feature\">";
   $view .= "<h2>Votre Compte</h2>";
   $view .= "<p>Nom : {$content['lastname']}</p>"; 
   $view .= "<p>Prénom : {$content['firstname']}</p>";
   $view .= "<p>Nom d'utilisateur : {$content['username']}</p>";
   $view .= "<p>Addresse : {$content['address']}</p>";
   $view .= "<p>Pays : {$content['country_id']}</p>";
   $view .= "<p>Type de compte : {$content['user_type_id']}</p>";
   $view .= "</div>";
   echo $view;
   
