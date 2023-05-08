<?php

require_once "C:/xampp/htdocs/FIRST_SUII/projet/View/tojrab03/controller/clientc.php";


require_once('C:/xampp/htdocs/FIRST_SUII/projet/Viewt/ojrab03/PHPMailer-master/src/PHPMailer.php');
require_once('C:/xampp/htdocs/FIRST_SUII/projet/View/tojrab03/PHPMailer-master/src/SMTP.php');
require_once('C:/xampp/htdocs/FIRST_SUII/projet/View/tojrab03/PHPMailer-master/src/Exception.php');
date_default_timezone_set('Etc/UTC');


use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;



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
    $mail->addAddress('zakraouiwiem@gmail.com');                                  //Set who the message is to be sent to

    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Verification - vitalia';
    $mail->Body = '
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Verificaton - Vitalia</title>
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
         
            <form id="registration-form" action="C:\xampp\htdocs\FIRST_SUII\projet\View\Impact\verif_core.php" method="post"  >
            <div class="button input-box">
            <input type="submit"  value="register now" name="submit" id="submit-button">
            </div>
            </forum>


            </body>
        </html>
    ';

    // send the email
    $mail->send();

    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}






?>