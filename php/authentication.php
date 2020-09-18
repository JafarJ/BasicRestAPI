<?php
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])) {
        header("Location: access.php");
    }

    if(isset($_SESSION['user']) && isset($_SESSION['rol'])) {

        $user = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario= :usuario";
            $sentencia = $con->prepare($sql);
            $sentencia->bindParam(':usuario', $user);
            $sentencia->execute();

        if(($numero = $sentencia->rowCount()) == 0) {
            session_destroy();
            header('Location: access.php');
        }
    }

    if(isset($_POST['btn-access'])) {
        if(!isset($_POST['user']) || !isset($_POST['password'])) {
            $errors[] = 'Error, no data was sent.';
        } else {

            $user = $_POST['user'];
            $pass = sha1($_POST['password']);

            if($user == '' || $pass == '') {
                $errors[] = 'Error, los campos no pueden estar vacíos';
            }

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
	             $_SESSION['usuario'] = $rows['name'];
	             $_SESSION['rol'] = $rows['role'];
	             $_SESSION['id'] = $rows['id'];
	             header('Location: ../php/updateTable.php?updateTable=wellcome');

                }
            }
        }
    }
?>