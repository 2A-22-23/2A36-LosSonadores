<?php
include "../config.php";
$db = config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM user WHERE email=:email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // Send back a JSON response indicating whether the username exists or not
    if (count($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
?>