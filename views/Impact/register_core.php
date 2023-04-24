<?php

/*include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

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





        header("Location:login.php");
    
}*/




include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

$db=config::getConnexion();


require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/PHPMailer.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/SMTP.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/Exception.php');
date_default_timezone_set('Etc/UTC');


use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;


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
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   

   $mdp = $_POST['mdp'];
   $code = $db->quote(md5(rand()));
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
  
   $login = $_POST['login'];
   $login = filter_var($login, FILTER_SANITIZE_STRING);
  
   
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
  $image = $_POST['image'];
    // Handle image upload
  
  
     $client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp,$image,$code);
        $clientc = new clientc();
        
        $clientc->ajouter_client($client);

         echo "<div style='display: none;'>";
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
              //Server settings
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
              var_dump($mail);                    //Enable verbose debug output

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'balsemzakraouii@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 'slmxczhyddawzqjt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;

          
             //Recipients
             $mail->setFrom('balsemzakraouii@gmail.com');
             $mail->addAddress($email);

             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'no reply';
             $mail->Body    = 'Here is the verification link <b><a href=http://localhost/tojrab03/views/Impact/verif.php?verification='.$code.'">http://localhost/tojrab03/views/Impact/login.php?verification='.$code.'</a></b>';

             $mail->send();
             echo 'Message has been sent';
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
         echo "</div>";
         $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
     }
     
    



        //header("Location:login.php");
    
