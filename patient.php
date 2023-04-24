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
          <li><a href="patient.php">Patient</a></li>
          <li><a href="blog2.php">Pharmacie</a></li>
          <li><a href="#contact">Contact</a></li>
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
              <h2>Patient</h2>

            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Patient</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
   
    <form method="POST">
    <label for="ville">Trier par ville :</label>
    <select name="ville" id="ville">
        <option value="">-- Choisissez une ville --</option>
        <option value="tunis">tunis</option>
        <option value="ariana">ariana</option>
        
        <!-- Ajoutez d'autres options pour chaque ville -->
    </select>
    <button type="submit">Trier</button>
</form>

        <?php
   
        // Connexion à la base de données
        $conn = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');
        
        
        // Requête SQL pour récupérer les informations de la pharmacie
        // Requête SQL pour récupérer les informations de la pharmacie triées par ville
if (isset($_POST['ville']) && !empty($_POST['ville'])) {
  $ville = $_POST['ville'];
  $query = "SELECT Name, ville, address FROM pharmacie WHERE ville = :ville ORDER BY ville";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':ville', $ville);
  $stmt->execute();
} else {
  // Requête SQL pour récupérer toutes les informations de la pharmacie si aucune ville n'est sélectionnée
  $query = "SELECT Name, ville, address FROM pharmacie";
  $stmt = $conn->query($query);
}


        
        ?>
      
        <section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 posts-list">
      <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="col-xl-4 col-md-6">
        <article>
          <div class="post-img">
            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
          </div>
          <p class="post-category"><?php echo $row['ville']; ?></p>
          <h2 class="title"><?php echo $row['Name']; ?></h2>
          <div class="d-flex align-items-center">
            <p><?php echo $row['address']; ?></p>
          </div>
          <button type="submit" formaction="" class="btn btn-primary">Ajouter</button>
        </article>
      </div>
      <?php } ?>
    </div>
  </div>
</section>






      
         
    

      </div>
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



  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!--Vendor JS Files --> 
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>