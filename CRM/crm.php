<?php
include '../php/session_start.php';
include '../php/active_session.php';
include '../php/list_tables.php';
include '../php/list_table_content.php';
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
                                <?php
                                    foreach($tableArray as $table_name) {                                 
                                    ?>
                                        <li><a href="../php/updateTable.php?updateTable=<?php print_r($table_name) ?>"><?php print_r($table_name) ?></a></li>
                                    <?php }
                                ?>                         
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
                <div class="mainCRMBody" id="mainCRMBody">
                    <div class="separa-20"></div> 

                    <?php if(isset($rowsArray)){ ?>
                    <h2><?php print_r($_SESSION["tableName"]) ?></h2>
                    
                    <div class="separa-20"></div>
                    <div>
                        <table class="table table-striped dataTable" id="registros">
                            <thead>
                                <tr>
                                    <?php $rows = $rowsArray[0];
                                        $row_ids = array_keys($rows);
                                        foreach($row_ids as $row_id) {
                                    ?>  
                                        <th><?php print_r($row_id) ?></th>
                                    <?php } ?> 
                                   
                                    <th><a href="crear_usuario.php"><input type="button" class="btn btn-primary btn-right" value="Add new"></a></th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php foreach($rowsArray as $rows) { 
                                ?>   
                                <tr>
                                    <?php foreach($rows as $row){
                                        ?> 
                                        <td><?php echo $row ?></td> 
                                    <?php } ?>                                   
                                    <td>
                                        <a href="../php/eliminar_usuario.php?id=<?php echo $row['id_usuario'] ?>" type="button"><img src="../images/signo-de-cruz-en-un-circulo-en-un-cuadrado-redondeado.svg" alt="Delete" title="Eliminar"></a>
                                        <a href="actualizar_usuario.php?id=<?php echo $row['id_usuario'] ?>" type="button"><img src="../images/editar-signo-de-interfaz.svg" alt="Update" title="Actualizar"></a>
                                    </td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>

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