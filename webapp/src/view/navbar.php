


   <div class="container-fluid">
   <base  href="/archiweb_2024_projets_gr07/webapp/">

   <a class="navbar-brand" href="Home">Manger</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Recipe/listall">Les recettes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Account/account">Mon compte</a>
        </li>
      </ul>
      
      <?php
     if($userType == 'guest'){
     echo "<ul class=\"navbar-nav me-auto mb-2 mb-md-0\">
     <li class=\"nav-item\">
       <a class=\"nav-link active\" aria-current=\"page\" href=\"Account/signup\">S'inscrire</a>
     </li>
     <li class=\"nav-item\">
       <a class=\"nav-link active\" href=\"Account/login\">Se connecter</a>
     </li>
   </ul>";
     }
     else{
      echo "<ul class=\"navbar-nav me-auto mb-2 mb-md-0\">
      <li class=\"nav-item\">
        <a class=\"nav-link active\" aria-current=\"page\" href=\"Account/logout\">Se déconnecter</a>
      </li>
      </ul>";
     }

?>
 
  

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Recherche</button>
      </form>
    </div>
  </div>
  