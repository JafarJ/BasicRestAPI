<?php
include_once '../php/conection.php';
//To send tablename via url param
if(isset($_GET["tableName"])){
	$_SESSION["tableName"] = $_GET["tableName"];	
}
$rowsArray = [];
$tableName = $_SESSION["tableName"];
$action = $_SESSION["action"];
if($tableName === "wellcome"){
	$performAction = false;
	$landingPage = true;
	$_SESSION["action"] = null;
}else if($action === "write" || $action === "update" || $action === "delete"){
	$sql = "SELECT * FROM {$tableName}";
	$sentence = $con->prepare($sql);
	$sentence->execute();
	$rowsArray = $sentence->fetchAll(PDO::FETCH_ASSOC);
	$performAction = true;
	$landingPage = false;
}else{
	$sql = "SELECT * FROM {$tableName}";
	$sentence = $con->prepare($sql);
	$sentence->execute();
	$rowsArray = $sentence->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_GET["tableName"])){echo json_encode("Succesfully read ".$tableName." -> ");echo json_encode($rowsArray);};
	$performAction = false;
	$landingPage = false;
	$_SESSION["action"] = null;
}
?>