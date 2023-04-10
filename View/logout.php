<?php

include 'C:\xampp\htdocs\atelier_CRUD\atelier_CRUD\config.php';
session_start();
session_unset();
session_destroy();

header('location:index.php');

?>