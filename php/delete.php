<?php
include_once '../php/conection.php';
//To send tablename via url param
if(isset($_GET["tableName"])){
	$tableName = $_GET["tableName"];	
	$_SESSION['idToUpdate'] = $_GET["idToUpdate"];
}

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
	$sentence = $con->prepare($sql);
	$sentence->bindParam(':id', $_SESSION["idToUpdate"]);
	$sentence->execute();

	if(($response = $sentence->rowCount()) == 0){
		$errores[] = 'Error, id does not exist.';
	} else {
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
		$sentence = $con->prepare($sql);
		$sentence->bindParam(':id', $_SESSION["idToUpdate"]);
		$sentence->execute();
		$_SESSION["action"]=null;
		$performAction = true;
        if(isset($_GET["tableName"])){echo json_encode("Succesfully deleted from db");}else{echo "<meta http-equiv='refresh' content='0'>";};
		header("Location: ../CRM/crm.php");
	}
}
?>