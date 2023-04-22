<?php
include "../../Modele/Produit.php";
include "../../Controller/ProduitC.php";

include  "../../Controller/CategorieC.php";

$catC= new CategorieC();
    $listeCat=$catC->afficherCategories();

if(isset($_POST['Ajouter']))
{
if( isset($_POST['nom']) and isset($_POST['prix'])  and isset($_POST['informations'])){

    $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];

    $folder = "./images/Produits/".$filename ;
    move_uploaded_file($tempname, $folder);
    
    $prod=new Produit($_POST['nom'],$_POST['prix'],$folder,$_POST['informations'],$_POST['categorie']);

//Partie3
$produitC = new ProduitC();
$produitC->ajouterProduit($prod);

        header('Location: AfficherProduits.php');

    }else{
        echo "vérifieer les champs";
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
  <title>Ajouter Produit</title>
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
                  <h4 class="card-title">Ajouter Produit</h4>
                  <p class="card-description">
                      Ajouter Produit
                  </p>
                  <form method="POST" enctype="multipart/form-data" id="form_prod">
                    <div class="form-group">
                        <select name="categorie">
                          <?php
                          foreach ($listeCat as $rowCat) {
                          ?>
                                <option value="<?php echo $rowCat['id']; ?>"> <?php echo $rowCat['nom']; ?> </option>
                            <?php
                          }
                            ?>
                              </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Prix</label>
                      <input type="number" class="form-control" placeholder="Prix" name="prix" id="prix">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword12">Information</label>
                      <textarea class="form-control"  placeholder="Informations" name="informations" id="informations"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Image</h4>
                                                <label for="input-file-max-fs">Ajouter votre image</label>
                                                <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" name="image" />
                                            </div>
                                        </div>
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
  <script src="js/Produit.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
