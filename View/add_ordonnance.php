<?php
require '../Controller/crudO.php';

session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "";
}

if (isset($_POST['submit'])) {
    $medical_id = $_POST['medical_id'];
    $medicament = $_POST['medicament'];
    $date = $_POST['date'];
    $per_day = $_POST['per_day'];
    $doctor_name = $_SESSION["username"];
    $pdo = new PDO('mysql:host=localhost;dbname=khalil','root', '');
    $stmt = $pdo->prepare("SELECT patient_name FROM dossier WHERE idd = :medical_id");
    $stmt->execute(array(':medical_id' => $medical_id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $patient_name = $result['patient_name'];
    } else {
        // handle error - patient code not found
    }

    // create new ordonnance object and call add_ordonnance function
    $ord = new ordonnance_officiel();
    $ord->add_ordonnance($date, $medicament, $patient_name, $per_day, $doctor_name,$medical_id);
}
