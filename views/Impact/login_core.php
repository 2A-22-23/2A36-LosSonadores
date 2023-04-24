<?php
//include "C:/xampp/htdocs/tojrab03/controller/clientc.php";
//include "../views/skydash-free-bootstrap-admin-template-main/template/index.php";
$msg="";

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
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

$msg = "";


if(isset($_POST['enter'])){
    // Verify the reCAPTCHA response
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = "6LeoF5IlAAAAAKxgHyUVY11k7BuO48qpXCZtJ0sz";
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = array(
        "secret" => $secretKey,
        "response" => $recaptchaResponse
    );
    $options = array(
        "http" => array(
            "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    if($response->success){
        // The reCAPTCHA verification succeeded, process the login request
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT idclient, mdp ,verif FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && password_verify($mdp, $row['mdp']) && $row['verif'] == 1) {           
            $_SESSION['idclient'] = $row['idclient'];         
            header('location:home.php');     
        } else if($email=="adminvitalia@gmail.com" && $mdp == "wiem") {
            header('location:../skydash-free-bootstrap-admin-template-main/template/back.php'); }
            else if    ($row['verif'] == 0) 
            {
                echo "<script>alert('Please verify that your account !');</script>";
            }
        } else {
            echo "<script>alert('Please verify that you have put the right email and password');</script>";
        }
    } else {
        // The reCAPTCHA verification failed, show an error message
        echo "<script>alert('Please verify that you are not a robot!');</script>";
    }



?>
