<?php
include "C:\xampp\htdocs\First_SUII\projet\config.php";
$db = config::getConnexion();

if (isset($_POST['enter'])) {
($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    // Prepare and execute the SQL query
    $stmt = $db->prepare('SELECT * FROM user WHERE email=:email');
    $stmt->bindParam(':email', $email);
   // var_dump().die(); hedhi bch nverifi biha ken tekhdem wale 
    $stmt->execute([$email]);
    $result = $stmt->fetchColumn();

    // Send back a JSON response indicating whether the username exists or not
    if (count($result) > 0) {
        echo "<script>alert('Patient with name already has a medical record'); window.history.back();</script>";
      //  echo json_encode(['exists' => true]);
    } 
    else {
        echo "<script>alert('Patient with name already ghalta has a medical record'); window.history.back();</script>";
        //echo json_encode(['exists' => false]);
    }
}
}
?>