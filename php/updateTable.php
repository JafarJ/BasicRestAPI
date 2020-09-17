<?php
include '../php/session_start.php';
include '../php/active_session.php';
if (isset($_GET['updateTable']))
{
    updateTable($_GET['updateTable']);
}
function updateTable($tableName){
        $_SESSION["tableName"]=$tableName;
        header("Location: ../CRM/crm.php");
}
?>