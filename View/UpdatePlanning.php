



<?php
// Inclure le fichier contenant la classe PlanningC
// Inclure le fichier contenant la classe PlanningC

// Include the PlanningC class and start the session
include '../Controller/PlanningC.php';

//var_dump($_POST);

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idClient = $_SESSION['idclient'];
}else{
   $idClient = '';
};
$id = $_POST['id'];
// Check if the form has been submitted
if(isset($_POST['update'])) {
  // Get the form data
 
  $day = isset($_POST['day']) ? $_POST['day'] : "";
  $timeFrom = isset($_POST['timeFrom']) ? $_POST['timeFrom'] : "";
  $timeTo = isset($_POST['timeTo']) ? $_POST['timeTo'] : "";
  

  // Update the planning record
  $planningC = new PlanningC();
  $planningC->updatePlanning($id, $_SESSION['idclient'], $day, $timeFrom, $timeTo);
 
  // Return a success message
 

  
}
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
        
    
          <li><a href="homeDr.php">Home</a></li>
       
          <li><a href="DoctorSchedule - Copie.php">Schedule</a></li>
          <li><a href="viewapp.php">Doctor's Appointments</a></li>
            

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
          <h2>Update Your  <span>Schedule</span></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
      
            
   
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

 
    
  

<div>
  
<form id="update-form" method="POST" action="" onsubmit="return  validateForm()">


  <input type="hidden" name="id" value="<?= $id; ?>">
  <label>Day:</label>
  <select name="day" id="day">
    <option value="" disabled selected>Choose a day</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
  </select><br>
  <div id="message" class="error-message"></div>

  <label>Heure de début :</label>
  <input type="time" name="timeFrom" value="<?= isset($planning['timeFrom']) ? $planning['timeFrom'] : '';?>"><br>
  <span id="error1" style="display:none;"></span>
  <br>

  <label>Heure de fin :</label>
  <input type="time" name="timeTo" value="<?=isset($planning['timeTo']) ? $planning['timeTo'] : '';  ?>"><br>
  <span id="error2" style="display:none;"></span>
  <br>

  <button name="update" value="Mettre à jour" id="u-btn">Update My Schedule</button>
  <button id="closeBtn" data-dismiss="modal"><a href="DoctorSchedule - Copie.php">Return</a></button>
</form>

<style>
  
select {
      font-size: 16px;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 200px;
      margin: 10px 0;
    }

    option {
      font-size: 14px;
      padding: 5px;
    }

    option:checked {
      background-color: #007bff;
      color: #fff;
    }
  .error-message {
    color: red;
  }
  .valid-message {
    display: none;
  }
</style>



<script>
				function validateForm() {

var day = document.getElementById("day");

var dayMessage = document.getElementById("message");
var errorSpan1 = document.getElementById("error1");
var timefrom = document.getElementsByName("timeFrom")[0].value;

var errorSpan2 = document.getElementById("error2");
var timeto= document.getElementsByName("timeTo")[0].value;
var valid = true;

if (day.selectedIndex < 1) {
  message.innerHTML = "Please select a day.";
  message.className = "error-message";
  return false;
}

else {
  dayMessage.style.display = "none";

}


if (!/^([01]\d|2[0-3]):([0-5]\d)$/.test(timefrom)) {
  errorSpan1.textContent = "Please enter a valid time format (hh:mm)";
  errorSpan1.style.display = "inline";
  errorSpan1.style.color = "red";
  return false;
}
else {
  errorSpan1.style.display = "none";

}

if (!/^([01]\d|2[0-3]):([0-5]\d)$/.test(timeto)) {
  errorSpan2.textContent = "Please enter a valid time to (hh:mm)";
  errorSpan2.style.display = "inline";
  errorSpan2.style.color = "red";
  return false;
}
else {
  errorSpan2.style.display = "none";

}

// Comparaison de timefrom et timeto
if (timefrom >= timeto) {
  errorSpan1.textContent = "Please enter a start time before the end time.";
  errorSpan1.style.display = "inline";
  errorSpan1.style.color = "red";
  return false;
}
else {
  errorSpan1.style.display = "none";
}

return valid;
}

</script>


</div>









<style>



.modalu {
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

  .modalu-content {
    background-color: white;
    margin: 10% auto; /* Place la fenêtre modale à 10% du haut de la page */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  /* Style the form container */
  #update-form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  /* Style the form heading */
  #update-form h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4b0082;
  }

  /* Style the form labels */
  #update-form label {
    display: block;
    margin-bottom: 10px;
    color: #666;
  }

  /* Style the form input fields */
  #update-form input[type="text"],
  #update-form input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  }

  /* Style the form submit button */
  #update-form input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #008374;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  /* Style the form submit button on hover */
  #update-form input[type="submit"]:hover {
    background-color: #008374;
  }

  /* Style the back to list button */
  #update-form button {
    display: block;
    margin-top: 20px;
    padding: 10px;
    background-color: #008374;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  /* Style the back to list button on hover */
  #update-form button:hover {
    background-color: #008374;
  }

  /* Style the link inside the back to list button */
  #update-form button a {
    color: #fff;
    text-decoration: none;
  }
</style>






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


