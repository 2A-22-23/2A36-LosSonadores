<?php
include 'C:\xampp\htdocs\t_assurance\config.php';
include 'C:\xampp\htdocs\t_assurance\Model\AssuranceM.php';


class Assurance
{
    public function listAssurances()
    {
        $sql = "SELECT * FROM t_assurance";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
      
    }

    public function updateAssurance($id, $nom, $matricule, $type ,$date,$status,$age)
    {
        $db = config::getConnexion();
       // $sql = "UPDATE t_assurance SET nom_assurance = :nom, matricule_assurance = :matricule, type_assurance = :type ,date_assurance =:date ,status_assurance=:status WHERE id_assurance = :id";
       $sql = "UPDATE t_assurance SET nom_assurance = :nom, matricule_assurance = :matricule, type_assurance = :type, date_assurance = :date, status_assurance = :status ,age_assurance= :age WHERE id_assurance = :id ";

        $query = $db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':matricule', $matricule);
        $query->bindParam(':type', $type);
        $query->bindParam(':date', $date);
        $query->bindParam(':status', $status);
        $query->bindParam(':age', $age);

        $errorMessage = "$id + $nom + $matricule + $type +$date +$status +$age\n";
        error_log($errorMessage, 3, "C:/Users/chino/Desktop/logs.log");
        $query->execute();
        error_log("Assurance updated successfully",3,"C:/Users/chino/Desktop/logs.log");
    }

    function AfficherAssurances($email)
    {
        $sql = "SELECT * FROM t_assurance JOIN user ON t_assurance.id_assurance = user.id_assurance WHERE user.email = :email";
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
    
    function addAssurance($AssuranceM, $email)
    {
        $sql = "insert into t_assurance (nom_assurance,matricule_assurance, type_assurance ,date_assurance ,status_assurance,age_assurance) VALUES (:B, :C, :D ,:E,:F,:A)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
         
            $B = $AssuranceM->getNom();
            $C = $AssuranceM->getMat();
            $D = $AssuranceM->getTypee();
            $E =$AssuranceM->getdate();
            $F =$AssuranceM->getstatus();
            $A =$AssuranceM->getage();

          
            $query->bindValue(':B', $B);
            $query->bindValue(':C', $C);
            $query->bindValue(':D', $D);
            $query->bindValue(':E', $E);
            $query->bindValue(':F', $F);
            $query->bindValue(':A', $A);
            $query->execute();
    
            $assuranceId = $db->lastInsertId();
            $errorMessage = "No rows found in assurance table for id=$assuranceId\n";
            error_log($errorMessage, 3, "C:/Users/chino/Desktop/logs.log");

            $sql = "UPDATE user SET id_assurance = :id_assurance WHERE email = :email";
            $query = $db->prepare($sql);
    
            $query->bindValue(':id_assurance', $assuranceId);
            $query->bindValue(':email', $email);
            $query->execute();
    
            // Print a message to the console
            error_log("Assurance added successfully.");
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function deleteAssurance($id)
    { 
      $db = config::getConnexion();
      $query = $db->prepare("DELETE FROM t_assurance WHERE id_assurance = :id ");
     // $query = $db->prepare("DELETE FROM t_assurance WHERE id_assurance = :id ");
      $query->bindParam(':id', $id);
      $query->execute(); 
      
    }

}
?>