<?php
session_start();
include('DAO.php');?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>MaderaApp</title>
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


<div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>

   <div class="container">
        <div class="card card-container">
            <form class="form-signin" action="connexion.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="login" name="login" class="form-control" placeholder="Entrez votre identifiant" required autofocus>
                <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Mot de passe oublié?
            </a>
        </div><!-- /card-container -->
    </div>


<?php 
require("footer.php");
?>

<?php
function connexion() {
	if(isset($_POST['login']) && isset($_POST['mdp'])){
	if(connexionSite($_POST['login'],$_POST['mdp'])!=false){
		$_SESSION['login']=$_POST['login'];
        
        header("Location: accueil.php");
        exit;
	}else{
		echo "connexion échoué";
	}
}
} 
?>