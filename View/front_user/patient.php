<?php

include "C:/xampp/htdocs/First_SUII/projet/Controller/pharmacieC.php";
use PHPMailer\PHPMailer\PHPMailer;
require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';

$mail = new PHPMailer(true);


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
          <li><a href="homeUM.php">Home</a></li>
          <li><a href="patient.php">Patient</a></li>

          
         
          
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
              <h2>Nos Pharmacies</h2>

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
   <!-----------------------------trier------------->
   <form method="GET">
  <select name="ville" id="ville" style="border: 1px solid #ccc; padding: 8px; margin: 0 10px;">
    <option value="">-- Choisissez une ville --</option>
    <option value="tunis"<?php if(isset($_GET['ville']) && $_GET['ville'] == 'tunis') echo ' selected'; ?>>Tunis</option>
    <option value="ariana"<?php if(isset($_GET['ville']) && $_GET['ville'] == 'ariana') echo ' selected'; ?>>Ariana</option>
    <!-- Ajoutez d'autres options pour chaque ville -->
  </select>
  <button type="submit" class="btn btn-primary1">Trier</button>
</form>

<?php
// Connexion à la base de données
$conn = config::getConnexion();

// Vérifie si le paramètre 'ville' est présent dans l'URL
if (isset($_GET['ville']) && !empty($_GET['ville'])) {
  $ville = $_GET['ville'];
  $query = "SELECT Name, ville, address FROM pharmacie WHERE ville = :ville ORDER BY ville";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':ville', $ville);
  $stmt->execute();
  $list = $stmt->fetchAll();
} else {
  // Requête SQL pour récupérer toutes les informations de la pharmacie si aucune ville n'est sélectionnée
  $query = "SELECT Name, ville, address FROM pharmacie";
  $stmt = $conn->query($query);
  $list = $stmt->fetchAll();
}
?>

<!--------------------affichage pharmacies----------------------->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 posts-list">
            <?php foreach ($list as $row) { ?>
                <div class="col-xl-4 col-md-6">
                    <article>
                        <div class="post-img">
                            <img src="blog-1.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="post-category"><?php echo $row['ville']; ?></p>
                        <h2 class="title"><?php echo $row['Name']; ?></h2>
                        <div class="d-flex align-items-center">
                            <p><?php echo $row['address']; ?></p>
                        </div>
                        <button type="button" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
                    </article>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!---------------fin trier--------------------->



<!--------------mailing------------------------------------->
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $message = $_POST['message'];

 

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vitalia.pharmacie@gmail.com';
        $mail->Password = 'rrmymfvqpunthkkt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('vitalia.pharmacie@gmail.com', '');
        $mail->addAddress('vitalia.pharmacie@gmail.com');

        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['file']['tmp_name'];
            $name2 = $_FILES['file']['name'];
            $mail->addAttachment($tmp_name, $name2);
        }

        $mail->Subject = 'nouvelle ordonnance (Contact Page)';
        $mail->Body = '<h3>Name : ' . $name . '<br>Message : ' . $message . '<br>code : ' . $code . '</h3>';
        $mail->IsHTML(true);

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->send();

        http_response_code(200);
        echo 'Message envoyé avec succès !';
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Une erreur s\'est produite lors de l\'envoi du message. Veuillez réessayer plus tard.';
    }
    exit;
}

?>








 
  <!-- Modal -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Envoyer votre ordonnance:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="contact-form">
          <div class="mb-3">
            <label for="name" class="form-label">Nom et Prénom</label>
            <input type="text" class="form-control" id="name" name="name" >
          </div>
          <div class="mb-3">
            <label for="code">code :</label>
            <input type="text" class="form-control" id="code" name="code" >
          </div>
          <div class="mb-3">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" ></textarea>
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">Upload fichier</label>
            <input type="file" class="form-control"  id="file" name="file" >
          </div>
          <div id="alert-message"></div>
          <button type="submit" class="btn btn-primary1" name="submit" >Envoyer</button>
        </form>      
      </div>
    </div>
  </div>
</div>

<script src="mail.js"></script>




<style>
  .btn-primary1 {
    background-color: #008374;
    border-color: #000000;
    color: white;
    transition: background-color 0.2s ease, border-color 0.2s ease;
  }
  .btn-primary1:hover {
    background-color: #0ac2ad;
    border-color: #000000;
    color: white
  }
  select:hover, button:hover {
    background-color: #008374;
    color: #fff;
  }
  
</style>
      
         
    

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