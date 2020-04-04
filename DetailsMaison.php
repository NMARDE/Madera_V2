<html>
<img src="./image/DetailsMaison.png" usemap=#DetailsMaison>
<map name="DetailsMaison">
	<area href="SelectionCoupe.html" shape="rect" coords="10,15,65,60"/>
	<area href="Recapitulatif.html" shape="rect" coords="155,655,340,695"/>
</map>
<form method="post" action="Recapitulatif.php">
<input type="text" placeholder="Nom du plan" name="NomPlan"/>
<input type="radio" name="Gamme" value="Orientale"/>
<input type="radio" name="Gamme" value="Vacances"/>
<input type="radio" name="Gamme" value="Design Luxe"/>
<!-- liste à remplir via PHP-->
 <select id="ModeleGamme" name="ModeleGamme" id="ModeleGamme">
</select>
 <select id="Remplissage" name="Remplissage" id="Remplissage">
</select>
 <select id="Finition" name="Finition" id="Finition">
</select>
<input type="submit" value="ok" />
<!-- et c'est après le click qu'on met tout ce qu'on a sauvegarder dans la base de données dans le back-->
<input type="hidden" name="plan" value="<?php echo $_POST['plan']?>">
<input type="hidden" name="NomProjet" value="<?php echo $_POST['NomProjet']?>">
<input type="hidden" name="Coupe" value="<?php echo $_POST['Coupe']?>">
</form>
</html>