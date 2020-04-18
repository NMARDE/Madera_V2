<?php
session_start();
include('DAO.php');
if(!isset($_POST['Module'])){

?>

<html>
<form method="post" action="AjouterModule.php">
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
	echo'<input type="text" name="tailleModule" id="tailleModule" placeholder="Taille du module"/><br>';
	$listeCarac=array();
	$listeCarac=listeCarac($_POST['Module']);
	$listeValCarac=array();
	for($i=0;$i<count($listeCarac);$i++){
		if($i%2 != 1){
		$listeValCarac=listeValCarac($listeCarac[$i]);
		echo $listeCarac[$i+1];
		echo "<select id='Carac".$i."' name='Carac".$i."'>";
		foreach($listeValCarac as $oneValCarac){
			echo "<option value=".$oneValCarac.">".$oneValCarac."</option>";
		}
		echo "</select>";
		echo "<input type='hidden' name='IdCarac".$i."' value='".$listeCarac[$i]."'/>";
		}
	}
	echo'<input type="hidden" name="NomModule" id="NomModule" value="'.$_POST['Module'].'">
	<input type="hidden" name="Module" id="Module" value="'.$_POST['Module'].'"/>
	<input type="hidden" name="CaracCount" id="CaracCount" value='.count($listeCarac).'/><input type="submit" value="ok"';
	echo'</html>';
	}else{
		$listeCarac=array();
		$currentCarac="";
		for($i=0;$i<$_POST['CaracCount'];$i++){
			if($i%2 != 1){
			$currentIdCarac="IdCarac".$i;
			$currentCarac="Carac".$i;
			if(isset($_POST[$currentCarac])){
				array_push($listeCarac,$_POST[$currentIdCarac]);
				array_push($listeCarac,getValCaracByLib($_POST[$currentCarac],$_POST[$currentIdCarac]));
			}
			}
		}
		creerModule($listeCarac,$_POST['Module'],$_POST['tailleModule']);
		
		
	}

}
?>