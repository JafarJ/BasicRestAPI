<?php //db conection
function conexion() {
// CHANGE THIS VARIABLES WITH YOUR DATA
    $dsn = 'mysql:dbname= HERE GOES UR DBNAME ; host= HERE GOES YOUR HOST';
    $user = 'HERE GOES UR DB USERNAME';
    $password = 'HERE GOES UR DB PASSWORD';

    try {
        $con = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Conection failed: ' . $e->getMessage();
    }
    return $con;
}
$dbName = "HERE GOES UR DBNAME FOR FURTHER USE";
$con = conexion();
$errors = array();
?>