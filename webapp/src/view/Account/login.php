<?php
echo "
<base  href=\"/archiweb_2024_projets_gr07/webapp/\">
<form action=\"Account/loginsubmit\" method=\"post\">
  <div class=\"mb-3\">
    <label for=\"InputEmail\" class=\"form-label\">Adresse e-mail</label>
    <input type=\"email\" class=\"form-control\" id=\"InputEmail\" name=\"email\" aria-describedby=\"emailHelp\">
    <div id=\"emailHelp\" class=\"form-text\">On ne va partager votre compte avec personne</div>
  </div>
  <div class=\"mb-3\">
    <label for=\"InputPassword\" class=\"form-label\">Mot de passe</label>
    <input type=\"password\" class=\"form-control\" id=\"InputPassword\" name=\"password\">
  </div>
  <div class=\"mb-3 form-check\">
    <input type=\"checkbox\" class=\"form-check-input\" id=\"exampleCheck1\">
    <label class=\"form-check-label\" for=\"exampleCheck1\">Rappelle moi</label>
  </div>
  <button type=\"submit\" class=\"btn btn-primary\">Se connecter</button>
 </form>";
?>
