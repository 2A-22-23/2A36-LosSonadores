<?php

include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

$db=config::getConnexion();



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
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   

   $mdp = $_POST['mdp'];
   
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
  
   $login = $_POST['login'];
   $login = filter_var($login, FILTER_SANITIZE_STRING);
  
   
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $image = $_POST['image'];

     $client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp,$image);
        $clientc = new clientc();
        
        $clientc->ajouter_client($client);


        //echo "<script>alert('ADDED pls login ');</script>";

             
        header("Location:login.php");
    
}



