<?php
require '../config.php';
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;
require_once __DIR__ . '/vendor/autoload.php';


class dossier_medical {

  public static function add_medical_record($patient_name, $phone_number, $birth_date, $weight, $height, $doctor_name, $medical_history, $sexe)
  {
      $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
  
      $stmt = $pdo->prepare('SELECT COUNT(*) FROM dossier WHERE patient_name = ?');
      $stmt->execute([$patient_name]);
      $count_rows = $stmt->fetchColumn();
      if ($count_rows > 0) {
          echo "<script>alert('Patient with name $patient_name already has a medical record'); window.history.back();</script>";
      } else {
          $stmt = $pdo->prepare('INSERT INTO dossier (patient_name, phone_number, weightt, heigth, doctor_name, medical_history, birth_date, sexe) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
          $stmt->bindParam(1, $patient_name);
          $stmt->bindParam(2, $phone_number);
          $stmt->bindParam(3, $weight);
          $stmt->bindParam(4, $height);
          $stmt->bindParam(5, $doctor_name);
          $stmt->bindParam(6, $medical_history);
          $stmt->bindParam(7, $birth_date);
          $stmt->bindParam(8, $sexe);
          $stmt->execute();
          $stmt = $pdo->prepare('SELECT code0,email FROM user WHERE login = ?');
          $stmt->bindParam(1, $patient_name);
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $patient_code0 = $result['code0'];
          $email = $result['email'];
          $mail = new PHPMailer(true);

         try {
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->isSMTP();                                            
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'khalilbouazizi95@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 'icrgcihsmgfzffmv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;
             $mail->setFrom('khalilbouaiziz95@gmail.com');
             $mail->addAddress($email);
             $mail->isHTML(true);                               
             $mail->Subject = 'Medical record verification';
             $mail->Body = 'Here is your code to view your medical record ' . $patient_code0;
             $mail->send();
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
          echo "<script>alert('Medical record added and sms mail to $patient_name'); window.history.back();</script>";
        }
    }

public static function delete_medical_record($idd)
{
    $pdo = new PDO('mysql:host=localhost;dbname=khalil','root', '');
    $query = $pdo->prepare("DELETE dossier FROM dossier LEFT JOIN ordonnance ON dossier.idd = ordonnance.id_dossier WHERE dossier.idd = :idd");
    if ($query->execute(array(':idd' => $idd))) {
        if ($query->rowCount() > 0) {
            echo "<script>alert('Medical record deleted successfully.'); window.history.back();</script>";
        } else {
            echo "<script>alert('No matching medical record found.'); window.history.back();</script>";
        }
    }
    else {
        echo "<script>alert('Error deleting medical record.'); window.history.back();</script>";
}
}
}