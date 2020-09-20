<?php
session_start(); 
$_SESSION = []; 
session_destroy();
header('Location: ../CRM/access.php');
?>