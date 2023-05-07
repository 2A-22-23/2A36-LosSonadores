<?php
require 'C:/xampp/htdocs/First_SUII/projet/config.php';
session_start();
$db = config::getConnexion();

if (isset($_SESSION['idclient'])) {
   $idclient = $_SESSION['idclient'];
} else {
   $idclient = '';
}

$select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
$select_profile->execute([$idclient]);

if ($select_profile->rowCount() > 0) {
   $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   if (isset($fetch_profile)) {
      $username = $fetch_profile["login"];
      $_SESSION["username"] = $username;
   }
   echo "";
} else {
   echo "ghalet";
}
$stmt = $db->prepare("SELECT ido , patient_name FROM ordonnance WHERE doctor_name = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($patients);

?>
