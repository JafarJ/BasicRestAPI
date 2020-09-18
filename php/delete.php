<?php
if(!isset($_SESSION["idToUpdate"])) {
	$errores[] = 'Error, no se ha mandado ningun id.';
} else {
	if($_SESSION["idToUpdate"] == ''){
		$errores[] = 'Error, el id no puede estar vacío.';
	}

	if(!is_numeric($_SESSION["idToUpdate"])) {
		$errores[] = 'Error, el id debe ser numérico.';
	}

	$sql = "SELECT * FROM {$tableName} WHERE id = :id";
	$sentencia = $con->prepare($sql);
	$sentencia->bindParam(':id', $_SESSION["idToUpdate"]);
	$sentencia->execute();

	if(($respuesta = $sentencia->rowCount()) == 0){
		$errores[] = 'Error, el id ingresado no existe.';
	} else {
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
		$sentencia = $con->prepare($sql);
		$sentencia->bindParam(':id', $_SESSION["idToUpdate"]);
		$sentencia->execute();
		$_SESSION["action"]=null;
		$performAction = true;
		header("Location: ../CRM/crm.php");
	}
}
?>