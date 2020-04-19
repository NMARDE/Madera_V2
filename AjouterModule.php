<?php
session_start();
include('DAO.php');
if(!isset($_POST['Module'])){

?>


<html>
<head>
    <title>MaderaApp - Selection de la gamme</title>
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
  require("navbar.php");
  ?>

<div class="hero-wrap js-fullheight" style="background-image: url('image/bois_accueil.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <h1 class="mb-4-selection">Ajoutez des modules comme bon vous semble...</h1>
        </div>
      </div>
	</div>


<div class="container">
    <div class="card card-container">
	<form method="post" class="form-signin" action="AjouterModule.php">
<?php
echo' <select id="Module" class="form-control" name="Module" id="Module">';
$arrayModule=listeModule();
if(!empty($arrayModule)){
	foreach($arrayModule as $unModule){
		echo '<option value="'.$unModule.'">'.$unModule.'</option>';
	}
}
echo'</select></br>';
?>
<input type="submit" class="btn btn-primary" value="Selectionner"/>
<?php
}else{
	if(!isset($_POST['CaracCount'])){
	echo'<html>
	<head>
		<title>MaderaApp - Selection de la gamme</title>
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
	

	  require("navbar.php");

echo'	<div class="hero-wrap js-fullheight" style="background-image: url(\'image/bois_accueil.jpg\');" data-stellar-background-ratio="0.5">
		  <div class="overlay"></div>
		  <div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
			</div>
		  </div>
		</div>
	
	
	<div class="container">
		<div class="card card-container">
	<form method="post" class="form-signin" action="AjouterModule.php"></br>';
	if(isset($_POST['NomModule'])){
		echo' <h3>Module : '.$_POST['NomModule'].'</h3></br>';
	}else{
		echo' <h3>Module : '.$_POST['Module'].'</h3></br>';
	}
	echo'<input type="text" class="form-control" name="tailleModule" id="tailleModule" placeholder="Taille du module en m²"/><br>';
	$listeCarac=array();
	$listeCarac=listeCarac($_POST['Module']);
	$listeValCarac=array();
	for($i=0;$i<count($listeCarac);$i++){
		if($i%2 != 1){
		$listeValCarac=listeValCarac($listeCarac[$i]);
		echo $listeCarac[$i+1];
		echo "<select class='form-control' id='Carac".$i."' name='Carac".$i."'>";
		foreach($listeValCarac as $oneValCarac){
			echo "<option value=".$oneValCarac.">".$oneValCarac."</option>";
		}
		echo "</select></br>";
		echo "<input type='hidden' name='IdCarac".$i."' value='".$listeCarac[$i]."'/>";
		}
	}
	echo'<input type="hidden" name="NomModule" id="NomModule" value="'.$_POST['Module'].'">
	<input type="hidden" name="Module" id="Module" value="'.$_POST['Module'].'"/></br>
	<input type="hidden" name="CaracCount" id="CaracCount" value='.count($listeCarac).'/><input type="submit" class="btn btn-primary btn-block" value="Valider"';
	echo'</html>';
	}else{
		$listeCarac=array();
		$currentCarac="";
		for($i=0;$i<$_POST['CaracCount'];$i++){
			if($i%2 != 1){
			$currentIdCarac="IdCarac".$i;
			$currentCarac="Carac".$i;
			if(isset($_POST[$currentCarac])){
				array_push($listeCarac,$_POST[$currentIdCarac]);
				array_push($listeCarac,getValCaracByLib($_POST[$currentCarac],$_POST[$currentIdCarac]));
			}
			}
		}
		creerModule($listeCarac,$_POST['Module'],$_POST['tailleModule']);
		
		
	}

}
?>