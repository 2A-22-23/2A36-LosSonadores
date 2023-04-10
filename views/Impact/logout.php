<?php

include 'C:\xampp\htdocs\tojrab02\config.php';
session_start();
session_unset();
session_destroy();

header('location:index.php');

?>