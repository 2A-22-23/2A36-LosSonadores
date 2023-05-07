<?php

include 'C:\xampp\htdocs\FIRST_SUII\projet\View\tojrab03\config.php';
session_start();
session_unset();
session_destroy();

header('location:index.php');

?>