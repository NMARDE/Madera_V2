<?php
session_start();
include('DAO.php');
$FromModule=false;
if(isset($_POST['Projet'])){
	$_SESSION['NomProjet']=$_POST['NomProjet'];
	creerProjet($_POST['NomProjet'],$_POST['NomClient'],$_POST['Gamme'],$_POST['ModeleGamme'],$_POST['Isolant'],$_POST['Finition']);
}else{
if(isset($_POST['RechercheProjet'])){
	$_SESSION['NomProjet']=$_POST['NomProjet'];
	$Projet=getProjetFromName($_SESSION['NomProjet']);
	$Modele=getModeleById($Projet[5]);
	$_POST['Gamme']=$Modele[1];
	$_POST['ModeleGamme']=$Modele[0];
	$_POST['Isolant']=getLibelleIsolantById($Projet[7]);
	$_POST['Finition']=getLibelleFinitionById($Projet[8]);
}else{
	$Projet=getProjetFromName($_SESSION['NomProjet']);
	$Modele=getModeleById($Projet[5]);
	$_POST['Gamme']=$Modele[1];
	$_POST['ModeleGamme']=$Modele[0];
	$_POST['Isolant']=getLibelleIsolantById($Projet[7]);
	$_POST['Finition']=getLibelleFinitionById($Projet[8]);
	$FromModule=true;
	
}
}
?>

<html>
<head>
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
<?php $arrayModule=listeModuleProjet();
require('navbar.php');
?>
      <div class="overlay"></div>
<input type="hidden" name="NomProjet" value="<?php if(isset($_POST['NomProjet'])){echo $_POST['NomProjet'];}else{echo $_SESSION['NomProjet'];}?>">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        </div>
      </div>
    </div>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
				<div class="card card-container">
<h3>Récapitulatif</h3><br>
<table class="table table-striped">
<tbody>
<tr>
<td>Nom du projet</td> 
<td><?php echo $_SESSION['NomProjet'] ?></td>
</tr>
<tr>
<td>Gamme</td> 
<td><?php echo $_POST['Gamme'] ?></td>
</tr>
<tr>
<td>Modèle</td> 
<td><?php echo $_POST['ModeleGamme'] ?></td>
</tr>
<tr>
<td>Isolant</td> 
<td><?php echo $_POST['Isolant'] ?></td>
</tr>
<tr>
<td>Finition extérieure</td> 
<td><?php echo $_POST['Finition'] ?></td>
</tr>
<tr>
<td>Prix TTC</td> 
<?php 
$unModele = $_POST['ModeleGamme'];
$arrayPrixModele;
              $arrayPrixModele=getPrixModeleByName($unModele);
              if(!empty($arrayPrixModele)){
              foreach($arrayPrixModele as $unPrixModele){
				  echo'<td>'.$unPrixModele.'</td></tr>';
			  }
			}

?>
</tbody>
		</table>

<a class="btn btn-primary btn-block" href="Devis.php">Créer le devis prévisionnel</a>
				</div>
		</div>
		
<div class="col-md-6">
				<div class="card card-container">
				<?php $arrayModule=listeModuleProjet();

if(!empty($arrayModule)){
    $arrayCarac=array();
    $libelleCarac=array();
	echo ' <h3>Modules intégrés </h3></br>
	<table class="table table-striped">
	<thead>';
	$i= 1;
    foreach($arrayModule as $unModule){
		
		
		echo 
		'<th>Module n°'.$i.'</th>
		<th>'.$unModule.'</th></thead>
		<tbody>';
		$i++;
		$arrayCarac=getProjetCarac($unModule);
        if(!empty($arrayCarac)){
            foreach($arrayCarac as $oneCarac){
                $libelleCarac=getLibelleCaracById($oneCarac,$unModule);
                echo '<tr><td>'.$libelleCarac[0].'</td>';
                echo '<td>'.$libelleCarac[1].'</td></tr>';
				
            }
		} 
		}
    }

?>
</tbody>
</table>
<a class="btn btn-primary btn-block" href="AjouterModule.php?=<?php if(isset($_POST['NomProjet'])){echo $_POST['NomProjet'];}?>">Ajouter un module</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php require('footer.php'); ?>