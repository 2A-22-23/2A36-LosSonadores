<?php 
require 'C:\xampp\htdocs\t_assurance\Controller\remboursement.php' ;
if (isset($_POST['idbutton'])) {
  $matricule_remb = $_POST['matricule_remb'];
  $pourcentage_remb = $_POST['pourcentage_remb'];
  $age_remb = $_POST['age_remb'];
  $observation_remb = $_POST['observation_remb'];
  $cota_remb = $_POST['cota_remb'];
  $email =$_POST['email'];
  $idAssurance = $_POST['idAssurance'];
 
 

  $remboursementm = new remboursementM( $matricule_remb ,$pourcentage_remb, $age_remb, $observation_remb ,$cota_remb);
  $remboursement = new Remboursement();
  $remboursement->addRembourement($remboursementm,$email,$idAssurance);
  header('location:AfficherRemboursement.php?email=' . $email);
}
 
 ?>