<?php
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/clientc.php";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

if(isset($_POST['enter'])){

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_STRING);

  $select_user = $db->prepare("SELECT * FROM user WHERE email = ? AND mdp = ?");
  $select_user->execute([$email, $mdp]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

  if($select_user->rowCount() > 0){
     $_SESSION['idclient'] = $row['idclient'];
     if ($row['type'] == 'Patient') {
      header('location:patient.php');
    } else if ($row['type'] == 'Pharmacist') {
      header('location:pharmacie.php');
    }
  }else{
     $message[] = 'incorrect username or password!';
     echo "<script>alert('incorrect username or password! ');</script>";

  }

}?>