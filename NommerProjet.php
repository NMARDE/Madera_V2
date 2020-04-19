<?php session_start();
include('DAO.php');
echo '<html>
<head>
    <title>MaderaApp - Nommer votre projet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="./css/animate.css">
    
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/magnific-popup.css">

    <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./css/jquery.timepicker.css">

    <link rel="stylesheet" href="./css/flaticon.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>';

require('navbar.php');

echo'
<div class="hero-wrap js-fullheight" style="background-image: url(\'image/bois_accueil.jpg\');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>
<div class="container">
    <div class="card card-container">
        <form method="POST" class="form-signin" action="SelectionGamme.php">
        <input type="text" id="NomProjet" name="NomProjet" class="form-control" placeholder="Entrez le nom du projet" required autofocus>';
$arrayClient=listeClient();
if(!empty($arrayClient)){
	echo '<select class="form-control" name="NomClient">';
	foreach($arrayClient as $unClient){
		echo '<option value="'.$unClient.'">'.$unClient.'</option>';
	}
	echo '</select><br><a href="CreationClient.php" class="forgot-password">Créer un autre client</a>';
}else{
	echo "il n'y a pas de client actuellement, il vous faudra en ajouter un<br><a href='CreationClient.php' class=\"forgot-password\">Créer un autre client</a>";
}
echo'	<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Détails de la maison</button>
</form>
</html>
';
?>