<?php
require 'C:/xampp/htdocs/First_SUII/projet/config.php' ;
$pdo = new PDO('mysql:host=localhost;dbname=khalil','root', '');
$doctor_name = $_POST['doctor_name'];
$stmt = $pdo->prepare("SELECT CIN_patient FROM dossier WHERE doctor_name = ?");
$stmt->execute([$doctor_name]);
$CIN_patients = $stmt->fetchAll(PDO::FETCH_COLUMN);
$options = '';
foreach ($CIN_patients as $CIN_patient) {
  $options .= '<option value="' . $CIN_patient . '">' . $CIN_patient . '</option>';
}
echo $options;
?>