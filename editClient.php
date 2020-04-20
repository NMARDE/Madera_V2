<?php
session_start();
include("DAO.php");
if(isset($_POST['nomClient'])){

    UpdateClientById($_POST['idClient'], $_POST['nomClient'],$_POST['prenomClient'],$_POST['mailClient'],$_POST['telephoneClient'], $_POST['RIBClient']); ?>
    <script>
    document.location.href="Clients.php";
    alert('Le client a été modifié');
    </script>
<?php
}
?>
<html>
<head>
    <title>MaderaApp - Modification d'un client</title>
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

<?php require('navbar.php') ?>

<div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>


<div class="container">
    <div class="card card-container">
	<h3>Modifier un client </h3>
	</br>
<?php 
if(isset($_GET['idClient']))
{
$arrayEdit=array();
$arrayEdit=getClientById($_GET['idClient']);
}

?>
			<form method="post" class="form-signin" action="editClient.php">
                    <input type="hidden" class="form-control" placeholder="id" id="idClient" name="idClient" value="<?php echo $_GET['idClient']?>"/>
					<input type="text" class="form-control" placeholder="Nom" id="nomClient" name="nomClient" value="<?php echo $arrayEdit[0]?>"/>
					<input type="text" class="form-control" placeholder="Prénom" id="prenomClient" name="prenomClient" value="<?php echo $arrayEdit[1]?>"/>
					<input type="text" class="form-control" placeholder="Adresse mail" id="mailClient" name="mailClient" value="<?php echo $arrayEdit[2]?>"/>
					<input type="text" class="form-control" placeholder="Téléphone (fixe ou portable)" id="telephoneClient" name="telephoneClient" value="<?php echo $arrayEdit[3]?>"/>
					<input type="text" class="form-control" placeholder="RIB" id="RIBClient" name="RIBClient" value="<?php echo $arrayEdit[4]?>" />
					</br>
				<button type="submit" class="btn btn-primary btn-block">
					Modifier
				</button>
			</form>
			</div>					 
				</div> 