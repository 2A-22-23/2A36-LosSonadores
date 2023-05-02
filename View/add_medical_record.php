<?php
require '../Controller/crud.php';

session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "";
}
if (isset($_POST['submit'])) {
    $patient_code = $_POST['patient_code'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $doctor_name = $_SESSION["username"];
    $medical_history = $_POST['medical_history'];
    $sexe = $_POST['sexe'];
    $pdo = new PDO('mysql:host=localhost;dbname=khalil','root', '');
    $stmt = $pdo->prepare("SELECT login FROM user WHERE code0 = :patient_code AND type = 'Patient'");
    $stmt->execute(array(':patient_code' => $patient_code));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $patient_name = $result['login'];
    } else {
        echo "<script>alert('error !!'); window.history.back();</script>";
    }
    $dossier1 = new dossier_medical();
    $dossier1->add_medical_record($patient_name, $phone_number, $birth_date, $weight, $height, $doctor_name, $medical_history,$sexe);
}
?>
