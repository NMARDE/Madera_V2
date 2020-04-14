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
	}
	$lastId++;
	$requete='insert into Client values('.$lastId.',"'.$nomClient.'","'.$prenomClient.'","'.$emailClient.'","'.$telephoneClient.'","")';
	$link->exec($requete);
	echo "le client a été crée";
}
function listeGamme(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select * from Gamme');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}
	return $array;	
}
function listeFinition(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select idCaractéristiques,libelle_caracteristiques from Caractéristiques where Module_IdModule=1');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}
	return $array;
}
function listeIsolant(){
	$link=connexionDB();
	$array=array();
	$result=$link->query('select idCaractéristiques,libelle_caracteristiques from Caractéristiques where Module_IdModule=1');
	if($result){
		while($row=$result->fetch()){
			array_push($array,$row[1]);
		}
	}
	return $array;
}
function creerProjet($NomProjet,$NomClient,$Gamme,$Isolant,$Finition){
	$link=connexionDB();
	$array=array();
	$lastId=0;
	$resultId=$link->query('select * from Projet');
	if($resultId){
		while($row=$resultId->fetch()){
			$lastId=$row[0];
		}
	}
	$lastId++;
	$clientId=0;
	$NomClient=explode(" ",$NomClient);
	$resultClient=$link->query('select * from Client where nomClient='.$nomClient[0];
	if($resultClient){
		while($row=$resultClient->fetch()){
			$clientId=$row[0];
		}
	}
		$commercialId=0;
	$NomClient=explode(" ",$NomClient);
	$resultCommercial=$link->query('select * from Commercial where loginCommercial='.$_SESSION['login'];
	if($resultCommercial){
		while($row=$resultCommercial->fetch()){
			$commercialId=$row[0];
		}
	}
	$isolantArray=array();
	$resultIsolant=$link->query('select * from Caractéristiques where libelle_caracteristiques='.$Isolant;
	if($resultIsolant){
		while($row=$resultIsolant->fetch()){
			array_push($isolantArray,$row[0]);
			array_push($isolantArray,$row[2]);
			array_push($isolantArray,$row[3]);
		}
	}
	$finitionArray=array();
	$resultFinition=$link->query('select * from Caractéristiques where libelle_caracteristiques='.$Isolant;
	if($resultFinition){
		while($row=$resultFinition->fetch()){
			array_push($isolantFinition,$row[0]);
			array_push($isolantFinition,$row[2]);
			array_push($isolantFinition,$row[3]);
		}
	}
	$date = date('d-m-y h:i:s');
	$link->exec('insert into Projet values('.$lastId.',"'.$NomProjet.'",'.$date.','.$clientId.','.$commercialId.')');
	$link->exec('create table Projet_Has_Modèle( Projet_idProjet int primary key not null, Modele_idModele)');
	$link->exec('insert into Projet_Has_Caractéristiques values('.$lastId.','.$isolantArray[0].','.$isolantArray[1].','.$isolantArray[2].')');
	$link->exec('insert into Projet_Has_Caractéristiques values('.$lastId.','.$finitionArray[0].','.$finitionArray[1].','.$finitionArray[2].')');
}
?>