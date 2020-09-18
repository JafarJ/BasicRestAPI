<?php

$sql = "SELECT * FROM permissions";
$sentencia = $con->prepare($sql);
$sentencia->execute();
$permissionsArray = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$permissionsHashtable = array();
foreach($permissionsArray as $value){
	$permissionsHashtable[$value["table_name"]]=$value["permission"];
}

?>