<?php

include 'C:\xampp\htdocs\tojrab02\config.php';
session_start();
session_unset();
session_destroy();

header('location:/tojrab03/views/Impact/login.php');


?>