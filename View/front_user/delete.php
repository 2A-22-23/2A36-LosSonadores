<?php
// Connect to the database
$dbhost = 'localhost';
$dbname = 'khalil';
$dbuser = 'root';
$dbpass = '211JFT9126';
try {
  $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}

// Get the ID of the event to be deleted
$id = $_POST['idr'];
echo $id;



// Delete the event from the database
$sql = "DELETE FROM rendezvous WHERE idr = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Return a JSON response indicating success or failure
if ($stmt->rowCount() > 0) {
  echo json_encode(array('status' => 'success'));
} else {
  echo json_encode(array('status' => 'error', 'message' => 'Unable to delete event'));
}
?>
