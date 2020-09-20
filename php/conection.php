<?php //db conection
function conexion() {
    $dsn = 'mysql:host=localhost;dbname=TAMRestAPI';
    $user = 'root';
    $password = 'admin';

    try {
        $con = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Conection failed: ' . $e->getMessage();
    }
    return $con;
}

$con = conexion();
$errors = array();
?>