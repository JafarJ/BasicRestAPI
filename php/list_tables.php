<?php
include_once '../php/conection.php';
//To send tablename via url param
if(isset($_GET["dbname"])){
	$dbName = $_GET["dbname"];	
}

$sql = "show tables";
$sentencia = $con->prepare($sql);
$sentencia->execute();
while($table = $sentencia->fetch(PDO::FETCH_ASSOC)){
	$tableArray[] = $table['Tables_in_'.$dbName];
}
if(isset($_GET["dbname"])){echo json_encode("Succesfully read ".$dbName ." -> ");echo json_encode($tableArray);};

?>