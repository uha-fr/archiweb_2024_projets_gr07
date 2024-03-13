<?php
  if(!is_null($calories)){
    $objective = $user['caloriesobjective'];
      $percentage = ($calories/$objective)*100;
  }
  echo "
  <h2> Bienvenue {$user['firstname']}</h2>
  <div class=\"container mt-5\">
    <div class=\"mb-3\">
      <div class=\"col-md-6\">
        <div class=\"mb-3\">
          <label for=\"duration\" class=\"form-label\">Choisir la durée :</label>
          <select class=\"form-select\" id=\"duration\">
            <option value=\"day\">Jour</option>
            <option value=\"week\">Semaine</option>
            <option value=\"month\">Mois</option>
          </select>
        </div>
        <div class=\"mb-3\">
        
        
      </div>
        <div class=\"mb-3\">
          <div class=\"circle green-circle mb-2\">{$percentage}%</div>
          <div>Calories consommées : {$calories}</div>
          <div class=\"text-muted\">Objectif: {$objective}</div>
        </div>
        <div class=\"mb-3\">
          <div class=\"circle red-circle mb-2\">{$numberOfMeals}</div>
          <div>Répas pris</div>
        </div>
        <div class=\"mb-3\">
          <a href=\"Home/setobjective\" class=\"btn btn-primary\">Définir l'objectif</a>
          <a href=\"Meal/choose\" class=\"btn btn-primary\">Ajouter un repas</a>
        </div>
      </div>
    </div>
  </div>";
?>
