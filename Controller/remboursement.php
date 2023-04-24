<?php
include 'C:\xampp\htdocs\t_assurance\config.php';
include 'C:\xampp\htdocs\t_assurance\Model\remboursementM.php';
include 'C:\xampp\htdocs\t_assurance\Model\AssuranceM.php';


class Remboursement
{
   
    function addRembourement($remboursementm ,$email,$idAssurance)
{
    $sql = "insert into t_remboursement (matricule_remb,pourcentage_remb, age_remb, observation_remb, cota_remb, id_assurance) VALUES (:A,:B, :C, :D, :E,:F)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $A = $remboursementm-> getmatremb();
        $B = $remboursementm->getpourcent();
        $C = $remboursementm->getage();
        $D = $remboursementm->getobservation();
        $E =$remboursementm->getcota();
        $F = $idAssurance;

        
        $query->bindValue(':A', $A);
        $query->bindValue(':B', $B);
        $query->bindValue(':C', $C);
        $query->bindValue(':D', $D);
        $query->bindValue(':E', $E);
        $query->bindValue(':F', $F);
        $query->execute();
       
        // Print a message to the console
        error_log("Assurance added successfully.");
        
        
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

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

public function updateRemboursement($id,$matricule, $pourcentage, $age, $observation,$cota)
{
    $db = config::getConnexion();
    $sql = "UPDATE t_remboursement SET  matricule_remb =:matricule,pourcentage_remb =:pourcentage, age_remb =:age, observation_remb =:observation ,cota_remb =:cota WHERE id_remb =:id";
    $query = $db->prepare($sql);
    $query->bindParam(':id',$id);
    $query->bindParam(':matricule',$matricule);
    $query->bindParam(':pourcentage',$pourcentage);
    $query->bindParam(':age',$age);
    $query->bindParam(':observation',$observation);
    $query->bindParam(':cota',$cota);
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