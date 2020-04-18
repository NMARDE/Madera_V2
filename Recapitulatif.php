<?php
session_start();
include('DAO.php');
if(isset($_POST['Projet'])){
	$_SESSION['NomProjet']=$_POST['NomProjet'];
	creerProjet($_POST['NomProjet'],$_POST['NomClient'],$_POST['Gamme'],$_POST['ModeleGamme'],$_POST['Isolant'],$_POST['Finition']);
}
if(isset($_POST['RechercheProjet'])){
	$_SESSION['NomProjet']=$_POST['NomProjet'];
	$Projet=getProjetFromName($_POST['NomProjet']);
	$Modele=getModeleById($Projet[5]);
	$_POST['Gamme']=$Modele[1];
	$_POST['ModeleGamme']=$Modele[0];
}
?>
<html>
Nom du Projet<br>
<?php echo $_POST['NomProjet'] ?><br>
Gamme<br>
<?php echo $_POST['Gamme'] ?><br>
Modele de Gamme<br>
<?php echo $_POST['ModeleGamme'] ?><br>
<input type="hidden" name="plan" value="<?php if(isset($_POST['plan'])){echo $_POST['plan'];}?>">
<input type="hidden" name="NomProjet" value="<?php if(isset($_POST['NomProjet'])){echo $_POST['NomProjet'];}?>">
<input type="hidden" name="Coupe" value="<?php if(isset($_POST['Coupe'])){echo $_POST['Coupe'];}?>"><br>
<a href="AjouterModule.php?=<?php if(isset($_POST['NomProjet'])){echo $_POST['NomProjet'];}?>">Ajouter un module</a>
<a href="accueil.html">Créer le devis</a>
</html>