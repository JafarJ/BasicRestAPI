<?php
function conexion() {
    $dsn = 'mysql:host=localhost;dbname=TAMRestAPI';
    $usuario = 'root';
    $contraseņa = 'admin';

    try {
        $con = new PDO($dsn, $usuario, $contraseņa);
    } catch (PDOException $e) {
        echo 'Conection failed: ' . $e->getMessage();
    }
    return $con;
}
?>