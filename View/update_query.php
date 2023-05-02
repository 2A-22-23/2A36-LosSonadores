<?php
$pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');

if (isset($_POST['search'])) {
  $idd = $_POST['idd'];
  $phone_number = $_POST['phone_number'];
  $weight = $_POST['weight'];
  $heigth = $_POST['heigth'];
  $medical_history = $_POST['medical_history'];

  $stmt = $pdo->prepare("UPDATE dossier SET phone_number=?,weightt=?, heigth=?, medical_history=? WHERE idd =:idd");
  $stmt->execute([$phone_number,$weight,$heigth,$medical_history]);

  // Check if update was successful
  if ($stmt->rowCount() >0) {
    echo "<script>alert('Medical record modified successfully.');window.history.back();</script>";
  } else {
    echo "<script>alert('Error Modifying medical record.');window.history.back();</script>";
  }
}
?>
