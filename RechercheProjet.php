<?php
include('DAO.php');
echo '<html><form method="post" action="Recapitulatif.php">';
$arrayProjet=listeProjet();
if(!empty($arrayProjet)){
	echo '<select name="NomProjet">';
	foreach($arrayProjet as $unProjet){
		echo '<option value="'.$unProjet.'">'.$unProjet.'</option>';
	}
	echo '</select><br><a href="SimulationMaison.php">crée un autre projet</a>';
}else{
	echo "il n'y a pas de projet actuellement, il vous faudra en ajouter un<br><a href='SimulationMaison.php'>crée un autre projet</a>";
}
echo '<input type="hidden" name="RechercheProjet" value="comingfromthere"/><input type="submit" value="ok"/></form></html>';
?>