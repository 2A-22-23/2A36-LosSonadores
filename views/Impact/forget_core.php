<?php

require_once "C:/xampp/htdocs/tojrab03/controller/clientc.php";


require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/PHPMailer.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/SMTP.php');
require_once('C:/xampp/htdocs/tojrab03/PHPMailer-master/src/Exception.php');
date_default_timezone_set('Etc/UTC');


use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;

session_start();

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

if(isset($_POST['email']) && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg="";
    $db = config::getConnexion();
    
    //using prepared statements to prevent SQL injection attacks
    $stmt = $db->prepare("SELECT idclient FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $row = $stmt->fetch();
    
    if (!empty($row)) {
        // generate a random password
        $new_pwd = generateRandomPassword();
          $mdp_hash = password_hash($new_pwd, PASSWORD_DEFAULT);
        // update the password in the database
        $stmt2 = $db->prepare("UPDATE user SET mdp = :mdp WHERE idclient = :idclient");
        $stmt2->bindParam(':mdp',  $mdp_hash);
        $stmt2->bindParam(':idclient', $row['idclient']);
        $stmt2->execute();
        
        // send an email to the user with the new password
        sendEmail($email, $new_pwd);
      
        header('Location:login.php'); //redirecting to the login page with a success message if the password reset is successful
        echo "<script>alert('Check you mail for your new password');</script>";
        $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";

    } else {
       header('Location:forget_pass.php?error=email_not_found'); //redirecting to the forget password page with an error message if the email is not found in the database
       $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";

    }
} else {
    header('Location:forget_pass.php'); //redirecting to the forget password page if the email field is missing
}

function generateRandomPassword() {
    // generate a random string of 8 characters
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $new_pwd = substr(str_shuffle($chars), 0, 8);
   // $mdp_hash = password_hash($new_pwd, PASSWORD_DEFAULT);

    return $new_pwd;
}

function sendEmail($email, $new_pwd) {
    // create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'balsemzakraouii@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 'slmxczhyddawzqjt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('noreply@vitalia.com', 'Vitalia Support');     //Set who the message is to be sent from
        $mail->addAddress($email);                                  //Set who the message is to be sent to

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Password reset request';
        $mail->Body = '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Password Reset Request - Vitalia</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            color: #333;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                        }
                        h1 {
                            font-size: 24px;
                            margin-top: 0;
                            color: #45b69c;
                        }
                        p {
                            margin-bottom: 20px;
                        }
                        strong {
                            color: #45b69c;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>Password Reset Request - Vitalia</h1>
                        <p>Your new password is: <strong>' . $new_pwd . '</strong></p>
                    </div>
                </body>
            </html>
        ';

        // send the email
        $mail->send();

        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



?>
