<html>
<img src="./image/Recapitulatif.png" usemap=#Recapitulatif>
<map name="Recapitulatif">
	<area href="DetailsMaison.html" shape="rect" coords="10,15,65,60"/>
	<area href="AjouterModule.html" shape="rect" coords="15,665,225,705"/>
	<area href="accueil.html" shape="rect" coords="300,665,505,705"/>
</map>
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