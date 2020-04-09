<?php include('DAO.php') ?>
<html>
<img src="./image/NommerProjet.png" usemap=#NommerProjet>
<map name="NommerProjet">
	<area href="SimulationMaison.html" shape="rect" coords="10,15,65,60"/>
	<area href="SelectionCoupe.html" shape="rect" coords="173,535,360,570"/>
</map>
<?php $plan=$_GET['plan'] ?>
<form method="POST" action="SelectionCoupe.php?plan=<?php echo $plan?>">
	<input type="text" id="NomProjet" name="NomProjet" placeholder="Nom du Projet"/></br>
	<input type="submit" value="ok"/>
</form>
</html>