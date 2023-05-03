<?php 
require 'C:\xampp\htdocs\t_assurance\Controller\remboursement.php' ;




if (isset($_POST['idbutton'])) {
  $matricule_remb = $_POST['matricule_remb'];
  $pourcentage_remb = $_POST['pourcentage_remb'];
  $observation_remb = $_POST['observation_remb'];
  $code = $_POST['code'];
  $date_remb = $_POST['date_remb'];
  $email =$_POST['email'];
  $idAssurance = $_POST['idAssurance'];
  $age= $_POST['age'];

  $db = config::getConnexion();
  $query = $db->prepare("SELECT plafond_remb FROM t_remboursement WHERE code= :code AND id_assurance = :id_assurance");
  $query->bindValue(':code', $code);
  $query->bindValue(':id_assurance', $idAssurance);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $plafond_remb = $result['plafond_remb'];
  
  $db1 = config::getConnexion();
  $query1 = $db1->prepare("SELECT cota_remb FROM t_remboursement WHERE code= :code  AND id_assurance = :id_assurance");
  $query1->bindValue(':code', $code);
  $query1->bindValue(':id_assurance', $idAssurance);
  $query1->execute();
  $result = $query1->fetch(PDO::FETCH_ASSOC);
  $cota_remb = $result['cota_remb'];
 

 
  $remboursementm = new remboursementM( $matricule_remb ,$pourcentage_remb, $observation_remb ,$date_remb);
  $remboursement = new Remboursement();
  $remboursement->addRembourement($remboursementm,$email,$idAssurance,$code);
// create a new PHPMailer instance

}
 
 ?>