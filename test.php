<?php
include('DAO.php');
$array=array();
$array=getClientById(1);
if(empty($array)){
echo "AH";
}
echo $array[0];
?>