<?php
function conexion() {
    $dsn = 'mysql:host=localhost;dbname=TAMRestAPI';
    $usuario = 'root';
    $contrase�a = 'admin';

    try {
        $con = new PDO($dsn, $usuario, $contrase�a);
    } catch (PDOException $e) {
        echo 'Conection failed: ' . $e->getMessage();
    }
    return $con;
}
?>