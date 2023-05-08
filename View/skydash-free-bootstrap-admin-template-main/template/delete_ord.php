<?php
// Start the session
session_start();

// Include the database connection code
require 'config.php';

// Establish a database connection
try {
    $conn =  new PDO('mysql:host=localhost;dbname=khalil','root', '211JFT9126');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['message'] = "Connection failed: " . $e->getMessage();
    header("Location: ord.php");
    exit();
}

// Check if the delete button was clicked
if(isset($_POST['delete'])) {
    $ido = $_POST['delete'];
    $sql = "DELETE FROM ordonnance WHERE ido = :ido";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ido', $ido);
    try {
        $stmt->execute();
        $_SESSION['message'] = "Record deleted successfully";
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error deleting record: " . $e->getMessage();
    }
    $conn = null;
    header("Location: ord.php");
    exit();
}
?>
