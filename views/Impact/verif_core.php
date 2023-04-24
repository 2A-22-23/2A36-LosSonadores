<?php
session_start();
include "C:/xampp/htdocs/tojrab03/controller/clientc.php";
require_once "C:/xampp/htdocs/tojrab03/controller/clientc.php";


require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/PHPMailer.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/SMTP.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/Exception.php');
date_default_timezone_set('Etc/UTC');


use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

if (isset($_POST['submit'])) {
    // Get the user's email address from the form
    $email = $_POST['email'];

    // Generate a random verification code
    $verification_code = mt_rand(100000, 999999);

    // Store the verification code and 'verif' attribute in the database along with the user's registration details
    // ...

    // Send an email to the user with a link to confirm their email address
    $to = $email;
    $subject = 'Please confirm your email address';
    $message = "Dear ,<br><br>Please click on the following link to confirm your email address:<br><br>";
    $message .= "<a href='https://example.com/verify-email.php?code=$verification_code'>Verify Email</a><br><br>";
    $message .= "Thank you,<br>The Vitalia Team";

    $headers = "From: noreply@vitalia.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    echo "An email has been sent to your email address. Please click on the verification link to complete the registration process.";
}
?>