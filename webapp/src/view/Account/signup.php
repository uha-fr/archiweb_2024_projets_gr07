<?php

$vue = "<div class=\"col-md-7 col-lg-8\">
  <h4 class=\"mb-3\">S'inscrire</h4>
  <form action=\"Account/signupsubmit\" method=\"post\" class=\"needs-validation\" novalidate>
    <div class=\"mb-3\">
      <div class=\"mb-3\">
        <label for=\"nom\" class=\"form-label\">Nom</label>
        <input type=\"text\" class=\"form-control\" id=\"nom\" name=\"nom\" placeholder=\"\" value=\"\" required>
        <div class=\"invalid-feedback\">
          Nom est requis.
        </div>
      </div>

      <div class=\"mb-3\">
        <label for=\"prenom\" class=\"form-label\">prénom</label>
        <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" placeholder=\"\" value=\"\" required>
        <div class=\"invalid-feedback\">
          prénom est requis.
        </div>
      </div>

      <div class=\"col-12\">
        <label for=\"username\" class=\"form-label\">Nom d'utilisateur</label>
        <div class=\"input-group has-validation\">
          <span class=\"input-group-text\">@</span>
          <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Nom d'utilisateur\" required>
          <div class=\"invalid-feedback\">
            Your username is required.
          </div>
        </div>
      </div>

      <div class=\"col-12\">
        <label for=\"email\" class=\"form-label\">Email <span class=\"text-body-secondary\"></span></label>
        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"vous@example.com\">
        <div class=\"invalid-feedback\">
          Please enter a valid email address for shipping updates.
        </div>
      </div>
      <div class=\"col-12\">
        <label for=\"password\" class=\"form-label\">Mot de passe<span class=\"text-body-secondary\"></span></label>
        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">
        <div class=\"invalid-feedback\">
          Please enter a valid email address for shipping updates.
        </div>
      </div>


      <div class=\"col-12\">
        <label for=\"address\" class=\"form-label\">Addresse</label>
        <input type=\"text\" class=\"form-control\" id=\"address\" name=\"address\" placeholder=\".... Rue\" required>
        <div class=\"invalid-feedback\">
          Please enter your address.
        </div>
      </div>


      <div class=\"col-md-5\">
        <label for=\"country\" class=\"form-label\">Pays</label>
        <select class=\"form-select\" id=\"country\" name=\"country\" required>
          <option value=\"\">Choose...</option>";
          foreach($content as $c){
          $vue.="<option>{$c['name']}</option>";
          }
          $vue.="

        </select>
        <div class=\"invalid-feedback\">
          Please select a valid country.
        </div>

      </div>
      <div class=\"col-md-5\">
        <label for=\"usertype\" class=\"form-label\">Type d'utilisateur</label>
        <select class=\"form-select\" id=\"usertype\" name=\"usertype\" required>
          <option value=\"\">Choose...</option>
          <option>Nutritionniste</option>
          <option>Utilisateur régulier</option>

        </select>
        <div class=\"invalid-feedback\">
          Please select a valid usertype.
        </div>
      </div>


    </div>

    <hr class=\"my-4\">


    <button class=\"w-100 btn btn-primary btn-lg\" type=\"submit\">S'inscrire</button>
  </form>
</div>
</div>";
echo $vue;

?>
