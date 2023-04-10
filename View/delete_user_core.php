<?php

include "C:/xampp/htdocs/atelier_CRUD/atelier_CRUD/tojrab03/controller/clientc.php";

$db=config::getConnexion();


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
   $mdp = sha1($_POST['mdp']);
   
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
  
   $login = $_POST['login'];
   $login = filter_var($login, FILTER_SANITIZE_STRING);
  
   
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   

   // Check if email already exists
   

     $client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp);
        $clientc = new clientc();
        
        $clientc->deleteClient($idclient);

       
    
}




/*include 'C:\xampp\htdocs\tojrab02\config.php';

/*session_start();

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};*/

/*if(isset($_POST['submit'])){
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_STRING);
    $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
   
    // Check if the email already exists in the database
    $stmt = $db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute(array('email' => $email));

    if ($stmt->fetchColumn() > 0) 
        //echo "<script>alert('Email is already used ');</script>";
        // email already exists in the database, display an error message
       $error_message = 'Email already exists';
       //header("Location: ../views/404.php");
      
      
     else {
        // email does not exist, insert it into the database
        // hash the password using bcrypt
        //$hash = password_hash($mdp, PASSWORD_DEFAULT);
       // header("Location:index.php");
        $client = new client($nom, $prenom, $type, $telephone, $adresse, $email, $login, $mdp);
        $clientc = new clientc();
        $clientc->ajouter_client($client);
        // display a success message
        $success_message = 'Client added successfully';
  
    }}


    session_start();
    $db=config::getConnexion();
    if(isset($_SESSION['idclient'])){
       $idclient = $_SESSION['idclient'];
    }else{
       $idclient = '';
    };
    if(isset($_POST['submit'])){

        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_EMAIL);
        $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_EMAIL);
        $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_EMAIL);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_EMAIL);
        $type = filter_var($_POST['type'], FILTER_SANITIZE_EMAIL);
        $login = filter_var($_POST['login'], FILTER_SANITIZE_EMAIL);
        $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_STRING);
    
      $select_user = $db->prepare("SELECT * FROM `user` WHERE email = ?");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);
    
      if($select_user->rowCount() > 0){
        $message[] = 'incorrect username or password!';
        echo "<script>alert('incorrect username or password! ');</script>";
   
         //header('location:.php');
      }else{
         $client = new client($nom, $prenom, $type, $telephone, $adresse, $email, $login, $mdp);
         $clientc = new clientc();
         $clientc->ajouter_client($client);
        // $message[] = 'incorrect username or password!';
         echo "<script>alert('ya rabyy lee! ');</script>";
    
      }
    }*/


?>


