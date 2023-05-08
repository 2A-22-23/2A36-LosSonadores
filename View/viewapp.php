
<?php

include 'C:\xampp\htdocs\First_SUII\projet\Controller\RendezVousC.php';


$rendezvousC = new RendezvousC();
$list = $rendezvousC->listRendezvous();
$error = "";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idClient = $_SESSION['idclient'];
}else{
   $idClient = '';
};













?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Side</title>

    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
  <a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>VITALIA<span>.</span></h1>
  </a>
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
  
        <?php          
            $select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
            $select_profile->execute([$idClient]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         
         
         <?php
            }else{
         ?>
        
         <?php
           echo "ghalet"; }
         ?>      
        
      <nav id="navbar" class="navbar">
        <ul>
        
        <li><a href="homeM.php">Home</a></li>
        <li><a href="speciality.php">Speciality</a></li>
       
       <li><a href="DoctorSchedule - Copie.php">Schedule</a></li>

       <li><a href="viewapp.php">Doctor's Appointments</a></li>
       <li><a href="planningCal.php">Doctor's Calendar</a></li>

          <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
                  <li><a href="show_user.php">Show your account infos</a></li>
                  <li><a href="#">Update your account</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
          </li>
          <li><a href="logout.php">log out</a></li>
          </ul>
          
       
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>

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
          <h2>Doctor's <span>Side</span></h2>
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

      


        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->
  <main id="main">
<!-- ======= Appointment section ======= -->
<section id="record" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Welcome Doctor  <span style="color: darkorange" ><?= $fetch_profile["login"]; ?></span>  </h2>
    </div>
   

</section><!-- End medical record Section -->

  </main><!-- End #main -->




  <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<button id="export-button">
  Export to Excel
  <img src="../View/ex.png" alt="Exporter">
</button>

  



<br>
<br>
<br>

<form id="appointment-form" action="calendarMed.php" method="POST">



  <input type="hidden" name="idclient" value="<?php echo $_SESSION['idclient']; ?>">
                   <button name="appointment-btn" id="appointment-btn"  > Use calendar
                   <img src="../View/cal.png" alt="Use Calendar" style="width: 60px; height: 50px;">
                   </button>
                   </form>






                   <?php



// retrieve the appointments for the logged-in doctor
$db = config::getConnexion();
$doctorId = $_SESSION['idclient'];
$sql = "SELECT rd.* , 
               pd.nom AS patient_nom, 
               pd.prenom AS patient_prenom,
               dd.nom AS docteur_nom,
               dd.prenom AS docteur_prenom,
               dd.specialite AS specialite
        FROM rendezvous rd
        JOIN user pd ON rd.idclient = pd.idclient
        JOIN user dd ON rd.iddoc = dd.idclient
        WHERE rd.iddoc = $doctorId";
$result = $db->query($sql);
$list = $result->fetchAll();
?>

<table  id="my-table" border="1" width="70%" height="10%">
  <tr>
    <th>Nom et Prénom Patient</th>
   
 
    <th>Date et heure</th>
    <th>Status</th>
    <th>Action</th>
    <th>Note</th>

    
  
  </tr>

  <?php if (!empty($list)) { ?>
    <?php foreach ($list as $rendezvous) { ?>
      <tr class="active-row">
      <td><?php echo $rendezvous['patient_nom']. ' ' .$rendezvous['patient_prenom']; ?></td>
        
       
        <td><?php echo $rendezvous['LaDate']; ?></td>
        <td>
          <?php if($rendezvous['status'] == 0): ?>
            <span class=" badge-warning">for verification</span>
          <?php endif ?>
          <?php if($rendezvous['status'] == 1): ?>
            <span class=" badge-primary">Confirmed</span>
          <?php endif ?>
          <?php if($rendezvous['status'] == 2): ?>
            <span class=" badge-info">Rescheduled</span>
          <?php endif ?>
          <?php if($rendezvous['status'] == 3): ?>
            <span class="status-done">Done</span>
          <?php endif ?>
        </td>
        <td align="center">

        <?php if($rendezvous['status'] != 3): ?>
     
          <form id="formU"method="POST" action="updateRendezVous.php">
            <input id="updateInput" type="submit" name="update" value="Update">
            <input type="hidden" name="idr" value="<?= $rendezvous['idr']; ?>">
           
          </form>





          <?php endif; ?>
       
          
        </td>

        <td>
   
        <?php if($rendezvous['note'] == 1): ?>
            <span class=" badge-warning">BAD</span>
          <?php endif ?>
          <?php if($rendezvous['note'] == 2): ?>
            <span class=" badge-primary">NOT BAD</span>
          <?php endif ?>
          <?php if($rendezvous['note'] == 3): ?>
            <span class=" badge-info"> GOOD</span>
          <?php endif ?>
          <?php if($rendezvous['note'] == 4): ?>
            <span class="status-done">VERY GOOD</span>
            <?php endif ?>
            <?php if($rendezvous['note'] == 5): ?>
            <span class="status-done">EXCELLENT</span>
          <?php endif ?>
        </td>


      </tr>
    <?php } ?>
  <?php } else { ?>
    <tr>
      <td colspan="6">No results found.</td>
    </tr>
  <?php } ?>
</table>






<style>
  .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }


    .pagination .current {
      background-color: #88e0d5;
        color: white;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }
</style>





<script>
// Function to export table data to Excel
function exportToExcel() {
  // Get table object and convert it to a workbook object
  var table = document.getElementById("my-table");
  var workbook = XLSX.utils.table_to_book(table);

  // Generate Excel file and download it
  XLSX.writeFile(workbook, "DoctorsAppointments.xlsx");
}

// Attach click event listener to export button
var exportButton = document.getElementById("export-button");
exportButton.addEventListener("click", exportToExcel);
</script>







<style>

#appointment-btn {
    background-color:#008374;
    border: none;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    float: left;
  }

  #appointment-btn:hover {
    background-color:#88e0d5; 
  }

  #export-button img {
  width: 50px;
  height: 50px;
}


#export-button {
  background-color:#008374;
    border: none;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    float: left;
}

#export-button:hover {
  background-color:#88e0d5;  /* Couleur de fond du bouton au survol */
}


.badge-warning {
  background-color: yellow;
  color: black;
  border-radius: 10px;
  
}

.badge-primary {
  background-color: blue;
  color: white;
  border-radius: 10px;
}

.badge-info {
  background-color: lightblue;
  color: black;
  border-radius: 10px;
}

.status-done {
  background-color: green;
  color: white;
  border-radius: 10px;
}


a.delete-link {
  margin-top: 10px;
}


table {
  border-collapse: collapse;
  width: 70%;
  margin: 0 auto;
  table-layout: fixed;
  position: relative;
  top: 30px;
}

th, td {
    padding: 0.5rem;
    text-align: center;
    border: 1px solid #ddd;
    width: auto; /* or use a specific width value */
}

th {
    background-color: #eee;
}

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    input[type="submit"], a {
        background-color: #008374;
        color: white;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }

    a:hover {
        background-color: #008374;
    }


    .make-appointment-btn {
    background-color: #4CAF50; /* Couleur de fond */
    border: none; /* Supprime la bordure */
    color: white; /* Couleur du texte */
    padding: 10px 20px; /* Ajoute de l'espace autour du texte */
    text-align: center; /* Centre le texte */
    text-decoration: none; /* Supprime le soulignement */
    display: inline-block; /* Affiche le bouton en tant qu'élément en ligne */
    font-size: 16px; /* Taille de police */
    margin: 4px 2px; /* Ajoute de l'espace entre les boutons */
    cursor: pointer; /* Change le curseur lorsque vous survolez le bouton */
  }

  .make-appointment-btn:hover {
    background-color: #3e8e41; /* Change la couleur de fond au survol */
  }



  .modal {
    display: none; /* Par défaut, la fenêtre modale est cachée */
    position: fixed; /* La fenêtre modale est positionnée en mode fixe */
    z-index: 1; /* La fenêtre modale est affichée au-dessus de tous les autres éléments */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Permet de faire défiler la page si la fenêtre modale est trop grande */
    background-color: rgba(0,0,0,0.4); /* Ajoute un voile noir transparent derrière la fenêtre modale */
  }

  .modal-content {
    background-color: white;
    margin: 10% auto; /* Place la fenêtre modale à 10% du haut de la page */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }






  .formm {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 5px;
}


input[type="text"],
input[type="time"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

</style>




    









  

<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  
     <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="addRendezVous.php" class="logo d-flex align-items-center">
     
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
    &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
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
