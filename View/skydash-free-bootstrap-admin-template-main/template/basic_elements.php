<?php
include "C:/xampp/htdocs/First_SUII/projet/Controller/pharmacieC.php";

$pharmacieC = new pharmacieC();
$list = $pharmacieC->listpharmacie();


?>

<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
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
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/vitalia.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/vitalia.svg" alt="logo"/></a>
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
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
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
              <span class="menu-title" class = "active">Assurance</span>
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


          <li class="nav-item">
            <a class="nav-link" href="basic-table.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Historique</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="basic_elements.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Pharmacie</span>
            </a>
          </li>

          




            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Produits</span>
              <i class="menu-arrow"></i>
            </a>
            
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="AfficherProduits.php">Afficher</a></li>
                
                <li class="nav-item"> <a class="nav-link" href="AjouterProduit.php">Ajouter</a></li>
              </ul>
            </div>
       

      
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="AfficherCategories.php">Afficher</a></li>
                
                <li class="nav-item"> <a class="nav-link" href="AjouterCategorie.php">Ajouter</a></li>
              </ul>
            </div>
          </li>


        </ul>
      </nav>


<!--------------------------------------------------------------------------------------------------------->

<?php
// Connexion à la base de données
$dbh= config::getConnexion();

// Nombre de pharmacie à afficher par page
$limit = 2;

// Page courante
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'offset
$offset = ($page - 1) * $limit;

// Requête SQL pour récupérer les pharmacies par page
$stmt = $dbh->prepare("SELECT * FROM pharmacie LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Requête SQL pour récupérer le nombre total de pharmacies
$stmt = $dbh->prepare("SELECT COUNT(*) as total FROM pharmacie");
$stmt->execute();
$total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Nombre total de pages
$pages = ceil($total / $limit);


?>

<!-- table affichage -->
<form  class="forms-sample" >
<div class="col-12 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">

<div class="table-responsive pt-3">
<table class="table table-bordered table-striped">
<thead>
<tr>

<th>Name</th>
 <th>Ville</th>
 <th>adresse</th>
 <th>Action</th>

         
</tr>
</thead>
<tbody>
<?php foreach ($list as $pharmacie) { ?>
<tr>
 
  <td><?= $pharmacie['Name']; ?></td>
  <td><?= $pharmacie['ville']; ?></td>
  <td><?= $pharmacie['address']; ?></td>

  <td>
    <button type="button" class="btn btn-inverse-primary btn-fw" data-toggle="modal" data-target="#editModal<?= $pharmacie['idphar']; ?>">Modifier</button>
    <a href="deletephar.php?idphar=<?= $pharmacie['idphar']; ?>" class="btn btn-inverse-danger btn-fw">Supprimer</a>
  </td>
</tr>
<!-- Modal pour la modification -->
<div class="modal fade" id="editModal<?= $pharmacie['idphar']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modifier une pharmacie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="updatephar.php" onsubmit="return validatePharmaciem() " >
        <div class="form-group">
        <input type="hidden" name="idphar" value="<?= $pharmacie['idphar']; ?>">
            <label for="Name">Name</label>
            <input type="text" name="Name" class="form-control" id="Name" value="<?= $pharmacie['Name']; ?>">
            <div id="nameAlert" class="alert"></div>
          </div>
          <div class="form-group">
           
            <label for="ville">Ville</label>
            <input type="text" name="ville" class="form-control" id="ville" value="<?= $pharmacie['ville']; ?>">
            <div id="villeAlert" class="alert"></div>
          </div>
        
          <div class="form-group">
            <label for="Name">Adresse</label>
            <input type="text" name="address" class="form-control" id="address" value="<?= $pharmacie['address']; ?>">
            <div id="adressAlert" class="alert"></div>
          </div>
          <button type="submit"  class="btn btn-inverse-primary btn-fw">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</tbody>
</table>
</div>
</form>

    </div>
</div>
</div>


<div class="d-flex justify-content-center">

<?php

// Nombre total de pages
$pages = ceil($total / $limit);
$totalPages = ceil($total / $limit);
echo '<ul class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
  
    echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
}

?>
    </div>        
       
            <?php
// Connexion à la base de données
$conn = config::getConnexion();

// Requête SQL pour récupérer les informations sur le nombre de pharmacies par ville
$query = "SELECT ville, COUNT(*) AS nombre_pharmacies FROM pharmacie GROUP BY ville ORDER BY nombre_pharmacies DESC";
$stmt = $conn->query($query);
$data = array(
  'labels' => array(),
  'nombre_pharmacies ' => array()
);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $data['labels'][] = $row['ville'];
  $data['nombre_pharmacies'][] = $row['nombre_pharmacies'];
}

// Création du graphique en utilisant la librairie Chart.js
?>
<canvas id="pharmacie" width="800" height="400"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
<script>
var ctx = document.getElementById('pharmacie').getContext('2d');
var chart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($data['labels']); ?>,
    datasets: [{
      label: 'Nombre de pharmacies',
      data: <?php echo json_encode($data['nombre_pharmacies']); ?>,
      backgroundColor: 'rgba(230, 127, 127, 0.5)', // #e67f7f with opacity 0.5
      borderColor: 'rgba(230, 127, 127, 1)', 
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>


  
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>

  <script src="js/controleSaisieBack.js"></script>
  <!-- End custom js for this page-->

  
 



</body>

</html>
