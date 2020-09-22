<?php //Checks if session is active when trying to enter crm
if(!isset($_SESSION['user']) && !isset($_SESSION['rol'])) {
    header("Location: ../CRM/access.php");    
}

if(isset($_SESSION['user']) && isset($_SESSION['rol'])) {
    
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE name = :user";
    $sentence = $con->prepare($sql);
    $sentence->bindParam(':user', $user);
    $sentence->execute();
    
    if(($number = $sentence->rowCount()) == 0) {
        session_destroy();
        header('Location: ../CRM/access.php');
    }
}
?>