<?php
// include '../Controller/pharmacieC.php'; // This line is commented out and should be removed if not needed
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php";


// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');

// Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $idphar = $_POST['idphar'];
    $Name = $_POST['Name'];
    $ville = $_POST['ville'];
    $address = $_POST['address'];
   
    
    // Requête SQL pour mettre à jour la ligne dans la base de données
    $query = "UPDATE pharmacie SET Name = :Name, ville = :ville, address = :address WHERE idphar = :idphar";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':idphar', $idphar);
    $stmt->bindValue(':Name', $Name);
    $stmt->bindValue(':ville', $ville);
    $stmt->bindValue(':address', $address);
 
    $stmt->execute();

    // Redirection vers la page de l'pharmacie
    header('Location: basic_elements.php');
    exit;
} else {
    // Si la méthode de requête n'est pas POST, on redirige l'utilisateur vers la page de pharmacie
    header('Location: basic_elements.php');
    exit;
}
?>
