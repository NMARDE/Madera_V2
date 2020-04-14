<?php include('DAO.php');
 $plan=$_GET['plan'];
echo '<html><form method="POST" action="SelectionCoupe.php?plan='.$plan.'">
	<input type="text" id="NomProjet" name="NomProjet" placeholder="Nom du Projet"/></br>';
$arrayClient=listeClient();
if(!empty($arrayClient)){
	echo '<select name="NomClient">';
	foreach($arrayClient as $unClient){
		echo '<option value="'.$unClient.'">'.$unClient.'</option>';
	}
	echo '</select><br><a href="CreationClient.php">crée un autre client</a>';
}else{
	echo "il n'y a pas de client actuellement, il vous faudra en ajouter un<br><a href='CreationClient.php'>crée un autre client</a>";
}
echo'	<input type="submit" value="ok"/>
</form>
</html>';
?>