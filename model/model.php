<?php

// Récupération de la base de données 
function getBDD() 
{
    $bdd = new PDO('mysql:host=localhost; dbname=madera-ril_bdd; charset=utf8', 'root', '');
    return $bdd;
}


?>