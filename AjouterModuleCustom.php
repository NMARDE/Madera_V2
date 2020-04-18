<?php
session_start();
include('DAO.php');
if(!isset($_POST['Module'])){

?>

<html>
<form method="post" action="AjouterModule.php">
<input type="text" placeholder="Nommer le Module" id="NomModule" name="NomModule"/><br>
<?php
echo' <select id="Module" name="Module" id="Module">';
$arrayModule=listeModule();
if(!empty($arrayModule)){
	foreach($arrayModule as $unModule){
		echo '<option value="'.$unModule.'">'.$unModule.'</option>';
	}
}
echo'</select>';
?>
<input type="submit" value="ok"/>
</form>
</html>
<?php
}else{
	if(!isset($_POST['CaracCount'])){
	echo'<html>
	<form method="post" action="AjouterModule.php"><br>';
	if(isset($_POST['NomModule'])){
		echo "Nom du module: ".$_POST['NomModule'];
	}else{
		echo "Nom du module: ".$_POST['Module'];
	}
	echo "Source d'inspiration du module: ".$_POST['Module']."</br>";
	echo'<input type="text" name="tailleModule" id="tailleModule" placeholder="Taille du module"/><br>';
	$listeCarac=caracModule($_POST['Module']);
	for($i=0;$i<$listeCarac.count();$i+3){
		echo $listeCarac[$i]."</br>";
		echo '<input type="hidden" name="Carac'.$i.'" id="Carac'.$i.'" value="'.$listeCarac[$i].'"/>';
		echo '<input type="text" name="Carac'.($i+1).'" id="Carac'.($i+1).'" placeholder="'.$listeCarac[$i+1].'"/><br>';
		echo '<input type="hidden" name="Carac'.($i+2).'" id="Carac'.($i+2).'" value="'.$listeCarac[$i+2].'"/><br>';
	}
	echo'<input type="hidden" name="NomModule" id="NomModule" value="'.$_POST['NomModule'].'">
	<input type="hidden" name="Module" id="Module" value="'.$_POST['Module'].'"/>
	<input type="hidden" name="CaracCount" id="CaracCount" value='.$listeCarac.count().'/>';
	
	echo'</html>';
	}else{
		$listeCarac=array();
		$currentCarac="";
		for($i=0;$i<$_POST['CaracCount'];$i++){
			$currentCarac="Carac".$i;
			array_push($listeCarac,$_POST[$currentCarac]);
		}
		creerModule($listeCarac,$_POST['Module']);
		
		
	}

}
?>