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

  <?php 
  include('DAO.php');
  require("navbar.php");
  ?>

<div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>-

<section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <?php
         
		  $arrayModele;
          $arrayModele=listeModele(getGammeByName($_GET['Gamme']));
          if(!empty($arrayModele)){
            foreach($arrayModele as $unModele){
              $arrayPrixModele;
              $arrayPrixModele=getPrixModeleByName($unModele);
              if(!empty($arrayPrixModele)){
              foreach($arrayPrixModele as $unPrixModele){
              $arrayImageModele;
              $arrayImageModele=getImageModeleByName($unModele);
              if(!empty($arrayImageModele)){
                foreach($arrayImageModele as $uneImageModele){
              echo '<div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
              <div class="d-block services-wrap text-center">
                <div class="img" style="background-image: url(\''.$uneImageModele.'.jpg\');"></div>
                <div class="media-body py-4 px-3">
                  <h3 class="heading">'.$unModele.'</h3>
                  <p>A partir de '.$unPrixModele.' euros TTC</p>
                  <p><a href="DetailsMaison.php?Gamme='.$_GET['Gamme'].'&ModeleGamme='.$unModele.'&NomProjet='.$_GET['NomProjet'].'&NomClient='.$_GET['NomClient'].'" class="btn btn-primary">Choisir</a></p>
                </div>
              </div>      
            </div>';
            }
          }
        }
      }
    }
  }
          ?>
        </div>
    	</div>
    </section>

<?php
require("./footer.php")
?>