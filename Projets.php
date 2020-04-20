
<?php 
session_start();

require_once('DAO.php')
?>

<html>
<head>
    <title>Details Maison</title>
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
  <?php  require('navbar.php'); ?>

  <div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>


<br><br><br><br>
<div class="container">
<div class="projets card card-container">
<h3>Projets</h3>
<a class="btn btn-primary btn-block" href="NommerProjet.php">Créer un nouveau projet</a><br>
<table class="table clients table-striped">
<thead>
<th>Nom</th>
<th>Date de création</th>
<th>Client</th>
<th>Commercial</th>
<th>Edition</th>
<th></th>
</thead>
<tbody>

<?php 
$i = 0;
$arrayProjet = getProjet();

while(isset($arrayProjet[$i]['nomProjet'])){


  echo'<tr><td>'.$arrayProjet[$i]['nomProjet'].'</td>
  <td>'.$arrayProjet[$i]['dateProjet'].'</td>
  <td>'.$arrayProjet[$i]['nomClient'].'</td>
  <td>'.$arrayProjet[$i]['nomCommercial'].'</td>
  <td><a class="btn btn-primary btn-block" href="editClient.php?idClient='.$arrayProjet[$i]['idProjet'].'">Modifier</td>
  <td><a class="btn btn-primary btn-block" href="deleteClient.php?idClient='.$arrayProjet[$i]['idProjet'].'">Supprimer</td></tr>';
  $i++;
  }

?>
<?php require('footer.php');?>