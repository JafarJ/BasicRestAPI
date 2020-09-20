<?php 
include_once '../php/conection.php';
$id = $_SESSION["idToUpdate"];
$sql = "SELECT * FROM {$tableName} WHERE id = :id";
$sentencia = $con->prepare($sql);
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$theOneToBeUpdated = $sentencia->fetch(PDO::FETCH_ASSOC);
//To send tablename via url param
if(isset($_GET["tableName"])){$tableName = $_GET["tableName"];}

//solution for only "users" , "customers" and "permissions" tables case
if($tableName === "users"){
	//case for table being "users"
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$pass = $_POST['password'];
		$pass2 = $_POST['password2'];
		$role = $_POST['role'];
		$image = $_FILES['image']['name'];
		$target = "../images/".basename($image);
		
		move_uploaded_file($_FILES['image']['tmp_name'], $target);

		if($name == '') {
			$errors[] = "Error, name can´t be empty";
		}

		if($surname == '') {
			$errors[] = "Error, surname can´t be empty";
		}

		if($pass != $pass2){
			$errors[] = "Error, passwords have to match";
		}

		if(count($errors) == 0) {		
			$editor = $_SESSION['id'];
			$encryptedPass = SHA1($pass);
			$sql = "UPDATE {$tableName} SET name = :name, surname = :surname, image = :image, password = :pass, role = :rol, last_modified_by = :modifier WHERE id = :id";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':name', $name);
			$sentencia->bindParam(':surname', $surname);
			$sentencia->bindParam(':image', $image);
			$sentencia->bindParam(':pass', $encryptedPass);
			$sentencia->bindParam(':rol', $role);
			$sentencia->bindParam(':modifier', $editor);
			$sentencia->bindParam(':id', $id);
			$sentencia->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			echo "<meta http-equiv='refresh' content='0'>";
			header("Location: ../CRM/crm.php");
		}
	}
} else if($tableName === "customers"){
	//case for table being "customers"
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];

		$image = $_FILES['image']['name'];
		$target = "../images/".basename($image);
		
		move_uploaded_file($_FILES['image']['tmp_name'], $target);

		if($name == '') {
			$errors[] = "Error, name can´t be empty";
		}

		if($surname == '') {
			$errors[] = "Error, surname can´t be empty";
		}

		
		if(count($errors) == 0) {		
			$editor = $_SESSION['id'];
			$sql = "UPDATE {$tableName} SET name = :name, surname = :surname, image = :image, last_modified_by = :modifier WHERE id = :id";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':name', $name);
			$sentencia->bindParam(':surname', $surname);
			$sentencia->bindParam(':image', $image);
			$sentencia->bindParam(':modifier', $editor);
			$sentencia->bindParam(':id', $id);
			$sentencia->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			echo "<meta http-equiv='refresh' content='0'>";
			header("Location: ../CRM/crm.php");
		}
	}
} else if($tableName === "permissions"){
	//case for table being "permissions"
	if(isset($_POST['submit'])) {
		$table_name = $_POST['table_name'];
		$permission = $_POST['permission'];

		if($table_name == '') {
			$errors[] = "Error, table name can´t be empty";
		}

		if($permission == '') {
			$errors[] = "Error, permissions can´t be empty";
		}

		
		if(count($errors) == 0) {		
			$sql = "UPDATE {$tableName} SET table_name = :table_name, permission = :permission WHERE id = :id";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':table_name', $table_name);
			$sentencia->bindParam(':permission', $permission);
			$sentencia->bindParam(':id', $id);
			$sentencia->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			echo "<meta http-equiv='refresh' content='0'>";
			header("Location: ../CRM/crm.php");
		}
	}
} else{
	$errors[] = "Additional tables other than 'users' , 'customers' and 'permissions' are not supported, contact API developer for a solution";
}

?>