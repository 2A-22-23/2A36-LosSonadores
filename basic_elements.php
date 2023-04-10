<!--<?php
include '../config.php';
?>-->
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
        <a class="navbar-brand brand-logo mr-5" href="../../index.html"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
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
                  <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.html">Historique</a></li>
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
        <!--formulairee-->
    
        <form action="" method="POST">
        <div class="col-12 grid-margin stretch-card">
           <div class="card">
            <div class="card-body">
            <h4 class="card-title">gestion Pharmacie</h4>
            <form class="forms-sample" method="POST" >
                <div class="form-group">
                    <label for="idphar">Id Pharmacie</label>
                    <input type="number" class="form-control" id="idphar" name="idphar" min="0" >
                </div>
     
                <div class="form-group">
                    <label for="idordo">Id ordonnance</label>
                    <input type="number" class="form-control" id="idordo" name="idordo" min="0">
                </div>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" pattern="^[a-zA-Z]+$">
                </div>
              
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" pattern="^[a-zA-Z]+$">
                </div>
                <div class="form-group">
                    <label for="adresse">address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
            
                <button type="submit" class="btn btn-primary mr-2"  onclick="submitForm()" name="ajouter"   >Ajouter</button>
                <button type="submit" class="btn btn-primary mr-2"  name="modifier"  onclick="submitForm()">Modifier</button>
                <button type="submit" class="btn btn-primary mr-2"  name="supprimer">Supprimer</button>

           
            </form>
        </div>
    </div>
</div>

            <?php
            // Connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_pharmacie";
            
            try {
                $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
              }
             
              // Traitement du formulaire
             
              if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {
                  $idphar = $_POST['idphar'];
                  $idordo = $_POST['idordo'];
                  $name = $_POST['Name'];
                  $ville = $_POST['ville'];
                  $address = $_POST['address'];
                

              
                  // Requête SQL pour insérer les données dans la table
                  $sql = "INSERT INTO pharmacie (idphar, idordo, Name, ville, address)
                          VALUES (:idphar, :idordo, :name, :ville, :address)";
                  $stmt = $bdd->prepare($sql);
                  $stmt->bindParam(':idphar', $idphar);
                  $stmt->bindParam(':idordo', $idordo);
                  $stmt->bindParam(':name', $name);
                  $stmt->bindParam(':ville', $ville);
                  $stmt->bindParam(':address', $address);
                  
                  // Exécution de la requête
                  try {
                      $stmt->execute();
                      echo "Données insérées avec succès !";
                  } catch(PDOException $e) {
                      echo "Erreur : " . $e->getMessage();
                  }
              }
             
          
              // Vérifier si le formulaire a été soumis
              if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['modifier'])) {
            
              
                //Récupérer les valeurs du formulaire
                $idphar = $_POST['idphar'];
                $idordo = $_POST['idordo'];
                $name = $_POST['Name'];
                $ville = $_POST['ville'];
                $address = $_POST['address'];
              
                // Préparer la requête SQL pour mettre à jour les données dans la base
                $stmt = $bdd->prepare("UPDATE pharmacie SET idphar = :idphar, idordo = :idordo, Name = :name, ville = :ville, address = :address WHERE idphar = :idphar");
              
                // Exécuter la requête en liant les valeurs des paramètres
                $stmt->bindParam(':idphar', $idphar);
                $stmt->bindParam(':idordo', $idordo);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':ville', $ville);
                $stmt->bindParam(':address', $address);
                $stmt->execute();
                try {
                  $stmt->execute();
                  echo "Données modifié avec succès !";
              } catch(PDOException $e) {
                  echo "Erreur : " . $e->getMessage();
              }
            
            }
                   
            if(isset($_POST['supprimer'])) {
              // Récupération de l'ID de la ligne à supprimer
              $idphar = $_POST['idphar'];
          
              // Préparation de la requête de suppression
              $query = "DELETE FROM pharmacie WHERE idphar = :idphar";
              $stmt = $bdd->prepare($query);
              $stmt->bindParam(':idphar', $idphar, PDO::PARAM_INT);
          
              // Exécution de la requête
              if($stmt->execute()) {
                  echo "La ligne a été supprimée avec succès.";
              } else {
                  echo "Erreur lors de la suppression de la ligne.";
              }
          }
           
              ?>
              
              
             
              
            
        <!-- table affichage -->
        
        <div class="col-lg-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Pharmacie</h4>
              
              <div class="table-responsive pt-3">
                <table class="table table-dark">
                <thead>
                    <tr>
                      <th>Id Pharmacie</th>
                      <th>Id ordonnance</th>
                      <th>Name</th>
                      <th>Ville</th>
                      <th>adresse</th>
                 
                    </tr>
                </thead>
               <tbody>
               <?php
    
      
      // Récupération des données
      $query = "SELECT * FROM pharmacie";
      $result = $bdd->query($query);
      
      // Affichage des données dans la table
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["idphar"] . "</td>";
        echo "<td>" . $row["idordo"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["ville"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "</tr>";
      }
    ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      </div>
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
  <script src="../../js/controledesaisie.js"></script>
  

  <!-- End custom js for this page-->

  
 



</body>

</html>
