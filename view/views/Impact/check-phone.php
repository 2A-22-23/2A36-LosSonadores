<?php
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/clientc.php";

$db=config::getConnexion();




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telephone = $_POST['telephone'];

    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM user WHERE telephone=:telephone');
    $stmt->bindParam(':telephone', $telephone);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // Send back a JSON response indicating whether the username exists or not
    if (count($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
