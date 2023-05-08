<?php
include "./config.php";

$db = config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    // Prepare and execute the SQL query
    $stmt = $db->prepare("SELECT MIN(plafond_remb) AS min_plafond FROM t_remboursement WHERE code= :code");
    $query->bindValue(':code', $code);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $minPlafond = $result['min_plafond'];

    $query=$db->prepare("SELECT prix FROM historique WHERE code0 = :code");
    $query->bindValue(':code', $code);
    $query->execute();
    $result2 = $query->fetch(PDO::FETCH_ASSOC);
    $prix = $result2['prix'];

    // Send back a JSON response indicating whether the matricule exists or not
    if ($minPlafond == 0 || $minPlafond - $prix <= 0) {
        echo json_encode(['exists' => false]);
    } else  {
        echo json_encode(['exists' => true]);
    }
}
?>