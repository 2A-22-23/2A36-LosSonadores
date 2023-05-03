<?php 
require 'C:\xampp\htdocs\t_assurance\Controller\Assurance.php' ;
if (isset($_POST['idbutton'])) {
  $nom_assurance = $_POST['nom_assurance'];
  $matricule_assurance = $_POST['matricule_assurance'];
  $type_assurance = $_POST['type_assurance'];
  $date_assurance = $_POST['date_assurance'];
  $status_assurance = $_POST['status_assurance'];
  $age_assurance = $_POST['age_assurance'];
  $email = $_POST['email'];
 
 

  $assurancem = new AssuranceM( $nom_assurance, $matricule_assurance, $type_assurance ,$date_assurance , $status_assurance , $age_assurance);
    
  $assurance = new Assurance();
  $assurance->addAssurance($assurancem,$email);
  header('location:verification.php');
}
?>