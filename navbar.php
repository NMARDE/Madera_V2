<?php 
 $page = $_SERVER['REQUEST_URI'];
 $page = str_replace("/Madera_V2/", "",$page);

 ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
    <a class="navbar-brand" href="index.html"><span>Madera</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span> Menu
  </button>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <li <?php if($page == "accueil.php"){echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>><a href="accueil.php" class="nav-link">Accueil</a></li>
        <li <?php if($page != "accueil.php" && $page != "Clients.php" && $page!="Projets.php" && preg_match("/editClient/i","$page") && preg_match("/deleteClient/i", "$page")){echo 'class="nav-item active"';}  else{echo 'class="nav-item"';} ?>><a href="NommerProjet.php" class="nav-link">Simuler une maison</a></li>
        <li <?php if($page == "Clients.php" || preg_match("/editClient/i","editClient.php") || preg_match("/deleteClient/i", "deleteClient.php")){echo 'class="nav-item active"';}  else{echo 'class="nav-item"';} ?>><a href="Clients.php" class="nav-link">Clients</a></li>
        <li <?php if($page == "Projets.php"){echo 'class="nav-item active"';}  else{echo 'class="nav-item"';} ?>><a href="Projets.php" class="nav-link">Projets</a></li>
    </ul>
  </div>
</div>
</nav>