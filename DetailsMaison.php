<?php 
session_start();
include('DAO.php');
echo'<html>
<form method="post" action="Recapitulatif.php">
<input type="text" placeholder="Nom du plan" name="NomPlan"/>
<input type="radio" name="Gamme" value="Standard">Standard</input>
<input type="radio" name="Gamme" value="Ecologique">Ecologique</input>
<input type="radio" name="Gamme" value="Prestige">Prestige</input>';

echo' <select id="ModeleGamme" name="ModeleGamme" id="ModeleGamme">';
$arrayModele=listeModele();
if(!empty($arrayModele)){
	foreach($arrayModele as $unModele){
		echo '<option value="'.$unModele.'">'.$unModele.'</option>';
	}
}
echo'</select>';

echo'<select id="Isolant" name="Isolant" id="Remplissage">';
 $arrayIsolant=listeIsolant();
if(!empty($arrayIsolant)){
	foreach($arrayIsolant as $unIsolant){
		echo '<option value="'.$unIsolant.'">'.$unIsolant.'</option>';
	}
}
echo'</select>';

echo' <select id="Finition" name="Finition" id="Finition">';
 $arrayFinition=listeFinition();
if(!empty($arrayFinition)){
	foreach($arrayFinition as $unFinition){
		echo '<option value="'.$unFinition.'">'.$unFinition.'</option>';
	}
}
echo'</select>';
echo'<input type="submit" value="ok" />
<input type="hidden" name="plan" value='.$_POST['plan'].'>
<input type="hidden" name="NomProjet" value='.$_POST['NomProjet'].'>
<input type="hidden" name="NomClient" value='.$_POST['NomClient'].'>
<input type="hidden" name="Coupe" value='.$_POST['Coupe'].'>
<input type="hidden" name="Projet" value="a crée">
</form>
</html>';
?>
