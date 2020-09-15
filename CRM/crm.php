<?php
include '../php/active_session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>CRM</title>

        <!-- css -->
        <link rel="stylesheet" href="../css/style.css?<?php echo time(); ?>">
    </head>
    <body>
        <main>
            <div class="CRMInterface relative">

                <!--   NavBar --------------------------------------------------  -->
                <div class="NavigationBar">
                    <div class="separa-50"></div>
                    <div class="wellcome">
                        <h2>wellcome</h2>
                        <h2><?php echo $_SESSION['usuario'] ?></h2>
                        <h3><?php echo $_SESSION['rol'] ?></h3>
                    </div>
                    <div class="separa-50"></div>
                    <div class="apartados">
                        <div class="tituloApartados wrapper-flex">
                            <div>
                                <h3>NAVIGATION BAR</h3>
                                <div class="lineaBlanca"></div>
                            </div>
                        </div>
                        <div class="contenedorApartados">
                            <ul>
                                <li><a href="">WELLCOME</a></li>
                                <li><a href="">USERS</a></li>
                                <li><a href="">CUSTOMERS</a></li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="logout">
                        <button>
                            <a href="../php/logout.php">LOGOUT</a>
                        </button>
                    </div>
                </div>

                <!--   tabla --------------------------------------------------  -->
                <div class="mainCRMBody">
                    <div class="separa-20"></div> 
                </div>
            </div>
        </main>

        <footer>
             <div class="footer wrapper-flex">
                <p>Hey! This is a test CRM for Agile Monkeys RestAPI test developped by <a href="">Jafar Jabbarzadeh</a></p>
            </div>
        </footer>

        <script src="../js/scripts.js"></script>        
    </body>
</html>