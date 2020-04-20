<?php
include("DAO.php");
if(isset($_POST['nomClient'])){
	echo "coucou";
	nouveauClient($_POST['nomClient'],$_POST['prenomClient'],$_POST['emailClient'],$_POST['telephoneClient'], $_POST['RIBClient']);
}
?>
<html>
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
  <body>

<?php require('navbar.php');?>

<div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>
<div class="container">
    <div class="card card-container">
	<h3>Ajouter un nouveau client</h3>
	</br>
			<form method="post" class="form-signin" action="CreationClient.php">
					<input type="text" class="form-control" placeholder="Nom" id="nomClient" name="nomClient"/>
					<input type="text" class="form-control" placeholder="Prénom" id="prenomClient" name="prenomClient"/>
					<input type="text" class="form-control" placeholder="Adresse mail" id="emailClient" name="emailClient"/>
					<input type="text" class="form-control" placeholder="Téléphone (fixe ou portable)" id="telephoneClient" name="telephoneClient" />
					<input type="text" class="form-control" placeholder="RIB" id="RIBClient" name="RIBClient" />
					</br>
				<button type="submit" class="btn btn-primary btn-block">
					Créer
				</button>
			</form>
			</div>					 
				</div> 