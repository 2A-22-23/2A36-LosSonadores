<?php
include "./config.php";

$db = config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule_assurance = $_POST['matricule_assurance'];

    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM t_assurance WHERE matricule_assurance=:matricule_assurance');
    $stmt->bindParam(':matricule_assurance', $matricule_assurance);
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