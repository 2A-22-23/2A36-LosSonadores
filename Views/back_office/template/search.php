<?php

// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=vitaliaa', 'root', '');

// Get search query
$query = $_POST['query'];

// Prepare and execute SQL query
$stmt = $pdo->prepare("SELECT * FROM t_assurance WHERE id_assurance LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();

// Generate HTML table rows for search results
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
  echo '<tr>';
  echo '<td>' . $row['id_assurance'] . '</td>';
  echo '<td>' . $row['nom_assurance'] . '</td>';
  echo '<td>' . $row['matricule_assurance'] . '</td>';
  echo '<td>' . $row['type_assurance'] . '</td>';
  echo '<td>' . $row['date_assurance'] . '</td>';
  echo '<td>' . $row['status_assurance'] . '</td>';
  echo '<td>' . $row['age_assurance'] . '</td>';
  echo '<td>' . $row['action'] . '</td>';
  echo '</tr>';
}


?>