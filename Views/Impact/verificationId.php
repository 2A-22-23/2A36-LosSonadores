<?php

include "C:\xampp\htdocs\t_assurance\Controller\clientc.php";
include "C:\xampp\htdocs\t_assurance\Controller\Assurance.php";


$pdo = new PDO('mysql:host=localhost;dbname=vitaliaa','root','',);
$query = $pdo->prepare("SELECT * FROM user WHERE email = :email and id_assurance > 0 ");
$email = $_POST['email'];
$query->bindParam(':email', $email);
if (!$query->execute()) {
  // Handle query execution error
  $errorInfo = $query->errorInfo();
  $errorMessage = "Query execution failed: " . $errorInfo[2] . "\n";
  error_log($errorMessage, 3, "C:/Users/chino/Desktop/logs.log");
  exit();
}
$data = $query->fetch(PDO::FETCH_ASSOC);
if ($data) {
  header('location:AfficherAssurance.php?email=' . $email);
} else {
  $errorMessage = "No rows found in user table for email=$email\n";
  error_log($errorMessage, 3, "C:/Users/chino/Desktop/logs.log");
  header('location:frontAddAssurance.php?email=' . $email);
}
 
 ?>