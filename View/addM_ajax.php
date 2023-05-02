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
$pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
$stmt = $pdo->prepare("SELECT idclient FROM rendezvous  WHERE iddoc = (SELECT idclient FROM user WHERE login = :username) AND status = 1");
$stmt->execute(array(':username' => $username));
$idclients = $stmt->fetchAll(PDO::FETCH_ASSOC);

$patients = array();
foreach ($idclients as $idclient) {
    $stmt = $pdo->prepare("SELECT code0 FROM user WHERE idclient = :idclient AND type = 'Patient'");
    $stmt->execute(array(':idclient' => $idclient['idclient']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $patients[] = $result;
    }
}
echo json_encode($patients);
?>