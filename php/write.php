<?php

include_once '../php/conection.php';
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
			$sql = "INSERT INTO {$tableName}(name, surname, image, password, role, created_by, last_modified_by) VALUES(:name, :surname, :image, :pass, :rol, :creator, :modifier)";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':name', $name);
			$sentencia->bindParam(':surname', $surname);
			$sentencia->bindParam(':image', $image);
			$sentencia->bindParam(':pass', $encryptedPass);
			$sentencia->bindParam(':rol', $role);
			$sentencia->bindParam(':creator', $editor);
			$sentencia->bindParam(':modifier', $editor);
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
			$sql = "INSERT INTO {$tableName}(name, surname, image, created_by, last_modified_by) VALUES(:name, :surname, :image, :creator, :modifier)";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':name', $name);
			$sentencia->bindParam(':surname', $surname);
			$sentencia->bindParam(':image', $image);		
			$sentencia->bindParam(':creator', $editor);
			$sentencia->bindParam(':modifier', $editor);
			$sentencia->execute();
			$performAction = true;
			$_SESSION["action"]=null;
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
			$errors[] = "Error, permission can´t be empty";
		}

		
		if(count($errors) == 0) {		
			$sql = "INSERT INTO {$tableName}(table_name, permission) VALUES(:table_name, :permission)";
			$sentencia = $con->prepare($sql);
			$sentencia->bindParam(':table_name', $table_name);
			$sentencia->bindParam(':permission', $permission);
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