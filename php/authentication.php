<?php //Checks if user exists and checks OAuth2 

    if(isset($_SESSION['user']) && isset($_SESSION['rol'])) {

        $user = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE name = :user";
        $sentencia = $con->prepare($sql);
        $sentencia->bindParam(':user', $user);
        $sentencia->execute();

        if(($numero = $sentencia->rowCount()) > 0) {
           
            header('Location: ../CRM/crm.php');
        }
    }

    if(isset($_POST['btn-access'])) {
        if(!isset($_POST['user']) || !isset($_POST['password'])) {
            $errors[] = 'Error, no data was sent.';
        } else {

            $user = $_POST['user'];
            $pass = sha1($_POST['password']);

            if($user == '' || $pass == '') {
                $errors[] = 'Error, fields can´t be empty';
            }

            // IF NOT USING OAUTH WITH https://www.okta.com/ THEN COMMENT OR DELETE THE NEXT LINE
            include '../php/oauth2.php';

            if(count($errors) == 0) {
                $sql = 'SELECT * FROM users WHERE name = :name AND password = :pass';
                $sentencia = $con->prepare($sql);
                $sentencia-> bindParam(':name', $user);
                $sentencia-> bindParam(':pass', $pass);
                $sentencia->execute();
                $rows = $sentencia->fetch(PDO::FETCH_ASSOC);

                if(($respuesta = $sentencia->rowCount()) == 0) {
                    $errors[] = 'Error, incorrect user or password.';
                } else {
	             $_SESSION['user'] = $rows['name'];
	             $_SESSION['rol'] = $rows['role'];
	             $_SESSION['id'] = $rows['id'];
	             header('Location: ../php/updateTable.php?updateTable=wellcome');
                }
            }
        }
    }
?>