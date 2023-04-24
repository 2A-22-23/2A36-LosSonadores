<?php
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/clientc.php";
$db=config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];

    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM user WHERE login=:login');
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // Send back a JSON response indicating whether the username exists or not
    if (count($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
