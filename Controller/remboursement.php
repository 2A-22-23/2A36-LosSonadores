<?php
include 'C:\xampp\htdocs\First_SUII\projet\config.php';
include 'C:\xampp\htdocs\First_SUII\projet\Model\remboursementM.php';
include 'C:\xampp\htdocs\First_SUII\projet\Model\AssuranceM.php';
date_default_timezone_set('Etc/UTC');

require_once 'C:\xampp\htdocs\First_SUII\projet\View\front_user\PHPMailer-master\src\PHPMailer.php' ;
require_once 'C:\xampp\htdocs\First_SUII\projet\View\front_user\PHPMailer-master\src\SMTP.php' ;
require_once 'C:\xampp\htdocs\First_SUII\projet\View\front_user\PHPMailer-master\src\Exception.php' ;

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;

class Remboursement
{  
    function addRembourement($remboursementm, $email, $idAssurance,$code)
{   
    $db = config::getConnexion();
    
    try {
        // Récupérer l'âge de l'assuré à partir de la table d'assurance
        $query = $db->prepare("SELECT age_assurance FROM t_assurance WHERE id_assurance = :id_assurance");
        $query->bindValue(':id_assurance', $idAssurance);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $age = $result['age_assurance'];

        // Calculer le plafond en fonction de l'âge
        $plafond = 0;
        if ($age >= 18 && $age <= 25) {
            $plafond = 1500;
        } else if ($age > 25 && $age <= 30) {
            $plafond = 2500;
        } else if ($age > 30) {
            $plafond = 4000;
        }
        
        $query=$db->prepare("SELECT prix FROM historique WHERE code0 = :code");
        $query->bindValue(':code', $code);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $prix = $result['prix'];
        
        // Insérer le remboursement dans la table t_remboursement
        $sql = "INSERT INTO t_remboursement (matricule_remb, pourcentage_remb, plafond_remb, observation_remb, cota_remb, date_remb, id_assurance ,code) VALUES (:A, :B, :P, :D, :E, :Da, :F ,:C)";
        $query = $db->prepare($sql);
        $A = $remboursementm->getmatremb();
        $B = $remboursementm->getpourcent();
        $D = $remboursementm->getobservation();
        $K =$prix;
        $E =  (($K* $B *15)/100) ;
        $C = $code;
        $Da = $remboursementm->getdate();
        $F = $idAssurance;
        $query->bindValue(':A', $A);
        $query->bindValue(':B', $B);
        $query->bindValue(':P', $plafond);
        $query->bindValue(':D', $D);
        $query->bindValue(':E', $E);
        $query->bindValue(':Da', $Da);
        $query->bindValue(':F', $F);
        $query->bindValue(':C', $C);
        
        $query->execute();
        //mise a jour 
        // Execute the UPDATE statement
$sql = "UPDATE t_remboursement SET plafond_remb = plafond_remb - :E WHERE id_assurance = :F";
$query = $db->prepare($sql);
$query->bindValue(':E', $E);
$query->bindValue(':F', $F);
$query->execute();

// Execute the SELECT statement to retrieve the updated value
$sql = "SELECT plafond_remb FROM t_remboursement WHERE id_assurance = :F";
$query = $db->prepare($sql);
$query->bindValue(':F', $F);
$query->execute();
$new = $query->fetchColumn();

        
        // Afficher un message de confirmation
        error_log("Remboursement ajouté avec succès.");
     
        var_dump($age);
        
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    $mail = new PHPMailer(true); 
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
       
        $mail->Username = 'jooanas909@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 'vzoncazouiyvdrkv'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;
    
        //Recipients
        $mail->setFrom('noreply@vitalia.com', 'Vitalia Support');     //Set who the message is to be sent from
        $mail->addAddress($email);                                  //Set who the message is to be sent to
    
        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Ceiling reimbursement ';
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
                        <h1>Romborsement plafont - Vitalia</h1>
                        <p>price of medecine after reduction : <strong>' .  $E. '</strong></p>
                        <p>highest amont of money : <strong>' .  $new. '</strong></p>
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
      header('location:AfficherRemboursement.php?email=' . $email);
}

/*function addRembourement($remboursementm ,$email,$idAssurance,$age)
{   

    $sql = "insert into t_remboursement (matricule_remb,pourcentage_remb,plafond_remb, observation_remb, cota_remb,date_remb , id_assurance ) VALUES (:A,:B,:P, :D, :E,:Da,:F)";
    $db = config::getConnexion();
    try {
       
        $plafond=10;
        if ($age >= 18 && $age <= 25) {
            $plafond = 1500;
        } else if ($age > 25 && $age <= 30) {
            $plafond = 2500;
        } else if ($age > 30) {
            $plafond = 4000;
        }
        $query = $db->prepare($sql);
        $A = $remboursementm-> getmatremb();
        $B = $remboursementm->getpourcent();
        $P = $plafond;
        $D = $remboursementm->getobservation();
        $E =$remboursementm->getcota();
        $Da =$remboursementm->getdate();
        $F = $idAssurance;
        

        
        $query->bindValue(':A', $A);
        $query->bindValue(':B', $B);
        $query->bindValue(':P', $P);
        $query->bindValue(':D', $D);
        $query->bindValue(':E', $E);
        $query->bindValue(':Da', $Da);
        $query->bindValue(':F', $F);
       
        $query->execute();
       
        // Print a message to the console
        error_log("Assurance added successfully.");
     
    var_dump($age);
        
        
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}   

/*function addRembourement($remboursementm, $email, $idAssurance, $age)
{
    $plafond = 0;
    if ($age >= 18 && $age <= 25) {
        $plafond = 1500;
    } else if ($age > 25 && $age <= 30) {
        $plafond = 2500;
    } else if ($age > 30) {
        $plafond = 4000;
    }

    $cota = $plafond - $remboursementm->getcota();

    $sql = "INSERT INTO t_remboursement (matricule_remb, pourcentage_remb,plafond_remb, observation_remb, cota_remb, date_remb, id_assurance) VALUES (:A, :B,:P, :D, :E, :Da, :F)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $A = $remboursementm->getmatremb();
        $B = $remboursementm->getpourcent();
        $P = $plafond;
        $D = $remboursementm->getobservation();
        $E = $remboursementm->getcota();
        $Da = $remboursementm->getdate();
        $F = $idAssurance;

        $query->bindValue(':A', $A);
        $query->bindValue(':B', $B);
        $query->bindValue(':P', $P);
        $query->bindValue(':D', $D);
        $query->bindValue(':E', $E);
        $query->bindValue(':Da', $Da);
        $query->bindValue(':F', $F);
        $query->execute();

        // Print a message to the console
        error_log("Assurance added successfully.");
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}*/


function AfficherRemboursement($email)
{
    $sql = "SELECT * FROM t_remboursement JOIN user ON t_remboursement.id_assurance = user.id_assurance  WHERE user.email = :email";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $aff = $query->fetchAll(PDO::FETCH_ASSOC);
        return $aff;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}  

public function updateRemboursement($id,$matricule, $pourcentage, $observation,$cota ,$date)
{
    $db = config::getConnexion();
    $sql = "UPDATE t_remboursement SET  matricule_remb =:matricule,pourcentage_remb =:pourcentage, observation_remb =:observation ,cota_remb =:cota  , date_remb =:date WHERE id_remb =:id";
    $query = $db->prepare($sql);
    $query->bindParam(':id',$id);
    $query->bindParam(':matricule',$matricule);
    $query->bindParam(':pourcentage',$pourcentage);
    $query->bindParam(':observation',$observation);
    $query->bindParam(':cota',$cota);
    $query->bindParam(':date',$date);
    $query->execute();
    
}

function deleteRemboursement($id)
{ 
  $db = config::getConnexion();
  $query = $db->prepare("DELETE FROM t_remboursement WHERE id_remb = :id ");
  $query->bindParam(':id', $id);
  $query->execute(); 
  
}

}
?>