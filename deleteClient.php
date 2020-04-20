<?php
session_start();
include("DAO.php");
if(isset($_POST['nomClient'])){

    DeleteClientById($_POST['idClient']); ?>
    <script>
    document.location.href="Clients.php";
    alert('Le client a été supprimé');
    </script>
<?php
}

?>
<html>
<head>
    <title>MaderaApp - Suppression d'un client</title>
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
	<h3>Supprimer un client </h3>
	</br>
<?php 
if(isset($_GET['idClient']))
{
$arrayEdit=array();
$arrayEdit=getClientById($_GET['idClient']);
}

?>
			<form method="post" class="form-signin" action="deleteClient.php">
                    <input type="hidden" class="form-control" placeholder="id" id="idClient" name="idClient" value="<?php echo $_GET['idClient']?>"/>
                    <input type="hidden" class="form-control" placeholder="id" id="nomClient" name="nomClient" value="<?php echo $arrayEdit[0]?>"/>
                    <h3> Voulez-vous vraiment supprimer le client <?php echo $arrayEdit[0].' '.$arrayEdit[1]?> ?
					</br>
                    </br>
                    <div class="container">
                    <div class="row">
		                <div class="col-md-12">
			                <div class="row">
				                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">
					                Confirmer
				                    </button>
				                </div>
				                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">
					                Annuler
				                    </button>
				                </div>
			                </div>
		                </div>
	                </div>
                    </div>


			</form>
			</div>					 
				</div> 