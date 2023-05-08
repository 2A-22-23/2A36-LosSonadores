<?php
include 'C:\xampp\htdocs\First_SUII\projet\config.php';
session_start();
session_unset();
session_destroy();
header('Location: /First_SUII/projet/View/Impact/login.php');
exit;
?>
