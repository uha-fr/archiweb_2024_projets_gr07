<?php   
   $user = $content['user'];
   $country = $content ['country'];
   $view  = "<div class=\"feature\">";
   $view .= "<h2>Votre Compte</h2>";
   $view .= "<p>Nom : {$user['lastname']}</p>"; 
   $view .= "<p>Prénom : {$user['firstname']}</p>";
   $view .= "<p>Nom d'utilisateur : {$user['username']}</p>";
   $view .= "<p>Pays : {$country}</p>";
   $view .= "<p>Addresse : {$user['address']}</p>";
   $view .= "</div>";
   echo $view;
   
