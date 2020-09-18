<?php
$sql = "show tables";
$sentencia = $con->prepare($sql);
$sentencia->execute();
while($table = $sentencia->fetch(PDO::FETCH_ASSOC)){
$tableArray[] = $table['Tables_in_tamrestapi'];
}
?>