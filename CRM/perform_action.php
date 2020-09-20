<?php
$theOneToBeUpdated = "";
//print_r($_SESSION);
switch ($_SESSION["action"]) {
    case "write":
        include '../php/write.php';
        break;
    case "delete":
        include '../php/delete.php';
        break;
    case "update":
        include '../php/update.php';
        break;
}

?>

<h2><?php print_r($_SESSION["tableName"]) ?></h2>
<div class="separa-20"></div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
	<table class="table table-striped dataTable" id="performAction">
		<thead>
            <tr>
                <?php 
                if($_SESSION["action"] !== null){
					$rows = $rowsArray[0];
                    $row_ids = array_keys($rows);
                    foreach($row_ids as $row_id) { if($row_id !== "created_by" && $row_id !== "last_modified_by" && $row_id !== "id"){
                ?>
                <th><?php print_r($row_id) ?></th>
                <?php 
					}} 
				?>

            </tr>
        </thead>
        <tbody>
		<tr>
			<?php 
				$rows = $rowsArray[0];
                $row_ids = array_keys($rows);
                foreach($row_ids as $row_id) {
					if($row_id !== "created_by" && $row_id !== "last_modified_by" && $row_id !== "id"){
						if($row_id === "password"){
            ?>
            <td><input type="password" name="<?php print_r($row_id) ?>" placeholder="<?php print_r($row_id) ?>">
			<input type="password" name="<?php print_r($row_id) ?>2" placeholder="repeat <?php print_r($row_id) ?>"></td>
			<?php 
						}else if($row_id === "image"){ 
			?>
			<td><input type="file" name="<?php print_r($row_id) ?>" placeholder="<?php print_r($row_id) ?>"></td>
			<?php 
						}else{ 
			?>
			<td><input type="text" name="<?php print_r($row_id) ?>" placeholder="<?php print_r($row_id) ?>" value="<?php if($_SESSION["action"] === "update")print_r($theOneToBeUpdated["$row_id"]) ?>"></td>
			<?php		
						}}} 
			?>
			<td/>
			<input type="submit" name="submit" value="<?php print_r($_SESSION["action"]) ?>">
		</tr>
		<div class="error">
		<?php
			for($i=0; $i<count($errors); $i++) { ?>
				<p ><?php echo $errors[$i] ?></p>
			<?php }} ?>
		</div>
        </tbody>
    </table>
</form>