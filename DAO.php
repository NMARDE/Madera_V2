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
	$result=$link->query('select * from commercial');
	if(!$result){
		echo $result;
		echo 'lol';
	}
	 while ($row = $result->fetch()) {
        printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
    }
}

?>