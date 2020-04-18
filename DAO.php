<?php
function connexionDB(){
$link = new PDO("mysql:host=mysql-madera-ril.alwaysdata.net;dbname=madera-ril_bdd", "200574_henri", "Henri44**");
if (!$link) {
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . PHP_EOL;
    echo "Erreur de débogage : ". PHP_EOL;
    exit;
}else{
}
return $link;
}
function connexionSite($login, $mdp){
	$link=connexionDB();
	$result=$link->query('select * from Commercial');
	 while ($row = $result->fetch()) {
        if($row[4]==$login && $row[5]){
			return true;
		}
    }
	return false;
}
function listeClient(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Client');
	if($result){
	while($row=$result->fetch()){
		array_push($array,$row[1]." ".$row[2]);
	}
	}else{
		print_r($link->errorInfo());
		echo"pas de client";
	}
	return $array;
}
function nouveauClient($nomClient,$prenomClient,$emailClient,$telephoneClient){
	$link=connexionDB();
	$lastId=0;
	$result1=$link->query('select * from client');
	if($result1){
		while($row=$result1->fetch()){
			$lastId=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	$lastId++;
	$requete='insert into Client values('.$lastId.',"'.$nomClient.'","'.$prenomClient.'","'.$emailClient.'","'.$telephoneClient.'","")';
	$link->exec($requete);
	echo "le client a été crée";
}
function listeModele(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Modele');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;	
}
function listeModule(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Module');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;	
}
function listeFinition(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from FinitionMaison');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function listeIsolant(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from IsolantMaison');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function listeProjet(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Projet');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function getProjetFromName($NomProjet){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Projet where nomProjet="'.$NomProjet.'"');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[0]);
			array_push($array,$row[1]);
			array_push($array,$row[2]);
			array_push($array,$row[3]);
			array_push($array,$row[4]);
			break;
		}
	}else{
		print_r($link->errorInfo());
	}
	$result2=$link->query('select * from Projet_has_Modele where Projet_idProjet='.$array[0]);
	if($result2){
		while($row=$result2->fetch()){
			array_push($array,$row[1]);
			array_push($array,$row[2]);
			array_push($array,$row[3]);
			array_push($array,$row[4]);			
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;	
}
function caracModule($Module){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select libelle_caracteristiques, libelle_ValCarac, prix_ValCarac from Caractéristiques, ValCarac, Module where ValCarac.idValCarac=Caractéristiques.ValCarac_idValCarac and Module.idModule=Caractéristiques.Module_idModule and Module.nomModule="'.$Module.'"');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[0]);
			array_push($array,$row[1]);
			array_push($array,$row[2]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function creerModuleCustom($listeCarac,$Module){
	$link=connexionDB();
	$array=array();
	$lastIdModule=0;
	$resultIdModule=$link->query('select idModule from Module');
	if($resultIdModule){
		while($row=$resultIdModule->fetch()){
			$lastIdModule=$row[0];
		}
	}
	$lastIdModule++;
	$link->query('insert into Module values('.$lastIdModule.',"'.$Module.'")');
	echo "le module ".$Module." a été crée avec comme caractéristiques: ";
	$lastIdCarac=0;
	$resultIdCarac=$link->query('select idCaractéristiques from Caractéristiques');
	if($resultIdCarac){
		while($row=$resultIdCarac->fetch()){
			$lastIdCarac=$row[0];
		}
	}
	$lastIdValCarac=0;
	$resultIdValCarac=$link->query('select idValCarac from ValCarac');
	if($resultIdValCarac){
		while($row=$resultIdValCarac->fetch()){
			$lastIdValCarac=$row[0];
		}
	}
	$lastIdCarac++;
	$projet=getProjetFromName($_SESSION['NomProjet']);
	for($i=0;$i<$listeCarac.count();$i+3){
		$lastIdCarac++;
		$link->query('insert into Caractéristiques values('.$lastIdCarac.',"'.$listeCarac[$i].'",'.$lastIdModule.')');
		echo "-->".$listeCarac[$i]."</br>";
		$lastIdValCarac++;
		$link->query('insert into ValCarac values('.$lastIdValCarac.',"'.$listeCarac[$i+1].'","'.$listeCarac[$i+2].'",'.$lastIdCarac.')');
		echo "avec cette valeur: ".$listeCarac[$i+1]."</br>";
		echo "et ce prix : ".$listeCarac[$i+2]."</br>";
		$link->query('insert into Projet_has_Caractéristiques values('.$projet[0].','.$lastIdCarac.','.$lastIdModule.','.$lastIdValCarac.')');
	}
	
	
	
}
function getModuleByName($NomModule){
	$link=connexionDB();
	$idModule=0;
	$result=$link->query('select idModule from Module where libelle_module="'.$NomModule.'"');
	if($result){
		while($row=$result->fetch()){
		$idModule=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	return $idModule;
}
function listeCarac($Module){
	$idModule=getModuleByName($Module);
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Caractéristiques where Module_idModule='.$idModule.'');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[0]);
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function listeValCarac($idCarac){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select libelle_ValCarac from ValCarac where Caractéristiques_idCaractéristiques='.$idCarac.'');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[0]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function getValCaracByLib($libelleValCarac,$idCarac){
	$link=connexionDB();
	$idValCarac=0;
	$result=$link->query('select idValCarac from ValCarac where Caractéristiques_idCaractéristiques='.$idCarac.' and libelle_ValCarac="'.$libelleValCarac.'"');
	if($result){
		while($row=$result->fetch()){
			$idValCarac=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	return $idValCarac;
}
function creerModule($listeCarac,$Module,$TailleModule){
	$link=connexionDB();
	$idModule=getModuleByName($Module);
	$projet=getProjetFromName($_SESSION['NomProjet']);
	for($i=0;$i<count($listeCarac);$i++){
		if($i%2 != 1){
		$link->query('insert into Projet_has_Caractéristiques values('.$projet[0].','.$listeCarac[$i].','.$idModule.','.$listeCarac[$i+1].',"'.$TailleModule.'")');
		}
	}
}
function getModeleById($idModele){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select Modele.libelle_modele, Gamme.libelle_gamme from Modele,Gamme where Modele.Gamme_idGamme=Gamme.idGamme and idModele='.$idModele);
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[0]);
			array_push($array,$row[1]);
		}
	}else{
		print_r($link->errorInfo());
	}
	return $array;
}
function creerProjet($NomProjet,$NomClient,$Gamme,$Modele,$Isolant,$Finition){
	$link=connexionDB();
	$array=array();
	$lastIdProjet=0;
	$resultId=$link->query('select * from Projet');
	if($resultId){
		while($row=$resultId->fetch()){
			$lastIdProjet=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	$lastIdProjet++;
	$lastIdProjetModele=0;
	$resultIdModele=$link->query('select * from Projet_has_Modele');
	if($resultIdModele){
		while($row=$resultIdModele->fetch()){
			$lastIdProjetModele=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	$lastIdProjetModele++;
	$clientId=0;
	$resultClient=$link->query('select * from Client where nomClient="'.$NomClient.'"');
	if($resultClient){
		while($row=$resultClient->fetch()){
			$clientId=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	$gammeId=0;
	$resultGamme=$link->query('select * from Gamme where libelle_gamme="'.$Gamme.'"');
	if($resultGamme){
		while($row=$resultGamme->fetch()){
			$gammeId=$row[0];
		}
	}else{
		print_r($link->errorInfo());
	}
	$commercialId=0;
	$resultCommercial=$link->query('select * from Commercial where loginCommercial="'.$_SESSION['login'].'"');
	if($resultCommercial){
		while($row=$resultCommercial->fetch()){
			$commercialId=$row[0];
		}
	}else{
		echo "commercial-";
		print_r($link->errorInfo());
	}
	$modeleId=0;
	$resultModele=$link->query('select * from Modele where libelle_modele="'.$Modele.'"');
	if($resultModele){
		while($row=$resultModele->fetch()){
			$modeleId=$row[0];
		}
	}else{
		echo "modele-";
		print_r($link->errorInfo());
	}
	$isolantId=0;
	$resultIsolant=$link->query('select * from IsolantMaison where libelleIsolantMaison="'.$Isolant.'"');
	if($resultIsolant){
		while($row=$resultIsolant->fetch()){
			$isolantId=$row[0];
		}
	}else{
		echo "isolant-";
		print_r($link->errorInfo());
	}
	$finitionId=0;
	$resultFinition=$link->query('select * from FinitionMaison where libelleFinitionMaison="'.$Finition.'"');
	if($resultFinition){
		while($row=$resultFinition->fetch()){
			$finitionId=$row[0];
		}
	}else{
		echo "finition-";
		print_r($link->errorInfo());
	}
	$date = date('d-m-y h:i:s');
	$link->exec('insert into Projet values('.$lastIdProjet.',"'.$NomProjet.'","'.$date.'",'.$clientId.','.$commercialId.')');
	$link->exec('insert into Projet_has_Modele values('.$lastIdProjetModele.','.$modeleId.','.$gammeId.','.$finitionId.','.$isolantId.')');
/*	$resultFinal=$link->query('select * from Projet');
	if($resultFinal){
		while($row=$resultFinal->fetch()){
			echo $row[0]."/".$row[1]."/".$row[2]."/".$row[3]."/".$row[4]."/";
		}
	}else{
		print_r($link->errorInfo());
	}
	$resultFinal2=$link->query('select * from Projet_has_Modele');
	if($resultFinal){
		while($row=$resultFinal2->fetch()){
			echo $row[0]."/".$row[1]."/".$row[2]."/".$row[3]."/".$row[4]."/";
		}
	}else{
		print_r($link->errorInfo());
	}*/
}
?>