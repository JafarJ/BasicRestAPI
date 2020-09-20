<?php
session_start();
include_once '../php/conection.php';
include '../php/active_session.php';
if (isset($_GET['updateTable']))
{
    updateTable($_GET['updateTable']);
}
if (isset($_GET['performAction']))
{
    performAction($_GET['performAction']);
}
function updateTable($tableName){
    $_SESSION["tableName"]=$tableName;
    $_SESSION["action"]=null;
    header("Location: ../CRM/crm.php");
}

function performAction($action){       
    $_SESSION["action"]=$action;
    $_SESSION["idToUpdate"]=$_GET['idToUpdate'];
    header("Location: ../CRM/crm.php");
}
?>