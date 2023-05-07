<?php
session_start();

// Include the database connection code
include "C:/xampp/htdocs/FIRST_SUII/projet/controller/clientc.php";

$msg = "";
$db=config::getConnexion();


// Check if the form was submitted and the Block button was c


if (isset($_POST['Block'])) {
  // Get the ID of the user to block
  $idclient = $_POST['idclient'];

  // TODO: Add code to update the database to mark the user as blocked
  $sql = "UPDATE user SET block=1 WHERE idclient=:idclient";
  $req = $db->prepare($sql);
  $req->bindParam(":idclient", $idclient);
  $req->execute();

  // Redirect back to the page that displayed the user list
  header("Location: user2.php");
  exit();
}

if (isset($_POST['Unblock'])) {
  // Get the ID of the user to unblock
  $idclient = $_POST['idclient'];

  // TODO: Add code to update the database to mark the user as unblocked
  $sql = "UPDATE user SET block=0 WHERE idclient=:idclient";
  $req = $db->prepare($sql);
  $req->bindParam(":idclient", $idclient);
  $req->execute();

  // Redirect back to the page that displayed the user list
  header("Location: user2.php");
  exit();
}



?>





<!DOCTYPE html>
<html lang="en">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>VITALIA</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="table_medical.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <script>
  // Assuming you have a button with id "block-button"
const blockButton = document.querySelector('#block-button');

blockButton.addEventListener('click', () => {
  const userId = /* get the user id */;
  
  // Send a request to the server to block the user
  fetch(`/block-user/${userId}`)
    .then(response => response.json())
    .then(data => {
      // Update the button text to show "unblock"
      blockButton.textContent = 'Unblock';
    })
    .catch(error => {
      console.error('Error blocking user:', error);
    });
});

</script>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="back.php"><img src="images/vitalia.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="back.php"><img src="images/vitalia.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
          <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
          
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
             
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="medical.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Medical Record</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ord.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Ordonnance</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="assurance.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title" >Assurance</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="remboursement.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Remboursement</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user2.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">User List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ListRendezVous.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Appointment</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Doctorschedule.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <?php
$pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');

// Set page limit and current page
$limit = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset for current page
$offset = ($page - 1) * $limit;

// Get number of rows in table
$stmt_count = $pdo->prepare("SELECT COUNT(*) AS num_rows FROM user");
$stmt_count->execute();
$num_rows = $stmt_count->fetch(PDO::FETCH_ASSOC)['num_rows'];

// Get rows for current page
$stmt = $pdo->prepare("SELECT * FROM user LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="styled-table">
          <thead>
            <tr>
              <th>ID CLIENT</th>
              <th>First name</th>
              <th>Last NAME</th>
              <th>telephone</th>
              <th>Adresse</th>
              <th>email</th>
              <th>type</th>
              <th>username</th>
              <th>code de patient</th>
              <th>Block/Deblock</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $row): ?>
              <tr>
                <td><?=  $row['idclient'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['telephone'] ?></td>
                <td><?= $row['adresse'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['login'] ?></td>
                <td><?= $row['code0'] ?></td>
                <td>
                  <?php
                    // Display the block/unblock button for the current row
                    if ($row['block']) {
                      // If the user is blocked, show the unblock button
                      echo "<form action='' method='post'>";
                      echo "<input type='hidden' name='idclient' value='{$row['idclient']}'>";
                      echo "<button type='submit' name='Unblock' class='btn btn-success'>Unblock</button>";
                      echo "</form>";
                    } else {
                      // If the user is not blocked, show the block button
                      echo "<form action='' method='post'>";
                      echo "<input type='hidden' name='idclient' value='{$row['idclient']}'>";
                      echo "<button type='submit' name='Block' class='btn btn-danger'>Block</button>";
                      echo "</form>";
                    }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php
          // Calculate number of pages
          $num_pages = ceil($num_rows / $limit);
          // Display pagination links
          for ($i = 1; $i <= $num_pages; $i++) {
            echo '<a class="pagination-link" href="?page=' . $i . '">' . $i . '</a> ';
          }

          ?>
  

         </div>
         
              </div>
            </div>
            
          </div>
          
          
        </div>


        <style>
          #search-ido {
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
  width: 300px;
  margin-bottom: 20px;
  outline: none;
}

          .pagination-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    margin-right: 5px;
}

.pagination-link:hover {
    background-color: #ddd;
}

.pagination-link.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
 .search-input {
    width: 200px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    outline: none;
  }

        </style>


<?php
$conn = config::getConnexion();

// Requête SQL pour récupérer les informations sur le nombre de pharmacies par ville
$query = "SELECT type, COUNT(*) AS nombre_user FROM user GROUP BY type ORDER BY nombre_user DESC";
$stmt = $conn->query($query);
$data = array(
  'labels' => array(),
  'nombre_user' => array()
);

// Define an array of colors for each user type
$colors = array(
  'Patient' => '#FF6384',
  'Doctor' => '#36A2EB',
  'Insurance' => '#FFCE56',
  'Pharmacist' => '#00ff00	',
);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $data['labels'][] = $row['type'];
  $data['nombre_user'][] = $row['nombre_user'];

  // Assign a color to the user type based on the $colors array
  $backgroundColor[] = $colors[$row['type']];
}

// Création du graphique en utilisant la librairie Chart.js
?>
<style>
.chart-wrapper {
  margin: 0 ;
  margin-left: 38%;
  margin-bottom: 10%;
  width: 50%;
}
.chart-container {
  width: 400px;
  height: 400px;
}
</style>

<div class="chart-wrapper">
  <div class="chart-container">
    <canvas id="user" width="200" height="200"></canvas>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
<script>
var ctx = document.getElementById('user').getContext('2d');
var chart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($data['labels']); ?>,
    datasets: [{
      label: 'Nombre de users',
      data: <?php echo json_encode($data['nombre_user']); ?>,
      backgroundColor: <?php echo json_encode($backgroundColor); ?>,
      borderWidth: 1

    }]
  },
  options: {
    scales: {

    }
  }
});
</script>


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>


