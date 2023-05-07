<?php
include "./config.php";

$db = config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule_remb = $_POST['matricule_remb'];

    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM t_remboursement WHERE matricule_remb=:matricule_remb');
    $stmt->bindParam(':matricule_remb', $matricule_remb);
    $stmt->execute();
    $result = $stmt->fetchAll();
    

    // Send back a JSON response indicating whether the matricule exists or not
    if (count($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
?>