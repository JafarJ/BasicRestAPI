<?php
session_start();
include_once '../php/conection.php';
include '../php/authentication.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>Access</title>

        <!-- css -->
        <link rel="stylesheet" href="../css/style.css?<?php echo time(); ?>">

    </head>
    <body>

        <main>
            
            <div class="container">
                <div class="access wrapper-flex">
                    <form id="access" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="relative">                                     
                        <fieldset>
                            <input placeholder="USER" type="text" name="user" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <input placeholder="PASSWORD" type="password" name="password" tabindex="2" required>
                        </fieldset>
                        <fieldset class="fsboton wrapper-flex">
                            <input type="submit" name="btn-access" id="contact-submit" data-submit="...enviando" value="Acceder">
                            <div class="extraLinks">
                                <p><a href="">Forgot Password? Don't worry, it's "admin"</a></p>
                                
                            </div>
                        </fieldset>                      
                    </form>                   
                    <?php if($errors) {?><p class="error"><?php echo $errors[0] ?></p><?php } ?>                  
                </div>
            </div>
        </main>

        <footer>
            <div class="footer wrapper-flex">
                <p>Hey! This is a test CRM for Agile Monkeys RestAPI test developped by <a target="_blank" href="https://www.linkedin.com/in/jafarjabbarzadeh/">Jafar Jabbarzadeh</a></p>
            </div>
        </footer>
    </body>
</html>