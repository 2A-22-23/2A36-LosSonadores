<?php
include "C:/xampp/htdocs/FIRST_SUII/projet/View/tojrab03/controller/clientc.php";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

?>
<!DOCTYPE html>
<html>
<head>
	<title>Medical prescription by VITALIA</title>
     <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Doctor side</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/medical_record.css" rel="stylesheet">
  <link href="ord.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
    <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">VITALIA@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+216 71 240 260</span></i>
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
  <a href="homeUM.php" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>VITALIA<span>.</span></h1>
    <?php          
        $select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
        $select_profile->execute([$idclient]);
        if($select_profile->rowCount() > 0){
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
     ?>
     
     
     <?php
        }else{
     ?>
    
     <?php
       echo "ghalet"; }
     ?>      
    
  </a>
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="#hero">Home</a></li>
      <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
      <?php
      $username = $fetch_profile["login"];
      $_SESSION["username"] = $username;
      ?>
      <ul>
              <li><a href="show_user.php">Show your account infos</a></li>
              <li><a href="#">Update your account</a></li>
            </ul>
      </li>
      <li><a href="HomeUM.php">Back</a></li>
    </ul>
  </nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header><!-- End Header -->

<!-- End Header -->
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>lefri9i<span></span></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->
		<?php
        if (isset($_POST['submit'])) {
          $patient_name = $_POST['patient_name'];
          $doctor_name = $_POST['doctor_name'];
          $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
          $sql = "SELECT date, patient_name, nom_medicament, nombre_fois, doctor_name FROM ordonnance WHERE patient_name = :patient_name AND doctor_name = :doctor_name";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['patient_name' => $patient_name, 'doctor_name' => $doctor_name]);
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $sql2 = "SELECT birth_date FROM dossier WHERE patient_name = :patient_name";
          $stmt2 = $pdo->prepare($sql2);
          $stmt2->bindParam(':patient_name', $patient_name);
          $stmt2->execute();
          $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
          $birth_date = $result2['birth_date'];
          if ($row) {
           
           $patient_name = $row["patient_name"];
           $medicament_name = $row["nom_medicament"];
           $nombre_fois = $row["nombre_fois"];
           $doctor_name = $row["doctor_name"];
           $date = $row["date"];
           $html_content = "<div class=\"container1\">";
            $html_content .= "<link rel=\"stylesheet\" href=\"ord.css\">";
            $html_content .= "<h1 class=\"center1\"><strong>Medical prescription by VITALIA</strong></h1>";
$html_content .= "<p class=\"center1\">A108 Adam Street, New York, NY 535022, United States</p>";
$html_content .= "<div>";
$html_content .= "<br>";
$html_content .= "<p>Patient name: $patient_name</p>";
$html_content .= "<br>";
$html_content .= "<p>Birth date: $birth_date</p>";
$html_content .= "<br>";
$html_content .= "<div class=\"line1\"></div>";
$html_content .= "<br>";
$html_content .= "<p>Medicaments: $medicament_name - $nombre_fois times per day</p>";
$html_content .= "<br>";
$html_content .= "<div class=\"line1\"></div>";
$html_content .= "<br>";
$html_content .= "<p>Signed by: $doctor_name</p>";
$html_content .= "<br>";
$html_content .= "<p class=\"date1\">Date: $date</p>";
$html_content .= "<br>";
$html_content .= "</div>";
$html_content .= "</div>";

       
           echo $html_content;
       
           echo '<form action="downloadO.php" method="post">';
           echo '<input type="hidden" name="html" value="' . htmlentities($html_content) . '">';
           echo '<button type="submit" class="btn btn-primary">Download PDF</button>';
           echo '</form>';
       
       } else {
           echo "<p>No prescription found for patient '$patient_name'.</p>";
       }
      }
       ?>
<footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="home.html" class="logo d-flex align-items-center">
        <span>Impact</span>
      </a>
      <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
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
        A108 Adam Street <br>
        New York, NY 535022<br>
        United States <br><br>
        <strong>Phone:</strong> +1 5589 55488 55<br>
        <strong>Email:</strong> info@example.com<br>
      </p>

    </div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
   Copyright <strong><span>Impact</span></strong>
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>