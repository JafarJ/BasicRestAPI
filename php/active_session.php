<?php
session_start();
include '../php/conection.php';

$con = conexion();
$errores = array();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
    header("Location: ../CRM/access.php");    
}

if(isset($_SESSION['user']) && isset($_SESSION['role'])) {
    
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE name_user = :user";
        $sentencia = $con->prepare($sql);
        $sentencia->bindParam(':user', $user);
        $sentencia->execute();
    
    if(($numero = $sentencia->rowCount()) == 0) {
        session_destroy();
        header('Location: ../CRM/access.php');
    }
}
?>