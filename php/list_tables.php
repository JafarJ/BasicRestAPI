<?php
include_once '../php/conection.php';
//To send tablename via url param
if(isset($_GET["dbname"])){
	$dbName = $_GET["dbname"];	
}

$sql = "show tables";
$sentence = $con->prepare($sql);
$sentence->execute();
while($table = $sentence->fetch(PDO::FETCH_ASSOC)){
	$tableArray[] = $table['Tables_in_'.$dbName];
}
if(isset($_GET["dbname"])){echo json_encode("Succesfully read ".$dbName ." -> ");echo json_encode($tableArray);};

?>