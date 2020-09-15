<?php
session_start();
session_destroy();
header('Location: ../CRM/access.php');
?>