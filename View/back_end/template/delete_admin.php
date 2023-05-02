<?php
// Start the session
session_start();

// Include the database connection code
require 'config.php';

// Establish a database connection
try {
    $conn =  new PDO('mysql:host=localhost;dbname=khalil','root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['message'] = "Connection failed: " . $e->getMessage();
    header("Location: medical.php");
    exit();
}

// Check if the delete button was clicked
if(isset($_POST['delete'])) {
    $idd = $_POST['delete'];
    $sql = "DELETE FROM dossier WHERE idd = :idd";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idd', $idd);
    try {
        $stmt->execute();
        $_SESSION['message'] = "Record deleted successfully";
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error deleting record: " . $e->getMessage();
    }
    $conn = null;
    header("Location: medical.php");
    exit();
}
?>
