<?php
if(isset($_POST['date'])) {
  $search_date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $conn =  new PDO('mysql:host=localhost;dbname=khalil','root', '');

  if(empty($search_date)) {
    $stmt = $conn->prepare("SELECT * FROM dossier");
  } else {
    $stmt = $conn->prepare("SELECT * FROM dossier WHERE birth_date = :search_date");
    $stmt->bindValue(':search_date', $search_date, PDO::PARAM_STR);
  }
    $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $stmt = $conn->prepare("SELECT * FROM dossier");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
  echo "<td>" . $row['idd'] . "</td>";
  echo "<td>" . $row['patient_name'] . "</td>";
  echo "<td>" . $row['phone_number'] . "</td>";
  echo "<td>" . $row['birth_date'] . "</td>";
  echo "<td>" . $row['weightt'] . "</td>";
  echo "<td>" . $row['heigth'] . "</td>";
  echo "<td>" . $row['doctor_name'] . "</td>";
  echo "<td>" . $row['medical_history'] . "</td>";
  echo "<td>" . $row['sexe'] . "</td>";
  echo "<td><form action='delete_admin.php' method='POST'><button type='submit' name='delete' value='" . $row['idd'] . "' class='btn btn-danger'>Delete</button></form></td>";
  echo "</tr>";
}

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