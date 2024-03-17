<?php
if (!is_null($calories)) {
    $objective = $user['caloriesobjective'];
    $percentage = ($calories / $objective) * 100;
    $circleClass = 'green-circle';
    if ($percentage > 90) {
        $circleClass = 'red-circle';
    } elseif ($percentage >= 80) {
        $circleClass = 'orange-circle';
    } elseif ($percentage >= 60) {
        $circleClass = 'yellow-circle';
    }
}
echo "
<h2> Bienvenue {$user['firstname']}</h2>
<div class=\"text-muted\">Objectif: {$objective}</div>
<div class=\"text-muted\">Calories consommées : {$calories}</div>

<div class=\"container mt-5\">
    <div class=\"mb-3\">
        <div class=\"col-md-6\">
            <div class=\"mb-3\">
                <div class=\"custom-btn-group\" aria-label=\"Choisir la durée :\">
                    <a href=\"Home/Day\" class=\"btn custom-btn\" role=\"button\">Jour</a>
                    <a href=\"Home/Week\" class=\"btn custom-btn\" role=\"button\">Semaine</a>
                    <a href=\"Home/Month\" class=\"btn custom-btn\" role=\"button\">Mois</a>
                    <a href=\"Home/Year\" class=\"btn custom-btn\" role=\"button\">Année</a>
                </div>
            </div>
            <div class=\"mb-3\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"circle {$circleClass} mr-3\">{$percentage}%</div>
                    <div class=\"mr-3\">Objectif percentage</div>
                </div>
            </div>
            <div class=\"mb-3\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"circle green-circle mr-3\">{$numberOfMeals}</div>
                    <div class=\"mr-3\">Répas pris</div>
                </div>
            </div>
            <div class=\"custom-btn-group\">
                <a href=\"Home/setobjective\" class=\"btn custom-btn\">Définir l'objectif</a>
                <a href=\"Meal/choose\" class=\"btn custom-btn\">Ajouter un repas</a>
            </div>
        </div>
    </div>
</div>";
?>
