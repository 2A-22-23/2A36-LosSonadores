<?php
include '../Controller/RendezVousC.php';


    $id = $_GET['idr'];
    $rendezvous = new RendezVousC();
    $result = $rendezvous->deleteRendezvous($id);

    header('Location: ViewMyAPP.php');

?>
