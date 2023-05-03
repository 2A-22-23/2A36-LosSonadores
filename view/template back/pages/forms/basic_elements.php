<?php
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php";

$pharmacieC = new pharmacieC();
$list = $pharmacieC->listpharmacie();


?>

<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.html"><img src="assets/img/logo.png" class="mr-2" alt="logo.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="assets/img/logo.png" alt="logo.png"/></a>
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
              <img src="../../images/" alt="profile"/>
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
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
      
      </div>
      <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Gestion Assurances</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Gestion Rendez-Vous</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
             
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Gestion Produits</span>
                <i class="menu-arrow"></i>
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Gestion Pharmacie</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.php">Historique</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="../../pages/forms/basic_elements.php">Pharmacie</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
             
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title"> Gestion User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
             
              <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
             
            </li>
          </ul>
        </nav>

<!--------------------------------------------------------------------------------------------------------->

<?php
// Connexion à la base de données
$dbh= config::getConnexion();

// Nombre de pharmacie à afficher par page
$limit = 4;

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
<table class="table table-dark">
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $pharmacie['idphar']; ?>">Modifier</button>
    <a href="deletephar.php?idphar=<?= $pharmacie['idphar']; ?>" class="btn btn-danger">Supprimer</a>
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
          <button type="submit"  class="btn btn-primary">Enregistrer</button>
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




<?php

// Nombre total de pages
$pages = ceil($total / $limit);
$totalPages = ceil($total / $limit);
echo '<ul class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
  
    echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
}

?>
            
       
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
      backgroundColor: 'rgba(255, 71, 71, 0.5)', // #FF4747
      borderColor: 'rgba(255, 71, 71, 1)',
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>

  <script src="./js/controleSaisieBack.js"></script>
  <!-- End custom js for this page-->

  
 



</body>

</html>
