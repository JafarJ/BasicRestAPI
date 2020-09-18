<?php

$rowsArray = [];
$tableName = $_SESSION["tableName"];
$action = $_SESSION["action"];
if($tableName === "wellcome"){
	$performAction = false;
	$landingPage = true;
	$_SESSION["action"] = null;
}else if($action === "write" || $action === "update" || $action === "delete"){
	$sql = "SELECT * FROM {$tableName}";
	$sentencia = $con->prepare($sql);
	$sentencia->execute();
	$rowsArray = $sentencia->fetchAll(PDO::FETCH_ASSOC);
	$performAction = true;
	$landingPage = false;
}else{
	$sql = "SELECT * FROM {$tableName}";
	$sentencia = $con->prepare($sql);
	$sentencia->execute();
	$rowsArray = $sentencia->fetchAll(PDO::FETCH_ASSOC);
	$performAction = false;
	$landingPage = false;
	$_SESSION["action"] = null;
	//print_r($rowsArray);
}

?>