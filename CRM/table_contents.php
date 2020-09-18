<h2><?php print_r($_SESSION["tableName"]) ?></h2>
                    
    <div class="separa-20"></div>
    <div>
        <table class="table table-striped dataTable" id="registros">
            <thead>
                <tr>
                    <?php 
                        $rows = $rowsArray[0];
                        $row_ids = array_keys($rows);
                        foreach($row_ids as $row_id) {
                            if($row_id !== "password"){
                    ?>  
                    <th><?php print_r($row_id) ?></th>
                    <?php 
                            }
                        } 
                    ?>                                  
                    <th><a href="../php/updateTable.php?performAction=write"><input type="button" class="btn btn-primary btn-right" value="Add new"></a></th>
                </tr>
            </thead>
            <tbody> 
                <?php 
                    foreach($rowsArray as $rows) { 
                ?>   
                <tr>
                    <?php 
                        foreach($rows as $key => $value){ 
                            if($key === "image"){
                    ?> 
                    <td><img style="width: 25px; height: 25px;" src="../images/<?php echo $value ?>" alt=""></td> 
                    <?php 
                            }else if($key !== "password"){                       
                    ?>  
                    <td><?php echo $value ?></td> 
                    <?php
                            }
                        }
                    ?>
                    <td>
                        <a href="../php/updateTable.php?performAction=delete&idToUpdate=<?php print_r($rows["id"]) ?>" type="button">Delete</a>
                        <a href="../php/updateTable.php?performAction=update&idToUpdate=<?php print_r($rows["id"]) ?>" type="button">Update</a>
                    </td>
                </tr>
            <?php } ?> 
            </tbody>
        </table>
    </div>