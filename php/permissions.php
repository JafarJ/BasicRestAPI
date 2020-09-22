<?php

$sql = "SELECT * FROM permissions";
$sentence = $con->prepare($sql);
$sentence->execute();
$permissionsArray = $sentence->fetchAll(PDO::FETCH_ASSOC);

$permissionsHashtable = array();
foreach($permissionsArray as $value){
	$permissionsHashtable[$value["table_name"]]=$value["permission"];
}

?>