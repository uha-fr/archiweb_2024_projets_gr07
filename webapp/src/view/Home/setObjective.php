<?php 
echo"
<h1>Entrez votre objectif de calories</h1>
    <form action=\"Home/setobjectivesubmit\" method=\"post\">
        <label for=\"caloriesGoal\">Objectif de Calories:</label><br>
        <input type=\"text\" id=\"objective\" name=\"objective\"><br><br>
        <input type=\"submit\" value=\"Soumettre\">
    </form>
";
?>