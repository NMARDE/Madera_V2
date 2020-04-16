<?php
session_start();
include('DAO.php');
if(isset($_POST['Projet'])){
	creerProjet($_POST['NomProjet'],$_POST['NomClient'],$_POST['Gamme'],$_POST['ModeleGamme'],$_POST['Isolant'],$_POST['Finition']);
}
?>
<html>
Nom du Projet<br>
<?php echo $_POST['NomProjet'] ?><br>
Gamme<br>
<?php echo $_POST['Gamme'] ?><br>
Modele de Gamme<br>
<?php echo $_POST['ModeleGamme'] ?><br>
<input type="hidden" name="plan" value="<?php echo $_POST['plan']?>">
<input type="hidden" name="NomProjet" value="<?php echo $_POST['NomProjet']?>">
<input type="hidden" name="Coupe" value="<?php echo $_POST['Coupe']?>"><br>
<a href="AjouterModule.php?=<?php echo $_POST['NomProjet']?>">Ajouter un module</a>
<a href="accueil.html">Créer le devis</a>
</html>