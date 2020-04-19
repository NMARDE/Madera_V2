<?php 
session_start();
include('DAO.php');
echo'
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
  <body>';

  require('navbar.php');
  echo' <br><br><br><br>
<div class="container">
<form method="post" action="Recapitulatif.php">
<input type="text" placeholder="Nom du plan" name="NomPlan"/>';

echo'<select id="Isolant" name="Isolant" id="Remplissage">';
 $arrayIsolant=listeIsolant();
if(!empty($arrayIsolant)){
	foreach($arrayIsolant as $unIsolant){
		echo '<option value="'.$unIsolant.'">'.$unIsolant.'</option>';
	}
}
echo'</select>';

echo' <select id="Finition" name="Finition" id="Finition">';
 $arrayFinition=listeFinition();
if(!empty($arrayFinition)){
	foreach($arrayFinition as $unFinition){
		echo '<option value="'.$unFinition.'">'.$unFinition.'</option>';
	}
}
echo'</select>';
echo'<input type="submit" value="ok" />
<input type="hidden" name="ModeleGamme" value="'.$_GET['ModeleGamme'].'">
<input type="hidden" name="Gamme" value="'.$_GET['Gamme'].'">
<input type="hidden" name="NomProjet" value="'.$_GET['NomProjet'].'">
<input type="hidden" name="NomClient" value="'.$_GET['NomClient'].'">
<input type="hidden" name="Projet" value="a crée">
</form>
</html>';
?>
