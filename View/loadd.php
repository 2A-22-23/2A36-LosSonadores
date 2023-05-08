<?php
include 'C:\xampp\htdocs\First_SUII\projet\Controller\RendezVousC.php';
session_start();
//load.php

$dsn = 'mysql:host=localhost;dbname=khalil';
$username = 'root';
$password = '211JFT9126';

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$data = array();

// Récupérer l'ID client connecté depuis la session
$idclient = $_SESSION['idclient'];

// Requête SQL pour sélectionner les rendez-vous du client connecté
$query = "SELECT idr, LaDate,title, idclient FROM rendezvous WHERE iddoc=:idclient ORDER BY idr";
$statement = $pdo->prepare($query);
$statement->bindValue(':idclient', $idclient);
$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
    $data[] = array(
        'idr' => $row["idr"],
        'title' => $row["title"],
        'start' => $row["LaDate"],
        'idr' => $row['idr'] // add the idr attribute
        
    );
}

echo json_encode($data);
?>
