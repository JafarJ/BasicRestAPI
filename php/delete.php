<?php
include_once '../php/conection.php';
//To send tablename via url param
if(isset($_GET["tableName"])){$tableName = $_GET["tableName"];}

if(!isset($_SESSION["idToUpdate"])) {
	$errores[] = 'Error, id wasn´t sent.';
} else {
	if($_SESSION["idToUpdate"] == ''){
		$errores[] = 'Error, id can´t be empty.';
	}

	if(!is_numeric($_SESSION["idToUpdate"])) {
		$errores[] = 'Error, id has to be numeric.';
	}

	$sql = "SELECT * FROM {$tableName} WHERE id = :id";
	$sentencia = $con->prepare($sql);
	$sentencia->bindParam(':id', $_SESSION["idToUpdate"]);
	$sentencia->execute();

	if(($respuesta = $sentencia->rowCount()) == 0){
		$errores[] = 'Error, id does not exist.';
	} else {
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
		$sentencia = $con->prepare($sql);
		$sentencia->bindParam(':id', $_SESSION["idToUpdate"]);
		$sentencia->execute();
		$_SESSION["action"]=null;
		$performAction = true;
		echo "<meta http-equiv='refresh' content='0'>";
		header("Location: ../CRM/crm.php");
	}
}
?>