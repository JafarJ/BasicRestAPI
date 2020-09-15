<?php
function conexion() {
    $dsn = 'mysql:host=localhost;dbname=TAMRestAPI';
    $usuario = 'root';
    $contraseña = 'admin';

    try {
        $con = new PDO($dsn, $usuario, $contraseña);
    } catch (PDOException $e) {
        echo 'Conection failed: ' . $e->getMessage();
    }
    return $con;
}
?>