
<?php
include "C:/xampp/htdocs/First_SUII/projet/Controller/pharmacieC.php";

$pharmacieC = new pharmacieC();
$list = $pharmacieC->listpharmacie();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <!--Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> 

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
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

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
       <a href="index.html" class="logo d-flex align-items-center">
   
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>VITALIA<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
      <ul>
          <li><a href="home.php">Home</a></li>

          <li><a href="pharmacie.php">Pharmacie</a></li>
          <li><a href='C:\xampp\htdocs\First_SUII\projet\View\Impact\logout.php'>log out</a></li>

        </ul>
      </nav><!-- .navbar -->

  
   
    </div>
  </header> 
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Pharmacie</h2>

            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>

    
            <li>Pharmacie</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
      

      <form class="form-sample" method="POST" action="ajouter_pharmacie.php"  onsubmit="return validatePharmacie()" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color: #008374; font-size: 1.4em;">Pharmacie</h4>

              <div class="form-group">
                <label for="Name" style="color: #e2725b; font-size: 1.2em;">Name</label>
                <input type="text" name="Name" class="form-control" id="Name" autocomplete="off" min="0">
                <br>
                <div id="NameAlert" class="alert"></div>
              </div>
              <br>
              <div class="form-group">
                <label for="ville" style="color: #e2725b; font-size: 1.2em;">Ville</label>
                <input type="text" name="ville" class="form-control" id="ville" autocomplete="off">
                <br>
                <div id="villeAlert" class="alert"></div>
              </div>
              <br>
              <div class="form-group">
                <label for="address" style="color: #e2725b; font-size: 1.2em;">address</label>
                <input type="text" name="address" class="form-control" id="address" autocomplete="off">
            
                <br> <div id="addressAlert" class="alert"></div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary1 mr-2">login</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



      
         
    <br>

   
    </section><!-- End Blog Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>VITALIA</span>
          </a>
          
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
          
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <style>
  .btn-primary1 {
    background-color: #008374;
    border-color:#000000;
    color: white;
    transition: background-color 0.2s ease, border-color 0.2s ease;
  }
  .btn-primary1:hover {
    background-color: #0ac2ad;
    border-color: #000000;
    color: white
  }
  .card-body {
    border: 2px solid #008374;
    padding: 20px;
  }
  
</style>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!--Vendor JS Files --> 
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
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
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="controleSaisieFront.js"></script>

</body>

</html>
