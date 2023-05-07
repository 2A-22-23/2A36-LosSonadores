<?php
if(isset($_POST['date'])) {
  // Sanitize the input to prevent SQL injection attacks
  $search_date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $conn =  new PDO('mysql:host=localhost;dbname=khalil','root', '');

  // Prepare the SQL query
  if(empty($search_date)) {
    $stmt = $conn->prepare("SELECT * FROM ordonnance");
  } else {
    $stmt = $conn->prepare("SELECT * FROM ordonnance WHERE date = :search_date");
    $stmt->bindValue(':search_date', $search_date, PDO::PARAM_STR);
  }
  
  // Execute the query and fetch the results
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  // If no search date is submitted, fetch all records from the database
  $stmt = $conn->prepare("SELECT * FROM ordonnance");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Display the results as HTML using pagination
$records_per_page = 4;
$total_records = count($data);
$total_pages = ceil($total_records / $records_per_page);

if (!isset($_GET['page'])) {
  $current_page = 1;
} else {
  $current_page = $_GET['page'];
}

$offset = ($current_page - 1) * $records_per_page;
$data_page = array_slice($data, $offset, $records_per_page);

foreach ($data_page as $row) {
  echo "<tr>";
  echo "<td>" . $row['ido'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['nom_medicament'] . "</td>";
  echo "<td>" . $row['patient_name'] . "</td>";
  echo "<td>" . $row['nombre_fois'] . "</td>";
  echo "<td>" . $row['doctor_name'] . "</td>";
  echo "<td><form action='delete_ord.php' method='POST'><button type='submit' name='delete' value='" . $row['ido'] . "' class='btn btn-danger'>Delete</button></form></td>";
  echo "</tr>";
}

// Display the pagination links
echo "<nav aria-label='Page navigation'>";
echo "<ul class='pagination justify-content-center'>";
for ($i = 1; $i <= $total_pages; $i++) {
  if ($i == $current_page) {
    echo "<li class='page-item active'><a class='page-link' href='#'>" . $i . "</a></li>";
  } else {
    echo "<li class='page-item'><a class='page-link' href='search_ord.php?page=" . $i . "'>" . $i . "</a></li>";
  }
}
echo "</ul>";
echo "</nav>";

?>