<?php

include "../../Modele/Categorie.php";
include "../../Controller/CategorieC.php";

if(isset($_POST['Ajouter']))
{
if( isset($_POST['nom']) and isset($_POST['pointfidel']) and isset($_POST['nbproduit'])){

    $cat=new Categorie($_POST['nom'],$_POST['pointfidel'],$_POST['nbproduit']);

//Partie3
$categorieC = new CategorieC();
$categorieC->ajouterCategorie($cat);

        header('Location: AfficherCategories.php');

    }else{
        echo "vérifier les champs";
        die();
    }
//*/
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
      <!-- partial:partials/_settings-panel.html -->
      <?php include'sidebar.php' ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Categorie</h4>
                  <p class="card-description">
                    Ajouter Categorie
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data" id="form_cat">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Point fidel</label>
                      <input type="number" class="form-control" id="pointfidel" name="pointfidel" placeholder="Point Fidel">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nombre de Produits</label>
                      <input type="number" class="form-control" id="nbproduit" name="nbproduit" placeholder="Nombre de Produits">
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" value="Ajouter" name="Ajouter" >

                    
                  </form>
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
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="js/Categorie.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
