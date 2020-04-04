<html>
<img src="./image/AjoutModule.png" usemap=#AjouterModule>
<map name="AjouterModule">
	<area href="Recapitulatif.html" shape="rect" coords="10,15,65,60"/>
	<area href="Recapitulatif.html" shape="rect" coords="175,665,360,705"/>
</map>
<form method="post" action="Recapitulatif.php">
<input type="text" placeholder="Nommer le Module" id="NomModule" name="NomModule"/><br>
<select id="ListeModule" name="ListeModule" placeholder="Rechercher un module">
</select><br>
Mur avec angle<br>
Longueur
<input type="text" id="LongueurAngle" name="LongueurAngle"/><br>
Largeur
<input type="text" id="LargeurAngle" name="LargeurAngle"/><br>
Mur entrant<br>
Longueur
<input type="text" id="LongueurEntrant" name="LongueurEntrant"/><br>
Largeur
<input type="text" id="LargeurEntrant" name="LargeurEntrant"/><br>
Mur sortant<br>
Longueur
<input type="text" id="LongueurSortant" name="LongueurSortant"/><br>
Largeur
<input type="text" id="LargeurSortant" name="LargeurSortant"/><br>
<input type="submit" value="ok"/>
<!--Avec le nom du projet on peut récupérer l'identifiant du projet, comme ça on pourra l'associer un module-->
</form>
</html>