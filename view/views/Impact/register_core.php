<?php

include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/clientc.php";

$db = config::getConnexion();



$email = isset($_GET['email']) ? $_GET['email'] : '';
$stmt = $db->prepare('SELECT COUNT(*) FROM user WHERE email = ?');
$stmt->execute([$email]);
$count = $stmt->fetchColumn();
$response = ['exists' => ($count > 0)];
//header('Content-Type: application/json');
//echo json_encode($response);


if(isset($_POST['submit'])){

  

   $nom = $_POST['nom'];
   $nom = filter_var($nom, FILTER_SANITIZE_STRING);
   
   $prenom = $_POST['prenom'];
   $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
   
   $telephone = $_POST['telephone'];
   $telephone = filter_var($telephone, FILTER_SANITIZE_STRING);
   
  
   $email = $_POST['email'];

   

   $mdp = $_POST['mdp'];
   
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
  
   $login = $_POST['login'];
   $login = filter_var($login, FILTER_SANITIZE_STRING);
  
   
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
  $image = $_POST['image'];
    // Handle image upload
  
  
     $client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp,$image);
        $clientc = new clientc();
        
        $clientc->ajouter_client($client);


        //echo "<script>alert('ADDED pls login ');</script>";

             
        header("Location:login.php");
    
}




/*
include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

$db=config::getConnexion();



if(isset($_POST['submit'])){

   $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
   $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
   $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $mdp = $_POST['mdp'];
   $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
   $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
   $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
   $image = $_POST['image'];

   // Validate input
   $errors = array();
   if(empty($nom)) {
      $errors[] = 'Nom cannot be empty';
   }
   if(empty($prenom)) {
      $errors[] = 'Prenom cannot be empty';
   }
   if(empty($telephone)) {
      $errors[] = 'Telephone cannot be empty';
   }
   if(empty($email)) {
      $errors[] = 'Email cannot be empty';
   } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Invalid email format';
   }
   if(empty($mdp)) {
      $errors[] = 'Password cannot be empty';
   }
   if(empty($adresse)) {
      $errors[] = 'Adresse cannot be empty';
   }
   if(empty($login)) {
      $errors[] = 'Login cannot be empty';
   }
   if(empty($type)) {
      $errors[] = 'Type cannot be empty';
   }
   
   if(count($errors) > 0) {
      foreach($errors as $error) {
         echo "<script>alert('".$error."');</script>";
      }
      exit;
   }

   // Hash password
   $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

   // Insert user into database
   $client = new client($nom, $prenom, $type, $telephone, $adresse, $email, $login, $mdp_hash, $image);
   $clientc = new clientc();
   $clientc->ajouter_client($client);
   
   echo "<script>alert('ADDED please login');</script>";
   header("Location:login.php");
    
}
*/