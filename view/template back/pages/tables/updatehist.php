<?php
// include '../Controller/pharmacieC.php'; // This line is commented out and should be removed if not needed
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/historiqueC.php";


// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');

// Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $idhis = $_POST['idhis'];
    $doctor_name = $_POST['doctor_name'];
    $patient_name = $_POST['patient_name'];
    $prix = $_POST['prix'];
    
    // Requête SQL pour mettre à jour la ligne dans la base de données
    $query = "UPDATE historique SET doctor_name = :doctor_name, patient_name = :patient_name, prix = :prix WHERE idhis = :idhis";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':idhis', $idhis);
    $stmt->bindValue(':doctor_name', $doctor_name);
    $stmt->bindValue(':patient_name', $patient_name);
    $stmt->bindValue(':prix', $prix);
    $stmt->execute();

    // Redirection vers la page de l'historique
    header('Location: basic-table.php');
    exit;
} else {
    // Si la méthode de requête n'est pas POST, on redirige l'utilisateur vers la page de l'historique
    header('Location: basic-table.php');
    exit;
}
?>
