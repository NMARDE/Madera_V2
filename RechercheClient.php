<html>
<img src="./image/RechercheClient.png" usemap=#RechercheClient>
<map name="RechercheClient">
	<area href="accueil.html" shape="rect" coords="10,15,65,60"/>
</map>
<form action="RechercheClient.html">
<select id="RechercherClient">
</select>
<input type="submit" value="ok" id="RechercheClientOk"/>
</form>
<!--A INJECTER VIA PHP il va falloir faire une string contenant le script genre "<a href='Recapitulatif?=monprojet'>NOM DU PROJET</a>"-->
information personnelles</br>
Nom : <?php echo "mettre la variable stockant le nom"?></br>
Prenom : <?php echo "mettre la variable stockant le prenom"?></br>
Mail : <?php echo "mettre la variable stockant le mail"?></br>
Telephone : <?php echo "mettre la variable stockant le mail"?></br>
Ses projets</br></br>
<?php echo "mettre les projets ici"?></br>
<a href="CreationClient.html">CreationClient</a>
</html>