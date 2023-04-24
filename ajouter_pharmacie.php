<?php


// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');

if (isset($_POST['Name']) && isset($_POST['ville']) && isset($_POST['address'])) {
    // Vérification si la pharmacie existe déjà
    $stmt = $db->prepare('SELECT * FROM pharmacie WHERE Name = :Name AND ville = :ville AND address = :address');
    $stmt->execute(array('Name' => $_POST['Name'], 'ville' => $_POST['ville'], 'address' => $_POST['address']));
    $existingPharmacie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingPharmacie !== false) {
        // La pharmacie existe déjà, on redirige vers la page contenant ses informations
        header("Location: blog-details.php?idphar={$existingPharmacie['idphar']}");
        exit();
    } else {
        // Insertion de la nouvelle pharmacie
        $stmt = $db->prepare('INSERT INTO pharmacie (Name, address, ville) VALUES (:Name, :address, :ville)');
        $stmt->execute(array('Name' => $_POST['Name'], 'address' => $_POST['address'], 'ville' => $_POST['ville']));
        $pharmacie_id = $db->lastInsertId(); // Récupération de l'ID de la nouvelle pharmacie

        if ($pharmacie_id !== false) {
            // Redirection vers la page contenant les informations de la pharmacie
         
            echo "<script>window.location.href='blog-details.php?idphar=$pharmacie_id';</script>";
               echo "<script>alert('Pharmacie ajoutée avec succès!');</script>";
            exit;
        } else {
            header('Location: blog2.php');
            exit();
        }
    }
} else {
    header('Location: blog2.php');
    exit();
}
?>
