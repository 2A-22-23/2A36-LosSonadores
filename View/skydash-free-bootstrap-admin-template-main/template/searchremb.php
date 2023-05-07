<?php

// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');

// Get search query
$query = $_POST['query'];

// Prepare and execute SQL query
$stmt = $pdo->prepare("SELECT * FROM t_remboursement WHERE matricule_remb LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();

// Generate HTML table rows for search results
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
  echo '<tr>';
  echo '<td>' . $row['id_remb'] . '</td>';
  echo '<td>' . $row['matricule_remb'] . '</td>';
  echo '<td>' . $row['pourcentage_remb'] . '</td>';
  echo '<td>' . $row['observation_remb'] . '</td>';
  echo '<td>' . $row['cota_remb'] . '</td>';
  echo '<td>' . $row['date_remb'] . '</td>';
  echo '<td>' . $row['action'] . '</td>';
  echo '</tr>';
}

?>