<?php 
echo'<html>
<form method="post" action="Recapitulatif.php">
<input type="text" placeholder="Nom du plan" name="NomPlan"/>
<input type="radio" name="Gamme" value="Orientale"/>
<input type="radio" name="Gamme" value="Vacances"/>
<input type="radio" name="Gamme" value="Design Luxe"/>';

echo' <select id="ModeleGamme" name="ModeleGamme" id="ModeleGamme">'
$arrayGamme=listeGamme();
if(!empty($arrayGamme)){
	foreach($arrayGamme as $unGamme){
		echo '<option value="'.$unGamme.'">'.$unGamme.'</option>';
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
	foreach($arrayIsolant as $unFinition){
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
