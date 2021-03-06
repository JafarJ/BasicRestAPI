<?php 
include_once '../php/conection.php';
if(isset($_GET["tableName"])){
	$tableName = $_GET["tableName"];	
	$_SESSION['id'] = $_GET["sessionid"];
	$_SESSION['idToUpdate'] = $_GET["idToUpdate"];
}
$id = $_SESSION["idToUpdate"];
$sql = "SELECT * FROM {$tableName} WHERE id = :id";
$sentence = $con->prepare($sql);
$sentence->bindParam(':id', $id);
$sentence->execute();
$theOneToBeUpdated = $sentence->fetch(PDO::FETCH_ASSOC);
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
			$errors[] = "Error, name can�t be empty";
		}

		if($surname == '') {
			$errors[] = "Error, surname can�t be empty";
		}

		if($pass != $pass2){
			$errors[] = "Error, passwords have to match";
		}

		if(count($errors) == 0) {		
			$editor = $_SESSION['id'];
			$encryptedPass = SHA1($pass);
			$sql = "UPDATE {$tableName} SET name = :name, surname = :surname, image = :image, password = :pass, role = :rol, last_modified_by = :modifier WHERE id = :id";
			$sentence = $con->prepare($sql);
			$sentence->bindParam(':name', $name);
			$sentence->bindParam(':surname', $surname);
			$sentence->bindParam(':image', $image);
			$sentence->bindParam(':pass', $encryptedPass);
			$sentence->bindParam(':rol', $role);
			$sentence->bindParam(':modifier', $editor);
			$sentence->bindParam(':id', $id);
			$sentence->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			if(isset($_GET["tableName"])){echo json_encode("Succesfully updated user in db");}else{echo "<meta http-equiv='refresh' content='0'>";};
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
			$errors[] = "Error, name can�t be empty";
		}

		if($surname == '') {
			$errors[] = "Error, surname can�t be empty";
		}

		
		if(count($errors) == 0) {		
			$editor = $_SESSION['id'];
			$sql = "UPDATE {$tableName} SET name = :name, surname = :surname, image = :image, last_modified_by = :modifier WHERE id = :id";
			$sentence = $con->prepare($sql);
			$sentence->bindParam(':name', $name);
			$sentence->bindParam(':surname', $surname);
			$sentence->bindParam(':image', $image);
			$sentence->bindParam(':modifier', $editor);
			$sentence->bindParam(':id', $id);
			$sentence->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			if(isset($_GET["tableName"])){echo json_encode("Succesfully updated customer in db");}else{echo "<meta http-equiv='refresh' content='0'>";};
			header("Location: ../CRM/crm.php");
		}
	}
} else if($tableName === "permissions"){
	//case for table being "permissions"
	if(isset($_POST['submit'])) {
		$table_name = $_POST['table_name'];
		$permission = $_POST['permission'];

		if($table_name == '') {
			$errors[] = "Error, table name can�t be empty";
		}

		if($permission == '') {
			$errors[] = "Error, permissions can�t be empty";
		}

		
		if(count($errors) == 0) {		
			$sql = "UPDATE {$tableName} SET table_name = :table_name, permission = :permission WHERE id = :id";
			$sentence = $con->prepare($sql);
			$sentence->bindParam(':table_name', $table_name);
			$sentence->bindParam(':permission', $permission);
			$sentence->bindParam(':id', $id);
			$sentence->execute();
			$_SESSION["action"]=null;
			$performAction = true;
			if(isset($_GET["tableName"])){echo json_encode("Succesfully updated permission in db");}else{echo "<meta http-equiv='refresh' content='0'>";};
			header("Location: ../CRM/crm.php");
		}
	}
} else{
	$errors[] = "Additional tables other than 'users' , 'customers' and 'permissions' are not supported, contact API developer for a solution";
}

?>