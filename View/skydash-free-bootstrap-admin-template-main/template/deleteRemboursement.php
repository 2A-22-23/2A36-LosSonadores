<?php
include 'C:\xampp\htdocs\First_SUII\projet\Controller\remboursement.php';


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $Remboursements = new Remboursement();
    $Remboursements->deleteRemboursement($id); // Call the deleteAssurance function with the ID of the record to delete
    header('Location: remboursement.php');
    exit();
  }

?>
