<?php

$rowsArray = [];
$tableName = $_SESSION["tableName"];
$sql = "SELECT * FROM {$tableName}";
$sentencia = $con->prepare($sql);
$sentencia->execute();
$rowsArray = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>