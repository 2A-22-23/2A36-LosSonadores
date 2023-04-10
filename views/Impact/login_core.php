<?php
//include "C:/xampp/htdocs/tojrab03/controller/clientc.php";
//include "../views/skydash-free-bootstrap-admin-template-main/template/index.php";


/*$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

/*if(isset($_POST['enter'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
 
   $mdp =$_POST['mdp'];
   //$mdp=md5($mdp);
  $select_user = $db->prepare("SELECT * FROM `user` WHERE email = ? AND mdp = ?");
  $select_user->execute([$email, $mdp]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

  if($select_user->rowCount() > 0){
     $_SESSION['idclient'] = $row['idclient'];
     header('location:home.php');
  }

  else if($email == "adminvitalia@gmail.com" && $mdp == "wiem"){
   $_SESSION['idclient'] = 1;
  header('location:../skydash-free-bootstrap-admin-template-main/template/back.php');
echo "<script>alert('welcome admin ');</script>";}
else{
     $message[] = 'incorrect email or password!';
     echo "<script>alert('incorrect email or password! ');</script>";
  }


}*/



include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

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
     header('location:home.php');
  }
  else if($email == "adminvitalia@gmail.com" && $mdp == "wiem")
  {
   header('location:../skydash-free-bootstrap-admin-template-main/template/back.php');
   echo "<script>alert('welcome admin ');</script>";

  }
  else{
     $message[] = 'incorrect username or password!';
     echo "<script>alert('incorrect username or password! ');</script>";

  }

}