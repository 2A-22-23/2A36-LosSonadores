<?php
include  "../../Controller/CategorieC.php";

$catC= new CategorieC();
    $liste=$catC->afficherCategories();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afficher Categories</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
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
<?php include'navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include'sidebar.php' ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Categories</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Points fidélité</th>
                          <th>Nombre produit</th>
                          <th>Action</th>
                        </tr>  
                      </thead>
                      <tbody>
                      <?php
                                        foreach($liste as $row){
                                      ?>
                                        <tr>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['pointfidel']; ?></td>
                                            <td><?php echo $row['nbproduit']; ?></td>
                                            <td>
                                                <form method="POST" action="ModifierCategorie.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-warning" value= "Modifier">
                                                </form>
                                               <form method="POST" action="supprimerCategorie.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                        </tr>

                                                <?php
                                            }
                                        ?>           

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    <?php include'footer.php' ?>
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

