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



<div class="container">
<div class="search card card-container">
<h3>Clients</h3>
<a class="btn btn-primary btn-block" href="addClient.php">Ajouter un client</a><br>
<table class="table clients table-striped">
<thead>
<th>Nom</th>
<th>Prénom</th>
<th>Adresse</th>
<th>Téléphone</th>
<th>Edition</th>
<th></th>
</thead>
<tbody>
<?php 
$i = 0;
$arrayClient = ListeClientDetaille();

while(isset($arrayClient[$i]['nomClient'])){
  
  echo'<tr><td>'.$arrayClient[$i]['nomClient'].'</td>
  <td>'.$arrayClient[$i]['prenomClient'].'</td>
  <td>'.$arrayClient[$i]['mailClient'].'</td>
  <td>'.$arrayClient[$i]['telephoneClient'].'</td>
  <td><a class="btn btn-primary btn-block" href="editClient.php?id='.$arrayClient[$i]['idClient'].'">Modifier</td>
  <td><a class="btn btn-primary btn-block" href="deleteClient.php?id='.$arrayClient[$i]['idClient'].'">Supprimer</td></tr>';
  $i++;
  }

?>
<?php require('footer.php');?>
