<?php
include 'C:\xampp\htdocs\First_SUII\projet\Controller\RendezVousC.php';


    $id = $_GET['idr'];
    $rendezvous = new RendezVousC();
    $result = $rendezvous->deleteRendezvous($id);

    header('Location: ListRendezVous.php');

?>
