<?php
// update.php

// get the ID and new title from the POST data
$id = $_POST['idr'];
$title = $_POST['title'];

// create a new PDO instance
$pdo = new PDO('mysql:host=localhost;dbname=mabase', 'root', '211JFT9126');

// prepare the SQL statement
$stmt = $pdo->prepare("UPDATE rendezvous SET title = :title WHERE idr = :id");

// execute the statement with the ID and new title values
$stmt->execute(['title' => $title, 'idr' => $id]);

// send a JSON response indicating success or failure
if ($stmt->rowCount() > 0) {
    echo json_encode(['status' => 'success', 'message' => 'Event updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unable to update event.']);
}
?>
